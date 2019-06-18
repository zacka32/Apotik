<?php include "../../config/koneksi.php"; ?>

		<?php
			$edit = mysql_query("SELECT * from produk
								WHERE kd_obat ='$_POST[rowid]'");
			$r    = mysql_fetch_array($edit);
 ?>
		<form method="post" class="formPendidikan">
		<!-- <form method="post" action="modul/mod_karyawan/simpanEditPendidikan.php" class="formPendidikan"> -->
			<input type="hidden" class="form-control" name="c_prodcode" value="<?php echo "$r[kd_obat]";?>" >

		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
		</div>

			<div class="modal-body form-horizontal">
				<div class="row">
					<div class="col-xl-12">
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Kode</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" disabled name="c_prodcode" value="<?php echo"$r[kd_obat]";?>">
							</div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" disabled name="c_realname" value="<?php echo"$r[nm_barang]";?>">
							</div>
						</div>

						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="n_stok" value="<?php echo"$r[stok]";?>">
							</div>
						</div>

						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="n_hargajual" value="<?php echo"$r[harga_jual]";?>">
							</div>
						</div>

					</div>

				</div>

			</div>

		<div class="modal-footer">
			<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
			<a type="submit" class="simpanPend btn btn-primary">Save</a>
		</div>
	</form>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".simpanPend").click(function(){
				var data = $('.formPendidikan').serialize();
				$.ajax({
					type: 'POST',
					url: "modul/mod_produk/simpanEditProduk.php",
					data: data
					,
					success: function() {
							// location.reload(true);
							 setTimeout(function () {
						swal('Succes!', '( <?php echo "$r[c_prodcode]";?> ) Berhasil Di Ubah', 'success')
						},10);
						window.setTimeout(function(){
						window.location.replace('media.php?module=produk');
						} ,1500);

					}
				});
			});
		});
	</script>
