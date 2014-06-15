<div id="busqueda">
 <div class="seccion zona_busqueda">
      <center>
        <div class="contenido_zona_busqueda">
            <div class="caja_busqueda">
              <h1>Cerca d'usuaris</h1>
              <h3>Busca usuaris pe'l seu nom o direcció de correu, per consultar el seu perfil o serveis.</h3>
               <hr>
               <br>
                <div class="contenido_formulario_busqueda">
                  <form id="landingForm" action="<?= base_url()?>index.php/inicio/detailusuari" method="post">
                      <div class="centrar_form">
                        <input type="text" size='30' name='cercar_user' id='cercar_user' placeholder="Introdueix el teu correu o nom: " title="Sisplau introdueix el teu correu" />
                        <input type="submit" value="Buscar usuari" class="bt_ver_coches">
                     </div>
                  </form>
              </div>
            </div>
        </div>
        </center>
  </div>
</div>