@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold" class="d-flex flex-column">
                <img class="mb-2"
                    src="data:image/png;base64,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">
                <p class="text-black-50">Form Data Desa</p>
            </h3>
        </div>
        <div class="col-md-8 mb-3">
            @if ($errors->any())
                <div class="alert alert-warning mb-3" role="alert">
                    <ul class="my-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ $url }}" class="bg-white p-4 shadow-sm rounded-4" method="POST">
                @csrf
                <div class="row mb-4">
                    <label for="id" class="col-sm-3 col-form-label">Kode Wilayah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="id" placeholder="Masukkan Kode Wilayah"
                            value="{{ $isEdit ? $data->id : old('id') }}" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Desa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama desa"
                            value="{{ $isEdit ? $data->nama : old('nama') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Ubah' : 'Simpan' }} Data
                        </button>
                        <a href="{{ url('admin/desa') }}" class="btn btn-warning">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
