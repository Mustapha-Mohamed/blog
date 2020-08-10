-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 août 2020 à 14:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(52, 'le rap francais est entrain de prendre un nouveau tournant dÃ» Ã  la nouvelle generation', 1337, 13, '2020-08-10 14:07:46'),
(53, 'Le streaming, pour ou contre? On attends vos rÃ©ponse avec impatience !!!!!!!!!!!!!', 1337, 13, '2020-08-10 14:08:39'),
(54, 'L\'olympique de Marseille vont -ils se qualifier pour la ligue des champions?', 42, 14, '2020-08-10 10:00:00'),
(55, 'Qui sont ces jeunes du centre de formation de saint - etienne?', 42, 14, '2020-08-10 12:00:00'),
(51, '\r\nQue prÃ©voit MÃ©tÃ©o France pour ce lundi 10 aoÃ»t ?', 1337, 15, '2020-08-10 14:06:36'),
(50, 'Trois ans aprÃ¨s le terrible incendie de Bormes-les-Mimosas, la nature encore meurtrie', 1337, 15, '2020-08-10 14:05:33'),
(49, 'Marseille : un homme de 52 ans a disparu depuis le 2 aoÃ»t', 1337, 15, '2020-08-10 14:02:43'),
(48, 'Un incendie a dÃ©truit la nuit derniÃ¨re, peu aprÃ¨s 2 heures, un entrepÃ´t de la rue Jouven, dans le quartier de Saint-Mauront (3e).', 1337, 15, '2020-08-10 14:02:07'),
(47, 'Roh2f vient de sortir de prison va t-il de nouveau sortir un nouveau projet ?', 1337, 13, '2020-08-10 13:59:15'),
(46, 'maes Ã  effectuer son premier disque de platine en 1 semaine !!!!!', 1337, 13, '2020-08-10 13:58:37');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(14, 'actu foot'),
(13, 'buzz de fou'),
(15, 'marseille fait divers');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(74, 'boire de leau cest essentiel', 51, 42, '16:29:12'),
(73, 'j\'avoue mdr', 51, 42, '16:28:43'),
(71, 'je pense que oui', 52, 42, '16:28:11'),
(70, 'mdr', 53, 42, '16:28:00'),
(69, 'moi perso je suis pour', 53, 1338, '16:26:42'),
(68, 'askiparait ce sont des jeunes crack ', 55, 1337, '16:26:11'),
(67, 'la generation changent, la mentalitÃ© aussi!!', 52, 1337, '16:25:49'),
(66, 'Je suis contre, je trouve que cela peut gonfler les chiffres de ventes moi personnelement', 53, 1337, '16:25:23');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1337, 'admin'),
(42, 'moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1339 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(17, 'we', '$2y$10$pKaWw8kgZ9B2IrKnEM1iA.Wb/wrCsVDUEZPa8uZCOFnP9lGWU9Cca', 'we@live.Fr', 1),
(1337, 'mouss', '$2y$10$ynDic1esP/0rTGPhjtsuROm/Y8Fy/ahDotJ/mCotrp3RqkC/dukom', 'admin@live.fr', 1337),
(42, 'oui', '$2y$10$f60qktZfykfwnEDuvOhbFOvbxS4mhOYuV6XUG7kpZK44LB02sC0se', 'oui@live.fr', 42),
(18, 'okok', '$2y$10$5ZHFqTM3BUyfPUnNHh5agOe.b2uQqv6MvO.iTi6u7s5xknHw.3nfS', 'okok@live.fr', 1),
(1338, 'non', '$2y$10$yutNsVBJgj1RhVkdfQAG9OsSaCDNngK2wAoBsZFyJ9/w1nlofVNG2', 'non@hotmail.fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
