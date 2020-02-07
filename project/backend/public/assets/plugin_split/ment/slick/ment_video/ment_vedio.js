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


$(document).ready(function(e) {
    var $win = $(window);
    var $vc = $('.video-carousel');
    var video_init = false;
    
    $('li > a', $vc).append('<i></i>');
    $vc.AnimatedSlider({
        prevButton: '.video-prev',
        nextButton: '.video-next',
        visibleItems: 5,
        willChangeCallback: function() {
            var ph = 0;
            $('> li', $vc).each(function(i, element) {
                var $t = $(element);
                if ($t.hasClass('previous_hidden') == true) ph = i
            });
            if ($('> li.next_item_2', $vc).index() == $('> li', $vc).length - 1) {
                $('> li:eq(' + ph + '), > li:eq(0)', $vc).addClass('view')
            } else {
                $('> li:eq(' + ph + '), > li.next_item_2 + li', $vc).addClass('view')
            }
        },
        userChangedCallback: function() {
            reParallax()
        }
    });
    $vc.on('swiperight', function() {
        $('.video-prev').click()
    });
    $vc.on('swipeleft', function() {
        $('.video-next').click()
    });
    $('a.item-box', $vc).on('click', function(e) {  
        e.preventDefault();
        var _thisId = $(this).parent().index();
        var _videoHtml = '<div class="video-carousel-mask"><a href="#" title="關閉"><i class="fa fa-times"></i></a></div>' + '<div class="video-carousel-slick">';
        var _videoThumb = '<div class="video-carousel-thumb">';
        $('> li', $vc).each(function(i, element) {
            var $this = $(element),
                _video = $('> a', $this).attr('href'),
                _idtemp = _video.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/embed\/|\/v\/|\/watch\?v=|\/)([^\s&]+)/);
            _id = _idtemp[1].split('?'), src = 'https://www.youtube.com/embed/' + _id[0] + '?rel=0&autoplay=0&enablejsapi=1';
            _videoHtml += '<div class="video-carousel-item"><div><iframe src="' + src + '" allowfullscreen></iframe></div></div>';
            _videoThumb += '<div><a href="#" title="' + $('> a', $this).attr('title') + '"><img src="' + $('> a > img', $this).attr('src') + '" alt="*" class="img-responsive"></a></div>'
        });
        _videoHtml += '</div></div>';
        _videoThumb += '</div>';
        $('body').append(_videoHtml).append(_videoThumb);
        $('.video-carousel-slick').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var player = $('.video-carousel-slick .video-carousel-item[data-slick-index="' + currentSlide + '"]').find("iframe").get(0);
            var command = {
                event: 'command',
                func: 'pauseVideo'
            };
            player.contentWindow.postMessage(JSON.stringify(command), '*')
        });
        $('.video-carousel-slick').slick({
            fade: true,
            speed: 500,
            draggable: false,
            swipe: false,
            touchMove: false,
            cssEase: 'cubic-bezier(0,.4,.4,1)',
            asNavFor: '.video-carousel-thumb',
            initialSlide: _thisId
        });
        $('.video-carousel-thumb').slick({
            arrows: false,
            speed: 500,
            slidesToShow: 6,
            slidesToScroll: 1,
            focusOnSelect: true,
            swipeToSlide: true,
            easing: 'easeOutQuart',
            asNavFor: '.video-carousel-slick',
            initialSlide: _thisId
        });
        // jQuery UI 1.12已移除easeOutQuart
        // https://api.jqueryui.com/easings/
        $('.video-carousel-mask').on('click', function(e) {            
            $('.video-carousel-mask, .video-carousel-slick, .video-carousel-thumb').stop().animate({
                'opacity': 0
            }, 500, 'swing', function() {
                $('.video-carousel-mask, .video-carousel-slick, .video-carousel-thumb').remove();
            })
        })

        $('.video-carousel-thumb .slick-slide').on('click', function(e) {  
            e.preventDefault();
        });
    });
    // $('.ment_video').addClass('view');

    $win.on('scroll', function(e) {
        var sctop = $win.scrollTop(),
            sec5 = $vc.offset().top - $win.outerHeight() / 2;
        
        if (!video_init && sctop > sec5) {
            video_init = true;
            // 由於chrome有問題，畫面會閃，所以不用
            $('.ment_video').addClass('view');
            
        }   
           
    }).trigger('scroll');

    
});
