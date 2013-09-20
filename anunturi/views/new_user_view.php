<?=$error?>
<form class='add_user' method="post" action='<?=base_url().'user/addNewUser'?>'>
	<table>
		<tr>
			<td>Nume Utilizator</td>
			<td><input type='text' name='username' size='10' pattern=".{5,}" required/></td>
		</tr>
		<tr>
			<td>Parola</td>
			<td><input type="password" name='password' pattern=".{8,}" required/></td>
		</tr>
		<tr>
			<td>Confirmare Parola</td>
			<td><input type="password" name='conf-password' pattern=".{8,}" required/></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name='email' required/></td>
		</tr>
		<tr>
			<td>Nume Intreg</td>
			<td><input type="text" name='fullname' required"/></td>
		</tr>
		<tr>
			<td>Oras</td>
			<td><input type="text" name='city' /></td>
		</tr>
		<tr>
			<td>Judet</td>
			<td><input type="text" name='district'></td>
		</tr>
		<tr>
			<td>Telefon</td>
			<td><input type="text" name='phone' required/></td>
		</tr>
	</table>
	<input type='submit' value='Creeaza'/>
</form>