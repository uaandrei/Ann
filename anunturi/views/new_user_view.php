<?=$error?>
<form role="form" class='add_user' method="post" action='<?=base_url()?>user/addNewUser'>
	<div class="form-group">
		<label for="usernameInput">Nume utilizator</label>
		<input class="form-control" id="usernameInput" type="text" name="username" size="10" pattern=".{5,}" title="Minim 5 caractere pentru utilizator." required />
	</div>
	<div class="form-group">
		<label for="passwordInput">Parola</label>
		<input class="form-control" id="passwordInput" type="password" name="password" pattern=".{8,}" title="Minim 8 caractere pentru parola." required />
	</div>
	<div class="form-group">
		<label for="confPasswordInput">Confirmare Parola</label>
		<input class="form-control" id="confPasswordInput" type="password" name="conf-password" required />
	</div>
	<div class="form-group">
		<label for="emailInput">Email</label>
		<input class="form-control" id="emailInput" type="email" name="email" required />
	</div>
	<div class="form-group">
		<label for="fullnameInput">Nume Intreg</label>
		<input class="form-control" id="fullnameInput" type="text" name="fullname" maxLength="40" required />
	</div>
	<div class="form-group">
		<label for="cityInput">Oras</label>
		<input class="form-control" id="cityInput" type="text" name="city" maxLength="20" required />
	</div>
	<div class="form-group">
		<label for="districtInput">Judet</label>
		<input class="form-control" id="districtInput" type="text" name="district" maxLength="20" required />
	</div>
	<div class="form-group">
		<label for="phoneInput">Telefon</label>
		<input class="form-control" id="phoneInput" type="text" name="phone" maxLength="15" required />
	</div>
	<button class="btn btn-primary" type="submit">Creeaza</button>
</form>