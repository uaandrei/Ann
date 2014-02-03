<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title;?></title>
<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-3.1.0/dist/css/ann.css">
<link rel="stylesheet" href="<?=base_url()?>vendor/bootstrap-3.1.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>css/bootover.css">
<link rel="stylesheet" href="<?=base_url()?>css/offcanvas.css">
<link rel="stylesheet" href="<?=base_url()?>css/normalize.css">
<link rel="stylesheet" href="<?=base_url()?>css/main.css">
<link rel="stylesheet" href="<?=base_url()?>css/add.css">
<link rel="stylesheet" href="<?=base_url()?>css/lightbox.css">
<script src="<?=base_url()?>js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php $this->load->view("layout/navbar");?>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<?php $this->load->view("layout/sidebar");?>
			<div class="col-sm-8">
				<p class="pull-right visible-xs">
					<button type="button" class="btn btn-primary navbar-toggle" data-toggle="offcanvas" style="z-index: 1; background: blue;">Toggle nav</button>
				</p>
				<div class="row">
					<?php $this->load->view($content); ?>
				</div>
			</div>
		</div>
		<hr>
		<footer>
			<p>&copy; Company 2013</p>
		</footer>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?=base_url()?>vendor/bootstrap-3.1.0/dist/js/bootstrap.min.js"></script>
	<script src="<?=base_url().'js/ajaxfileupload.js'?>"></script>
	<script src="<?=base_url()?>js/lightbox-2.6.min.js"></script>
	<script src="<?=base_url()?>js/offcanvas.js"></script>
	<script src="<?=base_url()?>js/holder.js"></script>
	<script src="<?=base_url()?>js/plugins.js"></script>
	<script src="<?=base_url()?>js/main.js"></script>
	<script src="<?=base_url().'js/ann.js'?>"></script>
</body>
</html>
