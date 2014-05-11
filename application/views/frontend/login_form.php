<?php
echo validation_errors();
echo form_open('verifylogin'); 
?>
<label for="email">Email:</label>
	<input type="text" size="20" id="email" name="email"/>
	<br/>
	<label for="password">Password:</label>
	<input type="password" size="20" id="password" name="password"/>
	<br/>
	<input type="submit" value="Login"/>
</form>