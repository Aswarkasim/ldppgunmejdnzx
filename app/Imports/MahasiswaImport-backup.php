<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToCollection;

class MahasiswaImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        return new Mahasiswa([
            'periode_id'  => Session::get('periode_id'),
            'bidang_studi_id'     => $collection[2],
            'npm'     => $collection[3],
            'no_ukg'  => $collection[4],
            'nuptk'   => $collection[5],
            'namalengkap'     => $collection[6],
            'tempat_lahir'    => $collection[7],
            'tanggal_lahir'   => $collection[8],
            'jenis_kelamin'   => $collection[9],
            'nik'     => $collection[10],
            'unggah_kk'   => $collection[11],
            'unggah_ktp'  => $collection[12],
            'alamat_domisili'     => $collection[],
            'provinsi_tempat_tinggal'     => $collection[13],
            'kabupaten_tempat_tinggal'    => $collection[14],
            'kecamatan_tempat_tinggal'    => $collection[15],
            'kelurahan_tempat_tinggal'    => $collection[16],
            'kode_pos'    => $collection[17],
            'nohp'    => $collection[18],
            'email'   => $collection[19],
            'golongan_darah'  => $collection[20],
            'agama'   => $collection[21],


            'nama_instansi'   => $collection[22],
            'npsn_sekolah'    => $collection[23],
            'jenjang_pendidikan'  => $collection[24],
            'alamat_instansi'     => $collection[25],


            //pendidikan
            'pt_s1'   => $collection[26],
            'nama_prodi_s1'   => $collection[27],
            'nomor_ijazah_s1'     => $collection[28],
            'ipk_s1'  => $collection[29],
            'tanggal_kelulusan_s1'    => $collection[30],
            'alamat_pt_s1'    => $collection[31],
            'provinsi_pt_s1'  => $collection[32],
            'kabupaten_kota_pt_s1'    => $collection[33],
            'unggah_ijazah_s1'    => $collection[34],
            'unggah_transkrip_s1'     => $collection[35],

            'pt_s2'   => $collection[36],
            'nama_prodi_s2'   => $collection[37],
            'nomor_ijazah_s2'     => $collection[38],
            'ipk_s2'  => $collection[39],
            'tanggal_kelulusan_s2'    => $collection[40],
            'alamat_pt_s2'    => $collection[41],
            'kabupaten_kota_pt_s2'    => $collection[42],
            'provinsi_pt_s2'  => $collection[43],
            'unggah_ijazah_s2'    => $collection[44],
            'unggah_transkrip_s2'     => $collection[45],

            //keluarga
            'nama_pasangan'   => $collection[46],
            'pendidikan_pasangan'     => $collection[47],
            'pekerjaan_pasangan'  => $collection[48],
            'jumlah_anak'     => $collection[49],

            //ayah
            'nama_ayah_kandung'   => $collection[50],
            'pendidikan_ayah_kandung'     => $collection[51],
            'pekerjaan_ayah_kandung'  => $collection[52],
            'penghasilan_ayah_kandung'    => $collection[53],
            'nik_ayah_kandung'    => $collection[54],

            //ibu
            'nama_ibu_kandung'    => $collection[55],
            'pendidikan_ibu_kandung'  => $collection[56],
            'pekerjaan_ibu_kandung'   => $collection[57],
            'penghasilan_ibu_kandung'     => $collection[58],
            'nik_ibu_kandung'     => $collection[59],

            //keluarga_dekat
            'nohp_keluarga_dekat'     => $collection[60],
            'alamat_orangtua'     => $collection[61],
            'kabupaten_orangtua'  => $collection[62],
            'provinsi_orangtua'   => $collection[63],
        ]);
    }
}
