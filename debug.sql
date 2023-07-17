-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 18 fév. 2022 à 02:16
-- Version du serveur :  10.1.48-MariaDB-0+deb9u2
-- Version de PHP :  7.3.30-1+0~20210826.87+debian9~1.gbpe56a7b

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `debug`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `ID` int(11) NOT NULL,
  `ID_CLIENT` varchar(255) CHARACTER SET latin1 NOT NULL,
  `TITRE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `URL` varchar(255) CHARACTER SET latin1 NOT NULL,
  `VENTEPRIX` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DESCRIPTION` text CHARACTER SET latin1 NOT NULL,
  `ETAT` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DATE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DISCORDMAIL` varchar(255) NOT NULL,
  `OBJET` varchar(255) NOT NULL,
  `TEL` varchar(255) NOT NULL,
  `PUBLICATION` int(11) NOT NULL DEFAULT '0',
  `VENDEUR` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `ACHETEUR` varchar(255) NOT NULL,
  `STAFF` varchar(255) NOT NULL,
  `PAIEMENT` varchar(255) NOT NULL,
  `DATE` varchar(255) NOT NULL,
  `DATEFIN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `ID` int(11) NOT NULL,
  `URL` text CHARACTER SET latin1 NOT NULL,
  `TITRE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DESCRIPTION` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DEPARTPRIX` text CHARACTER SET latin1 NOT NULL,
  `VENTEPRIX` varchar(255) CHARACTER SET latin1 NOT NULL,
  `FIN` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ORGANISATEUR` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `encherir`
--

CREATE TABLE `encherir` (
  `ID` int(11) NOT NULL,
  `PRIX` text CHARACTER SET latin1 NOT NULL,
  `DATEPRIX` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ENCHERISSEUR` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `TYPE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `DATE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `STAFF` varchar(255) CHARACTER SET latin1 NOT NULL,
  `MESSAGE` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `ID` int(11) NOT NULL,
  `TITRE` varchar(255) CHARACTER SET latin1 NOT NULL,
  `URL` varchar(255) CHARACTER SET latin1 NOT NULL,
  `MESSAGE` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`ID`, `TITRE`, `URL`, `MESSAGE`) VALUES
(1, 'Libre', '../assets/img/slogan.png', 'Cette affiche est disponible seulement pour 100 000€ /20 jours'),
(2, 'Libre', '../assets/img/slogan.png', 'Cette affiche est disponible seulement pour 100 000€ /20 jours	'),
(3, 'Libre', '../assets/img/slogan.png', 'Cette affiche est disponible seulement pour 100 000€ /20 jours	'),
(4, 'Libre', '../assets/img/slogan.png', 'Cette affiche est disponible seulement pour 100 000€ /20 jours	');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `ID_CLIENT` varchar(255) NOT NULL,
  `PRENOM` text NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `CODEVENDEUR` varchar(255) NOT NULL,
  `EMAIL` text NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  `RANK` int(11) NOT NULL DEFAULT '0',
  `DATE_INSCRIPTION` varchar(255) NOT NULL,
  `NAISSANCE` varchar(255) NOT NULL,
  `IP_ADRESS` varchar(255) NOT NULL,
  `PREMIUM` int(11) NOT NULL,
  `ENCHERE` varchar(255) NOT NULL DEFAULT '0',
  `PUB` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vendu`
--

CREATE TABLE `vendu` (
  `FIN` varchar(255) CHARACTER SET latin1 NOT NULL,
  `CVENDEUR` varchar(255) CHARACTER SET latin1 NOT NULL,
  `CVENTEPRIX` varchar(255) CHARACTER SET latin1 NOT NULL,
  `CTITRE` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD KEY `ACHETEUR` (`ACHETEUR`(191)),
  ADD KEY `ACHETEUR_2` (`ACHETEUR`(191)),
  ADD KEY `ACHETEUR_3` (`ACHETEUR`(191));

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `encherir`
--
ALTER TABLE `encherir`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vendu`
--
ALTER TABLE `vendu`
  ADD PRIMARY KEY (`FIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
