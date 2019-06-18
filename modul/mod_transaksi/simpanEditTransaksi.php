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
     include "../../config/fungsi_log.php";
    $nik=$_SESSION['nik'];
    $module="kodegol";
    $act=$_GET['act'];
//   //  include "../../config/fungsi_hakakses.php";
  date_default_timezone_set("Asia/Jakarta");
  $jam=date("h:i:s a");
	$insert = mysql_query(" UPDATE `jabatan` SET
                                                `C_NAMAJAB` = '$_POST[C_NAMAJAB]', 
                                                `D_LASTUPDT` =  NOW(),
                                                `C_LASTUPDT` = '$jam' WHERE C_KODEJAB='$_POST[C_KODEJAB]'");
       tambahlog($nik,$module,'UBAH','BERHASIL');                                          
                                        
                        
}
?>