<?php 

class Atendido_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }  
    //consulta datos del oficio seguimiento 
    public function datosSeguimiento($id)
    {
        $query = $this->db->query("SELECT id_oficioseg, nomenclatura FROM oficio_seguimiento WHERE id_oficioseg='$id'");
        return $query->result();
    }
    //consulta si el oficio atendido ya existe
    public function seguimientoAtendido($id)
    {
        $query = $this->db->query("SELECT id_oficioseg FROM oficio_atendido WHERE id_oficioseg='$id'");
        return $query->result();
    }
    //inserción de datos atendido
    public function insert_Atendido($fecha1, $asunto, $nombre, $cargo, $descripcion, $archivo, $copia, $segui, $atencion)
    {
        $query = $this->db->query("INSERT INTO oficio_atendido (fecha_atendido, asunto, nombre_aten, cargo_aten, descripcion, arch_atendido, copia_a, id_oficioseg, atencion) VALUES ('$fecha1', '$asunto', '$nombre', '$cargo', '$descripcion', '$archivo', '$copia', '$segui', '$atencion')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //obtiene id del oficio atención en la tabla oficio_atendido mediante id_oficioseg
    public function getIDA($id)
    {
        $query = $this->db->query("SELECT id_oficioAtendido FROM oficio_atendido WHERE id_oficioseg='$id' ");
    }  
    //consulta los datos del oficio atendido por id, oficio seguimiento y datos de usuario
    public function consultaAtendido($id)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido, a.fecha_atendido, a.asunto, a.nombre_aten, a.cargo_aten, a.descripcion, a.arch_atendido, a.copia_a, u.id_usuario, u.nombre, u.apellidop, u.apellidom, s.id_oficioseg, s.nomenclatura FROM oficio_atendido as a, usuario as u, oficio_seguimiento as s WHERE u.id_usuario = a.atencion AND s.id_oficioseg = a.id_oficioseg AND a.id_oficioAtendido = '$id'");
        return $query->result();
    }
    //consulta por nomenclatura y fecha de atendido
    public function searchfechaAtendido($search, $fecha1, $fecha2)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido, a.fecha_atendido, a.asunto, a.nombre_aten, a.cargo_aten, a.descripcion, a.arch_atendido, a.copia_a, u.id_usuario, u.nombre, u.apellidop, u.apellidom, s.id_oficioseg, s.nomenclatura FROM oficio_atendido as a, usuario as u, oficio_seguimiento as s WHERE s.nomenclatura LIKE '%$search%' AND a.fecha_atendido BETWEEN STR_TO_DATE(REPLACE('$fecha1','/','-'), GET_FORMAT(date,'ISO')) AND STR_TO_DATE(REPLACE('$fecha2','/','-'), GET_FORMAT(date,'ISO')) AND u.id_usuario = a.atencion AND s.id_oficioseg = a.id_oficioseg");
        return $query->result();
    }
    //   


}
