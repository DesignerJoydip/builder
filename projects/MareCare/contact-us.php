<?php
/*
Template name: Contact Page
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

			<div class="col-md-6">

			<style type="text/css">
				.imgBox{ width:100%; height:462px; border-radius:5px; -webkit-border-radius:5px; background:gray; overflow:hidden; margin-bottom:20px; }
				.imgBox img{ width:100%; height:100%; object-fit:cover; }
			</style>
			<div class="imgBox">
			<img src="http://www.marecare.com.au/wp-content/uploads/2018/09/AdobeStock_92571418.jpg" alt="" border="0" style="width:100%;">
			</div>
				<!--<div class="serviceBlock allNone">
					<h4>Reach Us</h4>
					<p><b>Phone:</b> 1234 567 890<br><b>Fax:</b> 07 3846 1107<br><b>Email:</b> <a href="mailto:demo@marecare.com.au">demo@marecare.com.au</a></p>
				</div>

				<div class="serviceBlock allNone">
					<h4>Corporate Office Street Address:</h4>
					<p>Demo address goes here</p>
				</div>

				<div class="serviceBlock allNone">
					<h4>Find Us:</h4>
					<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230466.0018629836!2d-74.17835521563703!3d40.627058595236164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259acf60d7755%3A0x8115fe5095da84c9!2sTime+Square+Studio!5e0!3m2!1sen!2sin!4v1535390035867" height="250" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>-->


			</div>


			<div class="col-md-6">	
			<?php the_content(); ?>
			</div>


		</div>
	</div>
</div>

<?php
endwhile; // End of the loop.
?>
<?php get_footer(); ?>