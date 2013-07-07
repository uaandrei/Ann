<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title;?></title>
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url();?>css/ann.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="ann-wrapper background-gradient">
		<div class="main container padding2">
			<div class="navbar">
				<div class="navbar-inner">
					<span class="brand">Anunturi</span>
					<ul class="nav">
						<li class="<?php if($active_page == 'index') echo 'active'?>">
							<a href="<?php echo base_url()?>site/index">Acasa</a>
						</li>
						<li class="<?php if($active_page == 'newAdvert') echo 'active'?>">
							<a href="<?php echo base_url();?>site/newAdvert">Adauga Anunt</a>
						</li>
						<li>
							<li class="<?php if($active_page == 'about') echo 'active'?>">
								<a href="<?php echo base_url()?>site/about">Despre</a>
							</li>
							<div class="btn-group">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									Utilizator
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="#">Autentificare</a></li>
									<li><a tabindex="-1" href="#">Inregistrare</a></li>
								</ul>
							</div>
						</li>
					</ul>
					<form class="navbar-search pull-right">
						<input type="text" class="search-query" placeholder="Search">
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
							echo '><a href="' . base_url() . 'site/category/' . $category->name . '">';
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