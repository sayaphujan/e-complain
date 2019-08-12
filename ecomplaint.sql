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

-- Dumping structure for table db_ecomplaint.captcha
CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.captcha: 0 rows
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_complain
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
  KEY `grup_fk` (`grup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_complain: 11 rows
/*!40000 ALTER TABLE `tb_complain` DISABLE KEYS */;
INSERT INTO `tb_complain` (`id_complain`, `id_user`, `id_aum`, `judul_complain`, `jenis_complain`, `kategori`, `isi_komplain`, `image`, `tgl_complain`, `solusi`, `status_complain`, `status`, `grup_id`) VALUES
	('20190615101508', 1, 3, 'TAFITRI', 'saran', 'BINGKISAN', 'BINGKISAN TAFITRI TAHUN DEPAN AGAR LEBIH BAGUS DAN YANG LEBIH BERMANFAAT LAGI', '66db37e71513f381ebbc4be07b2064e8.png', '2019-08-01 08:46:40', 'BINGKISAN TAFITRI TERGANTUNG DARI BAGI HASIL TABUNGAN YANG DIDAPAT', 'selesai', 'diterima', 2),
	('20190801103034', 12, 5, 'PPDB', 'kritik', 'Siswa Baru', 'PENDAFTARAN SISWA BARU MENGIKUTI ATURAN ZONASI', '5817c807c27a2ef2e87170cdf760065f.png', '2019-08-01 10:30:34', 'SUDAH DIBERLAKUKAN ATURAN ZONASI', 'selesai', 'diterima', 1),
	('20190731230718', 7, 14, 'REKRUITMENT', 'kritik', 'GURU', 'PEREKRUTAN GURU DI SEKOLAH MUHAMMADIYAH HARUS WARGA MUHAMMADIYAH, PDHL DI LIHAT DARI KUALITAS LEBIH LEBIH BAGUS DARI LUAR. MOHON TNGGAPANNYA', '', '2019-08-01 02:07:18', NULL, 'dalam proses', 'pending', 6),
	('20190618194755', 6, 3, 'Pembiayaan', 'saran', 'Usulan', 'Mohon untuk margin nya agar diringankan', '17ae83f3233caa4c5d0e1735b25e3afe.png', '2019-08-01 09:47:55', NULL, 'dalam proses', 'pending', 1),
	('20190621175808', 1, 6, 'pendsftaran', 'kritik', 'pelayanan pendaftran', 'pelayanan harus lebih cepat', '8eaaa1a22963038cacb1c7dc7b5e5fc6.jpg', '2019-07-01 21:53:21', 'siap', 'selesai', 'diterima', 2),
	('20190731230453', 7, 12, 'PENGAJIAN', 'saran', 'PEMBICARA', 'SEKEDAR MASUKAN UNTUK PENGURUS NA BLIGO COBA DATANGKAN PEMBICARA PENGAJIAN YANG BAGUS DAN MENARIK. SEMISAL USTADZAH OKI SETIANA DEWI. PASTI AKAN LEBIH MENARIK PENGUNJUNG. TERIMA KASIH', '', '2019-08-01 02:04:53', NULL, 'dalam proses', 'pending', 6),
	('20190624215513', 11, 5, 'Fasilitas', 'saran', 'Perbaikan Fasilitas Bangu', 'Ada beberapa tembok bangunan yang sudah rapuh, dikhawatirkan akan membahayakan anak-anak. mohon diperhatikan dan diperbaiki', '99f88c3e265c539becc43024db820443.jpg', '2019-07-04 22:25:22', 'sudah ditindak lanjuti', 'selesai', 'diterima', 1),
	('20190624224148', 12, 1, 'TPQ', 'saran', 'JAM TPQ', 'mohon dimajukan lagi jam berangkat TPQ agar pulang tidak terlalu sore', 'b85c4ed8ae3a0aecb21a5079b8e3fb87.jpg', '2019-07-03 19:25:28', 'sudah dimajukan menjadi jam 2', 'selesai', 'diterima', 1),
	('20190625201619', 11, 6, 'Fasilitas', 'saran', 'Perbaikan Fasilitas Bangu', 'Kamar kecil atau WC harap dibersihkan biar tidak bau', '80d0ed2fc72ac495ca4abf4f67ba47f0.png', '2019-07-06 10:58:00', 'Sudah ditindak lanjuti', 'selesai', 'diterima', 1),
	('20190702070241', 6, 8, 'kaderr', 'saran', 'Usulan', 'Perlu pengkaderan yang lebih matang', '3bec0df781c7bc845f96ce1a332d3572.png', '2019-08-01 07:02:41', NULL, 'dalam proses', 'pending', 1),
	('20190706110517', 13, 9, 'Barang Belanja', 'saran', 'Item Barang', 'Mohon untuk display ditata kembali supaya rapi dan tidak berserakan', 'dda170d9f9498e6bffb2b6acaa478a93.png', '2019-07-06 11:09:34', 'dalam proses', 'dalam proses', 'diterima', 1);
/*!40000 ALTER TABLE `tb_complain` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_grup
CREATE TABLE IF NOT EXISTS `tb_grup` (
  `grup_id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(100) NOT NULL,
  `nama_alias` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` text,
  PRIMARY KEY (`grup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_grup: 6 rows
/*!40000 ALTER TABLE `tb_grup` DISABLE KEYS */;
INSERT INTO `tb_grup` (`grup_id`, `nama_grup`, `nama_alias`, `alamat`, `logo`) VALUES
	(4, 'RANTING', 'PRM', 'Jalan Raya Bligo No 7 Buaran', 'images-clip-art-baabullah-baabullah_logo_muhammadiyah.png'),
	(1, 'PCM BLIGO', 'PCM', 'Jl. Raya Bligo No. 7 Buaran Pekalongan', 'logo muhammadiyah.jpg'),
	(3, 'AUM', 'AUM', 'JL RAYA BLIGO NO. 7 BUARAN', 'Logo Muhammadiyah PNG edit.PNG'),
	(2, 'ORTOM', 'ORT', 'JL RAYA BLIGO NO. 7 BUARAN', 'large-logo-muhammadiyah-0-3405.PNG'),
	(5, 'MAJELIS', 'MAJ', 'JL RAYA BLIGO NO. 7 BUARAN', 'kisspng-muhammadiyah-logo-basmala-organization-lakshminarasimha-vector-5aedf9347a77c5.1544771415255452685016.JPG'),
	(6, 'UMUM', 'UMU', 'JL RAYA BLIGO NO. 7 BUARAN', 'person.PNG');
/*!40000 ALTER TABLE `tb_grup` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_master_aum
CREATE TABLE IF NOT EXISTS `tb_master_aum` (
  `id_aum` int(50) NOT NULL AUTO_INCREMENT,
  `nama_aum` varchar(50) DEFAULT NULL,
  `jenis_aum` enum('takmir','ranting','majelis','aum','cabang','ortom') DEFAULT NULL,
  `deskripsi_aum` varchar(500) DEFAULT NULL,
  `image_aum` text,
  PRIMARY KEY (`id_aum`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_master_aum: 13 rows
/*!40000 ALTER TABLE `tb_master_aum` DISABLE KEYS */;
INSERT INTO `tb_master_aum` (`id_aum`, `nama_aum`, `jenis_aum`, `deskripsi_aum`, `image_aum`) VALUES
	(1, 'Aisyiyah', 'ortom', 'Aisyiyah adalah salah satu Organisasi Otonom bagi Ibu-Ibu Muhammadiyah.', '9ad9894e056438791c9dbff408c7b656.JPG'),
	(3, 'KSPPS BTM Pekalongan Cabang Bligo', 'aum', 'KSPPS BTM Pekalongan Cabang Bligo merupakan salah satu Amal Usaha Muhammadiyah yang bergerak dibidang ekonomi keuanganberada dibawah PCM Bligo.', 'aae5a16884537d6852b774f6541bc436.png'),
	(4, 'SMK Muhammadiyah Bligo', 'aum', 'Sekolah Menengah Kejuruan Muhammadiyah Bligo merupakan salah satu sekolah yang dimiliki oleh PCM Bligo dibawah Majelis Dikdasmen', 'ad77cea6069a70746e21692424589052.png'),
	(5, 'SD MUHAMMADIYAH BLIGO', 'aum', 'Sekolah Dasar Muhammadiyah Bligo merupakan salah satu sekolah yang dimiliki oleh PCM Bligo dibawah Majelis Dikdasmen', '04593a9fa025ac840c473ce00ad46f46.jpg'),
	(6, 'SMP MUHAMMADIYAH BLIGO', 'aum', 'Sekolah Menengah Pertama Muhammadiyah Bligo merupakan salah satu sekolah yang dimiliki oleh PCM Bligo dibawah Majelis Dikdasmen', '05a3d59bd53c9b736b4c17307c011f8b.jpg'),
	(8, 'PEMUDA MUHAMMADIYAH', 'ortom', 'PEMUDA MUHAMMADIYAH ADALAH ORGANISASI OTONOM KEPEMUDAAN DIBAWAH MUHAMMADIYAH', 'cd07e048ac9e7cc7fa27d87c325cc2b7.png'),
	(9, 'FASTABIQ TOKOMU', 'aum', 'Mini market milik PCM Bligo yang di kelola oleh SMK Muhammadiyah Bligo.', '66143f574aa2430ac2af7d205ce1b4b6.jpg'),
	(10, 'MIM PAKUMBULAN', 'aum', 'Madrasah Ibtida\'iyah Muhammadiyah ini dikelola oleh Dikdasmen Cabang Bligo', 'a603c38b05a6ff01e5a6536cd3b0093a.jpg'),
	(11, 'IPM BLIGO', 'ortom', 'IPM adalah singkatan dari Ikatan Pelajar Muhammadiyah, anggota IPM berusia dari SMP sampai dengan SMK.', '27d4bda37775e094a44fd9b479b296c8.jpg'),
	(12, 'NASYIATUL AISYIYAH', 'ortom', 'NASYIATUL AISYIYAH ADALAH ORGANISASI OTONOM MUHAMMADIYAH YANG BERANGGOTAKAN PUTRI-PUTRI AISYIYAH.', 'f984b90b923e369b4bfe991626bc2c88.jpg'),
	(13, 'PCM BLIGO', 'cabang', 'PIMPINAN CABANG MUHAMMADIYAH BLIGO', 'db222eeb3eaa1b1d82f3cda2fd3907ef.png'),
	(14, 'MAJELIS DIKDASMEN', 'majelis', 'MAJELIS DIKDASMEN ADALAH MAJELIS YANG MENANGANI BIDANG PENDIDIKAN DASAR DAN MENENGAH DIBAWAH PCM BLIGO', 'df272d28915419bdfb349c47b5e55b58.png'),
	(15, 'LAZISMU KL BLIGO', 'cabang', 'LAZISMU ADALAH LEMBAGA AMIL ZAKAT DAN SHODAQOH MILIK MUHAMMADIYAH DAN DISETIAP CABANG MEMILIKI KANTOR LAYANAN', 'ed3413b474415608e2278cd6604ba34d.jpg');
/*!40000 ALTER TABLE `tb_master_aum` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `role` enum('WargaMuh','Umum','Administrator') DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_menu: ~27 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `icon`, `link`, `parent`, `role`, `aktif`) VALUES
	(1, 'Setting', 'fa fa-wrench', '#', 0, 'Administrator', 'Y'),
	(2, 'User Setting', 'fa fa-users', 'user', 1, 'Administrator', 'Y'),
	(3, 'AUM ORTOM Setting', 'fa fa-cog', 'aum', 1, 'Administrator', 'Y'),
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
	(18, 'Diagram', 'fa fa-bar-chart', 'diagram', 16, 'WargaMuh', 'N'),
	(19, 'Diagram', 'fa fa-bar-chart', 'diagram', 17, 'Umum', 'N'),
	(20, 'Laporan', 'fa fa-sticky-note-o', '#', 0, 'Administrator', 'Y'),
	(21, 'Diagram', 'fa fa-bar-chart', 'diagram', 20, 'Administrator', 'N'),
	(22, 'Data Masuk', 'fa fa-bar-chart', 'diagram/statistik-daily', 20, 'Administrator', 'Y'),
	(23, 'Data Prosentase Status', 'fa fa-bar-chart', 'diagram/statistik-status', 20, 'Administrator', 'Y'),
	(24, 'Data Prosentase Objek Komplain', 'fa fa-bar-chart', 'diagram/statistik-aum', 20, 'Administrator', 'Y'),
	(25, 'Data Prosentase Saran & Kritik', 'fa fa-bar-chart', 'diagram', 20, 'Administrator', 'Y'),
	(26, 'Data Masuk', 'fa fa-bar-chart', 'diagram/statistik-daily', 16, 'WargaMuh', 'Y'),
	(27, 'Data Prosentase Status', 'fa fa-bar-chart', 'diagram/statistik-status', 16, 'WargaMuh', 'Y'),
	(28, 'Data Prosentase Objek Komplain', 'fa fa-bar-chart', 'diagram/statistik-aum', 16, 'WargaMuh', 'Y'),
	(29, 'Data Prosentase Saran & Kritik', 'fa fa-bar-chart', 'diagram', 16, 'WargaMuh', 'Y'),
	(30, 'Data Mauk', 'fa fa-bar-chart', 'diagram/statistik-daily', 17, 'Umum', 'Y');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `jenis_identitas` enum('nbm','ktp','sim') DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('WargaMuh','Umum','Administrator') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `image_user` text,
  `lampiran_user` text,
  `no_telp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `grup_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_user: 7 rows
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `jenis_identitas`, `no_identitas`, `nama_user`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `pekerjaan`, `username`, `password`, `role`, `last_login`, `image_user`, `lampiran_user`, `no_telp`, `email`, `grup_id`) VALUES
	(1, 'nbm', '3326140809910004', 'muhammad rifqi', '1991-09-08', 'pria', 'Bligo', 'karyawan', 'rifqi', '75154f098825892962e322a57b9d1add79db6da4', 'Administrator', '2019-08-12 11:32:03', 'bfb2f10e2c1bea713070a56d5e64d490.jpg', 'Setia Melati Garuda', '085866916001', 'mrifqi123442@gmail.com', 1),
	(6, 'nbm', '11256089', 'Muhammad Fadholi', '1989-02-07', 'pria', 'Bligo RT 15/05 Buaran', 'Karyawan', 'Fadholi', '8098cd9757dee0a81fc33ba49a164298127ed641', 'WargaMuh', '2019-06-16 17:50:21', 'person.png', 'KARYAWAN LAZISMU', '085866916001', 'mrifqi123442@gmail.com', 1),
	(7, 'ktp', '3326106282763297', 'Siska ardiasih', '1993-05-08', 'wanita', 'Bligo RT 04/02', 'Guru', 'sisiska', 'a3f0dc6f724c7356fcc5646cfd23dcc9623da30d', 'Umum', '2019-08-01 08:16:38', 'Sugar Cakery.png', NULL, '085879136749', 'siskaardiasih.2011@gmail.com', 6),
	(8, 'nbm', '11256089', 'Edi Rosyadi', '1970-12-12', 'pria', 'Bligo Rt 15 / rw 05', 'Wiraswasta', 'edi', '24d06bccea3e437d50f53fc4e7838d91abdb1b58', 'WargaMuh', '2019-06-21 17:44:43', NULL, NULL, '08586671676878', 'edirosyad@gmail.com', 1),
	(11, 'nbm', '111263539', 'Abdul Haris Hamam', '1985-11-07', 'pria', 'Wonoyoso Gang 5', 'Wiraswasta', 'Hamam', 'a3f0dc6f724c7356fcc5646cfd23dcc9623da30d', 'WargaMuh', '2019-08-01 08:02:51', 'person.png', NULL, '085878781991', 'abdulharishamam@gmail.com', 2),
	(12, 'ktp', '3326146237383299001', 'Sunar Sulaiman', '1976-02-23', 'pria', 'Sapugarut Gang 5', 'Guru', 'sunar', '8098cd9757dee0a81fc33ba49a164298127ed641', 'Umum', '2019-08-01 10:35:51', NULL, NULL, '08157768989870', 'sunarsulaiman@gmail.com', 6),
	(13, 'nbm', '117543267', 'usmanudin', '1993-05-20', 'pria', 'Sapugarut Gg Pismatex', 'Satpam', 'usman', '8098cd9757dee0a81fc33ba49a164298127ed641', 'WargaMuh', '2019-07-06 11:10:06', 'person.png', 'Kader Pemuda Muhammadiyah', '0858767672134', 'usman.udin123@gmail.com', 2);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for table db_ecomplaint.tb_warga
CREATE TABLE IF NOT EXISTS `tb_warga` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `cabang` varchar(100) DEFAULT NULL,
  `daerah` varchar(100) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ecomplaint.tb_warga: 1 rows
/*!40000 ALTER TABLE `tb_warga` DISABLE KEYS */;
INSERT INTO `tb_warga` (`id`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `pekerjaan`, `cabang`, `daerah`, `wilayah`, `tgl_masuk`) VALUES
	('111591171256087', 'MUHAMMAD RIFQI, Amd.', '1991-09-08', 'pria', 'ligo Rt. 04/02, Bligo, Buaran, Kab. Pekalongan', 'Pegawai', 'Bligo Buaran', 'Kab. Pekalongan', 'Jawa Tengah', '2017-01-12');
/*!40000 ALTER TABLE `tb_warga` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
