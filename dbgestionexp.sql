-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2014 a las 03:56:40
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbgestionexp`
--
CREATE DATABASE IF NOT EXISTS `dbgestionexp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbgestionexp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, NULL),
('director', '5', NULL, NULL),
('op1', '2', NULL, NULL),
('op2', '3', NULL, NULL),
('op2', '6', NULL, NULL),
('op2', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, NULL, NULL, NULL),
('director', 2, 'solo vistas', NULL, NULL),
('op1', 2, 'operador para crear', NULL, NULL),
('op2', 2, 'usuarios con premiso de pase de tramitacion', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `descripcion`, `detalle`) VALUES
(1, 'INGENIERIA', NULL),
(2, 'ESTUDIOS Y PROYECTOS', NULL),
(3, 'ADMINISTRACION FINANCIERA', NULL),
(4, 'DIRECCION', NULL),
(5, 'SECRETARIA', NULL),
(6, 'OBRAS POR ADMINISTRACION', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dep_localidad`
--

CREATE TABLE IF NOT EXISTS `dep_localidad` (
  `id_dep_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_dep_localidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `dep_localidad`
--

INSERT INTO `dep_localidad` (`id_dep_localidad`, `descripcion`) VALUES
(1, 'SAN MIGUEL DE TUCUMAN'),
(2, 'CRUZ ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE IF NOT EXISTS `expedientes` (
  `id_exp` int(11) NOT NULL AUTO_INCREMENT,
  `num_expediente` varchar(18) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_pedido` date NOT NULL,
  `ref_exp` varchar(18) DEFAULT NULL,
  `agregado_exp` varchar(45) DEFAULT NULL,
  `dirigido_a` varchar(30) NOT NULL,
  `causante` varchar(45) NOT NULL,
  `asunto` text NOT NULL,
  `cantidad_folios` int(11) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  `localidades_id_localidad` int(11) NOT NULL,
  `number1` int(5) NOT NULL,
  `number2` int(3) NOT NULL,
  `letra` varchar(3) NOT NULL,
  `importancia` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_exp`),
  KEY `fk_expedientes_usuarios1_idx` (`usuarios_id_usuario`),
  KEY `fk_expedientes_localidades1_idx` (`localidades_id_localidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `expedientes`
--

INSERT INTO `expedientes` (`id_exp`, `num_expediente`, `fecha_inicio`, `fecha_pedido`, `ref_exp`, `agregado_exp`, `dirigido_a`, `causante`, `asunto`, `cantidad_folios`, `usuarios_id_usuario`, `localidades_id_localidad`, `number1`, `number2`, `letra`, `importancia`, `tipo`) VALUES
(28, '1111/211-ABC-2014', '2014-03-10', '0000-00-00', '', '', 'DIRECTOR', 'JUAN ROBBLES', 'SE PIDE CORDON CUNETA EN FLORIDA 1290', 2, 2, 1, 1111, 211, 'ABC', 'BAJA', 'OBRA'),
(29, '8888/333-ABC-2014', '2014-03-10', '0000-00-00', '', '', 'DIRECTOR', 'JUAN ROBLES', 'SE PIDE MODULO HABITACIONAL EN FLORIDA AL 1200', 2, 2, 1, 8888, 333, 'ABC', 'MEDIA', 'OBRA'),
(30, '2222/111-ASS-2014', '2014-03-10', '0000-00-00', '', '', 'DIRECTOR', 'ALBERTO', 'CORDON CUNETA', 2, 2, 1, 2222, 111, 'ASS', 'ALTA', 'OBRA'),
(31, '3080/321-L-2014', '2014-03-10', '0000-00-00', '', '', 'DIRECTOR', 'GUILLERMO', 'SE PIDE CLOACAS E PASAJE FRANCISCO DE AGUIRRE.', 20, 2, 1, 3080, 321, 'L', 'MEDIA', 'OBRA'),
(32, '3333/232-AAA-2014', '2014-03-12', '0000-00-00', '', '', 'DIRECTOR', 'ALERTO GOMEZ', 'SE PIDE MODULO', 3, 2, 2, 3333, 232, 'AAA', 'BAJA', 'OBRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `id_localidad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `dep_localidad_id_dep_localidad` int(11) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  KEY `fk_localidades_dep_localidad1_idx` (`dep_localidad_id_dep_localidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `descripcion`, `dep_localidad_id_dep_localidad`) VALUES
(1, 'SAN MIGUEL DE TUCUMAN', 1),
(2, 'ALDERETES', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_estado`
--

CREATE TABLE IF NOT EXISTS `log_estado` (
  `id_log_estado` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `detalle_estado` varchar(45) NOT NULL,
  `tramitaciones_id_tramite` int(11) NOT NULL,
  `oficinas_id_oficina` int(11) NOT NULL,
  `dias_oficina` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_log_estado`),
  KEY `fk_log_estado_tramitaciones1_idx` (`tramitaciones_id_tramite`),
  KEY `fk_log_estado_oficinas1_idx` (`oficinas_id_oficina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registra el cambio de estado a (Asignado o Aceptado).' AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `log_estado`
--

INSERT INTO `log_estado` (`id_log_estado`, `fecha`, `detalle_estado`, `tramitaciones_id_tramite`, `oficinas_id_oficina`, `dias_oficina`, `hora`) VALUES
(17, '2014-03-10', 'ACEPTADO', 32, 1, 0, '06:47:40'),
(18, '2014-03-10', 'FINALIZADO', 32, 1, 0, '06:48:31'),
(19, '2014-03-10', 'ASIGNADO', 33, 2, 0, '06:48:31'),
(20, '2014-03-10', 'ACEPTADO', 33, 2, 0, '07:08:13'),
(21, '2014-03-10', 'FINALIZADO', 33, 2, 0, '07:12:37'),
(22, '2014-03-10', 'ASIGNADO', 34, 1, 0, '07:12:37'),
(23, '2014-03-10', 'ACEPTADO', 34, 1, 0, '07:13:09'),
(24, '2014-03-10', 'FINALIZADO', 34, 1, 0, '07:15:23'),
(25, '2014-03-10', 'ASIGNADO', 35, 2, 0, '07:15:23'),
(26, '2014-03-10', 'ACEPTADO', 35, 2, 0, '07:15:45'),
(27, '2014-03-10', 'ACEPTADO', 36, 1, 0, '07:27:18'),
(28, '2014-03-10', 'FINALIZADO', 36, 1, 0, '07:28:26'),
(29, '2014-03-10', 'ASIGNADO', 37, 2, 0, '07:28:26'),
(30, '2014-03-10', 'ACEPTADO', 37, 2, 0, '07:38:05'),
(31, '2014-03-10', 'FINALIZADO', 37, 2, 0, '09:02:18'),
(32, '2014-03-10', 'ASIGNADO', 38, 1, 0, '09:02:18'),
(33, '2014-03-10', 'ACEPTADO', 38, 1, 0, '09:05:06'),
(34, '2014-03-10', 'FINALIZADO', 38, 1, 0, '09:05:45'),
(35, '2014-03-10', 'ASIGNADO', 39, 2, 0, '09:05:45'),
(36, '2014-03-10', 'ACEPTADO', 40, 1, 0, '12:58:04'),
(37, '2014-03-10', 'FINALIZADO', 40, 1, 0, '12:59:47'),
(38, '2014-03-10', 'ASIGNADO', 41, 2, 0, '12:59:47'),
(39, '2014-03-10', 'ACEPTADO', 41, 2, 0, '13:00:54'),
(40, '2014-03-10', 'FINALIZADO', 41, 2, 0, '13:02:07'),
(41, '2014-03-10', 'ASIGNADO', 42, 3, 0, '13:02:07'),
(42, '2014-03-10', 'ACEPTADO', 42, 3, 0, '13:07:12'),
(43, '2014-03-10', 'ACEPTADO', 39, 2, 0, '13:28:17'),
(44, '2014-03-10', 'FINALIZADO', 39, 2, 0, '13:29:24'),
(45, '2014-03-10', 'ASIGNADO', 43, 7, 0, '13:29:24'),
(46, '2014-03-10', 'ACEPTADO', 43, 7, 0, '13:30:36'),
(47, '2014-03-10', 'FINALIZADO', 43, 7, 0, '13:31:39'),
(48, '2014-03-10', 'ASIGNADO', 44, 1, 0, '13:31:39'),
(49, '2014-03-10', 'ACEPTADO', 44, 1, 0, '13:32:12'),
(50, '2014-03-10', 'FINALIZADO', 44, 1, 0, '13:33:34'),
(51, '2014-03-10', 'ASIGNADO', 45, 1, 0, '13:33:34'),
(52, '2014-03-10', 'ACEPTADO', 45, 1, 0, '15:12:52'),
(53, '2014-03-10', 'ACEPTADO', 46, 1, 0, '17:51:20'),
(54, '2014-03-10', 'FINALIZADO', 46, 1, 0, '17:53:17'),
(55, '2014-03-10', 'ASIGNADO', 47, 2, 0, '17:53:17'),
(56, '2014-03-10', 'ACEPTADO', 47, 2, 0, '17:55:20'),
(57, '2014-03-10', 'FINALIZADO', 47, 2, 0, '17:57:19'),
(58, '2014-03-10', 'ASIGNADO', 48, 3, 0, '17:57:19'),
(59, '2014-03-10', 'ACEPTADO', 48, 3, 0, '17:58:11'),
(60, '2014-03-10', 'FINALIZADO', 48, 3, 0, '17:59:57'),
(61, '2014-03-10', 'ASIGNADO', 49, 7, 0, '17:59:57'),
(62, '2014-03-10', 'FINALIZADO', 45, 1, 0, '18:05:35'),
(63, '2014-03-10', 'ASIGNADO', 50, 1, 0, '18:05:35'),
(64, '2014-03-12', 'ACEPTADO', 51, 1, 0, '14:03:53'),
(65, '2014-03-12', 'FINALIZADO', 51, 1, 0, '14:08:41'),
(66, '2014-03-12', 'ASIGNADO', 52, 2, 0, '14:08:41'),
(67, '2014-03-12', 'ACEPTADO', 52, 2, 0, '14:14:18'),
(68, '2014-03-12', 'FINALIZADO', 52, 2, 0, '14:18:41'),
(69, '2014-03-12', 'ASIGNADO', 53, 3, 0, '14:18:41'),
(70, '2014-03-12', 'ACEPTADO', 53, 3, 0, '14:21:02'),
(71, '2014-03-12', 'FINALIZADO', 53, 3, 0, '14:23:13'),
(72, '2014-03-12', 'ASIGNADO', 54, 7, 0, '14:23:13'),
(73, '2014-03-13', 'ACEPTADO', 50, 1, 0, '23:57:04'),
(74, '2014-03-14', 'ACEPTADO', 49, 7, 0, '01:07:16'),
(75, '2014-03-14', 'FINALIZADO', 50, 1, 0, '01:44:51'),
(76, '2014-03-14', 'ASIGNADO', 55, 1, 0, '01:44:51'),
(77, '2014-03-14', 'ACEPTADO', 55, 1, 0, '01:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE IF NOT EXISTS `observaciones` (
  `id_observacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_observacion` text,
  `expedientes_id_exp` int(11) NOT NULL,
  `tramitaciones_id_tramite` int(11) NOT NULL,
  `oficinas_id_oficina` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_observacion`),
  KEY `fk_observaciones_expedientes1_idx` (`expedientes_id_exp`),
  KEY `fk_observaciones_tramitaciones1_idx` (`tramitaciones_id_tramite`),
  KEY `fk_observaciones_oficinas1_idx` (`oficinas_id_oficina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observacion`, `detalle_observacion`, `expedientes_id_exp`, `tramitaciones_id_tramite`, `oficinas_id_oficina`, `fecha`) VALUES
(1, 'no se realizo el paso por que se esta esperando presupuesto de proveedores.', 29, 37, 2, '2014-03-10'),
(2, 'se Agregara prespuesto en 2 semanas', 29, 37, 2, '2014-03-10'),
(3, 'espero presuesto', 30, 41, 2, '2014-03-10'),
(4, 'no se puede hacer el informe', 29, 43, 7, '2014-03-10'),
(5, 'faltan proformas de proveedores', 29, 45, 1, '2014-03-10'),
(6, 'no se puede realizar el computo', 29, 45, 1, '2014-03-10'),
(7, 'falta presuepuesto.', 31, 47, 2, '2014-03-10'),
(8, 'esta mal foliado', 31, 47, 2, '2014-03-10'),
(9, 'falto sellos', 31, 48, 3, '2014-03-10'),
(10, 'alta presupuesto', 32, 51, 1, '2014-03-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE IF NOT EXISTS `oficinas` (
  `id_oficina` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `departamentos_id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_oficina`),
  KEY `fk_oficinas_departamentos_idx` (`departamentos_id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`id_oficina`, `descripcion`, `detalle`, `departamentos_id_departamento`) VALUES
(1, 'MESA DE ENTRADAS', NULL, 5),
(2, 'SECRETARIA', NULL, 5),
(3, 'DIRECCION', NULL, 4),
(4, 'TESORERIA', NULL, 3),
(5, 'PERSONAL', NULL, 4),
(6, 'JEFE DE INGENIERIA', NULL, 1),
(7, 'DIVISION DE OBRAS ELECTRICAS', NULL, 1),
(8, 'ADMINISTRACION', 'ADMINISTRACION DEL DEPTO', 6),
(9, 'HERRERIA', NULL, 6),
(10, 'INFORMATICA', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramitaciones`
--

CREATE TABLE IF NOT EXISTS `tramitaciones` (
  `id_tramite` int(11) NOT NULL AUTO_INCREMENT,
  `expedientes_id_exp` int(11) NOT NULL,
  `fecha_tramite` date NOT NULL,
  `observacion` text,
  `cantidad_folios` int(11) DEFAULT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  `oficinas_id_oficina` int(11) NOT NULL,
  `oficina_origen` varchar(45) NOT NULL,
  `estado_tramite` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tramite`),
  KEY `fk_tramitaciones_expedientes1_idx` (`expedientes_id_exp`),
  KEY `fk_tramitaciones_usuarios1_idx` (`usuarios_id_usuario`),
  KEY `fk_tramitaciones_oficinas1_idx` (`oficinas_id_oficina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='en el campo "estado_tramite" tiene como valor(en curso, en reserva, ejecucion, ejecutado, Finalizado, Archivado).\nEl campo "estado"  tiene como valores Asignado/Aceptado/curso.\n' AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `tramitaciones`
--

INSERT INTO `tramitaciones` (`id_tramite`, `expedientes_id_exp`, `fecha_tramite`, `observacion`, `cantidad_folios`, `usuarios_id_usuario`, `oficinas_id_oficina`, `oficina_origen`, `estado_tramite`, `estado`) VALUES
(32, 28, '2014-03-10', 'ingreso a mesa de entrada', 2, 2, 1, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(33, 28, '2014-03-10', 'mandar a secretaria para autorizacion', 4, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(34, 28, '2014-03-10', 'pasar nuevamente a mesa de entradas para foliado', 5, 3, 1, 'SECRETARIA', 'EN CURSO', 'FINALIZADO'),
(35, 28, '2014-03-10', 'pasar a secretaria para agregar firma', 6, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(36, 29, '2014-03-10', 'ingreso a mesa de entrada', 2, 2, 1, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(37, 29, '2014-03-10', 'pasar a secretaria para autorizar', 3, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(38, 29, '2014-03-10', 'Pasar a mesa de entradas nuevamente', 3, 3, 1, 'SECRETARIA', 'ACEPTADO', 'FINALIZADO'),
(39, 29, '2014-03-10', 'pasar a secretaria para reenvio', 3, 2, 2, 'MESA DE ENTRADAS', 'TERMINADO', 'FINALIZADO'),
(40, 30, '2014-03-10', 'ingreso a mesa de entrada', 2, 2, 1, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(41, 30, '2014-03-10', 'pase a secretaria para autorizar', 3, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(42, 30, '2014-03-10', 'pase a direccion para aprobacion', 4, 3, 3, 'SECRETARIA', 'EN CURSO', 'ACEPTADO'),
(43, 29, '2014-03-10', 'pase a division de obras electricas para agregar informe', 4, 3, 7, 'SECRETARIA', 'TERMINADO', 'FINALIZADO'),
(44, 29, '2014-03-10', 'pase a mesa de entrada para darle salida a recursos humanos', 4, 7, 1, 'DIVISION DE OBRAS ELECTRICAS', 'TERMINADO', 'FINALIZADO'),
(45, 29, '2014-03-10', 'mando a recursos humano de la provincia para blabla', 5, 2, 1, 'MESA DE ENTRADAS', 'EXTERNO', 'FINALIZADO'),
(46, 31, '2014-03-10', 'ingreso a mesa de entrada', 20, 2, 1, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(47, 31, '2014-03-10', 'pase a secretaria para obs', 20, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(48, 31, '2014-03-10', 'pase a direccion para apr.', 23, 3, 3, 'SECRETARIA', 'EN CURSO', 'FINALIZADO'),
(49, 31, '2014-03-10', 'graciela prioridad a blalabal', 30, 5, 7, 'DIRECCION', 'EN CURSO', 'ACEPTADO'),
(50, 29, '2014-03-10', 'se manda a recursos humanos para apr', 5, 2, 1, 'MESA DE ENTRADAS', 'EXTERNO', 'FINALIZADO'),
(51, 32, '2014-03-12', 'ingreso a mesa de entrada', 3, 2, 1, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(52, 32, '2014-03-12', 'pase a secretaria para autorizacion', 4, 2, 2, 'MESA DE ENTRADAS', 'EN CURSO', 'FINALIZADO'),
(53, 32, '2014-03-12', 'pase a dirección para su consideracion', 4, 3, 3, 'SECRETARIA', 'EN CURSO', 'FINALIZADO'),
(54, 32, '2014-03-12', 'pase nuevamente a ingenieria para presupuestar', 5, 5, 7, 'DIRECCION', 'EN CURSO', 'ASIGNADO'),
(55, 29, '2014-03-14', 'se manda a recursos humanos para apr', 5, 2, 1, 'MESA DE ENTRADAS', 'EXTERNO', 'ACEPTADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `mail` varchar(70) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `oficinas_id_oficina` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_oficinas1_idx` (`oficinas_id_oficina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `mail`, `username`, `password`, `created_at`, `last_login`, `oficinas_id_oficina`) VALUES
(1, 'GASTON', 'PUERTAS', 'PUERTASGASTON@GMAIL.COM', 'admin', '4321', NULL, NULL, 10),
(2, 'jose', 'jose', 'josesd@gmail.com', 'jose', '1', NULL, '2014-03-25 02:45:22', 1),
(3, 'diego', 'diego', 'diegosd@gmail.com', 'diego', '1', NULL, '2014-03-12 13:09:51', 2),
(4, 'cristian', 'fernandez', 'cfernandez@gmail.com', 'cristian', '1', NULL, NULL, 3),
(5, 'juan', 'juan', 'juanlp@gmail.com', 'juan', '1', NULL, '2014-03-13 22:59:31', 3),
(6, 'graciela', 'graciela', 'gracielasd@gmail.com', 'graciela', '1', NULL, NULL, 6),
(7, 'oscar', 'oscar', 'oscarsd@gmail.com', 'oscar', '1', NULL, '2014-03-14 00:06:22', 7);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `fk_expedientes_localidades1` FOREIGN KEY (`localidades_id_localidad`) REFERENCES `localidades` (`id_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expedientes_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `fk_localidades_dep_localidad1` FOREIGN KEY (`dep_localidad_id_dep_localidad`) REFERENCES `dep_localidad` (`id_dep_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_estado`
--
ALTER TABLE `log_estado`
  ADD CONSTRAINT `fk_log_estado_oficinas1` FOREIGN KEY (`oficinas_id_oficina`) REFERENCES `oficinas` (`id_oficina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_estado_tramitaciones1` FOREIGN KEY (`tramitaciones_id_tramite`) REFERENCES `tramitaciones` (`id_tramite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `fk_observaciones_expedientes1` FOREIGN KEY (`expedientes_id_exp`) REFERENCES `expedientes` (`id_exp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_observaciones_oficinas1` FOREIGN KEY (`oficinas_id_oficina`) REFERENCES `oficinas` (`id_oficina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_observaciones_tramitaciones1` FOREIGN KEY (`tramitaciones_id_tramite`) REFERENCES `tramitaciones` (`id_tramite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD CONSTRAINT `fk_oficinas_departamentos` FOREIGN KEY (`departamentos_id_departamento`) REFERENCES `departamentos` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tramitaciones`
--
ALTER TABLE `tramitaciones`
  ADD CONSTRAINT `fk_tramitaciones_expedientes1` FOREIGN KEY (`expedientes_id_exp`) REFERENCES `expedientes` (`id_exp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitaciones_oficinas1` FOREIGN KEY (`oficinas_id_oficina`) REFERENCES `oficinas` (`id_oficina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tramitaciones_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_oficinas1` FOREIGN KEY (`oficinas_id_oficina`) REFERENCES `oficinas` (`id_oficina`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
