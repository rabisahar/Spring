<div id="sidebar"> 
		 
				<?php wp_nav_menu( array( 'theme_location' => 'sidebar' , 'container_class' => 'left-nav' ) ); ?>
		 
</div><!-- sidebar -->
		
		<?php
		if(is_active_sidebar('left-sidebar'))
		{
			dynamic_sidebar('left-sidebar');
		} 
		?>