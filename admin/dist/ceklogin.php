<?php
    include "koneksi.php";

    if (isset($_POST['login'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password' ");

        $cek=mysqli_num_rows($data);

        if($cek>0){
            $_SESSION['username']=$username;
            $_SESSION['nama_admin']=$nama_admin;
            header("location:index.php");
        }else {
            echo "login gagal";
        }
    }

?>