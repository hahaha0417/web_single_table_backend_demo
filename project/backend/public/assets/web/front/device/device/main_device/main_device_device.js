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
    $( '#popular_device' ).sliderPro({
        width: 1000,
        height: 500,
        arrows: true,
        buttons: false,
        waitForLayers: true,
        thumbnailWidth: 200,
        thumbnailHeight: 100,
        thumbnailPointer: true,
        autoplay: true,
        autoScaleLayers: false,
        breakpoints: {
            450: {
                width: 100,
                height: 100,
                thumbnailWidth: 100,
            },
            650: {
                width: 400,
                height: 200,
                thumbnailWidth: 120,
                thumbnailHeight: 50
            },
            850: {
                width: 600,
                height: 300,
            },
            1050: {
                width: 800,
                height: 400,
            },
        }
    });   

});