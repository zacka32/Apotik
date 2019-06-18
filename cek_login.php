<?php
include "config/koneksi.php";
include "config/fungsi_hakakses.php";
include "config/fungsi_log.php";
include "config/fungsi_week.php";

function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
date_default_timezone_set('Asia/Jakarta');
$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login=mysql_query("SELECT * FROM admins  WHERE nik='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
$tanggal=date('Y-m-d h:i:sa');


// Apabila username dan password ditemukan
if ($ketemu > 0){

session_start();

  $_SESSION['nik']          = $r['nik'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  $_SESSION['idgroup']    = $r['ID_GROUP'];

  $_SESSION['atasan']       = $r['atasan'];
  $_SESSION['superuser']       = $r['superuser'];
  setcookie('nik', $r['nik']);
  setcookie('idgroup', $r['ID_GROUP']);
  setcookie('code', $code);
  $_SESSION['code'] = $code;



  header('location:media.php?module=home');

}
else{
  tambahlog($username,'LOGIN','LOGIN','GAGAL');

  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.5 -->
  <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
  <!-- Font Awesome -->
    <!-- Theme style -->
  <link rel='stylesheet' href='dist/css/AdminLTE.css'>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
 <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
 <center>LOGIN GAGAL! <br>
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php?url=$_GET[url]><b>ULANGI LAGI</b></a></center>  ";
}
?>
