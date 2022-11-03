@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-xl-3 col-md-6">
            <div class="card text-bg-primary mb-4">
                <div class="card-body">
                    <h1>{{ $total_desa }} Data</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-bg-primary stretched-link" href="{{ url('/admin/desa') }}">Daftar Desa/Kec</a>
                    <div class="small text-bg-primary"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-bg-warning mb-4">
                <div class="card-body">
                    <h1>{{ $total_prosedur }} Data</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-bg-warning stretched-link" href="{{ url('/admin/prosedur') }}">Daftar Prosedur</a>
                    <div class="small text-bg-warning"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-bg-danger mb-4">
                <div class="card-body">
                    <h1>{{ $total_keterangan }} Data</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-bg-danger stretched-link" href="{{ url('/admin/keterangan') }}">Daftar
                        Keterangan</a>
                    <div class="small text-bg-danger"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-bg-dark mb-4">
                <div class="card-body">
                    <h1>{{ $total_jenis_hak }} Data</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-bg-dark stretched-link" href="{{ url('/admin/jenis_hak') }}">Daftar
                        Jenis Hak</a>
                    <div class="small text-bg-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-white p-3 rounded-4 shadow-sm">
                {!! $chart->renderHtml() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
@endsection
