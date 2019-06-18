<?php

include "config/koneksi.php";
include "config/fungsi_hakakses.php";
include "config/fungsi_log.php";
include "config/fungsi_get_master.php";
include "config/fungsi_indotgl.php";
include "config/library.php";

// include "config/fungsi_week.php";
// include "config/fungsi_hitungcuti.php";


// Bagian Home
if ($_GET['module']=='home'){
    include "modul/mod_home/home.php";
}

// Bagian Home
elseif ($_GET['module']=='produk'){
    include "modul/mod_produk/produk.php";
}

// Bagian Home
elseif ($_GET['module']=='transaksi'){
    include "modul/mod_transaksi/transaksi.php";
}
// Bagian Home
elseif ($_GET['module']=='member'){
    include "modul/mod_member/member.php";
}

// Bagian Home
elseif ($_GET['module']=='suppliyer'){
    include "modul/mod_suppliyer/suppliyer.php";
}

// Bagian Home
elseif ($_GET['module']=='user'){
    include "modul/mod_user/user.php";
}

// Bagian Home
elseif ($_GET['module']=='password'){
    include "modul/mod_password/password.php";
}
// Bagian Home
elseif ($_GET['module']=='laporan'){
    include "modul/mod_laporan/laporan.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
