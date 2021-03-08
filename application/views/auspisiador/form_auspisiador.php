<div class="box-body">
    <div class="row"><!-- <div class="row clearfix"> -->
        <div class="col-md-6">
            <label for="auspisiador_name" class="control-label"><span class="text-danger">*</span>Auspisiador Nombre</label>
            <div class="form-group">
                    <input type="text" name="auspisiador_name" value="<?=(isset($auspisiador['auspisiador_name']) ? $auspisiador['auspisiador_name'] : $this->input->post('auspisiador_name')); ?>" class="form-control" id="auspisiador_name" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    <span class="text-danger"><?php echo form_error('auspisiador_name');?></span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="auspisiador_image" class="control-label">Imagen</label>
            <div class="form-group">
                <input type="file" name="auspisiador_image" value="<?= (isset($auspisiador['auspisiador_image']) ? $auspisiador['auspisiador_image'] : $this->input->post('auspisiador_image')); ?>" class="btn btn-success btn-sm form-control" id="auspisiador_image" accept="image/png, image/jpeg, jpg, image/gif" />
                <input type="hidden" name="auspisiador_image1" value="<?= (isset($auspisiador['auspisiador_image']) ? $auspisiador['auspisiador_image'] : $this->input->post('auspisiador_image')); ?>" class="form-control" id="auspisiador_image1" />
            </div>
            
            <!-- <label for="auspisiador_image" class="control-label">Imagen (de preferencia imagen cuadrada (n * n))</label>
            <div class="form-group">
                <input type="file" name="auspisiador_image" value="<?= (isset($auspisiador['auspisiador_image']) ? $auspisiador['auspisiador_image'] : $this->input->post('auspisiador_image')); ?>" class="btn btn-success btn-sm form-control" id="auspisiador_image" accept="image/png, image/jpeg, jpg, image/gif" />
                <input type="hidden" name="auspisiador_image1" value="<?= (isset($auspisiador['auspisiador_image']) ? $auspisiador['auspisiador_image'] : $this->input->post('auspisiador_image'))?>" class="form-control" id="auspisiador_image1" />
                <?= $auspisiador['auspisiador_image'] ?>
            </div> -->
        </div>
        
        <div class="col-md-6">
            <label for="auspisiador_url" class="control-label"><span class="text-danger">*</span>URL del Auspisiador</label>
            <div class="form-group">
                    <input type="text" name="auspisiador_url" value="<?=(isset($auspisiador['auspisiador_url']) ? $auspisiador['auspisiador_url'] : $this->input->post('auspisiador_url')); ?>" class="form-control" id="auspisiador_url" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.setSelectionRange(start, end);" />
                    <span class="text-danger"><?php echo form_error('auspisiador_url');?></span>
            </div>
        </div>
        
        <?php if(isset($auspisiador['estado_id'])){ ?>
        <div class="col-md-6">
            <label for="estado_id" class="control-label">Estado</label>
            <div class="form-group">
                <select name="estado_id" class="form-control">
                    <?php 
                    foreach($all_estado as $estado)
                    {
                        $selected = ($estado['estado_id'] == $auspisiador['estado_id']) ? ' selected="selected"' : "";
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
    <a href="<?php echo site_url('auspisiador/index'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar
    </a>
</div>	