<?php

function format_rupiah($angka)
{

  $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}

function format_tanggal($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tahun
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tanggal

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
