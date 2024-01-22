<?php
  include "koneksi.php";
  session_start();
  if(isset($_SESSION['username'])){
    $mysql_adm=mysqli_query($koneksi, "select * from tamu where username='$_SESSION[username]'");
    $data_adm=mysqli_fetch_array($mysql_adm);
    $nama_tamu = $data_adm['nama_tamu'];
  }
  
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>

    <div class="container" style="width: 65%">
    <?php 
        $id = $_GET['id'];

        //Mengambil data transaksi
        $trans = "SELECT * FROM transaksi, tamu, kamar WHERE transaksi.id_transaksi ='$id' AND transaksi.id_tamu = tamu.id_tamu AND transaksi.id_kamar=kamar.id_kamar";
        $query = mysqli_query($koneksi, $trans);
        $data = mysqli_fetch_array($query);
        
        //ambil data kamar
        $no_kamar = $data['no_kamar'];
        $type = $data['type_kamar'];
        $harga = $data['harga'];

        //ambil data tamu
        $nik_tamu = $data['nik_tamu'];
        $nama_tamu = $data['nama_tamu'];
        $username = $data['username'];
        $password = $data['password'];

        //ambil data transaksi
        $id_tamu = $data['id_tamu'];
        $id_kamar = $data['id_kamar'];
        $date_transaksi = $data['date_transaksi'];
        $malam = $data['malam'];
        $total_harga = $data['total_harga'];
    ?>
        <div style="clear: both"></div>
        <h3 class="title2">Nota Reservasi Kamar</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                Nama Tamu : <?=$data['nama_tamu']?> <br>
                No. Invoice : INV-<?=$id?> <br>
                Tanggal Reservasi: <?=$data['date_transaksi']?>
            <tr>
                <th>Tipe Kamar</th>
                <th>Jumlah Malam</th>
                <th>Tarif per Malam</th>
                <th>Total Tagihan</th>
            </tr>

            <tr>
                <th><?php echo $type; ?></th>
                <th><?php echo $malam; ?></th>
                <th>$ <?php echo $harga; ?></th>
                <th>$ <?php echo $total_harga; ?></th>
            </tr>
         
                        
            </table>
        </div>

    </div>
    
    <script>window.print();</script>

</body>
</html>
