<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Register Custom Post Type mamurjorteam

if(!function_exists('create_mamurjorteam_cpt')){
function create_mamurjorteam_cpt() {

	$labels = array(
		'name' => _x( 'mamurjorteam', 'Post Type General Name', 'webserviceallinone' ),
		'singular_name' => _x( 'mamurjorteam', 'Post Type Singular Name', 'webserviceallinone' ),
		'menu_name' => _x( 'mamurjorteam', 'Admin Menu text', 'webserviceallinone' ),
		'name_admin_bar' => _x( 'mamurjorteam', 'Add New on Toolbar', 'webserviceallinone' ),
		'archives' => __( 'mamurjorteam Archives', 'webserviceallinone' ),
		'attributes' => __( 'mamurjorteam ', 'webserviceallinone' ),
		'parent_item_colon' => __( 'Parent mamurjorteam:', 'webserviceallinone' ),
		'all_items' => __( 'All mamurjorteam', 'webserviceallinone' ),
		'add_new_item' => __( 'Add New mamurjorteam', 'webserviceallinone' ),
		'add_new' => __( 'Add New', 'webserviceallinone' ),
		'new_item' => __( 'New mamurjorteam', 'webserviceallinone' ),
		'edit_item' => __( 'Edit mamurjorteam', 'webserviceallinone' ),
		'update_item' => __( 'Update mamurjorteam', 'webserviceallinone' ),
		'view_item' => __( 'View mamurjorteam', 'webserviceallinone' ),
		'view_items' => __( 'View mamurjorteam', 'webserviceallinone' ),
		'search_items' => __( 'Search mamurjorteam', 'webserviceallinone' ),
		'not_found' => __( 'Not found', 'webserviceallinone' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'webserviceallinone' ),
		'featured_image' => __( 'Featured Image', 'webserviceallinone' ),
		'set_featured_image' => __( 'Set featured image', 'webserviceallinone' ),
		'remove_featured_image' => __( 'Remove featured image', 'webserviceallinone' ),
		'use_featured_image' => __( 'Use as featured image', 'webserviceallinone' ),
		'insert_into_item' => __( 'Insert into mamurjorteam', 'webserviceallinone' ),
		'uploaded_to_this_item' => __( 'Uploaded to this mamurjorteam', 'webserviceallinone' ),
		'items_list' => __( 'mamurjorteam list', 'webserviceallinone' ),
		'items_list_navigation' => __( 'mamurjorteam list navigation', 'webserviceallinone' ),
		'filter_items_list' => __( 'Filter mamurjorteam list', 'webserviceallinone' ),
	);
	$args = array(
		'label' => __( 'mamurjorteam', 'webserviceallinone' ),
		'description' => __( 'mamurjorteam', 'webserviceallinone' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'thumbnail'),
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
	register_post_type( 'mamurjorteam', $args );

}
}
add_action( 'init', 'create_mamurjorteam_cpt', 0 );


if(!function_exists('mamurjor_team_custom_box')){
	function mamurjor_team_custom_box()
{
  
    $screens = array('mamurjorteam');

    foreach ( $screens as $screen ) {
        add_meta_box(
            'mamurjorteamid',
            __( 'Add Extra Field', 'webserviceallinone' ),
            'mamurjor_team_custom_html',
            $screen
        );
    }
    
}
}

add_action('add_meta_boxes', 'mamurjor_team_custom_box');

	if(!function_exists('mamurjor_team_custom_html')){
		function mamurjor_team_custom_html($post)
	{
		$mamurjorteamdesig = get_post_meta($post->ID, '_mamurjorteam_custom_meta_key', true);
		$mamurjorteamsociallink = get_post_meta($post->ID, '_mamurjorsociallink_custom_meta_key', true);
		$mamurjorteamsocialtextshow = get_post_meta($post->ID, '_mamurjorsociallinktext_custom_meta_key', true);
    ?>
	<div class="form-group">
    <label for="wporg_field"><?php echo  __('Enter Designation','webserviceallinone');?></label>
	
	<input type="text" class="form-control" name="_mamurjorteam_desiganation" value="<?php echo $mamurjorteamdesig; ?>" />
    </div>
	<div class="form-group">
	<div id="mamurjor_social_fi">
	 <?php

if(is_array($mamurjorteamsociallink)){

   for($i=0; $i<count($mamurjorteamsociallink); $i++){?> 
	<label for="wporg_field"><?php echo  __('Enter Enter Social Info','webserviceallinone');?></label>
	<input type="text" class="form-control" name="_mamurjorteam_socallink[]" value="<?php echo $mamurjorteamsociallink[$i]; ?>" />
	<input type="text" class="form-control" name="_mamurjorteam_socaltext[]" value="<?php echo $mamurjorteamsocialtextshow[$i]; ?>" />
    
	<?php 
   }
   }
   else{
	   ?>
	   <label for="wporg_field"><?php echo  __('Enter Enter Social Info','webserviceallinone');?></label>
	<input type="text" placeholder="social Link Here "  class="form-control" name="_mamurjorteam_socallink[]" value="" />
	<input type="text" placeholder="social Icon Class Here " class="form-control" name="_mamurjorteam_socaltext[]" value="" />
    
	   <?php 
   }
	   ?>
	
	</div>
	<div class="form-group">
	<div class="input-group-btn">
	<button class="btn btn-success" type="button"  onclick="mamurjor_social_fields();"> <span class="dashicons dashicons-plus" aria-hidden="true"></span> </button>
	</div>
	</div>
	</div>
	
	<script>
	

	var room = 1;
function mamurjor_social_fields() {

    room++;
    var objTodd = document.getElementById('mamurjor_social_fi')
    var divtestdd = document.createElement("div");
	divtestdd.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtestdd.innerHTML = '<input type="text" placeholder="social Link Here " class="form-control" name="_mamurjorteam_socallink[]" value="" /> <input type="text" placeholder="social Icon Class Here " class="form-control" name="_mamurjorteam_socaltext[]" value="" /> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_mamurjorteam_fields('+ room +');"> <span class="dashicons dashicons-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
    
    objTodd.appendChild(divtestdd)
}
function remove_mamurjorteam_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>
    <?php
	}
		
	}

	
if(!function_exists('mamurjorsocial_save_postdata')){
	function mamurjorsocial_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorteam_desiganation', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorsociallink_custom_meta_key',           
			sanitize_text_field($_POST['_mamurjorteam_socallink'])
        );
    }
}
}


