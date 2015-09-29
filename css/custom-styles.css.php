<?php
	
	header("Content-type: text/css; charset: UTF-8");
	
	require_once('../../../../wp-load.php');
	
	$options = get_option('spring_options');
	
	// Standard Styling
	$accent_color = get_option('accent_color', '#00aeef');
	
	// Page Styling
	$page_bg_color = get_option('page_bg_color', '#FFFFFF');
	$inner_page_bg_color = get_option('inner_page_bg_color', '#FBFBFB');
	$body_bg_use_image = $options['use_bg_image'];	
	$body_upload_bg = $options['custom_bg_image'];
	$body_preset_bg = $options['preset_bg_image'];
	$section_divide_color = get_option('section_divide_color', '#efefef');
	$alt_bg_color = get_option('alt_bg_color', '#FFFFFF');
	
	// Header Styling	
	$breadcrumb_bg_color = get_option('breadcrumb_bg_color', '#F7F7F7');
	$breadcrumb_text_color = get_option('breadcrumb_text_color', '#666666');
	$breadcrumb_link_color = get_option('breadcrumb_link_color', '#999999');
	$header_bg_color = get_option('header_bg_color', '#FFFFFF');
	$header_phone_number_color = get_option('phone_number_color', '#222222');
	
	// Aux Area Styling	
	$aux_bg_color = get_option('aux_bg_color', '#e4e4e4');
	$aux_alt_bg_color = get_option('aux_alt_bg_color', '#eeeeee');
	$aux_text_color = get_option('aux_text_color', '#999999');
	$aux_link_color = get_option('aux_link_color', '#FFFFFF');
	
	// Navigation Styling
	$nav_bg_color = get_option('nav_bg_color', '#222222');
	$nav_text_color = get_option('nav_text_color', '#FFFFFF');
	$nav_text_hover_color = get_option('nav_text_hover_color', '#00aeef');
	$nav_selected_text_color = get_option('nav_selected_text_color', '#4a9cba');
	$nav_arrow_color = get_option('nav_arrow_color', '#45a5db');
	$nav_sm_bg_color = get_option('nav_sm_bg_color', '#FFFFFF');
	$nav_sm_text_color = get_option('nav_sm_text_color', '#8F8F8F');
	$nav_sm_text_hover_color = get_option('nav_sm_text_hover_color', '#3392DB');
	$nav_sm_selected_text_color = get_option('nav_sm_selected_text_color', '#4a9cba');
	$nav_divider = get_option('nav_divider', 'solid');
	$nav_divider_color = get_option('nav_divider_color', '#EEEEEE');
	
	// Page Heading Styling
	$page_heading_bg_color = get_option('page_heading_bg_color', '#FFFFFF');
	$page_heading_text_color = get_option('page_heading_text_color', '#222222');
	$filter_rss_border_color = get_option('filter_rss_border_color', '#CCCCCC');
	
	// Body Styling
	$body_text_color = get_option('body_color', '#424242');
	$link_text_color = get_option('link_color', '#d65644');
	$h1_text_color = get_option('h1_color', '#512da8');
	$h2_text_color = get_option('h2_color', '#3597d0');
	$h3_text_color = get_option('h3_color', '#3597D0');
	$sidebar_h3_text_color = get_option('sidebar_h3_color', '#FFFFFF');
	$h4_text_color = get_option('h4_color', '#7e57c2');
	$h5_text_color = get_option('h5_color', '#7eb3d2');
	$h6_text_color = get_option('h6_color', '##86C1E3');
	$menu_text_color = get_option('impact_text_color', '#FFFFFF');

	// Shortcode Stying
	$pt_primary_bg_color = get_option('pt_primary_bg_color', '#00AEEF');
	$pt_secondary_bg_color = get_option('pt_secondary_bg_color', '#B4E5F8');
	$pt_tertiary_bg_color = get_option('pt_tertiary_bg_color', '#E1F3FA');
	$lpt_primary_row_color = get_option('lpt_primary_row_color', '#f7f7f7');
	$lpt_secondary_row_color = get_option('lpt_secondary_row_color', '#eeeeee');
	$lpt_default_pricing_header = get_option('lpt_default_pricing_header', '#999999');
	$lpt_default_package_header = get_option('lpt_default_package_header', '#bbbbbb');
	$lpt_default_footer = get_option('lpt_default_footer', '#e4e4e4');
	$icon_container_bg_color = get_option('icon_container_bg_color', '#B4E5F8');
	$icon_color = get_option('coope_icon_color', '#000000');
	$tab_rollover_color = get_option('tab_rollover_color', '#EEEEEE');
	
	// Footer Styling
	$footer_bg_color = get_option('footer_bg_color', '#D50B0B;');
	$footer_text_color = get_option('footer_text_color', '#6EC1EB');
	$footer_link_color = get_option('footer_link_color', '#D50B0B');
	$copyright_bg_color = get_option('copyright_bg_color', '#F3C200');
	$copyright_text_color = get_option('copyright_text_color', '#90C646');
	
	// Logo Spacing
	$logo_spacing_top = $options['logo_top_spacing'];
	$logo_spacing_right = $options['logo_right_spacing'];
	$logo_spacing_bottom = $options['logo_bottom_spacing'];
	$logo_spacing_left = $options['logo_left_spacing'];
		
	// Font
	$standard_font = $options['web_standard_font'];
	$heading_font = $options['web_heading_font'];
	$sidebar_menu_font = $options['web_sidebar_menu_font'];
	$use_custom_font_one = $options['use_custom_font_one'];
	$custom_font_one = explode(':', $options['standard_font']);
	$use_custom_font_two = $options['use_custom_font_two'];
	$custom_font_two = explode(':', $options['heading_font']);
	$use_custom_font_sidebar_menu = $options['use_custom_font_sidebar_menu'];
	$custom_sidebar_menu_font = explode(':', $options['sidebar_menu_font']);
	$google_font_one = str_replace("+", " ", $custom_font_one[0]);
	$google_font_two = str_replace("+", " ", $custom_font_two[0]);
	$google_sidebar_menu_font = str_replace("+", " ", $custom_sidebar_menu_font[0]);
	
	// Font Sizing
	$body_font_size = $options['body_font_size'];
	$body_font_line_height = $options['body_font_line_height'];
	$h1_font_size = $options['h1_font_size'];
	$h1_font_line_height = $options['h1_font_line_height']; 
	$h2_font_size = $options['h2_font_size'];
	$h2_font_line_height = $options['h2_font_line_height'];
	$h3_font_size = $options['h3_font_size'];
	$h3_font_line_height = $options['h3_font_line_height'];
	$h4_font_size = $options['h4_font_size'];
	$h4_font_line_height = $options['h4_font_line_height'];
	$h5_font_size = $options['h5_font_size'];
	$h5_font_line_height = $options['h5_font_line_height'];
	$h6_font_size = $options['h6_font_size'];
	$h6_font_line_height = $options['h6_font_line_height'];
	
	// Custom CSS
	$custom_css = $options['custom_css'];

