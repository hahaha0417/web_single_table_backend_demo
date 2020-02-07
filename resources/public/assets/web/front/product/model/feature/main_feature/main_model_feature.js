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
    
    ifrm.style.visibility = 'visible';
    $(window).scrollTop($scrollHor);  
}

function setIframeChildHeight(id) {
    var ifrm = document.getElementById(id);
    var doc = ifrm.contentDocument? ifrm.contentDocument: 
        ifrm.contentWindow.document;
    $scrollHor=$(window).scrollTop(); 

    $.each($(doc).find(".content_frame"), function(key, value){
        value.style.visibility = 'hidden';
        value.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        var doc2 = value.contentDocument? value.contentDocument: 
        value.contentWindow.document;
        value.style.height = getDocHeight( doc2 ) + "px";  
        value.style.visibility = 'visible';

    });
    $(window).scrollTop($scrollHor);  
    
    
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
    var iframe2_ = [];
    var wrap_content1_ = [];
    var wrap_content2_ = [];
    $.each(iframe_, function(key, value){
        value.onload = function(){    
            setIframeHeight($(value).attr("id"));   
            
            var ifrm = value;
            var doc = ifrm.contentDocument? ifrm.contentDocument: 
                ifrm.contentWindow.document;
            wrap_content1_[key] = $(doc).find(".wrap_content"); 
            iframe2_[key] = $(doc).find(".content_frame"); 
            $.each(iframe2_[key], function(key2, value2){
                var ifrm2 = value2;
                var doc2 = ifrm2.contentDocument? ifrm2.contentDocument: 
                    ifrm2.contentWindow.document;
                // 只有一個wrap_content
                wrap_content2_[key2] = $(doc2).find(".wrap_content"); 
                iframe_.loaded = 1;   
            });
                          
        };  
    });
    
    $(window).resize(function(){       
        if(iframe_.loaded == 1)
        {
            $.each(iframe_, function(key, value){
                var ifrm = value;
                $scrollHor=$(window).scrollTop(); 
                $.each(iframe2_[key], function(key2, value2){
                    var ifrm2 = value2;
                    ifrm2.style.height = wrap_content2_[key2].height() + "px";  
                });
                ifrm.style.height =  wrap_content1_[key].height() + "px";    
                $(window).scrollTop($scrollHor); 
            });

            
        }        
    });
    
    $(".up_button").click(function(){
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
            // alert("Finished animating");
        });
    });
    // 特別功能
    $(".menu_button").click(function(){
        // 不是relative不能動畫
        if($("#left_box").css("display") == "none"){
            $("#left_box").fadeIn(500);
        }
        else{
            $("#left_box").fadeOut(500);
        }
    });
    function myFunction(x) {
        if (x.matches) { // If media query matches
            $("#left_box").css("display", "flex").css("left", "0px");
        } else {
            $("#left_box").css("display", "none").css("left", "0px");
        }
    }
    
    var x = window.matchMedia("(min-width: 700px)")
    myFunction(x); // Call listener function at run time
    x.addListener(myFunction); // Attach listener function on state changes


    




});