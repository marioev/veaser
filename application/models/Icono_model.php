<?php

class Icono_model extends CI_model{

    //Obtener toda la galeria de iconos 
    function get_all_icons(){
        $this->db->select('i.icono_id, i.icono_etiqueta');
        $this->db->from('icono as i');;
        $query = $this->db->get();
        return $query->result_array();
    }

    // 
}