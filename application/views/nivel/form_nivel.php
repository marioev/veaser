<div class="box-body">
    <div class="row clearfix">
        <div class="col-md-6">
            <label for="nivel_nombre" class="control-label"><span class="text-danger">*</span>Nombre del nivel</label>
            <div class="form-group">
                <input type="text" name="nivel_nombre" value="<?=(isset($nivel['nivel_nombre']) ? $nivel['nivel_nombre'] : $this->input->post('nivel_nombre')); ?>" class="form-control" id="nivel_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                <!-- <span class="text-danger"><?php echo form_error('nivel_nombre');?></span> -->
            </div>
        </div>
        <div class="col-md-3">
            <label for="nivel_puntaje_min" class="control-label"><span class="text-danger">*</span>Puntaje inicial</label>
            <div class="form-group">
                <input type="text" name="nivel_puntaje_min" value="<?=(isset($nivel['nivel_puntaje_min']) ? $nivel['nivel_puntaje_min'] : $ultimo['max']); ?>" class="form-control" id="nivel_puntaje_min" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" min="<?=(isset($ultimo['max']) ? $ultimo['max'] : 0);?>" onchange="permitido()"/>
                <!-- <span class="text-danger"><?php echo form_error('nivel_puntaje_min');?></span> -->
            </div>
        </div>
        <div class="col-md-3">
            <label for="nivel_puntaje_max" class="control-label"><span class="text-danger">*</span>Puntaje final</label>
            <div class="form-group">
                <input type="text" name="nivel_puntaje_max" value="<?=(isset($nivel['nivel_puntaje_max']) ? $nivel['nivel_puntaje_max'] : $this->input->post('nivel_puntaje_max')); ?>" class="form-control" id="nivel_puntaje_max" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                <!-- <span class="text-danger"><?php echo form_error('nivel_puntaje_max');?></span> -->
            </div>
        </div>
        
        <?php if(isset($nivel['nivel_id'])){ ?>
        
        <div class="col-md-6">
            <label for="estado_id" class="control-label">Estado</label>
            <div class="form-group">
                <select name="estado_id" class="form-control">
                    <?php 
                    foreach($all_estado as $estado){
                        $selected = ($estado['estado_id'] == $nivel['estado_id']) ? ' selected="selected"' : "";
                        echo "<option value='{$estado['estado_id']}' $selected>{$estado['estado_descripcion']}</option>";
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