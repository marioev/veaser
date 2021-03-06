$(document).on("ready",inicio);
function inicio(){
    tablaresultadosproducto(1);
}

/*
 * Funcion que buscara productos en la tabla productos
 */
function buscarproducto(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  
    if (tecla==13){
        tablaresultadosproducto(2);
    }
}

function imprimir_producto(){
    var estafh = new Date();
    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}

/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
/* recibe Date y devuelve en formato dd/mm/YYYY hh:mm:ss ampm */
function formatofecha_hora_ampm(string){
    var mifh = new Date(string);
    var info = "";
    var am_pm = mifh.getHours() >= 12 ? "p.m." : "a.m.";
    var hours = mifh.getHours() > 12 ? mifh.getHours() - 12 : mifh.getHours();
    if(string != null){
       info = aumentar_cero(mifh.getDate())+"/"+aumentar_cero((mifh.getMonth()+1))+"/"+mifh.getFullYear()+" "+aumentar_cero(hours)+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds())+" "+am_pm;
   }
    return info;
}

//Tabla resultados de la busqueda en el index de producto
function tablaresultadosproducto(limite)
{
    var controlador = "";
    var parametro = "";
    var categoriatext = "";
    var estadotext = "";
    var categoriaestado = "";
    var base_url = document.getElementById('base_url').value;
    //var parametro_modulo = document.getElementById('parametro_modulorestaurante').value;
    //var lapresentacion = JSON.parse(document.getElementById('lapresentacion').value);
    //al inicar carga con los ultimos 50 productos
    if(limite == 1){
        controlador = base_url+'producto/buscarproductoslimit/';
     // carga todos los productos de la BD   
    }else if(limite == 3){
        controlador = base_url+'producto/buscarproductosall/';
     // busca por categoria
    }else{
        controlador = base_url+'producto/buscarproductos/';
        var categoria = document.getElementById('categoria_id').value;
        var estado    = document.getElementById('estado_id').value;
        if(categoria == 0){
           categoriaestado = "";
        }else{
           categoriaestado = " and p.categoria_id = cp.categoria_id and p.categoria_id = "+categoria+" ";
           categoriatext = $('select[name="categoria_id"] option:selected').text();
           categoriatext = "Categoria: "+categoriatext;
        }
        if(estado == 0){
           categoriaestado += "";
        }else{
           categoriaestado += " and p.estado_id = "+estado+" ";
           estadotext = $('select[name="estado_id"] option:selected').text();
           estadotext = "Estado: "+estadotext;
        }
        
        $("#busquedacategoria").html(categoriatext+" "+estadotext);
        
        parametro = document.getElementById('filtrar').value;
    }
    
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro, categoriaestado:categoriaestado},
           success:function(respuesta){    
               
                                     
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                   var formaimagen = "circle"; //document.getElementById('formaimagen').value;
                   
                    /*var cont = 0;
                    var cant_total = 0;
                    var total_detalle = 0; */
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#encontrados").val("- "+n+" -");
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<div id='horizontal'>";
                        html += "<div id='contieneimg'>";
                        var mimagen = "";
                        if(registros[i]["producto_foto"] != null && registros[i]["producto_foto"] !=""){
                            mimagen += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+i+"' style='padding: 0px;'>";
                            mimagen += "<img src='"+base_url+"resources/images/productos/thumb_"+registros[i]["producto_foto"]+"' class='img img-"+formaimagen+"' width='50' height='50' />";
                            mimagen += "</a>";
                            //mimagen = nomfoto.split(".").join("_thumb.");77
                        }else{
                            mimagen = "<img src='"+base_url+"resources/images/productos/thumb_image.png' class='img img-"+formaimagen+"' width='50' height='50' />";
                        }
                        html += mimagen;
                        html += "</div>";
                        html += "<div style='padding-left: 4px'>";
                        html += "<b id='masgrande'>"+registros[i]["producto_nombre"]+"</b><br>";
                        html += registros[i]["producto_unidad"]+" | "+registros[i]["producto_marca"]+" | "+registros[i]["producto_industria"];
                        
                        html += "</div>";
                        html += "</div>";
                        html += "</td>";
                        var escategoria="";
                        if(registros[i]["categoria_id"] == null || registros[i]["categoria_id"] == 0 || registros[i]["categoria_id"] ==""){
                            escategoria = "No definido";
                        }else{
                            escategoria = registros[i]["categoria_nombre"];
                        }
                        var esmoneda="";
                        if(registros[i]["moneda_id"] == null || registros[i]["moneda_id"] == 0 || registros[i]["moneda_id"] == ""){ 
                            esmoneda = "No definido";
                        }else{
                            esmoneda = registros[i]["moneda_descripcion"];
                        }
                        html += "<td><b>Cat.: </b>"+escategoria+"<br><b>Pres.: </b>"+registros[i]["producto_unidad"]+"<br>";
                        html += "<b>Cant. Min.: </b>";
                        html +="</td>";
                        html += "<td class='no-print' style='text-align: center'>";
                        if(registros[i]["producto_check"] == 0){
                            html += "<img src='"+base_url+"resources/images/noubicacion.png' width='30' height='30'>";
                        }else{
                            html += "<a href='https://www.google.com/maps/dir/"+registros[i]["producto_latitud"]+","+registros[i]["producto_longitud"]+"' target='_blank' title='lat:"+registros[i]["producto_latitud"]+", long:"+registros[i]["producto_longitud"]+"'>";                                                                
                            html += "<img src='"+base_url+"resources/images/blue.png' width='30' height='30'>";
                            html += "</a>";
                        }
                        html +="</td>";
                        html += "<td>";
                        var caracteristica = "";
                        if(registros[i]["producto_caracteristicas"] != null){
                            caracteristica = "<div style='word-wrap: break-word;'>"+registros[i]["producto_caracteristicas"]+"</div>";
                        }
                        html+= caracteristica+"</td>";
                        
                        var codbarras = "";
                        if(!(registros[i]["producto_codigobarra"] == null)){
                            codbarras = registros[i]["producto_codigobarra"];
                        }
                        html += "<td>"+registros[i]["producto_codigo"]+"<br>"+ codbarras +"</td>";
                        html += "<td><b>Venta: </b>"+registros[i]["producto_precio"]+"<br>";
                        html += "<span class='text-danger'><b>Venta Min.: "+registros[i]["producto_preciominimo"]+"</b></span><br>";
                        html += "<b>Comisión: </b>"+registros[i]["producto_costo"]+"<br>";
                            //html += "<b>Comisión: </b>"+registros[i]["producto_comision"];
                            html += "</td>";
                        html += "<td><b>Moneda: </b>"+esmoneda+"<br>";
                        html += "</td>";
                        html += "<td class='no-print' style='background-color: #"+registros[i]["estado_color"]+"'>"+registros[i]["estado_descripcion"]+"</td>";
		        html += "<td class='no-print'>";
                        html += "<a href='"+base_url+"producto/edit/"+registros[i]["miprod_id"]+"' class='btn btn-info btn-xs' title='Modificar Información'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"galeria/index/"+registros[i]["miprod_id"]+"' class='btn btn-success btn-xs' title='galeria de Imagenes' ><span class='fa fa-image'></span></a>";
                        // html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+i+"' title='Eliminar'><span class='fa fa-trash'></span></a>";
                        html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                        html += "<div class='modal fade' id='myModal"+i+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b> <span class='fa fa-trash'></span></b>";
                        html += "¿Desea eliminar el Producto <b> "+registros[i]["producto_nombre"]+"</b> ?";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"producto/remove/"+registros[i]["miprod_id"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                        html += "<div class='modal fade' id='mostrarimagen"+i+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["producto_nombre"]+"</b></font>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/productos/"+registros[i]["producto_foto"]+"' />";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";

                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                        html += "</td>";
                        
                        html += "</tr>";

                   }
                   
                   
                   $("#tablaresultados").html(html);
                   document.getElementById('loader').style.display = 'none';
            }
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            //tabla_inventario();
        }
        
    });   

}

