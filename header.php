<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="header">
        <a href="<?php echo home_url( '/' ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_mota.svg" alt="Logo de MotaPhoto" class="header-logo">
        </a>  
        <!-- Menu desktop -->
        <div class="header-menu-container">
        <?php wp_nav_menu(['theme_location'  => 'main-menu','container'=> 'nav','container_class' => 'header-nav','menu_class'=> 'header-menu']);?>        
        <a href="/contact" class="header-contact">Contact</a>
        </div>  

        <!-- Icone burger -->
        <a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
            <span></span>
            <span></span>
            <span></span>
        </a>

        <!-- Menu responsive -->
        <nav role="navigation" id="topnav_responsive_menu">
            <?php wp_nav_menu(['theme_location'  => 'main-menu','container'=> 'nav','container_class' => 'header-nav','menu_class'=> 'header-menu']);?>        
            <a href="/contact" class="header-contact">Contact</a>
        </nav>
    </header>




