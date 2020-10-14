
<?php get_header(); ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
        <?php get_template_part('slider'); ?>
      </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <?php get_template_part('banner'); ?>
    <?php get_template_part( 'author-bio' ); ?>
    <?php comments_template(); ?>
<?php get_footer(); ?>