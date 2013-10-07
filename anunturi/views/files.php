<?php
// TODO: uploaded files for advert
if (isset($files) && count($files)) {
    ?>
<ul>
	<?php foreach ($files as $file): ?>
	<a class="example-image-link" href="<?=base_url(). 'uploads/' .$file?>" data-lightbox="example-1">
		<img class="example-image" src="<?=base_url(). 'uploads/' .$file?>" alt="thumb-1">
	</a>
	<?php endforeach; ?>
</ul>
<?php
} else {
    ?>
<p>No Files Uploaded</p>
<?php
}
?>