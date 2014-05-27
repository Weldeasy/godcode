<div class="un_info_usuari">
 <table>
       <tr>
          <td><img height="100px" width="50px" src="<?=base_url() ?>media/images/categorias/<?= $categoria?>.jpg"/></td>
          <td>
              <b>Nom :</b><?= $nom_servei; ?><br />
              <b>Descripció :</b><?= $descripcio_servei; ?><br />
              <b>Categoria :</b><?= $nom_categoria; ?><br />
              <b>Data Inici :</b><?= $data_inici; ?><br />
              <b>Data Final :</b><?= $data_fi; ?><br />
              <b>Horari :</b><?= $horas[0]?>:00 a <?=$horas[1]?>:00;<br />
          </td>
          <td>
              <div class="buttonform"><b>Punts :</b><?= $preu; ?></div>
          </td>
          <?php 
              /*Surtirà butò si usuari està loguejat i el user no pot sol·licitar si mateix i no sigui admin*/
              if(isset($email) && ($user_oferit_servei!=$email) && ($es_admin==0)){
          ?>
          <td>
              <input type='submit' value='Solicitar' onclick="solicitut()" class="buttonform"/>
          </td>

          <?php } ?>
       </tr>
  </table>
  <script type="text/javascript">

  function solicitut(){
        $('#formSolicitut').dialog('open').dialog('setTitle','Solicitut');
  }
</script>
  <table class="disp_dias">
        <tr>
          <td <?php if ( (isset($days)) && (!in_array('L', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >L</td>
          <td <?php if ( (isset($days)) && (!in_array('M', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >M</td>
          <td <?php if ( (isset($days)) && (!in_array('X', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >X</td>
          <td <?php if ( (isset($days)) && (!in_array('J', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >J</td>
          <td <?php if ( (isset($days)) && (!in_array('V', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >V</td>
          <td <?php if ( (isset($days)) && (!in_array('S', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >S</td>
          <td <?php if ( (isset($days)) && (!in_array('D', $days)) ) print 'style="background-color:#FA5858;"'; ?> value="L" >D</td>
        </tr>
      </table>
</div>

    <div id="formSolicitut" class="easyui-dialog" title="Missatge" data-options="iconCls:'icon-save'" closed="true" style="width:400px;height:200px;padding:10px">
      <form id='formulariservei' method='post' action="<?=base_url()?>index.php/inicio/verifica_solicitut">
            <textarea size='30' name='missatge'>
            </textarea>
            <input type='hidden' value='<?= $id_servei; ?>' name='id_servei'/>
              <input type='hidden' value='<?= $email; ?>' name='email_user'/>
              <input type='hidden' value='<?= $id_user; ?>' name='id_user'/>
            <input type='submit' value='Solicitar' class="buttonform"/>
      </form>
    </div>

