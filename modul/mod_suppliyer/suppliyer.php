<?php
$folder="modul/mod_suppliyer";
$aksi="modul/mod_suppliyer/aksi_suppliyer.php";
switch($_GET[act]){
  default:
  if (hakakses($nik,$module,'lihat','')) {
  ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Daftar suppliyer</h3>
					</div>
				  <div class="col-xl-3 pull-right">
						<a href="#ModalPen" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></a>

				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
				  </div>

				</div>


				<!-- Custom Tabs -->
				<div class="box-body">

				  <table id="example1" class="display table table-bordered table-striped" width="100%">
					<thead>

						<tr class="color_header">

							<th>Id Suppliyer</th>
							<th>Nama</th>
							<th>Alamat</th>
							
              <th>Telp</th>
           
<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$tampil = mysql_query("select * from suppliyer");
						while($r=mysql_fetch_array($tampil)){



					   echo " <tr class='gradeX'>

					  	<td width='20'><center>$r[id_suppliyer]</center></td>
						<td>$r[nm_suppliyer]</td>
						<td>$r[alamat]</td>
						
						<td>$r[telp]</td>
						<td><a href='#modalEditPen' data-id='$r[id_suppliyer]' class='btn bg-blue smallbtn' data-toggle='modal' id='' title='Klik untuk edit' data-tt='tooltip' data-placement='top'
			  ><i class='fa fa-fw fa-edit'></i></a></td>
							  </tr>  ";
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
        

        <?php echo"<form action='$aksi?module=suppliyer&act=input' enctype='multipart/form-data' method='POST'> ";?>
                    <!-- <input type="hidden" class="form-control" name="C_NIP" value="<?php echo "$id_suppliyer";?>" > -->

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">suppliyer</h4>
        </div>

          <div class="modal-body form-horizontal">
            <div class="row">
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nm_suppliyer" required >
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" required >
                  </div>
                </div>
              </div>

              
              <div class="col-xl-12">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No Telp</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="telp"  required>
                  </div>
                </div>
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
</div>

  <div id="modalEditPen" class="modal fade" tabindex="-1"  data-focus-on="input:first">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="editPendidikan"></div>
      </div>
    </div>
  </div>

	<script type="text/javascript">
    $(document).ready(function(){
        $('#modalEditPen').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo"$folder"; ?>/editsuppliyer.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.editPendidikan').html(data);//menampilkan data ke dalam modal
                }
            });
         });

    });
  </script>

<?php
  } else{
	   tambahlog($nik,$module,'suppliyer','GAGAL');
	   echo "<script>alert('Anda Tidak Memiliki Akses !');
			   window.location.href='?module=home'</script>";
	}
 break;

   case "tarik_suppliyer":

?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				 <h3 class="box-title">Upload suppliyer</h3>
				</div>


				<!-- Custom Tabs -->
				<div class="box-body">
					<div class="col-xs-4">

					</div>
					<div class="col-xs-4">
							<?php echo"<form action='modul/mod_suppliyer/simpansuppliyer.php' enctype='multipart/form-data' method='POST' class='form-horizontal'> ";?>
						<!-- <form class="form-inline" method="post" action=""> -->
						<div class="form-group">
							<label class="control-label">File Harus Dengan Nama (absen)</label>
							<input type="file" class="filestyle" id="BSbtninfo" data-icon="false" required name="uploads">
						</div>

						<div class="input-group">
							<br>
							<input type="submit" class="btn btn-primary" value="Start upload">
						</div>
						<br>
						<!-- progress bar -->
						<div class="progress" style="display:none">
							<div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
								<span class="sr-only">0%</span>
							</div>
						</div>
						<div class="msg alert alert-info text-left" style="display:none"></div>
					</div>
					<div class="col-xs-4">

					</div>
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

	<script type="text/javascript" src="bootstrap/js/bootstrap-filestyle.min.js"> </script>

	<script>
		$(function() {
		$(document).on('change', ':file', function() {
			var input = $(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [numFiles, label]);
		});

		// $(document).ready( function() {
		// 	$(':file').on('fileselect', function(event, numFiles, label) {

		// 		var input = $(this).parents('.input-group').find(':text'),
		// 			log = numFiles > 1 ? numFiles + ' files selected' : label;

		// 		if( input.length ) {
		// 			input.val(log);
		// 		} else {
		// 			if( log ) alert(log);
		// 		}

		// 	});
		// });

		});
	</script>
<script type="text/javascript">
