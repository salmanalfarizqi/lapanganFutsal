<?php
session_start();
require './config.php';

$id = $_GET['id'];

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");

if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('user berhasil di hapus')
            document.location.href='lihat.php'
        </script>
    ";
} else {
    echo "
        <script>
            alert('user gagal di hapus')
            document.location.href='lihat.php'
        </script>
    ";
}
