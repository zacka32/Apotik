<?php


require_once('fungsi_validasi.php');

$server =  "localhost";
$username = "test";
$password = "alhidayah";
$database = "apotik";

// Koneksi dan memilih database di server
mysql_connect($server, $username, $password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Rizalvalidasi;


?>
