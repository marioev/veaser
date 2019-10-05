$(document).on("ready",inicio);
function inicio(){
    tablaresultadosmensaje(1);
}

//Tabla resultados de la busqueda en el index de mensaje
function tablaresultadosmensaje(limite)
{
    var controlador = "";
    var parametro = "";
    var elestado = "";
    var lim = "";
    var base_url = document.getElementById('base_url').value;
    controlador = base_url+'mensaje/buscarmensaje/';
    //al inicar carga con los ultimos 50 mensajes
    if(limite == 1){
        lim = "LIMIT 50";
     // carga todos los productos de la BD   
    }else if(limite == 3){
        lim = "";
    }else{
        var estado    = document.getElementById('estado_id').value;
        if(estado == 0){
           elestado += "";
        }else{
           elestado += " and m.estado_id = "+estado+" ";
           /*estadotext = $('select[name="estado_id"] option:selected').text();
           estadotext = "Estado: "+estadotext;*/
        }
        
        parametro = document.getElementById('filtrar').value;
    }
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro, lim:lim, elestado:elestado},
           success:function(respuesta){
               
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    
                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr style='background-color: "+registros[i]["estado_color"]+"'>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>"+registros[i]["mensaje_nombre"]+"</td>";
                        html += "<td>"+registros[i]["mensaje_email"]+"</td>";
                        html += "<td>"+registros[i]["mensaje_telefono"]+"</td>";
                        html += "<td>";
                        var men1 = registros[i]["mensaje_texto"];
                        var men = men1.substr(0,25);
                        
                        var suspensivos = "";
                        if(men1.length >20){
                            suspensivos = "...";
                        }
                        html += men+suspensivos;
                        html += "</td>";
                        html += "<td>";
                        var resp1 = registros[i]["mensaje_respuesta"];
                        var resp = "";
                        var suspensivosresp = "";
                        if(resp1){
                            resp = resp1.substr(0,25);
                            if(resp1.length >20){
                                suspensivosresp = "...";
                            }
                        }
                        
                        html += resp+suspensivosresp;
                        html += "</td>";
                        html += "<td>"+registros[i]["estado_descripcion"]+"</td>";
                        html += "<td>";
                        //html += "<?php";
                        var esteicon = "";
                        var cambiarestado = "";
                        if(registros[i]["estado_id"] == 3){
                            esteicon = "envelope";
                            cambiarestado= "onclick='cambiarestado("+registros[i]["mensaje_id"]+")'";
                        }else{
                            esteicon = "envelope-o";
                            cambiarestado = "";
                        }
                        html += "<a data-toggle='modal' data-target='#myModal"+registros[i]["mensaje_id"]+"' title='Leer Mensaje' class='btn btn-info btn-xs'><span class='fa fa-"+esteicon+"'></span></a>";
                        html += "<!------------------------ INICIO modal para ver Correo ------------------->";
                        html += "<div class='modal' id='myModal"+registros[i]["mensaje_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<b>De: </b>"+registros[i]["mensaje_nombre"]+" &#60"+registros[i]["mensaje_email"]+"&#62";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        var horamensaje = moment(registros[i]["mensaje_fechahoraing"]).format("DD/MM/YYYY H:m:s")+"<br>";
                        html += "<b>Fecha: </b> "+horamensaje;
                        html += "<b>Teléfono: </b> "+registros[i]["mensaje_telefono"];
                        html += "<br>";
                        html += "<b> Mensaje: </b><div style='text-align: justify'>"+registros[i]["mensaje_texto"]+"</div>";
                        html += "<br>";
                        if(registros[i]["mensaje_respuesta"] != null){
                            html += "<br>";
                            var horamensajeresp = moment(registros[i]["mensaje_fechahoraresp"]).format("DD/MM/YYYY H:m:s");
                            html += "<b>Fecha Resp.: </b> "+horamensajeresp+"<br>";
                            html += "<b>Respuesta: </b><div style='text-align: justify'>"+registros[i]["mensaje_respuesta"]+"</div>";
                        }
                        //html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        if(registros[i]["mensaje_telefono"] != "" && registros[i]["mensaje_telefono"] != null){
                            html += "<a "+cambiarestado+" href='https://wa.me/591"+registros[i]["mensaje_telefono"]+"' target='_blank' class='btn btn-success' title='whatsapp'><span class='fa fa-whatsapp'></span></a>";
                        }
                        html += "<a "+cambiarestado+" href='"+base_url+"mensaje/responder/"+registros[i]["mensaje_id"]+"' class='btn btn-success' title='responder' ><span class='fa fa-mail-forward'></span></a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal' title='salir'><span class='fa fa-times'></span></a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para ver Correo ------------------->";
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

function cambiarestado(mensaje_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'mensaje/cambiar_estado';
    $("#myModal"+mensaje_id).modal('hide');
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
}
