<?php
/*
Template name: Testimonial
*/

?>

<?php get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
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

<div class="innerpageArea contactusArea">
	<div class="container">
		<div class="row">

			<?php
			//the_content();

			$args = array( 'post_type' => 'testimonials', 'posts_per_page' =>-1, 'order'=> 'ASC' );
			$postslist = get_posts( $args );

			foreach ( $postslist as $post ) :
			  setup_postdata( $post ); 
			?>
				<div class="col-md-12" style="margin-bottom:30px;">
					<div class="commntWrap">
	        			<div class="comntCntWrap quote">
	        				<?php the_content(); ?>
	        				<div class="actionArea">
	        					<a class="linktext"><?php the_title(); ?></a>
	        				</div>
	        			</div>
        			</div>
				</div>
			<?php
			  endforeach; 
			wp_reset_postdata();
					?>


		</div>
	</div>
</div>

<?php
endwhile; // End of the loop.
?>
<?php get_footer(); ?>