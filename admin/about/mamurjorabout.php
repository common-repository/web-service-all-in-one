<?php
/*
Plugin Name: mamurjor-itabout
*/
// Register Custom Post Type mamurjor-itabout
// Register Custom Post Type mamurjorabout

if(!function_exists('create_mamurjorabout_cpt')){

function create_mamurjorabout_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorabout', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorabout', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorabout', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorabout', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorabout Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorabout Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorabout:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorabout', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorabout', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorabout', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorabout', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorabout', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorabout', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorabout', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorabout', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorabout', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorabout', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorabout list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorabout list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorabout list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorabout', 'webserviceallinone' ),
		'description' => __( 'mamurjorabout', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => array('editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'mamurjorabout', $args );

}	
}

add_action( 'init', 'create_mamurjorabout_cpt', 0 );


add_shortcode('about','mamurjor_showabout');

if(!function_exists('mamurjor_showabout')){
	function mamurjor_showabout( ) {
    
		  
		  ?>
		  <div class="row">
							
						<?php 
						$argsmamurjorabout = array( 'post_type'  => 'mamurjorabout', 'posts_per_page' => 1 );
					$mamurjorabout = new WP_Query($argsmamurjorabout);
			
						 
						if ( $mamurjorabout->have_posts() ) : 
						while ( $mamurjorabout->have_posts() ) : 
						$mamurjorabout->the_post();
								if ( has_post_thumbnail() ) {
							   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'large');
													
							}						
						ob_start();
						?>

						
                        <div class="col-md-6">

                            <div class="about_single">
                                <img alt="Bootstrap Image Preview" src="<?php echo $large_image_url[0]; ?>">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="about_single">
                                <p> <?php 
								

								the_content(); ?>
							   </p>
                            </div>
							
				<?php endwhile; 
			 wp_reset_postdata();
			 else:

			 ?>
			 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','webserviceallinone' ); ?></p>
			 <?php endif; ?>

                        </div>
                    </div>
		  
		  
		  <?php		
		
		return ob_get_clean();
		}
}


?>