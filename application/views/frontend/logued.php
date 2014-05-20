<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <link href="<?=base_url()?>media/css/style.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">
	
	<link rel="stylesheet" href="<?=base_url()?>media/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=base_url()?>media/js/jquery.fancybox.pack.js?v=2.1.5"></script>
	<style>
	.welcome_msg {
		color:white;
		right:5px;
		position:absolute;
	}
	.logout_b {
		right:5px;
		position:absolute;
	}
	.user_settings {
		right:40px;
		position:absolute;
	}
	.user_settings img {
		margin-top:2px;
		width:20px;
	}
	</style>
 </head>
 <body>
 <div id='cssmenu'>
   <ul>
		<li class='active'><a href='<?= base_url()?>'><span>INICI</span></a></li>
	   <li class='active'><a href='#'><span>QUÉ ES UN BANCO DEL TIEMPO?</span></a></li>
	   <li class='active'><a href='<?= base_url()?>index.php/inicio/aboutus/'><span>SOBRE GODCODE</span></a></li>
	   <li class='active'><a href='<?= base_url()?>index.php/inicio/contacte/'><span>CONTACTA</span></a></li>
	   <li class="welcome_msg" id="redondo"><img id="userfoto" src="<?php echo base_url().'media/users_profile/thumbs/'.$foto; ?>" /></li>
	   <li class="welcome_msg"><?php echo "Hola, 	".$email; ?></li>
		<br/>
		<a class="logout_b" title="Tancar sessio" href="<?= base_url()?>index.php/logout"><img src="<?= base_url()?>media/images/frontend/close_session.png" /></a>
		<a class="user_settings" title="La meva conte" href="<?= base_url()?>index.php/user_settings"><img src="<?= base_url()?>media/images/frontend/user_settings.png" /></a>
	</ul>
 </div>
 <div id="busqueda">
 <div class="seccion zona_busqueda">
      <center>
        <div class="contenido_zona_busqueda">
            <div class="caja_busqueda">
              <h1>Búsqueda servicios</h1>
              <h3>Encuentra los servicios que hay disponibles en tu zona</h3>
              <hr>
			        <br>
              <div class="contenido_formulario_busqueda">
                <form id="landingForm" action="" method="post">
                    <input id="city_id" type="hidden" value="0">
                    <input id="city_name" type="hidden" value="">

                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input id="autocomplete_city" name="autocomplete_city" class="input_ciudad ui-autocomplete-input" type="text" placeholder="Código postal ciudad: " required="" title="Por favor selecciona una ciudad" autofocus="" autocomplete="off">
                    <input id="date_from" class="input_fecha hasDatepicker" type="text" name="date_from" placeholder="" autocomplete="off" required="" title="Selecciona la fecha inicial de la reserva">
                    <input id="date_to" class="input_fecha hasDatepicker" type="text" name="date_to" placeholder="" autocomplete="off" required="" title="Selecciona la fecha final de la reserva">
                    <input type="submit" value="Buscar servicios" class="bt_ver_coches">
                </form>
              </div>
              <p class="pie_texto_busqueda">Sin especificar.</p>
            </div>
        </div>
      </center>
    </div>
    <div id="contenido_principal">
		<div class="sombra_zona_busqueda"></div>
      <div id="contenido_principal_izquierda">
      <a link="#"><img src="<?= base_url()?>media/images/frontend/mas_votados.png" align="center" alt="Top votados" width="100%"></a>
    </div>
    <div id="contenido_principal_derecha">
      <a link="#"><img src="<?= base_url()?>media/images/frontend/categories.png" align="center" alt="Top votados" width="100%"></a>
    </div>
    </div>
</div>
</body>
</html>