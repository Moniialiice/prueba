<?php
  /**
   *
   */
   class welcome_model extends CI_Model{
     public function __construct()
     {
      $this->load->database();
     }

     public function get()
     {
       $consulta = $this->db->query("SELECT * FROM solicitudes ORDER BY id DESC");

        return $consulta->result();
     }

     public function store($edo,$nombre,$paterno,$materno,$telefono,$correo,$asunto,$descripcion,$marca,$modelo,$serie)
     {
       $consulta = $this->db->query("INSERT INTO solicitudes (estado,nombre,paterno,materno,telefono,correo,asunto,descripcion,marca,modelo,serie) VALUES ('$edo','$nombre','$paterno','$materno','$telefono','$correo','$asunto','$descripcion','$marca','$modelo','$serie')");

       if($consulta){
         return true;

       }else {
         return false;

       }

     }
     public function get_peticion($id)
     {
       $consulta = $this->db->query("SELECT * FROM solicitudes where id = '$id' order by id desc limit 1");

        return $consulta->result();
     }

       //consulta de estado

      public function get_estado(){
         $consulta = $this->db->query("SELECT estado FROM solicitudes ORDER BY id DESC");

         return $consulta->result();

      }

     }



