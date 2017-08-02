-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-03-2017 a las 15:22:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vinoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `idaudit` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idtabla` int(11) DEFAULT NULL,
  `campo` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `previousvalue` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `newvalue` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `user` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `action` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idaudit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbadministrativo`
--

CREATE TABLE IF NOT EXISTS `dbadministrativo` (
  `idadministrativo` int(11) NOT NULL AUTO_INCREMENT,
  `importesueldos` decimal(18,2) DEFAULT NULL,
  `importegastosvarios` decimal(18,2) DEFAULT NULL,
  `importemercaderia` decimal(18,2) DEFAULT NULL,
  `importegas` decimal(18,2) DEFAULT NULL,
  `importeluz` decimal(18,2) DEFAULT NULL,
  `importetelefono` decimal(18,2) DEFAULT NULL,
  `importeagua` decimal(18,2) DEFAULT NULL,
  `importeinmobiliario` decimal(18,2) DEFAULT NULL,
  `importeimpuestos` decimal(18,2) DEFAULT NULL,
  `importeautonomos` decimal(18,2) DEFAULT NULL,
  `importeingresosbrutos` decimal(18,2) DEFAULT NULL,
  `importeaportes` decimal(18,2) DEFAULT NULL,
  `importesmunicipal` decimal(18,2) DEFAULT NULL,
  `importefiestas` decimal(18,2) DEFAULT NULL,
  `anio` smallint(6) DEFAULT NULL,
  `mes` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idadministrativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dbadministrativo`
--

INSERT INTO `dbadministrativo` (`idadministrativo`, `importesueldos`, `importegastosvarios`, `importemercaderia`, `importegas`, `importeluz`, `importetelefono`, `importeagua`, `importeinmobiliario`, `importeimpuestos`, `importeautonomos`, `importeingresosbrutos`, `importeaportes`, `importesmunicipal`, `importefiestas`, `anio`, `mes`) VALUES
(1, '50000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '95520.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 2017, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclientes`
--

CREATE TABLE IF NOT EXISTS `dbclientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecompleto` varchar(120) NOT NULL,
  `cuil` varchar(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbdetallepedido`
--

CREATE TABLE IF NOT EXISTS `dbdetallepedido` (
  `iddetallepedido` int(11) NOT NULL AUTO_INCREMENT,
  `refpedidos` int(11) NOT NULL,
  `refproductos` int(11) NOT NULL,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `falto` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`iddetallepedido`),
  KEY `fk_DetallePedido_Pedido1` (`refpedidos`),
  KEY `fk_DetallePedido_Producto1` (`refproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbdetallepedidoaux`
--

CREATE TABLE IF NOT EXISTS `dbdetallepedidoaux` (
  `iddetallepedidoaux` int(11) NOT NULL AUTO_INCREMENT,
  `refproductos` int(11) NOT NULL,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`iddetallepedidoaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbdetalleventas`
--

CREATE TABLE IF NOT EXISTS `dbdetalleventas` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `refventas` int(11) NOT NULL,
  `refproductos` int(11) NOT NULL,
  `cantidad` decimal(18,2) NOT NULL,
  `costo` decimal(18,2) NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`iddetalleventa`),
  KEY `fk_detalleventa_producto_idx` (`refproductos`),
  KEY `fk_detalleventa_venta_idx` (`refventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbempleados`
--

CREATE TABLE IF NOT EXISTS `dbempleados` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `sexo` varchar(15) NOT NULL,
  `fechanac` date NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `fechaing` date NOT NULL,
  `sueldo` decimal(8,2) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`idempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dblibros`
--

CREATE TABLE IF NOT EXISTS `dblibros` (
  `idlibro` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `edicion` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refclientes` int(11) NOT NULL,
  `ruta` varchar(149) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idlibro`),
  KEY `fk_libros_clientes_idx` (`refclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbpagos`
--

CREATE TABLE IF NOT EXISTS `dbpagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `refclientes` int(11) DEFAULT NULL,
  `pago` decimal(18,2) NOT NULL,
  `fechapago` datetime NOT NULL,
  `observaciones` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idpago`),
  KEY `fk_pagos_clientes_idx` (`refclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbpedidos`
--

CREATE TABLE IF NOT EXISTS `dbpedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `fechasolicitud` datetime DEFAULT NULL,
  `fechaentrega` datetime DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `refestados` int(11) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_Pedido_EstadoEnvio1_idx` (`refestados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbproductos`
--

CREATE TABLE IF NOT EXISTS `dbproductos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `codigobarra` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` smallint(6) DEFAULT NULL,
  `stockmin` smallint(6) DEFAULT NULL,
  `preciocosto` decimal(8,2) DEFAULT NULL,
  `precioventa` decimal(8,2) DEFAULT NULL,
  `utilidad` decimal(8,2) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `refcategorias` int(11) DEFAULT NULL,
  `tipoimagen` varchar(15) DEFAULT NULL,
  `unidades` smallint(6) DEFAULT '1',
  `descripcion` varchar(300) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `refviejo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Disparadores `dbproductos`
--
DROP TRIGGER IF EXISTS `movimiento_Stock_Trigger`;
DELIMITER //
CREATE TRIGGER `movimiento_Stock_Trigger` AFTER UPDATE ON `dbproductos`
 FOR EACH ROW BEGIN 
INSERT INTO audit 
(idaudit,tabla,idtabla,campo,previousvalue,newvalue,dateupdate,user,action)
VALUES ('','dbproductos',OLD.idproducto,'todos',CONCAT('codigo:', OLD.codigo,'||', 'codigobarra:',OLD.codigobarra,'||','nombre:', OLD.nombre,'||', 'descripcion:',OLD.descripcion,'||','stock:', OLD.stock,'||','stockminimo:', OLD.stockmin,'||','precio:', OLD.preciocosto,'||','precioventa:', OLD.precioventa,'||','utilidad:', OLD.utilidad,'||', 'estado:',OLD.estado,'||', 'imagen:',OLD.imagen,'||','refcategoria:', OLD.refcategorias,'||', 'tipoimagen:',OLD.tipoimagen,'||', 'unidades:',OLD.unidades, '||', 'activo:',OLD.activo), CONCAT('codigo:', NEW.codigo,'||', 'codigobarra:',NEW.codigobarra,'||','nombre:', NEW.nombre,'||', 'descripcion:',NEW.descripcion,'||','stock:', NEW.stock,'||','stockminimo:', NEW.stockmin,'||','precio:', NEW.preciocosto,'||','precioventa:', NEW.precioventa,'||','utilidad:', NEW.utilidad,'||', 'estado:',NEW.estado,'||', 'imagen:',NEW.imagen,'||','refcategoria:', NEW.refcategorias,'||', 'tipoimagen:',NEW.tipoimagen,'||', 'unidades:',NEW.unidades, '||', 'activo:',NEW.activo),NOW(),'administrador','M');

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbproductosaux`
--

CREATE TABLE IF NOT EXISTS `dbproductosaux` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `codigobarra` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` smallint(6) DEFAULT NULL,
  `stockmin` smallint(6) DEFAULT NULL,
  `preciocosto` decimal(8,2) DEFAULT NULL,
  `precioventa` decimal(8,2) DEFAULT NULL,
  `utilidad` decimal(8,2) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `refcategorias` int(11) DEFAULT NULL,
  `tipoimagen` varchar(15) DEFAULT NULL,
  `unidades` smallint(6) DEFAULT '1',
  `descripcion` varchar(300) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `refviejo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbpromodetalle`
--

CREATE TABLE IF NOT EXISTS `dbpromodetalle` (
  `idpromodetalle` int(11) NOT NULL AUTO_INCREMENT,
  `refpromos` int(11) NOT NULL,
  `refproductos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idpromodetalle`),
  KEY `fk_promodetalle_promo_idx` (`refpromos`),
  KEY `fk_promodetalle_productos_idx` (`refproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbpromos`
--

CREATE TABLE IF NOT EXISTS `dbpromos` (
  `idpromo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vigenciadesde` date NOT NULL,
  `vigenciahasta` date NOT NULL,
  `descuento` decimal(18,2) NOT NULL,
  PRIMARY KEY (`idpromo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dbpromos`
--

INSERT INTO `dbpromos` (`idpromo`, `nombre`, `descripcion`, `vigenciadesde`, `vigenciahasta`, `descuento`) VALUES
(1, 'Vino tinto y syrah', '', '2017-03-27', '2017-04-03', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbproveedores`
--

CREATE TABLE IF NOT EXISTS `dbproveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `cuit` varchar(11) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `observacionces` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbusuarios`
--

CREATE TABLE IF NOT EXISTS `dbusuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `refroles` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombrecompleto` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_dbusuarios_tbroles1_idx` (`refroles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dbusuarios`
--

INSERT INTO `dbusuarios` (`idusuario`, `usuario`, `password`, `refroles`, `email`, `nombrecompleto`) VALUES
(1, 'marcos', 'marcos', 3, 'msredhotero@msn.com', 'Saupurein Marcos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbventas`
--

CREATE TABLE IF NOT EXISTS `dbventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `reftipopago` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `cancelado` bit(1) DEFAULT NULL,
  `refclientes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idventa`),
  KEY `fk_Compra_TipoDocumento1_idx` (`reftipopago`),
  KEY `fk_venta_cliente_idx` (`refclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `refproyecto` int(11) NOT NULL,
  `refuser` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `principal` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_menu`
--

CREATE TABLE IF NOT EXISTS `predio_menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` smallint(6) DEFAULT NULL,
  `hover` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `predio_menu`
--

INSERT INTO `predio_menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(1, '../index.php', 'icodashboard', 'Dashboard', 1, NULL, 'Empleado, Administrador, SuperAdmin'),
(3, '../ventas/', 'icoventas', 'Ventas/Compras', 3, NULL, 'Empleado, Administrador, SuperAdmin'),
(4, '../clientes/', 'icousuarios', 'Clientes', 4, NULL, 'Empleado, Administrador, SuperAdmin'),
(5, '../productos/', 'icoproductos', 'Productos', 2, NULL, 'Empleado, Administrador, SuperAdmin'),
(6, '../proveedores/', 'icocontratos', 'Proveedores', 6, NULL, 'Empleado, Administrador, SuperAdmin'),
(7, '../reportes/', 'icoreportes', 'Reportes', 11, NULL, 'Empleado, Administrador, SuperAdmin'),
(8, '../logout.php', 'icosalir', 'Salir', 30, NULL, 'Empleado, Administrador, SuperAdmin'),
(9, '../configuraciones/', 'icoconfiguracion', 'Configuraciones', 12, NULL, 'Empleado, Administrador, SuperAdmin'),
(15, '../categorias/', 'icozonas', 'Categorias', 8, NULL, 'Empleado, Administrador, SuperAdmin'),
(16, '../empleados/', 'icojugadores', 'Empleados', 10, NULL, 'Empleado, Administrador, SuperAdmin'),
(17, '../pedidos/', 'icoalquileres', 'Pedidos', 5, NULL, 'Administrador, SuperAdmin'),
(23, '../pagos/', 'icopagos', 'Pagos', 8, NULL, 'Administrador'),
(25, '../estadisticas/', 'icochart', 'Estadisticas', 10, NULL, 'Administrador'),
(26, '../administrativo/', 'icoconfiguracion', 'Administrativo', 12, NULL, 'SuperAdmin'),
(27, '../promos/', 'icozonas', 'Promociones', 13, NULL, 'SuperAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rescategorias`
--

CREATE TABLE IF NOT EXISTS `rescategorias` (
  `idresCategorias` int(11) NOT NULL,
  `resCategoriascol` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idresCategorias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rescodigobarra`
--

CREATE TABLE IF NOT EXISTS `rescodigobarra` (
  `rescodigobarracol` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rescodigobarracol1` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idrescodigobarra` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idrescodigobarra`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12577 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resproductos`
--

CREATE TABLE IF NOT EXISTS `resproductos` (
  `idresProductos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `resProductoscol` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `resProductoscol1` decimal(18,2) DEFAULT NULL,
  `resProductoscol2` date DEFAULT NULL,
  `resProductoscol3` decimal(18,2) DEFAULT NULL,
  `resProductoscol4` int(11) DEFAULT NULL,
  `resProductoscol5` int(11) DEFAULT NULL,
  `resProductoscol6` int(11) DEFAULT NULL,
  `resProductoscol7` int(11) DEFAULT NULL,
  `resProductoscol8` decimal(18,2) DEFAULT NULL,
  `resProductoscol9` int(11) DEFAULT NULL,
  `resProductoscol10` date DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbautorizacion`
--

CREATE TABLE IF NOT EXISTS `tbautorizacion` (
  `idautorizacion` int(11) NOT NULL AUTO_INCREMENT,
  `token` char(36) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idautorizacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcajadiaria`
--

CREATE TABLE IF NOT EXISTS `tbcajadiaria` (
  `idcajadiaria` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `inicio` decimal(18,2) NOT NULL,
  `fin` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`idcajadiaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategorias`
--

CREATE TABLE IF NOT EXISTS `tbcategorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `esegreso` bit(1) NOT NULL DEFAULT b'0',
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbconfiguracion`
--

CREATE TABLE IF NOT EXISTS `tbconfiguracion` (
  `idconfiguracion` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(130) COLLATE utf8_spanish_ci NOT NULL,
  `cuit` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(220) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigopostal` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idconfiguracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestados`
--

CREATE TABLE IF NOT EXISTS `tbestados` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(29) NOT NULL,
  `icono` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbestados`
--

INSERT INTO `tbestados` (`idestado`, `estado`, `icono`) VALUES
(1, 'Cargado', NULL),
(2, 'En Curso', NULL),
(3, 'Finalizado', NULL),
(4, 'Finalizado - Incompleto', NULL),
(5, 'Cancelado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmeses`
--

CREATE TABLE IF NOT EXISTS `tbmeses` (
  `mes` int(11) NOT NULL,
  `nombremes` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbmeses`
--

INSERT INTO `tbmeses` (`mes`, `nombremes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Julio'),
(7, 'Junio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

CREATE TABLE IF NOT EXISTS `tbroles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbroles`
--

INSERT INTO `tbroles` (`idrol`, `descripcion`, `activo`) VALUES
(1, 'Administrador', b'1'),
(2, 'Empleado', b'1'),
(3, 'SuperAdmin', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipopago`
--

CREATE TABLE IF NOT EXISTS `tbtipopago` (
  `idtipopago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbtipopago`
--

INSERT INTO `tbtipopago` (`idtipopago`, `descripcion`) VALUES
(1, 'Contado'),
(2, 'Debito'),
(3, 'Credito'),
(4, 'Cheques'),
(5, 'Cuenta');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dbdetallepedido`
--
ALTER TABLE `dbdetallepedido`
  ADD CONSTRAINT `fk_pedido_detalle` FOREIGN KEY (`refpedidos`) REFERENCES `dbpedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_detalle` FOREIGN KEY (`refproductos`) REFERENCES `dbproductos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbdetalleventas`
--
ALTER TABLE `dbdetalleventas`
  ADD CONSTRAINT `fk_detalleventa_producto` FOREIGN KEY (`refproductos`) REFERENCES `dbproductos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleventa_venta` FOREIGN KEY (`refventas`) REFERENCES `dbventas` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dblibros`
--
ALTER TABLE `dblibros`
  ADD CONSTRAINT `fk_libros_clientes` FOREIGN KEY (`refclientes`) REFERENCES `dbclientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbpagos`
--
ALTER TABLE `dbpagos`
  ADD CONSTRAINT `fk_pagos_clientes` FOREIGN KEY (`refclientes`) REFERENCES `dbclientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbpedidos`
--
ALTER TABLE `dbpedidos`
  ADD CONSTRAINT `fk_pedido_estado` FOREIGN KEY (`refestados`) REFERENCES `tbestados` (`idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbpromodetalle`
--
ALTER TABLE `dbpromodetalle`
  ADD CONSTRAINT `fk_promodetalle_promo` FOREIGN KEY (`refpromos`) REFERENCES `dbpromos` (`idpromo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_promodetalle_productos` FOREIGN KEY (`refproductos`) REFERENCES `dbproductos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dbventas`
--
ALTER TABLE `dbventas`
  ADD CONSTRAINT `fk_compra_tipopago` FOREIGN KEY (`reftipopago`) REFERENCES `tbtipopago` (`idtipopago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_cliente` FOREIGN KEY (`refclientes`) REFERENCES `dbclientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
