<div class="container content">

<?php include('inc-share.php'); ?>

    <section class="intro">

        <?php
            while ( have_posts() ) {

                the_post();
                $title = get_the_title();
                $content = get_the_content();
            }

            $image = get_field("image");
        ?>

        <h1 class="title"><?php echo $title; ?></h1>
        <p><?php echo $content; ?></p>

        <div class="image" style="background-image: url('<?php echo $image['sizes']['large']?>');"></div>

    </section>


    <section>
        <?php

        $reason_block = null;
        // check if the repeater field has rows of data
        if( have_rows('reasons') ):

            // loop through the rows of data
            while ( have_rows('reasons') ) : the_row();

                $title = get_sub_field('title');
                $text = get_sub_field('text');

                $reason_block .= <<<BLOCK

                <li>
                    <header>
                        <h2 class="reason">{$title}</h2>
                    </header>
                    <p>{$text}</p>
                </li>
BLOCK;

            endwhile;

        else :

            echo "no rows";

        endif;

        ?>

        <ul class="reasons">
            <?php echo $reason_block; ?>
        </ul>
    </section>

    <?php

    if( have_rows('fact_box') ):

         // loop through the rows of data
        while ( have_rows('fact_box') ) : the_row();

                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $image = get_sub_field('image');
                $factbox_block = <<<BLOCK

                <section class="factbox">

                    <div class="intro">
                        <h2 class="title">{$title}</h2>
                    </div>


                        <div class="text">
                            {$text}
                        </div>

                        <div class="image-wrap">
                            <div class="image" style="background-image: url('{$image['sizes']['large']}');"></div>
                        </div>


                </section>
BLOCK;

        endwhile;


        echo $factbox_block;
    endif;

    ?>





</div>

<?php include('inc-newsletter.php'); ?>
