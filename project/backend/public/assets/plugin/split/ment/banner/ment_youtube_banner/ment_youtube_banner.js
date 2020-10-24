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
    var $videoPlayer = $('#ban-video-player');    
    if ($videoPlayer.length > 0) {
                         
        $videoPlayer.tubeplayer({
            autoPlay: true,
            showControls: false,
            annotations: false,
            loop: 1,
            allowFullScreen: "false",
            initialVideo: $videoPlayer.data('video-id'),
            onPlay: function(id) {},
            onPause: function() {},
            onStop: function() {},
            onSeek: function(time) {},
            onMute: function() {},
            onUnMute: function() {}
        });
        var w = 0;
        $win.on('scroll', function(e) {
            var sctopv = $win.scrollTop(),
                banStop = $('.header').outerHeight() + $('#index .banner').outerHeight() / 5;
            if (sctopv > banStop) {
                $videoPlayer.tubeplayer('pause')
            } else if (w > 991) {
                $videoPlayer.tubeplayer('play')
            }
        }).trigger('scroll');
        $win.on('resize', function(e) {
            w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            if (w < 992) {
                // 插件太小會黑屏，所以暫停
                $videoPlayer.tubeplayer('pause')
            }
        }).trigger('resize')
        
    }

    $win.on('scroll', function(e) {
        var sctop = $win.scrollTop(),
            banTop = sctop * 0.5;
        $('#index .banner').css({
            'top': banTop
        });
        
    }).trigger('scroll');

    
    

});


