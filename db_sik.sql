-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_sik
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pokok_desa`
--

DROP TABLE IF EXISTS `pokok_desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokok_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_desa_pum` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa_kelurahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_kota` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_bentuk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dasar_hukum` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peta_resmi_wilayah` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utara` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timur` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokok_desa`
--

LOCK TABLES `pokok_desa` WRITE;
/*!40000 ALTER TABLE `pokok_desa` DISABLE KEYS */;
INSERT INTO `pokok_desa` VALUES (1,'1234567890','Ebungfuw','Enarotali','Jayapura','Papua','1997','UU No. 5 Thn 1990','-','-2.560397','140.669000','Gunung','Gunung','Jurang','Danau'),(2,'1234567890','Paniai','Putali','Jayapura','Papua','1997','UU No. 5 Thn 1990','-','-2.560397','140.669000','Kali','Batu','Jurang','Danau'),(3,'541235456879','Sabron Yaru','Sentani Barat','Jayapura','Papua','1988','UUD','Ada','-2.528759','140.417322','danau','danau','gunung','gunung'),(4,'456156451','Nusu','Sentani Barat','Jayapura','Papua','1990','UUD','-','-2.528759','140.417322','jurang','jurang','jurang','jurang'),(5,'7894845654','Sabron Samon','Sentani Barat','Jayapura','Papua','1988','UUD','-','-','-','-','-','-','-'),(6,'7456456745646','Doyo Lama','Sentani Barat','Jayapura','Papua','1981','UUD','-','-','-','-','-','-','-'),(7,'22334','Hinekombe','Sentani Kota','Jayapura','Papua','1970','UUD','-','-','-','-','-','-','-');
/*!40000 ALTER TABLE `pokok_desa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-04  6:33:54
