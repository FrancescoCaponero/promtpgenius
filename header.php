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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LQQ2HGQ63F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LQQ2HGQ63F');
</script>

<body <?php body_class(); ?>>
<div id="custom-cursor"></div>
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

			<div id="search-bar">
                <?php get_search_form(); ?>
				<svg width="25" height="25" id="closex-search" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0V6.25H6.25V0H0ZM18.75 0V6.25H25V0H18.75ZM9.375 9.375V15.625H15.625V9.375H9.375ZM0 18.75V25H6.25V18.75H0ZM18.75 18.75V25H25V18.75H18.75Z" fill="white"></path></svg>
            </div>
			
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
