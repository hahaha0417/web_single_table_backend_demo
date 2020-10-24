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
    var $as = $('.artist-slick');
    var artist_init = false;
    
    $as.on('init', function() {
        reParallax()
    });
    $as.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        var maxSlide = parseInt(slick.slideCount) - 1;
        if (currentSlide == "0" && nextSlide == (maxSlide)) {
            $('.item[data-slick-index="-1"]', $as).addClass('slick-current-temp')
        } else if (currentSlide == maxSlide && nextSlide == "0") {
            $('.item[data-slick-index="' + slick.slideCount + '"]', $as).addClass('slick-current-temp')
        }
    });
    $as.on('afterChange', function(event, slick, currentSlide) {
        $('.item[data-slick-index="-1"], .item[data-slick-index="' + slick.slideCount + '"]', $as).removeClass('slick-current-temp')
    });
    $as.slick({
        arrows: true,
        centerMode: true,
        centerPadding: '33.333%',
        infinite: true,
        speed: 800,
        easing: 'easeOutExpo',
        responsive: [{
            breakpoint: 992,
            settings: {
                centerPadding: '0'
            }
        }]
    });
    // $as.addClass('view').delay(1000).queue(function() {
    //     $('.item', $as).addClass('view').dequeue()
    // })

    $win.on('scroll', function(e) {
        
        var sctop = $win.scrollTop(),
            sec4 = $as.offset().top - $win.outerHeight() / 2;
        if (!artist_init && sctop > sec4) {
            artist_init = true;
            
            $as.addClass('view').delay(1000).queue(function() {
                $('.item', $as).addClass('view').dequeue()
            })
            
        }
        
       
    }).trigger('scroll');


});



function reParallax() {
    $(window).trigger('resize.px.parallax')
}