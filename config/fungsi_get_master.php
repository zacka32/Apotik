<?php





	//function get jabatan
	function get_master_customer(){
			$show=mysql_query("SELECT * FROM member");
				if(mysql_num_rows($show) != 0){
					echo '<option value="">Pilih customer</option>';
					while($row = mysql_fetch_array($show)){
						$kd_member = $row['kd_member'];
						$nm_member = $row['nm_member'];
						echo '<option value='.$kd_member.'>'.$nm_member.'</option>';
					}
				}
	}

	//function get karyawan
	function get_master_suppliyer(){
			$show=mysql_query("SELECT * from suppliyer");
				if(mysql_num_rows($show) != 0){
					echo '<option value="">Pilih Suppliyer</option>';
					while($row = mysql_fetch_array($show)){
						$id_suppliyer = $row['id_suppliyer'];
						$nm_suppliyer = $row['nm_suppliyer'];
						echo '<option value='.$id_suppliyer.'>'.$nm_suppliyer.'</option>';
					}
				}
	}

	
	



	

	//function get master Aplikasi
	function get_master_kategori(){
		$show=mysql_query("SELECT * FROM kategori");
			if(mysql_num_rows($show) != 0){
				echo '<option value="">Pilih</option>';
				while($row = mysql_fetch_array($show)){
					$kd_kategori = $row['kd_kategori'];
					$nm_kategori = $row['nm_kategori'];
					echo "<option value='$kd_kategori'>$nm_kategori</option>";
				}
			}
	}

	//function get master Aplikasi
	function get_master_produk(){
		$show=mysql_query("SELECT * FROM produk");
			if(mysql_num_rows($show) != 0){
				echo '<option value="">Pilih</option>';
				while($row = mysql_fetch_array($show)){
					$c_prodcode = $row['c_prodcode'];
					$c_realname = $row['c_realname'];
					echo "<option value='$c_prodcode'>$c_prodcode - $c_realname</option>";
				}
			}
	}

	 ?>
