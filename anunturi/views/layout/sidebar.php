<div class="col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
	<div class="well sidebar-nav">
		<ul class="nav">
			<li class="nav-header">CATEGORII</li>
			<?php
                foreach ($categories as $category) {
                    echo '<li';
                    if ($active_page == $category->id) {
                        echo ' class="active"';
                    }
                    echo '><a href="' . base_url() . 'advert/category/' . $category->id . '">';
                    if (! is_null($category->icon)) {
                        echo '<i class="' . $category->icon . '"></i>';
                    }
                    echo "&nbsp;" . $category->name;
                    echo '</a></li>';
                }
            ?>
		</ul>
	</div>
</div>
