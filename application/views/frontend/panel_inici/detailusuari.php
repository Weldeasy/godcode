<div class="un_info_usuari">
  <form id='formularidetailuser' method="post" action="<?=base_url()?>index.php/inicio/serveis_detail">
          <?php if($foto!=null){?>
              <img src='<?=base_url() ?>media/users_profile/thumbs/<?= $foto ?>' />
          <?php }else{ ?>
              <img src='<?=base_url()?>media/users_profile/thumbs/anonimo.jpg'/>
          <?php } ?>
            <div class="text_info_user">
               <b>Nom i cognoms :</b><?= $nom_usuari." ".$cognom; ?><br />
               <b>Correu :</b><?= $email; ?><br />
               <b>Població :</b><?= $poblacion; ?>
            </div>
            <div class='canviposicio'>    
                <input type='hidden' value='<?= $email; ?>' name='email_user'/>
                <input type='submit' value='Veure Serveis' class="buttonform" />
				<a class="buttonform" href="<?= base_url()?>index.php/inicio/perfilusuari/<?= $email?>">Usuari</a>
            </div>
  </form>
</div>

