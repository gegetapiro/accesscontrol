-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 04, 2022 alle 14:10
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlloaccessi`
--
CREATE DATABASE IF NOT EXISTS `controlloaccessi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `controlloaccessi`;

-- --------------------------------------------------------

--
-- Struttura della tabella `accesses`
--

CREATE TABLE `accesses` (
  `id` int(11) NOT NULL,
  `datagiorno` varchar(45) NOT NULL,
  `ora_ingresso` varchar(45) NOT NULL,
  `ora_uscita` varchar(45) DEFAULT NULL,
  `covidControl` varchar(10) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `entryReasons` varchar(200) DEFAULT NULL,
  `referent` varchar(100) DEFAULT NULL,
  `licensePlate` varchar(45) DEFAULT NULL,
  `notes` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `lavoratoriammessi`
--

CREATE TABLE `lavoratoriammessi` (
  `id` int(11) NOT NULL,
  `codiceFiscale` varchar(16) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `azienda` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `workerkind` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `observers_modifiers`
--

CREATE TABLE `observers_modifiers` (
  `id` int(12) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `userType` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lavoratoriammessi`
--
ALTER TABLE `lavoratoriammessi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codiceFiscale` (`codiceFiscale`),
  ADD UNIQUE KEY `codiceFiscale_2` (`codiceFiscale`);

--
-- Indici per le tabelle `observers_modifiers`
--
ALTER TABLE `observers_modifiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `lavoratoriammessi`
--
ALTER TABLE `lavoratoriammessi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `observers_modifiers`
--
ALTER TABLE `observers_modifiers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
