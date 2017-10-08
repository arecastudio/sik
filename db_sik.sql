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
-- Table structure for table `hasil_hutan`
--

DROP TABLE IF EXISTS `hasil_hutan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hasil_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pokok_desa` int(11) NOT NULL,
  `nama_komoditas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_panen` int(11) NOT NULL DEFAULT '0',
  `satuan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_produksi` int(11) NOT NULL DEFAULT '0',
  `nilai_baku` int(11) NOT NULL DEFAULT '0',
  `biaya_penolong` int(11) NOT NULL DEFAULT '0',
  `biaya_antara` int(11) NOT NULL DEFAULT '0',
  `pemasaran_hasil` double NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hasil_hutan`
--

LOCK TABLES `hasil_hutan` WRITE;
/*!40000 ALTER TABLE `hasil_hutan` DISABLE KEYS */;
INSERT INTO `hasil_hutan` VALUES (5,1,'Karet',0,'kubikpt',0,0,0,0,0,'2017-10-06 02:34:13'),(2,1,'Kopi',0,'kubikpt',0,0,0,0,0,'2017-10-06 02:32:08'),(6,1,'Kayu',0,'kubikpt',0,0,0,0,0,'2017-10-06 02:34:18'),(8,1,'Daun Pisang',100,'tonpt',10,0,15,0,87,'2017-10-06 02:35:06');
/*!40000 ALTER TABLE `hasil_hutan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_tanah`
--

DROP TABLE IF EXISTS `jenis_tanah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_tanah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_tanah`
--

LOCK TABLES `jenis_tanah` WRITE;
/*!40000 ALTER TABLE `jenis_tanah` DISABLE KEYS */;
INSERT INTO `jenis_tanah` VALUES (1,'TANAH SAWAH'),(2,'TANAH KERING'),(3,'TANAH BASAH'),(4,'TANAH PERKEBUNAN'),(5,'TANAH FAS. UMUM'),(6,'TANAH HUTAN');
/*!40000 ALTER TABLE `jenis_tanah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kwalitas_air`
--

DROP TABLE IF EXISTS `kwalitas_air`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kwalitas_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kwalitas_air`
--

