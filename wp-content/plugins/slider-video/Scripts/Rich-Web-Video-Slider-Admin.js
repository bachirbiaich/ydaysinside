function RichWeb_Video_Slider_Add(number){
	jQuery('.Table_Data_VS_Rich_Web1').css('display','none');
	jQuery('.Rich_Web_VSlider_Add').addClass('Rich_Web_VSlider_AddAnim');
	jQuery('.Table_Data_VS_Rich_Web2').css('display','block');
	jQuery('.Rich_Web_VSlider_Sav').addClass('Rich_Web_VSlider_SavAnim');
	jQuery('.Rich_Web_VSlider_Can').addClass('Rich_Web_VSlider_CanAnim');
	jQuery('.Rich_Web_VSlider_ID').html('[Rich_Web_Video id="'+number+'"]');
	jQuery('.Rich_Web_VSlider_ID_1').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Video id="'+number+'"]&apos;);?&gt');
}
function RichWeb_Video_Slider_Cancel(){
	location.reload();
}
function Rich_Web_Res_VSlider_Vid()
{
	jQuery('.Rich_Web_VSlider_Input2').val('');
	jQuery('.Rich_Web_VSlider_ONT').attr('checked',false);
}
function Rich_Web_Upload_Video(){
	var RWIntervId = setInterval(function(){
		var code = jQuery('#Rich_Web_Vid_Src_1').val();		
		if(code.indexOf('https://www.youtube.com/')>0)
		{
			var Rich_Web_Codes1 = code.split('<a href="https://www.youtube.com/');
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				var Rich_Web_Codes2= Rich_Web_Codes1[1].split("=");
				var Rich_Web_Code_Src = Rich_Web_Codes2[1].split('&');

				jQuery('#Rich_Web_Vid_Src_2').val('https://www.youtube.com/embed/'+Rich_Web_Code_Src[0]);
				jQuery('#Rich_Web_Vid_ImSrc_2').val('http://img.youtube.com/vi/'+Rich_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Rich_Web_Vid_Vid_1').val('https://www.youtube.com/watch?v='+Rich_Web_Code_Src[0]);
				if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
					clearInterval(RWIntervId);
				}				
			}
			else if(code.indexOf('embed')>0)
			{
				var Rich_Web_Codes1=code.split('[embed]');
				var Rich_Web_Codes2=Rich_Web_Codes1[1].split('[/embed]');
				if(Rich_Web_Codes2[0].indexOf('watch?')>0)
				{
					var Rich_Web_Codes3=Rich_Web_Codes2[0].split('=');
					
					jQuery('#Rich_Web_Vid_Src_2').val('https://www.youtube.com/embed/'+Rich_Web_Codes3[1]);
					jQuery('#Rich_Web_Vid_ImSrc_2').val('http://img.youtube.com/vi/'+Rich_Web_Codes3[1]+'/mqdefault.jpg');
					jQuery('#Rich_Web_Vid_Vid_1').val('https://www.youtube.com/watch?v='+Rich_Web_Codes3[1]);
					if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
						clearInterval(RWIntervId);
					}	
				}
				else
				{
					var Rich_Web_Code_Src=Rich_Web_Codes2[0];
					var Rich_Web_Im_Src=Rich_Web_Code_Src.split('embed/');

					jQuery('#Rich_Web_Vid_Src_2').val(Rich_Web_Code_Src);
					jQuery('#Rich_Web_Vid_ImSrc_2').val('http://img.youtube.com/vi/'+Rich_Web_Im_Src[1]+'/mqdefault.jpg');
					jQuery('#Rich_Web_Vid_Vid_1').val('https://www.youtube.com/watch?v='+Rich_Web_Im_Src[1]);
					if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
						clearInterval(RWIntervId);
					}	
				}
			}
			else
			{
				var Rich_Web_Codes2= Rich_Web_Codes1[1].split('=');
				var Rich_Web_Code_Src = Rich_Web_Codes2[1].split('">https://');

				jQuery('#Rich_Web_Vid_Src_2').val('https://www.youtube.com/embed/'+Rich_Web_Code_Src[0]);
				jQuery('#Rich_Web_Vid_ImSrc_2').val('http://img.youtube.com/vi/'+Rich_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Rich_Web_Vid_Vid_1').val('https://www.youtube.com/watch?v='+Rich_Web_Code_Src[0]);
				if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
					clearInterval(RWIntervId);
				}				
			}	
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			var Rich_Web_VSlider_Video_Vid = code.split('<a href="')[1].split('">')[0]; 
			jQuery('#Rich_Web_Vid_Vid_1').val(Rich_Web_VSlider_Video_Vid);			
			var Rich_Web_Codes1 = code.split('<a href="https://youtu.be/'); 
			var Rich_Web_Code_Src = Rich_Web_Codes1[1].split('">https://');

			jQuery('#Rich_Web_Vid_Src_2').val('https://www.youtube.com/embed/'+Rich_Web_Code_Src[0]);
			jQuery('#Rich_Web_Vid_ImSrc_2').val('http://img.youtube.com/vi/'+Rich_Web_Code_Src[0]+'/mqdefault.jpg');
			if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
				clearInterval(RWIntervId);
			}				
		}
		else if(code.indexOf('https://vimeo.com/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Rich_Web_Codes1=code.split('[embed]https://vimeo.com/');
				var Rich_Web_Code_Src=Rich_Web_Codes1[1].split('[/embed]');
				jQuery('#Rich_Web_Vid_Vid_1').val('https://vimeo.com/'+Rich_Web_Code_Src[0]); 
				if(Rich_Web_Code_Src[0].length>9)
				{
					var Real_Rich_Web_Code_Src=Rich_Web_Code_Src[0].split('/');
					Rich_Web_Code_Src[0]=Real_Rich_Web_Code_Src[2];
				}
				jQuery('#Rich_Web_Vid_Src_2').val('https://player.vimeo.com/video/'+Rich_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_VSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Rich_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#Rich_Web_Vid_ImSrc_2').val(response);
					if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
						clearInterval(RWIntervId);
					}				
				});		
   			}
			else
			{
				var Rich_Web_Codes1 = code.split('<a href="https://vimeo.com/'); 
				var Rich_Web_Code_Src = Rich_Web_Codes1[1].split('">https://');
				jQuery('#Rich_Web_Vid_Vid_1').val('https://vimeo.com/'+Rich_Web_Code_Src[0]); 
				if(Rich_Web_Code_Src[0].length>9)
				{
					var Real_Rich_Web_Code_Src=Rich_Web_Code_Src[0].split('/');
					Rich_Web_Code_Src[0]=Real_Rich_Web_Code_Src[2];
				}
				jQuery('#Rich_Web_Vid_Src_2').val('https://player.vimeo.com/video/'+Rich_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Rich_Web_VSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Rich_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#Rich_Web_Vid_ImSrc_2').val(response);
					if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
						clearInterval(RWIntervId);
					}				
				});		
			}		
		}
		else if(code.indexOf('.mp4')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Rich_Web_Codes1=code.split('[embed]');
				var Rich_Web_Code_Src=Rich_Web_Codes1[1].split('[/embed]');
				jQuery('#Rich_Web_Vid_Vid_1').val(Rich_Web_Code_Src[0]); 
				jQuery('#Rich_Web_Vid_Src_2').val(Rich_Web_Code_Src[0]);
				if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
					clearInterval(RWIntervId);
				}				
   			}
   			else if(code.indexOf('video')>0)
   			{
   				var Rich_Web_Codes1 = code.split('mp4="'); 
				var Rich_Web_Code_Src = Rich_Web_Codes1[1].split('"]');
				jQuery('#Rich_Web_Vid_Vid_1').val(Rich_Web_Code_Src[0]); 
				jQuery('#Rich_Web_Vid_Src_2').val(Rich_Web_Code_Src[0]);
				if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
					clearInterval(RWIntervId);
				}	
   			}
			else
			{
				var Rich_Web_Codes1 = code.split('<a href="'); 
				var Rich_Web_Code_Src = Rich_Web_Codes1[1].split('">');
				jQuery('#Rich_Web_Vid_Vid_1').val(Rich_Web_Code_Src[0]); 
				jQuery('#Rich_Web_Vid_Src_2').val(Rich_Web_Code_Src[0]);
				if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
					clearInterval(RWIntervId);
				}		
			}	
		}
		else if(code.indexOf('vevo.com')>0)
		{
			var Rich_Web_Codes1 = code.split('<a href="'); 
			var Rich_Web_Code_Src = Rich_Web_Codes1[1].split('">');
			var Rich_Web_Code_Src1 = Rich_Web_Code_Src[0].split('/');
			jQuery('#Rich_Web_Vid_Src_2').val('http://cache.vevo.com/assets/html/embed.html?video='+Rich_Web_Code_Src1[Rich_Web_Code_Src1.length-1]+'&autoplay=1');
			jQuery('#Rich_Web_Vid_Vid_1').val('http://cache.vevo.com/assets/html/embed.html?video='+Rich_Web_Code_Src1[Rich_Web_Code_Src1.length-1]+'&autoplay=1'); 
			if(jQuery('#Rich_Web_Vid_Src_2').val().length>0){
				clearInterval(RWIntervId);
			}
		}
	},100)
}
function Rich_Web_Upload_Image()
{
	var RWIntervId = setInterval(function(){
		var code = jQuery('#Rich_Web_Vid_ImSrc_1').val();			
		if(code.indexOf('img')>0){
			var s=code.split('src="'); 
			var src=s[1].split('"');
			jQuery('#Rich_Web_Vid_ImSrc_2').val(src[0]);
			if(jQuery('#Rich_Web_Vid_ImSrc_2').val().length>0){
				jQuery('#Rich_Web_Vid_ImSrc_1').val('');	
				clearInterval(RWIntervId);
			}				
		}
	},100)
}
function Rich_Web_Sav_VSlider_Vid()
{
	var Rich_Web_VSlider_Count = jQuery('#Rich_Web_VSlider_Count').val();
	var Rich_Web_VSlider_Video_Title = jQuery('#Rich_Web_VSlider_Video_Title').val();	
	var Rich_Web_Vid_Vid_1    = jQuery('#Rich_Web_Vid_Vid_1').val();
	var Rich_Web_Vid_Src_2    = jQuery('#Rich_Web_Vid_Src_2').val();
	var Rich_Web_Vid_ImSrc_2  = jQuery('#Rich_Web_Vid_ImSrc_2').val();
	var Rich_Web_VSlider_Desc = jQuery('#Rich_Web_VSlider_Desc').val();
	var Rich_Web_VSlider_Link = jQuery('#Rich_Web_VSlider_Link').val();
	var Rich_Web_VSlider_ONT  = jQuery('#Rich_Web_VSlider_ONT').attr('checked');

	jQuery('.Rich_Web_Save_VSlider_Table3').append('<tr id="Rich_Web_VSlider_tr_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'"><td name="Rich_Web_VSlider_NN_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" id="Rich_Web_VSlider_NN_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" >'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'</td><td id="Rich_Web_VSlider_Img_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'"><img src="'+Rich_Web_Vid_ImSrc_2+'" id="Rich_Web_VSlider_Img_Src_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSlider_Img_Src_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" style="height:60px;"></td><td id="Rich_Web_VSlider_Vid_Title_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSlider_Vid_Title_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'">'+Rich_Web_VSlider_Video_Title+'</td><td id="Rich_Web_VSlider_tdEdit_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'"><i class="Rich_Web_VS_Pencil rich_web rich_web-pencil" onclick="Rich_Web_VSlider_Edit_Video('+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+')"></i></td><td id="Rich_Web_VSlider_tdDelete_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'"><i class="Rich_Web_VS_Delete rich_web rich_web-trash" onclick="Rich_Web_VSlider_Delete_Video('+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+')"></i><input type="text" style="display:none;" class="Rich_Web_VSlider_Add_Title" id="Rich_Web_VSlider_Add_Title_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSlider_Add_Title_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_VSlider_Video_Title+'" /><input type="text" style="display:none;" class="Rich_Web_VSlider_Add_Description" id="Rich_Web_VSlider_Add_Description_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSlider_Add_Description_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_VSlider_Desc+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Img" id="Rich_Web_VSldier_Add_Img_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSldier_Add_Img_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_Vid_ImSrc_2+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Vid" id="Rich_Web_VSldier_Add_Vid_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSldier_Add_Vid_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_Vid_Vid_1+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Src" id="Rich_Web_VSldier_Add_Src_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSldier_Add_Src_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_Vid_Src_2+'"/><input type="text" style="display:none" class="Rich_Web_VSldier_Add_Link" id="Rich_Web_VSldier_Add_Link_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSldier_Add_Link_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_VSlider_Link+'"><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_ONT" id="Rich_Web_VSldier_Add_ONT_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" name="Rich_Web_VSldier_Add_ONT_'+parseInt(parseInt(Rich_Web_VSlider_Count)+1)+'" value="'+Rich_Web_VSlider_ONT+'"/></td></tr>');
	jQuery('#Rich_Web_VSlider_Count').val(parseInt(parseInt(Rich_Web_VSlider_Count)+1));
	Rich_Web_Res_VSlider_Vid();
}
function Rich_Web_VSlider_Edit_Video(editNumber)
{
	var Rich_Web_VSlider_Vid_Title = jQuery('#Rich_Web_VSlider_Vid_Title_'+editNumber).text();
	var Rich_Web_VSlider_Add_Desc  = jQuery('#Rich_Web_VSlider_Add_Description_'+editNumber).val();
	var Rich_Web_VSldier_Add_Img   = jQuery('#Rich_Web_VSldier_Add_Img_'+editNumber).val();
	var Rich_Web_VSldier_Add_Vid   = jQuery('#Rich_Web_VSldier_Add_Vid_'+editNumber).val();
	var Rich_Web_VSldier_Add_Src   = jQuery('#Rich_Web_VSldier_Add_Src_'+editNumber).val();
	var Rich_Web_VSldier_Add_Link  = jQuery('#Rich_Web_VSldier_Add_Link_'+editNumber).val();
	var Rich_Web_VSldier_Add_ONT   = jQuery('#Rich_Web_VSldier_Add_ONT_'+editNumber).val();

	jQuery('#Rich_Web_VSlider_HidUp').val(editNumber);
	jQuery('.Rich_Web_VSlider_Sav_Video').hide();
	jQuery('.Rich_Web_VSlider_Upd_Video').show();
	jQuery('#Rich_Web_VSlider_Video_Title').val(Rich_Web_VSlider_Vid_Title);
	jQuery('#Rich_Web_VSlider_Desc').val(Rich_Web_VSlider_Add_Desc);
	jQuery('#Rich_Web_Vid_ImSrc_2').val(Rich_Web_VSldier_Add_Img);
	jQuery('#Rich_Web_Vid_Vid_1').val(Rich_Web_VSldier_Add_Vid);
	jQuery('#Rich_Web_Vid_Src_2').val(Rich_Web_VSldier_Add_Src);
	jQuery('#Rich_Web_VSlider_Link').val(Rich_Web_VSldier_Add_Link);
	if(Rich_Web_VSldier_Add_ONT=='checked')
	{
		jQuery('#Rich_Web_VSlider_ONT').attr('checked',true);
	}
	else
	{
		jQuery('#Rich_Web_VSlider_ONT').attr('checked',false);
	}
}
function Rich_Web_Upd_VSlider_Vid(){
	updateNumber=jQuery('#Rich_Web_VSlider_HidUp').val();

	var Rich_Web_VSlider_Vid_Title = jQuery('#Rich_Web_VSlider_Video_Title').val();
	var Rich_Web_VSlider_Add_Desc  = jQuery('#Rich_Web_VSlider_Desc').val();
	var Rich_Web_VSldier_Add_Img   = jQuery('#Rich_Web_Vid_ImSrc_2').val();
	var Rich_Web_VSldier_Add_Vid   = jQuery('#Rich_Web_Vid_Vid_1').val();
	var Rich_Web_VSldier_Add_Src   = jQuery('#Rich_Web_Vid_Src_2').val();
	var Rich_Web_VSldier_Add_Link  = jQuery('#Rich_Web_VSlider_Link').val();
	var Rich_Web_VSldier_Add_ONT   = jQuery('#Rich_Web_VSlider_ONT').attr('checked');

	jQuery('#Rich_Web_VSlider_Img_Src_'+updateNumber).attr('src',Rich_Web_VSldier_Add_Img);
	jQuery('#Rich_Web_VSlider_Add_Title_'+updateNumber).val(Rich_Web_VSlider_Vid_Title);
	jQuery('#Rich_Web_VSlider_Vid_Title_'+updateNumber).text(Rich_Web_VSlider_Vid_Title);
	jQuery('#Rich_Web_VSlider_Add_Description_'+updateNumber).val(Rich_Web_VSlider_Add_Desc);
	jQuery('#Rich_Web_VSldier_Add_Img_'+updateNumber).val(Rich_Web_VSldier_Add_Img);
	jQuery('#Rich_Web_VSldier_Add_Vid_'+updateNumber).val(Rich_Web_VSldier_Add_Vid);
	jQuery('#Rich_Web_VSldier_Add_Src_'+updateNumber).val(Rich_Web_VSldier_Add_Src);
	jQuery('#Rich_Web_VSldier_Add_Link_'+updateNumber).val(Rich_Web_VSldier_Add_Link);
	jQuery('#Rich_Web_VSldier_Add_ONT_'+updateNumber).val(Rich_Web_VSldier_Add_ONT);
	jQuery('.Rich_Web_VSlider_Sav_Video').show();
	jQuery('.Rich_Web_VSlider_Upd_Video').hide();
	Rich_Web_Res_VSlider_Vid();
}

