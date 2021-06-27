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
    var iframe2_ = [];
    var wrap_content1_ = [];
    var wrap_content2_ = [];
    $.each(iframe_, function(key, value){
        value.onload = function(){    
            setIframeHeight($(value).attr("id"));   
            
            var ifrm = value;
            var doc = ifrm.contentDocument? ifrm.contentDocument: 
                ifrm.contentWindow.document;
            wrap_content1_[key] = $(doc).find(".wrap_content"); 
            iframe2_[key] = $(doc).find(".content_frame"); 
            $.each(iframe2_[key], function(key2, value2){
                var ifrm2 = value2;
                var doc2 = ifrm2.contentDocument? ifrm2.contentDocument: 
                    ifrm2.contentWindow.document;
                // 只有一個wrap_content
                wrap_content2_[key2] = $(doc2).find(".wrap_content"); 
                iframe_.loaded = 1;   
            });

        };  
    });
    
    $(window).resize(function(){       
        $.each(iframe_, function(key, value){
            var ifrm = value;
            $scrollHor=$(window).scrollTop(); 
            $.each(iframe2_[key], function(key2, value2){
                var ifrm2 = value2;
                ifrm2.style.height = wrap_content2_[key2].height() + "px";  
            });
            ifrm.style.height =  wrap_content1_[key].height() + "px";    
            $(window).scrollTop($scrollHor); 
        });
    });
});


function sort_element(container, item, attr)
{
    // http://trentrichardson.com/2013/12/16/sort-dom-elements-jquery/
    item.sort(function(a,b){
        var an = a.getAttribute(attr),
            bn = b.getAttribute(attr);

        if(parseInt(an) > parseInt(bn)) {
            return 1;
        }
        if(parseInt(an) < parseInt(bn)) {
            return -1;
        }
        return 0;
    });
    item.detach().appendTo(container);
}

function sort_element_index_first(container, item, attr)
{
    // http://trentrichardson.com/2013/12/16/sort-dom-elements-jquery/
    item.sort(function(a,b){
        var an = a.getAttribute(attr),
            bn = b.getAttribute(attr);
        if(a.getAttribute("name") == "index"){
            return -1;    
        }
        if(parseInt(an) > parseInt(bn)) {
            return 1;
        }
        if(parseInt(an) < parseInt(bn)) {
            return -1;
        }
        return 0;
    });
    item.detach().appendTo(container);
}

