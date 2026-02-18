<article class="photo-block">
	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title(); ?>">
    <div class="photo-block-overlay">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="photo-block-overlay-eye">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/eye_icon.png" alt="Voir le détail de la photo">
        </a>
        <a href="#" class="photo-block-overlay-fullscreen"
            data-image="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>"
            data-category="<?php echo esc_attr( get_the_term_list( get_the_ID(), 'categorie', '', ', ' ) ); ?>"
            data-reference="<?php echo esc_attr( get_field('reference') ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fullscreen_icon.png" alt="Voir la photo en plein écran">
        </a>        
        <span class="photo-block-overlay-reference">
            <?php echo get_post_meta( get_the_ID(), 'reference', true ); ?>        
        </span>
        <span class="photo-block-overlay-category">
			<?php $categorie_terms = get_the_terms( get_the_ID(), 'categorie' );
			if ( ! empty( $categorie_terms ) && ! is_wp_error( $categorie_terms ) ) {
    			foreach ( $categorie_terms as $term ) {
					echo esc_html( $term->name ) . ' ';}
			} ?>
        </span>
    </div>
</article>
