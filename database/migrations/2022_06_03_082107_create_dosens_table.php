<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('namalengkap')->nullable();
            $table->string('nip')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('jabatan')->nullable();

            $table->string('nohp')->nullable();

            $table->string('mapel_diampuh')->nullable();
            $table->string('npwp')->nullable();
            $table->string('email')->nullable();


            $table->string('alamat_rumah')->nullable();
            $table->string('kab_rumah')->nullable();
            $table->string('prov_rumah')->nullable();

            $table->string('kab_rumah_name')->nullable();
            $table->string('prov_rumah_name')->nullable();

            //instansi
            $table->string('nama_insatansi')->nullable();
            $table->string('alamat_instansi')->nullable();

            $table->string('kab_instansi')->nullable();
            $table->string('prov_instansi')->nullable();


            $table->string('kab_instansi_name')->nullable();
            $table->string('prov_instansi_name')->nullable();

            //alamat


            //pendidikan
            $table->string('s1_jurusan')->nullable();
            $table->string('s2_jurusan')->nullable();
            $table->string('s3_jurusan')->nullable();


            $table->string('nama_buku_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();



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
        Schema::dropIfExists('dosens');
    }
}
