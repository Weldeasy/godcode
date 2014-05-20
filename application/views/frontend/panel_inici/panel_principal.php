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
                <form id="landingForm" action="<?php echo base_url(); ?>index.php/buscar_servicio" method="post">
          					<input id="city" name="autocomplete_city" class="input_ciudad ui-autocomplete-input" type="text" placeholder="Códi postal o nom de la ciutat: " title="Per favor selecciona una ciutat" autofocus="" >
          					<input type="text" name="datainici" id="datepicker1" placeholder="disponibles desde: ">
          					<input type="text" name="datafi" id="datepicker2" placeholder="disponibles fins el: ">
          					<?php echo form_dropdown('categorias', $categorias, 'name="categories" id="categorias"'); ?>
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