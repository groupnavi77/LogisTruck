-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2017 a las 02:15:13
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorachoferviaje`
--

CREATE TABLE `bitacorachoferviaje` (
  `idViaje` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoravehiculoviaje`
--

CREATE TABLE `bitacoravehiculoviaje` (
  `idVehiculo` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoraviaje`
--

CREATE TABLE `bitacoraviaje` (
  `codigoReporteViaje` int(10) UNSIGNED NOT NULL,
  `desviosViaje` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kmViaje` varchar(20) DEFAULT NULL,
  `tipoCombustible` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tiempoViaje` date DEFAULT NULL,
  `lugarCargaCombustible` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `cantidadCombustible` smallint(6) DEFAULT NULL,
  `importeCombustible` float(8,2) DEFAULT NULL,
  `presentacionReporte` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `usoVehiculos` int(11) DEFAULT NULL,
  `tiempoFueraDeServicio` time DEFAULT NULL,
  `costoPorMantenimiento` int(11) DEFAULT NULL,
  `costoPorKmRecorrido` int(11) DEFAULT NULL,
  `promedioDeConsumoDeCombustible` int(11) DEFAULT NULL,
  `kmRecorridoEntreMantenimiento` int(11) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `dniEmpleado` mediumtext,
  `nombreEmpleado` varchar(50) DEFAULT NULL,
  `fechaDeNacimiento` date DEFAULT NULL,
  `telefonoEmpleado` varchar(50) DEFAULT NULL,
  `tipoLicenciaConducir` varchar(50) DEFAULT NULL,
  `ultimaModificacion` varchar(50) DEFAULT NULL,
  `ultimaPosicion` varchar(50) DEFAULT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `dniEmpleado`, `nombreEmpleado`, `fechaDeNacimiento`, `telefonoEmpleado`, `tipoLicenciaConducir`, `ultimaModificacion`, `ultimaPosicion`, `idRol`) VALUES
(1, NULL, 'empleado1', NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'empleado2', NULL, NULL, NULL, NULL, NULL, 2),
(3, NULL, 'empleado3', NULL, NULL, NULL, NULL, NULL, 3),
(4, NULL, 'empleado4', NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoviaje`
--

CREATE TABLE `estadoviaje` (
  `idEstadoViaje` int(11) NOT NULL,
  `tipoEstadoViaje` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `pass`, `idEmpleado`) VALUES
('administrador', '12345', 1),
('chofer', '12345', 2),
('mecanico', '12345', 3),
('supervisor', '12345', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `tipoRol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `tipoRol`) VALUES
(1, 'administrador'),
(2, 'chofer'),
(3, 'mecanico'),
(4, 'supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idReparacion` int(11) NOT NULL,
  `fechaReparacion` date DEFAULT NULL,
  `descripcionReparacion` varchar(200) DEFAULT NULL,
  `costoReparacion` float(8,2) DEFAULT NULL,
  `service` tinyint(1) DEFAULT NULL,
  `arregloExternoReparacion` tinyint(1) DEFAULT NULL,
  `arregloInternoReparacion` tinyint(1) DEFAULT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `idTipoVehiculo` int(11) NOT NULL,
  `tipoVehiculo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `patente` varchar(10) CHARACTER SET utf8 NOT NULL,
  `marca` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `modelo` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `numeroDeChasis` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `numeroDeMotor` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `añoDeFabricacion` date DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `capacidadCarga` varchar(50) DEFAULT NULL,
  `kmVehiculo` mediumtext,
  `proximoService` int(11) DEFAULT NULL,
  `idTipoVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `origenViaje` varchar(50) DEFAULT NULL,
  `destinoViaje` varchar(50) DEFAULT NULL,
  `fechaViaje` date DEFAULT NULL,
  `desvioViaje` tinyint(1) DEFAULT NULL,
  `kmRecorridoPrevisto` int(11) DEFAULT NULL,
  `kmRecorridoReal` int(11) DEFAULT NULL,
  `combustibleConsumidoPrevisto` int(11) DEFAULT NULL,
  `combustibleConsumidoReal` int(11) DEFAULT NULL,
  `codigoQR` varchar(50) DEFAULT NULL,
  `presupuestoViaje` varchar(45) DEFAULT NULL,
  `idEstadoViaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacorachoferviaje`
--
ALTER TABLE `bitacorachoferviaje`
  ADD PRIMARY KEY (`idViaje`,`idEmpleado`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `bitacoravehiculoviaje`
--
ALTER TABLE `bitacoravehiculoviaje`
  ADD PRIMARY KEY (`idVehiculo`,`idViaje`),
  ADD KEY `idViaje` (`idViaje`);

--
-- Indices de la tabla `bitacoraviaje`
--
ALTER TABLE `bitacoraviaje`
  ADD PRIMARY KEY (`codigoReporteViaje`,`idEmpleado`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`,`idRol`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `estadoviaje`
--
ALTER TABLE `estadoviaje`
  ADD PRIMARY KEY (`idEstadoViaje`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`,`idEmpleado`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idReparacion`,`idEmpleado`,`idVehiculo`),
  ADD KEY `idEmpleado` (`idEmpleado`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`idTipoVehiculo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`,`idTipoVehiculo`),
  ADD KEY `idTipoVehiculo` (`idTipoVehiculo`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idViaje`,`idEstadoViaje`),
  ADD KEY `idEstadoViaje` (`idEstadoViaje`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacorachoferviaje`
--
ALTER TABLE `bitacorachoferviaje`
  ADD CONSTRAINT `bitacorachoferviaje_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viaje` (`idViaje`),
  ADD CONSTRAINT `bitacorachoferviaje_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `bitacoravehiculoviaje`
--
ALTER TABLE `bitacoravehiculoviaje`
  ADD CONSTRAINT `bitacoravehiculoviaje_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`),
  ADD CONSTRAINT `bitacoravehiculoviaje_ibfk_2` FOREIGN KEY (`idViaje`) REFERENCES `viaje` (`idViaje`);

--
-- Filtros para la tabla `bitacoraviaje`
--
ALTER TABLE `bitacoraviaje`
  ADD CONSTRAINT `bitacoraviaje_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`),
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idTipoVehiculo`) REFERENCES `tipovehiculo` (`idTipoVehiculo`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`idEstadoViaje`) REFERENCES `estadoviaje` (`idEstadoViaje`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
