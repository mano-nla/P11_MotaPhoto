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
    			'paged'          => 1,
				'orderby' => 'date',
				'order'   => 'ASC',
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
	<button
	class="front-page-load-more"
	data-page="1"
	data-nonce="<?php echo wp_create_nonce('front-page-load-more'); ?>"
	data-action="front_page_load_more"
	data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>">
		Charger plus
	</button>
</main>
<?php get_footer(); ?>