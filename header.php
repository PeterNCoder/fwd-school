<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fwd-school' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-flex">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$fwd_school_description = get_bloginfo( 'description', 'display' );
				if ( $fwd_school_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $fwd_school_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="screen-reader-text">Menu</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path d="M4 22h-4v-4h4v4zm0-12h-4v4h4v-4zm0-8h-4v4h4v-4zm3 0v4h17v-4h-17zm0 12h17v-4h-17v4zm0 8h17v-4h-17v4z"/>
					</svg>
				</button>
				
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>
		</div>
	</header>