?>



/*========== Custom Font Styles ==========*/

body, p {
	font-family: "<?php echo $standard_font; ?>", Arial, serif;
	font-size: <?php echo $body_font_size; ?>px;
	line-height: <?php echo $body_font_line_height; ?>px;
	letter-spacing:0.017em;
}
h1 {
	font-family: "<?php echo $heading_font; ?>",   Arial, serif;
	font-size: <?php echo $h1_font_size; ?>px;
	line-height: <?php echo $h1_font_line_height; ?>px;
	letter-spacing:0.017em;
 
}
h2 {
	font-family: "<?php echo $heading_font; ?>",  Arial, serif;
	font-size: <?php echo $h2_font_size; ?>px;
	line-height: <?php echo $h2_font_line_height; ?>px;
	letter-spacing:0.017em;
 
}
h3 {
	font-family: "<?php echo $heading_font; ?>",  Arial, serif;
	font-size: <?php echo $h3_font_size; ?>px;
	line-height: <?php echo $h3_font_line_height; ?>px;
	letter-spacing:0.017em;
 
}
h4 {
	font-family: "<?php echo $heading_font; ?>",  Arial, serif;
	font-size: <?php echo $h4_font_size; ?>px;
 	line-height: <?php echo $h4_font_line_height; ?>px;
	letter-spacing:0.017em;
 
}
.archive-title ,.archive-title a ,h1.entry-title, h1.entry-title a , h5 {
	font-family: "<?php echo $heading_font; ?>",   Arial, serif;
	font-size: <?php echo $h5_font_size; ?>px;
	line-height: <?php echo $h5_font_line_height; ?>px;
 
	letter-spacing:0.017em;
 
}
h6 {
	font-family: "<?php echo $heading_font; ?>",   Arial, serif;
	font-size: <?php echo $h6_font_size; ?>px;
 	line-height: <?php echo $h6_font_line_height; ?>px;
	letter-spacing:0.017em;
 
}


