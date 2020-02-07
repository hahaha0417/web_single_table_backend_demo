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
    // expand content
    $('#asus_protection .hd-more').on('click', function () {
        var $this = $(this),
            source = $this.data('source'),
            hidden = $this.next();

        hidden.find('img').each(function () {
            $(this).attr('src', $(this).data('source')).css('visibility', 'visible');
        })

        $this.toggleClass('hd-open');
        hidden.slideToggle(1000);
        if ($this.hasClass('hd-open')) {
            $('html, body').stop(0,1).animate({
                scrollTop: $this.offset().top
            }, 1000);
        }
    });

             
});

