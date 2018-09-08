<?php
/*
Template Name: Building Three
*/
get_header(); ?>

<main class="building page-main">
	<header class="page-header">
		<div class="container-fluid">
		  <div class="page-heading">
				<div class="row">
					<h1 class="heading1 col-lg-8">Building Three</h1>
					<h2 class="heading2 col-lg-8"><?php the_field('building_three_header_subheadline'); ?></h2>
				</div>
		  </div>
	  </div>
  </header>
<section class="section section1">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 text-center floorplan">
				<img src="<?php the_field('floor_one_image'); ?>" class="img-responsive" alt=""/>
				<h2 class="heading2 bluetext"><?php the_field('floor_one_title'); ?></h2>
				<h4 class="heading4 bluetext"><?php the_field('floor_one_sf'); ?></h4>
				<td><a  class="btn btn-primary btn-lg" href="<?php the_field('floor_one_pdf'); ?>" target="_blank">Download PDF</a></td>
			</div> 
			<div class="col-sm-4 text-center floorplan">
				<img src="<?php the_field('floor_two_image'); ?>" class="img-responsive" alt=""/>
				<h2 class="heading2 bluetext"><?php the_field('floor_two_title'); ?></h2>
				<h4 class="heading4 bluetext"><?php the_field('floor_two_sf'); ?></h4>
				<td><a  class="btn btn-primary btn-lg" href="<?php the_field('floor_two_pdf'); ?>" target="_blank">Download PDF</a></td>
			</div>
			<div class="col-sm-4 text-center floorplan">
				<img src="<?php the_field('floor_three_image'); ?>" class="img-responsive" alt=""/>
				<h2 class="heading2 bluetext"><?php the_field('floor_three_title'); ?></h2>
				<h4 class="heading4 bluetext"><?php the_field('floor_three_sf'); ?></h4>
				<td><a  class="btn btn-primary btn-lg" href="<?php the_field('floor_three_pdf'); ?>" target="_blank">Download PDF</a></td>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>http://bannockburn.torquelaunchdev.com/leasing/building-three/#