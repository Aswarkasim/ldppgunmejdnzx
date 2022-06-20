<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            //
            'periode_id'  => $row[1],
            'bidang_studi_id'     => $row[2],
            'npm'     => $row[3],
            'no_ukg'  => $row[4],
            'nuptk'   => $row[5],
            'namalengkap'     => $row[6],
            'tempat_lahir'    => $row[7],
            'tanggal_lahir'   => $row[8],
            'jenis_kelamin'   => $row[9],
            'nik'     => $row[10],
            'unggah_kk'   => $row[11],
            'unggah_ktp'  => $row[12],
            'alamat_domisili'     => $row[],
            'provinsi_tempat_tinggal'     => $row[13],
            'kabupaten_tempat_tinggal'    => $row[14],
            'kecamatan_tempat_tinggal'    => $row[15],
            'kelurahan_tempat_tinggal'    => $row[16],
            'kode_pos'    => $row[17],
            'nohp'    => $row[18],
            'email'   => $row[19],
            'golongan_darah'  => $row[20],
            'agama'   => $row[21],


            'nama_instansi'   => $row[22],
            'npsn_sekolah'    => $row[23],
            'jenjang_pendidikan'  => $row[24],
            'alamat_instansi'     => $row[25],


            //pendidikan
            'pt_s1'   => $row[26],
            'nama_prodi_s1'   => $row[27],
            'nomor_ijazah_s1'     => $row[28],
            'ipk_s1'  => $row[29],
            'tanggal_kelulusan_s1'    => $row[30],
            'alamat_pt_s1'    => $row[31],
            'provinsi_pt_s1'  => $row[32],
            'kabupaten_kota_pt_s1'    => $row[33],
            'unggah_ijazah_s1'    => $row[34],
            'unggah_transkrip_s1'     => $row[35],

            'pt_s2'   => $row[36],
            'nama_prodi_s2'   => $row[37],
            'nomor_ijazah_s2'     => $row[38],
            'ipk_s2'  => $row[39],
            'tanggal_kelulusan_s2'    => $row[40],
            'alamat_pt_s2'    => $row[41],
            'kabupaten_kota_pt_s2'    => $row[42],
            'provinsi_pt_s2'  => $row[43],
            'unggah_ijazah_s2'    => $row[44],
            'unggah_transkrip_s2'     => $row[45],

            //keluarga
            'nama_pasangan'   => $row[46],
            'pendidikan_pasangan'     => $row[47],
            'pekerjaan_pasangan'  => $row[48],
            'jumlah_anak'     => $row[49],

            //ayah
            'nama_ayah_kandung'   => $row[50],
            'pendidikan_ayah_kandung'     => $row[51],
            'pekerjaan_ayah_kandung'  => $row[52],
            'penghasilan_ayah_kandung'    => $row[53],
            'nik_ayah_kandung'    => $row[54],

            //ibu
            'nama_ibu_kandung'    => $row[55],
            'pendidikan_ibu_kandung'  => $row[56],
            'pekerjaan_ibu_kandung'   => $row[57],
            'penghasilan_ibu_kandung'     => $row[58],
            'nik_ibu_kandung'     => $row[59],

            //keluarga_dekat
            'nohp_keluarga_dekat'     => $row[60],
            'alamat_orangtua'     => $row[61],
            'kabupaten_orangtua'  => $row[62],
            'provinsi_orangtua'   => $row[63],
        ]);
    }
}
