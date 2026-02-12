<?php get_header(); ?>
<section class="front-page-hero"> 
	<h1> Photographe Event </h1>
</section>
<main>
	<section class="front-page-filter"> 
	
	</section>
	<section class="front-page-photo"> 
		<?php
    		$args = array(
        		'post_type'      => 'photos',
        		'posts_per_page' => 8,
				'orderby' 		 => 'rand',
			);
			$my_query = new WP_Query( $args );
			if( $my_query->have_posts() ) {
				while( $my_query->have_posts() ) { 
					$my_query->the_post();
        			get_template_part( 'templates_part/photo-block' );
					}
			}
			wp_reset_postdata();
			?>
	</section>
</main>
<?php get_footer(); ?>