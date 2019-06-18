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
    $module="transaksi";
    $act=$_GET['act'];
//   //  include "../../config/fungsi_hakakses.php";
  date_default_timezone_set("Asia/Jakarta");
  $jam=date("h:i:s a");
      // if(empty($_POST['id_produk']))
	  // {

          // header('location:../../media.php?module=transaksi');
	  // }else {
		 $insert = mysql_query("INSERT INTO `order_temp` (`kd_obat`,
													  `nm_produk`,
													  `jml`, 
													  `diskon`,
													  `id_harga`,
													  `jenis`,
													  `harga`,
													   `jumlah_pcs`
													  )
											  VALUES ('$_POST[kd_obat]',
													   '$_POST[nm_barang]',
													  '$_POST[jml]',
													  '$_POST[diskon]',
													  '$_POST[id_harga]',
													  '$_POST[jenis2]',
													  '$_POST[harga]',
													  '$_POST[jumlah_pcs]'
													 )
													");
		   tambahlog($nik,$module,'buat','BERHASIL');
      // }

}
?>
