<?php

namespace Database\Seeders;

use App\Models\JenisHak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JenisHakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisHak::create([
            'id'   => Str::uuid(),
            'nama' => 'Hak Tanah'
        ]);
    }
}
