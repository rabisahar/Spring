<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
 
 <div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'coope' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'coope' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 --> 
 
<?php endif; ?>


<?php $alt="odd"; 
 while ( have_posts() ) : the_post();
 ?>

<?php /* How to display posts in the Gallery category. */ ?>
<?php
if ($alt <> "even") {
   $alt = "even";
} else {
   $alt = "odd";
}
?>
	
		<?php if ( in_category( _x('gallery', 'gallery category slug', 'coope') ) ) : ?>
	 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title  <?php echo $alt; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'coope' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<div class="entry-meta  <?php echo $alt; ?>">
				<?php coope_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content  <?php echo $alt; ?>">
<?php if ( post_password_required() ) : ?>
				<?php the_content(); ?>
<?php else : ?>			
				<?php 
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb  <?php echo $alt; ?>">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'coope' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'coope' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								$total_images
							); ?></em></p>
				<?php endif; ?>
						<?php the_excerpt(); ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<!-- <div class="entry-utility">
				<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'coope'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'coope' ); ?>"><?php _e( 'More Galleries', 'coope' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'coope' ), __( '1 Comment', 'coope' ), __( '% Comments', 'coope' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'coope' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div>.entry-utility -->
		</div><!-- #post-## -->
 
 
<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'coope') ) ) : ?>
 
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary  <?php echo $alt; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content  <?php echo $alt; ?>">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'coope' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<!--<div class="entry-utility">
				<?php coope_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php //comments_popup_link( __( 'Leave a comment', 'coope' ), __( '1 Comment', 'coope' ), __( '% Comments', 'coope' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'coope' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div> .entry-utility -->
		</div><!-- #post-## -->
 
 
<?php /* How to display all other posts. */ ?>

	<?php else : ?>
	
 
 


	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
<div class="archive-title  <?php echo $alt; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'coope' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div>
			<div class="archive-meta <?php echo $alt; ?>"> 
				<?php 
					coope_posted_on(); 
				?>
			</div><!-- .archive-meta -->
<?php else : ?>	
		<h1 class="entry-title  <?php echo $alt; ?>"  ><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'coope' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<div class="entry-meta  <?php echo $alt; ?>"> 
				<?php 
					coope_posted_home(); 
				?>
			</div><!-- .entry-meta -->
<?php endif; ?>
<?php if ( is_archive() || is_search() || is_front_page || is_home ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary  <?php echo $alt; ?>">
				<?php  the_excerpt(); ?>
			</div><!-- .entry-summary -->
<?php else : ?>
			<div class="entry-content  <?php echo $alt; ?>">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'coope' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coope' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

			<!--<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'coope' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'coope' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'coope' ), __( '1 Comment', 'coope' ), __( '% Comments', 'coope' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'coope' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div> .entry-utility -->
		</div><!-- #post-## -->
 
 
		<?php //comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'coope' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'coope' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
