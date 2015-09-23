<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title>
		<?php wp_title(' | ', true, 'right'); ?>
	</title>
	<script type="text/javascript" src=" <?php echo get_template_directory_uri(); ?>/js/jquery-1.10.1.min.js">
	</script>
	<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<?php
	$options                      = get_option('spring_options');
	$use_custom_font_one          = $options['use_custom_font_one'];
	$custom_font_one              = explode(':', $options['standard_font']);
	$use_custom_font_two          = $options['use_custom_font_two'];
	$custom_font_two              = explode(':', $options['heading_font']);
	$use_custom_font_sidebar_menu = $options['use_custom_font_sidebar_menu'];
	$custom_sidebar_menu_font     = explode(':', $options['sidebar_menu_font']);
	$custom_fonts                 = "";
	$google_font_one              = str_replace("+", " ", $custom_font_one[0]);
	$google_font_two              = str_replace("+", " ", $custom_font_two[0]);
	$google_sidebar_menu_font     = str_replace("+", " ", $custom_sidebar_menu_font[0]);

	if($use_custom_font_one)
	{
		$custom_fonts .= "'".$google_font_one."', ";
	}
	if($use_custom_font_two)
	{
		$custom_fonts .= "'".$google_font_two."', ";
	}
	if($use_custom_font_sidebar_menu)
	{
		$custom_fonts .= "'".$google_sidebar_menu_font."', ";
	}
	?>
	<script>
		WebFontConfig =
		{
			google:
			{
				families: [<?php echo $custom_fonts; ?> 'Roboto']
			}
		};

		(function()
			{
				document.getElementsByTagName("html")[0].setAttribute("class","wf-loading")
				//  NEEDED to push the wf-loading class to your head
				document.getElementsByTagName("html")[0].setAttribute("className","wf-loading")
				// for IE…

				var wf = document.createElement('script');
				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
				'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'false';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
	</script>

	<?php wp_head(); ?>
</head>
<body>
<div id="wrapper" class="main-container">
<header>
	<div class="headerinner">
		<?php
		if(is_active_sidebar('topleft-sidebar'))
		{
			dynamic_sidebar('topleft-sidebar');
		} else {
		?>
		<div class="main-left-nav">
					<ul>
						<li><a href="">Contact Us</a></li>
					</ul>
		</div>
		<?php 	
		}
		?>
		<div id="imagewrapper">
			<div id="logo">
			</div>
		</div>
		<?php
		if(is_active_sidebar('topright-sidebar'))
		{
			dynamic_sidebar('topright-sidebar');
		} else {
		?>
		<div class="main-right-nav">
					<ul>
						<li><a href="">Heads Blog</a></li>
						<li><a href="">Staff Email</a></li>
					</ul>
		</div>
		<?php 	
		}
		?>
		<ul class="mobile-nav">
			<li>
				<a href="">
					Contact Us
				</a>
			</li>
			<li>
				<a href="">
					Heads Blog
				</a>
			</li>
			<li>
				<a href="">
					Staff Email
				</a>
			</li>
		</ul>
		<div class="drop-down-outer">
			<div class="nav-drop-down">
				Menu
				<div class="arrowicon">
					<i class="material-icons">
						arrow_drop_down
					</i>
				</div>
			</div>
			<div class="nav-drop-down-container">
				<ul class="">
					<li>
						<a href="" class="primary">
							Primary Page
						</a>
					</li>
					<li >
						<a href="" class="secondary">
							- Secondary Page
						</a>
					</li>
					<li >
						<a href="" class="secondary">
							- Secondary Page
						</a>
					</li>
					<li>
						<a href=""  class="secondary">
							- Secondary Page
						</a>
					</li>
					<li>
						<a href=""class="primary">
							Primary Page
						</a>
					</li>
					<li>
						<a href="" class="secondary">
							- Secondary Page
						</a>
					</li>
					<li>
						<a href="" class="tertiary">
							-- Tertiary Page
						</a>
					</li>
					<li>
						<a href=""  class="secondary">
							- Secondary Page
						</a>
					</li>
					<li>
						<a href=""  class="secondary">
							- Secondary Page
						</a>
					</li>
					<li>
						<a href=""  class="tertiary">
							-- Tertiary Page
						</a>
					</li>
					<li>
						<a href=""  class="tertiary">
							-- Tertiary Page
						</a>
					</li>
					<li>
						<a href=""  class="primary">
							Primary Page
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
