<?php
include "config/database.php";
if (isset($_GET['id_pemesanan'])) {
    $id = $_GET['id_pemesanan'];
    $delete = $connection->query("DELETE FROM pemesanan WHERE id_pemesanan='$id'");
    if ($delete) {
        echo "<script>document.location.href='daftar_pemesan.php';</script>";
    } else {
        echo "
                <script>alert('Gagal'); document.location.href='daftar_pemesan.php';</script>
            ";
    }
} else {
    header('location: daftar_pemesan.php');
}
?>
