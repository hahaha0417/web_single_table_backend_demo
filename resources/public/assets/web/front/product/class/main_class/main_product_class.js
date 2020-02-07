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
    $.each($( '.product_list' ), function( index, value ) {
        $(value).sliderPro({
            width: 1000,
            height: 500,
            //orientation: 'vertical',          // 這會導致白屏
            loop: false,
            arrows: true,
            buttons: false,
            thumbnailsPosition: 'right',
            thumbnailPointer: true,
            thumbnailWidth: 290,
            
            
            breakpoints: {
                350: {
                    width: 220,
                    height: 110,
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 100,
                    
                },
                550: {
                    width: 300,
                    height: 150,
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 100,
                    
                },
    
                750: {
                    width: 500,
                    height: 250,
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 100,
                    
                },
                950: {
                    width: 700,
                    height: 350,
                    thumbnailsPosition: 'bottom',
                    thumbnailWidth: 100,
                },
                1400: {
                    width: 600,
                    height: 300,
                    thumbnailWidth: 290,
                    
                },
            }
    
        }); 
    });

    $.each($( ".bump_text" ), function( index, value ) {
        $(value).bumpyText();   

    });

    $.each($( ".skitter-large" ), function( index, value ) {
        $(value).skitter({
            numbers: true,
            dots: false,
            navigation: true,
            show_randomly: true,
            with_animations: [
                'cube', 
                'cubeRandom', 
                'block', 
                'cubeStop', 
                'cubeStopRandom', 
                'cubeHide', 
                'cubeSize', 
                'horizontal', 
                'showBars', 
                'showBarsRandom', 
                'tube',
                'fade',
                'fadeFour',
                'paralell',
                'blind',
                'blindHeight',
                'blindWidth',
                'directionTop',
                'directionBottom',
                'directionRight',
                'directionLeft',
                'cubeSpread',
                'glassCube',
                'glassBlock',
                'circles',
                'circlesInside',
                'circlesRotate',
                'cubeShow',
                'upBars', 
                'downBars', 
                'hideBars', 
                'swapBars', 
                'swapBarsBack', 
                'swapBlocks',
                'cut'
            ],
            
        });

    });

    
    
      
                   
});