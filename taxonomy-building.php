<?php
/*
Template Name: Building
*/
$term = get_queried_object();

get_header(); ?>

<style type="text/css">

</style>

<main class="building page-main">
    <header class="page-header">
      <div class="container-fluid">
        <div class="page-heading">
        <div class="row">
          <h1 class="heading1 col-lg-8" id="page_title"><?php echo $term->name; ?></h1>
          <h2 class="heading2 col-lg-8" id="page_address"><?php echo $term->description; ?></h2>
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
            <div id="map" class="building-rendering" style="margin: 2rem 4rem 2rem 2rem;">
	            <?php echo file_get_contents(get_stylesheet_directory_uri().'/imgs/stacking-plan-01.svg'); ?>
<!-- 	            <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/stacking-plan-01.svg" class="img-fluid"> -->
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
            
            <?php

            $args = array(
              'order' => 'ASC',
              'orderby' => 'title',
              'post_type' => 'availability',
              'post_status'=>'publish',
              'posts_per_page'=>-1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'building',
                  'field'    => 'slug',
                  'terms'    => $term->slug,
                ),
              ),
            );
            $query = new WP_Query( $args );
            
            if ( $query->have_posts() ) : ?>
              <tbody>
                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); 
	                
	                $term_obj_list = get_the_terms( $post->ID, 'floor' );
									$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
                ?>
                  <tr class="floor-<?php echo $terms_string; ?>">
                    <td class="bodycopy darktext"><?php the_title(); ?></td>
                    <td class="bodycopy darktext"><?php the_field('square_feet'); ?></td>
                    <td>
                      <?php if(get_field('floor_plan_pdf')): ?>
                      <a class="linktext-light" href="<?php the_field('floor_plan_pdf'); ?>" target="_blank">Download</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endwhile; ?>
                <tr class="none d-none">
	                <td class="bodycopy darktext test">No Spaces Available</td>
                </tr>
              </tbody>
            <?php endif; ?>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/javascripts/scripts.js" type="text/javascript" charset="utf-8"></script>
<!--
<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/building.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/interactive-building/helpers/dbconnector.js" type="text/javascript" charset="utf-8"></script>
-->
<?php get_footer(); ?>