<?php
session_start();
require './config.php';

if ($_SESSION["login"] == false) {
    header("location:login.php");
}

$query = mysqli_query($conn, "SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat User</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/buat.css">
</head>

<body>
    <?php include './navbar.php' ?>
    <table>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>aksi</th>
        </tr>
        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['username'] ?></td>
                <td>
                    <a href="./edit.php?id= <?= $data['id'] ?>" class="edit">edit</a>
                    <a href="./delete.php?id= <?= $data['id'] ?>" class="delete" onclick="return confirm('apakah yakin anda ingin menghapus user ini?')">delete</a>
                </td>
            </tr>
        <?php endwhile ?>
    </table>
</body>

</html>