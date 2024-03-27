<?php
session_start();
error_reporting(0);
require './config.php';

$id = $_GET['id'];

if ($_SESSION["login"] == false) {
    header("location:login.php");
};

$query = mysqli_query($conn, "SELECT * FROM lapangan WHERE id = '$id'");
$ress = mysqli_fetch_array($query);
$harga = $ress["harga"];
$lama = $_POST["waktu"];
$sepatu = $_POST["sepatu"];
$kostum = $_POST["kostum"];

$total = ($lama * $harga) + ($lama * ($sepatu + $kostum));

if (isset($_POST["btn"])) {
    $totals = $_POST["total"];
    $uang = $_POST["uangmsk"];
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $note = $_POST["note"];
    $main = $_POST["main"];
    $tgl = $_POST["tgl"];
    $end = $_POST["end"];

    if ($totals == 0) {
        echo "
        <script>
            alert('total tidak boleh kosong')
        </script>
        ";
    } else {
        mysqli_query($conn, "INSERT INTO riwayat VALUE(NULL, '$nama', '$telp', '$id', '$note', CURRENT_TIMESTAMP, '$tgl', '$main', '$end', '$totals')");

        $kembalian = $uang - $totals;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="./css/book.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>

<body>
    <?php include './navbar.php' ?>
    <div class="container">
        <div class="form">
            <div class="formm">
                <h1>Buat jadwal main</h1>
                <p>jenis lapangan : <?= $ress[1] ?></p>
                <p>tipe lapangan : <?= $ress[2] ?></p>
                <p>harga lapangan : <?= $ress[3] ?></p>
                <p>tambahan : </p>
                <form method="post">
                    <input type="checkbox" name="sepatu" id="sepatu" value="50000">
                    <label for="sepatu">sepatu</label>
                    <input type="checkbox" name="kostum" id="kostum" value="45000">
                    <label for="kostum">kostum</label><br>
                    <label for="waktu">lama main : </label><br>
                    <input type="number" name="waktu" id="waktu" class="field" required>
                </form>
            </div>
            <form action="" class="detail" method="post">
                <div class="form1">
                    <div class="label">
                        <label for="nama">nama pemesan</label>
                    </div>
                    <input type="text" name="nama" id="nama" class="field" required>
                    <div class="label">
                        <label for="telp">telepon</label>
                    </div>
                    <input type="number" name="telp" id="telp" class="field" required>
                    <div class="label">
                        <label for="note">catatan</label>
                    </div>
                    <input type="text" name="note" id="note" class="field" required>
                    <div class="label">
                        <label for="tgl">tanggal main</label>
                    </div>
                    <input type="date" name="tgl" id="tgl" class="field" required>
                    <div class="label">
                        <label for="main">jam main</label>
                    </div>
                    <input type="time" name="main" id="main" class="field" required>
                </div>
                <div class="form2">
                    <div class="label">
                        <label for="end">jam selesai</label>
                    </div>
                    <input type="time" name="end" id="end" class="field" required>
                    <div class="label">
                        <label for="total">total</label>
                    </div>
                    <input type="number" name="total" id="total" value="<?= $total ?>" readonly required class="field">
                    <div class="label">
                        <label for="uangmsk">uang di berikan</label>
                    </div>
                    <input type="number" name="uangmsk" id="uangmsk" class="field" required>
                    <div class="label">
                        <label for="kem">kembalian</label>
                    </div>
                    <input type="number" name="kem" id="kem" readonly value="<?= $kembalian ?>" class="field">
                    <button type="submit" name="btn">buat jadwal</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>