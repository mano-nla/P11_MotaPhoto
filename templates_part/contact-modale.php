<div class="modal" id="modal-contact">

    <div class="modal-overlay" data-close-modal></div>

    <div class="modal-content">
        <div class="modal-img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact_header.png" alt="Image du header de la modale" class="modal-img">
        </div>
            <div class="modal-form">
	        <?php echo do_shortcode('[contact-form-7 id="662cc81" title="Formulaire de contact"]');?>
        </div>

    </div>
</div>