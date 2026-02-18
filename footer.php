<footer class="footer">
        <?php wp_nav_menu(['theme_location'  => 'footer-menu','container'=> 'nav','container_class' => 'footer-nav','menu_class'=> 'footer-menu',]);?>
    <p>Tous droits réservés</p>
</footer>

<?php get_template_part('templates_part/contact-modale'); ?>
<?php get_template_part('templates_part/photo-lightbox'); ?>

<?php wp_footer(); ?>
</body>
</html>