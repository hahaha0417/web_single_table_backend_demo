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
    $(".index_control_page .nav_button").click(function(){
        $("#top_bar").slideToggle(500);
        $("header").slideToggle(500);
    });   
    $(".index_control_page .left_button").click(function(){
        $("#left_box").slideToggle(500);
    });   
    $(".index_control_page .main_button").click(function(){
        $("#main_box").slideToggle(500);
    }); 
    $(".index_control_page .right_button").click(function(){
        $("#right_box").slideToggle(500);
    });     
    $(".index_control_page .tail_button").click(function(){
        if($("footer").is(':visible')){
            $("footer").slideUp(500);
            $(".footer_bar").slideUp(500);
        }
        else{
            $("footer").slideDown(500);
            $(".footer_bar").slideDown(500);
        }
        
    });              
}); 