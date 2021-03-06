CREATE DATABASE  IF NOT EXISTS `baza` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `baza`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencija`
--

LOCK TABLES `agencija` WRITE;
/*!40000 ALTER TABLE `agencija` DISABLE KEYS */;
INSERT INTO `agencija` VALUES (1,'Felix','Tosin bunar','011/324511','0058649',1),(2,'Mitos travel','Kralja Milutina 35','011542986','0064521354',1),(4,'TvojStan','kralja Milana','0113254785','007458963',1);
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
  `gradski_prevoz` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idG`),
  UNIQUE KEY `idG_UNIQUE` (`idG`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grad`
--

LOCK TABLES `grad` WRITE;
/*!40000 ALTER TABLE `grad` DISABLE KEYS */;
INSERT INTO `grad` VALUES (1,'Beograd','7,9,14,17,18,23,26,27,29,33,45,50,65,74,77,83,95'),(2,'Kraljevo','1,2,3');
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
  `interfon` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idkarakteristike`),
  UNIQUE KEY `idkarakteristike_UNIQUE` (`idkarakteristike`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karakteristike`
--

LOCK TABLES `karakteristike` WRITE;
/*!40000 ALTER TABLE `karakteristike` DISABLE KEYS */;
INSERT INTO `karakteristike` VALUES (1,'da','ne','ne','da','da','ne','da','da','da','da','da','ne'),(2,'da','ne','da','ne','da','da','ne','ne','da','da','ne','ne'),(3,'ne','ne','da','ne','da','ne','ne','da','da','da','da','da'),(10,'da','da','da','da','da','da','da','da','da','da','da','ne'),(11,'da','ne','ne','ne','da','ne','da','ne','da','ne','da','da'),(12,'da','ne','ne','ne','da','ne','da','ne','da','ne','da','ne'),(13,'ne','ne','da','ne','ne','ne','ne','da','da','da','da','da'),(14,'da','ne','da','ne','ne','ne','ne','da','ne','da','ne','ne'),(15,'da','ne','da','ne','da','da','da','da','da','da','da','da'),(16,'ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne'),(17,'ne','ne','da','ne','ne','ne','da','da','ne','da','da','da'),(18,'da','ne','ne','ne','da','da','da','ne','da','da','da','ne'),(19,'da','ne','ne','ne','da','da','da','da','ne','da','da','da'),(20,'ne','ne','da','da','da','da','ne','da','da','da','ne','ne'),(21,'ne','ne','da','da','da','da','ne','da','da','da','ne','da'),(22,'ne','ne','da','da','da','da','ne','da','da','da','ne','ne'),(23,'ne','da','ne','ne','ne','ne','ne','ne','ne','ne','da','da'),(24,'ne','ne','ne','ne','ne','ne','ne','da','da','da','da','ne'),(25,'da','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','da'),(28,'da','ne','ne','ne','ne','ne','ne','da','da','da','ne','ne'),(29,'da','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','da'),(30,'da','ne','da','ne','ne','ne','ne','ne','da','ne','da','ne'),(31,'da','ne','da','ne','ne','ne','ne','ne','da','da','da','ne'),(32,'ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','da','ne'),(33,'da','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne','ne'),(34,'ne','ne','ne','ne','da','ne','da','ne','da','da','da','da'),(36,'da','ne','ne','ne','ne','ne','ne','ne','ne','ne','da','da'),(37,'ne','ne','da','ne','ne','ne','ne','da','da','da','ne','ne'),(38,'ne','ne','ne','ne','da','ne','ne','ne','ne','da','da','ne'),(39,'da','ne','ne','ne','da','ne','ne','da','ne','da','da','ne');
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'mile1234','Gile','Milicc','f1dc735ee3581693489eaf286088b916','1985-05-15 17:08:32','0616672345','milencee@gmail.com',1,NULL,NULL,2,1),(2,'luka123','Luka','Lukic','c4ca4238a0b923820dcc509a6f75849b','1990-03-01 00:00:00','06375751895','lulence@gmail.com',1,NULL,NULL,1,1),(3,'stana123','Stana','Stanic','f1dc735ee3581693489eaf286088b916','1976-01-04 00:00:00','0665619730','stanika@gmail.com',1,1,'0045128',3,1),(19,'admin123','admin','admin','0192023a7bbd73250516f069df18b500','2022-02-06 12:23:37',NULL,NULL,1,NULL,NULL,4,3),(20,'danica123','Danica','Markovic','12e2d5bda4758ec4c02a3d42eb447d4f','1999-05-05 13:16:31','011/123-1-143','danicabandovic@gmail.com',1,NULL,NULL,2,1),(23,'sarita','sara','Markovic','028c309faf80aadd944298541eabbcda','2022-02-02 01:39:57','011/123-1-143','sarasaric@yahoo.com',1,NULL,NULL,1,1),(24,'stefoni','Stefan','Stefic','f3c38e9119a8f193ded17d25f7d65fd8','1995-03-20 02:06:42','0667458962','stefstef@gmail.com',1,1,'021457',3,1),(25,'unica123','una','Savic','938d7eac457dab9bfce41a63becbe959','1991-07-25 07:21:00','0642357459','unica1@gmail.com',1,NULL,NULL,2,1),(26,'selena1','Selena','Minic','75de460ce2ccbc5da0ff1e3865a5350c','1986-03-30 04:48:32','0632573465','sarka@gmail.com',2,1,'00547589',3,1),(27,'aki123','Aleksa','Vostic','f3c38e9119a8f193ded17d25f7d65fd8','1988-12-30 05:47:41','0645789857','aleksav1@gmail.com',1,2,'00412578',3,1),(30,'mima45','Milena','Maric','deb4390542c57d6e07668006de8f9496','1988-04-19 16:23:45','0612789856','mimica@gmail.com',1,NULL,NULL,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mikrolokacija`
--

LOCK TABLES `mikrolokacija` WRITE;
/*!40000 ALTER TABLE `mikrolokacija` DISABLE KEYS */;
INSERT INTO `mikrolokacija` VALUES (1,'Neimar',1),(2,'Crveni krst',1),(3,'Kalenic',1),(4,'Gardos',3),(6,'Gornji grad',3),(7,'Altina',3),(8,'Cvetkova pijaca',10),(9,'Kluz',10),(10,'Lion',10),(11,'Djeram pijaca',10),(12,'Cukaricka padina',2),(13,'Bezanijska kosa',4),(14,'Ribnica',12),(15,'Centar',12);
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
  `opis` text CHARACTER SET utf8 COLLATE utf8_bin,
  `status` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `karakteristike` int unsigned NOT NULL,
  `naziv` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cena` int NOT NULL,
  `putanjaSlike` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `linije_prevoza` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `datum_prodaje` datetime DEFAULT NULL,
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
  CONSTRAINT `oglasivacID` FOREIGN KEY (`oglasivac`) REFERENCES `korisnik` (`idK`) ON DELETE CASCADE,
  CONSTRAINT `opst` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`),
  CONSTRAINT `tipNekr` FOREIGN KEY (`tip`) REFERENCES `tipnekretnine` (`idTipnekretnine`),
  CONSTRAINT `ul` FOREIGN KEY (`ulica`) REFERENCES `ulica` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nekretnina`
--

LOCK TABLES `nekretnina` WRITE;
/*!40000 ALTER TABLE `nekretnina` DISABLE KEYS */;
INSERT INTO `nekretnina` VALUES (1,1,3,1,45,1,1,1,3,2,'2015-01-01 00:00:00',2,5,'da','izvorno','na struju',12000,'Super lokacija, svetao stan, opremljen kuhinjom.','Aktivno',1,'Stan Hadzi Milentijeva 50',60000,NULL,NULL,NULL),(3,1,3,NULL,55,1,1,2,1,2,'2010-05-05 00:00:00',4,4,'da','izvorno','na struju',7000,'za manju porodicu','Aktivno',1,'Stan Crveni krst povoljno',70000,NULL,NULL,NULL),(7,1,3,1,33,1,1,2,2,1,'2022-02-08 10:19:26',3,7,'da','lux','Na struju',4500,'super nekretnian','Aktivno',13,'Super stan',47500,NULL,NULL,NULL),(8,1,3,1,33,1,1,2,2,4,'2022-02-08 03:43:53',3,7,'ne','lux','podno',4500,'super','Aktivno',14,'frre',45500,NULL,NULL,NULL),(9,1,3,1,33,1,1,2,1,3,'2025-11-26 17:13:34',3,7,'da','lux','centralno',4500,'super','Aktivno',15,'dojiwqjdiqo',50000,'slike/nekretnina16',NULL,NULL),(10,1,3,1,213,1,1,2,1,2,'2022-02-19 10:58:19',3,7,'ne','izvorno','podno',4684,'wqdwqdqwdqwd','Prodato',16,'db',45645,'slike/nekretnina16',NULL,'2021-12-12 00:00:00'),(11,1,3,1,123,1,1,2,1,4,'2022-02-02 10:59:37',3,3,'da','renovirano','nastruju',13,'dq','Prodato',17,'dqw',124,'slike/nekretnina16',NULL,'2021-10-10 00:00:00'),(13,2,3,1,125,1,1,2,2,4,'1999-10-01 16:35:51',2,2,'da','renovirano','centralno',12000,'Lepa kucica u srci Vracara','Aktivno',19,'Kuca lepa',150000,'slike/nekretnina13',NULL,NULL),(16,1,3,1,60,1,1,2,2,2,'1982-01-01 03:56:23',3,4,'ne','lux','centralno',10000,'Lep','Aktivno',22,'Crveni',104000,'slike/nekretnina16','23,29',NULL),(17,1,24,1,25,1,3,7,5,1,'2022-04-05 08:54:22',1,3,'da','lux','centralno',5000,'Kvalitetno i moderno','Aktivno',23,'Zemun Altina, novogradnja',40880,'slike/nekretnina17/','45,18',NULL),(18,1,24,1,44,1,3,7,5,1,'2022-04-01 08:58:56',2,2,'da','lux','nastruju',0,'Mirno, blizu Prvomajske','Aktivno',24,'Novogradnja, bez provizije',78300,'slike/nekretnina18/','17,45',NULL),(19,1,24,1,104,1,10,10,9,3,'1999-04-04 09:03:11',2,3,'ne','renovirano','centralno',12000,'Uknjizen,renoviran','Aktivno',25,'Zvezdara teatar,104m2',215000,'slike/nekretnina19/','77,7,14',NULL),(20,2,27,2,208,1,3,6,7,5,'1999-03-03 17:16:36',1,2,'ne','lux','centralno',0,'Lux kuca, na 4 etaze, suteren, prizemlje,1. i 2. sprat. 4 spavace sobe, 3 kupatila i wc,3 terase... Za svaku preporuku','Aktivno',28,'Lux mediteranka, 4 etaze',395000,'slike/nekretnina20/','17,83',NULL),(21,1,27,2,56,1,1,1,3,2,'1990-11-11 17:24:19',2,4,'ne','renovirano','centralno',8000,'Uknjizen, 2 sobe, veoma svetao, kvalitetno renoviran, uredna zgrada. Dnevna soba, trpezarija i kuhinja, spavaca, kupatilo, terasa.','Aktivno',29,'Neimar-Branicevska 56m2',162000,'slike/nekretnina21/','17,33',NULL),(22,1,27,2,57,1,10,10,9,3,'2016-10-10 17:31:36',1,5,'da','lux','centralno',12000,'Stan se prodaje potpuno opremljen kao na slikama,2 spavace sobe, kupatilo, toalet, dnevni boravak sa trpezarijom i kuhinjom. Komforan, funkcionalan.','Aktivno',30,'Lion-Lux',165000,'slike/nekretnina22/','7,14,29',NULL),(23,1,27,2,68,1,10,8,12,3,'2018-01-01 17:36:07',1,4,'da','lux','podno',11000,'Stan prakticno nov, sve ukupno se u njemu boravilo 2 meseca. Namestaj neupotrebljivan i moguce ga uzeti u dogovoru. Nema parking zone, slobodan parking.','Aktivno',31,'Bulevar, nov, lux',159000,'slike/nekretnina23/','7,14',NULL),(26,2,3,1,128,1,3,4,4,3,'2022-02-02 05:59:38',1,3,'da','izvorno','nastruju',8000,'Lepa kuca u Zemunu, pogodna za porodicu.','Aktivno',34,'Lepa kuca, nova',140000,'slike/nekretnina26/','17,18,83',NULL),(27,1,3,1,38,1,3,4,4,1,'2022-02-02 06:34:06',1,3,'da','izvorno','ne',5000,'veg gth bkkej ij i','Aktivno',36,'asf',53000,'slike/nekretnina27/','17',NULL),(28,1,3,1,45,1,2,12,14,1,'1999-01-11 06:38:34',1,7,'ne','lux','centralno',6000,'grgrg','Aktivno',37,'cdgrg',65000,'slike/nekretnina28/','50',NULL),(29,1,24,1,73,2,12,15,15,3,'1969-01-01 05:31:00',2,4,'da','izvorno','centralno',5000,'Odlican stan u centru Kraljeva, na izuzetnoj lokaciji u blizini pesacke zone. Dve spavace sobe, dnevna soba, kuhinja, kupatilo i ostava.','Aktivno',38,'Trosoban stan na prodaju',73000,'slike/nekretnina29/','1',NULL),(30,1,24,1,48,2,12,15,15,2,'1970-01-01 05:37:09',5,5,'da','renovirano','centralno',3500,'Stan klimatizovan i kompletno renoviran. Uradjena izolacija krova, hoblovanje parketa, elektricne instalacije. Prodaje se sa stvarima.','Aktivno',39,'Dvosoban stan na prodaju',42000,'slike/nekretnina30/','',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omiljene`
--

