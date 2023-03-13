-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for football_klasemen
DROP DATABASE IF EXISTS `football_klasemen`;
CREATE DATABASE IF NOT EXISTS `football_klasemen` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `football_klasemen`;

-- Dumping structure for table football_klasemen.klub
DROP TABLE IF EXISTS `klub`;
CREATE TABLE IF NOT EXISTS `klub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klub` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `main` int NOT NULL DEFAULT '0',
  `menang` int NOT NULL DEFAULT '0',
  `seri` int NOT NULL DEFAULT '0',
  `kalah` int NOT NULL DEFAULT '0',
  `gm` int NOT NULL DEFAULT '0',
  `gk` int NOT NULL DEFAULT '0',
  `point` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table football_klasemen.klub: ~3 rows (approximately)
INSERT INTO `klub` (`id`, `klub`, `kota`, `main`, `menang`, `seri`, `kalah`, `gm`, `gk`, `point`) VALUES
	(1, 'Persib', 'Bandung', 2, 2, 0, 0, 4, 1, 6),
	(2, 'Arema', 'Malang', 2, 1, 0, 1, 3, 2, 3),
	(3, 'Persija', 'Jakarta', 2, 0, 0, 2, 0, 4, 0);

-- Dumping structure for table football_klasemen.pertandingan
DROP TABLE IF EXISTS `pertandingan`;
CREATE TABLE IF NOT EXISTS `pertandingan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klub1` int DEFAULT NULL,
  `klub2` int DEFAULT NULL,
  `skor1` int DEFAULT NULL,
  `skor2` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__klub` (`klub1`),
  KEY `FK__klub_2` (`klub2`),
  CONSTRAINT `FK__klub` FOREIGN KEY (`klub1`) REFERENCES `klub` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK__klub_2` FOREIGN KEY (`klub2`) REFERENCES `klub` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table football_klasemen.pertandingan: ~1 rows (approximately)
INSERT INTO `pertandingan` (`id`, `klub1`, `klub2`, `skor1`, `skor2`) VALUES
	(4, 1, 2, 2, 1),
	(6, 3, 1, 0, 2),
	(7, 2, 3, 2, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
