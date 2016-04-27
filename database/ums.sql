-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2016 a las 08:04:43
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ums`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_LOGIN` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_PASS` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_USER`, `USER_LOGIN`, `USER_PASS`) VALUES
(1, 'jorge', '$2y$10$PgeqswzRymc2Jy4pGtaqZeUhzGeJsspgQHkw9eKoAV7q4Ozx9pk6u'),
(2, 'pablo', '$2y$10$5WfI/g5LojA1KrWX8TtnMOHaMWy0wGxiaHnwKG80wde6ThRM.I/aW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_multiple`
--

CREATE TABLE `user_multiple` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_SESSIONS` tinyint(4) NOT NULL DEFAULT '0',
  `USER_SESSION_KEY` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_multiple`
--

INSERT INTO `user_multiple` (`ID_USER`, `USER_SESSIONS`, `USER_SESSION_KEY`) VALUES
(1, 0, 'f03bce9aa957ea8aa00f0de99ad143bab00f4aa0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_multiple_access_1`
--

CREATE TABLE `user_multiple_access_1` (
  `ID_SESSION` tinyint(4) NOT NULL,
  `USER_KEY` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_TEMP` varchar(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  `USER_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_multiple_access_1`
--

INSERT INTO `user_multiple_access_1` (`ID_SESSION`, `USER_KEY`, `USER_TEMP`, `USER_STATUS`) VALUES
(1, 'dbdfbcc1014b01c9040717827d1c0ef25f09f57f', '0', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `user_multiple`
--
ALTER TABLE `user_multiple`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `user_multiple_access_1`
--
ALTER TABLE `user_multiple_access_1`
  ADD PRIMARY KEY (`ID_SESSION`),
  ADD UNIQUE KEY `ID_SESSION` (`ID_SESSION`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user_multiple`
--
ALTER TABLE `user_multiple`
  ADD CONSTRAINT `user_multiple_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
