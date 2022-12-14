-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-11-2022 a las 03:46:24
-- Versión del servidor: 5.7.36
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
  `id_alimentacion` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_alim` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_alimentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `alimentacion`
--

INSERT INTO `alimentacion` (`id_alimentacion`, `nombre_alim`, `descripcion`, `direccion`, `hora_apertura`, `hora_cierre`, `telefono`, `status`, `imagen`) VALUES
(17, 'Soda la luna', 'Soda frente al mar', 'Al mar', '08:30:00', '20:40:00', '42345432', 1, 'img_6281561f8b1b380c7eb5577e12a67c3f.jpg'),
(18, 'Agua salada', 'Amplio lugar', 'Chira', '22:32:00', '10:37:00', '89742984', 1, 'img_895dd227c9b179b03157da505a0acadc.jpg'),
(19, 'Restaurante flotante', 'Flotante en el mar', 'Isla Venado', '08:00:00', '18:00:00', '55435765', 1, 'img_9b1fd250e547b10e8e3440d0ea211c0a.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

DROP TABLE IF EXISTS `comunidad`;
CREATE TABLE IF NOT EXISTS `comunidad` (
  `id_comunidad` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_com` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `provincia` enum('Puntarenas','Guanacaste') COLLATE utf8mb4_swedish_ci NOT NULL,
  `canton` enum('Nicoya','Santa Cruz','Bagases','Cañas','Manzanillo','Lepanto','Puntarenas','Esparza') COLLATE utf8mb4_swedish_ci NOT NULL,
  `distrito` enum('Puntarenas','San Antonio','Quebrada Honda','Santa Cruz','Bolson','Bagases','Bebedero','Porozal','Manzanillo','Lepanto','Esparza') COLLATE utf8mb4_swedish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_comunidad`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id_comunidad`, `nombre_com`, `descripcion`, `provincia`, `canton`, `distrito`, `imagen`) VALUES
