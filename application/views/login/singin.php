<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Resale_v2 a Classified ads Category Flat Bootstrap Responsive Website Template | Sign in :: w3layouts</title>
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>"><!-- bootstrap-CSS -->
<link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-select.css'); ?>"><!-- bootstrap-select-CSS -->
<link href="<?php echo site_url('resources/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->

<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->

</head>
<!--background: url(../images/account-bg.jpg) no-repeat 0px 0px;-->
<body style="background: url(<?php echo base_url('resources/images/account-bg.jpg'); ?>);">
    <?php if($diaslic < 0){ ?>
    <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion-alert-circled"></i></span>

        <div class="info-box-content">

          <span class="info-box-text"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>

          <span class="info-box-number"></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            No podra ingresar al Sistema.  Consulte con el Proveedor
          </span>
        </div><!-- /.info-box-content -->
  </div>
<?php } else if($diaslic == 5000){ ?>
  <?php }  else { ?>  
    <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion-alert-circled"></i></span>

                <div class="info-box-content">
                               
                  <span class="info-box-text"><font size="4">LA LICENCIA VENCERA EN: <font size="5"><b><?php echo $diaslic['dias']; ?></b></font> DIAS</font></span>
                
                  <span class="info-box-number"></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    No podra ingresar al Sistema.
                  </span>
                </div><!-- /.info-box-content -->
              </div>  
<?php } ?>
	
	<!-- sign in form -->
	 <section>
            <div id="agileits-sign-in-page" class="sign-in-wrapper">
                <div class="agileinfo_signin">
                    <p class="center-block">
                    <?php
                      echo   $this->session->flashdata('msg');
                    ?>
                    </p>
                    <div class="login-head">
                        <h2 class="text-center"><?php echo $empresa[0]["empresa_nombre"] ?></h2>
                        <center><img src="<?php echo base_url('resources/images/empresas/'.$empresa[0]["empresa_imagen"].''); ?>"  style="width:80px;height:80px"></center>
                        <!--<h3 class="text-center">Ximpleman</h3>-->
                    </div>
                    <?php echo form_open('verificar'); ?>
                    <input type="text" name="username" id="username" placeholder="Usuario" autocomplete="off" autofocus  required="" <?php if($diaslic < 0){ ?> readonly <?php } ?> >
                    <input type="password" name="password" id="password" class="lock" placeholder="Contraseña" <?php if($diaslic < 0){ ?> readonly <?php } ?> >
                    <input type="submit" name="Sign In" value="Ingresar">
                    <?php echo form_close(); ?>
                </div>
            </div>
	</section>
	<!-- //sign in form -->
	
</body>

</html>