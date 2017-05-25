-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Mai 2017 à 23:48
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `quiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE IF NOT EXISTS `authentification` (
  `Id` int(255) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Admin` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `authentification`
--

INSERT INTO `authentification` (`Id`, `Nom`, `Email`, `Admin`) VALUES
(2, 'med', 'med', 1),
(3, 'medbt', 'bentaaritmohamedsalah@gmail.com', 0),
(7, 'd', 'e', 0),
(8, 'ihoi', 'jpoj', 0),
(9, 'cdc', 'aaa', 0),
(10, 'cdc', 'aaa', 0),
(11, 'aa', 'aaaaaa', 0),
(12, 'ojpo', 'ojo', 0),
(13, 'user28', 'user28@user28', 0),
(14, 'ijpi', 'zdazd', 0),
(15, 'play', 'play@play', 0),
(16, 'user007', 'user007', 0),
(17, 'u', 'u', 0);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `Questions` varchar(350) NOT NULL,
  `Note` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`Id`, `Questions`, `Note`) VALUES
(3, 'Une base de données ne part pas être ?', 3),
(4, 'Dans la phase de conception d’une base de données, au niveau conceptuel, on ne doit pas ?', 1),
(5, 'En UML qu’il est le diagramme qui sert à présenter les instances de classes utilisé dans le système ?', 2),
(6, 'En java un variable local est déclaré dans :', 2),
(7, 'En java une classe qui implémente une interface doit :', 4),
(8, 'En programme orienté objet lorsque un objet part appartenir à plusieurs type et donc être utilisé là où est attendu une valeur d’un type plus général, on parle de :', 2),
(11, 'my new question ?', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `Id` int(6) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(350) NOT NULL,
  `Correct` int(1) NOT NULL DEFAULT '0',
  `Id_Question` int(4) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_Question` (`Id_Question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`Id`, `reponse`, `Correct`, `Id_Question`) VALUES
(1, 'Héritage ;', 0, 8),
(2, 'Interface', 0, 8),
(3, 'Ancêtre ;', 0, 8),
(4, 'Polymorphisme.', 1, 8),
(7, 'Implémenter le constructeur de l’interface ;', 0, 7),
(8, 'Etre statique au finale ;', 0, 7),
(9, 'Implémenter les méthodes utiles de l’interface ;', 0, 7),
(10, 'Implémenter toutes les méthodes définies dans cette interface.', 1, 7),
(11, 'Un tableau ;', 0, 6),
(12, 'Une méthode ;', 1, 6),
(13, 'Une classe ;', 0, 6),
(14, 'Un objet.', 0, 6),
(15, 'Diagramme de séquences ;', 0, 5),
(16, 'Diagramme d’objet ;', 1, 5),
(17, 'Diagramme de classe ;', 0, 5),
(18, 'Diagramme de composants.', 0, 5),
(19, 'Dégager les objets et leur identifiant ;', 0, 4),
(20, 'Dégager les relations et leur identifiant ;', 0, 4),
(23, 'Déterminer les cardinalité des relations ;', 0, 4),
(24, 'Attacher les propriétés aux relations et aux objets.', 1, 4),
(25, 'Relationnelle ;', 0, 3),
(26, 'Réseau ;', 0, 3),
(27, 'Asymétrique ;', 1, 3),
(28, 'Hiérarchique.', 0, 3),
(30, 'correctAnswer', 1, 11),
(31, 'WrongAns1', 0, 11),
(32, 'WrongAns2', 0, 11),
(33, 'WrongAns3', 0, 11);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`Id_Question`) REFERENCES `questions` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
