<?php
session_start();

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/navbar.css">
</head>

<body>
    <?php include './navbar.php' ?>
    <h1>Cara penggunaan sistem pemesanan lapangan futsal</h1>

    <h2>cara buat lapangan</h2>
    <p>1. klik tambah lapangan pada navbar</p>
    <p>2. isi kolom yang telah di sediakan</p>
    <p>3. klik tombol tambahkan</p>

    <h2>cara memesan lapangan futsal</h2>
    <p>1. klik buat jadwal pada navigasi bar</p>
    <p>2. pilih kategori lapangan sesuai keiginan pemesan</p>
    <p>3. check tambahan dan sisi berapa lama pelanggan ingin main lalu enter pada keyboard</p>
    <p>4. setelah keluar harga isikan data diri pelanggan dan tanggal bermain serta jam bermain pelanggan</p>
    <p>5. klik tombol buat jadwal</p>

    <h2>cara melihat riwayat atau jadwal main pelanggan</h2>
    <p>1. klik riwayat dan jadwal pada navigasi bar</p>
    <p>2. bila kesusahan bisa menggunakan fitur cari bedasarkan tanggal main pelanggan dengan mengisikan tanggal main dan klik cari</p>
    <p>3. lalu lihat jadwal</p>

    <h2>cara menambahkan user</h2>
    <p>1. klik tambah user pada navigasi bar</p>
    <p>2. isi kolom yang telah di tentukan</p>
    <p>3. klik tombol tambahkan</p>

    <h2>cara melihat seluruh user</h2>
    <p>1. klik tombol lihat user</p>
    <p>2. lihat user</p>
    <p>3. bila ingin menghapus user klik tombol delete</p>
    <p>4. bila ingin mengedit user klik edit lalu isi kolom yang telah di tentukan lalu klik edit user</p>

</body>

</html>