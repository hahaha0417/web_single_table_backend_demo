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
	$('.accounts_detail_button_add').click(function() { 
		$('#accounts_detail_panel_add').css('width', $(window).width() * 0.97); 
		$('#accounts_detail_panel_add').css('height', $(window).height() * 0.97); 
		$('#accounts_detail_panel_add').css('left', ($(window).width() - $('#accounts_detail_panel_add').width()) / 2); 
		$('#accounts_detail_panel_add').css('top', ($(window).height() - $('#accounts_detail_panel_add').height()) / 2); 
		$('#accounts_detail_panel_add').show(); 
	}); 
}); 
 
$(function() { 
	// ---------------------------------------- 
	// 項目太多，再另做一個功能(傳輸最簡) 
	// 不然直接將form丟過去即可 
	// ---------------------------------------- 
	$('#accounts_detail_panel_add_form').submit(function() { 
		alert('進去了!!!!!!');
		return false;
	}); 
	 
	$('#accounts_detail_panel_add_button_add').click(function() { 
		// var item = {);
			//     'account' : $('#accounts_panel_add_account').val(),
			//     'password_new' : $('#accounts_panel_add_password').val(),
			//     'password_confirm' : $('#accounts_panel_add_password_confirm').val(),
			//     'email' : $('#accounts_panel_add_email').val(),
			//     'gender' : $('.accounts_panel_add_gender[name=gender]:checked').val(),
			//     'status' : $('#accounts_panel_add_status').val(),
		// };
		// var form_data = JSON.stringify(Object.fromEntries(new FormData($('#accounts_panel_add_form')[0]))); 
		var form_data = Object.fromEntries(new FormData($('#accounts_panel_add_form')[0])); 
		console.log(form_data); 
		$.ajax({ 
			url:'/backend/table/backend/accounts/list/deal', 
			type:'POST', 
			data:{ 
				'_token': $('input[name=_token]').attr('value'), 
				'deal': 'item', 
				'method': 'add', 
				'item': form_data, 
				// 'target': 'image', 
			}, 
			success:function(response, status, xhr){ 
				console.log(response); 
				if(response.status == 0){ 
					// 成功 
					layer.msg( 
						response.msg, 
						{ 
							icon: 6, 
							area: ['360px', '100px'], 
							end: function(index, layero){ 
								//do something 
								location.reload(); 
							} 
						} 
					); 
				} 
				else{ 
					// 失敗失敗 
					layer.msg( 
						response.msg, 
						{ 
							icon: 5, 
							area: ['360px', '100px'], 
						} 
					); 
				} 
			}, 
		}); 
	}); 
}); 
 
$(function() { 
	$('.accounts_detail_panel_add_button_cancel').click(function() { 
		$('#accounts_detail_panel_add').hide(); 
	}); 
}); 
 
var flag; 
var is_in_iframe = (window.location != window.parent.location); 

$(function() { 
	function accounts_detail_button_prepend_detail_mouseenter(button, panel){ 
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
	function accounts_detail_button_prepend_detail_mouseleave(button, panel, event){ 
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
	$(".index_item .accounts_detail_button_prepend_detail").mouseenter(function(){ 
		var panel = $(this).parent().find(".accounts_detail_panel_detail"); 
		accounts_detail_button_prepend_detail_mouseenter(this, panel, panel); 
	}); 
	$(".index_item .accounts_detail_button_prepend_detail").mouseleave(function(event){ 
		var panel = $(this).parent().find(".accounts_detail_panel_detail"); 
		accounts_detail_button_prepend_detail_mouseleave(this, panel, event); 
	}); 
}); 
 
$(function() { 
	function accounts_detail_panel_detail_mouseleave(panel, event){ 
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
	$(".index_item .accounts_detail_panel_detail").mouseleave(function(event){ 
		// var panel = $("#ui-id-" + (parseInt(index) + 1)); 
		var panel = $(this).parent().find(".accounts_detail_panel_detail"); 
		accounts_detail_panel_detail_mouseleave(panel, event); 
	}); 
	$(window).scroll(function() { 
		$(".index_item .accounts_detail_panel_detail").hide(); 
	}); 
}); 
 
$(function() { 
	$(window).resize(function() { 
		$('#accounts_detail_panel_add').css('width', $(window).width() * 0.97); 
		$('#accounts_detail_panel_add').css('height', $(window).height() * 0.97); 
		$('#accounts_detail_panel_add').css('left', ($(window).width() - $('#accounts_detail_panel_add').width()) / 2); 
		$('#accounts_detail_panel_add').css('top', ($(window).height() - $('#accounts_detail_panel_add').height()) / 2); 
	}); 
}); 
 
/*
---------------------------------------------------------------------------------------------- 
Power By Hahaha Corp.
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 