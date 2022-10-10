-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project1_fsp_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `hari`
--

DROP TABLE IF EXISTS `hari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hari` (
  `idhari` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idhari`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hari`
--

LOCK TABLES `hari` WRITE;
/*!40000 ALTER TABLE `hari` DISABLE KEYS */;
INSERT INTO `hari` VALUES (1,'Minggu'),(2,'Senin'),(3,'Selasa'),(4,'Rabu'),(5,'Kamis'),(6,'Jumat'),(7,'Sabtu');
/*!40000 ALTER TABLE `hari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal` (
  `nrp` char(9) NOT NULL,
  `idhari` int(11) NOT NULL,
  `idjam_kuliah` int(11) NOT NULL,
  PRIMARY KEY (`nrp`,`idhari`,`idjam_kuliah`),
  KEY `fk_mahasiswa_has_hari_hari1_idx` (`idhari`),
  KEY `fk_mahasiswa_has_hari_mahasiswa_idx` (`nrp`),
  KEY `fk_mahasiswa_has_hari_jam_kuliah1_idx` (`idjam_kuliah`),
  CONSTRAINT `fk_mahasiswa_has_hari_hari1` FOREIGN KEY (`idhari`) REFERENCES `hari` (`idhari`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mahasiswa_has_hari_jam_kuliah1` FOREIGN KEY (`idjam_kuliah`) REFERENCES `jam_kuliah` (`idjam_kuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mahasiswa_has_hari_mahasiswa` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal`
--

LOCK TABLES `jadwal` WRITE;
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` VALUES ('160420400',1,1),('160420400',2,2),('160420400',3,3),('160420400',3,6),('160420400',5,10),('160420400',6,11),('160420400',7,12),('160420401',1,12),('160420401',2,11),('160420401',3,10),('160420401',5,3),('160420401',6,2),('160420401',7,1),('160420402',1,1),('160420402',1,6),('160420402',1,12),('160420402',2,2),('160420402',2,6),('160420402',2,11),('160420402',3,3),('160420402',3,6),('160420402',3,10),('160420402',4,1),('160420402',4,2),('160420402',4,3),('160420402',4,4),('160420402',4,5),('160420402',4,6),('160420402',4,7),('160420402',4,8),('160420402',4,9),('160420402',4,10),('160420402',4,11),('160420402',4,12),('160420402',5,3),('160420402',5,6),('160420402',5,10),('160420402',6,2),('160420402',6,6),('160420402',6,11),('160420402',7,1),('160420402',7,6),('160420402',7,12);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jam_kuliah`
--

DROP TABLE IF EXISTS `jam_kuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jam_kuliah` (
  `idjam_kuliah` int(11) NOT NULL AUTO_INCREMENT,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`idjam_kuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jam_kuliah`
--

LOCK TABLES `jam_kuliah` WRITE;
/*!40000 ALTER TABLE `jam_kuliah` DISABLE KEYS */;
INSERT INTO `jam_kuliah` VALUES (1,'07:00:00','07:55:00'),(2,'07:55:00','08:50:00'),(3,'08:50:00','09:45:00'),(4,'09:45:00','10:40:00'),(5,'10:40:00','11:35:00'),(6,'11:35:00','12:25:00'),(7,'13:00:00','13:55:00'),(8,'13:55:00','14:50:00'),(9,'14:50:00','15:45:00'),(10,'15:45:00','16:40:00'),(11,'16:40:00','17:35:00'),(12,'17:35:00','18:30:00');
/*!40000 ALTER TABLE `jam_kuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `nrp` char(9) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES ('160420400','Gaban'),('160420401','Sharivan'),('160420402','Shaider');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-10 14:00:26
