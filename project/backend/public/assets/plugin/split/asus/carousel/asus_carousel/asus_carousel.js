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
    // evolution
	$('#owl_evolution').on('initialized.owl.carousel changed.owl.carousel resized.owl.carousel', function(event){
        var current = event.item.index;
        $('#owl_evolution .owl-item').removeClass('prev-1 prev-2 prev-3 prev-4 prev-5');
        $('#owl_evolution .owl-item').eq(current-1).addClass('prev-1');
        $('#owl_evolution .owl-item').eq(current-2).addClass('prev-2');
        $('#owl_evolution .owl-item').eq(current-3).addClass('prev-3');
        $('#owl_evolution .owl-item').eq(current-4).addClass('prev-4');
        $('#owl_evolution .owl-item').eq(current-5).addClass('prev-5');
    });
    // disable nav when reach first/last item
    $("#owl_evolution").on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (event) {
        if (!event.namespace) return;
        var carousel = event.relatedTarget,
            element = event.target,
            current = carousel.current();
        $('.owl-next', element).toggleClass('disabled', current === carousel.maximum());
        $('.owl-prev', element).toggleClass('disabled', current === carousel.minimum());
    })
    $('#owl_evolution').owlCarousel({
        startPosition: 0,
        loop:false,
        padding:0,
        nav:true,
        navText:['',''],
        dots:false,
        center:true,
        responsive:{
            0:{
                items:3,
                nav:false,
                margin: -100
            },
            621:{
                items:5,
                margin: -50
            },
            1025:{
                items:9,
                margin: -250
            }
        }
    });
    $('#owl_evolution .owl-item').on('click', function(){
        var pos = $(this).index() % 10;
        $('#owl_evolution').trigger('to.owl.carousel', [pos,300,true])
    });


             
});
