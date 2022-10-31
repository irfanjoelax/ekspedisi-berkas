<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_berkas');
            $table->string('no_hak');
            $table->string('nama_berkas');
            $table->uuid('desa_id');
            $table->uuid('prosedur_id');
            $table->uuid('keterangan_id');
            $table->date('tanggal');
            $table->enum('tujuan', ['kasi', 'kakan']);
            $table->enum('status', ['Belum Kembali', 'Terkirim']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
}
