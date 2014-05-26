<li class="active login_responsive">
<?php
echo form_open('verifylogin',array('class'=>'login_form'));
?>
	<input class="user_opt" type="text" value="<?= @set_value("email")?>" size="20" id="email" name="email" required/>
	<input class="user_opt_p" type="password" size="20" id="password" name="password" required/>
	<input type="submit" value="ENTRAR" title="Accedir a la meva conte" />
</form>
</li>
<div id="login_errors">
	<ul>
		<li><?= form_error("email"); ?></li>
		<li><?= form_error("password"); ?></li>
	</ul>
</div>