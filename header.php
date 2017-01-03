<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rt_assignment
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rt-assignment' ); ?></a>

			<header id="masthead" class="site-header wrapper" role="banner">

				<div class="main-header">
					<div class="site-branding">
						<?php
						if ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						}
						?>
					</div><!-- .site-branding -->
					<div class="secondry-menu">


						<?php
						wp_nav_menu( array( 'theme_location' => 'header-menu',
							'menu_id'		 => 'Top-menu',
							'menu_class'	 => 'text-uppercase list-inline',
							'after'			 => '',
							'before'		 => '',
							'link_after'	 => '', ) );
						?>
					</div>


				</div>
				<div class='header-search-form'>
					<?php
					get_search_form();
					?>
				</div>



				<!--				<nav id="site-navigation" class="main-navigation" role="navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rt-assignment' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
								</nav> #site-navigation -->
			</header><!-- #masthead -->

			<div id="content" class="site-content"></div>

