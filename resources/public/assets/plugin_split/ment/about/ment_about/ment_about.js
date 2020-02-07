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
    $win.on('scroll', function(e) {
        var sctop = $win.scrollTop(), sec1 = $('.ment_about .about-inner').offset().top - $win.outerHeight() + 200;
        $('.ment_about').addClass('view');        
        if (sctop > sec1) {
            $('.ment_about .start-ico i').addClass('view-1');
            setTimeout(function() {
                $('.ment_about .start-ico i').addClass('view-2')
            }, 800);
            setTimeout(function() {
                $('.ment_about .start-ico').addClass('view')
            }, 1000);
            setTimeout(function() {
                $('.ment_about .lines').addClass('view')
            }, 1250);
            setTimeout(function() {
                $('.ment_about .box').addClass('view')
            }, 2250)
        }
    }).trigger('scroll');
    $('.anchor-to').on('click', function(e) {
        var target = $(this).offset().top - $('.header').outerHeight() - 49;
        $('html, body').stop().animate({
            scrollTop: target
        }, 1200, 'easeOutQuart')
    })
}); 