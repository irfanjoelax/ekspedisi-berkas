@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold" class="d-flex flex-column">
                <img class="mb-3"
                    src="data:image/png;base64,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">
                <p class="text-black-50">Form Data Jenis Hak</p>
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
                    <label for="nama" class="col-sm-3 col-form-label">Jenis Hak</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan data jenis hak"
                            value="{{ $isEdit ? $data->nama : old('nama') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Ubah' : 'Simpan' }} Data
                        </button>
                        <a href="{{ url('admin/jenis_hak') }}" class="btn btn-warning">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
