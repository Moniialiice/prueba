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
    //muestra id y número de oficio del oficio recepción para agregarlos al nuevo oficio
    public function datosEntrada($id)
    {
        $query = $this->db->query("SELECT id_oficioEntrada, no_oficioEntrada FROM oficio_entrada WHERE id_oficioEntrada = '$id'");
        return $query->result();
    }
    //etiquetas_asunto 
    public function insert_etiquetas($colaboracion,$amparo,$solicitudes,$gestion,$cursos,$juzgados,$rh,$telefonia,$estadistica,$ri,$boletas,$conocimiento){
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
    public function createOficio($nomenclatura,$fecha,$hora,$id_destinatario,$id_etAsunto,$id_informar,$termino,$observaciones,$arc_opcional,$arc_final, $id_entrada)
    {
        $query = $this->db->query("INSERT INTO oficio_seguimientos (nomenclatura,fecha,hora,id_destinatario,id_etAsunto,id_informar,termino,observaciones,arch_seguimiento,arch_final) 
                                      VALUES ('$nomenclatura','$fecha','$id_destinatario','$id_etAsunto','$id_informar','$termino','$observaciones','$arc_opcional','$arc_final','$id_entrada')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //consulta oficios donde la fecha, nomenclatura o termino sean igual a la busqueda
    public function searchOficio($search)
    {
        $query = $this->db->query("SELECT o.nomenclatura, o.fecha, o.hora, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra FROM oficio_seguimiento AS o, destinatario AS d WHERE fecha LIKE '%$search%' AND nomenclatura LIKE '%$search%' AND termino LIKE '%$search%' AND o.id_destinatario = d.id_destinatario ");
        return $query->result();
    }
    //realiza consulta de Oficio mediante id, carga datos del destinatario
    public function report($id)
    {
        $query = $this->db->query("SELECT o.nomenclatura, o.fecha, o.hora, o.asunto, o.termino, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u WHERE d.id_destinatario = o.id_destinatario AND u.id_usuario = o.atencion AND id_oficioseg = '$id' ");
        return $query->result();
    }
    //consulta de oficio y destinatario mediante el id para generar reporte
    public function reportOficio()
    {
        $query = $this->db->query("SELECT o.nomenclatura, o.fecha, o.hora, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra FROM oficio_seguimiento AS o, destinatario AS d  WHERE d.id_destinatario = o.id_destinatario ");
        return $query->result();
    }
    public function updateOficio($id){
        $query = $this->db->query("UPDATE oficio_seguimiento SET arch_final='', apellidop = '$app', apellidom = '$apm', activo = '$activo', usuario = '$usuario', password = '$password', id_tipoUsuario = '$tipoUser', id_dependencias = '$dependencia' WHERE id_usuario = '$id'");
    }
}
