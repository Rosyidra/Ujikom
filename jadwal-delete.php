<?php
include "config/database.php";
if (isset($_GET['id_rute'])) {
    $id = $_GET['id_rute'];
    $delete = $connection->query("DELETE FROM rute WHERE id_rute='$id'");
    if ($delete) {
        echo "<script>document.location.href='daftar_jadwal-admin.php';</script>";
    } else {
        echo "
                <script>alert('Gagal'); document.location.href='daftar_jadwal-admin.php';</script>
            ";
    }
} else {
    header('location: daftar_jadwal-admin.php');
}
?>
