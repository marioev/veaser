<script src="<?php echo base_url('resources/js/funciones_producto_newunidad.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<script type="text/javascript">
    function cambiarcodproducto(){
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }
        $('#producto_codigobarra').val(anio+mes+dia+hora+min+seg);
        $('#producto_codigo').val(anio+mes+dia+hora+min+seg);
    }
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){
      $(".oculto").hide();              
        $(".inf").click(function(){
              var nodo = $(this).attr("href");  

              if ($(nodo).is(":visible")){
                   $(nodo).hide();
                   return false;
              }else{
            $(".oculto").hide();
            //$(".oculto").hide("slow");                             
            $(nodo).fadeToggle("fast");
            return false;
              }
        });
    });
</script>
<script>
      $(document).ready(function () {
          $("#producto_costo").keyup(function () {
              var value = $(this).val();
              $("#producto_precio").val(value/0.8);
          });
          $("#producto_precio").change(function () {
              var value = $(this).val();
              var costo = $("#producto_costo").val();
              if(costo >= value){
                  alert("El Precio de Compra es mayor o igual a Precio de Venta");
              }
          });
      });
      function loader() {
     	$("form").submit(function() {
   document.getElementById('loader').style.display = 'block'; //ocultar el bloque del loader 
});
        }
</script>
<?php if($resultado == 1){ ?>
<script type="text/javascript">
    $(document).ready(function(){
        var esnombre = $("#producto_nombre").val();
        alert("El producto '"+esnombre+"' \n ya se encuentra REGISTRADO");
    });
</script>
<?php } ?>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Producto</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcodproducto();" title="genera codigo de barra y codigo">
                    <i class="fa fa-barcode"></i> Generar Codigos
		</button>
            </div>
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
            </div>
            <?php echo form_open_multipart('producto/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                            <label for="producto_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="producto_nombre" value="<?php echo $this->input->post('producto_nombre'); ?>" class="form-control" id="producto_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" autofocus />
                                    <span class="text-danger"><?php echo form_error('producto_nombre');?></span>
                            </div>
                    </div>
					
                    <div class="col-md-2">
                        <label for="producto_unidad" class="control-label">Unidad</label>
                        <div class="form-group">
                            <select name="producto_unidad" class="form-control">
                                <?php 
                                foreach($unidades as $u){ ?>
                                    <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                            <label for="producto_marca" class="control-label">Marca</label>
                            <div class="form-group">
                                <input type="text" name="producto_marca" value="S/N" class="form-control" id="producto_marca" onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>         
                    <div class="col-md-2">
                            <label for="producto_industria" class="control-label">Industria</label>
                            <div class="form-group">
                                    <input type="text" name="producto_industria" value="<?php echo "BOLIVANA"; ?>" class="form-control" id="producto_industria"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="producto_codigobarra" class="control-label"><span class="text-danger">*</span>Código de barras</label>
                            <div class="form-group">
                                    <input type="text" name="producto_codigobarra" value="<?php echo $this->input->post('producto_codigobarra'); ?>" class="form-control" id="producto_codigobarra" required  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="producto_codigo" class="control-label"><span class="text-danger">*</span>Código Producto</label>
                            <div class="form-group">
                                    <input type="text" name="producto_codigo" value="<?php echo $this->input->post('producto_codigo'); ?>" class="form-control" id="producto_codigo" required  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                                    <span class="text-danger"><?php echo form_error('producto_codigo');?></span>
                            </div>
                    </div>
                    <div class="col-md-3">  
                            <label for="categoria_id" class="control-label"><span class="text-danger">*</span>Categoria</label>
                            <div class="form-group" style="display: flex">
                                <select name="categoria_id" class="form-control" required id="categoria_id">
                                            <option value="">- CATEGORIA -</option>
                                            <?php 
                                            foreach($all_categoria_producto as $categoria_producto)
                                            {
                                                    $selected = ($categoria_producto['categoria_id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$categoria_producto['categoria_id'].'" '.$selected.'>'.$categoria_producto['categoria_nombre'].'</option>';
                                            } 
                                            ?>
                                    </select>
                                <a data-toggle="modal" data-target="#modalcategoria" class="btn btn-warning" title="Registrar Nueva Categoria">
                                <i class="fa fa-plus-circle"></i></a>
                            </div>
                    </div>
                    <div class="col-md-3">  
                            <label for="destino_id" class="control-label">Destino</label>
                            <div class="form-group">
                                <select name="destino_id" class="form-control" id="destino_id">
                                            <option value="">- DESTINO DEL PRODUCTO -</option>
                                            <?php 
                                            foreach($all_destino_producto as $destino_producto)
                                            {
                                                    $selected = ($destino_producto['destino_id'] == $this->input->post('destino_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$destino_producto['destino_id'].'" '.$selected.'>'.$destino_producto['destino_nombre'].'</option>';
                                            } 
                                            ?>
                                    </select>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="moneda_id" class="control-label"><span class="text-danger">*</span>Moneda</label>
                            <div class="form-group">
                                    <select name="moneda_id" class="form-control" required>
                                            <!--<option value="">- MONEDA -</option>-->
                                            <?php 
                                            foreach($all_moneda as $moneda)
                                            {
                                                    $selected = ($moneda['moneda_id'] == $this->input->post('moneda_id')) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$moneda['moneda_id'].'" '.$selected.'>'.$moneda['moneda_descripcion'].'</option>';
                                            } 
                                            ?>
                                    </select>
                            </div>
                    </div>

                    <div class="col-md-3">
                            <label for="producto_costo" class="control-label">Precio de Compra</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_costo" value="<?php echo '0.00'; ?>" class="form-control" id="producto_costo"  onclick="this.select();"/>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="producto_precio" class="control-label">Precio de Venta</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_precio" value="<?php echo '0.00'; ?>" class="form-control" id="producto_precio"  onclick="this.select();"/>
                            </div>
                    </div>

                    <div class="col-md-3">
                            <label for="producto_comision" class="control-label">Comisión (%)</label>
                            <div class="form-group">
                                    <input type="number" step="any" min="0" max="100" name="producto_comision" value="<?php echo '0.00'; ?>" class="form-control" id="producto_comision"  onclick="this.select();"/>
                            </div>
                    </div>

                    <div class="col-md-3" hidden>
                            <label for="producto_tipocambio" class="control-label">Tipo Cambio</label>
                            <div class="form-group">
                                    <input type="number" step="any" min="0" name="producto_tipocambio" value="1" class="form-control" id="producto_tipocambio" />
                            </div>
                    </div>
                    <div class="col-md-12">
                        <a href="#info1" class="btn btn-success btn-sm inf" >Usar Factores</a>
                        <div id="info1" class="oculto">
                        <div class="col-md-3">
                            <label for="producto_factor" class="control-label">Factor(Cantidad en Unidades)</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_factor" value="<?php echo "0.00"; ?>" class="form-control" id="producto_factor"  onclick="this.select();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_unidadfactor" class="control-label">Unidad Factor</label>
                            <div class="form-group">
                                <select name="producto_unidadfactor" class="form-control">
                                    <option value="">- UNIDAD FACTOR -</option>
                                    <?php 
                                    foreach($unidades as $u){ ?>
                                        <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_codigofactor" class="control-label">Codigo Factor</label>
                            <div class="form-group">
                                <input type="text" step="any" min="0" name="producto_codigofactor" value="<?php echo $this->input->post('producto_codigofactor'); ?>" class="form-control" id="producto_codigofactor"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_preciofactor" class="control-label">Precio Unit. Factor</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_preciofactor" value="<?php echo $this->input->post('producto_preciofactor'); ?>" class="form-control" id="producto_preciofactor"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_factor1" class="control-label">Factor 1(Cantidad en Unidades)</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_factor1" value="<?php echo "0.00"; ?>" class="form-control" id="producto_factor1"  onclick="this.select();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_unidadfactor1" class="control-label">Unidad Factor 1</label>
                            <div class="form-group">
                                <select name="producto_unidadfactor1" class="form-control">
                                    <option value="">- UNIDAD FACTOR -</option>
                                    <?php 
                                    foreach($unidades as $u){ ?>
                                        <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_codigofactor1" class="control-label">Codigo Factor 1</label>
                            <div class="form-group">
                                <input type="text" step="any" min="0" name="producto_codigofactor1" value="<?php echo $this->input->post('producto_codigofactor1'); ?>" class="form-control" id="producto_codigofactor1" onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_preciofactor1" class="control-label">Precio Unit. Factor 1</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_preciofactor1" value="<?php echo $this->input->post('producto_preciofactor1'); ?>" class="form-control" id="producto_preciofactor1"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_factor2" class="control-label">Factor 2(Cantidad en Unidades)</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_factor2" value="<?php echo "0.00"; ?>" class="form-control" id="producto_factor2"  onclick="this.select();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_unidadfactor2" class="control-label">Unidad Factor 2</label>
                            <div class="form-group">
                                <select name="producto_unidadfactor2" class="form-control">
                                    <option value="">- UNIDAD FACTOR -</option>
                                    <?php 
                                    foreach($unidades as $u){ ?>
                                        <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_codigofactor2" class="control-label">Codigo Factor 2</label>
                            <div class="form-group">
                                <input type="text" step="any" min="0" name="producto_codigofactor2" value="<?php echo $this->input->post('producto_codigofactor2'); ?>" class="form-control" id="producto_codigofactor2"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_preciofactor2" class="control-label">Precio Unit. Factor 2</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_preciofactor2" value="<?php echo $this->input->post('producto_preciofactor2'); ?>" class="form-control" id="producto_preciofactor2"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_factor3" class="control-label">Factor 3(Cantidad en Unidades)</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_factor3" value="<?php echo "0.00"; ?>" class="form-control" id="producto_factor3"  onclick="this.select();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_unidadfactor3" class="control-label">Unidad Factor 3</label>
                            <div class="form-group">
                                <select name="producto_unidadfactor3" class="form-control">
                                    <option value="">- UNIDAD FACTOR -</option>
                                    <?php 
                                    foreach($unidades as $u){ ?>
                                        <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_codigofactor3" class="control-label">Codigo Factor 3</label>
                            <div class="form-group">
                                <input type="text" step="any" min="0" name="producto_codigofactor3" value="<?php echo $this->input->post('producto_codigofactor3'); ?>" class="form-control" id="producto_codigofactor3"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_preciofactor3" class="control-label">Precio Unit. Factor 3</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_preciofactor3" value="<?php echo $this->input->post('producto_preciofactor3'); ?>" class="form-control" id="producto_preciofactor3"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_factor4" class="control-label">Factor 4(Cantidad en Unidades)</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_factor4" value="<?php echo "0.00"; ?>" class="form-control" id="producto_factor4"  onclick="this.select();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_unidadfactor4" class="control-label">Unidad Factor 4</label>
                            <div class="form-group">
                                <select name="producto_unidadfactor4" class="form-control">
                                    <option value="">- UNIDAD FACTOR -</option>
                                    <?php 
                                    foreach($unidades as $u){ ?>
                                        <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_codigofactor4" class="control-label">Codigo Factor 4</label>
                            <div class="form-group">
                                <input type="text" step="any" min="0" name="producto_codigofactor4" value="<?php echo $this->input->post('producto_codigofactor4'); ?>" class="form-control" id="producto_codigofactor4"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="producto_preciofactor4" class="control-label">Precio Unit. Factor 4</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="producto_preciofactor4" value="<?php echo $this->input->post('producto_preciofactor4'); ?>" class="form-control" id="producto_preciofactor4"  onclick="this.select();" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"/>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="producto_cantidadminima" class="control-label">Cant. Minima</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_cantidadminima" value="<?php echo "0.00"; ?>" class="form-control" id="producto_cantidadminima"  onclick="this.select();"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <label for="producto_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                    <input type="file" name="producto_foto" value="<?php echo "producto.jpg"; ?>" class="btn btn-success btn-sm form-control" id="producto_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                            </div>
                    </div>

                    <div class="col-md-6">
                        <label for="producto_caracteristicas" class="control-label">Características</label>
                        <div class="form-group">
                            <textarea rows="1" type="texarea" name="producto_caracteristicas" value="" class="form-control" id="producto_caracteristicas" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> </textarea>
                        </div>
                    </div>
                    <?php if($parametro['parametro_modulorestaurante'] == 2){ ?>
                    <div class="col-md-6">
                        <label for="producto_principioact" class="control-label">Principio Activo</label>
                        <div class="form-group">
                            <input type="text" name="producto_principioact" class="form-control" id="producto_principioact" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="producto_accionterap" class="control-label">Acción Terapeutica</label>
                            <div class="form-group">
                                <input type="text" name="producto_accionterap" class="form-control" id="producto_accionterap" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                    </div>
                    <?php } ?>
                    
                    <div class="col-md-2">
                        <label for="producto_envase" class="control-label">Envase Retornable</label>
                        <div class="form-group">
                            <select name="producto_envase" id="producto_envase" class="form-control">
                                <option value="0">Sin Envase Retornable</option>
                                <option value="1">Con Envase Retornable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="producto_nombreenvase" class="control-label">Nombre de Envase</label>
                        <div class="form-group" style="display: flex">
                            <select name="producto_nombreenvase" id="producto_nombreenvase" class="form-control">
                                <option value="">- SELECCIONE ENVASE -</option>
                                <?php 
                                foreach($unidades as $u){ ?>
                                    <option value="<?php echo $u['unidad_nombre']; ?>"> <?php echo $u['unidad_nombre']; ?> </option>
                                <?php } ?>
                            </select>
                            <a data-toggle="modal" data-target="#modalunidad" class="btn btn-warning" title="Registrar Nuevo Envase">
                                <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="producto_costoenvase" class="control-label">Costo de Envase</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_costoenvase" value="<?php echo ($this->input->post('producto_costoenvase')) ? $this->input->post('producto_costoenvase') : "0.00"; ?>" class="form-control" id="producto_costoenvase"  onclick="this.select();"/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="producto_precioenvase" class="control-label">Precio de Envase</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_precioenvase" value="<?php echo ($this->input->post('producto_precioenvase')) ? $this->input->post('producto_precioenvase') : "0.00"; ?>" class="form-control" id="producto_precioenvase"  onclick="this.select();"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success" onclick="loader()">
            		<i class="fa fa-check"></i> Guardar
            	</button>
                    <a href="<?php echo site_url('producto/index'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i>Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nuevo Envase ------------------->
<div class="modal fade" id="modalunidad" tabindex="-1" role="dialog" aria-labelledby="modalunidad">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-12">
                    <label for="nueva_unidad" class="control-label">Registrar Nueva Unidad</label>
                    <div class="form-group">
                        <input type="text" name="nueva_unidad"  class="form-control" id="nueva_unidad" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrarnuevaunidad()" class="btn btn-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nuevo Envase ------------------->

<!------------------------ INICIO modal para Registrar nueva Categoria ------------------->
<div class="modal fade" id="modalcategoria" tabindex="-1" role="dialog" aria-labelledby="modalcategoria">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <div class="col-md-12">
                    <label for="nueva_categoria" class="control-label">Registrar Nueva Categoria</label>
                    <div class="form-group">
                        <input type="text" name="nueva_categoria"  class="form-control" id="nueva_categoria" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrarnuevacategoria()" class="btn btn-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nueva Categoria ------------------->