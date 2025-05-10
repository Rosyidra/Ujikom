<?php
include "config/database.php";
$id=$_POST['id_rute'];
$tujuan=$_POST['tujuan'];
$awal=$_POST['rute_awal'];
$akhir=$_POST['rute_akhir'];
$harga=$_POST['harga'];

$edit=$connection->query("update rute set tujuan='$tujuan', rute_awal='$awal', rute_akhir='$akhir', harga='$harga' where id_rute='$id'");
if ($edit);
{echo
"
<script>document.location.href='daftar_jadwal-admin.php';</script>";}
?>
