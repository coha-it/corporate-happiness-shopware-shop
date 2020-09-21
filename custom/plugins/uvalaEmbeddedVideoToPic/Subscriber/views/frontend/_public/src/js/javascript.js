function uv_executeembvidtpc_jquery() {
	if (typeof(jQuery) !== 'undefined') {
		(function($) {
			$(function() {

				var uvemvitp_frame_height = 0;
				var uvemvitp_frame_width = 0;

				function uvrecalc_videoiframe() {
					if ($('div.image--gallery div.image-slider--container').length > 0) {
						uvemvitp_frame_height = $('div.image--gallery div.image-slider--container').css('height').replace('px', '');
						uvemvitp_frame_width = $('div.image--gallery div.image-slider--container').css('width').replace('px', '');
					} else {
						uvemvitp_frame_height = $('div.product--image-container div.image-slider--container').css('height').replace('px', '');
						uvemvitp_frame_width = $('div.product--image-container div.image-slider--container').css('width').replace('px', '');
					}
					var uvemvitp_tmp_iframe_height = 0;
					var uvemvitp_tmp_iframe_width = 0;
					uvemvitp_tmp_iframe_height = (uvemvitp_frame_width * 0.5625);
					uvemvitp_tmp_iframe_width = uvemvitp_frame_width;
					if (uvemvitp_frame_height < uvemvitp_tmp_iframe_height) {
						uvemvitp_tmp_iframe_width = (uvemvitp_frame_height / 0.5625);
						uvemvitp_tmp_iframe_height = uvemvitp_frame_height;
					}
					uvemvitp_tmp_iframe_width = Math.round(uvemvitp_tmp_iframe_width);
					uvemvitp_tmp_iframe_height = (uvemvitp_tmp_iframe_width * 0.5625);
					uvemvitp_tmp_iframe_height = Math.round(uvemvitp_tmp_iframe_height);
					uvemvitp_tmp_iframe_width = (uvemvitp_tmp_iframe_height / 0.5625);
					uvemvitp_tmp_iframe_width = Math.round(uvemvitp_tmp_iframe_width);
					if ($('div.image--gallery div.image-slider--container').length > 0) {
						$('div.image--gallery div.image-slider--container').find('iframe').css('height', uvemvitp_tmp_iframe_height+'px');
						$('div.image--gallery div.image-slider--container').find('iframe').css('width', uvemvitp_tmp_iframe_width+'px');
						$('div.image--gallery div.image-slider--container').find('iframe').css('margin-top', ((uvemvitp_frame_height-uvemvitp_tmp_iframe_height)/2)+'px');
					} else {
						$('div.product--image-container div.image-slider--container').find('iframe').css('height', uvemvitp_tmp_iframe_height+'px');
						$('div.product--image-container div.image-slider--container').find('iframe').css('width', uvemvitp_tmp_iframe_width+'px');
						$('div.product--image-container div.image-slider--container').find('iframe').css('margin-top', ((uvemvitp_frame_height-uvemvitp_tmp_iframe_height)/2)+'px');
						if ($('span.uvemvitp_jqcobuonif').length > 0) {
							uvemvitp_tmp_cobu_width = ((uvemvitp_frame_width-uvemvitp_tmp_iframe_width)/2);
							uvemvitp_tmp_cobu_height = ((uvemvitp_frame_height-uvemvitp_tmp_iframe_height)/2);
							$('span.uvemvitp_jqcobuonif div.uvemvitp_addendbutton').css('margin', uvemvitp_tmp_cobu_height+'px '+uvemvitp_tmp_cobu_width+'px');
						}
					}
				}
				if ($('span.uvemvitp_jqresactive').length > 0) {
					$(window).resize(function() {
						uvrecalc_videoiframe();
					});
					uvrecalc_videoiframe();
					$('div.product--image-container div.image-slider--container').on('click', 'div.image-slider--slide', function() {
						uvrecalc_videoiframe();
					});
				}
				function uvembvid_stopvideo_andremoveclass(uvembvid_input_val) {
					$('span.uvemvitp_currentset').each(function() {
						$(this).removeClass('uvemvitp_currentset');
						if (uvembvid_input_val == 1) {
							var uvembvid_currentpos = $($('div.image--gallery div.image-slider--container div.image-slider--item')).index($(this).closest('div.image-slider--item'));
							var uvtmbvid_current_target = $('div.image--gallery div.image-slider--container div.image-slider--item').eq(uvembvid_currentpos).find('iframe');
						} else {
							var uvembvid_currentpos = $($('div.product--image-container div.image-slider--container div.image-slider--item')).index($(this).closest('div.image-slider--item'));
							var uvtmbvid_current_target = $('div.product--image-container div.image-slider--container div.image-slider--item').eq(uvembvid_currentpos).find('iframe');
						}
						var uvembvid_iframeurl = uvtmbvid_current_target.attr('src');
						uvtmbvid_current_target.attr('src', uvembvid_iframeurl);
					});
				}

				var uvembvid_running_on = 0;
				var uvembvid_running_curr = 0;
				function uvembvid_videoshow_check() {
					var uvembvid_poscounter_total = $('span.uvemvitp_jqswitchwatch').length;
					var uvembvid_poscounter_current = $('span.uvemvitp_jqswitchwatch').length;
					$('span.uvemvitp_jqswitchwatch').each(function() {
						var uvembvid_offset_element = $(this).parent().offset().left;
						uvembvid_offset_element = Math.round(uvembvid_offset_element);
						if ($('div.image--gallery div.image-slider--container').length > 0) {
							uvembvid_running_curr = 1;
							var uvembvid_offet_slideframe = $('div.image--gallery div.image-slider--container').offset().left;
						} else {
							uvembvid_running_curr = 0;
							var uvembvid_offet_slideframe = $('div.product--image-container div.image-slider--container').offset().left;
						}
						if (uvembvid_running_on != uvembvid_running_curr) {
							uvembvid_stopvideo_andremoveclass(uvembvid_running_on);
						}
						uvembvid_running_on = uvembvid_running_curr;
						if ((uvembvid_offet_slideframe < (uvembvid_offset_element+4)) && (uvembvid_offet_slideframe > (uvembvid_offset_element-4))) {
							uvembvid_poscounter_current--;
							if (!$(this).hasClass('uvemvitp_currentset')) {
								uvembvid_stopvideo_andremoveclass(uvembvid_running_curr);
								$(this).addClass('uvemvitp_currentset');
							}
						}
					});
					if (uvembvid_poscounter_total == uvembvid_poscounter_current) {
						uvembvid_stopvideo_andremoveclass(uvembvid_running_curr);
					}
					setTimeout(uvembvid_videoshow_check, 800);
				}
				if ($('span.uvemvitp_jqswitchwatch').length > 0) {
					uvembvid_videoshow_check();
				}

				var uvembvid_allow_tostop_video = 1;
				if ($('span.uvemvitp_jqscrollwatch').length > 0) {
					$( window ).scroll(function() {
						var uvembvid_calc_elementheight = ($('div.product--image-container div.image-slider--container').offset().top)+($('div.product--image-container div.image-slider--container').outerHeight());
						if (($(window).scrollTop()) > uvembvid_calc_elementheight) {
							if (uvembvid_allow_tostop_video == 1) {
								uvembvid_stopvideo_andremoveclass('0');
								uvembvid_allow_tostop_video = 0;
							}
						} else {
							uvembvid_allow_tostop_video = 1;
						}
					});
				}
				if ($('span.image--media.uvemvitp_jqshowbtns').length > 0) {
					$('div.product--image-container').addClass('uv_videoshowbutns');
				}
			});
		})(jQuery);
	} else {
		setTimeout(uv_executeembvidtpc_jquery, 200);
	}
}
uv_executeembvidtpc_jquery();