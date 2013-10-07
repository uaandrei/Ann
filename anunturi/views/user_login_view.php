<?=$error?>
<form class='add_user' method="post" action='<?=base_url().'user/submitLogin'?>'>
	<div class="form-group">
		<label for="usernameInput">Utilizator</label>
		<input type="text" class="form-control" id="usernameInput" name="username" placeholder="utilizator" required>
	</div>
	<div class="form-group">
		<label for="passwordInput">Password</label>
		<input type="password" class="form-control" id="passwordInput" name="password" placeholder="parola" required>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>