-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Juin 2018 à 19:46
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `whiskers_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `ws_admin`
--

CREATE TABLE `ws_admin` (
  `a_id` int(11) NOT NULL,
  `a_fk_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ws_cart`
--

CREATE TABLE `ws_cart` (
  `c_id` int(11) NOT NULL,
  `c_fk_user_id` int(11) NOT NULL,
  `c_fk_product_id` int(11) NOT NULL,
  `c_quantity` int(11) NOT NULL,
  `c_added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ws_category`
--

CREATE TABLE `ws_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ws_order`
--

CREATE TABLE `ws_order` (
  `o_id` int(11) NOT NULL,
  `o_fk_user_id` int(11) NOT NULL,
  `o_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ws_product`
--

CREATE TABLE `ws_product` (
  `p_id` int(11) NOT NULL,
  `p_fk_species_id` int(11) NOT NULL,
  `p_fk_category_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_price` decimal(8,2) NOT NULL,
  `p_description` text COLLATE utf8_unicode_ci NOT NULL,
  `p_characteristic` text COLLATE utf8_unicode_ci,
  `p_added_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ws_species`
--

CREATE TABLE `ws_species` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ws_user`
--

CREATE TABLE `ws_user` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `u_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_registration_datetime` datetime NOT NULL,
  `u_last_connection_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ws_cart`
--
ALTER TABLE `ws_cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `ws_category`
--
ALTER TABLE `ws_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `ws_order`
--
ALTER TABLE `ws_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Index pour la table `ws_product`
--
ALTER TABLE `ws_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Index pour la table `ws_user`
--
ALTER TABLE `ws_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ws_cart`
--
ALTER TABLE `ws_cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ws_category`
--
ALTER TABLE `ws_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ws_order`
--
ALTER TABLE `ws_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ws_product`
--
ALTER TABLE `ws_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ws_user`
--
ALTER TABLE `ws_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
