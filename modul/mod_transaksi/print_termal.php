<?php
   include "../../config/koneksi.php";
	  include "../../config/fungsi_get_master.php";
	  error_reporting(0);

		$no = 1; 
		$g = mysql_query("SELECT * from transaksi where id_transaksi='001'");
		$t=mysql_fetch_array($g);

		
    $printTestText = "          FAKTUR KOMERSIL        \n";
    $printTestText .= "      PT. PESONA AMARANTHINE COSMETIQUES     \n";
    // $printTestText .= "      TOKO BASMALAH CAB. WONOREJO      \n";
     $printTestText .= "   Jl. Pekapuran Raya No. 32 /  Cimanggis - Depok    \n";
    $printTestText .= "\n";
    $printTestText .= "Inv. ID : " . $t['id_transaksi'] . "\n";
    $printTestText .= "Date    : " . $t['tgl_beli'] . "\n";
    $printTestText .= "Payment : Cash \n";
    $printTestText .= "----------------------------------------\n";
    $printTestText .= "Item        Harga   Jml  Disc Subtotal\n";
    $printTestText .= "----------------------------------------\n";
	
		$no = 1; 
		$tampil = mysql_query("SELECT * from order_temp o left join produk p on o.id_produk=p.c_prodcode");
		while($r=mysql_fetch_array($tampil)){
		$total1 = $r['n_hargajual'] * $r['diskon'] / 100;
		$total2 = $total1 * $r['jml'];
		$subtotal=number_format($total2,2,",",".");
		$total       = $total + $total2;
		$totalsemua = number_format($total,2,",",".");
		$nama = strtolower($r['c_prodname']);
	    $printTestText .= $nama . "          Rp." . $r['n_hargajual'] . ",-  " . $r['jml'] . "  " . $r['diskon'] . "%  Rp." . $subtotal . ",-\n";
		
		$no++; }
	
		
    // foreach ($hasil as $key => $value) {
        // if ($value->racik == 'yes') {
        // } else {
            // $produk = explode(' ', $value->product_name);
            // $nama_produk = "";
            // $a = 0;
            // if (count($produk) > 2) {
                // for ($i = 0; $i < count($produk) - 1; $i++) {
                    // if ($i == 0) {
                        // $nama_produk .= @$produk[$a] . " " . @$produk[$a + 1] . "\n";
                    // } else {
                        // $nama_produk .= @$produk[$a + 1] . " " . @$produk[$a + 2] . "\n";
                    // }
                    // $a++;
                // }
            // } else {
                // $nama_produk = $value->product_name . "\n";
            // }
            // $printTestText .= $nama_produk . "          Rp." . $value->price . ",-  " . $value->qty . " " . $value->satuan . "    " . $value->discount . "%  Rp." . $value->discount_sub . ",-\n";
        // }
    // }
    $printTestText .= "----------------------------------------\n";
    $printTestText .= "      Detail Pembayaran\n";
    $printTestText .= "      Total : Rp. " . $totalsemua . ",-\n";
    // $printTestText .= "      Bayar : Rp. " . $hasil[0]->pay . ",-\n";
    // $printTestText .= "      Kembali: Rp. " . $hasil[0]->pay_back . ",-\n";
    // $printTestText .= "    Harga sudah termasuk PPN 10%\n";
    $printTestText .= "----------------------------------------\n";
    $printTestText .= "               Terima Kasih             \n";
    $printTestText .= "        Barang yang sudah dibeli        \n";
    $printTestText .= "    Tidak dapat ditukar/dikembalikan    \n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
    $printTestText .= "\n";
  
  
   $handle = printer_open("EPSON LQ-2180 ESC/P2"); 
   // printer_set_option($handle, PRINTER_SCALE, 25);
    printer_set_option($handle, PRINTER_MODE, "RAW");
	printer_set_option($handle, PRINTER_PAPER_FORMAT, PRINTER_FORMAT_A4);
    printer_write($handle, $printTestText);
    printer_close($handle); ?>