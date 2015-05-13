<nav class="nav-main nav-collapse collapse" role="navigation">
   <?php
     if (has_nav_menu('primary_navigation')) :
       wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
     endif;
   ?>
</nav>
