<?php 

// ================================= Create Attraction Custom Post Type =================================
// function custom_post_attaraction_init() {
// 	register_post_type('like', array(
// 		'supports' => array('title', 'editor', 'excerpt'),
// 		'public' => true,
// 		'show_ui' => true,
// 		'labels' => array(
// 		  'name' => 'Likes',
// 		  'add_new_item' => 'Add New Like',
// 		  'edit_item' => 'Edit Like',
// 		  'all_items' => 'All Likes',
// 		  'singular_name' => 'Like'
// 		),
// 		'menu_icon' => 'dashicons-heart'
// 	  ));
// }
 
// add_action( 'init', 'custom_post_attaraction_init' );



// ================================= Custom Post Type Taxonomies =================================
// function crunchify_create_the_attaction_taxonomy() {  
//     register_taxonomy(  
//         'tourist',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
//         'attraction',        			//post type name
//         array(  
//             'hierarchical' => true,  
//             'label' => 'Attractions',  	//Display name
//             'query_var' => true,
// 			'has_archive' => true,
// 			'rewrite' => array('slug' => 'attraction')
//         )  
//     );  
// }  
// add_action( 'init', 'crunchify_create_the_attaction_taxonomy');


// function crunchify_create_post_link( $post_link, $id = 0 ){
//     $post = get_post($id);  
//     if ( is_object( $post ) ){
//         $terms = wp_get_object_terms( $post->ID, 'tourist' );
//         if( $terms ){
//             return str_replace( '%tourist%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;  
// }
// add_filter( 'post_type_link', 'crunchify_create_post_link', 1, 3 );



/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
// function add_custom_taxonomies() {
// 	// Add new "Locations" taxonomy to Posts
// 	register_taxonomy('location', 'like', array(
// 	  // Hierarchical taxonomy (like categories)
// 	  'hierarchical' => true,
// 	  // This array of options controls the labels displayed in the WordPress Admin UI
// 	  'labels' => array(
// 		'name' => _x( 'Locations', 'taxonomy general name' ),
// 		'singular_name' => _x( 'Location', 'taxonomy singular name' ),
// 		'search_items' =>  __( 'Search Locations' ),
// 		'all_items' => __( 'All Locations' ),
// 		'parent_item' => __( 'Parent Location' ),
// 		'parent_item_colon' => __( 'Parent Location:' ),
// 		'edit_item' => __( 'Edit Location' ),
// 		'update_item' => __( 'Update Location' ),
// 		'add_new_item' => __( 'Add New Location' ),
// 		'new_item_name' => __( 'New Location Name' ),
// 		'menu_name' => __( 'Locations' ),
// 	  ),
// 	  // Control the slugs used for this taxonomy
// 	  'rewrite' => array(
// 		'slug' => 'locations', // This controls the base slug that will display before each term
// 		'with_front' => false, // Don't display the category base before "/locations/"
// 		'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
// 	  ),
// 	));
//   }
//   add_action( 'init', 'add_custom_taxonomies', 0 );



add_action( 'init', 'add_custom_taxonomy', 0 );
function add_custom_taxonomy() {
    register_taxonomy('advert_tag', 'Adverts', 
        array(
            'hierarchical' => true,
            'labels' => array(
            'name' => _x( 'Advert Tags', 'taxonomy general name' ),
            'singular_name' => _x( 'Advert Tag', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Advert Tags' ),
            'all_items' => __( 'All Advert Tags' ),
            'parent_item' => __( 'Parent Advert Tag' ),
            'parent_item_colon' => __( 'Parent Advert Tag:' ),
            'edit_item' => __( 'Edit Advert Tag' ),
            'update_item' => __( 'Update Advert Tag' ),
            'add_new_item' => __( 'Add New Advert Tag' ),
            'new_item_name' => __( 'New Advert Tag Name' ),
            'menu_name' => __( 'Advert Tags' ),
        ),
        'rewrite' => array(
            'slug' => 'advert-tags',
            'with_front' => false,
            'hierarchical' => true
        ),
    )
	);
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'Adverts',
        array(
            'labels' => array(
                'name' => __( 'Adverts' ),
                'singular_name' => __( 'Advert'),
                'add_new' => __( 'Add New' ),
                'add_new_item' => __( 'Add a New Advert' ),
                'edit' => __( 'Edit' ),
                'edit_item' => __( 'Edit Advert' ),
                'new_item' => __( 'New Advert' ),
                'view' => __( 'View' ),
                'view_item' => __( 'View Advert' ),
                'search_items' => __( 'Search Adverts' ),
                'not_found' => __( 'No Adverts found' ),
                'not_found_in_trash' => __( 'No Adverts found in Trash' ),
            ),
            'supports' => array(
                'title',
                'thumbnail',
				'editor'
            ),
            'has_archive' => true,
            'menu_position' => 10,
            'public' => true,
            'rewrite' => array( 
                'slug' => 'adverts' 
            ),
            'taxonomies' => array('advert_tag')
        )
    );
}

?>