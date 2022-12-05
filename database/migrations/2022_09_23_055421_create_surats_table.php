<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->string('name');
            $table->text('body')->nullable();
            $table->text('perihal')->nullable();
            $table->text('tembusan_kemendikbud')->nullable();
            $table->text('tembusan_kemenag')->nullable();

            $table->text('point_mk_kemendikbud')->nullable();
            $table->text('point_mk_kemenag')->nullable();

            $table->integer('nomor_surat_awal')->nullable();
            $table->integer('nomor_surat_akhir')->nullable();

            $table->string('jabatan_ttd')->nullable();
            $table->string('nama_ttd')->nullable();
            $table->string('nip')->nullable();
            $table->text('ttd')->nullable();
            $table->text('paraf')->nullable();

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
        Schema::dropIfExists('surats');
    }
}
