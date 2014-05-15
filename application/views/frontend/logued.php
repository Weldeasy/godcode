<style>
	.welcome_msg {
		color:white;
		right:5px;
		position:absolute;
	}
	.logout_b {
		right:5px;
		position:absolute;
	}
	.user_settings {
		right:40px;
		position:absolute;
	}
	.user_settings img {
		margin-top:2px;
		width:20px;
	}
</style>
	   <li class="welcome_msg"><?php echo "Hola, ".$this->session->userdata['logged_in']['email']; ?></li>
		<br/>
		<a class="logout_b" title="Tancar sessio" href="<?= base_url()?>index.php/logout"><img src="<?= base_url()?>media/images/frontend/close_session.png" /></a>
		<a class="user_settings" title="La meva conte" href="<?= base_url()?>index.php/user_settings"><img src="<?= base_url()?>media/images/frontend/user_settings.png" /></a>