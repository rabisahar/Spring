<?php get_header(); ?>
<div class="contentwrapper">
<div class="main-content">
			<div id="content">
				<div id="content-top"></div><!-- content-top //do not touch -->
				<div id="content-area">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						This blog was posted
						<?php  
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>. 

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php }   ?>

						<?php  edit_post_link('Edit this entry','','.'); ?>

					</small>
				</p>

			</div>
		</div>
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		<div class="clear" ></div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

		
				</div><!-- content-area -->
				<div id="content-bottom"></div><!-- content-bottom //do not touch -->
			</div>  <!-- content -->
			
			</div><!-- main-content -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>