-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 nov. 2017 à 16:19
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
-- Base de données :  `avrr_bloogy`
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
  `pictureUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `date`, `category_id`, `pictureUrl`) VALUES
(26, 'Ajout 2 avec mise a jour 3', '<p>Lorem ipsum confiti et tralala dans le bois. Poulou cartus magna sim comaprat meu multi. Para regnum in mergentis placet mea.</p>', '2017-10-13 17:01:21', 3, ''),
(27, 'Bla', '<p>Blablablablablablablablablabla !!!</p>', '2017-10-13 17:11:12', 1, ''),
(28, 'Billet 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu venenatis metus. Aenean et urna convallis, interdum justo at, cursus orci. Praesent lorem felis, tempus ut nulla quis, bibendum tincidunt nunc. Proin sit amet dolor vitae sem molestie feugiat. Proin lacus leo, mattis vel dapibus sit amet, ullamcorper vitae neque. In hac habitasse platea dictumst. Nullam nec elit sit amet leo egestas porttitor. Praesent id fermentum ex, ac sagittis massa. Aliquam erat volutpat. Ut pharetra faucibus metus a porttitor. In eget bibendum ligula, vel semper dui. Maecenas placerat ex sapien, in euismod metus sollicitudin feugiat. Maecenas augue nisl, scelerisque non mollis eu, pharetra sed est. Aenean sed vulputate sem. Cras aliquam ex quis libero tempus hendrerit. Nullam sollicitudin magna vitae orci finibus, vel bibendum urna accumsan. Donec at gravida eros, sit amet sodales justo. Nulla facilisi. Aenean facilisis maximus tortor, in porta lacus lobortis nec. Suspendisse facilisis facilisis enim, id consectetur ipsum vestibulum nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse aliquam leo sapien, sit amet aliquet odio finibus at.</p>', '2017-10-14 15:17:40', 1, ''),
(30, 'AJOUT 4', '<p>BEFBEFBEFVEF</p>', '2017-10-15 20:41:50', 1, ''),
(33, 'Ajout 7', '<h1 style=\"text-align: center;\">&nbsp;LOREM IPSUM</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet viverra arcu. Vivamus vulputate non purus id placerat. Aliquam maximus sapien vel sapien vestibulum blandit eu ut nisi. Nullam erat nunc, ultricies ac faucibus quis, pulvinar quis velit. Nullam faucibus dolor libero, ut elementum ligula pretium pretium. Suspendisse lobortis sem et ipsum pellentesque, vitae aliquet est mollis. In iaculis aliquet sem, id congue arcu feugiat vitae. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean faucibus malesuada venenatis. Etiam ut mauris interdum, varius felis sed, pulvinar nisl. In scelerisque ullamcorper porta. Maecenas porta sem sit amet aliquet hendrerit. Phasellus quis eros nec dui interdum viverra sit amet lacinia arcu. Donec tristique nisl dolor, eu dapibus libero venenatis a. Nullam nisl dui, viverra sit amet congue eu, sollicitudin eu risus.</p>\r\n<p style=\"text-align: center;\">Pellentesque dignissim lacinia consectetur. Praesent imperdiet aliquet dapibus. Aliquam malesuada nec eros quis ultricies. Quisque in sem interdum, lobortis mauris ut, aliquet ante. Morbi congue dui a quam eleifend tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget semper metus. Aenean consequat bibendum ante a pulvinar. Pellentesque vitae ante turpis. Suspendisse in commodo risus. Vivamus malesuada velit in neque dictum, ac blandit velit maximus. Fusce libero purus, faucibus sit amet tempus nec, convallis et arcu. Nam fringilla malesuada porttitor.</p>\r\n<ul>\r\n<li>Sed</li>\r\n<li>Sed dui id</li>\r\n<li>Libero semper</li>\r\n<li>Pellentesque</li>\r\n</ul>\r\n<p><strong>Donec felis nulla, dapibus sed purus ac, lacinia tristique dolor. Integer cursus mattis lectus, nec efficitur urna scelerisque non. Morbi lacus odio, rhoncus sed purus non, volutpat tristique risus.</strong> Ut hendrerit urna ex, vulputate imperdiet ipsum pellentesque ac. In a mauris pharetra, efficitur justo quis, tempus dui. Vestibulum gravida lacus sapien, at molestie magna viverra nec. Nulla suscipit gravida tortor, vitae sollicitudin nibh imperdiet ut. Phasellus ex mauris, pharetra a auctor sed, sollicitudin in nunc. Praesent rhoncus congue augue, non finibus lacus tristique non. Proin efficitur risus nec odio accumsan, non lobortis lorem convallis. Donec rutrum tincidunt dolor ut pharetra. In sit amet quam sed nunc consectetur sodales. Nam tempor porttitor metus, vitae faucibus dui auctor eget. Suspendisse eget varius ex, ac blandit sapien.</p>\r\n<blockquote>\r\n<p>Praesent efficitur nunc a felis ornare tempor. Proin mollis vel nisi vitae hendrerit. Proin tristique sem sed nibh fermentum sollicitudin. Suspendisse sagittis orci justo, ut pharetra sem auctor non. Suspendisse vel nulla at ex porttitor ornare. Curabitur in congue sem. Nullam ornare lectus ac est lobortis, eu placerat quam sagittis. Donec non risus id augue volutpat dictum vehicula vitae ligula.</p>\r\n</blockquote>\r\n<p>Quisque luctus, nunc et euismod venenatis, lectus magna aliquam lectus, eleifend maximus ante nisl sit amet neque. Quisque nec nulla libero. Maecenas et scelerisque sem. Nulla varius justo arcu, id euismod erat hendrerit eu. Pellentesque placerat massa tempus diam faucibus, in sodales massa laoreet. Nam euismod tortor turpis, sed pulvinar nibh tincidunt in. Cras cursus at nunc pharetra tempus. Donec malesuada scelerisque ultricies. Integer et sapien scelerisque, maximus lectus et, ullamcorper sem. Mauris ac ultrices nunc, eu ultricies metus. Fusce viverra, elit eu consectetur fringilla, sem metus tincidunt purus, eget lobortis libero mi nec ipsum.</p>', '2017-10-15 21:12:12', 1, 'img/postsPictures/posts/alaska1.jpg');

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
  `postID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `commentDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `postID`, `userID`, `commentDate`) VALUES
(1, 'Commentaire 1 mise a jour vzvzevze vzef zefzf aef ef efa fzef dfafda fafa fafaf adazda ddz dazdazd ad azd azdazd azd azdaz dazd azd azdazdaz dazd azd azda\r\nazdaz dazd azd azddaz\r\nazd azd ddazd azdazd azdaz d azdza dazd ddz ddazdazd azfeafaz dvkzvkzekv  kvkzdk k  kzevze kzevk  zd kze zkz zekvalck.', 27, 4, '2017-10-16 18:28:16'),
(6, 'com', 28, 4, '2017-10-18 15:55:12'),
(5, 'Commentaire Ã©diter su page ou l\'article n\'existe plus => TODO - Gestion de l\'erreur / ', 34, 4, '2017-10-18 13:00:49'),
(23, 'com', 33, 4, '2017-11-01 16:30:56'),
(17, 'comm', 33, 23, '2017-10-27 13:53:52'),
(20, 'ajout de la jointure entre les tables Users et Comments', 33, 4, '2017-10-28 17:42:02'),
(24, 'paleolithique', 30, 4, '2017-11-03 15:22:53');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pictureUrl` varchar(255) NOT NULL,
  `pictureThumbnailUrl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentID` int(11) NOT NULL,
  `comAuthorID` int(11) NOT NULL,
  `reportByID` int(11) NOT NULL,
  `reportDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`id`, `commentID`, `comAuthorID`, `reportByID`, `reportDate`) VALUES
(25, 17, 23, 4, '2017-11-03 15:27:10'),
(22, 17, 23, 31, '2017-11-01 12:10:30'),
(24, 24, 4, 4, '2017-11-03 15:26:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `role`, `isLocked`) VALUES
(4, 'Jean', 'jeanjean@jean.fro', 'd1de7379aa7605521c0fe7a24a247a22abced9bb', '', 'admin', 0),
(20, 'Carl', 'gut@gut.gut', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', 'user', 0),
(23, 'Usereuh', 'mail@mail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, 'admin', 0),
(31, 'john', 'john@john.john', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', NULL, 'user', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
