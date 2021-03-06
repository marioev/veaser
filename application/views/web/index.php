<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>"><!-- bootstrap-CSS -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-select.css'); ?>"><!-- bootstrap-select-CSS -->
    <link href="<?php echo site_url('resources/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all"/><!-- style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/jquery-ui1.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>" /><!-- fontawesome-CSS -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/menu_sideslide.css'); ?>" type="text/css" media="all"><!-- Navigation-CSS -->
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } }</script>
    
    <script src="<?php echo base_url('resources/js/web_aumentarvisto.js'); ?>" type="text/javascript"></script>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
    <!-- //meta tags -->

    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!--//fonts-->	


	<script  src="<?php echo site_url('resources/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo site_url('resources/js/skdslider.min.js'); ?>"></script>
    <title><?php echo $empresa['empresa_nombre']; ?></title>
    <link rel="stylesheet" href="<?php echo site_url('resources/css/flexslider.css'); ?>" type="text/css" media="screen" /><!-- flexslider-CSS -->
    <!-- <link rel="stylesheet" href="<?php echo site_url('resources/css/styleflexisel.css'); ?>" type="text/css" media="screen" />flexslider-CSS -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/skdslider.css'); ?>" type="text/css">

    <!-- <style>
        body{
            background: -prefix-linear-gradient(left top, #662d8b, #1bfdfe);
            background: linear-gradient(to bottom right, #662d8b, #1bfdfe);
        }
    </style> -->

</head>
<body>	
    <!-- Navigation -->
    <div class="agiletopbar">
        <div class="wthreenavigation">
            <div class="menu-wrap">
                <nav class="menu">
                    <div class="icon-list">
                        <?php
                        foreach ($all_categoria as $categoria) {
                        ?>
                        <a href="<?= site_url('web/vercategoria/'.$categoria['categoria_id']); ?>" onclick="aumentarvisto(<?php echo $categoria['categoria_id']; ?>)"><i class="<?= $categoria['icono_etiqueta'] ?>"></i><span><?php echo $categoria['categoria_nombre']; ?></span></a>
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
                        <!--<h1><a href="<?php //echo site_url(); ?>"><?php //echo $empresa['empresa_nombre']; ?></a></h1>-->
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
	<!-- Slider -->
		    <?php 
                    if (count($all_slide)>0) { ?>
                    	
                  <ul id="demo1">
                    <?php 
                        
                    foreach($all_slide as $s){
            ?>
			<li>
                <img src="<?php echo site_url('resources/images/sliders/'.$s['slide_imagen']); ?>" alt=''> 
                <!--Slider Description example-->
                <div class="slide-desc">
                    <h3><?php echo $s['slide_leyenda1']; ?></h3> 
                    <h5><a href="<?php echo $s['slide_enlace']; ?>"><badge class="btn btn-info btn-xs"><b><?php echo $s['slide_leyenda2']; ?></b></badge></a></h5>
                </div>
			</li>
            <?php } } ?>

		</ul>    
                
	
		<!-- //Slider -->
		<!-- content-starts-here -->
		<div class="main-content">
            <div class="w3-categories">
                <h3>Categorías</h3>
                <div class="container">
                    <?php
                        $i = 1;
                        foreach($all_categoria as $categoria){
                    ?>
                    <div class="col-md-3">
                        <div class="focus-grid w3layouts-boder<?php echo $i; ?>">
                            <!--<a class="btn-8" href="<?php //echo site_url('categoria/vercategoria/'.$categoria['categoria_id'].'#parentVerticalTab'.$i); ?>">-->
                            <a class="btn-8" href="<?php echo site_url('web/vercategoria/'.$categoria['categoria_id']); ?>" onclick="aumentarvisto(<?php echo $categoria['categoria_id']; ?>)">
                                <div class="focus-border">
                                    <div class="focus-layout">
                                        <?php
                                        $esta_imagen = "default.png";
                                        if($categoria['categoria_imagen']){
                                            $esta_imagen = $categoria['categoria_imagen'];
                                        }
                                        ?>
                                        <div class="focus-image"><img width="85xp" height="85px" src="<?php echo site_url('resources/images/categorias/'.$esta_imagen); ?>" class="img img-circle" /></div>
                                        <h4 class="clrchg"><?php echo $categoria['categoria_nombre']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                        $i++;
                        }
                    ?>
                    <div class="clearfix"></div>
                            
				</div>
			</div>
			<!-- most-popular-ads -->
			<div class="w3l-popular-ads">  
				<h3>Productos Más Vistos</h3>
				<div class="w3l-popular-ads-info">
                    <?php
                        foreach ($productos_vistos as $visto) {
                            $foto = "thumb_".$visto['producto_foto'];
                            if($visto['producto_foto'] == "" || $visto['producto_foto'] == "foto.jpg"){
                                $foto = "thumb_image.png";
                            }
                    ?>
                    <div class="col-md-4 w3ls-portfolio-left">
                        <div class="portfolio-img event-img">
                            <img src="<?php echo site_url('resources/images/productos/'.$foto); ?>" class="img-responsive" alt="" width="216px" height="216px" />
                                <div class="over-image"></div>
                        </div>
                        <div class="portfolio-description">
                            <h5><a href="<?php echo site_url('web/verdetalle/'.$visto['producto_id']); ?>"><?php echo $visto['producto_nombre']; ?></a></h5>
                            <p><?php echo "Marca: ".$visto['producto_marca']."<br>Industria: ".$visto['producto_industria']; ?></p>
                            <a href="<?php echo site_url('web/verdetalle/'.$visto['producto_id']); ?>">
                                <span>Explorar</span>
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="clearfix"> </div>
                </div>
			 </div>
			<!-- most-popular-ads -->
                <div class="trending-ads">
                    <div class="container">
        <!-- slider -->
                        <div class="agile-trend-ads">
                        <h2>Ofertas</h2>
                            <ul id="flexisel1">
                                <?php
                                // $cont = 0;
                                foreach ($productos_ultimos as $ul) {
                                    $lafoto = "thumb_image.png";
                                        if($ul['producto_foto'] != "foto.jpg" || $ul['producto_foto'] != "" || $ul['producto_foto'] != null){
                                            $lafoto = $ul['producto_foto'];
                                        }
                                    ?>
                                <li>
                                    <a href="<?php echo site_url('web/verdetalle/'.$ul['producto_id']); ?>">
                                        <img src="<?php echo site_url('resources/images/productos/'.$lafoto) ?>" width="220px" height="220px" />
                                        <span class="price"><?php echo $ul['moneda_descripcion']." ".$ul['producto_preciooferta']; ?></span>
                                    </a>
                                    <div class="w3-ad-info">
                                        <h5><?php echo $ul['producto_nombre']; ?></h5>
                                        <!--<span> 1 hora</span>-->
                                    </div>
                                </li>
                                    <?php
                                    
                                // $cont++;
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="clearout"></div>
                    </div>
                </div>
			<!-- //slider -->				
			</div>
			<!--partners-->
			<div class="w3layouts-partners">
				<h3>Auspiciadores</h3>
                <div class="container">
                    <ul>
                        <?php foreach($all_auspisiadores as $auspisiador){ ?>
                            <?php if($auspisiador['estado_id'] == 1){ ?>
                            <li><a href="<?= $auspisiador['auspisiador_url']; ?>"><img title="<?= $auspisiador['auspisiador_name'] ?>" class="img-responsive" src="resources/images/auspisiadores/<?= $auspisiador['auspisiador_image']; ?>" alt=""></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>	
		<!--//partners-->
                
            <div class="w3layouts-breadcrumbs text-center">
                <div class="container">
                    <span class="agile-breadcrumbs"></span>
                </div>
            </div>
		</div>
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
		<!-- Navigation-Js-->
			<script type="text/javascript" src="<?php echo site_url('resources/js/main.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo site_url('resources/js/classie.js'); ?>"></script>
		<!-- //Navigation-Js-->
		<!-- js -->
		
		<!-- js -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo site_url('resources/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo site_url('resources/js/bootstrap-select.js'); ?>"></script>
		<script>
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
		</script>
		
		<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.flexiselmod.js'); ?>"></script><!-- flexisel-js -->	
					<script type="text/javascript">
                                            $(window).load(function() {
 
                                                $("#flexisel1").flexisel({
                                                    visibleItems: 4,
                                                    itemsToScroll: 1,         
                                                    autoPlay: {
                                                        enable: true,
                                                        interval: 5000,
                                                        pauseOnHover: true
                                                    }        
                                                });

                                            });
					/*	 $(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems:1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});
							
						});*/
					   </script>
		<!-- Slider-JavaScript -->
		<!-- main slider-banner -->
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 1000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
			
		<!-- //Slider-JavaScript -->
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
			<script type="text/javascript" src="<?php echo site_url('resources/js/move-top.js'); ?>"></script>
			<script type="text/javascript" src="<?php echo site_url('resources/js/easing.js'); ?>"></script>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
				});
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</body>		
</html>