<?php 
// TODO: uploaded files for advert
if (isset($files) && count($files)) {
    ?>
<ul>
	<?php foreach ($files as $file): ?>
	<li class="image_wrap">
		<img src="$file->filename"/>
	</li>
	<?php endforeach; ?>
</ul>
<?php
} else {
    ?>
<p>No Files Uploaded</p>
<?php
}
?>