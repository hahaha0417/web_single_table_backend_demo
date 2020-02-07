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
	var t;
	var index=-1;
	var times=3000;//间隔时间
	t=setInterval(play,times);
	
	function play(){
		index++;
		if(index>3){index=0}
		$('.plugin_banner .plugin_banner_img').eq(index).fadeIn(1000).siblings().fadeOut(1000);
		$('.plugin_banner .plugin_banner_cir').eq(index).addClass('plugin_banner_cr').siblings().removeClass('plugin_banner_cr');
	};
	
	$('.plugin_banner .plugin_banner_cir').click(function(){
		$(this).addClass('plugin_banner_cr').siblings().removeClass('plugin_banner_cr');
		var index=$(this).index();
		$('.plugin_banner .plugin_banner_img').eq(index).fadeIn(600).siblings().fadeOut(600);
	});
	
	$('.plugin_banner_pre').click(function(){
		index--
		if(index<0){index=3}
		$('.plugin_banner .plugin_banner_img').eq(index).fadeIn(1000).siblings().fadeOut(1000);
		$('.plugin_banner .plugin_banner_cir').eq(index).addClass('plugin_banner_cr').siblings().removeClass('plugin_banner_cr');
	});
	$('.plugin_banner_next').click(function(){
		index++
		if(index>3){index=0}
		$('.plugin_banner .plugin_banner_img').eq(index).fadeIn(1000).siblings().fadeOut(1000);
		$('.plugin_banner .plugin_banner_cir').eq(index).addClass('plugin_banner_cr').siblings().removeClass('plugin_banner_cr');
	});
	
	$('.plugin_banner').hover(
		function(){
			clearInterval(t);
		},
		function(){
			t=setInterval(play,times)
			function play(){
				index++
				if(index>3){index=0}
				$('.plugin_banner .plugin_banner_img').eq(index).fadeIn(1000).siblings().fadeOut(1000);
				$('.plugin_banner .plugin_banner_cir').eq(index).addClass('plugin_banner_cr').siblings().removeClass('plugin_banner_cr');
			}
		}
	);
	
});
	
