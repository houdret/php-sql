-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 nov. 2021 à 10:30
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `becode`
--

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `idStudent` tinyint(3) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `datenaissance` date NOT NULL,
  `genre` varchar(10) NOT NULL,
  `school` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`idStudent`, `nom`, `prenom`, `datenaissance`, `genre`, `school`) VALUES
(1, 'Ere', 'Molly', '1990-11-17', 'F', 'Anderlecht'),
(2, 'Gavel', 'Aude', '1991-08-28', 'F', 'Anderlecht'),
(4, 'Nett', 'Marion', '1984-05-29', 'F', 'Anderlecht'),
(5, 'Ochon', 'Paul', '1994-10-09', 'M', 'Anderlecht'),
(6, 'Laybrise', 'Sam', '1985-07-30', 'M', 'Anderlecht'),
(7, 'Sion', 'Eddy', '1993-10-18', 'M', 'Anderlecht'),
(8, 'Beau', 'Harry', '1992-03-01', 'M', 'Anderlecht'),
(9, 'Touille', 'Sasha', '1978-05-16', 'M', 'Anderlecht'),
(10, 'Terrieur', 'Alain', '1988-11-22', 'M', 'Anderlecht'),
(11, 'Tarr', 'Guy', '1972-01-27', 'M', 'Anderlecht'),
(12, 'Door', 'Théo', '1984-06-24', 'M', 'Anderlecht'),
(13, 'Selayr', 'Jacques', '2017-04-24', 'M', 'Anderlecht'),
(14, 'Karena', 'Emma', '1982-03-30', 'F', 'Anderlecht'),
(15, 'Egée', 'Yves', '1989-05-31', 'M', 'Anderlecht'),
(16, 'Tramp', 'Pauline', '1980-01-03', 'F', 'Central'),
(17, 'Ciné', 'Emma', '1981-08-25', 'F', 'Central'),
(18, 'Daydui', 'Jean', '1996-05-09', 'M', 'Central'),
(19, 'Jean', 'Serge', '1989-07-21', 'M', 'Central'),
(20, 'Addy', 'Jack', '1993-04-07', 'M', 'Central'),
(21, 'Age', 'karl', '1991-01-25', 'M', 'Central'),
(22, 'Fini', 'Alain', '1993-10-03', 'M', 'Central'),
(23, 'Lophone', 'Alexis', '1960-11-29', 'M', 'Central'),
(24, 'Hochet', 'Rick', '1978-12-28', 'M', 'Central'),
(25, 'Liguili', 'Guy', '1996-03-18', 'M', 'Central'),
(26, 'Nouissement', 'Eva', '1980-08-23', 'F', 'Central'),
(27, 'Qui', 'Noah', '1978-06-20', 'M', 'Anderlecht'),
(28, 'Bombeur', 'Jean', '1989-03-10', 'M', 'Anderlecht'),
(29, 'Indefil', 'Bob', '1990-11-09', 'M', 'Anderlecht'),
(30, 'Time', 'Vincent', '1995-01-26', 'M', 'Anderlecht'),
(31, 'Dalor', 'Omer', '0000-00-00', 'M', '0'),


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idStudent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `idStudent` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
