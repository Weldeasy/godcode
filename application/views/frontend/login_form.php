<?php

//$attributes = array('class' => 'email', 'id' => 'form_login');
//echo form_open('verifylogin', $attributes);
if (isset(validation_errors()) {echo validation_errors();}
?>
<form action="verifylogin" class="email" id="form_login">
	<label for="username">Username:</label>
	<input type="text" size="20" id="username" name="username"/>
	<br/>
	<label for="password">Password:</label>
	<input type="password" size="20" id="passowrd" name="password"/>
	<br/>
	<input type="submit" value="Login"/>
</form>