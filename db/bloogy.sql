-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 oct. 2017 à 13:31
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `picture_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `category_id`, `picture_id`) VALUES
(26, 'Ajout 2 avec mise a jour 3', 'Lorem ipsum confiti et tralala dans le bois. Poulou cartus magna sim comaprat meu multi.\r\nPara regnum in mergentis placet mea.', '2017-10-13 17:01:21', 3, 0),
(27, 'Bla', 'Blablablablablablablablablabla !!!', '2017-10-13 17:11:12', 1, 0),
(28, 'Billet 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu venenatis metus. Aenean et urna convallis, interdum justo at, cursus orci. Praesent lorem felis, tempus ut nulla quis, bibendum tincidunt nunc. Proin sit amet dolor vitae sem molestie feugiat. Proin lacus leo, mattis vel dapibus sit amet, ullamcorper vitae neque. In hac habitasse platea dictumst. Nullam nec elit sit amet leo egestas porttitor. Praesent id fermentum ex, ac sagittis massa. Aliquam erat volutpat. Ut pharetra faucibus metus a porttitor. In eget bibendum ligula, vel semper dui. Maecenas placerat ex sapien, in euismod metus sollicitudin feugiat. Maecenas augue nisl, scelerisque non mollis eu, pharetra sed est. Aenean sed vulputate sem. Cras aliquam ex quis libero tempus hendrerit.\r\n\r\nNullam sollicitudin magna vitae orci finibus, vel bibendum urna accumsan. Donec at gravida eros, sit amet sodales justo. Nulla facilisi. Aenean facilisis maximus tortor, in porta lacus lobortis nec. Suspendisse facilisis facilisis enim, id consectetur ipsum vestibulum nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse aliquam leo sapien, sit amet aliquet odio finibus at.', '2017-10-14 15:17:40', 1, 0),
(29, 'Ajout 3', 'Tesywefejzjfnjzrfzf\r\nrfrzfz\r\nfzfz\r\nfzfz\r\nfzfz\r\nfzef\r\nzefze\r\n', '2017-10-15 20:31:49', 1, NULL),
(30, 'AJOUT 4', 'BEFBEFBEFVEF', '2017-10-15 20:41:50', 1, NULL),
(31, 'Ajout 5', 'Blabma', '2017-10-15 20:48:31', 1, NULL),
(33, 'Ajout 7', 'ervervrezvrrz', '2017-10-15 21:12:12', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `titre`) VALUES
(1, 'CatÃ©gorie 1'),
(3, 'CatÃ©gorie 2');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `postId` int(11) NOT NULL,
  `author` text,
  `commentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `postId`, `author`, `commentDate`) VALUES
(1, 'Commentaire 1 mise a jour vzvzevze vzef zefzf aef ef efa fzef dfafda fafa fafaf adazda ddz dazdazd ad azd azdazd azd azdaz dazd azd azdazdaz dazd azd azda\r\nazdaz dazd azd azddaz\r\nazd azd ddazd azdazd azdaz d azdza dazd ddz ddazdazd azfeafaz dvkzvkzekv  kvkzdk k  kzevze kzevk  zd kze zkz zekvalck.', 27, 'Jesus', '2017-10-16 18:28:16'),
(3, 'truc', 26, NULL, '2017-10-17 21:39:24'),
(6, 'com', 28, NULL, '2017-10-18 15:55:12'),
(5, 'Commentaire Ã©diter su page ou l\'article n\'existe plus => TODO - Gestion de l\'erreur / ', 34, NULL, '2017-10-18 13:00:49'),
(7, 'com 2', 28, NULL, '2017-10-18 15:55:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(23) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isLocked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `role`, `isLocked`) VALUES
(4, 'Jean', 'jeanjean@jean.fri', 'd1de7379aa7605521c0fe7a24a247a22abced9bb', '', 'admin', 0),
(20, 'Carl', 'gut@gut.gut', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'user', 0),
(22, 'Brutus', 'bzzv@kk', '7ecde348ff9cda2c3ba69a0c4543365039d0d65b', NULL, 'admin', 0),
(23, 'Usereuh', 'mail@mail.com', '7ecde348ff9cda2c3ba69a0c4543365039d0d65b', NULL, 'user', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
