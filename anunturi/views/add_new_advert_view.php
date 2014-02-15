<form id="add-form" role="form" method="post" action="<?=base_url()?>advert/createNewAdvert">
	<div class="form-group">
		<label for="categoryInput">Categorie</label>
		<select class="form-control" id="categoryInput" name="category">
            <?php foreach ($main_categories as $category): ?>
                <optgroup label="<?=$category->name?>">
                    <?php foreach($this->category_model->getSubcategories($category->id) as $subcategory): ?>     
                        <option value='<?=$subcategory->id?>'><?=$subcategory->name?></option>
                    <?php endforeach;?>
			    </optgroup>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label for="titleInput">Titlu</label>
		<input type="text" class="form-control" id="titleInput" name="title" maxlength="50" value="<?=set_value('title')?>" />
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
				<input type="number" class="form-control" id="priceInput" name="price" min="0" max="99999" value="<?=set_value('price')?>" />
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
		<textarea class="form-control" id="descriptionInput" name="description" rows="5" maxLength="100" value="<?=set_value('description')?>"></textarea>
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

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Imagini anunt</h3>
		<form class="form-inline" method="post" action="<?=base_url().'upload/upload_file'?>" id="upload_file">
			<div class="form-group">
				<input class="btn btn-default" type="file" name="userfile" id="userfile" size="20" />
			</div>
			<button id="submit" type="submit" class="btn btn-default">Adauga imagine</button>
		</form>
	</div>
	<div class="alert alert-info">Rezolutie maxima 1024x768, dimensiune maxima 2MB.</div>
	<div id="advert-images" class="panel-body">Panel content</div>
</div>

<hr />
<div id="advert_message" class="alert alert-danger"><?=validation_errors();?><?=$error?></div>
<button id="submitAdd" class="btn btn-primary">Adauga anunut</button>