<?php
/*
Template Name: Leasing
*/
get_header(); ?>
	<main class="leasing page-main">

	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg'
	<?php if ( get_field('leasing_header_image') ) { echo '), url(' . get_field('leasing_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!--     <header class="page-header"> -->


        <div class="container-fluid">
			<div class="page-heading">
				<div class="row">
					<h1 class="heading1 col-sm-4"><?php the_field('leasing_header_headline'); ?></h1>
				</div>
				<div class="row">
					<h3 class="heading3 col-sm-4"><?php the_field('leasing_header_subheadline'); ?></h3>
				</div>
			</div>
        </div>
    </header>

	<section class="section section1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-offset-2 col-sm-8 text-center">
					<h2 class="heading2 bluetext"><?php the_field('leasing_textblock_1_headline'); ?></h2>
					<div class="bodycopy darktext heading-ul">
						<?php the_field('leasing_textblock_1'); ?>
					</div>
				</div>
			</div>
			<div class="overflow-container" style="overflow: auto">
				<div class="row text-center leasing-table" style="vertical-align: center;">
					<div class="col-xs-6 col-sm-6 col-md-2 col-md-offset-1">
						<div class="bodycopy greentext text-center">Building One<br><span class="footertext">2333 Waukegan Rd.</span></div>
						<div class="bodycopy darktext"><?php the_field('building_one_available_square_footage'); ?></div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2">
						<div class="bodycopy greentext text-center">Building Two<br><span class="footertext">2345 Waukegan Rd.</span></div>
						<div class="bodycopy darktext"><?php the_field('building_two_available_square_footage'); ?></div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2">
						<div class="bodycopy greentext text-center">Building Three<br><span class="footertext">2355 Waukegan Rd.</span></div>
						<div class="bodycopy darktext"><?php the_field('building_three_available_square_footage'); ?></div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2">
						<div class="bodycopy greentext text-center">Building Four<br><span class="footertext">2201 Waukegan Rd.</span></div>
						<div class="bodycopy darktext"><?php the_field('building_four_available_square_footage'); ?></div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-2">
						<div class="bodycopy greentext text-center">Building Five<br><span class="footertext">2121 Waukegan Rd.</span></div>
						<div class="bodycopy darktext"><?php the_field('building_five_available_square_footage'); ?></div>
					</div>
				</div>

		</div>
	</section>

	<section class="section section5 bottom-section">
		<div class="container-fluid">
			<div class="leasing-guide footertext whitetext">Click on a building below to view available space</div>
			<object data="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/assets/buildings.svg" style="width:100%;"></object>

		</div>
	</section>
<!-- 	<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/stacking-plan-selector.js" type="text/javascript" charset="utf-8"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/svg-typekit.js" type="text/javascript" charset="utf-8"></script>

<?php get_footer(); ?>
