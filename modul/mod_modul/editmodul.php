<?php include "../../config/koneksi.php"; ?>
	
		<?php
			$edit = mysql_query("SELECT * from modul
								WHERE C_KODEJAB =$_POST[rowid]");			
			$r    = mysql_fetch_array($edit); ?>

		<form method="post" class="formPendidikan">
		<!-- <form method="post" action="modul/mod_karyawan/simpanEditPendidikan.php" class="formPendidikan"> -->
			<input type="hidden" class="form-control" name="C_KODEJAB" value="<?php echo "$r[C_KODEJAB]";?>" >
			
		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Edit Riwayat Pendidikan</h4>
		</div>
		
			<div class="modal-body form-horizontal">
				<div class="row">
					<div class="col-xl-12">
						<table class="table table-bordered" id="tabelPen">
							<tbody><tr>
								<th>Kode Golongan</th>
								<th>Description</th>
							</tr>
							<td><input type="text" class="form-control" name="C_KODEJAB" value="<?php echo "$r[C_KODEJAB]";?>" disabled></td>
							<td><input type="text" class="form-control" name="C_NAMAJAB" value="<?php echo "$r[C_NAMAJAB]";?>" required></td>
						
						</tbody>
						</table>

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
					url: "modul/mod_modul/simpanEditmodul.php",
					data: data
					,
					success: function() {
							// location.reload(true);
							 setTimeout(function () {  
						swal('Succes!', '( <?php echo "$r[C_KODEJAB]";?> ) Berhasil Di Ubah', 'success')
						},10); 
						window.setTimeout(function(){ 
						window.location.replace('media.php?module=modul');
						} ,1500); 	
							
					}
				});
			});
		});
	</script>

