<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package promptgenius
 */

get_header();  
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				echo post_type_archive_title( '', false );
				?>
			</header><!-- .page-header -->

			
			<?php
			while ( have_posts() ) : the_post();

				echo '<div class="post-item">';
					echo '<h2>' . get_the_title() . '</h2>';
					echo '<div class="post-content">' . get_the_content() . '</div>';
				echo '</div>';

				endwhile;

				the_posts_navigation();

			else :

				echo '<p>Nessun post trovato.</p>';

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
