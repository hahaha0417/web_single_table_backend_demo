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
    // video lightbox
	var hd_lightbox = $('#asus_connectivity #hd_lightbox');
	var player = $('#asus_connectivity #player');

	$('#asus_connectivity .play-tutorial').click(function () {
		var video = $(this).data('src') +
			'?modestbranding=0&autohide=1&showinfo=0&color=white&autoplay=1&enablejsapi=1';
		$('#asus_connectivity').css('z-index', 10000);
		player.attr('src', video);
		hd_lightbox.fadeIn();
    })

    // close lightbox
	$('#asus_connectivity .hd_close').click(function () {
		$('#asus_connectivity').css('z-index', 0);
		hd_lightbox.fadeOut();
		player.attr('src', "");
	});
    
    // expand content
    $('#asus_connectivity .hd-more').on('click', function () {
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

    // scrollReveal
	// Changing the defaults
	window.sr = ScrollReveal({
		reset: true,
		mobile: true,
		duration: 600,
		origin: 'bottom',
		distance: '50px',
		opacity: 0,
		scale: 0.8,
		easing: 'cubic-bezier(.38,.02,.52,1.35)'
	});


	sr.reveal('#asus_connectivity #greater', {
		distance: '0',
		duration: 500,
		scale: 1.5
	})

             
});
