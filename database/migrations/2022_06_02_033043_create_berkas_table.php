<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('periode_id');
            $table->foreignId('kelengkapan_id');
            $table->string('path')->nullable();
            $table->string('berkas')->nullable();
            $table->enum('status', ['KOSONG', 'PENDING', 'VALID', 'INVALID'])->default('KOSONG');
            $table->boolean('is_valid')->default(false);
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
        Schema::dropIfExists('berkas');
    }
}
