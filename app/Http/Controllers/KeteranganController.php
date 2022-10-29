<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KeteranganController extends Controller
{
    public function index()
    {
        return view('admin.keterangan.index', [
            'activeMenu'  => 'keterangan',
            'no'          => 1,
            'keterangans' => Keterangan::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.keterangan.form', [
            'activeMenu' => 'keterangan',
            'isEdit'     => false,
            'url'        => url('admin/keterangan/submit')
        ]);
    }

    public function edit($id)
    {
        return view('admin.keterangan.form', [
            'activeMenu' => 'keterangan',
            'isEdit'     => true,
            'url'        => url('admin/keterangan/submit/' . $id),
            'data'       => Keterangan::find($id),
        ]);
    }

    public function submit(Request $request, $id = null)
    {
        $dataID = Str::uuid();

        if ($id != null) {
            $dataID = $id;
        };

        $data = [
            'id'       => $dataID,
            'nama'     => $request->nama,
        ];

        if ($id == null) {
            Keterangan::create($data);
            Alert::success('Sukses', ucwords('Data keterangan Telah Berhasil Ditambahkan'));
        } else {
            Keterangan::find($id)->update($data);
            Alert::info('Sukses', ucwords('Data keterangan Telah Berhasil Diperbarui'));
        }

        return redirect('admin/keterangan');
    }

    public function delete($id)
    {
        Keterangan::find($id)->delete();
        Alert::error('Sukses', ucwords('Data keterangan Telah Berhasil Dihapus'));

        return redirect('admin/keterangan');
    }
}
