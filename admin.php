<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "web_hotel";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("tidak bisa terkoneksi ke database");
}
$nik = "";
$nama = "";
$username = "";
$password = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if ($op == 'delete') {
  $id = $_GET['id_admin'];
  $sql1 = "delete from admin where id_admin = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil hapus data";
  } else {
    $error = "Gagal melakukan delete data";
  }
}

if ($op == 'edit') {
  $id = $_GET['id_admin'];
  $sql1 = "select * from admin where id_admin = '$id'";
  $q1 = mysqli_query($koneksi, $sql1);
  $r1 = mysqli_fetch_array($q1);
  $nik = $r1['nik_admin'];
  $nama = $r1['nama_admin'];
  $username = $r1['username'];
  $password = $r1['password'];

  if ($nik == '') {
    $error = "Data tidak ditemukan";
  }
}
if (isset($_POST['simpan'])) { //untuk create
  $nik = $_POST['nik_admin'];
  $nama = $_POST['nama_admin'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($nik && $nama && $username && $password) {
    if ($op == 'edit') { //untuk update
      $sql1 = "update mahasiswa set nik_admin = '$nik', nama_admin = '$nama', username = '$username', password = '$password' where id = '$id'";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Data berhasil diupdate";
      } else {
        $error = "Data gagal diupdate";
      }
    } else { //untuk insert
      $sql1 = "insert into admin(nik_admin,nama_admin,username,password) values ('$nik','$nama','$username','$password')";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil memasukkan data baru";
      } else {
        $error = "Gagal memasukkan data";
      }
    }
  } else {
    $error = "Silahkan masukkan semua data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    .mx-auto {
      width: 800px;
    }

    .card {
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="mx-auto">
    <!----untuk memasukan data---->
    <div class="card">
      <div class="card-header">
        Create / edit data
      </div>
      <div class="card-body">
        <?php
        if ($error) {
          ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
          <?php
          header("refresh:3;url=index.php"); //5 : detik
        }
        ?>
        <?php
        if ($sukses) {
          ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
          <?php
          header("refresh:3;url=index.php"); //5 : detik
        }
        ?>
        <form action="" method="POST">
          <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Nik</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $username ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $password ?>">
            </div>
          </div>
            <div class="col-12">
              <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary">
            </div>
          </form>
          <!--untuk mengeluarkan data-->

        </div>
      </div>
      <div class="card">
        <div class="card-header text-white bg-secondary">
          data mahasiswa
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIk</th>
                <th scope="col">Nama</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">Aksi</th>
              </tr>
            <tbody>
              <?php
              include 'koneksi.php';
                $sql2 = "select * from admin order by id_desc";
                $q2 = mysqli_query($koneksi, $sql2);
                $urut = 1;
                
                  
                while($r2=mysqli_fetch_array($q2)){
                  $id = $r2['id_admin'];
                  $nik = $r2['nik_admin'];
                  $nama = $r2['nama_admin'];
                  $alamat = $r2['username'];
                  $fakultas = $r2['password'];

                  ?>
              <tr>
                <th scope="row">
                  <?php echo $urut++ ?>
                </th>
                <td scope="row">
                  <?php echo $nik ?>
                </td>
                <td scope="row">
                  <?php echo $nama ?>
                </td>
                <td scope="row">
                  <?php echo $username ?>
                </td>
                <td scope="row">
                  <?php echo $password ?>
                </td>
                <td scope="row">
                  <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button"
                      class="btn btn-warning">Edit</button></a>
                  <a href="index.php?op=delete&id=<?php echo $id ?>"> <button type="button" class="btn btn-danger"
                      onclick="return confirm('Yakin ingin delete data?')">Delete</button></a>
                </td>
              </tr>
              <?php
                }
              
                ?>
          </tbody>
          </thead>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>
</body>

</html>