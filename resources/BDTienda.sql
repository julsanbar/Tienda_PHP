-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2017 at 01:20 
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BDTienda`
--
CREATE DATABASE IF NOT EXISTS `BDTienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `BDTienda`;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(45) NOT NULL,
  `pvp` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `nombre_corto`, `pvp`) VALUES
(1, 'Torres', 'Torres', '1500'),
(2, 'Fuentes de alimentación', 'Fuentes', '350'),
(3, 'Placas base', 'Placas', '800'),
(4, 'Procesadores', 'Procesadores', '1500'),
(5, 'Discos duros', 'Discos', '400'),
(6, 'Memorias RAM', 'RAM', '110'),
(7, 'Tarjetas gráficas', 'Gráficas', '150'),
(8, 'Tarjetas sonido', 'Sonido', '200'),
(9, 'Monitores', 'Monitores', '300'),
(10, 'Teclados', 'Teclados', '20'),
(11, 'Ratones', 'Ratones', '1500'),
(12, 'Tarjeta red cable', 'RedCable', '40'),
(13, 'Tarjeta red wifi', 'RedWifi', '80'),
(14, 'Antenas wifi', 'Antenas', '70'),
(15, 'Webcams', 'Webcams', '560'),
(16, 'Scanners', 'Scanners', '200'),
(17, 'Alfombrillas', 'Alfombrillas', '10');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
