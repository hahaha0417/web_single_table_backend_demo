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

$(function(){   
    // scrollReveal
	// Changing the defaults
	window.sr = ScrollReveal({
		reset: true,
		mobile: true,
		duration: 600,
		origin: 'bottom',
		distance: '50px',
		opacity: 0,
		scale: 0.8,
		easing: 'cubic-bezier(.38,.02,.52,1.35)'
	});

	sr.reveal('#asus_audio .reveal3', {
		origin: 'left'
    }, 500);
    
    // sonic studio ui lightbox
	var uibox = $('#asus_audio #sonic_ui_on');
	$('#asus_audio .hd-sec-sonic figure > img').on('click', function(){
		uibox.fadeIn();
	});
	uibox.on('click', function(e){
		if(e.target != this){return;}
		$(this).fadeOut();
    })
    
    // SUPREMEFX  click switch
	var item = $('#asus_audio .audio-switch li:nth-child(n-5)'),
    supremefx = $('#asus_audio .hd-supremefx li'),
    dragger = $('#asus_audio #dragger'),
    pos,
    n = 3;
    item.on('click', function(){
        n = $(this).data('supremefx');
        n = moveHandle(n);
    });
    var prevX = -1,
        flag = '';
    dragger.draggable({
        axis:'x',
        snap: '#asus_audio .audio-switch li span',
        containment: "#asus_audio .audio-switch",
        helper: "clone",
        start: function(e,ui) {
            $(this).addClass('moving');
            setTimeout(function(){
                $(this).removeClass('moving');
            },500)
        },
        drag:function(e,ui){
            if(prevX == -1){
                prevX = e.pageX;
                return false;
            }
            if(prevX > e.pageX) {
            flag = 'left';
            }
            else if(prevX < e.pageX) { // dragged right
                flag = 'right';
            }
            prevX = e.pageX;
        },
        stop:function(e,ui){
            // console.log(flag);
            if(flag == 'left'){
                n--; n=moveHandle(n);
            }else if(flag == 'right'){
                n++; n=moveHandle(n);
            }
        }
    });

    function moveHandle(n){
        if(n<1){n=1}
        else if(n>5){n=5}
        else{n=Math.floor(n)}
        // console.log(n);
        pos = 'pos' + n;
        supremefx.removeClass('hd-active').eq(n).addClass('hd-active');
        dragger.removeClass().addClass(pos).attr('data-supremefx', n);
        return n;
    }

             
});