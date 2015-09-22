<?php get_header(); ?>
<div class="contentwrapper">
<div class="main-content">
			<div id="content">
				<div id="content-top"></div><!-- content-top //do not touch -->
				<div id="content-area">
<!-- Start the Loop. -->
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( '<span style="font-size:40px">%s Archives:</span>', 'coope' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( '<span>%s</span> Archives: ','coope' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( '<span>%s</span> Archives: ', 'coope' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'coope' ); ?>
<?php endif; ?>
			</h1> <br/>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archives.php and that will be used instead.
	 */
				get_template_part( 'loop', 'archive' );
				?>


				</div><!-- content-area -->
				<div id="content-bottom"></div><!-- content-bottom //do not touch -->
			</div>  <!-- content -->
		</div><!-- main -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>