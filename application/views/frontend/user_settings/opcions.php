<form id='formulariUser' method="post" action="<?=base_url()?>index.php/user_settings/donarBaixaUser_control">
	<h3>Donar de baixa el meu compte</h3>
	<table>
		<tr>
			<td>
				<input type="hidden" value="<?= $email ?>" name='email'/>
            	<input type='submit' value='Donar Baixa' name='baixa' class="buttonform" />
			</td>
		</tr>
	</table>
</form>
<hr />
<form id='formulariUser' method="post" action="<?=base_url()?>index.php/user_settings/canviaContrasenya_control">
	<h3>Canvi&iuml; la contrasenya</h3>
	<?php 
		if(isset($mensaje)){
			print $mensaje[0];
			print "<br />";
			if (isset($mensaje[1]))
				print $mensaje[1];
		}
	?>
	<table>
		<tr>
			<td>
				<input type="hidden" value="<?= $email ?>" name='email' id='email'/>
            	<input type='button' value='Canvia Contrasenya' name='mostraInput' id="mostraInput" class="buttonform" />
            	<div class='oculto'>
            		<label>Contrasenya Actual: </label><input type="text" name='passOriginal' placeholder='Indiqui la contrasenya actual..'/><br /><br />
            		<label>Nova contrasenya: </label><input type="text" name='passNou' placeholder='Indiqui la nova contrasenya..'/><br />
            		<input type='submit' value='Canvia' class="buttonform" />
            	</div>

			</td>
		</tr>
	</table>
</form>