<form method="post"
	action="<?php echo base_url();?>site/createNewAdvert">
	<h3 id="myModalLabel">Adauga anunt nou</h3>
	<label>Email</label> <input name="email" type="email" class="span9"
		maxlength="100">
	<div class="controls-row">
		<select name="category_id" class="span3">
			<?php
			foreach ($categories as $category)
			{
				echo "<option value='$category->id'>$category->name</option>";
			}
			?>
		</select> <input name="title" class="span9" type="text" maxlength="50"
			placeholder="Titlu anunt" required
			title="Va rugam introduceti titlul anuntului">
	</div>
	<div class="controls">
		<textarea name="description" rows="4" maxlength="500" class="span12"
			placeholder="Descriere anunt" required
			title="Va rugam introduceti o descriere pentru anunt"></textarea>
	</div>
	<div class="controls-row">
		<input name="price" type="number" class="span3" placeholder="Pret"
			max="10000" required> <select name="currency" class="span2">
			<option>RON</option>
			<option>EUR</option>
		</select>
	</div>
	<div class="controls-row">
		<div class="controls inline">
			<label>Judet</label> <select name="district">
				<option>Toata tara</option>
				<option>Brasov</option>
				<option>Harghita</option>
			</select>
		</div>
		<div class="controls inline">
			<label>Oras</label> <select name="city">
				<option>---</option>
				<option>Brasov</option>
				<option>Toplita</option>
			</select>
		</div>
	</div>
	<label> Tip anunt
		<div class="controls">
			<label class="radio"> <input name="type" type="radio" value="oferta"
				checked> Oferta
			</label> <label class="radio"> <input name="type" type="radio"
				value="cerere"> Cerere
			</label>
		</div>
	</label>
	<div class="horizontal-separator"></div>
	<button class="btn btn-primary" type="submit">Adauga</button>
</form>
