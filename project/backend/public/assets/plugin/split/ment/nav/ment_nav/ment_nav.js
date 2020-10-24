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
    var baseHref = $('base').attr('href') || '';
    
    var _logoInsert = '';
    for (var i = 1; i < 15; i++) {
        _logoInsert += '<i class="logo-' + i + '"></i>'
    }
    $('.header .logo > a').append(_logoInsert);
    $('.header .menu .menu-main > li').each(function(i, element) {
        var $m = $(element),
            _def = $('> a', $m).text(),
            _hov = $('> a', $m).data('hover'),
            _insert = '<span class="def">' + _def + '</span><span class="hov">' + _hov + '</div>';
        if ($m.hasClass('lang') == false) {
            $('> a', $m).html(_insert);          
            $('> .menu-sub', $m).css({
                display: 'none',
                height: 'auto'
            })
        }
        $m.on('mouseenter', function(e) {
            $('> .menu-sub', $m).show().addClass('open')
        });
        $m.on('mouseleave', function(e) {
            $('> .menu-sub', $m).removeClass('open')
        });
        $('> a', $m).on('click', function(e) {
            e.preventDefault();
            if ($('.header a.menu-switch').is(':visible') == false) {
                location.href = baseHref + $(this).attr('href')
            } else {
                if ($('> .menu-sub', $m).length < 1) {
                    location.href = baseHref + $(this).attr('href')
                } else {
                    $m.toggleClass('open')
                }
            }
        })
    });
    $('.header a.menu-switch').on('click', function(e) {
        if ($(this).hasClass('open') == false) {
            openNav()
        } else {            
            closeNav()
        }
    });
    

    function openNav() {
        var sctop = 0 - $win.scrollTop();
        $('.header, .header .social ul, .header a.menu-switch, .header .menu nav, .g-wrap').addClass('open');
        $('.header a.menu-switch i.fa').attr('class', 'fa fa-times');
        $('.g-wrap').css({
            'top': sctop
        });
        $('body').append('<div class="nav-menu-mask" style="position:fixed; z-index:5000; width:100%; height:100%; background:rgba(0,0,0,.5); top:0; left:0; opacity:0;"></div>');
        $('.nav-menu-mask').stop().animate({
            opacity: 1
        }, 500, 'easeOutQuart')
    }

    function closeNav() {
        // var sctop = 0 - $('.g-wrap').offset().top;
        $('.header, .header .social ul, .header a.menu-switch, .header .menu nav, .g-wrap').removeClass('open');
        $('.header a.menu-switch i.fa').attr('class', 'fa fa-bars');
        $('.g-wrap').css({
            'top': 0
        });
        // $win.scrollTop(sctop);
        $('.nav-menu-mask').stop().animate({
            opacity: 0
        }, 500, 'easeOutQuart', function() {
            $('.nav-menu-mask').remove()
        })
    }
    
});
