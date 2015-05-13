<?php
    ICL_LANGUAGE_CODE == 'fr' ? $lang_prefix = '/fr/' : $lang_prefix = '/';
    $product_nav_item = null;
    $final = null;

    $args = array(
       'public'   => true,
       '_builtin' => false,
    );

    $output = 'objects'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'
    $menu_post_types = get_post_types( $args, $output, $operator );
    $count = 0;
    $first_row = $second_row = null;

foreach ( $menu_post_types as $menu_post_type ) {

    $name = $menu_post_type->name;
    $label = __($menu_post_type->labels->name, 'sonice');
    $link = $menu_post_type->rewrite['slug'];

    // get posts in this category

    if ($name !== "recipe") {

        $single_args = array(
            'post_type'=> $name,
            'order'=>'ASC'
        );

        $menu_intro_image = null;

        ICL_LANGUAGE_CODE == 'fr' ? $lang_prefix = '/fr/' : $lang_prefix = '/';

        if ($name == 'fresh-soy') {
            $menu_intro_image = get_field('fresh-soy-intro-image', 'option');
        } else if ($name == 'non-refrigerated') {
            $menu_intro_image = get_field('non-refrigerated-intro-image', 'option');
        } else if ($name == 'single-serve') {
            $menu_intro_image = get_field('single-serve-intro-image', 'option');
        } else if ($name == 'fresh-almond') {
            $menu_intro_image = get_field('fresh-almond-intro-image', 'option');
        } else if ($name == 'coffee-creamer') {
            $menu_intro_image = get_field('coffee-creamer-intro-image', 'option');
        }

        if ($count <= 2) {
            $first_row .= <<<BLOCK

                <a href="{$lang_prefix}{$name}" class="{$name}">
                    <div class="title"><span>{$label}</span></div>
                    <img src="{$menu_intro_image['sizes']['thumbnail-large']}" alt="{$name}">
                </a>
BLOCK;
        } else if ($count > 2) {
            $second_row .= <<<BLOCK

                <a href="{$lang_prefix}{$name}" class="{$name}">
                    <div class="title"><span>{$label}</span></div>
                    <img src="{$menu_intro_image['sizes']['thumbnail-large']}" alt="{$name}">
                </a>
BLOCK;
        }

        $first_row_block = <<<BLOCK

        <div class="product-row">
            <div class="wrap">
                {$first_row}
            </div>
        </div>
BLOCK;

        $second_row_block = <<<BLOCK

        <div class="product-row">
            <div class="wrap">
                {$second_row}
            </div>
        </div>
BLOCK;
        $count++;
    }
}

?>

<header class="banner main" role="banner">
 
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php ICL_LANGUAGE_CODE == 'fr' ? $logo = 'logo-fr.png' : $logo = 'logo.png'; ?>
            <img src="<?php bloginfo('template_directory') ?>/assets/img/<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" />
          </a>
        </div>

        <?php
        require_once(get_template_directory() . '/assets/js/wp_bootstrap_navwalker.php');
        wp_nav_menu( array(
          'menu'              => 'primary-navigation',
          'theme_location'    => 'primary-navigation',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'bs-example-navbar-collapse-1',
          'menu_class'        => 'nav navbar-nav',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
          'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
      </div>
    </nav>

  </div>

</header>
