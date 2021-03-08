<div class="box-body">
    <div class="row clearfix">
        <div class="col-md-6">
                <label for="categoria_nombre" class="control-label"><span class="text-danger">*</span>Categoria Nombre</label>
                <div class="form-group">
                        <input type="text" name="categoria_nombre" value="<?=(isset($categoria['categoria_nombre']) ? $categoria['categoria_nombre'] : $this->input->post('categoria_nombre')); ?>" class="form-control" id="categoria_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        <span class="text-danger"><?php echo form_error('categoria_nombre');?></span>
                </div>
        </div>
        <div class="col-md-4">
            <label for="categoria_imagen" class="control-label">Imagen (de preferencia imagen cuadrada (n * n))</label>
            <div class="form-group">
                <input type="file" name="categoria_imagen" value="<?= (isset($categoria['categoria_imagen']) ? $categoria['categoria_imagen'] : $this->input->post('categoria_imagen')); ?>" class="btn btn-success btn-sm form-control" id="categoria_imagen" accept="image/png, image/jpeg, jpg, image/gif" />
                
                <input type="hidden" name="categoria_imagen1" value="<?= (isset($categoria['categoria_imagen']) ? $categoria['categoria_imagen'] : $this->input->post('categoria_imagen'))?>" class="form-control" id="categoria_imagen1" />
            </div>
        </div>
        
        <div class="col-md-2">
            <label for="categoria_imagen" class="control-label">Icono</label>
            <div class="form-group">
                <button  type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#modalIcon">Seleccionar</button>
                <div class="modal fade" id="modalIcon" role="dialog">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Galeria de Iconos</h4>
                        </div>
                        <div class="modal-body">
                            <div class="formulario_galeria">
                                <div class="radio_galeria">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <?php foreach($iconos as $icono) {?>
                                                <div class="col-xs-2 ">
                                                    <input type="radio" name="icono_id" id="<?= $icono['icono_id'] ?>" value="<?= (isset($icono['icono_id']) ? $icono['icono_id'] : $this->input->post('icono_id')) ?>" >
                                                    <label class="label_galeria text-center" for="<?= $icono['icono_id'] ?>"><i class='<?= $icono['icono_etiqueta'] ?>' style="font-size: 16pt"></i></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                        </div>
                    </div>
                    
                    </div>
                </div>

                
                <!-- <input type="file" name="categoria_imagen" value="<?= (isset($categoria['categoria_imagen']) ? $categoria['categoria_imagen'] : $this->input->post('categoria_imagen')); ?>" class="btn btn-success btn-sm form-control" id="categoria_imagen" accept="image/png, image/jpeg, jpg, image/gif" />
                <input type="hidden" name="categoria_imagen1" value="<?= (isset($categoria['categoria_imagen']) ? $categoria['categoria_imagen'] : $this->input->post('categoria_imagen') ); ?>" class="form-control" id="categoria_imagen1" /> -->
            </div>
        </div>

        <?php if(isset($categoria['categoria_visto'])){ ?>
        <div class="col-md-6">
                <label for="categoria_visto" class="control-label">Visto</label>
                <div class="form-group">
                        <input type="text" name="categoria_visto" value="<?php echo ($this->input->post('categoria_visto') ? $this->input->post('categoria_visto') : $categoria['categoria_visto']); ?>" class="form-control" id="categoria_visto" />
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
        <?php } ?>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i> Guardar
    </button>
    <a href="<?php echo site_url('categoria/index'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar
    </a>
</div>	