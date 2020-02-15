// ---------------------------------- 
// 調整parent iframe height
// ---------------------------------- 
//  因為Cross Origin，JS可能跟頁面不同Port，因此Frame Resize Height處理統一寫在這，
function getDocHeight(doc) {
	doc = doc || document;
	// stackoverflow.com/questions/1145850/
	var body = doc.body, html = doc.documentElement;
	var height = Math.max( body.scrollHeight, body.offsetHeight, 
		html.clientHeight, html.scrollHeight, html.offsetHeight );
	return height;
}

function setIframeHeight(id) {
	var ifrm = document.getElementById(id);
	var doc = ifrm.contentDocument? ifrm.contentDocument: 
		ifrm.contentWindow.document;
	$scrollHor=$(window).scrollTop(); 
	ifrm.style.visibility = 'hidden';
	ifrm.style.height = "10px"; // reset to minimal height ...
	// IE opt. for bing/msn needs a bit added or scrollbar appears
	
	ifrm.style.height = getDocHeight( doc ) + "px";  
	$(window).scrollTop($scrollHor);  
	ifrm.style.visibility = 'visible';
	
}

$(function(){   
	var iframe_=$(".content_frame");
	$.each(iframe_, function(key, value){
		value.onload = function(){    
			setIframeHeight($(value).attr("id"));   
			iframe_.loaded = 1;   
		};  
	});
	
	$(window).resize(function(){    
		$.each(iframe_, function(key, value){  
			setIframeHeight($(value).attr("id"));     
		});
		
	});   
});