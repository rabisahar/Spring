<?php get_header(); ?>
<div class="contentwrapper">
<div class="main-content">
<?php if ((is_home()) OR (is_front_page()) AND (function_exists('putRevSlider'))){ ?>

	<div id="slider-home">
		<?php putRevSlider("home","homepage"); ?>
	</div>
<?php } ?>
			<div id="content">
				<div id="content-top"></div><!-- content-top //do not touch -->
				<div id="content-area">
<!-- Start the Loop. -->
 <?php
	
			 get_template_part( 'loop', 'index' );
			
			
			
			?>

				</div><!-- content-area -->
				<div id="content-bottom"></div><!-- content-bottom //do not touch -->
			</div>  <!-- content -->

		</div><!-- main-content -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>