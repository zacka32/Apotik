 <?php

$folder="modul/mod_modul";
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]){
  default:
  ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Daftar Master Modul</h3>	
					</div>
				  <div class="col-xl-3 pull-right">
					  <a href="#ModalPen" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></b></a>
					  <!-- <a href="#ModalPen" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></a> -->
				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
					  <!-- <a href="#modalExport" class="btn btn-block btn-default pull-right"data-toggle="modal"><i class="fa fa-fw fa-file-excel-o"></i></a> -->
					  
				  </div>

				</div>

				
				<!-- Custom Tabs -->
				<div class="box-body">
					<!-- <table id="example" class="" cellspacing="0" width="100%"> -->
				  <table id="example1" class="display table table-bordered table-striped" width="100%">
					<thead>
						
						<tr class="color_header">
							<th>ID Modul</th>
							<th>Modul</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$no = 1; 
						$tampil = mysql_query("SELECT * from modul ORDER BY ID_MODUL desc ");
						while($r=mysql_fetch_array($tampil)){

					   echo " <tr class='gradeX'>
					  	<td><center>$r[ID_MODUL]</center></td>
						<td>$r[NAMA_MODUL]</td>
					
						
						<td><a href='#modalEditPen' data-id='$r[ID_MODUL]' class='btn bg-blue smallbtn' data-toggle='modal' id=''><i class='fa fa-fw fa-edit'></i></a>
							"; ?>	
						<a href="#" onclick="confirm_modal('<?php echo"$aksi";?>?module=modul&act=delete&ID_MODUL=<?php echo  $r['ID_MODUL']; ?>');" class="btn bg-red smallbtn"><i class="fa fa-fw fa-close"></i></a></td>
						</td>

						</tr>
					  <?php
						$no++; } ?>
										
					</tbody>
					
					</table>
					
				</div>
				<!-- col -->

				
			</div>
			</div>
			
		</div>
		
	</section>
	
		<div id="ModalPen" class="modal fade small" tabindex="-1"  data-focus-on="input:first" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">

				  <?php echo"<form action='$aksi?module=modul&act=input' enctype='multipart/form-data' method='POST'> ";?>
                      <!-- <input type="hidden" class="form-control" name="C_NIP" value="<?php echo "$C_modul";?>" > -->
                      
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Add Modul</h4>
					</div>

						<div class="modal-body form-horizontal">
							<div class="row">
								<div class="col-xl-12">
									
									<table class="table table-bordered" id="tabelPen">
										<tbody><tr>
											
											<th>Nama Modul</th>
										</tr>

										<td><input type="text" class="form-control" name="NAMA_MODUL"></td>
										
										
										
									</tbody>
									
									</table>

								</div>	
								
                            </div> 

						</div>

					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
						<button type="submit" class="simpanPend btn btn-primary" name="simpanpen">Save</button>
					</div>
				  </form>
				</div>
			</div>
		</div>

		<div id="modalEditPen" class="modal fade" tabindex="-1"  data-focus-on="input:first">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="editPendidikan"></div>
				</div>
			</div>
		</div>

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

}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#modalEditPen').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo"$folder"; ?>/editmodul.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.editPendidikan').html(data);//menampilkan data ke dalam modal
                }
            });
         });
		
    });
  </script>

 <script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modalDelete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
 </script>
