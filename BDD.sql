-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Juillet 2018 à 15:59
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `Id` int(16) NOT NULL,
  `Title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(16) NOT NULL AUTO_INCREMENT;
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
