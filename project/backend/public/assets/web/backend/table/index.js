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

$(function() { 
    $('.accounts_panel_add_button_add').click(function() { 
        var item = {
            "account" : $("#accounts_panel_add_account").val(),
            "password_new" : $("#accounts_panel_add_password").val(),
            "password_confirm" : $("#accounts_panel_add_password_confirm").val(),
            "email" : $("#accounts_panel_add_email").val(),
            "gender" : $(".accounts_panel_add_gender[name=gender]:checked").val(),
            "status" : $("#accounts_panel_add_status").val(),
        };
        
        console.log(item);
        
        $.ajax({
            type:"POST",
            url:"/backend/table/backend/accounts/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'add',
                'item': item,
                'target': "image",
            },
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    layer.msg(
                        response.msg, 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );

                    // console.log($("#index_pic_board_select"));
                    var image = $("#index_item_image").val();
                    $("#index_item_image_thumbnail").attr('src', new URL(image, window.location.protocol + "//" + location.host));
                }
                else{
                    layer.msg(
                        response.msg, 
                        {
                            icon: 5,
                            area: ['360px', '100px'],
                        }
                    );
                }                             
            },
            error:function(response,status,xhr){     
                // console.log(response);   
                if(response.status == 0){
                    layer.msg(
                        response.msg, 
                        {
                            icon: 5,
                            area: ['360px', '100px'],
                        }
                    );
                }
                else{
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