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

$(function(){   
    if($(parent.document) && $(parent.document).find(".content_frame").get(0))
    {
        let iframe_ = $($(parent.document) && $(parent.document).find(".content_frame"));
        $.each(iframe_, function(key, value){ 
            value.onload = function(){    
                let ui_frame_ = new hahaha_ui_iframe;
                ui_frame_.set_height($(value).attr("id"));   
                iframe_.loaded = 1;   
            };  
        });
        
        $(window).resize(function(){    
            $.each(iframe_, function(key, value){  
                let ui_frame_ = new hahaha_ui_iframe;
                ui_frame_.set_height($(value).attr("id"));     
            });
            
        });   
    }
});