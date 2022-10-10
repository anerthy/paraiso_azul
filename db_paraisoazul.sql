-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-10-2022 a las 00:36:35
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
DROP PROCEDURE IF EXISTS `sp_delete_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_alimentacion` (IN `id` SMALLINT)  BEGIN
	DELETE FROM alimentacion
    WHERE id_alimentacion = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_comunidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_comunidad` (IN `id` SMALLINT)  BEGIN
	DELETE from comunidad 
    where id_comunidad = id; 
END$$

DROP PROCEDURE IF EXISTS `sp_delete_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_grupo` (IN `id` TINYINT UNSIGNED)  BEGIN
	DELETE FROM grupo_organizado 
    WHERE id_grupo = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_hospedaje` (IN `id_hosp` SMALLINT)  BEGIN
	DELETE from hospedaje 
    where id_hospedaje = id_hosp; 
END$$

DROP PROCEDURE IF EXISTS `sp_delete_paquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_paquete` (IN `id` SMALLINT UNSIGNED)  BEGIN
	DELETE FROM paquete_turistico
    WHERE id_paquete = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_rol` (IN `id` SMALLINT UNSIGNED)  BEGIN
	DELETE FROM rol
    WHERE id_rol = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_tour` (IN `id` SMALLINT UNSIGNED)  BEGIN
	DELETE FROM tour 
    WHERE id_tour = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_transporte` (IN `id` SMALLINT)  BEGIN
	DELETE FROM transporte 
    WHERE id_transporte = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_usuario` (IN `id` SMALLINT UNSIGNED)  BEGIN
	DELETE FROM usuario
    WHERE id_usuario = id;
END$$

DROP PROCEDURE IF EXISTS `sp_delete_voluntario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_voluntario` (IN `id` SMALLINT UNSIGNED)  BEGIN
	DELETE FROM voluntario
    where id_voluntario = id;
END$$