function Rich_Web_VSlider_Delete_Video(removeNumber){
	jQuery('#Rich_Web_VSlider_tr_'+removeNumber).remove();
	jQuery('#Rich_Web_VSlider_Count').val(jQuery('#Rich_Web_VSlider_Count').val()-1);
	jQuery('.Rich_Web_Save_VSlider_Table3 tr').each(function(){
		jQuery(this).attr('id','Rich_Web_VSlider_tr_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(1)').html(parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(1)').attr('name','Rich_Web_VSlider_NN_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(1)').attr('id','Rich_Web_VSlider_NN_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(2)').attr('id','Rich_Web_VSlider_Img_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(2) img').attr('id','Rich_Web_VSlider_Img_Src_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(2) img').attr('name','Rich_Web_VSlider_Img_Src_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(3)').attr('id','Rich_Web_VSlider_Vid_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(3)').attr('name','Rich_Web_VSlider_Vid_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(4)').attr('id','Rich_Web_VSlider_tdEdit_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(4) i').attr('onclick','Rich_Web_VSlider_Edit_Video('+parseInt(parseInt(jQuery(this).index())+1)+')');
		jQuery(this).find('td:nth-child(5)').attr('id','Rich_Web_VSlider_tdDelete_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('td:nth-child(5) i').attr('onclick','Rich_Web_VSlider_Delete_Video('+parseInt(parseInt(jQuery(this).index())+1)+')');
		jQuery(this).find('.Rich_Web_VSlider_Add_Title').attr('id','Rich_Web_VSlider_Add_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSlider_Add_Title').attr('name','Rich_Web_VSlider_Add_Title_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSlider_Add_Description').attr('id','Rich_Web_VSlider_Add_Description_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSlider_Add_Description').attr('name','Rich_Web_VSlider_Add_Description_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Img').attr('id','Rich_Web_VSldier_Add_Img_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Img').attr('name','Rich_Web_VSldier_Add_Img_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Vid').attr('id','Rich_Web_VSldier_Add_Vid_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Vid').attr('name','Rich_Web_VSldier_Add_Vid_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Src').attr('id','Rich_Web_VSldier_Add_Src_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Src').attr('name','Rich_Web_VSldier_Add_Src_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Link').attr('id','Rich_Web_VSldier_Add_Link_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_Link').attr('name','Rich_Web_VSldier_Add_Link_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_ONT').attr('id','Rich_Web_VSldier_Add_ONT_'+parseInt(parseInt(jQuery(this).index())+1));
		jQuery(this).find('.Rich_Web_VSldier_Add_ONT').attr('name','Rich_Web_VSldier_Add_ONT_'+parseInt(parseInt(jQuery(this).index())+1));
	})
}
function Rich_Web_VSlider_Sortable(){
	jQuery('.Rich_Web_Save_VSlider_Table3 tbody').sortable({
		update: function( event, ui ){
			jQuery(this).find('tr').each(function(i){
				jQuery(this).attr('id','Rich_Web_VSlider_tr_'+(i+1));
				jQuery(this).find('td:nth-child(1)').html((i+1));
				jQuery(this).find('td:nth-child(1)').attr('name','Rich_Web_VSlider_NN_'+(i+1));
				jQuery(this).find('td:nth-child(1)').attr('id','Rich_Web_VSlider_NN_'+(i+1));
				jQuery(this).find('td:nth-child(2)').attr('id','Rich_Web_VSlider_Img_'+(i+1));
				jQuery(this).find('td:nth-child(2) img').attr('id','Rich_Web_VSlider_Img_Src_'+(i+1));
				jQuery(this).find('td:nth-child(2) img').attr('name','Rich_Web_VSlider_Img_Src_'+(i+1));
				jQuery(this).find('td:nth-child(3)').attr('id','Rich_Web_VSlider_Vid_Title_'+(i+1));
				jQuery(this).find('td:nth-child(3)').attr('name','Rich_Web_VSlider_Vid_Title_'+(i+1));
				jQuery(this).find('td:nth-child(4)').attr('id','Rich_Web_VSlider_tdEdit_'+(i+1));
				jQuery(this).find('td:nth-child(4) i').attr('onclick','Rich_Web_VSlider_Edit_Video('+(i+1)+')');
				jQuery(this).find('td:nth-child(5)').attr('id','Rich_Web_VSlider_tdDelete_'+(i+1));
				jQuery(this).find('td:nth-child(5) i').attr('onclick','Rich_Web_VSlider_Delete_Video('+(i+1)+')');
				jQuery(this).find('.Rich_Web_VSlider_Add_Title').attr('id','Rich_Web_VSlider_Add_Title_'+(i+1));
				jQuery(this).find('.Rich_Web_VSlider_Add_Title').attr('name','Rich_Web_VSlider_Add_Title_'+(i+1));
				jQuery(this).find('.Rich_Web_VSlider_Add_Description').attr('id','Rich_Web_VSlider_Add_Description_'+(i+1));
				jQuery(this).find('.Rich_Web_VSlider_Add_Description').attr('name','Rich_Web_VSlider_Add_Description_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Img').attr('id','Rich_Web_VSldier_Add_Img_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Img').attr('name','Rich_Web_VSldier_Add_Img_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Vid').attr('id','Rich_Web_VSldier_Add_Vid_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Vid').attr('name','Rich_Web_VSldier_Add_Vid_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Src').attr('id','Rich_Web_VSldier_Add_Src_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Src').attr('name','Rich_Web_VSldier_Add_Src_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Link').attr('id','Rich_Web_VSldier_Add_Link_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_Link').attr('name','Rich_Web_VSldier_Add_Link_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_ONT').attr('id','Rich_Web_VSldier_Add_ONT_'+(i+1));
				jQuery(this).find('.Rich_Web_VSldier_Add_ONT').attr('name','Rich_Web_VSldier_Add_ONT_'+(i+1));
			});
		}
	})
}
function Rich_Web_VS_Del(number){
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_VSlider_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		location.reload();
	})
}


