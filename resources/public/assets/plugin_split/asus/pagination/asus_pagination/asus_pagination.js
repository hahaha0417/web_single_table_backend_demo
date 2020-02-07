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
    // overview click switch
	var detail = $('.asus_pagination .hd-detail');
	var menu = $('.asus_pagination .hd-menu li, .hd-detail .hd-btn');
	menu.on('click', function (e) {
		var targetdetail = $(this).data('detail');
		if ($(e.target).parents().hasClass('hd-menu')) {
			menu.removeClass('hd-active');
		}
		$(this).addClass('hd-active');

		detail.removeClass('hd-open');
		$(targetdetail).addClass('hd-open');
	});

  
             
});
