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
include "../../config/koneksi.php";
include "../../config/fungsi_log.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal=date('Y-m-d H:i:sa');
$nik=$_SESSION['nik'];
$module=$_GET['module'];
$act=$_GET['act'];

if ($module=='password' AND $act=='update'){
$r=mysql_fetch_array(mysql_query("SELECT * FROM admins WHERE nik='$_SESSION[nik]'"));

$pass_lama=md5($_POST['pass_lama']);
$pass_baru=md5($_POST['pass_baru']);

if (empty($_POST['pass_baru']) OR empty($_POST['pass_ulangi'])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
// Apabila password lama cocok dengan password admin di database

  if ($_POST['pass_baru']==$_POST['pass_ulangi']){
    
    $date1=date('Y-m-d');
    $limit=date('Y-m-d', strtotime('+3 month',strtotime($date1))) ;
    
    mysql_query("UPDATE admins SET password = '$pass_baru',
                                   exprd    = '$limit'
                             WHERE nik      = '$_SESSION[nik]'");
    tambahlog($nik,$module,'EDIT','BERHASIL');
    header('location:../../media.php?module=home');
  }
  else{
    tambahlog($nik,$module,'EDIT','GAGAL');
    echo "<p align=center>Password baru yang Anda masukkan sebanyak dua kali belum cocok.<br />"; 
    echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";  
  }

}
}

//Tambah Email Atasan
elseif ($module=='password' AND $act=='tambahatasan'){
  $nik=$_POST['nik'];
    mysql_query("INSERT INTO email (nik,
                                    email) 
                            VALUES('$_POST[nik]',
                                   '$_POST[email]') ");
    tambahlog($nik,$module,'TAMBAH','BERHASIL');
  echo "<script>alert('Data Berhasil Diupdate !');
        window.location.href='../../media.php?module=$module'</script>";

  }

//Hapus Email Atasan
  elseif ($module=='password' AND $act=='hapusemail'){
    mysql_query("DELETE FROM email WHERE id='$_GET[id]'");
 
  echo "<script>alert('Data Berhasil Dihapus !');
        window.location.href='../../media.php?module=$module'</script>";

  }


}
?>