(1, 'Isla Caballo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Puntarenas', 'Puntarenas', 'img_bd88e44a23bdaf66f9423ce72d8c1a58.jpg'),
(24, 'Costa de Pajaros', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Puntarenas', 'Puntarenas', 'Costadepájaros.jpg'),
(30, 'Isla Chira', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Puntarenas', 'Puntarenas', 'IslaChira.jpg'),
(35, 'Isla Venado', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Puntarenas', 'Puntarenas', 'IslaVenado.jpg'),
(38, 'Manzanillo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Manzanillo', 'Manzanillo', 'IMG_3854.JPG'),
(39, 'Coyolito', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis numquam nemo necessitatibus nobis dignissimos beatae sit hic nulla laboriosam, quod ex? Impedit ea iste perspiciatis quia rerum vitae explicabo hic. Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt odit facilis, nesciunt quisquam officiis, enim ea maxime voluptate cum repellat aspernatur. Odio perferendis sint alias magnam neque? Aut, officia est?', 'Puntarenas', 'Manzanillo', 'Manzanillo', 'IMG_3856.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_organizado`
--

DROP TABLE IF EXISTS `grupo_organizado`;
CREATE TABLE IF NOT EXISTS `grupo_organizado` (
  `id_grupo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `representante` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `ubicacion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `numero_integrantes` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `logo` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `comunidad_id` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_grupo`),
  KEY `comunidad_id` (`comunidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `grupo_organizado`
--

INSERT INTO `grupo_organizado` (`id_grupo`, `nombre_grupo`, `representante`, `descripcion`, `ubicacion`, `correo`, `telefono`, `numero_integrantes`, `status`, `logo`, `comunidad_id`) VALUES
(11, 'Asopecupachi', 'sin especificar', 'Asociación de Pescadores Cuerderos de Palito, Isla de Chira', 'Isla Chira, Puntarenas', 'grupo@info.com', '89742984', 1, 1, 'img_11b2dc23e716dd81485138bc9d89b85e.jpg', 30),
(16, 'MUDECOOP', 'sin especificar', 'Cooperativa de Mujeres de Manzanillo en desarrollo con su cooperativa autogestionaria.', '900MTS OESTA DEL SALÓN COMUNAL DE MANZANILLO, PUNTARENAS', 'mudecop@gmail.com', '86095160', 25, 1, 'img_ee15cdd6dc19e38e705ec8864ac68749.jpg', 38),
(24, 'Asociación De Mujeres Unidas de la Montaña Coyolito', 'sin especificar', 'Asociación De Mujeres Unidas de la Montaña Coyolito', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem possimus itaque, dicta, quod odio doloremque illo praesentium odit animi perspiciatis repudiandae iure expedita a deleniti laudantium id voluptatem fugit voluptatum.', 'mujeresunidas@pa.com', '8806794', 20, 1, 'img_5f9659cb14a6d203306c22e0c7f155cf.jpg', 1),
(26, 'Mariposas delGolfo', 'sin especificar', 'Asociación de Mujeres Mariposas del Golfo', '50 este de la licoreca, Provincia de Puntarenas, Puntarenas, Costa Rica', 'caligodelgolfo@gmail.com', '84169920', 22, 1, 'img_1aaf7f100ec2a035591a1661a5380a38.jpg', 24),
(27, 'ASJUSDE', 'sin especificar', 'Asociación Jóvenes Uniendo Esfuerzo para el Desarrollo y la Ecología de Isla Venado', 'Isla Venado', 'grupo@info.com', '0', 1, 1, 'img_369af6438249fac8cb36e343095fbb14.jpg', 35),
(28, 'Asociación para el desarrollo sustentable y su adaptación al cambio climático de Isla Venado', 'sin especificar', 'Asociación para el desarrollo sustentable y su adaptación al cambio climático de Isla Venado', 'Isla Venado', 'grupo@info.com', '0', 1, 1, 'img_d444ae8e92a3fc7f77208020e2ed43f6.jpg', 35),
(29, 'COOPEACUICULTORES RL', 'sin especificar', 'Cooperativa Autogestionaria de servicios de Acuicultura, Pesca Y Turismo R.L.', 'Isla Venado', 'grupo@info.com', '0', 1, 1, 'img_15a7a5d55011b8bdc51b1daa6861e1cb.jpg', 35),
(30, 'Cámara de turismo de Isla Chira', 'sin especificar', 'Cámara de turismo de Isla Chira.', 'Isla de Chira, Puntarenas - Costa Rica', 'camaraturismochira@gmail.com', '83265119', 1, 1, 'img_875439ee7b1c82bc13eb7beee0130b06.jpg', 30),
(31, 'Asociación de Pescadores Mixta de Montero', 'sin especificar', 'Asociación de Pescadores Mixta de Montero', 'Isla Chira', 'grupo@info.com', '0', 1, 1, 'img_9371c080974099c85fb48d2a23ecc187.jpg', 30),
(32, 'Asociación de Mejillones y Mariscos de Isla Chira', 'sin especificar', 'Asociación de Mejillones y Mariscos de Isla Chira', 'Isla Chira', 'grupo@info.com', '0', 1, 1, 'img_440f81a820edb969b4fc8d91057cf5d6.jpg', 30),
(33, 'Ostras Palito', 'sin especificar', 'Asociacion de Pescadores Cuerderos de Palito de Isla Chira', 'Palito de Isla Chira', 'lasostraschira@gmail.com', '0', 1, 1, '305632976_413232640951931_5666490571462378344_n.jpg', 30),
(34, 'Asociación de desarrollo integral de Isla Caballo', 'sin especificar', 'Asociación de desarrollo integral de Isla Caballo', 'Isla Caballo', 'grupo@info.com', '0', 1, 1, 'imageUnavailable.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospedaje`
--

DROP TABLE IF EXISTS `hospedaje`;
CREATE TABLE IF NOT EXISTS `hospedaje` (
  `id_hospedaje` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_hosp` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `tipo` enum('Cabina','Camping') COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_hospedaje`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `hospedaje`
--

INSERT INTO `hospedaje` (`id_hospedaje`, `nombre_hosp`, `descripcion`, `tipo`, `direccion`, `telefono`, `precio`, `status`, `imagen`) VALUES
(7, 'sdsfdfsdf', 'dfdsff', '', 'fsdfsdfsdf', '49284949', '2500.00', 0, 'imageUnavailable.png'),
(9, 'SIRVE', 'kjhf', 'Camping', 'lkmjnhbgvf', '24438433', '90000.00', 0, 'imageUnavailable.png'),
(12, 'Hotel la vida', 'Hotel, cerca del mar', 'Cabina', '100 metros norte', '83484839', '10000.00', 1, 'img_3f59f3080d4ec2745c4f145aa0679d75.jpg'),
(13, 'Camping el sol', 'Amplio espacio para acampar', 'Camping', '100 metros del mar', '34534523', '5000.00', 1, 'img_caaea2d9166dda68b6824b9eaab00cdc.jpg'),
(14, 'Cabinas sol y luna', 'Cabinas equipadas', 'Cabina', 'Frente al mar', '47483883', '40000.00', 1, 'img_72526384ebc8edff67000256e327de5f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `id_modulo` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
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
(10, 'Voluntario', 'Modulo de voluntarios', 1),
(11, 'Contenido', 'Modulo de paginas', 1),
(12, 'Imagenes', 'Modulo de imagenes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ver` int(11) NOT NULL DEFAULT '0',
  `agregar` int(11) NOT NULL DEFAULT '0',
  `actualizar` int(11) NOT NULL DEFAULT '0',
  `eliminar` int(11) NOT NULL DEFAULT '0',
  `rol_id` smallint(5) UNSIGNED NOT NULL,
  `modulo_id` smallint(5) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_permiso`),
  KEY `rol_id` (`rol_id`),
  KEY `modulo_id` (`modulo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=678 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
(474, 1, 1, 1, 1, 1, 1),
(475, 1, 1, 1, 1, 1, 2),
(476, 1, 1, 1, 1, 1, 3),
(477, 1, 1, 1, 1, 1, 4),
(478, 1, 1, 1, 1, 1, 5),
(479, 1, 1, 1, 1, 1, 6),
(480, 1, 1, 1, 1, 1, 7),
(481, 1, 1, 1, 1, 1, 8),
(482, 1, 1, 1, 1, 1, 9),
(483, 1, 1, 1, 1, 1, 10),
(484, 1, 1, 1, 1, 1, 11),
(485, 1, 1, 1, 1, 1, 12),
(546, 1, 0, 0, 0, 24, 1),
(547, 1, 0, 0, 0, 24, 2),
(548, 1, 0, 0, 0, 24, 3),
(549, 1, 0, 0, 0, 24, 4),
(550, 1, 0, 0, 0, 24, 5),
(551, 1, 0, 0, 0, 24, 6),
(552, 1, 0, 0, 0, 24, 7),
(553, 1, 0, 0, 0, 24, 8),
(554, 1, 0, 0, 0, 24, 9),
(555, 1, 0, 0, 0, 24, 10),
(556, 1, 0, 0, 0, 24, 11),
(557, 1, 0, 0, 0, 24, 12),
(558, 1, 1, 1, 0, 23, 1),
(559, 1, 1, 1, 0, 23, 2),
(560, 1, 1, 1, 0, 23, 3),
(561, 1, 1, 1, 0, 23, 4),
(562, 1, 1, 1, 0, 23, 5),
(563, 1, 1, 1, 0, 23, 6),
(564, 1, 1, 1, 0, 23, 7),
(565, 1, 1, 1, 0, 23, 8),
(566, 1, 1, 1, 0, 23, 9),
(567, 1, 1, 1, 0, 23, 10),
(568, 1, 1, 1, 0, 23, 11),
(569, 1, 1, 1, 0, 23, 12),
(570, 1, 1, 1, 1, 25, 1),
(571, 0, 0, 0, 0, 25, 2),
(572, 0, 0, 0, 0, 25, 3),
(573, 0, 0, 0, 0, 25, 4),
(574, 0, 0, 0, 0, 25, 5),
(575, 1, 1, 1, 1, 25, 6),
(576, 1, 1, 1, 1, 25, 7),
(577, 1, 1, 1, 1, 25, 8),
(578, 1, 1, 1, 1, 25, 9),
(579, 0, 0, 0, 0, 25, 10),
(580, 0, 0, 0, 0, 25, 11),
(581, 0, 0, 0, 0, 25, 12),
(582, 1, 1, 1, 1, 19, 1),
(583, 0, 0, 0, 0, 19, 2),
(584, 0, 0, 0, 0, 19, 3),
(585, 1, 1, 1, 1, 19, 4),
(586, 0, 0, 0, 0, 19, 5),
(587, 0, 0, 0, 0, 19, 6),
(588, 0, 0, 0, 0, 19, 7),
(589, 0, 0, 0, 0, 19, 8),
(590, 0, 0, 0, 0, 19, 9),
(591, 0, 0, 0, 0, 19, 10),
(592, 0, 0, 0, 0, 19, 11),
(593, 0, 0, 0, 0, 19, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_alimentacion`
--

DROP TABLE IF EXISTS `registro_alimentacion`;
CREATE TABLE IF NOT EXISTS `registro_alimentacion` (
  `alimentacion_id` smallint(5) UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
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
  `hospedaje_id` smallint(5) UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
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
  `tour_id` smallint(5) UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
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
  `transporte_id` smallint(5) UNSIGNED NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
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
  `id_rol` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Es el rol del super usuario, brinda acceso a todo los modulos', 1),
(9, 'Asopecupachi', 'lorem ipsum', 1),
(19, 'Mariposas Golfo de Nicoya', 'mraio', 1),
(20, 'Coopeacuicultores Isla Venado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 2),
(23, 'Registrador', 'permisos para agregar y actualizar registros', 1),
(24, 'Consultor', 'puede ver todos los registros', 1),
(25, 'Servicios', 'servicios', 1);

--
-- Disparadores `rol`
--
DROP TRIGGER IF EXISTS `sp_delete_permisos_rol`;
DELIMITER $$
CREATE TRIGGER `sp_delete_permisos_rol` BEFORE DELETE ON `rol` FOR EACH ROW BEGIN
    DELETE FROM permisos WHERE rol_id = (SELECT id_rol from rol where id_rol = old.id_rol);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contenido_pagina`
--

DROP TABLE IF EXISTS `tbl_contenido_pagina`;
CREATE TABLE IF NOT EXISTS `tbl_contenido_pagina` (
  `cont_id_contenido` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cont_titulo` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cont_contenido` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `cont_modulo` enum('Grupos Organizados','Comunidades','Alimentacion','Tours','Hospedaje','Transporte','Voluntario','Inicio','CEMEDE') COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`cont_id_contenido`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_contenido_pagina`
--

INSERT INTO `tbl_contenido_pagina` (`cont_id_contenido`, `cont_titulo`, `cont_contenido`, `cont_modulo`) VALUES
(1, '¿Qué actividades se pueden hacer?', 'Donec sit amet dolor at felis cursus feugiat in eget purus. Curabitur suscipit magna erat, a dapibus ipsum pulvinar a. Pellentesque ut lectus ipsum. Praesent aliquet neque lectus, ultrices lacinia dui facilisis sit amet. Phasellus dapibus vel risus vel sollicitudin. Donec ornare purus id nisi iaculis, at vehicula diam viverra. Sed ut ultricies dolor. Integer dictum volutpat sapien. Pellentesque hendrerit feugiat augue nec iaculis.', 'Voluntario'),
(2, 'Que es Paraiso Azul?', 'Es un proyecto extensión de CEMEDE, en conjunto con los estudiantes de la carrera de ingeniería en sistemas de la universidad Nacional de Costa Rica, sede regional chorotega', 'Inicio'),
(3, '¿Que es el voluntariado?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum varius purus et congue. Phasellus neque enim, efficitur ut malesuada ut, pharetra in purus. Vivamus gravida consectetur quam, quis pharetra elit vehicula et. Sed fermentum metus scelerisque pulvinar convallis. Duis malesuada in magna non interdum.', 'Voluntario'),
(4, 'Fases del proyecto', 'Fusce quis rutrum elit. In hendrerit risus ut quam auctor, nec laoreet urna hendrerit. Donec interdum venenatis tortor. In at erat ac sapien scelerisque tempus at sit amet enim. Etiam eget mi sed arcu pellentesque pharetra eget ut velit. Proin scelerisque fringilla fringilla. Morbi gravida velit quis mi luctus porttitor.', 'Inicio'),
(5, 'CEMEDE', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue.', 'CEMEDE'),
(6, 'asddasd', 'asdasdasddsdad', 'Hospedaje'),
(7, 'VISIÓN  DEL CEMEDE', 'En el año 2020 el CEMEDE es una instancia con reconocimiento mesoamericano en la promoción del desarrollo sostenible mediante el establecimiento de relaciones interinstitucionales, generación de espacios de investigación, extensión, docencia y producción que contribuyan al conocimiento y formación especializada como respuesta a las problemática ambiental, económica, social, cultural y política mesoamericana.\r\n', 'CEMEDE'),
(11, '¿Qué actividades se pueden hacer?', 'Donec sit amet dolor at felis cursus feugiat in eget purus. Curabitur suscipit magna erat, a dapibus ipsum pulvinar a. Pellentesque ut lectus ipsum. Praesent aliquet neque lectus, ultrices lacinia dui facilisis sit amet. Phasellus dapibus vel risus vel sollicitudin. Donec ornare purus id nisi iaculis, at vehicula diam viverra. Sed ut ultricies dolor. Integer dictum volutpat sapien. Pellentesque hendrerit feugiat augue nec iaculis.', 'Voluntario'),
(12, 'Que es Paraiso Azul?', 'Es un proyecto extensión de CEMEDE, en conjunto con los estudiantes de la carrera de ingeniería en sistemas de la universidad Nacional de Costa Rica, sede regional chorotega', 'Inicio'),
(14, 'Fases del proyecto', 'Fusce quis rutrum elit. In hendrerit risus ut quam auctor, nec laoreet urna hendrerit. Donec interdum venenatis tortor. In at erat ac sapien scelerisque tempus at sit amet enim. Etiam eget mi sed arcu pellentesque pharetra eget ut velit. Proin scelerisque fringilla fringilla. Morbi gravida velit quis mi luctus porttitor.', 'Inicio'),
(33, '¿Que es el voluntariado?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum varius purus et congue. Phasellus neque enim, efficitur ut malesuada ut, pharetra in purus. Vivamus gravida consectetur quam, quis pharetra elit vehicula et. Sed fermentum metus scelerisque pulvinar convallis. Duis malesuada in magna non interdum.', 'Voluntario'),
(61, 'MISIÓN DEL CEMEDE ', 'Ser una instancia generadora de conocimiento para la puesta en práctica de alternativas que promuevan el mejoramiento integral de la calidad de vida de los habitantes y del ambiente en Mesoamérica y el Caribe.', 'CEMEDE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_galeria`
--

DROP TABLE IF EXISTS `tbl_galeria`;
CREATE TABLE IF NOT EXISTS `tbl_galeria` (
  `gal_id_galeria` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gal_descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `gal_imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `gal_ubicacion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`gal_id_galeria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tbl_galeria`
--

INSERT INTO `tbl_galeria` (`gal_id_galeria`, `gal_descripcion`, `gal_imagen`, `gal_ubicacion`) VALUES
(1, 'Logo de Paraizo Azul', 'imageUnavailable.png', 'pagina principal'),
(2, 'Imagen del product owner del proyecto', 'imageUnavailable.png', 'integrantes'),
(3, 'Imagen de la Isla Chira', 'imageUnavailable.png', 'carrusel'),
(4, 'aaaaaaaaaaaa', 'imageUnavailable.png', 'jhgfd'),
(6, 'vdfgm', 'imageUnavailable.png', 'ddddddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tour`
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE IF NOT EXISTS `tour` (
  `id_tour` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_tour` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `actividad` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `alimentacion` text COLLATE utf8mb4_swedish_ci,
  `hospedaje` text COLLATE utf8mb4_swedish_ci,
  `transporte` text COLLATE utf8mb4_swedish_ci,
  `lugar` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `disponibilidad` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `duracion` time NOT NULL,
  `cupo_minimo` tinyint(4) NOT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_tour`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tour`
--

INSERT INTO `tour` (`id_tour`, `nombre_tour`, `descripcion`, `actividad`, `alimentacion`, `hospedaje`, `transporte`, `lugar`, `disponibilidad`, `hora_inicio`, `duracion`, `cupo_minimo`, `telefono`, `precio`, `status`, `imagen`) VALUES
(14, 'Reforestacion de manglar', 'Sembrar arboles', 'Reforestar', 'Café con pan', 'Camping', '', 'Manglar', 'En la mañana, con la marea baja', '08:00:00', '10:00:00', 10, '39494949', '3000.00', 1, 'img_f4e27568c7053760aa6c899edf481ea3.jpg'),
(15, 'avistamiento de aves', 'Ver aves', 'Ver aves', 'almuerzo', '', '', 'Playa', 'todo el dia', '06:15:00', '08:15:00', 20, '48493933', '10000.00', 1, 'img_caaea2d9166dda68b6824b9eaab00cdc.jpg'),
(16, 'Viaje en panga', 'Ver fauna marina', 'Ver fauna marina', '', '', 'Panga', 'Playa', 'En la mañana', '09:30:00', '11:30:00', 15, '50494933', '5000.00', 1, 'img_95f91008007d355776d21dcfd7a92929.jpg');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tours_activos`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `tours_activos`;
CREATE TABLE IF NOT EXISTS `tours_activos` (
`id_tour` smallint(5) unsigned
,`nombre_tour` varchar(100)
,`descripcion` text
,`actividad` text
,`alimentacion` text
,`hospedaje` text
,`transporte` text
,`lugar` text
,`disponibilidad` text
,`hora_inicio` time
,`duracion` time
,`cupo_minimo` tinyint(4)
,`telefono` varchar(8)
,`precio` decimal(8,2)
,`status` int(11)
,`imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `id_transporte` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_trans` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `clase` enum('Publico','Privado') COLLATE utf8mb4_swedish_ci NOT NULL,
  `tipo` enum('Terrestre','Maritimo') COLLATE utf8mb4_swedish_ci NOT NULL,
  `disponibilidad` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `imagen` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id_transporte`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `nombre_trans`, `descripcion`, `clase`, `tipo`, `disponibilidad`, `precio`, `telefono`, `status`, `imagen`) VALUES
(7, 'Bus', 'Bus público', 'Publico', 'Terrestre', 'Siempre', '1000.00', '765437', 1, 'img_e6856915c511d7f9dc7f0ca456969296.jpg'),
(8, 'Panga agua salada', 'Panga turistica', 'Publico', 'Maritimo', 'Todo el día', '3000.00', '47474747', 1, 'img_a32f2081b11a4ebe6cf3bac4c9e82cfb.jpg'),
(9, 'Taxi', 'Taxis', 'Privado', 'Terrestre', 'Todo el día', '2000.00', '3838383', 1, 'img_f600ddc2bf59a5c262e972d358415317.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `contraseña` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `rol_id` smallint(5) UNSIGNED NOT NULL,
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
(1, 'Sa', 'admin_paraiso_azul@pa.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '7cf40813aa9242aad538-4f5a53943a0b171dfb00-37eedf317106ae60efbc-31ec7154239d5de84', 1, 1),
(5, 'Andres', 'andmejigo12@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', '', 1, 1),
(25, 'Sr AA', 'aaron1314@gmail.com', '91014162f34e902a9c10de1f6c7726af9ec2d8c5d961db39be98d96f75ced71a', NULL, 1, 1),
(26, 'Carlos', 'carlos@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', NULL, 1, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_grupo`
--

DROP TABLE IF EXISTS `usuario_grupo`;
CREATE TABLE IF NOT EXISTS `usuario_grupo` (
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
  `grupo_id` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`usuario_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `grupo_id` (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario_rol`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuario_rol`;
CREATE TABLE IF NOT EXISTS `usuario_rol` (
`id_usuario` smallint(5) unsigned
,`nombre_usuario` varchar(50)
,`correo` varchar(50)
,`id_rol` smallint(5) unsigned
,`nombre_rol` varchar(50)
,`status` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_alimentacion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_alimentacion`;
CREATE TABLE IF NOT EXISTS `view_alimentacion` (
`id_alimentacion` smallint(5) unsigned
,`nombre_alim` varchar(100)
,`descripcion` text
,`direccion` text
,`horario` varchar(22)
,`telefono` varchar(8)
,`imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_contenido_cemede`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_contenido_cemede`;
CREATE TABLE IF NOT EXISTS `view_contenido_cemede` (
`cont_id_contenido` smallint(5) unsigned
,`cont_titulo` varchar(100)
,`cont_contenido` text
,`cont_modulo` enum('Grupos Organizados','Comunidades','Alimentacion','Tours','Hospedaje','Transporte','Voluntario','Inicio','CEMEDE')
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_grupo_organizado_comunidad`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_grupo_organizado_comunidad`;
CREATE TABLE IF NOT EXISTS `view_grupo_organizado_comunidad` (
`id_grupo` tinyint(3) unsigned
,`nombre_grupo` varchar(100)
,`representante` varchar(100)
,`descripcion` text
,`ubicacion` text
,`correo` varchar(50)
,`telefono` varchar(8)
,`numero_integrantes` tinyint(4)
,`logo` varchar(100)
,`nombre_com` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_hospedaje`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_hospedaje`;
CREATE TABLE IF NOT EXISTS `view_hospedaje` (
`id_hospedaje` smallint(5) unsigned
,`nombre_hosp` varchar(100)
,`descripcion` text
,`tipo` enum('Cabina','Camping')
,`direccion` text
,`telefono` varchar(8)
,`precio` varchar(11)
,`imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_tour`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_tour`;
CREATE TABLE IF NOT EXISTS `view_tour` (
`id_tour` smallint(5) unsigned
,`nombre_tour` varchar(100)
,`descripcion` text
,`actividad` text
,`alimentacion` text
,`hospedaje` text
,`transporte` text
,`lugar` text
,`disponibilidad` text
,`hora_inicio` varchar(8)
,`duracion` varchar(12)
,`cupo_minimo` tinyint(4)
,`telefono` varchar(8)
,`precio` varchar(11)
,`imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_transporte`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `view_transporte`;
CREATE TABLE IF NOT EXISTS `view_transporte` (
`id_transporte` smallint(5) unsigned
,`nombre_trans` varchar(100)
,`descripcion` text
,`clase` enum('Publico','Privado')
,`tipo` enum('Terrestre','Maritimo')
,`disponibilidad` text
,`precio` varchar(11)
,`telefono` varchar(8)
,`imagen` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id_voluntario` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_vol` varchar(35) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellido1` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellido2` varchar(40) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cedula` varchar(9) COLLATE utf8mb4_swedish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` varchar(8) COLLATE utf8mb4_swedish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` enum('Masculino','Femenino') COLLATE utf8mb4_swedish_ci NOT NULL,
  `lugar_residencia` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_voluntario`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`id_voluntario`, `nombre_vol`, `apellido1`, `apellido2`, `cedula`, `correo`, `telefono`, `fecha_nacimiento`, `genero`, `lugar_residencia`, `status`) VALUES
(2, 'pepe', 'ape', 'llido', '512312386', 'SADSD@', '12345678', '0000-00-00', 'Masculino', 'AQUI', 1),
(6, 'Sr Aa', 'Villegas', 'Moras', '504323233', 'aaronvimo@gmail.com', '89742984', '2000-10-14', 'Masculino', 'Nambi', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `tours_activos`
--
DROP TABLE IF EXISTS `tours_activos`;

DROP VIEW IF EXISTS `tours_activos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tours_activos`  AS SELECT `tour`.`id_tour` AS `id_tour`, `tour`.`nombre_tour` AS `nombre_tour`, `tour`.`descripcion` AS `descripcion`, `tour`.`actividad` AS `actividad`, `tour`.`alimentacion` AS `alimentacion`, `tour`.`hospedaje` AS `hospedaje`, `tour`.`transporte` AS `transporte`, `tour`.`lugar` AS `lugar`, `tour`.`disponibilidad` AS `disponibilidad`, `tour`.`hora_inicio` AS `hora_inicio`, `tour`.`duracion` AS `duracion`, `tour`.`cupo_minimo` AS `cupo_minimo`, `tour`.`telefono` AS `telefono`, `tour`.`precio` AS `precio`, `tour`.`status` AS `status`, `tour`.`imagen` AS `imagen` FROM `tour` WHERE (`tour`.`status` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario_rol`
--
DROP TABLE IF EXISTS `usuario_rol`;

DROP VIEW IF EXISTS `usuario_rol`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario_rol`  AS SELECT `u`.`id_usuario` AS `id_usuario`, `u`.`nombre_usuario` AS `nombre_usuario`, `u`.`correo` AS `correo`, `r`.`id_rol` AS `id_rol`, `r`.`nombre_rol` AS `nombre_rol`, `u`.`status` AS `status` FROM (`usuario` `u` join `rol` `r` on((`u`.`rol_id` = `r`.`id_rol`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_alimentacion`
--
DROP TABLE IF EXISTS `view_alimentacion`;

DROP VIEW IF EXISTS `view_alimentacion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alimentacion`  AS SELECT `alimentacion`.`id_alimentacion` AS `id_alimentacion`, `alimentacion`.`nombre_alim` AS `nombre_alim`, `alimentacion`.`descripcion` AS `descripcion`, `alimentacion`.`direccion` AS `direccion`, concat(date_format(`alimentacion`.`hora_apertura`,'De %h:%m %p '),date_format(`alimentacion`.`hora_cierre`,'a %h:%m %p')) AS `horario`, `alimentacion`.`telefono` AS `telefono`, `alimentacion`.`imagen` AS `imagen` FROM `alimentacion` WHERE (`alimentacion`.`status` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_contenido_cemede`
--
DROP TABLE IF EXISTS `view_contenido_cemede`;

DROP VIEW IF EXISTS `view_contenido_cemede`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_contenido_cemede`  AS SELECT `tbl_contenido_pagina`.`cont_id_contenido` AS `cont_id_contenido`, `tbl_contenido_pagina`.`cont_titulo` AS `cont_titulo`, `tbl_contenido_pagina`.`cont_contenido` AS `cont_contenido`, `tbl_contenido_pagina`.`cont_modulo` AS `cont_modulo` FROM `tbl_contenido_pagina` WHERE (`tbl_contenido_pagina`.`cont_modulo` = 'CEMEDE') ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_grupo_organizado_comunidad`
--
DROP TABLE IF EXISTS `view_grupo_organizado_comunidad`;

DROP VIEW IF EXISTS `view_grupo_organizado_comunidad`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grupo_organizado_comunidad`  AS SELECT `g`.`id_grupo` AS `id_grupo`, `g`.`nombre_grupo` AS `nombre_grupo`, `g`.`representante` AS `representante`, `g`.`descripcion` AS `descripcion`, `g`.`ubicacion` AS `ubicacion`, `g`.`correo` AS `correo`, `g`.`telefono` AS `telefono`, `g`.`numero_integrantes` AS `numero_integrantes`, `g`.`logo` AS `logo`, `c`.`nombre_com` AS `nombre_com` FROM (`grupo_organizado` `g` join `comunidad` `c` on((`g`.`comunidad_id` = `c`.`id_comunidad`))) WHERE (`g`.`status` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_hospedaje`
--
DROP TABLE IF EXISTS `view_hospedaje`;

DROP VIEW IF EXISTS `view_hospedaje`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hospedaje`  AS SELECT `hospedaje`.`id_hospedaje` AS `id_hospedaje`, `hospedaje`.`nombre_hosp` AS `nombre_hosp`, `hospedaje`.`descripcion` AS `descripcion`, `hospedaje`.`tipo` AS `tipo`, `hospedaje`.`direccion` AS `direccion`, `hospedaje`.`telefono` AS `telefono`, concat('₡',`hospedaje`.`precio`) AS `precio`, `hospedaje`.`imagen` AS `imagen` FROM `hospedaje` WHERE (`hospedaje`.`status` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_tour`
--
DROP TABLE IF EXISTS `view_tour`;

DROP VIEW IF EXISTS `view_tour`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tour`  AS SELECT `tour`.`id_tour` AS `id_tour`, `tour`.`nombre_tour` AS `nombre_tour`, `tour`.`descripcion` AS `descripcion`, `tour`.`actividad` AS `actividad`, `tour`.`alimentacion` AS `alimentacion`, `tour`.`hospedaje` AS `hospedaje`, `tour`.`transporte` AS `transporte`, `tour`.`lugar` AS `lugar`, `tour`.`disponibilidad` AS `disponibilidad`, date_format(`tour`.`hora_inicio`,'%h:%m %p') AS `hora_inicio`, date_format(`tour`.`duracion`,'%h:%m aprox.') AS `duracion`, `tour`.`cupo_minimo` AS `cupo_minimo`, `tour`.`telefono` AS `telefono`, concat('₡',`tour`.`precio`) AS `precio`, `tour`.`imagen` AS `imagen` FROM `tour` WHERE (`tour`.`status` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_transporte`
--
DROP TABLE IF EXISTS `view_transporte`;

DROP VIEW IF EXISTS `view_transporte`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transporte`  AS SELECT `transporte`.`id_transporte` AS `id_transporte`, `transporte`.`nombre_trans` AS `nombre_trans`, `transporte`.`descripcion` AS `descripcion`, `transporte`.`clase` AS `clase`, `transporte`.`tipo` AS `tipo`, `transporte`.`disponibilidad` AS `disponibilidad`, concat('₡',`transporte`.`precio`) AS `precio`, `transporte`.`telefono` AS `telefono`, `transporte`.`imagen` AS `imagen` FROM `transporte` WHERE (`transporte`.`status` = 1) ;

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
