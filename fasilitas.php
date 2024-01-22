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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
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
        <li><a href="#deskripsi.php">DESCRIPTION</a></li>
        <li><a href="fasilitas.php">FASILITAS</a></li>
        <li><a href="#book">BOOKING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="#log">LOGIN</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>


<div id="fas" class="bg-1">
  <div class="container">
    <h3 class="text-center">FASILITAS</h3>
    
    <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/kolam.jpg" alt="Paris" width="400" height="300">
          <p><strong>SWIMMING POOL</strong></p>
          
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/rest.jpg" alt="New York" width="400" height="300">
          <p><strong>RESTAURANT</strong></p>
          
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/gym3.jpg" alt="San Francisco" width="400" height="300">
          <p><strong>GYM</strong></p>
          
        </div>
      </div>

      <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/ballroom4.jpg" alt="Paris" width="400" height="300">
          <p><strong>BALLROOM</strong></p>
          
        </div>
      </div>
</div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/lobby.jpg" alt="New York" width="400" height="300">
          <p><strong>LOBBY</strong></p>
          
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/jogging.jpg" alt="San Francisco" width="400" height="300">
          <p><strong>JOGGING TRACK</strong></p>
</div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>


