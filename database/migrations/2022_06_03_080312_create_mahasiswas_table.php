<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('angkatan_id')->nullable();
            $table->foreignId('bidang_studi_id')->nullable();
            $table->string('namalengkap')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('npsn_sekolah')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('alamat_instansi')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nik')->nullable();
            $table->string('unggah_kk')->nullable();
            $table->string('unggah_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan_tempat_tinggal')->nullable();
            $table->string('kecamatan_tempat_tinggal')->nullable();

            //pendidikan
            $table->string('perguruan_tinggi')->nullable();
            $table->string('nama_prodi_s1')->nullable();
            $table->string('nomor_ijazah_s1')->nullable();
            $table->string('ipk_s1')->nullable();
            $table->date('tanggal_kelulusan_s1')->nullable();
            $table->string('alamat_pt_s1')->nullable();
            $table->string('kabupaten_kota_pt_s1')->nullable();
            $table->string('provinsi_pt_s1')->nullable();
            $table->string('unggah_ijazah_s1')->nullable();
            $table->string('unggah_transkrip_s1')->nullable();

            //keluarga
            $table->string('nama_pasangan')->nullable();
            $table->string('pendidikan_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->string('jumlah_anak')->nullable();

            //ayah
            $table->string('nama_ayah_kandung')->nullable();
            $table->string('pendidikan_ayah_kandung')->nullable();
            $table->string('penghasilan_ayah_kandung')->nullable();
            $table->string('nik_ayah_kandung')->nullable();
            $table->string('nohp_ayah_kandung')->nullable();

            //ibu
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('pendidikan_ibu_kandung')->nullable();
            $table->string('penghasilan_ibu_kandung')->nullable();
            $table->string('nik_ibu_kandung')->nullable();
            $table->string('nohp_ibu_kandung')->nullable();

            //keluarga_dekat
            $table->string('alamat_orangtua')->nullable();
            $table->string('kabupaten_orangtua')->nullable();
            $table->string('provinsi_orangtua')->nullable();


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
        Schema::dropIfExists('mahasiswas');
    }
}
