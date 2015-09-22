<?php get_header(); ?>
<div class="contentwrapper">
<div class="main-content">
			<div id="content">
				<div id="content-top"></div><!-- content-top //do not touch -->
				<div id="content-area">
				
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<?php 
		$post_id = get_the_ID(); 
		if ( get_post_meta( $post_id, 'coope_page_title', true ) == "1")  { 
		?>
		<h1 class="page-title"><?php the_title(); ?></h1> <!--  Page Title is set to Yes --> 
		<?php }  ?>
		
		<?php	 get_template_part( 'framed-image'  );	?>
		
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
				</div><!-- content-area -->
				<div id="content-bottom"></div><!-- content-bottom //do not touch -->
			 </div><!-- content -->
 
		</div><!-- main-content -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>