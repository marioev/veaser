<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Mensaje extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensaje_model');
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

    /*
     * Listing of mensaje
     */
    function index()
    {
        if($this->acceso(124)){
            // $data['mensaje'] = $this->Mensaje_model->get_all_mensaje();
            $msj = $this->Mensaje_model->get_all_mensaje();
            $file_msj = fopen("resources/json/msj.txt", "w") or die("Problemas al crear el archivo mjs");
            fwrite($file_msj, '{ "data":');
            fwrite($file_msj, json_encode($msj));
            fwrite($file_msj, '}');
            fclose($file_msj);
            $data['page_title'] = "Mensaje";
            $data['_view'] = 'mensaje/index';
            $this->load->view('layouts/main',$data);
        }
    }
    
    /* ***** cambiar estado a leido ***** */
    function buscarmensaje()
    {
        //if($this->acceso(31)){
            if ($this->input->is_ajax_request()){
                $parametro = $this->input->post('parametro');
                $limite = $this->input->post('lim');
                $elestado = $this->input->post('elestado');

                //if ($mensaje_id!="")
                //{
                    $estado_id = 4;
                    $params = array(
                        'estado_id' => $estado_id,
                    );
                    $datos = $this->Mensaje_model->get_busqueda_mensaje_parametro($parametro, $limite, $elestado);
                    
                    echo json_encode($datos);
                //}
                //else echo json_encode(null);
            }
            else
            {                 
                show_404();
            }
        //}
    }
    
    /* ***** cambiar estado a leido ***** */
    function cambiar_estado()
    {
        //if($this->acceso(31)){
            if ($this->input->is_ajax_request()){
                $mensaje_id = $this->input->post('mensaje_id');

                if ($mensaje_id!="")
                {
                    $estado_id = 4;
                    $params = array(
                        'estado_id' => $estado_id,
                    );
                    $this->Mensaje_model->update_mensaje($mensaje_id,$params);
                    
                    echo json_encode("ok");
                }
                else echo json_encode(null);
            }
            else
            {                 
                show_404();
            }
        //}
    }
    
    /*
     * responder a mensaje
     */
    function responder($mensaje_id)
    {
        if($this->acceso(121)){
            $data['page_title'] = "Responder mensaje";
        // check if the empresa exists before trying to edit it
        $data['mensaje'] = $this->Mensaje_model->get_this_mensaje($mensaje_id);
        
        if(isset($data['mensaje']['mensaje_id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mensaje_respuesta','Respuesta','required');

            if($this->form_validation->run())     
            {
                $fecha_mensajerespuesta = date('Y-m-d H:i:s');
                $params = array(
                    'mensaje_respuesta' => $this->input->post('mensaje_respuesta'),
                    'mensaje_fechahoraresp' => $fecha_mensajerespuesta,
                );
                $this->Mensaje_model->update_mensaje($mensaje_id,$params);
                
                $this->load->model('Empresa_model');
                $empresa_id = 1;
                $data['empresa'] = $this->Empresa_model->get_this_empresa($empresa_id);
                $this->load->library('email');
                $micorreo = $data['empresa']['empresa_email'];
                $miempresa = $data['empresa']['empresa_nombre'];
                $this->email->from($micorreo, $miempresa);
                $this->email->to($data['mensaje']['mensaje_email']);
                $this->email->cc($micorreo);
                //$this->email->bcc('them@their-example.com');
                $this->email->subject('Respuesta');
                $this->email->message($this->input->post('mensaje_respuesta'));
                $this->email->set_mailtype('html');
                $this->email->send();
                redirect('mensaje');
            }
            else
            {
                $data['_view'] = 'mensaje/responder';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The empresa you are trying to edit does not exist.');
        }
    }
    
    
}
