<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mahasiswa::whereIsRegistered(1)->get();
    }

    public function headings(): array
    {
        return [
            'user_id',
            'periode_id',
            'bidang_studi_id',
            'npm',
            'no_ukg',
            'nuptk',
            'kementerian',


            'namalengkap',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'nik',
            'pasfoto',
            'unggah_kk',
            'unggah_ktp',
            'alamat_domisili',
            'provinsi_tempat_tinggal',
            'kabupaten_tempat_tinggal',
            'kecamatan_tempat_tinggal',
            'kelurahan_tempat_tinggal',
            'rt_tempat_tinggal',
            'rw_tempat_tinggal',
            'kode_pos',
            'nohp',
            'email',
            'golongan_darah',
            'agama',


            'nama_instansi',
            'npsn_sekolah',
            'akreditasi_sekolah',
            'jenjang_pendidikan',
            'alamat_instansi',


            //pendidikan
            'pt_s1',
            'nama_prodi_s1',
            'nomor_ijazah_s1',
            'ipk_s1',
            'tanggal_kelulusan_s1',
            'alamat_pt_s1',
            'provinsi_pt_s1',
            'kabupaten_kota_pt_s1',
            'unggah_ijazah_s1',
            'unggah_transkrip_s1',

            'pt_s2',
            'nama_prodi_s2',
            'nomor_ijazah_s2',
            'ipk_s2',
            'tanggal_kelulusan_s2',
            'alamat_pt_s2',
            'kabupaten_kota_pt_s2',
            'provinsi_pt_s2',
            'unggah_ijazah_s2',
            'unggah_transkrip_s2',

            //keluarga
            'nama_pasangan',
            'pendidikan_pasangan',
            'pekerjaan_pasangan',
            'jumlah_anak',

            //ayah
            'nama_ayah_kandung',
            'pendidikan_ayah_kandung',
            'pekerjaan_ayah_kandung',
            'penghasilan_ayah_kandung',
            'nik_ayah_kandung',

            //ibu
            'nama_ibu_kandung',
            'pendidikan_ibu_kandung',
            'pekerjaan_ibu_kandung',
            'penghasilan_ibu_kandung',
            'nik_ibu_kandung',

            //keluarga_dekat
            'nohp_keluarga_dekat',
            'alamat_orangtua',
            'kabupaten_orangtua',
            'provinsi_orangtua',

            'nama_bank',
            'nama_pemilik',
            'nomor_rekening',
        ];
    }
}