/*========== Main Color Styles ==========*/


/*========== Main Styles ==========*/

::selection, ::-moz-selection {
	color: #fff;
}
body {
	color: <?php echo $body_text_color; ?>;
}
.carousel-nav a, .pagination-wrap a, .search-pagination a {
	color: <?php echo $body_text_color; ?>;
}
#boxed-container {
	background-color: <?php echo $page_bg_color; ?>;
}
<?php if ($body_bg_use_image) { ?>
	<?php if ($body_upload_bg) { ?>
	#boxed-container {
		background: #fff url(<?php echo $body_upload_bg; ?>) repeat center top;
	}
	<?php } else { ?>
	#boxed-container {
		background: #fff url(<?php echo $body_preset_bg; ?>) repeat center top;
	}
	<?php } ?>
<?php } ?>
body, #container, .tm-toggle-button-wrap a {
	background-color: <?php echo $inner_page_bg_color; ?>;
}
a , a:visited {
	color: <?php echo $link_text_color; ?>;
}

.pagination-wrap {
	border-top-color: <?php echo $section_divide_color; ?>;
}
.pagination-wrap li {
	border-color: <?php echo $section_divide_color; ?>;
}
input[type="text"], input[type="password"], input[type="email"], textarea, select {
	border-color: <?php echo $section_divide_color; ?>;
	background: <?php echo $alt_bg_color; ?>;
}

/*========== Header Styles ==========*/

.breadcrumbs-wrap {
	background-color: <?php echo $breadcrumb_bg_color; ?>;
}
#breadcrumbs {
	color: <?php echo $breadcrumb_text_color; ?>;
}
#breadcrumbs a, #breadcrumb i {
	color: <?php echo $breadcrumb_link_color; ?>;
}
#header-section {
	background-color: <?php echo $header_bg_color; ?>;
}
#logo img {
	padding-top: <?php echo $logo_spacing_top; ?>px;
	padding-right: <?php echo $logo_spacing_right; ?>px;
	padding-bottom: <?php echo $logo_spacing_bottom; ?>px;
	padding-left: <?php echo $logo_spacing_left; ?>px;
}
.header-items h3.phone-number, .header-items h3.phone-number a {
	color: <?php echo $header_phone_number_color; ?>;
}
#mini-search input {
	color: <?php echo $nav_text_color; ?>;
}
body {
background: transparent url("<?php echo $options['custom_bg_image']; ?>") ;
background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-size: cover;
  	margin: 0;
	padding: 0; 
}
#logo {
    background: url("<?php echo $options['logo_upload']; ?>") no-repeat scroll 0% 0% transparent;
}
/*========== Aux Area Styles ==========*/

#aux-area, #header-search, #header-subscribe, #header-translation, #header-login {
	background: <?php echo $aux_bg_color; ?>;
}
#menubar-controls .control-item.selected-item:before {
	border-top-color: <?php echo $aux_bg_color; ?>;
}
.nav-accent-bar #menubar-controls .control-item.selected-item:before {
	border-top-color: <?php echo $accent_color; ?>;
}
#header-login #username {
	background: <?php echo $aux_alt_bg_color; ?>;
}
#header-search ::-webkit-input-placeholder {
	color: <?php echo $aux_text_color; ?>;
}
#header-search ::-moz-input-placeholder {
	color: <?php echo $aux_text_color; ?>;
}
#header-subscribe ::-webkit-input-placeholder {
	color: <?php echo $aux_text_color; ?>;
}
#header-subscribe ::-moz-input-placeholder {
	color: <?php echo $aux_text_color; ?>;
}
#header-subscribe input, #header-search input, #header-login input, #header-login span, #header-translation p {
	color: <?php echo $aux_text_color; ?>!important;
}
#header-login .logout-link, #header-login .admin-link, #header-login .recover-password {
	color: <?php echo $aux_link_color; ?>;
}


