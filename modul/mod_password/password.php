<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.5 -->
  <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
  <!-- Font Awesome -->
    <!-- Theme style -->
  <link rel='stylesheet' href='dist/css/AdminLTE.css'>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
 <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_user/aksi_user.php";
$tampil2 = mysql_query("SELECT * FROM admins WHERE nik='$_SESSION[nik]' ");
$r=mysql_fetch_array($tampil2);

    echo "<div class='box box-info'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Ganti Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class='form-horizontal' method='POST' enctype='multipart/form-data' action='modul/mod_password/aksi_password.php?module=password&act=update'>
              <div class='box-body'>

               
                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Password Baru</label>
                  <div class='col-sm-3'>
                    <input type='password' class='form-control' name='pass_baru' >
                  </div>
                </div>                

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Lagi Password Baru</label>
                  <div class='col-sm-3'>
                    <input type='password' class='form-control' name='pass_ulangi' >
                  </div>
                </div>

                

                </div>
              <!-- /.box-body -->
              <div class='box-footer'>
                <button type='submit' class='btn btn-default' onclick=self.history.back() >Batal</button>
                <button type='submit' class='btn btn-info pull-right'>Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div> ";
}
?>
