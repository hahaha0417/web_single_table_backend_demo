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

import { Vertical_Accordion } from  '/assets/plugin/accordion/vertical_accordion/index.js';  
    
$(function(){    
    var vertical_accordion = new Vertical_Accordion($('#vertical_accordion'), false);
    var vertical_accordion1 = new Vertical_Accordion($('#vertical_accordion_title'), false);
});

$(function(){ 
    // 特殊設計    
    function collapse_layout(){
        var h_ = $("#content").height(true);

        var top_ = $(window).scrollTop() - $("#top_bar").outerHeight(true) - $(".model_feature_title").outerHeight(true) - $(".model_feature_space").outerHeight(true) - $(".model_feature_title_nav").outerHeight(true) + 80;
        
        // alert($(".collapse_content").css("top").replace("px", ''));
        var footer_top_ = 0;
        var type_ = 0;
        if($(".footer_bar").css("display") != "none"){            
            footer_top_ = $(".footer_bar").offset().top;
            type_ = 1;
        }
        else if($("footer").css("display") != "none"){
            footer_top_ = $("footer").offset().top;
            type_ = 2;
        }
        else{
            footer_top_ = $(window).outerHeight(true);
            type_ = 0;
        }



        if($(window).scrollTop() + $(window).outerHeight(true) < footer_top_){
            if(top_ < 0){
                

                $('.title_content').css('position', 'relative');
                $('.accordion_content').css('position', 'relative');              
                $('.bottom_content').css('position', 'relative');

                $('.title_content').css('display', 'none');
                $('.accordion_content').css('display', 'block');                
                $('.bottom_content').css('display', 'none');
                
                $(".collapse_content").css("top", 0);
                $(".accordion_content").css("top", 0);
                $(".collapse_content").height(h_ + "px");
            }
            else{
                $(".collapse_content").css("top", top_);
                

                $('.title_content').css('position', 'relative');
                $('.accordion_content').css('position', 'relative');              
                $('.bottom_content').css('position', 'relative');

                $('.title_content').css('display', 'block');
                $('.accordion_content').css('display', 'block');                
                $('.bottom_content').css('display', 'block');

                $(".title_content").css("top", 0);
                $(".accordion_content").css("top", 0);
                
                $(".collapse_content").height($(window).outerHeight(true) - $("nav").outerHeight(true) - $('.bottom_content').outerHeight(true) + "px");
                $(".bottom_content").css("top", $(".collapse_content").css("top"));
            }            
        }
        else{
            if(top_ < 0){                
                $(".collapse_content").css("top", 0);
                
                $('.bottom_content').css("top", 0);
                $(".accordion_content").css("top", 0);

                $('.title_content').css('position', 'relative');
                $('.accordion_content').css('position', 'relative');              
                $('.bottom_content').css('position', 'relative');

                $('.title_content').css('display', 'none');
                $('.accordion_content').css('display', 'block');                
                $('.bottom_content').css('display', 'none');

                $(".collapse_content").height(footer_top_ - $(widnow).scrollTop() - $('.bottom_content').outerHeight(true) + "px");
                // 
                
            }
            else{
                $(".collapse_content").css("top", top_);
                $(".title_content").css("top", 0);
                $(".accordion_content").css("top", 0);

                $('.title_content').css('position', 'relative');
                $('.accordion_content').css('position', 'relative');              
                $('.bottom_content').css('position', 'relative');

                $('.title_content').css('display', 'block');
                $('.accordion_content').css('display', 'block');                
                $('.bottom_content').css('display', 'none');
                
                $(".collapse_content").height(footer_top_ - $(window).scrollTop() - $("nav").outerHeight(true) + "px");
            }
        }
    }

    $(window).scroll(function() { 
        collapse_layout();
    });

    $(window).resize(function() { 
        collapse_layout();        
    });
    
    $(".content_frame").on("load", function(){  
        collapse_layout(); 
    });

    
});