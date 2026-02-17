<?php get_header(); ?>
<section class="front-page-hero"> 
	<h1> Photographe Event </h1>
</section>
<main>
	<section class="front-page-filter"> 
		<form id="photo-filter" action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" >
			<div class="front-page-filter-left">
				<div class="front-page-filter-flexbox">
					<label for="categorie">Catégories</label>
    				<select name="categorie" id="categorie">
						<option value=""></option>
        				<?php
        				$categories = get_terms(array(
            				'taxonomy' => 'categorie',
            				'hide_empty' => false,
        				));
						foreach ($categories as $cat) {
            				echo '<option value="' . $cat->slug . '">' . $cat->name . '</option>';
        				}
        				?>
    				</select>
				</div>
				<div class="front-page-filter-flexbox">
					<label for="format">Formats</label>
    				<select name="format" id="format">
						<option value=""></option>
        				<?php
        				$formats = get_terms(array(
            				'taxonomy' => 'format',
            				'hide_empty' => false,
        				));
        				foreach ($formats as $format) {
            				echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        				}
        				?>
    				</select>
				</div>
			</div>
			<div class="front-page-filter-right">
				<div class="front-page-filter-flexbox">
					<label for="date">Trier par</label>
    				<select name="date" id="date">
						<option value=""></option>
        				<option value="DESC">Plus récentes</option>
        				<option value="ASC">Plus anciennes</option>
    				</select>
				</div>
			</div>
		</form>
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