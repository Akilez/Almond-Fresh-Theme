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

        <h1 class="title">
            <?php
                if (get_field('title_image')) {
                    $image = get_field('title_image');
                    echo "<img src=" . $image['sizes']['thumbnail-large'] . ">";

                }
                echo $title;
            ?>
        </h1>
        <p><?php echo $content; ?></p>
    </section>

    <?php

        if (get_field('video')) {
            $video_url = get_field('video');

            $embed = <<<BLOCK
            <section class="video"><div class="embed-container"><iframe src="http://player.vimeo.com/video/{$video_url}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></section>
BLOCK;
            echo $embed;
        }

    ?>

    <section class="content">
        <?php

        $content_block = null;
        // check if the repeater field has rows of data
        if( have_rows('checkerboard_blocks') ):

            // loop through the rows of data
            while ( have_rows('checkerboard_blocks') ) : the_row();

                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $image = get_sub_field('image');

                // CSS hook for images that need individual sizing like evergreen logo.
                $name = get_sub_field('name');

                $content_block .= <<<BLOCK

                <li class="{$name}">
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
