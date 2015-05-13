<div class="container content narrow">


<section class="intro">

    <?php
        while ( have_posts() ) {

            the_post();
            $title = get_the_title();
            $content = get_the_content();
        }
    ?>

    <h1 class="title"><?php echo $title; ?></h1>
</section>

<section>
    <?php echo $content; ?>
</section>

</div>
