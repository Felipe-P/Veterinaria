-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2020 a las 06:22:26
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Shagy', 'El Poderoso', '100@100.com', 'f899139df5e1059396431415e770c6dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `idauxiliar` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `disponible` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`idauxiliar`, `nombre`, `apellido`, `correo`, `clave`, `disponible`) VALUES
(1, 'Juan', 'Valdez', '15@15.com', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 0),
(2, 'Raton', 'Perez', '25@25.com', '8e296a067a37563370ded05f5a3bf3ec', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correo`, `clave`, `cedula`) VALUES
(1, 'clark', 'kent', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(2, 'Homero', 'Simpson', '2@2.com', 'c81e728d9d4c2f636f067f89cc14862c', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idespecialidad`, `nombre`) VALUES
(1, 'Dermatología'),
(2, ' Fisioterapia'),
(3, 'General'),
(4, 'Neurología'),
(5, 'Oftalmología '),
(6, 'Anestesiología'),
(7, ' Cardiología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado_pagado` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

CREATE TABLE `limpieza` (
  `idlimpieza` int(11) NOT NULL,
  `auxiliar_idauxiliar` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `peso` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `tipo_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `nombre`, `sexo`, `fechaNacimiento`, `peso`, `cliente_idcliente`, `tipo_mascota`) VALUES
(1, 'carla', 'femenino', '2020-03-10', '20kg', 1, 2),
(3, 'zoro', 'masculino', '2020-03-10', '30', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_clinico`
--

CREATE TABLE `reporte_clinico` (
  `idreporte_clinico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `diagnostico` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tratamiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mascota_idmascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL,
  `estado_proceso` int(11) NOT NULL DEFAULT 0,
  `estado_solicitud` int(11) NOT NULL DEFAULT 0,
  `mascota_idmascota` int(11) NOT NULL,
  `factura_idfactura` int(11) NOT NULL,
  `tipo_solicitud_idtipo_solicitud` int(11) NOT NULL,
  `limpieza_idlimpieza` int(11) NOT NULL,
  `veterinario_idveterinario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_mascota`
--

CREATE TABLE `solicitud_mascota` (
  `mascota_idmascota` int(11) NOT NULL,
  `solicitud_idsolicitud` int(11) NOT NULL,
  `tipo_estado_idtipo_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mascota`
--

CREATE TABLE `tipo_mascota` (
  `idtipo_mascota` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`idtipo_mascota`, `nombre`) VALUES
(1, 'perro'),
(2, 'gato'),
(3, 'pajaro'),
(4, 'pez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `idtipo_solicitud` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `idveterinario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` int(11) NOT NULL,
  `disponible` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`idveterinario`, `nombre`, `apellido`, `correo`, `clave`, `especialidad`, `disponible`) VALUES
(1, 'Felipe', 'Poveda', '10@10.com', 'd3d9446802a44259755d38e6d163e820', 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`idauxiliar`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`);

--
-- Indices de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  ADD PRIMARY KEY (`idlimpieza`),
  ADD KEY `fk_Limpieza_auxiliar1_idx` (`auxiliar_idauxiliar`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmascota`),
  ADD KEY `fk_mascota_cliente_idx` (`cliente_idcliente`),
  ADD KEY `fk_mascota_tipo_mascota1_idx` (`tipo_mascota`);

--
-- Indices de la tabla `reporte_clinico`
--
ALTER TABLE `reporte_clinico`
  ADD PRIMARY KEY (`idreporte_clinico`),
  ADD KEY `fk_reporte_clinico_mascota1_idx` (`mascota_idmascota`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `fk_solicitud_mascota1_idx` (`mascota_idmascota`),
  ADD KEY `fk_solicitud_factura1_idx` (`factura_idfactura`),
  ADD KEY `fk_solicitud_tipo_solicitud1_idx` (`tipo_solicitud_idtipo_solicitud`),
  ADD KEY `fk_solicitud_limpieza1_idx` (`limpieza_idlimpieza`),
  ADD KEY `fk_solicitud_veterinario1_idx` (`veterinario_idveterinario`);

--
-- Indices de la tabla `solicitud_mascota`
--
ALTER TABLE `solicitud_mascota`
  ADD PRIMARY KEY (`mascota_idmascota`,`solicitud_idsolicitud`),
  ADD UNIQUE KEY `mascota_idmascota_UNIQUE` (`mascota_idmascota`),
  ADD UNIQUE KEY `solicitud_idsolicitud_UNIQUE` (`solicitud_idsolicitud`),
  ADD KEY `fk_solicitud_mascota_mascota1_idx` (`mascota_idmascota`),
  ADD KEY `fk_solicitud_mascota_solicitud1_idx` (`solicitud_idsolicitud`),
  ADD KEY `fk_solicitud_mascota_tipo_estado1_idx` (`tipo_estado_idtipo_estado`);

--
-- Indices de la tabla `tipo_mascota`
--
ALTER TABLE `tipo_mascota`
  ADD PRIMARY KEY (`idtipo_mascota`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`idtipo_solicitud`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`idveterinario`),
  ADD KEY `fk_veterinario_especialidad1_idx` (`especialidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `idauxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  MODIFY `idlimpieza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reporte_clinico`
--
ALTER TABLE `reporte_clinico`
  MODIFY `idreporte_clinico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_mascota`
--
ALTER TABLE `tipo_mascota`
  MODIFY `idtipo_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `idtipo_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `idveterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `limpieza`
--
ALTER TABLE `limpieza`
  ADD CONSTRAINT `fk_Limpieza_auxiliar1` FOREIGN KEY (`auxiliar_idauxiliar`) REFERENCES `auxiliar` (`idauxiliar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_mascota_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mascota_tipo_mascota1` FOREIGN KEY (`tipo_mascota`) REFERENCES `tipo_mascota` (`idtipo_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte_clinico`
--
ALTER TABLE `reporte_clinico`
  ADD CONSTRAINT `fk_reporte_clinico_mascota1` FOREIGN KEY (`mascota_idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_limpieza1` FOREIGN KEY (`limpieza_idlimpieza`) REFERENCES `limpieza` (`idlimpieza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_mascota1` FOREIGN KEY (`mascota_idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_tipo_solicitud1` FOREIGN KEY (`tipo_solicitud_idtipo_solicitud`) REFERENCES `tipo_solicitud` (`idtipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_veterinario1` FOREIGN KEY (`veterinario_idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_mascota`
--
ALTER TABLE `solicitud_mascota`
  ADD CONSTRAINT `fk_solicitud_mascota_mascota1` FOREIGN KEY (`mascota_idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_mascota_solicitud1` FOREIGN KEY (`solicitud_idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_mascota_tipo_estado1` FOREIGN KEY (`tipo_estado_idtipo_estado`) REFERENCES `tipo_solicitud` (`idtipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `fk_veterinario_especialidad1` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
