 <?php
$folder="modul/mod_laporan";
$aksi="modul/mod_laporan/aksi_laporan.php";
switch($_GET[act]){
  default:
  ?>


	<section class="content">
		<div class="row">
			<div class="col-md-3"></div> 
			<div class="col-md-6">
			<div class="box">
				<div class="box-header">
				<h3 class="box-title">Laporan/Rekapan</h3>	
					
				 
				</div>

				<?php echo "<form method=POST class='form-horizontal' enctype='multipart/form-data' action=$aksi?module=cuti&act=tambahcuti> ";?>
				<!-- Custom Tabs -->
				<div class="box-body">
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Jenis Laporan</label>
						<div class="col-sm-8">
							<div class="input-group">
								<select name="jenis" class="form-control">
									<option value="penjualan">Penjualan</option>
									<option value="pembelian">Pembelian</option>
								</select>
							</div>
						</div>
					</div> 
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Tanggal Mulai</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" required name="mulai" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
							</div>
						</div>
					</div> 
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Tanggal Akhir</label>
						<div class="col-sm-8">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" required name="akhir" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
							</div>
						</div>
					</div> 

					
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-default" onclick=self.history.back()>Batal</button>
					<button type="submit" class="btn btn-info pull-right">Export To Excel</button>
             	 </div>
				<!-- col -->
			  </form>

				
			</div>
			</div>
			
		</div>
		
	</section>

<?php

break;
}
?>	






