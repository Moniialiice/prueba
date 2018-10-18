/**funcion para insertar en la tabla informar*/
DELIMITER //
CREATE FUNCTION insertInformar (oficina INT, peticionario INT, requiriente INT)
RETURNS INT
BEGIN 
    DECLARE ID INT;
    INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    SELECT LAST_INSERT_ID() INTO ID;
    RETURN ID;
END;
//
/**FUNCION PARA INSERTAR EN LA TABLA etiquetas_asunto*/
DELIMITER //
CREATE FUNCTION insertEtiquetas (colaboracion INT, amparo INT, solicitudes INT, gestion INT, cursos INT, juzgados INT, rh INT, telefonia INT, estadistica INT, ri INT, boletas INT, conocimiento INT)
RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
    //
/**FUNCION PARA INSERTAR EN TABLA destinatario */
DELIMITER //
CREATE FUNCTION insertDestinatario (conase INT, toluca INT, mexico INT, zoriente INT, fgeneral INT, vicefiscalia INT, oficialia INT, informacion INT, central INT, servicio INT, otrad LONGTEXT)
RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
        //
/**funcion para insertar en la tabla ruta_oficio */
DELIMITER //
CREATE FUNCTION insertRutaOficio (diligencia INT, personalmente INT, gestionar INT, archivo INT, otrar INT)
    RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
        //     
/**funcion para insertar en la tabla oficio seguimiento */
DELIMITER //
CREATE FUNCTION insertOficioS (nomeclatura varchar(50), fecha DATE, id_etAsunto INT, termino INT, id_destinatario INT, observaciones LONGTEXT, atencion INT, id_ruta INT, id_informar INT, asunto INT, id_entrada INT)
    RETURNS INT
    BEGIN
    	DECLARE ID INT;
        INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, arch_seguimiento, arch_final, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) VALUES (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, '', '', atencion, id_ruta, id_informar, asunto, id_entrada);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
    // 