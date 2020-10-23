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

$(document).ready(function(){
	$(".plugin_follow_under_line_nav ").hover(function(){},function(){
		$(".plugin_follow_under_line_nav .bottomLine").css("width",parseFloat($(".selected_nav").eq(0).width()+20)+"px");
		$(".plugin_follow_under_line_nav .bottomLine").css("left",parseFloat($(".selected_nav").eq(0).offsetLeft)+"px");	
	});
	$(".plugin_follow_under_line_nav .nav li").hover(function(){
		$(".plugin_follow_under_line_nav .bottomLine").css("width",parseFloat($(this).width()+20)+"px");
		$(".plugin_follow_under_line_nav .bottomLine").css("left",parseFloat($(this)[0].offsetLeft)+"px");	
	});
	$(".plugin_follow_under_line_nav .nav li").on("click",function(){
		$(".plugin_follow_under_line_nav .nav li").removeClass("selected_nav");
		$(this).addClass("selected_nav");
		$(".plugin_follow_under_line_nav .bottomLine").css("width",parseFloat($(this).width()+20)+"px");
		$(".plugin_follow_under_line_nav .bottomLine").css("left",parseFloat($(this)[0].offsetLeft)+"px");	
	});
	
});