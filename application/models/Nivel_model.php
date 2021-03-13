<?php

class Nivel_model  extends CI_Model 
{
    function __construct(){
        parent::__construct();
    }
    /**
     * Obtener todos los niveles
     */
    function get_all_niveles(){
        return $this->db->query(
            "SELECT n.*, e.estado_descripcion
            FROM nivel as n, estado as e
            WHERE n.estado_id = e.estado_id"
            )->result_array();
    }
    /**
     * Añadir un nuevo nivel
     */
    function add_nivel($params){
        $this->db->insert('nivel',$params);
        return $this->db->insert_id();
    }
}