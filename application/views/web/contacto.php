<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $empresa['empresa_nombre']; ?> - contacto</title>
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-select.css'); ?>"><!-- bootstrap-select-CSS -->
<link href="<?php echo site_url('resources/css/style.css" rel="stylesheet" type="text/css'); ?>" media="all" /><!-- style.css -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/menu_sideslide.css'); ?>" type="text/css" media="all"><!-- Navigation-CSS -->
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
<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.min.js'); ?>"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo site_url('resources/js/bootstrap.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/bootstrap-select.js'); ?>"></script>
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
<?php if(isset($nom_mensaje) && $nom_mensaje ==1){ ?>
<script>
    alert("Nombre, Correro Electronico(valido) y Mensaje son obligatorios");
</script>
<?php } ?>
<!-- language-select -->
<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.leanModal.min.js'); ?>"></script>
<link href="<?php echo site_url('resources/css/jquery.uls.css'); ?>" rel="stylesheet"/>
<link href="<?php echo site_url('resources/css/jquery.uls.grid.css'); ?>" rel="stylesheet"/>
<link href="<?php echo site_url('resources/css/jquery.uls.lcd.css'); ?>" rel="stylesheet"/>
<!-- Source -->
<script src="<?php echo site_url('resources/js/jquery.uls.data.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.data.utils.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.lcd.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.languagefilter.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.regionfilter.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/jquery.uls.core.js'); ?>"></script>
<!--<script>
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
	<!-- contact -->
	<div class="contact main-grid-border">
            <div class="container">
                <h2 style="margin-top: 10px; margin-bottom: 0px" class="w3-head text-center">Contáctanos</h2>
                    <section style="margin-top: 10px; " id="hire">    
                        <form class="submit" id="filldetails" action="<?php echo site_url('web/recibir_mensaje'); ?>" method="post">
                            <div class="field name-box">
                                <input type="text" name="mensaje_nombre" placeholder="¿Quien eres?" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <label>Nombre</label>
                                <span class="ss-icon">check</span>
                            </div>

                            <div class="field email-box">
                                <input style="text-transform: none;"  type="text" name="mensaje_email" placeholder="example@email.com" autocomplete="off" />
                                <label>e-m@il</label>
                                <span class="ss-icon">check</span>
                            </div>

                          <!--<div class="field ad-ID">
                                        <input type="text" name="id" placeholder="Ad ID"/>
                                        <label>Ad ID</label>
                                        <span class="ss-icon">check</span>
                          </div>-->

                            <div class="field phonenum-box">
                                <input type="text" name="mensaje_telefono" placeholder="Numero de Teléfono" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <label>Teléfono</label>
                                <span class="ss-icon">check</span>
                            </div>

                            <div class="field msg-box">
                                <textarea name="mensaje_texto" id="mensaje_texto" rows="4" placeholder="Tu mensaje va aquí..." required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" ></textarea>
                                <label>Tú Mensaje</label>
                                <span class="ss-icon">check</span>
                            </div>
                            <input style="margin-top: 10px !important" class="button" type="submit" value="Enviar" />
			</form>
			</section>
		
		<!-- JavaScript Includes -->
		<script src="<?php echo site_url('resources/js/jquery.knob.js'); ?>"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="<?php echo site_url('resources/js/jquery.ui.widget.js'); ?>"></script>
		<script src="<?php echo site_url('resources/js/jquery.fileupload.js'); ?>"></script>
		
		<!-- Our main JS file -->
		<script src="<?php echo site_url('resources/js/script.js'); ?>"></script>
						</div>
			</section>
			<script>
				  $('textarea').blur(function () {
				$('#hire textarea').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('textarea + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('textarea + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:first-child input').blur(function () {
				$('#hire .field:first-child input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(2) input').blur(function () {
				$('#hire .field:nth-child(2) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(3) input').blur(function () {
				$('#hire .field:nth-child(3) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(4) input').blur(function () {
				$('#hire .field:nth-child(4) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
		  //@ sourceURL=pen.js
		</script>    
		<script>
	  if (document.location.search.match(/type=embed/gi)) {
		window.parent.postMessage("resize", "*");
	  }
	</script>
		</div>	
		<!-- address -->
		<div class="container">
			<div class="agileits-get-us">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $empresa['empresa_direccion']; ?></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $empresa['empresa_telefono']; ?></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="<?php echo $empresa['empresa_email']; ?>"> <?php echo $empresa['empresa_email']; ?></a></li>
				</ul>
			</div>
		</div>
		<!-- //address -->
		<div class="map-w3layouts">
			<h3>Ubicación</h3>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3807.2821128420683!2d-66.1539126187563!3d-17.398243844690437!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373b94696b823%3A0x798ad8b101237ebb!2sPASSWORD%20-%20Ingenier%C3%ADa%20Hardware%20%26%20Software!5e0!3m2!1ses!2sbo!4v1570045997741!5m2!1ses!2sbo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>

	<!-- // contact -->
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
				<div class="w3-footer-social-icons">
					<ul>
						<li><a class="facebook" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a></li>
						<li><a class="twitter" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a></li>
						<li><a class="flickr" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i><span>Flickr</span></a></li>
						<li><a class="googleplus" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google+</span></a></li>
						<li><a class="dribbble" href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
                                    <p>Desarrollado por <a href="http://www.passwordbolivia.com/">PASSWORD SRL</a> Ingenieria Hardware & Software</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
		<!-- Navigation-JavaScript -->
			<script src="<?php echo site_url('resources/js/classie.js'); ?>"></script>
			<script src="<?php echo site_url('resources/js/main.js'); ?>"></script>
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
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</body>
</html>