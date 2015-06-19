<div class="container content">
  <?php the_post_thumbnail( 'full', array(	'class' => "img-responsive" ) ); ?>

  <!--<section class="products row">-->
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
        <!--<div class="media col-lg-4 col-md-6 col-sm-6">-->
          <div class="media flex third">
            <!--<div class="media-left col-lg-6">-->
            <div class="media-left flex half">
              <a href="<?php the_permalink(); ?>">
                <img class="media-object img-responsive" style="width: 100%" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" alt="<?php the_title(); ?>">
              </a>
            </div>
            <!--<div class="media-body col-lg-6">-->
            <div class="media-body flex half col-space-between">
              <div>
                <h4 class="media-heading"><a href="<?php the_permalink(); ?>" style="color: <?php echo $color; ?>;"><?php the_title() ?></a></h4>
                <?php echo $body; ?>
              </div>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>">Learn More</a>
            </div>
          </div>
          <?php $count++;
          if ($count % 2 == 0) {
            echo '<div class="clearfix visible-md-block visible-sm-block"></div>';
          } else if ($count % 3 == 0) {
            echo '<div class="clearfix visible-lg-block"></div>';
          } ?>
      <?php endif; ?>
  <?php endforeach;
  wp_reset_postdata();?>

  </section>
</div>
<div class="container">
  <?php include('inc-newsletter.php'); ?>
</div>
