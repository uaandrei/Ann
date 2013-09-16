<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title;?></title>
	<link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?=base_url();?>css/ann.css" rel="stylesheet" media="screen">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="<?=base_url().'js/bootstrap.min.js'?>"></script>
	<script src="<?=base_url().'js/ajaxfileupload.js'?>"></script>
	<script src="<?=base_url().'js/ann.js'?>"></script>
</head>
<body>
	<div class="ann-wrapper background-gradient">
		<div class="main container padding2">
			<div class="navbar">
				<div class="navbar-inner">
					<span class="brand">Anunturi</span>
					<ul class="nav">
						<li class="<?php if($active_page == 'index') echo 'active'?>">
							<a href="<?php echo base_url()?>advert/index">Acasa</a>
						</li>
						<li class="<?php if($active_page == 'newAdvert') echo 'active'?>">
							<a href="<?php echo base_url();?>user/newAdvert">Adauga Anunt</a>
						</li>
						<li>
							<li class="<?php if($active_page == 'about') echo 'active'?>">
								<a href="<?php echo base_url()?>advert/about">Despre</a>
							</li>
							<div class="btn-group">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									<?=$username?>
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<?php if($is_logged):?>
										<li><a tabindex="-1" href="<?=base_url().'user/logout'?>">Deconectare</a></li>
									<?php else:?>
										<li><a tabindex="-1" href="<?=base_url().'user/login'?>">Autentificare</a></li>
										<li><a tabindex="-1" href="<?=base_url().'user/newUser'?>">Inregistrare</a></li>
									<?php endif;?>
								</ul>
							</div>
						</li>
					</ul>
					<form class="navbar-search pull-right" method="post" action="<?php echo base_url();?>advert/search">
						<input id="search_bar" name="kwd" type="text" class="search-query" placeholder="Search" value="<?php if(!empty($kwd)) echo $kwd; ?>">
					</form>
				</div>
			</div>
			<div class="horizontal-separator"></div>
			<div class="row-fluid">
				<div class="span2 lightgray">
					<ul class="nav nav-list">
						<li class="nav-header">CATEGORII</li>
						<?php
						foreach ($categories as $category) {
							echo '<li';
							if($active_page == $category->name)
							{
								echo ' class="active"';
							}
							echo '><a href="' . base_url() . 'advert/category/' . $category->id . '">';
							if(!is_null($category->icon))
							{
								echo '<i class="' . $category->icon . '"></i>';
							}
							echo $category->name;
							echo '</a></li>';
						}
						?>
					</ul>
				</div>
				<div class="span10 lightgray padding1">