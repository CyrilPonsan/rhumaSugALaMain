-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 17 fév. 2022 à 09:39
-- Version du serveur : 10.6.5-MariaDB-2
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rhuma-sug`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteClient`
--

CREATE TABLE `compteClient` (
  `clientId` int(11) NOT NULL,
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

INSERT INTO `compteClient` (`clientId`, `nom`, `prenom`, `email`, `passwd`, `adresse`, `codePostal`, `ville`) VALUES
(28, 'Linet', 'Babou', 'babou@leverlecoude.fr', 'Abcd@1234', '2 rue bidule machin', 94500, 'Toto sur Marne');

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
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `prixProduit` decimal(10,2) NOT NULL,
  `urlProduit` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `descriptionProduit` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `prixProduit`, `urlProduit`, `descriptionProduit`) VALUES
(3, 'rhum ordinaire', '39.90', 'rhumnormal.jpg', 'Rhum bio produit et mis en bouteille à la propriété.'),
(4, 'rhum vieilli', '89.90', 'rhumvieux.png', 'Rhum vieilli en fût.'),
(5, 'sucre de canne', '4.90', 'sucredecanne.jpg', 'Sucre de canne bio, produit sur place.'),
(6, 'sucre  liquide', '9.90', 'canadou.jpeg', 'Sucre de canne liquide bio.');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `idVente` int(11) NOT NULL,
  `vente` datetime NOT NULL DEFAULT current_timestamp(),
  `compteClientId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compteClient`
--
ALTER TABLE `compteClient`
  ADD PRIMARY KEY (`clientId`);

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
  ADD PRIMARY KEY (`idProduit`);

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
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `idVente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_produit0_FK` FOREIGN KEY (`produitId`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `panier_vente_FK` FOREIGN KEY (`idVente`) REFERENCES `vente` (`idVente`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_compteClient_FK` FOREIGN KEY (`compteClientId`) REFERENCES `compteClient` (`clientId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
