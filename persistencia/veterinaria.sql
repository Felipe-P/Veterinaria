-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2020 a las 05:37:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

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
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Kurt', 'Cobain', '100@100.com', 'f899139df5e1059396431415e770c6dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `idauxiliar` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `disponibilidad` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`idauxiliar`, `nombre`, `apellido`, `correo`, `clave`, `disponibilidad`) VALUES
(1, 'Homero', 'Simpson', '12@12.com', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(2, 'zoro', 'master', '22@22.com', 'b6d767d2f8ed5d21a44b0e5886680cb9', 1),
(3, 'Carlos', 'Valencia', '32@32.com', '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cedula` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correo`, `clave`, `cedula`) VALUES
(2, 'gacha', 'fernandez', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(10, 'Paola', 'Torrez', '10@10.com', 'd3d9446802a44259755d38e6d163e820', '10'),
(20, 'Andres', 'Gonzalez', '20@20.com', '98f13708210194c475687be6106a3b84', '20'),
(30, 'Felipe', 'Guzman', '30@30.com', '34173cb38f07f89ddbebc2ac9128303f', '30'),
(40, 'Maria', 'Romero', '40@40.com', 'd645920e395fedad7bbbed0eca3fe2e0', '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idespecialidad`, `nombre`) VALUES
(1, 'Anestesiologia'),
(2, 'Cardiología '),
(3, 'Dermatología'),
(4, 'Fisioterapia'),
(5, 'Neurología'),
(6, 'Oftalmología'),
(7, 'Oncología'),
(8, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado_pagada` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `precio`, `fecha`, `hora`, `estado_pagada`) VALUES
(2, 20, '2020-03-24', '12:19:06', 1),
(3, 15, '2020-03-24', '12:23:01', 0),
(4, 10, '2020-03-24', '01:27:04', 0),
(5, 20, '2020-03-24', '06:40:21', 1),
(6, 20000, '2020-03-25', '05:24:22', 0),
(7, 22000, '2020-03-25', '05:25:03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

CREATE TABLE `limpieza` (
  `idlimpieza` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `limpieza`
--

INSERT INTO `limpieza` (`idlimpieza`, `tipo`) VALUES
(1, 'Baño'),
(2, 'Limpieza Dental'),
(3, 'Corte Pelo'),
(4, 'Corte Uñas'),
(5, 'Limpieza General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `peso` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `tipo_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `nombre`, `sexo`, `fechaNacimiento`, `peso`, `cliente_idcliente`, `tipo_mascota`) VALUES
(4, 'carla', 'Hembra', '2020-03-11', '45', 2, 1),
(5, 'yogochamber', 'Macho', '2020-03-05', '52', 2, 3),
(6, 'Emmy', 'Hembra', '2017-02-16', '10', 10, 2),
(7, 'Michi', 'Macho', '2019-07-08', '6', 10, 1),
(8, 'Federico', 'Hembra', '2016-11-14', '2', 10, 3),
(9, 'Simon', 'Macho', '2017-08-08', '4', 20, 4),
(10, 'Otto', 'Hembra', '2019-09-14', '1', 20, 5),
(11, 'Lola', 'Hembra', '2016-10-25', '12', 30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_clinico`
--

CREATE TABLE `reporte_clinico` (
  `idreporte_clinico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `diagnostico` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tratamiento` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observaciones` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mascota_idmascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `reporte_clinico`
--

INSERT INTO `reporte_clinico` (`idreporte_clinico`, `fecha`, `diagnostico`, `tratamiento`, `observaciones`, `mascota_idmascota`) VALUES
(8, '2020-03-24', 'tiene muchas cosas', 'Necesita tratamiento con un Neurología', 'sin observaciones', 5),
(9, '2020-03-25', 'Problema nasal', 'Necesita tratamiento con un especialista en Oftalmología', 'Se va a morir =(', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL,
  `estado_proceso` int(11) NOT NULL DEFAULT 0,
  `estado_solicitud` int(11) NOT NULL DEFAULT 0,
  `veterinario_idveterinario` int(11) DEFAULT NULL,
  `tipo_solicitud_idtipo_solicitud` int(11) NOT NULL,
  `factura_idfactura` int(11) DEFAULT NULL,
  `mascota_idmascota` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `especialidad_aux` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idsolicitud`, `estado_proceso`, `estado_solicitud`, `veterinario_idveterinario`, `tipo_solicitud_idtipo_solicitud`, `factura_idfactura`, `mascota_idmascota`, `fecha`, `hora`, `especialidad_aux`) VALUES
(9, 1, 1, NULL, 1, 2, 4, '2020-03-23', '03:34:31', NULL),
(10, 1, 1, 1, 2, 5, 5, '2020-03-23', '04:45:56', NULL),
(11, 1, 1, NULL, 1, 3, 4, '2020-03-23', '06:09:28', NULL),
(12, 1, 1, NULL, 1, 4, 4, '2020-03-23', '07:38:25', NULL),
(17, 0, 1, 3, 3, NULL, 5, '2020-03-24', '06:18:37', 'Neurología'),
(18, 1, 1, NULL, 1, 6, 6, '2020-03-25', '05:17:23', NULL),
(19, 1, 1, 1, 2, NULL, 7, '2020-03-25', '05:17:33', NULL),
(20, 0, 0, NULL, 2, NULL, 9, '2020-03-25', '05:20:09', NULL),
(21, 0, 1, NULL, 1, NULL, 10, '2020-03-25', '05:20:15', NULL),
(22, 1, 1, NULL, 1, 7, 10, '2020-03-25', '05:20:19', NULL),
(23, 0, 1, NULL, 1, NULL, 10, '2020-03-25', '05:20:22', NULL),
(24, 0, 1, NULL, 1, NULL, 11, '2020-03-25', '05:21:10', NULL),
(25, 0, 1, NULL, 1, NULL, 11, '2020-03-25', '05:21:13', NULL),
(26, 0, 1, NULL, 1, NULL, 11, '2020-03-25', '05:21:23', NULL),
(27, 0, 0, NULL, 3, NULL, 7, '2020-03-25', '05:26:32', 'Oftalmología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_limpieza`
--

CREATE TABLE `solicitud_limpieza` (
  `solicitud_idsolicitud` int(11) NOT NULL,
  `limpieza_idlimpieza` int(11) NOT NULL,
  `auxiliar_idauxiliar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `solicitud_limpieza`
--

INSERT INTO `solicitud_limpieza` (`solicitud_idsolicitud`, `limpieza_idlimpieza`, `auxiliar_idauxiliar`) VALUES
(9, 1, 1),
(11, 2, 1),
(12, 3, 1),
(18, 5, 1),
(21, 2, 2),
(22, 3, 2),
(23, 1, 2),
(24, 1, 3),
(25, 4, 3),
(26, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mascota`
--

CREATE TABLE `tipo_mascota` (
  `idtipo_mascota` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`idtipo_mascota`, `nombre`) VALUES
(1, 'Gato'),
(2, 'Perro'),
(3, 'Pajaro'),
(4, 'Pez'),
(5, 'Roedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `idtipo_solicitud` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`idtipo_solicitud`, `nombre`) VALUES
(1, 'Limpieza'),
(2, 'Revision'),
(3, 'Tratamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `idveterinario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `clave` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `especialidad` int(11) NOT NULL,
  `disponibilidad` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`idveterinario`, `nombre`, `apellido`, `correo`, `clave`, `especialidad`, `disponibilidad`) VALUES
(1, 'Felipe', 'Poveda', '11@11.com', '6512bd43d9caa6e02c990b0a82652dca', 8, 1),
(2, 'Stiven', 'Garcia', '21@21.com', '3c59dc048e8850243be8079a5c74d079', 3, 0),
(3, 'El Mocho', 'Ramirez', '31@31.com', 'c16a5320fa475530d9583c34fd356ef5', 8, 1),
(4, 'Chris', 'Brown', '41@41.com', '3416a75f4cea9109507cacd8e2f2aefc', 8, 0),
(5, 'Andrea', 'Jaramillo', '51@51.com', '2838023a778dfaecdc212708f721b788', 7, 0),
(6, 'Mateo', 'Caicedo', '61@61.com', '7f39f8317fbdb1988ef4c628eba02591', 2, 0),
(7, 'Maria', 'Sierra', '71@71.com', 'e2c420d928d4bf8ce0ff2ec19b371514', 4, 0);

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
  ADD PRIMARY KEY (`idlimpieza`);

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
  ADD KEY `fk_solicitud_veterinario1_idx` (`veterinario_idveterinario`),
  ADD KEY `fk_solicitud_tipo_solicitud1_idx` (`tipo_solicitud_idtipo_solicitud`),
  ADD KEY `fk_solicitud_factura1_idx` (`factura_idfactura`),
  ADD KEY `fk_solicitud_mascota1_idx` (`mascota_idmascota`);

--
-- Indices de la tabla `solicitud_limpieza`
--
ALTER TABLE `solicitud_limpieza`
  ADD PRIMARY KEY (`solicitud_idsolicitud`,`limpieza_idlimpieza`),
  ADD KEY `fk_solicitud_Limpieza_solicitud1_idx` (`solicitud_idsolicitud`),
  ADD KEY `fk_solicitud_Limpieza_limpieza1_idx` (`limpieza_idlimpieza`),
  ADD KEY `fk_solicitud_Limpieza_auxiliar1_idx` (`auxiliar_idauxiliar`);

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
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `idauxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `limpieza`
--
ALTER TABLE `limpieza`
  MODIFY `idlimpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reporte_clinico`
--
ALTER TABLE `reporte_clinico`
  MODIFY `idreporte_clinico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tipo_mascota`
--
ALTER TABLE `tipo_mascota`
  MODIFY `idtipo_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `idtipo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `idveterinario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `fk_mascota_cliente0` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mascota_tipo_mascota10` FOREIGN KEY (`tipo_mascota`) REFERENCES `tipo_mascota` (`idtipo_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte_clinico`
--
ALTER TABLE `reporte_clinico`
  ADD CONSTRAINT `fk_reporte_clinico_mascota10` FOREIGN KEY (`mascota_idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_mascota1` FOREIGN KEY (`mascota_idmascota`) REFERENCES `mascota` (`idmascota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_tipo_solicitud1` FOREIGN KEY (`tipo_solicitud_idtipo_solicitud`) REFERENCES `tipo_solicitud` (`idtipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_veterinario1` FOREIGN KEY (`veterinario_idveterinario`) REFERENCES `veterinario` (`idveterinario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_limpieza`
--
ALTER TABLE `solicitud_limpieza`
  ADD CONSTRAINT `fk_solicitud_Limpieza_auxiliar1` FOREIGN KEY (`auxiliar_idauxiliar`) REFERENCES `auxiliar` (`idauxiliar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_Limpieza_limpieza1` FOREIGN KEY (`limpieza_idlimpieza`) REFERENCES `limpieza` (`idlimpieza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_Limpieza_solicitud1` FOREIGN KEY (`solicitud_idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD CONSTRAINT `fk_veterinario_especialidad10` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`idespecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
