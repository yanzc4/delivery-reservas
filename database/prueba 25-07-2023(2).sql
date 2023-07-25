-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 25-07-2023 a las 09:36:12
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `_agregarcliente` (IN `cuser` VARCHAR(50), IN `cpass` VARCHAR(25), IN `cnombre` VARCHAR(100), IN `cape` VARCHAR(150), IN `ctel` VARCHAR(9), IN `ccorreo` VARCHAR(200), IN `cfecha` DATE, IN `cdir` VARCHAR(200))   insert into clientes(user,pass,nombre,apellido,foto,telefono,correo,f_nacimiento,direccion,estado) values (cuser, cpass, cnombre, cape, 'database/img/usuario4532.png', ctel, ccorreo, cfecha, cdir, 1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_agregarordenentregada` (`idp` INT)   BEGIN
INSERT into ordenesentregadas(idcl, idtr, idped) SELECT id_cliente, id_trabajador, id_pedido from ubicaciontemporal WHERE id_pedido=idp;
DELETE from ubicaciontemporal WHERE id_pedido=idp;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_crearventa` (`idc` INT, `fecha` DATE)   begin
INSERT INTO pedidos(id_cliente, fecha) VALUES(idc, fecha);
INSERT INTO detallepedido(id_pedido, id_producto, cantidad, precio) SELECT (SELECT MAX(id) from pedidos), id_producto, cantidad, precio from carrito where id_cliente=idc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_crearventa2` (`idc` INT, `fecha` DATE, `vlat` VARCHAR(150), `vlng` VARCHAR(150))   begin
INSERT INTO pedidos(id_cliente, fecha) VALUES(idc, fecha);
INSERT INTO detallepedido(id_pedido, id_producto, cantidad, precio) SELECT (SELECT MAX(id) from pedidos WHERE id_cliente=idc), id_producto, cantidad, precio from carrito where id_cliente=idc;
INSERT INTO ubicaciontemporal(lat,lng,id_cliente,id_trabajador,id_pedido) VALUES(vlat, vlng, idc, null, (SELECT MAX(id) from pedidos WHERE id_cliente=idc));
DELETE FROM carrito WHERE id_cliente=idc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_listarmicarrito` (IN `idc` INT)   SELECT p.nombre, c.id_cliente, c.id_producto, c.cantidad, c.precio, c.cantidad * c.precio as subtotal, p.imagen from carrito c JOIN productos p on c.id_producto=p.id WHERE c.id_cliente=idc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_listarnuevasordenes` ()   SELECT u.id_cliente, u.id_pedido, u.id_trabajador, c.nombre, c.apellido, c.telefono, (SELECT sum(dp.cantidad * dp.precio) from detallepedido dp WHERE dp.id_pedido=u.id_pedido) as total, c.direccion from ubicaciontemporal u JOIN clientes c on u.id_cliente=c.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_listarplatos` ()   SELECT p.id, p.nombre, p.precio, p.imagen, p.descripcion, c.nombre as categoria FROM productos p JOIN categorias c on p.id_categoria=c.id where p.estado=1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_loguearcliente` (IN `cuser` VARCHAR(50), IN `cpass` VARCHAR(25))   select * from clientes where user=cuser and pass=cpass and estado=1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `_loguearusuario` (`uuser` VARCHAR(50), `upass` VARCHAR(25))   select * from usuarios where user=uuser and pass=upass and estado=1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_cliente`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 1, '7.00'),
(1, 10, 1, '3.00'),
(22, 9, 1, '7.00'),
(1, 5, 1, '9.00'),
(1, 13, 2, '7.20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Bebidas'),
(2, 'Comida'),
(3, 'Postre'),
(4, 'Snacks'),
(5, 'Hamburguesas'),
(6, 'Pizza'),
(7, 'Parrillas'),
(8, 'Caldo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `user`, `pass`, `nombre`, `apellido`, `foto`, `telefono`, `correo`, `f_nacimiento`, `direccion`, `estado`) VALUES
(1, 'yan', '1234', 'Yan', 'Zapata Cardoza', 'database/img/usuario4532.png', '987987678', 'yanzapatacardoza@gmail.com', '2000-10-29', 'Villa los reyes-Ventanilla', 1),
(2, 'usuario2', '6785', 'Julio', 'Morales Laos', 'database/img/usuario4532.png', '987987670', 'tc026435@gmail.com', '2003-07-10', 'Los Olivos de pro', 1),
(3, 'juan', 'admin', 'Juan', 'Diaz', 'database/img/usuario4532.png', '993877355', 'juan@gmail.com', '2023-06-28', 'Los olivos', 1),
(20, 'pedro', 'sxxsajsjf887', 'Pedro', 'Garcia', 'database/img/usuario4532.png', '993877355', 'pedro@gmail.com', '2023-06-01', 'Los olivos de Pro', 1),
(21, 'david', '123456', 'David', 'Caceres', 'database/img/usuario4532.png', '728822727', 'felix21soc@gmail.com', '2023-07-18', 'av puente piedra lima', 1),
(22, 'prueba23', '1234', 'prueba', '1234', 'database/img/usuario4532.png', '772828272', 'prueba@gmail.com', '2023-07-12', 'Mz L lote 59 av Manizales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 2, '7.00'),
(1, 9, 1, '7.00'),
(28, 9, 3, '7.00'),
(28, 10, 1, '3.00'),
(28, 2, 1, '13.00'),
(28, 1, 1, '7.00'),
(28, 11, 1, '13.00'),
(29, 9, 3, '7.00'),
(29, 10, 1, '3.00'),
(29, 2, 1, '13.00'),
(29, 1, 1, '7.00'),
(30, 2, 1, '13.00'),
(30, 11, 1, '13.00'),
(31, 1, 1, '7.00'),
(31, 3, 1, '7.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id`, `imagen`, `tipo`) VALUES
(1, 'database/img/anticucho.jpg', 'oferta'),
(2, 'database/img/banner-hamburgesa.png', 'banner'),
(3, 'database/img/banner-hamburgesa.png', 'banner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesentregadas`
--

CREATE TABLE `ordenesentregadas` (
  `id` int(11) NOT NULL,
  `idcl` int(11) DEFAULT NULL,
  `idtr` int(11) DEFAULT NULL,
  `idped` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenesentregadas`
--

INSERT INTO `ordenesentregadas` (`id`, `idcl`, `idtr`, `idped`) VALUES
(1, 1, 7, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `fecha`) VALUES
(1, 21, '2023-07-22'),
(28, 1, '2023-07-22'),
(29, 1, '2023-07-23'),
(30, 2, '2023-07-23'),
(31, 21, '2023-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(300) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `id_categoria`, `estado`) VALUES
(1, 'Jugo de Piña', '7.00', 'Refrescante jugo de piña natural, con un sabor tropical y delicioso. Disfruta de su dulzura equilibrada y aroma exótico en cada sorbo. Una opción saludable y revitalizante para tu día.', 'database/img/jugopiña.png', 1, 1),
(2, 'Mostrito', '13.00', '¡Delicioso monstruo con pollo a la brasa! Este plato te ofrece el perfecto equilibrio de jugosidad y sabor ahumado del pollo asado a la brasa, acompañado de irresistibles complementos. Una experiencia culinaria que te hará disfrutar cada bocado. 🍗🔥😋', 'database/img/chaufa-de-pollo.jpg', 2, 1),
(3, 'Pie de Manzana', '7.00', 'Delicioso pie de manzana recién horneado con una crujiente y dorada corteza, relleno de jugosas manzanas y una mezcla perfecta de canela y azúcar. Una delicia dulce y reconfortante para disfrutar en cualquier ocasión. ¡Una explosión de sabor en cada bocado! 🍎🥧', 'database/img/piemanzana.jpg', 3, 1),
(4, 'Tequeños con Huacamamole', '15.00', 'Deliciosos tequeños crujientes rellenos de queso, acompañados de suave y sabroso guacamole. ¡Una combinación irresistible! 🧀🥑', 'database/img/tequenos.jpg', 4, 1),
(5, 'Hamburguesa de Carne', '9.00', 'Hamburguesa de carne jugosa y sabrosa, con el equilibrio perfecto de condimentos y acompañamientos frescos. Una delicia para los amantes de la carne.', 'database/img/hamburguesacarne.webp', 5, 1),
(6, 'Pizza familiar', '35.90', '¡Deliciosa pizza familiar para compartir con tus seres queridos! Disfruta de una combinación perfecta de ingredientes frescos y sabores irresistibles. ¡Una experiencia gastronómica inolvidable! 🍕😋', 'database/img/pizafamiliar.png', 6, 1),
(7, 'Anticuchos', '35.00', 'Deliciosos anticuchos, una tradicional delicia peruana de carne marinada y asada en brochetas. ¡Sabor auténtico y irresistible en cada bocado! 🍢🇵🇪', 'database/img/anticucho2.jpg', 7, 1),
(8, 'Caldo de Mote', '12.00', 'El caldo de mote es una deliciosa sopa tradicional de América Latina. Preparada con mote, carne, verduras y especias, ofrece un sabor reconfortante y nutritivo.', 'database/img/mote.jpg', 8, 1),
(9, 'Jugo de Fresa', '7.00', 'Refrescante y delicioso, nuestro jugo de fresa es una explosión de sabor natural. Disfruta la dulzura de las fresas recién cosechadas en cada sorbo. ¡Una experiencia frutal única!', 'database/img/jugofresa.png', 1, 1),
(10, 'Gaseosa Inca Personal', '3.00', 'Inca Cola, la bebida refrescante y emblemática del Perú, cautiva con su sabor único a base de hierba luisa. ¡Una delicia dorada que te transporta a la esencia de los Andes en cada sorbo!', 'database/img/inca.png', 1, 1),
(11, 'Chaufa de Pollo', '13.00', 'Delicioso chaufa de pollo con arroz salteado al wok, tierna carne de pollo, verduras frescas y toques de exquisita sazón oriental. ¡Un deleite culinario!', 'database/img/chaufa-de-pollo.jpg', 2, 1),
(12, 'Papas', '10.00', 'Papas familiares para compartir en familia estan deliciosas', 'database/img/papas.png', 4, 1),
(13, 'Cup Kake', '7.20', 'Delicioso cup kake para disfrutar en familia', 'database/img/cupcake.png', 3, 0),
(14, 'Pizza de Pepperoni', '25.00', 'Pizza de pepperoni familiar para disfrutar con tus seres queridos', 'database/img/pepperoni-pizza-abob-m.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciontemporal`
--

CREATE TABLE `ubicaciontemporal` (
  `lat` varchar(150) DEFAULT NULL,
  `lng` varchar(150) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicaciontemporal`
--

INSERT INTO `ubicaciontemporal` (`lat`, `lng`, `id_cliente`, `id_trabajador`, `id_pedido`) VALUES
('-12.0432', '-77.0282', 21, 9, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `f_nacimiento` date DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`, `nombre`, `email`, `telefono`, `f_nacimiento`, `rol`, `imagen`, `direccion`, `estado`) VALUES
(1, 'ejemplo', '123456', 'Ejemplo', 'ejemplo@example.com', '123456722', '1990-01-01', 'Administrador', 'database/img/usuario4532.png', 'mz h lote 16', 1),
(2, 'pepito', '1234', 'Pepa', 'pepito@gmail.com', '177363628', '2023-07-12', 'Monitoreo', 'database/img/usuario4532.png', 'mz l lote 6 hhshfhfhf', 0),
(5, 'admin', 'admin', 'Yan Zapata', 'yan@gmail.com', '992828828', '2022-11-10', 'Administrador', 'database/img/usuario4532.png', 'Mz L lote 59 Ventanilla', 1),
(7, 'delivery', '1234', 'Julio', 'julio@gmail.com', '872625226', '2023-07-07', 'Delivery', 'database/img/usuario4532.png', 'mz Villa mora', 1),
(8, 'monitoreo', '1234', 'Piero Mora', 'piero@gmail.com', '872625226', '2023-07-07', 'Monitoreo', 'database/img/usuario4532.png', 'mz Villa luiza', 1),
(9, 'ale', '1234', 'Alejandro', 'alejandro@gmail.com', '987366363', '2023-07-01', 'Delivery', 'database/img/usuario4532.png', 'Mz F lote 45 luis felipe', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenesentregadas`
--
ALTER TABLE `ordenesentregadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcl` (`idcl`),
  ADD KEY `idtr` (`idtr`),
  ADD KEY `idped` (`idped`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `ubicaciontemporal`
--
ALTER TABLE `ubicaciontemporal`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ordenesentregadas`
--
ALTER TABLE `ordenesentregadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ordenesentregadas`
--
ALTER TABLE `ordenesentregadas`
  ADD CONSTRAINT `ordenesentregadas_ibfk_1` FOREIGN KEY (`idcl`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ordenesentregadas_ibfk_2` FOREIGN KEY (`idtr`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ordenesentregadas_ibfk_3` FOREIGN KEY (`idped`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `ubicaciontemporal`
--
ALTER TABLE `ubicaciontemporal`
  ADD CONSTRAINT `ubicaciontemporal_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