DROP PROCEDURE IF EXISTS `sp_insert_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_alimentacion` (IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `direccion` TEXT, IN `hora_apertura` TIME, IN `hora_cierre` TIME, IN `telefono` VARCHAR(8), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
    INSERT INTO alimentacion(nombre_alim,descripcion,direccion,hora_apertura,hora_cierre,telefono,status,imagen)
    VALUES(nombre,descripcion,direccion,hora_apertura,hora_cierre,telefono,status,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_comunidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_comunidad` (IN `nombre` VARCHAR(50), IN `descrip` TEXT, IN `provincia` ENUM('Puntarenas','Guanacaste'), IN `canton` ENUM('Puntarenas','Esparza','Buenos Aires','Montes de Oro','Osa','Quepos','Golfito','Coto Brus','Parrita','Corredores','Garabito','Monteverde','Puerto Jiménez'), IN `distrito` ENUM('Puntarenas','Pitahaya','Chomes','Lepanto','Paquera','Manzanillo','Guacimal','Barranca','Isla del Coco','Cóbano','Chacarita','Chira','Acapulco','El Roble','Arancibia'), IN `imagen` VARCHAR(100))  BEGIN
 INSERT INTO comunidad(nombre_com,descripcion,provincia,canton,distrito,imagen)
    VALUES (nombre,descrip,provincia,canton,distrito,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_grupo` (IN `nombre` VARCHAR(100), IN `representante` VARCHAR(100), IN `descripcion` TEXT, IN `ubicacion` TEXT, IN `correo` VARCHAR(50), IN `telefono` VARCHAR(8), IN `num_int` TINYINT, IN `status` INT, IN `logo` VARCHAR(100), IN `comunidad_id` TINYINT UNSIGNED)  BEGIN
	INSERT INTO grupo_organizado(nombre_grupo,representante,descripcion,ubicacion,correo,telefono,numero_integrantes,status,logo,comunidad_id)
	VALUES(nombre,representante,descripcion,ubicacion,correo,telefono,num_int,status,logo,comunidad_id);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_hospedaje` (IN `nombre_hosp` VARCHAR(100), IN `descripcion` TEXT, IN `tipo` ENUM('Cabina','Camping'), IN `direccion` TEXT, IN `telefono` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
    INSERT INTO hospedaje(nombre_hosp,descripcion,tipo,direccion,telefono,precio,status,imagen) 
    VALUES (nombre_hosp,descripcion,tipo, direccion,telefono,precio,status,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_paquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_paquete` (IN `tipo` ENUM('Alimentacion','Transporte','Hospedaje'), IN `detalles` TEXT, IN `tour_id` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO paquete_turistico (tipo,detalles,tour_id)
	VALUES(tipo,detalles,tour_id);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_reg_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_reg_alimentacion` (IN `alim` SMALLINT UNSIGNED, IN `usuario` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO registro_alimentacion (alimentacion_id,usuario_id) 
    VALUES (alim,usuario);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_reg_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_reg_hospedaje` (IN `hospedaje` SMALLINT UNSIGNED, IN `usuario` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO registro_hospedaje (hospedaje_id,usuario_id)
    VALUES (hospedaje,usuario);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_reg_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_reg_tour` (IN `tour` SMALLINT UNSIGNED, IN `usuario` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO registro_tour (tour_id,usuario_id)
    VALUES (tour,usuario);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_reg_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_reg_transporte` (IN `transporte` SMALLINT UNSIGNED, IN `usuario` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO registro_transporte (transporte_id,usuario_id)
    VALUES (transporte,usuario);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_rol` (IN `nombre` VARCHAR(50), IN `descrip` TEXT, IN `status` INT)  BEGIN
	INSERT INTO rol(nombre_rol,descripcion,status) 
    VALUES (nombre,descrip,status); 
END$$

DROP PROCEDURE IF EXISTS `sp_insert_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_tour` (IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `lugar` TEXT, IN `disponibilidad` TEXT, IN `duracion` TIME, IN `cupo_min` TINYINT, IN `telefono` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	INSERT INTO tour(nombre_tour,descripcion,lugar,disponibilidad,duracion,cupo_minimo,telefono,precio,status,imagen)
	VALUES(nombre,descripcion,lugar,disponibilidad,duracion,cupo_min,telefono,precio,status,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_transporte` (IN `nombre` VARCHAR(100), IN `descrip` TEXT, IN `clase` ENUM('Publico','Privado'), IN `tipo` ENUM('Terrestre','Maritimo'), IN `disp` TEXT, IN `precio` DECIMAL(8,2), IN `telefono` VARCHAR(8), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
INSERT INTO  transporte (nombre_trans ,descripcion,clase,tipo ,disponibilidad,precio,telefono,status,imagen) 
VALUES (nombre,descrip,clase,tipo,disp,precio,telefono,status,imagen);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_usuario` (IN `nombre` VARCHAR(50), IN `correo` VARCHAR(50), IN `contraseña` VARCHAR(100), IN `status` INT, IN `rol` SMALLINT UNSIGNED)  BEGIN
	INSERT INTO usuario(nombre_usuario,correo,contraseña,status,rol_id)
	VALUES(nombre,correo,contraseña,status,rol);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_usuario_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_usuario_grupo` (IN `usuario` SMALLINT, IN `grupo` TINYINT)  BEGIN
	INSERT INTO usuario_grupo (usuario_id, grupo_id) 			VALUES(usuario,grupo);
END$$

DROP PROCEDURE IF EXISTS `sp_insert_voluntario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_voluntario` (IN `nombre` VARCHAR(35), IN `ape1` VARCHAR(40), IN `ape2` VARCHAR(40), IN `cedula` VARCHAR(9), IN `correo` VARCHAR(50), IN `telefono` VARCHAR(8), IN `fecha_nac` DATE, IN `genero` ENUM('Masculino','Feminino'), IN `residencia` TEXT)  BEGIN
	INSERT INTO voluntario(nombre_vol,apellido1,apellido2,cedula,correo,telefono, fecha_nacimiento, genero,lugar_residencia)
	VALUES(nombre,ape1,ape2,cedula,correo,telefono,fecha_nac,genero,residencia);
END$$

DROP PROCEDURE IF EXISTS `sp_select_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_alimentacion` (IN `id` SMALLINT)  BEGIN
	SELECT id_alimentacion,nombre_alim,descripcion,direccion,hora_apertura,hora_cierre,telefono,status,imagen FROM alimentacion 
    WHERE id_alimentacion = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_alimentacion` ()  BEGIN
	SELECT id_alimentacion,nombre_alim,descripcion,direccion,hora_apertura,hora_cierre,telefono,status,imagen FROM alimentacion;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_comunidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_comunidad` ()  BEGIN
    SELECT id_comunidad,nombre_com,descripcion,provincia,canton,distrito,imagen
    from comunidad; 
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_grupo` ()  BEGIN
		SELECT id_grupo,nombre_grupo,representante,descripcion, ubicacion,correo, telefono, numero_integrantes,status, logo,comunidad_id
	FROM grupo_organizado;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_hospedaje` ()  BEGIN
SELECT id_hospedaje,nombre_hosp,descripcion,tipo,direccion,telefono,precio,status,imagen 
from hospedaje;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_paquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_paquete` ()  BEGIN
	SELECT id_paquete,tipo,detalles,tour_id FROM paquete_turistico;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_reg_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_reg_alimentacion` ()  BEGIN
	SELECT alimentacion_id, fecha_creacion, usuario_id 
    FROM registro_alimentacion;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_rol` ()  BEGIN
	SELECT id_rol, nombre_rol, descripcion, status FROM rol;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_tour` ()  BEGIN
	SELECT id_tour,nombre_tour,descripcion,lugar,disponibilidad,duracion,cupo_minimo,telefono,precio,status,imagen 
    FROM tour;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_transporte` ()  BEGIN
	SELECT id_transporte,nombre_trans,descripcion,clase,tipo,disponibilidad,precio,telefono,status,imagen 
  FROM transporte;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_usuario` ()  BEGIN
	SELECT id_usuario,nombre_usuario,correo,contraseña,status,rol_id
	FROM usuario;
END$$

DROP PROCEDURE IF EXISTS `sp_select_all_voluntario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_all_voluntario` ()  BEGIN
	SELECT id_voluntario,nombre_vol,apellido1,apellido2,cedula,correo,telefono,fecha_nacimiento,genero,lugar_residencia
	FROM voluntario;
END$$

DROP PROCEDURE IF EXISTS `sp_select_comunidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_comunidad` (IN `id` SMALLINT)  BEGIN
    SELECT id_comunidad,nombre_com,descripcion,provincia,canton,distrito,imagen
    from comunidad 
    WHERE id_comunidad = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_grupo` (IN `id` TINYINT UNSIGNED)  BEGIN
	SELECT id_grupo,nombre_grupo,representante,descripcion, ubicacion,correo, telefono, numero_integrantes,status, logo,comunidad_id
	FROM grupo_organizado
	WHERE id_grupo = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_hospedaje` (IN `id_hosp` SMALLINT)  BEGIN
    SELECT id_hospedaje,nombre_hosp,descripcion,tipo,direccion,telefono,precio,estado,imagen 
    from hospedaje 
    WHERE id_hospedaje = id_hosp;
END$$

DROP PROCEDURE IF EXISTS `sp_select_paquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_paquete` (IN `id` SMALLINT UNSIGNED)  BEGIN
	SELECT id_paquete,tipo,detalles,tour_id FROM paquete_turistico 
    WHERE id_paquete = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_rol` (IN `id` SMALLINT UNSIGNED)  BEGIN
	SELECT id_rol, nombre_rol, descripcion, status FROM rol 
    WHERE id_rol = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_tour` (IN `id` SMALLINT UNSIGNED)  BEGIN
	SELECT id_tour,nombre_tour,descripcion,lugar,disponibilidad,duracion,cupo_minimo,telefono,precio,status,imagen 
    FROM tour
    where id_tour = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_transporte` (IN `id` SMALLINT)  BEGIN
	SELECT
    id_transporte,nombre_trans,descripcion,clase,tipo,disponibilidad,precio,telefono,status,imagen
	FROM transporte
	WHERE id_transporte = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_usuario` (IN `id` SMALLINT UNSIGNED)  BEGIN
	SELECT id_usuario,nombre_usuario,correo,contraseña,status,rol_id
	FROM usuario
	WHERE id_usuario = id;
END$$

DROP PROCEDURE IF EXISTS `sp_select_voluntario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_voluntario` (IN `id` SMALLINT UNSIGNED)  BEGIN
	SELECT id_voluntario,nombre_vol,apellido1,apellido2,cedula,correo,telefono,fecha_nacimiento,genero,lugar_residencia
	FROM voluntario
	WHERE id_voluntario = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_alimentacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_alimentacion` (IN `id` SMALLINT, IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `hora_apertura` TIME, IN `hora_cierre` TIME, IN `telefono` VARCHAR(8), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	UPDATE alimentacion 
    SET nombre_alim = nombre,
    descripcion = descripcion,
    direccion = direccion,
    hora_apertura = hora_apertura,
    hora_cierre = hora_cierre,
    telefono = telefono,
    status = status,
    imagen = imagen
	WHERE id_alimentacion = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_comunidad`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_comunidad` (IN `id` TINYINT, IN `nombre` VARCHAR(50), IN `descrip` TEXT, IN `provincia` ENUM('Puntarenas','Guanacaste'), IN `canton` ENUM('Puntarenas','Esparza','Buenos Aires','Montes de Oro','Osa','Quepos','Golfito','Coto Brus','Parrita','Corredores','Garabito','Monteverde','Puerto Jiménez'), IN `distrito` ENUM('Puntarenas','Pitahaya','Chomes','Lepanto','Paquera','Manzanillo','Guacimal','Barranca','Isla del Coco','Cóbano','Chacarita','Chira','Acapulco','El Roble','Arancibia'), IN `imagen` VARCHAR(100))  BEGIN
	UPDATE comunidad 
    SET nombre_com = nombre, 
    descripcion = descrip,
    provincia = provincia,
    canton = canton,
    distrito = distrito,
    imagen = imagen
    WHERE id_comunidad = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_grupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_grupo` (IN `id` TINYINT, IN `nombre` VARCHAR(100), IN `representante` VARCHAR(100), IN `direccion` TEXT, IN `ubicacion` TEXT, IN `correo` VARCHAR(50), IN `telefono` VARCHAR(8), IN `num_int` TINYINT, IN `status` INT, IN `logo` VARCHAR(100), IN `comunidad_id` TINYINT UNSIGNED)  BEGIN
	UPDATE grupo_organizado
	SET nombre_grupo = nombre,
    representante = representante,
    descripcion = descripcion,
    ubicacion = ubicacion,
    correo = correo,
    telefono = telefono,
    numero_integrantes = num_int,
    status = status,
    logo = logo,
    comunidad_id = comunidad_id
	WHERE id_grupo = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_hospedaje`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_hospedaje` (IN `id` SMALLINT, IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `tipo` ENUM('Cabaña','Camping'), IN `direccion` TEXT, IN `tel` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	UPDATE hospedaje 
    SET nombre_hosp = nombre, 
    descripcion = descripcion, 
    tipo = tipo, 
    direccion = direccion,
    telefono = tel,
    precio = precio,
    status = status,
    imagen = imagen
    WHERE id_hospedaje = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_paquete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_paquete` (IN `id` SMALLINT UNSIGNED, IN `tipo` ENUM('Alimentacion','Transporte','Hospedaje'), IN `detalles` TEXT, IN `tour_id` SMALLINT UNSIGNED)  BEGIN
	UPDATE paquete_turistico
	SET tipo = tipo,
    detalles = detalles,
    tour_id = tour_id
	WHERE id_paquete = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_rol`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_rol` (IN `id` SMALLINT UNSIGNED, IN `nombre` VARCHAR(50), IN `des` TEXT, IN `status` INT)  BEGIN
	UPDATE rol
	SET nombre_rol = nombre,
    descripcion = des,
    status = status
	WHERE id_rol = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_tour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_tour` (IN `id` SMALLINT UNSIGNED, IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `lugar` TEXT, IN `disponibilidad` TEXT, IN `duracion` TIME, IN `cupo_min` TINYINT, IN `telefono` VARCHAR(8), IN `precio` DECIMAL(8,2), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	UPDATE tour
	SET nombre_tour = nombre,
    descripcion = descripcion,
    lugar = lugar,
    disponibilidad = disponibilidad,
    duracion = duracion,
    cupo_minimo = cupo_min,
    telefono = telefono,
    precio = precio,
    status = status,
    imagen = imagen
	WHERE id_tour = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_transporte`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_transporte` (IN `id` SMALLINT, IN `nombre` VARCHAR(100), IN `descripcion` TEXT, IN `clase` ENUM('Publico','Privado'), IN `tipo` ENUM('Terrestre','Maritimo'), IN `disponibilidad` TEXT, IN `precio` DECIMAL(8,2), IN `telefono` VARCHAR(8), IN `status` INT, IN `imagen` VARCHAR(100))  BEGIN
	UPDATE transporte
	SET nombre_trans = nombre,
    descripcion = descripcion,
    clase = clase,
    tipo = tipo,
    disponibilidad = disponibilidad,
    precio = precio,
    telefono = telefono,
    status = status,
    imagen = imagen
	WHERE id_transporte = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_usuario` (IN `id` SMALLINT UNSIGNED, IN `nombre` VARCHAR(50), IN `correo` VARCHAR(50), IN `contraseña` VARCHAR(100), IN `status` INT, IN `rol` SMALLINT UNSIGNED)  BEGIN
	UPDATE usuario
	SET nombre_usuario = nombre,
    correo = correo,
    contraseña = contraseña,
    status = status,
    rol_id = rol
	WHERE id_usuario = id;
END$$

DROP PROCEDURE IF EXISTS `sp_update_voluntario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_voluntario` (IN `id` SMALLINT, IN `nombre` VARCHAR(35), IN `ape1` VARCHAR(40), IN `ape2` VARCHAR(40), IN `ced` VARCHAR(9), IN `correo` VARCHAR(50), IN `tel` VARCHAR(8), IN `fecha` DATE, IN `gen` ENUM('Masculino','Feminino'), IN `residencia` TEXT)  BEGIN
	UPDATE voluntario
	SET nombre_vol = nombre,
    apellido1 = ape1,
    apellido2 = ape2,
    cedula = ced,
    correo = correo,
    telefono = tel,
    fecha_nacimiento = fecha,
    genero = gen,
    lugar_residencia = residencia
	WHERE id_voluntario = id;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `alimentacion`
--

INSERT INTO `alimentacion` (`id_alimentacion`, `nombre_alim`, `descripcion`, `direccion`, `hora_apertura`, `hora_cierre`, `telefono`, `status`, `imagen`) VALUES
(7, 'Soda la playa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse laoreet, velit sed efficitur tempus, nisl ligula ultricies nisi, et imperdiet velit est vitae ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse laoreet, velit sed efficitur tempus, nisl ligula ultricies nisi, et imperdiet velit est vitae ipsum.', '07:00:00', '20:00:00', '89742984', 1, 'img_def626362da50491744b69cecc501a2b.jpg'),
(8, 'Restaurante', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '13:00:00', '17:00:00', '22004591', 2, 'img_fed4e2a14d47f706cf8406b974c86260.jpg'),
(9, 'HIUHI TETS', 'A', 'F', '23:05:00', '21:03:00', '89742984', 2, 'img_296bfc0586699a0b2c35eb3f66e7df60.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

DROP TABLE IF EXISTS `comunidad`;
CREATE TABLE IF NOT EXISTS `comunidad` (
  `id_comunidad` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_com` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `provincia` enum('Puntarenas','Guanacaste') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `canton` enum('Puntarenas','Esparza','Buenos Aires','Montes de Oro','Osa','Quepos','Golfito','Coto Brus','Parrita','Corredores','Garabito','Monteverde','Puerto Jiménez') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `distrito` enum('Puntarenas','Pitahaya','Chomes','Lepanto','Paquera','Manzanillo','Guacimal','Barranca','Isla del Coco','Cóbano','Chacarita','Chira','Acapulco','El Roble','Arancibia') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_comunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id_comunidad`, `nombre_com`, `descripcion`, `provincia`, `canton`, `distrito`, `imagen`) VALUES
(1, 'Isla Caballo', 'lorem ipsum', 'Guanacaste', 'Montes de Oro', 'Paquera', 'img_a1d92727950d9ea0e9e308828d2449c8.jpg'),
(24, 'Isla Bejuco', 'ASDASDASD', 'Puntarenas', 'Corredores', 'Pitahaya', 'img_e253a0afc3f038cb66ffd42876a00955.jpg'),
(30, 'Chira', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Puntarenas', 'Puntarenas', 'Lepanto', 'img_8d90ee11922419a003463c366f460a1e.jpg');

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
  `status` int NOT NULL DEFAULT '1',
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `comunidad_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `comunidad_id` (`comunidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `grupo_organizado`
--

INSERT INTO `grupo_organizado` (`id_grupo`, `nombre_grupo`, `representante`, `descripcion`, `ubicacion`, `correo`, `telefono`, `numero_integrantes`, `status`, `logo`, `comunidad_id`) VALUES
(11, 'Asopecupachi', 'dsadad', 'ioasasasajsñs', 'DSADADASD', 'dkgwf@gmail.com', '89742984', 20, 1, 'portada_categoria.png', 24),
(13, 'ASA', 'REPRE', 'SSAD', 'SDSD', 'SDASDD', '34324234', 127, 0, 'SADD', 1),
(14, 'Asociación de desarrollo integral de Isla Caballo', 'ddsf', 'ddsfd', 'ddffdsf', 'dkgwf@dddgmail.com', '89742984', 31, 1, 'portada_categoria.png', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`id_hospedaje`, `nombre_hosp`, `descripcion`, `tipo`, `direccion`, `telefono`, `precio`, `status`, `imagen`) VALUES
(1, 'Mariposas', 'Se ofrece habitacion para dos personas', 'Camping', 'Golfo de Nicoya', '98982818', '20000.00', 1, 'eijkdjdk'),
(3, 'Chira House', 'Se ofrece habitacion para dos personas', 'Cabina', 'Golfo de Nicoya', '98982818', '20000.00', 1, 'eijkdjdk'),
(6, 'Hotel la vida', 'jdskjssjdsaaaaaaaaaaaaaaaaaaaaaaadk', 'Cabina', '25m de la plaza', '89320012', '21000.00', 1, 'img_d44bacf25b82aa9de2d70aa8b8c8bf19.jpg'),
(7, 'sdsfdfsdf', 'dfdsff', '', 'fsdfsdfsdf', '49284949', '2500.00', 0, 'img_99113e4e6a9feabef38336f4f0ab6bf0.jpg'),
(9, 'SIRVE', 'kjhf', 'Camping', 'lkmjnhbgvf', '24438433', '90000.00', 0, 'img_703ec07accdeb8eba156715faf6bee80.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Modulo de dashboard', 1),
(2, 'Roles', 'Modulo de roles', 1),
(3, 'Usuarios', 'Modulo de usuarios', 1),
(4, 'Grupos Organizados', 'Modulo de Grupos Organizados', 1),
(5, 'Comunidades', 'Modulo de comunidades', 1),
(6, 'Alimentacion', 'Modulo de Alimentacion', 1),
(7, 'Tours', 'Modulo de tours', 1),
(8, 'Hospedaje', 'Modulo de Hospedaje', 1),
(9, 'Transporte', 'Modulo de Transporte', 1),
(10, 'Paginas', 'Modulo de Paginas', 1),
(11, 'Voluntarios', 'Modulo de Voluntarios', 1),
(12, 'asda', 'dsad', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `ver`, `agregar`, `actualizar`, `eliminar`, `rol_id`, `modulo_id`) VALUES
(89, 1, 1, 1, 1, 20, 1),
(90, 0, 0, 0, 0, 20, 2),
(91, 0, 0, 0, 0, 20, 3),
(92, 0, 0, 0, 0, 20, 4),
(93, 0, 0, 0, 0, 20, 5),
(94, 0, 0, 0, 0, 20, 6),
(95, 0, 0, 0, 0, 20, 7),
(96, 0, 0, 0, 0, 20, 8),
(97, 0, 0, 0, 0, 20, 9),
(98, 0, 0, 0, 0, 20, 10),
(99, 0, 0, 0, 0, 20, 11),
(100, 1, 1, 1, 1, 19, 1),
(101, 0, 1, 0, 0, 19, 2),
(102, 0, 0, 1, 0, 19, 3),
(103, 1, 0, 0, 1, 19, 4),
(104, 0, 1, 0, 0, 19, 5),
(105, 0, 0, 1, 1, 19, 6),
(106, 0, 0, 0, 0, 19, 7),
(107, 0, 0, 0, 0, 19, 8),
(108, 0, 0, 0, 0, 19, 9),
(109, 0, 0, 0, 0, 19, 10),
(110, 0, 0, 0, 0, 19, 11),
(111, 1, 1, 1, 1, 9, 1),
(112, 0, 0, 0, 0, 9, 2),
(113, 0, 0, 0, 0, 9, 3),
(114, 0, 0, 0, 0, 9, 4),
(115, 0, 0, 0, 0, 9, 5),
(116, 0, 0, 0, 0, 9, 6),
(117, 0, 0, 0, 0, 9, 7),
(118, 0, 0, 0, 0, 9, 8),
(119, 0, 0, 0, 0, 9, 9),
(120, 0, 0, 0, 0, 9, 10),
(121, 0, 0, 0, 0, 9, 11),
(155, 1, 0, 0, 0, 24, 1),
(156, 1, 0, 0, 0, 24, 2),
(157, 1, 0, 0, 0, 24, 3),
(158, 1, 0, 0, 0, 24, 4),
(159, 1, 0, 0, 0, 24, 5),
(160, 1, 0, 0, 0, 24, 6),
(161, 1, 0, 0, 0, 24, 7),
(162, 1, 0, 0, 0, 24, 8),
(163, 1, 0, 0, 0, 24, 9),
(164, 1, 0, 0, 0, 24, 10),
(165, 1, 0, 0, 0, 24, 11),
(222, 0, 0, 0, 0, 25, 1),
(223, 0, 0, 0, 0, 25, 2),
(224, 0, 0, 0, 0, 25, 3),
(225, 0, 0, 0, 0, 25, 4),
(226, 0, 0, 0, 0, 25, 5),
(227, 1, 1, 1, 1, 25, 6),
(228, 1, 1, 1, 1, 25, 7),
(229, 1, 1, 1, 1, 25, 8),
(230, 1, 1, 1, 1, 25, 9),
(231, 0, 0, 0, 0, 25, 10),
(232, 0, 0, 0, 0, 25, 11),
(233, 0, 0, 0, 0, 25, 12),
(318, 1, 1, 1, 1, 1, 1),
(319, 1, 1, 1, 1, 1, 2),
(320, 1, 1, 1, 1, 1, 3),
(321, 1, 1, 1, 1, 1, 4),
(322, 1, 1, 1, 1, 1, 5),
(323, 1, 1, 1, 1, 1, 6),
(324, 1, 1, 1, 1, 1, 7),
(325, 1, 1, 1, 1, 1, 8),
(326, 1, 1, 1, 1, 1, 9),
(327, 1, 1, 1, 1, 1, 10),
(328, 1, 1, 1, 1, 1, 11),
(329, 0, 0, 0, 0, 1, 12),
(402, 1, 1, 1, 0, 23, 1),
(403, 1, 1, 1, 0, 23, 2),
(404, 1, 1, 1, 0, 23, 3),
(405, 1, 1, 1, 0, 23, 4),
(406, 1, 1, 1, 0, 23, 5),
(407, 0, 0, 0, 0, 23, 6),
(408, 1, 1, 1, 0, 23, 7),
(409, 1, 1, 1, 0, 23, 8),
(410, 1, 1, 1, 0, 23, 9),
(411, 1, 1, 1, 1, 23, 10),
(412, 1, 1, 1, 0, 23, 11),
(413, 0, 0, 0, 0, 23, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Tiene acceso a todo los modulos', 1),
(9, 'Asopecupachi', 'lorem ipsum', 1),
(19, 'Mariposas Golfo de Nicoya', 'mraio', 1),
(20, 'Coopeacuicultores Isla Venado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 2),
(23, 'registrador', 'el que agrega y edita', 1),
(24, 'Chismoso', 'puede ver todo', 1),
(25, 'servicios', 'servicios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagina`
--

DROP TABLE IF EXISTS `tbl_pagina`;
CREATE TABLE IF NOT EXISTS `tbl_pagina` (
  `pag_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pag_titulo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `pag_contenido` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`pag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_pagina`
--

INSERT INTO `tbl_pagina` (`pag_id`, `pag_titulo`, `pag_contenido`) VALUES
(2, 'Inicio', 'LOREMSJDSHSKD FSKJFSDJKFHSDJKF HSDJFKDSHFJDHFJDSKFHSDJFKHDSJFKHDSJFHDS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE IF NOT EXISTS `tour` (
  `id_tour` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tour` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `servicio` set('Actividad','Alimentacion','Hospedaje','Transporte') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'Actividad',
  `actividad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `alimentacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `hospedaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `transporte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `lugar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `disponibilidad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `duracion` time NOT NULL,
  `cupo_minimo` tinyint NOT NULL,
  `telefono` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `imagen` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_tour`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tour`
--

INSERT INTO `tour` (`id_tour`, `nombre_tour`, `descripcion`, `servicio`, `actividad`, `alimentacion`, `hospedaje`, `transporte`, `lugar`, `disponibilidad`, `hora_inicio`, `duracion`, `cupo_minimo`, `telefono`, `precio`, `status`, `imagen`) VALUES
(1, 'Tour loco', 'sddasd', 'Actividad,Alimentacion,Hospedaje,Transporte', 'Caminata a la montaña', 'Incluye fresquito', 'Habitacion individual', 'Lancha', 'Chira', 'todos los dias', '08:00:00', '01:08:58', 23, '34232414', '12000.00', 1, 'kjnhgbfdtyok,jmnhbgv'),
(2, 'FDSFSDF', 'sddasd', 'Actividad,Alimentacion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus ante vitae nunc fermentum ultricies. Praesent porta arcu eu nibh pharetra sollicitudin eget non erat. Mauris rutrum eget mi sit amet eleifend.', 'saddsdas', NULL, NULL, 'sddasd', 'sdadsdd', '10:00:00', '01:08:58', 23, '34232414', '12000.00', 1, 'kjnhgbfdtyok,jmnhbgv'),
(4, 'ZZZZZ', 'sddasd', 'Actividad,Transporte', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus ante vitae nunc fermentum ultricies. Praesent porta arcu eu nibh pharetra sollicitudin eget non erat. Mauris rutrum eget mi sit amet eleifend.', NULL, NULL, 'sadsdadsad', 'sddasd', 'sdadsdd', '10:00:00', '01:08:58', 23, '34232414', '12000.00', 1, 'kjnhgbfdtyok,jmnhbgv'),
(5, 'ACTU', 'dd', 'Alimentacion,Hospedaje', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus ante vitae nunc fermentum ultricies. Praesent porta arcu eu nibh pharetra sollicitudin eget non erat. Mauris rutrum eget mi sit amet eleifend.', 'asddsd', 'dddsfs', NULL, 'sdd', 'sddad', '10:00:00', '00:50:00', 12, '12345678', '10500.00', 1, 'asdadad'),
(6, 'Tour a playa Albina', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus ante vitae nunc fermentum ultricies. Praesent porta arcu eu nibh pharetra sollicitudin eget non erat. Mauris rutrum eget mi sit amet eleifend.', 'Actividad', 'Reforestacion del manglar', 'Incluye cafe por la tarde', NULL, 'en panga', 'En playa albina', 'De lunes a viernes', '23:39:42', '01:08:58', 10, '34232414', '120000.00', 1, 'iLorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus ante vitae nunc fermentum ultri');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `nombre_trans`, `descripcion`, `clase`, `tipo`, `disponibilidad`, `precio`, `telefono`, `status`, `imagen`) VALUES
(2, 'test', 'dsffsfdfsdf', 'Publico', 'Terrestre', 'ff', '10500.00', '12345678', 0, 'SDASDDAD'),
(3, 'Taxi alfredo', '.hbgf', '', '', 'jhgfd', '2500.00', '89742984', 0, 'img_18b2ab157b9609dcf2025e4e06188867.jpg'),
(4, 'Bus', 'ijdkidjsadadj', 'Publico', 'Terrestre', 'hoy ayer y siempre', '10000.00', '89742984', 2, 'img_2664a10b57c8059bd14e871ff8bf6add.jpg'),
(5, 'Panga Don Lelo', 'FSDJFLSLF', 'Publico', 'Maritimo', 'QWERTYUIOLÑJHG', '2500.00', '24438433', 1, 'img_7b8946c196a2eb013f3e14d35d7b4ccb.jpg'),
(6, 'Taxi alfredo lopez', 'affdfdsdf', 'Publico', 'Terrestre', 'todos los dias', '5000.00', '89742984', 1, 'img_f39a962a6a8b91fccdbf195ecf2a9a72.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `contraseña` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `rol_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre` (`nombre_usuario`),
  UNIQUE KEY `nombre_2` (`nombre_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `rol_id` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `correo`, `contraseña`, `token`, `status`, `rol_id`) VALUES
(1, 'SA', 'admin_paraiso_azul@pa.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '7cf40813aa9242aad538-4f5a53943a0b171dfb00-37eedf317106ae60efbc-31ec7154239d5de84', 1, 1),
(5, 'Andres', 'andmejigo12@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', '', 1, 1),
(25, 'Sr AA', 'aaron1314@gmail.com', '91014162f34e902a9c10de1f6c7726af9ec2d8c5d961db39be98d96f75ced71a', NULL, 1, 1),
(26, 'Carlos', 'carlos@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, 1, 23);

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
  `genero` enum('Masculino','Femenino') CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `lugar_residencia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_voluntario`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`id_voluntario`, `nombre_vol`, `apellido1`, `apellido2`, `cedula`, `correo`, `telefono`, `fecha_nacimiento`, `genero`, `lugar_residencia`, `status`) VALUES
(2, 'pepe', 'ape', 'llido', '512312386', 'SADSD@', '12345678', '0000-00-00', 'Masculino', 'AQUI', 1),
(6, 'Sr Aa', 'Villegas', 'Mora', '504323233', 'aaronvimo@gmail.com', '89742984', '2000-10-14', 'Masculino', 'Nambi', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo_organizado`
--
ALTER TABLE `grupo_organizado`
  ADD CONSTRAINT `grupo_organizado_ibfk_1` FOREIGN KEY (`comunidad_id`) REFERENCES `comunidad` (`id_comunidad`);

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
