<?php

class Categoria_cliente_model extends CI_model{
    function __construct(){
        parent::__construct();
    }

    function get_all_cat_cliente(){
        $this->db->select('c.*');
        $this->db->from('categoria_cliente as c');
        // $this->db->join('estado as e', 'c.estado_id = e.estado_id');
        // $this->db->order_by('c.categoria_nombre', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}