-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Juillet 2018 à 12:18
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bristol`
--

-- --------------------------------------------------------

--
-- Structure de la table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `ModuleID` int(16) NOT NULL,
  `StudentsID` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enrolled`
--

INSERT INTO `enrolled` (`ModuleID`, `StudentsID`) VALUES
  (1, 100),
  (2, 100),
  (4, 100),
  (5, 100),
  (1, 200),
  (4, 200),
  (5, 200);

-- --------------------------------------------------------

--
-- Structure de la table `examcomponents`
--

CREATE TABLE IF NOT EXISTS `examcomponents` (
  `Id` int(16) NOT NULL,
  `ModuleId` int(16) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamType` varchar(20) NOT NULL,
  `Ratio` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `examcomponents`
--

INSERT INTO `examcomponents` (`Id`, `ModuleId`, `ExamDate`, `ExamType`, `Ratio`) VALUES
  (1, 1, '2018-08-01', 'Assignment', 30),
  (2, 1, '2018-08-01', 'Lab Test', 20),
  (3, 1, '2018-08-01', 'Written Exam', 50),
  (4, 2, '2018-08-01', 'Assignment', 50),
  (5, 2, '2018-08-01', 'Lab Test', 50),
  (6, 4, '2018-08-01', 'Assignment', 50),
  (7, 4, '2018-08-01', 'Assignment', 50),
  (8, 5, '2018-08-01', 'Assignment', 20),
  (9, 5, '2018-08-01', 'Lab Test', 30),
  (10, 5, '2018-08-01', 'Written Exam', 50);

-- --------------------------------------------------------

--
-- Structure de la table `exammarks`
--

CREATE TABLE IF NOT EXISTS `exammarks` (
  `ModuleID` int(16) NOT NULL,
  `StudentsID` int(16) NOT NULL,
  `Marks` int(8) NOT NULL,
  `ExamComponentsID` int(16) NOT NULL,
  `Resit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `exammarks`
--

INSERT INTO `exammarks` (`ModuleID`, `StudentsID`, `Marks`, `ExamComponentsID`, `Resit`) VALUES
  (1, 100, 60, 1, 0),
  (1, 100, 50, 2, 0),
  (1, 100, 85, 3, 0),
  (1, 200, 80, 1, 0),
  (1, 200, 85, 2, 0),
  (1, 200, 60, 3, 0),
  (2, 100, 60, 4, 0),
  (2, 100, 30, 5, 1),
  (4, 100, 70, 6, 0),
  (4, 100, 70, 7, 0),
  (4, 200, 50, 4, 0),
  (4, 200, 50, 5, 1),
  (5, 100, 50, 8, 0),
  (5, 100, 10, 9, 1),
  (5, 100, 30, 10, 0),
  (5, 200, 70, 6, 0),
  (5, 200, 60, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `Id` int(16) NOT NULL,
  `Title` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`Id`, `Title`) VALUES
  (3, 'CMS'),
  (4, 'LESPI'),
  (2, 'WD'),
  (5, 'WDF'),
  (1, 'WP'),
  (6, 'WT');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(16) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Role` int(8) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123456790 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Id`, `Password`, `FirstName`, `LastName`, `Email`, `Role`, `PhoneNumber`, `Address`) VALUES
  (100, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'Alan', 'BOMBSKY', 'alan.bombsky@yomail.com', 3, '0606060606', 'somewhere'),
  (200, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'Thierry', 'HUCHE', 'thierry.huche@yomail.com', 3, '0606060606', 'somewhere'),
  (300, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'Diego', 'VEGA', 'diego.vega@yomail.com', 3, '0606060606', 'somewhere'),
  (400, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'Bob', 'MCLANE', 'bob.mclane@yomail.com', 3, '0606060606', 'somewhere'),
  (500, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'Odile', 'CROC', 'odile.croc@yomail.com', 2, '0606060606', 'somewhere'),
  (600, '7361c5a7309ce4228173bda2a963106952146be401154d85bc64cb93431880b7', 'admin', 'ADMIN', 'admin.admin@yomail.com', 1, '0606060606', 'somewhere');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`ModuleID`,`StudentsID`), ADD KEY `FK_StudentID` (`StudentsID`);

--
-- Index pour la table `examcomponents`
--
ALTER TABLE `examcomponents`
  ADD PRIMARY KEY (`Id`,`ModuleId`), ADD KEY `FK_ModuleID` (`ModuleId`);

--
-- Index pour la table `exammarks`
--
ALTER TABLE `exammarks`
  ADD PRIMARY KEY (`ModuleID`,`StudentsID`,`ExamComponentsID`), ADD KEY `fk_marks_ComponentsId` (`ExamComponentsID`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Title` (`Title`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `examcomponents`
--
ALTER TABLE `examcomponents`
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123456790;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `FK_ModuleID_Enrolled` FOREIGN KEY (`ModuleID`) REFERENCES `modules` (`Id`),
  ADD CONSTRAINT `FK_StudentID` FOREIGN KEY (`StudentsID`) REFERENCES `users` (`Id`);

--
-- Contraintes pour la table `examcomponents`
--
ALTER TABLE `examcomponents`
  ADD CONSTRAINT `FK_ModuleID` FOREIGN KEY (`ModuleId`) REFERENCES `modules` (`Id`);

--
-- Contraintes pour la table `exammarks`
--
ALTER TABLE `exammarks`
  ADD CONSTRAINT `fk_EnrolledId` FOREIGN KEY (`ModuleID`, `StudentsID`) REFERENCES `enrolled` (`ModuleID`, `StudentsID`),
  ADD CONSTRAINT `fk_marks_ComponentsId` FOREIGN KEY (`ExamComponentsID`) REFERENCES `examcomponents` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
