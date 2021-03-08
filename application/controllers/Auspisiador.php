<?php

class Auspisiador extends CI_controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Auspisiador_model');
    }

    function index(){
        $data['auspisiador'] = $this->Auspisiador_model->get_all_auspisiadores();
        $data ['_view'] = 'auspisiador/index';
        $this->load->view('layouts/main',$data);
    }

    function add(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('auspisiador_name','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())     
        {
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['auspisiador_image']['name'])){
		
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/auspisiadores/';
                        $img_full_path = $config['upload_path'];

                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['image_library'] = 'gd2';
                        $config['max_size'] = 0;
                        $config['max_width'] = 7900;
                        $config['max_height'] = 7900;
                        
                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('auspisiador_image');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/auspisiadores/';
                            $conf['maintain_ratio'] = FALSE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 120;
                            $conf['height'] = 120;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/auspisisadores/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/auspisiadores/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }
            /* *********************FIN imagen***************************** */
            $params = array(
                'auspisiador_name' => $this->input->post('auspisiador_name'),
                'auspisiador_image' => $foto,
                'auspisiador_url' => $this->input->post('auspisiador_url'),
            );
            
            $auspisiador_id = $this->Auspisiador_model->addAuspisiador($params);
            redirect('auspisiador/index');
        }
        else
        {   
            $data['_form'] = 'auspisiador/form_auspisiador';    
            $data['_view'] = 'auspisiador/add';
            $this->load->view('layouts/main',$data);
        }
    }  
    
    function edit($auspisiador_id){   
        $data['auspisiador'] = $this->Auspisiador_model->get_auspisiador($auspisiador_id);
        if(isset($data['auspisiador']['auspisiador_id'])){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('auspisiador_name','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run()){
                /* *********************INICIO imagen***************************** */
                $foto="";
                    $foto1= $this->input->post('auspisiador_image1');
                if (!empty($_FILES['auspisiador_image']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/auspisiadores/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 7900;
                    $config['max_height'] = 7900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('auspisiador_image');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/auspisiadores/';
                        $conf['maintain_ratio'] = FALSE;
                        $conf['create_thumb'] = FALSE;
                        // $conf['width'] = 120;
                        // $conf['height'] = 120;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                    }
                    /* ********************F I N  para resize***************************** */
                    $base_url = explode('/', base_url());
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/auspisiadores/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/auspisiadores/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/auspisiadores/'."thumb_".$new_name.$extension;
                    $confi['create_thumb'] = FALSE;
                    $confi['maintain_ratio'] = TRUE;
                    $confi['width'] = 50;
                    $confi['height'] = 50;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($confi);
                    $this->image_lib->resize();

                    $foto = $new_name.$extension;
                }else{
                    $foto = $foto1;
                }
            /* *********************FIN imagen***************************** */
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'auspisiador_name' => $this->input->post('auspisiador_name'),
                    'auspisiador_image' => $foto,
                    'auspisiador_url' => $this->input->post('auspisiador_url'),
                );

                $this->Auspisiador_model->update_auspisiador($auspisiador_id,$params);            
                redirect('auspisiador/index');
            }
            else
            {
                $estado_tipo = 1;
                $this->load->model('Estado_model');
                // $data['iconos'] = $this->Icono_model->get_all_icon();
                $data['all_estado'] = $this->Estado_model->get_estado_tipo($estado_tipo);            
                $data['_form'] = 'auspisiador/form_auspisiador';
                $data['_view'] = 'auspisiador/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The categoria you are trying to edit does not exist.');
    } 

    function remove(){

    }

}