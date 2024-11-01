<?php

if(!function_exists('create_mamurjorfeedback_cpt')){
function create_mamurjorfeedback_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorfeedback', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorfeedback', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorfeedback', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorfeedback', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorfeedback Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorfeedback Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorfeedback:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorfeedback', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorfeedback', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorfeedback', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorfeedback', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorfeedback', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorfeedback', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorfeedback', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorfeedback', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorfeedback', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorfeedback', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorfeedback list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorfeedback list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorfeedback list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorfeedback', 'webserviceallinone' ),
		'description' => __( 'mamurjorfeedback', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-feedback',
		'supports' => array('title', 'editor', 'thumbnail'),
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
	register_post_type( 'mamurjorfeedback', $args );

}
}
add_action( 'init', 'create_mamurjorfeedback_cpt', 0 );



if(!function_exists('mamurjor_coursmamurjorfeedback_custom_box')){
	function mamurjor_coursmamurjorfeedback_custom_box()
{
  
    $screens = array('mamurjorfeedback');

    foreach ( $screens as $screen ) {
        add_meta_box(
            'mamurjorfeedback',
            __( 'Add Extra Field', 'webserviceallinone' ),
            'mamurjor_coursefeedback_custom_html',
            $screen
        );
    }
    
}
}

add_action('add_meta_boxes', 'mamurjor_coursmamurjorfeedback_custom_box');

if(!function_exists('mamurjor_coursefeedback_custom_html')){
	function mamurjor_coursefeedback_custom_html($post)
{
    $mamurjorcounrsenumber = get_post_meta($post->ID, '_mamurjorcoursfeedback_custom_meta_key', true);
    ?>
    <label for="wporg_field"><?php echo  __('Enter Job Title','webserviceallinone');?></label>
	
	<input type="text" class="form-control" name="_mamurjordesignation" value="<?php echo $mamurjorcounrsenumber; ?>" />
    
    <?php
}
	
}

if(!function_exists('mamurjorfeedback_save_postdata')){
	function mamurjorfeedback_save_postdata($post_id)
{
    if (array_key_exists('_mamurjordesignation', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorcoursfeedback_custom_meta_key',            
			sanitize_text_field($_POST['_mamurjordesignation'])
        );
    }
}
}


add_action('save_post', 'mamurjorfeedback_save_postdata');



add_shortcode('feedback','mamurjor_feedback_package' );

if(!function_exists('mamurjor_feedback_package')){
	function mamurjor_feedback_package( ) {
		ob_start();
		?>
		<div class="col-md-12">
                            <div class="owl-carousel test-slides" id="testimonial-carousel">
                              
						
						<?php 
											
						$mamurjorafeeback = new WP_Query(array('post_type'=>array('mamurjorfeedback')));
						
						if ( $mamurjorafeeback->have_posts() ) : 
						while ( $mamurjorafeeback->have_posts() ) : 
						$mamurjorafeeback->the_post();

						if ( has_post_thumbnail() ) {
							   $large_feedback_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'large');
											
							}
						?>
								<div class="item">
									
						
						
						
                                    <div class="single-testimonial">
                                        <div class="image-area">
                                            <img alt="Bootstrap Image Preview" src="<?php echo $large_feedback_url[0]; ?>">
                                        </div>
                                        <div class="text-area">
                                            <h3><p> <?php the_title(); ?></h3>
                                            <p>
											<?php the_content(); ?>
											</p> 
										</div>
                                    </div>
									</div>
										<?php endwhile; 
						 wp_reset_postdata();
						 else : ?>
						 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','webserviceallinone' ); ?></p>
						 <?php endif; ?>
                                
								
							
                            </div>
                        </div>
		<?php
		return ob_get_clean();	
}}

		
?>