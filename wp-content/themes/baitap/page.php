
  <?php get_header(); ?>


      <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
               <div class="text-content">
                <h4><?php the_title(); ?></h4>
                <h2><?php echo get_post_meta( get_the_ID(),'the_excerpt_page', true ); ?></h2>
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Banner Ends Here -->

      <section class="about-us">
        <div class="container"> 
             <div class="row">
              <div class="col-lg-12">
                <div class="all-blog-posts">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                      <div class="entry-content">
                    <?php baitap_entry_content(); ?>
                    <?php ( is_single() ? baitap_entry_tag() : '' ); ?>
                      </div>
                  </article>

        <?php    if ( is_page() ) : ?>

            <div class="row">
                <div class="col-lg-12">
                    <ul  class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
    <?php endif ;?>
              </div>
            </div>
          </div>
        </div>
      </section>

  <?php get_footer(); ?>