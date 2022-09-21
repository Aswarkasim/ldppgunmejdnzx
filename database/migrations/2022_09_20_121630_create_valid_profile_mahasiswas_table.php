<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidProfileMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valid_profile_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->string('no_ukg');
            $table->boolean('data_diri')->default(0);
            $table->boolean('instansi')->default(0);
            $table->boolean('pendidikan')->default(0);
            $table->boolean('keluarga')->default(0);
            $table->boolean('rekening')->default(0);
            $table->boolean('pasfoto')->default(0);
            $table->boolean('berkas')->default(0);
            $table->boolean('bukti_selesai_ppi')->default(0);
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
        Schema::dropIfExists('valid_profile_mahasiswas');
    }
}
