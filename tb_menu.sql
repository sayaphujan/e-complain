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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table ecomplaint.tb_menu: ~22 rows (approximately)
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
	(14, 'Detail Komplain', 'fa fa-external-link', 'detail', 6, 'WargaMuh', 'N'),
	(15, 'Detail Komplain', 'fa fa-external-link', 'detail', 7, 'Umum', 'N'),
	(16, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'WargaMuh', 'Y'),
	(17, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'Umum', 'Y'),
	(18, 'Diagram', 'fa fa-bar-chart', 'diagram', 16, 'WargaMuh', 'Y'),
	(19, 'Diagram', 'fa fa-bar-chart', 'diagram', 17, 'Umum', 'Y'),
	(20, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'Administrator', 'Y'),
	(21, 'Diagram', 'fa fa-bar-chart', 'diagram', 20, 'Administrator', 'N'),
	(22, 'Data Masuk', 'fa fa-bar-chart', 'diagram/statistik-daily', 20, 'Administrator', 'Y'),
	(23, 'Data Prosentase Status', 'fa fa-bar-chart', 'diagram/statistik-status', 20, 'Administrator', 'Y'),
	(24, 'Data Prosentase Objek Komplain', 'fa fa-bar-chart', 'diagram/statistik-aum', 20, 'Administrator', 'Y'),
	(25, 'Data Prosentase Saran & Kritik', 'fa fa-bar-chart', 'diagram', 20, 'Administrator', 'Y');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
