-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ecomplaint.captcha
CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.captcha: ~0 rows (approximately)
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_complain
CREATE TABLE IF NOT EXISTS `tb_complain` (
  `id_complain` varchar(50) NOT NULL,
  `id_user` int(50) DEFAULT NULL,
  `id_aum` int(50) DEFAULT NULL,
  `judul_complain` varchar(150) NOT NULL,
  `jenis_complain` enum('saran','kritik') NOT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `isi_komplain` varchar(255) NOT NULL,
  `image` text,
  `tgl_complain` datetime DEFAULT NULL,
  `solusi` varchar(255) DEFAULT NULL,
  `status_complain` enum('batal','selesai','dalam proses') DEFAULT NULL,
  `status` enum('pending','ditolak','diterima') DEFAULT NULL,
  `grup_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_complain`),
  KEY `user_fk` (`id_user`),
  KEY `masteraum_fk` (`id_aum`),
  KEY `grup_fk` (`grup_id`),
  CONSTRAINT `grup_fk` FOREIGN KEY (`grup_id`) REFERENCES `tb_grup` (`grup_id`) ON DELETE CASCADE,
  CONSTRAINT `masteraum_fk` FOREIGN KEY (`id_aum`) REFERENCES `tb_master_aum` (`id_aum`) ON DELETE CASCADE,
  CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_complain: ~63 rows (approximately)
