<?=$error?>
<form class='add_user' method="post" action='<?=base_url().'site/addNewUser'?>'>
	<table>
		<tr>
			<td>Utilizator</td>
			<td><input type='text' name='username' size='10' pattern=".{5,}" required="required"/></td>
		</tr>
		<tr>
			<td>Parola</td><td><input type="password" name='password' pattern=".{8,}" required="required"/></td>
		</tr>
	</table>
	<input type='submit' value='Creeaza'/>
</form>