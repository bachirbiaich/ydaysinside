<?php
/*
Plugin Name: Team Showcase
Plugin URI: http://themepoints/team-showcase
Description: Lightweight & Responsive Team Showcase Plugin For WordPress.
Version: 1.1
Author: Themepoints
Author URI: http://themepoints.com
License: GPLv2
Text Domain: team-manager-free
Domain Path: /languages
*/




/**********************************************************
 * Exit if accessed directly
 **********************************************************/

if ( ! defined( 'ABSPATH' ) )

	die("Can't load this file directly");



define('TEAM_MANAGER_FREE_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('team_manager_free_plugin_dir', plugin_dir_path( __FILE__ ) );
add_filter('widget_text', 'do_shortcode');

require_once( plugin_dir_path(__FILE__) . 'admin/team-manager-free-post-type.php');
require_once( plugin_dir_path(__FILE__) . 'admin/team-manager-free-meta-boxes.php');

/**********************************************************
 * load plugin textdomain 
 **********************************************************/

function team_manager_free_load_textdomain(){

	load_plugin_textdomain('team-manager-free', false, dirname(plugin_basename( __FILE__ )) . '/languages/');

}
add_action('plugins_loaded', 'team_manager_free_load_textdomain');




/**********************************************************
 * load plugin style & scripts
 **********************************************************/


function team_manager_free_initial_script()
 {
 wp_enqueue_script('team_manager-modernizer', plugins_url( '/js/modernizr.custom.js', __FILE__ ), array('jquery'), '1.0', false);
 wp_enqueue_script('team_manager-classie', plugins_url( '/js/classie.js', __FILE__ ), array('jquery'), '1.0', false);  
 wp_enqueue_script('team_manager-featherlight', plugins_url( '/js/featherlight.js', __FILE__ ), array('jquery'), '1.0', false);  
 wp_enqueue_script('team_manager-main', plugins_url( '/js/main.js', __FILE__ ), array('jquery'), '1.0', false); 

 wp_enqueue_style('team_manager-normalize-css', TEAM_MANAGER_FREE_PLUGIN_PATH.'css/normalize.css');
 wp_enqueue_style('team_manager-awesome-css', TEAM_MANAGER_FREE_PLUGIN_PATH.'css/font-awesome.css');
 wp_enqueue_style('team_manager-featherlight-css', TEAM_MANAGER_FREE_PLUGIN_PATH.'css/featherlight.css');
 wp_enqueue_style('team_manager-style1-css', TEAM_MANAGER_FREE_PLUGIN_PATH.'css/style1.css');
 }
add_action('wp_enqueue_scripts', 'team_manager_free_initial_script');



/**********************************************************
 * load plugin admin style & scripts
 **********************************************************/

function team_manager_free_admin_scripts(){
	global $typenow;

	if(($typenow == 'team_mf_team')){
	wp_enqueue_style('team-manager-free-admin-style', TEAM_MANAGER_FREE_PLUGIN_PATH.'admin/css/team-manager-free-admin.css');
	wp_enqueue_style('team-manager-free-admin-font-awesome', TEAM_MANAGER_FREE_PLUGIN_PATH.'css/font-awesome.css');
	wp_enqueue_script('team-manager-free-admin-scripts', TEAM_MANAGER_FREE_PLUGIN_PATH.'admin/js/team-manager-free-admin.js', array('jquery'), '1.3.3', true );

	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script( 'team-manager-color-picker', plugins_url('/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
	}
}
add_action('admin_enqueue_scripts', 'team_manager_free_admin_scripts');




/**********************************************************
 * plugin activation/deactivation
 **********************************************************/

function active_team_manager_free(){

	require_once plugin_dir_path( __FILE__ ) . 'includes/team-manager-free-activator.php';
	Team_Manager_Free_Activator::activate();

}

function deactive_team_manager_free(){

	require_once plugin_dir_path(__FILE__) . 'includes/team-manager-free-deactivator.php';
	Team_Manager_Free_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'active_team_manager_free');
register_deactivation_hook(__FILE__, 'deactive_team_manager_free');



/**********************************************************
 * Register Team Manager Free Shortcode
 **********************************************************/



function team_manager_free_register_shortcode($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'id' => "",
		), $atts);
		global $post;
		$post_id = $atts['id'];

        $team_manager_free_category_select = get_post_meta($post_id, 'team_manager_free_category_select', true);
        $team_manager_free_post_themes = get_post_meta($post_id, 'team_manager_free_post_themes', true);
        $team_manager_free_post_column = get_post_meta($post_id, 'team_manager_free_post_column', true);
        $team_manager_free_header_font_size = get_post_meta($post_id, 'team_manager_free_header_font_size', true);
        $team_manager_free_designation_font_size = get_post_meta($post_id, 'team_manager_free_designation_font_size', true);
        $team_manager_free_biography_option = get_post_meta($post_id, 'team_manager_free_biography_option', true);
        $team_manager_free_biography_font_size = get_post_meta($post_id, 'team_manager_free_biography_font_size', true);
        $team_manager_free_social_target = get_post_meta($post_id, 'team_manager_free_social_target', true);
        $team_manager_free_header_font_color = get_post_meta($post_id, 'team_manager_free_header_font_color', true);
        $team_manager_free_name_hover_font_color = get_post_meta($post_id, 'team_manager_free_name_hover_font_color', true);
        $team_manager_free_designation_font_color = get_post_meta($post_id, 'team_manager_free_designation_font_color', true);
        $team_manager_free_biography_font_color = get_post_meta($post_id, 'team_manager_free_biography_font_color', true);
        $team_manager_free_overlay_bg_color = get_post_meta($post_id, 'team_manager_free_overlay_bg_color', true);

		
		
		$args = array(
			'post_type' => 'team_mf',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'team_mfcategory',
					'field'    => 'term_id',
					'terms'    => array( $team_manager_free_category_select ), //this is by id
				),
			),
		);

		
			$tmf_query = new WP_Query( $args );
			
			
			$tmfrndsk = rand(1,1000);
			
				$result='';
				if($team_manager_free_post_themes=="theme1")
					{
					$result.='
					<style type="text/css">
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-pic-'.$tmfrndsk.'{
						position: relative;
						overflow: hidden;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-pic-'.$tmfrndsk.' img{
						width:100%;
						height: auto;
						transition:all 0.20s ease-in-out;
					}
					.team-manager-free-items-'.$tmfrndsk.':hover img{
						transform: scale(1.1,1.1);
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-over-layer-'.$tmfrndsk.'{
						position: absolute;
						left:0;
						bottom:-100%;
						width:100%;
						height:100%;
						padding: 25px 15px;
						background:'.$team_manager_free_overlay_bg_color.';
						transition:all 0.20s ease-in-out;
						opacity:0.9;
					}
					.team-manager-free-items-'.$tmfrndsk.':hover .team-manager-free-items-over-layer-'.$tmfrndsk.'{
						bottom:0;
						
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-description-'.$tmfrndsk.'{
						font-size: '.$team_manager_free_biography_font_size.'px;
						color:'.$team_manager_free_biography_font_color.';
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-social-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
						position: absolute;
						bottom:8%;
						left:8%;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-social-'.$tmfrndsk.' li{
						display:inline-block;
						margin: 0px;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-social-'.$tmfrndsk.' li a{
						background: #fff none repeat scroll 0 0;
						border: 1px solid #fff;
						box-shadow: none;
						color: #da3e65;
						height: 25px;
						line-height: 25px;
						outline: medium none;
						text-align: center;
						transition: all 0.3s ease 0s;
						width: 25px;
						margin-right:5px;
						
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-social-'.$tmfrndsk.' li a:hover{
						text-decoration:none;
						color:#333;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-profiles-'.$tmfrndsk.'{
						display: block;
						font-size: 17px;
						margin-bottom: 5px;
						margin-top: 10px;
						overflow: hidden;
						text-align: center;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-profiles-'.$tmfrndsk.' a{
						box-shadow: none;
						color: '.$team_manager_free_header_font_color.';
						font-size: '.$team_manager_free_header_font_size.'px;
						letter-spacing: 1px;
						outline: medium none;
						text-decoration: none;
						text-transform: uppercase;
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-profiles-'.$tmfrndsk.' a:hover{
						text-decoration:none;
						color:'.$team_manager_free_name_hover_font_color.';
					}
					.team-manager-free-items-'.$tmfrndsk.' .team-manager-free-items-profiles-'.$tmfrndsk.' small{
						color:'.$team_manager_free_designation_font_color.';
						display: block;
						font-size:'.$team_manager_free_designation_font_size.'px;
						margin-top:3%;
						text-transform: uppercase;
					}
					@media screen and (max-width: 990px){
						.team-manager-free-items-'.$tmfrndsk.'{
							margin-bottom: 20px;
						}
					}
					.lightbox { display: none; }


					.team_popup_container-'.$tmfrndsk.' {
						display: block;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' {
						display: block;
						float: left;
						height: auto;
						margin-right: 50px;
						width: 300px;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' > h2 {
					  display: block;
					  margin-bottom: 19px;
					  overflow: hidden;
					}
					.team_popup_left_side_area_img-'.$tmfrndsk.' > img {
					  display: block;
					  max-width: 300px;
					  overflow: hidden;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' {

					  margin-top: 30px;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' p {
					  line-height: 26px;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li{
						display:inline-block;
						
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a{
						background: #fff none repeat scroll 0 0;
						border: 1px solid #fff;
						box-shadow: none;
						color: #da3e65;
						height: 25px;
						line-height: 25px;
						outline: medium none;
						text-align: center;
						transition: all 0.3s ease 0s;
						width: 25px;
						margin-right:5px;
						text-decoration:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a:hover{
						text-decoration:none;
						color:#333;
					}
					.team_popup_contact_area-'.$tmfrndsk.'{
						display: block;
						overflow : hidden;
						text-align: center;
						margin-top : 10px;
						line-height:25px;
					}
					.team_popup_contact_area-'.$tmfrndsk.' span.cemail {
					  display: block;
					  overflow: hidden;
					  text-align: left;
					}

					.teamshowcasefree-col-lg-1, .teamshowcasefree-col-lg-2, .teamshowcasefree-col-lg-3, .teamshowcasefree-col-lg-4, .teamshowcasefree-col-lg-5, .teamshowcasefree-col-lg-6, .teamshowcasefree-col-md-1, .teamshowcasefree-col-md-2, .teamshowcasefree-col-md-3, .teamshowcasefree-col-md-4, .teamshowcasefree-col-md-5, .teamshowcasefree-col-md-6, .teamshowcasefree-col-sm-1, .teamshowcasefree-col-sm-2, .teamshowcasefree-col-sm-3, .teamshowcasefree-col-sm-4, .teamshowcasefree-col-sm-5, .teamshowcasefree-col-sm-6, .teamshowcasefree-col-xs-1, .teamshowcasefree-col-xs-2, .teamshowcasefree-col-xs-3, .teamshowcasefree-col-xs-4, .teamshowcasefree-col-xs-5, .teamshowcasefree-col-xs-6 {
						float: left;
						margin-bottom: 10px;
						min-height: 1px;
						padding-left: 5px;
						padding-right: 5px;
						position: relative;
					}
					.teamshowcasefree-col-lg-1 {
						width: 100%;
					}
					.teamshowcasefree-col-lg-2 {
						width: 50%;
					}
					.teamshowcasefree-col-lg-3 {
						width: 33.2222%;
					}
					.teamshowcasefree-col-lg-4 {
						width: 24.9%;
					}
					.teamshowcasefree-col-lg-5 {
						width: 19.9%;
					}
					.teamshowcasefree-col-lg-6 {
						width: 16.6667%;
					}	
					
					
					/* md */
					@media (min-width: 992px) and (max-width: 1100px) {
						.teamshowcasefree-col-md-1{
							width: 100%;
						}
						.teamshowcasefree-col-md-2{
							width: 50%;
						}
						.teamshowcasefree-col-md-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-md-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-md-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-md-6{
							width: 16.66666666666667%;
						}

					}

					/* sm */
					@media (min-width: 650px) and (max-width: 991px) {

						.teamshowcasefree-col-sm-1{
							width: 100%;
						}
						.teamshowcasefree-col-sm-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-sm-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-sm-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-sm-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-sm-6{
							width: 16.66666666666667%;
						}


					}

					/* xs */
					@media (max-width: 651px) {
						.teamshowcasefree-col-xs-1{
							width: 100%;
						}
						.teamshowcasefree-col-xs-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-xs-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-xs-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-xs-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-xs-6{
							width: 16.66666666666667%;
						}

					}
					</style>
					';
					
					
					$result.='<div class="team-manager-free-main-area-'.$tmfrndsk.'">';
					$result.='<div id="team-manager-free-single-items-'.$tmfrndsk.'">';
					// Creating a new side loop
					while ( $tmf_query->have_posts() ) : $tmf_query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
						$team_manager_free_client_designation = get_post_meta(get_the_ID(), 'client_designation', true);
						$team_manager_free_client_shortdescription = get_post_meta(get_the_ID(), 'client_shortdescription', true);
						$team_manager_free_client_email = get_post_meta(get_the_ID(), 'contact_email', true);
						$team_manager_free_client_number = get_post_meta(get_the_ID(), 'contact_number', true);
						$team_manager_free_client_address = get_post_meta(get_the_ID(), 'company_address', true);
						$team_manager_free_social_facebook = get_post_meta(get_the_ID(), 'social_facebook', true);
						$team_manager_free_social_twitter = get_post_meta(get_the_ID(), 'social_twitter', true);
						$team_manager_free_social_googleplus = get_post_meta(get_the_ID(), 'social_googleplus', true);
						$content = apply_filters( 'the_content', get_the_content() );
						$random_team_id = rand();
						
						$result.='
						<div class="teamshowcasefree-col-lg-'.$team_manager_free_post_column.' teamshowcasefree-col-md-2 teamshowcasefree-col-sm-2 teamshowcasefree-col-xs-1">
							<div class="team-manager-free-items-'.$tmfrndsk.'">
								<div class="team-manager-free-items-pic-'.$tmfrndsk.'">';
									$result .= '<a href="'.esc_url(get_the_permalink()).'"><img src="'.$thumb_url[0].'" alt="" /></a>';
									$result.='<div class="team-manager-free-items-over-layer-'.$tmfrndsk.'">
										<p style="display:'.$team_manager_free_biography_option.'" class="team-manager-free-items-description-'.$tmfrndsk.'">
											'.esc_attr($team_manager_free_client_shortdescription).'
										</p>
										<ul class="team-manager-free-items-social-'.$tmfrndsk.'">';
											if(!empty($team_manager_free_social_facebook))
											{
												$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
											}
											if(!empty($team_manager_free_social_twitter))
											{
												$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
											}
											if(!empty($team_manager_free_social_googleplus))
											{
												$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
											}
										
										$result.='</ul>
									</div>
								</div>
								<h3 class="team-manager-free-items-profiles-'.$tmfrndsk.'">
									<a href="" data-featherlight="#fl1'.$random_team_id.'">'.esc_attr(get_the_title()).'</a>
										<div class="lightbox" id="fl1'.$random_team_id.'">
											<div class="team_popup_container-'.$tmfrndsk.'">
												<div class="team_popup_left_side_area-'.$tmfrndsk.'">
													<h2>'.esc_attr(get_the_title()).'</h2>
													<div class="team_popup_left_side_area_img-'.$tmfrndsk.'">
														<img src="'.$thumb_url[0].'" alt="" />
													</div>
													<div class="team_popup_contact_area-'.$tmfrndsk.'">
														<span class="cemail">'.sanitize_email( $team_manager_free_client_email ).'</span>
														<span class="cemail">'.esc_attr( $team_manager_free_client_number ).'</span>
														<span class="cemail">'.esc_attr( $team_manager_free_client_address ).'</span>
													</div>
													<ul class="team-manager-popup-items-social-'.$tmfrndsk.'">';
														if(!empty($team_manager_free_social_facebook))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
														}
														if(!empty($team_manager_free_social_twitter))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
														}
														if(!empty($team_manager_free_social_googleplus))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
														}
													$result.='</ul>
												</div>
												<div class="team_popup_right_side_area-'.$tmfrndsk.'">
													'.$content.'
												</div>
											</div>
										</div>
									<small>'.esc_attr($team_manager_free_client_designation).'</small>
								</h3>
							</div>
						</div>
						';
							
					endwhile;
					wp_reset_postdata();
								
					$result .='</div></div><div class="clearfix"></div>';
			
					return $result; 
					}
					
				elseif($team_manager_free_post_themes=="theme2")
					{
					$result.='
					<style type="text/css">
					.team-manager-free-items-style2-'.$tmfrndsk.'{
						background: #fff;
						text-align: center;
						padding: 0px;
					}
					.team-manager-free-items-style2-pic-'.$tmfrndsk.' > a {
						border: medium none;
						box-shadow: none !important;
						outline: medium none;
						text-decoration: none;
					}
					.team-manager-free-items-style2-'.$tmfrndsk.' .team-manager-free-items-style2-pic-'.$tmfrndsk.' img{
						border-radius: 0;
						box-shadow: none;
						height: auto;
						width: 100%;
					}
					.team-manager-free-items-style2-social_media_team-'.$tmfrndsk.'{
						padding: 0px;
						margin-bottom: 0 !important;
						list-style: none;
						text-align: center;
						background: '.$team_manager_free_overlay_bg_color.';
						margin:0px;
						padding:0px;
						
					}
					.team-manager-free-items-style2-social_media_team-'.$tmfrndsk.' > li{
						display: inline-block;
						margin-bottom: 5px;
						margin-right: 6px;
						margin-top: 5px;
					}
					.team-manager-free-items-style2-social_media_team-'.$tmfrndsk.' > li > a{
						background: #31aab5 none repeat scroll 0 0;
						border-radius: 50%;
						box-shadow: none;
						color: #fff;
						display: block;
						height: 30px;
						line-height: 30px;
						transition: all 0.3s ease 0s;
						width: 30px;
						outline: none;
						border:none;
						text-decoration:none;
					}
					.team-manager-free-items-style2-social_media_team-'.$tmfrndsk.' > li > a:hover{
						background: #fff none repeat scroll 0 0;
						border: medium none;
						box-shadow: none;
						color: #31aab5;
						outline: medium none;
						text-decoration: none;
					}
					.team-manager-free-items-style2-teamprofiles-'.$tmfrndsk.' h3.team-manager-free-items-style2-team-title-'.$tmfrndsk.'{
					font-size: '.$team_manager_free_header_font_size.'px;
					margin-bottom: 10px;
					color:'.$team_manager_free_header_font_color.';
					margin-top: 10px !important;
					}
					.team-manager-free-items-style2-teamprofiles-'.$tmfrndsk.' .team-manager-free-items-style2-team-post-'.$tmfrndsk.'{
						border-top: 1px solid #e5e5e5;
						border-bottom: 1px solid #e5e5e5;
						display: block;
						padding: 12px 0;
						margin-bottom:20px;
						font-size: '.$team_manager_free_designation_font_size.'px;
						font-style: italic;
						color:'.$team_manager_free_designation_font_color.';
						letter-spacing: 0.5px;
					}
					.team-manager-free-items-style2-teamprofiles-'.$tmfrndsk.' .team-manager-free-items-style2-team-description-'.$tmfrndsk.'{
						font-size: '.$team_manager_free_biography_font_size.'px;
						font-weight: 400;
						line-height: 23px;
						color:#333;
						margin-bottom: 15px;
					}
					@media screen and (max-width: 990px){
						.team-manager-free-items-style2-'.$tmfrndsk.'{
							margin-bottom: 30px;
						}
					}
					
					
					.lightbox { display: none; }


					.team_popup_container-'.$tmfrndsk.' {
						display: block;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' {
						display: block;
						float: left;
						height: auto;
						margin-right: 50px;
						width: 300px;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' > h2 {
					  display: block;
					  margin-bottom: 19px;
					  overflow: hidden;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' {
					  margin-top: 50px;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' p {
					  line-height: 26px;
					}
					.team_popup_left_side_area_img-'.$tmfrndsk.' > img {
					  display: block;
					  max-width: 300px;
					  overflow: hidden;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li{
						display:inline-block;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a{
						background: #fff none repeat scroll 0 0;
						border: 1px solid #fff;
						box-shadow: none;
						color: #da3e65;
						height: 25px;
						line-height: 25px;
						outline: medium none;
						text-align: center;
						transition: all 0.3s ease 0s;
						width: 25px;
						margin-right:5px;
						text-decoration:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a:hover{
						text-decoration:none;
						color:#333;
					}
					.team_popup_contact_area-'.$tmfrndsk.'{
						display: block;
						overflow : hidden;
						text-align: center;
						margin-top : 10px;
						line-height: 25px;
					}
					.team_popup_contact_area-'.$tmfrndsk.' span.cemail {
					  display: block;
					  overflow: hidden;
					  text-align: left;
					}

					.teamshowcasefree-col-lg-1, .teamshowcasefree-col-lg-2, .teamshowcasefree-col-lg-3, .teamshowcasefree-col-lg-4, .teamshowcasefree-col-lg-5, .teamshowcasefree-col-lg-6, .teamshowcasefree-col-md-1, .teamshowcasefree-col-md-2, .teamshowcasefree-col-md-3, .teamshowcasefree-col-md-4, .teamshowcasefree-col-md-5, .teamshowcasefree-col-md-6, .teamshowcasefree-col-sm-1, .teamshowcasefree-col-sm-2, .teamshowcasefree-col-sm-3, .teamshowcasefree-col-sm-4, .teamshowcasefree-col-sm-5, .teamshowcasefree-col-sm-6, .teamshowcasefree-col-xs-1, .teamshowcasefree-col-xs-2, .teamshowcasefree-col-xs-3, .teamshowcasefree-col-xs-4, .teamshowcasefree-col-xs-5, .teamshowcasefree-col-xs-6 {
						float: left;
						margin-bottom: 10px;
						min-height: 1px;
						padding-left: 5px;
						padding-right: 5px;
						position: relative;
					}
					.teamshowcasefree-col-lg-1 {
						width: 100%;
					}
					.teamshowcasefree-col-lg-2 {
						width: 50%;
					}
					.teamshowcasefree-col-lg-3 {
						width: 33.2222%;
					}
					.teamshowcasefree-col-lg-4 {
						width: 24.9%;
					}
					.teamshowcasefree-col-lg-5 {
						width: 19.9%;
					}
					.teamshowcasefree-col-lg-6 {
						width: 16.6667%;
					}	
					
					
					/* md */
					@media (min-width: 992px) and (max-width: 1100px) {
						.teamshowcasefree-col-md-1{
							width: 100%;
						}
						.teamshowcasefree-col-md-2{
							width: 50%;
						}
						.teamshowcasefree-col-md-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-md-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-md-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-md-6{
							width: 16.66666666666667%;
						}
					}

					/* sm */
					@media (min-width: 650px) and (max-width: 991px) {

						.teamshowcasefree-col-sm-1{
							width: 100%;
						}
						.teamshowcasefree-col-sm-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-sm-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-sm-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-sm-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-sm-6{
							width: 16.66666666666667%;
						}
					}

					/* xs */
					@media (max-width: 651px) {
						.teamshowcasefree-col-xs-1{
							width: 100%;
						}
						.teamshowcasefree-col-xs-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-xs-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-xs-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-xs-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-xs-6{
							width: 16.66666666666667%;
						}


					}
					</style>
					';
					
					$result.='<div class="team-manager-free-main-area-'.$tmfrndsk.'">';
					$result.='<div id="team-manager-free-single-items-'.$tmfrndsk.'">';
					// Creating a new side loop
					while ( $tmf_query->have_posts() ) : $tmf_query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
						$team_manager_free_client_designation = get_post_meta(get_the_ID(), 'client_designation', true);
						$team_manager_free_client_shortdescription = get_post_meta(get_the_ID(), 'client_shortdescription', true);
						$team_manager_free_client_email = get_post_meta(get_the_ID(), 'contact_email', true);
						$team_manager_free_client_number = get_post_meta(get_the_ID(), 'contact_number', true);
						$team_manager_free_client_address = get_post_meta(get_the_ID(), 'company_address', true);
						$team_manager_free_social_facebook = get_post_meta(get_the_ID(), 'social_facebook', true);
						$team_manager_free_social_twitter = get_post_meta(get_the_ID(), 'social_twitter', true);
						$team_manager_free_social_googleplus = get_post_meta(get_the_ID(), 'social_googleplus', true);
						$content = apply_filters( 'the_content', get_the_content() );
						$random_team_id = rand();
						
						$result.='
						<div class="teamshowcasefree-col-lg-'.$team_manager_free_post_column.' teamshowcasefree-col-md-2 teamshowcasefree-col-sm-2 teamshowcasefree-col-xs-1">
							<div class="team-manager-free-items-style2-'.$tmfrndsk.'">
								<div class="team-manager-free-items-style2-pic-'.$tmfrndsk.'">
									<a href="" data-featherlight="#fl1'.$random_team_id.'"><img src="'.$thumb_url[0].'" alt="" /></a>
										<div class="lightbox" id="fl1'.$random_team_id.'">
											<div class="team_popup_container-'.$tmfrndsk.'">
												<div class="team_popup_left_side_area-'.$tmfrndsk.'">
													<h2>'.esc_attr(get_the_title()).'</h2>
													<div class="team_popup_left_side_area_img-'.$tmfrndsk.'">
														<img src="'.$thumb_url[0].'" alt="" />
													</div>
													<div class="team_popup_contact_area-'.$tmfrndsk.'">
														<span class="cemail">'.sanitize_email( $team_manager_free_client_email ).'</span>
														<span class="cemail">'.esc_attr( $team_manager_free_client_number ).'</span>
														<span class="cemail">'.esc_attr( $team_manager_free_client_address ).'</span>
													</div>
													<ul class="team-manager-popup-items-social-'.$tmfrndsk.'">';
														if(!empty($team_manager_free_social_facebook))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
														}
														if(!empty($team_manager_free_social_twitter))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
														}
														if(!empty($team_manager_free_social_googleplus))
														{
															$result.='<li><a href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
														}
													$result.='</ul>
												</div>
												<div class="team_popup_right_side_area-'.$tmfrndsk.'">
													'.$content.'
												</div>
											</div>
										</div>
								</div>
								<ul class="team-manager-free-items-style2-social_media_team-'.$tmfrndsk.'">';
									if(!empty($team_manager_free_social_facebook))
									{
										$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
									}
									if(!empty($team_manager_free_social_twitter))
									{
										$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
									}
									if(!empty($team_manager_free_social_googleplus))
									{
										$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
									}
								
								$result.='</ul>
								<div class="team-manager-free-items-style2-teamprofiles-'.$tmfrndsk.'">
									<h3 class="team-manager-free-items-style2-team-title-'.$tmfrndsk.'">'.esc_attr(get_the_title()).'</h3>
									<span class="team-manager-free-items-style2-team-post-'.$tmfrndsk.'">'.esc_attr($team_manager_free_client_designation).'</span>
									<p style="display:'.$team_manager_free_biography_option.'" class="team-manager-free-items-style2-team-description-'.$tmfrndsk.'">
										'.esc_attr($team_manager_free_client_shortdescription).'
									</p>
								</div>
							</div>
						</div>
						';
							
					endwhile;
					wp_reset_postdata();
								
					$result .='</div></div><div class="clearfix"></div>';
			
					return $result; 
					}
					
				elseif($team_manager_free_post_themes=="theme3")
					{
					$result.='
					<style type="text/css">
					
					.team-manager-free-items-style3-'.$tmfrndsk.'{
						text-align:center;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-pic-'.$tmfrndsk.'{
						position: relative;
						border-radius: 50%;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-pic-'.$tmfrndsk.' img{
						width: 100%;
						height: auto;
						border-radius: 50%;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .pic-bottom{
						border-radius: 50%;
						box-shadow: none;
						height: 100%;
						left: 0;
						outline: medium none;
						position: absolute;
						top: 0;
						transition: all 0.3s ease 0s;
						width: 100%;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .pic-bottom:after{
						content: "\f002";
						font-family: "FontAwesome";
						position: relative;
						top:45%;
						left:0;
						opacity: 0;
						color:#fff;
						font-size: 35px;
						transition:all 0.3s ease 0s;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-pic-'.$tmfrndsk.':hover .pic-bottom{
						background:'.$team_manager_free_overlay_bg_color.';
						opacity: 0.9;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-pic-'.$tmfrndsk.':hover .pic-bottom:after{
						opacity: 1;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-post-title-'.$tmfrndsk.'{
						font-size: '.$team_manager_free_header_font_size.'px;
						font-weight: 700;
						color:'.$team_manager_free_header_font_color.';
						line-height: 27px;
						margin-bottom: 5px;
						margin-top: 15px !important;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-post-title-'.$tmfrndsk.' a{
						color:#232a34;
						transition: all 0.3s ease 0s;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-post-title-'.$tmfrndsk.' a:hover{
						color:#727cb6;
						text-decoration: none;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-post-'.$tmfrndsk.'{
						margin-bottom: 10px;
						display: block;
						color:'.$team_manager_free_designation_font_color.';
						font-size: '.$team_manager_free_designation_font_size.'px;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-team-social-'.$tmfrndsk.'{
						list-style: none;
						padding: 0;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-team-social-'.$tmfrndsk.' > li{
						display: inline-block;
						margin: 5px;
						padding: 0;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-team-social-'.$tmfrndsk.' > li > a{
						background: #efefef none repeat scroll 0 0;
						border-radius: 50%;
						box-shadow: none;
						color: #727cb6;
						display: block;
						height: 30px;
						line-height: 30px;
						outline: medium none;
						text-decoration: none;
						transition: all 0.3s ease 0s;
						width: 30px;
						border:none;
					}
					.team-manager-free-items-style3-'.$tmfrndsk.' .team-manager-free-items-style3-team-social-'.$tmfrndsk.' > li > a:hover{
						background: #727cb6;
						color:#fff;
					}
					@media screen and (max-width: 990px){
						.team-manager-free-items-style3-'.$tmfrndsk.'{
							margin-bottom: 30px;
						}
					}
					
					
					.lightbox { display: none; }


					.team_popup_container-'.$tmfrndsk.' {
						display: block;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' {
						display: block;
						float: left;
						height: auto;
						margin-right: 50px;
						width: 300px;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' > h2 {
					  display: block;
					  margin-bottom: 19px;
					  overflow: hidden;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' {
					  margin-top: 50px;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' p {
					  line-height: 26px;
					}
					.team_popup_left_side_area_img-'.$tmfrndsk.' > img {
					  display: block;
					  max-width: 300px;
					  overflow: hidden;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li{
						display:inline-block;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a{
						background: #fff none repeat scroll 0 0;
						border: 1px solid #fff;
						box-shadow: none;
						color: #da3e65;
						height: 25px;
						line-height: 25px;
						outline: medium none;
						text-align: center;
						transition: all 0.3s ease 0s;
						width: 25px;
						margin-right:5px;
						text-decoration:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a:hover{
						text-decoration:none;
						color:#333;
					}
					.team_popup_contact_area-'.$tmfrndsk.'{
						display: block;
						overflow : hidden;
						text-align: center;
						margin-top : 10px;
						line-height: 25px;
					}
					.team_popup_contact_area-'.$tmfrndsk.' span.cemail {
					  display: block;
					  overflow: hidden;
					  text-align: left;
					}

					.teamshowcasefree-col-lg-1, .teamshowcasefree-col-lg-2, .teamshowcasefree-col-lg-3, .teamshowcasefree-col-lg-4, .teamshowcasefree-col-lg-5, .teamshowcasefree-col-lg-6, .teamshowcasefree-col-md-1, .teamshowcasefree-col-md-2, .teamshowcasefree-col-md-3, .teamshowcasefree-col-md-4, .teamshowcasefree-col-md-5, .teamshowcasefree-col-md-6, .teamshowcasefree-col-sm-1, .teamshowcasefree-col-sm-2, .teamshowcasefree-col-sm-3, .teamshowcasefree-col-sm-4, .teamshowcasefree-col-sm-5, .teamshowcasefree-col-sm-6, .teamshowcasefree-col-xs-1, .teamshowcasefree-col-xs-2, .teamshowcasefree-col-xs-3, .teamshowcasefree-col-xs-4, .teamshowcasefree-col-xs-5, .teamshowcasefree-col-xs-6 {
						float: left;
						margin-bottom: 10px;
						min-height: 1px;
						padding-left: 5px;
						padding-right: 5px;
						position: relative;
					}
					.teamshowcasefree-col-lg-1 {
						width: 100%;
					}
					.teamshowcasefree-col-lg-2 {
						width: 50%;
					}
					.teamshowcasefree-col-lg-3 {
						width: 33.2222%;
					}
					.teamshowcasefree-col-lg-4 {
						width: 24.9%;
					}
					.teamshowcasefree-col-lg-5 {
						width: 19.9%;
					}
					.teamshowcasefree-col-lg-6 {
						width: 16.6667%;
					}
					
					/* md */
					@media (min-width: 992px) and (max-width: 1100px) {
						.teamshowcasefree-col-md-1{
							width: 100%;
						}
						.teamshowcasefree-col-md-2{
							width: 50%;
						}
						.teamshowcasefree-col-md-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-md-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-md-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-md-6{
							width: 16.66666666666667%;
						}
					}

					/* sm */
					@media (min-width: 650px) and (max-width: 991px) {

						.teamshowcasefree-col-sm-1{
							width: 100%;
						}
						.teamshowcasefree-col-sm-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-sm-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-sm-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-sm-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-sm-6{
							width: 16.66666666666667%;
						}
					}

					/* xs */
					@media (max-width: 651px) {
						.teamshowcasefree-col-xs-1{
							width: 100%;
						}
						.teamshowcasefree-col-xs-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-xs-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-xs-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-xs-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-xs-6{
							width: 16.66666666666667%;
						}
					}
					</style>
					';
					
					$result.='<div class="team-manager-free-main-area-'.$tmfrndsk.'">';
					$result.='<div id="team-manager-free-single-items-'.$tmfrndsk.'">';
					// Creating a new side loop
					while ( $tmf_query->have_posts() ) : $tmf_query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
						$team_manager_free_client_designation = get_post_meta(get_the_ID(), 'client_designation', true);
						$team_manager_free_client_shortdescription = get_post_meta(get_the_ID(), 'client_shortdescription', true);
						$team_manager_free_client_email = get_post_meta(get_the_ID(), 'contact_email', true);
						$team_manager_free_client_number = get_post_meta(get_the_ID(), 'contact_number', true);
						$team_manager_free_client_address = get_post_meta(get_the_ID(), 'company_address', true);
						$team_manager_free_social_facebook = get_post_meta(get_the_ID(), 'social_facebook', true);
						$team_manager_free_social_twitter = get_post_meta(get_the_ID(), 'social_twitter', true);
						$team_manager_free_social_googleplus = get_post_meta(get_the_ID(), 'social_googleplus', true);
						$content = apply_filters( 'the_content', get_the_content() );
						$random_team_id = rand();
						
						$result.='
						
						<div class="teamshowcasefree-col-lg-'.$team_manager_free_post_column.' teamshowcasefree-col-md-2 teamshowcasefree-col-sm-2 teamshowcasefree-col-xs-1">						
							<div class="team-manager-free-items-style3-'.$tmfrndsk.'">
								<div class="team-manager-free-items-style3-pic-'.$tmfrndsk.'">
									<img src="'.$thumb_url[0].'" alt="" />
									<a href="#" data-featherlight="#fl1'.$random_team_id.'" class="pic-bottom"></a>
									<div class="lightbox" id="fl1'.$random_team_id.'">
										<div class="team_popup_container-'.$tmfrndsk.'">
											<div class="team_popup_left_side_area-'.$tmfrndsk.'">
												<h2>'.esc_attr(get_the_title()).'</h2>
												<div class="team_popup_left_side_area_img-'.$tmfrndsk.'">
													<img src="'.$thumb_url[0].'" alt="" />
												</div>
												<div class="team_popup_contact_area-'.$tmfrndsk.'">
													<span class="cemail">'.sanitize_email( $team_manager_free_client_email ).'</span>
													<span class="cemail">'.esc_attr( $team_manager_free_client_number ).'</span>
													<span class="cemail">'.esc_attr( $team_manager_free_client_address ).'</span>
												</div>
												<ul class="team-manager-popup-items-social-'.$tmfrndsk.'">';
													if(!empty($team_manager_free_social_facebook))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
													}
													if(!empty($team_manager_free_social_twitter))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
													}
													if(!empty($team_manager_free_social_googleplus))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
													}
												$result.='</ul>
											</div>
											<div class="team_popup_right_side_area-'.$tmfrndsk.'">
												'.$content.'
											</div>
										</div>
									</div>
								</div>
								<div class="team-manager-free-items-style3-teamprofile-'.$tmfrndsk.'">
									<h3 class="team-manager-free-items-style3-post-title-'.$tmfrndsk.'">'.esc_attr(get_the_title()).'</h3>
									<span class="team-manager-free-items-style3-post-'.$tmfrndsk.'">'.esc_attr($team_manager_free_client_designation).'</span>
										<ul class="team-manager-free-items-style3-team-social-'.$tmfrndsk.'">';
										if(!empty($team_manager_free_social_facebook))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
										}
										if(!empty($team_manager_free_social_twitter))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
										}
										if(!empty($team_manager_free_social_googleplus))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
										}
										$result.='</ul>
								</div>
							</div>				
						</div>';
							
					endwhile;
					wp_reset_postdata();
								
					$result .='</div></div><div class="clearfix"></div>';
			
					return $result; 
					}
				elseif($team_manager_free_post_themes=="theme4")
					{
					$result.='
					<style type="text/css">
					.team-manager-free-items-style4-'.$tmfrndsk.' > .team-manager-free-items-style4-pic-'.$tmfrndsk.' > img{
						width: 100%;
						height: auto;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' > .team-manager-free-items-style4-pic-'.$tmfrndsk.' > a {
					  border: medium none;
					  border-radius: 0;
					  box-shadow: none;
					  outline: medium none;
					  text-decoration: none;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' > .team-manager-free-items-style4-desc-'.$tmfrndsk.'{
						padding:30px;
						background:#fff;
						line-height:24px;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' > .team-manager-free-items-style4-desc-'.$tmfrndsk.' > .team-manager-free-items-style4-teamprofiles-'.$tmfrndsk.' > h4{
						color: '.$team_manager_free_header_font_color.';
						font-size: '.$team_manager_free_header_font_size.'px;
						margin: 0 0 7px;
						text-transform: uppercase;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' > .team-manager-free-items-style4-desc-'.$tmfrndsk.' > .team-manager-free-items-style4-teamprofiles-'.$tmfrndsk.' > span{
						color:'.$team_manager_free_designation_font_color.';
						font-size: '.$team_manager_free_designation_font_size.'px;
						display:block;
						margin-bottom: 5px;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' .team-manager-free-items-style4-sociallinks-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' .team-manager-free-items-style4-sociallinks-'.$tmfrndsk.' > li{
						display:inline-block;
						margin-right:5px;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' .team-manager-free-items-style4-sociallinks-'.$tmfrndsk.' > li > a{
						border: medium none;
						box-shadow: none;
						color: darkgray;
						outline: medium none;
						padding: 5px;
						text-decoration: none;
					}
					.team-manager-free-items-style4-'.$tmfrndsk.' .team-manager-free-items-style4-sociallinks-'.$tmfrndsk.' > li > a:hover{
						border: medium none;
						box-shadow: none;
						color: #1abc9c;
						outline: medium none;
						text-decoration: none;
					}
					@media only screen and (max-width: 990px){
						.team-manager-free-items-style4-'.$tmfrndsk.'{
							margin-bottom:25px;
						}
					}
					
					
					
					.lightbox { display: none; }


					.team_popup_container-'.$tmfrndsk.' {
						display: block;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' {
						display: block;
						float: left;
						height: auto;
						margin-right: 50px;
						width: 300px;
						overflow: hidden;
					}
					.team_popup_left_side_area-'.$tmfrndsk.' > h2 {
					  display: block;
					  margin-bottom: 19px;
					  overflow: hidden;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' {
					  margin-top: 50px;
					}
					.team_popup_right_side_area-'.$tmfrndsk.' p {
					  line-height: 26px;
					}
					.team_popup_left_side_area_img-'.$tmfrndsk.' > img {
					  display: block;
					  max-width: 300px;
					  overflow: hidden;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.'{
						padding:0;
						margin:0;
						list-style:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li{
						display:inline-block;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a{
						background: #fff none repeat scroll 0 0;
						border: 1px solid #fff;
						box-shadow: none;
						color: #da3e65;
						height: 25px;
						line-height: 25px;
						outline: medium none;
						text-align: center;
						transition: all 0.3s ease 0s;
						width: 25px;
						margin-right:5px;
						text-decoration:none;
					}
					.team-manager-popup-items-social-'.$tmfrndsk.' li a:hover{
						text-decoration:none;
						color:#333;
					}
					.team_popup_contact_area-'.$tmfrndsk.'{
						display: block;
						overflow : hidden;
						text-align: center;
						margin-top : 10px;
						line-height: 25px;
					}
					.team_popup_contact_area-'.$tmfrndsk.' span.cemail {
					  display: block;
					  overflow: hidden;
					  text-align: left;
					}

					.teamshowcasefree-col-lg-1, .teamshowcasefree-col-lg-2, .teamshowcasefree-col-lg-3, .teamshowcasefree-col-lg-4, .teamshowcasefree-col-lg-5, .teamshowcasefree-col-lg-6, .teamshowcasefree-col-md-1, .teamshowcasefree-col-md-2, .teamshowcasefree-col-md-3, .teamshowcasefree-col-md-4, .teamshowcasefree-col-md-5, .teamshowcasefree-col-md-6, .teamshowcasefree-col-sm-1, .teamshowcasefree-col-sm-2, .teamshowcasefree-col-sm-3, .teamshowcasefree-col-sm-4, .teamshowcasefree-col-sm-5, .teamshowcasefree-col-sm-6, .teamshowcasefree-col-xs-1, .teamshowcasefree-col-xs-2, .teamshowcasefree-col-xs-3, .teamshowcasefree-col-xs-4, .teamshowcasefree-col-xs-5, .teamshowcasefree-col-xs-6 {
						float: left;
						margin-bottom: 10px;
						min-height: 1px;
						padding-left: 5px;
						padding-right: 5px;
						position: relative;
					}
					.teamshowcasefree-col-lg-1 {
						width: 100%;
					}
					.teamshowcasefree-col-lg-2 {
						width: 50%;
					}
					.teamshowcasefree-col-lg-3 {
						width: 33.2222%;
					}
					.teamshowcasefree-col-lg-4 {
						width: 24.9%;
					}
					.teamshowcasefree-col-lg-5 {
						width: 19.9%;
					}
					.teamshowcasefree-col-lg-6 {
						width: 16.6667%;
					}
					
					/* md */
					@media (min-width: 992px) and (max-width: 1100px) {
						.teamshowcasefree-col-md-1{
							width: 100%;
						}
						.teamshowcasefree-col-md-2{
							width: 50%;
						}
						.teamshowcasefree-col-md-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-md-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-md-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-md-6{
							width: 16.66666666666667%;
						}
					}

					/* sm */
					@media (min-width: 650px) and (max-width: 991px) {

						.teamshowcasefree-col-sm-1{
							width: 100%;
						}
						.teamshowcasefree-col-sm-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-sm-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-sm-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-sm-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-sm-6{
							width: 16.66666666666667%;
						}
					}

					/* xs */
					@media (max-width: 651px) {
						.teamshowcasefree-col-xs-1{
							width: 100%;
						}
						.teamshowcasefree-col-xs-2{
							width: 49.9%;
						}
						.teamshowcasefree-col-xs-3{
							width: 33.22222222%;
						}
						.teamshowcasefree-col-xs-4{
							width: 24.9%;
						}
						.teamshowcasefree-col-xs-5{
							width: 19.9%;
						}
						.teamshowcasefree-col-xs-6{
							width: 16.66666666666667%;
						}
					}
					</style>
					';
					
					$result.='<div class="team-manager-free-main-area-'.$tmfrndsk.'">';
					$result.='<div id="team-manager-free-single-items-'.$tmfrndsk.'">';
					// Creating a new side loop
					while ( $tmf_query->have_posts() ) : $tmf_query->the_post();
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
						$team_manager_free_client_designation = get_post_meta(get_the_ID(), 'client_designation', true);
						$team_manager_free_client_shortdescription = get_post_meta(get_the_ID(), 'client_shortdescription', true);
						$team_manager_free_client_email = get_post_meta(get_the_ID(), 'contact_email', true);
						$team_manager_free_client_number = get_post_meta(get_the_ID(), 'contact_number', true);
						$team_manager_free_client_address = get_post_meta(get_the_ID(), 'company_address', true);
						$team_manager_free_social_facebook = get_post_meta(get_the_ID(), 'social_facebook', true);
						$team_manager_free_social_twitter = get_post_meta(get_the_ID(), 'social_twitter', true);
						$team_manager_free_social_googleplus = get_post_meta(get_the_ID(), 'social_googleplus', true);
						$content = apply_filters( 'the_content', get_the_content() );
						$random_team_id = rand();
						
						$result.='						
						<div class="teamshowcasefree-col-lg-'.$team_manager_free_post_column.' teamshowcasefree-col-md-2 teamshowcasefree-col-sm-2 teamshowcasefree-col-xs-1">
							<div class="team-manager-free-items-style4-'.$tmfrndsk.'">
								<div class="team-manager-free-items-style4-pic-'.$tmfrndsk.'">
									<a href="#" data-featherlight="#fl1'.$random_team_id.'"><img src="'.$thumb_url[0].'" alt="" /></a>
									<div class="lightbox" id="fl1'.$random_team_id.'">
										<div class="team_popup_container-'.$tmfrndsk.'">
											<div class="team_popup_left_side_area-'.$tmfrndsk.'">
												<h2>'.esc_attr(get_the_title()).'</h2>
												<div class="team_popup_left_side_area_img-'.$tmfrndsk.'">
													<img src="'.$thumb_url[0].'" alt="" />
												</div>
												<div class="team_popup_contact_area-'.$tmfrndsk.'">
													<span class="cemail">'.sanitize_email( $team_manager_free_client_email ).'</span>
													<span class="cemail">'.esc_attr( $team_manager_free_client_number ).'</span>
													<span class="cemail">'.esc_attr( $team_manager_free_client_address ).'</span>
												</div>
												<ul class="team-manager-popup-items-social-'.$tmfrndsk.'">';
													if(!empty($team_manager_free_social_facebook))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
													}
													if(!empty($team_manager_free_social_twitter))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
													}
													if(!empty($team_manager_free_social_googleplus))
													{
														$result.='<li><a href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
													}
												$result.='</ul>
											</div>
											<div class="team_popup_right_side_area-'.$tmfrndsk.'">
												'.$content.'
											</div>
										</div>
									</div>
								</div>
								<div class="team-manager-free-items-style4-desc-'.$tmfrndsk.'">
									<div class="team-manager-free-items-style4-teamprofiles-'.$tmfrndsk.'">
										<h4>'.esc_attr(get_the_title()).'</h4>
										<span>'.esc_attr($team_manager_free_client_designation).'</span>
									</div>
									<ul class="team-manager-free-items-style4-sociallinks-'.$tmfrndsk.'">';
										if(!empty($team_manager_free_social_facebook))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_facebook).'" class="fa fa-facebook"></a></li>';
										}
										if(!empty($team_manager_free_social_twitter))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_twitter).'" class="fa fa-twitter"></a></li>';
										}
										if(!empty($team_manager_free_social_googleplus))
										{
											$result.='<li><a target="'.$team_manager_free_social_target.'" href="'.esc_url($team_manager_free_social_googleplus).'" class="fa fa-google"></a></li>';
										}
									$result.='</ul>
								</div>
							</div>
						</div>';
							
					endwhile;
					wp_reset_postdata();
								
					$result .='</div></div><div class="clearfix"></div>';
			
					return $result; 
					}
			else{
				
				echo '404 Not Found';
			}
		
		return $result;
	
}
add_shortcode('tmfshortcode', 'team_manager_free_register_shortcode');





?>