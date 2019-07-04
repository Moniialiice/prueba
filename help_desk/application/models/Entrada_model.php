<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 30/08/2018
 * Time: 02:52 PM
 */

class Entrada_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function lastID(){
        $query = $this->db->query("SELECT e.control FROM oficio_entrada as e ORDER BY e.control DESC LIMIT 1");
        return $query->result();
    }
    //funcion para dar de alta el oficio de entrada
    public function createOficio($control,$no_oficio,$firma_origen,$cargo,$peticion,$arch_entrada,$id_usuario,$fecha,$fecha2,$fecha_r)
    {
        $query = $this->db->query("INSERT INTO oficio_entrada(control, no_oficioEntrada, firma_origen, cargo, peticion, arch_entrada, atencion, fecha_ent, fecha_rec, fecha_real) VALUES ('$control','$no_oficio','$firma_origen','$cargo','$peticion','$arch_entrada','$id_usuario','$fecha','$fecha2','$fecha_r')");
        if ($query) {
            return true;
        }else{
            return false;
        }
        $this->db->close();
    }
    //consulta con fecha y no. de nomenclatura del oficio entrada muestra datos y para general excel
    public function searchFecha($control,$search,$firma,$date1,$date2)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.control, e.no_oficioEntrada, e.firma_origen, e.cargo, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.control LIKE '%$control%' AND e.no_oficioEntrada LIKE '%$search%' AND e.firma_origen LIKE '%$firma%' AND e.fecha_rec BETWEEN '$date1 00:00:00' AND '$date2 23:59:59' AND e.atencion = u.id_usuario ORDER BY e.control DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta de los oficios de entrada con el id de quien atendio el oficio para mostrara datos (nivel de perfil 4) 
    public function reportEntradaId($id)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.cargo, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, e.atencion, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario and e.atencion='$id' ORDER BY e.fecha_rec DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta de oficio de entrada mediante fecha inicio, fecha final y nomenclatura qué el usuario ha creado
    public function reportFI($search, $date1, $date2, $id){
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.cargo, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.no_oficioEntrada LIKE '%$search%' AND e.fecha_real BETWEEN '$date1' AND '$date2' AND e.atencion = u.id_usuario AND u.id_usuario = '$id' ORDER BY e.fecha_rec DESC");
        $this->db->close();
        return $query->result();
    }
}