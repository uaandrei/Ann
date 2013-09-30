<?=$error?>
<form class='add_user' method="post" action='<?=base_url().'user/submitLogin'?>'>
	<table>
		<tr>
			<td>Utilizator</td>
			<td><input type='text' name='username' required="required"/></td>
		</tr>
		<tr>
			<td>Parola</td><td><input type="password" name='password' required="required"/></td>
		</tr>
	</table>
	<input type='submit' value='Autentifica'/>
</form>