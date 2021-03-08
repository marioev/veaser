<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!-- <script src="<?php echo base_url('resources/js/mensaje.js'); ?>" type="text/javascript"></script> -->
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php //echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->
<!-------------------------------------------------------->
<div class="box-header">
                <h3 class="box-title">Mensajes</h3>
            	<!--<div class="box-tools">
                    <a href="<?php //echo site_url('mensaje/enviar'); ?>" class="btn btn-success btn-sm">+ Enviar</a> 
                </div>-->
</div>
<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
                  <div class="input-group"> <span class="input-group-addon">Buscar</span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, correo...">
                  </div>
        <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped display" id="table_mensajes">
                    <thead> 
                        <tr class="info">
                            <th>#</th>
                            <th>estado_id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Descripción</th>
                            <th>mensaje_fechahoraing</th>
                            <th>Msj Respuesta</th>
                            <th>mensaje_fechahoraresp</th>
                            <th>estado_color</th>
                            <th>Estado</th>
                            <!-- <th>Responder Por:</th> -->
                            <th>Responder Por:</th>
                        </tr>
                    </thead> 
                    <tfoot>
                        <tr class="info">
                            <th>#</th>
                            <th>estado_id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Descripción</th>
                            <th>mensaje_fechahoraing</th>
                            <th>mensaje_respuesta</th>
                            <th>mensaje_fechahoraresp</th>
                            <th>estado_color</th>
                            <th>Estado</th>
                            <!-- <th>Responder Por:</th> -->
                            <th>Responder Por:</th>
                        </tr>
                    </tfoot>
                </table>
                                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
            </div>
            holas
             <a href="">holas 2</a>
        </div>
    </div>
</div>
<!------------------------- DATATABLES--------------- -->
<!-- <script src="<?= site_url('resources/js/datatables.min.js') ?>"></script> -->
<script src="<?= site_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= site_url('resources/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        var table = $('#table_mensajes').DataTable( {
            "ajax": "msj.txt",
            "columns": [
                { "render": ()=>{ return i++; } },
                { "data": "estado_id", "visible": false },
                { "data": "mensaje_nombre" },
                { "data": "mensaje_email" },
                { "data": "mensaje_telefono" },
                { "data": "mensaje_texto", "render": (data)=>{ return '<div class="col-md-9 col-xs-8"><span>'+data.substr(0, 10)+'...</span></div><div class="col-md-3 col-xs-4"><p class="text-right"><a title="Ver más" data-toggle="modal" data-target="#modalMsjDesc'+i+'" class="ml-0"><i class="fa fa-eye" aria-hidden="true"></i></a></p></div><div class="modal fade" id="modalMsjDesc'+i+'" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Descripción del Msj</h4></div><div class="modal-body"><p class="text-justify">'+data+'</p></div><div class="modal-footer"><button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Cerrar</button></div></div></div></div>' } },
                { "data": "mensaje_fechahoraing", "visible": false },
                { "data": "mensaje_respuesta", "render": (data)=>{ if(data){ return '<div class="col-md-9 col-xs-8"><span>'+data.substr(0,10)+'...</span></div><div class="col-md-3 col-xs-4"><p class="text-right"><a title="Ver más" data-toggle="modal" data-target="#modalMjsResp'+i+'" class="ml-0"><i class="fa fa-eye" aria-hidden="true"></i></a></p></div><div class="modal fade" id="modalMjsResp'+i+'" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Descripción del Msj</h4></div><div class="modal-body"><p class="text-justify">'+data+'</p></div><div class="modal-footer"><button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Cerrar</button></div></div></div></div>' }else{ return "No Respondido"; } }},
                { "data": "mensaje_fechahoraresp", "visible": false },
                { "data": "estado_color", "visible": false },
                { "data": "estado_descripcion", "render": (data)=>{ return '<p class="estadoColor">'+data+'</p>' } },
                { "data": null, "render": (data,type,rol)=>{ return '<a onclick="cambiarestado('+data.mensaje_id+','+data.estado_id+')" href="https://wa.me/591'+data.mensaje_telefono+'" target="_blank" class="btn btn-xs" style="background-color:#4ac959;" title="WhatsApp"><span class="fa fa-whatsapp" style="color: #fff"></span></a><a onclick="cambiarestado('+data.mensaje_id+','+data.estado_id+')" href="./mensaje/responder/'+data.mensaje_id+'" title="Correo" class="btn btn-info btn-xs m-auto" clic><i class="fa fa-envelope" aria-hidden="true"></i></a>' } }
            ]
        } );
    } );

    function cambiarestado(mensaje_id,estado_id){
        var controlador = "";
        var base_url  = document.getElementById('base_url').value;
        if(estado_id == 3){
            controlador = base_url+'mensaje/cambiar_estado';
            // $("#myModal"+mensaje_id).modal('hide');
            $.ajax({url: controlador,
                type:"POST",
                data:{mensaje_id:mensaje_id},
                success:function(respuesta){
                    var registros =  JSON.parse(respuesta);
                    if (registros != null){
                        
                        tablaresultadosmensaje(3);
                    }
                },
                error:function(respuesta){
                    html = "";
                }
            });
        }N
    }
</script>
<!------------------------- DATATABLES--------------- -->
