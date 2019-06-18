 <?php
$folder="modul/mod_transaksi";
$aksi="modul/mod_transaksi/aksi_transaksi.php";
switch($_GET[act]){
  default:
  ?>
<?php
	//tambahkan nol di belakang angka
	// function tambah_nol($angka,$jumlah)
	// {
		// $jumlah_nol=strlen($angka);
		// $angka_nol=$jumlah-$jumlah_nol;
		// $nol = "";
		// for($i=1;$i<=$angka_nol;$i++)
		// {
		// $nol.='0';
		// }
		// return $nol.$angka;
	// }

	// $n = mysql_query("SELECT SUBSTRING(id_transaksi, 5, 7) id_trans,id_transaksi from transaksi order by id_transaksi DESC LIMIT 1");

	// $qn    = mysql_fetch_array($n);
	// $id= $qn['id_trans']+1;
	// $hsl = tambah_nol($id,3);
	// $tahun = date("Y");
	// $hasil_id = $hsl.$tahun;
	// echo"$id_trans , $qn[id_transaksi]";

	// $C_KODEJAB = tambah_nol($nilai,3);

		$n = mysql_query("SELECT id_transaksi from transaksi order by id_transaksi DESC LIMIT 1");
		$qn    = mysql_fetch_array($n);
		//tambahkan nol di belakang angka
		function tambah_nol($angka,$jumlah)
		{
			$jumlah_nol=strlen($angka);
			$angka_nol=$jumlah-$jumlah_nol;
			$nol = "";
			for($i=1;$i<=$angka_nol;$i++)
			{
			$nol.='0000';
			}
			return $nol.$angka;
		}
		$nilai = $qn['id_transaksi']+1;
		$id_transaksi = tambah_nol($nilai,3);
?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Transaksi Penjualan</h3>
					</div>
				  <div class="col-xl-3 pull-right">

					  <!-- <a href="#ModalPen" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></a> -->
				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
					  <!-- <a href="#modalExport" class="btn btn-block btn-default pull-right"data-toggle="modal"><i class="fa fa-fw fa-file-excel-o"></i></a> -->

				  </div>

				</div>


				<!-- Custom Tabs -->
				<div class="box-body">
				<?php
echo"<form action='$aksi?module=transaksi&act=inputPrint' enctype='multipart/form-data' method='POST' class='form-horizontal'> ";?>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-1 control-label">No Order </label>
						<div class="col-sm-3">
						<input type="text" class="form-control" disabled name="no_transaksi" value="<?php echo "$id_transaksi";?>">
						<input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi";?>">
						<input type="hidden" name="kasir" value="<?php echo "$a[nama_lengkap]";?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-1 control-label">Kasir </label>
						<div class="col-sm-3">
            <input type="text" class="form-control" name="kasirs" readonly value="<?php echo "$a[nama_lengkap]";?>">
						</div>
					</div>


				</div>
			</div>
			<div class="box box box-success box-solid">
				<div class="box-header">
				  <h3 class="box-title">Products</h3>

				  <div class="box-tools pull-right">
<a href="#ModalPen" class="btn btn-block btn-primary pull-right"  data-toggle="modal"><b> Tambah Produk</b></a>
				  </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">


				<!-- /.box-footer -->
				</div>
				<div id="tampildata"></div>


			</div>
			<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
							<button type="submit" class="btn btn-info pull-right">Save </button>
					</div>
				  </form>

		</div>

	</section>
	<script type="text/javascript">
    $(document).ready(function(){
		// window.onload = function() {
		  // document.getElementById('about').className = 'tampildata';
		// };
		$('#tampildata').load("<?php echo"$folder"; ?>/show_tabel.php");
    });
    </script>

		<div id="ModalPen" class="modal fade small" tabindex=""  data-focus-on="input:first" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

				  <form method="post" class="formPendidikan">


					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Add Produk</h4>
					</div>
					 <?php  $fetch = mysql_query("SELECT * FROM produk");
									$return_arr = array();
									$array = array();
									while ($item = mysql_fetch_assoc($fetch)) {
										$row_array['kd_obat'] = $item['kd_obat'];
										// $row_array['c_realname'] = $item['c_realname'];
										// $row_array['stok'] = $item['stok'];

										$return_arr[$item['kd_obat']] = $item;
									}
						$json = 'var ProdukInfo = ' . json_encode($return_arr) . ';';
						
						
						?>
						
						 
						
						<div class="modal-body form-horizontal">
							<div class="row">
								<div class="col-xl-12">
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label">Produk </label>
												<div class="col-md-6">
													<select id="select2" name="kd_obat" class="form-control select2" required style="width:100%">
																<option value="">Pilih Produk</option>
														<?php
															$fetch = mysql_query("SELECT * FROM produk");
															while ($row = mysql_fetch_array($fetch)) {?>
																<option value="<?php echo $row['kd_obat']; ?>"><?php echo $row['kd_obat'].", ".$row['nm_barang']; ?></option>
															<?php } ?>

													</select>
												</div>
												<div class="col-md-1">
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">Kode Produk </label>
													<div class="col-md-7">
														<input type="text" class="form-control" disabled name="kd_obat" >
														<input type="hidden" class="form-control" name="nm_barang" >
													</div>

												</div>

										</div>
										<hr />
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label"> Stok </label>
												<div class="col-md-3">
													<input type="number" class="form-control" readonly name="stok">
												</div>
												<div class="col-md-4">
													
												</div>
												<div class="col-md-4">
													
												</div>
										</div>
										<script type="text/javascript">
		
											$(document).ready(function(){
												
												
											<?php echo $json;?>
												$("#select2").change(function(){
													var sid = $(this).val();
													$("input[name='kd_obat']").val(ProdukInfo[sid].kd_obat);
													$("input[name='nm_barang']").val(ProdukInfo[sid].nm_barang);
													$("input[name='c_realname']").val(ProdukInfo[sid].c_realname);
													$("input[name='stok']").val(ProdukInfo[sid].stok);
													$("input[name='harga_jual']").val(ProdukInfo[sid].harga_jual);
													 // document.getElementById("myText").innerHTML = ProdukInfo[sid].kd_obat;
													 var testing = ProdukInfo[sid].kd_obat;
												
														$.ajax({
															url: "modul/mod_transaksi/harga.php",
															data: "id_produk="+testing,
															cache: false,
															success: function(msg){
																//jika data sukses diambil dari server kita tampilkan
																//di <select id=kota>
																$("#harga").html(msg);
															}
														});
									
												});
												
												
												
												
											});
											
											   
										</script>

										
						<script>									
							var htmlobjek;
							$(document).ready(function(){
							  //apabila terjadi event onchange terhadap object <select id=propinsi>
							 
							
							});

						</script>

						
										<?php  	
												
													$fetch1 = mysql_query("select * from harga");
													$return_arr1 = array();
													$array1 = array();
													while ($item1 = mysql_fetch_assoc($fetch1)) {
														$row_array1['id_harga'] = $item1['id_harga'];
														// $row_array['c_realname'] = $item['c_realname'];
														// $row_array['stok'] = $item['stok'];

														$return_arr1[$item1['id_harga']] = $item1;
													}
												$json1 = 'var ProdukInfo1 = ' . json_encode($return_arr1) . ';';
										?>
				
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label"> Jenis</label>
												<div class="col-md-3">
										
												<select id="harga" name="kategori_harga" class="form-control select2" required style="width:100%"> 
													
													</select>
									
												
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">Harga </label>
													<div class="col-md-7">
														<div class="input-group">
															<input type="text" class="form-control" name="harga" readonly>
															<input type="hidden" class="form-control" name="id_harga">
															<input type="hidden" class="form-control" name="jenis2">
														</div>

													</div>
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">jml satuan</label>
													<div class="col-md-7">
														<input type="text" class="form-control" name="jumlah_pcs" readonly>
														
													</div>
												</div>
										</div>
										
										<div class="form-group">							
											<label for="inputPassword3" class="col-md-1 control-label">jml beli</label>
												<div class="col-md-4">
													<input type="number" class="form-control" name="jml">
												</div>
												<div class="col-md-4">
													
												</div>
												<div class="col-md-4">
													
												</div>
										</div>
										
										
										<div class="form-group">							
											<label for="inputPassword3" class="col-md-1 control-label">diskon</label>
												<div class="col-md-4">
													<div class="input-group">
														<input type="number" class="form-control" name="diskon">
														<div class="input-group-addon">
														  %
														</div>
													</div>
												</div>
												<div class="col-md-4">
													
												</div>
												<div class="col-md-4">
													
												</div>
										</div>
										
										

								</div>

                            </div>

						</div>

					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
						<a type="submit" class="simpanPend btn btn-primary">Save </a>
					</div>
				  </form>
				</div>
			</div>
		</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".simpanPend").click(function(){
				var data = $('.formPendidikan').serialize();
				$.ajax({
					type: 'POST',
					url: "modul/mod_transaksi/simpanOrderTemp.php",
					data: data
					,
					success: function() {
						$('#tampildata').load("<?php echo"$folder"; ?>/show_tabel.php");

						 $('#ModalPen').modal('toggle');
						 return false;
					}
				});
			});
		<?php echo $json1;?>
			$("#harga").change(function(){
				var sid = $(this).val();
				$("input[name='id_harga']").val(ProdukInfo1[sid].id_harga);	
				$("input[name='harga']").val(ProdukInfo1[sid].harga);
				$("input[name='jumlah_pcs']").val(ProdukInfo1[sid].jumlah_pcs);
				$("input[name='jenis2']").val(ProdukInfo1[sid].kategori_harga);
				
				
			});
		});
	</script>
	


			<!-- Modal Popup untuk delete -->
		<div class="modal fade small" id="modalDelete">
		<div class="modal-dialog">
			<div class="modal-content" style="margin-top:100px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Yakin anda ingin hapus data ini ? ?</h4>
			</div>

			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
				<a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
				<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
			</div>
			</div>
		</div>
		</div>



