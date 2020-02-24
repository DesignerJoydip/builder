<?php
function marecare_post_type() {

    /*==========================================================
    Services post type label
    ===========================================================*/
    $labels = array(
    	'name' => 'Services',
    	'singular_name' => 'Services',
    	'add_new' => 'Add Service',
    	'add_new_item' => 'Add New Services',
    	'edit_item' => 'Edit Service',
    	'view_item' => 'View Service',
    	'search_item' => 'Search Services',
    );
        
    $args = array(
      'public' => true,
      'labels'  => $labels,
      'supports' => array(
      'title',
      'editor',
      'thumbnail',
      ),
      //'taxonomies' => array('category', 'post_tag'),
    );
    register_post_type( 'services', $args ); 


    /*==========================================================
    Testimonials post type label
    ===========================================================*/

    $labels = array(
      'name' => 'Testimonials',
      'singular_name' => 'Testimonials',
      'add_new' => 'Add Testimonial',
      'add_new_item' => 'Add New Testimonial',
      'edit_item' => 'Edit Testimonial',
      'view_item' => 'View Testimonial',
      'search_item' => 'Search Testimonials',
    );
        
    $args = array(
      'public' => true,
      'labels'  => $labels,
      'supports' => array(
      'title',
      'editor',
      'thumbnail',
      ),
      //'taxonomies' => array('category', 'post_tag'),
    );
    register_post_type( 'testimonials', $args ); 







}
add_action( 'init', 'marecare_post_type' );