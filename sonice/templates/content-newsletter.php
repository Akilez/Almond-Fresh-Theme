<?php
    if (ICL_LANGUAGE_CODE == 'fr') {
        $lang_prefix = '/fr';
        $privacy = '/fr/politique-de-confidentialite/';
    } else {
        $lang_prefix = null;
        $privacy = '/privacy-policy/';
    }

?>
<div class="container content">

    <?php

        $email_address = null;
        if ($_POST) {
            $email_address = $_POST['email'];
        }

    ?>

    <?php while (have_posts()) : the_post();

        $title = get_the_title();
        $content = get_the_content();

        endwhile;
    ?>

    <section class="intro">
        <h1 class="title"><?php echo $title; ?></h1>
        <p><?php echo $content; ?></p>
    </section>


    <?php

        $action_url = null;
        $email = null;
        $name = null;

        if (ICL_LANGUAGE_CODE == 'fr') {
            $action_url = "http://rethinkemail.createsend.com/t/j/s/noar/";
            $email = "cm-noar-noar";
            $name = "cm-name";
        } else {
            $action_url = "http://rethinkemail.createsend.com/t/j/s/nltill/";
            $email = "cm-nltill-nltill";
            $name = "cm-name";
        }

    ?>

    <form action="<?php echo $action_url; ?>" method="POST" role="form" data-parsley-validate>

        <div class="form-group">
            <label for="fieldName"><?php _e('First name', 'sonice'); ?><span><?php _e('*Required', 'sonice'); ?></span></label>
            <input type="text" class="form-control" id="fieldName" name="<?php echo $name; ?>" data-parsley-focus="first" required data-parsley-trigger="change" required data-parsley-error-message="<?php _e('Please enter your first name', 'sonice'); ?>">
        </div>

<!--         <div class="form-group">
            <label for=""><?php _e('Last name', 'sonice'); ?></label>
            <input type="text" class="form-control" id="">
        </div> -->

        <div class="form-group">
            <label for="fieldEmail"><?php _e('Email address', 'sonice'); ?><span><?php _e('*Required', 'sonice'); ?></span></label>
            <input type="email" class="form-control" id="fieldEmail" name="<?php echo $email; ?>" value="<?php echo $email_address; ?>" data-parsley-trigger="change" required data-parsley-error-message="<?php _e('Please enter a valid email address', 'sonice'); ?>">
        </div>

        <div class="form-group math">
            <label for="question"><?php _e('5 + 1 =', 'sonice'); ?><span><?php _e('*Required', 'sonice'); ?></span></label>
            <input type="text" class="form-control" id="question" data-parsley-pattern="^[6]$" data-parsley-trigger="change" required data-parsley-error-message="<?php _e('Incorrect answer', 'sonice'); ?>">
        </div>

        <p class="check"><?php _e('Please check the box below to ensure you consent to having So Nice news delivered to your inbox. Note that you can unsubscribe at any time. For more information, read our', 'sonice'); ?> <a href="<?php echo $privacy; ?>"><?php _e('Privacy Policy', 'sonice'); ?></a>.</p>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="" name="checkbox" required data-parsley-error-message="<?php _e('You must consent to the terms of service to continue', 'sonice'); ?>">
                <?php _e('Yes, I Consent', 'sonice'); ?>
            </label>
        </div>
        <button type="submit" class="btn btn-primary dark"><?php _e('Submit', 'sonice'); ?></button>
    </form>

</div>
