<div>
	<p>Anunt publicat de <?=$user_data->username?></p>
</div>
<div>
	<?=$advert->title?>
</div>
<div>
	<?=$advert->description?>
</div>
<?php for($i = 0; $i < count($advert_files); $i=$i+2): ?>
<?php $fileName = $advert_files[$i]->filename;?>
<?php $secondFileName = $advert_files[$i+1]->filename;?>
    <?php if(strpos($fileName, "thumb")):?>
<a class="example-image-link" href="<?=base_url(). 'data/' .$secondFileName?>" data-lightbox="example-1">
	<img class="example-image" src="<?=base_url(). 'data/' .$fileName?>" alt="...">
</a>
<?php else:?>
<a class="example-image-link" href="<?=base_url(). 'data/' .$fileName?>" data-lightbox="example-1">
	<img class="example-image" src="<?=base_url(). 'data/' .$secondFileName?>" alt="...">
</a>
<?php endif;?>
<?php endfor;?>