<script src="<?php echo base_url('resources/js/funciones_producto_newcategoria.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<script type="text/javascript">
function mostrar(a) {
    obj = document.getElementById('oculto'+a);
    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    //objm = document.getElementById('map');
    if(obj.style.visibility == 'hidden'){
        $('#map').css({ 'width':'0px', 'height':'0px' });
        $('#mosmapa').text("Modificar Ubicación");
    }else{
        $('#map').css({ 'width':'100%', 'height':'400px' });
        $('#mosmapa').text("Cerrar mapa");
    }

}
</script>
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

     function loader() {
     	$("form").submit(function() {
   document.getElementById('loader').style.display = 'block'; //ocultar el bloque del loader 
});
        }
</script>

<script>
      function verificar_precio(){
              var venta = $("#producto_precio").val();
              var costo = $("#producto_costo").val();
              if(costo >= venta){
                  alert("El Precio de Compra es mayor o igual a Precio de Venta");
              }
      };
      function loader() {
     	$("form").submit(function() {
   document.getElementById('loader').style.display = 'block'; //ocultar el bloque del loader 
});
        }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Producto</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcodproducto();" title="Volver a generar Código y Código de barras">
			<i class="fa fa-edit"></i> Generar Código
		</button>
            </div>
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
            </div>
            <?php echo form_open_multipart('producto/edit/'.$producto['producto_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="producto_nombre" class="control-label"><span class="text-danger">*</span>Producto</label>
                        <div class="form-group">
                            <input type="text" name="producto_nombre" value="<?php echo ($this->input->post('producto_nombre') ? $this->input->post('producto_nombre') : $producto['producto_nombre']); ?>" class="form-control" id="producto_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('producto_nombre');?></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="producto_unidad" class="control-label">Unidad</label>
                        <div class="form-group">
                            <select name="producto_unidad" class="form-control">
                                <option value="">- UNIDAD -</option>
                                <?php 
                                foreach($unidades as $unidad)
                                {
                                    $selected = ($unidad['unidad_nombre'] == $producto['producto_unidad']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$unidad['unidad_nombre'].'" '.$selected.'>'.$unidad['unidad_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="producto_marca" class="control-label">Marca</label>
                        <div class="form-group">
                            <input type="text" name="producto_marca" value="<?php echo ($this->input->post('producto_marca') ? $this->input->post('producto_marca') : $producto['producto_marca']); ?>" class="form-control" id="producto_marca" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="producto_industria" class="control-label">Industria</label>
                        <div class="form-group">
                            <input type="text" name="producto_industria" value="<?php echo ($this->input->post('producto_industria') ? $this->input->post('producto_industria') : $producto['producto_industria']); ?>" class="form-control" id="producto_industria" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="producto_codigobarra" class="control-label"><span class="text-danger">*</span>Código de barras</label>
                        <div class="form-group">
                            <input type="text" name="producto_codigobarra" value="<?php echo ($this->input->post('producto_codigobarra') ? $this->input->post('producto_codigobarra') : $producto['producto_codigobarra']); ?>" class="form-control" id="producto_codigobarra" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                        </div>
                    </div>                                    
                    <div class="col-md-3">
                        <label for="producto_codigo" class="control-label"><span class="text-danger">*</span>Código Producto</label>
                        <div class="form-group">
                            <input type="text" name="producto_codigo" value="<?php echo ($this->input->post('producto_codigo') ? $this->input->post('producto_codigo') : $producto['producto_codigo']); ?>" class="form-control" id="producto_codigo" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
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
                        <label for="producto_costo" class="control-label">Precio de Compra</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_costo" value="<?php echo ($this->input->post('producto_costo') ? $this->input->post('producto_costo') : $producto['producto_costo']); ?>" class="form-control" id="producto_costo" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="producto_precio" class="control-label">Precio de Venta</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="producto_precio" value="<?php echo ($this->input->post('producto_precio') ? $this->input->post('producto_precio') : $producto['producto_precio']); ?>" class="form-control" id="producto_precio" onchange="verificar_precio();" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="producto_comision" class="control-label">Comisión (%)</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" max="100" name="producto_comision" value="<?php echo ($this->input->post('producto_comision') ? $this->input->post('producto_comision') : $producto['producto_comision']); ?>" class="form-control" id="producto_comision"  onclick="this.select();"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="producto_foto" class="control-label">Foto</label>
                        <div class="form-group">
                            <input type="file" name="producto_foto" value="<?php echo ($this->input->post('producto_foto') ? $this->input->post('producto_foto') : $producto['producto_foto']); ?>" class="btn btn-success btn-sm form-control" id="producto_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                            <input type="hidden" name="producto_foto1" value="<?php echo ($this->input->post('producto_foto') ? $this->input->post('producto_foto') : $producto['producto_foto']); ?>" class="form-control" id="producto_foto1" />
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
                    <div class="col-md-3">
                            <label for="producto_latitud" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="producto_latitud" value="<?php echo ($this->input->post('producto_latitud') ? $this->input->post('producto_latitud') : $producto['producto_latitud']); ?>" class="form-control" id="producto_latitud" />
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="producto_longitud" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="producto_longitud" value="<?php echo ($this->input->post('producto_longitud') ? $this->input->post('producto_longitud') : $producto['producto_longitud']); ?>" class="form-control" id="producto_longitud" />
                            </div>
                    </div>
                    <div class="col-md-5">
                        <label for="producto_caracteristicas" class="control-label">Características</label>
                        <div class="form-group">
                            <textarea rows="1" type="texarea" name="producto_caracteristicas" value="" class="form-control" id="producto_caracteristicas" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" ><?php echo ($this->input->post('producto_caracteristicas') ? $this->input->post('producto_caracteristicas') : $producto['producto_caracteristicas']); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
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
                <?php echo form_close(); ?>
        </div>
    </div>
</div>


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