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
    var news_init = false;
    var $ns = $('.news-slick');  
    $ns.slick({
        arrows: false,
        dots: true,
        speed: 800,
        easing: 'easeOutExpo',
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    // $ns.addClass('view'); 
    $win.on('scroll', function(e) {
        var sctop = $win.scrollTop();           
        var sec3 = $ns.offset().top - $win.outerHeight() / 2;
        
        if (!news_init && sctop > sec3) {   
            news_init = true;     
            
            $ns.addClass('view'); 
            
        }
    }).trigger('scroll');
});