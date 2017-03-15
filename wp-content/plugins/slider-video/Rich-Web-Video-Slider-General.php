<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	
	global $wpdb;
	$table_name4  = $wpdb->prefix . "rich_web_video_slider_effects_data";
	$Rich_WebSliderCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d",0));
?>
<form method="POST">
	<?php require_once( 'Rich-Web-Video-Slider-Header.php' ); ?>
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type='button' class='Rich_Web_VSlider_Add_Opt' value='Add Option (Pro)' onclick='Rich_Web_VSlider_Add_Option()' />
		<input type='button' class='Rich_Web_VSlider_Can_Opt' value='Cancel'     onclick='Rich_Web_VSlider_Can_Option()' />
	</div>
	<div class='Rich_Web_VSlider_Opt_Content_Div_2' >
		<div class='Rich_Web_VSlider_Opt_Table_Data'>
			<table class='Rich_Web_VSlider_Opt_Table'>
				<tr class='Rich_Web_VSlider_Opt_Table_Tr'>
					<td>No</td>
					<td>Option Name</td>
					<td>Slider Type</td>
					<td>Actions</td>
				</tr>
			</table>
			<table class='Rich_Web_VSlider_Opt_Table_2'>
				<?php for($i=0;$i<count($Rich_WebSliderCount);$i++){ ?>
					<tr class='Rich_Web_VSlider_Opt_Table_Tr2'>
						<td><?php echo $i+1;?></td>
						<td><?php echo $Rich_WebSliderCount[$i]->slider_vid_name;?></td>
						<td><?php echo $Rich_WebSliderCount[$i]->slider_Vid_type;?></td>
						<td onclick="Rich_Web_VSlider_Edit_Option('<?php echo $i+1;?>')"><i class='Rich_Web_VS_Pencil rich_web rich_web-pencil'></i></td>
						<td onclick='Rich_Web_VSlider_Add_Option()' ><i class='Rich_Web_VS_Delete rich_web rich_web-trash'></i></td>
					</tr>
				<?php }?>
			</table>
		</div>
		<div class='Rich_Web_VSlider_Opt_Table_Data_2'>
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_1"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect1.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_2"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect1_1.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_3"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect2.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_4"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect2_2.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_5"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect3.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_6"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect3_3.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_7"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect4.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_8"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect4_4.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_9"  onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect5.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_10" onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect5_5.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_11" onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect6.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_12" onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect6_6.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_13" onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect7.png',__FILE__);?>">
			<img class="Rich_Effect_VS" id="Rich_Effect_VS_14" onclick='Rich_Web_VSlider_Add_Option()' src="<?php echo plugins_url('/Images/video-effect7_7.png',__FILE__);?>">
		</div>
	</div>
</form>