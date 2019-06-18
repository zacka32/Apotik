<?php
session_start();
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
include "../../config/koneksi.php";
include "../../config/library.php";
include "../../config/fungsi_thumb.php";

include "../../config/fungsi_log.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal=date('Y-m-d H:i:sa');
$nik=$_SESSION['nik'];
$module=$_GET['module'];
$act=$_GET['act'];

// Hapus User
if ($module=='user' AND $act=='hapus'){
	mysql_query("DELETE FROM admins WHERE nik='$_GET[id]'");
	header('location:../../media.php?module=user');
 }

// Input User
elseif ($module=='user' AND $act=='input'){



    $id=$_POST['nik'];
    $password=md5($_POST['password']);
	
    mysql_query("INSERT INTO admins(nik,
                                    password,
                                    nama_lengkap,
                                    alamat,
                                    level,
									                  telp)
                            VALUES('$_POST[nik]',
                                   '$password',
                                   '$_POST[nama_lengkap]',
                                   '$_POST[alamat]',
                                   '$_POST[level]',
								                   '$_POST[telp]')");
    

		header('location:../../media.php?module=user');
  

}

// Update user
elseif ($module=='user' AND $act=='update'){
   mysql_query("UPDATE admins SET nama_lengkap = '$_POST[nama_lengkap]',
                                   alamat        = '$_POST[alamat]',
								               level        = '$_POST[level]',
                                   telp       = '$_POST[telp]'
                             WHERE nik   = '$_POST[id]'");
							 
	header('location:../../media.php?module=user');

}


}
?>
