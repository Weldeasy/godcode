<div class="infousuari">
<h1 class="label_title">Serveis dels usuaris</h1>
<?php if($servei!=null){
	foreach ($servei as $data) { ?>
  <div class="un_info_usuari">
    <table>
         <tr>
            <td><img src="<?=base_url() ?>media/images/categorias/1.jpg"/></td>
            <td>
                <b>Nom :</b><?php echo $data->nom_servei; ?><br />
                <b>Descripció :</b><?php echo $data->descripcio_servei; ?><br />
                <b>Categoria :</b><?php echo $data->nom_categoria; ?><br />
                <b>Data Inici :</b><?php echo $data->data_inici; ?><br />
                <b>Data Final :</b><?php echo $data->data_fi; ?><br />
                <b>Horari :</b><?php echo $data->disp_horaria; ?><br />
            </td>
            <td>
                <b>Preu :</b><?php echo $data->preu; ?>
            </td>
            <td>
                <input type='submit' value='Solicitar' class="buttonform" />
            </td>
         </tr>
    </table>
  </div>

<?php }
 }else{ ?>
	   <div class='un_info_usuari'>
            No té cap servei
       </div>
	<?php } ?>
</div>
