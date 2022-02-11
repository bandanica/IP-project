-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: baza
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agencija`
--

DROP TABLE IF EXISTS `agencija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agencija` (
  `idA` int unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `adresa` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PIB` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idGrada` int unsigned NOT NULL,
  PRIMARY KEY (`idA`),
  UNIQUE KEY `idA_UNIQUE` (`idA`),
  UNIQUE KEY `PIB_UNIQUE` (`PIB`),
  KEY `grad` (`idGrada`),
  CONSTRAINT `grad` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencija`
--

LOCK TABLES `agencija` WRITE;
/*!40000 ALTER TABLE `agencija` DISABLE KEYS */;
INSERT INTO `agencija` VALUES (1,'Felix','Tosin bunar','011/324511','0058649',1),(2,'Mitos travel','Kralja Milutina 35','011542986','0064521354',1);
/*!40000 ALTER TABLE `agencija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grad` (
  `idG` int unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idG`),
  UNIQUE KEY `idG_UNIQUE` (`idG`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grad`
--

LOCK TABLES `grad` WRITE;
/*!40000 ALTER TABLE `grad` DISABLE KEYS */;
INSERT INTO `grad` VALUES (1,'Beograd');
/*!40000 ALTER TABLE `grad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karakteristike`
--

DROP TABLE IF EXISTS `karakteristike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karakteristike` (
  `idkarakteristike` int unsigned NOT NULL AUTO_INCREMENT,
  `terasa` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `lodja` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `lift` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `francbalkon` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `podrum` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `garaza` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sabastom` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `klima` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `internet` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `parking` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idkarakteristike`),
  UNIQUE KEY `idkarakteristike_UNIQUE` (`idkarakteristike`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karakteristike`
--

LOCK TABLES `karakteristike` WRITE;
/*!40000 ALTER TABLE `karakteristike` DISABLE KEYS */;
INSERT INTO `karakteristike` VALUES (1,'da','ne','ne','da','da','ne','da','da','da','da','da'),(2,'da','ne','da','ne','da','da','ne','ne','da','da','ne'),(3,'ne','ne','da','ne','da','ne','ne','da','da','da','da'),(10,'da','da','da','da','da','da','da','da','da','da','da'),(11,'da','ne','ne','ne','da','ne','da','ne','da','ne','da'),(12,'da','ne','ne','ne','da','ne','da','ne','da','ne','da'),(13,'ne','ne','da','ne','ne','ne','ne','da','da','da','da'),(14,'ne','ne','ne','ne','ne','ne','ne','ne','ne','da','ne'),(15,'da','da','da','da','da','da','da','da','da','da','da'),(16,'ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne'),(17,'ne','ne','da','ne','ne','ne','da','da','ne','da','da'),(18,'da','ne','ne','ne','da','da','da','ne','da','da','da'),(19,'da','ne','ne','ne','da','da','da','da','ne','da','da');
/*!40000 ALTER TABLE `karakteristike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `idK` int unsigned NOT NULL AUTO_INCREMENT,
  `kor_ime` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ime` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `datum_rodjenja` datetime DEFAULT NULL,
  `telefon` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `e_mail` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `idGrada` int unsigned NOT NULL,
  `idAgencije` int unsigned DEFAULT NULL,
  `br_licence` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tip` int NOT NULL,
  `odobren` int DEFAULT '0',
  PRIMARY KEY (`idK`),
  UNIQUE KEY `idK_UNIQUE` (`idK`),
  UNIQUE KEY `kor_ime_UNIQUE` (`kor_ime`),
  UNIQUE KEY `e_mail_UNIQUE` (`e_mail`),
  KEY `tip_idx` (`tip`),
  KEY `gradid_idx` (`idGrada`),
  KEY `idAgencije_idx` (`idAgencije`),
  CONSTRAINT `gradid` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`),
  CONSTRAINT `idAgencije` FOREIGN KEY (`idAgencije`) REFERENCES `agencija` (`idA`),
  CONSTRAINT `tip` FOREIGN KEY (`tip`) REFERENCES `tipkorisnika` (`idT`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'mile123','Mile','Milic','sifra123','1985-05-05 00:00:00','0616672345','milence@gmail.com',1,NULL,NULL,1,1),(2,'luka123','Luka','Lukic','1','1990-03-01 00:00:00','06375751895','lulence@gmail.com',1,NULL,NULL,1,1),(3,'stana123','Stana','Stanic','sifra123','1976-01-04 00:00:00','0665619728','stanika@gmail.com',1,2,'004256398',3,1),(19,'admin123','admin','admin','admin123','2022-02-06 12:23:37',NULL,NULL,1,NULL,NULL,4,3),(20,'danica123','Danica','Markovic','Dana123!dana','1999-05-05 13:16:31','011/123-1-143','danicabandovic@gmail.com',1,NULL,NULL,2,1),(22,'sd','fsdf','fds','as12#MKleia','2022-02-03 01:35:12','0656356539','marko1@gmail.com',1,1,'01546789',3,2),(23,'sarita','sara','Markovic','mladenovac123A#','2022-02-02 01:39:57','011/123-1-143','sarasaric@yahoo.com',1,NULL,NULL,1,1),(24,'stefoni','Stefan','Stefic','stefX123#m','1995-03-20 02:06:42','0667458962','stefstef@gmail.com',1,NULL,NULL,2,1);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mikrolokacija`
--

DROP TABLE IF EXISTS `mikrolokacija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mikrolokacija` (
  `idmikro` int unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `opstina` int unsigned NOT NULL,
  PRIMARY KEY (`idmikro`),
  UNIQUE KEY `idmikro_UNIQUE` (`idmikro`),
  KEY `opstina` (`opstina`),
  CONSTRAINT `opstina` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mikrolokacija`
--

LOCK TABLES `mikrolokacija` WRITE;
/*!40000 ALTER TABLE `mikrolokacija` DISABLE KEYS */;
INSERT INTO `mikrolokacija` VALUES (1,'Neimar',1),(2,'Crveni krst',1),(3,'Kalenic',1),(4,'Gardos',3);
/*!40000 ALTER TABLE `mikrolokacija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nekretnina`
--

DROP TABLE IF EXISTS `nekretnina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nekretnina` (
  `idN` int unsigned NOT NULL AUTO_INCREMENT,
  `tip` int unsigned NOT NULL,
  `oglasivac` int unsigned NOT NULL,
  `agencija` int unsigned DEFAULT NULL,
  `kvadratura` int DEFAULT NULL,
  `gradID` int unsigned NOT NULL,
  `opstina` int unsigned NOT NULL,
  `mikrolokacija` int unsigned NOT NULL,
  `ulica` int unsigned NOT NULL,
  `br_soba` int DEFAULT NULL,
  `godina_izgradnje` datetime DEFAULT NULL,
  `sprat` int DEFAULT NULL,
  `ukupna_spratnost` int DEFAULT NULL,
  `parking` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `stanje` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `grejanje` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mesecni_troskovi` int DEFAULT NULL,
  `opis` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `karakteristike` int unsigned NOT NULL,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cena` int NOT NULL,
  `putanjaSlike` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idN`),
  UNIQUE KEY `idN_UNIQUE` (`idN`),
  KEY `agencijaID` (`agencija`),
  KEY `grd` (`gradID`),
  KEY `karakt` (`karakteristike`),
  KEY `mikrlok` (`mikrolokacija`),
  KEY `oglasivacID` (`oglasivac`),
  KEY `opst` (`opstina`),
  KEY `tipNekr` (`tip`),
  KEY `ul` (`ulica`),
  CONSTRAINT `agencijaID` FOREIGN KEY (`agencija`) REFERENCES `agencija` (`idA`),
  CONSTRAINT `grd` FOREIGN KEY (`gradID`) REFERENCES `grad` (`idG`),
  CONSTRAINT `karakt` FOREIGN KEY (`karakteristike`) REFERENCES `karakteristike` (`idkarakteristike`),
  CONSTRAINT `mikrlok` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`),
  CONSTRAINT `oglasivacID` FOREIGN KEY (`oglasivac`) REFERENCES `korisnik` (`idK`),
  CONSTRAINT `opst` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`),
  CONSTRAINT `tipNekr` FOREIGN KEY (`tip`) REFERENCES `tipnekretnine` (`idTipnekretnine`),
  CONSTRAINT `ul` FOREIGN KEY (`ulica`) REFERENCES `ulica` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nekretnina`
--

LOCK TABLES `nekretnina` WRITE;
/*!40000 ALTER TABLE `nekretnina` DISABLE KEYS */;
INSERT INTO `nekretnina` VALUES (1,1,3,1,45,1,1,1,3,2,'2015-01-01 00:00:00',2,5,'da','izvorno','na struju',12000,'Super lokacija, svetao stan, opremljen kuhinjom.','Aktivno',1,'Stan Hadzi Milentijeva 50',60000,NULL),(3,1,3,1,55,1,1,2,1,2,'2010-05-05 00:00:00',4,4,'da','dobro','na struju',7000,'za manju porodicu','Aktivno',1,'Stan Crveni krst povoljno',70000,NULL),(7,1,3,1,33,1,1,2,2,1,'2022-02-08 10:19:26',3,7,'da','lux','Na struju',4500,'super nekretnian','Aktivno',13,'Super stan',47500,NULL),(8,1,3,1,33,1,1,2,2,4,'2022-02-08 10:34:17',3,7,'ne','renovirano','Na struju',4500,'super nekretnian','Aktivno',14,'frre',47500,NULL),(9,1,3,NULL,33,1,1,2,1,3,'2025-11-26 10:56:09',3,7,'da','lux','centralno',4500,'super nekretnian','Aktivno',15,'dojiwqjdiqo',1000000,NULL),(10,1,3,NULL,213,1,1,2,1,2,'2022-02-19 10:58:19',3,7,'ne','izvorno','podno',4684,'wqdwqdqwdqwd','Aktivno',16,'db',45645,NULL),(11,1,3,NULL,123,1,1,2,1,4,'2022-02-02 10:59:37',3,3,'da','renovirano','nastruju',13,'dq','Prodato',17,'dqw',124,NULL),(13,2,3,2,125,1,1,2,2,4,'1999-10-01 16:35:51',2,2,'da','renovirano','centralno',12000,'Lepa kucica u srci Vracara','Aktivno',19,'Kuca lepa',150000,'slike/nekretnina13/kucaVracar.jpg');
/*!40000 ALTER TABLE `nekretnina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `omiljene`
--

DROP TABLE IF EXISTS `omiljene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `omiljene` (
  `idO` int unsigned NOT NULL AUTO_INCREMENT,
  `idK` int unsigned NOT NULL,
  `idN` int unsigned NOT NULL,
  PRIMARY KEY (`idO`),
  UNIQUE KEY `idO_UNIQUE` (`idO`),
  KEY `idkupca_idx` (`idK`),
  KEY `idnekretnine_idx` (`idN`),
  CONSTRAINT `idkupca` FOREIGN KEY (`idK`) REFERENCES `korisnik` (`idK`),
  CONSTRAINT `idnekretnine` FOREIGN KEY (`idN`) REFERENCES `nekretnina` (`idN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omiljene`
--

LOCK TABLES `omiljene` WRITE;
/*!40000 ALTER TABLE `omiljene` DISABLE KEYS */;
INSERT INTO `omiljene` VALUES (1,2,1),(2,2,7);
/*!40000 ALTER TABLE `omiljene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opstina`
--

DROP TABLE IF EXISTS `opstina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opstina` (
  `idOpstine` int unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `grad` int unsigned NOT NULL,
  PRIMARY KEY (`idOpstine`),
  UNIQUE KEY `idOpstine_UNIQUE` (`idOpstine`),
  KEY `idgrad` (`grad`),
  CONSTRAINT `idgrad` FOREIGN KEY (`grad`) REFERENCES `grad` (`idG`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opstina`
--

LOCK TABLES `opstina` WRITE;
/*!40000 ALTER TABLE `opstina` DISABLE KEYS */;
INSERT INTO `opstina` VALUES (1,'Vracar',1),(2,'Cukarica',1),(3,'Zemun',1);
/*!40000 ALTER TABLE `opstina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipkorisnika`
--

DROP TABLE IF EXISTS `tipkorisnika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipkorisnika` (
  `idT` int NOT NULL AUTO_INCREMENT,
  `tip_korisnika` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`idT`),
  UNIQUE KEY `idT_UNIQUE` (`idT`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipkorisnika`
--

LOCK TABLES `tipkorisnika` WRITE;
/*!40000 ALTER TABLE `tipkorisnika` DISABLE KEYS */;
INSERT INTO `tipkorisnika` VALUES (1,'kupac'),(2,'samostalni prodavac'),(3,'agent'),(4,'administrator');
/*!40000 ALTER TABLE `tipkorisnika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipnekretnine`
--

DROP TABLE IF EXISTS `tipnekretnine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipnekretnine` (
  `idTipnekretnine` int unsigned NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTipnekretnine`),
  UNIQUE KEY `idTipnekretnine_UNIQUE` (`idTipnekretnine`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipnekretnine`
--

LOCK TABLES `tipnekretnine` WRITE;
/*!40000 ALTER TABLE `tipnekretnine` DISABLE KEYS */;
INSERT INTO `tipnekretnine` VALUES (1,'stan'),(2,'kuca'),(3,'vikendica'),(4,'lokal'),(5,'magacin');
/*!40000 ALTER TABLE `tipnekretnine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulica`
--

DROP TABLE IF EXISTS `ulica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ulica` (
  `idU` int unsigned NOT NULL AUTO_INCREMENT,
  `mikrolokacija` int unsigned NOT NULL,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idU`),
  UNIQUE KEY `idU_UNIQUE` (`idU`),
  KEY `mikrolokacija` (`mikrolokacija`),
  CONSTRAINT `mikrolokacija` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulica`
--

LOCK TABLES `ulica` WRITE;
/*!40000 ALTER TABLE `ulica` DISABLE KEYS */;
INSERT INTO `ulica` VALUES (1,2,'Cetinjska'),(2,2,'Danila Kisa'),(3,1,'Hadzi Milentijeva'),(4,4,'Gardoska ulica');
/*!40000 ALTER TABLE `ulica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-11 23:39:47
