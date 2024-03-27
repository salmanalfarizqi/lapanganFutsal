<?php
session_start();
require './config.php';

$id = $_GET['id'];

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "DELETE FROM riwayat WHERE id = '$id'");

if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('riwayat berhasil di hapus')
            document.location.href='riwayat.php'
        </script>
    ";
} else {
    echo "
        <script>
            alert('riwayat gagal di hapus')
            document.location.href='riwayat.php'
        </script>
    ";
}
