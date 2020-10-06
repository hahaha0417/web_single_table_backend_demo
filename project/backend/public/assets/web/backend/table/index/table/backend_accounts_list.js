/*
原始 : hahaha 
維護 : 
指揮 : 
---------------------------------------------------------------------------------------------- 
決定 : name 
---------------------------------------------------------------------------- 
-- 說明 : 
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 
/*
---------------------------------------------------------------------------------------------- 
License : MIT
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 
$(function() { 
	$('.accounts_button_add').click(function() { 
		$('#accounts_panel_add').css('width', $(window).width() * 0.97); 
		$('#accounts_panel_add').css('height', $(window).height() * 0.97); 
		$('#accounts_panel_add').css('left', ($(window).width() - $('#accounts_panel_add').width()) / 2); 
		$('#accounts_panel_add').css('top', ($(window).height() - $('#accounts_panel_add').height()) / 2); 
		$('#accounts_panel_add').show(); 
	}); 
}); 
 
$(function() { 
	$('.accounts_panel_add_button_cancel').click(function() { 
		$('#accounts_panel_add').hide(); 
	}); 
}); 
 
var flag; 
var is_in_iframe = (window.location != window.parent.location); 

$(function() { 
	function accounts_button_prepend_detail_mouseenter(button, panel){ 
		if(is_in_iframe){ 
			if($(button).offset().top - $(window).scrollTop() - $(panel).height() >= 0){ 
				panel.css("top", ($(button).offset().top - $(window).scrollTop() - $(panel).height()) + "px"); 
				flag = 0; 
			} 
			else if($(button).offset().top - $(window).scrollTop() + $(button).height() + $(panel).height() < $(window).height()){ 
				panel.css("top", $(button).offset().top - $(window).scrollTop() + $(button).height()) + "px"; 
				flag = 1; 
			} 
		} 
		else{ 
			if($(button).offset().top - $(window).scrollTop() - $(panel).height() >= 0){ 
				panel.css("top", ($(button).offset().top - $(window).scrollTop() - $(panel).height() ) + "px"); 
				flag = 0; 
			} 
			else if($(button).offset().top - $(window).scrollTop() + $(button).height() + $(panel).height() < $(window).height()){ 
				panel.css("top", $(button).offset().top - $(window).scrollTop() + $(button).height()) + "px"; 
				flag = 1; 
			} 
		} 
		//alert(flag); 
		panel.show(); 
	} 
	function accounts_button_prepend_detail_mouseleave(button, panel, event){ 
		e = event || window.event; 
		// alert($(button).offset().top - $(window).scrollTop()); 
		if($(panel).offset().top - $(window).scrollTop() <= e.clientY && 
        e.clientY < $(panel).offset().top - $(window).scrollTop() + $(panel).outerHeight() && 
        $(button).offset().left - $(window).scrollLeft() <= e.clientX && 
        e.clientX < ($(button).offset().left - $(window).scrollLeft() + $(button).outerWidth()) ) {
			return; 
		} 
		//alert(flag); 
		if(is_in_iframe){ 
			if(flag == 0){ 
				if(e.clientY < $(button).offset().top - $(window).scrollTop() && $(button).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(button).offset().left - $(window).scrollLeft() + $(button).outerWidth())) 
				{} 
				else{ 
					panel.hide(); 
				} 
			} 
			else if(flag == 1){ 
				if($(button).offset().top - $(window).scrollTop() <= e.clientY && $(button).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(button).offset().left - $(window).scrollLeft() + $(button).outerWidth())) 
				{} 
				else{ 
					panel.hide(); 
				} 
			} 
		} 
		else{ 
			if(flag == 0){ 
				if(e.clientY < ($(button).offset().top - $(window).scrollTop()) && ($(button).offset().left - $(window).scrollLeft()) <= e.clientX && e.clientX < ($(button).offset().left - $(window).scrollLeft() + $(button).outerWidth())) 
				{} 
				else{ 
					panel.hide(); 
				} 
			} 
			else if(flag == 1){ 
				if($(button).offset().top - $(window).scrollTop() <= e.clientY && $(button).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(button).offset().left - $(window).scrollLeft() + $(button).outerWidth())) 
				{} 
				else{ 
					panel.hide(); 
				} 
			} 
		} 
	} 
	$(".index_item .accounts_button_prepend_detail").mouseenter(function(){ 
		var panel = $(this).parent().find(".accounts_panel_detail"); 
		accounts_button_prepend_detail_mouseenter(this, panel, panel); 
	}); 
	$(".index_item .accounts_button_prepend_detail").mouseleave(function(event){ 
		var panel = $(this).parent().find(".accounts_panel_detail"); 
		accounts_button_prepend_detail_mouseleave(this, panel, event); 
	}); 
}); 
 
$(function() { 
	function accounts_panel_detail_mouseleave(panel, event){ 
		e = event || window.event; 
		if(is_in_iframe){ 
			if($(panel).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(panel).offset().top + $(panel).height() - $(window).scrollTop() && $(panel).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(panel).offset().left - $(window).scrollLeft() + $(panel).outerWidth())) 
			{ 
				return; 
			} 
			if($(panel).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(panel).offset().top + $(panel).height() - $(window).scrollTop() && $(panel).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(panel).offset().left - $(window).scrollLeft() + $(panel).width())) 
			{ 
				return; 
			} 
		} 
		else{ 
			// alert($(panel).offset().top); 
			// alert($(panel).offset().top - $(window).scrollTop() <= e.clientY); 
			if($(panel).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(panel).offset().top - $(window).scrollTop() + $(panel).height() && $(panel).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(panel).offset().left - $(window).scrollLeft() + $(panel).width())) 
			{ 
				return; 
			} 
			if($(panel).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(panel).offset().top + $(panel).height() - $(window).scrollTop() && $(panel).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(panel).offset().left - $(window).scrollLeft() + $(panel).width())) 
			{ 
				return; 
			} 
		} 
		$(panel).hide(); 
	} 
	$(".index_item .accounts_panel_detail").mouseleave(function(event){ 
		// var panel = $("#ui-id-" + (parseInt(index) + 1)); 
		var panel = $(this).parent().find(".accounts_panel_detail"); 
		accounts_panel_detail_mouseleave(panel, event); 
	}); 
	$(window).scroll(function() { 
		$(".index_item .accounts_panel_detail").hide(); 
	}); 
}); 
 
$(function() { 
	$(window).resize(function() { 
		$('#accounts_panel_add').css('width', $(window).width() * 0.97); 
		$('#accounts_panel_add').css('height', $(window).height() * 0.97); 
		$('#accounts_panel_add').css('left', ($(window).width() - $('#accounts_panel_add').width()) / 2); 
		$('#accounts_panel_add').css('top', ($(window).height() - $('#accounts_panel_add').height()) / 2); 
	}); 
}); 
 
/*
---------------------------------------------------------------------------------------------- 
Power By Hahaha Corp.
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 