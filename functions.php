<?php
		
	define('THEME_PATH', get_template_directory());
	define('INCLUDES_PATH', THEME_PATH . '/includes');
	define('WIDGETS_PATH', INCLUDES_PATH . '/widgets');
	define('THEME_DIRECTORY_URI', get_template_directory_uri());
		
	
//Load Theme Options Framework
if( file_exists(THEME_PATH.'/theme-options.php') )
    include_once(THEME_PATH.'/theme-options.php');
/* Add image resizer */
	require_once(INCLUDES_PATH . '/plugins/aq_resizer.php');

	/* Dropdown menu support */
	include(INCLUDES_PATH . '/plugins/dropdown-menus.php');

/* Include page builder */
	include(INCLUDES_PATH . '/page-builder/js_composer.php');

/* Add meta boxes */
	include(INCLUDES_PATH . '/meta-box/meta-box.php');
	include(INCLUDES_PATH . '/meta-boxes.php');

	/* Include widgets */
 
	include(WIDGETS_PATH . '/widget-twitter.php');
 

	/* LOAD STYLES & SCRIPTS
	================================================== */
		
	function  load_styles() {  
 	    wp_register_style('base-css', THEME_DIRECTORY_URI . '/css/base.css', array(), '1.0', 'screen');  
	    wp_register_style('logo-font-css', THEME_DIRECTORY_URI . '/css/logo-font.css', array(), '1.0', 'screen');
		wp_register_style('main-css', THEME_DIRECTORY_URI . '/style.css', array(), '1.0', 'screen');  
	    wp_register_style('custom-css', THEME_DIRECTORY_URI . '/css/custom-styles.css.php', array(), '1.0', 'screen');
	
		wp_enqueue_style('base-css');
	    wp_enqueue_style('logo-font-css');  	    
	    wp_enqueue_style('main-css');  	   
	    wp_enqueue_style('custom-css');
	
	}

	add_action('wp_enqueue_scripts', 'load_styles');  
	
		function load_scripts() {
	    
	   wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', 'jquery', '2.1', TRUE);
	   wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery', '1.0', TRUE);
	  wp_register_script('hoverIntent', get_template_directory_uri() . '/js/jquery.hoverIntent.min.js', 'jquery', '1.0', TRUE);
	  wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery', '1.3', TRUE);
	  wp_register_script('jcarousel', get_template_directory_uri() . '/js/jquery.jcarousel.min.js', 'jquery', '0.2.8', TRUE); 
	    wp_register_script('jqueryUI', get_template_directory_uri() . '/js/jquery-ui-1.9.2.custom.min.js', 'jquery', '1.9.2', TRUE);
		wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', 'jquery', '2.1.1', TRUE);
		wp_register_script('viewjs', get_template_directory_uri() . '/js/view.min.js?auto', 'jquery', TRUE);
	  wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '1.0', TRUE);
	    wp_register_script('maps', 'http://maps.google.com/maps/api/js?sensor=false', 'jquery', TRUE);
	    wp_register_script('respond', get_template_directory_uri() . '/js/respond.min.js', 'jquery', '1.0', TRUE);
	   wp_register_script('functions', get_template_directory_uri() . '/js/functions.js', 'jquery', '1.0', TRUE);
		wp_register_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', '1.0', TRUE);
		
	    wp_enqueue_script('jquery');
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('easing');
		wp_enqueue_script('jqueryUI');
	   wp_enqueue_script('flexslider');
	   wp_enqueue_script('fancybox');
	   wp_enqueue_script('viewjs');
	   wp_enqueue_script('fitvids');
	   wp_enqueue_script('respond');
	    wp_enqueue_script('main');	    
	   
	   
	}
	
	add_action('wp_enqueue_scripts', 'load_scripts');
	
function load_admin_style() {
	wp_register_style('admin-css', THEME_DIRECTORY_URI . '/css/admin-css.css', array(), '1.0', 'screen');
	if ( is_admin() ) {
		
		wp_enqueue_style('admin-css');	
	}
	}
	add_action( 'admin_print_styles', 'load_admin_style' );


// Remove the admin bar from the front end
//add_filter( 'show_admin_bar', '__return_false' );
	
// Register Navigation Menu Locations

register_nav_menu( 'mobilemenu', 'Mobile Menu' );
register_nav_menu( 'sidebar', 'Sidbar Menu' );
 

