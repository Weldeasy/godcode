<form id='formulariUser' method="post" action="<?=base_url()?>index.php/user_settings/donarBaixaUser_control">
	<table>
		<tr>
			<td>
				<input type="hidden" value="<?= $email ?>" name='email'/>
            	<input type='submit' value='Donar Baixa' name='baixa' class="buttonform" />
			</td>
		</tr>
	</table>
</form>