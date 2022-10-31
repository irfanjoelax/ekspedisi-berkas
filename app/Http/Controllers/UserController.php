<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'activeMenu' => 'user',
            'no'         => 1,
            'users'      => User::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.user.form', [
            'activeMenu'  => 'user',
            'isEdit'      => false,
            'url'         => url('admin/user/submit'),
        ]);
    }

    public function edit($id)
    {
        return view('admin.user.form', [
            'activeMenu'  => 'user',
            'isEdit'      => true,
            'url'         => url('admin/user/submit/' . $id),
            'data'        => User::find($id),
        ]);
    }

    public function submit(Request $request, $id = null)
    {
        $user   = User::find($id);
        $dataID = Str::uuid();

        if ($id != null) {
            $dataID = $user->id;
        };

        $data = [
            'id'       => $dataID,
            'name'     => $request->name,
            'username' => $request->username,
            'password' => Hash::make('123456'),
        ];

        if ($id == null) {
            User::create($data);
            Alert::success('Sukses', ucwords('Data user Telah Berhasil Ditambahkan'));
        } else {
            $user->update($data);
            Alert::info('Sukses', ucwords('Data user Telah Berhasil Diperbarui'));
        }

        return redirect('admin/user');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        Alert::error('Sukses', ucwords('Data user Telah Berhasil Dihapus'));

        return redirect('admin/user');
    }
}
