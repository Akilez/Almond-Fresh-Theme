<?php while (have_posts()) : the_post(); ?>

  <div class="container">

    <article <?php post_class(); ?>>

      <?php
      // get theme colour
      $color = get_field('colour');
      $image = get_field('image_detailed', $post->ID);
      $imgsrc = wp_get_attachment_image_src( $image, 'large');
      ?>
      <div class="media">
        <div class="media-body col-md-8">
          <h4 class="media-heading title" style="color: <?php echo $color; ?>;"><?php the_title(); ?></h4>
          <?php echo the_field('about'); ?>
          <h2 class="ingredients text-primary">Ingredients</h2>
          <p><?php echo the_field('ingredients'); ?></p>
          <!--<p class="additional"><?php echo the_field('additional'); ?></p>-->
          <div class="nutrition row">
            <header>
              <h2 class="title"><?php _e('Nutritional Information', 'sonice'); ?></h2>
              <span class="serving"><?php _e('per 250ml serving (1 cup)', 'sonice'); ?></span>
              <hr>
            </header>
            <div class="table1 col-md-6">

              <table>

                <?php
                $table = get_field('nutrition');

                $rowblock = null;
                $breakdown = null;
                $bold_text = null;
                $bold_underline = null;

                foreach ($table as $row) {

                  if ($row['breakdown']) {
                    $breakdown = "breakdown";
                  } else {
                    $breakdown = null;
                  }

                  if ($row['bold_text']) {
                    $bold_text = "bold_text";
                  } else {
                    $bold_text = null;
                  }

                  if ($row['bold_underline']) {
                    $bold_underline = "bold_underline";
                  } else {
                    $bold_underline = null;
                  }

                  $rowblock .= <<<BLOCK
                  <tr class="{$breakdown}">
                      <td class="key">{$row['key']}</td>
                      <td class="value">{$row['value']}</td>
                  </tr>
BLOCK;
                }
                ?>

                <?php echo $rowblock; ?>
              </table>

            </div>
            <div class="table2 col-md-6">

              <table>

                <?php
                $table = get_field('nutrition_2');

                $rowblock = null;
                $breakdown = null;
                $bold_text = null;
                $bold_underline = null;

                foreach ($table as $row) {

                  if ($row['breakdown']) {
                    $breakdown = "breakdown";
                  } else {
                    $breakdown = null;
                  }

                  if ($row['bold_text']) {
                    $bold_text = "bold_text";
                  } else {
                    $bold_text = null;
                  }

                  if ($row['bold_underline']) {
                    $bold_underline = "bold_underline";
                  } else {
                    $bold_underline = null;
                  }

                  $rowblock .= <<<BLOCK
                  <tr class="{$breakdown} {$bold_text} {$bold_underline}">
                      <td class="key">{$row['key']}</td>
                      <td class="value">{$row['value']}</td>
                  </tr>
BLOCK;
                }
                ?>

                <?php echo $rowblock; ?>
              </table>
            </div>
            <footer>
              <hr />
            </footer>
          </div>
        </div>
        <div class="media-right page-header col-md-4 hidden-xs">
          <a href="<?php the_permalink(); ?>">
            <img class="media-object img-responsive" src="<?php echo $imgsrc[0]; ?>" width="<?php echo $imgsrc[1]; ?>" height="<?php echo $imgsrc[2]; ?>" alt="<?php the_title(); ?>">
          </a>
        </div>
      </div>
    </article>
  </div>
  <section class="container products">
    <?php
    $myposts = get_field('other_sizes');
    if ($myposts) :
      foreach ( $myposts as $post ) : setup_postdata( $post );
        $format = get_field('format', $post->ID);
        $body = get_field('teaser', $post->ID);
        $image = get_field('image', $post->ID);
        $imgsrc = wp_get_attachment_image_src( $image, 'large'); ?>
        <div class="media col-md-4">
          <div class="media-left col-md-6 col-sm-4 col-xs-4">
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
    endif;
  wp_reset_postdata();?>
</section>
<section class="container">
  <?php include('inc-newsletter.php'); ?>
</section>
<?php endwhile; ?>
