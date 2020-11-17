<?php
    include('function.php');
    $db = new database();
    if(isset($_POST['kirim'])){
        $nama_user = $_POST['nama_user'];
        $username_user = $_POST['username_user'];
        $password_user = password_hash($_POST['password_user'],PASSWORD_DEFAULT);
        $db->registrasi($nama_user,$username_user,$password_user);
        echo "<script>document.location.href='login.php'</script>";
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
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="logo_and_name">
                <img src="../asset/windfalls.png" alt="">
                <p>Windfals</p>
            </div>
            <div class="log_sign">
                <form action="" method="post">
                    <div class="description">
                        <p>Rentangakan sayap, terbang dan ikuti arah angin berlabu.</p>
                    </div>
                    <div class="input_nama input">
                        <div class="username_user input">
                            <input required type="text" name="username_user" placeholder="username">
                        </div>
                        <input required type="text" name="nama_user" placeholder="nama">
                    </div>
                    <div class="input_password input">
                        <input required type="text" name="password_user" placeholder="password">
                    </div>
                    <div class="submit">
                        <button type="submit" name="kirim">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>