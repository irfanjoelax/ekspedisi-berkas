<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedFieldJenisHakPermohonans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->uuid('jenis_hak_id')->after('keterangan_id')->nullable();
            $table->foreign('jenis_hak_id')->references('id')->on('jenis_haks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
