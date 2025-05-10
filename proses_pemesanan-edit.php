<?php
include "config/database.php";
$id=$_POST['id_pemesanan'];
$kode=$_POST['kode_pemesanan'];
$tglp=$_POST['tanggal_pemesanan'];
$tempat=$_POST['tempat_pemesanan'];
$tujuan=$_POST['tujuan'];
$tglb=$_POST['tanggal_berangkat'];
$cekin=$_POST['jam_cekin'];
$cekot=$_POST['jam_berangkat'];
$total=$_POST['total_bayar'];
$valid=$_POST['valid'];

$edit=$connection->query("update pemesanan set kode_pemesanan='$kode', tanggal_pemesanan='$tglp', tempat_pemesanan='$tempat', tujuan='$tujuan',
                    tanggal_berangkat='$tglb', jam_cekin='$cekin', jam_berangkat='$cekot', total_bayar='$total', valid='$valid'  where id_pemesanan='$id'");
if ($edit);
{echo
"
<script>document.location.href='daftar_pemesan.php';</script>";}
?>
