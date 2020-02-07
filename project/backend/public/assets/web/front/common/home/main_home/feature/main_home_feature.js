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

function setParentIframeHeight(id) {
    if(parent)
    {
        var ifrm = parent.document.getElementById(id);
        var doc = ifrm.contentDocument? ifrm.contentDocument: 
            ifrm.contentWindow.document;
        $scrollHor=$(parent.window).scrollTop(); 
        // ifrm.style.visibility = 'hidden';
        ifrm.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        
        ifrm.style.height = getDocHeight( doc ) + 4 + "px";  
        $(parent.window).scrollTop($scrollHor);  
        ifrm.style.visibility = 'visible';
    }
}
function setParentParentIframeHeight(id) {
    if(parent.parent)
    {
        var ifrm = parent.parent.document.getElementById(id);
        var doc = ifrm.contentDocument? ifrm.contentDocument: 
            ifrm.contentWindow.document;
        $scrollHor=$(parent.parent.window).scrollTop(); 
        // ifrm.style.visibility = 'hidden';
        ifrm.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        
        ifrm.style.height = getDocHeight( doc ) + 4 + "px";  
        $(parent.parent.window).scrollTop($scrollHor);  
        ifrm.style.visibility = 'visible';
    }
}

// 外接區段，與其他頁面連接寫在這裡
$(function(){    
    // 如怕麻煩，find("iframe")，如無法確定是哪個，給iframe id
    if($(parent.document) && $(parent.document).find("#home_content_frame").get(0))
    {
        
        $(".panel-collapse").on("hidden.bs.collapse", function(){  
            setParentIframeHeight("home_content_frame");
            setParentParentIframeHeight("feature_content_frame");
        }); 
        $(".panel-collapse").on("shown.bs.collapse", function(){    
            setParentIframeHeight("home_content_frame");
            setParentParentIframeHeight("feature_content_frame");
        });  

        // 不須在裡面做這個
        // $(window).resize(function(){        
        //     setParentIframeHeight("home_content_frame");
        //     setParentParentIframeHeight("feature_content_frame");
        // });
    }

    
});  

$(function(){  

});  