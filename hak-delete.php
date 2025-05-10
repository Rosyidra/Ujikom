<?php
include "config/database.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $connection->query("DELETE FROM user WHERE id='$id'");
    if ($delete) {
        echo "<script>document.location.href='daftar_hak_akses.php';</script>";
    } else {
        echo "
                <script>alert('Gagal'); document.location.href='daftar_hak_akses.php';</script>
            ";
    }
} else {
    header('location: daftar_hak_akses.php');
}
?>
