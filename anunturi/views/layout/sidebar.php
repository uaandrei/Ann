<div class="col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="well sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header">CATEGORII</li>
			<?php foreach ($categories as $category): ?>
    			<?php if($active_page == $category->id): ?>
    			<li class="active">
    		    <?php else: ?>
    		    <li>
    		    <?php endif;?>
                   <a href="<?=base_url()?>advert/category?c_id=<?=$category->id?>">
    					<i class="<?=$category->icon?>"></i>&nbsp;<?=$category->name?>	               
    	           </a>
    			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
