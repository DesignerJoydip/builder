<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">	
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php wp_head(); ?>
</head>

<body><!--  class="animsition" -->

<!-- <div class="header">
	<img src="assets/images/logo.png">
</div> -->


<header class="header">
		<div class="hdrTopStrp">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 class="logo">
						<a href="index.html" title="Sunshine Coast Law Association"><?php the_custom_logo(); ?></a>
					</h1>
				</div>
				<div class="col-md-8 text-right">
					<ul class="hdrlink noborder">
						<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Request a callback</span></a></li>
						<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> <span>1300 6754 345</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div><!-- top section closed -->
	<div class="hdrBtmStrp">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'header',
					        'depth'          => 2,
					        'container'      => 'nav', // menu area wrap element
					        'container_class'   => 'cssmenu boxMenu',// menu area wrap class
					        'container_id'      => '', // menu area wrap ID
					        'menu_class'     => '',// menu ul class
					    	'fallback_cb'       => false,
					        )
					    );
					?>

					<!-- cssmenu tag closed -->
				</div>
			</div>
		</div>
	</div><!-- bottom section closed -->
</header><!-- header closed -->


