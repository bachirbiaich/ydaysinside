<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script>
	function Rich_Web_VSlider_Add_Option(){
		alert("This is free version. For more adventures click to buy Pro version.");
	}
  	function Rich_Web_VSlider_Can_Option(){
		location.reload();
	}
	function Rich_Web_VSlider_Edit_Option(rich_web_Slider_ID)
	{
		jQuery('.Rich_Web_VSlider_Opt_Table_Data').css('display','none');
		jQuery('.Rich_Web_VSlider_Add_Opt').addClass('Rich_Web_VSlider_Add_OptAnim');
		jQuery('.Rich_Web_VSlider_Opt_Table_Data_2').css('display','block');
		jQuery('.Rich_Web_VSlider_Can_Opt').addClass('Rich_Web_VSlider_Can_OptAnim');
		jQuery('#Rich_Effect_VS_'+rich_web_Slider_ID).css('display','block');	
	}
</script>