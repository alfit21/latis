-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.13.0.7147
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for latis
CREATE DATABASE IF NOT EXISTS `latis` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `latis`;

-- Dumping structure for table latis.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table latis.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id`, `password`, `username`, `nama`) VALUES
	(2, '$2y$10$52PnbYN6NPlD4F1WTU4oiuJ8LesDZnifxNpp6YFAobzqZ1TdpYoHq', 'all', 'alfit');

-- Dumping structure for table latis.lembaga
CREATE TABLE IF NOT EXISTS `lembaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lembaga` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table latis.lembaga: ~2 rows (approximately)
INSERT INTO `lembaga` (`id`, `lembaga`) VALUES
	(1, 'latiseducation'),
	(2, 'tutorindonesia');

-- Dumping structure for table latis.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` char(5) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `foto` varchar(100) NOT NULL DEFAULT '',
  `lembaga` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table latis.siswa: ~2 rows (approximately)
INSERT INTO `siswa` (`nis`, `nama`, `email`, `foto`, `lembaga`) VALUES
	('25001', 'alfit', 'sdf', '222.png', '2'),
	('25002', 'all.r', 'al@gmail.com', '3_Vitamin_yang_Bisa_Menghilangkan_Nyeri_Sendi_di_Usia_70+.png', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
