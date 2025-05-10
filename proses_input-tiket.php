<?php
	include "config/database.php";
	$id=$_POST['id_pemesanan'];
	$kode=$_POST['kode_pemesanan'];
	$tgl_pemesanan=$_POST['tanggal_pemesanan'];
	$tempat=$_POST['tempat_pemesanan'];
  $tujuan=$_POST['tujuan'];
	$tgl_berangkat=$_POST['tanggal_berangkat'];
	$in=$_POST['jam_cekin'];
	$out=$_POST['jam_berangkat'];
	$total=$_POST['total_bayar'];
	$valid=$_POST['valid'];
	$connection->query("insert into pemesanan(id_pemesanan,kode_pemesanan,tanggal_pemesanan,tempat_pemesanan,tujuan,tanggal_berangkat,jam_cekin
										,jam_berangkat,total_bayar,valid)
						values ('$id','$kode','$tgl_pemesanan','$tempat','$tujuan','$tgl_berangkat','$in','$out','$total','$valid')");
if ($connection) {
    echo "<script>document.location.href='halaman_penumpang.php';</script>";
  } else {
      echo "<script>document.location.href='daftar_jadwal-penumpang.php?alert=Gagal Memasukan Data';</script>";
  }
?>
2
