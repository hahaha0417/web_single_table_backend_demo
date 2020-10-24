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

var Vertical_Accordion = function(el, multiple) {	
	this.el = el || {};
	this.multiple = multiple || false;
	
	// Variables privadas
	var links = this.el.find('.link');
	// Evento
	links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
}

Vertical_Accordion.prototype.dropdown = function(e) {
	var $el = e.data.el,
		$this = $(this),
		$next = $this.next();
	$next.slideToggle();
	$this.parent().toggleClass('open');

	if (!e.data.multiple) {
		$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
	};
}	
// false是可不可以多開頁面
// var vertical_accordion = new Vertical_Accordion($('#vertical_accordion'), false);

// http://es6.ruanyifeng.com/#docs/module
export {Vertical_Accordion}; 

$(function(){    
	
});