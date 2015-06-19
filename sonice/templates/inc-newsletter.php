<?php ICL_LANGUAGE_CODE == 'fr' ? $form_action = '/fr/infolettre/' : $form_action = '/newsletter';?>
<div class="widget newsletter">
    <div class="wrap">
      <h1>Stay Connected on Facebook</h1>
      <?php echo do_shortcode("[recent_facebook_posts number = 3 show_page_link = 0 show_link_previews = 0 excerpt_length = 80]"); ?>
        <!--<h1 class="title"><?php _e('Keep up-to-date', 'sonice'); ?></h1>
        <p><?php _e('Get the latest coupons, new recipes and news delivered right to your inbox', 'sonice'); ?></p>

        <form action='<?php echo $form_action; ?>' method="POST" class="form-inline" role="form">

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="<?php _e('Email address goes here', 'sonice'); ?>">
            </div>
            <span style="width:20px; display: inline-block;" class="hidden-xs"></span>
            <button type="submit" class="btn btn-primary"><?php _e('Sign up', 'sonice'); ?></button>
        </form>-->

    </div>
</div>
