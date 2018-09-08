<?php
/*
Template Name: Contact
*/
get_header(); ?>

<main class="contact page-main">

	<header style="background: url('http://bannockburn.torquelaunchdev.com/wp-content/themes/bannockburn-child/imgs/internalpage-header-overlay.svg' 
	<?php if ( get_field('contact_header_image') ) { echo '), url(' . get_field('contact_header_image') ; } ?> ); background-repeat: no-repeat; background-size: cover;"
	class="page-header">

<!--   <header class="page-header"> -->
		<div class="container-fluid"> 
		    <div class="page-heading">
					<div class="row">
						<h1 class="heading1 col-xs-8"><?php the_field('contact_header_headline'); ?></h1>
					</div>
					<div class="row">
						<h3 class="heading3 col-xs-6"><?php the_field('contact_header_subheadline'); ?></h3>
					</div>
		    </div>
		</div>    
  </header>
	<section class="section section1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-5">
					<form class="row">
						<?php echo do_shortcode( '[contact-form-7 id="36" title="CONTACT FORM"]' ); ?>
					</form>
				</div>
				<div class=" col-sm-6 col-sm-offset-1">
					<div class="address row">
						<div class="col-xs-12">
						  <p class="bodycopy greentext"><?php the_field('contact_address_headline'); ?></p>
						  <p class="bodycopy darktext"><?php the_field('contact_address_number_and_street'); ?></p>
						  <p class="bodycopy darktext"><?php the_field('contact_address_city_and_state'); ?></p>
						</div>
					</div>
					<div class="contact row">
						<div class="col-xs-12">
							<p class="bodycopy greentext"><?php the_field('leasing_contact_headline'); ?></p>
							<div class="row">
								<div class="contact-info col-md-6">
		              <p class="bodycopy bluetext"><?php the_field('leasing_contact_1_name'); ?></p>
		              <p class="bodycopy darktext"><?php the_field('leasing_contact_1_title'); ?></p>
		              <p class="bodycopy darktext"><?php the_field('leasing_contact_1_company'); ?></p>
		              <p class="bodycopy darktext"><a href="tel:+<?php the_field('leasing_contact_1_landline_link'); ?>"><?php the_field('leasing_contact_1_landline_display'); ?></a></p>
		              <p class="bodycopy darktext"><a href="tel:+<?php the_field('leasing_contact_1_cellphone_link'); ?>"><?php the_field('leasing_contact_1_cellphone_display'); ?></a></p>
		              <p class="bodycopy darktext"><a href="mailto:<?php the_field('leasing_contact_1_email'); ?>"><?php the_field('leasing_contact_1_email'); ?></a></p>
	      				</div>
								<div class="contact-info col-md-6">
		              <p class="bodycopy bluetext"><?php the_field('leasing_contact_2_name'); ?></p>
		              <p class="bodycopy darktext"><?php the_field('leasing_contact_2_title'); ?></p>
		              <p class="bodycopy darktext"><?php the_field('leasing_contact_2_company'); ?></p>
		              <p class="bodycopy darktext"><a href="tel:+<?php the_field('leasing_contact_2_landline_link'); ?>"><?php the_field('leasing_contact_2_landline_display'); ?></a></p>
		              <p class="bodycopy darktext"><a href="tel:+<?php the_field('leasing_contact_2_cellphone_link'); ?>"><?php the_field('leasing_contact_2_cellphone_display'); ?></a></p>
		              <p class="bodycopy darktext"><a href="mailto:<?php the_field('leasing_contact_2_email'); ?>"><?php the_field('leasing_contact_2_email'); ?></a></p>
	      				</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  
<?php get_footer(); ?>