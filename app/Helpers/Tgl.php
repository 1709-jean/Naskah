<?php
function tgl_lf($tgl, $tampil_hari = true)
{
  $nama_hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $nama_bulan = array(
    1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agts",
    "Sep", "Okt", "Nov", "Des"
  );
  $tahun = substr($tgl, 0, 4);
  $bulan = $nama_bulan[(int)substr($tgl, 5, 2)];
  $tanggal = substr($tgl, 8, 2);
  $text = "";
  if ($tampil_hari) {
    $urutan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
    $hari = $nama_hari[$urutan_hari];
    $text .= $hari . ", ";
  }
  $text .= $tanggal . " " . $bulan . " " . $tahun;
  return $text;
}
