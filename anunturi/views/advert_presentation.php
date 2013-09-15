<div>
	<p>Anunt publicat de <?=$user_data->username?></p>
</div>
<div>
	<?=$advert->title ?>
</div>
<div>
	<?=$advert->description ?>
</div>
<?php foreach($advert_files as $file): ?>
	<img src="<?=preg_replace("/./", base_url(), $file->filename, 1)?>" />
<?php endforeach;?>