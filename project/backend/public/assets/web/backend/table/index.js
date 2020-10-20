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

$(function() {  

});

// --------------------------------------------------- 
// panel resize
// --------------------------------------------------- 
$(function() {  
    $(window).resize(function() {
        // add panel
        // $("#index_item_add_panel").css("left", ($(window).width() - $("#index_item_add_panel").width()) / 2);
        // $("#index_item_add_panel").css("top", ($(window).height() - $("#index_item_add_panel").height()) / 2);

    });

    $(':input').labelauty({
        
    });

    var item_image_upload_files = [];
    var flag;
    var is_in_iframe = (window.location != window.parent.location);
    
    function upload_file(upload, item, index){
        item_image_upload_files[index] = $(item).uploadFile({
            url: upload,
            fileName: "index_file",
            uploadStr: "...",
            statusBarWidth: "40px",
            dragDrop:false,
            onSuccess:function(files,data,xhr,pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }     
                // alert(33);
                $(item).parent().find(".index_item_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));
                $(item).parent().parent().parent().find(".index_item_panel_image").val(data['image']);
                $(item).parent().parent().parent().find(".index_item_panel_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));
                item_image_upload_files[index].reset();
            },      
            showQueueDiv: "index_nav_title_image_output",                                    
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'upload',
                'target': 'image',
                'item': {
                    "page": $(item).parent().parent().parent().find(".index_item_page").val(),
                    "item": $(item).parent().parent().parent().find(".index_item_panel_item").val(),
                    "id": $(item).parent().parent().parent().attr("item_id"),
                },
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }

    $.each($(".upload"), function( index, value ) {  
        var upload = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/deal";
        upload_file(upload, value, index);
    });
     
    

});