<?php
/*
Template Name: Building
*/
get_header(); ?>

<main class="building page-main">
    <header class="page-header">
	    <div class="container-fluid">
		    <div class="page-heading">
				<div class="row">
					<h1 class="heading1 col-lg-8">Building 1</h1>
					<h2 class="heading2 bluetext col-lg-8"></h2>
				</div>
		    </div>
	    </div>
   </header>
<section class="section section1">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-lg-7">
				<div class="row">
					<div class="col-xs-12">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/stackingplan.svg" width="100%"/>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3 col-md-offset-0">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/building-floorplan.png" width="100%"/>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-5">
				<div class="container">
					<table class="table" style="vertical-align: center;">
						<thead>
							<tr>
								<th class="bodycopy greentext">Suite</th>
								<th class="bodycopy greentext">SF</th>
								<th class="bodycopy greentext">Video</th>
								<th class="bodycopy greentext">Floor Plan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/></button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/</button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/</button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/</button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/</button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
							<tr>
								<td class="bodycopy darktext">1000</td>
								<td class="bodycopy darktext">4567</td>
								<td><button class="btn btn-primary btn-lg">Video <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/next.svg" width="10px"/</button></td>
								<td><a  class="linktext-light" href="#">Download</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>