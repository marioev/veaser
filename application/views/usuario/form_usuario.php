<div class="box-body">
	<div class="row clearfix">
			<div class="col-md-6">
			<label for="usuario_nombre" class="control-label">Nombre</label>
			<div class="form-group">
				<input type="text" name="usuario_nombre" value="<?= (isset($usuario['usuario_nombre']) ? $usuario['usuario_nombre'] : $this->input->post['usuario_nombre'])?>" class="form-control" id="usuario_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
				<span class="text-danger"><?php echo form_error('usuario_nombre');?></span>
			</div>
		</div>
		<div class="col-md-6">
			<label for="tipousuario_id" class="control-label">Tipo</label>
			<div class="form-group">
				<select name="tipousuario_id" class="form-control">
					<option value="">seleccionar tipo de usuario</option>
					<?php 
					foreach($all_tipo_usuario as $tipo_usuario)
					{
						$selected = ($tipo_usuario['tipousuario_id'] == (isset($usuario['tipousuario_id']) ? $usuario['tipousuario_id'] : $this->input->post('tipousuario_id'))) ? ' selected="selected"' : "";

						echo '<option value="'.$tipo_usuario['tipousuario_id'].'" '.$selected.'>'.$tipo_usuario['tipousuario_descripcion'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	
		<div class="col-md-6">
			<label for="usuario_email" class="control-label">Email</label>
			<div class="form-group">
				<input type="email" minlength="5" maxlength="250" name="usuario_email" value="<?= (isset($usuario['usuario_email']) ? $usuario['usuario_email'] : $this->input->post('usuario_email')) ?>" class="form-control" id="usuario_email" />
				<span class="text-danger"><?php echo form_error('usuario_email');?></span>
			</div>
		</div>
		<div class="col-md-6">
			<label for="usuario_login" class="control-label">Login</label>
			<div class="form-group">
				<input type="text" name="usuario_login" value="<?= (isset($usuario['usuario_login']) ? $usuario['usuario_login'] : $this->input->post('usuario_login')) ?>" class="form-control" id="usuario_login" required/>
				<span class="text-danger"><?php echo form_error('usuario_login');?></span>
				<div id="user-result"></div>
			</div>
		</div>
		<div class="col-md-12"><span></span></div>
		<?php if(isset($usuario['estado_id'])){ ?>
			<div class="col-md-6">
			<label for="estado_id" class="control-label">Estado</label>
			<div class="form-group">
				<select name="estado_id" class="form-control">
					<!--<option value="1">ACTIVO</option>-->
					<?php 
					foreach($all_estado as $estado)
					{
						$selected = ($estado['estado_id'] == $usuario['estado_id']) ? ' selected="selected"' : "";

						echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
					} 
					?>
				</select>
			</div>
			</div>
		<?php }else{ ?>
					<div class="col-md-6">
						<label for="usuario_clave" class="control-label">Clave</label>
						<div class="form-group">
							<input type="password" name="usuario_clave"  class="form-control" id="usuario_clave" required/>
						</div>
					</div>

					<div class="col-md-6">
						<label for="usuario_clave" class="control-label">Repetir Clave</label>
						<div class="form-group">
							<input type="password" name="rusuario_clave"  class="form-control" id="rusuario_clave" required/>
						</div>
					</div>
		<?php } ?>
		<?php if (isset($usuario['usuario_imagen'])){ ?>
		<div class="col-md-6">
			<label for="user_imagen" class="control-label">Imagen</label>
			<div class="form-group">
				<input type="file" name="usuario_imagen"  id="usuario_imagen" kl_virtual_keyboard_secure_input="on" class="form-control.input"  value="">
				<small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>
				<h4 id='loading' ></h4>
				<div id="message"></div>
			</div>
		</div>
		<div class="col-md-6">
			<img src="<?php echo site_url('resources/images/usuarios/'.$usuario['usuario_imagen'])?>" id="previewing" class="img-responsive center-block">
			<input type="hidden" value="<?php echo ($usuario['usuario_id']) ?>" name="userid" id="userid">
			<input type="hidden" value="<?php echo $usuario['usuario_imagen'] ?>" name="foto">
		</div>
		<?php }else{ ?>
			<div class="col-md-6">
				<label for="user_imagen" class="control-label">Imagen</label>
				<div class="form-group">
					<input type="file" name="usuario_imagen"  id="usuario_imagen" kl_virtual_keyboard_secure_input="on" class="form-control.input"  value="<?php echo $this->input->post('usuario_imagen'); ?>">
					<small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>
					<h4 id='loading' ></h4>
					<div id="message"></div>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?php echo site_url('uploads/profile/default.jpg')?>" id="previewing" class="img-responsive center-block">
			</div>
		<?php } ?>
	</div>
</div>
<div class="box-footer">
	<button type="submit" id="boton" class="btn btn-success">
			<i class="fa fa-check"></i> Guardar
	</button>
	<a href="<?php echo site_url('usuario'); ?>" class="btn btn-danger">
	<i class="fa fa-times"></i> Cancelar</a>
</div>