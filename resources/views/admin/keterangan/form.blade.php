@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold" class="d-flex flex-column">
                <img class="mb-3"
                    src="data:image/png;base64,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">
                <p class="text-black-50">Form Data Keterangan</p>
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
                    <label for="nama" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan data keterangan"
                            value="{{ $isEdit ? $data->nama : old('nama') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Ubah' : 'Simpan' }} Data
                        </button>
                        <a href="{{ url('admin/keterangan') }}" class="btn btn-warning">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
