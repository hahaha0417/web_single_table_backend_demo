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
    var t;
    $(".home_nav .item").click(function(){   
        $url = $(this).attr("url");  
        if($(".home_content_frame").get(0).src !=  $url)
        {
            clearInterval(t);
            $(".home_content_frame").get(0).src = $url;
        }
        
       
        
    });    
    

    
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