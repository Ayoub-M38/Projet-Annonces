-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 09:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leboncoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id_admin` int(11) NOT NULL,
  `emai_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `description_produit` longtext NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `photo_produit` varchar(255) NOT NULL,
  `date_depot` datetime NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id_produit`, `nom_produit`, `description_produit`, `prix_produit`, `photo_produit`, `date_depot`, `categorie_id`, `utilisateur_id`, `region_id`) VALUES
(1, 'Iphone 11', 'Nous vous invitons à utiliser les câbles USB-A vers Lightning, les adaptateurs secteur et les écouteurs déjà en votre possession qui sont compatibles avec cet iPhone. Mais si vous avez besoin d’un nouvel adaptateur secteur Apple, vous pouvez en acheter un.', '800', 'https://www.numerama.com/wp-content/uploads/2016/09/iphone7-gallery1-2016.jpeg', '2021-03-24 11:37:06', 1, 118, 1),
(2, 'Iphone 11', 'Nous vous invitons à utiliser les câbles USB-A vers Lightning, les adaptateurs secteur et les écouteurs déjà en votre possession qui sont compatibles avec cet iPhone. Mais si vous avez besoin d’un nouvel adaptateur secteur Apple, vous pouvez en acheter un.', '800', 'https://www.numerama.com/wp-content/uploads/2016/09/iphone7-gallery1-2016.jpeg', '2021-03-24 11:37:06', 1, 1, 1),
(3, 'Iphone 11', 'Nous vous invitons à utiliser les câbles USB-A vers Lightning, les adaptateurs secteur et les écouteurs déjà en votre possession qui sont compatibles avec cet iPhone. Mais si vous avez besoin d’un nouvel adaptateur secteur Apple, vous pouvez en acheter un.', '800', 'https://www.numerama.com/wp-content/uploads/2016/09/iphone7-gallery1-2016.jpeg', '2021-03-24 11:37:06', 1, 118, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `type_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type_categorie`) VALUES
(1, 'Multimedias'),
(2, 'Electroménager'),
(3, 'Meubles'),
(4, 'Véhicules'),
(5, 'Modes'),
(6, 'Divers');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id_region` int(11) NOT NULL,
  `nom_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id_region`, `nom_region`) VALUES
(1, 'Guadeloupe'),
(2, 'Martinique'),
(3, 'Guyane'),
(4, 'La Réunion'),
(5, 'Mayotte'),
(6, 'Île-de-France'),
(7, 'Centre-Val de Loire'),
(8, 'Bourgogne-Franche-Comté'),
(9, 'Normandie'),
(10, 'Hauts-de-France'),
(11, 'Grand Est'),
(12, 'Pays de la Loire'),
(13, 'Bretagne'),
(14, 'Nouvelle-Aquitaine'),
(15, 'Occitanie'),
(16, 'Auvergne-Rhône-Alpes'),
(17, 'Provence-Alpes-Côte d\'Azur'),
(18, 'Corse'),
(19, 'Collectivités d\'Outre-Mer');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `image_utilisateur` varchar(255) NOT NULL,
  `email_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom_utilisateur`, `nom_utilisateur`, `image_utilisateur`, `email_utilisateur`, `password_utilisateur`) VALUES
(1, 'ayoub', 'mchichi', 'images/2.jpg', 'ayoub@test.com', 'ayoub'),
(118, 'sophie', 'red', 'images/nath.jpg', 'sophie@test.com', 'test'),
(124, 'Henri', 'White', 'images/henri.jpg', 'henri@test.com', 'test'),
(125, 'Joe', 'Doe', 'images/2.jpg', 'joe@test.com', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id_utilisateur`),
  ADD CONSTRAINT `annonces_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id_region`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
