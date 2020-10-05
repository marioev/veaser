<div class="box-body">
    <div class="row clearfix">
        <div class="col-md-6">
            <label for="producto_nombre" class="control-label"><span class="text-danger">*</span>Producto</label>
            <div class="form-group">
                <input type="text" name="producto_nombre" value="<?= (isset($producto['producto_nombre']) ? $producto['producto_nombre'] : $this->input->post('producto_nombre') ); ?>" class="form-control" id="producto_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                <span class="text-danger"><?php echo form_error('producto_nombre');?></span>
            </div>
        </div>

        <div class="col-md-3">
            <label for="producto_marca" class="control-label">Marca</label>
            <div class="form-group">
                <input type="text" name="producto_marca" value="<?= (isset($producto['producto_marca']) ? $producto['producto_marca'] : $this->input->post('producto_marca')); ?>" class="form-control" id="producto_marca" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
            </div>
        </div>
        <div class="col-md-3">
            <label for="producto_industria" class="control-label">Industria</label>
            <div class="form-group">
                <input type="text" name="producto_industria" value="<?= (isset($producto['producto_industria']) ? $producto['producto_industria'] : $this->input->post('producto_industria'));?>" class="form-control" id="producto_industria" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
            </div>
        </div>
        <div class="col-md-3">
            <label for="producto_codigo" class="control-label"><span class="text-danger">*</span>Código Producto</label>
            <div class="form-group">
                <input type="text" name="producto_codigo" value="<?= (isset($producto['producto_codigo']) ? $producto['producto_codigo'] : $this->input->post('producto_codigo')) ?>" class="form-control" id="producto_codigo" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                <span class="text-danger"><?php echo form_error('producto_codigo');?></span>
            </div>
        </div>
        <div class="col-md-3">
            <label for="categoria_id" class="control-label"><span class="text-danger">*</span>Categoria</label>
            <div class="form-group" style="display: flex">
                <select name="categoria_id" class="form-control" required id="categoria_id">
                        <option value="">- CATEGORIA -</option>
                        <?php 
                        foreach($all_categoria as $categoria)
                        {
                            $selected = ($categoria['categoria_id'] == $producto['categoria_id']) ? ' selected="selected"' : "";

                            echo '<option value="'.$categoria['categoria_id'].'" '.$selected.'>'.$categoria['categoria_nombre'].'</option>';
                        } 
                        ?>
                </select>
                <a data-toggle="modal" data-target="#modalcategoria" class="btn btn-warning" title="Registrar Nueva Categoria">
                    <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <label for="moneda_id" class="control-label"><span class="text-danger">*</span>Moneda</label>
            <div class="form-group">
                <select name="moneda_id" class="form-control" required>
                    <option value="">- MONEDA -</option>
                    <?php 
                    foreach($all_moneda as $moneda)
                    {
                        $selected = ($moneda['moneda_id'] == $producto['moneda_id']) ? ' selected="selected"' : "";

                        echo '<option value="'.$moneda['moneda_id'].'" '.$selected.'>'.$moneda['moneda_descripcion'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
            <div class="col-md-3">
            <label for="producto_foto" class="control-label">Foto</label>
            <div class="form-group">
                <input type="file" name="producto_foto" value="<?= (isset($producto['producto_foto']) ? $producto['producto_foto'] : $this->input->post('producto_foto'))?>" class="btn btn-success btn-sm form-control" id="producto_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                <input type="hidden" name="producto_foto1" value="<?= (isset($producto['producto_foto']) ? $producto['producto_foto'] : $this->input->post('producto_foto'))?>" class="form-control" id="producto_foto1" />
            </div>
        </div>

        
        <div class="col-md-3">
                <label for="producto_preciocliente" class="control-label">Precio Cliente</label>
                <div class="form-group">
                    <input type="number" step="any" min="0" name="producto_preciocliente" value="<?= (isset($producto['producto_preciocliente']) ? $producto['producto_preciocliente'] : $this->input->post('producto_preciocliente')) ?>" class="form-control" id="producto_preciocliente"  onclick="this.select();"/>
                </div>
        </div>
        
        <div class="col-md-3">
            <label for="producto_preciominimo" class="control-label">Precio de Venta Minimo</label>
            <div class="form-group">
                <input type="number" step="any" min="0" name="producto_preciominimo" value="<?= (isset($producto['producto_preciominimo']) ? $producto['producto_preciominimo'] : $this->input->post('producto_preciominimo')); ?>" class="form-control" id="producto_preciominimo" />
            </div>
        </div>
        <div class="col-md-3">
                <label for="producto_preciooferta" class="control-label">Precio de Oferta</label>
                <div class="form-group">
                    <input type="number" step="any" min="0" name="producto_preciooferta" value="<?= (isset($producto['producto_preciooferta']) ? $producto['producto_preciooferta'] : $this->input->post('producto_preciooferta')) ?>" class="form-control" id="producto_preciooferta"  onclick="this.select();"/>
                </div>
        </div>
        <div class="col-md-3">
            <label for="producto_comision" class="control-label">Comisión</label>
            <div class="form-group">
                <input type="number" step="any" min="0" name="producto_comision" value="<?= (isset($producto['producto_comision']) ? $producto['producto_comision'] : $this->input->post('producto_comision')) ?>" class="form-control" id="producto_costo" />
            </div>
        </div>
        
        <div class="col-md-6">
            <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Modificar Ubicación</a></label>
            <!-- ***********************aqui empieza el mapa para capturar coordenadas *********************** -->
            <div id="oculto1" style="visibility:hidden">
            <div id="map"></div>
            <script type="text/javascript">
                var marker;          //variable del marcador
                var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                var coords_lng = {};    //coordenadas obtenidas con la geolocalización


                //Funcion principal
                initMap = function () 
                {
                    //usamos la API para geolocalizar el usuario

                    //milat = document.getElementById('cliente_latitud').value;
                    milat = $('#producto_latitud').val();
                    //milng = document.getElementById('cliente_longitud').value;
                    milng = $('#producto_longitud').val();

                        navigator.geolocation.getCurrentPosition(
                        function (position){
                            if(milat == 'undefined' || milat == null || milat ==""){
                                coords_lat =  {
                                lat: position.coords.latitude,
                                };
                                //milat = position.coords.latitude;
                            }else{
                                coords_lat =  {
                                lat: milat,
                                };
                            }
                            if(milng == 'undefined' || milng == null || milng ==""){
                                coords_lng =  {
                                    lng: position.coords.longitude,
                                };
                                //lng = position.coords.longitude;
                            }else{
                                coords_lng =  {
                                    lng: milng,
                                };
                            } 
                            /*coords_lat =  {
                                lat: milat,
                                };

                            coords_lng =  {
                                    lng: milng,
                                };*/
                            setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa


                            },function(error){console.log(error);});
                }

                function setMapa (coords_lat, coords_lng)
                {
                    //document.getElementById("cliente_latitud").value = coords_lat.lat;
                    // document.getElementById("cliente_longitud").value = coords_lng.lng;
                        //Se crea una nueva instancia del objeto mapa
                        var map = new google.maps.Map(document.getElementById('map'),
                        {
                        zoom: 13,
                        center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                        });

                        //Creamos el marcador en el mapa con sus propiedades
                        //para nuestro obetivo tenemos que poner el atributo draggable en true
                        //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                        marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                        });
                        //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                        //cuando el usuario a soltado el marcador
                        //marker.addListener('click', toggleBounce);

                        marker.addListener( 'dragend', function (event)
                        {
                        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                        document.getElementById("producto_latitud").value = this.getPosition().lat();
                        document.getElementById("producto_longitud").value = this.getPosition().lng();
                        });
                }
                initMap();
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>
            </div>
            <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
        </div>
        <div class="col-md-2">
            <label for="producto_check" class="control-label">Geolocalización</label>
            <div class="form-group">
                <?php
                if(isset($producto['producto_check'])){
                    $eschecked = "";
                    if($producto['producto_check'] == 1)
                        $eschecked = "checked";
                    ?><input type="checkbox" name="producto_check" class="form-check" id="producto_check" <?php echo $eschecked; ?> />
                <?php }else{ ?>
                    <input type="checkbox" name="producto_check" class="form-check" id="producto_check" checked />
                <?php }?>
            </div>
        </div>
        <div class="col-md-2">
            <label for="producto_latitud" class="control-label">Latitud</label>
            <div class="form-group">
                <input type="number" step="any" name="producto_latitud" value="<?= (isset($producto['producto_latitud']) ? $producto['producto_latitud'] : $this->input->post('producto_latitud')) ?>" class="form-control" id="producto_latitud" />
            </div>
        </div>
        <div class="col-md-2">
            <label for="producto_longitud" class="control-label">Longitud</label>
            <div class="form-group">
                <input type="number" step="any" name="producto_longitud" value="<?= (isset($producto['producto_longitud']) ? $producto['producto_longitud'] : $this->input->post('producto_longitud')) ?>" class="form-control" id="producto_longitud" />
            </div>
        </div>
        <div class="col-md-4">
            <label for="producto_condicion" class="control-label">Condición</label>
            <div class="form-group">
                <input type="text" name="producto_condicion" value="<?= (isset($producto['producto_condicion']) ? $producto['producto_condicion'] : $this->input->post('producto_condicion')) ?>" class="form-control" id="producto_condicion" />
            </div>
        </div>
        <div class="col-md-5">
            <label for="producto_caracteristicas" class="control-label">Características</label>
            <div class="form-group">
            <?php if(isset($producto['producto_caracteristicas'])){ ?>
                <textarea rows="3" type="texarea" name="producto_caracteristicas" value="" class="form-control" id="producto_caracteristicas" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" ><?php echo ($this->input->post('producto_caracteristicas') ? $this->input->post('producto_caracteristicas') : $producto['producto_caracteristicas']); ?></textarea>
                <?php }else{ ?>
                    <textarea rows="3" type="texarea" name="producto_caracteristicas" value="" class="form-control" id="producto_caracteristicas" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> </textarea>
                <?php }?>
            </div>
        </div>
        <div class="col-md-2">
        <?php if(isset($producto['estado_id'])){?>
            <label for="estado_id" class="control-label">Estado</label>
            <div class="form-group">
                <!--<select class="selectpicker" data-show-subtext="true" data-live-search="true">-->
                    <!--<select name="estado_id" class=" form-control selectpicker" data-show-subtext="true" data-live-search="true">-->
                <select name="estado_id" class=" form-control" id="estado_id">
                    <option value="">-- ESTADO --</option>
                    <?php 
                    foreach($all_estado as $estado)
                    {
                        $selected = ($estado['estado_id'] == $producto['estado_id']) ? ' selected="selected"' : "";
                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                    } 
                    ?>
                </select>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success" onclick="loader()">
        <i class="fa fa-check"></i> Guardar
    </button>
    <a href="<?php echo site_url('producto/index'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar</a>
</div>