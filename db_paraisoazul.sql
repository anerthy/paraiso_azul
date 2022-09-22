-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-09-2022 a las 22:16:12
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_paraiso_azul`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_delete_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_hospedaje` (IN `id_hosp` SMALLINT)  BEGIN
	DELETE from hospedaje where id_hospedaje = id_hosp; 
END$$

DROP PROCEDURE IF EXISTS `sp_insert_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_hospedaje` (IN `nombre_hosp` VARCHAR(100), IN `descripcion` TEXT, IN `tipo` ENUM('Cabina','Camping'), IN `direccion` TEXT, IN `telefono` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
    INSERT INTO `hospedaje`(`nombre_hosp`,`descripcion`,`tipo`,`direccion`,`telefono`,`precio`,`status`,`imagen`) 
    VALUES (nombre_hosp,descripcion,tipo, direccion,telefono,precio,status,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_select_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_hospedaje` (IN `id_hosp` SMALLINT)  BEGIN
    SELECT id_hospedaje,nombre_hosp,descripcion,tipo,direccion,telefono,precio,estado,imagen 
    from hospedaje 
    WHERE id_hospedaje = id_hosp;
END$$

DROP PROCEDURE IF EXISTS `sp_select_hospedajes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_hospedajes` ()  BEGIN
SELECT id_hospedaje,nombre_hosp,descripcion,tipo,direccion,telefono,precio,status,imagen 
from hospedaje;
END$$

DROP PROCEDURE IF EXISTS `sp_update_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_hospedaje` (IN `id_hosp` SMALLINT, IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `tipo` ENUM('Cabaña','Camping'), IN `direccion` TEXT, IN `tel` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	UPDATE `hospedaje` 
    SET nombre_hosp = nombre, 
    descripcion = descripcion, 
    tipo = tipo, 
    direccion = direccion,
    telefono = tel,
    precio = precio,
    status = status,
    imagen = imagen
    WHERE id_hospedaje = id_hosp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentacion`
--

DROP TABLE IF EXISTS `alimentacion`;
CREATE TABLE IF NOT EXISTS `alimentacion` (
  `id_alimentacion` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_alim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_alimentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

DROP TABLE IF EXISTS `comunidad`;
CREATE TABLE IF NOT EXISTS `comunidad` (
  `id_comunidad` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_com` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ubicacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_comunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_organizado`
--

DROP TABLE IF EXISTS `grupo_organizado`;
CREATE TABLE IF NOT EXISTS `grupo_organizado` (
  `id_grupo` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `representante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `ubicacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `numero_integrantes` tinyint NOT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `comunidad_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `IdComunidad` (`comunidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje`
--

DROP TABLE IF EXISTS `hospedaje`;
CREATE TABLE IF NOT EXISTS `hospedaje` (
  `id_hospedaje` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_hosp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `tipo` enum('Cabina','Camping') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_hospedaje`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`id_hospedaje`, `nombre_hosp`, `descripcion`, `tipo`, `direccion`, `telefono`, `precio`, `status`, `imagen`) VALUES
(1, 'Mariposas', 'Se ofrece habitacion para dos personas', 'Camping', 'Golfo de Nicoya', '98982818', '20000.00', 1, 'eijkdjdk'),
(3, 'Mariposas', 'Se ofrece habitacion para dos personas', 'Cabina', 'Golfo de Nicoya', '98982818', '20000.00', 1, 'eijkdjdk'),
(6, 'Hotel la vida loca', 'jdskjssjdsaaaaaaaaaaaaaaaaaaaaaaadk', 'Camping', '222222222222222222ewd', '89320012', '21000.00', 1, 'imagen.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Comunidades', 'Modulo de comunidades', 1),
(2, 'Hospedaje', 'Modulo de hospedaje', 1),
(3, 'Transporte', 'Modulo de transporte', 1),
(4, 'Usuario', 'Modulo de usuario', 1),
(5, 'Roles', 'Modulo de roles', 1),
(6, 'Grupos', 'Modulo de Grupos Organizados', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete_turistico`
--

DROP TABLE IF EXISTS `paquete_turistico`;
CREATE TABLE IF NOT EXISTS `paquete_turistico` (
  `id_paquete` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` enum('Alimentacion','Transporte','Hospedaje') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `detalles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `tour_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_paquete`),
  KEY `tour_id` (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ver` int NOT NULL DEFAULT '0',
  `agregar` int NOT NULL DEFAULT '0',
  `actualizar` int NOT NULL DEFAULT '0',
  `eliminar` int NOT NULL DEFAULT '0',
  `rol_id` smallint UNSIGNED NOT NULL,
  `modulo_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `rol_id` (`rol_id`),
  KEY `modulo_id` (`modulo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `ver`, `agregar`, `actualizar`, `eliminar`, `rol_id`, `modulo_id`) VALUES
(2, 1, 1, 1, 1, 8, 1),
(3, 1, 1, 1, 1, 8, 2),
(4, 1, 1, 1, 1, 8, 3),
(5, 1, 1, 1, 1, 8, 4),
(6, 1, 1, 1, 1, 8, 5),
(7, 1, 1, 1, 1, 8, 6),
(8, 1, 1, 1, 1, 9, 1),
(9, 0, 0, 0, 0, 9, 2),
(10, 0, 0, 0, 0, 9, 3),
(11, 0, 0, 0, 0, 9, 4),
(12, 0, 0, 0, 0, 9, 5),
(13, 0, 0, 0, 0, 9, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_alimentacion`
--

DROP TABLE IF EXISTS `registro_alimentacion`;
CREATE TABLE IF NOT EXISTS `registro_alimentacion` (
  `alimentacion_id` smallint UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`alimentacion_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `alimentacion_id` (`alimentacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_hospedaje`
--

DROP TABLE IF EXISTS `registro_hospedaje`;
CREATE TABLE IF NOT EXISTS `registro_hospedaje` (
  `hospedaje_id` smallint UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`hospedaje_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `hospedaje_id` (`hospedaje_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_tour`
--

DROP TABLE IF EXISTS `registro_tour`;
CREATE TABLE IF NOT EXISTS `registro_tour` (
  `tour_id` smallint UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`tour_id`),
  KEY `tour_id` (`tour_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_transporte`
--

DROP TABLE IF EXISTS `registro_transporte`;
CREATE TABLE IF NOT EXISTS `registro_transporte` (
  `transporte_id` smallint UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`transporte_id`),
  KEY `transporte_id` (`transporte_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion`, `status`) VALUES
(8, 'ADMIN', 'super administrador', 1),
(9, 'rolt_est', 'sdsadaa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE IF NOT EXISTS `tour` (
  `id_tour` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tour` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `lugar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `disponibilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `duracion` time NOT NULL,
  `cupo_minimo` tinyint NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_tour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `id_transporte` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_trans` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `clase` enum('Publico','Privado') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `tipo` enum('Terrestre','Maritimo') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `disponibilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_transporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `contraseña` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `rol_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre` (`nombre_usuario`),
  UNIQUE KEY `nombre_2` (`nombre_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo`, `contraseña`, `status`, `rol_id`) VALUES
(1, 'Andres', 'andmejigo12@gmail.com', '12345678', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grupo`
--

DROP TABLE IF EXISTS `usuario_grupo`;
CREATE TABLE IF NOT EXISTS `usuario_grupo` (
  `usuario_id` smallint UNSIGNED NOT NULL,
  `grupo_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`usuario_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `grupo_id` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id_voluntario` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_vol` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellido1` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellido2` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `cedula` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `lugar_residencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_voluntario`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo_organizado`
--
ALTER TABLE `grupo_organizado`
  ADD CONSTRAINT `grupo_organizado_ibfk_1` FOREIGN KEY (`comunidad_id`) REFERENCES `comunidad` (`id_comunidad`);

--
-- Filtros para la tabla `paquete_turistico`
--
ALTER TABLE `paquete_turistico`
  ADD CONSTRAINT `paquete_turistico_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id_tour`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulo` (`id_modulo`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `registro_alimentacion`
--
ALTER TABLE `registro_alimentacion`
  ADD CONSTRAINT `registro_alimentacion_ibfk_1` FOREIGN KEY (`alimentacion_id`) REFERENCES `alimentacion` (`id_alimentacion`),
  ADD CONSTRAINT `registro_alimentacion_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `registro_hospedaje`
--
ALTER TABLE `registro_hospedaje`
  ADD CONSTRAINT `registro_hospedaje_ibfk_1` FOREIGN KEY (`hospedaje_id`) REFERENCES `hospedaje` (`id_hospedaje`),
  ADD CONSTRAINT `registro_hospedaje_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `registro_tour`
--
ALTER TABLE `registro_tour`
  ADD CONSTRAINT `registro_tour_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `registro_tour_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id_tour`);

--
-- Filtros para la tabla `registro_transporte`
--
ALTER TABLE `registro_transporte`
  ADD CONSTRAINT `registro_transporte_ibfk_1` FOREIGN KEY (`transporte_id`) REFERENCES `transporte` (`id_transporte`),
  ADD CONSTRAINT `registro_transporte_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `usuario_grupo`
--
ALTER TABLE `usuario_grupo`
  ADD CONSTRAINT `usuario_grupo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_grupo_ibfk_2` FOREIGN KEY (`grupo_id`) REFERENCES `grupo_organizado` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
