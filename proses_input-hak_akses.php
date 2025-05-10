<?php
	include "config/database.php";
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=$_POST['password'];
  $alamat=$_POST['alamat'];
	$jk=$_POST['jk'];
  $tgl=$_POST['tgl_lahir'];
  $tlp=$_POST['tlp'];
	$level=$_POST['level'];
	$connection->query("insert into user(id,nama,username,password,alamat,jk,tgl_lahir,tlp,level)
						values ('$id','$nama','$username','$password','$alamat','$jk','$tgl','$tlp','$level')");
if ($connection) {
    echo "<script>document.location.href='daftar_hak_akses.php';</script>";
  } else {
      echo "<script>document.location.href='daftar_hak_akses?alert=Gagal Memasukan Data';</script>";
  }
?>
