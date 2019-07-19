<?php 

class Atendido_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    //se obtiene ultima nomenclatura de oficio seguimiento
    public function getNom($nom){
        $query = $this->db->query("SELECT id_oficioseg, nomenclatura FROM oficio_seguimiento WHERE nomenclatura LIKE '%$nom%' ORDER by id_oficioseg DESC LIMIT 1");
        $this->db->close();
        return $query->result();
    } 
    //se obtiene ultima nomenclatura de oficio seguimiento
    public function getNomAtendido($nom){
        $query = $this->db->query("SELECT id_oficioAtendido, nomenclatura_aten FROM oficio_atendido WHERE nomenclatura_aten LIKE '%$nom%' ORDER BY id_oficioAtendido DESC LIMIT 1");
        $this->db->close();
        return $query->result();
    }    
    //obtener el id de oficio seguimiento por medio de nomenclatura
    public function getIDAt($nomenclatura)
    {
        $query = $this->db->query("SELECT id_oficioAtendido FROM oficio_atendido WHERE nomenclatura_aten = '$nomenclatura'");
        $this->db->close();
        return $query->result();
    }
    //inserción de datos atendido
    public function insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion)
    {
        $query = $this->db->query("INSERT INTO oficio_atendido (nomenclatura_aten, fecha_atendido, nombre_aten, cargo_aten, descripcion, arch_atendido, copia_a, atencion) VALUES ('$nomenclatura', '$fecha1', '$nombre', '$cargo', '$descripcion', '$archivo', '$copia', '$atencion')");
        $this->db->close();
        if($query){
            return true;
        }else{
            return false;
        }
    } 
    //consulta datos del oficio seguimiento 
    public function datosSeguimiento($id)
    {
        $query = $this->db->query("SELECT id_oficioseg, nomenclatura, asunto FROM oficio_seguimiento WHERE id_oficioseg='$id'");
        $this->db->close();
        return $query->result();
    }
    //consulta si el oficio atendido ya existe
    public function seguimientoAtendido($id)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido FROM oficio_atendido as a, oficio_seguimiento as s, re_seg_aten as r WHERE a.id_oficioAtendido = r.id_aten AND s.id_oficioseg = r.id_seg AND s.id_oficioseg = '$id'");
        $this->db->close();
        return $query->result();
    }
    //inserción de datos atendido
    public function insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $segui, $atencion)
    {
        $query = $this->db->query("SELECT insertAtenSeg ('$nomenclatura', '$fecha1', '$nombre', '$cargo', '$descripcion', '$archivo', '$copia', '$atencion', '$segui')");
        $this->db->close();
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
        $this->db->close();
        return $query->result();
    }  
    //consulta los datos del oficio atendido por id_oficioAtendido, oficio seguimiento y datos de usuario
    public function consultaAtendido($id)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido, a.nomenclatura_aten, a.fecha_atendido, a.nombre_aten, a.cargo_aten, a.descripcion, a.arch_atendido, a.copia_a, a.atencion, u.nombre, u.apellidop, u.apellidom FROM oficio_atendido as a, usuario as u WHERE u.id_usuario = a.atencion AND a.id_oficioAtendido = '$id'");
        $this->db->close();
        return $query->result();
    }
    //actualización de los datos del oficio atendido
    public function updateAtendido($ida, $fecha, $nombre, $cargo, $descripcion, $copia, $archivo)
    {
        $query = $this->db->query("UPDATE oficio_atendido SET fecha_atendido = '$fecha', nombre_aten = '$nombre', cargo_aten = '$cargo', descripcion = '$descripcion', arch_atendido = '$archivo', copia_a = '$copia' WHERE id_oficioAtendido = $ida");
        $this->db->close();
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //consulta nomenclatura de oficio seguimiento para bitacora 
    public function nomenBit($id)
    {
        $query = $this->db->query("SELECT nomenclatura_aten FROM oficio_atendido WHERE id_oficioAtendido = '$id'");
        $this->db->close();
        return $query->result();
    }
    //consulta por nomenclatura y fecha de atendido
    public function searchfechaAtendido($search, $fecha1, $fecha2)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido, a.nomenclatura_aten, a.fecha_atendido, a.nombre_aten, a.cargo_aten, a.descripcion, a.arch_atendido, a.copia_a, u.nombre, u.apellidop, u.apellidom FROM oficio_atendido as a, usuario as u WHERE a.nomenclatura_aten LIKE '%$search%' AND a.fecha_atendido BETWEEN '$fecha1' AND '$fecha2' AND a.atencion = u.id_usuario ORDER BY a.fecha_atendido DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta por nomenclatura y fecha de atendido y id del usuario que realizo el oficio 
    public function searchAtenFI($search, $fecha1, $fecha2, $id)
    {
        $query = $this->db->query("SELECT a.id_oficioAtendido, a.nomenclatura_aten, a.fecha_atendido, a.nombre_aten, a.cargo_aten, a.descripcion, a.arch_atendido, a.copia_a, u.id_usuario, u.nombre, u.apellidop, u.apellidom FROM oficio_atendido as a, usuario as u WHERE a.nomenclatura_aten LIKE '%$search%' AND a.fecha_atendido BETWEEN '$fecha1' AND '$fecha2' AND a.atencion = u.id_usuario AND u.id_usuario = '$id' ORDER BY a.fecha_atendido DESC ");
        $this->db->close();
        return $query->result();
    }
    //consulta datos para el oficio en pdf
    public function reportOficioAtendido($id)
    {
        $query = $this->db->query("SELECT nomenclatura_aten, fecha_atendido, nombre_aten, cargo_aten, descripcion, copia_a, atencion FROM oficio_atendido WHERE id_oficioAtendido = $id");
        $this->db->close();
        return $query->result();
    }
}
