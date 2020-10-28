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
    // ---------------------------------------- 
    // 項目太多，再另做一個功能(傳輸最簡)
    // 不然直接將form丟過去即可
    // ---------------------------------------- 
    $("#accounts_panel_add_form").submit(function(e){
        alert(333);
        return false;
    });
   
    $('.accounts_panel_add_button_add').click(function() { 
        // var item = {
        //     "account" : $("#accounts_panel_add_account").val(),
        //     "password_new" : $("#accounts_panel_add_password").val(),
        //     "password_confirm" : $("#accounts_panel_add_password_confirm").val(),
        //     "email" : $("#accounts_panel_add_email").val(),
        //     "gender" : $(".accounts_panel_add_gender[name=gender]:checked").val(),
        //     "status" : $("#accounts_panel_add_status").val(),
        // };
        
        // var form_data = JSON.stringify(Object.fromEntries(new FormData($('#accounts_panel_add_form')[0])));
        var form_data = Object.fromEntries(new FormData($('#accounts_panel_add_form')[0]));
        console.log(form_data);
                
        $.ajax({
            url:"/backend/table/backend/accounts/list/deal",
            type:"POST",           
            
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'add',
                'item': form_data,
                // 'target': "image",
            },
            success:function(response, status, xhr){  
                console.log(response);                         
                if(response.status == 0){
                    // 成功
                    layer.msg(
                        response.msg, 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                            end: function(index, layero){
                                //do something
                                location.reload();     
                            }
                        }
                    );
                }
                else{
                    // 失敗失敗
                    layer.msg(
                        response.msg, 
                        {
                            icon: 5,
                            area: ['360px', '100px'],                            
                        }
                    );
                                   
                }                             
            },
            error:function(response, status, xhr){     
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
        return true;
    }); 
}); 