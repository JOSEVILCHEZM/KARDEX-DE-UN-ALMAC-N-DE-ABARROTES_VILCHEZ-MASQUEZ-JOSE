-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2020 a las 02:05:33
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsistemaronald`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoPersona` int(11) NOT NULL,
  `tipoDocumento` int(11) NOT NULL,
  `numDocumento` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `tefAdicional` varchar(15) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `razonSocial` varchar(50) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `tipoPersona`, `tipoDocumento`, `numDocumento`, `nombre`, `aPaterno`, `aMaterno`, `sexo`, `direccion`, `referencia`, `telefono`, `tefAdicional`, `correo`, `razonSocial`, `estado`) VALUES
(7, 2, 1, '78965269', 'Alex', 'Tullume', 'Piel', 1, 'Chiclayoo', 'Los Piedra', '927594391', '965359989', 'alex@gmail.com', 'Junior S.A', 1),
(9, 1, 1, '72314652', 'Daniela', 'Siesquen', 'Valdivia', 0, 'Buenos Aires #144', '88', '968389881', '965655365', 'luisfelipesiesquen22@gmail.com', '888', 1),
(10, 2, 2, '5666595', 'Marcela', 'Perez', 'Puicon', 0, 'Los Cuyes', '', '985225555', '', 'lsjfkda@gmail.com', 'La luna S.R.L', 1),
(15, 1, 1, '75474154', 'Talia', 'Roncal', 'Sandoval', 0, 'La luna', '', '965823658', '', 'ronald@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_de_compra` int(11) NOT NULL,
  `precio_unitario_pollo` double NOT NULL,
  `peso_total_pollo` double NOT NULL,
  `id_proveedor_fk` int(11) NOT NULL,
  `medio_pago` tinyint(1) NOT NULL,
  `moneda` tinyint(1) NOT NULL,
  `peso_agua` double NOT NULL,
  `precio_unitario_agua` double NOT NULL,
  `total_bandejas` double NOT NULL,
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra`),
  UNIQUE KEY `ticket_de_compra_2` (`ticket_de_compra`),
  KEY `id_proveedor_fk` (`id_proveedor_fk`),
  KEY `ticket_de_compra` (`ticket_de_compra`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `ticket_de_compra`, `precio_unitario_pollo`, `peso_total_pollo`, `id_proveedor_fk`, `medio_pago`, `moneda`, `peso_agua`, `precio_unitario_agua`, `total_bandejas`, `subtotal`, `total`, `fecha`) VALUES
(1, 1, 111, 0, 3, 0, 0, 222, 1, 1, 170, 170, '2020-11-08 03:35:33'),
(2, 2, 111, 0, 7, 0, 0, 222, 1, 1, 120, 120, '2020-11-08 03:36:53'),
(3, 5263, 111, 0, 3, 0, 0, 222, 1, 1, 90, 90, '2020-11-08 19:11:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

DROP TABLE IF EXISTS `descuento`;
CREATE TABLE IF NOT EXISTS `descuento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_Trabajador` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Trabajador` (`id_Trabajador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago_credito_c`
--

DROP TABLE IF EXISTS `detalle_pago_credito_c`;
CREATE TABLE IF NOT EXISTS `detalle_pago_credito_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT '0',
  `id_PagoCredito` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago_credito_p`
--

DROP TABLE IF EXISTS `detalle_pago_credito_p`;
CREATE TABLE IF NOT EXISTS `detalle_pago_credito_p` (
  `id_detalle_credito_p` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ticket` int(11) NOT NULL,
  `total` double NOT NULL,
  `id_pago_credito_p_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_credito_p`),
  KEY `id_pago_credito_p_fk` (`id_pago_credito_p_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `ticket` varchar(50) NOT NULL,
  `subtotal` double NOT NULL,
  `totalDescuento` double NOT NULL,
  `total` double NOT NULL,
  `estado` int(11) NOT NULL,
  `id_Trabajador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_credito_c`
--

DROP TABLE IF EXISTS `pago_credito_c`;
CREATE TABLE IF NOT EXISTS `pago_credito_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_venta` double NOT NULL DEFAULT '0',
  `saldo` double NOT NULL DEFAULT '0',
  `amortizado` double NOT NULL DEFAULT '0',
  `id_Cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_credito_p`
--

DROP TABLE IF EXISTS `pago_credito_p`;
CREATE TABLE IF NOT EXISTS `pago_credito_p` (
  `id_credito_p` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor_fk` int(11) NOT NULL,
  `id_compra_fk` int(11) NOT NULL,
  `deuda` double NOT NULL,
  `total` double NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_credito_p`),
  KEY `id_proveedor_fk` (`id_proveedor_fk`),
  KEY `id_compra_fk` (`id_compra_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `estado`) VALUES
(1, 'Administrador', 1),
(77, 'Contador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_venta`
--

DROP TABLE IF EXISTS `pre_venta`;
CREATE TABLE IF NOT EXISTS `pre_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente_fk` int(11) NOT NULL,
  `medio_pago` tinyint(1) NOT NULL,
  `moneda` tinyint(1) NOT NULL,
  `ticket_de_venta` varchar(8) NOT NULL,
  `subtotal` double NOT NULL DEFAULT '0',
  `descuento` double NOT NULL,
  `total_a_pagar` double NOT NULL DEFAULT '0',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ticket_de_venta_2` (`ticket_de_venta`),
  KEY `id_cliente_fk` (`id_cliente_fk`),
  KEY `ticket_de_venta` (`ticket_de_venta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pre_venta`
--

INSERT INTO `pre_venta` (`id`, `id_cliente_fk`, `medio_pago`, `moneda`, `ticket_de_venta`, `subtotal`, `descuento`, `total_a_pagar`, `fecha`) VALUES
(1, 7, 0, 0, '00000001', 90, 20, 70, '2020-11-07 18:16:47'),
(2, 10, 0, 0, '00000002', 220, 0, 220, '2020-11-07 18:19:47'),
(3, 9, 0, 0, '00000003', 900, 0, 900, '2020-11-08 18:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `precioUnitario` double NOT NULL,
  `moneda` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `cantidad`, `unidad`, `precioUnitario`, `moneda`, `estado`, `imagen`) VALUES
(3, 'Manzana', 'Traída desde una ciudad', 9, 2, 4, 1, 1, 'Manzanamanzana.jpg'),
(1, 'Polloo', 'Un parte del pollo', 1, 2, 9, 1, 1, 'Polloopollo.jpg'),
(4, 'Tomate', 'Traída desde una ciudad', 10, 2, 5, 1, 1, 'Tomatetomate.jpg'),
(2, 'Arroz', 'Un kg de Arroz', 1, 2, 4, 1, 1, 'Arrozarroz.jpg'),
(5, 'Platano', 'Traido desde la Selva', 11, 2, 2, 1, 1, 'Platanoplatano.jpg'),
(6, 'Pera', 'Desde la selva', 4, 2, 7, 1, 1, 'Perapera.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_compra`
--

DROP TABLE IF EXISTS `productos_compra`;
CREATE TABLE IF NOT EXISTS `productos_compra` (
  `id_productos_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto_fk` int(11) NOT NULL,
  `ticket_compra_fk` int(11) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `peso_bandeja` int(5) NOT NULL,
  `peso_por_bandeja` int(5) NOT NULL,
  `precio_unitario` double NOT NULL,
  `pollos` int(5) DEFAULT NULL,
  `total` double NOT NULL,
  `bandeja` double NOT NULL,
  PRIMARY KEY (`id_productos_compra`),
  KEY `id_producto_fk` (`id_producto_fk`),
  KEY `ticket_preventa_fk` (`ticket_compra_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_compra`
--

INSERT INTO `productos_compra` (`id_productos_compra`, `id_producto_fk`, `ticket_compra_fk`, `cantidad`, `peso_bandeja`, `peso_por_bandeja`, `precio_unitario`, `pollos`, `total`, `bandeja`) VALUES
(1, 1, 1, 10, 1, 1, 9, 1, 90, 1),
(2, 2, 1, 20, 1, 1, 4, 1, 80, 1),
(3, 2, 2, 30, 1, 1, 4, 1, 120, 1),
(4, 1, 5263, 10, 1, 1, 9, 1, 90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_preventa`
--

DROP TABLE IF EXISTS `productos_preventa`;
CREATE TABLE IF NOT EXISTS `productos_preventa` (
  `id_preventa` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `ticket_preventa_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_preventa`),
  KEY `id_producto` (`id_producto`),
  KEY `ticket_preventa_fk` (`ticket_preventa_fk`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_preventa`
--

INSERT INTO `productos_preventa` (`id_preventa`, `cantidad`, `id_producto`, `ticket_preventa_fk`) VALUES
(1, 10, 1, 1),
(2, 10, 2, 2),
(3, 20, 1, 2),
(4, 100, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` int(11) NOT NULL,
  `numDocumento` varchar(50) NOT NULL,
  `razonSocial` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `tefAdicional` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `documento`, `numDocumento`, `razonSocial`, `direccion`, `referencia`, `telefono`, `tefAdicional`, `estado`) VALUES
(1, 1, '78626536', 'Empresa S.A', 'La Victoria', 'Los Mangoss', '965325625', '965235225', 1),
(3, 2, '86523659', 'Lindos SRL', 'Lima', 'Los patoss', '949848948', '646465464', 1),
(4, 2, '75693996', 'Titanci SA', 'Piura', 'Salvador', '965225566', '965524523', 1),
(7, 2, '75555266', 'Pimentel SC', 'Puno', 'Salidad', '965824565', '965351552', 1),
(12, 2, '72314652', 'Felipe REC', 'Buenos Aires', 'El referente xd', '968389881', '999273134', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoDocumento` int(11) NOT NULL,
  `numDocumento` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `aPaterno` varchar(50) NOT NULL,
  `aMaterno` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `tefAdicional` varchar(15) DEFAULT NULL,
  `tipoSalario` int(11) NOT NULL,
  `salario` double NOT NULL,
  `fNacimiento` varchar(50) NOT NULL,
  `fIngreso` varchar(50) NOT NULL,
  `fSalida` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `remunerado` int(11) DEFAULT '0',
  `foto` varchar(200) DEFAULT 'avatar-hombre.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `tipoDocumento`, `numDocumento`, `nombre`, `aPaterno`, `aMaterno`, `sexo`, `direccion`, `referencia`, `telefono`, `tefAdicional`, `tipoSalario`, `salario`, `fNacimiento`, `fIngreso`, `fSalida`, `estado`, `remunerado`, `foto`) VALUES
(6, 1, '78626536', 'Ronald', 'Suclupe', 'Aguilar', 1, 'Chiclayo', '89565656', '965826326', '986526525', 3, 6566, '20/03/1995', '20/05/2020', '20/12/2020', 1, NULL, '6ronald.jpg'),
(13, 1, '78626536', 'Carla', 'Ruiz', 'Sandoval', 0, 'Lima', '', '965485626', '952562586', 4, 6000, '05/02/1990', '05/06/2020', '11/12/2020', 1, NULL, 'avatar-hombre.jpg'),
(14, 1, '8989289', 'Luis', 'Lean', 'Turici', 1, 'Lambayeque', 'La victoria', '985624345', '964856625', 4, 3000, '08/09/1980', '06/06/1999', '12/02/2020', 1, NULL, '141377542_489199944509123_580640725_n.jpg'),
(17, 1, '96582365', 'Elmer', 'Sandoval', 'Piel', 1, 'Lima', '', '968563255', '', 4, 5000, '11/07/2000', '15/06/2020', '24/12/2020', 1, 0, 'avatar-hombre.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_Trabajador` int(11) NOT NULL,
  `id_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `estado`, `id_Trabajador`, `id_Perfil`) VALUES
(31, 'ronal123', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 1, 6, 1),
(32, 'carla123', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 1, 13, 77),
(33, 'luis123', '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', 1, 14, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
