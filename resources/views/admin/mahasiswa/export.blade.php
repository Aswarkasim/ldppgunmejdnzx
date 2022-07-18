<table>
  <thead>
    <tr>
            <td>periode_id</td>
            <td>bidang_studi_id</td>
            <td>npm</td>
            <td>no_ukg</td>
            <td>nuptk</td>
            <td>kementerian</td>;


            <td>namalengkap</td>
            <td>tempat_lahir</td>
            <td>tanggal_lahir</td>
            <td>jenis_kelamin</td>;
            <td>nik</td>
            <td>pasfoto</td>
            <td>unggah_kk</td>
            <td>unggah_ktp</td>
            <td>alamat_domisili</td>
            <td>provinsi_tempat_tinggal</td>
            <td>kabupaten_tempat_tinggal</td>
            <td>kecamatan_tempat_tinggal</td>
            <td>kelurahan_tempat_tinggal</td>
            <td>rt_tempat_tinggal</td>
            <td>rw_tempat_tinggal</td>
            <td>kode_pos</td>
            <td>nohp</td>
            <td>email</td>
            <td>golongan_darah</td>
            <td>agama</td>


            <td>nama_instansi</td>
            <td>npsn_sekolah</td>
            <td>akreditasi_sekolah</td>
            <td>jenjang_pendidikan</td>
            <td>alamat_instansi</td>


            <td>pt_s1</td>
            <td>nama_prodi_s1</td>
            <td>nomor_ijazah_s1</td>
            <td>ipk_s1</td>
            <td>tanggal_kelulusan_s1</td>
            <td>alamat_pt_s1</td>
            <td>provinsi_pt_s1</td>
            <td>kabupaten_kota_pt_s1</td>
            <td>unggah_ijazah_s1</td>
            <td>unggah_transkrip_s1</td>

            <td>pt_s2</td>
            <td>nama_prodi_s2</td>
            <td>nomor_ijazah_s2</td>
            <td>ipk_s2</td>
            <td>tanggal_kelulusan_s2</td>
            <td>alamat_pt_s2</td>
            <td>kabupaten_kota_pt_s2</td>
            <td>provinsi_pt_s2</td>
            <td>unggah_ijazah_s2</td>
            <td>unggah_transkrip_s2</td>

            <td>nama_pasangan</td>
            <td>pendidikan_pasangan</td>
            <td>pekerjaan_pasangan</td>
            <td>jumlah_anak</td>

            <td>nama_ayah_kandung</td>
            <td>pendidikan_ayah_kandung</td>
            <td>pekerjaan_ayah_kandung</td>
            <td>penghasilan_ayah_kandung</td>
            <td>nik_ayah_kandung</td>

            <td>nama_ibu_kandung</td>
            <td>pendidikan_ibu_kandung</td>
            <td>pekerjaan_ibu_kandung</td>
            <td>penghasilan_ibu_kandung</td>
            <td>nik_ibu_kandung</td>

            <td>nohp_keluarga_dekat</td>
            <td>alamat_orangtua</td>
            <td>kabupaten_orangtua</td>
            <td>provinsi_orangtua</td>

            <td>nama_bank</td>
            <td>nama_pemilik</td>
            <td>nomor_rekening</td>
    </tr>
  </thead>

  <tbody>
    @foreach ($mahasiswa as $item)
    <tr>
            <td>{{$item->periode_id}}</td>
            <td>{{$item->bidang_studi_id}}</td>
            <td>{{$item->npm}}</td>
            <td>{{$item->no_ukg}}</td>
            <td>{{$item->nuptk}}</td>
            <td>{{$item->kementerian}}</td>;


            <td>{{$item->namalengkap}}</td>
            <td>{{$item->tempat_lahir}}</td>
            <td>{{$item->tanggal_lahir}}</td>
            <td>{{$item->jenis_kelamin}}</td>;
            <td>{{$item->nik}}</td>
            <td>{{$item->pasfoto}}</td>
            <td>{{$item->unggah_kk}}</td>
            <td>{{$item->unggah_ktp}}</td>
            <td>{{$item->alamat_domisili}}</td>
            <td>{{$item->provinsi_tempat_tinggal_name}}</td>
            <td>{{$item->kabupaten_tempat_tinggal_name}}</td>
            <td>{{$item->kecamatan_tempat_tinggal}}</td>
            <td>{{$item->kelurahan_tempat_tinggal}}</td>
            <td>{{$item->rt_tempat_tinggal}}</td>
            <td>{{$item->rw_tempat_tinggal}}</td>
            <td>{{$item->kode_pos}}</td>
            <td>{{$item->nohp}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->golongan_darah}}</td>
            <td>{{$item->agama}}</td>


            <td>{{$item->nama_instansi}}</td>
            <td>{{$item->npsn_sekolah}}</td>
            <td>{{$item->akreditasi_sekolah}}</td>
            <td>{{$item->jenjang_pendidikan}}</td>
            <td>{{$item->alamat_instansi}}</td>


            <td>{{$item->pt_s1}}</td>
            <td>{{$item->nama_prodi_s1}}</td>
            <td>{{$item->nomor_ijazah_s1}}</td>
            <td>{{$item->ipk_s1}}</td>
            <td>{{$item->tanggal_kelulusan_s1}}</td>
            <td>{{$item->alamat_pt_s1}}</td>
            <td>{{$item->provinsi_pt_s1_name}}</td>
            <td>{{$item->kabupaten_kota_pt_s1_name}}</td>
            <td>{{$item->unggah_ijazah_s1}}</td>
            <td>{{$item->unggah_transkrip_s1}}</td>

            <td>{{$item->pt_s2}}</td>
            <td>{{$item->nama_prodi_s2}}</td>
            <td>{{$item->nomor_ijazah_s2}}</td>
            <td>{{$item->ipk_s2}}</td>
            <td>{{$item->tanggal_kelulusan_s2}}</td>
            <td>{{$item->alamat_pt_s2}}</td>
            <td>{{$item->kabupaten_kota_pt_s2_name}}</td>
            <td>{{$item->provinsi_pt_s2_name}}</td>
            <td>{{$item->unggah_ijazah_s2}}</td>
            <td>{{$item->unggah_transkrip_s2}}</td>

            <td>{{$item->nama_pasangan}}</td>
            <td>{{$item->pendidikan_pasangan}}</td>
            <td>{{$item->pekerjaan_pasangan}}</td>
            <td>{{$item->jumlah_anak}}</td>

            <td>{{$item->nama_ayah_kandung}}</td>
            <td>{{$item->pendidikan_ayah_kandung}}</td>
            <td>{{$item->pekerjaan_ayah_kandung}}</td>
            <td>{{$item->penghasilan_ayah_kandung}}</td>
            <td>{{$item->nik_ayah_kandung}}</td>

            <td>{{$item->nama_ibu_kandung}}</td>
            <td>{{$item->pendidikan_ibu_kandung}}</td>
            <td>{{$item->pekerjaan_ibu_kandung}}</td>
            <td>{{$item->penghasilan_ibu_kandung}}</td>
            <td>{{$item->nik_ibu_kandung}}</td>

            <td>{{$item->nohp_keluarga_dekat}}</td>
            <td>{{$item->alamat_orangtua}}</td>
            <td>{{$item->kabupaten_orangtua_name}}</td>
            <td>{{$item->provinsi_orangtua_name}}</td>

            <td>{{$item->nama_bank}}</td>
            <td>{{$item->nama_pemilik}}</td>
            <td>{{$item->nomor_rekening}}</td>
    </tr>
    @endforeach
  </tbody>
</table>