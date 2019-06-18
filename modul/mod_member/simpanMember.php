<script src="../../dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../dist/sweetalert.css">

<?php
error_reporting(0);
session_start();
if (empty($_SESSION['nik']) AND empty($_SESSION['passuser'])){
  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
    <link rel='stylesheet' href='dist/css/AdminLTE.css'>
    <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
       echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  include "../../config/koneksi.php";
  include "../../config/fungsi_hakakses.php";
  include "../../config/fungsi_log.php";

  $nik=$_SESSION['nik'];
  $module='produk';
  $act=$_GET['act'];

     
     $nama_file = basename($_FILES["uploads"]["name"]);
      $ukuran_file = $_FILES["uploads"]["size"];

      // cek nama harus absensi dan format mdb
        if($nama_file == "pos.sql") {
          // Folder yang dituju
          $folder = "../../upload";
          // Tujuan
          $tujuan = $folder."/".$nama_file;
          // Temporary pada file
          $tmp = $_FILES["uploads"]["tmp_name"];

          //action
          if(move_uploaded_file($tmp,$tujuan)){
			  
			  $dbconn = mysql_connect('localhost','root','');
			  mysql_select_db('pos',$dbconn);
			  
			if($fp = file_get_contents($tujuan)) {
			  $var_array = explode(';',$fp);
			  foreach($var_array as $value) {
				mysql_query($value.';',$dbconn);
			  }
			}
                      
             tambahlog($nik,$module,'upload produk','BERHASIL');
			 
                  echo "<script type='text/javascript'>
                      setTimeout(function () {  
                        swal('Succes!', 'Tarik Data Berhasil', 'success')
                      },10); 
                      window.setTimeout(function(){ 
                        window.location.replace('../../media.php?module=$module');
                      } ,2000); 
                    </script>";
          }
          else{
            //  tambahlog($nik,$module,'TARIK','GAGAL');
           echo "<script type='text/javascript'>
                      setTimeout(function () {  
                        swal('Gagal!', 'Tarik Absen tidak berhasil', 'error')
                      },10); 
                      window.setTimeout(function(){ 
                        window.location.replace('../../media.php?module=$module&act=tarik_produk');
                      } ,2000); 
                    </script>";
          }              
          // header('location:../../media.php?module=jabatan');
        }else {
          echo "<script type='text/javascript'>
                        setTimeout(function () {  
                          swal('Gagal!', 'File tidak termasuk dalam kategori', 'error')
                        },10); 
                        window.setTimeout(function(){ 
                          window.location.replace('../../media.php?module=$module&act=tarik_produk');
                        } ,2000); 
                      </script>";
        }


}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->