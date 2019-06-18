<?php
$folder="modul/mod_produk";
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  default:
  if (hakakses($nik,$module,'lihat','')) {
  ?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				  <div class="col-xl-6 pull-left"><h3 class="box-title">Daftar Produk</h3>
					</div>
				  <div class="col-xl-3 pull-right">
            <a href="#ModalPen" class="btn btn-block btn-success pull-right"  data-toggle="modal"><b><i class="fa fa-fw fa-user-plus"></i>Add</b></a>

				  </div>
				  <div class="col-xl-3 pull-right"style="margin-right: 3px;">
				  </div>

				</div>


				<!-- Custom Tabs -->
				<div class="box-body">

				  <table id="hrd1" class="display table" width="100%">
					<thead>

						<tr class="color_header">
						    <th class="hidden"></th>

							<th>Kode</th>
							<th>Nama</th>
							<th>Stok</th>
							<th>kategori</th>
							<th>Supliyer</th>
							<th>Tgl Expired</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$tampil = mysql_query("select * from produk p left join kategori k on p.kategori=k.kd_kategori left join suppliyer s on p.suppliyer=s.id_suppliyer");
						while($r=mysql_fetch_array($tampil)){



					  echo " <tr class='gradeX'>
					   <td class='hidden' scope='col'><input type='radio' name='dep' id='$r[kd_obat]' class='dep' onclick='get_id();' value='$r[kd_obat]'></td>
					   	<td width='10'><center>$r[kd_obat]</center></td>
						<td>$r[nm_barang]</td>
						<td>$r[stok] Pcs</td>
			            <td>$r[nm_kategori]</td>
			             <td>$r[nm_suppliyer]</td>
			            <td>$r[tgl_expired]</td>
						<td><a href='#modalEditPen' data-id='$r[kd_obat]' class='btn bg-blue smallbtn' data-toggle='modal' id=''><i class='fa fa-fw fa-edit'></i></a>
							<a href=\"#\" onclick=\"confirm_modal('modul/mod_produk/aksi_produk.php?module=produk&act=delete&kd_obat=$r[kd_obat]');\" class=\"btn bg-red smallbtn\"><i class=\"fa fa-fw fa-close\"></i></a>
						</td>	
					</tr> ";
						$no++; } ?>



					</tbody>

					</table>

					<div id="showtable"></div>

				</div>
				<!-- col -->


			</div>
			</div>

		</div>

	</section>

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

	 <script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modalDelete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
 </script>

  <div id="ModalPen" class="modal fade small" tabindex="-1"  data-focus-on="input:first" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php
        // $n = mysql_query("SELECT SUBSTRING(kd_obat, 2 ,4) kd_obat from produk order by kd_obat DESC LIMIT 1");
          // $qn    = mysql_fetch_array($n);
          // //tambahkan nol di belakang angka
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
          // $nilai = $qn['kd_obat']+1;
          // $kd_obat = tambah_nol($nilai,4);

          ?>

        <?php echo"<form action='$aksi?module=produk&act=input' enctype='multipart/form-data' method='POST'> ";?>
                
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Produk</h4>
        </div>

          <div class="modal-body form-horizontal">
            <div class="row">
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nm_barang" required >
                  </div>
                </div>
              </div>
              
              <div class="col-xl-12">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="stok"  required>
                  </div>
                </div>
              </div>



              <div class="col-xl-12">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>
					<div class="col-sm-6">
						<select name="kategori" class="form-control select2" style="width: 100%;" id="2" required >

								<?php  echo get_master_kategori(); ?>
						</select>
					</div>
				</div>
			  </div>
				
				<div class="col-xl-12">
					<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Suppliyer</label>
						<div class="col-sm-6">
							<select name="supliyer" class="form-control select2" style="width: 100%;" id="2" required >
									<?php  echo get_master_suppliyer(); ?>
							</select>
						</div>
					</div>
			    </div>
				
				<div class="col-xl-12">
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Tanggal Expired</label>
						<div class="col-sm-6">
							 <input type="date" class="form-control" name="tgl_expired"  required>
						</div>
					</div>
				</div>
			</div>
			
			<table class="table table-striped" style="    border: 1px solid #e0e0c6;">
				<tbody>
				<tr>
					<th>Jenis</th>
					<th>Harga</th>
					<th>Jumlah Satuan</th>
				</tr>
				
				
				<tr>
					<td><input type="text" class="form-control" name="kategori_harga[]" value="Satuan" readonly></td>
					<td><input type="text" class="form-control" name="harga[]" value="0"  ></td>
					<td><input type="text" class="form-control" name="jumlah_pcs[]" value="1"  ></td>
				</tr>  
				
				<tr>
					<td><input type="text" class="form-control" name="kategori_harga[]" value="Strip" readonly></td>
					<td><input type="text" class="form-control" name="harga[]" value="0" ></td>
					<td><input type="text" class="form-control" name="jumlah_pcs[]" value="0" ></td>
				</tr>  
				
				<tr>
					<td><input type="text" class="form-control" name="kategori_harga[]" value="Pack" readonly></td>
					<td><input type="text" class="form-control" name="harga[]" value="0" ></td>
					<td><input type="text" class="form-control" name="jumlah_pcs[]" value="0"  ></td>
				</tr>  
				
				<tr>
					<td><input type="text" class="form-control" name="kategori_harga[]" value="Dus" readonly></td>
					<td><input type="text" class="form-control" name="harga[]" value="0" ></td>
					<td><input type="text" class="form-control" name="jumlah_pcs[]" value="0"  ></td>
				</tr>  
			 
				
				</tbody>
			</table>	

		 
		 

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
                url : '<?php echo"$folder"; ?>/editProduk.php',
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
	   tambahlog($nik,$module,'produk','GAGAL');
	   echo "<script>alert('Anda Tidak Memiliki Akses !');
			   window.location.href='?module=home'</script>";
	}
 break;

   case "tarik_produk":

?>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
			<div class="box">
				<div class="box-header">
				 <h3 class="box-title">Upload Produk</h3>
				</div>


				<!-- Custom Tabs -->
				<div class="box-body">
					<div class="col-xs-4">

					</div>
					<div class="col-xs-4">
							<?php echo"<form action='modul/mod_produk/simpanProduk.php' enctype='multipart/form-data' method='POST' class='form-horizontal'> ";?>
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

		});
	</script>
<script>
	  
 $(document).ready(function() {
    $('#hrd1').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
        "paging":         false,
		
		
    } );

//cek row table agak tampil checkbox
	$('#hrd1 tr').click(function() {
		$(this).find('td input:radio').prop('checked', true);
		get_id();
	});

		

} );



</script>  

<script>
$(document).ready(function() {
    var table = $('#hrd1').DataTable();
 
    $('#hrd1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
	
	 
    // $('#button').click( function () {
    //     table.row('.selected').remove().draw( false );
    // } );
} );

</script> 
<script>

if($('input[name="dep"]').is(':checked')){
    $('input[name="dep"]:checked').trigger('click');
}

  function get_id(){
		// var a = $("[name=dep]:checked").val();
		
  		var a = $("input:radio[name=dep]:checked").val();
  // var a = this.value;
		$.ajax({
		type: 'POST',
		url: "modul/mod_produk/show_spesial.php",
		data: "dep="+a,
		success: function(info) {
			$("#showtable").html(info);   }
		});
  	return false;
  }
</script>
