<div class="container content">


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

</div>
