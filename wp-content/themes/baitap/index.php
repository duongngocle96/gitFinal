
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

    RrRRRR
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
<!--       <?php 
      if(paginate_links()!='') {?>
  <div class="quatrang">
    <?php
    global $wp_query;
    $big = 999999999;
    echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'prev_text'    => __('« Mới hơn'),
      'next_text'    => __('Tiếp theo »'),
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages
      ) );
      ?>
  </div>
<?php } ?> -->
    </section>

<?php get_footer(); ?>