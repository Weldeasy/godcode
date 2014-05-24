	<li class="welcome_msg active"><img id="redondo" src="<?php echo base_url().'media/users_profile/thumbs/'.$foto; ?>" /><?php echo "Hola,  ".$email; ?><br />
    <a class="logout_b" title="Tancar sessio" href="<?= base_url()?>index.php/logout"><img src="<?= base_url()?>media/images/frontend/close_session.png" /></a>
	<?php if($es_admin){?>
	<a class="user_settings" title="La meva conte" href="<?= base_url()?>index.php/admin"><img src="<?=base_url()?>media/images/frontend/user_settings.png" /></a>
	<?php }else{ ?>
	<a class="user_settings" title="La meva conte" href="<?= base_url()?>index.php/user_settings"><img src="<?=base_url()?>media/images/frontend/user_settings.png" /></a>
	<?php } ?>
    </li>
	