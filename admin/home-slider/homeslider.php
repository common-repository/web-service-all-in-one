<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!function_exists('create_homeslider')){
function create_homeslider() {

	$labels = array(
		'name' => _x( 'homeslider', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'homeslider', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'homeslider', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'homeslider', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'homeslider Archives', 'webserviceallinone' ),
		'attributes' => __( 'homeslider Attributes', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent homeslider:', 'webserviceallinone' ),
		'all_items' => __( 'All homeslider', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New homeslider', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New homeslider', 'webserviceallinone' ),
		'edit_item' => __( 'Edit homeslider', 'webserviceallinone' ),
		'update_item' => __( 'Update homeslider', 'webserviceallinone' ),
		'view_item' => __( 'View homeslider', 'webserviceallinone' ),
		'view_items' => __( 'View homeslider', 'webserviceallinone' ),
		'search_items' => __( 'Search homeslider', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into homeslider', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this homeslider', 'webserviceallinone' ),
		'items_list' => __( 'homeslider list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'homeslider list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter homeslider list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'homeslider', 'webserviceallinone' ),
		'description' => __( 'homeslider', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-controls-repeat',
		'supports' => array('title', 'excerpt', 'thumbnail'),
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
	register_post_type( 'homeslider', $args );

}
}
add_action( 'init', 'create_homeslider', 0 );


add_shortcode('slider','mamurjor_show_slider' );

if(!function_exists('mamurjor_show_slider')){
	function mamurjor_show_slider( ) {
		ob_start();
		?>
		<div class="row slider_area p-0">

    <div class="col-md-12 p-0">

        <div class="carousel slide" id="carousel-937395">
            <ol class="carousel-indicators">

                <?php
                    $myslidequery = new WP_Query(array('post_type'=>array('homeslider')));
                    $i=0; while($myslidequery->have_posts()): $myslidequery->the_post();
                ?>

                <li data-slide-to="<?php echo $i++; ?>" data-target="#carousel-937395">
                </li>

                <?php endwhile; ?>
                
            </ol>
            <div class="carousel-inner">

                <?php 
                    while($myslidequery->have_posts()): $myslidequery->the_post();
                ?>

                <div class="carousel-item">
                    <img class="d-block w-100" alt="Carousel Bootstrap First" src="<?php the_post_thumbnail_url(); ?>">
                    <div class="carousel-caption">
                         <h2><?php esc_html(the_title()); ?></h2>
                         <p><?php esc_html(the_content()); ?></p>
                    </div>
                </div>

                <?php endwhile; ?>

            </div> <a class="carousel-control-prev" href="#carousel-937395" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-937395" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>
    </div>
</div>
		
		
		  <?php		
		
		return ob_get_clean();
		}
}


?>
	

