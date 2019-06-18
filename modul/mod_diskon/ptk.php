<?php
$folder="modul/mod_ptk";
$aksi="modul/mod_ptk/aksi_ptk.php";
switch($_GET[act]){
  default:
  if (hakakses($nik,$module,'lihat','')) { 
  ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Daftar PTK</h3>	
					</div>
				  <div class="col-xl-3 pull-right">
					  <a href="?module=ptk&act=addptk" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></b></a> 
				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
				  </div>

				</div>

				
				<!-- Custom Tabs -->
				<div class="box-body">
					
				  <table id="example1" class="display table table-bordered table-striped" width="100%">
					<thead>
						
						<tr class="color_header">
							<th>ID_PTK</th>
							<th>DEPT</th>
							<th>JABATAN</th>
							<th>JML DIBUTUHKAN</th>
							<th>BULAN/MINGGU</th>
							<th>STATUS</th>
							
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$no = 1; 
						$tampil = mysql_query("SELECT p.*,d.C_DEPNAME, j.C_NAMAJAB from ptk p 
												left join dep d on p.C_DEPCODE=d.C_DEPCODE
												left join jabatan j on p.C_KODEJAB=j.C_KODEJAB ");
						while($r=mysql_fetch_array($tampil)){
							
							if($r['STATUS_PTK']=='1') {
								$status="New";
								$class="warning";
							}
							elseif($r['STATUS_PTK']=='2'){
								$status="Waiting for Hrd Approval";
								$class="primary";
								
							}
							elseif($r['STATUS_PTK']=='3'){
								$status="Waiting for Direksi Approval ";
								$class="info";
								
							}
							elseif($r['STATUS_PTK']=='4'){
								$status="Approved";
								$class="success";
								
							}
							elseif($r['STATUS_PTK']=='5'){
								$status="Rejected";
								$class="danger";
								
							}
							else {
								$status="New";
								$class="warning";
							}
							
					   echo " <tr class='gradeX'>
					  	<td width='120'><center>$r[ID_PTK]</center></td>
						<td>$r[C_DEPNAME]</td>
						<td>$r[C_NAMAJAB]</td>
						<td>$r[JMLDIBUTUHKAN]</td>
						<td>$r[BATAS_WAKTU]</td>
						<td><p class='label label-$class'>$status</p></td>
					
						<td><center><a href='?module=ptk&act=detail&ID_PTK=$r[ID_PTK]' class='btn-sm btn-info' style='width: 20px;' data-tt='tooltip' data-placement='top' title='klik untuk liat detail'><i class='fa fa-fw fa-search-plus'  ></i></a>
								   </center>";
						 if (hakakses($nik,$module,'lihat','delete3')) { 
						 echo"<a href='?module=ptk&act=detail&ID_PTK=$r[ID_PTK]' class='btn-sm btn-info' style='width: 20px;' data-tt='tooltip' data-placement='top' title='klik untuk liat detail'><i class='fa fa-fw fa-plus'  ></i></a>";
						 }
						 else{
						   
					    }
						echo"
							 </td> 	
								   </tr> ";
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
  } else{
	   tambahlog($nik,$module,'ptk','GAGAL');
	   echo "<script>alert('Anda Tidak Memiliki Akses !');
			   window.location.href='?module=home'</script>";
	}
 break; 
 case "addptk": 
	 
 ?>
	<!-- Script Tambah Karyawan -->
<section class="content">
<div class="row">
<div class="col-md-2">
		</div>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header" style="text-align: center;  border-bottom: 1px solid #e2dede;">
				<i class="fa fa-file-text"></i><h3 class="box-title">FORM PERMINTAAN TENAGA KERJA</h3>
			</div>
				<!-- Custom Tabs -->
<?php 
echo"<form action='$aksi?module=ptk&act=input' enctype='multipart/form-data' method='POST' class='form-horizontal'> ";?>
			<div class="box-body ">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-3 control-label">Kode Perusahaan </label>
					<div class="col-sm-5">
						<select name="C_KDPERUSAHAAN" class="form-control" required>
							 <option value="">Pilih Kode</option>
							 <option value="00">Holding</option>
							 <option value="01">ICI</option>
							 <option value="02">PAC</option>
							 <option value="03">IPL</option>
							 <option value="04">RTA</option>
						</select>
					</div>
				</div> 

				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label">DEPARTEMENT / DIVISI</label>

				    <div class="col-sm-5">
						<select name="C_DEPCODE" class="form-control" required>
								<?php  echo get_master_departement(); ?>
						</select>
				    </div>
                </div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label">Nama Jabatan</label>

				    <div class="col-sm-5">
						<select name="C_KODEJAB" class="form-control select2" required> 
								<?php  echo get_master_jabatan(); ?>
						</select>
				    </div>
                </div>
				
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label">Uraian Jabatan</label>

				    <div class="col-sm-8">
						<textarea name="URAIAN_JABATAN" class="form-control"></textarea>
				    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Dibutuhkan</label>

                    <div class="col-sm-3">
						<div class="input-group">
							<input type="number" class="form-control" name="JMLDIBUTUHKAN">
							<span class="input-group-addon">Orang</span>
						</div>
				
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Alasan Kebutuhan</label>

                    <div class="col-sm-8">
						<textarea name="ALASAN" class="form-control"></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-12 control-label"><hr/></label>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Minggu Ke/ Bulan</label>

                    <div class="col-sm-5">
						<input type="date" class="form-control" name="BATAS_WAKTU" id=>
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Tgl masuk yang diminta</label>

                    <div class="col-sm-5">
						<input type="date" class="form-control" name="TGL_MINTA_MASUK">
                    </div>
                </div>
				
				
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Pendidikan</label>

                    <div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="SMA">
							  SMA
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value=" D1">
							   D1
							</label>
						</div>
                    </div>
					<div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="STM">
							  STM
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="D II">
							   D II
							</label>
						</div>
                    </div>
					
					<div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="D III">
							   D III
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="S1">
							  S1
							</label>
						</div>
                    </div>
					<div class="col-sm-3">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="Analis Kimia">
							  Analis Kimia
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="SAA">
							   SAA
							</label>
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENDIDIKAN[]" value="S2">
							   S2
							</label>
						</div>
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Usia</label>

                    <div class="col-sm-3">
						<div class="input-group">
							<input type="number" class="form-control" name="USIA">
							<span class="input-group-addon">Tahun</span>
						</div>
				
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin</label>

                    <div class="col-sm-8">
						<div class="radio">
							<label>
							  <input type="radio" name="KELAMIN" id="" value="L" checked="">
							  Laki-laki
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="KELAMIN" id="" value="P">
							  Wanita
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="KELAMIN" id="" value="Tidak Dipermasalahkan">
							  Tidak Dipermasalahkan
							</label>
						</div>
				
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Pengalaman</label>

                    <div class="col-sm-3">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENGALAMAN[]" value="Fresh Graduate">
							  Fresh Graduate
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENGALAMAN[]" value="1 tahun">
							   1 tahun
							</label>
						</div>
                    </div>
					
					<div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENGALAMAN[]" value="2 tahun">
							  2 tahun
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="PENGALAMAN[]" value=">2 tahun">
							   >2 tahun
							</label>
						</div>
                    </div>
                </div>
				
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Keterampilan</label>

                    <div class="col-sm-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="SKILL[]" value="Komputer">
							  Komputer
							</label>
							
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="SKILL[]" value="B. Inggris">
							   B. Inggris
							</label>
						</div>
                    </div>
					
					<div class="col-sm-7">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="SKILL[]" value="Mengemudi">
						  Mengemudi
						</label>
						
					</div>
					
					<div class="checkbox">
						<label>
							<input type="checkbox" name="" id="lainnya" value="" >
						   Lainnya
						   <input type="text" id="ket" name="SKILL[]" class="form-control" disabled >
						</label>
					</div>
				</div>
					
					
				</div>	
					
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Lowongan direkrut dari</label>

                    <div class="col-sm-8">
						<div class="radio">
							<label>
							  <input type="radio" name="TYPE" id="" value="Internal" checked="">
							  Internal
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="TYPE" id="" value="External">
							  External
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="TYPE" id="" value="Tidak Dipermasalahkan">
							  Tidak Dipermasalahkan
							</label>
						</div>
				
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Status</label>

                    <div class="col-sm-8">
						<div class="radio">
							<label>
							  <input type="radio" name="STATUS" id="" value="Menikah" checked="">
							  Menikah
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="STATUS" id="" value="Belum Menikah">
							  Belum Menikah
							</label>
						</div>
						
						<div class="radio">
							<label>
							  <input type="radio" name="STATUS" id="" value="Tidak Dipermasalahkan">
							  Tidak Dipermasalahkan
							</label>
						</div>
				
                    </div>
                </div>
				
				<div class="form-group">
                   <label for="inputEmail3" class="col-sm-3 control-label">Keterangan Tambahan</label>

                    <div class="col-sm-8">
						<textarea name="KETERANGAN" class="form-control"></textarea>
                    </div>
                </div>
				
				
               
				
				
			</div>	
			<div class="box-footer">
				<button type="submit" class="btn btn-default" onclick="self.history.back()">Batal</button>
				<button type="submit" class="btn btn-info pull-right">Simpan</button>
			 </div>
		</form>
			
		</div>
    </div>		


	
	
	</div>
</section>  	

<script> 
$(document).ready(function() {
	
	
	$('#lainnya').change(function(){
		$("#ket").prop("disabled", !$(this).is(':checked'));
	 });
	 
	
});
</script>
 
 
   <?php break;  
?>

<?php
  	 break; 
	 case "detail": 
	 $tampil = mysql_query("SELECT p.*,d.C_DEPNAME, j.C_NAMAJAB from ptk p 
												left join dep d on p.C_DEPCODE=d.C_DEPCODE
												left join jabatan j on p.C_KODEJAB=j.C_KODEJAB WHERE ID_PTK='$_GET[ID_PTK]'");
						$z=mysql_fetch_array($tampil);
								?>
	<!-- Script Tambah Karyawan -->
<section class="content">
<div class="row">
<div class="col-md-2">
		</div>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header" style="text-align: center;  border-bottom: 1px solid #e2dede;">
				<i class="fa fa-file-text"></i><h3 class="box-title">FORM PERMINTAAN TENAGA KERJA</h3>
			</div>
				<!-- Custom Tabs -->
<?php 
echo"<form action='$aksi?module=ptk&act=input' enctype='multipart/form-data' method='POST' class='form-horizontal'> ";?>
			<div class="box-body ">
				<table class="table table-hover">
					<tr>
						<td>ID_PTK</td>
						<td>:</td>
						<td><?php echo"$z[ID_PTK]"; ?></td>
					</tr>
					<tr>
						<td>DEPARTEMENT / DIVISI</td>
						<td>:</td>
						<td><?php echo"$z[C_DEPNAME]"; ?></td>
					</tr>
					<tr>
						<td>Nama Jabatan</td>
						<td>:</td>
						<td><?php echo"$z[C_NAMAJAB]"; ?></td>
					</tr>
					<tr>
						<td>Uraian Jabatan</td>
						<td>:</td>
						<td><?php echo"$z[URAIAN_JABATAN]"; ?></td>
					</tr>
					
					<tr>
						<td>Jumlah Dibutuhkan</td>
						<td>:</td>
						<td><?php echo"$z[JMLDIBUTUHKAN]"; ?> Orang</td>
					</tr>
					
					<tr>
						<td>Alasan Kebutuhan</td>
						<td>:</td>
						<td><?php echo"$z[ALASAN]"; ?></td>
					</tr>
					
					<tr>
						<td>Minggu Ke/ Bulan</td>
						<td>:</td>
						<td><?php echo"$z[BATAS_WAKTU]"; ?></td>
					</tr>
					
					<tr>
						<td>Tgl masuk yang diminta</td>
						<td>:</td>
						<td><?php echo"$z[TGL_MINTA_MASUK]"; ?></td>
					</tr>
					
					<tr>
						<td>Pendidikan</td>
						<td>:</td>
						<td><?php $tampil = mysql_query("SELECT * FROM ptk_detail WHERE JENIS='PENDIDIKAN' AND ID_PTK='$_GET[ID_PTK]'");
						while($h=mysql_fetch_array($tampil)){

						echo " <i class='fa fa-fw fa-check'></i>$h[NILAI] &nbsp;&nbsp;"; } ?> </td>
					</tr>
					
					<tr>
						<td>Usia</td>
						<td>:</td>
						<td><?php echo"$z[USIA]"; ?> Tahun</td>
					</tr>
					
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php echo"$z[KELAMIN]"; ?></td>
					</tr>
					
					<tr>
						<td>Pengalaman</td>
						<td>:</td>
						<td><?php $tampil = mysql_query("SELECT * FROM ptk_detail WHERE JENIS='PENGALAMAN' AND ID_PTK='$_GET[ID_PTK]'");
						while($t=mysql_fetch_array($tampil)){

						echo " <i class='fa fa-fw fa-check'></i>$t[NILAI] &nbsp;&nbsp;"; } ?> </td>
					</tr>
					
					<tr>
						<td>Keterampilan</td>
						<td>:</td>
						<td><?php $tampil = mysql_query("SELECT * FROM ptk_detail WHERE JENIS='SKILL' AND ID_PTK='$_GET[ID_PTK]'");
						while($y=mysql_fetch_array($tampil)){

						echo " <i class='fa fa-fw fa-check'></i>$y[NILAI] &nbsp;&nbsp;"; } ?> </td>
					</tr>
					
					<tr>
						<td>Lowongan direkrut dari</td>
						<td>:</td>
						<td><?php echo"$z[TYPE]"; ?></td>
					</tr>
					
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo"$z[STATUS]"; ?></td>
					</tr>
					
					<tr>
						<td>Keterangan Tambahan</td>
						<td>:</td>
						<td><?php echo"$z[KETERANGAN]"; ?></td>
					</tr>
					
				</table>
				<br>
				<?php $s = mysql_query("SELECT ID_KARYAWAN,C_NIP,C_NAMA,D_MASUK FROM mskry WHERE ID_PTK='$_GET[ID_PTK]'"); 			
						$num=mysql_num_rows($s);
			
				echo "
				<b>Terpenuhi : &nbsp; $num  Orang</b>";
				?>
				<table class="table table-hover">
				<tr>
						<th>C_NIP</th>
						<th>C_NAMA</th>
						<th>Tgl Masuk</th>
						<th>Action</th>
					</tr>
				<?php
						while($h=mysql_fetch_array($s)){
							$D_MASUK=tgl_indo($h['D_MASUK']);
					echo "
					<tr>
						<td>$h[C_NIP]</td>
						<td>$h[C_NAMA]</td>
						<td>$D_MASUK</td>
						<td><a href='?module=karyawan&act=viewKaryawan&ID_KARYAWAN=$h[ID_KARYAWAN]' class='btn-sm btn-info' style='width: 20px;' data-tt='tooltip' data-placement='top' title='klik untuk liat detail'><i class='fa fa-fw fa-search-plus'  ></i></a>
						</td>
					</tr>";
						 } ?>
				</table>	
				
				
				
               
				
				
			</div>	
			
		</div>
    </div>		


	
	
	</div>
</section>  	


 
 
   <?php break;  
}
?>

