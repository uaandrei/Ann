<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?>
</title>
<link rel="stylesheet" href="<?=base_url()?>css/ann.css">
<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url()?>css/offcanvas.css">
<link rel="stylesheet" href="<?=base_url()?>css/normalize.css">
<link rel="stylesheet" href="<?=base_url()?>css/main.css">
<link rel="stylesheet" href="<?=base_url()?>css/add.css">
<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<?php $this->load->view("layout/navbar");?>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<?php $this->load->view("layout/sidebar");?>
			<div class="col-xs-12 col-sm-9">
				<p class="pull-right visible-xs">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
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
	<script src="<?=base_url()?>js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>js/offcanvas.js"></script>
	<script src="<?=base_url()?>js/holder.js"></script>
	<script src="<?=base_url()?>js/plugins.js"></script>
	<script src="<?=base_url()?>js/main.js"></script>
	<script src="<?=base_url().'js/ajaxfileupload.js'?>"></script>
	<script src="<?=base_url().'js/ann.js'?>"></script>
</body>
</html>
