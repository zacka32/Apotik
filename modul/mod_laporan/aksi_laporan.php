<script src="../../dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../dist/sweetalert.css">

<?php
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
  $module=$_GET['module'];
  $act=$_GET['act'];

  
    if ($module=='laporan' AND $act=='ganti'){

      $cnip_lama = $_POST['C_NIPLAMA'];
      $cnip_baru = $_POST['C_NIPBARU'];

      $sq=mysql_query("select C_KODEJAB from mskry WHERE C_NIP='$cnip_lama'");
      $dt =mysql_fetch_array($sq);
      $C_KODEJAB=$dt['C_KODEJAB'];
          $insert = mysql_query("INSERT INTO `laporan` (
                                                  `C_NIPLAMA`, 
                                                  `C_NIPBARU`, 
                                                  `C_NOTES`,
                                                  `D_TANGGAL`, 
                                                  `C_ENTRY`) 
                                          VALUES (
                                                  '$_POST[C_NIPLAMA]',
                                                  '$_POST[C_NIPBARU]',
                                                  '$_POST[C_NOTES]',
                                                    NOW(),
                                                  '$nik'
                                                  ) 
                                              ");
          
          // update semua anak buah ke nik baru                                    
          $update = mysql_query("UPDATE mskry SET C_AYBS='$cnip_baru' WHERE C_AYBS='$cnip_lama'");

          //update jabatan dari nik lama ke nik baru
          // $update = mysql_query("UPDATE mskry SET C_KODEJAB='$C_KODEJAB' WHERE C_NIP='$cnip_baru'");
          //TAMBAHkan ke history jabtan 
          // $year=date("Y");
          // mysql_query("INSERT INTO mskryjab (C_NIP,C_KODEJAB,C_NOTES,C_YEAR)VALUES('$cnip_baru','$C_KODEJAB','$_POST[C_NOTES]','$year')");

                          

          if($update) {
            tambahlog($nik,$module,'laporan/Perpindahan','BERHASIL');
              echo "<script type='text/javascript'>
                  setTimeout(function () {  
                    swal('Success !', 'laporan/Perpindahan nik berhasil', 'success')
                  },10); 
                  window.setTimeout(function(){ 
                    window.location.replace('../../media.php?module=$module');
                  } ,1500); 
                </script>";
          }                              
            
                              
      // header('location:../../media.php?module=laporan');
      }

    // delete module laporan
    elseif ($module=='laporan' AND $act=='delete'){

          $C_KODEJAB=$_GET['C_KODEJAB'];
          $insert = mysql_query("DELETE FROM `laporan` WHERE C_KODEJAB='$C_KODEJAB' ");                   
        
         
            if($insert) {
                tambahlog($nik,$module,'DELETE','BERHASIL');
                  echo "<script type='text/javascript'>
                      setTimeout(function () {  
                        swal('Deleted !', 'Kode laporan ( $C_KODEJAB ) Berhasil di Hapus', 'error')
                      },10); 
                      window.setTimeout(function(){ 
                        window.location.replace('../../media.php?module=$module');
                      } ,1500); 
                    </script>";
              } 
        //  header('location:../../media.php?module=laporan');
    }

    


}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->