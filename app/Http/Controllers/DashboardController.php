<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Keterangan;
use App\Models\Prosedur;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title'           => 'Grafik Permohonan Per Bulan',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Permohonan',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'chart_type'            => 'bar',
            'chart_color'           => '17,138,178',
        ];

        $chart = new LaravelChart($chart_options);

        return view('admin.dashboard', [
            'activeMenu'       => 'dashboard',
            'total_desa'       => Desa::count(),
            'total_prosedur'   => Prosedur::count(),
            'total_keterangan' => Keterangan::count(),
            'chart'            => $chart,
        ]);
    }
}
