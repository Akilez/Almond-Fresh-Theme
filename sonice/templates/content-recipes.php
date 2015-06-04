<div class="container content">

    <?php include('inc-share.php'); ?>

    <section class="intro">

        <h2 class="title text-primary"><?php _e('Almond Fresh Recipes', 'sonice'); ?></h2>

    </section>

    <section class="recipes">

    <?php

        // nav list

        $categories = get_categories();
        $menu_items = null;
        foreach ($categories as $category) {

            $category_id = $category->term_id;
            $category_name = __($category->name, 'sonice');
            $category = get_the_category( $post->ID );
            if ($category_name != "Uncategorized") {
              $menu_items .= "<li><a href='#' class='{$category_id}'>{$category_name}</a><div class='triangle'></div></li>";
            }
        }

        // Create master list of all recipes

        $args = array(
           'post_type'        => 'recipe',
           'post_status'      => 'publish',
           'suppress_filters' => 0,
           'orderby'          => 'post_date',
           'posts_per_page'     => -1,
            'order'            => 'ASC');

        $posts = get_posts($args);
        $recipe_block = null;

        foreach ( $posts as $post ) {

            if (has_post_thumbnail( $post->ID ) ):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail-large' );
            endif;
            $title = $post->post_title;

            $slug = $post->post_name;
            $id = $post->ID;
            $category_id = '';
            $categories = get_the_category( $post->ID );
            if($categories){
	             foreach($categories as $category) {
                 $category_id .= $category->term_id . ' ';
                 $link = $category->slug . "/" . $slug;
               }
             }


            if (isset($image)) {
              $recipe_block .= <<<BLOCK

                  <li class="item {$category_id}">
                      <a class="wrap" href="/recipes/{$link}">
                          <div class="title"><span>{$title}</span></div>
                            <div class="image" style="background-image: url('{$image[0]}');"></div>
                      </a>
                  </li>
BLOCK;
            } else {
              $recipe_block .= <<<BLOCK

                  <li class="item {$category_id}">
                      <a class="wrap" href="/recipes/{$link}">
                          <div class="title"><span>{$title}</span></div>
                            <div class="image" style="background-image: url('http://placehold.it/632x949');"></div>
                      </a>
                  </li>
BLOCK;
            }
            unset($image);
            }

        ?>

        <ul class="nav">
            <li class="active"><a href="#" class="item"><?php _e('All', 'sonice'); ?></a><div class="triangle"></div></li>
            <?php echo $menu_items; ?>
        </ul>

        <ul class="recipes display">
          <?php echo $recipe_block; ?>
        </ul>

    </section>

</div>
<section class="container">
  <?php include('inc-newsletter.php'); ?>
</section>
