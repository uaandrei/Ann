<a class="list-group-item <?php if($selected_category == $category->id) echo 'active'?>" href="<?=base_url()?>advert/category?c_id=<?=$category->id?>">
	<i class="<?=$category->icon?>"></i>&nbsp;<?=$category->name?>	               
</a>
