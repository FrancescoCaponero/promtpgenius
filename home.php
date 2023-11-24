<?php get_header(); ?>

<div id="primary">
    <main id="main" class="site-main">
    <?php
    // QUERY FEATURED
    $args = array(
        'post_type' => 'any', // Sceglie tutti i tipi di post, inclusi i custom post types
        'posts_per_page' => 3, // Numero di post da mostrare, ad esempio 3
        'tax_query' => array(
            array(
                'taxonomy' => 'in_evidenza',
                'field'    => 'slug',
                'terms'    => 'in-evidenza', // Assicurati che il termine corrisponda
            ),
        ),
    );
    $in_evidenza_query = new WP_Query($args);
    
    $counter = 0; // Inizializza il contatore

    if ($in_evidenza_query->have_posts()) : 
        while ($in_evidenza_query->have_posts()) : $in_evidenza_query->the_post(); 
            $counter++; // Incrementa il contatore per ogni post

            if ($counter == 1): 
                ?>
                 <article class="post-featured">
                    <div class="post-featured__lefty">
                    <a  href="<?php the_permalink(); ?>"><h1><?= the_title() ?></h1></a>
                        <p><?php the_excerpt(); ?></p>
                        <div class="post-featured__lefty--foot">
                        <?php 
                            $categories = get_the_category();
                            $category_class = '';
                            if ( ! empty( $categories ) ) {
                                $category_name = $categories[0]->slug; 
                                $category_class = 'category-' . $category_name;
                                $firstCategorySlug = $categories[0]->slug;
                            }
                            ?>
                            <a class="<?php echo $category_class; ?>" href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>">
                                <?php echo $categories[0]->name; ?>
                            </a>
                            <p><?php the_author(); ?></p>
                        </div>
                    </div>
                    <div class="post-featured__righty">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                        ?>
                    </div>
                </article>
                <?php
            else:
                if ($counter == 2): ?>
                    <div class="posts-flex-container">
                <?php endif; ?>

                <article class="post-featured-23">
                    <div class="post-featured-23__lefty">
                    <a  href="<?php the_permalink(); ?>"><h2><?= the_title() ?></h2></a>
                        <p><?php the_excerpt(); ?></p>
                        <div class="post-featured-23__lefty--foot">
                            <?php 
                            $categories = get_the_category();
                            $category_class = '';
                            if ( ! empty( $categories ) ) {
                                $category_name = $categories[0]->slug; 
                                $category_class = 'category-' . $category_name;
                                $firstCategorySlug = $categories[0]->slug;
                            }
                            ?>
                            <a class="<?php echo $category_class; ?>" href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>">
                                <?php echo $categories[0]->name; ?>
                            </a>
                            <p><?php the_author(); ?></p>
                        </div>
                    </div>
                    <div class="post-featured-23__righty">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                        ?>
                    </div>
                </article>

                <?php
                if ($counter == 3): ?>
                    </div> 
                <?php endif;
            endif;
        endwhile; 
        wp_reset_postdata();
    else : 
        echo '<h1>Non ci sono post in evidenza da mostrare</h1>';
    endif; 
    ?>
    <!-- Visualizzazione degli ultimi post -->
    <div class="latest-posts">
        <h2 class="latest-post-title">Out Latest Post</h2>
    <?
    // QUERY LATEST POSTS
    $query = new WP_Query(array(
        'post_type' => array('ai', 'tech', 'dev', 'society','ai-tools','guides','experiences'),
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'in_evidenza',
                'field'    => 'slug',
                'terms'    => array('in-evidenza'),
                'operator' => 'NOT IN',
            ),
        ),
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
    if ($query->found_posts > 5): 
        ?>
        <button id="load-more-posts" data-page="1" data-max="<?php echo $query->max_num_pages; ?>">
            <h4>More Articles</h4>
        </button>
    <?php
    endif;
    
    wp_reset_postdata();
    ?>
    </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
