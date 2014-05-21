<?php
echo validation_errors();
echo form_open('verifylogin',array('class'=>'login_form'));
?>
	<input class="user_opt" type="text" value="<?= @set_value("email")?>" size="20" id="email" name="email"/>
	<input class="user_opt_p" type="password" size="20" id="password" name="password"/>
	<input type="submit" value="ENTRAR" title="Accedir a la meva conte" />
	<div><?php echo validation_errors(); ?></div>
</form>