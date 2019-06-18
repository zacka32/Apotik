                <?php 
                    include "../../config/koneksi.php";
                    include "../../config/fungsi_hakakses.php";
                    include "../../config/fungsi_log.php";  
                    $folder="modul/mod_produk";       
				?>
				
                <table id="mutasi2" class="display table table-bordered table-striped" width="100%">
					<thead>
						<tr style="background-color: rgba(230, 203, 69, 0.5);">
					
							<th>Kategori Harga</th>
							<th>Harga</th>
							<th>Jumlah Pcs</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 
                        
                        $id  = $_POST['dep'];
						
				
						$no = 1; 
                       
                        $tampil = mysql_query("select * from harga h left join produk p on h.id_produk=p.kd_obat where id_produk='$id'");

						while($r=mysql_fetch_array($tampil)){
						echo "<tr class=gradeX> 
									
								<td><center>$r[kategori_harga]</center></td>
								<td>$r[harga]</td>
								<td>$r[jumlah_pcs]</td>
								<td><a href='#modalEditProd' data-id='$r[id_harga]' class='btn bg-blue smallbtn' data-toggle='modal' id=''><i class='fa fa-fw fa-edit'></i></a></td>
								</tr> ";
						
							$no++; } ?>
											
						</tbody>
						
						</table>

  <div id="modalEditProd" class="modal fade" tabindex="-1"  data-focus-on="input:first">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="editProdHarga"></div>
      </div>
    </div>
  </div>
			
                
<script>
function getAll(data) {
  checkboxes = document.getElementsByName('getAll');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = data.checked;
  }
}
</script>
<script>
	  
 $(document).ready(function() {
    $('#mutasi2').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false,
		
		
    } );

} );

</script>  
<script type="text/javascript">
    $(document).ready(function(){
        $('#modalEditProd').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo"$folder"; ?>/editProdHarga.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.editProdHarga').html(data);//menampilkan data ke dalam modal
                }
            });
         });

    });
  </script>



