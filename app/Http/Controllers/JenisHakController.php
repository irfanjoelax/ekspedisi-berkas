<?php

namespace App\Http\Controllers;

use App\Models\JenisHak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JenisHakController extends Controller
{
    public function index()
    {
        return view('admin.jenis_hak.index', [
            'activeMenu'  => 'jenis_hak',
            'no'          => 1,
            'jenis_haks' => JenisHak::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.jenis_hak.form', [
            'activeMenu' => 'jenis_hak',
            'isEdit'     => false,
            'url'        => url('admin/jenis_hak/submit')
        ]);
    }

    public function edit($id)
    {
        return view('admin.jenis_hak.form', [
            'activeMenu' => 'jenis_hak',
            'isEdit'     => true,
            'url'        => url('admin/jenis_hak/submit/' . $id),
            'data'       => JenisHak::find($id),
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
            JenisHak::create($data);
            Alert::success('Sukses', ucwords('Data jenis hak Telah Berhasil Ditambahkan'));
        } else {
            JenisHak::find($id)->update($data);
            Alert::info('Sukses', ucwords('Data jenis hak Telah Berhasil Diperbarui'));
        }

        return redirect('admin/jenis_hak');
    }

    public function delete($id)
    {
        JenisHak::find($id)->delete();
        Alert::error('Sukses', ucwords('Data jenis hak Telah Berhasil Dihapus'));

        return redirect('admin/jenis_hak');
    }
}
