<?php
require './config.php';
session_start();

if (isset($_POST['btn'])) {
    $user  = $_POST['user'];
    $pass = md5($_POST['pass']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION["login"] = true;
        header("location:index.php");
    } else {
        echo "
            <script>
                alert('username atau password anda salah')
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
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <h1>Login</h1>
            <div class="label">
                <label for="user">username</label>
            </div>
            <input type="text" name="user" id="user">
            <div class="label">
                <label for="pass">password</label>
            </div>
            <input type="password" name="pass" id="pass">
            <button type="submit" name="btn">submit</button>
        </form>
    </div>
</body>

</html>