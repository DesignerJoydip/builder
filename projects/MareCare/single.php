<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<!-- banner and menu area part open-->
<div class="banner_area_with_menu">

<div class="inner_banner"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/inner_banner.png" alt="" title="" border="0"></div>

</div> 
<!-- banner and menu area part closed-->

<!-- body content area open -->
<div class="body_content_area">


<!-- welcome text area open -->
<div class="welcome_txt_area">
<div class="wrapper">
<div class="welcome_inner_area">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				the_title();
				the_content();
				
			endwhile; // End of the loop.
			?>


</div>
</div>
</div>
<!-- welcome text area closed -->


</div>			
<?php get_footer();
