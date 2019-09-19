<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
    } 

    /*
     * Listing of categoria
     */
    function index()
    {
        $data['categoria'] = $this->Categoria_model->get_all_categoria();
        
        $data['_view'] = 'categoria/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new categoria
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('categoria_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())     
        {
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['categoria_imagen']['name'])){
		
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/categorias/';
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
                        $this->upload->do_upload('categoria_imagen');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/categorias/';
                            $conf['maintain_ratio'] = TRUE;
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
                        $confi['source_image'] = './resources/images/categorias/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/categorias/'."thumb_".$new_name.$extension;
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
                    
                    $estado_id        = 1;
                    $categoria_vistas = 0;
            $params = array(
                'estado_id' => $estado_id,
                'categoria_nombre' => $this->input->post('categoria_nombre'),
                'categoria_imagen' => $foto,
                'categoria_vistas' => $categoria_vistas,
            );
            
            $categoria_id = $this->Categoria_model->add_categoria($params);
            redirect('categoria/index');
        }
        else
        {            
            $data['_view'] = 'categoria/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a categoria
     */
    function edit($categoria_id)
    {   
        // check if the categoria exists before trying to edit it
        $data['categoria'] = $this->Categoria_model->get_categoria($categoria_id);
        
        if(isset($data['categoria']['categoria_id']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('categoria_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                    $foto1= $this->input->post('categoria_imagen1');
                if (!empty($_FILES['categoria_imagen']['name']))
                {
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/categorias/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 7900;
                    $config['max_height'] = 7900;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('categoria_imagen');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/categorias/';
                        $conf['maintain_ratio'] = TRUE;
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
                    //$directorio = base_url().'resources/imagenes/';
                    $base_url = explode('/', base_url());
                    //$directorio = FCPATH.'resources\images\productos\\';
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/categorias/';
                    //$directorio = $_SERVER['DOCUMENT_ROOT'].'/ximpleman_web/resources/images/productos/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          //$mimagenthumb = str_replace(".", "_thumb.", $foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/categorias/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/categorias/'."thumb_".$new_name.$extension;
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
                    'categoria_nombre' => $this->input->post('categoria_nombre'),
                    'categoria_imagen' => $foto,
                    'categoria_vistas' => $this->input->post('categoria_vistas'),
                );

                $this->Categoria_model->update_categoria($categoria_id,$params);            
                redirect('categoria/index');
            }
            else
            {
                $estado_tipo = 1;
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_estado_tipo($estado_tipo);            
                
                $data['_view'] = 'categoria/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The categoria you are trying to edit does not exist.');
    } 

    /*
     * Deleting categoria
     */
    function remove($categoria_id)
    {
        $categoria = $this->Categoria_model->get_categoria($categoria_id);

        // check if the categoria exists before trying to delete it
        if(isset($categoria['categoria_id']))
        {
            $this->Categoria_model->delete_categoria($categoria_id);
            redirect('categoria/index');
        }
        else
            show_error('The categoria you are trying to delete does not exist.');
    }
    /*
     * muestra al publico lo que hay en la categoria seleccionada
     */
    function vercategoria($categoria_id)
    {
        $data['categoria_id']  = $categoria_id;
        $data['all_categoria'] = $this->Categoria_model->get_all_categoriactiva();
        
        //$data['_view'] = 'categoria/vercategoria';
        $this->load->view('categoria/vercategoria',$data);
        
    }
}
