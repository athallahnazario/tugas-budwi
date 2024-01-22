<?php
include 'koneksi.php';
$nomor=$_GET['nomor'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>DATA TAMU</h3>

    <a href="struk.php?id=<?=["id"]; ?>"></a>
    
    <?php
    
    $query = mysqli_query($koneksi, "select * from transaksi where nomor = '$nomor'");
    while($l=mysqli_fetch_array($query)){?>

    <p><strong>Kode Transaksi</strong></p>
    <p><?=$data['id_transaksi']?></p>

    <?php } ?>
    <script>window.print()</script>
</body>
</html>