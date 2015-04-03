<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?><!DOCTYPE html <?php language_attributes(); ?>>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title>
			<div>
				<?php bloginfo('name'); // show the blog name, from settings ?> 
			</div>

			<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
		</title>

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head();
		// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
		// (right here) into the head of your website.
		// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
		// Move it if you like, but I would keep it around.
		?>
	</head>

	<body <?php body_class("fs-grid");
		// This will display a class specific to whatever is being loaded by Wordpress
		// i.e. on a home page, it will return [class="home"]
		// on a single post, it will return [class="single postid-{ID}"]
		// and the list goes on. Look it up if you want more.
		?>>

		<header role="banner" class="header_menu">
			<!--  <div class="fs-cell fs-lg-4">
					<h1 class="header_title">
						<a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home"><?php bloginfo( 'name' ); // Display the blog name ?></a>
					</h1>
					<h4 class="header_description">
						<?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
					</h4> 
			</div> -->
			<div class="fs-row">
				<div class="fs-cell fs-md-4 fs-lg-4">
					<h1 class="header_menu_logo">Tanya Heidrich</h1>
				</div>
				<div class="fs-cell fs-md-6 fs-lg-8">
					<nav role="navigation" class="header_menu_pages">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
					</nav>
				</div>
			</div>
		</header>
		<?php get_sidebar(); // This fxn gets the sidebar.php file and renders it ?>