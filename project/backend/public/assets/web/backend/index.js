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


$(function(){   

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
    // 修改預設頁面
    var link_ = $("#left_box .sidebar-menu .accordion .default_page_link");
    $.each(link_, function(key, value){
        $(value).click(function(){
            if($(this).attr('id') == 'default_page')
            {
                return;
            }
            $("#left_box .sidebar-menu .accordion #default_page").attr("href", $(this).attr('default_page'));
        });       

	});

});