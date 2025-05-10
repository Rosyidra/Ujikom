<?php
	include "config/database.php";
	$id=$_POST['id_rute'];
	$tujuan=$_POST['tujuan'];
	$awal=$_POST['rute_awal'];
	$akhir=$_POST['rute_akhir'];
  $harga=$_POST['harga'];
	$connection->query("insert into rute(id_rute,tujuan,rute_awal,rute_akhir,harga)
						values ('$id','$tujuan','$awal','$akhir','$harga')");
if ($connection) {
    echo "<script>document.location.href='daftar_jadwal-admin.php';</script>";
  } else {
      echo "<script>document.location.href='daftar_jadwal-admin.php?alert=Gagal Memasukan Data';</script>";
  }
?>
