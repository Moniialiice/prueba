-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2018 a las 00:46:48
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlgestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinatario`
--

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL,
  `conase` int(11) NOT NULL,
  `valle_toluca` int(11) NOT NULL,
  `valle_mexico` int(11) NOT NULL,
  `zona_oriente` int(11) NOT NULL,
  `fiscal_genral` int(11) NOT NULL,
  `vicefiscalia` int(11) NOT NULL,
  `oficialia_mayor` int(11) NOT NULL,
  `informacion_estadistica` int(11) NOT NULL,
  `central_juridico` int(11) NOT NULL,
  `servicio_carrera` int(11) NOT NULL,
  `otra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_asunto`
--

CREATE TABLE `etiquetas_asunto` (
  `id_etAsunto` int(11) NOT NULL,
  `colaboracion` int(11) NOT NULL,
  `amparos` int(11) NOT NULL,
  `solicitudes` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  `cusos_capacitaciones` int(11) NOT NULL,
  `juzgados` int(11) NOT NULL,
  `recursos_humanos` int(11) NOT NULL,
  `telefonia` int(11) NOT NULL,
  `estadistica` int(11) NOT NULL,
  `relaciones_interis` int(11) NOT NULL,
  `boletas_audiencia` int(11) NOT NULL,
  `copias_conocimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informar`
--

CREATE TABLE `informar` (
  `id_informar` int(11) NOT NULL,
  `esta_oficina` int(11) NOT NULL,
  `peticionario` int(11) NOT NULL,
  `institucion_requiriente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_entrada`
--

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_entrada`
--

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`) VALUES
(1, 'CO', 'Lic Guzman', 'Busqueda de x', '', 1, '0000-00-00'),
(2, '31/08/2018', 'asd', 'Lic Gabriel', '', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_seguimiento`
--

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL,
  `nomenclatura` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` varchar(20) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `arch_seguimiento` varchar(100) NOT NULL,
  `arch_final` varchar(100) NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_oficio`
--

CREATE TABLE `ruta_oficio` (
  `id_ruta` int(11) NOT NULL,
  `realiza_diligencias` int(11) NOT NULL,
  `recibir_personalmente` int(11) NOT NULL,
  `gestionar_peticion` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `otras` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `activo`, `usuario`, `password`, `id_tipoUsuario`) VALUES
(1, 'administrador', 1, 'admin', 'admin', 1),
(2, 'lprueba', 0, '123', '1', 1),
(3, 'prueba', 1, 'prueba', '123', 1),
(4, 'prueba', 1, 'prueba', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  ADD PRIMARY KEY (`id_destinatario`);

--
-- Indices de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  ADD PRIMARY KEY (`id_etAsunto`);

--
-- Indices de la tabla `informar`
--
ALTER TABLE `informar`
  ADD PRIMARY KEY (`id_informar`);

--
-- Indices de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  ADD PRIMARY KEY (`id_oficioEntrada`),
  ADD KEY `atencion` (`atencion`);

--
-- Indices de la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  ADD PRIMARY KEY (`id_oficioseg`),
  ADD KEY `atencion` (`atencion`),
  ADD KEY `id_etAsunto` (`id_etAsunto`),
  ADD KEY `id_destinatario` (`id_destinatario`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `id_informar` (`id_informar`);

--
-- Indices de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  MODIFY `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informar`
--
ALTER TABLE `informar`
  MODIFY `id_informar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  MODIFY `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  MODIFY `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  ADD CONSTRAINT `oficio_entrada_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  ADD CONSTRAINT `oficio_seguimiento_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_2` FOREIGN KEY (`id_etAsunto`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_3` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_4` FOREIGN KEY (`id_ruta`) REFERENCES `ruta_oficio` (`id_ruta`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
