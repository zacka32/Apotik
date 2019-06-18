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


   date_default_timezone_set("Asia/Jakarta");
  	$tgl_skrg = date("Ymd");
			$jam_skrg = date("H:i:s");

    if ($module=='transaksi' AND $act=='inputPrint'){
		if (empty($_POST['id_transaksi']) || empty($_POST['kasir']) ){
			header('location:../../media.php?module=transaksi');

		}else {
			$id_transaksi=$_POST['id_transaksi'];
			$insert = mysql_query("INSERT INTO `transaksi` (`id_transaksi`,
													  `sales`,
													  `tgl_beli`,
													  `created_date`,
													  `created_user`
													  )
											  VALUES ('$id_transaksi',
													  '$_POST[kasir]',
													  now(),
													  now(),
													  '$nik'
													  )
													 ");

				// fungsi untuk mendapatkan isi keranjang belanja
				function isi_keranjang(){
					$isikeranjang = array();
					$sql = mysql_query("SELECT * FROM order_temp");

					while ($r=mysql_fetch_array($sql)) {
						$isikeranjang[] = $r;
					}
					return $isikeranjang;
				}

				// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
				$isikeranjang = isi_keranjang();
				$jml          = count($isikeranjang);

				// simpan data detail pemesanan
				for ($i = 0; $i < $jml; $i++){
				  mysql_query("INSERT INTO detail_transaksi(id_transaksi, kd_obat, nm_produk, jenis, harga, jumlah, diskon,id_harga,jumlah_pcs)
							   VALUES('$id_transaksi','{$isikeranjang[$i]['kd_obat']}', '{$isikeranjang[$i]['nm_produk']}','{$isikeranjang[$i]['jenis']}','{$isikeranjang[$i]['harga']}', {$isikeranjang[$i]['jml']}, {$isikeranjang[$i]['diskon']}, {$isikeranjang[$i]['id_harga']}, {$isikeranjang[$i]['jumlah_pcs']})");
				}
				
				 // Update untuk mengurangi stok
					mysql_query("update produk p left join detail_transaksi d on p.kd_obat=d.kd_obat set p.stok=stok-jumlah where id_transaksi='$id_transaksi'");

				// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
				  mysql_query("DELETE FROM order_temp");
				// if($insert) {
				   // tambahlog($nik,$module,'tambah order temp','BERHASIL');
					  // echo "<script type='text/javascript'>
						  // setTimeout(function () {
							// swal('Succes!', '( $_POST[C_NAMAJAB] ) Berhasil Di tambahkan', 'success')
						  // },10);
						  // window.setTimeout(function(){
							// window.location.replace('../../media.php?module=$module');
						  // } ,2000);
						// </script>";
				  // }
				  header('location:../../modul/mod_transaksi/cetak_epson.php?act=cetak_transaksi&id_transaksi='.$id_transaksi.'');
        }

      }

    // delete module jabatan
    elseif ($module=='transaksi' AND $act=='delete'){

          $id_order=$_GET['id_order'];
          $insert = mysql_query("DELETE FROM `order_temp` WHERE id_order='$id_order' ");



                tambahlog($nik,$module,'DELETE','BERHASIL');

       header('location:../../media.php?module=transaksi');
    }





}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->
