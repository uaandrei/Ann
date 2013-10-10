<?php
// TODO: uploaded files for advert
if (isset($files) && count($files)) {
    ?>
<ul>
	<?php foreach ($files as $file): ?>
	<img src="<?=base_url(). 'uploads/' .$file?>" alt="..." class="img-thumbnail">
	<?php endforeach; ?>
</ul>
<?php
} else {
    ?>
<p>No Files Uploaded</p>
<?php
}
?>