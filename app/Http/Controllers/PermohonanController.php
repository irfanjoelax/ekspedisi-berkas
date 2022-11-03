<?php

namespace App\Http\Controllers;

use App\Exports\PermohonansExport;
use App\Models\Desa;
use App\Models\JenisHak;
use App\Models\Keterangan;
use App\Models\Permohonan;
use App\Models\Prosedur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PermohonanController extends Controller
{
    public function index()
    {
        return view('admin.permohonan.index', [
            'activeMenu'  => 'permohonan',
            'permohonans' => Permohonan::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.permohonan.form', [
            'activeMenu'  => 'permohonan',
            'isEdit'      => false,
            'url'         => url('admin/permohonan/submit'),
            'desas'       => Desa::latest()->get(),
            'prosedurs'   => Prosedur::latest()->get(),
            'keterangans' => Keterangan::latest()->get(),
            'jenis_haks'  => JenisHak::latest()->get(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.permohonan.form', [
            'activeMenu'  => 'permohonan',
            'isEdit'      => true,
            'url'         => url('admin/permohonan/submit/' . $id),
            'data'        => Permohonan::with('desa', 'prosedur', 'keterangan')->find($id),
            'desas'       => Desa::latest()->get(),
            'prosedurs'   => Prosedur::latest()->get(),
            'keterangans' => Keterangan::latest()->get(),
            'jenis_haks'  => JenisHak::latest()->get(),
        ]);
    }

    public function submit(Request $request, $id = null)
    {
        $permohonan = Permohonan::find($id);
        $dataID     = Str::uuid();
        $status     = 'Terkirim';

        if ($id != null) {
            $dataID = $permohonan->id;
            $status = $permohonan->status;
        };

        $data = [
            'id'            => $dataID,
            'no_berkas'     => $request->no_berkas,
            'no_hak'        => $request->no_hak,
            'nama_berkas'   => $request->nama_berkas,
            'desa_id'       => $request->desa_id,
            'prosedur_id'   => $request->prosedur_id,
            'keterangan_id' => $request->keterangan_id,
            'jenis_hak_id'  => $request->jenis_hak_id,
            'tanggal'       => $request->tanggal,
            'tujuan'        => $request->tujuan,
            'status'        => $status,
        ];

        if ($id == null) {
            Permohonan::create($data);
            Alert::success('Sukses', ucwords('Data permohonan Telah Berhasil Ditambahkan'));
        } else {
            $permohonan->update($data);
            Alert::info('Sukses', ucwords('Data permohonan Telah Berhasil Diperbarui'));
        }

        return redirect('admin/permohonan');
    }

    public function delete($id)
    {
        Permohonan::find($id)->delete();
        Alert::error('Sukses', ucwords('Data permohonan Telah Berhasil Dihapus'));

        return redirect('admin/permohonan');
    }

    public function update_status($id, $status)
    {
        $string_status = ucwords(str_replace('-', ' ', $status));
        Permohonan::find($id)->update(['status' => $string_status]);
        Alert::info('Sukses', ucwords('Status Data permohonan Berhasil Diperbarui'));

        return redirect('admin/permohonan');
    }

    public function export()
    {
        return Excel::download(new PermohonansExport, 'daftar-permohonan.xlsx');
    }
}
