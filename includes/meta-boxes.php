<?php

	/*
	*
	*	Meta Box Functions
	*	------------------------------------------------
	*/
	
	$prefix = 'coope_';
	
	global $meta_boxes;
	
	$meta_boxes = array();
	

	
	
	/* ==================================================
		
	Page Meta Box
	
	================================================== */
	
	$meta_boxes[] = array(
		'id'    => 'page_meta_box',
		'title' => 'Page Meta',
		'pages' => array( 'page' ),
		'fields' => array(
		
			// PAGE OPTIONS SECTION
			array (
				'name' 	=> '',
				'title' => 'Page Options',
			    'id' 	=> "{$prefix}heading_page",
			    'type' 	=> 'section'
			),
			
			// SHOW PAGE TITLE
			array(
				'name' => 'Show page title',    // File type: checkbox
				'id'   => "{$prefix}page_title",
				'type' => 'checkbox',
				'desc' => 'Show the page title at the top of the page.',
				'std' => 1,
			)
		)
	);


	/********************* META BOX REGISTERING ***********************/
	
	/**
	 * Register meta boxes
	 *
	 * @return void
	 */
	function coope_register_meta_boxes()
	{
		global $meta_boxes;
	
		// Make sure there's no errors when the plugin is deactivated or during upgrade
		if ( class_exists( 'RW_Meta_Box' ) )
		{
			foreach ( $meta_boxes as $meta_box )
			{
				if ($meta_box['id'] == "fw_slider_page_meta_box") {
					if (rw_maybe_include("template-fw-slider.php")) {
						new RW_Meta_Box( $meta_box );
					}
				} else {	
				
				new RW_Meta_Box( $meta_box );
				
				}
			}
		}
	}
	// Hook to 'admin_init' to make sure the meta box class is loaded before
	// (in case using the meta box class in another plugin)
	// This is also helpful for some conditionals like checking page template, categories, etc.
	add_action( 'admin_init', 'coope_register_meta_boxes' );
	
	
	/********************* META BOX CHECK ***********************/
	
	/**
	 * Check if meta boxes is included
	 *
	 * @return bool
	 */
	function rw_maybe_include($template_file)
	{
		// Include in back-end only
		if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN )
			return false;
	
		// Always include for ajax
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
			return true;
	
		// Check for post IDs
		$checked_post_IDs = array();
	
		if ( isset( $_GET['post'] ) )
			$post_id = $_GET['post'];
		elseif ( isset( $_POST['post_ID'] ) )
			$post_id = $_POST['post_ID'];
		else
			$post_id = false;
	
		$post_id = (int) $post_id;
	
		if ( in_array( $post_id, $checked_post_IDs ) )
			return true;
	
		// Check for page template
		$checked_templates = array( $template_file );
	
		$template = get_post_meta( $post_id, '_wp_page_template', true );
		if ( in_array( $template, $checked_templates ) )
			return true;
	
		// If no condition matched
		return false;
	}
	

?>