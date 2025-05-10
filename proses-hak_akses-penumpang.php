<?php
	include "config/database.php";
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=$_POST['password'];
    /*if ($tujuan=="Bandung"){$harga='150000'; }
	else if ($tujuan=="Jakarta"){$harga='200000'; }
	else if ($tujuan=="Bali"){$harga='250000'; }*/
  $alamat=$_POST['alamat'];
	$jk=$_POST['jk'];
  $tgl=$_POST['tgl_lahir'];
  $tlp=$_POST['tlp'];
	$level=$_POST['level'];
  /*$total=$harga*$tiket;
  $kembali=$bayar-$harga*$tiket;
	if ($nominal=="bayar"){$potongan=0.75*$biayatujuan;}
  else {$potongan=0;}
    $total= $biayatujuan+$biayapokok - $potongan;*/
	$connection->query("insert into user(id,nama,username,password,alamat,jk,tgl_lahir,tlp,level)
						values ('$id','$nama','$username','$password','$alamat','$jk','$tgl','$tlp','$level')");
if ($connection) {
    echo "<script>document.location.href='index.php';</script>";
  } else {
      echo "<script>document.location.href='input-hak_akses-penumpang.php?alert=Gagal Memasukan Data';</script>";
  }
?>
