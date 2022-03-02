-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 01:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectwithmichael`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinput`
--

CREATE TABLE `userinput` (
  `ID` int(11) NOT NULL,
  `voorNaam` varchar(255) NOT NULL,
  `achterNaam` varchar(255) NOT NULL,
  `geboorteDatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinput`
--

INSERT INTO `userinput` (`ID`, `voorNaam`, `achterNaam`, `geboorteDatum`) VALUES
(0, 'Eric', 'Spier', '2005-07-11'),
(1, 'Michael', 'Schuiling', '2003-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinput`
--
ALTER TABLE `userinput`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
