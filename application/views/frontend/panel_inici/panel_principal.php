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

                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input id="autocomplete_city" name="autocomplete_city" class="input_ciudad ui-autocomplete-input" type="text" placeholder="Código postal ciudad: " required="" title="Por favor selecciona una ciudad" autofocus="" autocomplete="off">
					<input type="text" name="datainici" id="datepicker1" placeholder="Serveis disponibles desde: ">
					<input type="text" name="datafi" id="datepicker2" placeholder="Serveis disponibles fins el: ">
					<?php echo form_dropdown('categorias', $categorias, 'placeholder="" autocomplete="off" class="input_fecha hasDatepicker id="date_to""'); ?>
                    <input type="submit" value="Buscar servicios" class="bt_ver_coches">
                </form>
              </div>
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