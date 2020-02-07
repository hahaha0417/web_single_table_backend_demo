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
             
});


$(document).ready(function(e) {
    var $win = $(window);
    $win.on('scroll', function(e) {
        var sctop = $win.scrollTop();
        var sec2 = $('.ment_service .content').offset().top - $win.outerHeight() + 200
        
        if (sctop > sec2) {
            $('.ment_service .list').addClass('view');
            setTimeout(function() {
                $('.ment_service .icons').addClass('view')
            }, 400)
        }
        
    }).trigger('scroll');

    $(document).ready(function(e) {
        $('.lazy-ite-1, .lazy-ite-2').lazy({
            threshold: 0,
            afterLoad: function(element) {
                $(element).parent().addClass('view')
            }
        })
    });
}); 