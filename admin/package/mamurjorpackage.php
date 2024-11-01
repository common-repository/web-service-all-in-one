<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Register Custom Post Type mamurjorpackage

if(!function_exists('create_mamurjorpackage_cpt')){
function create_mamurjorpackage_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorpackage', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorpackage', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorpackage', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorpackage', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorpackage Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorpackage Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorpackage:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorpackage', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorpackage', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorpackage', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorpackage', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorpackage', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorpackage', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorpackage', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorpackage', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorpackage', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorpackage', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorpackage list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorpackage list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorpackage list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorpackage', 'webserviceallinone' ),
		'description' => __( 'mamurjorpackage', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-menu-alt3',
		'supports' => array('title', 'editor'),
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
	register_post_type( 'mamurjorpackage', $args );

}
}
add_action( 'init', 'create_mamurjorpackage_cpt', 0 );


add_shortcode('package','mamurjor_show_package' );

if(!function_exists('mamurjor_show_package')){
	function mamurjor_show_package( ) {
		
											
						$mamurjoracourse = new WP_Query(array('post_type'=>array('mamurjorpackage')));
										if ( $mamurjoracourse->have_posts() ) : 
						while ( $mamurjoracourse->have_posts() ) : 
						$mamurjoracourse->the_post(); 
						ob_start();
						?>
						
						
                    <div class="col-md-3">
                        <div class="single_service">
                            <div class="service_title">
                                <h2><?php the_title();?></h2>
                            </div>
                            <div class="service_content">
                                <?php the_content();?>
                               
                                    
                                </div>
                                <div class="btn"><a class="pro_buy" href="https://mamu756807.supersite2.srsportal.com/" target="_blank"><?php __('Buy Now','webserviceallinone')?></a></div>
                            </div>
                        </div>
                    
					
					<?php endwhile; 
						 wp_reset_postdata();
						 else : ?>
						 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','webserviceallinone' ); ?></p>
						 <?php endif; ?>
                    
                    
                
		
		
		<?php
		
	return ob_get_clean();	
}}

?>