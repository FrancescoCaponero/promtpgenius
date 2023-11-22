<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main">
    <?php

    // QUERY PER I RISULTATI DELLA RICERCA
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
            ?>
            <div class="search-result-item">
                <div class="search-result-item__lefty">
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                </div>
                <div class="search-result-item__center">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                    ?>
                </div>
				<div class="search-result-item__righty">
					<p><?php the_excerpt(); ?></p>
				</div>
            </div>
            <?php
        endwhile;
    else :
		echo '<div class="search-result-item">';
		echo '<div height="300px" width="300px">&nbsp</div>';
        echo '<h1>Nessun risultato trovato per la ricerca.</h1>';
		echo '</div>';
		
    endif; 
    ?>

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
		?>
    </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
