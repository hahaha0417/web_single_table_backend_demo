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
License : 金融 & 黨國及相關組織禁用，其餘參考MIT
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 
$(function() { 
	$('.index_item_button_add').click(function() { 
		$('#index_item_panel_add').css('width', $(window).width() * 0.97); 
		$('#index_item_panel_add').css('height', $(window).height() * 0.97); 
		$('#index_item_panel_add').css('left', ($(window).width() - $('#index_item_panel_add').width()) / 2); 
		$('#index_item_panel_add').css('top', ($(window).height() - $('#index_item_panel_add').height()) / 2); 
		$('#index_item_panel_add').show(); 
	}); 
}); 
 
$(function() { 
	$('.index_item_panel_add_button_cancel').click(function() { 
		$('#index_item_panel_add').hide(); 
	}); 
}); 
 
$(function() { 
	$(window).resize(function() { 
		$('#index_item_panel_add').css('width', $(window).width() * 0.97); 
		$('#index_item_panel_add').css('height', $(window).height() * 0.97); 
		$('#index_item_panel_add').css('left', ($(window).width() - $('#index_item_panel_add').width()) / 2); 
		$('#index_item_panel_add').css('top', ($(window).height() - $('#index_item_panel_add').height()) / 2); 
	}); 
}); 
 
/*
---------------------------------------------------------------------------------------------- 
Power By Hahaha Corp.
---------------------------------------------------------------------------- 
 
---------------------------------------------------------------------------------------------- 
*/ 
 