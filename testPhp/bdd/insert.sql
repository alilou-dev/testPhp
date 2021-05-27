- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 28 mai 2021 à 00:09
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `GestionEtudiant`
--

-- --------------------------------------------------------

-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID`, `nom`, `prenom`, `annee`) VALUES
(1, 'Raid', 'Ali', 1),
(2, 'Dubois', 'Léo', 1),
(3, 'Mannarino', 'Adrien', 1),
(4, 'Mokhtar', 'Smail', 1),
(5, 'Leroux', 'Joseph', 1),
(6, 'Dossantos', 'Émilie', 1);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`ID`, `nom`, `coefficient`) VALUES
(1, 'analyse', 5),
(2, 'bdd', 6),
(3, 'anglais', 3),
(4, 'programmation', 6);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`ID`, `id_matiere`, `id_etudiant`, `valeur`) VALUES
(1, 1, 1, 18),
(2, 2, 1, 17),
(3, 3, 1, 18),
(4, 4, 1, 6),
(5, 1, 2, 12),
(6, 2, 2, 11),
(7, 3, 2, 10),
(8, 4, 2, 2);

