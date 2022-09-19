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
            $table->foreignId('user_id')->nullable();
            $table->foreignId('periode_id')->nullable();
            $table->foreignId('bidang_studi_id')->nullable();

            $table->foreignId('bidang_studi_name')->nullable();
            $table->foreignId('kelas_name')->nullable();
            $table->text('npm')->nullable();
            $table->text('no_ukg')->nullable()->unique();
            $table->text('nuptk')->nullable();
            $table->enum('kementerian', ['KEMENDIKBUD', 'KEMENAG'])->nullable();


            $table->text('namalengkap')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('nik')->nullable();
            $table->text('pasfoto')->nullable();
            $table->text('unggah_kk')->nullable();
            $table->text('unggah_ktp')->nullable();
            $table->text('alamat_domisili')->nullable();

            $table->text('provinsi_tempat_tinggal')->nullable();
            $table->text('kabupaten_tempat_tinggal')->nullable();

            $table->text('kabupaten_tempat_tinggal_name')->nullable();
            $table->text('provinsi_tempat_tinggal_name')->nullable();

            $table->text('kecamatan_tempat_tinggal')->nullable();
            $table->text('kelurahan_tempat_tinggal')->nullable();
            $table->text('rt_tempat_tinggal')->nullable();
            $table->text('rw_tempat_tinggal')->nullable();
            $table->text('kode_pos')->nullable();
            $table->text('nohp')->nullable();
            $table->text('email')->nullable();
            $table->text('golongan_darah')->nullable();
            $table->text('agama')->nullable();


            $table->text('nama_instansi')->nullable();
            $table->text('npsn_sekolah')->nullable();
            $table->text('akreditasi_sekolah')->nullable();
            $table->text('jenjang_pendidikan')->nullable();
            $table->text('alamat_instansi')->nullable();


            //pendidikan
            $table->text('pt_s1')->nullable();
            $table->text('nama_prodi_s1')->nullable();
            $table->text('nomor_ijazah_s1')->nullable();
            $table->text('ipk_s1')->nullable();
            $table->date('tanggal_kelulusan_s1')->nullable();
            $table->text('alamat_pt_s1')->nullable();

            $table->text('provinsi_pt_s1')->nullable();
            $table->text('kabupaten_kota_pt_s1')->nullable();

            $table->text('provinsi_pt_s1_name')->nullable();
            $table->text('kabupaten_kota_pt_s1_name')->nullable();

            $table->text('unggah_ijazah_s1')->nullable();
            $table->text('unggah_transkrip_s1')->nullable();

            $table->text('pt_s2')->nullable();
            $table->text('nama_prodi_s2')->nullable();
            $table->text('nomor_ijazah_s2')->nullable();
            $table->text('ipk_s2')->nullable();
            $table->date('tanggal_kelulusan_s2')->nullable();
            $table->text('alamat_pt_s2')->nullable();

            $table->text('kabupaten_kota_pt_s2')->nullable();
            $table->text('provinsi_pt_s2')->nullable();

            $table->text('kabupaten_kota_pt_s2_name')->nullable();
            $table->text('provinsi_pt_s2_name')->nullable();


            $table->text('unggah_ijazah_s2')->nullable();
            $table->text('unggah_transkrip_s2')->nullable();

            //keluarga
            $table->text('nama_pasangan')->nullable();
            $table->text('pendidikan_pasangan')->nullable();
            $table->text('pekerjaan_pasangan')->nullable();
            $table->integer('jumlah_anak')->nullable();

            //ayah
            $table->text('nama_ayah_kandung')->nullable();
            $table->text('pendidikan_ayah_kandung')->nullable();
            $table->text('pekerjaan_ayah_kandung')->nullable();
            $table->integer('penghasilan_ayah_kandung')->nullable();
            $table->text('nik_ayah_kandung')->nullable();

            //ibu
            $table->text('nama_ibu_kandung')->nullable();
            $table->text('pendidikan_ibu_kandung')->nullable();
            $table->text('pekerjaan_ibu_kandung')->nullable();
            $table->integer('penghasilan_ibu_kandung')->nullable();
            $table->text('nik_ibu_kandung')->nullable();

            //keluarga_dekat
            $table->text('nohp_keluarga_dekat')->nullable();
            $table->text('alamat_orangtua')->nullable();


            $table->text('kabupaten_orangtua')->nullable();
            $table->text('provinsi_orangtua')->nullable();

            $table->text('kabupaten_orangtua_name')->nullable();
            $table->text('provinsi_orangtua_name')->nullable();

            $table->text('nama_bank')->nullable();
            $table->text('nama_pemilik')->nullable();
            $table->text('nomor_rekening')->nullable();

            $table->enum('status', ['LENGKAPI', 'WAITING', 'PENDING', 'VALID', 'INVALID']);
            $table->boolean('is_registered')->default(0);
            $table->enum('keaktifan', ['AKTIF', 'NONAKTIF', 'CUTI', 'LULUS', 'DO', 'MUT', 'KELUAR'])->default('AKTIF');
            $table->text('bukti_keaktifan')->nullable();
            $table->text('alasan')->nullable();
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
