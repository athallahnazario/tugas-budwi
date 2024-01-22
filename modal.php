<?php
  include "koneksi.php";
  session_start();
  if(isset($_SESSION['username'])){
    $mysql_adm=mysqli_query($koneksi, "select * from tamu where username='$_SESSION[username]'");
    $data_adm=mysqli_fetch_array($mysql_adm);
    $nama_tamu = $data_adm['nama_tamu'];
    echo $nama_tamu;
  }
          $a = "select * from kamar";
          $b = mysqli_query($koneksi,$a);
          $x=mysqli_fetch_array($b);
            $id = $x['id_kamar'];
            $no_kamar = $x['no_kamar'];
            $type_kamar = $x['type_kamar'];
            $harga = $x['harga'];
            
      ?>
      
  <div class="modal fade" id="myModal<?=$id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> BOOKING </h4>
          
        </div>
        <div class="modal-body">
          <form role="form" action="proses.php">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-user"></span> Data User </label>
              <input type="number" class="form-control" name="nik" placeholder="NIK" required>
              <input type="text" class="form-control" name="nama" placeholder="Nama Tamu" required>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-shopping-cart"></span> Data Kamar </label>
              <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" readonly><br>
              Nomor Kamar <input type="text" class="form-control" name="no_kamar" value="<?php echo $x['no_kamar'] ?>" readonly>
              Type Kamar <input type="text" class="form-control" name="type_kamar" value="<?php echo $x['type_kamar'] ?>" readonly>
              Harga <input type="text" class="form-control" name="harga" value="<?php echo $x['harga'] ?>" readonly>
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