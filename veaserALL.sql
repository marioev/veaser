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

DROP DATABASE IF EXISTS `veaser`;

CREATE DATABASE `veaser`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `veaser`;

#
# Structure for the `categoria` table : 
#

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL DEFAULT '1',
  `categoria_nombre` varchar(255) NOT NULL,
  `categoria_imagen` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `categoria_vistas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Structure for the `ci_session` table : 
#

DROP TABLE IF EXISTS `ci_session`;

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

DROP TABLE IF EXISTS `cliente`;

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

DROP TABLE IF EXISTS `empresa`;

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

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `licencia` table : 
#

DROP TABLE IF EXISTS `licencia`;

CREATE TABLE `licencia` (
  `licencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `licencia_fechaactivacion` date DEFAULT NULL,
  `licencia_fechalimite` date DEFAULT NULL,
  `licencia_llave` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`licencia_id`),
  UNIQUE KEY `licencia_id` (`licencia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `moneda` table : 
#

DROP TABLE IF EXISTS `moneda`;

CREATE TABLE `moneda` (
  `moneda_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `moneda_descripcion` varchar(50) DEFAULT NULL,
  `moneda_tc` float DEFAULT NULL,
  PRIMARY KEY (`moneda_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `producto` table : 
#

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  `producto_codigo` varchar(50) DEFAULT NULL,
  `producto_codigobarra` varchar(50) DEFAULT NULL,
  `producto_foto` varchar(250) DEFAULT NULL,
  `producto_nombre` varchar(250) DEFAULT NULL,
  `producto_unidad` varchar(50) DEFAULT NULL,
  `producto_marca` varchar(50) DEFAULT NULL,
  `producto_industria` varchar(150) DEFAULT NULL,
  `producto_costo` float DEFAULT NULL,
  `producto_precio` float DEFAULT NULL,
  `producto_comision` float DEFAULT NULL,
  `producto_caracteristicas` text,
  `producto_fechahora` datetime DEFAULT NULL,
  `producto_latitud` int(11) DEFAULT NULL,
  `producto_longitud` int(11) DEFAULT NULL,
  PRIMARY KEY (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

#
# Structure for the `rol` table : 
#

DROP TABLE IF EXISTS `rol`;

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

DROP TABLE IF EXISTS `rol_usuario`;

CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `rolusuario_asignado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `slide` table : 
#

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `slide_titulo` varchar(250) DEFAULT NULL,
  `slide_leyenda1` varchar(250) DEFAULT NULL,
  `slide_leyenda2` varchar(250) DEFAULT NULL,
  `slide_enlace` varchar(250) DEFAULT NULL,
  `slide_imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_usuario` table : 
#

DROP TABLE IF EXISTS `tipo_usuario`;

CREATE TABLE `tipo_usuario` (
  `tipousuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`tipousuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

DROP TABLE IF EXISTS `usuario`;

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

#
# Data for the `categoria` table  (LIMIT 0,500)
#

INSERT INTO `categoria` (`categoria_id`, `estado_id`, `categoria_nombre`, `categoria_imagen`, `categoria_vistas`) VALUES 
  (1,1,'AUTOMOVILES MODIF','1568752550.png',0),
  (2,1,'aviones','1568748313.png',0),
  (3,1,'LLANTAS','',0),
  (4,1,'COPOAZU','1568752587.png',0);
COMMIT;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) VALUES 
  (1,'ACTIVO',1,'#6CC841'),
  (2,'INACTIVO',1,'RED');
COMMIT;

#
# Data for the `moneda` table  (LIMIT 0,500)
#

INSERT INTO `moneda` (`moneda_id`, `estado_id`, `moneda_descripcion`, `moneda_tc`) VALUES 
  (1,1,'Bs',1),
  (2,1,'USD',6.96);
COMMIT;

#
# Data for the `producto` table  (LIMIT 0,500)
#

INSERT INTO `producto` (`producto_id`, `estado_id`, `categoria_id`, `moneda_id`, `producto_codigo`, `producto_codigobarra`, `producto_foto`, `producto_nombre`, `producto_unidad`, `producto_marca`, `producto_industria`, `producto_costo`, `producto_precio`, `producto_comision`, `producto_caracteristicas`, `producto_fechahora`, `producto_latitud`, `producto_longitud`) VALUES 
  (1,1,1,1,'7506339359930','7506339359930','foto.jpg','ACE LIMON 900 GRS','UNIDAD','ACE','ANTIGUA Y BARBUDA',11.5,18,0,NULL,NULL,NULL,NULL),
  (2,1,1,1,'7772622170203','7772622170203','foto.jpg','OMO LIMON 900 GRS','UNIDAD','OMO','BOLIVIA',15.6667,19,0,NULL,NULL,NULL,NULL),
  (3,1,1,1,'7779970670300','7779970670300','foto.jpg','SURF FRAGANCIAS MAGICAS 900 GRS LILA','UNIDAD','SURF','BOLIVIA',10.1,13,0,NULL,NULL,NULL,NULL),
  (4,1,1,1,'7779970670386','7779970670386','foto.jpg','OMO FLORAL PODER ACEL 2.3 KG.','UNIDAD','OMO','BOLIVIA',33.3,39.5,0,NULL,NULL,NULL,NULL),
  (5,1,1,1,'7779970670324','7779970670324','foto.jpg','OMO LIMON 180 GRS','UNIDAD','OMO','BOLIVIA',2.95016,3.8,0,NULL,NULL,NULL,NULL),
  (6,1,1,1,'7779970670362','7779970670362','foto.jpg','OMO FLORAL ROJO DE 180 GRS','UNIDAD','OMO','BOLIVIA',2.955,3.8,0,NULL,NULL,NULL,NULL),
  (7,1,1,1,'7779970670249','7779970670249','foto.jpg','SURF LIMON 870G VERDE','UNIDAD','SURF','BOLIVIA',10.1,13,0,NULL,NULL,NULL,NULL),
  (8,1,1,1,'7772905002986','7772905002986','foto.jpg','AGUA PURA VIDA 2L','UNIDAD','OLA','BOLIVIA',3.95,5,0,NULL,NULL,NULL,NULL),
  (9,1,1,1,'7775005005895','7775005005895','foto.jpg','LUSTRA MUEBLES ARCHER 860 ML CON SILICONA','UNIDAD','ARCHER','BOLIVIA',19.27,24.5,0,NULL,NULL,NULL,NULL),
  (10,1,1,1,'7775000002509','7775000002509','foto.jpg','ANTISARRO OLA 550 ML MAXIMUS','UNIDAD','OLA','BOLIVIA',14.01,17.5,0,NULL,NULL,NULL,NULL),
  (11,1,1,1,'7775000006224','7775000006224','foto.jpg','ANTIGRASA OLA 890 ML MAXIMUS','UNIDAD','OLA','BOLIVIA',12.99,18.5,0,NULL,NULL,NULL,NULL),
  (12,1,1,1,'7751851003599','7751851003599','foto.jpg','LAVA VAJILLA  SAPOLIO EN GEL 1000 GRS LIMON','UNIDAD','SAPOLIO','PERU',11.5666,15,0,NULL,NULL,NULL,NULL),
  (13,1,1,1,'7775000009126','7775000009126','foto.jpg','OLA DETERG FLORAL 870G','UNIDAD','OLA','BOLIVIA',12.768,16,0,NULL,NULL,NULL,NULL),
  (14,1,1,1,'7775000011860','7775000011860','foto.jpg','SUAVIZANTE DE ROPA OLA  950 ML BRISA CELESTIAL','UNIDAD','OLA','BOLIVIA',12.48,16,0,NULL,NULL,NULL,NULL),
  (15,1,1,1,'7775000011907','7775000011907','foto.jpg','SUAVIZANTE DE ROPA OLA 1.8L BRISA CELES','UNIDAD','OLA','BOLIVIA',23.04,29,0,NULL,NULL,NULL,NULL),
  (16,1,1,1,'7751493001281','7751493001281','foto.jpg','PAPEL TOALLA MULTIUSO SCOTT','UNIDAD','SCOTT','PERU',6.04,8,0,NULL,NULL,NULL,NULL),
  (17,1,1,1,'7791130683821','7791130683821','foto.jpg','PROCENEX BEBE 1800 ML','UNIDA','PROCENEX','ARGENTINA',15,19,0,NULL,NULL,NULL,NULL),
  (18,1,1,1,'77738035','77738035','foto.jpg','CIGARRILLOS DERBY SUAVE 20 UNID','PIEZA','DERBY','BOLIVIA',7.8,10,0,NULL,NULL,NULL,NULL),
  (19,1,2,1,'7775000008006','7775000008006','foto.jpg','LAVANDINA OLA CLORITO 250 ML POTE','UNIDAD','OLA','BOLIVIA',2.42135,3.5,0,NULL,NULL,NULL,NULL),
  (20,1,2,1,'7792389001619','7792389001619','foto.jpg','LAVANDINA X.5 SACHET 250 CM3','UNIDAD','X.5','ARGENTINA',1.8333,3,0,NULL,NULL,NULL,NULL),
  (21,1,2,1,'7750243048545','7750243048545','foto.jpg','JABON BOLIVAR 260 GRS BEBE','UNIDAD','BOLIVAR','PERU',3.23,4.5,0,NULL,NULL,NULL,NULL),
  (22,1,2,1,'7773103000521','7773103000521','foto.jpg','JABON UNO 220 GRS CELESTE','UNIDAD','UNO','BOLIVIA',2.64,4,0,NULL,NULL,NULL,NULL),
  (23,1,2,1,'7792389000322','7792389000322','foto.jpg','LAVANDINA X5 DE 1 LITRO','UNIDAD','X.5','ARGENTINA',6.89482,10,0,NULL,NULL,NULL,NULL),
  (24,1,2,1,'7246093211678','7246093211678','foto.jpg','MANI JAPONES ESTILO 200 GR','UNIDAD','NACIONAL','BOLIVIA',7,10,0,NULL,NULL,NULL,NULL),
  (25,1,2,1,'4791024030147','4791024030147','foto.jpg','TE CRUSADER CON CANELA X 100','UNIDAD','SIEMPRE LIBRE','ARGENTINA',24.4444,31,0,NULL,NULL,NULL,NULL),
  (26,1,2,1,'7702027040252','7702027040252','foto.jpg','TH NOSOTRAS BUENAS NOCHES 10 UNID VERDE/LILA','UNIDAD','NOSOTRAS','COLOMBIA',11.2,15,0,NULL,NULL,NULL,NULL),
  (27,1,2,1,'4005808806874','4005808806874','foto.jpg','JABONCILLO NIVEA AVENA 3X90G','UNIDAD','NIVEA','ARGENTINA',9.96,15,0,NULL,NULL,NULL,NULL),
  (28,1,2,1,'4005808177516','4005808177516','foto.jpg','JABONCILLO NIVEA ALOE VERA & FLORES 90 GRS ROSADO','UNIDAD','NIVEA','ARGENTINA',3.6,5,0,NULL,NULL,NULL,NULL),
  (29,1,2,1,'4005808806430','4005808806430','foto.jpg','JABONCILLO NIVEA PROTEINA DE LECHE 90 GRS CELESTE','UNIDAD','NIVEA','ARGENTINA',3.6,5,0,NULL,NULL,NULL,NULL),
  (30,1,2,1,'7896512909787','7896512909787','foto.jpg','JABONCILLO PHEBO ODOR DE ROSAS 90 GRS AMARILLO ROJO','UNIDAD','PHEBO','BRASIL',6.25,9,0,NULL,NULL,NULL,NULL),
  (31,1,2,1,'7898422746759','7898422746759','foto.jpg','JABONCILLO DOVE BEAUTY CREAM BAR 90 GRS BLANCO AZUL','UNIDAD','DOVE','BRASIL',3.91,6.5,0,NULL,NULL,NULL,NULL),
  (32,1,2,1,'7770105308365','7770105308365','foto.jpg','LORITO CERA LIQUIDA VERDE 500 ML','UNIDAD','LORITO','BOLIVIA',19.1315,25,0,NULL,NULL,NULL,NULL),
  (33,1,2,1,'7891010560737','7891010560737','foto.jpg','COTONETES JOHNSON 75 UNID','UNIDAD','JOHNSON','BRASIL',7.48,11.5,0,NULL,NULL,NULL,NULL),
  (34,1,2,1,'7891010560812','7891010560812','foto.jpg','COTONETES JOHNSON 150 UNID','UNIDAD','JOHNSON','BRASIL',13.69,23,0,NULL,NULL,NULL,NULL),
  (35,1,2,1,'7891024132005','7891024132005','foto.jpg','COLGATE TRIPLE ACCION MENTA 90 GRS AZUL','UNIDAD','COLGATE','BRASIL',4.66,7,0,NULL,NULL,NULL,NULL),
  (36,1,2,1,'7891024132906','7891024132906','foto.jpg','COLGATE MAXIMA PROTECCION 50 GRS','UNIDAD','COLGATE','BRASIL',3.1944,4.5,0,NULL,NULL,NULL,NULL),
  (37,1,2,1,'90388003755','90388003755','foto.jpg','ATUN REAL GRATED AL AGUA','UNIDAD','PEPSODENT','BRASIL',6.48,9,0,NULL,NULL,NULL,NULL),
  (38,1,2,1,'7840784000239','7840784000239','foto.jpg','BAYGON MATA MOSCAS Y MOSQ 360 AZUL',NULL,'BAYGON','BRASIL',13.5317,18,0,NULL,NULL,NULL,NULL),
  (39,1,2,1,'7751851006613','7751851006613','foto.jpg','INSECTICIDA SAPOLIO MATA CUCARACHAS 360 ML ROJO','UNIDAD','SAPOLIO','PERU',14.6,18,0,NULL,NULL,NULL,NULL),
  (40,1,2,1,'7506306237995','7506306237995','foto.jpg','SH SEDAL NEGROS LUMINOSOS 350 ML NEGRO','UNIDAD','SEDAL','ARGENTINA',12.47,17,0,NULL,NULL,NULL,NULL),
  (41,1,3,1,'7891150019430','7891150019430','foto.jpg','DOVE ACOND CAIDA 400ML','UNIDAD','DOVE','BRASIL',25.38,32,0,NULL,NULL,NULL,NULL),
  (42,1,3,1,'7751851006620','7751851006620','foto.jpg','INSECTICIDA SAPOLIO MATA MOSCAS Y SANCUDO 360 ML AZUL','UNIDAD','SAPOLIO','PERU',14.6,18,0,NULL,NULL,NULL,NULL),
  (43,1,3,1,'7774904282024','7774904282024','foto.jpg','GEL FIXER EFECTO HUMEDO 200 GRS AZUL','UNIDAD','FIXER','BOLIVIA',8.32,10.5,0,NULL,NULL,NULL,NULL),
  (44,1,3,1,'7774904280013','7774904280013','foto.jpg','GEL FIXER SUPER EXTRA 500 GRS BLAN','UNIDAD','FIXER','BOLIVIA',16.91,21,0,NULL,NULL,NULL,NULL),
  (45,1,3,1,'7775005007417','7775005007417','foto.jpg','CERA EN CREMA ARCHER 500 CC AMARILLO SACHET','UNIDAD','ARCHER','BOLIVIA',10.9695,14,0,NULL,NULL,NULL,NULL),
  (46,1,3,1,'7775000003407','7775000003407','foto.jpg','CERA EN CREMA OLA BRILLANTE 400 GRS BLANCO SACHET','UNIDAD','OLA','BOLIVIA',10.368,13.5,0,NULL,NULL,NULL,NULL),
  (47,1,3,1,'7775005007424','7775005007424','foto.jpg','CERA EN CREMA ARCHER 500 CC ROJO SACHET','UNIDAD','ARCHER','BOLIVIA',10.81,14,0,NULL,NULL,NULL,NULL),
  (48,1,3,1,'7774900002527','7774900002527','foto.jpg','WELLAPON SH GERMEN DE TRIGO Y MIEL 420 ML CAFE','UNIDAD','WELLAPON','BOLIVIA',17.5,22.5,0,NULL,NULL,NULL,NULL),
  (49,1,3,1,'7774900001902','7774900001902','foto.jpg','CHAMPU WELLAPON FLORES DE NARANJO Y PROTEINAS 620 ML CABELLO GRASO NARANJA','UNIDAD','WELLAPON','BOLIVIA',23,29,0,NULL,NULL,NULL,NULL),
  (50,1,3,1,'7774900001674','7774900001674','foto.jpg','CHAMPU WELLAPON MANZANILLA Y MIEL 620 ML','UNIDAD','WELLAPON','BOLIVIA',23,29,0,NULL,NULL,NULL,NULL),
  (51,1,3,1,'-','-','foto.jpg','QUEQUE DE NARANJA  SIN MARCA','UNIDAD','PLUSBELLE','ARGENTINA',16,19,0,NULL,NULL,NULL,NULL),
  (52,1,3,1,'7791293030937','7791293030937','foto.jpg','AC SEDAL CERAMIDAS 340ML','UNIDAD','PLUSBELLE','ARGENTINA',12.47,17,0,NULL,NULL,NULL,NULL),
  (53,1,3,1,'7891010032241','7891010032241','foto.jpg','TALCO JOHNSONS BABY 200 GRS BLANCO NORMAL','UNIDAD','JOHNSONS','BRASIL',16.7086,23,0,NULL,NULL,NULL,NULL),
  (54,1,3,1,'7506195155394','7506195155394','foto.jpg','ACOND HERBAL ALBOROTALOS','UNIDAD','DOVE','BRASIL',19.2,23.6,0,NULL,NULL,NULL,NULL),
  (55,1,3,1,'7791293004976','7791293004976','foto.jpg','ACOND DOVE COMPLETA 400ML','UNIDAD','DOVE','BRASIL',25,29.5,0,NULL,NULL,NULL,NULL),
  (56,1,3,1,'7791293005010','7791293005010','foto.jpg','CHAMPU DOVE 400 ML DA�O ACUMULADO THERAPY','UNIDAD','DOVE','BRASIL',25.32,32,0,NULL,NULL,NULL,NULL),
  (57,1,3,1,'7774904260022','7774904260022','foto.jpg','GEL DINAZUL140 GRS','UNIDAD','DINAZUL 1','BOLIVIA',3.71,5,0,NULL,NULL,NULL,NULL),
  (58,1,3,1,'7790138000159','7790138000159','foto.jpg','EBIA MIEL 500ML','UNIDAD','WI�AY','BOLIVIA',35,43,0,NULL,NULL,NULL,NULL),
  (59,1,3,1,'7506295302322','7506295302322','foto.jpg','SH HERBAL PROLONGALO 355ML','UNIDAD','BIOSILK','BOLIVIA',19.2333,23.6,0,NULL,NULL,NULL,NULL),
  (60,1,3,1,'7775005001514','7775005001514','foto.jpg','BIOSILK HUEVO 15ML SACH','UNIDAD','BIOSILK','BOLIVIA',0.87,1.5,0,NULL,NULL,NULL,NULL),
  (61,1,3,1,'7775005001491','7775005001491','foto.jpg','BIOSILK PARA NI�OS 15ML SACH','UNIDAD','BIOSILK','BOLIVIA',0.87,1.5,0,NULL,NULL,NULL,NULL),
  (62,1,3,1,'7804945072305','7804945072305','foto.jpg','SH BABYLAND NEUTRO 270ML','UNIDAD','PANTENE','MEXICO',12.3,16,0,NULL,NULL,NULL,NULL),
  (63,1,3,1,'7751851001014','7751851001014','foto.jpg','ENJ DENTO MENTA NAT 250G','UNIDAD','REXONA','COLOMBIA',8.66,13,0,NULL,NULL,NULL,NULL),
  (64,1,3,1,'7501065904096','7501065904096','foto.jpg','ACOND HERBAL CURVAS 300ML','UNIDAD','HERBAL ESSENCES','MEXICO',19.3,23.6,0,NULL,NULL,NULL,NULL),
  (65,1,3,1,'7501056342999','7501056342999','foto.jpg','SH CLEAR DUAL EFF','UNIDAD','REXONA','ARGENTINA',21.62,27,0,NULL,NULL,NULL,NULL),
  (66,1,3,1,'7775005006588','7775005006588','foto.jpg','LECHE DE PEPINO CLASSIC 350ML','UNIDAD','CLASSIC','BOLIVIA',6.86,10,0,NULL,NULL,NULL,NULL),
  (67,1,3,1,'7804920018755','7804920018755','foto.jpg','BALLERINA  HIERBAS SILVESTRES 1000 ML','UNIDAD','BALLERINA','ARGENTINA',12.8,16.5,0,NULL,NULL,NULL,NULL),
  (68,1,3,1,'7702626302966','7702626302966','foto.jpg','CREMA PARA ZAPATO NUGGET 81 ML NEGRO LATA','UNIDAD','NUGGET','CHILE',6.2,9,0,NULL,NULL,NULL,NULL),
  (69,1,3,1,'7772115100069','7772115100069','foto.jpg','ARANJUEZ BLANCO DUO','UNIDAD','DOVE','ARGENTINO',30,39,0,NULL,NULL,NULL,NULL),
  (70,1,3,1,'7775005008469','7775005008469','foto.jpg','FANTASY BRISA MARINA','UNIDAD','PLUSBELLE','ARGENTINA',10,15,0,NULL,NULL,NULL,NULL),
  (71,1,3,1,'7804350596236','7804350596236','foto.jpg','VINO TINTO SANTA CAR SAUVIGNON','UNIDAD','PLUSBELLE','ARGENTINA',38.5,49.5,0,NULL,NULL,NULL,NULL),
  (72,1,3,1,'7891962036892','7891962036892','foto.jpg','WAFER BAU NUECES 140G','UNIDAD','REXONA','ARGENTINA',4.45,6,0,NULL,NULL,NULL,NULL),
  (73,1,3,1,'1235504','1235504','foto.jpg','STARBUCKS FRAPPUCCINO COFFEE 281ML','UNIDAD','AVAL','PERU',15,19,0,NULL,NULL,NULL,NULL),
  (74,1,3,1,'7779970670720','7779970670720','foto.jpg','SEDAL CERAMIDAS 50 ML','UNIDAD','SEDAL','BOLIVIA',1.75,2.5,0,NULL,NULL,NULL,NULL),
  (75,1,3,1,'70330717534','70330717534','foto.jpg','COMFORT 3 BIC AZUL NORMAL','UNIDAD','SEDAL','BOLIVIA',5.2,7.5,0,NULL,NULL,NULL,NULL),
  (76,1,3,1,'7776501000414','7776501000414','foto.jpg','SERVILLETAS SCOTT 50 UNID DIA A DIA','UNIDAD','SCOTT','BOLIVIA',1.54006,2.3,0,NULL,NULL,NULL,NULL),
  (77,1,3,1,'7776507000456','7776507000456','foto.jpg','SERVILLETAS NACIONAL 50 UNID NARANJA','UNIDAD','NACIONAL','BOLIVIA',1.05,1.8,0,NULL,NULL,NULL,NULL),
  (78,1,3,1,'7774112100356','7774112100356','foto.jpg','SOFIA SILLPANCHO  RES','UNIDAD','BALLERINA','CHILE',26,31,0,NULL,NULL,NULL,NULL),
  (79,1,3,1,'7804920015327','7804920015327','foto.jpg','CHAMPU BALLERINA HERBAL 60 GRS C/ACONDICIONADOR','UNIDAD','BALLERINA','CHILE',1.05,2,0,NULL,NULL,NULL,NULL),
  (80,1,3,1,'7804920015501','7804920015501','foto.jpg','CHAMPU BALLERINA MANZANILLA 60 GRS C/ACONDICIONADOR','UNIDAD','BALLERINA','CHILE',1.05,2,0,NULL,NULL,NULL,NULL),
  (81,1,4,1,'7804920015143','7804920015143','foto.jpg','CHAMPU BALLERINA BABY 60 GRS C/ACONDICIONADOR','UNIDAD','BALLERINA','CHILE',1.05,2,0,NULL,NULL,NULL,NULL),
  (82,1,4,1,'7896018700642','7896018700642','foto.jpg','TH HUGGIES RECIEN NACIDO 48UND','UNIDAD','SCOTT','BRAZIL',15.132,21,0,NULL,NULL,NULL,NULL),
  (83,1,4,1,'7896018700628','7896018700628','foto.jpg','TOALLITAS HUMEDAS HUGGIES ACTIVE FRESH 48 UNID VERDE','UNIDAD','HUGGIES','BRAZIL',8.83,13,0,NULL,NULL,NULL,NULL),
  (84,1,4,1,'7702425800700','7702425800700','foto.jpg','TOALLITAS HUMEDAS HUGGIES NATURAL CARE 48 UNID ROJO','UNIDAD','HUGGIES','BRAZIL',15.16,19,0,NULL,NULL,NULL,NULL),
  (85,1,4,1,'7771224002745','7771224002745','foto.jpg','SANDWICH VAINILLA DELIZIA','UNIDAD','AIR WICK','ARGENTINA',3.3,4.5,0,NULL,NULL,NULL,NULL),
  (86,1,4,1,'50618090818','50618090818','foto.jpg','PA�UELOS ELITE MENTA LECHUGA X 6','UNIDAD','ELITE','CHILE',1.075,1.5,0,NULL,NULL,NULL,NULL),
  (87,1,4,1,'7891022100358','7891022100358','foto.jpg','BOM BRIL 60 GRS ACERO AMARILLO','UNIDAD','BOM BRIL','BRASIL',3.17497,5,0,NULL,NULL,NULL,NULL),
  (88,1,4,1,'7759185003353','7759185003353','foto.jpg','PH ELITE PLUS X 10PARES','UNIDAD','ELITE','CHILE',3.5154,5,0,NULL,NULL,NULL,NULL),
  (89,1,4,1,'7806500225522','7806500225522','foto.jpg','SERVILLETAS ELITE GRANDE 50 UNID','UNIDAD','ELITE','CHILE',6.7,8.7,0,NULL,NULL,NULL,NULL),
  (90,1,4,1,'7896007912179','7896007912179','foto.jpg','FOSFORO FIAT LUX 10 UNID OJO','UNIDAD','FIAT LUX','BRASIL',3.2,5,0,NULL,NULL,NULL,NULL),
  (91,1,4,1,'-','-','foto.jpg','VELAS PEQUE�A CRISTALINA','UNIDAD','VELA','BOLIVIA',0.4,0.5,0,NULL,NULL,NULL,NULL),
  (92,1,4,1,'-','-','foto.jpg','VELAS MEDIANA CRISTALINA','UNIDAD','VELA','BOLIVIA',0.8,1,0,NULL,NULL,NULL,NULL),
  (93,1,4,1,'-','-','foto.jpg','VELAS GRANDE CRISTALINA','UNIDAD','VELA','BOLIVIA',1.6,2,0,NULL,NULL,NULL,NULL),
  (94,1,4,1,'7779970730318','7779970730318','foto.jpg','CUCHILLOS PLASTICOS BLANCOS BELEN','UNIDAD','CUCHILLOS','BOLIVIA',1.5972,3,0,NULL,NULL,NULL,NULL),
  (95,1,4,1,'7891055112601','7891055112601','foto.jpg','CEPILLO PARA ROPA CONDOR DE MADERA','UNIDAD','CONDOR','BRASIL',3.9,6,0,NULL,NULL,NULL,NULL),
  (96,1,4,1,'7779970730196','7779970730196','foto.jpg','PLATOS PLANO REDONDOS GRANDE','UNIDAD','BELEN','BOLIVIA',3.5,6,0,NULL,NULL,NULL,NULL),
  (97,1,4,1,'7779970730073','7779970730073','foto.jpg','VASOS PLAST GRANDE 500ML','UNIDAD','BELEN','BOLIVIA',10,14,0,NULL,NULL,NULL,NULL),
  (98,1,4,1,'7771501000013','7771501000013','foto.jpg','ALCOHOL GUABIRA 1.0 L','UNIDAD','GUABIRA','BOLIVIA',10.63,17,0,NULL,NULL,NULL,NULL),
  (99,1,4,1,'50417113640','50417113640','foto.jpg','BELEN PLATOS PLASTICOS OVALADOS GRANDES DE 10 UNID','UNIDAD','PLATOS','BOLIVIA',2.7,6,0,NULL,NULL,NULL,NULL),
  (100,1,4,1,'7802215104848','7802215104848','foto.jpg','CHOCOLATE VIZZIO 144 GRS BLANCO','UNIDAD','VIZZIO','CHILE',10.0802,19,0,NULL,NULL,NULL,NULL);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;