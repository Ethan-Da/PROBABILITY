-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2024 at 11:43 AM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `probability_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `last_connection` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`login`, `password`, `last_ip`, `last_connection`) VALUES
('admin', 'c83c6767c13e442ab88db6bec19c1f30', '192.168.24.4', '2024-11-28'),
('ethan', '9b66b542c953da1245f6396af4fd3c2b', '192.168.24.4', '2024-11-28'),
('Hazim', 'a91eb05915a6d820bcb9c3860f2a0646', '192.168.24.2', '2024-11-18'),
('jsp', 'ec407cce6b649daa8e320157e5763976', '192.168.24.30', '2024-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `fiche_calcul`
--

CREATE TABLE `fiche_calcul` (
  `id_fiche` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `module` int(11) NOT NULL,
  `esperance` float NOT NULL,
  `forme` float NOT NULL,
  `T` float NOT NULL,
  `resultat` int(64) NOT NULL,
  `login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  ADD PRIMARY KEY (`id_fiche`),
  ADD KEY `FOREIGN_KEY_LOGIN` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  MODIFY `id_fiche` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  ADD CONSTRAINT `FOREIGN_KEY_LOGIN` FOREIGN KEY (`login`) REFERENCES `compte` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
