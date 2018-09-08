<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bannockburn Lakes</title>

  <link rel="stylesheet" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/stylesheets/styles.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Torque Digital">
  <meta name="description" content="Bannockburn Lakes">
  <meta name="Bannockburn Lakes" content="all">
  <meta property="og:title" content="Bannockburn Lakes" />
	<meta property="og:type" content="Great views, open floor plans, and upgraded amenities. See what the Bannockburn Lakes workday looks like." />
	<meta property="og:url" content="http://www.bannockburnlakes.com" />
	<meta property="og:image" content="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-180x180.png" />
  
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/imgs/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
  

<script src="https://use.typekit.net/vhn8mcz.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script>
	function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

/* Close */
function closeNav() {
    document.getElementById("myNav").style.height = "0";
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places,geometry&key=AIzaSyDnYtPLk_32OQUZMQ7cTDNhTdl-A91_9Bw"></script>
<script src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/javascripts/gmaps.js"></script>

<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87380833-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- END GOOGLE ANALYTICS -->


  <!--[if lt IE 9]>
  <script src="script/html5shiv.js"></script>
  <![endif]-->
  
<!--[if IE]>



<![endif]-->
  
</head>
  <body>
    <nav class="navbar navbar-default navbar-custom" role="navigation">
        <div class="navbar-header">
			<button class="mobile-button" onclick="openNav()">&#9776;</button>          
			<a class="navbar-brand" href="<?php bloginfo('url')?>" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/logo-BG.svg" width="100%" alt="Bannockburn Lakes"/></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<?php
	        wp_nav_menu( array(
	                'menu'              => 'primary',
	                'depth'             => 2,
	                'container'         => 'div',
	                'menu_class'        => 'nav navbar-nav',
	                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                'walker'            => new wp_bootstrap_navwalker())
	            );
	        ?>
        </div><!--/.nav-collapse -->
    </nav>
    
    <div id="myNav" class="overlay">
      <button class="mobile-button"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></button>
      	<?php
	        wp_nav_menu( array(
	                'menu'              => 'primary',
	                'depth'             => 2,
	                'container'         => 'div',
	                'menu_class'        => 'overlay-content',
	                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	                'walker'            => new wp_bootstrap_navwalker())
	            );
	        ?>
    </div>
    
