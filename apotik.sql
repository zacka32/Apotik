-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table apotik.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `nik` int(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `superuser` enum('Y','N') DEFAULT 'N',
  `email` varchar(50) NOT NULL,
  `atasan` enum('Y','N') DEFAULT 'N',
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `exprd` date NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `umur` varchar(20) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `nik` (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table apotik.admins: 4 rows
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`nik`, `password`, `nama_lengkap`, `level`, `superuser`, `email`, `atasan`, `blokir`, `exprd`, `id_group`, `alamat`, `telp`, `umur`) VALUES
	(12345, '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'admin', 'Y', 'b4nk.zack@gmail.com', 'N', 'N', '2019-01-16', 17, '123456', '123456', ''),
	(1241017, 'eddb701ad85495bc61c0d0cfa6a7a896', 'ADi', 'user', 'N', '', '', 'N', '2017-12-25', 0, '', '', ''),
	(19289, '12f66501f6bf32ffddf5485ab7427ee4', 'Ahmad Zakaria', 'admin', 'N', '', 'N', 'N', '0000-00-00', NULL, '', '', ''),
	(2147483647, 'e10adc3949ba59abbe56e057f20f883e', 'ahmad zakaria', 'user', 'N', '', 'N', 'N', '0000-00-00', NULL, 'kp rawa', '08978', '');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table apotik.akses
CREATE TABLE IF NOT EXISTS `akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `modul` varchar(200) NOT NULL,
  `buat` enum('Y','N') NOT NULL DEFAULT 'N',
  `lihat` enum('Y','N') NOT NULL DEFAULT 'N',
  `edit` enum('Y','N') NOT NULL DEFAULT 'N',
  `hapus` enum('Y','N') NOT NULL DEFAULT 'N',
  `detail` enum('Y','N') NOT NULL DEFAULT 'N',
  `full` enum('Y','N') NOT NULL DEFAULT 'N',
  `konfirmasi` enum('Y','N') NOT NULL DEFAULT 'N',
  `notification` enum('Y','N') NOT NULL DEFAULT 'N',
  `tutup` enum('Y','N') NOT NULL DEFAULT 'N',
  `print` enum('Y','N') NOT NULL DEFAULT 'N',
  `excel` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_spesial` int(11) DEFAULT NULL,
  `dt_lastupdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.akses: 0 rows
/*!40000 ALTER TABLE `akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `akses` ENABLE KEYS */;

-- Dumping structure for table apotik.detail_masterproduk
CREATE TABLE IF NOT EXISTS `detail_masterproduk` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_masterProduk` int(11) NOT NULL DEFAULT '0',
  `id_bahanbaku` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.detail_masterproduk: ~2 rows (approximately)
/*!40000 ALTER TABLE `detail_masterproduk` DISABLE KEYS */;
INSERT INTO `detail_masterproduk` (`id_detail`, `id_masterProduk`, `id_bahanbaku`, `jumlah`) VALUES
	(1, 0, 4, 15),
	(3, 3, 5, 0);
/*!40000 ALTER TABLE `detail_masterproduk` ENABLE KEYS */;

-- Dumping structure for table apotik.detail_transaksi
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) NOT NULL DEFAULT '0',
  `kd_obat` varchar(50) NOT NULL DEFAULT '0',
  `nm_produk` varchar(200) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_pcs` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `id_harga` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_detail_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.detail_transaksi: ~4 rows (approximately)
/*!40000 ALTER TABLE `detail_transaksi` DISABLE KEYS */;
INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `kd_obat`, `nm_produk`, `jenis`, `harga`, `jumlah_pcs`, `jumlah`, `diskon`, `id_harga`) VALUES
	(35, '000000001', '6', 'Komix', 'Strip', 6000, 6, 2, 0, 26),
	(36, '000000001', '1', 'Panadol', 'Satuan', 500, 1, 4, 0, 1),
	(37, '000000002', '7', 'Puyer 16', 'Satuan', 1000, 1, 4, 0, 29),
	(38, '000000002', '6', 'Komix', 'Strip', 6000, 6, 2, 0, 26);
/*!40000 ALTER TABLE `detail_transaksi` ENABLE KEYS */;

-- Dumping structure for table apotik.harga
CREATE TABLE IF NOT EXISTS `harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kategori_harga` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah_pcs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='harga';

-- Dumping data for table apotik.harga: ~36 rows (approximately)
/*!40000 ALTER TABLE `harga` DISABLE KEYS */;
INSERT INTO `harga` (`id_harga`, `id_produk`, `kategori_harga`, `harga`, `jumlah_pcs`) VALUES
	(1, '1', 'Satuan', 500, 1),
	(2, '1', 'Strip', 2300, 5),
	(3, '1', 'Pack', 40000, 20),
	(4, '1', 'Dus', 500000, 102),
	(5, '2', 'Satuan', 500, 1),
	(6, '2', 'Strip', 5000, 15),
	(7, '2', 'Pack', 2500, 200),
	(8, '2', 'Dus', 1500000, 2000),
	(9, '3', 'Satuan', 0, 1),
	(10, '3', 'Strip', 0, 0),
	(11, '3', 'Pack', 0, 0),
	(12, '3', 'Dus', 0, 0),
	(13, '3', 'Satuan', 1000, 1),
	(14, '3', 'Strip', 6000, 6),
	(15, '3', 'Pack', 20000, 24),
	(16, '3', 'Dus', 125000, 200),
	(17, '4', 'Satuan', 1, 1500),
	(18, '4', 'Strip', 6, 6000),
	(19, '4', 'Pack', 60, 50000),
	(20, '4', 'Dus', 600, 500000),
	(21, '5', 'Satuan', 0, 1),
	(22, '5', 'Strip', 0, 0),
	(23, '5', 'Pack', 0, 0),
	(24, '5', 'Dus', 0, 0),
	(25, '6', 'Satuan', 1500, 1),
	(26, '6', 'Strip', 6000, 6),
	(27, '6', 'Pack', 60000, 60),
	(28, '6', 'Dus', 200000, 200),
	(29, '7', 'Satuan', 1000, 1),
	(30, '7', 'Strip', 5000, 6),
	(31, '7', 'Pack', 50000, 54),
	(32, '7', 'Dus', 125000, 100),
	(33, '8', 'Satuan', 200, 1),
	(34, '8', 'Strip', 1200, 6),
	(35, '8', 'Pack', 12000, 60),
	(36, '8', 'Dus', 120000, 600);
/*!40000 ALTER TABLE `harga` ENABLE KEYS */;

-- Dumping structure for table apotik.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`, `keterangan`) VALUES
	(1, 'Obat Bebas', 'di jual umum'),
	(2, 'Recep Dokter', 'hanya di jual berdasarkan recep dokter');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table apotik.log_login
CREATE TABLE IF NOT EXISTS `log_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(30) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1995 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.log_login: 0 rows
/*!40000 ALTER TABLE `log_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_login` ENABLE KEYS */;

-- Dumping structure for table apotik.log_user
CREATE TABLE IF NOT EXISTS `log_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(30) NOT NULL,
  `modul` varchar(255) NOT NULL,
  `aksi` varchar(255) CHARACTER SET latin7 NOT NULL,
  `status` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `browser` text NOT NULL,
  `refer` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22292 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.log_user: 55 rows
/*!40000 ALTER TABLE `log_user` DISABLE KEYS */;
INSERT INTO `log_user` (`id`, `nik`, `modul`, `aksi`, `status`, `ip`, `hostname`, `browser`, `refer`, `location`, `provider`, `city`, `state`, `country`, `waktu`) VALUES
	(22237, 12345, 'produk', 'UBAH', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 09:38:42'),
	(22238, 12345, 'produk', 'UBAH', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 09:39:31'),
	(22239, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi&act=listtransaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 09:44:29'),
	(22240, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:01:18'),
	(22241, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:01:27'),
	(22242, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:02:16'),
	(22243, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:02:42'),
	(22244, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:02:45'),
	(22245, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:02:50'),
	(22246, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:02:53'),
	(22247, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:03:05'),
	(22248, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:44:00'),
	(22249, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=12345', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:44:12'),
	(22250, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=12345', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:45:12'),
	(22251, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=19289', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:45:45'),
	(22252, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=19289', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:45:52'),
	(22253, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:46:39'),
	(22254, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=12345', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:46:50'),
	(22255, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=tambahuser', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:54:58'),
	(22256, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user&act=edituser&id=12345', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:55:13'),
	(22257, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:55:23'),
	(22258, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=user', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 10:55:26'),
	(22259, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi&act=listtransaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-16 11:18:03'),
	(22260, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/index.php', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 09:57:40'),
	(22261, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 09:58:13'),
	(22262, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/index.php?url=', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 09:58:19'),
	(22263, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/index.php?url=', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 09:58:26'),
	(22264, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:05:22'),
	(22265, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi&act=listtransaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:06:13'),
	(22266, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:20:10'),
	(22267, 12345, 'produk', 'UBAH', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:23:07'),
	(22268, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:23:40'),
	(22269, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:23:45'),
	(22270, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:10'),
	(22271, 12345, 'transaksi', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:16'),
	(22272, 12345, 'transaksi', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:19'),
	(22273, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:39'),
	(22274, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:46'),
	(22275, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:54'),
	(22276, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=password', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:24:59'),
	(22277, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:32:30'),
	(22278, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:32:51'),
	(22279, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 11:33:21'),
	(22280, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 13:51:05'),
	(22281, 12345, 'transaksi', 'buat', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 13:51:16'),
	(22282, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 13:52:02'),
	(22283, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 13:59:42'),
	(22284, 12345, 'produk', 'DELETE', 'BERHASIL', '::1', 'ip6-localhost', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=produk', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-04-17 13:59:47'),
	(22285, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/sekolah/', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-16 09:24:02'),
	(22286, 12345, 'password', 'EDIT', 'BERHASIL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/sekolah/media.php?module=password', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-16 09:33:23'),
	(22287, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-29 16:57:19'),
	(22288, 12345, 'user', 'LIHAT', 'BERHASIL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/apotik/media.php?module=transaksi', '-6.3433,106.4990', 'AS7713 PT Telekomunikasi Indonesia', 'Depok', 'West Java', 'ID', '2018-10-29 16:59:50'),
	(22289, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/apotik/index.php?url=http://localhost:8083/apotik/media.php?module=transaksi', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-31 09:11:17'),
	(22290, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/apotik/index.php?url=', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-31 09:11:30'),
	(22291, 12345, 'LOGIN', 'LOGIN', 'GAGAL', '::1', 'DESKTOP-UHCSJ5F', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 'http://localhost:8083/apotik/index.php?url=', '-6.5944,106.7890', 'AS7713 PT Telekomunikasi Indonesia', 'Bogor', 'West Java', 'ID', '2018-10-31 09:11:40');
/*!40000 ALTER TABLE `log_user` ENABLE KEYS */;

-- Dumping structure for table apotik.mainmenu
CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `modul` varchar(50) NOT NULL,
  PRIMARY KEY (`id_main`,`urutan`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.mainmenu: 13 rows
/*!40000 ALTER TABLE `mainmenu` DISABLE KEYS */;
INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`, `status`, `gambar`, `urutan`, `modul`) VALUES
	(68, 'Master Suppliyer', '?module=transaksi', 'N', 'user', 'png/next.png', 2, 'produk'),
	(69, 'Kategori', '?module=transaksi', 'N', 'user', 'png/next.png', 3, 'kategori'),
	(3, 'Master Suppliyer', '?module=suppliyer', 'Y', 'user', 'png/next.png', 2, 'suppliyer'),
	(12, 'Master Dokter', '?module=transaksi', 'N', 'admin', 'png/next.png', 10, 'transaksi'),
	(72, 'Master Kasir', '?module=user', 'Y', 'user', 'png/next.png', 5, 'user'),
	(86, 'Master Obat', '?module=produk', 'Y', NULL, 'png/next.png', 1, ''),
	(87, 'Master Jenis', '#', 'N', NULL, 'png/next.png', 6, ''),
	(89, 'List Penjualan', '?module=transaksi&act=listtransaksi', 'Y', NULL, 'png/next.png', 4, ''),
	(93, 'Master Jenis', '?module=transaksi', 'N', NULL, 'png/next.png', 0, ''),
	(94, 'Pembelian Stok', '?module=transaksi', 'N', NULL, 'png/next.png', 0, ''),
	(96, 'Penjualan', '?module=transaksi', 'Y', NULL, 'png/next.png', 3, ''),
	(97, 'Laporan', '?module=transaksi', 'Y', NULL, 'png/next.png', 7, ''),
	(98, 'Ganti Password', '?module=password', 'Y', '', 'png/next.png', 15, '');
