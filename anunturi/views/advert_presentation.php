<div class="well well-sm">
	<span class="label label-danger"><?=$advert->type?></span>
    Anunt publicat de <?=$user_data->username?>
</div>
<h1>Detalii anunt</h1>
<div class="well well-sm">
	<h2>
		<strong>Titlu</strong>
	</h2>
	<p class="lead"><?=$advert->title?></p>
	<h2>
		<strong>Descriere</strong>
	</h2>
	<?=$advert->description?>
    <h2>
		<strong>Pret:&nbsp;</strong><?=$advert->price?><?=$advert->currency?></h2>
		<strong>Data anuntului:&nbsp;</strong><?=$advert->date?></h3>
</div>

<h1>Imagini anunt</h1>
<div class="well">
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
</div>