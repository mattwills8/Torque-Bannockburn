<?php
/*
Template Name: Building
*/
get_header(); ?>





<style type="text/css">

</style>

<main class="building page-main">
    <header class="page-header">
	    <div class="container-fluid">
		    <div class="page-heading">
				<div class="row">
					<h1 class="heading1 col-lg-8" id="page_title">Building One</h1>
					<h2 class="heading2 col-lg-8" id="page_address">2333 Waukegan Rd.</h2>
				</div>
		    </div>
	    </div>
   </header>
<section class="section section1">
	
	<div class="container-fluid">
		<h2 class="heading2 bluetext col-lg-8"><?php the_field('building_header_subheadline'); ?></h2>
		<div class="row">
			
			<div class="col-lg-7">
				<div class="row">
					<div class="col-xs-12">
						<div id="map" class="building-rendering">
<img src="imgs/stacking-plan-01.svg">
						</div>
					</div>
				</div>
				<div class="row">

				</div>
			</div>
			<div class="col-lg-5">
				<div class="container">
					<table class="table" style="vertical-align: center;">
						<thead>
							<tr>
								<th class="bodycopy greentext">Suite</th>
								<th class="bodycopy greentext">SF</th>
								<th class="bodycopy greentext">Floor Plan</th>
							</tr>
						</thead>
						<tbody id="amenities_list">
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/raphael-min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/building.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/dbconnector.js" type="text/javascript" charset="utf-8"></script>
<?php get_footer(); ?>