<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->string('user_id');
            $table->string('mahasiswa_id');
            $table->string('province_id')->nullable();
            $table->string('kabupaten_id')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('province_name')->nullable();
            $table->string('kabupaten_name')->nullable();
            $table->string('perihal')->nullable();
            $table->string('lokasi_sekolah')->nullable();
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
        Schema::dropIfExists('ppis');
    }
}
