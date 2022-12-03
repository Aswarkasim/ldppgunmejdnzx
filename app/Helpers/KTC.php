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


function format_indo($date)
{
  date_default_timezone_set('Asia/Jakarta');
  // array hari dan bulan
  $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

  // pemisahan tahun, bulan, hari, dan waktu
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl = substr($date, 8, 2);
  $waktu = substr($date, 11, 5);
  $hari = date("w", strtotime($date));
  $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

  return $result;
}

function currency_multiple_5($in)
{
  // $number = number_format(round(12345.6789), 2);
  $number = round(($in * 2) / 1000) * 500;
  return $number;
}
