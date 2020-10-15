
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
    
          <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <?php get_template_part('content'); ?>

            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              
              <?php get_sidebar(); ?>

            </div>
          </div>
        </div>
      </div>
 
    </section>

<?php get_footer(); ?>
    

    