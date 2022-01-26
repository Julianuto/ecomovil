-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2019 a las 03:21:10
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eml`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_celular`
--

CREATE TABLE `n_celular` (
  `ID_NC` int(11) NOT NULL,
  `ID_U` int(11) DEFAULT NULL,
  `NUMERO` varchar(10) NOT NULL,
  `OPERADOR` text NOT NULL,
  `saldo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `n_celular`
--

INSERT INTO `n_celular` (`ID_NC`, `ID_U`, `NUMERO`, `OPERADOR`, `saldo`) VALUES
(14, 2, '3005577061', 'Tigo', 800),
(18, 2, '3126989537', 'Claro', 100),
(19, 2, '3175626561', 'Movistar', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_prov`
--

CREATE TABLE `puntos_prov` (
  `id_p` int(11) NOT NULL,
  `puntos1` int(11) NOT NULL,
  `puntos2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntos_prov`
--

INSERT INTO `puntos_prov` (`id_p`, `puntos1`, `puntos2`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_u`
--

CREATE TABLE `tipo_u` (
  `ID_TIPOU` int(11) NOT NULL,
  `TIPOU` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_u`
--

INSERT INTO `tipo_u` (`ID_TIPOU`, `TIPOU`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `ID_T` int(11) NOT NULL,
  `ID_U` int(11) DEFAULT NULL,
  `SALDO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_U` int(11) NOT NULL,
  `ID_TIPOU` int(11) DEFAULT NULL,
  `NOMBRE` text DEFAULT NULL,
  `APELLIDO` text DEFAULT NULL,
  `CEDULA` int(11) DEFAULT NULL,
  `CONTRASENA` text DEFAULT NULL,
  `PUNTOS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_U`, `ID_TIPOU`, `NOMBRE`, `APELLIDO`, `CEDULA`, `CONTRASENA`, `PUNTOS`) VALUES
(1, 1, 'Julian', 'Hurtado', 329, '123', NULL),
(2, 2, 'Carlos  ', 'Valverde', 123, '123', 0),
(8, 2, 'Julian', 'Carvajal', 456, '456', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `n_celular`
--
ALTER TABLE `n_celular`
  ADD PRIMARY KEY (`ID_NC`),
  ADD KEY `FK_REFERENCE_2` (`ID_U`);

--
-- Indices de la tabla `puntos_prov`
--
ALTER TABLE `puntos_prov`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `tipo_u`
--
ALTER TABLE `tipo_u`
  ADD PRIMARY KEY (`ID_TIPOU`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`ID_T`),
  ADD KEY `FK_REFERENCE_3` (`ID_U`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_U`),
  ADD KEY `FK_REFERENCE_1` (`ID_TIPOU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `n_celular`
--
ALTER TABLE `n_celular`
  MODIFY `ID_NC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `puntos_prov`
--
ALTER TABLE `puntos_prov`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_u`
--
ALTER TABLE `tipo_u`
  MODIFY `ID_TIPOU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `ID_T` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `n_celular`
--
ALTER TABLE `n_celular`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_U`) REFERENCES `usuario` (`ID_U`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_U`) REFERENCES `usuario` (`ID_U`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_TIPOU`) REFERENCES `tipo_u` (`ID_TIPOU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
