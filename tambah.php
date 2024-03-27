<?php
session_start();
require './config.php';

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

if (isset($_POST["btn"])) {
    $jenis = $_POST["jenis"];
    $tipe = $_POST["tipe"];
    $harga = $_POST["harga"];

    $query = mysqli_query($conn, "INSERT INTO lapangan VALUE(null, '$jenis', '$tipe', '$harga')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('data berhasil di tambahkan')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berhasil di tambahkan')
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah lapangan</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/tambah.css">

</head>

<body>
    <?php include './navbar.php' ?>
    <div class="container">
        <form method="post">
            <h1>Tambah Lapangan</h1>
            <div class="label">
                <label for="jenis">jenis lapangan</label>
            </div>
            <input type="text" name="jenis" id="jenis" class="field" required>
            <div class="label">
                <label for="tipe">tipe lapangan</label>
            </div>
            <div class="radiogrup">
                <label for="outdoor">outdoor</label>
                <input type="radio" name="tipe" id="outdoor" value="outdoor" class="radio" required>
                <label for="indoor">indoor</label>
                <input type="radio" name="tipe" id="indoor" value="indoor" class="radio" required>
            </div>
            <div class="label">
                <label for="harga">harga</label>
            </div>
            <input type="number" name="harga" id="harga" class="field" required>
            <button type="submit" name="btn">Tambahkan</button>
        </form>
    </div>
</body>

</html>