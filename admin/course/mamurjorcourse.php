<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!function_exists('create_mamurjorcourse_cpt')){

	
function create_mamurjorcourse_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorcourse', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorcourse', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorcourse', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorcourse', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorcourse Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorcourse Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorcourse:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorcourse', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorcourse', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorcourse', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorcourse', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorcourse', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorcourse', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorcourse', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorcourse', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorcourse', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorcourse', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorcourse list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorcourse list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorcourse list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorcourse', 'webserviceallinone' ),
		'description' => __( 'mamurjorcourse', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-page',
		'supports' => array('title', 'editor', 'excerpt'),
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
	register_post_type( 'mamurjorcourse', $args );

}
}
add_action( 'init', 'create_mamurjorcourse_cpt', 0 );



if(!function_exists('mamurjor_coursenumber_custom_box')){
	function mamurjor_coursenumber_custom_box()
{
  
    $screens = array('mamurjorcourse');

    foreach ( $screens as $screen ) {
        add_meta_box(
            'mamurjorlearnid',
            __( 'Add Extra Field', 'webserviceallinone' ),
            'mamurjor_coursenumber_custom_html',
            $screen
        );
    }
    
}
}

add_action('add_meta_boxes', 'mamurjor_coursenumber_custom_box');

if(!function_exists('mamurjor_coursenumber_custom_html')){
	function mamurjor_coursenumber_custom_html($post)
{
    $mamurjorcounrsenumber = get_post_meta($post->ID, '_mamurjorcoursenumber_custom_meta_key', true);
    ?>
    <label for="wporg_field"><?php echo  __('Enter Course Number','webserviceallinone');?></label>
	
	<input type="text" class="form-control" name="_mamurjorcourse" value="<?php echo $mamurjorcounrsenumber; ?>" />
    
    <?php
}
	
}

if(!function_exists('mamurjorcourse_save_postdata')){
	function mamurjorcourse_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorcourse', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorcoursenumber_custom_meta_key',            
			sanitize_text_field($_POST['_mamurjorcourse'])
        );
    }
}
}


add_action('save_post', 'mamurjorcourse_save_postdata');


add_shortcode('course','mamurjor_show_course' );

if(!function_exists('mamurjor_show_course')){
	function mamurjor_show_course( ) {
    
		  
		  ?>
		  
		  <div class="row">
				
				<?php 
						$serial=0;					
						$mamurjorateam = new WP_Query(array('post_type'=>array('mamurjorcourse')));
										if ( $mamurjorateam->have_posts() ) : 
						while ( $mamurjorateam->have_posts() ) : 
						$mamurjorateam->the_post();
							
							ob_start();
							$serial+=1;
						?>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box_icon">
                                <?php 
								global $post;
								$mamurjorcounrsenumber =  get_post_meta($post->ID, '_mamurjorcoursenumber_custom_meta_key', true);
								echo $mamurjorcounrsenumber;
								?>
                            </div>
                            <div class="box_content">
                                <h3><?php the_title()?></h3>
                                <p><?php the_excerpt()?></p>
                                <a id="modal-279823" href="#modal-container-<?php echo $serial; ?>" role="button" class="btn" data-toggle="modal"><?php __('Details','webserviceallinone')?> </a>

                                <div class="modal fade" id="modal-container-<?php echo $serial; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
											<h5 class="modal-title" id="myModalLabel">
														<?php the_title();?>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true"><?php __('x','webserviceallinone')?></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php the_content();?>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <?php __('Close','webserviceallinone')?> 
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
					
					
					<?php endwhile; 
						 wp_reset_postdata();
						 else : ?>
						 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','webserviceallinone' ); ?></p>
						 <?php endif; ?>
						 
                </div>
		  
		 <?php		
		
		return ob_get_clean();
		}
}


?>

