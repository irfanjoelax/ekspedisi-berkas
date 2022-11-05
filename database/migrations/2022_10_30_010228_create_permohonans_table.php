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
            $table->string('desa_id')->unique();
            $table->uuid('prosedur_id');
            $table->uuid('keterangan_id');
            $table->enum('tujuan', ['kasi', 'kakan']);
            $table->enum('status', ['Dikembalikan', 'Terkirim']);
            $table->timestamps();

            $table->foreign('desa_id')->references('id')->on('desas');
            $table->foreign('prosedur_id')->references('id')->on('prosedurs');
            $table->foreign('keterangan_id')->references('id')->on('keterangans');
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
