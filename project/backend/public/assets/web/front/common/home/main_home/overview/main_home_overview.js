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

// 外接區段，與其他頁面連接寫在這裡
$(function(){    
    if($(parent.document) && $(parent.document).find("#home_content_frame").get(0))
    {
        // 不須在裡面做這個
        $(window).resize(function(){        
            var iframeid = $(parent.document).find("#home_content_frame").get(0);
            //alert(1);
            //alert($(iframeid).height());
            // if(iframeid.loaded == 1){
            //     $scrollHor=$(parent.window).scrollTop();                     
            //     $(iframeid).height(0);
            //     $(iframeid).height($(iframeid.contentWindow.document).height());
            //     $(parent.window).scrollTop($scrollHor);   
            // }             
        });
    }                 
});
// RWD
$(function(){   
    
      
});
// carousel 輪播器
$(function(){  
    var carousel = $("#water_wheel_carousel").waterwheelCarousel({
        flankingItems: 5,
        separation: 200,
    });    
    
    $('#water_wheel_carousel_prev').bind('click', function () {
        carousel.prev();
        return false
    });

    $('#water_wheel_carousel_next').bind('click', function () {
        carousel.next();
        return false;
    }); 
    
    // RWD
    function min_576px(x) {
        if (x.matches) { 
            // > 576
            carousel.reload({
                flankingItems: 1,
                separation: 150,    
            });
        } else {
            // < 576
            carousel.reload({
                flankingItems: 0,
                separation: 0,    
            });
        }
    }
    function min_768px(x) {
        if (x.matches) {
            // > 768
            carousel.reload({
                flankingItems: 3,
                separation: 150,    
            });
        } else {
            // < 768
            carousel.reload({
                flankingItems: 1,
                separation: 150,    
            });
        }
    }
    function min_992px(x) {
        if (x.matches) {
            // > 992
            carousel.reload({
                flankingItems: 5,
                separation: 200,    
            });
        } else {
            // < 992
            carousel.reload({
                flankingItems: 3,
                separation: 150,    
            });
        }
    }
    
    var e_min_576px = window.matchMedia("(min-width: 576px)");
    e_min_576px.addListener(min_576px);
    
    var e_min_768px = window.matchMedia("(min-width: 768px)");
    e_min_768px.addListener(min_768px);  

    var e_min_992px = window.matchMedia("(min-width: 992px)");
    e_min_992px.addListener(min_992px);  

    
});
