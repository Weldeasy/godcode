<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <link href="<?php echo base_url();?>media/css/style.css" rel="stylesheet">
    <link href="navbar-fixed-top.css" rel="stylesheet">
 </head>
 <body>
 <div id='cssmenu'>
   <ul>
	   <li class='active'><a href='#'><span>QUÉ ES UN BANCO DEL TIEMPO?</span></a></li>
	   <li class='active'><a href='#'><span>SOBRE GODCODE</span></a></li>
	   <li class='active'><a href='#'><span>CONTACTA</span></a></li>
	   <li><?php echo $this->load->view($login_form); ?></li>
	</ul>
 </div>
 <div id="busqueda">
 <div class="seccion zona_busqueda">
      <center>
        <div class="contenido_zona_busqueda">
            <div class="caja_busqueda">
              <h1>SOBRE GODCODE</h1>
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
    <div class="sombra_zona_busqueda"></div>
    <div id="contenido_principal">
      <h1>Contenido de página principal</h1>
      <p>Contenido principal por definir.</p>
    </div>
</div>