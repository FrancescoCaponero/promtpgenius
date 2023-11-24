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
	<div class="modal-copy">
		<h3>
			Link Copiato!
		</h3>
	</div>
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
			<div class="img-wrap-single">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				?>
			</div>
			<?php
			?>
            <div class="content-single">
				<?php the_content(); ?>
			</div>
			<div class="social-share-buttons">
				<h4>
					Share it on:
				</h4>
				<div class="social-share-buttons__links">
					<!-- Twitter -->
					<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank"><svg width="53" height="51" viewBox="0 0 53 51" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.83333 0C3.95481 0 0 3.80557 0 8.5V42.5C0 47.1944 3.95481 51 8.83333 51H44.1667C49.0452 51 53 47.1944 53 42.5V8.5C53 3.80557 49.0452 0 44.1667 0H8.83333ZM11.4656 10.9286H21.482L28.595 20.6547L37.2262 10.9286H40.381L30.0195 22.6018L42.7963 40.0714H32.7824L24.5283 28.7871L14.5119 40.0714H11.3571L23.1037 26.84L11.4656 10.9286ZM16.2963 13.3571L34.0985 37.6429H37.9656L20.1634 13.3571H16.2963Z" fill="black"/>
					</svg>
					</a>
	
					<!-- LinkedIn -->
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank"><svg width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M45.8095 0H6.19048C2.77333 0 0 2.77333 0 6.19048V45.8095C0 49.2267 2.77333 52 6.19048 52H45.8095C49.2267 52 52 49.2267 52 45.8095V6.19048C52 2.77333 49.2267 0 45.8095 0ZM16.0952 19.8095V43.3333H8.66667V19.8095H16.0952ZM8.66667 12.9629C8.66667 11.2295 10.1524 9.90476 12.381 9.90476C14.6095 9.90476 16.0086 11.2295 16.0952 12.9629C16.0952 14.6962 14.7086 16.0952 12.381 16.0952C10.1524 16.0952 8.66667 14.6962 8.66667 12.9629ZM43.3333 43.3333H35.9048C35.9048 43.3333 35.9048 31.8686 35.9048 30.9524C35.9048 28.4762 34.6667 26 31.5714 25.9505H31.4724C28.4762 25.9505 27.2381 28.501 27.2381 30.9524C27.2381 32.079 27.2381 43.3333 27.2381 43.3333H19.8095V19.8095H27.2381V22.979C27.2381 22.979 29.6276 19.8095 34.4314 19.8095C39.3467 19.8095 43.3333 23.1895 43.3333 30.0362V43.3333Z" fill="black"/>
					</svg>
					</a>
	
					<!-- Email -->
					<a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>"><svg width="66" height="50" viewBox="0 0 66 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 0V8.23489L32.9396 24.7047L65.8791 8.23489V0H0ZM0 16.4698V49.4093H65.8791V16.4698L32.9396 32.9396L0 16.4698Z" fill="black"/>
					</svg>
					</a>
	
					<!-- Copia Link -->
					<a class="copy-link-button" data-url="<?php echo get_permalink(); ?>"><svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M36.7481 0C35.6203 0.0626566 34.4925 0.18797 33.4273 0.56391C31.7356 1.19048 30.1065 2.13033 28.7281 3.50877C28.3315 3.76019 27.9964 4.09756 27.7478 4.49592C27.4991 4.89428 27.3432 5.34345 27.2916 5.81019C27.2399 6.27694 27.2939 6.74932 27.4494 7.19241C27.6049 7.63549 27.8581 8.03795 28.1902 8.37C28.5222 8.70205 28.9247 8.95521 29.3677 9.11075C29.8108 9.26628 30.2832 9.32022 30.75 9.26858C31.2167 9.21693 31.6659 9.06102 32.0642 8.81237C32.4626 8.56372 32.8 8.2287 33.0514 7.83208C33.7406 7.14286 34.5551 6.76692 35.4323 6.45363C37.6253 5.70175 40.3196 6.01504 42.0739 7.83208C44.5175 10.2757 44.5175 14.3484 42.0739 16.8546L32.6754 26.2531C29.9185 29.01 27.6629 29.2607 26.0338 29.198C24.4048 29.1353 23.4649 28.3835 23.4649 28.3835C23.1029 28.1778 22.7039 28.0454 22.2907 27.9939C21.8775 27.9424 21.4582 27.9728 21.0567 28.0833C20.6552 28.1939 20.2795 28.3824 19.9509 28.6382C19.6223 28.8939 19.3473 29.2119 19.1416 29.5739C18.9359 29.936 18.8035 30.335 18.752 30.7482C18.7005 31.1614 18.7309 31.5807 18.8415 31.9821C18.952 32.3836 19.1405 32.7594 19.3963 33.0879C19.6521 33.4165 19.97 33.6915 20.3321 33.8972C20.3321 33.8972 22.4624 35.2757 25.5952 35.4637C28.7281 35.6516 33.114 34.4612 36.9361 30.5764L46.3346 21.1779C51.2218 16.2907 51.2218 8.39599 46.3346 3.57143C44.5802 1.81704 42.5125 0.75188 40.2569 0.250627C39.1291 0 37.8759 0 36.7481 0.0626566V0ZM24.2168 14.4737C21.084 14.3484 16.7607 15.4135 13.0639 19.1729L3.66541 28.5714C-1.2218 33.4586 -1.2218 41.3534 3.66541 46.1779C7.17419 49.6867 12.1867 50.6892 16.5727 49.1228C18.2644 48.4962 19.8935 47.5564 21.2719 46.1779C21.6685 45.9265 22.0036 45.5892 22.2522 45.1908C22.5009 44.7924 22.6568 44.3433 22.7084 43.8765C22.7601 43.4098 22.7061 42.9374 22.5506 42.4943C22.3951 42.0512 22.1419 41.6488 21.8098 41.3167C21.4778 40.9847 21.0753 40.7315 20.6323 40.576C20.1892 40.4204 19.7168 40.3665 19.25 40.4181C18.7833 40.4698 18.3341 40.6257 17.9358 40.8744C17.5374 41.123 17.2 41.458 16.9486 41.8546C16.2594 42.5439 15.4449 42.9198 14.5677 43.2331C12.3747 43.985 9.68045 43.6717 7.92606 41.8546C5.48246 39.411 5.48246 35.3383 7.92606 32.8321L17.3246 23.4336C19.8308 20.9273 22.0238 20.614 23.7782 20.6767C25.5326 20.7393 26.7231 21.2406 26.7231 21.2406C27.0902 21.5159 27.5133 21.7072 27.9624 21.801C28.4116 21.8948 28.8759 21.8888 29.3225 21.7834C29.7691 21.6779 30.1871 21.4757 30.5469 21.1909C30.9068 20.9061 31.1996 20.5458 31.4048 20.1354C31.6101 19.725 31.7226 19.2745 31.7345 18.8157C31.7465 18.357 31.6575 17.9013 31.4738 17.4807C31.2902 17.0602 31.0165 16.6851 30.6719 16.3821C30.3274 16.079 29.9205 15.8553 29.48 15.7268C29.48 15.7268 27.3496 14.4737 24.2168 14.3484V14.4737Z" fill="black"/>
					</svg>
					</a>
				</div>
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
			'posts_per_page' => 5,
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

<?php
get_footer();
?>
