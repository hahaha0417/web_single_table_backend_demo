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
    // fan control
    var fan_filter = $('#cooling .hd-sec-fan .hd-filter li'),
    fan_cover = $('#cooling .hd-sec-fan .fan_cover li'),
    fan_content = $('#cooling .hd-sec-fan .hd-content li');
    
    fan_filter.on('click', function(){
        var n = $(this).index();
        $(this).addClass('hd-active').siblings().removeClass('hd-active');
        fan_cover.removeClass('hd-active').eq(n).addClass('hd-active');
        fan_content.removeClass('hd-active').eq(n).addClass('hd-active');
    })     
             
});
