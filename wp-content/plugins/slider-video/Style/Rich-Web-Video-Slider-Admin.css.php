<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type='text/css'>
	.Rich_Web_VSlider_Add { position: absolute; right: 10px; bottom: 10px; padding: 5px 10px;	background: #47bde5; cursor: pointer; border: none; box-shadow: 0px 0px 2px #47bde5; color: #fff; text-shadow:1px 1px 1px #000000; width:100px; height:30px; transition:all 0.3s linear; }
	.Rich_Web_VSlider_AddAnim { width:0px !important; padding:0px !important; transition:all 0s linear; }
	.Rich_Web_VSlider_Sav,.Rich_Web_VSlider_Upd,.Rich_Web_VSlider_Can { position: absolute; right: 10px; bottom: 10px; padding: 0px; background: #47bde5; cursor: pointer; border: none; box-shadow: 0px 0px 2px #47bde5; color: #fff; text-shadow:1px 1px 1px #000000; width:0px; height:30px; transition:all 0.3s linear; }
	.Rich_Web_VSlider_SavAnim { padding: 5px 10px !important; width:100px !important; right:120px !important; transition:all 0s linear; }
	.Rich_Web_VSlider_Sav:hover,.Rich_Web_VSlider_Can:hover,.Rich_Web_VSlider_Upd:hover,.Rich_Web_VSlider_Add:hover { color: #fff; background:#30a9d1; box-shadow: 0px 0px 2px #30a9d1; }      	
	.Rich_Web_VSlider_CanAnim { padding: 5px 10px !important; width:100px !important; transition:all 0s linear; }	
	.Table_Data_Rich_Web_VS_Content { position:relative;	width:99%; }
	.Table_Data_VS_Rich_Web1 { position:absolute; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1; }	
	.Rich_Web_VSlider_Tit_Table { width: 100%; background-color: #fff; text-align: center; text-shadow:1px 1px 1px #000000; padding: 1px; color: #fff; }
	.Rich_Web_VSlider_Tit_Table_Tr { background:#30a9d1; }
	.Rich_Web_VSlider_Tit_Table td:nth-child(1) { width:10%; }
	.Rich_Web_VSlider_Tit_Table td:nth-child(2) { width:25%; }
	.Rich_Web_VSlider_Tit_Table td:nth-child(3) { width:25%; }
	.Rich_Web_VSlider_Tit_Table td:nth-child(4) { width:20%; }
	.Rich_Web_VSlider_Tit_Table td:nth-child(5) { width:20%; }
	.Rich_Web_VSlider_Tit_Table2 { width: 100%; background-color: #fff; margin-top:10px; text-align: center; text-shadow:0px 0px 0px #000000; padding: 1px; color: #34383c; }
	.Rich_Web_VSlider_Tit_Table_Tr2 { background:#f1f1f1; }
	.Rich_Web_VSlider_Tit_Table_Tr2:nth-child(even) { background:#ffffff; }
	.Rich_Web_VSlider_Tit_Table_Tr2:hover { background:#e9e9e9; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(1) { width:10%; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(2) { width:25%; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(3) { width:25%; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(4) { width:20%; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(5) { width:10%; }
	.Rich_Web_VSlider_Tit_Table2 td:nth-child(6) { width:10%; }
	.Rich_Web_VS_Pencil { color:#ff0000; cursor:pointer; }
	.Rich_Web_VS_Delete { color:#00a0d2; cursor:pointer; }
	.Table_Data_VS_Rich_Web2 { position:absolute; top:0%; left:0%; width:100% !important; margin-top:10px; z-index:1; display:none; }
	.Rich_Web_VS_ShortTable { position:relative;	width: 28%;	padding: 1px; background-color: white; text-align: justify; color: #000; font-size: 12px; }
	.Rich_Web_VS_ShortTable tr td {	padding:5px; text-align:center; }
	.Rich_Web_VS_ShortTable tr:nth-child(1) { background-color: #30a9d1; color: #ffffff; }
	.Rich_Web_VS_ShortTable tr:nth-child(2) { background-color: #f1f1f1; }
	.Rich_Web_VS_ShortTable tr:nth-child(3) { background-color: #f1f1f1; }
	.Rich_Web_VS_ShortTable tr:nth-child(4) { background-color: #30a9d1; color: #ffffff; }
	.Rich_Web_VS_ShortTable tr:nth-child(5) { background-color: #f1f1f1; }
	.Rich_Web_VS_ShortTable tr:nth-child(6) { background-color: #f1f1f1; }
	.Rich_Web_Save_VSlider_Table { position:relative; width: 70%; padding: 1px; background-color: #fff; text-align: center; color: #000; font-size: 12px; margin-bottom:15px; }
	.Rich_Web_Save_VSlider_Table tr { background:#f1f1f1; }
	.Rich_Web_Save_VSlider_Table tr:nth-child(even) { background:#ffffff; }
	.Rich_Web_Save_VSlider_Table tr td { padding:3px; font-size:12px; font-family:Arial; }
	.Rich_Web_Save_VSlider_Table2 { position:relative; width: 100%; padding: 1px; background-color: #fff; text-align: center; color: #000; font-size: 12px; margin-bottom:15px; }
	.Rich_Web_Save_VSlider_Table2 tr { background:#30a9d1; }
	.Rich_Web_Save_VSlider_Table2 tr td { color:#fff; text-shadow:2px 2px 2px #000000; }
	.Rich_Web_Save_VSlider_Table2 tr td:nth-child(1) { width:5%; }
	.Rich_Web_Save_VSlider_Table2 tr td:nth-child(2) { width:25%; }
	.Rich_Web_Save_VSlider_Table2 tr td:nth-child(3) { width:40%; }
	.Rich_Web_Save_VSlider_Table2 tr td:nth-child(4) { width:15%; }
	.Rich_Web_Save_VSlider_Table2 tr td:nth-child(5) { width:15%; }
	.Rich_Web_Save_VSlider_Table3 { position:relative; width: 100%; padding: 1px; background-color: #fff; text-align: center; color: #000; font-size: 12px; margin-bottom:15px; }
	.Rich_Web_Save_VSlider_Table3 tr { background:#f1f1f1; }
	.Rich_Web_Save_VSlider_Table3 tr td { padding:5px; }
	.Rich_Web_Save_VSlider_Table3 tr:nth-child(even) { background:#ffffff; }
	.Rich_Web_Save_VSlider_Table3 tr:hover { background:#e9e9e9; }
	.Rich_Web_Save_VSlider_Table3 tr td:nth-child(1) { width:5%; }
	.Rich_Web_Save_VSlider_Table3 tr td:nth-child(2) { width:25%; }
	.Rich_Web_Save_VSlider_Table3 tr td:nth-child(3) { width:40%; }
	.Rich_Web_Save_VSlider_Table3 tr td:nth-child(4) { width:15%; }
	.Rich_Web_Save_VSlider_Table3 tr td:nth-child(5) { width:15%; }
	.Rich_Web_VSlider_Input { width:100%; max-width:400px; font-size:12px; }
	.Rich_Web_VSlider_Add_Vid { background:#30a9d1; color:#fff; text-shadow:1px 1px 1px #000; }	
	.Rich_Web_VSlider_Desc { height:100px; }	
	.Rich_Web_VSlider_ONT { margin-left:10px !important; }
	.Rich_Web_VSlider_Sav_Video, .Rich_Web_VSlider_Res_Video, .Rich_Web_VSlider_Upd_Video { padding: 5px 10px; background: #fff; cursor: pointer; border: none; color: #000; transition: all 0.3s linear; font-size:10px; margin:10px; }
	.Rich_Web_VSlider_Sav_Video:hover, .Rich_Web_VSlider_Res_Video:hover, .Rich_Web_VSlider_Upd_Video:hover { color: #fff; background: #30a9d1; text-shadow: 0px 0px 2px #fff; }
	.Rich_Web_VSlider_Upd_Video { display:none; }
	@media all and (max-width:410px) { .Rich_Web_Save_VSlider_Table { width:61%; } }	
</style>