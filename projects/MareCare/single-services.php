
<?php get_header(); ?>
<?php get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
	$service_id=$post->ID;
?>
<div class="innrpgBanner">
	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-1.jpg" alt="" border="0">
	<div class="contarea">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>
					<?php
					$banerHeading=get_post_meta($post->ID, "banner_heading_field", true);
					if($banerHeading==''){
						the_title();
					}else{
						echo $banerHeading;
					}
					?>

					</h3>
					<p><?php
					echo $banner_sub_field=get_post_meta($post->ID, "banner_sub_field", true);
					?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="innerpageArea">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidenavbar">
					<ul>
						<!-- <li class="current"><a href="#">Home Care Packages</a></li>
						<li><a href="#">Home Care Packages</a></li>
						<li><a href="#">Home Care Packages</a></li>
						<li><a href="#">Home Care Packages</a></li>
						<li><a href="#">Home Care Packages</a></li>
						<li><a href="#">Home Care Packages</a></li> -->
						<?php
						$args = array( 'post_type' => 'services', 'posts_per_page' =>-1, 'order'=> 'ASC' );
							$postslist = get_posts( $args );

							foreach ( $postslist as $post ) :
							  setup_postdata( $post ); 
							echo '<li ';
							if($service_id==$post->ID){ echo 'class="current"'; }
							echo '><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';
							endforeach; 
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
			<div class="col-md-9">	
				<?php

				the_content();

				?>
				




			


			</div>
		</div>
	</div>
</div>

<?php
endwhile; // End of the loop.
?>		
<?php get_footer();
