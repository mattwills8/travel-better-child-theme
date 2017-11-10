<?php

/**
 *
 * This class defines all custom fields
 *
 * @package    Travel Better
 * @author     Matt Wills <matt_wills8@hotmail.co.uk>
 */
class Travel_Better_Custom_Fields {

	/**
	 * Register Custom Fields
	 */
   public function add_photographer_field_group() {

     if(function_exists("register_field_group"))
     {
      $photographer_terms = function() {

        $terms = get_terms( array(
          'taxonomy' => 'tb-photographer',
          'orderby'    => 'count',
          'hide_empty' => false,
        ) );

        if( ! is_wp_error( $terms ) ) {
          $choices = [
            'none' => 'None',
          ];
          foreach($terms as $term) {
            $choices[$term->term_id] = $term->name;
          }

          return $choices;
        }
        return [];
      };

     	register_field_group(array (
     		'id' => 'acf_article_photographer',
     		'title' => 'Article Photographer',
     		'fields' => array (
     			array (
     				'key' => 'field_5a03961f58a69',
     				'label' => 'Article Photographer',
     				'name' => 'article_photographer',
     				'type' => 'select',
     				'choices' => $photographer_terms(),
     				'default_value' => '',
     				'allow_null' => 1,
     				'multiple' => 0,
     			),
     		),
     		'location' => array (
     			array (
     				array (
     					'param' => 'post_type',
     					'operator' => '==',
     					'value' => 'post',
     					'order_no' => 0,
     					'group_no' => 0,
     				),
     			),
     			array (
     				array (
     					'param' => 'post_type',
     					'operator' => '==',
     					'value' => 'page',
     					'order_no' => 0,
     					'group_no' => 1,
     				),
     			),
     		),
     		'options' => array (
     			'position' => 'side',
     			'layout' => 'default',
     			'hide_on_screen' => array (
     			),
     		),
     		'menu_order' => 1,
     	));
     }



   }

}

?>