/*========== Navigation Styles ==========*/

#nav-pointer {
	border-bottom-color: <?php echo $nav_arrow_color; ?>;
}
nav .menu .sub-menu .parent > a:after {
	border-left-color: <?php echo $nav_arrow_color; ?>;
}
#nav-section, #mini-header {
	background-color: <?php echo $nav_bg_color; ?>;
}
nav .menu ul {
	background-color: <?php echo $nav_sm_bg_color; ?>;
	border-color: <?php echo $nav_divider_color; ?>;
}
nav .menu ul li {
	border-bottom-color: <?php echo $nav_divider_color; ?>;
	border-bottom-style: <?php echo $nav_divider; ?>;
}
nav .menu > li a, #menubar-controls a, #mini-search a {
	color: <?php echo $nav_text_color; ?>;
}
nav .menu > li a:hover {
	color: <?php echo $nav_text_hover_color; ?>;
}
nav .menu ul li a {
	color: <?php echo $nav_sm_text_color; ?>;
}
nav .menu ul li:hover > a {
	color: <?php echo $nav_sm_text_hover_color; ?>;
}
nav .menu li.parent > a:after, nav .menu li.parent > a:after:hover {
	color: #aaa;
}
nav .menu li.current-menu-ancestor > a, nav .menu li.current-menu-item > a {
	color: <?php echo $nav_selected_text_color; ?>;
}
nav .menu ul li.current-menu-ancestor > a, nav .menu ul li.current-menu-item > a {
	color: <?php echo $nav_sm_selected_text_color; ?>;
}


/*========== Page Heading Styles ==========*/

.page-heading {
	background-color: <?php echo $page_heading_bg_color; ?>;
	border-bottom-color: <?php echo $section_divide_color; ?>;
}
.page-heading h1, .filter-wrap a.select {
	color: <?php echo $page_heading_text_color; ?>!important;
}
.heading-rss-icon, .filter-wrap {
	border-color: <?php echo $filter_rss_border_color; ?>;	
	color: <?php echo $page_heading_text_color; ?>;
}
.filter-wrap ul {
	border-color: <?php echo $filter_rss_border_color; ?>;
	background-color: #f7f7f7;
}
.filter-wrap ul li:hover, .filter-wrap ul li.selected {
	background: <?php echo $section_divide_color; ?>;
}


/*========== Body Styles ==========*/

body, input[type="text"], input[type="password"], input[type="email"], textarea, select {
	color: <?php echo $body_text_color; ?>;
}
h1, h1 a {
	color: <?php echo $h1_text_color; ?>;
}
h2, h2 a {
	color: <?php echo $h2_text_color; ?>;
}
h3, h3 a {
	color: <?php echo $h3_text_color; ?>;
}
h4, h4 a {
	color: <?php echo $h4_text_color; ?>;
}
 .archive-title ,.archive-title a,.archive-title a:hover, .archive-title a:focus, .archive-title a:visited ,h1.entry-title, h1.entry-title a , h1.entry-title a:hover ,h1.entry-title a:visited, h1.entry-title a:focus ,h5, h5 a {
	color: #8129BC !important;
}
.archive-title.odd ,.archive-title.odd a,.archive-title.odd a:hover, .archive-title.odd a:focus, .archive-title.odd a:visited ,h1.entry-title.odd, h1.entry-title.odd a , h1.entry-title.odd a:hover ,h1.entry-title.odd a:visited, h1.entry-title.odd a:focus  {
	color: #8129BC !important;
}
h6, h6 a {
	color: <?php echo $h6_text_color; ?>;
}
.wpb_impact_text .wpb_call_text, .impact-text {
	color: <?php echo $impact_text_color; ?>;
}
.read-more i, .read-more em {
	color: transparent;
}


/*========== Content Styles ==========*/

.inner-page-wrap article, .inner-page-wrap .type-page, .inner-page-wrap .page-content, .inner-page-wrap .blog-listings {
	border-color: <?php echo $section_divide_color; ?>;
}
.pb-border-bottom, .pb-border-top {
	border-color: <?php echo $section_divide_color; ?>;
}


