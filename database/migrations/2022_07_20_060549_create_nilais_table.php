<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('mahasiswa_id')->nullable();
            $table->string('no_ukg')->nullable();
            $table->foreignId('bidang_studi_id')->nullable();
            $table->foreignId('matakuliah_id')->nullable();
            $table->string('nilai')->default([0]);
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
        Schema::dropIfExists('nilais');
    }
}
