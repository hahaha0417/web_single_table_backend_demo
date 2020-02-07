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
   
    $('.top-nav .main_munu_button').click(function()	{        
		if($('.wrapper').hasClass('display-right'))	{
			$('.wrapper').removeClass('display-right');
            $('.sidebar-right').removeClass('active');
		}
		else	{
			$('aside').toggleClass('sidebar-mini');			
			$('aside .main-menu').find('.openable').removeClass('open');
            $('aside .main-menu').find('.submenu').removeAttr('style');
            if($('aside').hasClass('sidebar-mini')){
                $("#left_box").css('flex','0 0 80px');
            }
            else{
                $("#left_box").css('flex','0 0 400px');
            }

		}				
    });
    
    function myFunction(x) {
        if (x.matches) { // If media query matches
            if($('aside').hasClass('sidebar-mini')){
                $("#left_box").css('flex','0 0 80px');
            }
            else{
                $("#left_box").css('flex','0 0 400px');
            }
        } else {
            if($('aside').hasClass('sidebar-mini')){
                $('.wrapper').removeClass('display-right');
                $('.sidebar-right').removeClass('active');
                // $("#left_box").css('flex','0 0 0px');
            }
            else{
                $('aside').toggleClass('sidebar-mini');			
                $('aside .main-menu').find('.openable').removeClass('open');
                $('aside .main-menu').find('.submenu').removeAttr('style');
                if($('aside').hasClass('sidebar-mini')){
                    $("#left_box").css('flex','0 0 80px');
                }
                else{
                    $("#left_box").css('flex','0 0 400px');
                }
                // $("#left_box").css('flex','0 0 0px');
            }            
        }
    }
    
    var x = window.matchMedia("(min-width: 991px)")
    myFunction(x); // Call listener function at run time
    x.addListener(myFunction); // Attach listener function on state changes
});

$(function(){ 
});