<?php 
			if ( has_post_thumbnail() ) {
				$feature_src = the_post_thumbnail();
			} else {
				$feature_src = get_template_directory_uri()."/images/image.png";
			}
?>	<!-- Framed Image Starts -->
 
				<div class="framed-image">
						<div class="frame">
							<div class="frame_bot">
								<div class="frame_left">
									<div class="frame_right">
										<span class="corner-t ctl"></span>  	<!-- Top left Corner -->
										<span class="corner-t ctr"></span>	<!-- Top Right Corner  -->
										<span class="corner-b cbl"></span>	<!-- Bottom Left Corner -->
										<span class="corner-b cbr"></span>	<!-- Bottom Right Corner -->
											 <div class="image-content">
											  <!-- Image Goes Here --><a href="#"><img src="<?php echo $feature_src; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
											 </div><!-- Image Content -->
									</div> <!-- Frame Right -->
								</div> <!-- Frame Left -->
							</div><!-- Frame_bot -->
						</div><!-- Frame -->

				</div><!-- Framed Image --> 
 