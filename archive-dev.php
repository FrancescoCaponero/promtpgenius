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
			<h1 class="archive-title">
			<?= post_type_archive_title( '', false ); ?>
			</h1>
			
			<?php
			// QUERY LATEST POSTS
			$query = new WP_Query(array(
				'post_type' => array('dev'),
				'posts_per_page' => -1,
			));
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					?>
						<div class="home-post">
							<?php
							$categories = get_the_category();
							$category_class = '';
							if ( ! empty( $categories ) ) {
								$category_name = $categories[0]->slug; 
								$category_class = 'category-' . $category_name;
								$firstCategorySlug = $categories[0]->slug;
							}
							?>
							<div class="home-post__lefty">
								<a  href="<?php the_permalink(); ?>"><h5><?= the_title() ?></h5></a>
								<div>
								<a class="<?php echo $category_class; ?>" href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>">
									<?php echo $categories[0]->name; ?>
								</a>
								<p><?php the_author(); ?></p>
								</div>
							</div>
							<div class="home-post__center">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
								?>
							</div>
							<div class="home-post__righty">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
					<?php
				}
			} else {
				echo '<p>Nessun post trovato.</p>';
			}
			
			wp_reset_postdata();
		endif;
			?>
	</main><!-- #main -->

<?php
get_footer();
