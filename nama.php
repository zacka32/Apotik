<?php
include "config/koneksi.php";
$a=mysql_fetch_array(mysql_query("SELECT * FROM admins WHERE nik='$_SESSION[nik]'"));
echo "<p>$a[nama_lengkap]</p>"; 

?>
