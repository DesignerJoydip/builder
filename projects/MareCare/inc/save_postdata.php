<?php

// save metabox data
function marecare_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'page_banner_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    
    if( isset( $_POST['banner_heading_field'] ) )
        update_post_meta( $post_id, 'banner_heading_field', wp_kses( $_POST['banner_heading_field'], $allowed ) );
    if( isset( $_POST['banner_sub_field'] ) )	
    	update_post_meta( $post_id, 'banner_sub_field', wp_kses( $_POST['banner_sub_field'], $allowed ) );
    if( isset( $_POST['short_description_field'] ) )	
    	update_post_meta( $post_id, 'short_description_field', wp_kses( $_POST['short_description_field'], $allowed ) );
 
}
add_action( 'save_post', 'marecare_save' );