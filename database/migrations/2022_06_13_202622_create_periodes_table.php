<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_ppg_id');
            $table->string('name');
            $table->string('tahun');
            $table->text('desc');
            $table->enum('ppi_status', ['AKTIF', 'NONAKTIF'])->default('NONAKTIF');
            $table->integer('nomor_surat_first')->nullable();
            $table->integer('nomor_surat_last')->nullable();
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
        Schema::dropIfExists('periodes');
    }
}
