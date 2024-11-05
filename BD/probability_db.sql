-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 nov. 2024 à 20:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `probability_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `last_connection` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`login`, `password`, `last_ip`, `last_connection`) VALUES
('test1', '5a105e8b9d40e1329780d62ea2265d', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fiche_calcul`
--

CREATE TABLE `fiche_calcul` (
  `id_fiche` int(11) NOT NULL,
  `date` date NOT NULL,
  `module` int(11) NOT NULL,
  `calcul` varchar(255) NOT NULL,
  `resultat` int(64) NOT NULL,
  `login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  ADD PRIMARY KEY (`id_fiche`),
  ADD KEY `FOREIGN_KEY_LOGIN` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  MODIFY `id_fiche` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche_calcul`
--
ALTER TABLE `fiche_calcul`
  ADD CONSTRAINT `FOREIGN_KEY_LOGIN` FOREIGN KEY (`login`) REFERENCES `compte` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
