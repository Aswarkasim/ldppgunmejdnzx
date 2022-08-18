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
            $table->foreignId('periode_id')->nullable();
            $table->string('namalengkap')->nullable();
            $table->string('nip')->nullable();
            $table->string('nomor_serdos')->nullable();

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
            //instansi
            $table->string('nama_instansi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('prodi')->nullable();

            //pendidikan
            $table->string('s1_jurusan')->nullable();
            $table->string('tahun_selesai_s1')->nullable();
            $table->string('s2_jurusan')->nullable();
            $table->string('tahun_selesai_s2')->nullable();
            $table->string('s3_jurusan')->nullable();
            $table->string('tahun_selesai_s3')->nullable();


            $table->string('nama_pemilik')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->text('pasfoto')->nullable();



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
