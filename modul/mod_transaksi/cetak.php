<?php
   include "../../config/koneksi.php";
	  include "../../config/fungsi_get_master.php";
	  error_reporting(0);

		$no = 1; 
		$g = mysql_query("SELECT * from transaksi where id_transaksi='002'");
		$t=mysql_fetch_array($g);
		
	$font = printer_create_font("Arial", 148, 76, PRINTER_FW_BOLD, false, false, false, -50);
    $printTestText = "FAKTUR KOMERSIL\n";
	printer_delete_font($font);
	$font = printer_create_font("Arial", 138, 66, PRINTER_FW_MEDIUM, false, false, false, -50);
    $printTestText .= "PT. PESONA AMARANTHINE COSMETIQUES\n";
	printer_delete_font($fonts);
    // $printTestText .= "      TOKO BASMALAH CAB. WONOREJO      \n";
	$printTestText .= "Jl. Pekapuran Raya No. 32 /  Cimanggis - Depok\n";
	$printTestText .= "Telepon : +62 21 8774 4000\n";
	$printTestText .= "Fax   : +62 21 8774 2020\n";
	$printTestText .= "Hot Line Service : +62 21 8715854\n";
	$printTestText .= "email     : info@amaranthinecosmetics.com\n";
    $printTestText .= "\n";
    $printTestText .= "Inv. ID : " . $t['id_transaksi'] . "\n";
    $printTestText .= "Date    : " . $t['tgl_beli'] . "\n";
    $printTestText .= "Payment : Cash \n";
	
   $printTestText .= "-------------------------------------------------------------------------------------------------------------------\n";
   $item =str_pad("item",65," ");
	$Harga =str_pad("Harga",15," ");
	$Jmls =str_pad("Jml",5," ");
	$Disc =str_pad("Disc",10," ");
	$st =str_pad("Subtotal",25," ");
	
	$printTestText .= $item . "" . $Harga . "" . $Jmls . "" . $Disc . "" . $st . "-\n";
    $printTestText .= "-------------------------------------------------------------------------------------------------------------------\n";
	
		
		$no = 1; 
		$tampil = mysql_query("SELECT * from detail_transaksi o left join produk p on o.c_codeprod=p.c_prodcode where id_transaksi='002'");
		while($r=mysql_fetch_array($tampil)){
		$harga_diskon = $r['n_hargajual'] * $r['diskon'] / 100;
		$harga_real=$r['n_hargajual'] - $harga_diskon;
		$total2 = $harga_real * $r['jumlah'];
		$subtotal=number_format($total2,2,",",".");
		$total       = $total + $total2;
		$totalsemua = number_format($total,2,",",".");
		
		// $nama = str_pad($r['c_prodcode']-strtolower($r['c_prodname']),50," ");
		$a=strtolower($r['c_prodname']);
		$b=$r['c_prodcode'];
		$c=$b."-".$a;
		$d= substr($c,0,63);
		  $nama = str_pad($c,65," ");
		
		$n_hargajual =str_pad($r['n_hargajual'],15," ");
		$jml =str_pad($r['jumlah'],5," ");
		$diskon =str_pad($r['diskon'],10," ",STR_PAD_LEFT);
		$subtotals =str_pad(Rp.$subtotal,25," ",STR_PAD_LEFT);
		
		$totalsemuas =str_pad(Rp.$totalsemua,100,"-",STR_PAD_LEFT);

	    $printTestText .= $nama . "" . $n_hargajual ."" . $jml . "" . $diskon . "%" . $subtotals . "\n";
		
		$no++; }
	
	
    $printTestText .= "-------------------------------------------------------------------------------------------------------------------\n";
	 $printTestText .= "      Detail Pembayaran\n";
	$font = printer_create_font("Arial", 138, 66, PRINTER_FW_MEDIUM, false, false, false, -50);
    $printTestText .= "      Total : " . $totalsemuas . ",-\n";
	printer_delete_font($fontss);
	
	
 
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
	
    // /* tulis dan buka koneksi ke printer */
    // $printer = printer_open("SP-POS76II");
    // /* write the text to the print job */
    // printer_set_option($handle, PRINTER_MODE, "RAW");
    // printer_write($printer, $printTestText);
    // /* close the connection */
    // printer_close($printer);
	// print_r ($printTestText);
	// die();
   $handle = printer_open("EPSON LQ-2180 ESC/P2"); 
   printer_set_option($handle, PRINTER_SCALE, 25);
    printer_set_option($handle, PRINTER_MODE, "RAW");
	printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_RIGHT);
    printer_write($handle, $printTestText);
    printer_close($handle); ?>