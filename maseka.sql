-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 juil. 2024 à 14:14
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maseka`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `designation`) VALUES
(1, 'boissonn'),
(2, 'patisserie');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `genre` text NOT NULL,
  `telephone` text NOT NULL,
  `photo` text NOT NULL,
  `username` text NOT NULL,
  `motdepasse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `photo`, `username`, `motdepasse`) VALUES
(1, 'Kiro', 'mwenge', 'lauraine', 'F', '0971402590', 'back.jpg', 'Kiromwenge@maseka.com', 'wR02I971FA'),
(2, 'kambale ', 'kamala', 'albert', 'M', '0977139499', 'f5.png', 'kambalekamala@maseka.com', 'kaaM45aA977KA'),
(3, 'kakule ', 'kamal', 'kelvin', 'M', '0987799894', 'f3.png', 'kakule kamal@maseka.com', 'kaaK99kA987MKA'),
(6, 'Anonyme', 'anonyme', 'anoyme', 'M', 'aucun', '1.png', 'Anonymeanonyme@maseka.com', 'nONucuMN'),
(7, 'kikii', 'iiiio', 'iioooo', 'M', 'oiiiiiiiiii', '1.png', 'kikiiiiiio@maseka.com', 'iKiiIiiiMI'),
(8, 'qqww', 'www', 'www', 'M', 'qqqqqqqqq', '1.png', 'qqwwwww@maseka.com', 'wWqqQqqqMW'),
(9, 'ertrtt', 'eee', 'www', 'M', 'www', '1.png', 'ertrtteee@maseka.com', 'eTRwwMW'),
(10, 'qqqqqqqqq', 'qqqqqqq', 'qqq', 'M', 'qqqq', '1.png', 'qqqqqqqqqqqqqqqq@maseka.com', 'qQQqqqMQ'),
(11, 'kam', 'kasere', 'lucas', 'F', '0977139499', '1.png', 'kamkasere@maseka.com', 'aM39A977FU'),
(12, 'kambale ', 'kamala', 'albert', 'M', '0977139499', '1.png', 'kambale kamala@maseka.com', 'aM39A977ML'),
(13, 'kambale', 'kamala ', 'albert', 'M', '0977139499', '1.png', 'kambalekamala @maseka.com', 'aM39A977ML'),
(14, 'kambale', 'kamala', 'albert', 'M', '0977139499', '1.png', 'kambalekamala@maseka.com', 'aM39a977Ml');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `dates` datetime DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `enligne` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `dates`, `client`, `enligne`, `statut`) VALUES
(21, '2024-06-27 11:06:12', 1, 0, 0),
(22, '2024-06-27 11:06:20', 2, 0, 0),
(23, '2024-06-27 11:06:58', 2, 0, 0),
(24, '2024-06-28 07:06:51', 2, 1, 2),
(30, '2024-07-01 03:07:44', 1, 0, 0),
(32, '2024-07-03 03:07:22', 2, 1, 2),
(33, '2024-07-04 02:07:54', 2, 1, 1),
(34, '2024-07-04 02:07:28', 2, 1, 1),
(36, '2024-07-04 03:07:30', 2, 1, 1),
(37, '2024-07-04 05:07:34', 1, 1, 0),
(38, '2024-07-05 11:07:17', 1, 1, 1),
(39, '2024-07-05 11:07:46', 1, 1, 1),
(40, '2024-07-05 11:07:06', 1, 0, 0),
(42, '2024-07-05 04:07:31', 1, 1, 0),
(43, '2024-07-10 02:07:47', 1, 1, 0),
(44, '2024-07-12 01:07:12', 1, 0, 0),
(45, '2024-07-12 01:07:40', 1, 0, 0),
(46, '2024-07-12 01:07:15', 1, 0, 0),
(47, '2024-07-12 01:07:24', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande_gateau`
--

CREATE TABLE `commande_gateau` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `modele` int(11) NOT NULL,
  `prix` double NOT NULL,
  `information` text NOT NULL,
  `date_commande` date NOT NULL,
  `date_livraison` datetime NOT NULL,
  `statut` int(11) NOT NULL,
  `enligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_gateau`
--

INSERT INTO `commande_gateau` (`id`, `client`, `modele`, `prix`, `information`, `date_commande`, `date_livraison`, `statut`, `enligne`) VALUES
(1, 1, 3, 10, 'ooooooooo', '0000-00-00', '2024-07-09 14:00:00', 0, 0),
(2, 1, 3, 10, 'kkkkkkkkkkk', '0000-00-00', '2024-07-09 20:51:00', 0, 0),
(3, 1, 4, 300, 'eeeeeeeeeee', '0000-00-00', '2024-07-09 14:01:00', 0, 0),
(4, 1, 4, 300, 'wwwwwww', '2024-07-09', '2024-07-09 21:27:00', 0, 1),
(5, 1, 4, 300, 'avec nom de safari avec deux bus', '2024-07-10', '2024-07-10 11:13:00', 1, 1),
(6, 1, 3, 10, 'oooooooo', '2024-07-10', '2024-07-10 14:34:00', 0, 1),
(7, 1, 3, 10, 'nnnnnnnnn', '2024-07-11', '2024-07-11 00:01:00', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gateau`
--

CREATE TABLE `gateau` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `prix` double NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gateau`
--

INSERT INTO `gateau` (`id`, `designation`, `prix`, `photo`) VALUES
(1, 'gateau de mariage', 16, 'FB_IMG_1717407672902.jpg'),
(3, 'gateau deyx', 10, 'FB_IMG_1717407784663.jpg'),
(4, 'gateau de mariage ', 300, 'FB_IMG_1717407679544.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `commande` int(11) DEFAULT NULL,
  `produit` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prixunitaire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `commande`, `produit`, `quantite`, `prixunitaire`) VALUES
(1, NULL, NULL, NULL, NULL),
(26, 21, 1, 2, 15),
(27, 22, 4, 2, 1),
(28, 23, 1, 23, 15),
(29, 23, 4, 22, 1),
(30, 23, 5, 20, 2),
(31, 24, 6, 12, 3),
(32, 18, 6, 8, 3),
(34, 18, 3, 3, 2.5),
(49, 32, 4, 3, 1),
(50, 32, 6, 11, 3),
(51, 32, 5, 3, 2),
(52, 33, 3, 12, 2.5),
(53, 33, 6, 1, 3),
(54, 34, 6, 1, 3),
(56, 36, 6, 5, 3),
(57, 36, 5, 3, 2),
(58, 36, 1, 1, 15),
(59, 0, 6, 2, 3),
(60, 37, 6, 2, 3),
(61, 37, 5, 2, 2),
(62, 38, 6, 2, 3),
(63, 39, 6, 1, 3),
(66, 42, 1, 16, 15),
(67, 42, 5, 1, 2),
(68, 42, 4, 0, 1),
(69, 43, 4, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` double NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `designation`, `categorie`, `prix`, `photo`) VALUES
(1, 'pizza', 2, 15, 'f6.png'),
(3, 'chawarma', 2, 2.5, 'f2.png'),
(4, 'frites', 2, 1, 'f5.png'),
(5, 'macaroni', 2, 2, 'f4.png'),
(6, 'chawarma sim', 2, 3, 'f8.png');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quanite` int(11) NOT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quanite`, `dates`) VALUES
(3, 1, 130, '2024-06-23 08:06:33'),
(4, 1, 12, '2024-06-23 08:06:43'),
(5, 5, 30, '2024-06-23 08:06:05'),
(6, 4, 123, '2024-06-23 08:06:50');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `genre` text NOT NULL,
  `telephone` text NOT NULL,
  `fonction` text NOT NULL,
  `photo` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `postnom`, `genre`, `telephone`, `fonction`, `photo`, `username`, `password`, `statut`) VALUES
(1, 'kambale', 'kamala', 'M', '0977139499', 'Admin', 'albert1.jpg', 'kambalekamala@maseka.com', 'aM39a977M', 0),
(2, 'albert', 'kamala', 'M', '0842312393', 'Vendeur', 'albert3.jpg', 'albertkamala@maseka.com', 'aB12l842M', 0),
(3, 'wwwwwwwwww', 'qqq', 'M', 'qqq', 'Admin', 'albert4.jpg', 'wwwwwwwwwwqqq@maseka.com', 'qWwqqM', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_gateau`
--
ALTER TABLE `commande_gateau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gateau`
--
ALTER TABLE `gateau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `commande_gateau`
--
ALTER TABLE `commande_gateau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `gateau`
--
ALTER TABLE `gateau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