LOCK TABLES `omiljene` WRITE;
/*!40000 ALTER TABLE `omiljene` DISABLE KEYS */;
INSERT INTO `omiljene` VALUES (7,2,16),(8,2,17),(9,2,22),(10,1,20),(11,2,9),(15,2,26);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opstina`
--

LOCK TABLES `opstina` WRITE;
/*!40000 ALTER TABLE `opstina` DISABLE KEYS */;
INSERT INTO `opstina` VALUES (1,'Vracar',1),(2,'Cukarica',1),(3,'Zemun',1),(4,'Novi Beograd',1),(5,'Palilula',1),(6,'Rakovica',1),(7,'Savski venac',1),(8,'Stari grad',1),(9,'Vozdovac',1),(10,'Zvezdara',1),(11,'Barajevo',1),(12,'Kraljevo',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulica`
--

LOCK TABLES `ulica` WRITE;
/*!40000 ALTER TABLE `ulica` DISABLE KEYS */;
INSERT INTO `ulica` VALUES (1,2,'Cetinjska'),(2,2,'Danila Kisa'),(3,1,'Hadzi Milentijeva'),(4,4,'Gardoska ulica'),(5,7,'Ugrinovacki put'),(6,6,'Cara Dusana'),(7,6,'Koste Dragicevica'),(8,10,'Kulina Bana'),(9,10,'Ravanicka'),(10,11,'Marka Oreskovica'),(12,8,'Gornicevska'),(13,11,'Branka Krsmanovica'),(14,12,'Obalskih radnika'),(15,15,'Omladinska');
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

-- Dump completed on 2022-02-22 12:39:58
