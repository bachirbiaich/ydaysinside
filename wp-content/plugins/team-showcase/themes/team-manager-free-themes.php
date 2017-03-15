<?php

	/*
	* @Author 		themepoints
	* Copyright: 	2016 themepoints
	*/
if ( ! defined( 'ABSPATH' ) )

	die("Can't load this file directly");

function Team_manager_free_table_body($post_id)
	{
		$random_team_id = rand();
		$ourwork = get_post_meta( $post_id, 'ourwork', true );
				
        $team_manager_free_post_column = get_post_meta($post_id, 'team_manager_free_post_column', true);
        $team_manager_free_social_target = get_post_meta($post_id, 'team_manager_free_social_target', true);
        $team_manager_free_post_themes = get_post_meta($post_id, 'team_manager_free_post_themes', true);
        $team_manager_free_biography_option = get_post_meta($post_id, 'team_manager_free_biography_option', true);
        $team_manager_free_text_alignment = get_post_meta($post_id, 'team_manager_free_text_alignment', true);
        $team_manager_free_social_style = get_post_meta($post_id, 'team_manager_free_social_style', true);
        $team_manager_free_header_font_size = get_post_meta($post_id, 'team_manager_free_header_font_size', true);
        $team_manager_free_header_font_color = get_post_meta($post_id, 'team_manager_free_header_font_color', true);
        $team_manager_free_header_font_hover_color = get_post_meta($post_id, 'team_manager_free_header_font_hover_color', true);
        $team_manager_free_biography_font_size = get_post_meta($post_id, 'team_manager_free_biography_font_size', true);
        $team_manager_free_biography_font_color = get_post_meta($post_id, 'team_manager_free_biography_font_color', true);
		
			if($team_manager_free_post_themes=="theme1")
			{
				$content = '';
				$content.='<div class="team-manager-free">';
				$content.='<div class="team-manager-single-items">';		
				foreach((array) $ourwork as $allwork){
					$content.='
					<div class="'.$team_manager_free_post_column.' grid__item '.$team_manager_free_post_themes.'">
						<span class="team_images"><img class="team-popup" alt="'.$allwork['client-link1'].'" src="'.$allwork['client-images'].'" ></span>
						<span class="designation_title" style="font-size:'.$team_manager_free_header_font_size.'px;color:'.$team_manager_free_header_font_color.'">'.$allwork['client-link1'].'</span>
						<div class="loader"></div>
						<span class="designation">'.$allwork['client-designation'].'</span>
						<div class="team_meta_description">
							<div class="team_desc" style="display:'.$team_manager_free_biography_option.';text-align:'.$team_manager_free_text_alignment.';font-size:'.$team_manager_free_biography_font_size.'px;color:'.$team_manager_free_biography_font_color.'">'.$allwork['client-desc'].'</div>
							<div class="social_media_icons">
							';
							
							if(!empty($allwork['client-fa']))
							{
								$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'"><i class="fa fa-facebook"></i></a></span>';
							}
							if(!empty($allwork['client-tw']))
							{
								$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-tw'].'"><i class="fa fa-twitter"></i></a></span>';
							}
							if(!empty($allwork['client-dw']))
							{
								$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-dw'].'"><i class="fa fa-dribbble"></i></a></span>';
							}
							
							$content.='</div>
						</div>
					</div>
					';
				}
				
				$content.='</div>';
				$content.='</div><div class="clearfix"></div>';

				return $content;
				
			}

			elseif($team_manager_free_post_themes=="theme2")
			{			
				
			$content = '';
			$content.='<div class="team-manager-free">';
			$content.='<div class="team-manager-single-items">';		
			foreach((array) $ourwork as $allwork){
				$content.='
				<div class="'.$team_manager_free_post_column.' grid__item_flat '.$team_manager_free_post_themes.'">
					<span class="team_images"><img class="team-popup" alt="" src="'.$allwork['client-images'].'" ></span>
					<span class="designation_title" style="font-size:'.$team_manager_free_header_font_size.'px;color:'.$team_manager_free_header_font_color.'">'.$allwork['client-link1'].'</span>
					<div class="loader"></div>
					<span class="designation">'.$allwork['client-designation'].'</span>
					<div class="team_meta_description">
						<div class="team_desc" style="display:'.$team_manager_free_biography_option.';text-align:'.$team_manager_free_text_alignment.';font-size:'.$team_manager_free_biography_font_size.'px;color:'.$team_manager_free_biography_font_color.'">'.$allwork['client-desc'].'</div>
						<div class="social_media_icons">
						';
						
						if(!empty($allwork['client-fa']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'"><i class="fa fa-facebook"></i></a></span>';
						}
						if(!empty($allwork['client-tw']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-tw'].'"><i class="fa fa-twitter"></i></a></span>';
						}
						if(!empty($allwork['client-dw']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-dw'].'"><i class="fa fa-dribbble"></i></a></span>';
						}
						
						$content.='</div>
					</div>
				</div>
				';
			}
			
			$content.='</div>';
			$content.='</div><div class="clearfix"></div>';

			return $content;
			
			}
		elseif($team_manager_free_post_themes=="theme3")
			{

			$content = '';
			$content.='<div class="team-manager-free-rounded">';
			$content.='<div class="team-manager-single-items-rounded">';		
			foreach((array) $ourwork as $allwork){
				$content.='
				<div class="'.$team_manager_free_post_column.' grid__item_rounded '.$team_manager_free_post_themes.'">
					<span class="team_images_rounded"><img class="team-popup" alt="" src="'.$allwork['client-images'].'" ></span>
					<span class="designation_title_rounded" style="font-size:'.$team_manager_free_header_font_size.'px;color:'.$team_manager_free_header_font_color.'">'.$allwork['client-link1'].'</span>
					<div class="loader"></div>
					<span class="designation_rounded">'.$allwork['client-designation'].'</span>
					<div class="team_meta_description_rounded">
						<div class="team_desc" style="display:'.$team_manager_free_biography_option.';text-align:'.$team_manager_free_text_alignment.';font-size:'.$team_manager_free_biography_font_size.'px;color:'.$team_manager_free_biography_font_color.'">'.$allwork['client-desc'].'</div>
						<div class="social_media_icons_rounded">
						';
						
						if(!empty($allwork['client-fa']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'"><i class="fa fa-facebook"></i></a></span>';
						}
						if(!empty($allwork['client-tw']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-tw'].'"><i class="fa fa-twitter"></i></a></span>';
						}
						if(!empty($allwork['client-dw']))
						{
							$content.='<span class="social_icons_team"><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-dw'].'"><i class="fa fa-dribbble"></i></a></span>';
						}
						
						$content.='</div>
					</div>
				</div>
				';
			}
			
			$content.='</div>';
			$content.='</div><div class="clearfix"></div>';

			return $content;
			
			}
		elseif($team_manager_free_post_themes=="theme4")
			{

			$content = '';
			$content.='<div class="team-manager-free-theme4">';
			$content.='<div class="team-manager-single-items-theme4">';		
			foreach((array) $ourwork as $allwork){
				
			$content .= '
						<div class="'.$team_manager_free_post_column.' tp-our-team '.$team_manager_free_post_themes.'">
							<div class="tp-team-pic">
								<img src="'.$allwork['client-images'].'" alt="">
								<div class="over-layer">
									<p class="tp-team-description" style="display:'.$team_manager_free_biography_option.';text-align:'.$team_manager_free_text_alignment.';font-size:'.$team_manager_free_biography_font_size.'px;color:'.$team_manager_free_biography_font_color.'">
										'.$allwork['client-desc'].'
									</p>
									<ul class="tp-team-social-link">';
										if(!empty($allwork['client-fa']))
										{
											$content.='<li><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'" class="fa fa-facebook"></a></li>';
										}
										if(!empty($allwork['client-tw']))
										{
											$content.='<li><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'" class="fa fa-twitter"></a></li>';
										}
										if(!empty($allwork['client-dw']))
										{
											$content.='<li><a target="'.$team_manager_free_social_target.'" href="'.$allwork['client-fa'].'" class="fa fa-dribbble"></a></li>';
										}
									$content.='</ul>
								</div>
							</div>
							<h3 class="tp-team-prof">
								<a style="font-size:'.$team_manager_free_header_font_size.'px;color:'.$team_manager_free_header_font_color.'" href="#">'.$allwork['client-link1'].'</a>
								<small>'.$allwork['client-designation'].'</small>
							</h3>
						</div>			
			';	
				
				
			}
			
			$content.='</div>';
			$content.='</div><div class="clearfix"></div>';

			return $content;
			
			}
		else
			{
            
            echo 'Nothing Found!!';

	}

}

?>