<?php
session_start();
require './config.php';

$id = $_GET['id'];

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$ress = mysqli_fetch_array($query);


if (isset($_POST["btn"])) {
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);

    $query = mysqli_query($conn, "UPDATE USER user SET username = '$user', password = '$pass' WHERE id = '$id'");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('user berhasil di edit')
                document.location.href='lihat.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('user gagal di edit')
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
    <title>edit user</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/tambah.css">

</head>

<body>
    <?php include './navbar.php' ?>
    <div class="container">
        <form method="post">
            <h1>edit User</h1>
            <div class="label">
                <label for="jenis">username</label>
            </div>
            <input type="text" name="user" id="user" value="<?= $ress['username'] ?>" class="field" required autocomplete="off">
            <div class="label">
                <label for="pass">password</label>
            </div>
            <input type="password" name="pass" id="pass" class="field" required>
            <button type="submit" name="btn">Edit User</button>
        </form>
    </div>
</body>

</html>