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
    $('#fp-nav a[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').stop(0,1).animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
    
    $(window).scroll(function () {
		var windscroll = $(window).scrollTop();
		if (windscroll >= 50) {
			$('section').each(function (i) {
				if ($(this).position().top <= windscroll + 100) {
					$('#fp-nav li a.active').removeClass('active');
					$('#fp-nav li').eq(i).find("a").addClass('active');
				}
			});
		} else {
			$('#fp-nav li a.active').removeClass('active');
			$('#fp-nav li:first').find("a").addClass('active');
		}

	}).scroll();             
});