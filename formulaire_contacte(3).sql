-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 07 déc. 2018 à 15:52
-- Version du serveur :  5.7.19
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formulaire_contacte`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `nom` varchar(255) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`nom`, `id_book`, `id_membres`) VALUES
('Famille', 4, 4),
('Amis', 8, 4),
('', 16, 4),
('', 17, 4),
('', 18, 4),
('sfdfsf', 19, 4),
('sdfsf', 20, 4),
('sfsdf', 21, 4),
('sfsdf', 22, 4),
('sfsdf', 23, 4),
('Lalala', 24, 7);

-- --------------------------------------------------------

--
-- Structure de la table `donnee_contact`
--

CREATE TABLE `donnee_contact` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` int(30) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id_book` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnee_contact`
--

INSERT INTO `donnee_contact` (`nom`, `prenom`, `telephone`, `id_contact`, `mail`, `id_book`) VALUES
('Lalala', 'Maorui', 64165, 1, 'maroussia.gossmann@yahoo.fr', 0),
('Lalala', 'Maorui', 64165, 2, 'maroussia.gossmann@yahoo.fr', 0),
('sqsd', 'qsdqsd', 656, 3, 'test@test.fr', 4),
('Lala', 'Lalala', 42, 4, 'test@test.fr', 24);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membres` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membres`, `mail`, `motdepasse`) VALUES
(1, 'maroussia.gossmann@yahoo.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(2, 'test@test.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(6, 'azerty@azerty.cs', 'bb8062e9d794e1f1288680e4039299cab78c737d'),
(7, 'azerty@azerty.com', '9cf95dacd226dcf43da376cdb6cbba7035218921');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `lala` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `donnee_contact`
--
ALTER TABLE `donnee_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membres`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `donnee_contact`
--
ALTER TABLE `donnee_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
