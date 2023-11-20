<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package promptgenius
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
			<?php
			the_custom_logo();
			?>
			<div class="ham-menu-mobile">
			<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 0V12.5H12.5V0H0ZM18.75 0V12.5H31.25V0H18.75ZM37.5 0V12.5H50V0H37.5ZM0 18.75V31.25H12.5V18.75H0ZM18.75 18.75V31.25H31.25V18.75H18.75ZM37.5 18.75V31.25H50V18.75H37.5ZM0 37.5V50H12.5V37.5H0ZM18.75 37.5V50H31.25V37.5H18.75ZM37.5 37.5V50H50V37.5H37.5Z" fill="#78F2FA"/>
			</svg>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'main-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<nav class="secondary-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'secondary',
				)
			);
			?>
		</nav>
	</header><!-- #masthead -->
