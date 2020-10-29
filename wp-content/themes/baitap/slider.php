
                <?php 
                    $args = array(
                      'posts_per_page' => -1,
                      'post_type'      => 'slider'
                    );
                    $the_query = new WP_Query( $args );
                  ?>
                  <?php if( $the_query->have_posts() ): ?>
                  <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                
                <div class="item">
                        <?php echo get_the_post_thumbnail( get_the_ID(),'full', array( 'class' =>'item') ); ?>
                      <div class="item-content">  
                        <div class="main-content">
                          <div class="meta-category">
                           <span><?php
                           global $post;
                           $terms = get_the_terms( $post->ID , 'category_slider' );
                              foreach ( $terms as $term ) { 
                              echo $term->name;
                              }
                                ?>
                            </span>
                          </div>
                          <a target="_blank" href="<?php echo get_post_meta( get_the_ID(),'slider', true ); ?>"><h4><?php the_title(); ?></h4></a>

<!--                          <ul class="post-info"-->
<!--                            <li><a href="#">--><?php //echo get_the_date('d - m -Y');?><!--</a></li>-->
<!--                            <li><a href="#">--><?php
//                                    comments_number(
//                                        __('0 comments'),
//                                        __('1 comment'),
//                                        __('% comments'),
//                );
//
//                                    ?><!--</a></li>-->
<!--                          </ul>-->
                        </div>

                      </div>
                  </div>
                  <?php endwhile; ?>
                  <?php endif; ?>
                  <?php wp_reset_query();
                ?>
                
         

