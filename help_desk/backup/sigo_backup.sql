#
# TABLE STRUCTURE FOR: captura
#

DROP TABLE IF EXISTS `captura`;

CREATE TABLE `captura` (
  `id_ofseg` int(11) NOT NULL AUTO_INCREMENT,
  `nomen_ofseg` varchar(50) NOT NULL,
  `fecha_ofseg` date NOT NULL,
  `id_etA_ofseg` int(11) NOT NULL,
  `termino_ofseg` datetime NOT NULL,
  `id_dest_ofseg` int(11) NOT NULL,
  `obs_ofseg` longtext NOT NULL,
  `aten_ofseg` int(11) NOT NULL,
  `id_ruta_ofseg` int(11) NOT NULL,
  `id_inf_ofseg` int(11) NOT NULL,
  `asunto_ofseg` longtext NOT NULL,
  `id_oficioEntrada_ofseg` int(11) NOT NULL,
  PRIMARY KEY (`id_ofseg`),
  KEY `captura` (`aten_ofseg`),
  KEY `captura_2` (`id_etA_ofseg`),
  KEY `captura_3` (`id_dest_ofseg`),
  KEY `captura_4` (`id_ruta_ofseg`),
  KEY `captura_5` (`id_inf_ofseg`),
  KEY `captura_6` (`id_oficioEntrada_ofseg`),
  CONSTRAINT `captura` FOREIGN KEY (`aten_ofseg`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `captura_2` FOREIGN KEY (`id_etA_ofseg`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `captura_3` FOREIGN KEY (`id_dest_ofseg`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `captura_4` FOREIGN KEY (`id_ruta_ofseg`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `captura_5` FOREIGN KEY (`id_inf_ofseg`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `captura_6` FOREIGN KEY (`id_oficioEntrada_ofseg`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: captura_atendido
#

DROP TABLE IF EXISTS `captura_atendido`;

CREATE TABLE `captura_atendido` (
  `id_ofAtenCap` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_atenCap` date NOT NULL,
  `nombre_atenCap` varchar(100) NOT NULL,
  `cargo_atenCap` longtext NOT NULL,
  `descCap` longtext NOT NULL,
  `arch_atenCap` varchar(100) NOT NULL,
  `copia_aCap` varchar(200) NOT NULL,
  `id_ofseg` int(11) NOT NULL,
  `atencionCap` int(11) NOT NULL,
  PRIMARY KEY (`id_ofAtenCap`),
  KEY `cap_aten1` (`id_ofseg`),
  KEY `cap_aten2` (`atencionCap`),
  CONSTRAINT `cap_aten1` FOREIGN KEY (`id_ofseg`) REFERENCES `captura` (`id_ofseg`),
  CONSTRAINT `cap_aten2` FOREIGN KEY (`atencionCap`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: dependencias
#

DROP TABLE IF EXISTS `dependencias`;

CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL AUTO_INCREMENT,
  `dependencias` varchar(150) NOT NULL,
  PRIMARY KEY (`id_dependencias`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `dependencias` (`id_dependencias`, `dependencias`) VALUES (1, 'FISCALIA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO');


#
# TABLE STRUCTURE FOR: destinatario
#

DROP TABLE IF EXISTS `destinatario`;

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL AUTO_INCREMENT,
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
  `otra` varchar(250) NOT NULL,
  PRIMARY KEY (`id_destinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (84, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (85, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (86, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (87, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (88, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (89, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (90, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (91, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (92, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (93, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (94, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (95, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (96, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (97, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (98, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (99, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (101, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (102, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (103, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (104, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (105, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (108, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (109, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (110, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (111, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (112, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (113, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (114, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (115, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (116, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (117, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (118, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (119, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (120, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (121, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (122, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (123, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (124, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (125, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (126, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');


#
# TABLE STRUCTURE FOR: etiquetas_asunto
#

DROP TABLE IF EXISTS `etiquetas_asunto`;

CREATE TABLE `etiquetas_asunto` (
  `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT,
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
  `copias_conocimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_etAsunto`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (84, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (85, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (86, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (88, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (89, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (90, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (91, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (92, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (93, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (94, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (95, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (96, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (97, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (98, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (99, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (100, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (103, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (104, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (105, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (106, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (107, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (108, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (110, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (111, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (112, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (113, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (114, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (115, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (116, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (117, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (118, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (119, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (120, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (121, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (122, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (123, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (124, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (125, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (126, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: informar
#

DROP TABLE IF EXISTS `informar`;

CREATE TABLE `informar` (
  `id_informar` int(11) NOT NULL AUTO_INCREMENT,
  `esta_oficina` int(11) NOT NULL,
  `peticionario` int(11) NOT NULL,
  `institucion_requiriente` int(11) NOT NULL,
  PRIMARY KEY (`id_informar`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (119, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (120, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (121, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (122, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (123, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (124, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (125, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (126, 1, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (127, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (128, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (129, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (130, 1, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (131, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (132, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (133, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (134, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (135, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (136, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (137, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (138, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (139, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (140, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (141, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (142, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (143, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (144, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (145, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (146, 1, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (147, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (148, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (149, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (150, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (151, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (152, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (153, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (154, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (155, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (156, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (157, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (158, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (159, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (160, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (161, 1, 0, 0);


#
# TABLE STRUCTURE FOR: oficio_atendido
#

DROP TABLE IF EXISTS `oficio_atendido`;

CREATE TABLE `oficio_atendido` (
  `id_oficioAtendido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_atendido` date NOT NULL,
  `nombre_aten` varchar(100) NOT NULL,
  `cargo_aten` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `arch_atendido` varchar(100) NOT NULL,
  `copia_a` varchar(200) NOT NULL,
  `id_oficioseg` int(11) NOT NULL,
  `atencion` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioAtendido`),
  KEY `id_oficioseg` (`id_oficioseg`),
  KEY `oficio_atendido` (`atencion`),
  CONSTRAINT `oficio_atendido` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `oficio_atendido_2` FOREIGN KEY (`id_oficioseg`) REFERENCES `oficio_seguimiento` (`id_oficioseg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (1, '2019-02-06', 'LIC. DILCYA SAMANTHA GARCIA ESPINOZA DE LOS MONTEROS.', 'SECRETARIO PARTICULAR', 'Curso de capacitación con la temática reglas mínimas de las naciones unidad sobre las medidas no privativas de la libertad ', '400LIA0000003201906022019.pdf', 'Rodrigo Archundia', 108, 1);


#
# TABLE STRUCTURE FOR: oficio_entrada
#

DROP TABLE IF EXISTS `oficio_entrada`;

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `cargo` longtext NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` datetime NOT NULL,
  `fecha_rec` datetime NOT NULL,
  `fecha_real` date NOT NULL,
  PRIMARY KEY (`id_oficioEntrada`),
  KEY `atencion` (`atencion`),
  CONSTRAINT `oficio_entrada_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (82, 'MJ03454/2018', 'MTRA. ADRIANA CABRERA SANTANA.', 'SECRETARIA TECNICA DEL C. FISCAL GENERAL.', 'JUEZ LIC. IGNACIO GUZMAN COLIN REMITE OFICIO 10050, C. A. 1843/2014, SOLICITANDO INFORME EL NUMERO DE CARPETA DE INVESTIGACION CON QUE SE RADICO EL ESTADO QUE GUARDA Y NOMBRE DEL FISCAL ENCARGADO DE LA INVESTIGACION Y DOMICILIO DONDE SE LOCALICE.\r\n', 'MJ0345420181.pdf', 1, '2018-09-21 17:53:00', '2018-09-24 13:43:00', '2018-08-31');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (83, 'CIRCULAR INTERNA 15', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIO PARTICULAR ', 'POR EL MEDIO DE ESTE OFICIO LE PIDO CORDIALMENTE LA BÚSQUEDA DE ANTONIO MANJARREZ ', 'CIRCULAR_INTERNA_15.pdf', 1, '2018-09-25 09:27:00', '2018-09-26 11:39:00', '2018-09-26');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (84, '400LK2100-1395/2018', 'LIC. JULIO GUILLERMO ORTIZ BERNAL.', 'SECRETARIO PARTICULAR ', 'EN COLABORACIÓN DE LA BÚSQUEDA DE LA PERSONA VICENTE CONTRERAS', '400LK2100-13952018.pdf', 1, '2018-09-25 12:34:00', '2018-09-25 00:00:00', '2019-01-16');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (85, '10772/2018', 'DR. GUILLERMO E. GONZALEZ MEDINA.', 'SECRETARIO PARTICULAR', 'BÚSQUEDA DE PERSONA EN EL SAN MATEO OXTA', '107722018.pdf', 1, '2018-09-27 09:30:00', '2018-09-27 13:41:00', '2018-09-25');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (86, 'CIRCULAR INTERNA 657', 'LIC. JULIO GUILLERMO ORTIZ BERNAL.', 'SECRETARIO PARTICULAR', 'PRUEBA PARA LA INSERCIÓN DEL  OFICIO SEGUIMIENTO', 'CIRCULAR_INTERNA_657.pdf', 1, '2019-01-15 05:36:00', '2019-01-16 12:42:00', '2019-01-09');


#
# TABLE STRUCTURE FOR: oficio_seguimiento
#

DROP TABLE IF EXISTS `oficio_seguimiento`;

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT,
  `nomenclatura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` datetime NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL,
  `id_oficioEntrada` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioseg`),
  KEY `oficio_seguimiento_ibfk_1` (`atencion`),
  KEY `oficio_seguimiento_ibfk_2` (`id_etAsunto`),
  KEY `oficio_seguimiento_ibfk_3` (`id_destinatario`),
  KEY `oficio_seguimiento_ibfk_4` (`id_ruta`),
  KEY `oficio_seguimiento_ibfk_5` (`id_informar`),
  KEY `oficio_seguimiento_ibfk_7` (`id_oficioEntrada`),
  CONSTRAINT `oficio_seguimiento_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `oficio_seguimiento_ibfk_2` FOREIGN KEY (`id_etAsunto`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `oficio_seguimiento_ibfk_3` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `oficio_seguimiento_ibfk_4` FOREIGN KEY (`id_ruta`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `oficio_seguimiento_ibfk_7` FOREIGN KEY (`id_oficioEntrada`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (105, '400LIA000/0001/2019', '2019-02-04', 121, '2019-02-05 16:42:00', 121, 'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION \r\n', 1, 123, 156, 'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n', 86);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (106, '400LI0010/0041/2019', '2019-02-04', 122, '2019-02-06 17:47:00', 122, 'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n', 1, 124, 157, 'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n', 82);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (108, '400LIA000/0003/2019', '2019-02-05', 124, '2019-02-06 14:43:00', 124, 'REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS\r\n', 1, 126, 159, 'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n', 85);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (110, '400LIA000/0004/2019', '2018-09-26', 126, '2019-02-13 14:43:00', 126, 'SE ESPERA RESPUESTA EN 24 HORAS', 1, 128, 161, 'EL OFICIO MJO03454/2018 FUE EMITIDO DIRECTAMENTE A LA FISCALÍA DE SECUESTROS DE ZONA ORIENTE POR LO QUE SE DA CONTESTACIÓN DIRECTA AL JUEZ DE CONTROL DE TIEMPO Y FORMA.', 84);


#
# TABLE STRUCTURE FOR: ruta_oficio
#

DROP TABLE IF EXISTS `ruta_oficio`;

CREATE TABLE `ruta_oficio` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `realiza_diligencias` int(11) NOT NULL,
  `recibir_personalmente` int(11) NOT NULL,
  `gestionar_peticion` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `otras` varchar(250) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (86, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (87, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (88, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (89, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (90, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (91, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (92, 0, 1, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (93, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (94, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (95, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (96, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (97, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (98, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (99, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (100, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (101, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (102, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (103, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (104, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (105, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (106, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (107, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (108, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (109, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (110, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (111, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (112, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (113, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (114, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (115, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (116, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (117, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (118, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (119, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (120, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (121, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (122, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (123, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (124, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (125, 1, 0, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (126, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (127, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (128, 0, 1, 0, 0, '');


#
# TABLE STRUCTURE FOR: tipousuario
#

DROP TABLE IF EXISTS `tipousuario`;

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (1, 'ADMINISTRADOR');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (2, 'COORDINADOR GENERAL');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (3, 'SECRETARIADO');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (4, 'CAPTURA');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (5, 'CONSULTA');


#
# TABLE STRUCTURE FOR: usuario
#

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`),
  KEY `id_dependencias` (`id_dependencias`),
  CONSTRAINT `usuario` FOREIGN KEY (`id_dependencias`) REFERENCES `dependencias` (`id_dependencias`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (1, 'ADMINISTRADOR', 'ADMIN', 'ADMIN', 1, 'mmendezg@fiscaliaedomex.gob.mx', 'c3VwZXJ1c3Vhcmlv', 1, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (2, 'lprueba', 'coordinador', 'pruebacoord', 1, 'lprueba@gmail.com', 'Y29vcmRpbmFkb3I=', 2, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (3, 'Secretaria', 'psecretariado', 'psecretariado', 1, 'secretariado@gmail.com', 'c2VjcmV0YXJpYWRv', 3, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (4, 'RODRIGO', 'ARCHUNDIA', 'BARRIENTOS', 1, 'rarchundia@fiscaliaedomex.gob.mx', 'cmFyY2h1bmRpYQ==', 2, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (6, 'ABRAHAM', 'ESTEBAN', 'ACOSTA', 1, 'aestebana@fiscaliaedomex.gob.mx', 'YWVzdGViYW5h', 2, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (7, 'PCaptura', 'P', 'Captura', 1, 'captura@fiscaliaedomex.gob.mx', 'Y2FwdHVyYTE=', 4, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (8, 'MCONSULTA', 'MCONSULTA', 'MCONSULTA', 1, 'mconsulta@gmail.com', 'bWNvbnN1bHRh', 5, 1);


