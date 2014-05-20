<div id="busqueda">
 <div class="seccion zona_busqueda">
      <center>
        <div class="contenido_zona_busqueda">
            <div class="caja_busqueda">
              <h1>Cercar Usuaris</h1>
              <h3> Troba els serveis que dispone els usuaris concrets</h3>
               <hr>
               <br>
                <div class="contenido_formulario_busqueda">
                  <form id="landingForm" action="<?php echo base_url(); ?>index.php/cercar_usuari" method="post">
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

<div class="infousuari">
<h1 class="label_title">Serveis dels usuaris</h1>
  <div class="un_info_usuari">
    <p><b>Nom i cognom:</b>Juan Fernadez</p>
    <img src="<?=base_url()?>media/users_profile/thumbs/anonimo.jpg"/>
   <p><b>Correu :</b>juan@gmail.com</p>
   <p><b>Població :</b>Granollers</p>
  </div>
  <div class="detail_servei_user">
    <p><b>Nom :</b>Creació webs</p>
    <p><b>Categoria :</b>Informàtica</p>
  </div>
</div>
