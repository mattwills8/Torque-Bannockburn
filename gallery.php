<?php
/*
Template Name: Gallery
*/
get_header(); ?>

<main class="gallery page-main">

	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg' 
	<?php if ( get_field('gallery_header_image') ) { echo '), url(' . get_field('gallery_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!-- 	<header class="page-header"> -->
		<div class="container-fluid"> 
          <div class="page-heading">
            <div class="row">
              <h1 class="heading1 col-sm-6"><?php the_field('gallery_header_headline'); ?></h1>
            </div>
            <div class="row">
              <h3 class="heading3 col-sm-6"><?php the_field('gallery_header_subheadline'); ?></h3>
            </div>
          </div>
        </div>
	</header>
	<div class="section section1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-7">
					<div style="background: <?php if ( get_field('gallery_imageblock_1_left') ) { echo 'url(' . get_field('gallery_imageblock_1_left') . ');' ; } ?>; background-repeat: no-repeat; background-size: cover;" class="gallery-img-1 img-responsive" ></div>
				</div>
				<div class=" col-sm-5">
					<div style="background: <?php if ( get_field('gallery_imageblock_1_right') ) { echo 'url(' . get_field('gallery_imageblock_1_right') . ');' ; } ?>; background-repeat: no-repeat; background-size: cover;" class="gallery-img-2 img-responsive" ></div>
				</div>
			</div>
		</div>
	</div>
	<div class="homepage section section-slider">
		<div id="myCarousel" class="carousel slide">
			
			<!-- START LOOP TO DYNAMICALLY CREATE CAROUSEL-INDICATORS -->
			<?php if( have_rows('gallery_slider') ): $i = 0; ?>
			  <ol class="carousel-indicators">
			    <?php while ( have_rows('gallery_slider') ): the_row(); ?>
			      <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
			    <?php $i++; endwhile; ?>  
			  </ol>
			<?php endif; ?>
			<!-- END LOOP TO DYNAMICALLY CREATE CAROUSEL-INDICATORS -->
			
			<!-- START LOOP TO ADD ITEMS TO CAROUSEL -->
			<?php if( have_rows('gallery_slider') ): $i = 0; ?>
				<div class="carousel-inner">		
				<?php while( have_rows('gallery_slider') ): the_row(); 
					// vars
					$image = get_sub_field('gallery_slider_image');
					?>	
					<div class="item <?php if($i == 0) echo 'active'; ?>" style="">
						<div class="gallery fill" style="background-image:url('<?php echo $image; ?>'); background-repeat: no-repeat; background-size:cover; background-position: center center; "></div>

<!-- 							<img src="<?php echo $image; ?>" width="100%" alt=""/> -->
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
	<div class="section section5 bottom-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-5">
					<div style="background: <?php if ( get_field('gallery_imageblock_2_left') ) { echo 'url(' . get_field('gallery_imageblock_2_left') . ');' ; } ?>; background-repeat: no-repeat; background-size: cover;"class="gallery-img-1 img-responsive" ></div>
				</div>
				<div class=" col-sm-7">
					<div style="background: <?php if ( get_field('gallery_imageblock_2_right') ) { echo 'url(' . get_field('gallery_imageblock_2_right') . ');' ; } ?>; background-repeat: no-repeat; background-size: cover;"class="gallery-img-2 img-responsive" ></div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>