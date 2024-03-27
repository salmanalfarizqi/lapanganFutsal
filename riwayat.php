<?php
session_start();
require './config.php';

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "SELECT * FROM riwayat");

if (isset($_POST['btn'])) {
    $tgl = $_POST['cari'];
    $query = mysqli_query($conn, "SELECT * FROM riwayat WHERE tanggal_main = '$tgl'");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat dan jadwal</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/buat.css">
</head>

<body>
    <?php include './navbar.php' ?>
    <form action="" method="post">
        <h3>cari jadwal bedasarkan tanggal main :</h3>
        <input type="date" name="cari" id="cari" required>
        <button type="submit" name="btn">carii</button>
    </form>
    <div class="container">
        <table>
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>telpon</th>
                <th>jenis lapangan</th>
                <th>tipe lapangan</th>
                <th>catatan</th>
                <th>tanggal transaksi</th>
                <th>tanggal main</th>
                <th>jam main</th>
                <th>jam selesai</th>
                <th>total</th>
                <th>Aksi</th>
            </tr>
            <?php while ($data = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $data[0] ?></td>
                    <td><?= $data[1] ?></td>
                    <td><?= $data[2] ?></td>
                    <?php
                    $lap = mysqli_query($conn, "SELECT * FROM lapangan WHERE id = '$data[3]'");
                    $lapres = mysqli_fetch_array($lap);
                    ?>
                    <td><?= $lapres[1] ?></td>
                    <td><?= $lapres[2] ?></td>
                    <td><?= $data[4] ?></td>
                    <td><?= $data[5] ?></td>
                    <td><?= $data[6] ?></td>
                    <td><?= $data[7] ?></td>
                    <td><?= $data[8] ?></td>
                    <td><?= $data[9] ?></td>
                    <td><a href="./deleteRiw.php?id=<?= $data[0] ?>" class="delete">Delete</a></td>
                </tr>
            <?php endwhile ?>
        </table>
    </div>
</body>

</html>