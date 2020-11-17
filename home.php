<?php 
    session_start();
    if(! isset($_SESSION['login'])){
        header('location:index.php');
    }
    // var_dump($_SESSION);
    include('php/function.php');
    $db = new database();
    $post = $db->tampil_post();
    if(isset($_POST['kirim']))
    {
    $nama_user = $_SESSION['nama_user'];
    $username_user = $_SESSION['username_user'];
    $status_user = $_POST['status_upload'];
    $temp = $_FILES['foto_upload']['tmp_name'];
    $name = rand(0,9999).$_FILES['foto_upload']['name'];
    $size = $_FILES['foto_upload']['size'];
    $type = $_FILES['foto_upload']['type'];
    $folder = "asset/";
    if(empty($temp)){
        $db->tambah_postingan_status($nama_user,$username_user,$status_user);
        echo "<script>document.location.href ='home.php';</script>";
    }
    else{
    if($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png')){
        $temp = $_FILES['foto_upload']['tmp_name'];
        $folder = "asset/";
        $name = rand(0,9999).$_FILES['foto_upload']['name'];
        move_uploaded_file($temp,$folder . $name);
        $db->tambah_postingan($nama_user,$username_user,$status_user,$name,$type,$size);
        echo "<script>document.location.href ='home.php';</script>";
    } 
    else if($size > 5048000 || ($type !=='image/jpeg' or $type !== 'image/png')){
        echo "<script>alert('Ukuran foto terlalu besar atau format foto salah');</script>";
    }
};
    };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="user_avatar float-left">
                <div class="user-content">
                    <div class="on"></div>
                    <img src="asset/windfalls.png" alt="">
                    <span><?= $_SESSION['username_user'] ?></span>
                </div>
            </div>
            <!-- <div class="setup"> -->
            <div class="navigation float-left">
                <a href=""><i class="fas fa-wind"></i></a>
                <a href=""><i class="fas fa-user-plus"></i></a>
                <a href=""><i class="fas fa-user-ninja"></i></a>
                <a href=""><i class="fas fa-bell"></i></a>
                <a href=""><i class="fas fa-history"></i></a>
                <a href="php/log_out.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
            <!-- </div> -->
            <div class="dark_mode float-left ">
                <div class="light"></div>
            </div>
        </div>
    </header>
    <div class="clearBoth"></div>
    <section class="banner">
        <div class="suggest">
            <!-- suggest -->
            <div class="saran-teman">

            </div>
        </div>
        <div class="beranda">
            <div class="posting">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="status">
                        <textarea name="status_upload" id=" " cols="30" rows="10" placeholder="Apa yang sedang kamu pikirkan ? "></textarea>
                    </div>
                    <div class="file">
                        <label class="myLabel">
                            <input type="file" name="foto_upload"/>
                            <span><i class="fas fa-image"></i></span>
                        </label>
                        <button type="submit" name="kirim">Kirimkan</button>
                    </div>
                </form>
            </div>

            <?php foreach($post as $ps){?>
            <div class="tampil_post">
                <div class="user_post">
                    <img src="asset/windfalls.png" alt="">
                    <span><?= $ps['username_user'] ?></span>
                </div>
                <div class="post_status">
                        <p><?= $ps['status_user'] ?></p>
                    </div>
                    <?php if($ps['gambar_postingan'] != NULL) { ?>
                    <div class="status_picture">
                        <img src="asset/<?php echo $ps['gambar_postingan'] ?>" alt="">
                    </div>
                    <?php } ?>
                    <div class="comment">
                        <i class="fas fa-heart"></i>
                        <i class="fas fa-comment-alt"></i>
                        <i class="fas fa-share-alt"></i>
                    </div>
                </div>
                <?php }?>
        </div>
        <div class="notif ">
            <!-- notif -->
            <div class="notif_postingan">

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>

</html>