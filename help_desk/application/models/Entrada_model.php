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

    //consulta de reporte entrada donde oficio ya existe
    public function validaOf($noO)
    {
        $query = $this->db->query("SELECT no_oficioEntrada FROM oficio_entrada WHERE no_oficioEntrada = '$noO'");
        return $query->result();
    }
    //funcion para dar de alta el oficio de entrada
    public function createOficio($no_oficio,$firma_origen,$peticion,$arch_entrada,$id_usuario,$fecha,$fecha_r)
    {
        $query = $this->db->query("INSERT INTO oficio_entrada(no_oficioEntrada,firma_origen,peticion,arch_entrada,atencion,fecha_ent,fecha_real) VALUES ('$no_oficio','$firma_origen','$peticion','$arch_entrada','$id_usuario',' $fecha','$fecha_r')");
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
    //consulta mediante la búsqueda de oficio entrada
    public function searchOficioEntrada($search)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_real, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.no_oficioEntrada LIKE '%$search%' AND e.atencion = u.id_usuario ORDER BY e.fecha_ent DESC ");
        return $query->result();
    }
    //busqueda con fecha y no. de nomenclatura
    public function searchFecha($search,$date1,$date2)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_real, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.no_oficioEntrada LIKE '%$search%' AND e.fecha_real BETWEEN '$date1' AND '$date2' AND e.atencion = u.id_usuario ORDER BY e.fecha_ent DESC ");
        return $query->result();
    }
    //reporte de los oficios de entrada que el usuario ha creado
    public function reportEntrada()
    {
        $query = $this->db->query("SELECT id_oficioEntrada, no_oficioEntrada, firma_origen, peticion, arch_entrada, fecha_ent, u.nombre FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario");
        return $query->result();
    }
    //consulta de los oficios de entrada con el id de quien atendio el oficio
    public function reportEntradaId($id)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.peticion, e.arch_entrada, e.fecha_ent, e.atencion, u.nombre FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario and e.atencion='$id' ORDER BY id_oficioEntrada ASC");
        return $query->result();
    }
    //paginación ejemplo consulta del contador de registros
    public function paginacionEntrada()
    {
        $query = $this->db->query("");
        return $query->result();
    }
    //ejemplo de la paginación
    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("oficio_entrada");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }

    public function get_total()
    {
        return $this->db->count_all("oficio_entrada");
    }

}