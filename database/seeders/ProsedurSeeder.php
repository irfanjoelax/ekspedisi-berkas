<?php

namespace Database\Seeders;

use App\Models\Prosedur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProsedurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Jual Beli'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Hibah'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'APHB'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Pewarisan'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Penetapan Pengadilan'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Wakaf'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Pemecahan'
        ]);
        Prosedur::create([
            'id'   => Str::uuid(),
            'nama' => 'Penggabungan'
        ]);
    }
}
