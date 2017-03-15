<?php
	class Rich_Web_Video_Slider extends WP_Widget
	{
		function __construct()
 	  	{
 			$params=array('name'=>'Rich-Web Video Slider','description'=>'This is the widget of Rich-Web Video Slider plugin');
			parent::__construct('Rich_Web_Video_Slider','',$params);
 	  	}
		function form($instance)
 		{
 			$defaults = array('Rich_Web_Video'=>'');
		    $instance = wp_parse_args((array)$instance, $defaults);

		   	$Rich_Web_Video = $instance['Rich_Web_Video'];
		   	?>
		   	<div>			  
			   	<p>
			   		Slider Title:
			   		<select name="<?php echo $this->get_field_name('Rich_Web_Video'); ?>" class="widefat">
				   		<?php
				   			global $wpdb;

							$table_name2 = $wpdb->prefix . "rich_web_video_slider_manager";
							$Rich_Web_Video=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d", 0));
				   			
				   			foreach ($Rich_Web_Video as $Rich_Web_Slider1)
				   			{
				   				?> <option value="<?php echo $Rich_Web_Slider1->id; ?>"> <?php echo $Rich_Web_Slider1->Slider_Title; ?> </option> <?php 
				   			}
				   		?>
			   		</select>
			   	</p>
		   	</div>
		   	<?php	
 		}
 		function widget($args,$instance)
 		{
 			extract($args);
 		 	$Rich_Web_Video = empty($instance['Rich_Web_Video']) ? '' : $instance['Rich_Web_Video'];

 		 	global $wpdb;

			$table_name2  = $wpdb->prefix . "rich_web_video_slider_manager";
			$table_name3  = $wpdb->prefix . "rich_web_video_slider_videos";
			$table_name4  = $wpdb->prefix . "rich_web_video_slider_effects_data";
			$table_name5  = $wpdb->prefix . "rich_web_vs_effect_1";
			$table_name6  = $wpdb->prefix . "rich_web_vs_effect_2";
			$table_name7  = $wpdb->prefix . "rich_web_vs_effect_3";
			$table_name8  = $wpdb->prefix . "rich_web_vs_effect_4";
			$table_name9  = $wpdb->prefix . "rich_web_vs_effect_5";
			$table_name10 = $wpdb->prefix . "rich_web_vs_effect_6";
			$table_name11 = $wpdb->prefix . "rich_web_vs_effect_7";

			$Rich_Web_VSlider_Manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $Rich_Web_Video));
			$Rich_Web_VSlider_Videos  = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE Slider_ID = %d order by id", $Rich_Web_Video));
			$Rich_Web_VSlider_Eff_Dat = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE slider_vid_name = %s", $Rich_Web_VSlider_Manager[0]->Slider_Type));
			
			if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Content Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Slick Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Thumbnails Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name7 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Carousel/Content Popup')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name8 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Simple Video Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name9 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Slider/Vertical Thumbnails')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name10 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Horizontal Posts Slider')
			{
				$Rich_Web_VSlider_Eff=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name11 WHERE RW_VS_ID = %s", $Rich_Web_VSlider_Eff_Dat[0]->id));
			}
			
 		 	echo $before_widget;
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_AP=='on'){ $Rich_Web_VS_CS_AP = true; }else{ $Rich_Web_VS_CS_AP = false; }
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_HP=='on'){ $Rich_Web_VS_CS_HP = true; }else{ $Rich_Web_VS_CS_HP = false; }
			if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_RS=='on'){ $Rich_Web_VS_CS_RS = true; }else{ $Rich_Web_VS_CS_RS = false; }
 		 	?>
			<?php if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Content Slider'){ ?>
 		 		<link rel="stylesheet" href="<?php echo plugins_url('/Style/styles.css',__FILE__);?>" />
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/iview.css',__FILE__);?>" />
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/style.css',__FILE__);?>" />
				
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/raphael-min.js',__FILE__);?>"></script>
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.easing.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('/Scripts/iview.js',__FILE__);?>"></script>
				
				<script>					
					jQuery(document).ready(function(){
						var dirNavCS = jQuery('.dirNavCS').val();
						var pauseOnHoveCS = jQuery('.pauseOnHoveCS').val();
						var RandomStartCS = jQuery('.RandomStartCS').val();
						var controlNavCS = jQuery('.controlNavCS').val();
						var controlNextPrevCS = jQuery('.controlNextPrevCS').val();
						var navTumbsCS = jQuery('.navTumbsCS').val();
						
						if(dirNavCS==''){ dirNavCS=false; }else{ dirNavCS=true; }
						if(pauseOnHoveCS==''){ pauseOnHoveCS=false; }else{ pauseOnHoveCS=true; }
						if(RandomStartCS==''){ RandomStartCS=false;	}else{ RandomStartCS=true; }
						if(controlNavCS==''){ controlNavCS=false; }else{ controlNavCS=true; }
						if(controlNextPrevCS==''){ controlNextPrevCS=false; }else{ controlNextPrevCS=true; }
						if(navTumbsCS==''){ navTumbsCS=false; }else{ navTumbsCS=true; }
						function opt(){
							jQuery('#iview').iView({
								fx: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CE;?>',
								easing: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_EE;?>',
								strips: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_S;?>,
								blockCols: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BlC;?>,
								blockRows: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BlR;?>,
								animationSpeed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AS;?>,
								pauseTime: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_PT*1000;?>,
								startSlide: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_SS-1;?>,
								directionNav: false,
								directionNavHoverOpacity: 0.6,
								controlNav: controlNavCS,
								controlNavNextPrev: controlNextPrevCS,
								controlNavHoverOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_NO/100;?>,
								controlNavThumbs: navTumbsCS,
								controlNavTooltip: true,
								captionSpeed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapS;?>,
								captionEasing: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapEs;?>',
								captionOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapO/100;?>,
								autoAdvance: dirNavCS,
								keyboardNav: true,
								touchNav: true,
								pauseOnHover: pauseOnHoveCS,
								nextLabel: "Next",
								previousLabel: "Previous",
								playLabel: "Play",
								pauseLabel: "Pause",
								closeLabel: "Close",
								randomStart: RandomStartCS,
								timer: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiT;?>',
								timerBg: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TiBgC;?>',
								timerColor: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TiC;?>',
								timerOpacity: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiO/100;?>,
								timerDiameter: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiD;?>*jQuery('#iview').parent().parent().width()/(jQuery('#iview').parent().parent().width()+150),
								timerPadding: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiP;?>*jQuery('#iview').parent().parent().width()/(jQuery('#iview').parent().parent().width()+150),
								timerStroke: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiS;?>*jQuery('#iview').parent().parent().width()/(jQuery('#iview').parent().parent().width()+150),
								timerBarStroke: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBS;?>,    
								timerBarStrokeColor: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBC;?>',
								timerBarStrokeStyle: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiBSt;?>',
								timerPosition: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TiPos;?>',
								timerX: 10,
								timerY: 10,
								tooltipX: 5,
								tooltipY: 5
							});
						}
						//jQuery(window).on('load resize',function(){
						    opt();
						//})
						
					});
				</script>
				<style>
					#iview {
						display: block;
					
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_BR;?>px;
						position: relative;
						-webkit-box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						-moz-box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						box-shadow: 0 38px 30px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_BSC;?>;
						margin: 40px auto;
						overflow:hidden;
					}
					#iview .iviewSlider {
						display: block;
						width: 700px;
						height: 300px;
						overflow: hidden;
						border-radius: 0px;
					}
					.iview-controlNav a.iview-control {
						padding: 0px;
						float: left;
						width: 11px;
						height: 12px;
						background: url(<?php echo plugins_url('/Images/bullets_'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_NT .'.png',__FILE__);?>) no-repeat;
						line-height: 0px;
						text-indent:0px;
						font-size:0px;
					}
					.iview-controlNav a.iview-control img{
						width:100%;
						height:100%;
					}
					.iview-controlNav a.iview-controlPrevNav {
						float: left;
						width:50px;
						height:44px;
						background: url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'.png',__FILE__);?>) no-repeat;
						background-size:100% 100%;
						box-shadow:none !important;
					}
					.iview-controlNav a.iview-controlNextNav {
						float: left;
						width: 50px;
						height: 44px;
						background: url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_AT .'.png',__FILE__);?>) no-repeat;
						background-size:100% 100%;
						box-shadow:none !important;
					}
					.titcol{
						color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;
					}
					.iview-controlNav 
					{						
						position: absolute;
						bottom: 3px;
						left: 50%;
						transform:translateX(-50%);
						-webkit-transform:translateX(-50%);
						-ms-transform:translateX(-50%);
						height: 44px;
					}

					@media screen and (max-width:700px){
						.iview-controlNav a.iview-controlNextNav{
							cursor:default !important;
						}
						.iview-controlNav a.iview-controlPrevNav{
							cursor:default !important;
						}
						#iview-timer{
							cursor:default !important;
						}
					}
				</style>
 		 		<div id="cont">
					<div class="container" style='width:auto;'>
						<div id="iview" style='max-width:100%;'>
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<div data-iview:image="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" data-iview:src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" data-iview:type="video" style='position:relative;'>
								<iframe src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type1'){ ?> 
									<div class="titcol iview-caption caption1 titcol<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<div class="
									Desc_Tot descCol iview-caption caption2 descCol<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type2'){ ?> 
									<div class="Desc_Tot descCol_2 iview-caption caption7 descCol_2<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="0" data-y="0" data-width="180" data-height="480" data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;'>
										<h3 class='titcol_2 titcol_2<?php echo $i+1; ?>' name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' style='font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>'><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type3'){ ?> 
									<div class="titcol_3 iview-caption caption4 titcol_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<div class="Desc_Tot descCol_3 iview-caption blackcaption descCol_3<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type4'){ ?> 
									<div class="titcol_4 iview-caption caption5 titcol_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<div class="Desc_Tot descCol_4 iview-caption caption6 descCol_4<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type5'){ ?> 
									<div class="titcol_5 iview-caption caption5 titcol_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' data-x="250" data-y="100" data-width='150' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<div class=" Desc_TotdescCol_5 iview-caption caption6 descCol_5<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="400" data-y="150" data-width='250' data-height='50'  data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type6'){ ?> 
									<div class="titcol_6 iview-caption caption4 titcol_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>'  data-x="50" data-y="80" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>;text-align:center;'>
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>
									</div>
									<div class=" Desc_Tot descCol_6 iview-caption blackcaption descCol_6<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>'  style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;' data-x="50" data-y="135" data-width='150' data-height='50' data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" data-easing="easeInOutElastic">
										<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
								<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type=='type7'){ ?> 
									<div class="Desc_Tot descCol_7 iview-caption caption7 descCol_7<?php echo $i+1; ?>" name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>' data-x="0" data-y="0" data-width="180" data-height="480" data-transition="<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_CapE;?>" style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFF;?>;background-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DBgC;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_DC;?>;text-align:center;overflow-x:hidden;'>
										<h3 class='titcol_7 titcol_7<?php echo $i+1; ?>' name='<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>' style='font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFF;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_TC;?>'><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<input type='text' style='display:none;' class='dirNavCS' value='<?php echo $Rich_Web_VS_CS_AP;?>'>
				<input type='text' style='display:none;' class='pauseOnHoveCS' value='<?php echo $Rich_Web_VS_CS_HP;?>'>
				<input type='text' style='display:none;' class='RandomStartCS' value='<?php echo $Rich_Web_VS_CS_RS;?>'>
				<input type='text' style='display:none;' class='controlNavCS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_CN;?>'>
				<input type='text' style='display:none;' class='controlNextPrevCS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_NPB;?>'>
				<input type='text' style='display:none;' class='navTumbsCS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CS_NT;?>'>
				<input type='text' style='display:none;' class='slWV' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SL_Width;?>'>
				<input type='text' style='display:none;' class='slHV' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SL_Height;?>'>
				<input type='text' style='display:none;' class='TFSV' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_TFS;?>'>
				<input type='text' style='display:none;' class='DFSV' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_CP_DFS;?>'>
				<input type='text' style='display:none;' class='countVIDEOS' value='<?php echo count($Rich_Web_VSlider_Videos);?>'>
				<input type='text' style='display:none;' class='TitDescType' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TitDesc_Type;?>'>
				<script>
					jQuery(document).ready(function(){
						 var slWV=jQuery('.slWV').val();
						 var slHV=jQuery('.slHV').val();
						 var TFSV=jQuery('.TFSV').val();
						 var DFSV=jQuery('.DFSV').val();
						 var TitDescType=jQuery('.TitDescType').val();
						 var countVIDEOS=jQuery('.countVIDEOS').val();
						
						 function resp(){
							jQuery('#iview').css('width',slWV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('#iview').css('height',slHV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('#iview .iviewSlider').css('width',slWV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('#iview .iviewSlider').css('height',slHV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('.iview-video').css('width',slWV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('.iview-video').css('height',slHV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('.iview-video-show').css('width',slWV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('.iview-video-show').css('height',slHV*jQuery('#iview').parent().parent().width()/1000);
							jQuery('.iview-controlNav').css('width',2*parseInt(jQuery('.iview-controlNav a.iview-controlNextNav').width())+parseInt(jQuery('.iview-items').width())+20+'px');
							jQuery('.iview-items').css('display','inline-block');
							jQuery('.iview-controlNav').css('width','200px');
							
							if(jQuery('#iview').width()<=300){
								jQuery('.Desc_Tot').css('display','none');
							}else{
								jQuery('.Desc_Tot').css('display','block');
							}
							
							if(jQuery('#iview').width()<=400 || jQuery('#iview').width()<=jQuery('.iview-controlNav').width()){
							    jQuery('.iview-items').css('display','none');
							   	jQuery('.iview-controlNav').css('width','65px');
							}else{
								jQuery('.iview-items').css('display','inline-block');
								jQuery('.iview-controlNav').css('width',130+jQuery('.iview-items').width()+'px');
							}
							
							jQuery('.iview-controlNav a.iview-controlNextNav').css('width','30px');
								jQuery('.iview-controlNav a.iview-controlNextNav').css('height','24px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('width','30px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('height','24px');
								jQuery('.iview-controlNav').css('bottom','2px');
								jQuery('.iview-controlNav').css('height','24px');
							if(parseInt(jQuery('#iview').width())<=400){
								console.log(jQuery('.iview-controlNav a.iview-controlNextNav'))
								jQuery('.iview-controlNav a.iview-controlNextNav').css('width','30px');
								jQuery('.iview-controlNav a.iview-controlNextNav').css('height','24px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('width','30px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('height','24px');
								jQuery('.iview-controlNav').css('bottom','2px');
								jQuery('.iview-controlNav').css('height','24px');
							}else{
								jQuery('.iview-controlNav a.iview-controlNextNav').css('width','50px');
								jQuery('.iview-controlNav a.iview-controlNextNav').css('height','44px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('width','50px');
								jQuery('.iview-controlNav a.iview-controlPrevNav').css('height','44px');
								jQuery('.iview-controlNav').css('bottom','2px');
								jQuery('.iview-controlNav').css('height','44px');
							}
							if(TitDescType=='type1'){ 
							    jQuery('.titcol').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.caption-contain').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								//jQuery('.descCol').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								
								for(i=1;i<=countVIDEOS;i++)
								{
								    var x=jQuery('.titcol'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol'+i).attr('name');
									var y2=x2.split('');
									if(jQuery('.titcol'+i).attr('name')==''){
										jQuery('.titcol'+i).css('padding','0px');
									}
									if(jQuery('.descCol'+i).attr('name')==''){
										jQuery('.descCol'+i).css('padding','0px');
									}
									jQuery('.titcol'+i).attr('data-width',parseInt(jQuery('.titcol').css('font-size'))*y.length/1.5);
									jQuery('.descCol'+i).attr('data-width',parseInt(jQuery('.descCol').css('font-size'))*y2.length/1.5);
									jQuery('.titcol'+i).attr('data-height',2*parseInt(jQuery('.titcol').css('font-size')));
									jQuery('.descCol'+i).attr('data-height',2*parseInt(jQuery('.descCol').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol'+i).attr('data-height')+'px');
									jQuery('.titcol'+i).attr('data-x',jQuery('#iview').width()/4);
									jQuery('.titcol'+i).attr('data-y',jQuery('#iview').height()/4);
									jQuery('.descCol'+i).attr('data-x',parseInt(jQuery('.titcol'+i).attr('data-x'))+parseInt(jQuery('.titcol'+i).attr('data-width'))+2*parseInt(jQuery('.iview-caption').css('padding'))-5);
									jQuery('.descCol'+i).attr('data-y',parseInt(jQuery('.titcol'+i).attr('data-y'))+1.5*parseInt(jQuery('.titcol'+i).attr('data-height'))+2*parseInt(jQuery('.iview-caption').css('padding'))+5);
								} 
							}else if(TitDescType=='type2'){
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_2'+i).attr('name')=='' && jQuery('.descCol_2'+i).attr('name')==''){
										jQuery('.descCol_2'+i).css('display','none');
									}
								}
								jQuery('.descCol_2').attr('data-width',jQuery('#iview').width()/3);
								jQuery('.descCol_2').attr('data-height',jQuery('#iview').height());
								jQuery('.titcol_2').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_2').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_2').css('line-height',jQuery('.titcol_2').css('font-size'));
								jQuery('.descCol_2').css('line-height',jQuery('.descCol_2').css('font-size'));
							}else if(TitDescType=='type3'){
								jQuery('.titcol_3').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_3').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_3').css('line-height',parseInt(jQuery('.titcol_3').css('font-size'))+2+'px');
								jQuery('.descCol_3').css('line-height',parseInt(jQuery('.descCol_3').css('font-size'))+2+'px');
								jQuery('.descCol_3').attr('data-width',jQuery('#iview').width()/1.5);
								jQuery('.descCol_3').attr('data-height',jQuery('#iview').height()/5);
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_3'+i).attr('name')==''){
										jQuery('.titcol_3'+i).css('padding','0px');
									}
									if(jQuery('.descCol_3'+i).attr('name')==''){
										jQuery('.descCol_3'+i).css('display','none');
									}
									var x=jQuery('.titcol_3'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol_3'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol_3'+i).attr('data-width',parseInt(jQuery('.titcol_3').css('font-size'))*y.length/1.5);
									jQuery('.titcol_3'+i).attr('data-height',2*parseInt(jQuery('.titcol_3').css('font-size')));
									jQuery('.titcol_3'+i).attr('data-x',jQuery('#iview').width()/10);
									jQuery('.titcol_3'+i).attr('data-y',jQuery('#iview').height()/10);
									jQuery('.caption-contain').css('line-height',jQuery('.titcol_3'+i).attr('data-height')+'px');
									jQuery('.descCol_3'+i).attr('data-x',parseInt(jQuery('.titcol_3'+i).attr('data-x'))+2*parseInt(jQuery('.iview-caption').css('padding'))-5);
									jQuery('.descCol_3'+i).attr('data-y',parseInt(jQuery('.titcol_3'+i).attr('data-y'))+1.5*parseInt(jQuery('.titcol_3'+i).attr('data-height'))+2*parseInt(jQuery('.iview-caption').css('padding'))+5);
								} 
							}else if(TitDescType=='type4'){ 
								jQuery('.titcol_4').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_4').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_4').css('line-height',jQuery('.titcol_4').css('font-size'));
								jQuery('.descCol_4').css('line-height',jQuery('.descCol_4').css('font-size'));
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_4'+i).attr('name')==''){
										jQuery('.titcol_4'+i).css('padding','0px');
									}
									if(jQuery('.descCol_4'+i).attr('name')==''){
										jQuery('.descCol_4'+i).css('padding','0px');
									}
									var x=jQuery('.titcol_4'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol_4'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol_4'+i).attr('data-width',parseInt(jQuery('.titcol_4').css('font-size'))*y.length/1.5);
									jQuery('.descCol_4'+i).attr('data-width',parseInt(jQuery('.descCol_4').css('font-size'))*y2.length/1.5);
									jQuery('.titcol_4'+i).attr('data-height',2*parseInt(jQuery('.titcol_4').css('font-size')));
									jQuery('.descCol_4'+i).attr('data-height',2*parseInt(jQuery('.descCol_4').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol_4'+i).attr('data-height')+'px');
									jQuery('.titcol_4'+i).attr('data-x',jQuery('#iview').width()/8);
									jQuery('.titcol_4'+i).attr('data-y',jQuery('#iview').height()/2);
									jQuery('.descCol_4'+i).attr('data-x',parseInt(jQuery('.titcol_4'+i).attr('data-x'))+parseInt(jQuery('.titcol_4'+i).attr('data-width'))/2+2*parseInt(jQuery('.iview-caption').css('padding')));
									jQuery('.descCol_4'+i).attr('data-y',parseInt(jQuery('.titcol_4'+i).attr('data-y'))+1.5*parseInt(jQuery('.titcol_4'+i).attr('data-height'))+2*parseInt(jQuery('.iview-caption').css('padding')));
								} 
							}else if(TitDescType=='type5'){ 
								jQuery('.titcol_5').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_5').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_5').css('line-height',jQuery('.titcol_5').css('font-size'));
								jQuery('.descCol_5').css('line-height',jQuery('.descCol_5').css('font-size'));
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_5'+i).attr('name')==''){
										jQuery('.titcol_5'+i).css('padding','0px');
									}
									if(jQuery('.descCol_5'+i).attr('name')==''){
										jQuery('.descCol_5'+i).css('padding','0px');
									}
									var x=jQuery('.titcol_5'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol_5'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol_5'+i).attr('data-width',parseInt(jQuery('.titcol_5').css('font-size'))*y.length/1.5);
									jQuery('.descCol_5'+i).attr('data-width',parseInt(jQuery('.descCol_5').css('font-size'))*y2.length/1.5);
									jQuery('.titcol_5'+i).attr('data-height',2*parseInt(jQuery('.titcol_5').css('font-size')));
									jQuery('.descCol_5'+i).attr('data-height',2*parseInt(jQuery('.descCol_5').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol_5'+i).attr('data-height')+'px');
									jQuery('.titcol_5'+i).attr('data-x',jQuery('#iview').width()/8);
									jQuery('.titcol_5'+i).attr('data-y',jQuery('#iview').height()/1.4);
									jQuery('.descCol_5'+i).attr('data-x',parseInt(jQuery('.titcol_5'+i).attr('data-x'))+parseInt(jQuery('.titcol_5'+i).attr('data-width'))+2*parseInt(jQuery('.iview-caption').css('padding'))+20);
									jQuery('.descCol_5'+i).attr('data-y',parseInt(jQuery('.titcol_5'+i).attr('data-y')));
								} 
							}else if(TitDescType=='type6'){
								jQuery('.titcol_6').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_6').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_6').css('line-height',parseInt(jQuery('.titcol_6').css('font-size'))+2+'px');
								jQuery('.descCol_6').css('line-height',parseInt(jQuery('.descCol_6').css('font-size'))+2+'px');
								jQuery('.descCol_6').attr('data-width',jQuery('#iview').width()/1.5);
								jQuery('.descCol_6').attr('data-height',jQuery('#iview').height()/5);
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_6'+i).attr('name')==''){
										jQuery('.titcol_6'+i).css('padding','0px');
									}
									if(jQuery('.descCol_6'+i).attr('name')==''){
										jQuery('.descCol_6'+i).css('display','none');
									}
									var x=jQuery('.titcol_6'+i).attr('name');
									var y=x.split('');
									var x2=jQuery('.descCol_6'+i).attr('name');
									var y2=x2.split('');
									jQuery('.titcol_6'+i).attr('data-width',parseInt(jQuery('.titcol_6').css('font-size'))*y.length/1.5);
									jQuery('.titcol_6'+i).attr('data-height',2*parseInt(jQuery('.titcol_6').css('font-size')));
									jQuery('.caption-contain').css('line-height',jQuery('.titcol_6'+i).attr('data-height')+'px');
									jQuery('.titcol_6'+i).attr('data-x',jQuery('#iview').width()/1.5);
									jQuery('.titcol_6'+i).attr('data-y',jQuery('#iview').height()/8);
									jQuery('.descCol_6'+i).attr('data-x',parseInt(jQuery('.titcol_6'+i).attr('data-x'))/8+2*parseInt(jQuery('.iview-caption').css('padding'))-5);
									jQuery('.descCol_6'+i).attr('data-y',parseInt(jQuery('.titcol_6'+i).attr('data-y'))+1.5*parseInt(jQuery('.titcol_6'+i).attr('data-height'))+2*parseInt(jQuery('.iview-caption').css('padding'))+5);
								} 
							}else if(TitDescType=='type7'){
								for(i=1;i<=countVIDEOS;i++)
								{
									if(jQuery('.titcol_7'+i).attr('name')=='' && jQuery('.descCol_7'+i).attr('name')==''){
										jQuery('.descCol_7'+i).css('display','none');
									}
								}
								jQuery('.descCol_7').attr('data-width',jQuery('#iview').width()/3);
								jQuery('.descCol_7').attr('data-height',jQuery('#iview').height());
								jQuery('.titcol_7').css('font-size',TFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.descCol_7').css('font-size',DFSV*jQuery('#iview').parent().parent().width()/1000);
								jQuery('.titcol_7').css('line-height',jQuery('.titcol_7').css('font-size'));
								jQuery('.descCol_7').css('line-height',jQuery('.descCol_7').css('font-size'));
								jQuery('.descCol_7').attr('data-x',parseInt(jQuery('#iview').width())-parseInt(jQuery('.descCol_7').attr('data-width')));
							}
						}
						// jQuery(window).on("load",function(){
						// 	jQuery.ready.then(function() {
						// 		alert("sda");
						// 		resp();
						// 	});
							
						// })
    				 	jQuery(window).on('load resize',function(){
						    resp();
						})
					})
				</script>
			<?php } else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Slick Slider'){ ;?>
				<meta charset='utf-8'> 
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/smoothslides.theme.css',__FILE__);?>">
				<style type="text/css">
					.center
					{
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_BC;?>;
					}	
					.ss-caption-wrap
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TPos=='center'){ ?>
							top: 43%;
						<?php }else{ ?>
							<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TPos;?>: 0;
						<?php }?>
					}	
					.ss-caption
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFF;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TC;?>;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TBgC;?>;
					}	
					.smoothslides-on a.ss-prev, .smoothslides-on a.ss-next
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NPos=='center'){ ?>
							top: 44%;
						<?php }else{ ?>
							<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NPos;?>: 5px;
						<?php }?>
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NC;?>;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NBgC;?>;
						z-index:999;
					}
					.ss-paginate-wrap
					{
						text-align: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagPos;?>;
					}	
					.ss-paginate a:link, .ss-paginate a:visited
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagW;?>px;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagH;?>px;
						margin: 0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagPB;?>px;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBgC;?>;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagBR;?>px;
					}
					.ss-paginate a:hover 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagHC;?>;
					}
					.ss-paginate a.ss-paginate-current 
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagCC;?>;
					}
					.Rich_Web_VSldier_Src
					{
						position: absolute;
						top: 0;
						left: 0;
						-webkit-transform: translateX(-12000px);
					    -moz-transform: translateX(-12000px);
					    -o-transform: translateX(-12000px);
					    -ms-transform: translateX(-12000px);
					    transform: translateX(-12000px);
					    z-index: 9999;
					    -webkit-transition: all 0.7s ease-in-out;
                        -moz-transition: all 0.7s ease-in-out;
                        -o-transition: all 0.7s ease-in-out;
                        -ms-transition: all 0.7s ease-in-out;
                        transition: all 0.7s ease-in-out;
					}
					.Rich_Web_VSldier_Src_Close
					{
						position: absolute;
						top: 50%;
						right: 0;
						width: 50px;
						height: 100px;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIC;?>;
						z-index: 999999;
						border-top-left-radius: 100px;
						border-bottom-left-radius: 100px;
						text-align: center;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_VSldier_Src:hover .Rich_Web_VSldier_Src_Close
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_CIHC;?>;
					}
					.Rich_Web_VSldier_PlayIcon
					{
						position: absolute;
						top: 50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9;
					    text-align: center;
					}
					.Rich_Web_VSldier_PlayIcon span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 50px;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIC;?>;
						border-radius: 10px;
						cursor: pointer;
					}
					.center:hover .Rich_Web_VSldier_PlayIcon span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PIHC;?>;
					}
					.Rich_Web_VSldier_Src_Close span
					{
						position:relative;
						display: block;
					    top: 50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					    font-weight: bold;
					    font-size: 20px;
					}
				</style>
				<section id="demo" style='margin:25px auto'>
					<div class="center" style='max-width:100%;'>
						<div class="Rich_Web_VSldier_Src" >
							<iframe  class="Rich_Web_VSldier_Src_Iframe" src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<div class="Rich_Web_VSldier_Src_Close" onclick="Rich_Web_VSldier_Src_Clos()">
								<span> < </span>
							</div>
						</div>
						<div class="Rich_Web_VSldier_PlayIcon" onclick="Rich_Web_VSlider_Play_Video()">
							<span> ►</span>
						</div>
						<div class="smoothslides" id="myslideshow1">
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
								<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" alt="<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>" onclick="Rich_Web_VSlider_Open_Video('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>')" class="Rich_Web_VSldier_SS_Img_<?php echo $i;?>" id="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>"/>
							<?php } ?>
						</div>						
					</div>
				</section>
				<input type='text' style='display:none;' class='SLWidthSC' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_W;?>'>
				<input type='text' style='display:none;' class='SLHeightSC' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_H;?>'>
				<input type='text' style='display:none;' class='SLTitFSSC' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TFS;?>'>
				<input type='text' style='display:none;' class='SLIcSSC' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NS;?>'>
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/smoothslides.js',__FILE__);?>"></script>
				<script type="text/javascript">
					jQuery(window).load( function() {
						jQuery('#myslideshow1').smoothSlides({
							effectDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_ED*1000;?>,
							transitionDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PT;?>,
							autoPlay: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_AP=='on'){echo 'true';}else{echo 'false';}?>',
							effect: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_Eff;?>',
							effectEasing: 'ease-in-out',
							nextText: ' ►',
							prevText: '◄ ',
							captions: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_TShow=='on'){echo 'true';}else{echo 'false';}?>',
							navigation: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_NShow=='on'){echo 'true';}else{echo 'false';}?>',
							pagination: '<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_SS_PagShow=='on'){echo 'true';}else{echo 'false';}?>',
							matchImageSize: 'false'
						});
					});
				</script>
				<script>
					jQuery(document).ready(function(){
						var SLWidthSC = jQuery('.SLWidthSC').val();
						var SLHeightSC = jQuery('.SLHeightSC').val();
						var SLTitFSSC = jQuery('.SLTitFSSC').val();
						var SLIcSSC = jQuery('.SLIcSSC').val();
						
						function resp(){
							jQuery('.center').css('width',SLWidthSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_Src_Iframe').css('width','100%');
							jQuery('.Rich_Web_VSldier_Src').css('width','100%');
							jQuery('.smoothslides-on').css('width',SLWidthSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.ss-slide-stage').css('width',SLWidthSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.center').css('height',SLHeightSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_Src_Iframe').css('height','100%');
							jQuery('.Rich_Web_VSldier_Src').css('height','100%');
							jQuery('.smoothslides-on').css('height',SLHeightSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.ss-slide-stage').css('height',SLHeightSC*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_Src_Close').css('width',50*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_Src_Close').css('height',100*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_PlayIcon span').css('width',80*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_PlayIcon span').css('height',50*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_PlayIcon').css('height',50*jQuery('.center').parent().parent().width()/1000);
							jQuery('.Rich_Web_VSldier_PlayIcon span').css('line-height',jQuery('.Rich_Web_VSldier_PlayIcon span').height()+'px');
							jQuery('.Rich_Web_VSldier_PlayIcon span').css('font-size',jQuery('.Rich_Web_VSldier_PlayIcon span').height()/2+'px');
							if(parseInt(jQuery('.center').css('width'))<=450){
								jQuery('a.ss-prev').addClass('clickPrNext');
								jQuery('a.ss-next').addClass('clickPrNext');
								jQuery('.ss-caption-wrap').css('padding','0px');
								jQuery('a.ss-prev').css('font-size',SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-next').css('font-size',SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-prev').css('width',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-prev').css('height',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-next').css('width',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-next').css('height',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000);
								jQuery('a.ss-next').css('line-height',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000+'px');
								jQuery('a.ss-prev').css('line-height',3*SLIcSSC*jQuery('.center').parent().parent().width()/1000+'px');
								jQuery('.ss-caption').css('padding','0px');
								jQuery('.ss-caption').css('min-height','0px');
								jQuery('.ss-caption').css('font-size',SLTitFSSC*jQuery('.center').parent().parent().width()/450);
								jQuery('.ss-caption').css('line-height',SLTitFSSC*jQuery('.center').parent().parent().width()/450+2+'px');
							}else{
								jQuery('a.ss-prev').removeClass('clickPrNext');
								jQuery('a.ss-next').removeClass('clickPrNext');
								jQuery('.ss-caption-wrap').css('padding','5px');
								jQuery('a.ss-next').css('width',3*SLIcSSC+'px');
								jQuery('a.ss-next').css('height',3*SLIcSSC+'px');
								jQuery('a.ss-prev').css('width',3*SLIcSSC+'px');
								jQuery('a.ss-prev').css('height',3*SLIcSSC+'px');
								jQuery('a.ss-next').css('line-height',3*SLIcSSC+'px');
								jQuery('a.ss-prev').css('line-height',3*SLIcSSC+'px');
								jQuery('a.ss-prev').css('font-size',SLIcSSC+'px');
								jQuery('a.ss-next').css('font-size',SLIcSSC+'px');
								jQuery('.ss-caption').css('padding-top',SLIcSSC+'px');
								jQuery('.ss-caption').css('min-height',3*SLIcSSC+'px');
								jQuery('.ss-caption').css('font-size',SLTitFSSC+'px');
								jQuery('.ss-caption').css('line-height',SLTitFSSC+'px');
							}
						}
						jQuery(window).load(function(){
							resp();
						})
						jQuery(window).resize(function(){
							resp();
						})
					})	
				</script>
				
			<?php } else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Thumbnails Slider'){ ?>
				<link href="<?php echo plugins_url('/Style/Rich_Web_Thumbnails_Slider.css',__FILE__);?>" rel="stylesheet" type="text/css" />
				<style type="text/css">
					#gallery-con #gallery-main 
					{
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_H;?>px;
  						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BC;?>;
						box-sizing:border-box !important;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							border-top:none;
  						<?php }else{ ?>
  							border-bottom:none;
  						<?php }?>
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType=='on' && $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType==''){ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }?>
  						<?php }?>		  						
					}
					#gallery-con {
					  margin: 25px auto;
					  padding: 0;
					  border: 1px solid rgba(0, 0, 0, 0);
					  position: relative;
					  box-sizing:border-box !important;
					  width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
					}
					#gallery-con #thumbnails 
					{
						position:relative;
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
						height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIH+24;?>px;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BC;?>;
						box-sizing:border-box !important;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							border-bottom: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBC;?>;
  						<?php }else{ ?>
  							border-top: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBC;?>;
  						<?php }?>
  						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TBgC;?>;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType=='on' && $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='bottom'){ ?>
  								-webkit-box-shadow:  0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow:  0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh/2;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShType==''){ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BoxShC;?>;
  							<?php }?>
  						<?php }?>	
					}
					.Rich_Web_VSlider_TS_Src_Iframe{
						border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BC;?> !important;
						border-bottom:none !important;
						box-sizing:border-box !important;
					}
					#gallery-con #thumbnails #thumbcon
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W-110;?>px;
					}
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
						#gallery-con #thumbnails #playtoggle {
						  	position: absolute;
						    top: 140px;
						    right: 10px;
						}
					<?php }else{ ?>
						#gallery-con #thumbnails #playtoggle {
						  	position: absolute;
						    top: -40px;
						    right: 10px;
						}
					<?php }?>
					#gallery-con #thumbnails .ui-button
					{
  						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBgC;?>;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBC;?>;
  						-moz-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-webkit-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-o-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-ms-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
 						-khtml-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_IBR;?>px;
					}
					#gallery-con #thumbnails #thumbcon .thumb
					{
  						margin: 12px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIPB;?>px;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBC;?>;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBR;?>px;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShC;?>;
  							<?php }?>
  						<?php }?>
						width: auto;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIH;?>px;
						display: inline;
						opacity: 1;
						-moz-transition: all 0.5s ease;
						-webkit-transition: all 0.5s ease;
						-o-transition: all 0.5s ease;
						transition: all 0.5s ease;
						cursor: pointer;
					}
					#gallery-con #thumbnails #thumbcon .thumb:hover
					{
						border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBC;?>;
						border-style: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBS;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIHBoxShC;?>;
  							<?php }?>
  						<?php }?>	
					}
					#gallery-con #thumbnails #thumbcon .selected
					{
						border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBC;?>;
						border-style: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBS;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIBoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TICBoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#gallery-con .Rich_Web_TS_Play_Video_Div
					{
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_H;?>px;
  						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>px;
  						margin: 0 auto;
  						position: absolute;
  						left: 0;
  						right: 0;
  						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							bottom: 0;
						<?php }else{ ?>
							top: 0;
						<?php }?>
						display: none;
						z-index: 9999;
					}
					.Rich_Web_VSlider_TS_PlayIcon
					{
						position: absolute;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
  							bottom: 31%;
						<?php }else{ ?>
							top: 31%;
						<?php }?>						
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9999;
					    text-align: center;						
					}
					.Rich_Web_VSlider_TS_PlayIcon span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 50px;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIC;?>;
						border-radius: 10px;
						cursor: pointer;
					}
					#gallery-con:hover .Rich_Web_VSlider_TS_PlayIcon span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PIHC;?>;
					}						
				</style>
				<section id="gallery-con">
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='top'){ ?>
						<section id="thumbnails" style="padding:0px;">
							<div id="left-arrow" class="ui-button"><div class="icon icon-arrow-left"></div></div>
							<div id="thumbcon">
							</div>
							<div id="right-arrow" class="ui-button"><div class="icon icon-arrow-right"></div></div>
							<div id="playtoggle" class="ui-button">
								<div class="icon <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ echo 'icon-pause'; }else{ echo 'icon-play'; }?>"></div>
							</div>
						</section>
					<?php }?>
					<section id="gallery-main" class="Rich_Web_Gallery_Main">
						<img src="<?php echo $Rich_Web_VSlider_Videos[0]->Rich_Web_VSldier_Add_Img;?>" onclick="Rich_Web_VSlider_TS_Open_Video('<?php echo $Rich_Web_VSlider_Videos[0]->Rich_Web_VSldier_Add_Src;?>')"/>
					</section>
					<section id="gallery-hidden">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" onclick="Rich_Web_VSlider_TS_Open_Video('<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>')"/>
						<?php } ?>
					</section>
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos=='bottom'){ ?>
						<section id="thumbnails" style="padding:0px;">
							<div id="left-arrow" class="ui-button" onclick="Rich_Web_VSlider_TS_Close_Video()"><div class="icon icon-arrow-left"></div></div>
							<div id="thumbcon">
							</div>
							<div id="right-arrow" class="ui-button" onclick="Rich_Web_VSlider_TS_Close_Video()"><div class="icon icon-arrow-right"></div></div>
							<div id="playtoggle" class="ui-button">
								<div class="icon <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ echo 'icon-pause'; }else{ echo 'icon-play'; }?>"></div>
							</div>
						</section>
					<?php }?>
					<div class="Rich_Web_TS_Play_Video_Div">
						<iframe class="Rich_Web_VSlider_TS_Src_Iframe" src="" style='width:100%;height:100%;' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					</div>
					<div class="Rich_Web_VSlider_TS_PlayIcon" onclick="Rich_Web_VSlider_TS_Play_Video()">
						<span> ►</span>
					</div>
				</section>
				<input type='text' style='display:none;' class='marginLeft' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIPB;?>'>
				<input type='text' style='display:none;' class='SlWidth3' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>'>
				<input type='text' style='display:none;' class='SlHeight3' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_H;?>'>
				<input type='text' style='display:none;' class='carDivWidth' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>'>
				<input type='text' style='display:none;' class='carDivImgHeight' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TIH;?>'>
				<input type='text' style='display:none;' class='BW' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_BW;?>'>
				<input type='text' style='display:none;' class='carTopLeft' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_TPos;?>'>				
				
				<script defer >
					var $transitionLength = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_CS;?>;
					var $timeBetweenTransitions = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_PT*1000;?>;
					//STORAGE
					var imageCount = 0;
					var currentImageIndex = 0;
					var currentScrollIndex = 1;
					var $imageBank = [];
					var $thumbBank = [];
					var $mainContainer = jQuery("#gallery-main");
					var $thumbContainer = jQuery("#thumbcon");
					var $progressBar = jQuery("#progressbar");
					var currentElement;
					//CONTROLS
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_AP=='on'){ ?>
						var $go = true;
					<?php }else{ ?>
						var $go = false;
					<?php }?>
					jQuery(document).ready(function(){
						jQuery("#gallery-hidden img").each(function() {
							$imageBank.push(jQuery(this).attr("id", imageCount));
							imageCount++;
						});
						generateThumbs();
						setTimeout(function () {
							imageScroll(0);
						}, $timeBetweenTransitions);
						jQuery('#left-arrow').click(function () {
							thumbScroll("left");
							toggleScroll(true);
					    });
						jQuery('#right-arrow').click(function () {
							thumbScroll("right");
							toggleScroll(true);
					    });
						jQuery('#thumbcon img').on('click',function () {

							imageFocus(this);
						});
						jQuery('#playtoggle').click(function () {
							toggleScroll(false);
						});
					});
					function progress(imageIndex){
						var parts = <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_TS_W;?>/imageCount-1;
						var pxProgress = parts*(imageIndex+1);

						$progressBar.css({ width: pxProgress , transition: "all 0.7s ease"});
					}
					function imageFocus(focus){
						for(var i = 0; i < imageCount; i++){
							if($imageBank[i].attr('src') == jQuery(focus).attr('src')){
								$mainContainer.fadeOut($transitionLength);
								$thumbBank[currentImageIndex].removeClass("selected");
								setTimeout(function () {
									$mainContainer.html($imageBank[i]);
									$thumbBank[i].addClass("selected");
									$mainContainer.fadeIn($transitionLength);
								}, $transitionLength);
								currentScrollIndex = i+1;
								currentImageIndex = i;
								progress(currentImageIndex);
								toggleScroll(true);
								return false;
							}
						}
					}
					function toggleScroll(bool){
						if($go){
							$go = false;
							jQuery('#playtoggle').children().removeClass('icon-pause').addClass('icon-play');
						}else{
							$go = true;
							jQuery('#playtoggle').children().removeClass('icon-play').addClass('icon-pause');
						}
						if(bool){
							$go = false;
							jQuery('#playtoggle').children().removeClass('icon-pause').addClass('icon-play');
						}
					}
					var y=false;
					function autoScroll(){
						if(y==true){
							return;
						}
						var imgW=jQuery('#gallery-con #thumbnails #thumbcon .thumb').width();
						var mLeft=jQuery('.marginLeft').val();
						AutImgW=parseInt(imgW)+2*parseInt(jQuery('#gallery-con #thumbnails #thumbcon .thumb').css('border-width'))+2*parseInt(mLeft);
						var tumCWidth=jQuery('#gallery-con #thumbnails #thumbcon').width();
						if(currentScrollIndex >= 0 || currentScrollIndex < imageCount){
							if(parseInt($thumbBank[0].css('margin-left'))<=-parseInt((imageCount)*AutImgW-parseInt(tumCWidth))){
									$thumbBank[0].css({ marginLeft: "5px" , transition: "all 1.0s ease"});
									currentScrollIndex = 1;
								}else{
									$thumbBank[0].css({ marginLeft: "-="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex++;
								}
						}
					}
					function thumbScroll(direction){
						if(y==true){
							return;
						}
						y=true;
						var imgW=jQuery('#gallery-con #thumbnails #thumbcon .thumb').width();
						var mLeft=jQuery('.marginLeft').val();
						AutImgW=parseInt(imgW)+2*parseInt(jQuery('#gallery-con #thumbnails #thumbcon .thumb').css('border-width'))+2*parseInt(mLeft);
						var tumCWidth=jQuery('#gallery-con #thumbnails #thumbcon').width();
						if(currentScrollIndex >= 0 || currentScrollIndex < imageCount){
							var marginTemp = currentScrollIndex;
							var k=0;
							if(direction == "left"){
								if(currentScrollIndex-1 <= 0){
									k = ((imageCount)*AutImgW-parseInt(tumCWidth));
									$thumbBank[0].css({ marginLeft: -k , transition: "all 1.0s ease"});
									currentScrollIndex = imageCount-1;
								}else{
									$thumbBank[0].css({ marginLeft: "+="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex--;
								}
							}else if(direction == "right"){
								if(parseInt($thumbBank[0].css('margin-left'))<=-parseInt((imageCount)*AutImgW-parseInt(tumCWidth))){
									$thumbBank[0].css({ marginLeft: "5px" , transition: "all 1.0s ease"});
									currentScrollIndex = 1;
								}else{
									$thumbBank[0].css({ marginLeft: "-="+AutImgW+"" , transition: "all 1.0s ease"});
									currentScrollIndex++;
								}
							}
						}
						setTimeout(function(){
							y=false;
						},1000)
					}
					function generateThumbs(){
						progress(currentImageIndex);
						for(var i = 0; i < imageCount; i++){
							var $tempObj = jQuery('<img id="'+i+'t" class="thumb" src="'+$imageBank[i].attr('src')+'" alt="'+$imageBank[i].attr('onclick').split("('")[1].split("')")[0]+'" onclick="Rich_Web_VSlider_TS_Close_Video()"/>');
							if(i == 0)
								$tempObj.addClass("selected");
							$thumbContainer.append($tempObj);
							$thumbBank.push($tempObj);
						}
					}
					function imageScroll(c){
						if($go){
							$thumbBank[c].removeClass("selected");
							c++
							if(c == $imageBank.length)
								c = 0;
							$mainContainer.fadeOut($transitionLength);
							setTimeout(function () {
								$mainContainer.html($imageBank[c]);
								$thumbBank[c].addClass("selected");
								autoScroll("left");
								$mainContainer.fadeIn($transitionLength);
							}, $transitionLength);
						}
						progress(c);
						setTimeout(function () {
							imageScroll(currentImageIndex);
						}, $timeBetweenTransitions);
						currentImageIndex = c;
					}
				</script>
				<script>
					jQuery(document).ready(function(){
						var SlWidth3 = jQuery('.SlWidth3').val();
						var SlHeight3 = jQuery('.SlHeight3').val();
						var carDivWidth = jQuery('.carDivWidth').val();
						var carDivImgHeight = jQuery('.carDivImgHeight').val();
						var BW = jQuery('.BW').val();
						var carTopLeft = jQuery('.carTopLeft').val();						
						function resp(){
							jQuery('#gallery-con').css('width',SlWidth3*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-main').css('width',SlWidth3*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-main').css('height',SlHeight3*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-con #thumbnails').css('width',SlWidth3*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div').css('width',SlWidth3*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div').css('height',SlHeight3*jQuery('#gallery-con').parent().width()/1000);							
							jQuery('#gallery-con #thumbnails #thumbcon .thumb').css('height',carDivImgHeight*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));
							jQuery('#gallery-con #thumbnails').css('height',carDivImgHeight*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250)+24);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon span').css('width',80*jQuery('#gallery-con').parent().width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon span').css('height',50*jQuery('#gallery-con').parent().width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon span').css('font-size',25*jQuery('#gallery-con').parent().width()/1000);
							jQuery('.Rich_Web_VSlider_TS_PlayIcon span').css('line-height',50*jQuery('#gallery-con').parent().width()/1000+'px');
							jQuery('.Rich_Web_VSlider_TS_PlayIcon').css('height',50*jQuery('#gallery-con').parent().width()/1000);
							jQuery('#gallery-con #thumbnails .ui-button').css('width',32*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));
							jQuery('#gallery-con #thumbnails .ui-button').css('height',32*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));
							if(carTopLeft=='bottom'){
								jQuery('#gallery-con #thumbnails #playtoggle').css('top',-40*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));
							}else{
								jQuery('#gallery-con #thumbnails #playtoggle').css('top',carDivImgHeight*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250)+26);
							}							
							jQuery('#gallery-con #thumbnails #playtoggle').css('right',10*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));
							jQuery('#gallery-con #thumbnails #thumbcon').css('width',carDivWidth*(jQuery('#gallery-con').parent().width())/1000-(25+2*BW)-64*jQuery('#gallery-con').parent().width()/(jQuery('#gallery-con').parent().width()+250));							
						}						
						jQuery("#gallery-con").load(function(){
							resp();
						})						
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
 		 	<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Carousel/Content Popup'){ ?>
				<link href="<?php echo plugins_url('/Style/carSt.css',__FILE__);?>" rel="stylesheet" type="text/css" />
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/jquery.anoslide.js',__FILE__);?>"></script>
				<style type="text/css">
					.carousel { position:relative; min-height: 20px; height:auto !important;  background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Bg_Color;?> center center no-repeat;border:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Border_Color;?>;box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Box_Shadow;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Shadow_Color;?>;}
					.wrap {
						padding-left: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_PBImgs;?>px;
						padding-right: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_PBImgs;?>px;
						width:100% !important;
					}
					.carousel .next,
					.carousel .prev { display:none; width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size;?>px; height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size;?>px; position:absolute; bottom:0px; z-index:9999; cursor:pointer; border:none; }
					.carousel .prev {background:url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'.png',__FILE__);?>) 0 0 no-repeat;background-size:100% 100%; top:50%; transform:translateY(-50%); -webkit-transform:translateY(-50%); -ms-transform:translateY(-50%); left:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size/2;?>px;}
					.carousel .next {background:url(<?php echo plugins_url('/Images/icons/icon-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'-'. $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Type .'.png',__FILE__);?>) 0 0 no-repeat;background-size:100% 100%;right:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Icons_Size/2;?>px; top:50%;transform:translateY(-50%); -webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);}
					.carousel li { display:none; padding:0px !important;background:none !important; }
					.carousel li img { width:100%; height:auto; max-width:none;}
					.paging { position:absolute; z-index:9998; }
					.paging > a { display:block; cursor:pointer; width:40px; height:40px; float:left; background:url(<?php echo plugins_url('/Images/dots.png',__FILE__);?>) 0px -40px no-repeat; }
					.paging > a:hover,
					.paging > a.current { background:url(<?php echo plugins_url('/Images/dots.png',__FILE__);?>) 0px 0px no-repeat;  }
					img {
					  -webkit-user-select: none;  /* Chrome all / Safari all */
					  -moz-user-select: none;     /* Firefox all */
					  -ms-user-select: none;      /* IE 10+ */
					  -o-user-select: none;
					  user-select: none;    
					}
					.popF1{
						position:fixed;
						background:red;
						left:0px;
						width:100%;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						height:0%;
						z-index:99999999;
						-webkit-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popF1_1{
						height:100% !important;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1{
						position:fixed;
						background:#fff;
						left:50%;
						width:0%;
						top:50%;
						border-radius:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						height:0%;
						z-index:99999999;
						box-shadow:0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Box_Shadow;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Shadow_Color;?>;
						-webkit-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 500ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1_1{
						height:500px;
						width:1000px;
						max-width:90%;
						border-radius:0%;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1_2{
						height:420px;
						width:560px;
						max-width:90%;
						border-radius:0%;
						-webkit-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-moz-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						-o-transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035); 
						transition: all 400ms cubic-bezier(0.950, 0.050, 0.795, 0.035);
					}
					.popVideo1_rel{
						position:relative;
						overflow:hidden;
						width:100%;
						height:100%;
					}
					.vid{
						position:relative;
						width:50%;
						height:60%;
						float:left;
						margin:2%;
					}
					.videoo{
						position:absolute;
						top:-150%;
						left:0px;
						width:100%;
						height:100%;
						-webkit-transition: all 350ms linear; 
						-moz-transition: all 350ms linear; 
						-o-transition: all 350ms linear; 
						transition: all 350ms linear;
					}
					.videoo_anim{
						top:0% !important;
						-webkit-transition: all 250ms linear; 
						-moz-transition: all 250ms linear; 
						-o-transition: all 250ms linear; 
						transition: all 250ms linear;
					}
					.titleDescLink{
						position:relative;
						width:40%;
						height:90%;
						float:right;
						margin:2%;
						overflow:hidden;
					}
					.descr{
						position:absolute;
						margin:0px 10px 0px 10px;
						margin-bottom:0px;
					}
					.titleDescLink_anim{
						position:absolute;
						width:100%;
						height:100%;
						left:100%;
						background:red;
						overflow-x:hidden;
						-webkit-transition: all 350ms linear; 
						-moz-transition: all 350ms linear; 
						-o-transition: all 350ms linear; 
						transition: all 350ms linear;
					}
					.titleDescLink_anim2{
						left:0px !important;
						-webkit-transition: all 250ms linear; 
						-moz-transition: all 250ms linear; 
						-o-transition: all 250ms linear; 
						transition: all 250ms linear;
					}	
					.titleDescLink3{
						width:100% !important;
						height:28% !important;
						float:none !important;
						margin:0px !important;
					}
					.titleDescLink3 h2{
						text-align:center !important;
					}
					.popL{
						position: absolute;
						right: 0px;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Size;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Family;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Color;?>;
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Bg_Color;?>;
						bottom: 0px;
						border-radius:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Radius;?>px;
						transform:translateY(120%);
						-webkit-transform:translateY(120%);
						-ms-transform:translateY(120%);
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Color;?>;
						border-width:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px !important;
						text-decoration: none !important;
						padding: 3px 10px;
						display:none;
						transition:all 0.4s linear;
						z-index:9999;
					}
					.popL:hover{
						background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Bg_Color;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Color;?>;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Width;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Border_Style;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Hov_Border_Color;?>;
						text-decoration:none;
					}
					.minTit{
						position: absolute;
						left: 0px;
						font-size: 20px;
						bottom: 0px;
						transform:translateY(120%);
						-webkit-transform:translateY(120%);
						-ms-transform:translateY(120%);
						padding: 3px 10px;
						display:none;
					}
					.figurForImg{
						width:100%;
						height:100%;
						overflow:hidden;
						margin-left:0%;
						margin:0px;
					}
					.fImgH1{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						max-width:none;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH1:hover {
						width:150%;
						margin-left:-25%;
						margin-top:-25%;
					}
					.fImgH2{
						position:relative;
						transform:rotate(0deg);
						-webkit-transform:rotate(0deg);
						-ms-transform:rotate(0deg);
						width:100%;
						height:50px;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.2s ease-in;
						-webkit-transition:all 0.2s ease-in;
						-ms-transition:all 0.2s ease-in;
					}
					.fImgH2:hover{
						transform:rotate(45deg);
						-webkit-transform:rotate(45deg);
						-ms-transform:rotate(45deg);
						width:250%;
						margin-left:-25%;
						margin-top:-15%;
					}
					.fImgH3{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH3:hover {
						width:150%;
					}
					.fImgH4{
						width:100%;
						margin-left:0%;
						margin-top:0%;
						transition:all 0.4s ease-in;
						-webkit-transition:all 0.4s ease-in;
						-ms-transition:all 0.4s ease-in;
					}
					.fImgH4:hover {
						width:150%;
						margin-left:-50%;
					}
					.titleDescLink_anim::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.titleDescLink_anim::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Bg_Color;?>;
					}
					.titleDescLink_anim::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;
					}
					.comment_content ul li:before, .entry-content ul li:before{
						display:none;
					}
				</style>
				<div class="wrapper">
					<div class="carousel" data-mixed>
						<a class="prev" data-prev></a>
						<ul class='forPoppUll' style='list-style:none;margin:5px;padding:0px;'>
							<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
								<li class='forPopp' onclick='popp("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>","<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>","<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?>","<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>","<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT;?>")' >
									<div class="wrap" >
										<figure class='figurForImg'>
											<img class='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Imgs_Hover_Type;?>'  src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>"  />
										</figure>
									</div>
								</li>
							<?php } ?>
						</ul>
						<a class="next" data-next ></a>
					</div>
				</div>
				<div class='popF1' onclick='delPopp()' style='background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Overlay_Bg_Color;?>;'></div>
				<div class='popVideo1' style='opacity:0;background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Bg_Color;?>;border-style:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Style;?>;border-color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Color;?>;'>
				<i class='rich_web <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Type;?>' id='IconForPop' style='position:absolute;top:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size/3*2;?>px;font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size;?>px;right:<?php echo -$Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Size/3*2;?>px;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Icons_Color;?>;cursor:pointer;z-index:2;display:none;' onclick='delPopp()'>
				</i>
					<div class='popVideo1_rel'>
						<div class='vid'>
							<iframe class='videoo' src="" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							<a href='#' class='popL'>
								<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Text;?>
							</a>
							<span class='minTit' style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Color;?>;'>
							</span>
						</div>
						<div class='titleDescLink'>
							<div class='titleDescLink_anim' style='background:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Bg_Color;?>;'>
								<h2 class='tit' style='pasdding:0px;margin:0px;margin-bottom:20px;text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Text_Align;?>;font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Color;?>;'>
								</h2>
								<p class='descr' style='font-size:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Size;?>px;font-family:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Family;?>;color:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Color;?>;text-align:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Text_Align;?>'>
								</p>
							</div>
						</div>
					</div>
				</div>
				<input type='text' style='display:none;' class='imgCols' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Car_Count_Imgs;?>' />
				<input type='text' style='display:none;' class='imgCount' value='<?php echo count($Rich_Web_VSlider_Videos);?>' />
				<input type='text' style='display:none;' class='poppTitleFS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Title_Font_Size;?>' />
				<input type='text' style='display:none;' class='poppDescFS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Desc_Font_Size;?>' />
				<input type='text' style='display:none;' class='poppLinkFS' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Link_Font_Size;?>' />
				<script>
					var poppTitleFS=jQuery('.poppTitleFS').val();
					var poppDescFS=jQuery('.poppDescFS').val();
					var poppLinkFS=jQuery('.poppLinkFS').val();
					function resp2(){
						if(jQuery(window).width()<=1100){
							jQuery('.tit').css('font-size',poppTitleFS*jQuery(window).width()/1100);
							jQuery('.minTit').css('font-size',poppTitleFS*jQuery(window).width()/1100);
							jQuery('.descr').css('font-size',poppDescFS*jQuery(window).width()/1100);
							jQuery('.descr').css('line-height',parseInt(jQuery('.descr').css('font-size'))+2+'px');
							jQuery('.tit').css('margin-bottom',20*jQuery(window).width()/1100);
							jQuery('.popL').css('font-size',poppLinkFS*jQuery(window).width()/1100);
							jQuery('.popL').css('line-height',jQuery('.popL').css('font-size'));
						}
					}
					jQuery(window).load(function(){
						resp2();
					})
					jQuery(window).resize(function(){
						resp2();
					})
					var y=false;
					function popp(src,title,desc,link,Ont){
						y=true;
						jQuery('.popF1').addClass('popF1_1');
						jQuery('.videoo').attr('src',src);
						jQuery('.tit').text(title);
						jQuery('.descr').text(desc);
						setTimeout(function(){
							if(desc==''){
								jQuery('.titleDescLink').css('display','none');
								jQuery('.popVideo1').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/2+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
									jQuery('.videoo').addClass('videoo_anim');
								});
								jQuery('.vid').css({'width':'100%','margin':'0px','height':'80%',});
								jQuery('.minTit').css('display','block');
								jQuery('.minTit').text(title);
								jQuery('.popL').css('right','5px');
								jQuery('#IconForPop').css('display','block');
								if(link!=''){
									jQuery('.popL').css('display','block');
									jQuery('.popL').attr('href',link);
									jQuery('.popL').attr('target',Ont);
								}else{
									jQuery('.popL').css('display','none');
								}
								jQuery(window).resize(function(){
									if(y==true){
										jQuery('.popVideo1').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/2+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
											jQuery('.videoo').addClass('videoo_anim');
										});
									}
									
								})
							}else{
								jQuery('.titleDescLink').css('display','block');
								
								if(jQuery(window).width()<=600){
									jQuery('.popVideo1').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/1.5+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
										jQuery('.videoo').addClass('videoo_anim');
									});
									jQuery('.vid').css({'width':'100%','margin':'0px','height':'70%',});
									jQuery('.titleDescLink_anim').addClass('titleDescLink_anim2');
									jQuery('.titleDescLink').addClass('titleDescLink3');
									//jQuery('.minTit').css('display','block');
									//jQuery('.minTit').text(title);
									jQuery('.popL').css('right','5px');
									jQuery('#IconForPop').css('display','block');
									if(link!=''){
										jQuery('.popL').css('display','block');
										jQuery('.popL').attr('href',link);
										jQuery('.popL').attr('target',Ont);
									}else{
										jQuery('.popL').css('display','none');
									}
									jQuery(window).resize(function(){
										if(y==true){
											jQuery('.popVideo1').animate({"opacity":"1","height":"400px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/1.5+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
												jQuery('.videoo').addClass('videoo_anim');
											});
										}
										
									})
								}else{
									jQuery('.vid').css('height','70%');
									jQuery('.popVideo1').animate({'opacity':'1','height':'500px','width':'1000px','max-width':'85%','border-radius':'0%','max-height':jQuery(window).width()/3+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400,function(){
										jQuery('.videoo').addClass('videoo_anim');
										if(desc==''){
											jQuery('.titleDescLink').css('display','none');
										}else{
											jQuery('.titleDescLink_anim').addClass('titleDescLink_anim2');
										}
										if(link!=''){
											jQuery('.popL').css('display','block');
											jQuery('.popL').attr('href',link);
											jQuery('.popL').attr('target',Ont);
										}else{
											jQuery('.popL').css('display','none');
										}
										jQuery('#IconForPop').css('display','block');
										jQuery('.minTit').css('display','none');
										jQuery('.popL').css('right','0px');
									});	
									jQuery(window).resize(function(){
										if(y==true){
											jQuery('.popVideo1').animate({"opacity":"1","height":"500px","width":"560px","max-width":"85%","border-radius":"0%",'max-height':jQuery(window).width()/3+'px','border-width':'<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VC_Popup_Border_Width;?>px'},400);
										}
										
									})				
								}
												
							}
						},150)
					}
					
					function delPopp(){
						y=false;
						jQuery('#IconForPop').css('display','none');
						jQuery('.popL').css('display','none');
						jQuery('.minTit').css('display','none');
						jQuery('.videoo').removeClass('videoo_anim');
						jQuery('.titleDescLink_anim').removeClass('titleDescLink_anim2');
						//jQuery('.popVideo1_rel').find('.videoo').attr('src','');
						jQuery('.videoo').attr('src','');
						setTimeout(function(){
							jQuery('.popVideo1').animate({'opacity':'0','height':'0px','width':'0px','max-width':'85%','border-radius':'50%','max-height':jQuery(window).width()/3+'px','border-width':'0px',},100);	
						},150)
						setTimeout(function(){
							jQuery('.popF1').removeClass('popF1_1');
							jQuery('.titleDescLink').css('display','block');
							jQuery('.vid').css({'width':'50%','margin':'2%'})
						},250)
					}
				</script>
				<script type="text/javascript">
					var sum=0;
					var imgCols = jQuery('.imgCols').val();
					var imgCount = jQuery('.imgCount').val();
					if(imgCount<imgCols){
						sum=imgCount;
					}else{
						sum=imgCols;
					}
					jQuery('.carousel[data-mixed] ul').anoSlide(
					{
						items: parseInt(sum),
						speed: 500,
						prev: 'a.prev[data-prev]',
						next: 'a.next[data-next]',
						lazy: true,
						delay: 100
					})
					function resp(){
						jQuery('.forPoppUll').css('min-height',jQuery('.forPopp').innerWidth()/1.853-3+'px');
						jQuery('.forPoppUll').css('max-height',jQuery('.forPopp').innerWidth()/1.853-3+'px');
					}
					jQuery(window).load(function(){
						resp();
					})
					jQuery(window).resize(function(){
						resp();
					})
				</script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Simple Video Slider'){ ?>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/Simple_Video_Slider.css',__FILE__);?>">
				<style media="screen">
					.RichWeb_SVS{
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BC;?>;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								-moz-box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								box-shadow: 0 38px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxSh;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_BoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>
					{
						max-width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_W;?>px;
					}
					.iis-bullet-nav 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_Show!='on'){ ?> 
							display: none;
						<?php }?>
						<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_Pos;?>: 5%;
					}
					.iis-bullet-nav a 
					{
						width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_W;?>px;
						height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_H;?>px;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_BR;?>px;
						margin:0 <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_PB;?>px;
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_C;?>;
					}
					.iis-bullet-nav a.iis-bullet-active
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_CC;?>; 
					}
					.iis-bullet-nav a:hover 
					{ 
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Nav_HC;?>; 
					}
					.iis-caption 
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TBgC;?>;
					}
					.iis-caption .iis-caption-content span
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TC;?>;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFF;?>;
						display:block;
						text-align:center;
					}
					.iis-caption .iis-caption-content p
					{
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFS;?>px;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFF;?>;
						text-align: justify;
					}
					.iis-caption .iis-caption-content a
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LFF;?>;
						text-decoration: underline;
						border: 0;
					}
					.iis-caption .iis-caption-content a:hover
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LHC;?>;
					}
					.RichWeb_SVS
					{
						position: relative;
						max-width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_W;?>px;
						margin: 20px auto;
					}
					.Rich_Web_SVS_Nav
					{
						position: absolute;
					    top: 50%;
					    z-index: 999999;
					    display:<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Show=='on'){ echo 'block !important';}else{ echo 'none !important';}?>;
					    text-align: center;
					    background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_C;?>;
					    padding: 10px 15px;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_S;?>px;
					    text-decoration: none;
					    cursor: pointer;
					    border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BC;?>;
					    border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_BR;?>px;
					    opacity: 0;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_SVS_Nav:hover
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_C;?>;
					}
					.Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>
					{
						left: 2%;
					}
					.Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>
					{
						right: 2%;
					}
					.RichWeb_SVS iframe
					{
						width: 100%;
						height: 100%;
						position: absolute;
						top: 0;
						left: 0;
						z-index: -1;
					}
					.Rich_Web_VSlider_SVS_PlayIcon
					{
						position: absolute;
						top: 50%;
						left: 0;
						width: 100%;
						height: 50px;
					    z-index: 9999;
					    text-align: center;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
					}
					.Rich_Web_VSlider_SVS_PlayIcon span
					{
						display: block;
						text-align:center;
						width: 80px;
						height: 100%;
						line-height: 50px;
						margin: 0 auto;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIC;?>;
						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIBR;?>px;
						cursor: pointer;
					}
					.RichWeb_SVS:hover .Rich_Web_VSlider_SVS_PlayIcon span
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIHBgC;?> !important;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PIHC;?> !important;
					}
					.iis-has-bullet-nav .iis-caption::-webkit-scrollbar 
					{
						width: 0.5em;
					}
					.iis-has-bullet-nav .iis-caption::-webkit-scrollbar-track 
					{
						-webkit-box-shadow: inset 0 0 6px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TBgC;?>;
					}
					.iis-has-bullet-nav .iis-caption::-webkit-scrollbar-thumb {
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
						outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DC;?>;
					}
					.Rich_Web_SVS_Nav{
						
					}
				</style>
				<div class="RichWeb_SVS RichWeb_SVS_<?php echo $Rich_Web_Video;?>">
					<div id="Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>">
						<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
							<img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" data-src-2x="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>" data-caption="#caption-<?php echo $Rich_Web_Video . $i?>"/>
						<?php } ?>
					</div>
					<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on' || $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
							<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' || $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != ''){ ?>
								<div id="caption-<?php echo $Rich_Web_Video . $i?>" style="display:none;">
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_T_Show == 'on'){ ?>
										<span><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></span>
									<?php }?>
									<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc != '' && $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_D_Show == 'on'){ ?>
										<p><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?></p>
										<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?>
											<a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){ echo '_blank'; } ?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_LText;?></a>
										<?php }?>
									<?php }?>							
								</div>
							<?php }?>
						<?php }?>
					<?php } ?>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Prev Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>" onclick="RIch_Web_SVS_Close_Video()"><i class='rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type;?>-left' ></i></a>
					<a class="Rich_Web_SVS_Nav Rich_Web_SVS_Next Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>" onclick="RIch_Web_SVS_Close_Video()"><i class='rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Type;?>-right' ></i></a>
					<iframe src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<div class="Rich_Web_VSlider_SVS_PlayIcon" >
						<span onclick="RIch_Web_SVS_Play_Video(<?php echo $Rich_Web_Video;?>)"> ►</span>
					</div>
				</div>
				<input type='text' style='display:none;' class='RichVSTitle' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_TFS;?>'>
				<input type='text' style='display:none;' class='RichVSDesc' value='<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_DFS;?>'>
				<script type="text/javascript">
					var IdealImageSlider = (function() {
						"use strict";
						var _requestAnimationFrame = function(win, t) {
							return win["r" + t] || win["webkitR" + t] || win["mozR" + t] || win["msR" + t] || function(fn) {
								setTimeout(fn, 1000 / 60);
							};
						}(window, 'equestAnimationFrame');
						var _requestTimeout = function(fn, delay) {
							var start = new Date().getTime(),
								handle = {};
							function loop() {
								var current = new Date().getTime(),
									delta = current - start;
								if (delta >= delay) {
									fn.call();
								} else {
									handle.value = _requestAnimationFrame(loop);
								}
							}
							handle.value = _requestAnimationFrame(loop);
							return handle;
						};
						var _isType = function(type, obj) {
							var _class = Object.prototype.toString.call(obj).slice(8, -1);
							return obj !== undefined && obj !== null && _class === type;
						};
						var _isInteger = function(x) {
							return Math.round(x) === x;
						};
						var _deepExtend = function(out) {
							out = out || {};
							for (var i = 1; i < arguments.length; i++) {
								var obj = arguments[i];
								if (!obj)
									continue;
								for (var key in obj) {
									if (obj.hasOwnProperty(key)) {
										if (_isType('Object', obj[key]) && obj[key] !== null)
											_deepExtend(out[key], obj[key]);
										else
											out[key] = obj[key];
									}
								}
							}
							return out;
						};
						var _hasClass = function(el, className) {
							if (!className) return false;
							if (el.classList) {
								return el.classList.contains(className);
							} else {
								return new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
							}
						};
						var _addClass = function(el, className) {
							if (!className) return;
							if (el.classList) {
								el.classList.add(className);
							} else {
								el.className += ' ' + className;
							}
						};
						var _removeClass = function(el, className) {
							if (!className) return;
							if (el.classList) {
								el.classList.remove(className);
							} else {
								el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
							}
						};
						var _toArray = function(obj) {
							return Array.prototype.slice.call(obj);
						};
						var _arrayRemove = function(array, from, to) {
							var rest = array.slice((to || from) + 1 || array.length);
							array.length = from < 0 ? array.length + from : from;
							return array.push.apply(array, rest);
						};
						var _addEvent = function(object, type, callback) {
							if (object === null || typeof(object) === 'undefined') return;

							if (object.addEventListener) {
								//object["on" + type] = callback;
								object.addEventListener(type, callback, false);
							} else if (object.attachEvent) {
								object.attachEvent("on" + type, callback);
							} else {
								object["on" + type] = callback;
							}
						};
						var _loadImg = function(slide, callback) {
							if (!slide.style.backgroundImage) {
								var img = new Image();
								img.setAttribute('src', slide.getAttribute('data-src'));
								img.onload = function() {
									slide.style.backgroundImage = 'url(' + slide.getAttribute('data-src') + ')';
									slide.setAttribute('data-actual-width', this.naturalWidth);
									slide.setAttribute('data-actual-height', this.naturalHeight);
									if (typeof(callback) === 'function') callback(this);
								};
							}
						};
						var _isHighDPI = function() {
							var mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";
							if (window.devicePixelRatio > 1)
								return true;
							if (window.matchMedia && window.matchMedia(mediaQuery).matches)
								return true;
							return false;
						};
						var _translate = function(slide, dist, speed) {
							slide.style.webkitTransitionDuration =
								slide.style.MozTransitionDuration =
								slide.style.msTransitionDuration =
								slide.style.OTransitionDuration =
								slide.style.transitionDuration = speed + 'ms';
							slide.style.webkitTransform =
								slide.style.MozTransform =
								slide.style.msTransform =
								slide.style.OTransform = 'translateX(' + dist + 'px)';
						};
						var _unTranslate = function(slide) {
							slide.style.removeProperty('-webkit-transition-duration');
							slide.style.removeProperty('transition-duration');
							slide.style.removeProperty('-webkit-transform');
							slide.style.removeProperty('-ms-transform');
							slide.style.removeProperty('transform');
						};
						var _animate = function(item) {
							var duration = item.time,
								end = +new Date() + duration;
							var step = function() {
								var current = +new Date(),
									remaining = end - current;
								if (remaining < 60) {
									item.run(1); //1 = progress is at 100%
									return;
								} else {
									var progress = 1 - remaining / duration;
									item.run(progress);
								}
								_requestAnimationFrame(step);
							};
							step();
						};
						var _setContainerHeight = function(slider, shouldAnimate) {
							if (typeof shouldAnimate === 'undefined') {
								shouldAnimate = true;
							}
							if (_isInteger(slider.settings.height)) {
								return;
							}
							var currentHeight = Math.round(slider._attributes.container.offsetHeight),
								newHeight = currentHeight;
							if (slider._attributes.aspectWidth && slider._attributes.aspectHeight) {
								newHeight = (slider._attributes.aspectHeight / slider._attributes.aspectWidth) * slider._attributes.container.offsetWidth;
							} else {
								var width = slider._attributes.currentSlide.getAttribute('data-actual-width');
								var height = slider._attributes.currentSlide.getAttribute('data-actual-height');
								if (width && height) {
									newHeight = (height / width) * slider._attributes.container.offsetWidth;
								}
							}
							var maxHeight = parseInt(slider.settings.maxHeight, 10);
							if (maxHeight && newHeight > maxHeight) {
								newHeight = maxHeight;
							}
							newHeight = Math.round(newHeight);
							if (newHeight === currentHeight) {
								return;
							}
							if (shouldAnimate) {
								_animate({
									time: slider.settings.transitionDuration,
									run: function(progress) {
										slider._attributes.container.style.height = Math.round(progress * (newHeight - currentHeight) + currentHeight) + 'px';
									}
								});
							} else {
								slider._attributes.container.style.height = newHeight + 'px';
							}
						};
						var _touch = {
							vars: {
								start: {},
								delta: {},
								isScrolling: undefined,
								direction: null
							},
							start: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								var touches = event.touches[0];
								_touch.vars.start = {
									x: touches.pageX,
									y: touches.pageY,
									time: +new Date()
								};
								_touch.vars.delta = {};
								_touch.vars.isScrolling = undefined;
								_touch.vars.direction = null;
								this.stop(); // Stop slider
								this.settings.beforeChange.apply(this);
								_addClass(this._attributes.container, this.settings.classes.touching);
							},
							move: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								if (event.touches.length > 1 || event.scale && event.scale !== 1) return;
								var touches = event.touches[0];
								_touch.vars.delta = {
									x: touches.pageX - _touch.vars.start.x,
									y: touches.pageY - _touch.vars.start.y
								};
								if (typeof _touch.vars.isScrolling == 'undefined') {
									_touch.vars.isScrolling = !!(_touch.vars.isScrolling || Math.abs(_touch.vars.delta.x) < Math.abs(_touch.vars.delta.y));
								}
								if (!_touch.vars.isScrolling) {
									event.preventDefault(); // Prevent native scrolling
									_translate(this._attributes.previousSlide, _touch.vars.delta.x - this._attributes.previousSlide.offsetWidth, 0);
									_translate(this._attributes.currentSlide, _touch.vars.delta.x, 0);
									_translate(this._attributes.nextSlide, _touch.vars.delta.x + this._attributes.currentSlide.offsetWidth, 0);
								}
							},
							end: function(event) {
								if (_hasClass(this._attributes.container, this.settings.classes.animating)) return;
								var duration = +new Date() - _touch.vars.start.time;
								var isChangeSlide = Number(duration) < 250 && Math.abs(_touch.vars.delta.x) > 20 || Math.abs(_touch.vars.delta.x) > this._attributes.currentSlide.offsetWidth / 2;
								var direction = _touch.vars.delta.x < 0 ? 'next' : 'previous';
								var speed = this.settings.transitionDuration ? this.settings.transitionDuration / 2 : 0;
								if (!_touch.vars.isScrolling) {
									if (isChangeSlide) {
										_touch.vars.direction = direction;
										if (_touch.vars.direction == 'next') {
											_translate(this._attributes.currentSlide, -this._attributes.currentSlide.offsetWidth, speed);
											_translate(this._attributes.nextSlide, 0, speed);
										} else {
											_translate(this._attributes.previousSlide, 0, speed);
											_translate(this._attributes.currentSlide, this._attributes.currentSlide.offsetWidth, speed);
										}
										_requestTimeout(_touch.transitionEnd.bind(this), speed);
									} else {
										if (direction == 'next') {
											_translate(this._attributes.currentSlide, 0, speed);
											_translate(this._attributes.nextSlide, this._attributes.currentSlide.offsetWidth, speed);
										} else {
											_translate(this._attributes.previousSlide, -this._attributes.previousSlide.offsetWidth, speed);
											_translate(this._attributes.currentSlide, 0, speed);
										}
									}
									if (speed) {
										_addClass(this._attributes.container, this.settings.classes.animating);
										_requestTimeout(function() {
											_removeClass(this._attributes.container, this.settings.classes.animating);
										}.bind(this), speed);
									}
								}
							},
							transitionEnd: function(event) {
								if (_touch.vars.direction) {
									_unTranslate(this._attributes.previousSlide);
									_unTranslate(this._attributes.currentSlide);
									_unTranslate(this._attributes.nextSlide);
									_removeClass(this._attributes.container, this.settings.classes.touching);
									_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
									_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
									_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
									this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
									var slides = this._attributes.slides,
										index = slides.indexOf(this._attributes.currentSlide);
									if (_touch.vars.direction == 'next') {
										this._attributes.previousSlide = this._attributes.currentSlide;
										this._attributes.currentSlide = slides[index + 1];
										this._attributes.nextSlide = slides[index + 2];
										if (typeof this._attributes.currentSlide === 'undefined' &&
											typeof this._attributes.nextSlide === 'undefined') {
											this._attributes.currentSlide = slides[0];
											this._attributes.nextSlide = slides[1];
										} else {
											if (typeof this._attributes.nextSlide === 'undefined') {
												this._attributes.nextSlide = slides[0];
											}
										}
										_loadImg(this._attributes.nextSlide);
									} else {
										this._attributes.nextSlide = this._attributes.currentSlide;
										this._attributes.previousSlide = slides[index - 2];
										this._attributes.currentSlide = slides[index - 1];
										if (typeof this._attributes.currentSlide === 'undefined' &&
											typeof this._attributes.previousSlide === 'undefined') {
											this._attributes.currentSlide = slides[slides.length - 1];
											this._attributes.previousSlide = slides[slides.length - 2];
										} else {
											if (typeof this._attributes.previousSlide === 'undefined') {
												this._attributes.previousSlide = slides[slides.length - 1];
											}
										}
										_loadImg(this._attributes.previousSlide);
									}
									_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
									_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
									_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
									this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
									_setContainerHeight(this);
									this.settings.afterChange.apply(this);
								}
							}
						};
						var Slider = function(args) {
							// Defaults
							this.settings = {
								selector: '',
								height: '16:9', // "auto" | px value (e.g. 400) | aspect ratio (e.g. "16:9")
								initialHeight: 400, // for "auto" and aspect ratio
								maxHeight: null, // for "auto" and aspect ratio
								interval: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_PT*1000;?>,
								transitionDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_CS;?>,
								effect: '<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Eff;?>',
								disableNav: <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_SVS_Arr_Show=='on'){ echo 'false';}else{ echo 'true';}?>,
								keyboardNav: true,
								previousNavSelector: '.Rich_Web_SVS_Prev_<?php echo $Rich_Web_Video;?>',
								nextNavSelector: '.Rich_Web_SVS_Next_<?php echo $Rich_Web_Video;?>',
								classes: {
									container: 'ideal-image-slider',
									slide: 'iis-slide',
									previousSlide: 'iis-previous-slide',
									currentSlide: 'iis-current-slide',
									nextSlide: 'iis-next-slide',
									previousNav: '',
									nextNav: '',
									animating: 'iis-is-animating',
									touchEnabled: 'iis-touch-enabled',
									touching: 'iis-is-touching',
									directionPrevious: 'iis-direction-previous',
									directionNext: 'iis-direction-next'
								},
								onInit: function() {},
								onStart: function() {},
								onStop: function() {},
								onDestroy: function() {},
								beforeChange: function() {},
								afterChange: function() {}
							};
							if (typeof args === 'string') {
								this.settings.selector = args;
							} else if (typeof args === 'object') {
								_deepExtend(this.settings, args);
							}
							var sliderEl = document.querySelector(this.settings.selector);
							if (!sliderEl) return null;
							var origChildren = _toArray(sliderEl.children),
								validSlides = [];
							sliderEl.innerHTML = '';
							Array.prototype.forEach.call(origChildren, function(slide, i) {
								if (slide instanceof HTMLImageElement || slide instanceof HTMLAnchorElement) {
									var slideEl = document.createElement('a'),
										href = '',
										target = '';
									if (slide instanceof HTMLAnchorElement) {
										href = slide.getAttribute('href');
										target = slide.getAttribute('target');
										var img = slide.querySelector('img');
										if (img !== null) {
											slide = img;
										} else {
											return;
										}
									}
									if (typeof slide.dataset !== 'undefined') {
										_deepExtend(slideEl.dataset, slide.dataset);
										
										if (slide.dataset.src) {
											slideEl.dataset.src = slide.dataset.src;
										} else {
											slideEl.dataset.src = slide.src;
										}
										// if (_isHighDPI() && slide.dataset['src-2x']) {
											// slideEl.dataset.src = slide.dataset['src-2x'];
										// }
									}
									else {	
										if (slide.getAttribute('data-src')) {
											slideEl.setAttribute('data-src', slide.getAttribute('data-src'));
										} else {
											slideEl.setAttribute('data-src', slide.getAttribute('src'));
										}
									}
									if (href) slideEl.setAttribute('href', href);
									if (target) slideEl.setAttribute('target', target);
									if (slide.getAttribute('className')) _addClass(slideEl, slide.getAttribute('className'));
									if (slide.getAttribute('id')) slideEl.setAttribute('id', slide.getAttribute('id'));
									if (slide.getAttribute('title')) slideEl.setAttribute('title', slide.getAttribute('title'));
									if (slide.getAttribute('alt')) slideEl.innerHTML = slide.getAttribute('alt');
									slideEl.setAttribute('role', 'tabpanel');
									slideEl.setAttribute('aria-hidden', 'true');
									slideEl.style.cssText += '-webkit-transition-duration:' + this.settings.transitionDuration + 'ms;-moz-transition-duration:' + this.settings.transitionDuration + 'ms;-o-transition-duration:' + this.settings.transitionDuration + 'ms;transition-duration:' + this.settings.transitionDuration + 'ms;';
									sliderEl.appendChild(slideEl);
									validSlides.push(slideEl);
								}
							}.bind(this));
							var slides = validSlides;
							if (slides.length <= 1) {
								sliderEl.innerHTML = '';
								Array.prototype.forEach.call(origChildren, function(child, i) {
									sliderEl.appendChild(child);
								});
								return null;
							}
							if (!this.settings.disableNav) {
								var previousNav, nextNav;
								if (this.settings.previousNavSelector) {
									previousNav = document.querySelector(this.settings.previousNavSelector);
								} else {
									previousNav = document.createElement('a');
									sliderEl.appendChild(previousNav);
								}
								if (this.settings.nextNavSelector) {
									nextNav = document.querySelector(this.settings.nextNavSelector);
								} else {
									nextNav = document.createElement('a');
									sliderEl.appendChild(nextNav);
								}
								_addClass(previousNav, this.settings.classes.previousNav);
								_addClass(nextNav, this.settings.classes.nextNav);
								_addEvent(previousNav, 'click', function() {
									if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
									this.stop();
									this.previousSlide();
								}.bind(this));
								_addEvent(nextNav, 'click', function() {
									if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
									this.stop();
									this.nextSlide();
								}.bind(this));
								if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
									this.settings.effect = 'slide';
									previousNav.style.display = 'none';
									nextNav.style.display = 'none';
									_addClass(sliderEl, this.settings.classes.touchEnabled);
									_addEvent(sliderEl, 'touchstart', _touch.start.bind(this), false);
									_addEvent(sliderEl, 'touchmove', _touch.move.bind(this), false);
									_addEvent(sliderEl, 'touchend', _touch.end.bind(this), false);
								}
								if (this.settings.keyboardNav) {
									_addEvent(document, 'keyup', function(e) {
										e = e || window.event;
										var button = (typeof e.which == 'number') ? e.which : e.keyCode;
										if (button == 37) {
											if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
											this.stop();
											this.previousSlide();
										} else if (button == 39) {
											if (_hasClass(this._attributes.container, this.settings.classes.animating)) return false;
											this.stop();
											this.nextSlide();
										}
									}.bind(this));
								}
							}
							this._attributes = {
								container: sliderEl,
								slides: slides,
								previousSlide: typeof slides[slides.length - 1] !== 'undefined' ? slides[slides.length - 1] : slides[0],
								currentSlide: slides[0],
								nextSlide: typeof slides[1] !== 'undefined' ? slides[1] : slides[0],
								timerId: 0,
								origChildren: origChildren, // Used in destroy()
								aspectWidth: 0,
								aspectHeight: 0
							};
							if (_isInteger(this.settings.height)) {
								this._attributes.container.style.height = this.settings.height + 'px';
							} else {
								if (_isInteger(this.settings.initialHeight)) {
									this._attributes.container.style.height = this.settings.initialHeight + 'px';
								}
								if (this.settings.height.indexOf(':') > -1) {
									var aspectRatioParts = this.settings.height.split(':');
									if (aspectRatioParts.length == 2 && _isInteger(parseInt(aspectRatioParts[0], 10)) && _isInteger(parseInt(aspectRatioParts[1], 10))) {
										this._attributes.aspectWidth = parseInt(aspectRatioParts[0], 10);
										this._attributes.aspectHeight = parseInt(aspectRatioParts[1], 10);
									}
								}
								_addEvent(window, 'resize', function() {
									_setContainerHeight(this, false);
								}.bind(this));
							}
							_addClass(sliderEl, this.settings.classes.container);
							_addClass(sliderEl, 'iis-effect-' + this.settings.effect);
							Array.prototype.forEach.call(this._attributes.slides, function(slide, i) {
								_addClass(slide, this.settings.classes.slide);
							}.bind(this));
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_loadImg(this._attributes.currentSlide, (function() {
								this.settings.onInit.apply(this);
								_setContainerHeight(this, false);
							}).bind(this));
							_loadImg(this._attributes.previousSlide);
							_loadImg(this._attributes.nextSlide);
						};
						Slider.prototype.get = function(attribute) {
							if (!this._attributes) return null;
							if (this._attributes.hasOwnProperty(attribute)) {
								return this._attributes[attribute];
							}
						};
						Slider.prototype.set = function(attribute, value) {
							if (!this._attributes) return null;
							return (this._attributes[attribute] = value);
						};
						Slider.prototype.start = function() {
							if (!this._attributes) return;
							this._attributes.timerId = setInterval(this.nextSlide.bind(this), this.settings.interval);
							this.settings.onStart.apply(this);
							window.onblur = function() {
								this.stop();
							}.bind(this);
						};
						Slider.prototype.stop = function() {
							if (!this._attributes) return;
							clearInterval(this._attributes.timerId);
							this._attributes.timerId = 0;
							this.settings.onStop.apply(this);
						};
						Slider.prototype.previousSlide = function() {
							this.settings.beforeChange.apply(this);
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							var slides = this._attributes.slides,
								index = slides.indexOf(this._attributes.currentSlide);
							this._attributes.nextSlide = this._attributes.currentSlide;
							this._attributes.previousSlide = slides[index - 2];
							this._attributes.currentSlide = slides[index - 1];
							if (typeof this._attributes.currentSlide === 'undefined' &&
								typeof this._attributes.previousSlide === 'undefined') {
								this._attributes.currentSlide = slides[slides.length - 1];
								this._attributes.previousSlide = slides[slides.length - 2];
							} else {
								if (typeof this._attributes.previousSlide === 'undefined') {
									this._attributes.previousSlide = slides[slides.length - 1];
								}
							}
							_loadImg(this._attributes.previousSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_addClass(this._attributes.container, this.settings.classes.directionPrevious);
							_requestTimeout(function() {
								_removeClass(this._attributes.container, this.settings.classes.directionPrevious);
							}.bind(this), this.settings.transitionDuration);
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.nextSlide = function() {
							this.settings.beforeChange.apply(this);
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							var slides = this._attributes.slides,
								index = slides.indexOf(this._attributes.currentSlide);
							this._attributes.previousSlide = this._attributes.currentSlide;
							this._attributes.currentSlide = slides[index + 1];
							this._attributes.nextSlide = slides[index + 2];
							if (typeof this._attributes.currentSlide === 'undefined' &&
								typeof this._attributes.nextSlide === 'undefined') {
								this._attributes.currentSlide = slides[0];
								this._attributes.nextSlide = slides[1];
							} else {
								if (typeof this._attributes.nextSlide === 'undefined') {
									this._attributes.nextSlide = slides[0];
								}
							}
							_loadImg(this._attributes.nextSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							_addClass(this._attributes.container, this.settings.classes.directionNext);
							_requestTimeout(function() {
								_removeClass(this._attributes.container, this.settings.classes.directionNext);
							}.bind(this), this.settings.transitionDuration);
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.gotoSlide = function(index) {
							this.settings.beforeChange.apply(this);
							this.stop();
							_removeClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_removeClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_removeClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'true');
							index--;
							var slides = this._attributes.slides,
								oldIndex = slides.indexOf(this._attributes.currentSlide);
							this._attributes.previousSlide = slides[index - 1];
							this._attributes.currentSlide = slides[index];
							this._attributes.nextSlide = slides[index + 1];
							if (typeof this._attributes.previousSlide === 'undefined') {
								this._attributes.previousSlide = slides[slides.length - 1];
							}
							if (typeof this._attributes.nextSlide === 'undefined') {
								this._attributes.nextSlide = slides[0];
							}
							_loadImg(this._attributes.previousSlide);
							_loadImg(this._attributes.currentSlide);
							_loadImg(this._attributes.nextSlide);
							_addClass(this._attributes.previousSlide, this.settings.classes.previousSlide);
							_addClass(this._attributes.currentSlide, this.settings.classes.currentSlide);
							_addClass(this._attributes.nextSlide, this.settings.classes.nextSlide);
							this._attributes.currentSlide.setAttribute('aria-hidden', 'false');
							if (index < oldIndex) {
								_addClass(this._attributes.container, this.settings.classes.directionPrevious);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.directionPrevious);
								}.bind(this), this.settings.transitionDuration);
							} else {
								_addClass(this._attributes.container, this.settings.classes.directionNext);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.directionNext);
								}.bind(this), this.settings.transitionDuration);
							}
							if (this.settings.transitionDuration) {
								_addClass(this._attributes.container, this.settings.classes.animating);
								_requestTimeout(function() {
									_removeClass(this._attributes.container, this.settings.classes.animating);
								}.bind(this), this.settings.transitionDuration);
							}
							_setContainerHeight(this);
							this.settings.afterChange.apply(this);
						};
						Slider.prototype.destroy = function() {
							clearInterval(this._attributes.timerId);
							this._attributes.timerId = 0;
							this._attributes.container.innerHTML = '';
							Array.prototype.forEach.call(this._attributes.origChildren, function(child, i) {
								this._attributes.container.appendChild(child);
							}.bind(this));
							_removeClass(this._attributes.container, this.settings.classes.container);
							_removeClass(this._attributes.container, 'iis-effect-' + this.settings.effect);
							this._attributes.container.style.height = '';
							this.settings.onDestroy.apply(this);
						};
						return {
							_hasClass: _hasClass,
							_addClass: _addClass,
							_removeClass: _removeClass,
							Slider: Slider
						};
					})();
				</script>
				<script src="<?php echo plugins_url('/Scripts/iis-bullet-nav.js',__FILE__);?>"></script>
				<script src="<?php echo plugins_url('/Scripts/iis-captions.js',__FILE__);?>"></script>
				<script>
					var slider = new IdealImageSlider.Slider('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>');
					slider.addCaptions();
					slider.addBulletNav();
					slider.start();
				</script>
				<script>
					jQuery(document).ready(function(){
						var RichVSTitle = jQuery('.RichVSTitle').val();
						var RichVSDesc = jQuery('.RichVSDesc').val();
						function resp(){
							jQuery('.Rich_Web_VS_SVS').css('max-height',jQuery('.Rich_Web_VS_SVS').height());
							jQuery('.iis-caption .iis-caption-content span').css('font-size',RichVSTitle*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()+150)+'px');
							jQuery('.iis-caption .iis-caption-content p').css('font-size',RichVSDesc*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()+150)+'px');
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon').css('height',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').height()/8);
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('width',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/8);
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('line-height',jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').height()/8+'px');
							jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('font-size',parseInt(jQuery('.Rich_Web_VSlider_SVS_PlayIcon span').css('width'))/3+'px');
							jQuery('.Rich_Web_SVS_Nav').css('font-size',30*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700);
							jQuery('.Rich_Web_SVS_Nav').css('padding',''+10*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700+'px '+15*jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()/700+'px');
							if(jQuery('#Rich_Web_VS_SVS_<?php echo $Rich_Web_Video;?>').width()<=400){
								jQuery('.iis-caption .iis-caption-content p').css('display','none');
								jQuery('.iis-caption .iis-caption-content a').css('display','none');
							}else{
								jQuery('.iis-caption .iis-caption-content p').css('display','block');
								jQuery('.iis-caption .iis-caption-content a').css('display','block');
							}
						}
						jQuery(window).load(function(){
							resp();
						})						
						jQuery(window).resize(function(){
							resp();
						})
					})
				</script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Video Slider/Vertical Thumbnails'){ ?>
				<?php 
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=true; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP=false; }
				?>
			    <script type="text/javascript" src="<?php echo plugins_url('/Scripts/jssor.slider-21.1.5.min.js',__FILE__);?>"></script>
			    <script>
			        Rich_Web_VSVT_slider_init = function() {			            
			            var Rich_Web_VSVT_SlideshowTransitions = [
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='fade slideshow'){ ?>
			            		{$Duration:1200,$Opacity:2},
								{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true},
								{$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$JssorEasing$.$EaseOutCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Opacity:2},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Opacity:2},
								{$Duration:800,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Opacity:2},
			            	<?php }?>
			             	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='swing slideshow'){ ?>
			             		{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
								{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:1.3,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='flutter slideshow'){ ?>
			            		{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Round:{$Top:2}},
								{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:0.8}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2050,$Easing:{$Left:$JssorEasing$.$EaseInOutSine,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseInOutQuad},$Outside:true,$Round:{$Top:1.3}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Round:{$Top:2}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='collapse slideshow'){ ?>
			            		{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:800,$Delay:200,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:2049},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Easing:$JssorEasing$.$EaseOutQuad},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$JssorEasing$.$EaseOutQuad},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='expand slideshow'){ ?>
			            		{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2050,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:1000,$Cols:3,$Rows:2,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseInBounce},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:800,$Delay:300,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationCross,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:$JssorEasing$.$EaseInQuad},
								{$Duration:1000,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$Easing:$JssorEasing$.$EaseInQuad},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='stripe slideshow'){ ?>
			            		{$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$JssorEasing$.$EaseOutJump,$Round:{$Top:1.5}},
								{$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
								{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
								{$Duration:400,$Delay:100,$Rows:7,$Clip:4,$Formation:$JssorSlideshowFormations$.$FormationStraight},
								{$Duration:400,$Delay:100,$Cols:10,$Clip:2,$Formation:$JssorSlideshowFormations$.$FormationStraight},
								{$Duration:1000,$Rows:6,$Clip:4},
								{$Duration:1000,$Cols:8,$Clip:1},
								{$Duration:1000,$Rows:6,$Clip:4,$Move:true},
								{$Duration:1000,$Cols:8,$Clip:1,$Move:true},
								{$Duration:600,$Delay:100,$Rows:7,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Opacity:2},
								{$Duration:600,$Delay:100,$Cols:10,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Opacity:2},
								{$Duration:800,x:1,$Delay:80,$Rows:8,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:800,y:1,$Delay:80,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-1,$Rows:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Row:3}},
								{$Duration:1000,y:-1,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12}},
								{$Duration:600,$Delay:80,$Rows:6,$Opacity:2},
								{$Duration:600,$Delay:80,$Cols:10,$Opacity:2},
								{$Duration:800,$Delay:150,$Rows:5,$Clip:8,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:264,$Easing:$JssorEasing$.$EaseInBounce},
								{$Duration:800,$Delay:150,$Cols:10,$Clip:1,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:264,$Easing:$JssorEasing$.$EaseInBounce},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='twins slideshow'){ ?>
			            		{$Duration:700,$Opacity:2,$Brother:{$Duration:1000,$Opacity:2}},
								{$Duration:1200,$Zoom:11,$Rotate:-1,$Easing:{$Zoom:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:0.5},$Brother:{$Duration:1200,$Zoom:1,$Rotate:1,$Easing:$JssorEasing$.$EaseSwing,$Opacity:2,$Round:{$Rotate:0.5},$Shift:90}},
								{$Duration:1400,x:0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1400,x:-0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10}},
								{$Duration:1200,$Zoom:11,$Rotate:1,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Brother:{$Duration:1200,$Zoom:11,$Rotate:-1,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Shift:600}},
								{$Duration:1500,x:0.5,$Cols:2,$ChessMode:{$Column:3},$Easing:{$Left:$JssorEasing$.$EaseInOutCubic},$Opacity:2,$Brother:{$Duration:1500,$Opacity:2}},
								{$Duration:1500,x:-0.3,y:0.5,$Zoom:1,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4],$Zoom:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,$Zoom:11,$Rotate:-0.5,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Shift:200}},
								{$Duration:1500,x:0.3,$During:{$Left:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Outside:true,$Brother:{$Duration:1000,x:-0.3,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1500,$Zoom:11,$Rotate:0.5,$During:{$Left:[0.4,0.6],$Top:[0.4,0.6],$Rotate:[0.4,0.6],$Zoom:[0.4,0.6]},$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,$Zoom:1,$Rotate:-0.5,$Easing:{$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Shift:200}},
								{$Duration:1200,x:0.25,y:0.5,$Rotate:-0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1200,x:-0.1,y:-0.7,$Rotate:0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2}},
								{$Duration:1600,x:1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1600,x:-1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1600,y:-1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1600,y:1,$Cols:2,$ChessMode:{$Column:12},$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,y:1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,x:1,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Brother:{$Duration:1200,x:-1,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}},
								{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
								{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}},
								{$Duration:1500,x:-0.1,y:-0.7,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4]},$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1000,x:0.2,y:0.5,$Rotate:-0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2}},
								{$Duration:1600,x:-0.2,$Delay:40,$Cols:12,$During:{$Left:[0.4,0.6]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5},$Brother:{$Duration:1000,x:0.2,$Delay:40,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:1028,$Easing:{$Left:$JssorEasing$.$EaseInOutExpo,$Opacity:$JssorEasing$.$EaseInOutQuad},$Opacity:2,$Round:{$Top:0.5}}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='parabola slideshow'){ ?>
			            		{$Duration:600,x:-1,y:1,$Delay:100,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:30,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInQuart,$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:30,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInQuart,$Top:$JssorEasing$.$EaseInQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='rotate slideshow'){ ?>
			            		{$Duration:1200,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,x:2,y:1,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:-1,y:2,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.85}},
								{$Duration:1000,x:4,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-0.5,y:1,$Rows:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-3,y:1,$Rows:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,$Zoom:11,$Rotate:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,y:4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1200,x:-4,y:-4,$Zoom:11,$Rotate:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.7}},
								{$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInExpo},$Opacity:2,$Round:{$Rotate:0.8}},
								{$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,y:0.6,$Zoom:1,$Rotate:1,$During:{$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,y:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,y:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:0.6,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1200,x:-0.6,y:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$JssorEasing$.$EaseSwing,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseSwing},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,y:0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:0.5,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
								{$Duration:1000,x:-0.5,y:-0.5,$Zoom:1,$Rotate:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInCubic},$Opacity:2,$Round:{$Rotate:0.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='zoom slideshow'){ ?>
			            		{$Duration:1200,y:2,$Rows:2,$Zoom:11,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:4,$Cols:2,$Zoom:11,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:1,$Rows:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:2,$Rows:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,y:1,$Rows:2,$Zoom:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Row:15},$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,$Zoom:11,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2,$Round:{$Top:2.5}},
								{$Duration:1000,y:4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,y:-4,$Zoom:11,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,y:4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-4,y:-4,$Zoom:11,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1200,$Zoom:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,y:-0.6,$Zoom:1,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,y:0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1200,x:-0.6,y:-0.6,$Zoom:1,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:1000,$Zoom:1,$SlideOut:true,$Easing:{$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,y:1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:1,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
								{$Duration:1000,x:-1,y:-1,$Zoom:1,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInExpo,$Top:$JssorEasing$.$EaseInExpo,$Zoom:$JssorEasing$.$EaseInExpo,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='float slideshow'){ ?>
			            		{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:1028,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='fly slideshow'){ ?>
			            		{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:1,$Delay:50,$Cols:8,$Rows:4,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:264,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,y:1,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:1028,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,y:-1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:2049,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
								{$Duration:600,x:-1,y:-1,$Delay:50,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:513,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge dance slideshow'){ ?>
			            		{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge pet slideshow'){ ?>
			            		{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseLinear},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
								{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Top:$JssorEasing$.$EaseInWave,$Clip:$JssorEasing$.$EaseOutQuad},$Outside:true,$Round:{$Left:0.8,$Top:2.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='dodge slideshow'){ ?>
			            		{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Clip:$JssorEasing$.$EaseSwing},$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:-0.3,$Delay:60,$Zoom:1,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:-0.3,y:-0.3,$Delay:60,$Zoom:1,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Assembly:260,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
								{$Duration:1200,x:0.3,y:-0.3,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseInJump,$Top:$JssorEasing$.$EaseInJump},$Outside:true,$Round:{$Left:0.8,$Top:0.8}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='compound slideshow'){ ?>
			            		{$Duration:1200,y:-1,$Cols:8,$Rows:4,$Clip:15,$During:{$Top:[0.5,0.5],$Clip:[0,0.5]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12},$ScaleClip:0.5},
								{$Duration:1200,y:-1,$Cols:8,$Rows:4,$Clip:15,$During:{$Top:[0.5,0.5],$Clip:[0,0.5]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:12},$ScaleClip:0.5},
								{$Duration:1200,x:-1,y:-1,$Cols:6,$Rows:6,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Clip:[0,0.2]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Clip:$JssorEasing$.$EaseSwing},$ScaleClip:0.5},
								{$Duration:1200,x:-1,y:-1,$Cols:6,$Rows:6,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8],$Clip:[0,0.2]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$ChessMode:{$Column:15,$Row:15},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Top:$JssorEasing$.$EaseInCubic,$Clip:$JssorEasing$.$EaseSwing},$ScaleClip:0.5},
								{$Duration:4000,x:-1,y:0.45,$Delay:80,$Cols:12,$Clip:15,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.15]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.45,$Delay:80,$Cols:12,$Clip:15,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.15]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.7,$Delay:80,$Cols:12,$Clip:11,$Move:true,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.1]},$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseOutQuad,$Top:$JssorEasing$.$EaseOutJump,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
								{$Duration:4000,x:-1,y:0.7,$Delay:80,$Cols:12,$Clip:11,$Move:true,$During:{$Left:[0.35,0.65],$Top:[0.35,0.65],$Clip:[0,0.1]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:2049,$Easing:{$Left:$JssorEasing$.$EaseOutQuad,$Top:$JssorEasing$.$EaseOutJump,$Clip:$JssorEasing$.$EaseOutQuad},$ScaleClip:0.7,$Round:{$Top:4}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='jump slideshow'){ ?>
			            		{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:800,$Cols:8,$Rows:4,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:-0.5,$Delay:50,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:513,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:800,$Cols:8,$Rows:4,$SlideOut:true,$Reverse:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:100,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutJump},$Round:{$Top:1.5}},
			            	<?php }?>
			            	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='random slideshow' || $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APEff=='wave slideshow'){ ?>
			            		{$Duration:1500,y:-0.5,$Delay:60,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:15,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseSwing,$Top:$JssorEasing$.$EaseInWave},$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,y:-0.5,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInWave,$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSwirl,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationZigZag,$Assembly:260,$ChessMode:{$Row:3},$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationSquare,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
								{$Duration:1500,x:-1,y:0.5,$Delay:60,$Cols:8,$Rows:4,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationRectangleCross,$Assembly:260,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave},$Round:{$Top:1.5}},
			            	<?php }?>
			            ];
			            
			            var Rich_Web_VSVT_options = {
			              $AutoPlay: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_AP;?>,
			              $AutoPlaySteps: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_APS;?>,
			              $Idle: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PT*1000;?>,
		    			  $SlideDuration: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_CS;?>,
			              $SlideshowOptions: {
			                $Class: $JssorSlideshowRunner$,
			                $Transitions: Rich_Web_VSVT_SlideshowTransitions,
			                $TransitionsOrder: 1
			              },
			              $ArrowNavigatorOptions: {
			                $Class: $JssorArrowNavigator$,
			                $Steps: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrSt;?>
			              },
			              $ThumbnailNavigatorOptions: {
			                $Class: $JssorThumbnailNavigator$,
			                $Rows: 2,
			                $Cols: <?php if((count($Rich_Web_VSlider_Videos) % 2) == 1){ echo count($Rich_Web_VSlider_Videos)/2 +1 ; } else { echo count($Rich_Web_VSlider_Videos)/2;}?>,
			                $SpacingX: 14,
			                $SpacingY: 12,
			                $Orientation: 2,
			                $Align: 156
			              }
			            };
			            
			            var Rich_Web_VSVT_slider = new $JssorSlider$("Rich_Web_VSVT", Rich_Web_VSVT_options);
			            
			            function ScaleSlider() {
			                var refSize = Rich_Web_VSVT_slider.$Elmt.parentNode.clientWidth;
			                if (refSize) {
			                   	refSize = Math.min(refSize, <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9+240;?>);
			                    refSize = Math.max(refSize, 240);
			                    Rich_Web_VSVT_slider.$ScaleWidth(refSize);
			                }
			                else {
			                    window.setTimeout(ScaleSlider, 30);
			                }
			            }
			            ScaleSlider();
			            $Jssor$.$AddEvent(window, "load", ScaleSlider);
			            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
			            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
			        };
			    </script>
			    <style>
			    	.Rich_Web_VSVT_Main
			        {
			        	position: relative; 
			        	margin: 0px auto; 
			        	top: 0px; 
			        	left: 0px; 
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9+240;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        	overflow: hidden; 
			        	visibility: hidden; 
			        	outline: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BC;?>;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BoxShC;?>;
  							<?php }?>
  						<?php }?>
			        }
			        .jssora05l, .jssora05r {
			            display: block;
			            position: absolute;
			            width: auto !important;
			            height:auto !important;
			            cursor: pointer;
			            overflow: hidden;
			            padding: 1px;
			            font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrFS;?>px;
			            color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrC;?>;
			            <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrPos=='top'){ ?>
			        		top: 5%;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrPos=='bottom'){ ?>
			        		bottom: 7%;
			        	<?php }else{ ?> 
			        		top: 41%;
			        	<?php }?>	
			        }
			        .jssora05r i { float: right; }
			        .jssora05l i { float: left; }
			        .jssora05l:hover, .jssora05r:hover { opacity: 0.8; }
			        .jssort01-99-66 { 
			        	background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_BgC;?>;
			        	position:absolute;
			        	left:0px;
			        	top:0px;
			        	width:240px;
			        	height:<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px;
			        }
			        .jssort01-99-66 .p {
			            position: absolute;
			            top: 0;
			            left: 0;
			            width: 99px;
			            height: 66px;
			            border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BC;?>;
			            border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BR;?>px;
						box-sizing:border-box !important;
			        }
			        .jssort01-99-66 .p:hover, .jssort01-99-66 .p.pdn, .jssort01-99-66 .pav
			        {
			            border-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_HBC;?>;
			        }
			        .jssort01-99-66 .w  img{
			            border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_Th_BR-2;?>px;			        	
			        }
			        .jssort01-99-66 .t {
			            position: absolute;
			            top: 0;
			            left: 0;
			            width: 100%;
			            height: 100%;
			            border: none;
			        }
			        .jssort01-99-66 .w {
			            position: absolute;
			            top: 0px;
			            left: 0px;
			            width: 100%;
			            height: 100%;
			        }
			        .jssort01-99-66 .c {
			            position: absolute;
			            top: 0px;
			            left: 0px;
			            width: 95px;
			            height: 62px;
			            box-sizing: content-box;
			        }
			        .jssort01-99-66 .pav .c {
			            top: 2px;
			            left: 2px;
			            width: 95px;
			            height: 62px;
			        }
			        .jssort01-99-66 .p:hover .c {
			            top: 0px;
			            left: 0px;
			            width: 97px;
			            height: 64px;
			        }
			        .jssort01-99-66 .p.pdn .c {
			            width: 95px;
			            height: 62px;
			        }
			        * html .jssort01-99-66 .c, * html .jssort01-99-66 .pdn .c, * html .jssort01-99-66 .pav .c {
			            width /**/: 99px;
			            height /**/: 66px;
			        }
			        .Rich_Web_VS_VTS_Title
			        {
			        	position:absolute;				        	
			        	left:0px;
			        	width:100%;
			        	z-index: 999999999;	
			        	padding: 2px;	
			        	text-align: center;
			        	background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TBgC;?>;
			        	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TC;?>;
			        	font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TFS;?>px;
			        	font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TFF;?>;
			            <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TPos=='top'){ ?>
			        		top: 5%;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TPos=='bottom'){ ?>
			        		bottom: 7%;
			        	<?php }else{ ?> 
			        		top: 41%;
			        	<?php }?>		        	
			        }
			        .Rich_Web_VS_VTS_Link
			        {
			        	position: absolute;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-left'){ ?>
			        		left: 0;
					    	top: 0;
					   		border-bottom-right-radius: 70px;
					    	padding: 10px 20px 20px 10px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-right'){ ?>
			        		right: 0;
					    	top: 0;
					    	border-bottom-left-radius: 70px;
					    	padding: 10px 10px 20px 20px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='bottom-left'){ ?>
			        		left: 0;
					    	bottom: 0;
					    	border-top-right-radius: 70px;
					    	padding: 20px 20px 10px 10px;
			        	<?php }else{ ?> 
			        		right: 0;
					    	bottom: 0;
					    	border-top-left-radius: 70px;
					    	padding: 20px 10px 10px 20px;
			        	<?php }?>
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos==$Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos){ ?>
			        		display: none;	
			        	<?php }?>				   
					    z-index: 999999999;
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LBgC;?>;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LFS;?>px;
					    -webkit-transition: all 0.5s ease-in-out;
                        -moz-transition: all 0.5s ease-in-out;
                        -o-transition: all 0.5s ease-in-out;
                        -ms-transition: all 0.5s ease-in-out;
                        transition: all 0.5s ease-in-out;
			        }
			        .Rich_Web_VS_VTS_Link a
			        {
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LC;?>;
					    text-decoration: none;
			        }
			        .Rich_Web_VS_VTS_Play
			        {
			        	position: absolute;
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-left'){ ?>
			        		left: 0;
					    	top: 0;
					   		border-bottom-right-radius: 70px;
					    	padding: 10px 20px 20px 15px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-right'){ ?>
			        		right: 0;
					    	top: 0;
					    	border-bottom-left-radius: 70px;
					    	padding: 10px 15px 20px 20px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='bottom-left'){ ?>
			        		left: 0;
					    	bottom: 0;
					    	border-top-right-radius: 70px;
					    	padding: 20px 20px 10px 15px;
			        	<?php }else{ ?> 
			        		right: 0;
					    	bottom: 0;
					    	border-top-left-radius: 70px;
					    	padding: 20px 15px 10px 20px;
			        	<?php }?>				
					    z-index: 999999999;					    
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PBgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PC;?>;
					    font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PFS;?>px;
					    -webkit-transition: all 0.5s ease-in-out;
                        -moz-transition: all 0.5s ease-in-out;
                        -o-transition: all 0.5s ease-in-out;
                        -ms-transition: all 0.5s ease-in-out;
                        transition: all 0.5s ease-in-out;
                        cursor: pointer;
			        }
			        .Rich_Web_VS_VTS_Link:hover
			        {
			        	<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-left'){ ?>
					    	padding: 15px 25px 25px 15px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='top-right'){ ?>
					    	padding: 15px 15px 25px 25px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LPos=='bottom-left'){ ?>
					    	padding: 25px 25px 15px 15px;
			        	<?php }else{ ?> 
					    	padding: 25px 15px 15px 25px;
			        	<?php }?>					   
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LHBgC;?>;
			        }
			        .Rich_Web_VS_VTS_Link:hover a
			        {
			        	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LHC;?>;
			        }
			        .Rich_Web_VS_VTS_Play:hover
			        {					    
					    <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-left'){ ?>
					    	padding: 15px 25px 25px 20px;
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='top-right'){ ?>
					    	padding: 15px 20px 25px 25px;					    	
			        	<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PPos=='bottom-left'){ ?>
					    	padding: 25px 25px 15px 20px;
			        	<?php }else{ ?> 
					    	padding: 25px 20px 15px 25px;
			        	<?php }?>
					    background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PHBgC;?>;
					    color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PHC;?>;
			        }	
			        .Rich_Web_VSVT_Iframe_Div
			        {
			        	position: relative; 
			        	top: 0px; 
			        	left: 240px; 
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        	overflow: hidden; 
			        	display: none;
			        }	
			        #Rich_Web_VSVT_Iframe
			        {
			        	width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; 
			        	height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; 
			        }	      
			    </style>
				    <div id="Rich_Web_VSVT" class="Rich_Web_VSVT_Main">
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo plugins_url('/Images/loader.gif',__FILE__);?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 240px; width: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H*16/9;?>px; height: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_H;?>px; overflow: hidden;">
				        	<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
				        		<div data-p="150.00" style="display: none;">
					                <img data-u="image" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
					                <img data-u="thumb" src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" />
					                <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_TShow == 'on'){ ?>
					                	<div data-u="caption" class="Rich_Web_VS_VTS_Title"><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></div>
						            <?php }?>
						            <?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?> 
						            	<div data-u="caption" class="Rich_Web_VS_VTS_Link">
						                	<a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){echo '_blank';}?>"><i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_LType;?>" aria-hidden="true"></i></a>
						                </div>
						            <?php }?>
					                <div data-u="caption" class="Rich_Web_VS_VTS_Play" onclick='Rich_Web_VSVT_Play_Video("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'>
					                	<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_PType;?>" aria-hidden="true"></i>
					                </div>
					            </div>
							<?php } ?>
				        </div>
				        <div data-u="slides" class="Rich_Web_VSVT_Iframe_Div">
				        	<iframe id="Rich_Web_VSVT_Iframe" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				        </div>
				        <div data-u="thumbnavigator" class="jssort01-99-66" data-autocenter="2" onclick='Rich_Web_VSVT_Stop_Video()'>
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				        </div>
				        <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrShow == 'on'){ ?> 
				        	<span data-u="arrowleft" class="jssora05l" style="left:248px;width:48px;height:48px;" onclick='Rich_Web_VSVT_Stop_Video()'>
				        		<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrType;?>-left" aria-hidden="true"></i>
				        	</span>
				        	<span data-u="arrowright" class="jssora05r" style="right:8px;width:48px;height:48px;" onclick='Rich_Web_VSVT_Stop_Video()'>
				        		<i class="rich_web rich_web-<?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VTVS_ArrType;?>-right" aria-hidden="true"></i>
				        	</span>
				        <?php }?>				       
				    </div>
			    <script>
			        Rich_Web_VSVT_slider_init();
			    </script>
			<?php }else if($Rich_Web_VSlider_Eff_Dat[0]->slider_Vid_type=='Horizontal Posts Slider'){ ?>
				<?php 
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH='false'; }
					if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car=='on'){ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car='true'; }else{ $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car='false'; }
				?>
  				<link rel="stylesheet" type="text/css" media="all" href="<?php echo plugins_url('/Style/Horizontal_Posts_Slider.css',__FILE__);?>">
  				
  				<style type="text/css">
  					.Rich_Web_VS_HPS_Nav a
  					{
  						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_C;?>;
  						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BgC;?>;
  						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_FS;?>px;
  						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_FF;?>;
  						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BC;?>;
  						-webkit-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
 						-moz-border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
  						border-radius: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_BR;?>px;
  					}
  					.Rich_Web_VS_HPS_Nav a:hover
  					{
  						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_HC;?>;
  						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_HBgC;?>;
  					}
  					.crsl-item 
  					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BgC;?>;
						-webkit-box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						-moz-box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						box-shadow: 0px 0px 3px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_BoxShC;?>;
						
						box-sizing:border-box !important;
					}
					.crsl-item .thumbnail img 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='none'){ ?> 
							-webkit-filter: none; 
    						filter: none;
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='blur'){ ?>
							-webkit-filter: blur(2px); 
    						filter: blur(2px);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='brightness'){ ?>
							-webkit-filter: brightness(200%); 
   							filter:brightness(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='contrast'){ ?>
							-webkit-filter: contrast(200%); 
    						filter: contrast(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='drop-shadow'){ ?>
							-webkit-filter: drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_StShC;?>); 
    						filter:drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_StShC;?>);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='grayscale'){ ?>
							-webkit-filter: grayscale(100%); 
    						filter: grayscale(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='hue-rotate'){ ?>
							-webkit-filter: hue-rotate(90deg); 
    						filter: hue-rotate(90deg);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='invert'){ ?>
							-webkit-filter: invert(100%); 
    						filter: invert(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='opacity'){ ?>
							-webkit-filter: opacity(30%); 
    						filter: opacity(30%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='saturate'){ ?>
							-webkit-filter: saturate(8); 
    						filter: saturate(8);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VSEff=='sepia'){ ?>
							-webkit-filter: sepia(100%); 
    						filter: sepia(100%);
						<?php }?>
						cursor: pointer;
					}
					.crsl-item .thumbnail:hover img 
					{
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='none'){ ?> 
							-webkit-filter: none; 
    						filter: none;
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='blur'){ ?>
							-webkit-filter: blur(2px); 
    						filter: blur(2px);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='brightness'){ ?>
							-webkit-filter: brightness(200%); 
   							filter:brightness(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='contrast'){ ?>
							-webkit-filter: contrast(200%); 
    						filter: contrast(200%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='drop-shadow'){ ?>
							-webkit-filter: drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_HShC;?>); 
    						filter:drop-shadow(0px 0px 5px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_HShC;?>);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='grayscale'){ ?>
							-webkit-filter: grayscale(100%); 
    						filter: grayscale(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='hue-rotate'){ ?>
							-webkit-filter: hue-rotate(90deg); 
    						filter: hue-rotate(90deg);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='invert'){ ?>
							-webkit-filter: invert(100%); 
    						filter: invert(100%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='opacity'){ ?>
							-webkit-filter: opacity(30%); 
    						filter: opacity(30%);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='saturate'){ ?>
							-webkit-filter: saturate(8); 
    						filter: saturate(8);
						<?php }else if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols_VHEff=='sepia'){ ?>
							-webkit-filter: sepia(100%); 
    						filter: sepia(100%);
						<?php }?>
					}
					.crsl-item h3 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_TFF;?>;
					}
					.crsl-item p 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DFF;?>;
					}
					.crsl-item p.readmore a 
					{
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LFF;?>;
					}
					.crsl-item p.readmore a:hover 
					{
					  	color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LHC;?>;
					}
					.crsl-item .postdate 
					{
						background: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PBgC;?> !important;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PFS;?>px;
						font-family: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PFF;?>;
					}
					.crsl-item .postdate:hover
					{
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PHBgC;?>;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PHC;?>;
					}
					.Rich_Web_VS_HPS_Overlay
					{
						position: fixed;
						height: 100%;
						width: 100%;
						background-color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_OvC;?>;
						top: 0;
						left: 0;
						z-index: 9999999999;
						cursor: pointer;
						display: none;
					}
					.Rich_Web_VS_HPS_Iframe_Div1 
					{
					   position: relative;
					   width: 100%;
					   padding-top: 56.25%; /* 16:9 Aspect Ratio */
					}

					.Rich_Web_VS_HPS_Iframe_Text 
					{
					   position:  absolute;
					   top: 0;
					   left: 0;
					   bottom: 0;
					   right: 0;
					   text-align: center;
					   font-size: 20px;
					   color: white;
					}
					.Rich_Web_VS_HPS_Iframe_Div
					{
						position: fixed;
						width: 50%;
						top: 25%;
						left: 25%;
						z-index: 9999999999;
						border: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BW;?>px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BS;?> <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BC;?>;
						display: none;
						<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShShow=='on'){ ?>
  							<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShType=='on'){ ?>
  								-webkit-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								-moz-box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								box-shadow: 0 30px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px -18px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
  							<?php }else{ ?>
  								-webkit-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								-moz-box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
								box-shadow: 0px 0px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxSh;?>px 10px <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_BoxShC;?>;
  							<?php }?>
  						<?php }?>
					}
					#Rich_Web_VS_HPS_Iframe
					{
						width: 100%;
						height: 100%;
					}
					.Rich_Web_VS_HPS_Overlay_Close
					{
						z-index: 99999999;
						color: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIC;?>;
						font-size: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIS;?>px;
						position: absolute;
						top: 5px;
						right: 5px;
						cursor: pointer;
					}
					.Rich_Web_VS_HPS_Overlay_Close:hover
					{
						opacity: 0.8;
					}
					.crsl-items{
						box-sizing:border-box;
					}
  				</style>
				<div id="Rich_Web_VS_HPS">
					<?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_Show=='on'){ ?> 
						<nav class="Rich_Web_VS_HPS_Nav">
						    <div id="navbtns" class="Rich_Web_VS_HPS_clearfix">
						        <a href="#" class="previous"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_PText;?></a>
						        <a href="#" class="next"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_NP_NText;?></a>
						    </div>
					    </nav>
					<?php }?>
				    <div class="crsl-items" data-navigation="navbtns">
				     	<div class="crsl-wrap">
				      		<?php for($i=0;$i<count($Rich_Web_VSlider_Videos);$i++){ ?> 
				      			<div class="crsl-item">				        
							        <div class="thumbnail" onclick='Rich_Web_VS_HPS_Play("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'>
							            <img src="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Img;?>" alt="<?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?>">
							            <span class="postdate" onclick='Rich_Web_VS_HPS_Play("<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Src;?>")'><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PText;?></span>
							        </div>
							        <h3><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Vid_Title);?></h3>
							        <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_DShow=='on'){ ?>
							        	<p><?php echo html_entity_decode($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSlider_Add_Desc);?></p>
							        <?php }?>
							        <?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link != ''){ ?> 
							        	<p class="readmore"><a href="<?php echo $Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_Link;?>" target="<?php if($Rich_Web_VSlider_Videos[$i]->Rich_Web_VSldier_Add_ONT=='checked'){echo '_blank';}?>"><?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_LText;?></a></p>
						            <?php }?>
						        </div>
							<?php } ?>
				      	</div>
				    </div>		    
				</div>
				<div class="Rich_Web_VS_HPS_Overlay" onclick='Rich_Web_VS_HPS_Close()'>
					<i class="Rich_Web_VS_HPS_Overlay_Close rich_web <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Pop_CIType;?>" aria-hidden="true"></i>
				</div>
				<div class="Rich_Web_VS_HPS_Iframe_Div">
					<div class="Rich_Web_VS_HPS_Iframe_Div1">
					  	<div class="Rich_Web_VS_HPS_Iframe_Text">
					  		<iframe id="Rich_Web_VS_HPS_Iframe" src="" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					  	</div>
					</div>
				</div>
				<script type="text/javascript" src="<?php echo plugins_url('/Scripts/responsiveCarousel.min.js',__FILE__);?>"></script>
				<script type="text/javascript">
					jQuery(function(){
						jQuery('.crsl-items').carousel_RW({
							infinite: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Loop;?>,
							visible: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Cols;?>,
							speed: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Speed*1000;?>,
							autoRotate: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_AP;?>,
							itemMinWidth:180,
							itemEqualHeight: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_EH;?>,
							itemMargin: <?php if($Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PB>2){ echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_PB; }else{ echo '2';}?>,
							carousel: <?php echo $Rich_Web_VSlider_Eff[0]->Rich_Web_VS_HPS_Car;?>
						})
					})
				</script>
			<?php }
 		 	echo $after_widget;
 		}
	}
?>