<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Anunturi</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="<?php if($active_page == 'index') echo 'active'?>">
					<a href="<?php echo base_url()?>advert/index">Acasa</a>
				</li>
				<li class="<?php if($active_page == 'newAdvert') echo 'active'?>">
					<a href="<?php echo base_url();?>user/newAdvert">Adauga Anunt</a>
				</li>
				<li class="<?php if($active_page == 'about') echo 'active'?>">
					<a href="<?php echo base_url()?>advert/about">Despre</a>
				</li>
				<li class="btn-group">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <?=$username?><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php if($is_logged):?>
						<li>
							<a tabindex="-1" href="<?=base_url().'user/logout'?>">Deconectare</a>
						</li>
						<?php else:?>
						<li>
							<a tabindex="-1" href="<?=base_url().'user/login'?>">Autentificare</a>
						</li>
						<li>
							<a tabindex="-1" href="<?=base_url().'user/newUser'?>">Inregistrare</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<li>
					<form class="navbar-form" role="search" method="post" action="<?php echo base_url();?>advert/search">
						<div class="form-group">
							<input type="text" name="kwd" class="form-control" placeholder="Cauta un anunt" value="<?php if(!empty($kwd)) echo $kwd; ?>">
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>