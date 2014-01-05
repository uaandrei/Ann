<?php foreach($advertResults as $advert): ?>

<div class="list-group">
	<div class="list-group-item">
		<a href="<?=base_url()."advert/show/$advert->id"?>">
			<img class="img-thumbnail" src="<?=base_url(). 'data/' .$this->advert_model->getFirstPictureOfAdvert($advert->id) ?>" />
		</a>
		<a href="<?=base_url()."advert/show/$advert->id"?>" class="add-descr"><?=$advert->title ?> </a>
		<span class="badge">Data:
			<?=$advert->date?>
		</span>
	</div>
</div>
<?php endforeach; ?>
<?=$this->pagination->create_links();?>