/*!40000 ALTER TABLE `mainmenu` ENABLE KEYS */;

-- Dumping structure for table apotik.masterproduk
CREATE TABLE IF NOT EXISTS `masterproduk` (
  `id_masterProduk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masterProduk` varchar(100) DEFAULT NULL,
  `hargaSatuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_masterProduk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.masterproduk: ~2 rows (approximately)
/*!40000 ALTER TABLE `masterproduk` DISABLE KEYS */;
INSERT INTO `masterproduk` (`id_masterProduk`, `nama_masterProduk`, `hargaSatuan`) VALUES
	(2, 'Jok Motor', 150000),
	(3, 'jok mobil', 500000);
/*!40000 ALTER TABLE `masterproduk` ENABLE KEYS */;

-- Dumping structure for table apotik.member
CREATE TABLE IF NOT EXISTS `member` (
  `kd_member` varchar(5) NOT NULL,
  `nm_member` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(7) NOT NULL,
  PRIMARY KEY (`kd_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.member: ~2 rows (approximately)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`kd_member`, `nm_member`, `alamat`, `ktp`, `telp`, `jenis`, `keterangan`, `created_date`, `created_user`) VALUES
	('M0001', 'Ahmad Zakaria', 'kp Rawa', '03123', '3123123123', 'umum', '', '2017-12-25 11:01:57', '12345'),
	('M0002', 'Adi Nugraha', 'Bogor', '30123123', '4234043', 'umum', '', '2017-12-25 11:02:16', '12345');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table apotik.order_temp
