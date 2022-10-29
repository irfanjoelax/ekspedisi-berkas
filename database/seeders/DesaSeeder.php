<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'id' => Str::uuid(),
            'nama' => 'Sungai Kunjang',
        ]);

        Desa::create([
            'id' => Str::uuid(),
            'nama' => 'Samarinda Seberang',
        ]);
    }
}
