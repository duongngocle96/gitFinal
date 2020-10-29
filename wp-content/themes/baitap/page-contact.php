
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
  <section class="contact-us">
      <div class="container">
        <div class="row">
        
          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">
                <div class="col-lg-8">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>Send us a message</h2>
                      <div class="content"><?php echo do_shortcode('[contact-form-7 id="79" title="contact"]'); ?>

                        </div>
                        </div>
                    </div>
                      
                    </div>
                <div class="col-lg-4">
                  <div class="sidebar-item contact-information">
                    <div class="sidebar-heading">
                      <h2>contact information</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <h5><?php sdt(); ?></h5>
                          <span>PHONE NUMBER</span>
                        </li>
                        <li>
                          <h5><?php Email(); ?></h5>
                          <span>EMAIL ADDRESS</span>
                        </li>
                        <li>
                          <h5><?php add(); ?></h5>
                          <span>STREET ADDRESS</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7434026157775!2d108.16356681482986!3d16.078799888875015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218dd690ed039%3A0x21912e9b8a262970!2zTMOqIFbEg24gVGjhu4tuaCwgSMOyYSBNaW5oLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603339542291!5m2!1svi!2s" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
<!--                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.7434026157775!2d108.16356681482986!3d16.078799888875015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218dd690ed039%3A0x21912e9b8a262970!2zTMOqIFbEg24gVGjhu4tuaCwgSMOyYSBNaW5oLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603339542291!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
            </div>
          </div>
          
        </div>
      </div>
    </section>


  <?php get_footer(); ?>