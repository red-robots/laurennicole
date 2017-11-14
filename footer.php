<?php
/**
 * The template for displaying the footer
 *s
 */
?>
	</div><!-- #main -->


<footer id="colophon" role="contentinfo">

  <div class="wrapper">
    <div class="footer-left">


      <div class="signup">
        <h3>Get the latest Design News</h3>

        <div class="ctct-embed-signup">
        
          <span id="success_message" style="display:none;">
            <div style="text-align:center;">Thanks for signing up!</div>
          </span>
        <form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">

        <!-- The following code must be included to ensure your sign-up form works properly. -->
        <input data-id="ca:input" type="hidden" name="ca" value="066a0ae0-0ab1-4f3f-acca-26017fba3146">
        <input data-id="list:input" type="hidden" name="list" value="1">
        <input data-id="source:input" type="hidden" name="source" value="EFD">
        <input data-id="required:input" type="hidden" name="required" value="list,email">
        <input data-id="url:input" type="hidden" name="url" value="">
        <input data-id="Email Address:input" type="text" name="email" value="enter your email..." maxlength="80" class="footer-input">
        <button type="submit" class="Button ctct-button Button--block Button-secondary" data-enabled="enabled">submit</button>
        </form>
        </div>

        <script type='text/javascript'>
          var localizedErrMap = {};
          localizedErrMap['required'] =    'This field is required.';
          localizedErrMap['ca'] =      'An unexpected error occurred while attempting to send email.';
          localizedErrMap['email'] =       'Please enter your email address in name@email.com format.';
          localizedErrMap['birthday'] =    'Please enter birthday in MM/DD format.';
          localizedErrMap['anniversary'] =   'Please enter anniversary in MM/DD/YYYY format.';
          localizedErrMap['custom_date'] =   'Please enter this date in MM/DD/YYYY format.';
          localizedErrMap['list'] =      'Please select at least one email list.';
          localizedErrMap['generic'] =     'This field is invalid.';
          localizedErrMap['shared'] =    'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
          localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
          localizedErrMap['state_province'] = 'Select a state/province';
          localizedErrMap['selectcountry'] =   'Select a country';
          var postURL = 'https://visitor2.constantcontact.com/api/signup';
        </script>
        <script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>

        <p>Sign up for our newsletter to receive the latest news from Lauren Nicole Designs.</p>

      </div><!--End CTCT Sign-Up Form-->

      <div class="footer-bestof">
        <?php if( have_rows('awards', 'option') ): ?>
          <div class="awards">
            <?php while ( have_rows('awards', 'option') ) : the_row(); 

              // Get Fields
              $year = get_sub_field('year','option');
              $design = get_sub_field('design','option');
              $style = get_sub_field('service','option');
              // size of images
              $size = 'thumbnail';
              $designthumb = $design['sizes'][ $size ];
              $stylethumb = $style['sizes'][ $size ];

            ?>
              <div class="award-desgin">
                <?php if( $design != '') : ?>
                  <img src="<?php echo $designthumb; ?>" />
                <?php endif; ?>
              </div><!-- award-desgin -->

             
            <?php endwhile; ?>
          </div><!-- awards -->
        <?php endif; ?>
        <?php if( have_rows('awards', 'option') ): ?>
          <div class="awards">
            <?php while ( have_rows('awards', 'option') ) : the_row(); 

              // Get Fields
              $year = get_sub_field('year','option');
              $design = get_sub_field('design','option');
              $style = get_sub_field('service','option');
              // size of images
              $size = 'thumbnail';
              $designthumb = $design['sizes'][ $size ];
              $stylethumb = $style['sizes'][ $size ];

            ?>
              

              <div class="award-style">
                <?php if( $style != '') : ?>
                  <img src="<?php echo $stylethumb; ?>" />
                <?php endif; ?>
              </div><!-- award-style -->
            <?php endwhile; ?>
          </div><!-- awards -->
        <?php endif; ?>
      </div><!-- footer bestof -->

  </div><!-- footer left -->

  <div class="footer-right">
    <div class="footer-phone"><?php the_field('phone_number','option'); ?></div>
    <div class="stay-conn">Stay Connected</div>
    <div class="sociallinks"><?php acc_social_links(); ?></div>
    <div class="clear"></div>

      <p>Lauren Nicole Designs | Lauren Nicole Home <br>
        <?php the_field('address','option'); ?>
      </p>
      <br>

      &copy <?php echo date('Y'); ?> Lauren Nicole Designs
  </div><!-- footer right -->


  <div class="footer-bottom">

    <?php wp_nav_menu( array( 
    'theme_location' => 'footer', 
    'container' => 'div',
    'container_class' => 'footernav'
    ) ); ?>

    <div class="creds">
      <?php $sitemap = get_field('sitemap_link','option'); ?>
      <a href="<?php echo $sitemap ?>">sitemap</a> | site by <a target="_blank" href="http://bellaworksweb.com">Bellaworks</a>
    </div><!-- creds -->

  </div><!-- footer bottom -->


  </div><!-- .wrapper -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php the_field('google_analytics','option'); ?>
<!-- liquid Web -->
</body>
</html>