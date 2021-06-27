/*
{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/

$(function(){   
             
});


$(function(){   
    // video lightbox
	var hd_lightbox = $('.asus_sec_vtop #lightbox');
	var player = $('#player');

    $('.asus_sec_vtop .play-tutorial').click(function () {
		var video = $(this).data('src') +
			'?modestbranding=0&autohide=1&showinfo=0&color=white&autoplay=1&enablejsapi=1';
			$('.asus_sec_vtop').css('z-index', 10000);
		player.attr('src', video);
		hd_lightbox.fadeIn();
	})

	// close lightbox
	$('.asus_sec_vtop #lightbox .hd_filter, .asus_sec_vtop .hd_close').click(function () {
		$('.asus_sec_vtop').css('z-index', 0);
		hd_lightbox.fadeOut();
		player.attr('src', "");
	});
             
});

