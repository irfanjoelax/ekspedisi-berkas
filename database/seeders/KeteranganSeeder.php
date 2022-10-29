<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keterangan::create([
            'id'   => Str::uuid(),
            'nama' => 'Nama PPAT'
        ]);
    }
}