// Enable widgetable sidebar
// You may need to tweak your theme files, more info here - http://codex.wordpress.org/Widgetizing_Themes
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => __( 'Top Left Sidebar' ),
  'id' => 'topleft-sidebar',
  'description' => __( 'Widgets in this area will be shown on the left-hand sidebar below Navigation.' ),
	'before_widget' => '<div class="main-left-nav">',
	'after_widget' => '</div>',
	'before_title' => '<span>',
	'after_title' => '</span>',
));
	register_sidebar(array(
	'name' => __( 'Top Right Sidebar' ),
  'id' => 'topright-sidebar',
  'description' => __( 'Widgets in this area will be shown on the left-hand sidebar below Navigation.' ),
	'before_widget' => '<div class="main-right-nav">',
	'after_widget' => '</div>',
	'before_title' => '<span>',
	'after_title' => '</span>',
));

add_theme_support( 'post-thumbnails' );

	/* GET CUSTOM POST TYPE TAXONOMY LIST
	================================================== */

	function get_category_list( $category_name, $filter=0 ){
		
		if (!$filter) { 
		
			$get_category = get_categories( array( 'taxonomy' => $category_name	));
			$category_list = array( '0' => 'All');
			
			foreach( $get_category as $category ){
				$category_list[] = $category->slug;
			}
				
			return $category_list;
			
		} else {
			
			$get_category = get_categories( array( 'taxonomy' => $category_name	));
			$category_list = array( '0' => 'All');
			
			foreach( $get_category as $category ){
				$category_list[] = $category->cat_name;
			}
				
			return $category_list;	
		
		}
	}
		
	/* LATEST TWEET FUNCTION
	================================================== */
	
	function latestTweet($twitterID){ 
	    include_once(ABSPATH.WPINC.'/class-simplepie.php'); 
	    add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 300;' ) );
	
	    $tweet = fetch_feed("http://search.twitter.com/search.atom?q=from:" .$twitterID . "&rpp=1"); 
	 	$tweet_content = "";
	 	
	 	$maxitems = 0;
	 	
	    if (!is_wp_error( $tweet ) ) : 
	        $maxitems = $tweet->get_item_quantity(1);  
	        $rss_items = $tweet->get_items(0, $maxitems);  
	    endif; 
	 
	    if ($maxitems == 0) {
	    	return '<div class="latest-tweet"><p>'.sprintf(__('Could not return a tweet :(', 'coope')).'</p></div>';
	    } else {
	    	foreach ( $rss_items as $item ) { 
		        $content = str_replace("<em>", "", html_entity_decode($item->get_content()));
		        $content = str_replace("</em>", "", $content);
		        $link = html_entity_decode($item->get_permalink());    
		        $date = $item->get_date('U'); // retrives the tweets date and time in Unix Epoch terms
		        $blogtime = current_time('U'); // retrives the current browser client date and time in Unix Epoch terms
		        $dago = human_time_diff($date, $blogtime) . ' ' . sprintf(__('ago', 'coope')); // calculates and outputs the time past in human readable format
		        $tweet_content = '<div class="latest-tweet"><span class="twitter-bird"><i class="icon-twitter"></i></span><span class="tweet-text">'.$content.'</span><a class="tweet-date" href='.$link.' target="_blank">'.$dago.'</a></div>'; 
		    }
	    	return $tweet_content;
	    }
	}
	
	/* CONTENT RETURN FUNCTIONS
	================================================== */
	
	function get_the_content_with_formatting() {
	    $content = get_the_content();
	    $content = apply_filters('the_content', $content);
	    $content = str_replace(']]>', ']]&gt;', $content);
	    return $content;
	}
	
	/* SHORTCODE FIX
	================================================== */
	
	function coope_shortcode_fix($content){   
	    $array = array (
	        '<p>[' => '[', 
	        ']</p>' => ']', 
	        ']<br />' => ']'
	    );
	
	    $content = strtr($content, $array);
	    return $content;
	}
	add_filter('the_content', 'coope_shortcode_fix');
		
	/* EXCERPT
	================================================== */
	
	function new_excerpt_length($length) {
	    return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	
	// Blog Widget Excerpt
	function excerpt($limit) {
	      $excerpt = explode(' ', get_the_excerpt(), $limit);
	      if (count($excerpt)>=$limit) {
	        array_pop($excerpt);
	        $excerpt = implode(" ",$excerpt).'...';
	      } else {
	        $excerpt = implode(" ",$excerpt).'';
	      } 
	      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	      return '<p>' . $excerpt . '</p>';
	    }
	
	function content($limit) {
	      $content = explode(' ', get_the_content(), $limit);
	      if (count($content)>=$limit) {
	        array_pop($content);
	        $content = implode(" ",$content).'...';
	      } else {
	        $content = implode(" ",$content).'';
	      } 
	      $content = preg_replace('/\[.+\]/','', $content);
	      $content = apply_filters('the_content', $content); 
	      $content = str_replace(']]>', ']]&gt;', $content);
	      return $content;
	}
	
	function custom_excerpt($custom_content, $limit) {
		$content = explode(' ', $custom_content, $limit);
		if (count($content)>=$limit) {
		  array_pop($content);
		  $content = implode(" ",$content).'...';
		} else {
		  $content = implode(" ",$content).'';
		} 
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content); 
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}	

	/* ADD SHORTCODE FUNCTIONALITY TO WIDGETS
	================================================== */
	
	add_filter('widget_text', 'do_shortcode');
	
	
	/* NAVIGATION CHECK
	================================================== */
	
	//functions tell whether there are previous or next 'pages' from the current page
	//returns 0 if no 'page' exists, returns a number > 0 if 'page' does exist
	//ob_ functions are used to suppress the previous_posts_link() and next_posts_link() from printing their output to the screen
	
	function has_previous_posts() {
		ob_start();
		previous_posts_link();
		$result = strlen(ob_get_contents());
		ob_end_clean();
		return $result;
	}
	
	function has_next_posts() {
		ob_start();
		next_posts_link();
		$result = strlen(ob_get_contents());
		ob_end_clean();
		return $result;
	}
	
	
	/* REMOVE CERTAIN HEAD TAGS
	================================================== */
	
	add_action('init', 'remheadlink');
	function remheadlink() {
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	
	
	/* CUSTOM LOGIN LOGO
	================================================== */
	
	function coope_custom_login_logo() {
		$options = get_option('spring_options');
		$custom_logo = $options['custom_admin_login_logo'];
		if ($custom_logo) {		
		echo '<style type="text/css">
		    .login h1 a { background-image:url('. $custom_logo .') !important; height: 67px!important; background-size: auto; }
		</style>';
		} else {
		echo '<style type="text/css">
		    .login h1 a { background-image:url('. get_template_directory_uri() .'/images/custom-login-logo.png) !important; height: 67px!important; background-size: auto; }
		</style>';
		}
	}
	
	add_action('login_head', 'coope_custom_login_logo');
	function the_url( $url ) {
    return "http://www.coopehost.com/";
}
add_filter( 'login_headerurl', 'the_url' );	

    //hook the administrative header output
    add_action('admin_head', 'my_custom_logo');

    function my_custom_logo() {
    echo '
    <style type="text/css">
    #header-logo { background-image: url('.INCLUDES_PATH.'/page-builder/assets/images/coope-icon.png) !important; }
    </style>
    ';
    }
	/* PAGINATION
	================================================== */
	
	 
	/* Function that Rounds To The Nearest Value.
	   Needed for the pagenavi() function */
	function round_num($num, $to_nearest) {
	   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
	   return floor($num/$to_nearest)*$to_nearest;
	}
	 
	/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
	   Function is largely based on Version 2.4 of the WP-PageNavi plugin */
	function pagenavi($query, $before = '', $after = '') {
	    
	    wp_reset_query();
	    global $wpdb, $paged;
	    
	    $pagenavi_options = array();
	    //$pagenavi_options['pages_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
	    $pagenavi_options['pages_text'] = ('');
	    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	    $pagenavi_options['first_text'] = ('First Page');
	    $pagenavi_options['last_text'] = ('Last Page');
	    $pagenavi_options['next_text'] = __("Next", "coope");
	    $pagenavi_options['prev_text'] = __("Previous", "coope");
	    $pagenavi_options['dotright_text'] = '...';
	    $pagenavi_options['dotleft_text'] = '...';
	    $pagenavi_options['num_pages'] = 5; //continuous block of page numbers
	    $pagenavi_options['always_show'] = 0;
	    $pagenavi_options['num_larger_page_numbers'] = 0;
	    $pagenavi_options['larger_page_numbers_multiple'] = 5;
	 
	 	$output = "";
	 	
	    //If NOT a single Post is being displayed
	    /*http://codex.wordpress.org/Function_Reference/is_single)*/
	    if (!is_single()) {
	        $request = $query->request;
	        //intval — Get the integer value of a variable
	        /*http://php.net/manual/en/function.intval.php*/
	        $posts_per_page = intval(get_query_var('posts_per_page'));
	        //Retrieve variable in the WP_Query class.
	        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
	        if ( get_query_var('paged') ) {
	        $paged = get_query_var('paged');
	        } elseif ( get_query_var('page') ) {
	        $paged = get_query_var('page');
	        } else {
	        $paged = 1;
	        }
	        $numposts = $query->found_posts;
	        $max_page = $query->max_num_pages;
	 
	        //empty — Determine whether a variable is empty
	        /*http://php.net/manual/en/function.empty.php*/
	        if(empty($paged) || $paged == 0) {
	            $paged = 1;
	        }
	 
	        $pages_to_show = intval($pagenavi_options['num_pages']);
	        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	        $pages_to_show_minus_1 = $pages_to_show - 1;
	        $half_page_start = floor($pages_to_show_minus_1/2);
	        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
	        $half_page_end = ceil($pages_to_show_minus_1/2);
	        $start_page = $paged - $half_page_start;
	 
	        if($start_page <= 0) {
	            $start_page = 1;
	        }
	 
	        $end_page = $paged + $half_page_end;
	        if(($end_page - $start_page) != $pages_to_show_minus_1) {
	            $end_page = $start_page + $pages_to_show_minus_1;
	        }
	        if($end_page > $max_page) {
	            $start_page = $max_page - $pages_to_show_minus_1;
	            $end_page = $max_page;
	        }
	        if($start_page <= 0) {
	            $start_page = 1;
	        }
	 
	        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
	        //round_num() custom function - Rounds To The Nearest Value.
	        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
	        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
	        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
	        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
	 
	        if($larger_start_page_end - $larger_page_multiple == $start_page) {
	            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
	            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
	        }
	        if($larger_start_page_start <= 0) {
	            $larger_start_page_start = $larger_page_multiple;
	        }
	        if($larger_start_page_end > $max_page) {
	            $larger_start_page_end = $max_page;
	        }
	        if($larger_end_page_end > $max_page) {
	            $larger_end_page_end = $max_page;
	        }
	        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
	            /*http://php.net/manual/en/function.str-replace.php */
	            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
	            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
	            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
	            $output .= $before.'<ul class="pagenavi">'."\n";
	 
	            if(!empty($pages_text)) {
	                $output .= '<li><span class="pages">'.$pages_text.'</span></li>';
	            }
	            //Displays a link to the previous post which exists in chronological order from the current post.
	            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
	            if ($paged > 1) {
	            $output .= '<li>' . get_previous_posts_link($pagenavi_options['prev_text']) . '</li>';
	 			}
	 			
	            if ($start_page >= 2 && $pages_to_show < $max_page) {
	                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
	                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
	                /*http://codex.wordpress.org/Data_Validation*/
	                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
	                $output .= '<li><a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a></li>';
	                if(!empty($pagenavi_options['dotleft_text'])) {
	                    $output .= '<li><span class="expand">'.$pagenavi_options['dotleft_text'].'</span></li>';
	                }
	            }
	 
	            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
	                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    $output .= '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }
	 
	            for($i = $start_page; $i  <= $end_page; $i++) {
	                if($i == $paged) {
	                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
	                    $output .= '<li><span class="current">'.$current_page_text.'</span></li>';
	                } else {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    $output .= '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }
	 
	            if ($end_page < $max_page) {
	                if(!empty($pagenavi_options['dotright_text'])) {
	                    $output .= '<li><span class="expand">'.$pagenavi_options['dotright_text'].'</span></li>';
	                }
	                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
	                $output .= '<li><a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a></li>';
	            }
	            $output .= '<li>' . get_next_posts_link($pagenavi_options['next_text'], $max_page) . '</li>';
	 
	            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
	                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
	                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
	                    $output .= '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
	                }
	            }
	            $output .= '</ul>'.$after."\n";
	        }
	    }
	    
	    return $output;
	}

// From Theme Thomas
	
	
if ( ! function_exists( 'coope_comment' ) ) :

function coope_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	echo '<li ';
		comment_class();
	echo join(array(
		' id="li-comment-',
		$comment->comment_ID,
		'">',
		'<span>',
		$comment->comment_author,
		' said: </span>',
		$comment->comment_content,
		'</li>'
	));

}
endif;

if ( ! function_exists( 'coope_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function coope_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'coope' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'coope' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'coope' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( ! function_exists( 'coope_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function coope_posted_on() {
	echo '<span class="entry-date">Posted by  ';
	the_author();
	echo ' on ' ;
	the_time('jS F  Y');		
	echo '</span>';
}
endif;


function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[....] Read More > </a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );