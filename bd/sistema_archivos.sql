-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2019 a las 22:36:39
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_archivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_archivo`
--

CREATE TABLE `tbl_archivo` (
  `id_archivo` int(11) NOT NULL,
  `archivo_gerencia` varchar(100) NOT NULL,
  `nombre_documento` varchar(100) NOT NULL,
  `folios` varchar(50) NOT NULL,
  `numeracion` varchar(50) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `anaquel` varchar(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `numero_archivador` varchar(30) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_archivo`
--

INSERT INTO `tbl_archivo` (`id_archivo`, `archivo_gerencia`, `nombre_documento`, `folios`, `numeracion`, `observaciones`, `codigo`, `anaquel`, `nivel`, `numero_archivador`, `archivo`, `id_usuario`) VALUES
(1, 'Informatica', 'Computos en general', '2', '56', 'ninguna', '123', '3', 4, '12 al 39', '', 1),
(2, 'Alcaldia', 'dakjh', '34', '345', 'fsnfk', '234', '233', 31, '12 al 23', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `tipo_usuario` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `usuario`, `password`, `nombre`, `apellido`, `tipo_usuario`) VALUES
(1, 'admin', '123456', 'javier', 'yañac', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_archivo`
--
ALTER TABLE `tbl_archivo`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_archivo`
--
ALTER TABLE `tbl_archivo`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_archivo`
--
ALTER TABLE `tbl_archivo`
  ADD CONSTRAINT `tbl_archivo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
