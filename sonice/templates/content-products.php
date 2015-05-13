<?php the_post_thumbnail( 'full', array(	'class' => "img-responsive" ) ); ?>
<div class="container content">

  <section class="products flex">

    <?php $args = array( 'posts_per_page' => -1, 'offset'=> 0, 'post_type' => 'product', 'orderby' => 'menu_order', 'order' => 'ASC', "suppress_filters" => "0" );

    $count = 0;
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post );
      $size = get_field('size', $post->ID);
      if ($size == "1.89 L") :
        $color = get_field('colour');
        $body = get_field('teaser', $post->ID);
        $image = get_field('image_detailed', $post->ID);
        $imgsrc = wp_get_attachment_image_src( $image, 'large'); ?>
        <div class="media flex third">
          <div class="media-left flex half">
            <a href="<?php the_permalink(); ?>">
              <img class="media-object img-responsive" style="width: 100%" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" alt="<?php the_title(); ?>">
            </a>
          </div>
          <div class="media-body flex half col-space-between">
            <div>
              <h4 class="media-heading"><a href="<?php the_permalink(); ?>" style="color: <?php echo $color; ?>;"><?php the_title() ?></a></h4>
              <?php echo $body; ?>
            </div>
            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Learn More</a>
          </div>
        </div>
      <?php endif; ?>
  <?php endforeach;
  wp_reset_postdata();?>

  <?php

  $args = array(
    'post_type'        => 'products',
    'post_status'      => 'publish',
    'suppress_filters' => 0,
    'orderby'          => 'post_date',
    'order'            => 'ASC');

    $posts = get_posts($args);
    $ptblock = null;

    foreach ( $posts  as $single_post ) {

      $title = $single_post->post_title;
      ICL_LANGUAGE_CODE == 'fr' ? $link = '/fr/' : $link = '/';
      $link .= $current_post_type . "/" . $single_post->post_name;
      $image = get_field('image', $single_post->ID);
      $about = get_field('about', $single_post->ID);

      $size = get_field('size', $single_post->ID);

      if ((ICL_LANGUAGE_CODE == 'fr') && ($size == '1.89 L')) {
        $size = '1, 89 L';
      } else if ((ICL_LANGUAGE_CODE == 'fr') && ($size == '1.75 L')) {
        $size = '1, 75 L';
      }

      $color = get_field(get_field('flavour', $single_post->ID), 'options');
      $btn_label = __('Details', 'sonice');

      $ptblock .= <<<BLOCK

                <li class="large">
                    <a class="wrap" href="{$link}">
                        <span class="title" style="color: {$color};">{$title}</span>
                        <span class="size">{$size}</span>
                        <img src="{$image['sizes']['thumbnail-large']}" alt="">
                        <p class="about">{$about}</p>
                    </a>

                    <a href="{$link}" class="btn" style="color: {$color};">{$btn_label}</a>
                </li>
BLOCK;
    }
    ?>

    <ul class="product-listing">
      <?php echo $ptblock; ?>
    </ul>

  </section>
</div>

<?php include('inc-newsletter.php'); ?>
