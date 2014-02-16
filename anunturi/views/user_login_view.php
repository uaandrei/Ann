<?=$error?>
<form class='add_user' method="post" action='<?=base_url().'user/submitLogin'?>'>
	<div class="form-group">
		<label for="usernameInput">Utilizator</label>
		<input type="text" class="form-control" id="usernameInput" name="username" placeholder="utilizator" title="Introduceti o valoare pentru utilizator." required>
	</div>
	<div class="form-group">
		<label for="passwordInput">Password</label>
		<input type="password" class="form-control" id="passwordInput" name="password" placeholder="parola" title="Introduceti o valoare pentru parola" required>
	</div>
	<button type="submit" class="btn btn-primary">Login</button>
</form>
<a class="btn btn-primary" role="button" href="<?=base_url().'user/newUser'?>">Inregistrare</a>
