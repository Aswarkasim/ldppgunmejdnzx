<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->string('name');
            $table->boolean('is_verified');
            $table->text('desc');
            $table->enum('kebutuhan', ['WAJIB', 'OPTIONAL'])->nullable();
            $table->enum('jenis', ['PRAJAB', 'DALJAB'])->nullable();
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
        Schema::dropIfExists('kelengkapans');
    }
}
