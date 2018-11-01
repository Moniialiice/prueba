-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2018 a las 16:01:31
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
-- Base de datos: `prueba`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `INSERTOFICIO` (`oficina` INT, `peticionario` INT, `requiriente` INT, `colaboracion` INT, `amparo` INT, `solicitudes` INT, `gestion` INT, `cursos` INT, `juzgados` INT, `rh` INT, `telefonia` INT, `estadistica` INT, `ri` INT, `boletas` INT, `conocimiento` INT, `conase` INT, `toluca` INT, `mexico` INT, `zoriente` INT, `fgeneral` INT, `vicefiscalia` INT, `oficialia` INT, `informacion` INT, `central` INT, `servicio` INT, `otrad` LONGTEXT, `diligencia` INT, `personalmente` INT, `gestionar` INT, `archivo` INT, `otrar` LONGTEXT, `nomenclatura` VARCHAR(100), `fecha` DATE, `termino` INT, `observaciones` LONGTEXT, `atencion` INT, `asunto` LONGTEXT, `id_entrada` INT) RETURNS INT(11) BEGIN
DECLARE IDI, IDE, IDD, IDR, IDO INT;
	INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    	SELECT LAST_INSERT_ID() INTO IDI;
    INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
    	SELECT LAST_INSERT_ID() INTO IDE;
    INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
    	SELECT LAST_INSERT_ID() INTO IDD;
	INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO IDR;
    INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) VALUES (nomenclatura, fecha, IDE, termino, IDD, observaciones, atencion, IDR, IDI, asunto, id_entrada);
        SELECT LAST_INSERT_ID() INTO IDO;    

RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL,
  `dependencias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencias`, `dependencias`) VALUES
(1, 'FISCALIA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO');

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
  `fiscal_general` int(11) NOT NULL,
  `vicefiscalia` int(11) NOT NULL,
  `oficialia_mayor` int(11) NOT NULL,
  `informacion_estadistica` int(11) NOT NULL,
  `central_juridico` int(11) NOT NULL,
  `servicio_carrera` int(11) NOT NULL,
  `otra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destinatario`
--

INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES
(29, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '');

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
  `cursos_capacitaciones` int(11) NOT NULL,
  `juzgados` int(11) NOT NULL,
  `recursos_humanos` int(11) NOT NULL,
  `telefonia` int(11) NOT NULL,
  `estadistica` int(11) NOT NULL,
  `relaciones_interis` int(11) NOT NULL,
  `boletas_audiencia` int(11) NOT NULL,
  `copias_conocimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas_asunto`
--

INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES
(29, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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

--
-- Volcado de datos para la tabla `informar`
--

INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES
(64, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_atendido`
--

CREATE TABLE `oficio_atendido` (
  `id_oficioAtendido` int(11) NOT NULL,
  `fecha_atendido` date NOT NULL,
  `asunto` longtext NOT NULL,
  `nombre_aten` varchar(100) NOT NULL,
  `cargo_aten` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `arch_atendido` varchar(100) NOT NULL,
  `copia_a` varchar(200) NOT NULL,
  `id_oficioseg` int(11) NOT NULL,
  `atencion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_atendido`
--

INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `asunto`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES
(1, '2018-11-22', 'SE INTEGRO EL ACUSE DE RECIBIDO AL EXPEDIENTE DEL OFICIO DE COLABORACION \r\n', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'MINISTERIO PUBLICO', 'SE INTEGRO EL ACUSE DE RECIBIDO AL EXPEDIENTE DEL OFICIO DE COLABORACION \r\n', 'Formato_general2.pdf', 'N/A', 31, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_entrada`
--

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `cargo` longtext NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` date NOT NULL,
  `hora_ent` time NOT NULL,
  `fecha_real` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_entrada`
--

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `hora_ent`, `fecha_real`) VALUES
(59, 'DEMEX/TOL/11897/2018', 'LIC. ISMAEL GONZALEZ CONTRERAS.', 'SUBDELEGADO DE PROCEDIMIENTOS PENALES \"B\"', 'COLABORACIÓN DE BÚSQUEDA DE ANTECEDENTES PENALES DE EDUARDO GIL PALOMINO', '9739602006651.pdf', 1, '2018-09-21', '10:45:00', '2018-09-21'),
(60, 'MJ03454/2018', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIA TÉCNICA DEL C. FISCAL GENERAL', 'JUEZ LIC. IGNACIO GUZMAN COLIN REMITE OFICIO 10050, C. A. 1843/2014, SOLICITANDO INFORME EL NUMERO DE CARPETA DE INVESTIGACION CON QUE SE RADICO EL ESTADO QUE GUARDA Y NOMBRE DEL FISCAL ENCARGADO DE LA INVESTIGACION Y DOMICILIO DONDE SE LOCALICE.\r\n', 'Entrevista.pdf', 1, '2018-09-24', '17:53:00', '2018-09-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_seguimiento`
--

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL,
  `nomenclatura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` time NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL,
  `id_oficioEntrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_seguimiento`
--

INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES
(31, '400LIA000/1/2018', '2018-09-22', 29, '00:00:02', 29, 'SE INTEGRO EL ACUSE DE RECIBIDO AL EXPEDIENTE DEL OFICIO DE COLABORACIÓN ', 1, 31, 64, 'FISCALES ESPECIALIZADOS DE SECUESTRO', 59);

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

--
-- Volcado de datos para la tabla `ruta_oficio`
--

INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES
(31, 0, 0, 0, 0, '');

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
(1, 'ADMINISTRADOR'),
(2, 'COORDINADOR GENERAL'),
(3, 'SECRETARIADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `usuario`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES
(1, 'ADMINISTRADOR', '', '', 1, 'mmendezg@fiscaliaedomex.gob.mx', 'admin', 'admin', 1, 1),
(2, 'lprueba', '', '', 1, '', '123', '123', 2, 1),
(3, 'Secretaria', '', '', 1, 'moniialiice@gmail.com', 'prueba', '123', 3, 1),
(4, 'Rodrigo', 'Archundia', '', 0, '', 'prueba2', '123', 2, 1),
(6, 'ABRAHAM', 'ESTEBAN', 'ACOSTA', 1, 'aestebana@fiscaliaedomex.gob.mx', 'AbrEsteban', '123', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencias`);

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
-- Indices de la tabla `oficio_atendido`
--
ALTER TABLE `oficio_atendido`
  ADD PRIMARY KEY (`id_oficioAtendido`);

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
  ADD UNIQUE KEY `nomenclatura` (`nomenclatura`),
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
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  MODIFY `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `informar`
--
ALTER TABLE `informar`
  MODIFY `id_informar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `oficio_atendido`
--
ALTER TABLE `oficio_atendido`
  MODIFY `id_oficioAtendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  MODIFY `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  MODIFY `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
