<?php
  include "koneksi.php";
  session_start();
  if(isset($_SESSION['username'])){
    $mysql_adm=mysqli_query($koneksi, "select * from tamu where username='$_SESSION[username]'");
    $data_adm=mysqli_fetch_array($mysql_adm);
    $nama_tamu = $data_adm['nama_tamu'];
    $id_tamu = $data_adm['id_tamu'];
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>FIRST ROYAL HOTEL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><img src="./img/logo3.png" alt="" width="29" height="29"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="index.php">DESCRIPTION</a></li>
        <li><a href="index.php">FASILITAS</a></li>
        <li><a href="booking.php">BOOKING</a></li>
        <li><a href="index.php">CONTACT</a></li>
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li><a href='admin/dist/loginuser.php'>LOGIN</a></li>";
          }else{
            echo "<li><a href='admin/dist/logout.php'>LOGOUT</a></li>";
          }
        ?>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- Container (TOUR Section) -->
<div id="book" class="bg-1">
  <div class="container">
    <h3 class="text-center">BOOKING</h3>
    <div class="row text-center">
      <?php
          $a = "select * from kamar where status='Tersedia'";
          $b = mysqli_query($koneksi,$a);
          $c = mysqli_num_rows($b);
          while ($x=mysqli_fetch_array($b)) { 
            $id = $x['id_kamar'];
            $no_kamar = $x['no_kamar'];
            $type_kamar = $x['type_kamar'];
            $harga = $x['harga'];
      ?>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/<?=$x['foto']?>" alt="<?=$x['type_kamar']?>" width="400" height="300">
          <p><strong><?=$x['type_kamar']?></strong></p>
          <p>$<?=$x['harga']?></p>
          <?php
            if(!isset($_SESSION['username'])){
              echo "<a href='admin/dist/registeruser.php' class='btn btn-sm btn-info'>REGISTER NOW!</a>";
            }else{
          ?>
              <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal<?php echo $x['id_kamar']; ?>">BOOKING</a>
          <?php
            }
          ?>
          <div class="modal fade" id="modal<?php echo $x['id_kamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">BOOKING</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="booking.php" method="post">
                          <p>
                          <b> Data Kamar </b>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">no kamar</label>
                              <input type="text" class="form-control" name="kamar" value="<?php echo $x['no_kamar']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlTextarea1">type kamar</label>
                              <input type="text" class="form-control" name="type" value="<?php echo $x['type_kamar']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">harga</label>
                              <input type="text" class="form-control" name="harga" value="$ <?php echo $x['harga']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">jumlah malam</label>
                              <input type="text" class="form-control" name="malam">
                          </div>
                          <p>
                          <b> Identitas Tamu </b>
                          <div class="form-group">
                              <input type="hidden" class="form-control" name="id_tamu" value="<?php echo $data_adm['id_tamu']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlTextarea1">nama tamu</label>
                              <input type="text" class="form-control" name="nama" value="<?php echo $data_adm['nama_tamu']; ?>">
                          </div>
                          <div class="modal-footer">
                              <input type="submit" class="btn btn-primary" name="submit" value="Book">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
      ?>              
    
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center" background-color: #f5f5f5>
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>First Royal Hotel</p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

<script>
  const myModal = document.getElementById('myModal')
</script>

</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $malam = $_POST['malam'];
    date_default_timezone_set('Asia/Jakarta');
    $date = date('d-m-Y h:i:s a');

    $total = $harga*$malam;
    $ppn =  $total*0.7;
    $subtotal = $total + $ppn; 
    
    //untuk input transaksi
    $query = mysqli_query($koneksi, "INSERT INTO transaksi(id_tamu,id_kamar,date_transaksi,malam,total_harga) VALUE ('$id_tamu','$id','$date','$malam','$subtotal')");
    //untuk cari id_transaksi yang baru diinput
    $query1 = mysqli_query($koneksi, "UPDATE kamar SET status='Tidak Tersedia' WHERE id_kamar='$id'");
    $cektransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE date_transaksi='$date'");
    $cektransaksi = mysqli_fetch_array($cektransaksi);
    $id_transaksi = $cektransaksi['id_transaksi'];

    echo '<script>alert("Thank you!")</script>';
    echo "<script>window.location='struk.php?id=".$id_transaksi."'</script>";
  }
?>