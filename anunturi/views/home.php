<ul>
	<?php foreach ($adverts as $advert):?>
	<li><?php echo $advert->title . $advert->date; ?></li>
	<?php endforeach;?>
</ul>
