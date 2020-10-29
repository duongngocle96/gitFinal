
<?php get_header(); ?>


    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Banner Ends Here -->
    <?php get_template_part('banner'); ?>
    
    <section class="blog-posts">
      <div class="container">

        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
             <div class="row">
          
             
              <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>


                <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
                   <?php echo get_the_post_thumbnail( get_the_ID(),'full' ); ?>

                    </div>
                    <div class="down-content">
                      <span><?php
                           global $post;
                           global $wp_query;
                           $terms = get_the_terms( $post->ID , 'category' );
                              foreach ( $terms as $term ) { 
                              echo $term->name;
                              }
                                ?></span>
                      <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php echo get_the_date('d - m -Y');?></a></li>
                        <li><a href="#">12 Comment</a></li>
                      </ul>
                      <?php the_excerpt();?>                    
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php the_tags(); ?></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endwhile; else : ?>
                  <p> Chuyên Mục Chưa Có Post Nào </p>
                  <?php endif; ?>
                  <?php wp_get_pagination($wp_query); ?>
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