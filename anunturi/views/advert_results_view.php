<?php foreach($advertResults as $advert): ?>
	<div class='adt-itm'>
		<div class='adt-ttl'>
			<a href='<?=base_url()."site/show/$advert->id"?>'>
				<?=$advert->title.'('.$advert->type.')'?>
			</a>
		</div>
		<span>Descriere</span>
		<div class='adt-mg10'>
			<?=$advert->description?>
		</div>
		<div>Publicat in data: <?=$advert->date?> <?='('.$advert->district.', '.$advert->city.')'?></div>
		<div>Pret: <?=$advert->price?><?=' '.$advert->currency?></div>
	</div>
<?php endforeach; ?>