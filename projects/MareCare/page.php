<?php
/**
Template name: Inner Page
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

<div class="innerpageArea">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

					
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

<?php get_footer(); ?>
