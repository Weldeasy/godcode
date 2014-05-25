<div class="un_info_usuari">
<form id='formulariservei' method='post' action="<?=base_url()?>index.php/inicio/verifica_solicitut">
 <table>
       <tr>
          <td><img src="<?=base_url() ?>media/images/categorias/<?= $categoria?>.jpg"/></td>
          <td>
              <b>Nom :</b><?= $nom_servei; ?><br />
              <b>Descripció :</b><?= $descripcio_servei; ?><br />
              <b>Categoria :</b><?= $nom_categoria; ?><br />
              <b>Data Inici :</b><?= $data_inici; ?><br />
              <b>Data Final :</b><?= $data_fi; ?><br />
              <b>Horari :</b><?= $disp_horaria; ?><br />
          </td>
          <td>
              <div class="buttonform"><b>Punts :</b><?= $preu; ?></div>
          </td>
          <?php 
              /*Surtirà butò si usuari està loguejat i el user no pot sol·licitar si*/
              if(isset($email) && ($user_oferit_servei!=$email)){
          ?>
          <td>
              <input type='hidden' value='<?= $id_servei; ?>' name='id_servei'/>
              <input type='hidden' value='<?= $email; ?>' name='email_user'/>
              <input type='hidden' value='<?= $id_user; ?>' name='id_user'/>
              <input type='submit' value='Solicitar' class="buttonform"/>
          </td>
          <?php } ?>
       </tr>
  </table>
</form>
</div>