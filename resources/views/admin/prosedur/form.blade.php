@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold" class="d-flex flex-column">
                <img class="mb-3"
                    src="data:image/png;base64,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">
                <p class="text-black-50">Form Data Prosedur</p>
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
                    <label for="nama" class="col-sm-3 col-form-label">Nama Prosedur</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama prosedur"
                            value="{{ $isEdit ? $data->nama : old('nama') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 offset-sm-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'Ubah' : 'Simpan' }} Data
                        </button>
                        <a href="{{ url('admin/prosedur') }}" class="btn btn-warning">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
