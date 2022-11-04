<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DesaController extends Controller
{
    public function index()
    {
        return view('admin.desa.index', [
            'activeMenu' => 'desa',
            'no'         => 1,
            'desas'      => Desa::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.desa.form', [
            'activeMenu' => 'desa',
            'isEdit'     => false,
            'url'        => url('admin/desa/submit')
        ]);
    }

    public function edit($id)
    {
        return view('admin.desa.form', [
            'activeMenu' => 'desa',
            'isEdit'     => true,
            'url'        => url('admin/desa/submit/' . $id),
            'data'       => Desa::find($id),
        ]);
    }

    public function submit(Request $request, $id = null)
    {
        $data = [
            'id'   => $request->id,
            'nama' => strtoupper($request->nama),
        ];

        if ($id == null) {
            Desa::create($data);
            Alert::success('Sukses', ucwords('Data desa Telah Berhasil Ditambahkan'));
        } else {
            Desa::find($id)->update($data);
            Alert::info('Sukses', ucwords('Data desa Telah Berhasil Diperbarui'));
        }

        return redirect('admin/desa');
    }

    public function delete($id)
    {
        Desa::find($id)->delete();
        Alert::error('Sukses', ucwords('Data desa Telah Berhasil Dihapus'));

        return redirect('admin/desa');
    }
}
