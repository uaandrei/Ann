<form id="add-form" role="form" method="post" action="<?=base_url()?>advert/createNewAdvert">
	<div class="form-group">
		<label for="categoryInput">Categorie</label>
		<select class="form-control" id="categoryInput" name="category">
			<?php foreach ($categories as $category): ?>
                <option value='<?=$category->id?>'><?=$category->name?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label for="titleInput">Titlu</label>
		<input type="text" class="form-control" id="titleInput" name="title" />
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-lg-2">
				<label for="typeInput">Tip anunt</label>
				<select class="form-control" id="typeInput" name="type">
					<option>Oferta</option>
					<option>Cerere</option>
				</select>
			</div>
			<div class="col-lg-2">
				<label for="priceInput">Pret</label>
				<input type="number" class="form-control" id="priceInput" name="price" />
			</div>
			<div class="col-lg-2">
				<label for="currencyInput">Moneda</label>
				<select class="form-control" id="currencyInput" name="currency">
					<option>RON</option>
					<option>EUR</option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="descriptionInput">Descriere</label>
		<textarea class="form-control" id="descriptionInput" name="description" rows="5"></textarea>
	</div>
	<div class="form-group">
		<label for="districtInput">Judet</label>
		<select class="form-control" id="districtInput" name="district">
			<option>Judetul...</option>
		</select>
	</div>
	<div class="form-group">
		<label for="cityInput">Oras</label>
		<select class="form-control" id="cityInput" name="city">
			<option>Orasul...</option>
		</select>
	</div>
</form>
<hr />
<h1>Imagini anunt</h1>
<form method="post" action="<?=base_url().'upload/upload_file'?>" id="upload_file">
	<input type="file" name="userfile" id="userfile" size="20" />
	<button id="add-pic-button" type="button" class="btn btn-default">Alege imagine</button>
	<button id="submit" type="submit" class="btn btn-default">Adauga imagine</button>
	<div id="uploadfile-name"></div>
</form>
<div class="row" id="advert-images"></div>
<hr />
<button id="submitAdd" class="btn btn-primary">Adauga anunut</button>