<?php include "../../config/koneksi.php"; ?>

		<div id="ModalPen" class="modal fade small" tabindex=""  data-focus-on="input:first" style="display: none;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					
				  <form method="post" class="formPendidikan">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Add Produk</h4>
					</div>

						<div class="modal-body form-horizontal">
							<div class="row">
								<div class="col-xl-12">
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label">Produk </label>
												<div class="col-md-6">
													<select name="id_produk" class="form-control select2" required style="width:100%">
															<?php  echo get_master_produk(); ?>
													</select>												
												</div>
												<div class="col-md-1">										
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">Kode Produk </label>
													<div class="col-md-7">
														<input type="text" class="form-control" disabled name="" value="<?php echo "$C_KODEJAB";?>">											
													</div>
													
												</div>
												
										</div> 
										<hr />
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label"> Harga </label>
												<div class="col-md-3">
													<input type="number" class="form-control" readonly name="harga" value="<?php echo "$C_KODEJAB";?>">																						
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">diskon satuan</label>
													<div class="col-md-7">
														<div class="input-group">
															<input type="number" class="form-control" name="diskon">
															<div class="input-group-addon">
															  %
															</div>
														</div>
														
													</div>										
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label">jumlah beli</label>
													<div class="col-md-7">
														<input type="number" class="form-control" name="jml">											
													</div>										
												</div>
										</div> 
										
										<div class="form-group">
											<label for="inputPassword3" class="col-md-1 control-label"> Stok </label>
												<div class="col-md-3">
													<input type="number" class="form-control" readonly name="harga" value="<?php echo "$C_KODEJAB";?>">																						
												</div>
												<div class="col-md-4">
																							
												</div>
												<div class="col-md-4">
													<label for="inputPassword3" class="col-md-5 control-label"></label>
													<div class="col-md-7">
													
													</div>										
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
						 $('#ModalPen').modal('toggle');
						 return false;
					}
				});
			});
		});
	</script>
