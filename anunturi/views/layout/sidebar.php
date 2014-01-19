<div class="col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="well sidebar-nav">
		<span class="label label-success">CATEGORII</span>
		<?php foreach ($main_categories as $category): ?>
		       <h5><?=$category->name?></h5>
		       <?php if($this->category_model->hasSubcategories($category->id)):?>
		       <div class="list-group">
    	           <?php foreach($this->category_model->getSubcategories($category->id) as $subcategory): ?>
    	               <?php $this->load->view('partial/_category_item_view', array('selected_category'=> $active_page, 'category'=>$subcategory)) ?>
    	           <?php endforeach; ?>
    	       </div>
	           <?php endif;?>
		<?php endforeach;?>
	</div>
</div>