CREATE TABLE IF NOT EXISTS `order_temp` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `kd_obat` varchar(50) DEFAULT NULL,
  `nm_produk` varchar(200) DEFAULT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `id_harga` int(11) DEFAULT NULL COMMENT 'satuan_harga',
  `jumlah_pcs` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='order produk sementara';

-- Dumping data for table apotik.order_temp: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_temp` ENABLE KEYS */;

-- Dumping structure for table apotik.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `kd_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pembayaran` date NOT NULL,
  `suppliyer` varchar(7) NOT NULL,
  `keterangan` text NOT NULL,
  `produk` varchar(7) NOT NULL,
  `kategori` varchar(7) NOT NULL,
  `tgl_expired` date NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  PRIMARY KEY (`kd_pembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.pembelian: ~0 rows (approximately)
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- Dumping structure for table apotik.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `kd_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barcode` varchar(7) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `suppliyer` varchar(100) NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `tgl_expired` date NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(7) NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.produk: ~3 rows (approximately)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`kd_obat`, `kd_barcode`, `nm_barang`, `stok`, `suppliyer`, `kategori`, `tgl_expired`, `update_date`, `update_user`, `created_date`, `created_user`) VALUES
	(1, '', 'Panadol', 166, '1', '1', '2018-02-24', '0000-00-00 00:00:00', '', '2018-02-20 13:20:09', '12345'),
	(2, '', 'Paramex', 494, '2', '1', '2018-02-24', '0000-00-00 00:00:00', '', '2018-02-21 11:26:01', '12345'),
	(8, '', 'Testing', 12, '', '1', '2018-04-20', '0000-00-00 00:00:00', '', '2018-04-17 13:59:34', '12345');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table apotik.submenu
CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL AUTO_INCREMENT,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `modul` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.submenu: 0 rows
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;

-- Dumping structure for table apotik.suppliyer
CREATE TABLE IF NOT EXISTS `suppliyer` (
  `id_suppliyer` int(11) NOT NULL AUTO_INCREMENT,
  `nm_suppliyer` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat` text COLLATE latin1_general_ci,
  `telp` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_suppliyer`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table apotik.suppliyer: ~6 rows (approximately)
/*!40000 ALTER TABLE `suppliyer` DISABLE KEYS */;
INSERT INTO `suppliyer` (`id_suppliyer`, `nm_suppliyer`, `alamat`, `telp`, `created_date`) VALUES
	(1, 'Cahaya Buana', 'Bogor', '085976', NULL),
	(2, 'Pesona Alamat', 'Cibinong', '05646', NULL),
	(5, 'Bintang Kejora', 'kp binongagn', '089999992636', '2018-02-20 16:27:56'),
	(6, 'Obat Sehat', 'kp rawa', '089568230', '2018-04-17 11:04:49'),
	(7, 'Pelita Sehat', 'Kp cibinong', '08970204545', '2018-04-17 11:30:43'),
	(8, 'Juragan Obat', 'kp rawa', '08970204545', '2018-04-17 13:48:51');
/*!40000 ALTER TABLE `suppliyer` ENABLE KEYS */;

-- Dumping structure for table apotik.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `kasir` varchar(150) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table apotik.transaksi: ~2 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `kasir`, `sales`, `tgl_beli`, `created_date`, `created_user`) VALUES
	('000000001', NULL, 0, '2018-04-17', '2018-04-17 11:33:04', 12345),
	('000000002', NULL, 0, '2018-04-17', '2018-04-17 13:51:25', 12345),
	('000000003', NULL, 0, '2018-10-29', '2018-10-29 16:59:39', 12345);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
