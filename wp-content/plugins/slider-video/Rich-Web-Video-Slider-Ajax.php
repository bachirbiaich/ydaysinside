<?php	
	add_action( 'wp_ajax_Rich_Web_VSlider_Del', 'Rich_Web_VSlider_Del_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_VSlider_Del', 'Rich_Web_VSlider_Del_Callback' );

	function Rich_Web_VSlider_Del_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2 = $wpdb->prefix . "rich_web_video_slider_manager";
		$table_name3 = $wpdb->prefix . "rich_web_video_slider_videos";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id=%d", $number));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name3 WHERE Slider_ID=%d", $number));
		die();
	}

	add_action( 'wp_ajax_Rich_Web_VSlider_Edit_Main', 'Rich_Web_VSlider_Edit_Main_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_VSlider_Edit_Main', 'Rich_Web_VSlider_Edit_Main_Callback' );

	function Rich_Web_VSlider_Edit_Main_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name2 = $wpdb->prefix . "rich_web_video_slider_manager";
		
		$Rich_Web_VSlider_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $number));

		print_r($Rich_Web_VSlider_Manager);
		die();
	}
	
	add_action( 'wp_ajax_Rich_Web_VSlider_Edit_Videos', 'Rich_Web_VSlider_Edit_Videos_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_VSlider_Edit_Videos', 'Rich_Web_VSlider_Edit_Videos_Callback' );

	function Rich_Web_VSlider_Edit_Videos_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name3 = $wpdb->prefix . "rich_web_video_slider_videos";

		$Rich_Web_VSlider_Videos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Slider_ID=%d order by id", $number));
		
		print_r($Rich_Web_VSlider_Videos);
		die();
	}

	add_action( 'wp_ajax_Rich_Web_VSlider_Vimeo', 'Rich_Web_VSlider_Vimeo_Callback' );
	add_action( 'wp_ajax_nopriv_Rich_Web_VSlider_Vimeo', 'Rich_Web_VSlider_Vimeo_Callback' );

	function Rich_Web_VSlider_Vimeo_Callback()
	{
		$Rich_Web_VSlider_Vimeo_Src = sanitize_text_field($_POST['foobar']);

		$Rich_Web_VSlider_Image=explode('video/',$Rich_Web_VSlider_Vimeo_Src);
		$Rich_Web_VSlider_Image_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Rich_Web_VSlider_Image[1].php"));
		$Rich_Web_VSlider_Image_Real=$Rich_Web_VSlider_Image_Real[0]['thumbnail_large'];

		echo $Rich_Web_VSlider_Image_Real;
		die();
	}
?>