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
    
    $("#control_box .control_button_box").append($(".control_button"));
    $("#control_box .control_page_box").append($(".control_page")); 
    
    $("#control_box .control_button_box .control_button").click(function(){
        var button = this;
       
        $.each( $("#control_box .control_page_box .control_page"), function( key, value ) {
            if($(value).attr("class_name") == $(button).attr("class_name")){
                $(value).show();
            }  
            else{
                $(value).hide();    
            }  
        });
    
    });
    // 預設觸發第一個
    $($("#control_box .control_button_box .control_button")[0]).click();

    $(document).on("click",function(e){ 
        var target = $(e.target); 
        
        if(target.closest("#control_box").length == 0 && target.closest(".header_bar_setting").length == 0){
            $("#control_box").slideUp(500);
        }
    }); 

    $(".header_bar_setting").click(function(){
        $("#control_box").slideDown(500);    
    });
});