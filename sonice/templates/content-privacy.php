<div class="container content">
    <?php while (have_posts()) : the_post(); ?>

    <section class="intro">
        <h1 class="title"><?php echo the_title(); ?></h1>
        <p><?php echo get_field('intro'); ?></p>
    </section>

    <section class="privacy">
        <div class="col1">
            <?php echo get_field('column_1'); ?>
        </div>
        <div class="col1">
            <?php echo get_field('column_2'); ?>
        </div>
    </section>
    <?php endwhile; ?>
</div>
