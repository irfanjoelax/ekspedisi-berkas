@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <div class="mb-3">
                <a href="{{ url('admin/permohonan/create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    <span class="ms-1">Tambah</span>
                </a>
                <a href="{{ url('admin/permohonan/export') }}" class="btn btn-warning">
                    <i class="fa-solid fa-file-excel"></i>
                    <span class="ms-1">Export Excel</span>
                </a>
            </div>

            <div class="bg-white p-3 rounded-4 shadow-sm table-responsive">
                <table class="table table-bordered datatable align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th width="40%" class="text-start">Berkas</th>
                            <th width="15%" class="text-center">Tanggal</th>
                            <th width="20%" class="text-center">Posisi</th>
                            <th width="15%" class="text-center">Status</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            function check_status($value)
                            {
                                if ($value == 'Dikembalikan') {
                                    return 'danger';
                                }
                            
                                if ($value == 'Terkirim') {
                                    return 'primary';
                                }
                            }
                            
                            function show_tujuan($value)
                            {
                                if ($value == 'kasi') {
                                    return 'Kepala Seksi Penetapan Hak dan Pendaftaran';
                                }
                            
                                if ($value == 'kakan') {
                                    return 'Kepala Kantor Pertanahan';
                                }
                            }
                        @endphp
                        @foreach ($permohonans as $item)
                            <tr>
                                <td class="text-start">
                                    <strong>{{ $item->no_berkas . ' | ' . $item->no_hak }}</strong>
                                    <br>
                                    <small>{{ $item->nama_berkas }}</small>
                                    <br>
                                    <span class="badge rounded-pill text-bg-primary">{{ $item->desa->nama }}</span>
                                    <span class="badge rounded-pill text-bg-info">{{ $item->prosedur->nama }}</span>
                                    <span class="badge rounded-pill text-bg-secondary">{{ $item->keterangan->nama }}</span>
                                </td>
                                <td class="text-center">
                                    <small>{{ tanggal(substr($item->updated_at, 0, 10)) }}</small>
                                </td>
                                <td class="text-center">{{ show_tujuan($item->tujuan) }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-{{ check_status($item->status) }} dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $item->status }}
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('/admin/permohonan/update/status/' . $item->id . '/dikembalikan', []) }}">
                                                    Dikembalikan
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('/admin/permohonan/update/status/' . $item->id . '/terkirim', []) }}">
                                                    Terkirim
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/admin/permohonan/edit/' . $item->id) }}"
                                        class="btn btn-sm btn-warning">
                                        Ubah
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                ordering: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                }
            });
        });
    </script>
@endsection