$(function(){   
    // upload
    var index_pic_board_title_image_upload;
    var index_pic_board_image_upload;
    var index_nav_title_image_upload;
    var index_nav_image_upload;
    var index_pic_board_title_image_upload_success = 0;
    var index_pic_board_image_upload_success = 0;
    var index_nav_title_image_upload_success = 0;
    var index_nav_image_upload_success = 0;
    //







    var page = $("#index_page_select option:selected").attr("name");
    // sort_element_index_first($("#index_page_select"), $("#index_page_select option"), "order");      
    // $("#index_page_select option[name='" + page + "']")[0].selected = true;

    sort_element($("#index_pic_board_select"), $("#index_pic_board_select option"), "order");   
    sort_element($("#index_nav_select"), $("#index_nav_select option"), "order");    

    $("#index_page_select").change(function() {
        var web = $(this).find(":selected").attr("name");
        // alert($(location).attr('host') + "/" + web);
        window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/initial/" + web;
    });
    
    $("#index_pic_board_select").change(function() {
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "title_name":$("#index_pic_board_select option:selected").attr("name"),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'select',
                "item":item,
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
                    // console.log(response);  
                    $("#index_pic_board_order").val(response.find["order_"]);
                    $("#index_pic_board_id").val(response.find["id"]);
                    $("#index_pic_board_title").val(response.find["title"]);
                    $("#index_pic_board_title_name").val(response.find["title_name"]);
                    $("#index_pic_board_title_image").val(response.find["title_image"]);
                    $("#index_pic_board_image").val(response.find["image"]);
                    $("#index_pic_board_url").val(response.find["url"]);

                    $("#index_pic_board_title_image_thumbnail").attr('src', new URL(response.find["title_image"], window.location.protocol + "//" + location.host));
                    $("#index_pic_board_image_thumbnail").attr('src', new URL(response.find["image"], window.location.protocol + "//" + location.host));
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
    $("#index_pic_board_add").click(function(){
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "order_":$("#index_pic_board_order").val(),
            "id":$("#index_pic_board_id").val(),
            "title":$("#index_pic_board_title").val(),
            "title_name":$("#index_pic_board_title_name").val(),
            "title_image":$("#index_pic_board_title_image").val(),
            "image":$("#index_pic_board_image").val(),
            "url":$("#index_pic_board_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'add',
                "item":item,
                "title_image_upload":index_pic_board_title_image_upload_success,
                "image_upload":index_pic_board_image_upload_success,
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
                    $("#index_pic_board_select").append(
                        "<option name=" + item['title_name'] + " order=" + item['order_'] + ">" + item['order_'] + " - " + item['title_name'] + " - url : " + item['url'] + "</option>"
                    ); 
    
                    // console.log($("#index_pic_board_select"));
                    sort_element($("#index_pic_board_select"), $("#index_pic_board_select option"), "order");   

                    index_pic_board_title_image_upload.reset(false);
                    index_pic_board_image_upload.reset(false);
                    $("#index_pic_board_order").val("0");
                    $("#index_pic_board_id").val(item['page'] + "_" + item['item'] + "_");
                    $("#index_pic_board_title").val("");
                    $("#index_pic_board_title_name").val("");
                    $("#index_pic_board_title_image").val("");
                    $("#index_pic_board_title_image_thumbnail").attr('src', "");
                    $("#index_pic_board_image").val("");
                    $("#index_pic_board_image_thumbnail").attr('src', "");
                    $("#index_pic_board_url").val("");

                    index_pic_board_title_image_upload_success = 0;
                    index_pic_board_image_upload_success = 0;
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
    $("#index_pic_board_delete").click(function(){
        var selectIndex = $("#index_pic_board_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "title_name":$("#index_pic_board_select option:selected").attr("name"),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'delete',
                "item":item,
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
                    // console.log(response);  
                    var selectIndex = $("#index_pic_board_select option:selected").index();   
                    $($('#index_pic_board_select option').get(selectIndex)).remove();    
                    if (selectIndex >= $('#index_pic_board_select option').length){
                        if(selectIndex - 1 > 0){
                            $("#index_pic_board_select option").get(selectIndex - 1).selected = true; 
                            $("#index_pic_board_select").change();
                        } 
                    }
                    else{
                        $("#index_pic_board_select option").get(selectIndex).selected = true;  
                        $("#index_pic_board_select").change();
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
    });
    $("#index_pic_board_update").click(function(){
        var selectIndex = $("#index_pic_board_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var select = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "title_name":$("#index_pic_board_select option:selected").attr("name"),
        };
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "order_":$("#index_pic_board_order").val(),
            "id":$("#index_pic_board_id").val(),
            "title":$("#index_pic_board_title").val(),
            "title_name":$("#index_pic_board_title_name").val(),
            "title_image":$("#index_pic_board_title_image").val(),
            "image":$("#index_pic_board_image").val(),
            "url":$("#index_pic_board_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'update',
                "select":select,
                "item":item,
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
                    
                    var selectIndex = $("#index_pic_board_select option:selected").index();  
                    $($('#index_pic_board_select option').get(selectIndex)).attr("name", item['title_name']);
                    $($('#index_pic_board_select option').get(selectIndex)).attr("order", item['order_']);
                    $($('#index_pic_board_select option').get(selectIndex)).text(
                        item['order_'] + " - " + item['title'] + " - url : " + item['url']
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
    $("#index_pic_board_order").keyup(function(){
        var selectIndex = $("#index_pic_board_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var select = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "title_name":$("#index_pic_board_select option:selected").attr("name"),
        };
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"pic_board",
            "order_":$("#index_pic_board_order").val(),
            "id":$("#index_pic_board_id").val(),
            "title":$("#index_pic_board_title").val(),
            "title_name":$("#index_pic_board_title_name").val(),
            "title_image":$("#index_pic_board_title_image").val(),
            "image":$("#index_pic_board_image").val(),
            "url":$("#index_pic_board_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'order',
                "select":select,
                "item":item,
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
                    var selectIndex = $("#index_pic_board_select option:selected").index();  
                    $($('#index_pic_board_select option').get(selectIndex)).attr("order",  response.find['order_']);
                    $($('#index_pic_board_select option').get(selectIndex)).text(
                        response.find['order_'] + " - " + response.find['title'] + " - url : " + response.find['url']
                    );
                    sort_element($("#index_pic_board_select"), $("#index_pic_board_select option"), "order"); 
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
    $("#index_nav_select").change(function() {
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "title_name":$("#index_nav_select option:selected").attr("name"),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'select',
                "item":item,
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
                    // console.log(response);  
                    $("#index_nav_order").val(response.find["order_"]);
                    $("#index_nav_id").val(response.find["id"]);
                    $("#index_nav_title").val(response.find["title"]);
                    $("#index_nav_title_name").val(response.find["title_name"]);
                    $("#index_nav_title_image").val(response.find["title_image"]);
                    $("#index_nav_image").val(response.find["image"]);
                    $("#index_nav_url").val(response.find["url"]);

                    $("#index_nav_title_image_thumbnail").attr('src', new URL(response.find["title_image"], window.location.protocol + "//" + location.host));
                    $("#index_nav_image_thumbnail").attr('src', new URL(response.find["image"], window.location.protocol + "//" + location.host));
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
    $("#index_nav_add").click(function(){
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "order_":$("#index_nav_order").val(),
            "id":$("#index_nav_id").val(),
            "title":$("#index_nav_title").val(),
            "title_name":$("#index_nav_title_name").val(),
            "title_image":$("#index_nav_title_image").val(),
            "image":$("#index_nav_image").val(),
            "url":$("#index_nav_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'add',
                "item":item,
                "title_image_upload":index_nav_title_image_upload_success,
                "image_upload":index_nav_image_upload_success,
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
                    $("#index_page_select").append(
                        "<option name=" + item['title_name'] + " order=" + item['order_'] + ">" + item['title'] + "</option>"
                    ); 
                    $("#index_nav_select").append(
                        "<option name=" + item['title_name'] + " order=" + item['order_'] + ">" + item['order_'] + " - " + item['title'] + " - url : " + item['url'] + "</option>"
                    ); 
    
                    // console.log($("#index_nav_select"));
                    var name = $("#index_page_select option:selected").attr("name");
                    sort_element_index_first($("#index_page_select"), $("#index_page_select option"), "order");      
                    $("#index_page_select option[name='"+name+"']")[0].selected = true;
                    sort_element($("#index_nav_select"), $("#index_nav_select option"), "order");   

                    index_nav_title_image_upload.reset(false);
                    index_nav_image_upload.reset(false);
                    $("#index_nav_order").val("0");
                    $("#index_nav_id").val(item['page'] + "_" + item['item'] + "_");
                    $("#index_nav_title").val("");
                    $("#index_nav_title_name").val("");
                    $("#index_nav_title_image").val("");
                    $("#index_nav_title_image_thumbnail").attr('src', "");
                    $("#index_nav_image").val("");
                    $("#index_nav_image_thumbnail").attr('src', "");
                    $("#index_nav_url").val("");
                    
                    index_nav_title_image_upload_success = 0;
                    index_nav_image_upload_success = 0;
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
    $("#index_nav_delete").click(function(){
        var selectIndex = $("#index_nav_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "title_name":$("#index_nav_select option:selected").attr("name"),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'delete',
                "item":item,
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
                    // console.log(response);  
                    var selectIndex = $("#index_nav_select option:selected").index();   
                    $($('#index_nav_select option').get(selectIndex)).remove();    
                    if (selectIndex >= $('#index_nav_select option').length){
                        if(selectIndex - 1 > 0){
                            $("#index_nav_select option").get(selectIndex - 1).selected = true; 
                            $("#index_nav_select").change();
                        } 
                    }
                    else{
                        $("#index_nav_select option").get(selectIndex).selected = true; 
                        $("#index_nav_select").change();
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
    });
    $("#index_nav_update").click(function(){
        var selectIndex = $("#index_nav_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var select = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "title_name":$("#index_nav_select option:selected").attr("name"),
        };
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "order_":$("#index_nav_order").val(),
            "id":$("#index_nav_id").val(),
            "title":$("#index_nav_title").val(),
            "title_name":$("#index_nav_title_name").val(),
            "title_image":$("#index_nav_title_image").val(),
            "image":$("#index_nav_image").val(),
            "url":$("#index_nav_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'update',
                "select":select,
                "item":item,
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
                    
                    var selectIndex = $("#index_nav_select option:selected").index();  
                    $($('#index_nav_select option').get(selectIndex)).attr("name", item['title_name']);
                    $($('#index_nav_select option').get(selectIndex)).attr("order", item['order_']);
                    $($('#index_nav_select option').get(selectIndex)).text(
                        item['order_'] + " - " + item['title'] + " - url : " + item['url']
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
    $("#index_nav_order").keyup(function(){
        var selectIndex = $("#index_nav_select option:selected").index();   
        if(selectIndex < 0){
            return;
        }

        var select = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "title_name":$("#index_nav_select option:selected").attr("name"),
        };
        var item = {
            "page":$("#index_page_select").find(":selected").attr("name"),
            "item":"nav",
            "order_":$("#index_nav_order").val(),
            "id":$("#index_nav_id").val(),
            "title":$("#index_nav_title").val(),
            "title_name":$("#index_nav_title_name").val(),
            "title_image":$("#index_nav_title_image").val(),
            "image":$("#index_nav_image").val(),
            "url":$("#index_nav_url").val(),
        };
        $.ajax({
			type:"POST",
            url:"/backend/index/initial",
            data:{
                '_token':$("input[name=_token]").attr("value"),
                'method':'order',
                "select":select,
                "item":item,
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
                    var selectIndex = $("#index_nav_select option:selected").index();  
                    $($('#index_nav_select option').get(selectIndex)).attr("order",  response.find['order_']);
                    $($('#index_nav_select option').get(selectIndex)).text(
                        response.find['order_'] + " - " + response.find['title'] + " - url : " + response.find['url']
                    );
                    sort_element($("#index_nav_select"), $("#index_nav_select option"), "order"); 
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

    //
    //获取字符编码
    // http://www.cnblogs.com/leolai/archive/2012/08/01/2618386.html
    var getCharCode = function(event){
        var charcode = event.charCode;
        if(typeof charcode == "number" && charcode != 0){
            return charcode;
        }else{
            //在中文输入法下 keyCode == 229 || keyCode == 197(Opera)
            return event.keyCode;
        }
    };

    // code 299事件無法處理
    // https://segmentfault.com/a/1190000008363836
    $('#index_nav_title_name').on('keydown', function(e) {
        var code = e.keyCode || e.which;
        // https://github.com/select2/select2/issues/2482

        if(code == 16)
        {
            return false;
        }
        else if(37 <= code && code <= 40)
        {
            return false;
        }
        else if(code == 229)
        {            
            return false;
        }
        else if(112 <= code && code <= 127)
        {
            return false;
        }
        else if(code == 17)
        {
            return false;
        }
        else if(code == 46)
        {
            return false;
        }
        else if(code == 8)
        {
            if($('#index_nav_id').val().toLowerCase() == page.toLowerCase() + "_nav_" + ($('#index_nav_title_name').val() + $('#index_nav_id').val()[$('#index_nav_id').val().length-1]).toLowerCase())
            {
                $('#index_nav_id').val(page + "_nav_" + $('#index_nav_title_name').val().toLowerCase());
            }
            if($('#index_nav_url').val().toLowerCase() == ($('#index_nav_title_name').val() + $('#index_nav_url').val()[$('#index_nav_url').val().length-1]).toLowerCase())
            {
                $('#index_nav_url').val($('#index_nav_title_name').val().toLowerCase());
            }
        }    
        else
        {
            if($('#index_nav_id').val().toLowerCase() == page.toLowerCase() + "_nav_" + $('#index_nav_title_name').val().toLowerCase())
            {
                $('#index_nav_id').val(page + ("_nav_" + $('#index_nav_title_name').val() + e.key).toLowerCase());
            }
            if($('#index_nav_url').val().toLowerCase() == $('#index_nav_title_name').val().toLowerCase())
            {
                $('#index_nav_url').val(($('#index_nav_title_name').val() + e.key).toLowerCase());
            }
        }     
        
  
    });


    $('#index_nav_title_name').on('keyup', function(e) {
        var code = e.keyCode || e.which;
        
        if(code == 16)
        {
            return false;
        }
        else if(code == 229)
        {
            // process
            return false;
        }
        else if(code == 17)
        {
            return false;
        }    
        else if(code == 8 || code == 46)
        {
            if($('#index_nav_id').val().toLowerCase() == page + "_nav_" + ($('#index_nav_title_name').val() + $('#index_nav_id').val()[$('#index_nav_id').val().length-1]).toLowerCase())
            {
                $('#index_nav_id').val(page + "_nav_" + $('#index_nav_title_name').val().toLowerCase());
            }
            if($('#index_nav_url').val().toLowerCase() == ($('#index_nav_title_name').val() + $('#index_nav_url').val()[$('#index_nav_url').val().length-1]).toLowerCase())
            {
                $('#index_nav_url').val($('#index_nav_title_name').val().toLowerCase());
            }
        }  
        else
        {
            return false;
        }         
    });
    $('#index_pic_board_title_name').on('keydown', function(e) {
        var code = e.keyCode || e.which;
        
        if(code == 16)
        {
            return false;
        }        
        else if(37 <=code && code <= 40)
        {
            return false;
        }
        else if(112 <=code && code <= 127)
        {
            return false;
        }
        else if(code == 46)
        {
            return false;
        }
        else if(code == 229)
        {
            // process
            return false;
        }
        else if(code == 17)
        {
            return false;
        }   
        else if(code == 8)
        {
            if($('#index_pic_board_id').val().toLowerCase() == page.toLowerCase() + "_pic_board_" + ($('#index_pic_board_title_name').val() + $('#index_pic_board_id').val()[$('#index_pic_board_id').val().length-1]).toLowerCase())
            {
                $('#index_pic_board_id').val(page + "_pic_board_" + $('#index_pic_board_title_name').val().toLowerCase());
            }
            if($('#index_pic_board_url').val().toLowerCase() == ($('#index_pic_board_title_name').val() + $('#index_pic_board_url').val()[$('#index_pic_board_url').val().length-1]).toLowerCase())
            {
                $('#index_pic_board_url').val($('#index_pic_board_title_name').val().toLowerCase());
            }
        }             
        else
        {   
            if($('#index_pic_board_id').val().toLowerCase() == page.toLowerCase() + "_pic_board_" + $('#index_pic_board_title_name').val().toLowerCase())
            {
                $('#index_pic_board_id').val(page + ("_pic_board_" + $('#index_pic_board_title_name').val() + e.key).toLowerCase());
            }
            if($('#index_pic_board_url').val().toLowerCase() == $('#index_pic_board_title_name').val().toLowerCase())
            {
                $('#index_pic_board_url').val(($('#index_pic_board_title_name').val() + e.key).toLowerCase());
            }
        }     
         
    });
    $('#index_pic_board_title_name').on('keyup', function(e) {
        var code = e.keyCode || e.which;
        
        if(code == 16)
        {
            return false;
        }
        else if(code == 229)
        {
            // process
            return false;
        }
        else if(code == 17)
        {
            return false;
        }   
        else if(code == 8 || code == 46)
        {
            if($('#index_pic_board_id').val().toLowerCase() == page + "_pic_board_" + ($('#index_pic_board_title_name').val() + $('#index_pic_board_id').val()[$('#index_pic_board_id').val().length-1]).toLowerCase())
            {
                $('#index_pic_board_id').val(page + "_pic_board_" + $('#index_pic_board_title_name').val().toLowerCase());
            }
            if($('#index_pic_board_url').val().toLowerCase() == ($('#index_pic_board_title_name').val() + $('#index_pic_board_url').val()[$('#index_pic_board_url').val().length-1]).toLowerCase())
            {
                $('#index_pic_board_url').val($('#index_pic_board_title_name').val().toLowerCase());
            }
        }    
        else
        {
            return false;
        }             
    });


    var upload = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/initial";
    {
        var item = {
            "page": $("#index_page_select").find(":selected").attr("name"),
            "item": "pic_board",
            "id": $("#index_pic_board_id").val(),
            "target": "title_image",
        };
        // http://hayageek.com/docs/jquery-upload-file.php#doc
        index_pic_board_title_image_upload = $("#index_pic_board_title_image_upload").uploadFile({
            url: upload,
            fileName: "index_file",
            onSuccess:function(files, data, xhr, pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");                    
                }
                $("#index_pic_board_title_image").val(data['image']);
                $("#index_pic_board_title_image_thumbnail").attr('src', new URL(data['thumbnail'], window.location.protocol + "//" + location.host));
                index_pic_board_title_image_upload_success = 1;
            },   
            showQueueDiv: "index_pic_board_title_image_output",                      
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'method': 'upload',
                'item': item,
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }
    
    {
        var item = {
            "page": $("#index_page_select").find(":selected").attr("name"),
            "item": "pic_board",
            "id": $("#index_pic_board_id").val(),
            "target": "image",
        };
        index_pic_board_image_upload = $("#index_pic_board_image_upload").uploadFile({
            url: upload,
            fileName: "index_file",
            onSuccess:function(files, data, xhr, pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }     
                $("#index_pic_board_image").val(data['image']);
                $("#index_pic_board_image_thumbnail").attr('src', new URL(data['thumbnail'], window.location.protocol + "//" + location.host));  
                index_pic_board_image_upload_success = 1;      
            },  
            showQueueDiv: "index_pic_board_image_output",                                        
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'method': 'upload',
                'item': item,
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }
    
    {
        var item = {
            "page": $("#index_page_select").find(":selected").attr("name"),
            "item": "nav",
            "id": $("#index_nav_id").val(),
            "target": "title_image",
        };
        index_nav_title_image_upload = $("#index_nav_title_image_upload").uploadFile({
            url: upload,
            fileName: "index_file",
            onSuccess:function(files,data,xhr,pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }        
                $("#index_nav_title_image").val(data['image']);
                $("#index_nav_title_image_thumbnail").attr('src', new URL(data['thumbnail'], window.location.protocol + "//" + location.host));    
                
                index_nav_title_image_upload_success = 1;
            },      
            showQueueDiv: "index_nav_title_image_output",                                    
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'method': 'upload',
                'item': item,
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }
    
    { 
        var item = {
            "page": $("#index_page_select").find(":selected").attr("name"),
            "item": "nav",
            "id": $("#index_nav_id").val(),
            "target": "image",
        };
        index_nav_image_upload = $("#index_nav_image_upload").uploadFile({
            url:upload,
            fileName: "index_file",
            onSuccess:function(files, data, xhr, pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }
                $("#index_nav_image").val(data['image']);
                $("#index_nav_image_thumbnail").attr('src', new URL(data['thumbnail'], window.location.protocol + "//" + location.host));

                index_nav_image_upload_success = 1;
            },   
            showQueueDiv: "index_nav_image_output",                                       
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'method': 'upload',
                'item': item,
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }
    

});