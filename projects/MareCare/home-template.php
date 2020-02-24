<?php
/**
Template name: Home Template Page
 */
?>

<?php get_header(); ?>

<!-- fullwidth banner area open -->
<div class="fullwidthBnnrCntnr">
    <ul class="slider fullwidthSlider">
        <li>
        	<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-1.jpg" alt="" border="0">
        	<div class="bannerContainer">
        		<h3>Dedicated to the expert and personal care of those in need, and regaining the independence of those in who have have thought it lost</h3>
        		<div>It is our core principles of Kindness, Competence and Reliability that ensure our dedication is met with passion and success</div>
        	</div>
        </li>
        <!-- <li><img src="assets/images/banner-2.jpg" alt="" border="0"></li> -->
    </ul>
</div>
<!-- fullwidth banner area closed -->


<!-- quick boxes area open  -->
<div class="hmQuickLinkRow">
	<div class="container">
		<div class="row">
			
			<div class="col-md-4">
			 <?php if ( is_active_sidebar( 'homequiclink-1' ) ) : dynamic_sidebar( 'homequiclink-1' );  endif; ?>
			</div>

			<div class="col-md-4">
			<?php if ( is_active_sidebar( 'homequiclink-2' ) ) : dynamic_sidebar( 'homequiclink-2' );  endif; ?>
			</div>

			<div class="col-md-4">
			<?php if ( is_active_sidebar( 'homequiclink-3' ) ) : dynamic_sidebar( 'homequiclink-3' );  endif; ?>	
			</div>


		</div>
	</div>
</div>
<!-- quick boxes area closed -->


<!-- latest new area open -->
<!--<div class="latestNewsArea">
	<div class="container">
		<div class="row">
		<div class="col-md-12">	
			<h3 class="blockHeading">Latest News</h3>
		</div>
		<div class="latestNewsSlideArea">
			<ul class="slider singleSlider">
		        <li>
		        	<div class="commntWrap">
	        			<div class="usrPic"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-1.jpg"></div>
	        			<div class="comntCntWrap">
	        				<span class="commntTime">September 23, 2017</span>
	        				<h3><a href="#">Mike Tyson</a></h3>
	        				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquam metus at fringilla elementum. Sed condimentum lobortis mi. Nulla pulvinar dui nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis Sed condimentum lobortis mi. Nulla pulvinar dui nec.</p>
	        				<div class="actionArea">
	        					<a href="#" class="btn pull-right btnicon">Read More <i class="fa fa-angle-right"></i></a>
	        				</div>
	        			</div>
	        		</div>
		        </li>
		        <li>
		        	<div class="commntWrap">
	        			<div class="usrPic"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner-1.jpg"></div>
	        			<div class="comntCntWrap">
	        				<span class="commntTime">September 23, 2017</span>
	        				<h3><a href="#">Mike Tyson</a></h3>
	        				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquam metus at fringilla elementum. Sed condimentum lobortis mi. Nulla pulvinar dui nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis Sed condimentum lobortis mi. Nulla pulvinar dui nec.</p>
	        				<div class="actionArea">
	        					<a href="#" class="btn pull-right btnicon">Read More <i class="fa fa-angle-right"></i></a>
	        				</div>
	        			</div>
	        		</div>
		        </li>
		    </ul>
		</div>
		</div>
	</div>
</div>-->
<!-- latest news area closed -->





<!-- customer say area open -->
<div class="customerSayArea">
	<div class="container">
		<div class="row">
		<div class="col-md-12">	
			<h3 class="blockHeading">What Our Customers Say</h3>
		</div>
		<div class="customersaySlideArea">
			<ul class="slider singleSlider">
			<?php
			//the_content();

			$args = array( 'post_type' => 'testimonials', 'posts_per_page' =>-1, 'order'=> 'ASC' );
			$postslist = get_posts( $args );

			foreach ( $postslist as $post ) :
			  setup_postdata( $post ); 
			?>
			<li>
		        	<div class="commntWrap">
	        			<div class="comntCntWrap quote">
	        				<?php the_content(); ?>
	        				<div class="actionArea">
	        					<a href="http://www.marecare.com.au/testimonials/" class="linktext"><?php the_title(); ?></a>
	        				</div>
	        			</div>
	        		</div>
		        </li>
			<?php
			  endforeach; 
			wp_reset_postdata();
					?>
		        <!-- <li>
		        	<div class="commntWrap">
	        			<div class="comntCntWrap quote">
	        				<p>Maryanne proved us to be an absolutely wonderful nurse, carer, friend and adviser. On behalf of my wife and myself, I am able to recommend Maryanne Russell to any person requiring care. There would be very few people in the community who could offer the complete service, warmth and friendship that she gives in her work.</p>
	        				<div class="actionArea">
	        					<a href="#" class="linktext">James C. Bell</a>
	        				</div>
	        			</div>
	        		</div>
		        </li>
		        <li>
		        	<div class="commntWrap">
	        			<div class="comntCntWrap quote">
	        				<p>Can thoroughly recommend Maryanne Russell to anyone who needs adequate and professional care, but also to anyone who has a loved one or someone that they can't care for due to inexperience or to time constraints. I believe Maryanne to be of the highest character, unbelievably good at her job, a rare example of a truly outstanding carer and can also guarantee her to be an even more outstanding mother. Maryanne is sincerely a very rare and qualified carer, nurse and friend to anyone whom needs care.</p>
	        				<div class="actionArea">
	        					<a href="#" class="linktext">Maria Walker</a>
	        				</div>
	        			</div>
	        		</div>
		        </li> -->
		    </ul>
		</div>
		</div>
	</div>
</div>
<!-- customer say area closed -->


<!-- support area open  -->
<div class="supportArea">
	<div class="container">
		<div class="row">
			<div class="col-md-4">	
				<div class="supportBox">
					<h3>Kindness</h3>
					<div class="imgbox">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Kindness.JPG">
					</div>
				</div>	
			</div>
			<div class="col-md-4">	
				<div class="supportBox">
					<h3>Competence</h3>
					<div class="imgbox">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Competence.JPG">
					</div>
				</div>	
			</div>
			<div class="col-md-4">	
				<div class="supportBox">
					<h3>Reliability</h3>
					<div class="imgbox">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/Reliability.JPG">
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- support area closed -->


<?php get_footer(); ?>
