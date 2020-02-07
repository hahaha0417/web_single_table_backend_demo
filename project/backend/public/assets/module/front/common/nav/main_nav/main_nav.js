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
    function isTouchDevice() {
        return !!('ontouchstart' in window) || !!('msmaxtouchpoints' in window.navigator);
    }
    var istouch = isTouchDevice();              
    $(document).on("click",function(e){ 
        var target = $(e.target); 
        
        if(target.closest("#header_bar").length != 0 && target.closest("#header_content_bar").length != 0){
         
        }
        else if(target.closest("#header_bar").length == 0 && target.closest("#header_content_bar").length != 0){ 
            if($("#header_bar").is(':visible'))
            {
                // $("#header_bar").hide(); 
                // $("#header_content_bar").hide();                 
            }
        } 
        else if(target.closest("#header_bar").length != 0 && target.closest("#header_content_bar").length == 0){ 
            if($("#header_content_bar").is(':visible'))
            {
                $("#header_content_bar").hide(); 
                if(istouch){
                    var duration = 150;
                    var el = $("#page-cover");;
                    el.animate({
                        opacity: 0.5
                    }
                    , {
                        duration: duration,
                        start: function(){
                            el.css('display', 'none');
                        }
                    });
                }
                
                
            }
        } 
        else if(target.closest("#header_bar").length == 0 && target.closest("#header_content_bar").length == 0){ 
            $("#header_bar").hide(); 
            $("#header_content_bar").hide(); 
        }
        
    }); 
    $(".header_bar_button").click(function(e){
        //alert(1);
        if($("#header_bar").is(':visible')) {
            $("#header_bar").hide(); 
            $("#header_content_bar").hide(); 
        }
        else {
            $("#header_bar").show(); 
        }
        e.stopPropagation(); 
    });
    $(".header_popupmenu").click(function(e){
        $("#header_bar").hide(); 
        // e.stopPropagation(); 
    });
    $(".popupmenu").click(function(e){
        $("#header_content_bar").hide(); 
        // e.stopPropagation(); 
    });
    var mobilemenuMax = 767;

    function item_mouse_move(){
        if($(window).width() < 990)
        {
            $("#header_bar .header_bar_item").off('mouseenter mouseleave');
            $item = $("#header_bar .header_bar_item");
            $item.each(function(index, v){
                // alert(index);
                $($("#header_content_bar .header_content_bar_item")[index]).hide();
                $(".menublock#"+$(v).attr("id")).stop(true, false).fadeOut(150);
            });
        } 
        else {
            $("#header_bar .header_bar_item").on('mouseenter mouseleave', function (e) {        
                if( e.type == 'mouseleave' ) {
                }
                else {
                    if ($(window).width() > mobilemenuMax) {
                        dimDiv(e);
                    }
                
                    $select = this;
                    $item = $("#header_bar .header_bar_item");
                    $item.each(function(index, v){
                        // alert(index);
                        if(v == $select){    ;
                            $(v).addClass("active");                
                            $($("#header_content_bar .header_content_bar_item")[index]).show();
                            $(".menublock#"+$(v).attr("id")).stop(true, false).fadeIn(150);
                        }
                        else{
                            $(v).removeClass("active");
                            $($("#header_content_bar .header_content_bar_item")[index]).hide();
                            $(".menublock#"+$(v).attr("id")).stop(true, false).fadeOut(150);
                        }
                    });
                    $("#header_content_bar").show();
        
                }
        
            });
        }
    }
    item_mouse_move();
    $(window).resize(function(){       
        item_mouse_move();
    })
    
    $("#header_content_bar").mouseleave(function(e){
        // 往上不觸發
        if(e.pageY <= 164){

        }else{
            if($(e.toElement) == $("#header_bar")) {

            }else {
                if ($(window).width() > mobilemenuMax) {
                    dimDiv(e);
                }
                $("#header_content_bar").hide(); 
            }  
        }        
    });
    $("#header_bar").mouseleave(function(e){
        // 往下不觸發
        if(e.pageY >= 162){

        }else{
            if($(e.toElement) == $("#header_content_bar")) {

            }else {
                if ($(window).width() > mobilemenuMax) {
                    dimDiv(e);
                }
                $("#header_content_bar").hide(); 
            }            
        }  
    });    
    $(".header_bar_box").mouseenter(function(e){
        //alert(1);
        if ($(window).width() > mobilemenuMax) {
            e.type = 'mouseleave';
            dimDiv(e);
            e.type = 'mouseenter'
        }
        $("#header_content_bar").hide();        
    }); 
    
    // $("#left_box").hide(1000);  
    

    
}); 