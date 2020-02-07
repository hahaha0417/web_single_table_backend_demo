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

// https://stackoverflow.com/questions/9975810/make-iframe-automatically-adjust-height-according-to-the-contents-without-using?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
function getDocHeight(doc) {
    doc = doc || document;
    // stackoverflow.com/questions/1145850/
    var body = doc.body, html = doc.documentElement;
    var height = Math.max( body.scrollHeight, body.offsetHeight, 
        html.clientHeight, html.scrollHeight, html.offsetHeight );
    return height;
}

function setIframeHeight(id) {
    var ifrm = document.getElementById(id);
    var doc = ifrm.contentDocument? ifrm.contentDocument: 
        ifrm.contentWindow.document;
    $scrollHor=$(window).scrollTop(); 
    ifrm.style.visibility = 'hidden';
    ifrm.style.height = "10px"; // reset to minimal height ...
    // IE opt. for bing/msn needs a bit added or scrollbar appears
    
    ifrm.style.height = getDocHeight( doc ) + "px";  
    $(window).scrollTop($scrollHor);  
    ifrm.style.visibility = 'visible';
    
}

$(function(){   


    
    var iframe_=$(".content_frame");
    $.each(iframe_, function(key, value){
        value.onload = function(){    
            setIframeHeight($(value).attr("id"));   
            iframe_.loaded = 1;   
        };  
    });
    
    $(window).resize(function(){             
        $.each(iframe_, function(key, value){  
            setIframeHeight($(value).attr("id"));     
        });
    });
   
});

$(function(){   
    var flag;
    $(".list_tab tr input[name=checkbox]").labelauty(); 

    {
        $(".index_item .index_item_title_prepend").mouseenter(function(){
            // alert(2);
            var panel = $(this).parent().find(".index_item_panel");
           
            if($(this).offset().top - $(window).scrollTop() + $(this).height() + $(panel).height() < $(window).height()){                  
                panel.css("left", $(this).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this).width()) / 2) + "px";   
                panel.css("top", $(this).offset().top - $(window).scrollTop() + $(this).height()) + "px";  
                flag = 0;           
            }
            else if($(this).offset().top - $(window).scrollTop() - $(panel).height() >= 0){
                panel.css("left", $(this).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this).width()) / 2) + "px";   
                panel.css("top", ($(this).offset().top - $(window).scrollTop() - $(panel).height()) + "px");  
                flag = 1; 
            }
            panel.show();
        });
        $(".index_item .index_item_title_prepend").mouseleave(function(e){
            e = event || window.event;
            // alert($(this).offset().top - $(window).scrollTop());
            if(flag == 0){
                if($(this).offset().top - $(window).scrollTop() <= e.clientY && $(this).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this).offset().left - $(window).scrollLeft() + $(this).width()))
                {}
                else{
                    $(this).parent().find(".index_item_panel").hide();
                }
            }
            else if(flag == 1){
                if(e.clientY < $(this).offset().top - $(window).scrollTop() && $(this).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this).offset().left - $(window).scrollLeft() + $(this).width()))
                {}
                else{
                    $(this).parent().find(".index_item_panel").hide();
                }
            }
        });
        $(".index_item .index_item_panel").mouseleave(function(){
            $(this).parent().find(".index_item_panel").hide();
        });

        $(window).scroll(function() {
            $(".index_item .index_item_panel").hide();
        });
    }

    
    {
        var item = {
            "page": $("#index_select_page_select").find(":selected").attr("name"),
            "item": "nav",
            "id": $("#index_nav_id").val(),
            "target": "title_image",
        };
        var index_item_image_upload = $(".index_item .index_item_image_upload").uploadFile({
            url: "",
            fileName: "index_file",
            uploadStr: "...",
            statusBarWidth: "40px",
            dragDrop:false,
            onSuccess:function(files,data,xhr,pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }        
                $("#index_nav_title_image").val(data['image']);
                $("#index_nav_title_image_thumbnail").attr('src', data['thumbnail']);    
                
                index_nav_title_image_upload_success = 1;
            },      
            showQueueDiv: "index_nav_title_image_output",                                    
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'method': 'upload',
                'item': item,
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }         
});