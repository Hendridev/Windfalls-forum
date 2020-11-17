<?php 
    class database{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "sosial_media";
        var $koneksi = "";

        function __construct()
        {
            $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
            if(mysqli_connect_error()){
                echo "koneksi gagal". mysqli_connect_error();
            }
        }
        function registrasi($nama_user,$username_user,$password_user){
            $data = mysqli_num_rows(mysqli_query($this->koneksi,"SELECT * FROM user_manage WHERE username_user='$username_user'"));
            if($data > 0){
                echo"<script>
                alert('Username sudah ada');
                </script>";
            }
            else{
            $insert = mysqli_query($this->koneksi,"INSERT INTO user_manage VALUES('','$nama_user','$username_user','$password_user',CURRENT_TIME())");
            return $insert;
            }
        }
        function login($nama_user,$password_user){
            $query = mysqli_query($this->koneksi,"SELECT * FROM user_manage WHERE nama_user='$nama_user'");
            $data_user = $query->fetch_array();
            if(password_verify($password_user,$data_user['password_user'])){
                $_SESSION['nama_user'] = $data_user['nama_user'];
                $_SESSION['username_user'] = $data_user['username_user'];
                $_SESSION['login'] = TRUE;
                return TRUE;
            }
        }

        function tambah_postingan($nama_user,$username_user,$status_user,$gambar_postingan,$type,$size){
            mysqli_query($this->koneksi, "INSERT INTO postingan_user VALUES('','$nama_user','$username_user','$status_user','$gambar_postingan','$type','$size')");
        }
        function tambah_postingan_status($nama_user,$username_user,$status_user){
            mysqli_query($this->koneksi, "INSERT INTO postingan_user VALUES('','$nama_user','$username_user','$status_user','','','')");
        }

        function tampil_post(){
            $query = mysqli_query($this->koneksi,"SELECT * FROM postingan_user ORDER BY id_postingan DESC ");
            while($row = mysqli_fetch_array($query)){
                $hasil[] = $row;
            }
            return $hasil;
        }
    };
?>
