-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2022 at 09:14 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencija`
--

DROP TABLE IF EXISTS `agencija`;
CREATE TABLE IF NOT EXISTS `agencija` (
  `idA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `adresa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `PIB` varchar(45) COLLATE utf8_bin NOT NULL,
  `idGrada` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idA`),
  UNIQUE KEY `idA_UNIQUE` (`idA`),
  UNIQUE KEY `PIB_UNIQUE` (`PIB`),
  KEY `grad` (`idGrada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
CREATE TABLE IF NOT EXISTS `grad` (
  `idG` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idG`),
  UNIQUE KEY `idG_UNIQUE` (`idG`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`idG`, `naziv`) VALUES
(1, 'Beograd');

-- --------------------------------------------------------

--
-- Table structure for table `karakteristike`
--

DROP TABLE IF EXISTS `karakteristike`;
CREATE TABLE IF NOT EXISTS `karakteristike` (
  `idkarakteristike` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
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

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `idK` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kor_ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `ime` varchar(45) COLLATE utf8_bin NOT NULL,
  `prezime` varchar(45) COLLATE utf8_bin NOT NULL,
  `lozinka` varchar(45) COLLATE utf8_bin NOT NULL,
  `datum_rodjenja` datetime DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `e_mail` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idGrada` int(10) UNSIGNED NOT NULL,
  `idAgencije` int(10) UNSIGNED DEFAULT NULL,
  `br_licence` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tip` int(11) NOT NULL,
  `odobren` int(11) DEFAULT '0',
  PRIMARY KEY (`idK`),
  UNIQUE KEY `idK_UNIQUE` (`idK`),
  UNIQUE KEY `kor_ime_UNIQUE` (`kor_ime`),
  UNIQUE KEY `e_mail_UNIQUE` (`e_mail`),
  KEY `tip_idx` (`tip`),
  KEY `gradid_idx` (`idGrada`),
  KEY `idAgencije_idx` (`idAgencije`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idK`, `kor_ime`, `ime`, `prezime`, `lozinka`, `datum_rodjenja`, `telefon`, `e_mail`, `idGrada`, `idAgencije`, `br_licence`, `tip`, `odobren`) VALUES
(1, 'mile123', 'Mile', 'Milic', 'sifra123', '1985-05-05 00:00:00', '0616672345', 'milence@gmail.com', 1, NULL, NULL, 1, 0),
(2, 'luka123', 'Luka', 'Lukic', 'sifra123', '1990-03-01 00:00:00', '06375751895', 'lulence@gmail.com', 1, NULL, NULL, 1, 0),
(3, 'stana123', 'Stana', 'Stanic', 'sifra123', '1976-01-04 00:00:00', '0665619728', 'stanika@gmail.com', 1, NULL, NULL, 2, 0),
(4, 'mare', 'marko', 'Markovic', 'marko123', '2022-02-16 10:31:55', '0656356539', 'marko@gmail.com', 1, NULL, NULL, 1, 0),
(6, 'peki', 'Perar', 'Petrovic', 'peki123', '1999-02-02 10:33:35', '0656356539', 'peki@gmail.com', 1, NULL, NULL, 1, 0),
(7, 'dandz', 'Dana', 'Danovic', 'dana123', '2022-02-01 10:38:22', '011/123-1-143', 'danica.bandovic@gmail.com', 1, NULL, NULL, 1, 0),
(11, 'kalu', 'Kalus', 'Kalovic', 'kalu123', '2022-02-01 10:40:57', '011/123-1-143', 'kalu@gmail.com', 1, NULL, NULL, 1, 0),
(12, 'iki', 'Irena', 'Irenovic', 'iki123', '2022-02-16 10:46:33', '011/123-1-143', 'iki@gmail.com', 1, NULL, NULL, 1, 0),
(13, 'imenko', 'Ime', 'Imevic', 'ime123', '2022-02-24 10:47:34', '0656356539', 'ime@gmail.com', 1, NULL, NULL, 1, 0),
(14, 'mina123', 'mina', 'minic', 'minka123!bG', '2001-02-14 13:59:19', '0656356539', 'minka@gmail.com', 1, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mikrolokacija`
--

DROP TABLE IF EXISTS `mikrolokacija`;
CREATE TABLE IF NOT EXISTS `mikrolokacija` (
  `idmikro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `opstina` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idmikro`),
  UNIQUE KEY `idmikro_UNIQUE` (`idmikro`),
  KEY `opstina` (`opstina`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mikrolokacija`
--

INSERT INTO `mikrolokacija` (`idmikro`, `naziv`, `opstina`) VALUES
(1, 'Neimar', 1),
(2, 'Crveni krst', 1),
(3, 'Kalenic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

DROP TABLE IF EXISTS `nekretnina`;
CREATE TABLE IF NOT EXISTS `nekretnina` (
  `idN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tip` int(10) UNSIGNED NOT NULL,
  `oglasivac` int(10) UNSIGNED NOT NULL,
  `agencija` int(10) UNSIGNED NOT NULL,
  `kvadratura` int(11) DEFAULT NULL,
  `gradID` int(10) UNSIGNED NOT NULL,
  `opstina` int(10) UNSIGNED NOT NULL,
  `mikrolokacija` int(10) UNSIGNED NOT NULL,
  `ulica` int(10) UNSIGNED NOT NULL,
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
  `karakteristike` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idN`),
  UNIQUE KEY `idN_UNIQUE` (`idN`),
  KEY `agencijaID` (`agencija`),
  KEY `grd` (`gradID`),
  KEY `karakt` (`karakteristike`),
  KEY `mikrlok` (`mikrolokacija`),
  KEY `oglasivacID` (`oglasivac`),
  KEY `opst` (`opstina`),
  KEY `tipNekr` (`tip`),
  KEY `ul` (`ulica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `omiljene`
--

DROP TABLE IF EXISTS `omiljene`;
CREATE TABLE IF NOT EXISTS `omiljene` (
  `idO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idKupca` int(10) UNSIGNED NOT NULL,
  `idNekretnine` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idO`),
  UNIQUE KEY `idO_UNIQUE` (`idO`),
  KEY `idkupca_idx` (`idKupca`),
  KEY `idnekretnine_idx` (`idNekretnine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `opstina`
--

DROP TABLE IF EXISTS `opstina`;
CREATE TABLE IF NOT EXISTS `opstina` (
  `idOpstine` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `grad` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idOpstine`),
  UNIQUE KEY `idOpstine_UNIQUE` (`idOpstine`),
  KEY `idgrad` (`grad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `opstina`
--

INSERT INTO `opstina` (`idOpstine`, `naziv`, `grad`) VALUES
(1, 'Vracar', 1),
(2, 'Cukarica', 1),
(3, 'Zemun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipkorisnika`
--

DROP TABLE IF EXISTS `tipkorisnika`;
CREATE TABLE IF NOT EXISTS `tipkorisnika` (
  `idT` int(11) NOT NULL AUTO_INCREMENT,
  `tip_korisnika` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idT`),
  UNIQUE KEY `idT_UNIQUE` (`idT`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tipkorisnika`
--

INSERT INTO `tipkorisnika` (`idT`, `tip_korisnika`) VALUES
(1, 'kupac'),
(2, 'samostalni prodavac'),
(3, 'agent'),
(4, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tipnekretnine`
--

DROP TABLE IF EXISTS `tipnekretnine`;
CREATE TABLE IF NOT EXISTS `tipnekretnine` (
  `idTipnekretnine` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv_tipa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idTipnekretnine`),
  UNIQUE KEY `idTipnekretnine_UNIQUE` (`idTipnekretnine`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tipnekretnine`
--

INSERT INTO `tipnekretnine` (`idTipnekretnine`, `naziv_tipa`) VALUES
(1, 'stan'),
(2, 'kuca'),
(3, 'vikendica'),
(4, 'lokal'),
(5, 'magacin');

-- --------------------------------------------------------

--
-- Table structure for table `ulica`
--

DROP TABLE IF EXISTS `ulica`;
CREATE TABLE IF NOT EXISTS `ulica` (
  `idU` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mikrolokacija` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idU`),
  UNIQUE KEY `idU_UNIQUE` (`idU`),
  KEY `mikrolokacija` (`mikrolokacija`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ulica`
--

INSERT INTO `ulica` (`idU`, `mikrolokacija`, `naziv`) VALUES
(1, 2, 'Cetinjska'),
(2, 2, 'Danila Kisa'),
(3, 1, 'Hadzi Milentijeva');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencija`
--
ALTER TABLE `agencija`
  ADD CONSTRAINT `grad` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `gradid` FOREIGN KEY (`idGrada`) REFERENCES `grad` (`idG`),
  ADD CONSTRAINT `idAgencije` FOREIGN KEY (`idAgencije`) REFERENCES `agencija` (`idA`),
  ADD CONSTRAINT `tip` FOREIGN KEY (`tip`) REFERENCES `tipkorisnika` (`idT`);

--
-- Constraints for table `mikrolokacija`
--
ALTER TABLE `mikrolokacija`
  ADD CONSTRAINT `opstina` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`);

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `agencijaID` FOREIGN KEY (`agencija`) REFERENCES `agencija` (`idA`),
  ADD CONSTRAINT `grd` FOREIGN KEY (`gradID`) REFERENCES `grad` (`idG`),
  ADD CONSTRAINT `karakt` FOREIGN KEY (`karakteristike`) REFERENCES `karakteristike` (`idkarakteristike`),
  ADD CONSTRAINT `mikrlok` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`),
  ADD CONSTRAINT `oglasivacID` FOREIGN KEY (`oglasivac`) REFERENCES `korisnik` (`idK`),
  ADD CONSTRAINT `opst` FOREIGN KEY (`opstina`) REFERENCES `opstina` (`idOpstine`),
  ADD CONSTRAINT `tipNekr` FOREIGN KEY (`tip`) REFERENCES `tipnekretnine` (`idTipnekretnine`),
  ADD CONSTRAINT `ul` FOREIGN KEY (`ulica`) REFERENCES `ulica` (`idU`);

--
-- Constraints for table `omiljene`
--
ALTER TABLE `omiljene`
  ADD CONSTRAINT `idkupca` FOREIGN KEY (`idKupca`) REFERENCES `korisnik` (`idK`),
  ADD CONSTRAINT `idnekretnine` FOREIGN KEY (`idNekretnine`) REFERENCES `nekretnina` (`idN`);

--
-- Constraints for table `opstina`
--
ALTER TABLE `opstina`
  ADD CONSTRAINT `idgrad` FOREIGN KEY (`grad`) REFERENCES `grad` (`idG`);

--
-- Constraints for table `ulica`
--
ALTER TABLE `ulica`
  ADD CONSTRAINT `mikrolokacija` FOREIGN KEY (`mikrolokacija`) REFERENCES `mikrolokacija` (`idmikro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
