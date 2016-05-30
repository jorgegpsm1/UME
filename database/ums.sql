-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2016 a las 15:34:34
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
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_CITA` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO_PATERNO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO_MATERNO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `CORREO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `TELEFONO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`ID_CITA`, `NOMBRE`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `CORREO`, `TELEFONO`, `FECHA`) VALUES
(1, 'Jorge', 'Garcia', 'Padilla', 'uralvasm@gmail.com', '3311726532', '05/29/2016 3:00 PM'),
(2, 'Pablito', 'Carnez', 'Panzon', 'melacomo123@promomedios.com', '33115565656', '05/25/2016 12:00 AM'),
(3, 'Pablito', 'Carnez', 'Panzon', 'melacomo123@promomedios.com', '33115565656', '05/25/2016 12:00 AM'),
(4, 'Pablito', 'Carnez', 'Panzon', 'melacomo123@promomedios.com', '33115565656', '05/25/2016 12:00 AM'),
(5, 'fdg', 'dfgdfg', 'dfgdfg', 'gdfgdf@fsdf.com', '4124124124', '05/26/2016 12:00 AM'),
(6, 'fdg', 'dfgdfg', 'dfgdfg', 'gdfgdf@fsdf.com', '4124124124', '05/26/2016 12:00 AM'),
(7, 'panzon', 'come verga', 'explotador', 'promo@promo.zic', '66666666666', '05/18/2016 12:01 PM'),
(8, 'rer', 'werwe', 'rwerwe', 'werwer@dsfsdf.fsdfsd', '3124214', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `ID_DEPARTMENT` tinyint(4) NOT NULL,
  `DEPARTMENT_NAME` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `DEPARTMENT_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`ID_DEPARTMENT`, `DEPARTMENT_NAME`, `DEPARTMENT_STATUS`) VALUES
