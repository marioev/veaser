<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Categoria</h3>
            </div>
            <?php echo form_open_multipart('categoria/edit/'.$categoria['categoria_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                            <label for="categoria_nombre" class="control-label"><span class="text-danger">*</span>Categoria Nombre</label>
                            <div class="form-group">
                                    <input type="text" name="categoria_nombre" value="<?php echo ($this->input->post('categoria_nombre') ? $this->input->post('categoria_nombre') : $categoria['categoria_nombre']); ?>" class="form-control" id="categoria_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                    <span class="text-danger"><?php echo form_error('categoria_nombre');?></span>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label for="categoria_imagen" class="control-label">Imagen</label>
                        <div class="form-group">
                            <input type="file" name="categoria_imagen" value="<?php echo ($this->input->post('categoria_imagen') ? $this->input->post('categoria_imagen') : $categoria['categoria_imagen']); ?>" class="btn btn-success btn-sm form-control" id="categoria_imagen" accept="image/png, image/jpeg, jpg, image/gif" />
                            <input type="hidden" name="categoria_imagen1" value="<?php echo ($this->input->post('categoria_imagen') ? $this->input->post('categoria_imagen') : $categoria['categoria_imagen']); ?>" class="form-control" id="categoria_imagen1" />
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="categoria_vistas" class="control-label">Vistas</label>
                            <div class="form-group">
                                    <input type="text" name="categoria_vistas" value="<?php echo ($this->input->post('categoria_vistas') ? $this->input->post('categoria_vistas') : $categoria['categoria_vistas']); ?>" class="form-control" id="categoria_vistas" />
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label for="estado_id" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_id" class="form-control">
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado_id'] == $categoria['estado_id']) ? ' selected="selected"' : "";
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
                <a href="<?php echo site_url('categoria/index'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>