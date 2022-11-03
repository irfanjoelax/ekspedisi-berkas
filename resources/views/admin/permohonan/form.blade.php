@extends('layouts.app')

@section('style')
    <style>
        label {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <h3 class="fw-bold" class="d-flex flex-column">
                <img class="mb-3"
                    src="data:image/png;base64,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">
                <p class="text-black-50">Form Permohonan</p>
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
                @php
                    function is_selected($key, $value)
                    {
                        if ($key == $value) {
                            return 'selected';
                        }
                    }
                @endphp
                <div class="mb-3">
                    <label for="nama_berkas" class="form-label">Nama Berkas</label>
                    <input type="text" class="form-control" name="nama_berkas"
                        value="{{ $isEdit ? $data->nama_berkas : '' }}" placeholder="Masukkan Nama Berkas" required>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="no_berkas" class="form-label">No. Berkas</label>
                        <input type="text" class="form-control" name="no_berkas"
                            value="{{ $isEdit ? $data->no_berkas : '' }}" placeholder="Masukkan No. Berkas" required>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="desa_id" class="form-label">Desa/Kecamatan</label>
                        <select name="desa_id" class="form-select" required>
                            @if (!$isEdit)
                                <option value="" selected>-- Pilih Desa/Kecamatan --</option>
                            @endif
                            @foreach ($desas as $item)
                                <option value="{{ $item->id }}"
                                    {{ $isEdit ? is_selected($item->id, $data->desa_id) : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="no_hak" class="form-label">No. Hak</label>
                        <input type="text" class="form-control" name="no_hak" value="{{ $isEdit ? $data->no_hak : '' }}"
                            placeholder="Masukkan No. Hak" required>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="jenis_hak_id" class="form-label">Jenis Hak</label>
                        <select name="jenis_hak_id" class="form-select" required>
                            @if (!$isEdit)
                                <option value="" selected>-- Pilih Jenis Hak --</option>
                            @endif
                            @foreach ($jenis_haks as $item)
                                <option value="{{ $item->id }}"
                                    {{ $isEdit ? is_selected($item->id, $data->jenis_hak_id) : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12 mb-3">
                        <label for="prosedur_id" class="form-label">Prosedur</label>
                        <select name="prosedur_id" class="form-select" required>
                            @if (!$isEdit)
                                <option value="" selected>-- Pilih Prosedur --</option>
                            @endif
                            @foreach ($prosedurs as $item)
                                <option value="{{ $item->id }}"
                                    {{ $isEdit ? is_selected($item->id, $data->prosedur_id) : '' }}>{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12 mb-3">
                        <label for="keterangan_id" class="form-label">Keterangan</label>
                        <select name="keterangan_id" class="form-select" required>
                            @if (!$isEdit)
                                <option value="" selected>-- Pilih Keterangan --</option>
                            @endif
                            @foreach ($keterangans as $item)
                                <option value="{{ $item->id }}"
                                    {{ $isEdit ? is_selected($item->id, $data->keterangan_id) : '' }}>{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-lg-3">
                    <div class="col-md-4 col-12 mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal"
                            value="{{ $isEdit ? $data->tanggal : '' }}" required>
                    </div>
                    <div class="col-md-8 col-12 mb-3">
                        <label for="tujuan" class="form-label">Tujuan</label>
                        <select name="tujuan" class="form-select" required>
                            @if (!$isEdit)
                                <option value="" selected>-- Pilih Tujuan --</option>
                            @endif
                            <option value="kasi" {{ $isEdit ? is_selected('kasi', $data->tujuan) : '' }}>Kepala Seksi
                                Penetapan Hak dan Pendaftaran</option>
                            <option value="kakan" {{ $isEdit ? is_selected('kakan', $data->tujuan) : '' }}>Kepala Kantor
                                Pertanahan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ $isEdit ? 'Ubah' : 'Simpan' }} Data
                </button>
                <a href="{{ url('admin/permohonan') }}" class="btn btn-warning">
                    Kembali ke Daftar
                </a>
                @if ($isEdit)
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Hapus Item
                    </button>
                @endif
            </form>
        </div>
    </div>

    @if ($isEdit)
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="deleteModalLabel">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus Data Berikut Ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak,
                            Batalkan!</button>
                        <a class="btn btn-danger" href="{{ url('admin/permohonan/delete/' . $data->id) }}">
                            Yes, Hapus!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
