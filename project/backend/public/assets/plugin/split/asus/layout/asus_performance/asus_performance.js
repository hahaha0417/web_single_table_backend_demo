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
	var detail = $('#asus_performance .hd-detail');
	var menu = $('#asus_performance .hd-menu li, .hd-detail .hd-btn');
	menu.on('click', function (e) {
		var targetdetail = $(this).data('detail');
		if ($(e.target).parents().hasClass('hd-menu')) {
			menu.removeClass('hd-active');
		}
		$(this).addClass('hd-active');

		detail.removeClass('hd-open');
		$(targetdetail).addClass('hd-open');
	});

    // expand content
    $('#asus_performance .hd-more').on('click', function () {
        var $this = $(this),
            source = $this.data('source'),ㄋ
            hidden = $this.next();

        hidden.find('img').each(function () {
            $(this).attr('src', $(this).data('source')).css('visibility', 'visible');
        })

        $this.toggleClass('hd-open');
        hidden.slideToggle(1000);
        if ($this.hasClass('hd-open')) {
            $('html, body').stop(0,1).animate({
                scrollTop: $this.offset().top
            }, 1000);
        }
    });
         
    $("#asus_performance .hd-sec-mode h4").click(function(){
        $(this).parent().find(".mode-content").slideToggle(1000);
    });
});
