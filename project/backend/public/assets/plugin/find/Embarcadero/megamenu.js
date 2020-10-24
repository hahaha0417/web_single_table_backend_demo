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

function dimDiv(event) {
    var duration = 150;
    var el = $("#page-cover");;
    if( event.type == 'mouseleave' ) {
        el.animate({
            opacity: 0
        }
        , {
            duration: duration,
            complete: function(){
                el.css('display', 'none');
            }
        });
    }
    else {
        el.animate({
            opacity: 0.5
        }
        , {
            duration: duration,
            start: function(){
                el.css('display', 'block');
            }
        });
    }
}
function isTouchDevice() {
    return !!('ontouchstart' in window) || !!('msmaxtouchpoints' in window.navigator);
}
function setContainerHeight(listitem) {

    var height = listitem.closest("ul.container").height();
    var newheight = listitem.children("ul").height();
    if(newheight>height){
        listitem.closest("ul.container").height(newheight);
    }

}
/*global $ */
$(function () {
    // 這會導致$select異常
    //"use strict";
    
	

	
	var istouch = isTouchDevice();

	var mobilemenuMax = 767;
	$("body").append("<div id=\"page-cover\"></div>");

	//wrap the first level in a div
	$('.menu > ul >li> ul').wrap("<div class='menublock' style='display:none'></div>");

	//, .menu li:has(.menublock>ul)
	$('.menu .menublock li:not(.categorylist):has(ul)').addClass('parentitem');
	$('.menu > ul >li').addClass('firstlevel');

	if (isTouchDevice()) {
		$('.menu > ul >li:has(.menublock)').addClass('hoverparent');
		$('.menu > ul >li .parentitem > a, .menu > ul >li.hoverparent > a').addClass('touch').append('<span class="doorway"></span>');

	}

	$('.menu > ul >li:not(:has(.menublock .parentitem,.categorylist))').addClass('normal-sub');
	$('.menu > ul >li:has(.categorylist)').addClass('categorylist-sub');
	//Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
	$('.menu > ul >li li:has(>a.btn)').addClass('buttonlink');

	//get the height of the tallest menu in an item and set the height of the .menublock to that height



	// show the menu when ready

	//$('.menu').show();
	$(".menublock").on('mouseenter mouseleave', function (e) {
		if ($(window).width() > mobilemenuMax) {
			dimDiv(e);
		}
	});
	if (istouch) {
		//hide the menu on clicking outside
		

		//for touch devices, click menu
		// $(".menu .doorway").click(function (e) {
		$(".menu .parentitem").click(function (e) {
			//$(this).closest('a').hover();
			var parent = $(this).closest('li');

			$(window).click(function () {
				// $(".menu .menublock, .menu .parentitem ul").hide();
				parent.children("ul").stop(true, false).hide(150);				
			});

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
						parent.children("ul").hide(150);	
					}  
				}        
			});

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
							parent.children("ul").hide(150);	
						}
					});
					$("#header_content_bar").show();
		
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
				parent.children("ul").hide(150);     
			}); 





			$(".header_bar_box").mouseenter(function(e){
				//alert(1);
				if ($(window).width() > mobilemenuMax) {
					e.type = 'mouseleave';
					dimDiv(e);
					e.type = 'mouseenter'
				}
				$("#header_content_bar").hide();  
				parent.children("ul").hide(150);	      
			}); 




			//make all hidden first
			// ga('send', {
			// 	hitType: 'event',
			// 	eventCategory: 'UX-Tablet-Menu-Click',
			// 	eventAction: 'click',
			// 	eventLabel: 'Submenu Opening by click'
			// });
			//for the first level
			if (parent.hasClass('firstlevel')) {
				$(".menu .menublock, .menu .parentitem ul").not(parent.children('.menublock')).hide();
				parent.children(".menublock").stop(true, false).toggle();
			}
			else {
				//for the rest 
				$(".menu .parentitem ul").not(parent.children('ul')).hide();
				parent.children("ul").stop(true, false).fadeToggle(150);
				setContainerHeight(parent);
			}
			e.preventDefault();
			e.stopPropagation();

		});
	}
	else {

		$(".menu > ul > li").hover(function (e) {
			if ($(window).width() > mobilemenuMax) {
				
			//	$(this).children(".menublock").stop(true, false).fadeToggle(150);
				e.preventDefault();
			}
		});
		$(".menu .parentitem").hover(function (e) {
			if ($(window).width() > mobilemenuMax) {
				$(this).children("ul").stop(true, false).fadeToggle(150);

				setContainerHeight($(this));
				e.preventDefault();
			}
		});
	}
    
	// $(".menu > ul > li > a").click(function () {
	// 	var parent = $(this).closest('li');
	// 	if ($(window).width() <= mobilemenuMax) {
	// 		// parent.children(".menublock").stop(true, false).fadeToggle(150);
	// 	}
	// });
	// // all links other than the first level
	// $(".menu .parentitem > a").click(function () {

	// 	var parent = $(this).closest('li');
	// 	if ($(window).width() <= mobilemenuMax) {
	// 		parent.children("ul").stop(true, false).fadeToggle(150);
			
	// 	}
	// });

	//mobile menu
	$(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\"></a>");

	$(".menu-mobile").click(function (e) {
		$(".menu > ul").toggleClass('show-on-mobile');
		e.preventDefault();
	});

	//when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

});