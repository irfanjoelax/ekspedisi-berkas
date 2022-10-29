@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <strong>Hi, {{ Auth::user()->name }}</strong> Anda berhasil login sebagai admin
                </div>
            </div>
        </div>
    </div>
@endsection
