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
    if($(parent.document) && $(parent.document).find("#feature_content_frame").get(0))
    {
        // 須在裡面做這個
        $(window).resize(function(){     
             
            // setIframeHeight($(value).attr("feature_content_frame"));      
        });
        // 
        $(".up_button").css("display", "none");
    }                 
});

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
    $.each($(".css_nav a .tingico"), function( index, value ) {
        // alert($($(".css_nav .tingico")[index]).attr("image_url"));
        $($(".css_nav .tingico")[index]).css("background-image", $($(".css_nav .tingico")[index]).attr("image_url"))
        .css("background-position", "0px 0px");          
    });  
    // 一定要這樣設，不然hover jQuery會是空
    $( ".css_nav a" ).hover(
        function() {
            $($(this).find(".tingico")).css("background-position", "0px -60px");     

        }, function() {
            $($(this).find(".tingico")).css("background-position", "0px 0px");    
        }
    );

    $(".css_nav li").on( "mouseover", function(){
        var li = this;
        $.each($(".css_nav .handle_b"), function( index, value ) {
            if(li == value){
                $($(".css_nav #tools_point")[index]).css("margin-left", $($(".css_nav .handle_b")[index]).offset().left - 100 + "px")
                    .css("display", "block");
                                
            }
        });
          
           
    });         
    $(".css_nav li").on( "mouseout", function(){
        var li = this;
        $.each($(".css_nav .handle_b"), function( index, value ) {
            if(li == value){
                $($(".css_nav #tools_point")[index]).css("margin-left", $($(".css_nav .handle_b")[index]).offset().left - 100 + "px")
                    .css("display", "none"); 
                // $($(".css_nav li a .tingico")[index]).css("background-position", "0px 0px"); 
            }
            
        });
           
    });        
    
    
    var iframe_=$(".content_frame");
    var wrap_content_ = [];
    $.each(iframe_, function(key, value){
        value.onload = function(){    
            setIframeHeight($(value).attr("id"));   
            // 只有一個wrap_content
            if(!parent)
            {
                var ifrm = value;
                var doc = ifrm.contentDocument? ifrm.contentDocument: 
                    ifrm.contentWindow.document;
                wrap_content_[key] = $(doc).find(".wrap_content"); 
                iframe_.loaded = 1;   
            }
        };  
    });
    
    $(window).resize(function(){ 
        if(!parent)
        {
            $.each(iframe_, function(key, value){
                var ifrm = value;
                ifrm.style.height = wrap_content_[key].height() + "px";          
            });
            // alert(333);
        }      
        
    });

    $(".up_button").click(function(){
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
            // alert("Finished animating");
        });
    });
});