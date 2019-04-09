-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2019 a las 20:27:25
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `startondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_evento`
--

CREATE TABLE `crea_evento` (
  `ID_Empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ID_Empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Sector` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Oficio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fase` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Img_Empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cartaPresentacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ofrecemos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `buscamos` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`ID_Empresa`, `email`, `password`, `Nombre`, `Localizacion`, `Sector`, `Oficio`, `Fase`, `Img_Empresa`, `cartaPresentacion`, `ofrecemos`, `buscamos`) VALUES
('', 'triwater@gmail.com', 'triwater', 'Triwater', 'Barcelona, España', 'Medioambiente', 'Programador web', 'Growth Stage', '', 'Triwater produce filtros biodegradables que de forma sencilla transforma agua salada, sucia o con bacterias en agua completamente potable en tres sencillos pasos.', 'Ofrecemos un ambiente de trabajo agradable y joven, con energía para afrontar nuevos desafíos. Somos un equipo de 12 personas así que te sentirás como en casa.', 'Buscamos un presidente de marketing y dos programadores para desarrollar una nueva web.'),
('2', 'reparatech@gmail.com', 'reparatech', 'Reparatech', 'Madrid', 'Tecnología', 'Marketing', 'Expansion', 'img/reparatech', 'Somos una empresa nueva que buscamos hacernos un hueco en el mundo de la tecnología.\r\nNos dedicamos a ofrecer el servicio de reparación de tecnología a través de plataformas modernas.\r\nNos consideramos el \"Uber de las reparaciones\".', 'Ofrecemos la posibilidad de que nuestros empleados sientan que realizan un servicio útil para aquellos que tengan pocos conocimientos sobre tecnología de forma justa, fiable y rápida.', 'Buscamos trabajadores para rellenar varios puestos de reparador de ordenadores de sobremesa y dos para dispositivos móviles.\r\nBuscamos a un encargado de marketing para llevar las nuevas campañas publicitarias, así como un encargado de ventas.'),
('3', 'simplysmart@gmail.com', 'simplysmart', 'Simply Smart', 'Madrid', 'Tecnología', 'CTO', 'Expansion', 'img/simplysmart', 'En SimplySmart transformamos las casas de nuestros clientes en casas inteligentes completamente controlables por voz y monitorizables desde el smartphone.\r\nTrabajamos con distintos presupuestos dependiendo del nivel de transformación que desee el cliente.', 'Ofrecemos la posibilidad de trabajar en el mundo del IoT en una empresa que trata con este sector de forma directa. Además tratarás mano a mano con expertos en la transformación de viviendas.', 'Buscamos un CTO para investigación en el mundo de IoT ya que pretendemos lanzar nuestro propio hub de tecnologías IoT para poder acoger diferentes tecnologías y presentarlas al cliente de forma fácilmente controlable, con un programa hecho in-house.'),
('4', 'travelmore@gmail.com', 'travelmore', 'Travel More', 'Valencia', 'Transportes', 'Programador', 'Early-Stage', 'img/travelmore', 'TravelMore es una agencia de viajes completamente online, que basa sus servicios en buscar los mejores precios para sus clientes buscando en las mayores webs de servicios para viajeros a través de un motor con inteligencia artificial.', 'Ofrecemos un ambiente de trabajo agradable y joven, con energía para afrontar nuevos desafíos. Somos un equipo de 12 personas así que te sentirás como en casa.', 'Ofrecemos un ambiente de trabajo agradable y joven, con energía para afrontar nuevos desafíos. Somos un equipo de 12 personas así que te sentirás como en casa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Img_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interaccion_emp_us`
--

CREATE TABLE `interaccion_emp_us` (
  `ID_Empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ID_Usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_evento`
--

CREATE TABLE `tema_evento` (
  `Nombre_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Tema` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_apunta_evento`
--

CREATE TABLE `user_apunta_evento` (
  `ID_Usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Event_Name` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Experiencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Pasiones` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `CartaPresentacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Img_Perfil` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Imagen',
  `Oficio` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `email`, `password`, `Nombre`, `Apellidos`, `Localizacion`, `Experiencia`, `Pasiones`, `CartaPresentacion`, `Img_Perfil`, `Oficio`) VALUES
('1', 'pepeg@gmail.com', 'pepeg', 'Pepe', 'García Ruin', 'Madrid', 'Llevo casi 20 años en el ámbito laboral de la informática y más centrado en el lenguaje PHP. He trabajado para grandes multinacionales y ahora busco una startup donde conozca directamente a mis jefes y haya un ámbito laboral más cercano y no tan frio.', 'Mis pasiones son sencillas pero necesarias para mí. \r\nSoy un hombre calmado que le gusta leer con un buen café, en el metro me gusta investigar noticias nuevas sobre mi campo de trabajo para estar siempre actualizado ya que creo que es muy importante.\r\nLo que más me gusta de todo es pasar tiempo con mis familiares y amigos.', 'Hola me llamo Pepe, tengo 43  años y soy experto en  programación PHP, graduado en ingeniaría infomática, especializado en bases de datos. \r\nVivo en Getafe centro y dispongo de coche propio para cualquier desplazamiento dentro de Madrid.\r\nSoy una persona muy sociable capaz de trabajar con cualquier tipo de persona eficazmente.', 'img/pepeg.jpg', 'Programador PHP'),
('2', 'laurac@gmail.com', 'laurag', 'Laura', 'Corrales', 'Valencia', '', '', '', 'img/laurac.jpg', 'UX Designer'),
('3', 'helenap@gmail.com', 'helenap', 'Helena', 'Pómez', 'Madrid', '', '', '', 'img/helenap', 'Desarrolladora Front-End'),
('5', 'tomask@gmail.com', 'tomask', 'Tomás', 'Ko', 'Bilbao', '', '', '', 'img/tomask.jpg', 'Contable'),
('usuario', 'usuario@gmail.com', 'usuario', 'user', 'primero', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crea_evento`
--
ALTER TABLE `crea_evento`
  ADD PRIMARY KEY (`ID_Empresa`,`Nombre_Evento`),
  ADD KEY `Nombre_Evento` (`Nombre_Evento`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_Empresa`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `interaccion_emp_us`
--
ALTER TABLE `interaccion_emp_us`
  ADD PRIMARY KEY (`ID_Empresa`,`ID_Usuario`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `tema_evento`
--
ALTER TABLE `tema_evento`
  ADD PRIMARY KEY (`Nombre_Evento`,`Tema`);

--
-- Indices de la tabla `user_apunta_evento`
--
ALTER TABLE `user_apunta_evento`
  ADD PRIMARY KEY (`ID_Usuario`,`Event_Name`),
  ADD KEY `Event_Name` (`Event_Name`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crea_evento`
--
ALTER TABLE `crea_evento`
  ADD CONSTRAINT `crea_evento_ibfk_1` FOREIGN KEY (`Nombre_Evento`) REFERENCES `evento` (`Nombre`),
  ADD CONSTRAINT `crea_evento_ibfk_2` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresa` (`ID_Empresa`);

--
-- Filtros para la tabla `interaccion_emp_us`
--
ALTER TABLE `interaccion_emp_us`
  ADD CONSTRAINT `interaccion_emp_us_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_usuario`),
  ADD CONSTRAINT `interaccion_emp_us_ibfk_2` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresa` (`ID_Empresa`);

--
-- Filtros para la tabla `tema_evento`
--
ALTER TABLE `tema_evento`
  ADD CONSTRAINT `tema_evento_ibfk_1` FOREIGN KEY (`Nombre_Evento`) REFERENCES `evento` (`Nombre`);

--
-- Filtros para la tabla `user_apunta_evento`
--
ALTER TABLE `user_apunta_evento`
  ADD CONSTRAINT `user_apunta_evento_ibfk_1` FOREIGN KEY (`Event_Name`) REFERENCES `evento` (`Nombre`),
  ADD CONSTRAINT `user_apunta_evento_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
