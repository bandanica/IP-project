-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: prodajanekretnina
-- ------------------------------------------------------
-- Server version	5.7.36

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
  `idA` int(10) unsigned NOT NULL,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `adresa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `PIB` varchar(45) COLLATE utf8_bin NOT NULL,
  `idGrada` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idA`),
  UNIQUE KEY `idA_UNIQUE` (`idA`),
  UNIQUE KEY `PIB_UNIQUE` (`PIB`),
  UNIQUE KEY `idGrada_UNIQUE` (`idGrada`),
  CONSTRAINT `grad` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agencija`
--

LOCK TABLES `agencija` WRITE;
/*!40000 ALTER TABLE `agencija` DISABLE KEYS */;
/*!40000 ALTER TABLE `agencija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grad` (
  `idG` int(10) unsigned NOT NULL,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idG`),
  UNIQUE KEY `idG_UNIQUE` (`idG`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grad`
--

LOCK TABLES `grad` WRITE;
/*!40000 ALTER TABLE `grad` DISABLE KEYS */;
/*!40000 ALTER TABLE `grad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `karakteristike`
--

DROP TABLE IF EXISTS `karakteristike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `karakteristike` (
  `idkarakteristike` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terasa` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `lodja` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `lift` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `franc.balkon` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `podrum` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `garaza` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `sa bastom` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `klima` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `internet` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `parking` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idkarakteristike`),
  UNIQUE KEY `idkarakteristike_UNIQUE` (`idkarakteristike`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `karakteristike`
--

LOCK TABLES `karakteristike` WRITE;
/*!40000 ALTER TABLE `karakteristike` DISABLE KEYS */;
/*!40000 ALTER TABLE `karakteristike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `idK` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kor_ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(45) COLLATE utf8_bin NOT NULL,
  `datum_rodjenja` datetime DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `e_mail` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idGrada` int(10) unsigned NOT NULL,
  `idAgencije` int(10) unsigned DEFAULT NULL,
  `br_licence` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tip` int(10) NOT NULL,
  PRIMARY KEY (`idK`),
  UNIQUE KEY `idK_UNIQUE` (`idK`),
  UNIQUE KEY `kor_ime_UNIQUE` (`kor_ime`),
  KEY `tip_idx` (`tip`),
  KEY `gradid_idx` (`idGrada`),
  KEY `idAgencije_idx` (`idAgencije`),
  CONSTRAINT `gradid` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idAgencije` FOREIGN KEY (`idAgencije`) REFERENCES `agencija` (`idA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tip` FOREIGN KEY (`tip`) REFERENCES `tipkorisnika` (`idT`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mikrolokacija`
--

DROP TABLE IF EXISTS `mikrolokacija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mikrolokacija` (
  `idmikro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `opstina` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idmikro`),
  UNIQUE KEY `idmikro_UNIQUE` (`idmikro`),
  UNIQUE KEY `opstina_UNIQUE` (`opstina`),
  CONSTRAINT `opstina` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mikrolokacija`
--

LOCK TABLES `mikrolokacija` WRITE;
/*!40000 ALTER TABLE `mikrolokacija` DISABLE KEYS */;
/*!40000 ALTER TABLE `mikrolokacija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nekretnina`
--

DROP TABLE IF EXISTS `nekretnina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nekretnina` (
  `idN` int(10) unsigned NOT NULL,
  `tip` int(10) unsigned NOT NULL,
  `oglasivac` int(10) unsigned NOT NULL,
  `agencija` int(10) unsigned NOT NULL,
  `kvadratura` int(11) DEFAULT NULL,
  `gradID` int(10) unsigned NOT NULL,
  `opstina` int(10) unsigned NOT NULL,
  `mikrolokacija` int(10) unsigned NOT NULL,
  `ulica` int(10) unsigned NOT NULL,
  `br_soba` int(11) DEFAULT NULL,
  `godina_izgradnje` year(4) DEFAULT NULL,
  `sprat` int(11) DEFAULT NULL,
  `ukupna_spratnost` int(11) DEFAULT NULL,
  `parking` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `stanje` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `grejanje` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `mesecni_troskovi` int(11) DEFAULT NULL,
  `opis` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `karakteristike` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idN`),
  UNIQUE KEY `idN_UNIQUE` (`idN`),
  UNIQUE KEY `tip_UNIQUE` (`tip`),
  UNIQUE KEY `agencija_UNIQUE` (`agencija`),
  UNIQUE KEY `grad_UNIQUE` (`gradID`),
  UNIQUE KEY `opstina_UNIQUE` (`opstina`),
  UNIQUE KEY `mikrolokacija_UNIQUE` (`mikrolokacija`),
  UNIQUE KEY `ulica_UNIQUE` (`ulica`),
  UNIQUE KEY `oglasivac_UNIQUE` (`oglasivac`),
  UNIQUE KEY `karakteristike_UNIQUE` (`karakteristike`),
  CONSTRAINT `agencijaID` FOREIGN KEY (`agencija`) REFERENCES `agencija` (`idA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grd` FOREIGN KEY (`gradID`) REFERENCES `grad` (`idG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `karakt` FOREIGN KEY (`karakteristike`) REFERENCES `karakteristike` (`idkarakteristike`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `mikrlok` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oglasivacID` FOREIGN KEY (`oglasivac`) REFERENCES `korisnik` (`idK`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `opst` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipNekr` FOREIGN KEY (`tip`) REFERENCES `tipnekretnine` (`idTipnekretnine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ul` FOREIGN KEY (`ulica`) REFERENCES `ulica` (`idU`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nekretnina`
--

LOCK TABLES `nekretnina` WRITE;
/*!40000 ALTER TABLE `nekretnina` DISABLE KEYS */;
/*!40000 ALTER TABLE `nekretnina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `omiljene`
--

DROP TABLE IF EXISTS `omiljene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `omiljene` (
  `idO` int(11) unsigned NOT NULL,
  `idKupca` int(10) unsigned NOT NULL,
  `idNekretnine` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idO`),
  UNIQUE KEY `idO_UNIQUE` (`idO`),
  KEY `idkupca_idx` (`idKupca`),
  KEY `idnekretnine_idx` (`idNekretnine`),
  CONSTRAINT `idkupca` FOREIGN KEY (`idKupca`) REFERENCES `korisnik` (`idK`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idnekretnine` FOREIGN KEY (`idNekretnine`) REFERENCES `nekretnina` (`idN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `omiljene`
--

LOCK TABLES `omiljene` WRITE;
/*!40000 ALTER TABLE `omiljene` DISABLE KEYS */;
/*!40000 ALTER TABLE `omiljene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opstina`
--

DROP TABLE IF EXISTS `opstina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opstina` (
  `idOpstine` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `grad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idOpstine`),
  UNIQUE KEY `idOpstine_UNIQUE` (`idOpstine`),
  UNIQUE KEY `grad_UNIQUE` (`grad`),
  CONSTRAINT `idgrad` FOREIGN KEY (`grad`) REFERENCES `grad` (`idG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opstina`
--

LOCK TABLES `opstina` WRITE;
/*!40000 ALTER TABLE `opstina` DISABLE KEYS */;
/*!40000 ALTER TABLE `opstina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipkorisnika`
--

DROP TABLE IF EXISTS `tipkorisnika`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipkorisnika` (
  `idT` int(10) NOT NULL AUTO_INCREMENT,
  `tip_korisnika` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idT`),
  UNIQUE KEY `idT_UNIQUE` (`idT`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `idTipnekretnine` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTipnekretnine`),
  UNIQUE KEY `idTipnekretnine_UNIQUE` (`idTipnekretnine`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `idU` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mikrolokacija` int(10) unsigned NOT NULL,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idU`),
  UNIQUE KEY `idU_UNIQUE` (`idU`),
  UNIQUE KEY `mikrolokacija_UNIQUE` (`mikrolokacija`),
  CONSTRAINT `mikrolokacija` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulica`
--

LOCK TABLES `ulica` WRITE;
/*!40000 ALTER TABLE `ulica` DISABLE KEYS */;
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

-- Dump completed on 2022-02-03 16:33:27
