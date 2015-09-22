<?php
/*
 *
 * Set the text domain for the theme or plugin.
 *
 */
define('coope_TEXT_DOMAIN', 'coope-opts');

/*
 *
 * Require the framework class before doing anything else, so we can use the defined URLs and directories.
 * If you are running on Windows you may have URL problems which can be fixed by defining the framework url first.
 *
 */
//define('Redux_OPTIONS_URL', site_url('path the options folder'));
if(!class_exists('Redux_Options')){
    require_once(dirname(__FILE__) . '/admin/options/defaults.php');
}

/*
 *
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
    //$sections = array();
    $sections[] = array(
        'title' => __('A Section added by hook', coope_TEXT_DOMAIN),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', coope_TEXT_DOMAIN),
		'icon' => 'paper-clip',
		'icon_class' => 'icon-large',
        // Leave this as a blank section, no options just some intro text set above.
        'fields' => array()
    );

    return $sections;
}
//add_filter('coope-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by a theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
    //$args['dev_mode'] = false;
    
    return $args;
}
//add_filter('coope-opts-args-twenty_eleven', 'change_framework_args');


/*
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be over ridden if needed.
 *
 */
function setup_framework_options(){
    $args = array();

    // Setting dev mode to true allows you to view the class settings/info in the panel.
    // Default: true
    $args['dev_mode'] = true;

	// Set the icon for the dev mode tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: info-sign
	//$args['dev_mode_icon'] = 'info-sign';
 
	// Set the class for the dev mode tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	$args['dev_mode_icon_class'] = 'icon-large';

    // If you want to use Google Webfonts, you MUST define the api key.
    //$args['google_api_key'] = 'xxxx';

    // Define the starting tab for the option panel.
    // Default: '0';
    //$args['last_tab'] = '0';

    // Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
    // If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
    // If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
    // Default: 'standard'
    $args['admin_stylesheet'] = 'custom';

    // Add HTML before the form.
    //$args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', coope_TEXT_DOMAIN);

    // Add content after the form.
   // $args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', coope_TEXT_DOMAIN);

    // Set footer/credit line.
    //$args['footer_credit'] = __('<p>This text is displayed in the options panel footer across from the WordPress version (where it normally says \'Thank you for creating with WordPress\'). This field accepts all HTML.</p>', coope_TEXT_DOMAIN);

    // Setup custom links in the footer for share icons
    

    // Enable the import/export feature.
    // Default: true
    //$args['show_import_export'] = false;

	// Set the icon for the import/export tab.
	// If $args['icon_type'] = 'image', this should be the path to the icon.
	// If $args['icon_type'] = 'iconfont', this should be the icon name.
	// Default: refresh
	//$args['import_icon'] = 'refresh';

	// Set the class for the import/export tab icon.
	// This is ignored unless $args['icon_type'] = 'iconfont'
	// Default: null
	//$args['import_icon_class'] = 'icon-large';

    // Set a custom option name. Don't forget to replace spaces with underscores!
    $args['opt_name'] = 'spring_options';

    // Set a custom menu icon.
    //$args['menu_icon'] = '';
	 $args['icon_type'] = 'image';
     $args['menu_icon'] = Redux_OPTIONS_URL.'img/icons/coope-icon.png';
    // Set a custom title for the options page.
    // Default: Options
    $args['menu_title'] = __('SpringField Options', coope_TEXT_DOMAIN);

    // Set a custom page title for the options page.
    // Default: Options
    $args['page_title'] = __('Theme SpringField By CooPe', coope_TEXT_DOMAIN);

    // Set a custom page slug for options page (wp-admin/themes.php?page=***).
    // Default: spring_options
    $args['page_slug'] = 'spring_options';

    // Set a custom page capability.
    // Default: manage_options
    //$args['page_cap'] = 'manage_options';

    // Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
    // Default: menu
    //$args['page_type'] = 'submenu';

    // Set the parent menu.
    // Default: themes.php
    // A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    //$args['page_parent'] = 'options_general.php';

    // Set a custom page location. This allows you to place your menu where you want in the menu order.
    // Must be unique or it will override other items!
    // Default: null
    $args['page_position'] = 58;

    // Set a custom page icon class (used to override the page icon next to heading)
    //$args['page_icon'] = 'icon-themes';

	// Set the icon type. Set to "iconfont" for Font Awesome, or "image" for traditional.
	// Redux no longer ships with standard icons!
	// Default: iconfont
	$args['icon_type'] = 'image';

    // Disable the panel sections showing as submenu items.
    // Default: true
    //$args['allow_sub_menu'] = false;
        
    // Set ANY custom page help tabs, displayed using the new help tab API. Tabs are shown in order of definition.
    $args['help_tabs'][] = array(
        'id' => 'coope-opts-1',
        'title' => __('Theme Information 1', coope_TEXT_DOMAIN),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', coope_TEXT_DOMAIN)
    );
    $args['help_tabs'][] = array(
        'id' => 'coope-opts-2',
        'title' => __('Theme Information 2', coope_TEXT_DOMAIN),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', coope_TEXT_DOMAIN)
    );

    // Set the help sidebar for the options page.                                        
    $args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', coope_TEXT_DOMAIN);

    $sections = array();
$sections[] = array(
    				'icon' => Redux_OPTIONS_URL.'img/general.png',
    				'title' => __('General Options', Redux_TEXT_DOMAIN),
    				'desc' => __('<p class="description">These are the general options for the theme</p>', Redux_TEXT_DOMAIN),
    				'fields' => array(

    					array(
    						'id' => 'custom_css',
    						'type' => 'textarea',
    						'title' => __('Custom CSS', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Quickly add some CSS to your theme by adding it to this textarea.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'std' => ''
    						),
    					array(
    						'id' => 'google_analytics',
    						'type' => 'textarea',
    						'title' => __('Tracking code', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme. NOTE: Please include the script tag.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'std' => ''
    						) 
    				)
				);
    $sections[] = array(
		'icon' => Redux_OPTIONS_URL.'img/header.png',
        'title' => __('Logo Options', coope_TEXT_DOMAIN),
        'desc' => __('<p class="description">Setup custom logos images</p>', coope_TEXT_DOMAIN),
        'fields' => array(
						
    					array(
    						'id' => 'logo_upload',
    						'type' => 'upload',
    						'title' => __('Logo', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Upload your logo here, ideally this should be 147px x 80px (Upload an image with size 294px x 160px for the logo to be retina).', Redux_TEXT_DOMAIN),
    						'desc' => '',
							'std' => get_template_directory_uri().'/images/Logo.png'
							
    						),
						array(
    						'id' => 'custom_favicon',
    						'type' => 'upload',
    						'title' => __('Custom favicon', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Upload a 16px x 16px Png/Gif image that will represent your website favicon', Redux_TEXT_DOMAIN),
    						'desc' => ''
						 
    						),
						array(
    						'id' => 'custom_admin_login_logo',
    						'type' => 'upload',
    						'title' => __('Custom admin login logo', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Upload a 323px x 67px image here to replace the admin login logo.', Redux_TEXT_DOMAIN),
    						'desc' => ''
    						) 
					  
        )
    );
	$sections[] = array(
		'icon' => Redux_OPTIONS_URL.'img/background.png',
        'title' => __('Background Options', coope_TEXT_DOMAIN),
        'desc' => __('<p class="description">Setup custom Background image</p>', coope_TEXT_DOMAIN),
        'fields' => array(
    					array(
    						'id' => 'custom_bg_image',
    						'type' => 'upload',
    						'title' => __('Upload Header Background Image', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Upload or provide a link to your own background here.', Redux_TEXT_DOMAIN),
    						'desc' => '',
							'std' => get_template_directory_uri().'/images/BG.png'
    						)
						
        )
    );
	$sections[] = array(
		'icon' => Redux_OPTIONS_URL.'img/footer.png',
        'title' => __('Footer Options', coope_TEXT_DOMAIN),
        'desc' => __('<p class="description">Setup Footer logos texts</p>', coope_TEXT_DOMAIN),
        'fields' => array(
						
    					array(
    						'id' => 'footer_logo_upload',
    						'type' => 'upload',
    						'title' => __('Footer Logo', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Upload your footer logo here).', Redux_TEXT_DOMAIN),

    						'desc' => ''
    						),
						array(
							'id' => 'footer_content', // The item ID must be unique
							'type' => 'editor', // Built-in field types include:
							// text, textarea, editor, checkbox, multi_checkbox, radio, radio_img, button_set,
							// select, multi_select, color, date, divide, info, upload
							'title' => __('Footer Content', coope_TEXT_DOMAIN),
							'sub_desc' => __('You can add footer text/HTML here.', coope_TEXT_DOMAIN),
							'desc' => "",
							//'validate' => '', // Built-in validation includes: 
							//  email, html, html_custom, no_html, js, numeric, comma_numeric, url, str_replace, preg_replace
							//'msg' => 'custom error message', // Override the default validation error message for specific fields
							//'std' => '', // This is the default value and is used to set an option on theme activation.
							//'class' => '' // Set custom classes for elements if you want to do something a little different
							//'rows' => '6' // Set the number of rows shown for the textarea. Default: 6
						),
						
        )
    );
$sections[] = array(
    				'icon' => Redux_OPTIONS_URL.'img/icons/glyphicons_100_font.png',
    				'title' => __('Font Options', Redux_TEXT_DOMAIN),
    				'desc' => __('<p class="description">These are the options for fonts used within the theme.</p>', Redux_TEXT_DOMAIN),
    				'fields' => array(
    					array(
    						'id' => 'web_standard_font',
    						'type' => 'select',
    						'title' => __('Default Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used as the body text and other small text throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array(
    										'roboto' => 'roboto',
    										'open_sans_condensedbold' => 'open_sans_condensedbold',
											'open_sans_light' => 'open_sans_light',
											'open_sans_extrabold' => 'open_sans_extrabold',
											'Arial' => 'Arial',
    										'Courier New' => 'Courier New',
    										'Georgia' => 'Georgia',
    										'Helvetica' => 'Helvetica',
    										'Lucida Sans' => 'Lucida Sans',
    										'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    										'Myriad Pro' => 'Myriad Pro',
    										'Palatino Linotype' => 'Palatino Linotype',
    										'Tahoma' => 'Tahoma',
    										'Times New Roman' => 'Times New Roman',
    										'Trebuchet MS' => 'Trebuchet MS',
    										'Verdana' => 'Verdana'
    										),
    						'std' => 'roboto'
    						),
    					array(
    						'id' => 'use_custom_font_one',
    						'type' => 'button_set',
    						'title' => __('Use Google Font (Default)', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select this if you wish to choose your own default font for the theme using the google font selector box below.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array('1' => 'On','0' => 'Off'),
    						'std' => '0'
    						),
    					array(
    						'id' => 'standard_font',
    						'type' => 'google_webfonts',//doesnt need to be called for callback fields
    						'title' => __('Default Google Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used as the body text and other small text throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'placeholder' => 'Default Font',
							'std'=> 'Roboto'
    						),
    					array(
    						'id' => 'web_heading_font',
    						'type' => 'select',
    						'title' => __('Headings Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used for the headings throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array(
    										'roboto' => 'roboto',
    										'open_sans_condensedbold' => 'open_sans_condensedbold',
											'open_sans_light' => 'open_sans_light',
											'open_sans_extrabold' => 'open_sans_extrabold',
											'Arial' => 'Arial',
    										'Courier New' => 'Courier New',
    										'Georgia' => 'Georgia',
    										'Helvetica' => 'Helvetica',
    										'Lucida Sans' => 'Lucida Sans',
    										'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    										'Myriad Pro' => 'Myriad Pro',
    										'Palatino Linotype' => 'Palatino Linotype',
    										'Tahoma' => 'Tahoma',
    										'Times New Roman' => 'Times New Roman',
    										'Trebuchet MS' => 'Trebuchet MS',
    										'Verdana' => 'Verdana'
    										),
    						'std' => 'roboto'
    						),
    					array(
    						'id' => 'use_custom_font_two',
    						'type' => 'button_set',
    						'title' => __('Use Google Font (Headings)', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select this if you wish to choose your own heading font for the theme using the google font selector box below.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array('1' => 'On','0' => 'Off'),
    						'std' => '0'
    						),
    					array(
    						'id' => 'heading_font',
    						'type' => 'google_webfonts',//doesnt need to be called for callback fields
    						'title' => __('Headings Google Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used for the headings throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
							'std' => 'Roboto'
    						),
						array(
    						'id' => 'web_sidebar_menu_font',
    						'type' => 'select',
    						'title' => __('Sidebar Menu Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used for the headings throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array(
    										'roboto' => 'roboto',
    										'open_sans_condensedbold' => 'open_sans_condensedbold',
											'open_sans_light' => 'open_sans_light',
											'open_sans_extrabold' => 'open_sans_extrabold',
											'Arial' => 'Arial',
											'Courier New' => 'Courier New',
    										'Georgia' => 'Georgia',
    										'Helvetica' => 'Helvetica',
    										'Lucida Sans' => 'Lucida Sans',
    										'Lucida Sans Unicode' => 'Lucida Sans Unicode',
    										'Myriad Pro' => 'Myriad Pro',
    										'Palatino Linotype' => 'Palatino Linotype',
    										'Tahoma' => 'Tahoma',
    										'Times New Roman' => 'Times New Roman',
    										'Trebuchet MS' => 'Trebuchet MS',
    										'Verdana' => 'Verdana'
    										),
    						'std' => 'roboto'
    						),
    					array(
    						'id' => 'use_custom_font_sidebar_menu',
    						'type' => 'button_set',
    						'title' => __('Use Google Font (Sidebar Menu)', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select this if you wish to choose a seperate Sidebar Menu font for the theme using the google font selector box below.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'options' => array('1' => 'On','0' => 'Off'),
    						'std' => '0'
    						),
    					array(
    						'id' => 'sidebar_menu_font',
    						'type' => 'google_webfonts',//doesnt need to be called for callback fields
    						'title' => __('Sidebar Menu Google Font', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('The font that is used for the Side bar Menu Items throughout the theme.', Redux_TEXT_DOMAIN),
    						'desc' => '',
							'std' => 'Roboto'
    						)
    					)
    				);
$sections[] = array(
    				'icon' => Redux_OPTIONS_URL.'img/icons/glyphicons_105_text_height.png',
    				'title' => __('Font Size Options', Redux_TEXT_DOMAIN),
    				'desc' => __('<p class="description">These are the options for fonts used within the theme.</p>', Redux_TEXT_DOMAIN),
    				'fields' => array(	
						array(
    						'id' => 'body_font_size',
    						'type' => 'slider',
    						'title' => __('Body Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the body font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '16'
    						),
    					array(
    						'id' => 'body_font_line_height',
    						'type' => 'slider',
    						'title' => __('Body Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the body font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '80',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '20'
    						),
    					 
    					array(
    						'id' => 'h1_font_size',
    						'type' => 'slider',
    						'title' => __('H1 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h1 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '37.5'
    						),
    					array(
    						'id' => 'h1_font_line_height',
    						'type' => 'slider',
    						'title' => __('H1 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h1 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '40'
    						),
    					 
    					array(
    						'id' => 'h2_font_size',
    						'type' => 'slider',
    						'title' => __('H2 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h2 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '37.5'
    						),
    					array(
    						'id' => 'h2_font_line_height',
    						'type' => 'slider',
    						'title' => __('H2 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h2 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '40'
    						),
    					 
    					array(
    						'id' => 'h3_font_size',
    						'type' => 'slider',
    						'title' => __('H3 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h3 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '37'
    						),
    					array(
    						'id' => 'h3_font_line_height',
    						'type' => 'slider',
    						'title' => __('H3 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h3 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '40'
    						),
    					 
    					array(
    						'id' => 'h4_font_size',
    						'type' => 'slider',
    						'title' => __('H4 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h4 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '25'
    						),
    					array(
    						'id' => 'h4_font_line_height',
    						'type' => 'slider',
    						'title' => __('H4 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h4 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '28'
    						),
    				 
    					array(
    						'id' => 'h5_font_size',
    						'type' => 'slider',
    						'title' => __('H5 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h5 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '25'
    						),
    					array(
    						'id' => 'h5_font_line_height',
    						'type' => 'slider',
    						'title' => __('H5 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h5 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '28'
    						),
    			 
    					array(
    						'id' => 'h6_font_size',
    						'type' => 'slider',
    						'title' => __('H6 Font Size', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the size of the h6 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '60',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '25'
    						),
    					array(
    						'id' => 'h6_font_line_height',
    						'type' => 'slider',
    						'title' => __('H6 Font Line Height', Redux_TEXT_DOMAIN), 
    						'sub_desc' => __('Select the line height of the h6 font.', Redux_TEXT_DOMAIN),
    						'desc' => '',
    						'from' => '10',
    						'to' => '100',
    						'step' => '1',
    						'unit' => 'px',
    						'std' => '28'
    						)
 
					)
				);
   $tabs = array();

    if (function_exists('wp_get_theme')){
        $theme_data = wp_get_theme();
        $item_uri = $theme_data->get('ThemeURI');
        $description = $theme_data->get('Description');
        $author = $theme_data->get('Author');
        $author_uri = $theme_data->get('AuthorURI');
        $version = $theme_data->get('Version');
        $tags = $theme_data->get('Tags');
    }else{
        $theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()) . 'style.css');
        $item_uri = $theme_data['URI'];
        $description = $theme_data['Description'];
        $author = $theme_data['Author'];
        $author_uri = $theme_data['AuthorURI'];
        $version = $theme_data['Version'];
        $tags = $theme_data['Tags'];
     }
    
    $item_info = '<div class="coope-opts-section-desc">';
    $item_info .= '<p class="coope-opts-item-data description item-uri">' . __('<strong>Theme URL:</strong> ', coope_TEXT_DOMAIN) . '<a href="' . $item_uri . '" target="_blank">' . $item_uri . '</a></p>';
    $item_info .= '<p class="coope-opts-item-data description item-author">' . __('<strong>Author:</strong> ', coope_TEXT_DOMAIN) . ($author_uri ? '<a href="' . $author_uri . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
    $item_info .= '<p class="coope-opts-item-data description item-version">' . __('<strong>Version:</strong> ', coope_TEXT_DOMAIN) . $version . '</p>';
    $item_info .= '<p class="coope-opts-item-data description item-description">' . $description . '</p>';
    $item_info .= '<p class="coope-opts-item-data description item-tags">' . __('<strong>Tags:</strong> ', coope_TEXT_DOMAIN) . implode(', ', $tags) . '</p>';
    $item_info .= '</div>';

    $tabs['item_info'] = array(
		'icon' => 'info-sign',
		'icon_class' => 'icon-large',
        'title' => __('Theme Information', coope_TEXT_DOMAIN),
        'content' => $item_info
    ); 
 
   
    
    if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
        $tabs['docs'] = array(
			'icon' => 'book',
			'icon_class' => 'icon-large',
            'title' => __('Documentation', coope_TEXT_DOMAIN),
            'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
        );
    }

    global $Redux_Options;
    $Redux_Options = new Redux_Options($sections, $args, $tabs);

}
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value) {
    print_r($field);
    print_r($value);
}

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value) {
    $error = false;
    $value =  'just testing';
    /*
    do your validation
    
    if(something) {
        $value = $value;
    } elseif(somthing else) {
        $error = true;
        $value = $existing_value;
        $field['msg'] = 'your custom error message';
    }
    */
    
    $return['value'] = $value;
    if($error == true) {
        $return['error'] = $field;
    }
    return $return;
}