(1, 'administracion', 1),
(2, 'medicos', 1),
(3, 'secretaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_1`
--

CREATE TABLE `department_area_1` (
  `ID_AREA` tinyint(4) NOT NULL,
  `AREA_NAME` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `AREA_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_1`
--

INSERT INTO `department_area_1` (`ID_AREA`, `AREA_NAME`, `AREA_STATUS`) VALUES
(1, 'usuarios', 1),
(2, 'departamento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_2`
--

CREATE TABLE `department_area_2` (
  `ID_AREA` tinyint(4) NOT NULL,
  `AREA_NAME` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `AREA_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_2`
--

INSERT INTO `department_area_2` (`ID_AREA`, `AREA_NAME`, `AREA_STATUS`) VALUES
(1, 'expediente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_3`
--

CREATE TABLE `department_area_3` (
  `ID_AREA` tinyint(4) NOT NULL,
  `AREA_NAME` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `AREA_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_3`
--

INSERT INTO `department_area_3` (`ID_AREA`, `AREA_NAME`, `AREA_STATUS`) VALUES
(1, 'citas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_user_access_1_1`
--

CREATE TABLE `department_area_user_access_1_1` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_AREA_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_user_access_1_1`
--

INSERT INTO `department_area_user_access_1_1` (`ID_USER`, `USER_DEPARTMENT_AREA_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_user_access_1_2`
--

CREATE TABLE `department_area_user_access_1_2` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_AREA_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_user_access_1_2`
--

INSERT INTO `department_area_user_access_1_2` (`ID_USER`, `USER_DEPARTMENT_AREA_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_user_access_2_1`
--

CREATE TABLE `department_area_user_access_2_1` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_AREA_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_user_access_2_1`
--

INSERT INTO `department_area_user_access_2_1` (`ID_USER`, `USER_DEPARTMENT_AREA_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_area_user_access_3_1`
--

CREATE TABLE `department_area_user_access_3_1` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_AREA_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_area_user_access_3_1`
--

INSERT INTO `department_area_user_access_3_1` (`ID_USER`, `USER_DEPARTMENT_AREA_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_user_access_1`
--

CREATE TABLE `department_user_access_1` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_user_access_1`
--

INSERT INTO `department_user_access_1` (`ID_USER`, `USER_DEPARTMENT_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_user_access_2`
--

CREATE TABLE `department_user_access_2` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_user_access_2`
--

INSERT INTO `department_user_access_2` (`ID_USER`, `USER_DEPARTMENT_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department_user_access_3`
--

CREATE TABLE `department_user_access_3` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_DEPARTMENT_STATUS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `department_user_access_3`
--

INSERT INTO `department_user_access_3` (`ID_USER`, `USER_DEPARTMENT_STATUS`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `ID_EXPEDIENTE` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO_PATERNO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO_MATERNO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `CORREO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `TELEFONO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `PADECIMIENTO` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `expedientes`
--

INSERT INTO `expedientes` (`ID_EXPEDIENTE`, `NOMBRE`, `APELLIDO_PATERNO`, `APELLIDO_MATERNO`, `CORREO`, `TELEFONO`, `FECHA`, `PADECIMIENTO`) VALUES
(1, 'Pablo', 'Perez', 'Gomez', 'pablito@promomedios.com', '3310527120', '05/29/2016 3:00 PM', 'Cancer'),
(2, '1', '1', '1', '1@1.com', '123', '05/26/2016 12:00 AM', 'pene chico'),
(3, 'fdsf', 'sdfsd', 'fsdfsd', 'fsdf@dsfsdf', '12412412', '05/10/2016 12:00 AM', '4214124');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_access`
--

CREATE TABLE `user_access` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_LOGIN_NAME` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_LOGIN_PASS` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_access`
--

INSERT INTO `user_access` (`ID_USER`, `USER_LOGIN_NAME`, `USER_LOGIN_PASS`, `USER_STATUS`) VALUES
(1, 'jorge', '$2y$10$Gb7Nvwm4xAMwAjEHwjfAi.MrnFnDapR85FLpexUetOd4VuLpofT9m', 1),
(2, 'pablo', '$2y$10$fUnSHnudXf0vm6yZ0Tv4VOhIRo5sTE4SzKgt4AIK5ydjuOtvv9lZu', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_sessions_access_1`
--

CREATE TABLE `user_sessions_access_1` (
  `ID_SESSION` tinyint(4) NOT NULL,
  `USER_KEY` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_DATE_CREATED` timestamp NOT NULL,
  `USER_DATE_CURRENT` timestamp NOT NULL,
  `USER_DATE_TEMP` timestamp NOT NULL,
  `USER_IP` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_BROWSER` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_SESSION_TEMP` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_sessions_access_1`
--

INSERT INTO `user_sessions_access_1` (`ID_SESSION`, `USER_KEY`, `USER_DATE_CREATED`, `USER_DATE_CURRENT`, `USER_DATE_TEMP`, `USER_IP`, `USER_BROWSER`, `USER_SESSION_TEMP`) VALUES
(1, 'dbdfbcc1014b01c9040717827d1c0ef25f09f57f', '2016-05-28 06:23:08', '2016-05-28 06:23:08', '2016-05-28 06:23:08', '192.168.0.{Random(0,254)}', 'Chrome', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_sessions_access_2`
--

CREATE TABLE `user_sessions_access_2` (
  `ID_SESSION` tinyint(4) NOT NULL,
  `USER_KEY` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_DATE_CREATED` timestamp NOT NULL,
  `USER_DATE_CURRENT` timestamp NOT NULL,
  `USER_DATE_TEMP` timestamp NOT NULL,
  `USER_IP` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_BROWSER` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `USER_SESSION_TEMP` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_session_access`
--

CREATE TABLE `user_session_access` (
  `ID_USER` tinyint(4) NOT NULL,
  `USER_SESSIONS` tinyint(4) NOT NULL DEFAULT '0',
  `USER_SESSION_PASS` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user_session_access`
--

INSERT INTO `user_session_access` (`ID_USER`, `USER_SESSIONS`, `USER_SESSION_PASS`) VALUES
(1, 1, '1'),
(2, 0, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_CITA`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID_DEPARTMENT`);

--
-- Indices de la tabla `department_area_1`
--
ALTER TABLE `department_area_1`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `department_area_2`
--
ALTER TABLE `department_area_2`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `department_area_3`
--
ALTER TABLE `department_area_3`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `department_area_user_access_1_1`
--
ALTER TABLE `department_area_user_access_1_1`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_area_user_access_1_2`
--
ALTER TABLE `department_area_user_access_1_2`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_area_user_access_2_1`
--
ALTER TABLE `department_area_user_access_2_1`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_area_user_access_3_1`
--
ALTER TABLE `department_area_user_access_3_1`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_user_access_1`
--
ALTER TABLE `department_user_access_1`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_user_access_2`
--
ALTER TABLE `department_user_access_2`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `department_user_access_3`
--
ALTER TABLE `department_user_access_3`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`ID_EXPEDIENTE`);

--
-- Indices de la tabla `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indices de la tabla `user_sessions_access_1`
--
ALTER TABLE `user_sessions_access_1`
  ADD UNIQUE KEY `ID_SESSION` (`ID_SESSION`);

--
-- Indices de la tabla `user_sessions_access_2`
--
ALTER TABLE `user_sessions_access_2`
  ADD UNIQUE KEY `ID_SESSION` (`ID_SESSION`);

--
-- Indices de la tabla `user_session_access`
--
ALTER TABLE `user_session_access`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_CITA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `ID_EXPEDIENTE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user_access`
--
ALTER TABLE `user_access`
  MODIFY `ID_USER` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `department_area_user_access_1_1`
--
ALTER TABLE `department_area_user_access_1_1`
  ADD CONSTRAINT `department_area_user_access_1_1_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_area_user_access_1_2`
--
ALTER TABLE `department_area_user_access_1_2`
  ADD CONSTRAINT `department_area_user_access_1_2_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_area_user_access_2_1`
--
ALTER TABLE `department_area_user_access_2_1`
  ADD CONSTRAINT `department_area_user_access_2_1_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_area_user_access_3_1`
--
ALTER TABLE `department_area_user_access_3_1`
  ADD CONSTRAINT `department_area_user_access_3_1_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_user_access_1`
--
ALTER TABLE `department_user_access_1`
  ADD CONSTRAINT `department_user_access_1_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_user_access_2`
--
ALTER TABLE `department_user_access_2`
  ADD CONSTRAINT `department_user_access_2_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `department_user_access_3`
--
ALTER TABLE `department_user_access_3`
  ADD CONSTRAINT `department_user_access_3_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

--
-- Filtros para la tabla `user_session_access`
--
ALTER TABLE `user_session_access`
  ADD CONSTRAINT `user_session_access_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user_access` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