/*========== Sidebar Styles ==========*/

#sidebar h3, #sidebar h3 a ,.sidebar .widget-heading h3 {
	color: <?php echo $sidebar_h3_text_color; ?>;
	border-color: <?php echo $section_divide_color; ?>;
}
.widget ul li {
	border-color: <?php echo $section_divide_color; ?>;
}
.widget .tagcloud a:hover {
	color: <?php echo $body_text_color; ?>;
}
 

/*========== Shortcode Styles ==========*/

.sf-button.accent {
	color: #fff;
}
a.sf-button:hover, #footer a.sf-button:hover {
	background-image: none;
	color: #fff!important;
}
a.sf-button.green:hover, a.sf-button.lightgrey:hover, a.sf-button.limegreen:hover {
	color: #111!important;
}
.wpcf7 input.wpcf7-submit[type="submit"] {
	color: #fff;
}
.wpb_single_image figure .overlay {
	box-shadow: inset 0 0 0 380px <?php echo $accent_color; ?>;
	color: #fff;
}
.browser-ie .wpb_single_image figure .overlay {
	background-color: <?php echo $accent_color; ?>;
}
.sf-icon {
	color: <?php echo $icon_color; ?>;
}
.sf-icon-cont {
	background-color: <?php echo $icon_container_bg_color; ?>;
}
span.dropcap3 {
	background: #000;
	color: #fff;
}
span.dropcap4 {
	color: #fff;
}
ul.tabs .ui-state-active a, ul.tabs .ui-state-active a:link, ul.tabs .ui-state-active a:visited, .accordion .ui-state-active a, .accordion .ui-state-active a:link, .accordion .ui-state-active a:visited, .ui-tabs .ui-tabs-nav li.ui-tabs-active a, .wpb_accordion .wpb_accordion_section > h3.ui-state-active a {
	color: <?php echo $accent_color; ?>
}
ul.tabs li.ui-state-active a:hover, .accordion .accordion-header.ui-state-active:hover {
	color: #222;
}
.minimal .wpb_accordion_section, .minimal .wpb_accordion_section:first-child, .wpb_accordion.standard .wpb_accordion_section, .wpb_accordion.standard .wpb_accordion_section h3.ui-state-active {
	border-color: <?php echo $section_divide_color; ?>;
}
.wpb_divider, .wpb_divider.go_to_top_icon1, .wpb_divider.go_to_top_icon2, .testimonials > li, .jobs > li, .wpb_impact_text, .tm-toggle-button-wrap, .tm-toggle-button-wrap a, .portfolio-details-wrap, .wpb_divider.go_to_top a {
	border-color: <?php echo $section_divide_color; ?>;
}
.wpb_divider.go_to_top_icon1 a, .wpb_divider.go_to_top_icon2 a {
	background: <?php echo $inner_page_bg_color; ?>;
}
.wpb_tabs.minimal .ui-state-default:hover, .wpb_tabs.left_minimal .ui-state-default:hover {
	background: <?php echo $tab_rollover_color; ?>;
}
.wpb_tabs.minimal .ui-state-active, .wpb_tabs.minimal .ui-state-active:hover, .wpb_tabs.left_minimal .ui-state-active, .wpb_tabs.left_minimal .ui-state-active:hover, .wpb_content_element .ui-widget-header .ui-state-active {
	background: <?php echo $inner_page_bg_color; ?>;
}
blockquote.pullquote {
	border-color: <?php echo $section_divide_color; ?>;
}
.borderframe img {
	border-color: #eeeeee;
}
.labelled-pricing-table .column-highlight {
	background-color: #fff;
	-moz-box-shadow: 0 0 5px rgba(0,0,0,.1);
	-webkit-box-shadow: 0 0 5px rgba(0,0,0,.1);
	box-shadow: 0 0 5px rgba(0,0,0,.1);
}
.labelled-pricing-table .pricing-table-label-row, .labelled-pricing-table .pricing-table-row {
	background: <?php echo $lpt_secondary_row_color; ?>;
}
.labelled-pricing-table .alt-row {
	background: <?php echo $lpt_primary_row_color; ?>;
}
.labelled-pricing-table .pricing-table-price {
	background: <?php echo $lpt_default_pricing_header; ?>;
}
.labelled-pricing-table .pricing-table-package {
	background: <?php echo $lpt_default_package_header; ?>;
}
.labelled-pricing-table .lpt-button-wrap {
	background: <?php echo $lpt_default_footer; ?>;
}
.labelled-pricing-table .lpt-button-wrap a.accent {
	background: #222!important;
}
.labelled-pricing-table .column-highlight .lpt-button-wrap {
	background: transparent!important;	
}
.labelled-pricing-table .column-highlight .lpt-button-wrap a.accent {
	background: <?php echo $accent_color; ?>!important;
}
.column-highlight .pricing-table-price {
	color: #fff;
	background: <?php echo $pt_primary_bg_color; ?>;
	border-bottom-color: <?php echo $pt_primary_bg_color; ?>;
}
.column-highlight .pricing-table-package {
	background: <?php echo $pt_secondary_bg_color; ?>;
}
.column-highlight .pricing-table-details {
	background: <?php echo $pt_tertiary_bg_color; ?>;
}
.column-highlight .pricing-table-package {
	background-color: #b4e5f8;
}
.column-highlight .pricing-table-details {
	background-color: #e1f3fa;
}
.decorative-ampersand {
	font-family: 'Vidaloka', serif;
}
.wpb_box_text.coloured .box-content-wrap {
	color: #fff;
}
.wpb_box_text.whitestroke .box-content-wrap {
	background-color: #fff;
	border-color: <?php echo $section_divide_color; ?>;
}
.client-item figure {
	border-color: <?php echo $section_divide_color; ?>;
}
.client-item figure:hover {
	border-color: #333;
}
ul.member-contact li a:hover {
	color: #333;
}

