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
	<img src="<?=base_url().'data/'.$file->filename?>" />
<?php endforeach;?>