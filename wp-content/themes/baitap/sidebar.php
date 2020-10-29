<div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">

                      <form action="<?php bloginfo('url'); ?>/" method="GET" role="form">
                          <div class="form-group">
                              <input type="hidden" name="post_type" value="post"> <!-- or value = page , product -->
                              <input type="text" name="s" class="searchText" id="" placeholder="search">
                          </div>
                      </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>

                      

                    <div class="content">

                                        <ul>
                                            <?php 
                                              $args = array( 'post_type' => 'post',
                                                        'post_status'=> 'publish',
                                                        'posts_per_page' => 5,
                                                        );
                                              ?>
                                            <?php $getposts = new WP_query( $args);?>
                                            <?php global $wp_query; 
                                            $wp_query->in_the_loop = true; ?>
                                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                                              <li><a href="<?php the_permalink(); ?>">
                                                  <h5><?php the_title(); ?></h5>
                                                  <span><?php echo get_the_date('d - m -Y');?></span>
                                                </a></li>
                                                
                                              
                                            <?php endwhile; wp_reset_postdata(); ?>
                                          </ul>

                     
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>

                         <li><a href="#">
                          <?php  wp_nav_menu( 
                              array( 
                                  'theme_location' => 'header-category', 
                                  'container' => 'false', 
                                  'menu_id' => 'header-category', 
                                  'menu_class' => 'header-category'
                               ) 
                          ); ?>
                            
                          </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><?php 

                            $tags = get_tags();

                            foreach ( $tags as $tag ) 
                           {
                              echo '<a>';

                             //print_r($tag);
                              echo $tag_name=$tag->name;

                             
                          }
                           ;
                         ?>
                         </li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>