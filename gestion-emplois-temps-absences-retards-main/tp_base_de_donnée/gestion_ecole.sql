-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 07:53 PM
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
-- Database: `gestion_ecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Numcours` int(11) NOT NULL,
  `Jour` text NOT NULL,
  `Hdeb` int(11) NOT NULL,
  `Hfin` int(11) NOT NULL,
  PRIMARY KEY (`Numcours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cours_dispensé`
--

DROP TABLE IF EXISTS `cours_dispensé`;
CREATE TABLE IF NOT EXISTS `cours_dispensé` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcours` int(11) NOT NULL,
  `datecours` datetime NOT NULL,
  `hrdeb` timestamp NOT NULL,
  `hrfin` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numcours` (`numcours`),
  KEY `datecours` (`datecours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date_du_cours`
--

DROP TABLE IF EXISTS `date_du_cours`;
CREATE TABLE IF NOT EXISTS `date_du_cours` (
  `datecours` datetime NOT NULL,
  PRIMARY KEY (`datecours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Matricule` int(11) NOT NULL,
  `Noms` text NOT NULL,
  `Prénom` text NOT NULL,
  `Sexe` text NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiants_absents`
--

DROP TABLE IF EXISTS `etudiants_absents`;
CREATE TABLE IF NOT EXISTS `etudiants_absents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcours` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  `datecours` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numcours` (`numcours`),
  KEY `matricule` (`matricule`),
  KEY `datecours` (`datecours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `CodeFil` int(11) NOT NULL,
  `LibFil` text NOT NULL,
  PRIMARY KEY (`CodeFil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `NumIns` int(11) NOT NULL AUTO_INCREMENT,
  `DateIns` date NOT NULL,
  `Annee` year(4) NOT NULL,
  `CodFil` int(11) NOT NULL,
  `Matricule` int(11) NOT NULL,
  PRIMARY KEY (`NumIns`),
  KEY `CodFil` (`CodFil`),
  KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `CodeMat` int(11) NOT NULL,
  `LibMat` text NOT NULL,
  PRIMARY KEY (`CodeMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `Numprof` int(11) NOT NULL COMMENT 'Numero d''identification du professeur ',
  `Nomprof` int(11) NOT NULL COMMENT 'Nom du professeur',
  PRIMARY KEY (`Numprof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CodeFil` int(11) NOT NULL,
  `NumInsResponsable1` int(11) NOT NULL,
  `NumInsResponsable2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NumInsResponsable2` (`NumInsResponsable2`),
  KEY `CodeFil` (`CodeFil`),
  KEY `NumInsResponsable1` (`NumInsResponsable1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Premier responsable ';

-- --------------------------------------------------------

--
-- Table structure for table `salle_de_cours`
--

DROP TABLE IF EXISTS `salle_de_cours`;
CREATE TABLE IF NOT EXISTS `salle_de_cours` (
  `Numsal` int(11) NOT NULL,
  `Capacité` text NOT NULL,
  `Typesal` text NOT NULL,
  PRIMARY KEY (`Numsal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_filiere_CodFil` FOREIGN KEY (`Numcours`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_matiere_codmat` FOREIGN KEY (`Numcours`) REFERENCES `matiere` (`CodeMat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_professeur_Numprof` FOREIGN KEY (`Numcours`) REFERENCES `professeur` (`Numprof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_salle_de_cours_Numsal` FOREIGN KEY (`Numcours`) REFERENCES `salle_de_cours` (`Numsal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cours_dispensé`
--
ALTER TABLE `cours_dispensé`
  ADD CONSTRAINT `cours_dispense_cours_numcours` FOREIGN KEY (`numcours`) REFERENCES `cours` (`Numcours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_dispense_date_du_cours_datecours` FOREIGN KEY (`datecours`) REFERENCES `date_du_cours` (`datecours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etudiants_absents`
--
ALTER TABLE `etudiants_absents`
  ADD CONSTRAINT `etudiants_absents_cours_numcours` FOREIGN KEY (`numcours`) REFERENCES `cours` (`Numcours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiants_absents_date_du_cours_datecours` FOREIGN KEY (`datecours`) REFERENCES `date_du_cours` (`datecours`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiants_absents_etudiant_matricule ` FOREIGN KEY (`matricule`) REFERENCES `etudiant` (`Matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_etudiant_Matricule` FOREIGN KEY (`NumIns`) REFERENCES `etudiant` (`Matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_filiere_CodFil` FOREIGN KEY (`NumIns`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_inscription_NumInsResponsable1` FOREIGN KEY (`NumInsResponsable1`) REFERENCES `inscription` (`NumIns`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `responsable_inscription_NumInsResponsable2` FOREIGN KEY (`NumInsResponsable2`) REFERENCES `inscription` (`NumIns`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
