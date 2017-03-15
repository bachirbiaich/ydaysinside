function Rich_Web_VSlider_Open_Video(Rich_Web_VSldier_Src)
{
	jQuery('.Rich_Web_VSldier_PlayIcon').css('display','none');
	jQuery('.Rich_Web_VSldier_Src').css({'transform':'translateX(0px)','-ms-transform': 'translateX(0px)', '-o-transform': 'translateX(0px)','-moz-transform': 'translateX(0px)','-webkit-transform': 'translateX(0px)'});

	jQuery('.Rich_Web_VSldier_Src_Iframe').attr('src',Rich_Web_VSldier_Src);
}
function Rich_Web_VSldier_Src_Clos()
{
	var RW_VS_SS_W=jQuery('.center').width();
	jQuery('.Rich_Web_VSldier_Src').css({'transform':'translateX(-12000px)','-ms-transform': 'translateX(-12000px)', '-o-transform': 'translateX(-12000px)','-moz-transform': 'translateX(-12000px)','-webkit-transform': 'translateX(-12000px)'});
	jQuery('.Rich_Web_VSldier_Src_Iframe').attr('src','');
	jQuery('.Rich_Web_VSldier_PlayIcon').css('display','inline');
}
function Rich_Web_VSlider_Play_Video()
{
	var Rich_Web_VSldier_Src;
	jQuery('.ss-paginate a').each(function(){
		if(jQuery(this).hasClass('ss-paginate-current'))
		{
			Rich_Web_VSldier_Src=jQuery('.Rich_Web_VSldier_SS_Img_'+jQuery(this).index()).attr('id');
		}
	})
	Rich_Web_VSlider_Open_Video(Rich_Web_VSldier_Src);
}
function Rich_Web_VSlider_TS_Open_Video(Rich_Web_VSldier_Src)
{
	jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div').css('display','block');
	jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div .Rich_Web_VSlider_TS_Src_Iframe').attr('src',Rich_Web_VSldier_Src+'?autoplay=1');
	jQuery('.Rich_Web_VSlider_TS_PlayIcon').css('display','none');
}
function Rich_Web_VSlider_TS_Play_Video()
{
	var Rich_Web_VSldier_Src;
	jQuery('#thumbcon img').each(function(){
		if(jQuery(this).hasClass('selected'))
		{
			Rich_Web_VSldier_Src=jQuery(this).attr('alt');
		}
	})
	Rich_Web_VSlider_TS_Open_Video(Rich_Web_VSldier_Src)
}
function Rich_Web_VSlider_TS_Close_Video()
{
	jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div').css('display','none');
	jQuery('#gallery-con .Rich_Web_TS_Play_Video_Div .Rich_Web_VSlider_TS_Src_Iframe').attr('src', '');
	jQuery('.Rich_Web_VSlider_TS_PlayIcon').css('display','block');
}
function RIch_Web_SVS_Play_Video(VSlider_ID)
{
	jQuery('.RichWeb_SVS_'+VSlider_ID+' iframe').css('z-index','30');
	jQuery('.RichWeb_SVS_'+VSlider_ID+' .Rich_Web_VSlider_SVS_PlayIcon').fadeOut();
	jQuery('#Rich_Web_VS_SVS_'+VSlider_ID+' a').each(function(){
		if(jQuery(this).hasClass('iis-current-slide'))
		{
			jQuery('.RichWeb_SVS_'+VSlider_ID+' iframe').attr('src',jQuery(this).attr('data-src-2x')+'?autoplay=1');
		}
	})
}
function RIch_Web_SVS_Close_Video()
{
	jQuery('.RichWeb_SVS iframe').css('z-index','-1');
	jQuery('.RichWeb_SVS iframe').attr('src','');
	jQuery('.Rich_Web_VSlider_SVS_PlayIcon').fadeIn();
}
function Rich_Web_VSVT_Play_Video(Rich_Web_VSVT_Play_Video_Src)
{
	jQuery('.Rich_Web_VSVT_Iframe_Div').css('display','inline');
	jQuery('#Rich_Web_VSVT_Iframe').attr('src',Rich_Web_VSVT_Play_Video_Src+'?autoplay=1');
}
function Rich_Web_VSVT_Stop_Video()
{
	jQuery('.Rich_Web_VSVT_Iframe_Div').css('display','none');
	jQuery('#Rich_Web_VSVT_Iframe').attr('src','');
}
function Rich_Web_VS_HPS_Play(Rich_Web_VS_HPS_Play_Video_Src)
{
	jQuery('.Rich_Web_VS_HPS_Overlay').show(500);
	jQuery('.Rich_Web_VS_HPS_Iframe_Div').show(500);
	jQuery('#Rich_Web_VS_HPS_Iframe').attr('src',Rich_Web_VS_HPS_Play_Video_Src+'?autoplay=1');
}
function Rich_Web_VS_HPS_Close()
{
	jQuery('.Rich_Web_VS_HPS_Overlay').hide(500);
	jQuery('.Rich_Web_VS_HPS_Iframe_Div').hide(500);
	jQuery('#Rich_Web_VS_HPS_Iframe').attr('src','');
}