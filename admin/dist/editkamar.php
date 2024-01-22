<?php
include "koneksi.php";
if (isset($_POST['simpan'])) { //untuk create
    $id = $_POST['id'];
    $nik = $_POST['no_kamar'];
    $nama = $_POST['type_kamar'];
    $username = $_POST['harga'];
    $status = $_POST['status'];
    $foto = $_FILES['foto']['name'];
    $ekstensi1 = array('png','jpg','jpeg');
    $x= explode('.',$foto);
    $ekstensi= strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if(in_array($ekstensi, $ekstensi1)== true){
        move_uploaded_file($file_tmp,'img/'.$foto);
    }else {
        echo "<script> alert('ekstensi tidak diperbolehkan')</script>";
    }
   
    
    if($id == '089'){
        $simpan = "insert into kamar(no_kamar,type_kamar,harga,foto,status) values ('$nik','$nama','$username','$foto','$status')";
        $q1 = mysqli_query($koneksi, $simpan);
        if ($q1) {
            $sukses = "Berhasil memasukkan data baru";
            header("location: kamar.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }else{
        $sql1 = "update kamar set no_kamar = '$nik', type_kamar = '$nama', harga = '$username', foto = '$foto', status = '$status' where id_kamar = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            header("location: kamar.php", true, 301);
            exit();
        }else {
            $error = "Gagal memasukkan data";
        }
    }
    
}else if (isset($_GET['op'])) {
    $op = $_GET['op'];
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from kamar where id_kamar = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                header("location: kamar.php", true, 301);
                exit();
            } else {
                $error = "Gagal melakukan delete data";
            }
    }
}

?>