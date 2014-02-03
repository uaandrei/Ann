<div class="col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="well sidebar-nav">
		<?php foreach ($main_categories as $category): ?>
    	       <span class="label label-success"><?=$category->name?></span>
		       <?php if($this->category_model->hasSubcategories($category->id)):?>
		       <div class="list-group">
    	           <?php foreach($this->category_model->getSubcategories($category->id) as $subcategory): ?>
    	               <a class="list-group-item <?php if($active_page == $subcategory->id) echo 'active'?>" href="<?=base_url()?>advert/category?c_id=<?=$subcategory->id?>">
                        	<i class="<?=$subcategory->icon?>"></i>&nbsp;<?=$subcategory->name?>	               
                        </a>
                            	               
    	           <?php endforeach; ?>
    	       </div>
	           <?php endif;?>
		<?php endforeach;?>
	</div>
</div>
