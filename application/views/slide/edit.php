<script type="text/javascript">
    function tamanioimage(){
        var tipo = document.getElementById('slide_tipo').value;
        if(tipo == 1){
            $("#label_imagen").html("Imagen (Ideal 1280 X 500 px)");
        }else{
            $("#label_imagen").html("Imagen (Ideal 1600 X 450 px)");
        }
    }
</script> 
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Slide</h3>
            </div>
            <?php echo form_open_multipart('slide/edit/'.$slide['slide_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="slide_titulo" class="control-label"><span class="text-danger">*</span>Título</label>
                        <div class="form-group">
                            <input type="text" name="slide_titulo" value="<?php echo ($this->input->post('slide_titulo') ? $this->input->post('slide_titulo') : $slide['slide_titulo']); ?>" class="form-control" id="slide_titulo" required />
                            <span class="text-danger"><?php echo form_error('slide_titulo');?></span>
                        </div>
                    </div>
                 
                    <div class="col-md-6">
                        <?php
                            $sugerencia = "Imagen (Ideal 1280 X 500 px)";
                       
                        ?>
                        <label id="label_imagen" for="slide_imagen" class="control-label"><?php echo $sugerencia; ?></label>
                        <div class="form-group">
                            <input type="file" name="slide_imagen" value="<?php echo ($this->input->post('slide_imagen') ? $this->input->post('slide_imagen') : $slide['slide_imagen']); ?>" class="btn btn-success btn-sm form-control" id="slide_imagen" accept="image/png, image/jpeg, jpg, image/gif" />
                            <input type="hidden" name="slide_imagen1" value="<?php echo ($this->input->post('slide_imagen') ? $this->input->post('slide_imagen') : $slide['slide_imagen']); ?>" class="form-control" id="slide_imagen1" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="slide_leyenda1" class="control-label">Leyenda1</label>
                        <div class="form-group">
                            <input type="text" name="slide_leyenda1" value="<?php echo ($this->input->post('slide_leyenda1') ? $this->input->post('slide_leyenda1') : $slide['slide_leyenda1']); ?>" class="form-control" id="slide_leyenda1" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="slide_leyenda2" class="control-label">Leyenda2</label>
                        <div class="form-group">
                            <input type="text" name="slide_leyenda2" value="<?php echo ($this->input->post('slide_leyenda2') ? $this->input->post('slide_leyenda2') : $slide['slide_leyenda2']); ?>" class="form-control" id="slide_leyenda2" />
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <label for="slide_enlace" class="control-label">Enlace</label>
                        <div class="form-group">
                            <input type="text" name="slide_enlace" value="<?php echo ($this->input->post('slide_enlace') ? $this->input->post('slide_enlace') : $slide['slide_enlace']); ?>" class="form-control" id="slide_enlace" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estado_id" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_id" class="form-control">
                                <!--<option value="1">ACTIVO</option>-->
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado_id'] == $slide['estado_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                 
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('slide'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>