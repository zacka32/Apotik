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
    $module="produk";
    $act=$_GET['act'];
//   //  include "../../config/fungsi_hakakses.php";
  date_default_timezone_set("Asia/Jakarta");
  $jam=date("h:i:s a");
	$insert = mysql_query(" UPDATE `produk` SET 
                                                `c_prodcode` = '$_POST[c_prodcode]', 
                                                `n_stok` = '$_POST[n_stok]', 
												`n_hargajual` = '$_POST[n_hargajual]', 
                                                `dt_update` =  NOW()
                                                 WHERE c_prodcode='$_POST[c_prodcode]'");
       tambahlog($nik,$module,'UBAH','BERHASIL');                                          
                                        
                        
}
?>