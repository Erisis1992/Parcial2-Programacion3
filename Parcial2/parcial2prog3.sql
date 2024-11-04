-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2024 a las 22:51:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial2prog3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_cuenta`
--

CREATE TABLE `estado_cuenta` (
  `ID` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Token` int(11) NOT NULL,
  `Fecha_Vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificaciones`
--

CREATE TABLE `modificaciones` (
  `ID_Modificacion` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Fecha_Modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ultima sesión`
--

CREATE TABLE `ultima sesión` (
  `ID_Sesion` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Fecha_Sesion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validacion`
--

CREATE TABLE `validacion` (
  `ID_Estado` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `validacion`
--

INSERT INTO `validacion` (`ID_Estado`, `Descripcion`) VALUES
(1, 'Activada'),
(2, 'Desactivada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_cuenta`
--
ALTER TABLE `estado_cuenta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Usuario` (`ID_Usuario`) USING BTREE,
  ADD KEY `ID_Estado` (`ID_Estado`) USING BTREE;

--
-- Indices de la tabla `modificaciones`
--
ALTER TABLE `modificaciones`
  ADD PRIMARY KEY (`ID_Modificacion`),
  ADD KEY `ID_Usuario` (`ID_Usuario`) USING BTREE;

--
-- Indices de la tabla `ultima sesión`
--
ALTER TABLE `ultima sesión`
  ADD PRIMARY KEY (`ID_Sesion`),
  ADD KEY `ID_Usuario` (`ID_Usuario`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD KEY `ID_Estado` (`ID_Estado`) USING BTREE;

--
-- Indices de la tabla `validacion`
--
ALTER TABLE `validacion`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_cuenta`
--
ALTER TABLE `estado_cuenta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modificaciones`
--
ALTER TABLE `modificaciones`
  MODIFY `ID_Modificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ultima sesión`
--
ALTER TABLE `ultima sesión`
  MODIFY `ID_Sesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `validacion`
--
ALTER TABLE `validacion`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modificaciones`
--
ALTER TABLE `modificaciones`
  ADD CONSTRAINT `modificaciones_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ultima sesión`
--
ALTER TABLE `ultima sesión`
  ADD CONSTRAINT `ultima sesión_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuarios` (`ID_Usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_Estado`) REFERENCES `validacion` (`ID_Estado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
