<?php
/*
Template Name: Amenities
*/
get_header(); ?>
<main class="amenities page-main">
	
	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg' 
	<?php if ( get_field('amenities_header_image') ) { echo '), url(' . get_field('amenities_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!--     <header class="page-header"> -->
        <div class="container-fluid"> 
          <div class="page-heading">
            <div class="row">
              <h1 class="heading1 col-sm-6"><?php the_field('amenities_header_headline'); ?></h1>
            </div>
            <div class="row">
              <h3 class="heading3 col-sm-6"><?php the_field('amenities_header_subheadline'); ?></h3>
            </div>
          </div>
        </div>
    </header>
    
	<section class="section section1">
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-sm-5">
		      <h2 class="heading2 bluetext"><?php the_field('amenities_textblock_1_headline'); ?></h2>
		      <div class="bodycopy darktext">
			      <?php the_field('amenities_textblock_1'); ?>
		      </div>
		    </div>
		    <div class=" col-sm-offset-1 col-sm-6">
		      <img src="<?php the_field('amenities_imageblock_1'); ?>" alt="" class="img-responsive"/>
		    </div>
		  </div>
		</div>
	</section>
	
	<div class="section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<img src="<?php the_field('amenities_imageblock_2_left'); ?>" alt="" class="img-responsive">
				</div>
				<div class=" col-sm-6">
					<img src="<?php the_field('amenities_imageblock_2_right'); ?>" alt="" class="img-responsive" >
				</div>
			</div>
		</div>
	</div>
	
	<div class="homepage section section-slider">
		<div id="myCarousel" class="carousel slide">
		    
			<!-- START LOOP TO DYNAMICALLY CREATE CAROUSEL-INDICATORS -->
			<?php if( have_rows('amenities_slider') ): $i = 0; ?>
			  <ol class="carousel-indicators">
			    <?php while ( have_rows('amenities_slider') ): the_row(); ?>
			      <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
			    <?php $i++; endwhile; ?>  
			  </ol>
			<?php endif; ?>
			<!-- END LOOP TO DYNAMICALLY CREATE CAROUSEL-INDICATORS -->
			
			<!-- START LOOP TO ADD ITEMS TO CAROUSEL -->
			<?php if( have_rows('amenities_slider') ): $i = 0; ?>
				<div class="carousel-inner">		
				<?php while( have_rows('amenities_slider') ): the_row(); 
					// vars
					$image = get_sub_field('amenities_slider_image');
					?>	
					<div class="item <?php if($i == 0) echo 'active'; ?>" style="">
						<div class="amenities fill" style="background-image:url('<?php echo $image; ?>'); background-repeat: no-repeat; background-size:cover; background-position: center center;"></div>
<!-- 							<img src="<?php echo $image; ?>"  alt="" width="100%"/> -->
					</div>
				<?php $i++; endwhile; ?>
				</div>	
			<?php endif; ?>
			<!-- END LOOP TO ADD ITEMS TO CAROUSEL -->
			
			
			<!-- CAROUSEL CONTROLS START -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<p class="navlink">BACK</p>
			</a>	
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<p class="navlink">NEXT</p>
			</a>
			<!-- CAROUSEL CONTROLS END -->
		
		</div>
	</div>
	<div class="section section-map bottom-section">
		<div class="container-fluid">
			<div class="map-categories">
				<a id="maps-all" class="category1 button map-toggle-all" onclick="toggleGroup(&#39;all&#39;);">All</a>
				<a id="maps-restaurants" class="category2 button map-toggle-restaurants" onclick="toggleGroup(&#39;restaurants&#39;);">Restaurants</a>
				<a id="maps-health" class="category3 button map-toggle-health" onclick="toggleGroup(&#39;health&#39;);">Health</a>
				<a id="maps-hotels"class="category4 button map-toggle-hotels" onclick="toggleGroup(&#39;hotels&#39;);">Hotels</a>
				<a id="maps-entertainment"class="category5 button map-toggle-entertainment" onclick="toggleGroup(&#39;entertainment&#39;);">Entertainment</a>
			</div>
<!-- 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/location-map.jpg" class="img-responsive"/> -->
			<div id="map-canvas"></div>
		</div>
	</div>


<?php get_footer(); ?>