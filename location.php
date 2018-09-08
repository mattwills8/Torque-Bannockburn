<?php
/*
Template Name: Location
*/
get_header(); ?>
<main class="location page-main">

	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg' 
	<?php if ( get_field('location_header_image') ) { echo '), url(' . get_field('location_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!--     <header class="page-header"> -->
        <div class="container-fluid"> 
			<div class="page-heading">
				<div class="row">
					<h1 class="heading1 col-sm-4 col-xs-6"><?php the_field('location_header_headline'); ?></h1>
				</div>
				<div class="row">
					<h3 class="heading3 col-sm-4"><?php the_field('location_header_subheadline'); ?></h3>
				</div>
			</div>
        </div>
    </header>
    
	<section class="section section1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-7">
					<h2 class="heading2 bluetext"><?php the_field('location_textblock_1_headline'); ?></h2>
					<div class="bodycopy darktext">
						<?php the_field('location_textblock_1'); ?>
					</div>
					<h2 class="heading2 bluetext"><?php the_field('location_textblock_2_headline'); ?></h2>
					<div class="bodycopy darktext">
						<?php the_field('location_textblock_2'); ?>
					</div>
				</div>
				<div class=" col-md-offset-1 col-lg-4">
					<img src="<?php the_field('location_imageblock1'); ?>" class="img-responsive" alt=""/>
				</div>
			</div>
		</div>
	</section>
	<section class="section section-map bottom-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-offset-2 col-sm-8">
					<img src="<?php the_field('location_imageblock2'); ?>" class="img-responsive" alt=""/>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>