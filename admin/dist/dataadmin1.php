<?php
    include "koneksi.php";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
      
    if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from admin where id_admin = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        } else {
            $error = "Gagal melakukan delete data";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">first royal hotel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        general data
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="dataadmin.php">data admin</a>
                                            <a class="nav-link" href="tamu.php">data user</a>
                                            <a class="nav-link" href="kamar.php">data kamar</a>
                                            <a class="nav-link" href="transaksi.php">data transaksi</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <?php
                            if ($op == 'edit') { 
                                $id = $_GET['id'];
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
                        ?>
                        
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label for="nim" class="col-sm-2 col-form-label">Nik</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                                            <input type="text" class="form-control" id="nik" name="nik_admin" value="<?php echo $nik ?>" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama_admin" value="<?php echo $nama ?>" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">username</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">password</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $password ?>" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">foto</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $foto ?>" />
                                            </div>
                                        </div>
                                            <div class="col-12">
                                            <input type="submit" name="ubah" value="Simpan data" class="btn btn-primary">
                                            </div>
                                    </form>
                        <?php
                            }else {
                        ?>
                                    <form action="" method="POST">
                                        <div class="mb-3 row">
                                            <label for="nim" class="col-sm-2 col-form-label">Nik</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nik" name="nik_admin" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama_admin" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">username</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">password</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="password" name="password" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">foto</label>
                                            <div class="col-sm-10">
                                            <input type="file" class="form-control" id="foto" name="foto" />
                                            </div>
                                        </div>
                                            <div class="col-12">
                                            <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary">
                                            </div>
                                    </form>
                        <?php
                            }

                        ?>
                        <br>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>foto</th>
                                            <th>Aksi</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        include 'koneksi.php';
                                            $sql2 = "select * from admin";
                                            $q2 = mysqli_query($koneksi, $sql2);
                                            $urut = 1;
                                            while ($admin=mysqli_fetch_array($q2)) { 
                                                $id = $admin['id_admin']; ?>
                                        <TR>
                                            <td><?=$urut;$urut++?></td>
                                            <td><?=$admin['nik_admin']?></td>
                                            <td><?=$admin['nama_admin']?></td>
                                            <td><?=$admin['username']?></td>
                                            <td><?=$admin['password']?></td>
                                            <td><?=$admin['foto']?></td>
                                            <td scope="row">
                                                <a href="dataadmin.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                                    class="btn btn-warning">Edit</button></a>
                                                <a href="index.php?op=delete&id=<?php echo $id ?>"> <button type="button" class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin delete data?')">Delete</button></a>
                                            </td>
                                        </TR>
                                        
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>



<?php
if (isset($_POST['simpan'])) { //untuk create
    $foto = $_FILES['foto']['name'];
    $ekstensi = array('png','jpg','jpeg');
    $x= explode('.',$foto);
    $ekstensi1= strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if(in_array($ekstensi, $ekstensi1)== true){
        move_uploaded_file($file_tmp,'img/'.$foto);
    }else {
        echo "<script> alert('ekstensi tidak diperbolehkan')</script>";
    }
    $nik = $_POST['nik_admin'];
    $nama = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $foto = $_POST['foto'];
    $sql1 = "insert into admin(nik_admin,nama_admin,username,password,foto) values ('$nik','$nama','$username','$password','$foto')";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Berhasil memasukkan data baru";
      }else {
        $error = "Gagal memasukkan data";
      }

      
}else if (isset($_POST['ubah'])){
    $foto = $_FILES ['foto']['name'];
    $ekstensil = array('png','jpg','jpeg');
    $x= explode('.',$foto);
    $ekstensi= strtolower[end($x)];
    $file_tmp = $_FILES['foto']['tmp_name'];
    if(in_array($ekstensi, $ekstensil)== true){
        move_uploaded_file($file_tmp,'img/'.$foto);
    }else {
        echo "<script> alert('ekstensi tidak diperbolehkan')</script>";
    }
    $id = $_POST['id'];
    $nik = $_POST['nik_admin'];
    $nama = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $foto = $_POST['foto'];
    $sql1 = "update admin set nik_admin = '$nik', nama_admin = '$nama', username = '$username', password = '$password' foto = '$foto' where id_admin = '$id'";
      $q1 = mysqli_query($koneksi, $sql1);
      if ($q1) {
        header(location:"dataadmin.php");
      }else {
        $error = "Gagal memasukkan data";
      }
}
?>