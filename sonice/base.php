<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 9]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

    <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php

    ?>

    <?php
      if (current_theme_supports('bootstrap-top-navbar')) {
        get_template_part('templates/header-top-navbar');
      } else {
        get_template_part('templates/header');
      }
    ?>

    <div class="container main">

        <div class="wrapper">

            <?php include roots_template_path(); ?>

            <?php if (roots_display_sidebar()) : ?>
                <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
                    <?php include roots_sidebar_path(); ?>
                </aside><!-- /.sidebar -->
            <?php endif; ?>

            <?php get_template_part('templates/footer'); ?>

        </div>

    </div>

</body>
</html>
