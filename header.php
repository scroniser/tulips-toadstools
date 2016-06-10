<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tulips_and_Toadstools
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'tulips-and-toadstools' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
			        <?php esc_html_e( '', 'tulips-and-toadstools' ); ?>
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>

			      <a class="navbar-brand" href="#">Brand</a>
			    </div>

					<?php
			            wp_nav_menu( array(
			                'menu'              => 'primary-menu',
			                'theme_location'    => 'primary',
			                'menu_id' 			=> 'primary-menu',
			                'depth'             => 4,
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse',
			        		'container_id'      => 'primary-menu',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			        ?>
			</div>
		</nav><!-- #site-navigation -->
		<div class="site-branding jumbotron">
			<div class="container">

				<?php
				if ( is_front_page() && is_home() ) : ?>
					<?php if ( get_theme_mod( 'themeslug_events_images' ) ) : ?>
    					<div class='site-events row'>
    						<div class='col-xs-12 hero-col'>
    							<div id='hero-col1' class='hero-cols'>
    								<div id='hero1'>
    									<div class='content' style='background-image:url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'themeslug_events_image_1' )) ); ?>);'>
	    									<p class='hero-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo get_theme_mod( 'themeslug_events_image_title_1' ); ?></a></p>
	    								</div>
	    							</div>
	        						<div id='hero2'>
		        						<div class='content' style='background-image:url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'themeslug_events_image_2' )) ); ?>);'>
		    								<p class='hero-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo get_theme_mod( 'themeslug_events_image_title_2' ); ?></a></p>
		    							</div>
	    							</div>
	    						</div>
	    						<div id='hero-col2' class='hero-cols'>
	    							<div id='hero3'>
	    								<div class='content' style='background-image:url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'themeslug_events_image_3' )) ); ?>);'>
	    									<p class='hero-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo get_theme_mod( 'themeslug_events_image_title_3' ); ?></a></p>
	    								</div>
	    							</div>
	    						</div>
    							<div id='hero-col3' class='hero-cols'>
    								<div id='hero4'>
    									<div class='content' style='background-image:url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'themeslug_events_image_4' )) ); ?>);'>
	    									<p class='hero-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo get_theme_mod( 'themeslug_events_image_title_4' ); ?></a></p>
	    								</div>
	    							</div>
	        						<div id='hero5'>
	        							<div class='content' style='background-image:url(<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'themeslug_events_image_5' )) ); ?>);'>
	    									<p class='hero-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php echo get_theme_mod( 'themeslug_events_image_title_5' ); ?></a></p>
	    								</div>
	    							</div>
	    						</div>
    						</div>
    					</div>
					<?php else : ?>
    					<hgroup>
					        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
					        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
					    </hgroup>
					<?php endif; ?>
					
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
