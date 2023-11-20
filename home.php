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
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_excerpt(); ?></p>
                        <div class="post-featured__lefty--foot">
                            <?php 
                            $category = get_the_category(); 
                            $firstCategorySlug = $category[0]->slug;
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>"><?= $category[0]->name; ?></a>
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
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        <div class="post-featured-23__lefty--foot">
                            <?php 
                            $category = get_the_category(); 
                            $firstCategorySlug = $category[0]->slug;
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) . $firstCategorySlug ); ?>"><?= $category[0]->name; ?></a>
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

    // QUERY LATEST POSTS
    $query = new WP_Query(array(
        'post_type' => array('ai', 'tech', 'dev', 'society','ai-tools','guides','experiences'),
        'posts_per_page' => -1,
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
            <div class="post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-content">
                    <?php get_the_content(); ?>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>Nessun post trovato.</p>';
    }
    
    wp_reset_postdata();
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
