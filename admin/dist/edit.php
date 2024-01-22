<?php
include "koneksi.php";
if (isset($_POST['simpan'])) { //untuk create
    $id = $_POST['id'];
    $nama = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
   
   
    
    if($id == '089'){
        $simpan = "insert into admin1(nama_admin,username,password) values ('$nama','$username','$password')";
        $q1 = mysqli_query($koneksi, $simpan);
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            header("location: dataadmin.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }else{
        $sql1 = "update admin1 set nama_admin = '$nama', username = '$username', password = '$password' where id_admin = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            header("location: dataadmin.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }
    
}else if (isset($_GET['op'])) {
    $op = $_GET['op'];
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from admin1 where id_admin = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                header("location: dataadmin.php", true, 301);
                exit();
            } else {
                $error = "Gagal melakukan delete data";
            }
    }
}

?>