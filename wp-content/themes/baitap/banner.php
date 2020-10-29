

                <?php 
                    $args = array(
                      'posts_per_page' => -1,
                      'post_type'      => 'banner'
                    );
                    $the_query = new WP_Query( $args );
                  ?>
                  <?php if( $the_query->have_posts() ): ?>
                  <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span><?php the_title(); ?></span>
                      <h4><?php echo get_post_meta( get_the_ID(),'content_qc', true ); ?></h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="<?php echo get_post_meta( get_the_ID(),'link_qc', true ); ?>">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 




               
                  <?php endwhile; ?>
                  <?php endif; ?>
                  <?php wp_reset_query();
                ?>
         




