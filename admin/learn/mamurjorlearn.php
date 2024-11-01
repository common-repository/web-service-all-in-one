<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Register Custom Post Type mamurjorlearn

if(!function_exists('create_mamurjorlearn_cpt')){
function create_mamurjorlearn_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorlearn', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorlearn', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorlearn', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorlearn', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorlearn Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorlearn Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorlearn:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorlearn', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorlearn', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorlearn', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorlearn', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorlearn', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorlearn', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorlearn', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorlearn', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorlearn', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorlearn', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorlearn list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorlearn list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorlearn list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorlearn', 'webserviceallinone' ),
		'description' => __( 'mamurjorlearn', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book',
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
	register_post_type( 'mamurjorlearn', $args );

}
}
add_action( 'init', 'create_mamurjorlearn_cpt', 0 );






if(!function_exists('mamurjor_learn_custom_box')){
	function mamurjor_learn_custom_box()
{
  
    $screens = array('mamurjorlearn');

    foreach ( $screens as $screen ) {
        add_meta_box(
            'mamurjorlearnid',
            __( 'Add Extra Field', 'webserviceallinone'),
            'mamurjor_learn_custom_html',
            $screen
        );
    }
    
}
}

add_action('add_meta_boxes', 'mamurjor_learn_custom_box');

if(!function_exists('mamurjor_learn_custom_html')){
	function mamurjor_learn_custom_html($post)
{
    $value = get_post_meta($post->ID, '_mamurjorlearn_custom_meta_key', true);
    ?>
    <label for="wporg_field"><?php echo  __('Enter Icon Class','webserviceallinone');?></label>
	
	<input type="text" class="form-control" name="_mamurjorlearn_icon_class" value="<?php echo $value; ?>" />
    
    <?php
}
	
}

if(!function_exists('mamurjorlean_save_postdata')){
	function mamurjorlean_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorlearn_icon_class', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorlearn_custom_meta_key',            
			sanitize_text_field($_POST['_mamurjorlearn_icon_class'])
        );
    }
}
}


add_action('save_post', 'mamurjorlean_save_postdata');




if(!function_exists('mamurjor_learn_custom_box')){
	function mamurjor_learn_custom_box()
{
  
    $screens = array('mamurjorlearn');

    foreach ( $screens as $screen ) {
        add_meta_box(
            'mamurjorlearnid',
            __( 'Add Extra Field', 'mamurjor-it'),
            'mamurjor_learn_custom_html',
            $screen
        );
    }
    
}
}

add_action('add_meta_boxes', 'mamurjor_learn_custom_box');

if(!function_exists('mamurjor_learn_custom_html')){
	function mamurjor_learn_custom_html($post)
{
    $value = get_post_meta($post->ID, '_mamurjorlearn_custom_meta_key', true);
    ?>
    <label for="wporg_field"><?php echo  __('Enter Icon Class','webserviceallinone');?></label>
	
	<input type="text" class="form-control" name="_mamurjorlearn_icon_class" value="<?php echo $value; ?>" />
    
    <?php
}
	
}

if(!function_exists('mamurjorlean_save_postdata')){
	function mamurjorlean_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorlearn_icon_class', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorlearn_custom_meta_key',
            
			sanitize_text_field($_POST['_mamurjorlearn_icon_class'])
        );
    }
}
}


add_action('save_post', 'mamurjorlean_save_postdata');


add_shortcode('learn','mamurjor_show_learn' );

if(!function_exists('mamurjor_show_learn')){
	function mamurjor_show_learn( ) {
		 $mamurjorlearn = new WP_Query(array('post_type'=>array('mamurjorlearn'))); 
					if ( $mamurjorlearn->have_posts() ) :
					while ( $mamurjorlearn->have_posts() ) : 
					$mamurjorlearn->the_post(); 
					ob_start();
					?>
					<div class="col-md-4">
                        <div class="single_rules text-center">
                            <div class="rules_icon">
                                <i class="<?php echo  $mamurjorlearnicon = get_post_meta($post->ID, '_mamurjorlearn_custom_meta_key', true);?>"></i>
                            </div>
                            <div class="rules_text">
                                <h3><?php the_title(); ?></h3>
                                <p>
								<?php the_content(); ?>

							</p>
						   </div>
                        </div>
                    </div>
						 <?php 
								 

								 endwhile; 
			 wp_reset_postdata();
			 else : ?>
			 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','mamurjor-it' ); ?></p>
			 <?php endif; ?>
                    
			  
		  <?php		
		
		return ob_get_clean();
		}
}


?>

