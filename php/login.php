<?php
    session_start();
    include('function.php');
    $db = new database();
    if(isset($_SESSION['login']))
    {
        header('location:../home.php');
    }
    if(isset($_POST['login'])){
        $nama_user = $_POST['nama_user'];
        $password_user = $_POST['password_user'];
        $db->login($nama_user,$password_user);
        header('location:../home.php');
    }
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prelog</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/prelog.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="logo_and_name">
                <img src="../asset/windfalls.png" alt="">
                <p>Windfals</p>
            </div>
            <div class="log_sign">
                <form action="" method="POST">
                    <div class="description">
                        <p>Seperti angin musim semi, daun dan ranting tersipu sejuk olehnya.</p>
                    </div>
                    <div class="input_nama input">
                        <input required type="text" name="nama_user" placeholder="nama">
                    </div>
                    <div class="input_password input">
                        <input required type="text" name="password_user" placeholder="password">
                    </div>
                    <div class="submit">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>