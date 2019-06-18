<?php
include "config/koneksi.php";
$leveluser = $_SESSION['leveluser'];
$NIK = $_SESSION['nik'];
$idgroup = $_SESSION['idgroup'];
if ($_SESSION['leveluser']=='admin'){   

               $main = mysql_query("SELECT * FROM mainmenu WHERE aktif = 'Y' ORDER BY urutan");
                while($r = mysql_fetch_array($main)) {

                    echo "<li class='treeview'>";
                    if(empty($r['link'])){
                        echo '<a>'.$r['nama_menu'].'</a>';
                    }
                    else{
                            echo "<a href='$r[link]'><img src='$r[gambar]' width='20'>&nbsp;&nbsp;&nbsp; <span>$r[nama_menu]</span></a>";
                    }
               
            
                    
                    $sub = mysql_query("SELECT * FROM submenu WHERE id_main = $r[id_main] AND aktif='Y' AND status in('user') ORDER BY urutan ");
                                $jml = mysql_num_rows($sub);
                                // apabila sub menu ditemukan
                                if($jml > 0) {
                                    echo "<ul class='treeview-menu'>";
                                    while($w=mysql_fetch_array($sub)){
                                        echo '<li>';
                            echo "<a href='$w[link_sub]'><img src='$w[gambar]' width='20'>&nbsp;&nbsp;&nbsp; <span>$w[nama_sub]</span></a>";
                        echo '</li>';
                                    }           
                                    echo '</ul>';
                        echo '</li>';
                                } else {
                                    echo '</li>';
                                }
                
                }                
}

	elseif ($_SESSION['leveluser']=='user'){
		$main = mysql_query("SELECT * FROM mainmenu m left join `akses` a on m.modul=a.modul
		WHERE m.aktif = 'Y' AND (nik ='$NIK' or ID_GROUP='$idgroup') AND lihat='Y' ORDER BY urutan ");
    
                while($r = mysql_fetch_array($main)) {
                    echo "<li class='treeview'>";
                    if(empty($r['link'])){
                        echo '<a>'.$r['nama_menu'].'</a>';
                    }else{
                        echo "<a href='$r[link]'><img src='$r[gambar]' width='20'>&nbsp;&nbsp;&nbsp; <span>$r[nama_menu]</span></a>";
                    }
            
                    
          $sub = mysql_query("SELECT * FROM submenu s left join `akses` a on s.modul=a.modul
			 WHERE s.id_main = $r[id_main] AND s.aktif='Y' AND s.status= 'user' AND (a.nik ='$NIK' or a.ID_GROUP='$idgroup') AND lihat='Y' ORDER BY s.urutan ASC
			");
                    $jml = mysql_num_rows($sub);
                    // apabila sub menu ditemukan
                    if($jml > 0) {
                        echo "<ul class='treeview-menu'>";
                        while($w=mysql_fetch_array($sub)){
                            echo '<li>';
                echo "<a href='$w[link_sub]'><img src='$w[gambar]' width='20'>&nbsp;&nbsp;&nbsp; <span>$w[nama_sub]</span></a>";
              echo '</li>';
                        }           
                        echo '</ul>';
            echo '</li>';
                    } else {
                        echo '</li>';
                    }
                }

} 



?>


    