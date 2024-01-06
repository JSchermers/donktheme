<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DonkTest
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'funfun'); ?></a>

		<header id="masthead">
			<address class="donk-adres">Adres: Nieuwe Donkstraat 1, 2809NJ Gouda</address>
			<div class="site-header">
				<div class="site-branding donk-site-branding">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="donk logo" class="logo" />

					<!-- Comment OUT -->
					<!-- <?php
							// the_custom_logo();
							if (is_front_page() && is_home()) :
							?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
							else :
					?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
							endif;
							$funfun_description = get_bloginfo('description', 'display');
							if ($funfun_description || is_customize_preview()) :
					?>
					<p class="site-description"><?php echo $funfun_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				
				<?php endif; ?> -->
					<!-- End Comment OUT -->

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation donk-main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'funfun'); ?></button>
					<?php

					wp_nav_menu(
						array(
							// 'theme_location' => 'menu-1',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item donk-nav-lid-worden"><a href="http://www.google.com">Lid worden</a></li></ul>',
							'depth' 		=> 1,
							'menu_id'        => 'primary-menu',
						)
					);

					?>
					<!-- <button>Lid worden</button> -->
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->