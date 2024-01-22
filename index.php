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
      <a class="navbar-brand" href="#myPage"><img src="./img/logo3.png" alt="" width="29" height="29"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">HOME</a></li>
        <li><a href="#desc">DESCRIPTION</a></li>
        <li><a href="#fas">FASILITAS</a></li>
        <li><a href="booking.php">BOOKING</a></li>
        <li><a href="#contact">CONTACT</a></li>
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/hotel5.jpg" alt="FIRST ROYAL HOTEL" width="1000" height="500">
        <div class="carousel-caption">
          <h3>FIRST ROYAL HOTEL</h3>
        </div>      
      </div>

      <div class="item">
        <img src="img/hotel4.jpg" alt="Chicago" width="1000" height="500">
        <div class="carousel-caption">
          <h3>LUXURY HOTEL</h3>
        </div>      
      </div>
    
      <div class="item">
        <img src="img/hera5.jpg" alt="Los Angeles" width="1000" height="500">
        <div class="carousel-caption">
          <h3>SOUTH KOREA</h3>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
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
          <img src="img/gym3.jpg" alt="San Francisco" width="400" height="350">
          <p><strong>GYM</strong></p>
        </div>
      </div>
  </div>

  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
          <img src="img/ballroom4.jpg" alt="Paris" width="400" height="300">
          <p><strong>BALLROOM</strong></p>
          
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


  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Pay 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
  
<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  



<!-- Footer -->
<footer class="text-center">
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

</body>
</html>
