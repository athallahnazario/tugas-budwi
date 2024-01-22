<?php
include "koneksi.php";
if (isset($_POST['simpan'])) { //untuk create
    $id = $_POST['id'];
    $nik = $_POST['nik_tamu'];
    $nama = $_POST['nama_tamu'];
    $username = $_POST['username'];
    $password = $_POST['password'];
      
    
    if($id == '089'){
        $simpan = "insert into tamu(nik_tamu,nama_tamu,username,password) values ('$nik','$nama','$username','$password')";
        $q1 = mysqli_query($koneksi, $simpan);
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            header("location: tamu.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }else{
        $sql1 = "update tamu set nik_tamu = '$nik', nama_tamu = '$nama', username = '$username', password = '$password' where id_tamu = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            header("location: tamu.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }
    
}else if (isset($_GET['op'])) {
    $op = $_GET['op'];
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from tamu where id_tamu = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                header("location: tamu.php", true, 301);
                exit();
            } else {
                $error = "Gagal melakukan delete data";
            }
    }
}

?>