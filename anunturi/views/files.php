<?php if (isset($files) && count($files)): ?>
<div class="row">
<?php foreach ($files as $file): ?>
	<div class="col-sm-6 col-md-3">
		<div class="thumbnai">
			<img src="<?=base_url(). 'uploads/' .$file?>" alt="..." class="img-thumbnail">
			<div class="caption">
				<button onclick="deleteFile(this.value)" class="btn deletefile btn-danger btn-xs" value="<?php $x = explode(SEP, $file); echo $x[3];?>">Sterge</button>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>
<?php else:?>
<p>No Files Uploaded</p>
<?php endif;?>