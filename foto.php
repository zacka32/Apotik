 <?php
include "config/koneksi.php";
$a=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='$_SESSION[namauser]'"));
echo "<img width=60 src='foto_user/$a[foto]' border=0 class='img-circle' alt='User Image' >"; 
?>