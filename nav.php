<div class="overlay"></div>

<nav class="menu">
    <div class="menu-mobile-header">
        <button type="button" class="menu-mobile-arrow btn with-icon"><i class="icon ion-ios-arrow-back"></i></button>
        <div class="menu-mobile-title"></div>
        <button type="button" class="menu-mobile-close btn with-icon"><i class="icon ion-android-close"></i></button>
    </div>
    <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'menu_class' => 'list-unstyled menu-section',
                'container' => 'ul',
            )
        );
    ?>
</nav>