<?php

function hakakses($nik,$modul,$aksi) {
  $idgroup    = $_SESSION['idgroup'];
  
  date_default_timezone_set('Asia/Jakarta');
  $tanggal=date('Y-m-d H:i:sa');

  $z = mysql_query("SELECT * FROM admins WHERE nik = '$nik' AND superuser='Y' ");
  $admin = mysql_fetch_row($z);

	if ($admin > 0){
		return true;
	}
	else {
	  
		if(empty($action)) {
			
			
			$query = mysql_query("SELECT * FROM akses WHERE (nik = '$nik' OR id_group='$idgroup') AND modul= '$modul' AND $aksi = 'Y' ");
			$akses = mysql_fetch_row($query);
		  
			if ($akses > 0){
			  //mysql_query("INSERT INTO log_user (nik,modul,aksi,status,waktu) VALUES ('$nik','$modul','$aksi','SUKSES','$tanggal')");
			return true;
			}else{
			  //mysql_query("INSERT INTO log_user (nik,modul,aksi,status,waktu) VALUES ('$nik','$modul','$aksi','GAGAL','$tanggal')");
			return false;
			}
		}
		else {
			$q = mysql_query("SELECT * FROM akses a left join detail_akses d on a.id=d.id_akses where (a.nik = '$nik' OR a.id_group='$idgroup') AND a.modul= '$modul' AND d.action='$action'");
			$spesifik = mysql_fetch_row($q);
			
			if ($spesifik > 0){
		
				return true;
			}else{
			
				return false;
		  
			}
		}
    }



}

?>