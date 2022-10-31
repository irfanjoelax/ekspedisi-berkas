<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Keterangan;
use App\Models\Prosedur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'activeMenu'       => 'dashboard',
            'total_desa'       => Desa::count(),
            'total_prosedur'   => Prosedur::count(),
            'total_keterangan' => Keterangan::count(),
        ]);
    }
}
