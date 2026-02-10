<?php get_header(); ?>
	<main> 
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<section class="single-photo"> 
			<div class="single-photo-content"> 
				<div class="single-photo-content-description"> 
    				<h1><?php the_title(); ?></h1>
    				<p>Référence : <?php echo get_post_meta( get_the_ID(), 'reference', true ); ?></p>
    				<p>Catégorie : 
						<?php $categorie_terms = get_the_terms( get_the_ID(), 'categorie' );
						if ( ! empty( $categorie_terms ) && ! is_wp_error( $categorie_terms ) ) {
    						foreach ( $categorie_terms as $term ) {
								echo esc_html( $term->name ) . ' ';}
						} ?>
					</p>
    				<p>Format : 
						<?php $format_terms = get_the_terms( get_the_ID(), 'format' );
						if ( ! empty( $format_terms ) && ! is_wp_error( $format_terms ) ) {
    						foreach ( $format_terms as $term ) {
								echo esc_html( $term->name ) . ' ';}
						} ?>
					</p>
					<p>Type : <?php echo get_post_meta( get_the_ID(), 'type', true ); ?></p>
					<p> Année : <?php the_time('Y'); ?></p>
				</div>
				<div class="single-photo-content-photo"> 
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title(); ?>">
				</div>
			</div>
			<div class="single-photo-other"> 
				<div class="single-photo-other-contact"> 
					<h2>Cette photo vous intéresse ?</h2>
					<button class="single-photo-other-contact-button" data-open-modal data-reference="<?php echo get_post_meta(get_the_ID(), 'reference', true); ?>">Contact</button>
				</div>
				<div class="single-photo-other-nav"> 
					<div class="single-photo-other-nav-prev">
						<?php 
						$previous_post = get_adjacent_post(true, '', true, 'categorie');
						if ($previous_post) {
							$previous_thumbnail = get_the_post_thumbnail($previous_post->ID, array( 80,80));
							echo '<a href="' . get_permalink($previous_post->ID) . '" class="nav-prev">';
							echo '<img src="' . get_template_directory_uri() . '/assets/img/left_arrow.png" alt="Précédent">';
							echo '<div class="thumb-preview">' . $previous_thumbnail . '</div>';
							echo '</a>';
						}
						 ?>
    				</div>
    				<div class="single-photo-other-nav-next">
						<?php 
						$next_post = get_adjacent_post(true, '', false, 'categorie');
						if ($next_post) {
							$next_thumbnail = get_the_post_thumbnail($next_post->ID, array( 80,80));
							echo '<a href="' . get_permalink($next_post->ID) . '" class="nav-next">';
							echo '<img src="' . get_template_directory_uri() . '/assets/img/right_arrow.png" alt="Suivant">';
							echo '<div class="thumb-preview">' . $next_thumbnail . '</div>';
							echo '</a>';
						}
						 ?>
					</div>
				</div>
			</div>
		</section>
		<section class="single-photo-alsolike">  
			<h2 class="single-photo-alsolike-title">Vous aimerez aussi</h2>
			<div class="single-photo-alsolike-photo"> 

			</div>
		</section>
	<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>