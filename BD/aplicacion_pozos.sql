-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 10:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplicacion_pozos`
--

-- --------------------------------------------------------

--
-- Table structure for table `mediciones_manometro`
--

CREATE TABLE `mediciones_manometro` (
  `medicionID` int(11) NOT NULL,
  `medicion` float(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `pozoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mediciones_manometro`
--

INSERT INTO `mediciones_manometro` (`medicionID`, `medicion`, `fecha`, `pozoID`) VALUES
(8, 500.22, '2022-02-28', 1),
(10, 360.54, '2021-12-17', 1),
(11, 400.50, '2022-03-10', 1),
(12, 600.64, '2021-12-02', 8),
(13, 300.00, '2022-03-01', 8),
(14, 700.20, '2022-03-25', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pozos_petroleros`
--

CREATE TABLE `pozos_petroleros` (
  `pozoID` int(11) NOT NULL,
  `nombrePozo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `extension` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `pozos_petroleros`
--

INSERT INTO `pozos_petroleros` (`pozoID`, `nombrePozo`, `extension`) VALUES
(1, 'CUENCA MARACAIBO - FALCÓN', '67.000Km2'),
(8, 'CUENCA ORIENTAL', '153.000km2');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuarioID` int(11) NOT NULL,
  `nombreUsuario` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usuarioID`, `nombreUsuario`, `password`) VALUES
(2, 'andrea21', 'ec6a6536ca304edf844d1d248a4f08dc'),
(11, 'user', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mediciones_manometro`
--
ALTER TABLE `mediciones_manometro`
  ADD PRIMARY KEY (`medicionID`);

--
-- Indexes for table `pozos_petroleros`
--
ALTER TABLE `pozos_petroleros`
  ADD PRIMARY KEY (`pozoID`),
  ADD UNIQUE KEY `nombrePozo` (`nombrePozo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioID`),
  ADD UNIQUE KEY `nombreUsuario` (`nombreUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mediciones_manometro`
--
ALTER TABLE `mediciones_manometro`
  MODIFY `medicionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pozos_petroleros`
--
ALTER TABLE `pozos_petroleros`
  MODIFY `pozoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
