<?php

namespace App\Exports;

use App\Models\Permohonan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PermohonansExport implements FromQuery, WithMapping, WithHeadings
{
    public function query()
    {
        return Permohonan::query();
    }

    public function map($permohonan): array
    {
        return [
            $permohonan->no_berkas,
            $permohonan->no_hak,
            $permohonan->nama_berkas,
            $permohonan->desa->nama,
            $permohonan->prosedur->nama,
            $permohonan->keterangan->nama,
            $permohonan->jenis_hak->nama,
            substr($permohonan->updated_at, 0, 10),
            $permohonan->tujuan,
            $permohonan->status,
        ];
    }

    public function headings(): array
    {
        return [
            'No. Berkas',
            'No. Hak',
            'Nama Berkas',
            'Desa',
            'Prosedur',
            'Keterangan',
            'Jenis Hak',
            'Tanggal',
            'Tujuan',
            'Status',
        ];
    }
}
