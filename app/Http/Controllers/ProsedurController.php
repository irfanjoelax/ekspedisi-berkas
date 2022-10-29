<?php

namespace App\Http\Controllers;

use App\Models\Prosedur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProsedurController extends Controller
{
    public function index()
    {
        return view('admin.prosedur.index', [
            'activeMenu' => 'prosedur',
            'no'         => 1,
            'prosedurs'      => Prosedur::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.prosedur.form', [
            'activeMenu' => 'prosedur',
            'isEdit'     => false,
            'url'        => url('admin/prosedur/submit')
        ]);
    }

    public function edit($id)
    {
        return view('admin.prosedur.form', [
            'activeMenu' => 'prosedur',
            'isEdit'     => true,
            'url'        => url('admin/prosedur/submit/' . $id),
            'data'       => Prosedur::find($id),
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
            Prosedur::create($data);
            Alert::success('Sukses', ucwords('Data prosedur Telah Berhasil Ditambahkan'));
        } else {
            Prosedur::find($id)->update($data);
            Alert::info('Sukses', ucwords('Data prosedur Telah Berhasil Diperbarui'));
        }

        return redirect('admin/prosedur');
    }

    public function delete($id)
    {
        Prosedur::find($id)->delete();
        Alert::error('Sukses', ucwords('Data prosedur Telah Berhasil Dihapus'));

        return redirect('admin/prosedur');
    }
}
