-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 23 jan. 2022 à 10:49
-- Version du serveur : 10.6.5-MariaDB-2
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vente-rhum`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteClient`
--

CREATE TABLE `compteClient` (
  `compteClientId` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `passwd` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `compteClient`
--

INSERT INTO `compteClient` (`compteClientId`, `nom`, `prenom`, `email`, `passwd`, `adresse`, `codePostal`, `ville`) VALUES
(4, 'toto', 'jim', 'jm.toto@rhum.fr', '1234', '14 rue de la cavalerie', 64000, 'pau');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idVente` int(11) NOT NULL,
  `produitId` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixVenteProduit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `produitId` int(11) NOT NULL,
  `nomProduit` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `prixProduit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`produitId`, `nomProduit`, `prixProduit`) VALUES
(1, 'Rhum ordinaire', '23.23'),
(2, 'Sucre liquide', '15.12');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `idVente` int(11) NOT NULL,
  `vente` datetime NOT NULL,
  `compteClientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compteClient`
--
ALTER TABLE `compteClient`
  ADD PRIMARY KEY (`compteClientId`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idVente`,`produitId`),
  ADD KEY `panier_produit0_FK` (`produitId`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`produitId`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`idVente`),
  ADD KEY `vente_compteClient_FK` (`compteClientId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compteClient`
--
ALTER TABLE `compteClient`
  MODIFY `compteClientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `produitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `idVente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_produit0_FK` FOREIGN KEY (`produitId`) REFERENCES `produit` (`produitId`),
  ADD CONSTRAINT `panier_vente_FK` FOREIGN KEY (`idVente`) REFERENCES `vente` (`idVente`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_compteClient_FK` FOREIGN KEY (`compteClientId`) REFERENCES `compteClient` (`compteClientId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
