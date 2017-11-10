<?php

/**
 *
 * This class defines all custom taxonomies
 *
 * @package    Travel Better
 * @author     Matt Wills <matt_wills8@hotmail.co.uk>
 */
class Travel_Better_Custom_Tax {


	public function add_custom_tax() {

    $photographer_labels = array(
  		'name'                       => _x( 'Photographers', 'taxonomy general name', 'soledad' ),
  		'singular_name'              => _x( 'Photographer', 'taxonomy singular name', 'soledad' ),
  		'search_items'               => __( 'Search Photographers', 'soledad' ),
  		'popular_items'              => __( 'Popular Photographers', 'soledad' ),
  		'all_items'                  => __( 'All Photographers', 'soledad' ),
  		'parent_item'                => null,
  		'parent_item_colon'          => null,
  		'edit_item'                  => __( 'Edit Photographer', 'soledad' ),
  		'update_item'                => __( 'Update Photographer', 'soledad' ),
  		'add_new_item'               => __( 'Add New Photographer', 'soledad' ),
  		'new_item_name'              => __( 'New Photographer Name', 'soledad' ),
  		'separate_items_with_commas' => __( 'Separate Photographers with commas', 'soledad' ),
  		'add_or_remove_items'        => __( 'Add or remove Photographers', 'soledad' ),
  		'choose_from_most_used'      => __( 'Choose from the most used Photographers', 'soledad' ),
  		'not_found'                  => __( 'No Photographers found.', 'soledad' ),
  		'menu_name'                  => __( 'Photographers', 'soledad' ),
  	);

    // create photographer taxonomy
  	register_taxonomy(
  		'tb-photographer',
  		[
        'post',
        'page',
      ],
      array(
    		'hierarchical'          => false,
    		'labels'                => $photographer_labels,
    		'show_ui'               => true,
    		'show_admin_column'     => true,
    		'update_count_callback' => '_update_post_term_count',
    		'query_var'             => true,
				'has_archive'						=> true,
    		'rewrite'               => array( 'slug' => 'photographer' ),
    	)
  	);

  }
}

?>