<?php
  	 break;
	 case "listtransaksi": ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Daftar List Transaksi</h3>
				  </div>
				  <div class="col-xl-3 pull-right">

				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
				  </div>

				</div>

				<!-- Custom Tabs -->
				<div class="box-body">
					<!-- <table id="example" class="" cellspacing="0" width="100%"> -->
				  <table id="hrd" class="display table table-bordered table-striped" width="100%">
					<thead>

						<tr class="color_header">
							<th>Id Transaksi</th>
							<th>Kasir</th>
							
							<th>Tgl Beli</th>
							<th>View Detail</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$tampil = mysql_query("SELECT t.*,a.nama_lengkap from transaksi t left join admins a on t.created_user=a.nik order by t.id_transaksi desc");
						while($r=mysql_fetch_array($tampil)){

					   echo " <tr>
					  	<td>$r[id_transaksi]</td>
						<td>$r[nama_lengkap]</td>
				
						<td>$r[tgl_beli]</td>
						<td><a href='modul/mod_transaksi/cetak_epson.php?act=cetak_transaksi&id_transaksi=$r[id_transaksi]' class='btn bg-blue smallbtn'><i class='fa fa-fw fa-edit'></i></a>
						</td>
						</tr>";

						$no++; } ?>

					</tbody>

					</table>

				</div>
				<!-- col -->


			</div>
			</div>

		</div>

	</section>

