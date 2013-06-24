<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="#">Anunturi</a>
		<ul class="nav">
			<li class="active"><a href="#">Acasa</a></li>
			<li><a href="<?php echo base_url();?>site/newAdvert">Adauga anunt</a></li>
			<li>
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
				echo '<li><a href="' . base_url() . 'site/category/' . $category->name . '">';
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