
<?php
mysql_connect("localhost","root","");
mysql_select_db("apotik");
$id_produk = $_GET['id_produk'];
$kec = mysql_query("SELECT * FROM harga WHERE id_produk='$id_produk'");
echo "<option value=''>Pilih</option>";
	while($k = mysql_fetch_array($kec)){
    echo "<option value=\"".$k['id_harga']."\">".$k['kategori_harga']."</option>\n";
}
?>