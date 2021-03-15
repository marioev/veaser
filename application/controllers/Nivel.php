<?php

class Nivel extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Nivel_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if(1 == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    } 

    function index(){
        $niveles = $this->Nivel_model->get_all_niveles();
        $data['niveles'] = $niveles; //se manda todos los niveles existentes en db
        $data['_view'] = 'nivel/index';
        $this->load->view('layouts/main',$data);
    }

    function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nivel_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run()){           
            $estado_id = 1;
            $params = array(
                'estado_id' => $estado_id,
                'nivel_nombre' => $this->input->post('nivel_nombre'),
                'nivel_puntaje_min' => $this->input->post('nivel_puntaje_min'),
                'nivel_puntaje_max' => $this->input->post('nivel_puntaje_max')
            );
            
            $categoria_id = $this->Nivel_model->add_nivel($params);
            redirect('nivel/index');
        }else{   
            $data['_form'] = 'nivel/form_nivel';    
            $data['_view'] = 'nivel/add';
            $this->load->view('layouts/main',$data);
        }
    }

    function edit($nivel_id){   
        $data['nivel'] = $this->Nivel_model->get_nivel($nivel_id);
        
        if(isset($data['nivel']['nivel_id'])){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nivel_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run()){
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'nivel_nombre' => $this->input->post('nivel_nombre'),
                    'nivel_puntaje_min' => $this->input->post('nivel_puntaje_min'),
                    'nivel_puntaje_max' => $this->input->post('nivel_puntaje_max')
                );

                $this->Nivel_model->update_nivel($nivel_id,$params);            
                redirect('nivel/index');
            }else{
                $estado_tipo = 1;
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_estado_tipo($estado_tipo);            
                $data['_form'] = 'nivel/form_nivel';
                $data['_view'] = 'nivel/edit';
                $this->load->view('layouts/main',$data);
            }
        }else
            show_error('The categoria you are trying to edit does not exist.');
    }

    function puntaje_anterior($nivel_id){
        if ($this->input->is_ajax_request()){
            // $nivel_id = $this->input->post('nivel_id');
            $puntaje_max = $this->Nivel_model->get_puntajes_max($nivel_id);
            echo json_encode($puntaje_max);
        }
    }

    function puntaje_anterior_add(){
        if ($this->input->is_ajax_request()){
            $nivel_id = 0;
            $puntaje_max = $this->Nivel_model->get_puntajes_max($nivel_id);
            echo json_encode($puntaje_max);
        }
    }
}