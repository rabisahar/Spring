<?php get_header(); ?>
<div id="main">
			<div id="content">
				<div id="content-top"></div><!-- content-top //do not touch -->
				<div id="content-area">
<!-- Start the Loop. -->
<h1 class="cat-title"><?php
					printf( __( '%s Archives: ', 'coope' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1><br/>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';
				
				get_template_part( 'loop', 'category' );
				?>


				</div><!-- content-area -->
				<div id="content-bottom"></div><!-- content-bottom //do not touch -->
			</div>  <!-- content -->
<?php get_sidebar(); ?>
		</div><!-- main -->
<?php get_footer(); ?>