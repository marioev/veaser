<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $empresa['empresa_nombre']; ?> - ver categorías</title>
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css') ?>"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-select.css') ?>"><!-- bootstrap-select-CSS -->
<link href="<?php echo site_url('resources/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/jquery-ui1.css') ?>">
<link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css') ?>" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/menu_sideslide.css') ?>" type="text/css" media="all"><!-- Navigation-CSS -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->

<script src="<?php echo base_url('resources/js/producto_aumentarvisto.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.min.js') ?>"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo site_url('resources/js/bootstrap.js') ?>"></script>
<script src="<?php echo site_url('resources/js/bootstrap-select.js') ?>"></script>
<!--<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>-->
<!-- language-select -->
<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.leanModal.min.js') ?>"></script>
<link href="<?php echo site_url('resources/css/jquery.uls.css') ?>" rel="stylesheet"/>
<link href="<?php echo site_url('resources/css/jquery.uls.grid.css') ?>" rel="stylesheet"/>
<link href="<?php echo site_url('resources/css/jquery.uls.lcd.css') ?>" rel="stylesheet"/>
<!-- Source -->
<script src="<?php echo site_url('resources/js/jquery.uls.data.js') ?>') ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.data.utils.js') ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.lcd.') ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.languagefilter.js') ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.regionfilter.js') ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.core.js') ?>"></script>
<!-- <script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>-->
<!-- //language-select -->
<!-- switcher-grid and list alignment -->
<script src="<?php echo site_url('resources/js/tabs.js') ?>"></script>	
<!--<script type="text/javascript">
$(document).ready(function () {    
var elem=$('#container ul');      
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});						
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});									
		}
	});
});
</script>-->
<!-- //switcher-grid and list alignment -->
</head>
<body>
	<!-- Navigation -->
        <div class="agiletopbar">
            <div class="wthreenavigation">
                <div class="menu-wrap">
                    <nav class="menu">
                        <div class="icon-list">
                            <?php
                            $i = 0;
                            foreach($all_categoria as $c){
                            $i++;
                            ?>
                            <a href="<?php echo site_url('web/vercategoria/'.$c['categoria_id']); ?>"><i class="fa fa-fw fa-mobile"></i><span><?php echo $c['categoria_nombre']; ?></span></a>
                            <?php
                            }
                            ?>
                        </div>
                    </nav>
                    <button class="close-button" id="close-button">Close Menu</button>
                </div>
                <button class="menu-button" id="open-button"> </button>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //Navigation -->
	<!-- header -->
	<header>
            <div class="w3ls-header"><!--header-one--> 
                <div class="w3ls-header-right">
                    <ul>
                        <li class="dropdown head-dpdn">
                            <a href="<?php echo site_url('login'); ?>" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Ingresar</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div> 
            </div>
            <div class="container">
                <div class="agile-its-header">
                    <div class="logo">
                        <a href="<?php echo site_url(''); ?>">
                            <img src="<?php echo site_url('resources/images/empresas/'.$empresa['empresa_imagen']) ?>" width="144" height="70" />
                        </a>
                        <!--<h1><a href="<?php //echo site_url('') ?>"><?php //echo $empresa['empresa_nombre']; ?></a></h1>-->
                    </div>
                    <div class="agileits_search">
                        <?php echo form_open('web/buscar_productoscategorias'); ?>
                        <input name="buscar_producto" id="buscar_producto" type="text" placeholder="nombre del producto..." required="" autocomplete="off" />
                            <select id="agileinfo_search" name="agileinfo_search" required="">
                                <option value="">- CATEGORIAS -</option>
                                <?php
                                foreach ($all_categoria as $categoria) {
                                ?>
                                <option value="<?php echo $categoria['categoria_id']; ?>"><?php echo $categoria['categoria_nombre']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-search" aria-hidden="true"> </i>
                            </button>
                        <?php echo form_close(); ?>
                    </div>	
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- //header -->
	<!-- breadcrumbs -->
	<div class="w3layouts-breadcrumbs text-center">
            <div class="container">
                <span class="agile-breadcrumbs"></span>
            </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- Products -->
	<div class="total-ads main-grid-border">
            <div class="container">
                <div class="all-categories">
                    <h3> Seleccione su Categoría y encuentre el anuncio perfecto</h3>
                    <ul class="all-cat-list">
                        <?php
                        foreach ($all_categoria as $categoria) {
                        ?>
                        <li><a href="<?php echo site_url('web/vercategoria/'.$categoria['categoria_id']) ?>"><?php echo $categoria['categoria_nombre']; ?>   <span class="num-of-ads"><?php echo "(".$categoria['categoria_visto']." vistos)" ?></span></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="ads-grid">
                    <div class="agileinfo-ads-display col-md-12">
                        <div class="wrapper">					
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="<?php echo site_url('resources/#home') ?>" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                            <?php
                                            $detalle_titulo = "No hay productos...";
                                            if(count($all_productocategoria) >0){
                                                $detalle_titulo = count($all_productocategoria)." ".$all_productocategoria[0]['categoria_nombre'];
                                            }
                                            ?>
                                            <span class="text"><?php echo $detalle_titulo ?></span>
                                      </a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                       <div>
                                            <div id="container">
                                                <div class="clearfix"></div>
                                                    <ul class="list">
                                                            <?php
                                                            foreach ($all_productocategoria as $pc){
                                                            ?>
                                                            <a href="<?php echo site_url('web/verdetalle/'.$pc['producto_id']) ?>" onclick="aumentarvistoproducto(<?php echo $pc['producto_id']; ?>)">
                                                                <li>
                                                                    <?php
                                                                    //$mimagen = "";
                                                                    if($pc["producto_foto"]){
                                                                        //$tipo_imagen = "circle";
                                                                        $tipo_imagen = "";
                                                                    ?>
                                                                        <!--mimagen += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+i+"' style='padding: 0px;'>";-->
                                                                        <img src="<?php echo site_url('resources/images/productos/'.$pc['producto_foto']) ?>" class="img img-<?php echo $tipo_imagen; ?>" width="207px" height="186px" />
                                                                        <!--mimagen += "</a>";-->
                                                                    <?php
                                                                    }else{
                                                                    ?>
                                                                        <img src="<?php echo site_url('resources/images/productos/thumb_image.png') ?>" class="img img-<?php echo $tipo_imagen; ?>"  width="207px" height="186px" />;
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    
                                                                <section class="list-left">
                                                                <h5 class="title"><?php echo $pc['producto_nombre']; ?></h5>
                                                                <span class="adprice"><?php echo $pc['moneda_descripcion']." ".$pc['producto_preciooferta']; ?></span>
                                                                <p class="catpath"><?php echo $pc['producto_marca']." » ".$pc['producto_industria']; ?></p>
                                                                </section>
                                                                <section class="list-right">
                                                                <span class="date"><?php echo date("d/m/Y H:i:s", strtotime($pc['producto_fechahora'])); ?></span>
                                                                <!--<span class="cityname">City name</span>-->
                                                                </section>
                                                                <div class="clearfix"></div>
                                                                </li> 
                                                            </a>
                                                            <?php
                                                            }
                                                            ?>
							</ul>
                                                    </div>
                                                </div>
						</div>
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->		
		<footer>
                    <div class="w3-agileits-footer-top">
                        <div class="container">
                            <div class="wthree-foo-grids">
                                <div class="col-md-3 wthree-footer-grid">
                                    <h4 class="footer-head">¿Quienes Somos?</h4>
                                    <p>Somos una empresa en linea ; con el prestigio de poder servir a los clientes.</p>
                                    <p></p>
                                    <h4 class="footer-head">Compromiso</h4>
                                    <p>Tenemos una firme implicación de la organización con todos nuestros grupos de interés: clientes, personas, aliados y sociedad.</p>
                                    <p></p>
                                </div>
                                <div class="col-md-3 wthree-footer-grid">
                                    <h4 class="footer-head">Ayuda</h4>
                                    <ul>
                                        <li><a href="<?php echo site_url('#'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Como Trabajar</a></li>						
                                        <!--<li><a href="<?php /*echo site_url('web/contacto'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contactanos</a></li>
                                        <li><a href="<?php echo site_url('resources/sitemap.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Sitemap</a></li>
                                        <li><a href="<?php echo site_url('resources/faq.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Faq</a></li>
                                        <li><a href="<?php echo site_url('resources/feedback.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Feedback</a></li>
                                        <li><a href="<?php echo site_url('resources/typography.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Short codes</a></li>
                                        <li><a href="<?php echo site_url('resources/icons.html');*/ ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Icons Page</a></li>-->
                                    </ul>
                                </div>
                                <div class="col-md-3 wthree-footer-grid">
                                    <h4 class="footer-head">Información</h4>
                                    <ul>
                                        <li><a href="<?php echo site_url('resources/regions.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Locations Map</a></li>	
                                        <li><a href="<?php echo site_url('resources/terms.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Terms of Use</a></li>
                                        <li><a href="<?php echo site_url('resources/popular-search.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Popular searches</a></li>	
                                        <li><a href="<?php echo site_url('resources/privacy.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Privacy Policy</a></li>	
                                    </ul>
                                </div>
                                <div class="col-md-3 wthree-footer-grid">
                                    <h4 class="footer-head">Contáctanos</h4>
                                    <span class="hq">Estamos Ubicados en</span>
                                    <address>
                                        <ul class="location">
                                            <?php if($empresa['empresa_ubicacion'] != null && $empresa['empresa_ubicacion'] != ""){ ?>
                                            <li><a href='<?php echo 'https://www.google.com/maps?ll=-17.398219,-66.153848&z=16&t=m&hl=es&gl=BO&mapclient=embed&cid=8758050680115265211'; ?>' target="_blank">
                                                    <span class="glyphicon glyphicon-map-marker"></span>
                                                </a>
                                            </li>
                                            
                                            
                                            <?php } ?>
                                            <li><?php echo $empresa['empresa_direccion']; ?></li>
                                        </ul>	
                                        <div class="clearfix"> </div>
                                        <ul class="location">
                                            <li><span class="glyphicon glyphicon-earphone"></span></li>
                                            <li><?php echo $empresa['empresa_telefono']." | ".$empresa['empresa_celular']; ?></li>
                                        </ul>
                                        <div class="clearfix"> </div>
                                        <ul class="location">
                                            <li><span class="glyphicon glyphicon-envelope"></span></li>
                                            <li><?php echo $empresa['empresa_email'] ?></li>
                                        </ul>
                                        <ul class="location">
                                            <li><a href="<?php echo site_url('web/contacto'); ?>"><span class="glyphicon glyphicon-envelope"></span></a></li>
                                            <li><a href="<?php echo site_url('web/contacto'); ?>">Contactanos</a></li>
                                        </ul>
                                    </address>
                                </div>
						<div class="clearfix"></div>
					</div>						
				</div>	
			</div>	
			<div class="agileits-footer-bottom text-center">
			<div class="container">
				<div class="w3-footer-logo">
					<h1><a href="<?php echo site_url(''); ?>"><?php echo $empresa['empresa_nombre']; ?></a></h1>
				</div>
                <!-- Redes sociales -->
				<!-- div class="w3-footer-social-icons">
					<ul>
						<li><a class="facebook" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a></li>
						<li><a class="twitter" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a></li>
						<li><a class="flickr" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i><span>Flickr</span></a></li>
						<li><a class="googleplus" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google+</span></a></li>
						<li><a class="dribbble" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a></li>
					</ul>
				</div -->
				<div class="copyrights">
                                    <p>Desarrollado por <a href="http://www.passwordbolivia.com/">PASSWORD SRL</a> Ingenieria Hardware & Software</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>
		<!-- Navigation-JavaScript -->
			<script src="<?php echo site_url('resources/js/classie.js') ?>"></script>
			<script src="<?php echo site_url('resources/js/main.js') ?>"></script>
		<!-- //Navigation-JavaScript -->
		<!-- here stars scrolling icon -->
			<script type="text/javascript">
				$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
					*/
										
					$().UItoTop({ easingType: 'easeOutQuart' });
										
					});
			</script>
			<!-- start-smoth-scrolling -->
			<script type="text/javascript" src="<?php echo site_url('resources/js/move-top.js') ?>"></script>
			<script type="text/javascript" src="<?php echo site_url('resources/js/easing.js') ?>"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
			</script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</html>