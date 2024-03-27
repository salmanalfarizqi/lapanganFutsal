<?php
session_start();
require './config.php';

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

if (isset($_POST["btn"])) {
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);

    $query = mysqli_query($conn, "INSERT INTO user VALUE(null, '$user', '$pass')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('user berhasil di tambahkan')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('user gagal di tambahkan')
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
    <title>Tambah user</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/tambah.css">

</head>

<body>
    <?php include './navbar.php' ?>
    <div class="container">
        <form method="post">
            <h1>Tambah User</h1>
            <div class="label">
                <label for="jenis">username</label>
            </div>
            <input type="text" name="user" id="user" class="field" required>
            <div class="label">
                <label for="pass">password</label>
            </div>
            <input type="password" name="pass" id="pass" class="field" required>
            <button type="submit" name="btn">Tambahkan</button>
        </form>
    </div>
</body>

</html>