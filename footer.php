<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</main> <!-- SITE CONTENT -->
    <footer>
      <section class="section section1"></section>
      <section class="section section2">
        <div class="container-fluid">
          <div class="row">
	          <div class="col-md-3 cl-sm-12 company-info">
							<?php if ( is_active_sidebar( 'footer_column' ) ) : ?>
									<?php dynamic_sidebar( 'Bannockburn-Lakes-Footer-1' ); ?>
							<?php endif; ?>
						</div>
						<div class="contact-info col-md-4 col-md-offset-1 col-sm-6 col-xs-12">	
							<?php if ( is_active_sidebar( 'footer_column' ) ) : ?>
									<?php dynamic_sidebar( 'Bannockburn-Lakes-Footer-2' ); ?>
							<?php endif; ?>
						</div>
						<div class="contact-info col-md-4 col-sm-6 col-xs-12">
							<?php if ( is_active_sidebar( 'footer_column' ) ) : ?>
									<?php dynamic_sidebar( 'Bannockburn-Lakes-Footer-3' ); ?>
							<?php endif; ?>
						</div>
          </div> <!--END ROW-->
        </div>	<!--END CONTAINER-->
      </section>
    </footer>
  

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/bootstrap.js"></script>
    
    <?php if( is_home() || is_front_page()) { ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/google-map.js"></script>  
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnYtPLk_32OQUZMQ7cTDNhTdl-A91_9Bw&callback=initMap">
	    </script>
		<?php } ?>
	
		<?php if(is_page('amenities') || is_page('gallery')){ ?>
		
			<!-- auto-generate carousel indicator html -->
    	
			var bootCarousel = $(".carousel");
			
			bootCarousel.append("<ol class='carousel-indicators'></ol>");
			
			var indicators = $(".carousel-indicators");
			
			bootCarousel.find(".carousel-inner").children(".item").each(function(index) {
				(index === 0) ?
				indicators.append("<li data-target='#MyCarousel' data-slide-to='" + index + "' class='active'></li>") :
				indicators.append("<li data-target='#MyCarousel' data-slide-to='" + index + "'></li>");
			});
			
			<!-- then call carousel -->
			
			$('.carousel').carousel();
		<?php } ?>
    
  </body>
</html>
