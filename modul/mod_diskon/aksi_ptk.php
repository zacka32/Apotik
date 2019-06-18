<script src="../../dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../dist/sweetalert.css">

<?php
session_start();
if (empty($_SESSION['nik']) AND empty($_SESSION['passuser'])){
  echo "<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel='stylesheet' href='bootstrap/css/bootstrap.css'>
    <link rel='stylesheet' href='dist/css/AdminLTE.css'>
    <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
       echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
  include "../../config/koneksi.php";
  include "../../config/fungsi_hakakses.php";
  include "../../config/fungsi_log.php";
   include "../../config/fungsi_sendNotif.php";

  $nik=$_SESSION['nik'];
   $atasan=$_SESSION['atasan'];
  $module=$_GET['module'];
  $act=$_GET['act'];

  // $codePerusahaan = 1;
  
    if ($module=='ptk' AND $act=='input'){
      $insert = mysql_query("INSERT INTO `ptk` (`C_KDPERUSAHAAN`,
											      `C_DEPCODE`, 
                                                  `C_KODEJAB`, 
                                                  `URAIAN_JABATAN`, 
                                                  `JMLDIBUTUHKAN`, 
                                                  `ALASAN`,
												  `BATAS_WAKTU`, 
                                                  `TGL_MINTA_MASUK`,
												  `USIA`,
												  `KELAMIN`,
												  `TYPE`,
												  `STATUS`,
												  `KETERANGAN`,
												  `CREATED_USER`,
												  `CREATED_DATE`) 
                                          VALUES ('$_POST[C_KDPERUSAHAAN]',
												  '$_POST[C_DEPCODE]', 
                                                  '$_POST[C_KODEJAB]',
												  '$_POST[URAIAN_JABATAN]',
												  '$_POST[JMLDIBUTUHKAN]',
												  '$_POST[ALASAN]',
												  '$_POST[BATAS_WAKTU]',
												  '$_POST[TGL_MINTA_MASUK]',
												  '$_POST[USIA]',
												  '$_POST[KELAMIN]',
												  '$_POST[TYPE]',
												  '$_POST[STATUS]',
												  '$_POST[KETERANGAN]',
												  '$nik',
                                                  NOW()) 
							");
				$last_id =mysql_insert_id();
				
				//insert pendidikan
				$PENDIDIKAN = $_POST['PENDIDIKAN'];
                $count1 = count($PENDIDIKAN);
				
				for($i=0;$i<$count1;$i++){   
                 $insert = mysql_query("INSERT INTO `ptk_detail` (`ID_PTK`, 
                                                               `JENIS`, 
                                                               `NILAI`
                                                               ) 
                                                       VALUES ('$last_id', 
                                                               'PENDIDIKAN', 
                                                               '$PENDIDIKAN[$i]'
                                                               ) ");               
                }
				
				//insert PENGALAMAN
				$PENGALAMAN = $_POST['PENGALAMAN'];
                $count2 = count($PENGALAMAN);
				
				for($i=0;$i<$count2;$i++){   
                 $insert = mysql_query("INSERT INTO `ptk_detail` (`ID_PTK`, 
                                                               `JENIS`, 
                                                               `NILAI`
                                                               ) 
                                                       VALUES ('$last_id', 
                                                               'PENGALAMAN', 
                                                               '$PENGALAMAN[$i]'
                                                               ) ");               
                }
				
				//insert SKILL.
				$SKILL = $_POST['SKILL'];
                $count3 = count($SKILL);
				
				for($i=0;$i<$count3;$i++){   
                 $insert = mysql_query("INSERT INTO `ptk_detail` (`ID_PTK`, 
                                                               `JENIS`, 
                                                               `NILAI`
                                                               ) 
                                                       VALUES ('$last_id', 
                                                               'SKILL', 
                                                               '$SKILL[$i]'
                                                               ) ");               
                }
												
				//kirim notif ke hp atasan  $message,$title,$nik
					sendNotification('Permintaan Approve PTK dari '.$nik.'','PTK','1241017');
     
                // if($insert) {
				
                  // tambahlog($nik,$module,'TAMBAH','BERHASIL');
                     // echo "<script type='text/javascript'>
                         // setTimeout(function () {  
                           // swal('Succes!', 'Berhasil Di tambahkan', 'success')
                         // },10); 
                         // window.setTimeout(function(){ 
                           // window.location.replace('../../media.php?module=$module');
                         // } ,2000); 
                       // </script>";
                 // } 
                          
      // header('location:../../media.php?module=ptk');
      }

    // delete module ptk
    elseif ($module=='ptk' AND $act=='delete'){

          $C_KODEJAB=$_GET['C_KODEJAB'];
          $insert = mysql_query("DELETE FROM `ptk` WHERE C_KODEJAB='$C_KODEJAB' ");                   
        
         
            if($insert) {
                tambahlog($nik,$module,'DELETE','BERHASIL');
                  echo "<script type='text/javascript'>
                      setTimeout(function () {  
                        swal('Deleted !', 'Kode ptk ( $C_KODEJAB ) Berhasil di Hapus', 'error')
                      },10); 
                      window.setTimeout(function(){ 
                        window.location.replace('../../media.php?module=$module');
                      } ,1500); 
                    </script>";
              } 
        
    }

    


}
?>

<!-- <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> -->