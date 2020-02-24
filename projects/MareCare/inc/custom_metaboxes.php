<?php

/*=================================================================================================
Create Meta Boxes
=================================================================================================*/

function marecare_meta_boxes()
{
    //add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args );
    // $context = normal/side/advanced
    // $priority = high/default/low
    add_meta_box( 'page-banner', 'Page Banner', 'page_banner_callback', array('page','services'), 'side', 'default' );

    add_meta_box( 'services', 'Short Description', 'short_description_callback', array('page','services'), 'normal', 'default' );


}
add_action( 'add_meta_boxes', 'marecare_meta_boxes' );






/*=================================================================================================
Page Banner Callback function
=================================================================================================*/
function page_banner_callback(){

	// $post is already set, and contains an object: the WordPress post
	global $post;
	$values = get_post_custom( $post->ID );

	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'page_banner_nonce', 'meta_box_nonce' );


	$banner_heading_field = isset( $values['banner_heading_field'][0] ) ? $values['banner_heading_field'][0] : '';
	?>
	<p>
	    <label>Banner Heading</label>
	    <input type="text" name="banner_heading_field" value="<?php echo $banner_heading_field; ?>" />
	</p>
	<?php

	$banner_sub_field = isset( $values['banner_sub_field'][0] ) ? $values['banner_sub_field'][0] : '';
	?>
	<p>
	    <label>Banner Paragraph</label>
	   <!--  <input type="text" name="banner_sub_field" value="<?php echo $banner_sub_field; ?>" /> -->
	</p>
	<?php

	// Settings that we'll pass to wp_editor
	  $args = array (
	        'tinymce' => false,
	        'quicktags' => false,
	  );
	  wp_editor( $banner_sub_field, 'banner_sub_field', $args );

}




/*=================================================================================================
Short Description Callback function
=================================================================================================*/

function short_description_callback(){
	// $post is already set, and contains an object: the WordPress post
	global $post;
	$values = get_post_custom( $post->ID );

	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'page_banner_nonce', 'meta_box_nonce' );

	$short_description_field = isset( $values['short_description_field'][0] ) ? $values['short_description_field'][0] : '';

	// Settings that we'll pass to wp_editor
	  $args = array (
	        'tinymce' => false,
	        'quicktags' => false,
	  );
	  wp_editor( $short_description_field, 'short_description_field', $args );

}