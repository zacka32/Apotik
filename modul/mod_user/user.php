<?php
//session_start();
error_reporting(E_ALL ^ E_NOTICE);
 if (empty($_SESSION['nik']) AND empty($_SESSION['passuser'])){
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
switch($_GET[act]){
  // Tampil user
  default:
  if (hakakses($nik,$module,'lihat')) {
    tambahlog($nik,$module,'LIHAT','BERHASIL');
    echo "<section class='content'>
          <div class='row'>
          <div class='col-xs-12'>
          <div class='box'>

          <div class='box-header'>
          <h3 class='box-title'>Data User</h3>
          <br><br>
          <div class='col-sm-3'>";
    if (hakakses($nik,$module,'buat')) {
    echo "<button type='button' class='btn btn-block btn-primary' onclick=\"window.location.href='?module=user&act=tambahuser';\">Tambah User</button>";
    }
    echo "</div>

          </div>

          <div class='box-body'>

          <table id='example1' class='table table-bordered table-striped'>
          <thead><tr><th>NIK</th><th>Nama Lengkap</th><th>Level</th><th>Alamat</th><th>Telp</th><th>Aksi</th></tr></thead><tbody>";

    $tampil = mysql_query("SELECT *
                           FROM    admins ORDER BY nik ");


    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[nik]</td>
                <td>$r[nama_lengkap]</td>
                <td>$r[level]</td>
                <td>$r[alamat]</td>
                <td>$r[telp]</td>
                <td>";

                echo "<a href=?module=user&act=edituser&id=$r[nik]><img src='png/Edit-48.png' class='img-circle' width='20' alt='alternative text' title='Edit Data'></a> | ";
                echo "<a href=$aksi?module=user&act=hapus&id=$r[nik]><img src='png/Delete-48.png' class='img-circle' width='20' alt='alternative text' title='Hapus Data'></a>";

                echo "</td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    echo "</div>
          </div>
          </div>
          </div>
          </section>";
  }else{
     tambahlog($nik,$module,'LIHAT','GAGAL');
     echo "<script>alert('Anda Tidak Memiliki Akses !');
             window.location.href='?module=home'</script>";
  }

    break;

  case "tambahuser":
  if (hakakses($nik,$module,'buat')) {
    echo "<div class='box box-info'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Input Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class='form-horizontal' method='POST' enctype='multipart/form-data' action='$aksi?module=user&act=input'>
              <div class='box-body'>

                 ";?>
							<div class="form-group">
										<label for="inputPassword3" class="col-sm-2 control-label">NIK</label>
										<div class="col-sm-4">
											<input type='text' id='nik' class='form-control' name='nik' >
										</div>
									</div>
              <?php echo "
              <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
                  <div class='col-sm-3'>
                    <input type='password' id='password' class='form-control' name='password' >
                  </div>
                </div>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Nama Lengkap</label>
                  <div class='col-sm-3'>
                    <input type='text' id='nama_lengkap' class='form-control' name='nama_lengkap' >
                  </div>
                </div>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Alamat</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='alamat' >
                  </div>
                </div>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Telp</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='telp' >
                  </div>
                </div>

				<div class='form-group'>
                  <label class='col-sm-2 control-label'>Level User</label>
                  <div class='col-sm-4'>
                   <select name='level' class='form-control select2'>
                   <option selected value='user'>- Pilih Level -</option>
                   <option value='user'>User</option>
                   <option value='admin'>Admin</option>

                  </select>
                  </div>
                </div>



              <!-- /.box-body -->
              <div class='box-footer'>
                <button type='button' class='btn btn-default' onclick=self.history.back() >Batal</button>
                <button type='submit' class='btn btn-info pull-right'>Simpan</button>
              </div>
              <!-- /.box-footer -->
              </form>
              </div>";
    }else{
       echo "<script>alert('Anda Tidak Memiliki Akses !');
             window.location.href='?module=$module'</script>";
    }
     break;

  case "edituser":
  if (hakakses($nik,$module,'edit')) {
    $edit = mysql_query("SELECT * FROM admins WHERE nik='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo " <div class='box box-info'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class='form-horizontal' method='POST' enctype='multipart/form-data' action='$aksi?module=user&act=update'>
              <div class='box-body'>
                <input type=hidden name='id' value=$r[nik]>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>NIK</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' value='$r[nik]' readonly>
                  </div>
                </div>


                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Nama Lengkap</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='nama_lengkap' value='$r[nama_lengkap]'>
                  </div>
                </div>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Alamat</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='alamat' value='$r[alamat]'>
                  </div>
                </div>

                <div class='form-group'>
                  <label for='inputPassword3' class='col-sm-2 control-label'>Telp</label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='telp' value='$r[telp]'>
                  </div>
                </div>


				<div class='form-group'>
                  <label class='col-sm-2 control-label'>Level User</label>
                  <div class='col-sm-4'>
                   <select name='level' class='form-control select2'>
                   <option selected value='user'>- Pilih Level -</option>
                   <option value='user'>User</option>
                   <option value='admin'>Admin</option>
                  </select>
                  </div>
                </div>



                </div>
              <!-- /.box-body -->
              <div class='box-footer'>
                <button type='button' class='btn btn-default' onclick=self.history.back() >Batal</button>
                <button type='submit' class='btn btn-info pull-right'>Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>




          </div>
          </div>
          </div>";
  }else{
        echo "<script>alert('Anda Tidak Memiliki Akses !');
             window.location.href='?module=$module'</script>";
      }
    break;
}
}

?>
