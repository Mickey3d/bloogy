-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 26 sep. 2017 à 15:45
-- Version du serveur :  5.6.35
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bloogy`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE `billets` (
  `id` int(11) NOT NULL,
  `billet_title` varchar(255) NOT NULL,
  `billet_content` text NOT NULL,
  `billet_author` text NOT NULL,
  `billet_date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `billet_title`, `billet_content`, `billet_author`, `billet_date_creation`) VALUES
(1, 'Premier Billet', '<p>\r\nTexte super intéressant du premier billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-08-27 00:00:00'),
(2, 'Second Billet', '<p>\r\nTexte super intéressant du second billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-08-28 00:00:00'),
(3, 'Troisième billet', '<p>\r\nTexte super intéressant du troisième billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-08-29 00:00:00'),
(4, 'Quatrième billet', '<p>\r\nTexte super intéressant du quatrième billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-08-30 00:00:00'),
(5, 'Cinquième Billet', '<p>\r\nTexte super intéressant du cinquième billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-08-31 00:00:00'),
(6, 'Sixième Billet', '<p>\r\nTexte super intéressant du sixième billet\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n</p>', '', '2017-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `comment_author` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_billet`, `comment_author`, `comment_content`, `comment_date`) VALUES
(1, 1, 'Auteur commentaire 1', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-06 00:00:00'),
(2, 4, 'Auteur commentaire 2', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-08 00:00:00'),
(3, 5, 'Auteur commentaire 3', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-09 00:00:00'),
(4, 6, 'Auteur commentaire 4', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-10 00:00:00'),
(5, 1, 'Auteur commentaire 5', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-11 00:00:00'),
(6, 1, 'Auteur commentaire 6', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-12 00:00:00'),
(7, 3, 'Auteur commentaire 7', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-13 00:00:00'),
(8, 2, 'Auteur commentaire 8', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-14 00:00:00'),
(9, 3, 'Auteur commentaire 9', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-15 00:00:00'),
(10, 2, 'Auteur commentaire 10', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-16 00:00:00'),
(11, 1, 'Auteur commentaire 1', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-06 00:00:00'),
(12, 4, 'Auteur commentaire 2', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-08 00:00:00'),
(13, 5, 'Auteur commentaire 3', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-09 00:00:00'),
(14, 6, 'Auteur commentaire 4', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-10 00:00:00'),
(15, 1, 'Auteur commentaire 5', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-11 00:00:00'),
(16, 1, 'Auteur commentaire 6', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-12 00:00:00'),
(17, 3, 'Auteur commentaire 7', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-13 00:00:00'),
(18, 2, 'Auteur commentaire 8', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-14 00:00:00'),
(19, 3, 'Auteur commentaire 9', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-15 00:00:00'),
(20, 2, 'Auteur commentaire 10', '<p>\r\nCommentaire : blablablablablablablablablablablablaba\r\nBalibalouloulibaloudepah\r\n</p>', '2017-09-16 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;