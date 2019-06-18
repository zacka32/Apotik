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

  include "../../config/fungsi_log.php";


  $nik=$_SESSION['nik'];
   $atasan=$_SESSION['atasan'];
  $module=$_GET['module'];
  $act=$_GET['act'];

  // $codePerusahaan = 1;

    if ($module=='produk' AND $act=='input'){
      $insert = mysql_query("INSERT INTO `produk` (
											      `nm_barang`,
                                       
                                                  `stok`,
                                                  `kategori`,
                                                  `suppliyer`,
												  `tgl_expired`,

												  `created_date`,
												  `created_user`)
                                          VALUES (
												  '$_POST[nm_barang]',
                                                  
												  '$_POST[stok]',
												  '$_POST[kategori]',
												  '$_POST[suppliyer]',
                          '$_POST[tgl_expired]',
												    NOW(),
												  '$nik')");
					 //mengambil id_terakhir                               
						$last_id =mysql_insert_id();
						$count_P = count($kategori_harga);
						 $kategori_harga = $_POST['kategori_harga'];
						 
						 $count_P = count($kategori_harga);
						 $harga = $_POST['harga'];
						 $jumlah_pcs = $_POST['jumlah_pcs'];
						

						   for($i=0;$i<$count_P;$i++){   
							 $insert = mysql_query("INSERT INTO `harga` (`id_produk`, 
																		   `kategori_harga`, 
																		   `harga`, 
																		   `jumlah_pcs`
																		   ) 
																   VALUES ('$last_id', 
																		   '$kategori_harga[$i]', 
																		   '$harga[$i]', 
																		   '$jumlah_pcs[$i]'
																		   
																		   ) ");               
						   }




                if($insert) {
                     echo "<script type='text/javascript'>
                         setTimeout(function () {
                           swal('Succes!', 'Berhasil Di tambahkan', 'success')
                         },10);
                         window.setTimeout(function(){
                           window.location.replace('../../media.php?module=$module');
                         } ,2000);
                       </script>";
                 }

      // header('location:../../media.php?module=ptk');
      }

    // delete module ptk
    elseif ($module=='produk' AND $act=='delete'){

          $kd_obat=$_GET['kd_obat'];
          $insert = mysql_query("DELETE FROM `produk` WHERE kd_obat='$kd_obat' ");


            if($insert) {
                tambahlog($nik,$module,'DELETE','BERHASIL');
                  echo "<script type='text/javascript'>
                      setTimeout(function () {
                        swal('Deleted !', 'Berhasil di Hapus', 'error')
                      },10);
                      window.setTimeout(function(){
                        window.location.replace('../../media.php?module=$module');
                      } ,1500);
                    </script>";
              }

    }




}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->
