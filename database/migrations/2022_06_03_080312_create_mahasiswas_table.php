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
            $table->foreignId('periode_id');
            $table->foreignId('bidang_studi_id')->nullable();
            $table->string('npm')->nullable();
            $table->string('no_ukg')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('namalengkap')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('nik')->nullable();
            $table->string('unggah_kk')->nullable();
            $table->string('unggah_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('provinsi_tempat_tinggal')->nullable();
            $table->string('kabupaten_tempat_tinggal')->nullable();
            $table->string('kecamatan_tempat_tinggal')->nullable();
            $table->string('kelurahan_tempat_tinggal')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('agama')->nullable();


            $table->string('nama_instansi')->nullable();
            $table->string('npsn_sekolah')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('alamat_instansi')->nullable();


            //pendidikan
            $table->string('pt_s1')->nullable();
            $table->string('nama_prodi_s1')->nullable();
            $table->string('nomor_ijazah_s1')->nullable();
            $table->string('ipk_s1')->nullable();
            $table->date('tanggal_kelulusan_s1')->nullable();
            $table->string('alamat_pt_s1')->nullable();
            $table->string('provinsi_pt_s1')->nullable();
            $table->string('kabupaten_kota_pt_s1')->nullable();
            $table->string('unggah_ijazah_s1')->nullable();
            $table->string('unggah_transkrip_s1')->nullable();

            $table->string('pt_s2')->nullable();
            $table->string('nama_prodi_s2')->nullable();
            $table->string('nomor_ijazah_s2')->nullable();
            $table->string('ipk_s2')->nullable();
            $table->date('tanggal_kelulusan_s2')->nullable();
            $table->string('alamat_pt_s2')->nullable();
            $table->string('kabupaten_kota_pt_s2')->nullable();
            $table->string('provinsi_pt_s2')->nullable();
            $table->string('unggah_ijazah_s2')->nullable();
            $table->string('unggah_transkrip_s2')->nullable();

            //keluarga
            $table->string('nama_pasangan')->nullable();
            $table->string('pendidikan_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->integer('jumlah_anak')->nullable();

            //ayah
            $table->string('nama_ayah_kandung')->nullable();
            $table->string('pendidikan_ayah_kandung')->nullable();
            $table->string('pekerjaan_ayah_kandung')->nullable();
            $table->integer('penghasilan_ayah_kandung')->nullable();
            $table->string('nik_ayah_kandung')->nullable();

            //ibu
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('pendidikan_ibu_kandung')->nullable();
            $table->string('pekerjaan_ibu_kandung')->nullable();
            $table->integer('penghasilan_ibu_kandung')->nullable();
            $table->string('nik_ibu_kandung')->nullable();

            //keluarga_dekat
            $table->string('nohp_keluarga_dekat')->nullable();
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
