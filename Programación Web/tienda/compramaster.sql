-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 12:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compramaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `idA` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  `idE` int(11) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articuloid`
--

CREATE TABLE `articuloid` (
  `idA` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carritoart`
--

CREATE TABLE `carritoart` (
  `idA` int(11) NOT NULL,
  `productos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carritocuenta`
--

CREATE TABLE `carritocuenta` (
  `idC` int(11) NOT NULL,
  `estado` enum('pendiente','en proceso','completado','cancelado') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCat` int(11) NOT NULL,
  `nombreCat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comprador`
--

CREATE TABLE `comprador` (
  `idC` int(11) NOT NULL,
  `tarjeta` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compran`
--

CREATE TABLE `compran` (
  `idC` int(11) NOT NULL,
  `idA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recibo`
--

CREATE TABLE `recibo` (
  `idR` int(11) NOT NULL,
  `productos` text DEFAULT NULL,
  `idA` int(11) DEFAULT NULL,
  `idC` int(11) DEFAULT NULL,
  `tipo` enum('Nota de devolución','E.Ticket') DEFAULT NULL,
  `montoTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idC` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `dirección` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendedorempresa`
--

CREATE TABLE `vendedorempresa` (
  `idC` int(11) NOT NULL,
  `idE` int(11) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `idCat` (`idCat`),
  ADD KEY `idE` (`idE`);

--
-- Indexes for table `articuloid`
--
ALTER TABLE `articuloid`
  ADD PRIMARY KEY (`idA`);

--
-- Indexes for table `carritoart`
--
ALTER TABLE `carritoart`
  ADD PRIMARY KEY (`idA`);

--
-- Indexes for table `carritocuenta`
--
ALTER TABLE `carritocuenta`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`idC`);

--
-- Indexes for table `compran`
--
ALTER TABLE `compran`
  ADD PRIMARY KEY (`idC`,`idA`),
  ADD KEY `idA` (`idA`);

--
-- Indexes for table `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`idR`),
  ADD KEY `idA` (`idA`),
  ADD KEY `idC` (`idC`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idC`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `vendedorempresa`
--
ALTER TABLE `vendedorempresa`
  ADD PRIMARY KEY (`idE`),
  ADD KEY `idC` (`idC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recibo`
--
ALTER TABLE `recibo`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendedorempresa`
--
ALTER TABLE `vendedorempresa`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categoria` (`idCat`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`idE`) REFERENCES `vendedorempresa` (`idE`);

--
-- Constraints for table `articuloid`
--
ALTER TABLE `articuloid`
  ADD CONSTRAINT `articuloid_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `articulo` (`idA`);

--
-- Constraints for table `carritoart`
--
ALTER TABLE `carritoart`
  ADD CONSTRAINT `carritoart_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `articulo` (`idA`);

--
-- Constraints for table `carritocuenta`
--
ALTER TABLE `carritocuenta`
  ADD CONSTRAINT `carritocuenta_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `comprador` (`idC`);

--
-- Constraints for table `comprador`
--
ALTER TABLE `comprador`
  ADD CONSTRAINT `comprador_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `usuario` (`idC`);

--
-- Constraints for table `compran`
--
ALTER TABLE `compran`
  ADD CONSTRAINT `compran_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `comprador` (`idC`),
  ADD CONSTRAINT `compran_ibfk_2` FOREIGN KEY (`idA`) REFERENCES `articulo` (`idA`);

--
-- Constraints for table `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `articulo` (`idA`),
  ADD CONSTRAINT `recibo_ibfk_2` FOREIGN KEY (`idC`) REFERENCES `carritocuenta` (`idC`);

--
-- Constraints for table `vendedorempresa`
--
ALTER TABLE `vendedorempresa`
  ADD CONSTRAINT `vendedorempresa_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `usuario` (`idC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
