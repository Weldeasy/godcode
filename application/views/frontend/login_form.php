<?php
echo validation_errors();
$attributes = array('class' => 'email', 'id' => 'form_login');
echo form_open('verifylogin', $attributes); 
?>
<label for="email">Email:</label>
	<input type="text" size="20" id="email" name="email"/>
	<br/>
	<label for="passwd">Password:</label>
	<input type="passwd" size="20" id="passowd" name="passwd"/>
	<br/>
	<input type="submit" value="Login"/>
</form>