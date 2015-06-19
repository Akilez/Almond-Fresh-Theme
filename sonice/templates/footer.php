<footer class="container main">
  <div class="col-md-2">
    <ul class="social">
      <li class="facebook"><a href="https://www.facebook.com/almondfresh" target="_blank"><i class="icon-facebook"></i></a></li>
      <li class="twitter"><a href="https://twitter.com/almond_fresh" target="_blank"><i class="icon-twitter"></i></a></li>
    </ul>
  </div>
  <div class="col-md-7">
    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

    <ul class="language">

      <?php
      $languages = icl_get_languages('skip_missing=1&orderby=id&order=asc');
      //echo "<pre>" . print_r($languages, true) . "</pre>";
      if(1 < count($languages)){

        foreach($languages as $l){
          if ($l['native_name'] == 'English') {
            $l['url'] = str_replace('/fr/', '/', $l['url']); //fix for the Options page
          }
          $langs[] = '<li><a href="'.$l['url'].'">'.$l['native_name'].'</a></li>';
        }
      } else if (isset($languages['en'])) {
        $langs[] = '<li><a href="'.$languages['en']['url'].'">'.$languages['en']['native_name'].'</a></li>';
        $langs[] = '<li><a href="/fr">French</a></li>';
      } else {
        $langs[] = '<li><a href="/">English</a></li>';
        $langs[] = '<li><a href="'.$languages['fr']['url'].'">'.$languages['fr']['native_name'].'</a></li>';
      }
      echo $langs[0]; echo $langs[1];

      ?>
    </ul>
  </div>
  <div class="col-md-3">
    <ul class="copyright">
      <li><?php _e('&copy; ' . date("Y") . ' Earth’s Own', 'sonice'); ?></li>
    </ul>
  </div>

</footer>

<?php wp_footer(); ?>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "86969311-534f-479a-a99f-55c2598266f5", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
