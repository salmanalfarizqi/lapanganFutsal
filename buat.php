<?php
session_start();
require './config.php';

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "SELECT * FROM lapangan");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat jadwal</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/buat.css">
</head>

<body>
    <?php include './navbar.php' ?>
    <table>
        <tr>
            <th>id</th>
            <th>jenis lapangan</th>
            <th>tipe lapangan</th>
            <th>harga lapangan</th>
            <th>pesan</th>
        </tr>
        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['jenis'] ?></td>
                <td><?= $data['tipe'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><a href="./book.php?id= <?= $data['id'] ?>" class="book">Booking</a></td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>