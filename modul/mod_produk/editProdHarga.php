<?php include "../../config/koneksi.php"; ?>

		<?php
			$edit = mysql_query("SELECT * from harga
								WHERE id_harga ='$_POST[rowid]'");
			$r    = mysql_fetch_array($edit);
 ?>
		<form method="post" class="formProdukharga">
		<!-- <form method="post" action="modul/mod_karyawan/simpanEditPendidikan.php" class="formPendidikan"> -->
			<input type="hidden" class="form-control" name="id_harga" value="<?php echo "$r[id_harga]";?>" >

		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Edit Harga</h4>
		</div>

			<div class="modal-body form-horizontal">
				<div class="row">
					<div class="col-xl-12">
						
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Kategori Harga</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" disabled name="kategori_harga" value="<?php echo"$r[kategori_harga]";?>">
							</div>
						</div>

						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Harga</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="harga" value="<?php echo"$r[harga]";?>">
							</div>
						</div>

						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Pcs</label>
							<div class="col-sm-8">
							  <input type="number" class="form-control" name="jumlah_pcs" value="<?php echo"$r[jumlah_pcs]";?>">
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
				var data = $('.formProdukharga').serialize();
				$.ajax({
					type: 'POST',
					url: "modul/mod_produk/simpanEditHargaProduk.php",
					data: data
					,
					success: function() {
							// location.reload(true);
							 setTimeout(function () {
						swal('Succes!', ' Berhasil Di Ubah', 'success')
						},10);
						window.setTimeout(function(){
						window.location.replace('media.php?module=produk');
						} ,1500);

					}
				});
			});
		});
	</script>
