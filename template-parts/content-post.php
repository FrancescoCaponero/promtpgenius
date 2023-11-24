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
        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
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
