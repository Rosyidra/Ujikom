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



$edit=$connection->query("update user set nama='$nama', username='$username', password='$password', alamat='$alamat',jk='$jk',tgl_lahir='$tgl'
                  ,tlp='$tlp',level='$level' where id='$id'");
if ($edit);
{echo
"
<script>document.location.href='daftar_hak_akses.php';</script>";}
?>
