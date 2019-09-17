# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : veaser


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `veaser`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `veaser`;

#
# Structure for the `categorias` table : 
#

CREATE TABLE `categorias` (
  `idcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombrecat` varchar(255) NOT NULL,
  `fecha_cat` datetime NOT NULL,
  `estado_categoria` varchar(25) NOT NULL DEFAULT 'active',
  `imagen` varchar(25) NOT NULL DEFAULT 'default.jpg',
  `vistas` int(11) NOT NULL DEFAULT '0',
  `tipo` varchar(10) NOT NULL DEFAULT 'categoria',
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `ci_session` table : 
#

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `cliente` table : 
#

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `tipocliente_id` int(11) DEFAULT NULL,
  `categoriaclie_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente_codigo` varchar(20) DEFAULT NULL,
  `cliente_nombre` varchar(150) DEFAULT NULL,
  `cliente_ci` varchar(50) DEFAULT NULL,
  `cliente_direccion` varchar(250) DEFAULT NULL,
  `cliente_telefono` varchar(50) DEFAULT NULL,
  `cliente_celular` varchar(50) DEFAULT NULL,
  `cliente_foto` varchar(250) DEFAULT NULL,
  `cliente_email` varchar(50) DEFAULT NULL,
  `cliente_nombrenegocio` varchar(250) DEFAULT NULL,
  `cliente_aniversario` date DEFAULT NULL,
  `cliente_latitud` varchar(50) DEFAULT NULL,
  `cliente_longitud` varchar(50) DEFAULT NULL,
  `cliente_nit` bigint(20) DEFAULT NULL,
  `cliente_razon` varchar(150) DEFAULT NULL,
  `cliente_departamento` varchar(50) DEFAULT NULL,
  `zona_id` int(11) DEFAULT NULL,
  `lun` tinyint(1) DEFAULT NULL,
  `mar` tinyint(1) DEFAULT NULL,
  `mie` tinyint(1) DEFAULT NULL,
  `jue` tinyint(1) DEFAULT NULL,
  `vie` tinyint(1) DEFAULT NULL,
  `sab` tinyint(1) DEFAULT NULL,
  `dom` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `empresa` table : 
#

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `dosificacion_id` int(11) DEFAULT NULL,
  `empresa_nombre` varchar(150) DEFAULT NULL,
  `empresa_eslogan` varchar(250) DEFAULT NULL,
  `empresa_direccion` varchar(250) DEFAULT NULL,
  `empresa_telefono` varchar(150) DEFAULT NULL,
  `empresa_imagen` varchar(250) DEFAULT NULL,
  `empresa_zona` varchar(150) DEFAULT NULL,
  `empresa_ubicacion` varchar(150) DEFAULT NULL,
  `empresa_departamento` varchar(50) DEFAULT NULL,
  `empresa_propietario` varchar(150) DEFAULT NULL,
  `empresa_codigo` varchar(20) DEFAULT NULL,
  `empresa_email` varchar(50) DEFAULT NULL,
  `empresa_profesion` varchar(150) DEFAULT NULL,
  `empresa_cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `licencia` table : 
#

CREATE TABLE `licencia` (
  `licencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `licencia_fechaactivacion` date DEFAULT NULL,
  `licencia_fechalimite` date DEFAULT NULL,
  `licencia_llave` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`licencia_id`),
  UNIQUE KEY `licencia_id` (`licencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `rol` table : 
#

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `rol_nombre` varchar(150) DEFAULT NULL,
  `rol_descripcion` varchar(250) DEFAULT NULL,
  `rol_idfk` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `rol_usuario` table : 
#

CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `rolusuario_asignado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_usuario` table : 
#

CREATE TABLE `tipo_usuario` (
  `tipousuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`tipousuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `tipousuario_id` int(11) DEFAULT NULL,
  `usuario_nombre` varchar(150) DEFAULT NULL,
  `usuario_email` varchar(250) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` varchar(50) DEFAULT NULL,
  `usuario_imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;