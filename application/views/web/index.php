<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<script  src="<?php echo site_url('resources/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/skdslider.min.js'); ?>"></script>
<title><?php echo $empresa['empresa_nombre']; ?></title>
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-select.css'); ?>"><!-- bootstrap-select-CSS -->
<link href="<?php echo site_url('resources/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/flexslider.css'); ?>" type="text/css" media="screen" /><!-- flexslider-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/skdslider.css'); ?>" type="text/css">
<link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/menu_sideslide.css'); ?>" type="text/css" media="all"><!-- Navigation-CSS -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="<?php echo base_url('resources/js/categoria_aumentarvisto.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />


<!-- //meta tags -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
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
                        <a href="<?php echo site_url('categoria/vercategoria/'.$categoria['categoria_id']); ?>" onclick="aumentarvisto(<?php echo $categoria['categoria_id']; ?>)"><i class="fa fa-fw fa-mobile"></i><span><?php echo $categoria['categoria_nombre']; ?></span></a>
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
                        <h1><a href="<?php echo site_url(); ?>"><?php echo $empresa['empresa_nombre']; ?></a></h1>
                    </div>
                    <div class="agileits_search">
                        <?php echo form_open('categoria/buscar_productoscategorias'); ?>
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
                                    <a class="btn-8" href="<?php echo site_url('categoria/vercategoria/'.$categoria['categoria_id']); ?>" onclick="aumentarvisto(<?php echo $categoria['categoria_id']; ?>)">
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
				<h3>Most Popular Ads</h3>
				 <div class="w3l-popular-ads-info">
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad1.jpg'); ?>" class="img-responsive" alt=""/>
							<div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/cars.html'); ?>">Latest Cars</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/cars.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad2.jpg'); ?>" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/real-estate.html'); ?>">Apartments for Sale</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/real-estate.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad3.jpg'); ?>" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/jobs.html'); ?>">BPO jobs</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/jobs.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad4.jpg'); ?>" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/electronics-appliances.html'); ?>">Accessories</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/electronics-appliances.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad5.jpg'); ?>" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/furnitures.html'); ?>">Home Appliances</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/furnitures.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="<?php echo site_url('resources/images/ad6.jpg'); ?>" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="<?php echo site_url('resources/fashion.html'); ?>">Clothing</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="<?php echo site_url('resources/fashion.html'); ?>">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				 </div>
			 </div>
			<!-- most-popular-ads -->									
			<div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="agile-trend-ads">
					<h2>Trending Ads</h2>
							<ul id="flexiselDemo3">
								<li>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p1.jpg'); ?>" alt="" />
											<span class="price">&#36; 450</span>
										</a> 
										<div class="w3-ad-info">
											<h5>There are many variations of passages</h5>
											<span>1 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p2.jpg'); ?>" alt="" />
											<span class="price">&#36; 399</span>
										</a> 
										<div class="w3-ad-info">
											<h5>Lorem Ipsum is simply dummy</h5>
											<span>3 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p3.jpg'); ?>" alt="" />
											<span class="price">&#36; 199</span>
										</a> 
										<div class="w3-ad-info">
											<h5>It is a long established fact that a reader</h5>
											<span>8 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p4.jpg'); ?>" alt="" />
											<span class="price">&#36; 159</span>
										</a> 
										<div class="w3-ad-info">
											<h5>passage of Lorem Ipsum you need to be</h5>
											<span>19 hour ago</span>
										</div>
									</div>
								</li>
								<li>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p5.jpg'); ?>" alt="" />
											<span class="price">&#36; 1599</span>
										</a> 
										<div class="w3-ad-info">
											<h5>There are many variations of passages</h5>
											<span>1 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p6.jpg'); ?>" alt="" />
											<span class="price">&#36; 1099</span>
										</a> 
										<div class="w3-ad-info">
											<h5>passage of Lorem Ipsum you need to be</h5>
											<span>1 day ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p7.jpg'); ?>" alt="" />
											<span class="price">&#36; 109</span>
										</a> 
										<div class="w3-ad-info">
											<h5>It is a long established fact that a reader</h5>
											<span>9 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p8.jpg'); ?>" alt="" />
											<span class="price">&#36; 189</span>
										</a> 
										<div class="w3-ad-info">
											<h5>Lorem Ipsum is simply dummy</h5>
											<span>3 hour ago</span>
										</div>
									</div>
								</li>
								<li>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p9.jpg'); ?>" alt="" />
											<span class="price">&#36; 2599</span>
										</a> 
										<div class="w3-ad-info">
											<h5>Lorem Ipsum is simply dummy</h5>
											<span>3 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p10.jpg'); ?>" alt="" />
											<span class="price">&#36; 3999</span>
										</a> 
										<div class="w3-ad-info">
											<h5>It is a long established fact that a reader</h5>
											<span>9 hour ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p11.jpg'); ?>" alt="" />
											<span class="price">&#36; 2699</span>
										</a> 
										<div class="w3-ad-info">
											<h5>passage of Lorem Ipsum you need to be</h5>
											<span>1 day ago</span>
										</div>
									</div>
									<div class="col-md-3 biseller-column">
										<a href="<?php echo site_url('resources/single.html'); ?>">
											<img src="<?php echo site_url('resources/images/p12.jpg'); ?>" alt="" />
											<span class="price">&#36; 899</span>
										</a> 
										<div class="w3-ad-info">
											<h5>There are many variations of passages</h5>
											<span>1 hour ago</span>
										</div>
									</div>
								</li>
						</ul>
					</div>   
			</div>
			<!-- //slider -->				
			</div>
			<!--partners-->
			<div class="w3layouts-partners">
				<h3>Our Partners</h3>
					<div class="container">
						<ul>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-1.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-2.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-3.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-4.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-5.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-6.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-7.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-8.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-9.png'); ?>" alt=""></a></li>
							<li><a href="<?php echo site_url('resources/#'); ?>"><img class="img-responsive" src="<?php echo site_url('resources/images/p-10.png'); ?>" alt=""></a></li>	
						</ul>
					</div>
				</div>	
		<!--//partners-->	
		<!-- mobile app -->
			<div class="agile-info-mobile-app">
				<div class="container">
					<div class="col-md-5 w3-app-left">
						<a href="<?php echo site_url('resources/mobileapp.html'); ?>"><img src="<?php echo site_url('resources/images/app.png'); ?>" alt=""></a>
					</div>
					<div class="col-md-7 w3-app-right">
						<h3>Resale App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at elementum. Suspendisse et condimentum nibh.</p>
						<div class="agileits-dwld-app">
							<h6>Download The App : 
								<a href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-apple"></i></a>
								<a href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-windows"></i></a>
								<a href="<?php echo site_url('resources/#'); ?>"><i class="fa fa-android"></i></a>
							</h6>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //mobile app -->
		</div>
		<!--footer section start-->		
		<footer>
			<div class="w3-agileits-footer-top">
				<div class="container">
					<div class="wthree-foo-grids">
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">¿Quienes Somos?</h4>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
							<p>The point of using Lorem Ipsum is that it has a more-or-less normal letters, as opposed to using 'Content here.</p>
						</div>
						<div class="col-md-3 wthree-footer-grid">
							<h4 class="footer-head">Ayuda</h4>
							<ul>
								<li><a href="<?php echo site_url('resources/howitworks.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>How it Works</a></li>						
								<li><a href="<?php echo site_url('resources/sitemap.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Sitemap</a></li>
								<li><a href="<?php echo site_url('resources/faq.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Faq</a></li>
								<li><a href="<?php echo site_url('resources/feedback.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Feedback</a></li>
								<li><a href="<?php echo site_url('resources/contact.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contact</a></li>
								<li><a href="<?php echo site_url('resources/typography.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Short codes</a></li>
								<li><a href="<?php echo site_url('resources/icons.html'); ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Icons Page</a></li>
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
							<span class="hq">Our headquarters</span>
							<address>
								<ul class="location">
									<li><span class="glyphicon glyphicon-map-marker"></span></li>
									<li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
								</ul>	
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="glyphicon glyphicon-earphone"></span></li>
									<li>+0 561 111 235</li>
								</ul>	
								<div class="clearfix"> </div>
								<ul class="location">
									<li><span class="glyphicon glyphicon-envelope"></span></li>
									<li><a href="<?php echo site_url('resources/mailto:info@example.com'); ?>">mail@example.com</a></li>
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
					<p> © 2016 Resale. All Rights Reserved | Design by  <a href="<?php echo site_url('resources/http://w3layouts.com/'); ?>"> W3layouts</a></p>
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
		<script>
					$( document ).ready( function() {
						$( '.uls-trigger' ).uls( {
							onSelect : function( language ) {
								var languageName = $.uls.data.getAutonym( language );
								$( '.uls-trigger' ).text( languageName );
							},
							quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
						} );
					} );
				</script>
		<!-- //language-select -->
		<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.flexisel.js'); ?>"></script><!-- flexisel-js -->	
					<script type="text/javascript">
						 $(window).load(function() {
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
							
						});
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
			<!-- start-smoth-scrolling -->
		<!-- //here ends scrolling icon -->
</body>		
</html>