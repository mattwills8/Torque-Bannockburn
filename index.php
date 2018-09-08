<?php
/*
Template Name: Homepage
*/
get_header(); ?>
	
    <main class="homepage page-main">
	    
    	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/homepage-header-overlay.svg' 
	<?php if ( get_field('homepage_header_image') ) { echo '), url(' . get_field('homepage_header_image') ; } ?> ); background-repeat: no-repeat, no-repeat; background-size: cover, cover;"
	class="page-header">

<!--   <header class="page-header"> -->

        <div class="container-fluid"> 
          <div class="page-heading">
            <div class="row">
              <h1 class="heading1 col-sm-7"><?php the_field('homepage_header_headline'); ?></h1>
            </div>
<!--
            <div class="row">
              <h3 class="heading3 col-sm-7">In a new business landscape</h3>
            </div>
-->
            <div class="row">
              <div class="header-text-block col-sm-offset-7 col-sm-5">
                <h3 class="heading3"><?php the_field('homepage_header_subheadline'); ?></h3>
                <div class="bodycopy">
	                <?php the_field('homepage_header_textblock'); ?>
                </div>
                <p><a href="<?php the_field('homepage_header_link'); ?>" class="linktext-dark"><?php the_field('homepage_header_link_text'); ?></a></p>
              </div>
            </div>
          </div>
        </div>
    </header>
      <section class="section section1">
        <div class="container">
          <div class="row">
            <div id="map" class="map">
            </div>
          </div>
        </div>
         
      </section>
<!--
	  	<div class="homepage-stripe" style="position: absolute; z-index: 1; width:100%; left:0; ">
		      <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/homepage-02.svg" width="100%"/>
	      </div>
-->
      <section class="homepage section section2">
	      
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 textblock-1" style="z-index: 10">
              <h2 class="heading2 bluetext"><?php the_field('homepage_textblock_1_headline'); ?></h2>
                <p class="bodycopy darktext"><?php the_field('homepage_textblock_1'); ?></p>
                <p><a class="linktext-light" href="<?php the_field('homepage_textblock_1_link'); ?>" role="button"><?php the_field('homepage_textblock_1_link_text'); ?></a></p>
            </div>
          </div>
        </div>
<!--
      <div class="homepage-stripe" style="position: absolute; z-index: 1; width:100%; left:0; ">
		      <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/homepage-02.svg" width="100%"/>
	      </div>
-->
        <div class="container-fluid" style="overflow:hidden;">
          <div class="row">
            <div class="col-md-offset-6 col-md-6" style="z-index: 10">
              <img src="<?php the_field('homepage_imageblock_1'); ?>" width="100%" alt=""/>
              <br>
              <br>
              <br>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-7 textblock-2 lena-cheat">
              <h2 class="heading2"><?php the_field('homepage_textblock_2_headline'); ?></h2>
              <div class="bodycopy">
	              <?php the_field('homepage_textblock_2'); ?>
              </div>

              <p><a class="linktext-dark" href="<?php the_field('homepage_textblock_2_link'); ?>" role="button"><?php the_field('homepage_textblock_2_link_text'); ?></a></p>
            </div>
          </div>
          <div class="row">
              <div class="spacer400">
	              <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/_N0A5365_66_67_68_69_70_71_fused-resized.jpg" width="100%" alt=""/>
              </div>
          </div>
          <div class="row">
            <div class="col-md-7 textblock-3">
              <div class="bottom-text-block">
	              <h2 class="heading2"><?php the_field('homepage_textblock_3_headline'); ?></h2>
              <div class="bodycopy">
	            	<?php the_field('homepage_textblock_3'); ?>
              </div>
              <p><a class="linktext-dark" href="<?php the_field('homepage_textblock_3_link'); ?>" role="button"><?php the_field('homepage_textblock_3_link_text'); ?></a></p>
              
                
              </div>
            </div>
          </div>
        </div>
      </section>
      
<?php get_footer(); ?>
