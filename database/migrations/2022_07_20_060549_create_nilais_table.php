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
            $table->foreignId('kelas_id')->nullable();
            $table->string('no_ukg')->nullable();
            $table->foreignId('matakuliah_id')->nullable();
            $table->double('nilai_acuan')->default(0);
            $table->string('nilai_index')->default('K');
            $table->double('nilai_mutu')->default(0);
            $table->string('npm')->nullable();
            $table->string('namalengkap_name')->nullable();
            $table->string('bidang_studi_name')->nullable();
            $table->string('kelas_name')->nullable();
            $table->string('matakuliah_name')->nullable();
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
