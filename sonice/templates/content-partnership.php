<div class="container content">

<?php include('inc-share.php'); ?>

    <section class="intro">

        <?php
            while ( have_posts() ) {

                the_post();
                $title = get_the_title();
                $content = get_the_content();
            }
        ?>

        <h1 class="title"><?php echo $title; ?></h1>
        <p><?php echo $content; ?></p>
    </section>

    <section class="content">
        <?php

        $content_block = null;
        if( have_rows('checkerboard_blocks') ):

            while ( have_rows('checkerboard_blocks') ) : the_row();

                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $image = get_sub_field('image');

                $content_block .= <<<BLOCK

                <li>
                    <div class="media">
                        <div class="pull-left" style="background-image: url('{$image['sizes']['medium-large']}');"></div>
                        <div class="media-body">
                            <div>
                                <h2 class="title">{$title}</h2>
                                <p>{$text}</p>
                            </div>
                        </div>
                    </div>
                </li>
BLOCK;

            endwhile;

        else :

            echo "no rows";

        endif;

        ?>

        <ul class="">
            <?php echo $content_block; ?>
        </ul>
    </section>



</div>

<?php include('inc-newsletter.php'); ?>
