
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
              <div class="row">

                <?php 
  $args = array(
    'post_status' => 'publish', // Chỉ lấy những bài viết được publish
    'showposts' =>  3, // số lượng bài viết
  );
?>
<?php $getposts = new WP_query($args); ?>
<?php global $wp_query; $wp_query->in_the_loop = true; ?>
<?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
     <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="<?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="down-content">
                      <span><?php
                           global $post;
                           $terms = get_the_terms( $post->ID , 'category' );
                              foreach ( $terms as $term ) { 
                              echo $term->name;
                              }
                                ?> </span>
                      <a href="post-details.html"><h4><?php the_title(); ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php the_author(); ?></a></li>
                        <li><a href="#"><?php echo get_the_date('d - m -Y');?></a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                        <?php the_content(); ?>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Beauty</a>,</li>
                              <li><a href="#">Nature</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>



                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div>
              </div>
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