/*!40000 ALTER TABLE `tb_complain` DISABLE KEYS */;
INSERT INTO `tb_complain` (`id_complain`, `id_user`, `id_aum`, `judul_complain`, `jenis_complain`, `kategori`, `isi_komplain`, `image`, `tgl_complain`, `solusi`, `status_complain`, `status`, `grup_id`) VALUES
	('20190615101508', 1, 3, 'Tabungan Idul Fitri', 'saran', 'Tabungan Idul Fitri 1441 ', 'tes aja dlu yah', '66db37e71513f381ebbc4be07b2064e8.png', '2019-06-11 10:16:19', 'tes diterima', 'selesai', 'diterima', 1),
	('20190615113900', 1, 3, 'tes', 'saran', 'tes', 'tes', NULL, '2019-06-11 10:16:19', NULL, 'selesai', 'diterima', 1),
	('20190615115615', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115616', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115617', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115618', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115619', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115620', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115621', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115622', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115623', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115624', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115625', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115626', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115627', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115628', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115629', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115630', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115631', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115632', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115633', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115634', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115635', 1, 3, 'tes', 'saran', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115636', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115637', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115638', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115639', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115640', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115641', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115642', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115643', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-11 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115644', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115645', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115646', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115647', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115648', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115649', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115650', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115651', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-12 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115652', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115653', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115654', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115655', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115656', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115657', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115658', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115659', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-13 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115660', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115661', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115662', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115663', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115664', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115665', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115666', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115667', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-14 10:16:19', NULL, 'dalam proses', 'pending', 1),
	('20190615115668', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115669', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115670', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115671', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115672', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115673', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115674', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1),
	('20190615115675', 1, 3, 'tes', 'kritik', 'tes', 'tes', '', '2019-06-15 11:56:15', NULL, 'dalam proses', 'pending', 1);
/*!40000 ALTER TABLE `tb_complain` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_grup
CREATE TABLE IF NOT EXISTS `tb_grup` (
  `grup_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(100) NOT NULL,
  `nama_alias` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` text,
  PRIMARY KEY (`grup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_grup: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_grup` DISABLE KEYS */;
INSERT INTO `tb_grup` (`grup_id`, `nama_grup`, `nama_alias`, `alamat`, `logo`) VALUES
	(1, 'BTM BLIGO', 'BTM', 'Jalan Raya Bligo No 7 Buaran', '3c4a3afe16faff1f94ca5a43eae9b87c.png');
/*!40000 ALTER TABLE `tb_grup` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_master_aum
CREATE TABLE IF NOT EXISTS `tb_master_aum` (
  `id_aum` int(50) NOT NULL AUTO_INCREMENT,
  `nama_aum` varchar(50) DEFAULT NULL,
  `jenis_aum` enum('takmir','ranting','majelis','aum','cabang','ortom') DEFAULT NULL,
  `deskripsi_aum` varchar(100) DEFAULT NULL,
  `image_aum` text,
  PRIMARY KEY (`id_aum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_master_aum: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_master_aum` DISABLE KEYS */;
INSERT INTO `tb_master_aum` (`id_aum`, `nama_aum`, `jenis_aum`, `deskripsi_aum`, `image_aum`) VALUES
	(1, 'Aisyiyah', 'ortom', 'Aum Aisyiyah', '9ad9894e056438791c9dbff408c7b656.JPG'),
	(3, 'BTM', 'aum', 'AUM', 'aae5a16884537d6852b774f6541bc436.png');
/*!40000 ALTER TABLE `tb_master_aum` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `role` enum('WargaMuh','Umum','Administrator') DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_menu: ~16 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `icon`, `link`, `parent`, `role`, `aktif`) VALUES
	(1, 'Setting', 'fa fa-wrench', '#', 0, 'Administrator', 'Y'),
	(2, 'User Setting', 'fa fa-users', 'user', 1, 'Administrator', 'Y'),
	(3, 'Master Setting', 'fa fa-cog', 'aum', 1, 'Administrator', 'Y'),
	(5, 'Komplain Setting', 'fa fa-cogs', 'complaint', 1, 'Administrator', 'Y'),
	(6, 'Komplain', 'fa fa-comments-o', '#', 0, 'WargaMuh', 'Y'),
	(7, 'Komplain', 'fa fa-comments-o', '#', 0, 'Umum', 'Y'),
	(8, 'Form Komplain', 'fa fa-book', 'form', 6, 'WargaMuh', 'Y'),
	(9, 'Form Komplain', 'fa fa-book', 'form', 7, 'Umum', 'Y'),
	(12, 'Daftar Komplain', 'fa fa-commenting-o', 'list', 6, 'WargaMuh', 'Y'),
	(13, 'Daftar Komplain', 'fa fa-commenting-o', 'list', 7, 'Umum', 'Y'),
	(14, 'Detail Komplain', 'fa fa-external-link', 'detail', 6, 'WargaMuh', 'Y'),
	(15, 'Detail Komplain', 'fa fa-external-link', 'detail', 7, 'Umum', 'Y'),
	(16, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'WargaMuh', 'Y'),
	(17, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'Umum', 'Y'),
	(18, 'Diagram', 'fa fa-bar-chart', 'diagram', 16, 'WargaMuh', 'Y'),
	(19, 'Diagram', 'fa fa-bar-chart', 'diagram', 17, 'Umum', 'Y');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `role` enum('WargaMuh','Umum','Administrator') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `image_user` text,
  `lampiran_user` text,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `grup_id` int(50) DEFAULT NULL,
  `jenis_identitas` enum('nbm','ktp','sim') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `role`, `last_login`, `image_user`, `lampiran_user`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `no_telp`, `email`, `pekerjaan`, `no_identitas`, `grup_id`, `jenis_identitas`) VALUES
	(1, 'rifqi', '75154f098825892962e322a57b9d1add79db6da4', 'muhammad rifqi', 'Administrator', '2019-06-15 14:59:25', 'bfb2f10e2c1bea713070a56d5e64d490.jpg', NULL, NULL, NULL, 'pria', '085866916001', 'mrifqi123442@gmail.com', 'karyawan', '3326140809910004', 1, NULL),
	(2, 'shinta', 'b756d0b6dafc0bc4c25770c4415c92bd116463d5', 'Shinta Setyawati Saja', 'WargaMuh', '2019-06-15 16:34:33', '9989c2bfb34ea045809d5836f4399dc1.jpg', 'tes', '1992-01-28', 'Pekalongan', 'wanita', '081226426086', 'shinta.setiawati@gmail.com', 'Swasta', '12345678', 1, 'nbm'),
	(3, 'ajarmancing', 'f00b07166d918b00f2baa2b0155cda93ada99f7f', 'tes', 'Umum', '2019-06-15 16:37:02', NULL, NULL, '1990-12-31', 'pekalongan', 'pria', '09876', 'ajarmancingpekalongan@gmail.com', 'tes', '1234567890', 1, 'ktp');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for table ecomplaint.tb_warga
CREATE TABLE IF NOT EXISTS `tb_warga` (
  `id_warga` int(50) NOT NULL AUTO_INCREMENT,
  `jenis_warga` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_warga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_warga: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_warga` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_warga` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
