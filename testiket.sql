-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for testiket
CREATE DATABASE IF NOT EXISTS `testiket` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `testiket`;

-- Dumping structure for table testiket.level
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(12) NOT NULL AUTO_INCREMENT,
  `level` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table testiket.level: ~3 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
REPLACE INTO `level` (`id_level`, `level`) VALUES
	(1, 'admin'),
	(2, 'pengurus'),
	(3, 'penumpang');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table testiket.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(5) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tempat_pemesanan` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `jam_cekin` time NOT NULL,
  `jam_berangkat` time NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `valid` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table testiket.pemesanan: ~2 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
REPLACE INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tanggal_pemesanan`, `tempat_pemesanan`, `tujuan`, `tanggal_berangkat`, `jam_cekin`, `jam_berangkat`, `total_bayar`, `valid`) VALUES
	(3, ' F000', '2019-04-11', 'Bandung Selatan', 'Jakarta Barat', '2019-04-11', '00:13:00', '13:12:00', 12000, 'Verify'),
	(4, ' F000', '2019-04-10', 'Bandung', 'Bandung', '2019-04-18', '14:50:00', '00:00:00', 10000, 'Verify');
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- Dumping structure for table testiket.rute
CREATE TABLE IF NOT EXISTS `rute` (
  `id_rute` int(5) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(50) DEFAULT NULL,
  `rute_awal` varchar(50) DEFAULT NULL,
  `rute_akhir` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_rute`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table testiket.rute: ~4 rows (approximately)
/*!40000 ALTER TABLE `rute` DISABLE KEYS */;
REPLACE INTO `rute` (`id_rute`, `tujuan`, `rute_awal`, `rute_akhir`, `harga`) VALUES
	(1, 'Jakarta Barat', 'Stasiun 13', 'Stasiun Gambir', 12000),
	(2, 'Gede Bage', 'Stasiun Balapan', 'Stasiun Gede Bage', 7500),
	(3, 'Bandung', 'Stasiun Surabaya', 'Stasiun Kiaracondong', 10000),
	(4, 'Bogor', 'Stasiun 114', 'Stasiun Gambir', 15000);
/*!40000 ALTER TABLE `rute` ENABLE KEYS */;

-- Dumping structure for table testiket.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tlp` char(13) DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table testiket.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `nama`, `username`, `password`, `alamat`, `jk`, `tgl_lahir`, `tlp`, `level`) VALUES
	(1, 'Rosyid Ridlo', 'rosyidra', 'admin', 'Jalan Admin', 'laki laki', '2004-06-15', '0895336331085', 'admin'),
	(2, 'Prasetyo Agung', 'prasetyo', 'petugas', 'Jalan Cicalengka', 'laki laki', '2005-04-01', '086221904888', 'petugas'),
	(3, 'Ludira Putra', 'ludira', 'penumpang', 'Jati Handap', 'perempuan', '2013-02-21', '0895392405', 'penumpang'),
	(4, 'Afif Salman Zaidani', 'afif', 'afif', 'Pasir Koja', 'laki laki', '2012-04-11', '8990866562', 'penumpang'),
	(5, 'Fullan Bin Mahmud', 'fullan', '123', 'Jakarta', 'laki laki', '2007-04-10', '89123214', 'penumpang'),
	(6, 'Justin Dimarzio', 'jarvis_031', 'Clique2017', 'Bandung', 'laki laki', '2019-04-05', '123456789', 'penumpang');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