LOCK TABLES `kwalitas_air` WRITE;
/*!40000 ALTER TABLE `kwalitas_air` DISABLE KEYS */;
INSERT INTO `kwalitas_air` VALUES (1,'MATA AIR'),(2,'SUMUR GALI'),(3,'SUMUR POMPA'),(4,'HIDRAN UMUM'),(5,'PAM'),(6,'PIPA'),(7,'SUNGAI'),(8,'EMBUNG'),(9,'BAK PENAMPUNG AIR HUJAN'),(10,'BELI DARI TANGKI SWASTA'),(11,'DEPOT ISI ULANG'),(12,'SUMBER LAIN');
/*!40000 ALTER TABLE `kwalitas_air` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kwalitas_air_desa`
--

DROP TABLE IF EXISTS `kwalitas_air_desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kwalitas_air_desa` (
  `id_kwalitas_air` int(11) NOT NULL,
  `id_pokok_desa` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `rusak` int(11) NOT NULL DEFAULT '0',
  `pemanfaat` int(11) NOT NULL DEFAULT '0',
  `kwalitas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BAIK',
  PRIMARY KEY (`id_kwalitas_air`,`id_pokok_desa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kwalitas_air_desa`
--

LOCK TABLES `kwalitas_air_desa` WRITE;
/*!40000 ALTER TABLE `kwalitas_air_desa` DISABLE KEYS */;
INSERT INTO `kwalitas_air_desa` VALUES (1,1,10,4,5,'BERASA'),(2,1,0,0,0,'BAIK'),(3,1,0,0,0,'BAIK'),(4,1,0,0,0,'BAIK'),(5,1,0,0,0,'BAIK'),(6,1,30,40,50,'BERBAU'),(7,1,0,0,0,'BAIK'),(8,1,0,0,0,'BAIK'),(9,1,0,0,0,'BAIK'),(10,1,0,0,0,'BAIK'),(11,1,0,0,0,'BAIK'),(12,1,0,0,0,'BAIK');
/*!40000 ALTER TABLE `kwalitas_air_desa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pariwisata`
--

DROP TABLE IF EXISTS `pariwisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pariwisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pariwisata`
--

LOCK TABLES `pariwisata` WRITE;
/*!40000 ALTER TABLE `pariwisata` DISABLE KEYS */;
INSERT INTO `pariwisata` VALUES (1,'Laut (Wisata Pulau, Taman Laut, Situs Sejarah Bahari, Pantai dll)'),(2,'Danau (Wisata Air, Hutan Wisata, Situs Purbakala, dll)'),(3,'Gunung (wisata Hutan, Taman Nasional, Bumi Perkemahan, dll)'),(4,'Agrowisata'),(5,'Hutan Khusus'),(6,'Goa'),(7,'Cagar Budaya'),(8,'Arung Jeram'),(9,'Situs Sejarah, dan museum'),(10,'Air Terjun'),(11,'Padang Savana (wisata Padang Savana)');
/*!40000 ALTER TABLE `pariwisata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pariwisata_desa`
--

DROP TABLE IF EXISTS `pariwisata_desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pariwisata_desa` (
  `id_pariwisata` int(11) NOT NULL,
  `id_pokok_desa` int(11) NOT NULL,
  `luas` int(11) NOT NULL DEFAULT '0',
  `pemanfaatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AKTIF',
  PRIMARY KEY (`id_pariwisata`,`id_pokok_desa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pariwisata_desa`
--

LOCK TABLES `pariwisata_desa` WRITE;
/*!40000 ALTER TABLE `pariwisata_desa` DISABLE KEYS */;
INSERT INTO `pariwisata_desa` VALUES (1,1,0,'AKTIF'),(2,1,0,'AKTIF'),(3,1,0,'AKTIF'),(4,1,0,'AKTIF'),(5,1,0,'AKTIF'),(6,1,0,'AKTIF'),(7,1,0,'AKTIF'),(8,1,0,'AKTIF'),(9,1,0,'AKTIF'),(10,1,4,'AKTIF'),(11,1,0,'NON-AKTIF');
/*!40000 ALTER TABLE `pariwisata_desa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peternakan`
--

DROP TABLE IF EXISTS `peternakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peternakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pokok_desa` int(11) NOT NULL,
  `nama_komoditas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_pemilik` int(11) NOT NULL DEFAULT '0',
  `jml_populasi` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peternakan`
--

LOCK TABLES `peternakan` WRITE;
/*!40000 ALTER TABLE `peternakan` DISABLE KEYS */;
INSERT INTO `peternakan` VALUES (1,1,'Babi',50,1500,'2017-10-06 05:01:41'),(2,1,'Anjing',100,5000,'2017-10-06 05:01:54');
/*!40000 ALTER TABLE `peternakan` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `sumber_air`
--

DROP TABLE IF EXISTS `sumber_air`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sumber_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sumber_air`
--

LOCK TABLES `sumber_air` WRITE;
/*!40000 ALTER TABLE `sumber_air` DISABLE KEYS */;
INSERT INTO `sumber_air` VALUES (1,'SUNGAI'),(2,'DANAU'),(3,'MATA AIR'),(4,'BENDUNG / WADUK / SITU'),(5,'EMBUNG-EMBUNG'),(6,'JEBAKAN AIR');
/*!40000 ALTER TABLE `sumber_air` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sumber_air_volume`
--

DROP TABLE IF EXISTS `sumber_air_volume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sumber_air_volume` (
  `id_sumber_air` int(11) NOT NULL,
  `id_pokok_desa` int(11) NOT NULL,
  `debit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'KOSONG',
  PRIMARY KEY (`id_sumber_air`,`id_pokok_desa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sumber_air_volume`
--

LOCK TABLES `sumber_air_volume` WRITE;
/*!40000 ALTER TABLE `sumber_air_volume` DISABLE KEYS */;
INSERT INTO `sumber_air_volume` VALUES (1,1,'BESAR'),(2,1,'KOSONG'),(3,1,'KECIL'),(4,1,'SEDANG'),(5,1,'KOSONG'),(6,1,'BESAR');
/*!40000 ALTER TABLE `sumber_air_volume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanah_desa`
--

DROP TABLE IF EXISTS `tanah_desa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanah_desa` (
  `id_pokok_desa` int(11) NOT NULL,
  `id_tanah_guna` int(11) NOT NULL,
  `luas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pokok_desa`,`id_tanah_guna`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanah_desa`
--

LOCK TABLES `tanah_desa` WRITE;
/*!40000 ALTER TABLE `tanah_desa` DISABLE KEYS */;
INSERT INTO `tanah_desa` VALUES (1,1,55),(1,2,53),(1,3,7),(1,4,0),(1,5,245),(1,6,141),(1,7,70);
/*!40000 ALTER TABLE `tanah_desa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanah_guna`
--

DROP TABLE IF EXISTS `tanah_guna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanah_guna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ha',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanah_guna`
--

LOCK TABLES `tanah_guna` WRITE;
/*!40000 ALTER TABLE `tanah_guna` DISABLE KEYS */;
INSERT INTO `tanah_guna` VALUES (1,'SAWAH IRIGAS TEKNIS',1,'Ha'),(2,'SAWAH IRIGASI SEPARUH TEKNIS',1,'Ha'),(3,'SAWAH TADAH HUJAN',1,'Ha'),(4,'SAWAH PASANG SURUT',1,'Ha'),(5,'TEGAL / LADANG',2,'Ha'),(6,'PEMUKIMAN',2,'Ha'),(7,'PEKARANGAN',2,'Ha'),(8,'TANAH RAWA',3,'Ha'),(9,'PASANG SURUT',3,'Ha'),(10,'LAHAN GAMBUT',3,'Ha'),(11,'SITU / WADUK / DANAU',3,'Ha'),(12,'TANAH BENGKOK',5,'Ha'),(13,'TANAH TITI SARA',5,'Ha'),(14,'KEBUN DESA',5,'Ha'),(15,'SAWAH DESA',5,'Ha'),(16,'LAPANGAN OLAHRAGA',5,'Ha'),(17,'PERKANTORAN PEMERINTAH',5,'Ha'),(18,'RUANG PUBLIK / TAMAN',5,'Ha'),(19,'PEMAKAMAN',5,'Ha'),(20,'PEMBUANGAN SAMPAH',5,'Ha'),(21,'SEKOLAH / P. TINGGI',5,'Ha'),(22,'PERTOKOAN',5,'Ha'),(23,'PASAR',5,'Ha'),(24,'TERMINAL',5,'Ha'),(25,'JALAN',5,'Ha'),(26,'DAERAH TANGKAPAN AIR',5,'Ha'),(27,'USAHA PERIKANAN',5,'Ha'),(28,'SUTET / LISTRIK TEG. TINGGI',5,'Ha'),(29,'HUTAN LINDUNG',6,'Ha'),(30,'HUTAN PRODUKSI TETAP',6,'Ha'),(31,'HUTAN PRODUKSI TERBATAS',6,'Ha'),(32,'HUTAN KONSERVASI',6,'Ha'),(33,'HUTAN ADAT',6,'Ha'),(34,'HUTAN ASLI',6,'Ha'),(35,'HUTAN SEKUNDER',6,'Ha'),(36,'HUTAN BUATAN',6,'Ha'),(37,'HUTAN MANGROVE',6,'Ha'),(38,'SUAKA ALAM',6,'Ha'),(39,'SUAKA MARGASATWA',6,'Ha'),(40,'HUTAN RAKYAT',6,'Ha'),(41,'PERKEBUNAN RAKYAT',4,'Ha'),(42,'PERKEBUNAN NEGARA',4,'Ha'),(43,'PERKEBUNAN SWASTA',4,'Ha'),(44,'PERKEBUNAN PERORANGAN',4,'Ha');
/*!40000 ALTER TABLE `tanah_guna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tani_kebun`
--

DROP TABLE IF EXISTS `tani_kebun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tani_kebun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pokok_desa` int(11) NOT NULL,
  `nama_komoditas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas` int(11) NOT NULL DEFAULT '0',
  `hasil_panen` int(11) NOT NULL DEFAULT '0',
  `nilai_produksi` int(11) NOT NULL DEFAULT '0',
  `biaya_pupuk` int(11) NOT NULL DEFAULT '0',
  `biaya_bibit` int(11) NOT NULL DEFAULT '0',
  `biaya_obat` int(11) NOT NULL DEFAULT '0',
  `biaya_lainnya` int(11) NOT NULL DEFAULT '0',
  `pemasaran_hasil` double NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tani_kebun`
--

LOCK TABLES `tani_kebun` WRITE;
/*!40000 ALTER TABLE `tani_kebun` DISABLE KEYS */;
INSERT INTO `tani_kebun` VALUES (4,1,'Lemon Nipis',0,0,0,0,0,0,0,0,'2017-10-05 13:15:42'),(5,1,'Jeruk Purut',0,0,0,0,0,0,0,0,'2017-10-05 13:17:15'),(10,1,'Pepaya Bangkok',56,88,34,266,6000,156,100,70,'2017-10-05 22:56:31'),(9,1,'Ketapang Kampung',56,5,5,5,666,555,555,777,'2017-10-05 21:40:07'),(12,1,'Tebu Hutan',33,33,33,33,33,44,44,5555,'2017-10-05 22:58:33');
/*!40000 ALTER TABLE `tani_kebun` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-09  6:04:46
