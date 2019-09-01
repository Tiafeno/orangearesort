<?php
get_header();
?>
  <div id="page" class="site">
    <?php get_header('home'); ?>
    <div id="content" class="site-content">

      <?php
      while (have_posts()) : the_post();
        the_content();
      endwhile;
      ?>

    </div>
  </div>
<?php
get_footer();