add_action('save_post', 'mamurjorsocial_save_postdata');


if(!function_exists('mamurjorsocialtext_save_postdata')){
	function mamurjorsocialtext_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorteam_socaltext', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorsociallinktext_custom_meta_key',           
			sanitize_text_field($_POST['_mamurjorteam_socaltext'])
        );
    }
}
}


add_action('save_post', 'mamurjorsocialtext_save_postdata');	
	
	
	
if(!function_exists('mamurjorteam_save_postdata')){
	function mamurjorteam_save_postdata($post_id)
{
    if (array_key_exists('_mamurjorteam_desiganation', $_POST)) {
        update_post_meta(
            $post_id,
            '_mamurjorteam_custom_meta_key',           
			sanitize_text_field($_POST['_mamurjorteam_desiganation'])
        );
    }
}
}


add_action('save_post', 'mamurjorteam_save_postdata');


add_shortcode('team','mamurjor_team_package' );

if(!function_exists('mamurjor_team_package')){
	function mamurjor_team_package( ) {
		ob_start();
		global $post;
						echo '<div class="row">';
					
					
											
						$mamurjorateam = new WP_Query(array('post_type'=>array('mamurjorteam')));
					$thumb_mamurjor_team = get_post_thumbnail_id();
					$thumb_mamurjor_team_url = wp_get_attachment_image_src($thumb_mamurjor_team,'thumbnail-size', true);

						if ( $mamurjorateam->have_posts() ) : 
						while ( $mamurjorateam->have_posts() ) : 
						$mamurjorateam->the_post();
						if ( has_post_thumbnail() ) {
							   $large_team_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
													
							}


						?>
						
                        <div class="col-md-4">
                            <div class="team_member">
                                <img src="<?php echo large_team_url[0];?>" alt="">
                                <h3><?php the_title(); ?></h3>
                                <p>
								<?php
								
								$mamurjorteamdesig = get_post_meta($post->ID, '_mamurjorteam_custom_meta_key', true);
								echo $mamurjorteamdesig;
								?>
								
								
								</p>
                                <p>
								
								<?php $mamurjorteamsociallink = get_post_meta($post->ID, '_mamurjorsociallink_custom_meta_key', true);
								 $mamurjorteamsocialtextshow = get_post_meta($post->ID, '_mamurjorsociallinktext_custom_meta_key', true);
								if(is_array($mamurjorteamsociallink)){

								for($i=0; $i<count($mamurjorteamsociallink); $i++){?> 
								
                                    <a href="<?php echo $mamurjorteamsociallink[$i]; ?>" target="_blank"><i class="<?php echo $mamurjorteamsocialtextshow[$i]; ?>"></i></a>
                                   <?php 
							   }
							   }
							?>   
																
									</p>
                            </div>
                        </div>
						
						<?php endwhile; 
						 wp_reset_postdata();
						 else : ?>
						 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.','webserviceallinone' ); ?></p>
						 <?php endif; 
						
                    echo '</div>';
		
			return ob_get_clean();	
}}







?>