function Rich_Web_VS_Edit(number){
	jQuery('.Table_Data_VS_Rich_Web1').css('display','none');
	jQuery('.Rich_Web_VSlider_Add').addClass('Rich_Web_VSlider_AddAnim');
	jQuery('.Table_Data_VS_Rich_Web2').css('display','block');
	jQuery('.Rich_Web_VSlider_Upd').addClass('Rich_Web_VSlider_SavAnim');
	jQuery('.Rich_Web_VSlider_Can').addClass('Rich_Web_VSlider_CanAnim');
	jQuery('#Rich_Web_VSlider_Update_ID').val(number);
	jQuery('.Rich_Web_VSlider_ID').html('[Rich_Web_Video id="'+number+'"]');
	jQuery('.Rich_Web_VSlider_ID_1').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Video id="'+number+'"]&apos;);?&gt');
	
	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_VSlider_Edit_Main', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var arr=Array();
		var spl=response.split('=>');
		for(var i=3;i<spl.length;i++){
			arr[arr.length]=spl[i].split('[')[0].trim(); 
		}
		arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
		jQuery('.Rich_Web_VSlider_Name').val(arr[0]);
		jQuery('.Rich_Web_VSlider_Type').val(arr[1]);
		jQuery('#Rich_Web_VSlider_Count').val(arr[2]);
	})

	var ajaxurl = object.ajaxurl;
	var data = {
	action: 'Rich_Web_VSlider_Edit_Videos', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
	foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var Rich_Web_VSlider_Vid_Title = Array();
		var Rich_Web_VSlider_Add_Desc  = Array();
		var Rich_Web_VSldier_Add_Img   = Array();
		var Rich_Web_VSldier_Add_Vid   = Array();
		var Rich_Web_VSldier_Add_Src   = Array();
		var Rich_Web_VSldier_Add_Link  = Array();
		var Rich_Web_VSldier_Add_ONT   = Array();

		var RichWebCountVideos=response.split('stdClass Object');

		for(i=1;i<RichWebCountVideos.length;i++)
		{
			var Rich_Web_VS=RichWebCountVideos[i].split('=>');
			Rich_Web_VSlider_Vid_Title[Rich_Web_VSlider_Vid_Title.length] = Rich_Web_VS[2].split('[')[0].trim();
			Rich_Web_VSlider_Add_Desc[Rich_Web_VSlider_Add_Desc.length]   = Rich_Web_VS[3].split('[')[0].trim();
			Rich_Web_VSldier_Add_Img[Rich_Web_VSldier_Add_Img.length]     = Rich_Web_VS[4].split('[')[0].trim();
			Rich_Web_VSldier_Add_Vid[Rich_Web_VSldier_Add_Vid.length]     = Rich_Web_VS[5].split('[')[0].trim();
			Rich_Web_VSldier_Add_Src[Rich_Web_VSldier_Add_Src.length]     = Rich_Web_VS[6].split('[')[0].trim();
			Rich_Web_VSldier_Add_Link[Rich_Web_VSldier_Add_Link.length]   = Rich_Web_VS[7].split('[')[0].trim();
			Rich_Web_VSldier_Add_ONT[Rich_Web_VSldier_Add_ONT.length]     = Rich_Web_VS[8].split('[')[0].trim();
		}
		for(i=1;i<=Rich_Web_VSlider_Vid_Title.length;i++)
		{
			jQuery('.Rich_Web_Save_VSlider_Table3').append('<tr id="Rich_Web_VSlider_tr_'+i+'"><td name="Rich_Web_VSlider_NN_'+i+'" id="Rich_Web_VSlider_NN_'+i+'" >'+i+'</td><td id="Rich_Web_VSlider_Img_'+i+'"><img src="'+Rich_Web_VSldier_Add_Img[i-1]+'" id="Rich_Web_VSlider_Img_Src_'+i+'" name="Rich_Web_VSlider_Img_Src_'+i+'" style="height:60px;"></td><td id="Rich_Web_VSlider_Vid_Title_'+i+'" name="Rich_Web_VSlider_Vid_Title_'+i+'">'+Rich_Web_VSlider_Vid_Title[i-1]+'</td><td id="Rich_Web_VSlider_tdEdit_'+i+'"><i class="Rich_Web_VS_Pencil rich_web rich_web-pencil" onclick="Rich_Web_VSlider_Edit_Video('+i+')"></i></td><td id="Rich_Web_VSlider_tdDelete_'+i+'"><i class="Rich_Web_VS_Delete rich_web rich_web-trash" onclick="Rich_Web_VSlider_Delete_Video('+i+')"></i><input type="text" style="display:none;" class="Rich_Web_VSlider_Add_Title" id="Rich_Web_VSlider_Add_Title_'+i+'" name="Rich_Web_VSlider_Add_Title_'+i+'" value="'+Rich_Web_VSlider_Vid_Title[i-1]+'" /><input type="text" style="display:none;" class="Rich_Web_VSlider_Add_Description" id="Rich_Web_VSlider_Add_Description_'+i+'" name="Rich_Web_VSlider_Add_Description_'+i+'" value="'+Rich_Web_VSlider_Add_Desc[i-1]+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Img" id="Rich_Web_VSldier_Add_Img_'+i+'" name="Rich_Web_VSldier_Add_Img_'+i+'" value="'+Rich_Web_VSldier_Add_Img[i-1]+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Vid" id="Rich_Web_VSldier_Add_Vid_'+i+'" name="Rich_Web_VSldier_Add_Vid_'+i+'" value="'+Rich_Web_VSldier_Add_Vid[i-1]+'"/><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_Src" id="Rich_Web_VSldier_Add_Src_'+i+'" name="Rich_Web_VSldier_Add_Src_'+i+'" value="'+Rich_Web_VSldier_Add_Src[i-1]+'"/><input type="text" style="display:none" class="Rich_Web_VSldier_Add_Link" id="Rich_Web_VSldier_Add_Link_'+i+'" name="Rich_Web_VSldier_Add_Link_'+i+'" value="'+Rich_Web_VSldier_Add_Link[i-1]+'"><input type="text" style="display:none;" class="Rich_Web_VSldier_Add_ONT" id="Rich_Web_VSldier_Add_ONT_'+i+'" name="Rich_Web_VSldier_Add_ONT_'+i+'" value="'+Rich_Web_VSldier_Add_ONT[i-1]+'"/></td></tr>');
		}
	})
}