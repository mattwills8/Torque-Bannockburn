<?php
/*
Template Name: About
*/
get_header(); ?>
<main class="about page-main">

	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg' 
	<?php if ( get_field('about_header_image') ) { echo '), url(' . get_field('about_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!--     <header class="page-header"> -->
		
        <div class="container-fluid"> 
          <div class="page-heading">
            <div class="row">
              <h1 class="heading1 col-sm-5"><?php the_field('about_header_headline'); ?></h1>
            </div>
            <div class="row">
              <h3 class="heading3 col-sm-5"><?php the_field('about_header_subheadline'); ?></h3>
            </div>
          </div>
        </div>
    </header>
    
	<section class="section section1">
	<div class="container-fluid">
	  <div class="row">
	      <h2 class="heading2 bluetext"></h2>
	      <div class="col-sm-10 col-sm-offset-1 bodycopy darktext" style="column-count: 2;">
					<?php the_field('about_textblock'); ?>
				</div>
	    </div>
	    <div class="row">
		    <div class="col-sm-4 col-sm-offset-4 text-center">
			    <a class="linktext-light" href="<?php the_field('about_link'); ?>"><?php the_field('about_link_text'); ?></a>
		    </div>
	    </div>
	  </div>
	</div>
	</section>
      
	<section class="section section5">
		<img src="<?php the_field('about_bottom_image'); ?>" width="100%" alt=""/>
	</section>

<!--
	<section class="section section6 bottom-section">
		<div class="container-fluid">
		  <div class="row">
		    <div class="col-sm-offset-2 col-sm-8 text-center">
		
		      <h2 class="heading2 bluetext">Amenities</h2>
		      <ul class="bodycopy darktext">
		        <li>Outdoor patio</li>
		        <li>Renovated tenant lounge w/ cafe</li>
		        <li>Renovated fitness center</li>
		        <li>Conference center</li>
		        <li>Enhanced landscaping</li>
		      </ul>
		      <a class="linktext-light" href="leasing">View available spaces</a>
		    </div>
		  </div>
		</div>
		<div class="background"></div>
	</section>
-->

    
<?php get_footer(); ?>