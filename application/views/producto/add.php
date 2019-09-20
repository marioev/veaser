<script src="<?php echo base_url('resources/js/funciones_producto_newcategoria.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<script type="text/javascript">
function mostrar(a) {
    obj = document.getElementById('oculto'+a);
    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    //objm = document.getElementById('map');
    if(obj.style.visibility == 'hidden'){
        $('#map').css({ 'width':'0px', 'height':'0px' });
        $('#mosmapa').text("Obtener Ubicación del negocio");
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
                                            foreach($all_categoria as $categoria)
                                            {
                                                    $selected = ($categoria['categoria_id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";

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
                    <div class="col-md-3">
                            <label for="producto_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                    <input type="file" name="producto_foto" value="<?php echo "producto.jpg"; ?>" class="btn btn-success btn-sm form-control" id="producto_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del negocio</a></label>
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
                                    navigator.geolocation.getCurrentPosition(
                                      function (position){
                                        coords_lat =  {
                                          lat: position.coords.latitude,
                                        };
                                        coords_lng =  {
                                          lng: position.coords.longitude,
                                        };
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa

                                      },function(error){console.log(error);});
                            }

                            function setMapa (coords_lat, coords_lng)
                            {
                                    document.getElementById("cliente_latitud").value = coords_lat.lat;
                                    document.getElementById("cliente_longitud").value = coords_lng.lng;
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
                                    document.getElementById("cliente_latitud").value = this.getPosition().lat();
                                    document.getElementById("cliente_longitud").value = this.getPosition().lng();
                                  });
                            }
                            initMap();
                        </script>                                            
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>                                            
                        </div>
                        <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
                    </div>
                    <div class="col-md-3">
                            <label for="cliente_latitud" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="cliente_latitud" value="<?php echo $this->input->post('cliente_latitud'); ?>" class="form-control" id="cliente_latitud" />
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="cliente_longitud" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="number" step="any" name="cliente_longitud" value="<?php echo $this->input->post('cliente_longitud'); ?>" class="form-control" id="cliente_longitud" />
                            </div>
                    </div>
                    <div class="col-md-6">
                        <label for="producto_caracteristicas" class="control-label">Características</label>
                        <div class="form-group">
                            <textarea rows="1" type="texarea" name="producto_caracteristicas" value="" class="form-control" id="producto_caracteristicas" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> </textarea>
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