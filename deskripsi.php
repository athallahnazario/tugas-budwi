<?php
  include "koneksi.php";
  session_start();
  if(isset($_SESSION['username'])){
    $mysql_adm=mysqli_query($koneksi, "select * from tamu where username='$_SESSION[username]'");
    $data_adm=mysqli_fetch_array($mysql_adm);
    $nama_tamu = $data_adm['nama_tamu'];
    echo $nama_tamu;
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
      <a class="navbar-brand" href="#myPage">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="index.php">DESCRIPTION</a></li>
        <li><a href="index.php">FASILITAS</a></li>
        <li><a href="#book">BOOKING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="#log">LOGIN</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="desc" class="container text-center">
  <h3>FIRST ROYAL HOTEL</h3>
 
  <p>Royal Hotel Seoul, which has grown with the history
of Myeong-dong for more than 50 years since
its opening in 1971, is the first private luxury hotel
in Korea. We will lead a new lifestyle trend based on
high-quality services and modern facilities.</p>
  <br>
  <p>Located in the center of Seoul, the transportation is
convenient and the open view overlooking Myeong-dong
and Eulji-ro is the best place to enjoy the city view of Seoul.
Nearby Myeongdong Cathedral and Namsan Mountain are
located on the main streets of finance, business, tourism,
and shopping, which will provide customers with a more
interesting and enjoyable journey.</p>
  
</div>

</body>
</html>