-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2022 at 09:06 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidoobet`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `ID` int(11) NOT NULL,
  `EquipeD` varchar(64) NOT NULL,
  `EquipeE` varchar(64) NOT NULL,
  `CoteD` float NOT NULL,
  `CoteE` float NOT NULL,
  `CoteNul` float NOT NULL,
  `ResultatFin` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `Championnat` varchar(50) NOT NULL COMMENT '                                       '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`ID`, `EquipeD`, `EquipeE`, `CoteD`, `CoteE`, `CoteNul`, `ResultatFin`, `Date`, `Heure`, `Championnat`) VALUES
(8, 'Liverpool', 'Tottenham', 1.42, 4.9, 7, NULL, '2022-05-07', '20:45:00', 'Premiere League'),
(9, 'Angers', 'Bordeaux', 2.13, 3.38, 3.48, NULL, '2022-05-08', '15:00:00', 'Ligue 1');

-- --------------------------------------------------------

--
-- Table structure for table `prono_utilisateurs`
--

CREATE TABLE `prono_utilisateurs` (
  `ID_Utilisateurs` varchar(30) NOT NULL,
  `ID_Matchs` varchar(30) NOT NULL,
  `Resultat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Psswd` varchar(30) NOT NULL,
  `Solde` float NOT NULL,
  `NumTel` varchar(14) NOT NULL,
  `R??le` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Date`, `Email`, `Psswd`, `Solde`, `NumTel`, `R??le`) VALUES
(1, 'Billiard', 'Mathis', '2003-06-06', 'mathis.billiard139@gmail.com', '25ansPokeInvest', 0, '07 82 81 52 08', 'Admin'),
(7, 'Franck', 'Lin', '1990-07-11', 'francklin@gmail.com', 'Coucou123', 0, '06 26 18 94 32', 'Client'),
(8, 'Franck', 'Lin', '2003-02-21', 'francklin@gmail.com', 'Coucou123', 10, '07 21 49 64 21', 'Client'),
(9, 'Vincent', 'Lin', '2003-02-21', 'francklin@gmail.com', 'Coucou123', 0, '07 21 49 64 21', 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prono_utilisateurs`
--
ALTER TABLE `prono_utilisateurs`
  ADD KEY `ID_Utilisateurs` (`ID_Utilisateurs`),
  ADD KEY `ID_Matchs` (`ID_Matchs`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
