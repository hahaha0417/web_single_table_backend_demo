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


	// expand content
	$('#asus_lighting .hd-more').on('click', function () {
		var $this = $(this),
			source = $this.data('source'),
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
    
    $(function() {
        // AURA SYNC
        var colorpicker = $('#asus_lighting #colorpicker');
        var colorbg = $('#asus_lighting #color');
        var greybg = $('#asus_lighting #greybg');
        var starryNight = $('#asus_lighting .starry_night');
        $('#asus_lighting .hd-controls li').click(function() {
            $(this).siblings().removeClass('hd-active');
            $(this).addClass('hd-active');

            switch ($(this).data('style')) {
                case 1:
                    colorpicker.fadeIn();
                    greybg.removeClass();
                    colorbg.removeClass();
                    starryNight.css('display', 'none');
                    break;
                case 2:
                    colorpicker.fadeOut();
                    greybg.removeClass();
                    colorbg.removeClass();
                    starryNight.css('display', 'none');
                    break;
                case 3:
                    colorpicker.fadeOut();
                    greybg.removeClass();
                    colorbg.removeClass();
                    colorbg.addClass('hd-rainbow');
                    starryNight.css('display', 'none');
                    break;
                case 4:
                    colorpicker.fadeOut();
                    greybg.removeClass();
                    colorbg.removeClass();
                    colorbg.addClass('hd-comet');
                    starryNight.css('display', 'none');
                    break;
                case 5:
                    colorpicker.fadeOut();
                    greybg.addClass('hd-flashbg');
                    colorbg.removeClass();
                    colorbg.addClass('hd-flash');
                    starryNight.css('display', 'none');
                    break;
                case 6:
                    colorpicker.fadeIn();
                    greybg.removeClass();
                    colorbg.removeClass();
                    colorbg.addClass('hd-yoyo');
                    starryNight.css('display', 'none');
                    break;
                case 7:
                    colorpicker.fadeOut();
                    greybg.removeClass();
                    colorbg.addClass('hd-starryNight');
                    starryNight.css('display', 'block');
                    break;
            }

            var ani = $(this).data('animate') + ' infinite';
            colorbg.css({
                'animation': ani
            })
        })

        // color picker
        colorpicker.farbtastic({
            callback: '#asus_lighting #color',
            width: 130
        });

        var cp = $.farbtastic('#asus_lighting #colorpicker');

        cp.setColor("#CE0000");

        $('#asus_lighting #color').change(function() {
            
            if (cp.hsl[2] < 0.2) {
                $(this).css("background-color", "#333333");
            }
        })
    })
});
