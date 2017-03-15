<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type='text/css'>
	.Rich_Web_VSlider_Add_Opt { position: absolute; right: 10px; bottom: 10px; padding: 5px 10px; background: #47bde5; cursor: pointer; border: none; box-shadow: 0px 0px 2px #47bde5; color: #fff; text-shadow:1px 1px 1px #000000; width:130px; height:30px; transition:all 0.3s linear; }
	.Rich_Web_VSlider_Add_OptAnim { width:0px !important; padding:0px !important; transition:all 0s linear; }
	.Rich_Web_VSlider_Can_Opt { position: absolute; right: 10px; bottom: 10px; padding: 0px; background: #47bde5; cursor: pointer; border: none; box-shadow: 0px 0px 2px #47bde5; color: #fff; text-shadow:1px 1px 1px #000000; width:0px; height:30px; transition:all 0.3s linear; }
	.Rich_Web_VSlider_Can_Opt:hover, .Rich_Web_VSlider_Add_Opt:hover { color: #fff; background:#30a9d1; box-shadow: 0px 0px 2px #30a9d1; }      	
	.Rich_Web_VSlider_Can_OptAnim { padding: 5px 10px !important; width:100px !important; transition:all 0s linear; }
	.Rich_Web_VSlider_Opt_Content_Div { position:relative; width: 99%; height: 140px; background: #34383c; margin-top: 30px; box-shadow: 0px 0px 30px #727d87; }
	.Rich_Web_VSlider_Opt_Content_Div_2 { position:relative; width:99%; }
	.Rich_Web_VSlider_Opt_Table_Data { position:absolute; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1; }	
	.Rich_Web_VSlider_Opt_Table { width: 100%; background-color: #fff; text-align: center; text-shadow:1px 1px 1px #000000; padding: 1px; color: #fff; }
	.Rich_Web_VSlider_Opt_Table_Tr { background:#30a9d1; }
	.Rich_Web_VSlider_Opt_Table td:nth-child(1) { width:10%; }
	.Rich_Web_VSlider_Opt_Table td:nth-child(2) { width:35%; }
	.Rich_Web_VSlider_Opt_Table td:nth-child(3) { width:35%; }
	.Rich_Web_VSlider_Opt_Table td:nth-child(4) { width:20%; }
	.Rich_Web_VS_Pencil { color:#ff0000; cursor:pointer; }
	.Rich_Web_VS_Delete { color:#00a0d2; cursor:pointer; }
	.Rich_Web_VSlider_Opt_Table_2 { width: 100%; background-color: #fff; margin-top:10px; text-align: center; text-shadow:0px 0px 0px #000000; padding: 1px; color: #34383c; }
	.Rich_Web_VSlider_Opt_Table_Tr2 { background:#f1f1f1; }
	.Rich_Web_VSlider_Opt_Table_Tr2:nth-child(even) { background:#ffffff; }
	.Rich_Web_VSlider_Opt_Table_Tr2:hover { background:#e9e9e9; }
	.Rich_Web_VSlider_Opt_Table_Tr2 td:nth-child(1) { width:10%; }
	.Rich_Web_VSlider_Opt_Table_Tr2 td:nth-child(2) { width:35%; }
	.Rich_Web_VSlider_Opt_Table_Tr2 td:nth-child(3) { width:35%; }
	.Rich_Web_VSlider_Opt_Table_Tr2 td:nth-child(4) { width:10%; }
	.Rich_Web_VSlider_Opt_Table_Tr2 td:nth-child(5) { width:10%; }	
	.Rich_Web_VSlider_Opt_Table_Data_2 { position:absolute; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1; display:none; }
	.Rich_Effect_VS { width:100%; display:none; margin-bottom: 20px; }
</style>