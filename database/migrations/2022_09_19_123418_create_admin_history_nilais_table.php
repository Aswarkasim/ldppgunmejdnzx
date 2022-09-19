<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminHistoryNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_history_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('matakuliah_id');
            $table->foreignId('kelas_id');
            $table->date('tanggal');
            $table->text('desc')->nullable();
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
        Schema::dropIfExists('admin_history_nilais');
    }
}
