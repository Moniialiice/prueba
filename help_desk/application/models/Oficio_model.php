<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 21/08/2018
 * Time: 06:02 PM
 */
class Oficio_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    //funcion para insertar oficio
    public function insertpru ($colaboracion,$amparo,$solicitudes,$gestion,$cursos,$juzgados,$rh,$telefonia,$estadistica,$ri,$boletas,$conocimiento,$conase,$toluca,$mexico,$zoriente,$fgeneral,$vicefiscalia,$oficialia,$informacion,$central,$servicio,$otrad,$diligencia,$personalmente,$gestionar,$archivo,$otrar,$oficina,$peticionario,$requiriente,$nomenclatura,$fecha,$id_etAsunto,$termino,$id_destinatario,$observaciones,$arc_opcional,$arc_final,$atencion,$id_ruta,$id_informar,$asunto,$id_entrada)
    {
        $query = $this->db->query("CREATE FUNCTION insertOficio(IN colaboracion INT, IN amparo INT, IN solicitudes INT, IN gestion INT, IN cursos INT, IN juzgados INT, IN rh INT, IN telefonia INT, IN estadisctica INT, IN relaciones_interis INT, IN boletas_audiencia INT, IN copias_conocimiento INT
                                    IN conase INT, IN toluca INT, IN mexico INT, IN zoriente INT, IN fgeneral INT, IN vicefiscalia INT, IN oficialia INT, IN informacion INT, IN central INT, IN servicio INT, IN otrad LONGTEXT,
                                    IN diligencia INT, IN personalmente INT, IN gestionar INT, IN archivo INT, IN otrar LONGTEXT, IN oficina INT, IN peticionario INT, IN requiriente INT, 
                                    IN nomenclatura VARCHAR(100), IN fecha DATE, IN id_etAsunto INT, IN termino INT, IN id_destinatario INT, IN observaciones LONGTEXT, IN arc_opcional VARCHAR(100), IN arc_final VARCHAR(100), IN atencion INT, IN id_ruta INT, IN id_informar INT, IN asunto LONGTEXT, IN id_entrada INT )
                                    BEGIN 
                                        INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) 
                                        VALUES('colaboracion', 'amparo', 'solicitudes', 'gestion', 'cursos', 'juzgados', 'rh', 'telefonia', 'estadistica', 'ri','boletas','conocimiento');
                                        INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) 
                                        VALUES ('conase', 'toluca', 'mexico', 'zoriente', 'fgeneral', 'vicefiscalia', 'oficialia', 'informacion', 'central', 'servicio', 'otrad')
                                        INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) 
                                        VALUES ('diligencia', 'personalmente', 'gestionar', 'archivo', 'otrar');
                                        INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) 
                                        VALUES('oficina','peticionario','requiriente');
                                        INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, arch_seguimiento, arch_final, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) 
                                      VALUES ('nomenclatura', 'fecha', 'id_etAsunto', 'termino', 'id_destinatario', 'observaciones', '', '', 'atencion', 'id_ruta', 'id_informar', 'asunto', 'id_entrada')


                                    ");
        return $query->result();
    } 
    //muestra id y número de oficio del oficio recepción para agregarlos al nuevo oficio
    public function datosEntrada($id)
    {
        $query = $this->db->query("SELECT id_oficioEntrada, no_oficioEntrada FROM oficio_entrada WHERE id_oficioEntrada = '$id'");
        return $query->result();
    }
    //etiquetas_asunto 
    public function insert_etiquetas($colaboracion,$amparo,$solicitudes,$gestion,$cursos,$juzgados,$rh,$telefonia,$estadistica,$ri,$boletas,$conocimiento)
    {
        $query = $this->db->query("INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) 
        VALUES('$colaboracion', '$amparo', '$solicitudes', '$gestion', '$cursos', '$juzgados', '$rh', '$telefonia', '$estadistica', '$ri','$boletas','$conocimiento')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //destinatario
    public function insert_destinatario($conase,$toluca,$mexico,$zoriente,$fgeneral,$vicefiscalia,$oficialia,$informacion,$central,$servicio,$otrad)
    {
        $query = $this->db->query("INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) 
        VALUES ('$conase', '$toluca', '$mexico', '$zoriente', '$fgeneral', '$vicefiscalia', '$oficialia', '$informacion', '$central', '$servicio', '$otrad')");
        if($query){
            return true;
        }else{
            return false;
        }    
    } 
    //aciones-ruta_oficio
    public function insert_acciones($diligencia,$personalmente,$gestionar,$archivo,$otrar)
    {
        $query = $this->db->query("INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) 
        VALUES ('$diligencia', '$personalmente', '$gestionar', '$archivo', '$otrar')");
        if($query){
            return true;    
        }else{
            return false;
        }
    }
    //informar
    public function insert_informar($oficina,$peticionario,$requiriente)
    {
        $query = $this->db->query("INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) 
                                    VALUES('$oficina','$peticionario','$requiriente')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //ingresa los datos en la tabla oficio con las respectivas llaves foraneas
    public function createOficio($nomenclatura,$fecha,$id_etAsunto,$termino,$id_destinatario,$observaciones,$arc_opcional,$arc_final,$atencion,$id_ruta,$id_informar,$asunto,$id_entrada)
    {
        $query = $this->db->query("INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, arch_seguimiento, arch_final, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) 
                                      VALUES ('$nomenclatura', '$fecha', '$id_etAsunto', '$termino', '$id_destinatario', '$observaciones', '', '', '$atencion', '$id_ruta', '$id_informar', '$asunto', '$id_entrada')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //consulta oficios donde la fecha, nomenclatura o termino sean igual a la busqueda
    public function searchOficio($search)
    {
        $query = $this->db->query("SELECT o.id_oficioseg,o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u WHERE fecha LIKE '%$search%' AND nomenclatura LIKE '%$search%' AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario ORDER BY termino ASC");
        return $query->result();
    }

    //consulta con la fecha y nomenclatura de oficio
    public function searchDate($search,$date1,$date2){
        $query = $this->db->query("SELECT o.id_oficioseg,o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u WHERE fecha BETWEEN '$date1' AND '$date2' AND nomenclatura LIKE '%$search%' AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario ORDER BY o.nomenclatura");
        return $query->result();
    }
    //consulta de Oficio mediante id, muestra todos los datos de oficio (usuario, entrada,) 
    public function report($id)
    {
        $query = $this->db->query("SELECT o.id_oficioseg,o.nomenclatura, o.fecha, o.termino, o.observaciones, o.arch_seguimiento, o.arch_final, o.asunto, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, en.id_oficioEntrada, en.no_oficioEntrada, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, etiquetas_asunto AS a, informar AS i, ruta_oficio AS r, oficio_entrada AS en, usuario AS u WHERE d.id_destinatario = o.id_destinatario AND o.id_oficioEntrada = en.id_oficioEntrada AND u.id_usuario = o.atencion AND id_oficioseg = '$id' ");
        return $query->result();
    }
    //Obtiene el termino del oficio para modificar o actualizar
    public function get_termino($id)
    {
        $query = $this->db->query("SELECT termino FROM oficio_seguimiento WHERE id_oficioseg = $id");
        return $query->result();
    }
    //consulta para actualizar
    public function updateOficio($observaciones,$termino,$arch_opcional,$arch_final,$id)
    {
        $query = $this->db->query("UPDATE oficio_seguimiento SET observaciones = '$observaciones', termino = '$termino', arch_seguimiento = '$arch_opcional', arch_final = '$arch_final' WHERE id_oficioseg = '$id'");
        if($query){
            return TRUE; 
        }else{
            return FALSE;
        }
    }
    //consulta de oficio y destinatario mediante el id para generar reporte en pdf 
    public function reportOficio($id)
    {
        $query = $this->db->query("SELECT o.id_oficioseg, o.nomenclatura, o.fecha, o.termino, o.observaciones, o.asunto, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, etiquetas_asunto AS a, informar AS i, ruta_oficio AS r,usuario AS u WHERE d.id_destinatario = o.id_destinatario AND u.id_usuario = o.atencion AND id_oficioseg = '$id'");
        return $query->result();
    }

}
