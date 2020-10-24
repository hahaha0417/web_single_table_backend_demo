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

// JavaScript Document

$(function(){
	//$(".flat_accordion .item_box").width(($(".flat_accordion .content ul li").length - 1) * 100 + 680 + 50);
	$(".flat_accordion .content").width(($(".flat_accordion .content ul li").length - 1) * 100 + 680 + 50);

	$(".flat_accordion .content ul li").each(function(){
		var fold = $(this).find(".fold");
		var unfold = $(this).find(".unfold");
		if(fold.is(":hidden")){
			$(this).width(680);
		}else{
			$(this).width(100);
		}
	})
	
	$(".flat_accordion .content ul li").click(function(){
		var li_index = $(this).index();
		$(this).animate({width:680},200);
		$(this).find(".unfold").show();
		$(this).find(".fold").hide();
		$(this).siblings().animate({width:100},200);
		$(this).siblings().find(".unfold").hide();
		$(this).siblings().find(".fold").show();
	})



 	

})
