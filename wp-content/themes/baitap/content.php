

              <div class="row">

                <?php 
                  $args = array(
                    'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                    'showposts' =>  2, // số lượng bài viết 
                  );
                ?>
                <?php $getposts = new WP_query($args); ?>
                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                     <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      
                   <?php echo get_the_post_thumbnail( get_the_ID(),'full' ); ?>
                    </div>
                    <div class="down-content">
                      <span><?php
                           global $post;
                           $terms = get_the_terms( $post->ID , 'category' );
                              foreach ( $terms as $term ) { 
                              echo $term->name;
                              }
                                ?> </span>
                      <a href="<?php the_permalink(); ?>"><h4>    
                          <?php the_title(); ?>
                        </h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php the_author(); ?></a></li>
                        <li><a href="#"><?php echo get_the_date('d - m -Y');?></a></li>
                        <li><a href="#"><?php
                                comments_number(
                                    __('0 comments'),
                                    __('1 comment'),
                                    __('% comments'),
                );

                                ?></a></li>
                      </ul>
                      <?php the_excerpt(); ?>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php
                                      $tags = get_tags(array(
                                          'hide_empty' => false
                                      ));

                                      echo $tags->name ;

                                      ?></a></li>
                             
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
                    <a href="http://localhost:8080/wordpress1/blog/">View All Posts</a>
                  </div>
                </div>
              </div>


