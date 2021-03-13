<?php
class Producto extends CI_Controller{
    var $session_data;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->model('Galeria_model');
        $this->load->model('Usuario_model');
       if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        //if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
        if(1 == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }

    function index(){
        $data['vendedores'] = $this->Usuario_model->get_vendedores();
        $data['_view'] = 'puntuacion/index';
        $this->load->view('layouts/main',$data);
    }

}
