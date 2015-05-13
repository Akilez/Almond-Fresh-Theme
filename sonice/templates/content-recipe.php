<div class="container content">

    <?php include('inc-shareprint.php'); ?>

    <?php
        $image = null;
        if (has_post_thumbnail( $post->ID ) ):
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;

        $langprefix = null;
        if (ICL_LANGUAGE_CODE == 'fr') { $langprefix = '/fr'; };

    ?>

    <section class="recipe">
        <a href="<?php echo $langprefix ?>/recipes" class="back btn"><?php _e('Back to Recipes', 'sonice'); ?></a>
        <h1 class="title"><?php echo the_title(); ?></h1>
        <div class="print-image"><img src="<?php echo $image[0]; ?>"></div>

        <div class="shopping">
            <h2 class="title"><?php _e('Shopping List', 'sonice'); ?></h2>

            <?php

            $shopping_list_title = null;
            $shopping_block = null;

            // check if the repeater field has rows of data
            if( have_rows('shopping_list') ):

                // loop through the rows of data
                while ( have_rows('shopping_list') ) : the_row();

                    if (get_sub_field('title')) {
                        $shopping_block .= "<span class='list_title'>" . get_sub_field('title') . "</span><ul>";
                    } else {
                        $shopping_block .= "<ul>";
                    }

                    if( have_rows('ingredients') ):

                        // loop through the rows of data
                        while ( have_rows('ingredients') ) : the_row();

                            $ingredient = get_sub_field('ingredient');
                            $shopping_block .= <<<BLOCK

                            <li>
                                <span>{$ingredient}</span>
                            </li>
BLOCK;

                        endwhile;

                    endif;

                    $shopping_block .= "</ul>";

                endwhile;



            endif;

            $instructions_list_title = null;
            $instructions_block = null;

            // check if the repeater field has rows of data
            if( have_rows('instructions_list') ):

                // loop through the rows of data
                while ( have_rows('instructions_list') ) : the_row();

                    if (get_sub_field('title')) {
                        $instructions_block .= "<div class='list_title'>" . get_sub_field('title') . "</div>";
                    }
                    if (get_sub_field('preface')) {
                      $instructions_block .= "<p>" . get_sub_field('preface') . "</p>";
                    }
                    $instructions_block .= "<ol>";

                    if( have_rows('instructions') ):

                        // loop through the rows of data
                        while ( have_rows('instructions') ) : the_row();

                            $ingredient = get_sub_field('instruction');
                            $instructions_block .= <<<BLOCK

                            <li>
                                <span>{$ingredient}</span>
                            </li>
BLOCK;

                        endwhile;

                    endif;

                    $instructions_block .= "</ol>";

                endwhile;



            endif;

            ?>

            <?php echo $shopping_block; ?>

        </div>

        <div class="instructions">
            <h2 class="title"><?php _e('Instructions', 'sonice'); ?></h2>
            <?php echo $instructions_block; ?>
        </div>

        <div class="notes">
            <?php echo get_field('notes'); ?>
        </div>
    </section>

    <?php if (isset($image)) { ?>
      <div class="image" style="background-image: url('<?php echo $image[0] ?>');"></div>
    <?php } else { ?>
      <div class="image" style="background-image: url('http://placehold.it/632x949');"></div>
    <?php } ?>
</div>

<?php include('inc-newsletter.php'); ?>
