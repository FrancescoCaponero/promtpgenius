<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package promptgenius
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="site-main-single-post">
    <?php
        while ( have_posts() ) : the_post();
            // Visualizzazione del titolo
            echo '<h1>' . get_the_title() . '</h1>';
			?>
			<div class="info-single">
			<?php
			   $categories = get_the_category();
			   $category_class = '';
			   if ( ! empty( $categories ) ) {
				   $category_name = $categories[0]->slug; 
				   $category_class = 'category-' . $category_name;
				   $firstCategorySlug = $categories[0]->slug;
			   }
		   ?>
		   <!-- Link della categoria con classe personalizzata -->
		   <a class="<?php echo $category_class; ?>" href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>">
			   <?php echo $categories[0]->name; ?>
		   </a>
		   <?php

            // Visualizzazione dell'autore
            echo '<p>' . get_the_author() . '</p>';

            // Visualizzazione della data
            echo '<p>[' . get_the_date() . ']</p>';
			?>
			</div>
			<?php

            // Visualizzazione dell'immagine in evidenza
            if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }
			?>
            <div class="content-single">
				<?php the_content(); ?>
			</div>
			<?php
            // Commenti, se presenti
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // Fine del loop.
    ?>
	</div>
    <!-- Visualizzazione degli ultimi post -->
    <div class="latest-posts">
        <h2 class="latest-post-title">Out Latest Post</h2>
		<?php
		// QUERY LATEST POSTS
		$query = new WP_Query(array(
			'post_type' => array('ai', 'tech', 'dev', 'society','ai-tools','guides','experiences'),
			'posts_per_page' => -1,
		));
		
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				?>
					<div class="home-post">
						<?php 
						$category = get_the_category(); 
						$firstCategorySlug = $category[0]->slug;
						?>
						<div class="home-post__lefty">
							<a  href="<?php the_permalink(); ?>"><h5><?= the_title() ?></h5></a>
							<div>
								<a href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>"><?= $category[0]->name; ?></a>
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
		?>
    </div>

</main><!-- #main -->

<?php
get_footer();
?>
