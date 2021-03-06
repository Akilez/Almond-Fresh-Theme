<?php
    if (ICL_LANGUAGE_CODE == 'fr') {
        $form_action = '/fr/infolettre/';
        $lang_prefix = '/fr';
    } else {
        $form_action = '/newsletter';
        $lang_prefix = null;
    }

?>

<div class="container hero">

    <section class="hero">

        <div class="hero-overlay"></div>

        <div class="sidebar">
            <a href="<?php echo get_field('feature_1_link'); ?>" class="feature1" style="background-image: url('<?php $image = get_field("feature_1_image", $post->ID); echo $image["url"]; ?>')">
                <p class="title"><?php echo get_field('feature_1_text'); ?></p>
                <span class="btn btn-primary"><?php echo get_field('feature_1_button_label'); ?></span>
            </a>
            <a href="<?php echo get_field('feature_2_link'); ?>" class="feature2" style="background-image: url('<?php $image = get_field("feature_2_image", $post->ID); echo $image["url"]; ?>')">
                <p class="title"><?php echo get_field('feature_2_text'); ?></p>
                <span class="btn btn-primary"><?php echo get_field('feature_2_button_label'); ?></span>
            </a>
        </div>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active one" style="background-image: url('<?php $image = get_field("item_1_background_image", $post->ID); echo $image['sizes']['huge']; ?>')">
                <div class="text">
                   <?php echo get_field('item_1_text'); ?>
                </div>
            </div>
            <div class="item two" style="background-image: url('<?php $image = get_field("item_2_background_image", $post->ID); echo $image['sizes']['large']; ?>')">
                <div class="text">
                   <?php echo get_field('item_2_text'); ?>
                </div>
            </div>
            <div class="item three" style="background-image: url('<?php $image = get_field("item_3_background_image", $post->ID); echo $image['sizes']['huge']; ?>')">
                <div class="text">
                   <?php echo get_field('item_3_text'); ?>
                </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>

    </section>

</div>

<section class="products">
    <?php

$args = array( 'posts_per_page' => 5, 'offset'=> 1, 'post_type' => 'product' );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post );
        $format = get_field('format', $post->ID);
        $body = get_field('about', $post->ID);
        $image = get_field('image', $post->ID);
        $imgsrc = wp_get_attachment_image_src( $image, 'large'); ?>
        <div class="media col-md-4">
          <div class="media-left col-md-6">
            <a href="<?php the_permalink(); ?>">
              <img class="media-object img-responsive" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" alt="<?php the_title(); ?>">
            </a>
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $format; ?></h2>
            <?php echo $body; ?>
          </div>
        </div>
<?php endforeach;
wp_reset_postdata();?>

</section>

<section class="cta">

	<div class="widget healthyliving">
		<div class="wrap">
            <h2 class="title"><?php _e('The Goodness of Almonds', 'sonice'); ?></h2>
            <p><?php _e('nutrient dense whole food', 'sonice'); ?></p>
            <a href="/healthy-lifestyle/" class="btn"><?php _e('Read on', 'sonice'); ?></a>
        </div>
	</div>

    <?php include('inc-newsletter.php'); ?>

</section>