<?php
break;
	 case "cetak_transaksi": ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">

				<div class="box-body">
				<style type='text/css'>

					.style1 {
					  font-family: Arial, Helvetica, sans-serif;
					  font-weight: bold;
					  font-size: 17px;
					}
					.style4 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 13px; }
					.style5 {
					  font-family: Arial, Helvetica, sans-serif;
					  font-size: 11px;
					}
					.style12 {font-family: Arial, Helvetica, sans-serif; font-size: 13; }
					.style14 {font-family: Arial, Helvetica, sans-serif; font-size: 11; }
					.style15 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 9; }

					.style41 {font-family: Arial, Helvetica, sans-serif;  font-size: 9px; }
					.style411 {font-family: Arial, Helvetica, sans-serif;  font-size: 8px; }
					.style141 {font-family: Arial, Helvetica, sans-serif; font-size: 12; }
					@media print {
					  @page { margin: 0px auto; }
					  body { margin: 1.6cm;  }
					  .hilang { display:none;}

					}
					</style>

				<form action="#" method="POST">
					<table width="770" border="0">
					  <tr>
						<td width="474"><span class="style1">FAKTUR KOMERSIL</span><br />
						  <span class="style4">PT. PESONA AMARANTHINE COSMETIQUES</span><br />
						<span class="style5">Jl. Pekapuran Raya No. 32<br />
						Cimanggis - Depok<br />
						Telepon : +62 21 8774 4000<br />
						Fax   : +62 21 8774 2020<br />
						Hot Line Service : +62 21 8715854<br />
						email     : info@amaranthinecosmetics.com      </span></td>

					  </tr>
					  <tr>
						<td colspan="2"><span class="style5">No. Rek : BCA# 166.289.1911 BNI# 027.325.6439 Mandiri# 129.00.1025.826.3 a/n PT. Pesona Amaranthine Cosmetiques </span></td>
					  </tr>
					</table>
					<hr size="6" noshade="noshade" />
					<?php
							$no = 1;
							$g = mysql_query("SELECT * from transaksi where id_transaksi='$_GET[id_transaksi]'");
							$t=mysql_fetch_array($g);

							?>
					<input type="hidden" name="id_transaksi" value="<?php echo"$t[id_transaksi]"; ?>">
					<table width="770" border="0">
					  <tr>

						<td width="64" valign="top" class="style5"><span class="style12">Faktur</span></td>
						<td width="161" valign="top" class="style5"><span class="style12">: <?php echo"$t[id_transaksi]"; ?></span></td>
						  <td class="style12">&nbsp;</td>
					   <td width="148" valign="top" class="style5"><span class="style12">Customer</span></td>
						<td width="160" valign="top" class="style5"><span class="style12">: <?php echo"$t[customer]"; ?> </span></td>

					   </tr>
					  <tr>
						<td class="style5"><span class="style12">Tanggal</span></td>
						<td class="style5"><span class="style12">: <?php echo"$t[tgl_beli]"; ?>  </span></td>
						<td class="style12">&nbsp;</td>
						<td class="style5"><span class="style12">jam</span></td>
						<td class="style5"><span class="style12">: <?php echo"$t[created_date]"; ?> </span></td>
					  </tr>

					</table>
					<hr align="center" size="1"  noshade="noshade"  />
					<table width="770" border="0" cellpadding="1" cellspacing="0">
					  <tr bordercolor="#000000">
						<td width="30" class="style4"><span class="style14">No</span></td>
						<td width="242" class="style4"><span class="style14">Produk</span></td>
						<td class="style12">&nbsp;</td>
						<td width="100" class="style4"><span class="style14">Harga</span></td>
						<td width="73" class="style4"><span class="style14">Jumlah</span></td>

						<td width="119" class="style4"><span class="style14">diskon</span></td>
						<td width="121" class="style4"><span class="style14">Total</span></td>
					  </tr>
					  <tr>
					  <td colspan="7">
						<hr align="center" size="1"  noshade="noshade"  /></td></tr>
					 <?php
							$no = 1;
							$tampil = mysql_query("SELECT * from detail_transaksi o left join produk p on o.c_codeprod=p.kd_obat where id_transaksi='$_GET[id_transaksi]'");
							while($r=mysql_fetch_array($tampil)){
							$harga_diskon = $r['harga_jual'] * $r['diskon'] / 100;
							$harga_real=$r['harga_jual'] - $harga_diskon;

							$total2 = $harga_real * $r['jumlah'];
							$subtotal=number_format($total2,2,",",".");
							$total       = $total + $total2;
							$totalsemua = number_format($total,2,",",".");
						   echo " <tr>
							<td>$no</td>
							<td>$r[id_produk]-$r[c_prodname]</td>
							<td>&nbsp;</td>
							<td>$r[harga_jual]</td>
							<td>$r[jumlah]</td>
							<td>$r[diskon] %</td>
							<td>$subtotal</td>
							</tr>";
							$no++; }
							?>
						<tr>
						<td colspan="7">
						<hr>
						</td>
						</tr><tr>
						<td colspan="6">
						<b>Total</b>
						</td>
						<td>
						<b>Rp.<?php echo"$totalsemua"; ?></b>
						</td>
						</tr>
					</table>
					<button onclick="cetak()" class="hilang">Cetak Data</button>


				</div>
				<!-- col -->


			</div>
			</div>

		</div>

	</section>

<?php
break;
}
?>
<script>

function cetak(){

    window.print();

}

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#modalEditPen').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo"$folder"; ?>/edittransaksi.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.editPendidikan').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		$('.tampildata').load("show_tabel.php");

    });
  </script>

 <script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modalDelete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
 </script>
