@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <a href="{{ url('admin/prosedur/create') }}" class="btn btn-primary mb-3">
                <i class="fa-solid fa-plus"></i>
                <span class="ms-1">Tambah</span>
            </a>
            <div class="bg-white p-3 rounded-4 shadow-sm table-responsive">
                <table class="table table-bordered datatable align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th width="10%" class="text-center">No.</th>
                            <th width="70%" class="text-start">Name</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prosedurs as $item)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-start">{{ $item->nama }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/prosedur/edit/' . $item->id) }}" class="btn btn-warning">
                                            Ubah
                                        </a>
                                        <a onclick="return confirm(`Apakah yakin ingin menghapus data berikut ini?`)"
                                            href="{{ url('/admin/prosedur/delete/' . $item->id) }}" class="btn btn-danger">
                                            Hapus
                                        </a>
                                    </div>
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
