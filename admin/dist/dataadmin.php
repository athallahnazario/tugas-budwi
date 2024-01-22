<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$mysql_adm=mysqli_query($koneksi, "select * from admin1 where username='$_SESSION[username]'");
$data_adm=mysqli_fetch_array($mysql_adm);

if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $query = "SELECT * FROM admin1 WHERE id_admin='$_GET[id]'";
        $edit = mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_array($edit)){
            $nama_admin = $data['nama_admin'];
        }
    }
}

    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
        $nama ="";
        $username = "";
        $password = "";
        
    }
      
    

    if ($op == 'edit') { 
        $id = $_GET['id'];
        $sql1 = "select * from admin1 where id_admin = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        
        $nama = $r1['nama_admin'];
        $username = $r1['username'];
        $password = $r1['password'];
        
        
            if ($id == '') {
                $error = "Data tidak ditemukan";
            }
    }else{
        $id= '';
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
            <a class="navbar-brand ps-3" href="index.html">First Royale Hotel</a>
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
                            
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dataadmin.php">data admin</a>
                                    <a class="nav-link" href="tamu.php">data tamu</a>
                                    <a class="nav-link" href="kamar.php">data kamar</a>
                                    <a class="nav-link" href="transaksi.php">data transaksi</a>
                                </nav>
                            
                        </div>
                            
                           
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
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
                                   
                                </nav>
                            </div>
                            
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Admin</li>
                        </ol>
                        
        
                                    <form action="edit.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                            <label for="nim" class="col-sm-2 col-form-label">id</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="id" value="<?php echo $id?>" />
                                            <input type="text" class="form-control" id="id" name="id_admin" value="<?php echo $id ?>" />
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
                                        
                                            <div class="col-12">
                                            <input type="submit" name="simpan" value="Simpan data" class="btn btn-primary">
                                            </div>
                                    </form>
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
                                        
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        include 'koneksi.php';
                                            $sql2 = "select * from admin1";
                                            $q2 = mysqli_query($koneksi, $sql2);
                                            $urut = 1;
                                            while ($admin=mysqli_fetch_array($q2)) { 
                                                $id = $admin['id_admin']; ?>
                                        <TR>
                                            <td><?=$urut;$urut++?></td>
                                            <td><?=$admin['nama_admin']?></td>
                                            <td><?=$admin['username']?></td>
                                            <td><?=$admin['password']?></td>
                                            <td scope="row">
                                                <a href="dataadmin.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                                    class="btn btn-warning">Edit</button></a>
                                                <a href="edit.php?op=delete&id=<?php echo $id ?>"> <button type="button" class="btn btn-danger"
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



