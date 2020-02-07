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

// https://stackoverflow.com/questions/9975810/make-iframe-automatically-adjust-height-according-to-the-contents-without-using?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
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

function setParentIframeHeight(id) {
    if(parent)
    {
        var ifrm = parent.document.getElementById(id);
        var doc = ifrm.contentDocument? ifrm.contentDocument: 
            ifrm.contentWindow.document;
        $scrollHor=$(parent.window).scrollTop(); 
        // ifrm.style.visibility = 'hidden';
        ifrm.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        
        ifrm.style.height = getDocHeight( doc ) + 4 + "px";  
        $(parent.window).scrollTop($scrollHor);  
        ifrm.style.visibility = 'visible';
    }
}
function setParentParentIframeHeight(id) {
    if(parent.parent)
    {
        var ifrm = parent.parent.document.getElementById(id);
        var doc = ifrm.contentDocument? ifrm.contentDocument: 
            ifrm.contentWindow.document;
        $scrollHor=$(parent.parent.window).scrollTop(); 
        // ifrm.style.visibility = 'hidden';
        ifrm.style.height = "10px"; // reset to minimal height ...
        // IE opt. for bing/msn needs a bit added or scrollbar appears
        
        ifrm.style.height = getDocHeight( doc ) + 4 + "px";  
        $(parent.parent.window).scrollTop($scrollHor);  
        ifrm.style.visibility = 'visible';
    }
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
$(function(){   
    
});



$(function(){   
    var item_index = $(".index_item").length - 1;
    var item_image_upload_file = [];
    var flag;
    var is_in_iframe = (window.location != window.parent.location);
    
    // function upload_file(upload, item, index){
    //     item_image_upload_file[index] = $(item).uploadFile({
    //         url: upload,
    //         fileName: "index_file",
    //         uploadStr: "...",
    //         statusBarWidth: "40px",
    //         dragDrop:false,
    //         onSuccess:function(files,data,xhr,pd)
    //         {
    //             if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
    //             {
    //                 setParentIframeHeight("index_content_frame");
    //             }     
    //             // alert(33);
    //             $(item).parent().find(".index_item_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));
    //             $(item).parent().parent().parent().find(".index_item_panel_image").val(data['image']);
    //             $(item).parent().parent().parent().find(".index_item_panel_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));
    //             item_image_upload_file[index].reset();
    //         },      
    //         showQueueDiv: "index_nav_title_image_output",                                    
    //         formData     : {
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'upload',
    //             'target': 'image',
    //             'item': {
    //                 "page": $(item).parent().parent().parent().find(".index_item_page").val(),
    //                 "item": $(item).parent().parent().parent().find(".index_item_panel_item").val(),
    //                 "id": $(item).parent().parent().parent().attr("item_no"),
    //             },
    //         },
    //         multiple: false,
    //         maxFileCount: 1,
    //         maxFileSize: 20*1024*1024,
    //     });
    // }

    function item_enabled_change(this_){
        var item = {
            'enabled': $(this_).prop("checked"), 
        };
        var no = $(this_).parent().parent().attr("item_no");
        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'enabled',
                'item': item,
                'no': no,
			},
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    // layer.msg(
                    //     response.msg, 
                    //     {
                    //         icon: 6,
                    //         area: ['360px', '100px'],
                    //     }
                    // );

                    // console.log($("#index_pic_board_select"));
                    
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
    }

    function item_maintain_change(this_){
        var item = {
            'maintain': $(this_).prop("checked"), 
        };
        var no = $(this_).parent().parent().attr("item_no");
        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'maintain',
                'item': item,
                'no': no,                
			},
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    // layer.msg(
                    //     response.msg, 
                    //     {
                    //         icon: 6,
                    //         area: ['360px', '100px'],
                    //     }
                    // );

                    // console.log($("#index_pic_board_select"));
                    
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
    }

    $(".index_item_enabled").change(function() {
        item_enabled_change(this);
    });

    $(".index_item_maintain").change(function() {
        item_maintain_change(this);        
    });

    function item_add_event_setting(this_, index){
        $("#index_item_select_" + index).labelauty(); 
        $("#index_item_enabled_" + index).labelauty(); 
        $("#index_item_maintain_" + index).labelauty(); 
        
        $("#index_item_order_" + index).keyup(function() { 
            var no = $(this_).parent().parent().attr("item_no");
            var item = {
                'order_': $(this_).val(),
            };
            change_order(no, item);
        });
        $("#index_item_product_prepend_" + index).mouseenter(function(){
            // alert(3);
            var panel = $(this).parent().find(".index_item_panel");
            index_item_product_prepend_mouseenter(this, panel);            
        });
        $("#index_item_product_prepend_" + index).mouseleave(function(e){
            index_item_product_prepend_mouseleave(this, e);
        });
        $("#index_item_panel_" + index).mouseleave(function(event){          
            //var div = $("#ui-id-" + (parseInt(index) + 1));
            var div = $(this).parent().find(".index_item_panel"); 
            var this_ = this;
            div.mouseleave(function(event){
                index_item_panel_mouseleave(this_, div, event);
            });
            index_item_panel_mouseleave(this_, div, event);
        });
    
        $(window).scroll(function() {
            $(".index_item .index_item_panel").hide();
        });
        $("#index_item_delete_" + index).click(function() {        
            var no = $(this).attr("value");
            //alert(id);
            item_delete(no);
        });
    
        $("#index_item_edit_" + index).click(function() {
            var no = $(this).attr("value");
            item_edit(no);        
        });

        // $(".index_item_panel_dir_enter").click(function() {     
        //     // alert(1);        
        //     item_panel_dir_enter(this);        
        // });
        
        $("#index_item_panel_dir_enter_" + index).click(function() {
                       
            item_panel_dir_enter(this);        
        });

        
        $("#index_item_panel_image_refresh + index").click(function() {  
            var id = $(this).parent().parent().parent().parent().parent().parent().parent().attr("item_no");
            var item = {
                'image': $(this).parent().parent().find(".index_item_panel_image").val(),
            };
            var this_refresh = this;
            index_item_panel_image_refresh(id, item, this_refresh);
        });

        $("#index_item_enabled_" + index).change(function() {
            item_enabled_change(this);
        });
    
        $("#index_item_maintain_" + index).change(function() {
            item_maintain_change(this);        
        });
    }

    function item_str(index, item){
        var web_dir = new URL('product/' + item['class'] + '/' + item['model'], window.location.protocol + "//" + location.host);
        var str = "           \
        <tr class=\"index_item\" item_no=\"" + item['no'] + "\" index=\"" + index + "\">                \
            <td><input id=\"index_item_select_" + index + "\" class=\"index_item_select\" type=\"checkbox\" name=\"checkbox\" data-labelauty=\" \"></td> \
            <td><input id=\"index_item_order_" + index + "\" style=\"width:80px;\" type=\"text\" class=\"index_item_order form-control\" placeholder=\"\" value=\"" + item['order_'] + "\"></td> \
            <td>        \
                <div class=\"\" > \
                    <img id=\"index_item_image_thumbnail_" + index + "\" class=\"index_item_image_thumbnail\" src=\"#\" style=\"width: 40px;height: 40px;\"/>      \
                </div>      \
            </td>       \
            <td>        \
                <div class=\"input-group\">     \
                    <input id=\"index_item_product_" + index + "\" type=\"text\" class=\"index_item_product form-control\" placeholder=\"產品\" value=\"" + item['product'] + "\">     \
                    <div id=\"index_item_product_prepend_" + index + "\" class=\"input-group-prepend index_item_product_prepend\">       \
                        <label style=\"font-size:1.5em; color:Tomato\" class=\"btn-secondary input-group-text\" for=\"index_item_title_" + index + "\">      \
                            <i class=\"fab fa-elementor\"></i>      \
                        </label>        \
                    </div>      \
                    <div id=\"index_item_panel_" + index + "\" class=\"index_item_panel\">       \
                        <div class=\"index_item_panel_content\">             \
                            <div style=\"height:5px;\">&nbsp;</div>     \
                            <div class=\"row\">                         \
                                <label for=\"index_item_panel_dir_" + index + "\" class=\"col-sm-3 col-form-label\">路徑 : </label>                     \
                                <div class=\"col\">                         \
                                    <input style=\"width:530px;\" id=\"index_item_panel_dir_" + index + "\" readonly style=\"\" type=\"text\" class=\"index_item_panel_dir form-control\" placeholder=\"路徑\" value=\"" + web_dir + "\">               \
                                </div>                  \
                                <div class=\"col-sm-2\">                        \
                                    <div id=\"index_item_panel_dir_enter_" + index + "\" style=\"font-size:1em; color:Tomato\" class=\"index_item_panel_dir_enter btn btn-dark\">           \
                                        <i class=\"fas fa-angle-double-right\"></i>                    \
                                    </div>                      \
                                </div>                                      \
                            </div>                                      \
                            <div style=\"height:5px;\">&nbsp;</div>                 \
                            <div class=\"row\">         \
                                <div class=\"col-sm\">          \
                                    <img id=\"index_item_panel_image_thumbnail_" + index + "\" class=\"index_item_panel_image_thumbnail\" src=\"#\" style=\"width: auto;height: 200px;\"/>     \
                                </div>      \
                            </div>      \
                            <div style=\"height:5px;\">&nbsp;</div>           \
                            <div class=\"row\">           \
                                <div class=\"col-sm-2\">                \
                                    <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/class', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_class_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_class btn btn-dark\">           \
                                            class       \
                                            <i class=\"fas fa-angle-double-right\"></i>   \
                                        </div>      \
                                    </a>            \
                                </div>              \
                                <div class=\"col-sm-2\">              \
                                <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/model', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_model_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_model btn btn-dark\">       \
                                            model           \
                                            <i class=\"fas fa-angle-double-right\"></i>               \
                                        </div>              \
                                    </a>                \
                                </div>              \
                                <div class=\"col-sm-2\">              \
                                <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/product', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_product_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_product btn btn-dark\">         \
                                            product             \
                                            <i class=\"fas fa-angle-double-right\"></i>                                                                \
                                        </div>          \
                                    </a>            \
                                </div>          \
                            </div>          \
                            <div class=\"row\">                                                        \
                                <div class=\"col-sm-2\">                        \
                                <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/content/index', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_index_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_index btn btn-dark\">           \
                                            index               \
                                            <i class=\"fas fa-angle-double-right\"></i>                                                                \
                                        </div>              \
                                    </a>                    \
                                </div>                      \
                                <div class=\"col-sm-2\">                  \
                                <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/content/overview', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_overview_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_overview btn btn-dark\">            \
                                            overview                \
                                            <i class=\"fas fa-angle-double-right\"></i>                                                                \
                                        </div>              \
                                    </a>            \
                                </div>              \
                                <div class=\"col-sm-2\">              \
                                <a href=\"" + new URL('backend/product/' + item['class'] + '/' + item['model'] + '/content/feature', window.location.protocol + "//" + location.host) + "\" target=\"_blank\">         \
                                        <div id=\"index_item_panel_button_feature_{{$loop->index}}\" style=\"font-size:1em; color:Tomato; width:130px;\" class=\"index_item_panel_button_feature btn btn-dark\">         \
                                            feature                 \
                                            <i class=\"fas fa-angle-double-right\"></i>                                                                \
                                        </div>          \
                                    </a>            \
                                </div>          \
                            </div>              \
                            <div class=\"row\">     \
                                <div id=\"index_item_panel_create_time_" + index + "\" class=\"col\">" + item['create_time'] + "</div>     \
                                        \
                            </div>      \
                            <div class=\"row\">         \
                                <div id=\"index_item_panel_update_time_" + index + "\" class=\"col\">" + item['update_time'] + "</div>         \
                            </div>          \
                        </div>          \
                    </div>              \
                </div>                  \
            </td>                       \
            <td><input id=\"index_item_enabled_" + index + "\" class=\"index_item_enabled\" type=\"checkbox\" name=\"checkbox\" data-labelauty=\" \"></td>       \                 \
            <td><input id=\"index_item_maintain_" + index + "\" class=\"index_item_maintain\" type=\"checkbox\" name=\"checkbox\" data-labelauty=\" \"></td>    \
            <td>        \
                <div class=\"\" >  \
                    <div id=\"index_item_delete_" + index + "\" value=\"" + item["no"] + "\" style=\"font-size:1em; color:Tomato\" class=\"index_item_delete btn btn-dark\">     \
                        <i class=\"fas fa-minus\"></i>      \
                    </div>      \
                    <div id=\"index_item_edit_" + index + "\" value=\"" + item["no"] + "\" style=\"font-size:1em; color:Tomato\" class=\"index_item_edit btn btn-dark\">     \
                        <i class=\"fas fa-edit\"></i>       \
                    </div>                                   \
                </div>                                      \
            </td>                                           \
            <td><input id=\"index_item_comment_" + index + "\" type=\"text\" class=\"index_item_comment form-control\" placeholder=\"備註\" value=\"" + item['comment'] + "\"></td>      \
        </tr>               \
        ";      
        return str;
    }

    function add_item(){
        // $("#index_item_add_panel").toggle();
        
        var item = {
            "class": $("#index_item_add_panel_class").val(), 
            "model": $("#index_item_add_panel_model").val(), 
            "product": $("#index_item_add_panel_product").val(), 
            "database_": $("#index_item_add_panel_database").val(),
        };

        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'add',
                'item': item,
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

                    if(response.item["class"] == null){
                        response.item["class"] = "";
                    }
                    if(response.item["model"] == null){
                        response.item["model"] = "";
                    }
                    if(response.item["product"] == null){
                        response.item["product"] = "";
                    }
                    if(response.item["database"] == null){
                        response.item["database"] = "";
                    }
                    if(response.item["comment"] == null){
                        response.item["comment"] = "";
                    }
                    // console.log($("#index_pic_board_select"));
                    
                    $("#index_item_all").after(                          
                        item_str(item_index, response.item)
                    );                  
                    item_add_event_setting(this, item_index);
                    item_index++;

                    if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                    {
                        setParentIframeHeight("index_content_frame");                    
                    }
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
    }
    
    
    function index_class_model_select(){
        var class__ = $("#index_class_select").find(":selected").attr("name");
        var model__ = $("#index_model_select").find(":selected").attr("name");
        // alert($(location).attr('pathname'));
        if(class__ == "all" && model__ == "all"){
            window.location = window.location.protocol + "//" + $(location).attr('host') + $(location).attr('pathname');
        }
        else if(class__ != "all" && model__ == "all"){
            window.location = window.location.protocol + "//" + $(location).attr('host') + $(location).attr('pathname') + "?i_class=" + class__;
        }
        else if(class__ == "all" && model__ != "all"){
            window.location = window.location.protocol + "//" + $(location).attr('host') + $(location).attr('pathname') + "?i_model=" + model__;
        }
        else{
            window.location = window.location.protocol + "//" + $(location).attr('host') + $(location).attr('pathname') + "?i_class=" + class__ + "&i_model=" + model__;
        }        
    }
    // ----------------------------------------------------------------
    $("#index_class_select").change(function() {        
        index_class_model_select();        
    });

    $("#index_model_select").change(function() {
        index_class_model_select();
    });
    // ----------------------------------------------------------------
    $("#index_item_add_default_dir").click(function() {
        if($("#index_item_default_class").val() == "" || $("#index_item_default_class").val() == "all" ||
            $("#index_item_default_model").val() == "all"
        ){
            layer.alert('路徑不可跳空或是有all!!');
            return;
        }
        var item = {
            "class": $("#index_item_default_class").val(), 
            "model": $("#index_item_default_model").val(), 
        };
        $.ajax({
            type:"POST",
            url:$(location).attr('pathname') + "/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'page',
                'method': 'add_default',
                'item': item,
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
                    index_class_model_select(); 
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
    $("#index_item_delete_default_dir").click(function() {               
        if($("#index_item_default_class").val() == "" || $("#index_item_default_class").val() == "all" ||
            $("#index_item_default_model").val() == "all"
        ){
            layer.alert('不可為空或是all!!');
            return;
        }
        var item = {
            "class": $("#index_item_default_class").val(), 
            "model": $("#index_item_default_model").val(), 
        };
        $.ajax({
            type:"POST",
            url:$(location).attr('pathname') + "/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'page',
                'method': 'delete_default',
                'item': item,
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
                    index_class_model_select();
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
    
    // ----------------------------------------------------------------



    
    $(".index_item_add").click(function() {
        var class__ = $("#index_class_select").find(":selected").attr("name");
        var model__ = $("#index_model_select").find(":selected").attr("name");

        // alert($(window).width());
        // alert($(window).height());
        $("#index_item_add_panel").css("left", ($(window).width() - $("#index_item_add_panel").width()) / 2);
        $("#index_item_add_panel").css("top", ($(window).height() - $("#index_item_add_panel").height()) / 2);
        
        if(class__ == "all"){
            $("#index_item_add_panel_class").val("");
        }
        else{
            $("#index_item_add_panel_class").val(class__);
        }
        
        if(model__ == "all"){
            $("#index_item_add_panel_item").val("");
        }
        else{
            $("#index_item_add_panel_item").val(model__);
        }
        
        $("#index_item_add_panel_product").val("");
        $("#index_item_add_panel_database").val("");

        $(".index_item_add_panel_id_check").hide();
        $(".index_item_add_panel_id_error").hide();

        $("#index_item_add_panel").toggle();
        
    });

    // function index_item_add_panel_check_id(){
    //     var id = $("#index_item_add_panel_id").val();
    //     var item = {
    //         "temp": "temp", 
    //     };

    //     $.ajax({
	// 		type:"POST",
    //         url:"/backend/index/index/deal",
    //         data:{
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'check_id',
    //             'item': item,
    //             'id': id,
	// 		},
    //         success:function(response,status,xhr){  
    //             // console.log(response);                         
    //             if(response.status == 0){
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 6,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );

    //                 // console.log($("#index_pic_board_select"));
    //                 $(".index_item_add_panel_id_check").show();
    //                 $(".index_item_add_panel_id_error").hide();
    //             }
    //             else{
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 5,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );
    //                 $(".index_item_add_panel_id_error").show();
    //                 $(".index_item_add_panel_id_check").hide();
    //             }                             
    //         },
    //         error:function(response,status,xhr){     
    //             // console.log(response);   
    //             if(response.status == 0){
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //         },
    //     });
    // }

    // $('#index_item_add_panel_id').on('change', function(e) {
    //     index_item_add_panel_check_id();
    // });

    $(".index_item_add_panel_add").click(function() {
        add_item();
    });

    $(".index_item_add_panel_cancel").click(function() {
        $("#index_item_add_panel").toggle();
    });

    // function index_item_add_index_panel_check_id(){
    //     var id = $("#index_item_add_index_panel_id").val();
    //     var item = {
    //         "temp": "temp", 
    //     };

    //     $.ajax({
	// 		type:"POST",
    //         url:"/backend/index/index/deal",
    //         data:{
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'check_id',
    //             'item': item,
    //             'id': id,
	// 		},
    //         success:function(response,status,xhr){  
    //             // console.log(response);                         
    //             if(response.status == 0){
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 6,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );

    //                 // console.log($("#index_pic_board_select"));
    //                 $(".index_item_add_index_panel_id_check").show();
    //                 $(".index_item_add_index_panel_id_error").hide();
    //             }
    //             else{
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 5,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );
    //                 $(".index_item_add_index_panel_id_error").show();
    //                 $(".index_item_add_index_panel_id_check").hide();
    //             }                             
    //         },
    //         error:function(response,status,xhr){     
    //             // console.log(response);   
    //             if(response.status == 0){
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //         },
    //     });
    // }
   

    // function index_item_add_nav_panel_check_id(){
    //     var id = $("#index_item_add_nav_panel_id").val();
    //     var item = {
    //         "temp": "temp", 
    //     };

    //     $.ajax({
	// 		type:"POST",
    //         url:"/backend/index/index/deal",
    //         data:{
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'check_id',
    //             'item': item,
    //             'id': id,
	// 		},
    //         success:function(response,status,xhr){  
    //             // console.log(response);                         
    //             if(response.status == 0){
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 6,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );

    //                 // console.log($("#index_pic_board_select"));
    //                 $(".index_item_add_nav_panel_id_check").show();
    //                 $(".index_item_add_nav_panel_id_error").hide();
    //             }
    //             else{
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 5,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );
    //                 $(".index_item_add_nav_panel_id_error").show();
    //                 $(".index_item_add_nav_panel_id_check").hide();
    //             }                             
    //         },
    //         error:function(response,status,xhr){     
    //             // console.log(response);   
    //             if(response.status == 0){
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //         },
    //     });
    // }

    // $('#index_item_add_index_panel_id').on('change', function(e) {
    //     index_item_add_index_panel_check_id();
    // });

    // $('#index_item_add_index_panel_title_name').on('change', function(e) {
    //     index_item_add_index_panel_check_id();
    // });

    // $('#index_item_add_index_panel_title_name').on('keydown', function(e) {
    //     var code = e.keyCode || e.which;

    //     var index = "root";
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
    //     var item = "index";
        
    //     if(code == 16)
    //     {
    //         return false;
    //     }        
    //     else if(37 <=code && code <= 40)
    //     {
    //         return false;
    //     }
    //     else if(112 <=code && code <= 127)
    //     {
    //         return false;
    //     }
    //     else if(code == 46)
    //     {
    //         return false;
    //     }
    //     else if(code == 229)
    //     {
    //         // process
    //         return false;
    //     }
    //     else if(code == 17)
    //     {
    //         return false;
    //     }   
    //     else if(code == 8)
    //     {
    //         if($('#index_item_add_index_panel_id').val().toLowerCase() == index.toLowerCase() + "_" + item + "_" + ($('#index_item_add_index_panel_title_name').val() + $('#index_item_add_index_panel_id').val()[$('#index_item_add_index_panel_id').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_id').val(index + "_" + item + "_" + $('#index_item_add_index_panel_title_name').val().toLowerCase());
    //         }
    //         if($('#index_item_add_index_panel_url').val().toLowerCase() == ($('#index_item_add_index_panel_title_name').val() + $('#index_item_add_index_panel_url').val()[$('#index_item_add_index_panel_url').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_url').val($('#index_item_add_index_panel_title_name').val().toLowerCase());
    //         }
    //     }             
    //     else
    //     {   
    //         if($('#index_item_add_index_panel_id').val().toLowerCase() == index.toLowerCase() + "_" + item + "_" + $('#index_item_add_index_panel_title_name').val().toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_id').val(index + ("_" + item + "_" + $('#index_item_add_index_panel_title_name').val() + e.key).toLowerCase());
    //         }
    //         if($('#index_item_add_index_panel_url').val().toLowerCase() == $('#index_item_add_index_panel_title_name').val().toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_url').val(($('#index_item_add_index_panel_title_name').val() + e.key).toLowerCase());
    //         }
    //     }     
         
    // });
    // $('#index_item_add_index_panel_title_name').on('keyup', function(e) {
    //     var code = e.keyCode || e.which;

    //     var index = "root";
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
    //     var item = "index";
        
    //     if(code == 16)
    //     {
    //         return false;
    //     }
    //     else if(code == 229)
    //     {
    //         // process
    //         return false;
    //     }
    //     else if(code == 17)
    //     {
    //         return false;
    //     }   
    //     else if(code == 8 || code == 46)
    //     {
    //         if($('#index_item_add_index_panel_id').val().toLowerCase() == index + "_" + item + "_" + ($('#index_item_add_index_panel_title_name').val() + $('#index_item_add_index_panel_id').val()[$('#index_item_add_index_panel_id').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_id').val(index + "_" + item + "_" + $('#index_item_add_index_panel_title_name').val().toLowerCase());
    //         }
    //         if($('#index_item_add_index_panel_url').val().toLowerCase() == ($('#index_item_add_index_panel_title_name').val() + $('#index_item_add_index_panel_url').val()[$('#index_item_add_index_panel_url').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_index_panel_url').val($('#index_item_add_index_panel_title_name').val().toLowerCase());
    //         }
    //     }    
    //     else
    //     {
    //         return false;
    //     }             
    // });

    // $(".index_item_add_index").click(function() {
    //     var index = $("#index_page_select").attr("index");
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     var item = $("#index_item_select").find(":selected").attr("name");

    //     // alert($(window).width());
    //     // alert($(window).height());
    //     $("#index_item_add_index_panel").css("left", ($(window).width() - $("#index_item_add_index_panel").width()) / 2);
    //     $("#index_item_add_index_panel").css("top", ($(window).height() - $("#index_item_add_index_panel").height()) / 2);

    //     $("#index_item_add_index_panel_page").val("root");
    //     $("#index_item_add_index_panel_item").val("index");
    //     $("#index_item_add_index_panel_id").val("root_index_");
        

        

    //     $("#index_item_add_index_panel_title").val("");
    //     $("#index_item_add_index_panel_title_name").val("");
    //     $("#index_item_add_index_panel_url").val("");

    //     $(".index_item_add_index_panel_id_check").hide();
    //     $(".index_item_add_index_panel_id_error").hide();

    //     $("#index_item_add_panel").hide();
    //     $("#index_item_add_nav_panel").hide();
    //     $("#index_item_add_index_panel").toggle();
        
    //     // var page = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
        
    //     // if(page == "all" && item == "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create";
    //     // }
    //     // else if(page != "all" && item == "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page;
    //     // }
    //     // else if(page == "all" && item != "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?item=" + item;
    //     // }
    //     // else{
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page + "&item=" + item;
    //     // } 

    // });

    

    // $(".index_item_add_index_panel_cancel").click(function() {
    //     $("#index_item_add_index_panel").toggle();
    // });
    // // Nav
    // $('#index_item_add_nav_panel_id').on('change', function(e) {
    //     index_item_add_nav_panel_check_id();
    // });

    // $('#index_item_add_nav_panel_title_name').on('change', function(e) {
    //     index_item_add_nav_panel_check_id();
    // });

    // $('#index_item_add_nav_panel_title_name').on('keydown', function(e) {
    //     var code = e.keyCode || e.which;

    //     var index = $("#index_page_select").attr("index");
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
    //     var item = "nav";
        
    //     if(code == 16)
    //     {
    //         return false;
    //     }        
    //     else if(37 <=code && code <= 40)
    //     {
    //         return false;
    //     }
    //     else if(112 <=code && code <= 127)
    //     {
    //         return false;
    //     }
    //     else if(code == 46)
    //     {
    //         return false;
    //     }
    //     else if(code == 229)
    //     {
    //         // process
    //         return false;
    //     }
    //     else if(code == 17)
    //     {
    //         return false;
    //     }   
    //     else if(code == 8)
    //     {
    //         if($('#index_item_add_nav_panel_id').val().toLowerCase() == index.toLowerCase() + "_" + item + "_" + ($('#index_item_add_nav_panel_title_name').val() + $('#index_item_add_nav_panel_id').val()[$('#index_item_add_nav_panel_id').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_id').val(index + "_" + item + "_" + $('#index_item_add_nav_panel_title_name').val().toLowerCase());
    //         }
    //         if($('#index_item_add_nav_panel_url').val().toLowerCase() == ($('#index_item_add_nav_panel_title_name').val() + $('#index_item_add_nav_panel_url').val()[$('#index_item_add_nav_panel_url').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_url').val($('#index_item_add_nav_panel_title_name').val().toLowerCase());
    //         }
    //     }             
    //     else
    //     {   
    //         if($('#index_item_add_nav_panel_id').val().toLowerCase() == index.toLowerCase() + "_" + item + "_" + $('#index_item_add_nav_panel_title_name').val().toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_id').val(index + ("_" + item + "_" + $('#index_item_add_nav_panel_title_name').val() + e.key).toLowerCase());
    //         }
    //         if($('#index_item_add_nav_panel_url').val().toLowerCase() == $('#index_item_add_nav_panel_title_name').val().toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_url').val(($('#index_item_add_nav_panel_title_name').val() + e.key).toLowerCase());
    //         }
    //     }     
         
    // });
    // $('#index_item_add_nav_panel_title_name').on('keyup', function(e) {
    //     var code = e.keyCode || e.which;

    //     var index = $("#index_page_select").attr("index");
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
    //     var item = "nav";
        
    //     if(code == 16)
    //     {
    //         return false;
    //     }
    //     else if(code == 229)
    //     {
    //         // process
    //         return false;
    //     }
    //     else if(code == 17)
    //     {
    //         return false;
    //     }   
    //     else if(code == 8 || code == 46)
    //     {
    //         if($('#index_item_add_nav_panel_id').val().toLowerCase() == index + "_" + item + "_" + ($('#index_item_add_nav_panel_title_name').val() + $('#index_item_add_nav_panel_id').val()[$('#index_item_add_nav_panel_id').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_id').val(index + "_" + item + "_" + $('#index_item_add_nav_panel_title_name').val().toLowerCase());
    //         }
    //         if($('#index_item_add_nav_panel_url').val().toLowerCase() == ($('#index_item_add_nav_panel_title_name').val() + $('#index_item_add_nav_panel_url').val()[$('#index_item_add_nav_panel_url').val().length-1]).toLowerCase())
    //         {
    //             $('#index_item_add_nav_panel_url').val($('#index_item_add_nav_panel_title_name').val().toLowerCase());
    //         }
    //     }    
    //     else
    //     {
    //         return false;
    //     }             
    // });

    // $(".index_item_add_nav").click(function() {
    //     var index = $("#index_page_select").attr("index");
    //     var page = $("#index_page_select").find(":selected").attr("page");
    //     var page_name = $("#index_page_select").find(":selected").attr("name");
    //     var item = $("#index_item_select").find(":selected").attr("name");

    //     // alert($(window).width());
    //     // alert($(window).height());
    //     $("#index_item_add_nav_panel").css("left", ($(window).width() - $("#index_item_add_nav_panel").width()) / 2);
    //     $("#index_item_add_nav_panel").css("top", ($(window).height() - $("#index_item_add_nav_panel").height()) / 2);

    //     var id = "";
    //     if(page == "all"){
    //         $("#index_item_add_nav_panel_page").val("");
    //         id += "(page)";
    //     }
    //     else if(page == "index"){
    //         $("#index_item_add_nav_panel_page").val(index);
    //         id += index;
    //     }
    //     else if(page == "page"){
    //         $("#index_item_add_nav_panel_page").val(page_name);
    //         id += page_name;
    //     }

    //     if(id == ""){
    //         id += "nav";
    //     }
    //     else{
    //         id += "_" + "nav";
    //     }

    //     if(id == "" || index == "all"){
    //         id = "識別項 : index_xxx_xxx";
    //         $("#index_item_add_nav_panel_id").attr("placeholder", id);
    //     }
    //     else{
    //         id += "_";
    //         $("#index_item_add_nav_panel_id").val(id);
    //         $("#index_item_add_nav_panel_id").attr("placeholder", id);
    //     }
        

    //     $("#index_item_add_nav_panel_item").val("nav");

    //     $("#index_item_add_nav_panel_title").val("");
    //     $("#index_item_add_nav_panel_title_name").val("");
    //     $("#index_item_add_nav_panel_url").val("");

    //     $(".index_item_add_nav_panel_id_check").hide();
    //     $(".index_item_add_nav_panel_id_error").hide();

    //     $("#index_item_add_panel").hide();
    //     $("#index_item_add_index_panel").hide();
    //     $("#index_item_add_nav_panel").toggle();
        
    //     // var page = $("#index_page_select").find(":selected").attr("name");
    //     // var item = $("#index_item_select").find(":selected").attr("name");
        
    //     // if(page == "all" && item == "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create";
    //     // }
    //     // else if(page != "all" && item == "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page;
    //     // }
    //     // else if(page == "all" && item != "all"){
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?item=" + item;
    //     // }
    //     // else{
    //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page + "&item=" + item;
    //     // } 

    // });

    

    // $(".index_item_add_nav_panel_add").click(function() {
    //     add_nav_item();
    // });

    // $(".index_item_add_nav_panel_cancel").click(function() {
    //     $("#index_item_add_nav_panel").toggle();
    // });

    // $("#index_item_all_select").click(function(){
    //     var check = $(this).prop("checked");
    //     $.each($(".index_item_select"), function( index, value ) {                  
    //         $(value).prop("checked", check);
    //     });
    // });

    function item_select_delete(){
        var no = [];
        var item = {'temp': 'temp',
        };
        
        $.each($(".index_item"), function( index, value ) {  
            if($(this).find(".index_item_select").prop("checked")){
                no.push($(this).attr("item_no"));                
            }
        });
        
        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'select_delete',
                'item': item,
                'no': no,
			},
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    // layer.msg(
                    //     response.msg, 
                    //     {
                    //         icon: 6,
                    //         area: ['360px', '100px'],
                    //     }
                    // );
                    
                    // console.log($("#index_pic_board_select"));
                    $.each(no, function( index, value ) {                         
                        $(".index_item[item_no=" + value + "]").remove();
                    });
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
    }

    $(".index_item_select_delete").click(function() {        
        item_select_delete();
    });

    $(".index_item_select_delete1").click(function() {        
        item_select_delete();
    });

    function item_all_save(){
        var item = [];
        $.each($(".index_item"), function( index, value ) {  
            item.push(
                {
                    "order_": $(this).find(".index_item_order").val(),
                    "no": $(this).attr("item_no"),
                    "product": $(this).find(".index_item_product").val(),
                    "enabled": $(this).find(".index_item_enabled").prop("checked"),
                    "maintain": $(this).find(".index_item_maintain").prop("checked"),
                    "comment": $(this).find(".index_item_comment").val(),
                }
            );
        });

        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'all_save',
                'item': item,
			},
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    // layer.msg(
                    //     response.msg, 
                    //     {
                    //         icon: 6,
                    //         area: ['360px', '100px'],
                    //     }
                    // );

                    // console.log($("#index_pic_board_select"));
                    
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
    }

    $(".index_item_all_save").click(function() {
        item_all_save();
    });

    $(".index_item_all_save1").click(function() {
        item_all_save();
    });

    $(".index_item_all_refresh").click(function() {
        window.location.reload();
    });

    function change_order(no, item){
        $.ajax({
			type:"POST",
            url:"/backend/product/list/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'order',
                'item': item,
                'no': no,
			},
            success:function(response,status,xhr){  
                // console.log(response);                         
                if(response.status == 0){
                    // layer.msg(
                    //     response.msg, 
                    //     {
                    //         icon: 6,
                    //         area: ['360px', '100px'],
                    //     }
                    // );

                    // console.log($("#index_pic_board_select"));
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
    }

    $(".index_item .index_item_order").keyup(function() {  
        var no = $(this).parent().parent().attr("item_no");
        var item = {
            'order_': $(this).val(),
        };

        change_order(no, item);
    });

    // function index_item_panel_item_change(this_){
    //     var id = $(this_).parent().parent().parent().parent().parent().parent().parent().attr("item_no");
    //     var item = {
    //         "page": $(this_).parent().parent().parent().parent().parent().parent().parent().find(".index_item_page").val(),
    //         "item": $(this_).val(),
    //     };

    //     $.ajax({
	// 		type:"POST",
    //         url:"/backend/index/index/deal",
    //         data:{
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'page_item_no_update',
    //             'item': item,
    //             'id': id,
	// 		},
    //         success:function(response,status,xhr){  
    //             // console.log(response);                         
    //             if(response.status == 0){
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 6,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );

    //                 // console.log($("#index_pic_board_select"));
    //                 // alert(response.item['image']);
    //                 $(this_).parent().parent().parent().find(".index_item_panel_image").val(response.item['image']);
    //                 $(this_).parent().parent().parent().find(".index_item_panel_image_thumbnail").attr('src', new URL(response.item['image'], window.location.protocol + "//" + location.host));
    //                 $(this_).parent().parent().parent().parent().parent().parent().parent().find(".index_item_image_thumbnail").attr('src', new URL(response.item['image'], window.location.protocol + "//" + location.host));
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }                             
    //         },
    //         error:function(response,status,xhr){     
    //             // console.log(response);   
    //             if(response.status == 0){
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //             }
    //         },
    //     });
    // }
    // $(".index_item .index_item_panel_item").change(function() {
    //     index_item_panel_item_change(this);
    // });

    // function index_item_panel_image_refresh(id, item, this_){
    //     $.ajax({
	// 		type:"POST",
    //         url:"/backend/index/index/deal",
    //         data:{
    //             '_token': $("input[name=_token]").attr("value"),
    //             'deal': 'item',
    //             'method': 'image_refresh',
    //             'target': 'image',
    //             'item': item,
    //             'id': id,
	// 		},
    //         success:function(response,status,xhr){  
    //             // console.log(response);                         
    //             if(response.status == 0){
    //                 // layer.msg(
    //                 //     response.msg, 
    //                 //     {
    //                 //         icon: 6,
    //                 //         area: ['360px', '100px'],
    //                 //     }
    //                 // );
    //                 // alert(response.thumbnail);
    //                 // console.log($("#index_pic_board_select"));
                    
    //                 $(this_).parent().parent().parent().find(".index_item_panel_image_thumbnail").attr('src', new URL(response.thumbnail, window.location.protocol + "//" + location.host));
    //                 $(this_).parent().parent().parent().parent().parent().parent().parent().find(".index_item_image_thumbnail").attr('src', new URL(response.thumbnail, window.location.protocol + "//" + location.host));
                    
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //                 this.reset(false);
    //             }                             
    //         },
    //         error:function(response,status,xhr){     
    //             // console.log(response);   
    //             if(response.status == 0){
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //                 this.reset(false);
    //             }
    //             else{
    //                 layer.msg(
    //                     response.msg, 
    //                     {
    //                         icon: 5,
    //                         area: ['360px', '100px'],
    //                     }
    //                 );
    //                 this.reset(false);
    //             }
    //         },
    //     });
    // }

    // $(".index_item .index_item_panel_image_refresh").click(function() {  
    //     var id = $(this).parent().parent().parent().parent().parent().parent().parent().attr("item_no");
    //     var item = {
    //         'image': $(this).parent().parent().find(".index_item_panel_image").val(),
    //     };
    //     var this_ = this;
    //     index_item_panel_image_refresh(id, item, this_);
    // });

    

    
    // {
    //     // $.each($(".index_item .index_item_image_upload"), function( index, value ) {  
    //     //     var upload = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/deal";
    //     //     upload_file(upload, value, index);
    //     // });
         
    //     // var auto_complete_tag = [];        
    //     // $.each(item_list_, function( index, value ) { 
    //     //     if(value['item'] == index_){
    //     //         auto_complete_tag.push(value['item']);
    //     //         return false;
    //     //     } 
    //     // });      
    //     // $.each(item_list_, function( index, value ) { 
    //     //     if(value['item'] == "nav"){
    //     //         auto_complete_tag.push(value['item']);
    //     //         return false;
    //     //     } 
    //     // }); 
    //     // $.each(item_list_, function( index, value ) { 
    //     //     if(value['item'] == "pic_board"){
    //     //         auto_complete_tag.push(value['item']);
    //     //         return false;
    //     //     } 
    //     // }); 
    //     // $.each(item_list_, function( index, value ) { 
    //     //     if(value['item'] == index_){
    //     //         return;
    //     //     } 
    //     //     else  if(value['item'] == "nav"){
    //     //         return;
    //     //     }
    //     //     else if(value['item'] == "pic_board"){
    //     //         return;
    //     //     }
            
    //     //     auto_complete_tag.push(value['item']);
    //     // });

        
    //     // $.each($(".index_item_panel_item"), function( index, value ) {  
    //     //     $( value ).autocomplete({
    //     //         source: auto_complete_tag
    //     //     });
    //     // });
        
          
    // }   

    function item_delete(no){
        var item = {'temp': 'temp',
        };
        layer.confirm('你确定要删除這個項目吗？ - no : ' + no, {
            btn: ['确定','取消'] //按钮
        }, function(index){            
            layer.close(index);            
            /*layer.msg('的确很重要', {icon: 1});*/
            $.ajax({
                type:"POST",
                url:"/backend/product/list/delete/" + no,
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    // 'method': 'select_delete',
                    // 'item': item,
                    // 'id': id,
                },
                success:function(response,status,xhr){  
                    // console.log(response);  
                                      
                    if(response.status == 0){
                        // layer.msg(
                        //     response.msg, 
                        //     {
                        //         icon: 6,
                        //         area: ['360px', '100px'],
                        //     }
                        // );
                        
                        // console.log($("#index_pic_board_select"));
                        $(".index_item[item_no=" + no + "]").remove();
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
                    alert(2);    
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
        }, 
        function(){

        });
    }

    function item_edit(no){        
        // window.location.target="_blank";
        // window.location.href = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/" + id + "/edit";
        window.open(window.location.protocol + "//" + $(location).attr('host') + "/backend/product/list/edit/" + no, '_blank');

    }


    $(".index_item_delete").click(function() {        
        var no = $(this).attr("value");
        item_delete(no);
    });

    $(".index_item_edit").click(function() {
        var no = $(this).attr("value");
        item_edit(no);        
    });

    $(".index_item_panel_dir_enter").click(function() {    
        item_panel_dir_enter(this);        
    });
    
    function item_panel_dir_enter(this_){        
        // window.location.target="_blank";
        // window.location.href = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/" + id + "/edit";
        window.open($(this_).parent().parent().find(".index_item_panel_dir").val(), "");
        // alert($(this_).parent().parent().find(".index_item_panel_dir").val());    
    }

    function index_item_product_prepend_mouseenter(this_, panel){        
        if(is_in_iframe){
            if($(this_).offset().top - $(window).scrollTop() - $(panel).height() >= 0){
                panel.css("left", $(this_).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this_).width()) / 2) + "px";   
                panel.css("top", ($(this_).offset().top - $(window).scrollTop() - $(panel).height()) + "px");  
                flag = 0; 
            }
            else if($(this_).offset().top - $(window).scrollTop() + $(this_).height() + $(panel).height() < $(window).height()){                  
                panel.css("left", $(this_).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this_).width()) / 2) + "px";   
                panel.css("top", $(this_).offset().top - $(window).scrollTop() + $(this_).height()) + "px";  
                flag = 1;           
            }
        }
        else{
            if($(this_).offset().top - $(window).scrollTop() - $(panel).height() >= 0){
                panel.css("left", $(this_).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this_).width()) / 2) + "px";   
                panel.css("top", ($(this_).offset().top - $(window).scrollTop() - $(panel).height()) + "px");  
                flag = 0; 
            }
            else if($(this_).offset().top - $(window).scrollTop() + $(this_).height() + $(panel).height() < $(window).height()){                  
                panel.css("left", $(this_).offset().left - $(window).scrollLeft() - ($(panel).width() - $(this_).width()) / 2) + "px";   
                panel.css("top", $(this_).offset().top - $(window).scrollTop() + $(this_).height()) + "px";  
                flag = 1;           
            }
        }
        //alert(flag);
        panel.show();
    }

    function index_item_product_prepend_mouseleave(this_, event){
        e = event || window.event;
        // alert($(this_).offset().top - $(window).scrollTop());
        //alert(flag);
        if(is_in_iframe){
            if(flag == 0){
                if(e.clientY < $(this_).offset().top - $(window).scrollTop() && $(this_).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this_).offset().left - $(window).scrollLeft() + $(this_).width()))
                {}
                else{
                    $(this_).parent().find(".index_item_panel").hide();
                }
            }
            else if(flag == 1){
                if($(this_).offset().top - $(window).scrollTop() <= e.clientY && $(this_).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this_).offset().left - $(window).scrollLeft() + $(this_).width()))
                {}
                else{
                    $(this_).parent().find(".index_item_panel").hide();
                }
            }
        }
        else{
            if(flag == 0){
                if(e.clientY < $(this_).offset().top - $(window).scrollTop() && $(this_).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this_).offset().left - $(window).scrollLeft() + $(this_).width()))
                {}
                else{
                    $(this_).parent().find(".index_item_panel").hide();
                }
            }
            else if(flag == 1){
                if($(this_).offset().top - $(window).scrollTop() <= e.clientY && $(this_).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this_).offset().left - $(window).scrollLeft() + $(this_).width()))
                {}
                else{
                    $(this_).parent().find(".index_item_panel").hide();
                }
            }
        }
    }

    function index_item_panel_mouseleave(this_, div, event){
        e = event || window.event;
        // alert($(this_).offset().top - $(window).scrollTop());
        // alert(flag);
        if(is_in_iframe){
            if($(div).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(div).offset().top + $(div).height() - $(window).scrollTop() && $(div).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(this_).offset().left - $(window).scrollLeft() + $(this_).width()))
            {
                return;
            }
            if($(div).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(div).offset().top + $(div).height() - $(window).scrollTop() && $(div).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(div).offset().left - $(window).scrollLeft() + $(div).width()))
            {
                return;
            }
        }
        else{
            // alert($(div).offset().top - $(window).scrollTop() <= e.clientY);
            // alert($(window).scrollTop());
            // alert(e.clientY);
            // alert($(div).offset().top);
            // alert($(div).offset().top - $(window).scrollTop() <= e.clientY);
            if($(div).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(div).offset().top - $(window).scrollTop() + $(div).height() && $(div).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(div).offset().left - $(window).scrollLeft() + $(div).width()))
            {
                return;
            }
            if($(div).offset().top - $(window).scrollTop() <= e.clientY && e.clientY < $(div).offset().top + $(div).height() - $(window).scrollTop() && $(div).offset().left - $(window).scrollLeft() <= e.clientX && e.clientX < ($(div).offset().left - $(window).scrollLeft() + $(div).width()))
            {
                return;
            }
        }
        
        $(this_).hide();
    }
   

    $(".list_tab tr input[name=checkbox]").labelauty(); 

    {
        $(".index_item .index_item_product_prepend").mouseenter(function(){            
            var panel = $(this).parent().find(".index_item_panel");
            index_item_product_prepend_mouseenter(this, panel);            
        });
        $(".index_item .index_item_product_prepend").mouseleave(function(event){
            index_item_product_prepend_mouseleave(this, event);
        });
        var panel_ok = false;
        $(".index_item .index_item_panel").mouseleave(function(event){
            var index =  $(this).parent().parent().parent().attr("index");
            // alert("#ui-id-" + (index + 1));
            var div = $(this).parent().find(".index_item_panel");
            // var div = $("#ui-id-" + (parseInt(index) + 1));
            // alert(div)
            var this_ = this;
            div.mouseleave(function(event){
                index_item_panel_mouseleave(this_, div, event);
            });
            index_item_panel_mouseleave(this_, div, event);
        });

        $(window).scroll(function() {            
            $(".index_item .index_item_panel").hide();
        });
    }

    $(".index_item_advance").click(function(){
        $(".index_item_advance_page").toggle();
    });
    // $(".index_item_save").click(function(){
    //     sessionStorage.item_describe = $(".index_item_item_describe").val();        
    // });
    // //sessionStorage.clear();
     
    // if(sessionStorage.item_describe){
    //     $(".index_item_item_describe").val(sessionStorage.item_describe);
        
    // }
    // else{
    //     sessionStorage.item_describe = "default: ;\n----------------------------------------------------\n";
    //     $(".index_item_item_describe").val(sessionStorage.item_describe);
    // }
    
    $(window).resize(function(){
        $("#index_item_add_panel").css("left", ($(window).width() - $("#index_item_add_panel").width()) / 2);
        $("#index_item_add_panel").css("top", ($(window).height() - $("#index_item_add_panel").height()) / 2);
        $("#index_item_add_index_panel").css("left", ($(window).width() - $("#index_item_add_index_panel").width()) / 2);
        $("#index_item_add_index_panel").css("top", ($(window).height() - $("#index_item_add_index_panel").height()) / 2);
        $("#index_item_add_nav_panel").css("left", ($(window).width() - $("#index_item_add_nav_panel").width()) / 2);
        $("#index_item_add_nav_panel").css("top", ($(window).height() - $("#index_item_add_nav_panel").height()) / 2);
    });
    
});