
<div class="infousuari">
<<<<<<< HEAD
  <h1 class="label_title">Serveis dels usuaris</h1>
  <?php foreach ($users as $data) { ?>
    <div class="un_info_usuari">
      <form id='formulari' method="post" action="<?=base_url()?>index.php/inicio/serveis_detail">
        <p><b>Nom i cognom:</b><?php echo $data->nom_usuari." ".$data->cognom; ?></p>
        <?php if($data->foto!=null){?>
        <?php }else{ ?>
          <img src="<?=base_url()?>media/users_profile/thumbs/anonimo.jpg"/>
        <?php } ?>
        <p><b>Correu :</b><?php echo $data->email; ?></p>
        <p><b>Població :</b><?php echo $data->poblacion; ?></p>
        <input type="hidden" value="<?php echo $data->email; ?>" name='email_user'/>
        <input type="submit" value='Ver Serveis' />
      </form>
    </div>
  <?php } ?>
=======
<?php var_dump($users); ?>

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
>>>>>>> 86446a82ea01d64b7581ca481bd5d59280eb36c2
</div>