/*========== Footer Styles ==========*/

#footer {
	background: transparent url("<?php echo $options['custom_footer_bg_image']; ?>") repeat ; 
	background-color: <?php echo $footer_bg_color; ?>;
	border-top-color: <?php echo $section_divide_color; ?>;

}
#footer, #footer h3, #footer p {
	color: <?php echo $footer_text_color; ?>;
}
#footer a:not(.sf-button) {
	color: <?php echo $accent_color; ?>;
}
#footer .twitter-text a:hover, #footer .twitter-link a:hover {
	color: <?php echo $accent_color; ?>;
}
#copyright {
	background-color: <?php echo $copyright_bg_color; ?>;
}
#copyright p {
	color: <?php echo $copyright_text_color; ?>;
}




/* Custom Styles
================================================== */

<?php if ($use_custom_font_one) { ?>body, p,  #top-nav ,  #header-search input, .header-items h3.phone-number, .related-wrap h3, #comments-list > h3, .item-heading h1, .button, button, .sf-button, input[type="submit"], input[type="reset"], input[type="button"], input[type="email"], .wpb_accordion_section h3, #header-login input {font-family: '<?php echo $google_font_one; ?>', sans-serif;}<?php } ?>

<?php if ($use_custom_font_two) { ?>h1, h2, h3, h4, h5, h6, .heading-font, .custom-caption p, span.dropcap1, span.dropcap2, span.dropcap3, span.dropcap4, .wpb_call_text, .impact-text, .testimonial-text {font-family: '<?php echo $google_font_two; ?>', sans-serif;}<?php } ?>

<?php if ($use_custom_font_sidebar_menu) { ?> #sidebar  , #sidebar .widget-heading h3, #sidebar-nav  , #sidebar-nav a {font-family: '<?php echo $google_sidebar_menu_font; ?>', sans-serif; color:white;}<?php } else {?>

#sidebar  , #sidebar h3, #sidebar h3 a, #sidebar .widget-heading h3, #sidebar-nav  , #sidebar-nav a {font-family: '<?php echo $sidebar_menu_font; ?>', sans-serif; color:white; font-weight:100;} <?php } ?>
<?php if ($options['use_mail_banner']) { ?> 
#banner { display: inline-block; }  
<?php } else {?>  
#banner { display: none; }  
 <?php } ?>

/* User Specific Styles
================================================== */
<?php if ($custom_css) { ?><?php echo $custom_css; ?><?php } ?>
