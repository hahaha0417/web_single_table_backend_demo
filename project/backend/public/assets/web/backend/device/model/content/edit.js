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
    // http://www.grotte-de-han.be/web/bundles/snowcapadmin/vendor/ckeditor/samples/plugins/wysiwygarea/fullpage.html
    // https://ciao-chung.com/article/1552973657333184
    // https://stackoverflow.com/questions/17589747/adding-fontawesome-to-ckeditor?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    // FontAwesome
    // * https://ckeditor.com/cke4/addon/fontawesome
    
    CKEDITOR.editorConfig = function( config ) { 
        // config.allowedContent = true;    
        // config.format_tags = 'p;h1;h2;h3;pre;div;h4;h5';
        // --------------------------------------------------------------------------  
        // 這寫在這裡沒用，要去修改config.js  
        // config.extraPlugins = 'fontawesome';
        // config.contentsCss = ["/assets/plugin/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css"];
        // config.entities = true;
        // config.toolbar = [
        //     { name: 'insert', items: [ 'FontAwesome', 'Source' ] }
        // ];
        // --------------------------------------------------------------------------  
        
    };
    
    CKEDITOR.dtd.$removeEmpty['span'] = false;
    CKEDITOR.dtd.$removeEmpty['i'] = false;	
    // 這不對
    // var url_fontawesome = new URL("assets/plugin/ckeditor/plugins/font-awesome/font-awesome/css/font-awesome.min.css", window.location.protocol + "//" + location.host);
    // 
    var editor_describe = CKEDITOR.replace('index_item_describe', 
        {
            allowedContent : true,    
            format_tags : 'h1;h2;h3;pre;div;h4;h5',   
            // 不可空格
            extraPlugins : 'fontawesome,youtube',              
            contentsCss : ["/assets/plugin/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css"],
            entities : true,
            //
        }
    );
    var editor_content = CKEDITOR.replace('index_item_content', 
        {
            allowedContent : true,    
            format_tags : 'h1;h2;h3;pre;div;h4;h5',   
            // 不可空格
            extraPlugins : 'fontawesome,youtube',              
            contentsCss : ["/assets/plugin/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css"],
            entities : true,
            //
            
        }
    );   
    var editor_item_content1 = CKEDITOR.replace('index_item_item_content1', 
        {
            allowedContent : true,    
            format_tags : 'h1;h2;h3;pre;div;h4;h5',   
            // 不可空格
            extraPlugins : 'fontawesome,youtube',              
            contentsCss : ["/assets/plugin/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css"],
            entities : true,
            //
           
        }
    );  
    var editor_item_content2 = CKEDITOR.replace('index_item_item_content2', 
        {
            allowedContent : true,    
            format_tags : 'h1;h2;h3;pre;div;h4;h5',   
            // 附加plugin用這裡
            // 不可空格
            extraPlugins : 'fontawesome,youtube',            
            contentsCss : ["/assets/plugin/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css"],
            entities : true,
            //
           
        }
    );  
    
    editor_describe.config.resize_enabled = false;
    editor_describe.config.width = '800px';
    editor_describe.config.height = '100px';

    editor_content.config.resize_enabled = false;
    editor_content.config.width = '800px';
    editor_content.config.height = '400px';

    editor_item_content1.config.resize_enabled = false;
    editor_item_content1.config.width = '800px';
    editor_item_content1.config.height = '500px';

    editor_item_content2.config.resize_enabled = false;
    editor_item_content2.config.width = '800px';
    editor_item_content2.config.height = '500px';
 
    // upload
    var index_item_title_image_upload;
    var index_item_image_upload;
    // var index_item_item_image_upload;
    //
    var items = [];
    var item_item_index = 0;

    function sort_element_by_items_order_item(container, item, attr)
    {
        // http://trentrichardson.com/2013/12/16/sort-dom-elements-jquery/
        item.sort(function(a,b){
            var an = a.getAttribute(attr),
                bn = b.getAttribute(attr);
            
            if(parseInt(items[an]['order_']) > parseInt(items[bn]['order_'])) {
                return 1;
            }
            if(parseInt(items[an]['order_']) < parseInt(items[bn]['order_'])) {
                return -1;
            }
            if(parseInt(items[an]['order_']) == parseInt(items[bn]['order_'])) {
                if(items[an]['item'].localeCompare(items[bn]['item']) > 0){
                    return 1;
                }
                else{
                    return -1;
                }   
            }
            
            return 0;
        });
        item.detach().appendTo(container);
    }

    var dir_ = "";
    for(var i = 0; i < index_dir_.length; ++i){
        if(index_dir_ == "all"){
            break;
        }
        dir_ += index_dir_[i] + "/";
    }
    dir_ += "model/" + index_model_;

    var upload = window.location.protocol + "//" + $(location).attr('host') + "/backend/device/" + dir_ + "/content/" + index_page_ + "/deal";
    {
        index_item_title_image_upload = $("#index_item_title_image_upload").uploadFile({
            url: upload,
            fileName: "index_file",
            onSuccess:function(files,data,xhr,pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }     
                $("#index_item_title_image").val(data['image']);
                $("#index_item_title_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));  
                index_item_title_image_upload.reset();
            },                
            showQueueDiv: "index_item_title_image_output",                                    
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'upload',
                'target': 'title_image',
                'item': {
                    "page": $("#unique_item").attr("unique_page"),
                    "item": $("#unique_item").attr("unique_item"),
                    "id": $("#unique_item").attr("unique_id"),
                },
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }   
    {
        index_item_image_upload = $("#index_item_image_upload").uploadFile({
            url: upload,
            fileName: "index_file",
            onSuccess:function(files,data,xhr,pd)
            {
                if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
                {
                    setParentIframeHeight("index_content_frame");
                }     
                $("#index_item_image").val(data['image']);
                $("#index_item_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));  
                index_item_image_upload.reset();
            },      
            showQueueDiv: "index_item_image_output",                                    
            formData     : {
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item',
                'method': 'upload',
                'target': 'image',
                'item': {
                    "page": $("#unique_item").attr("unique_page"),
                    "item": $("#unique_item").attr("unique_item"),
                    "id": $("#unique_item").attr("unique_id"),
                },
            },
            multiple: false,
            maxFileCount: 1,
            maxFileSize: 20*1024*1024,
        });
    }  
    // {
    //     index_item_item_image_upload = $("#index_item_item_image_upload").uploadFile({
    //         url: upload,
    //         fileName: "index_file",
    //         onSuccess:function(files,data,xhr,pd)
    //         {
    //             if($(parent.document) && $(parent.document).find("#index_content_frame").get(0))
    //             {
    //                 setParentIframeHeight("index_content_frame");
    //             }     
                
    //             $("#index_item_item_image").val(data['image']);
    //             $("#index_item_item_image_thumbnail").attr('src', new URL(data['image'], window.location.protocol + "//" + location.host));  
    //             var index = $($("#index_item_item_select").find(":selected")).attr("index");  
    //             var selectIndex = $($("#index_item_item_select").find(":selected")).index();  
    //             items[index]['image'] = data['image'];
    //             index_item_item_image_upload.reset();
    //         }, 
    //         dynamicFormData: function()
    //         {
    //             //var data ="XYZ=1&ABCD=2";
    //             var item = {
    //                 "page": $("#unique_item").attr("unique_page"),
    //                 "item": $("#unique_item").attr("unique_item"),
    //                 "id": $("#unique_item").attr("unique_id"),
    //             };
    //             var no = $("#index_item_item_select").find(":selected").attr("no_");         
    //             var item_item = {
    //                 "no": no,
    //             };
    //             var data = {
    //                 '_token': $("input[name=_token]").attr("value"),
    //                 'deal': 'item_item',
    //                 'method': 'upload',
    //                 'target': 'image',
    //                 'item': item,
    //                 'item_item': item_item,
    //             };
    //             return data;        
    //         },  
    //         onSubmit:function(files)
    //         {
    //             // files[0].name;
    //             // files[0].size;
    //             var selectIndex = $($("#index_item_item_select").find(":selected")).index();  
                                
    //             if(selectIndex < 0){
    //                 index_item_item_image_upload.reset();  
    //                 return false;
    //             }
    //         },   
    //         showQueueDiv: "index_item_item_image_output", 
    //         multiple: false,
    //         maxFileCount: 1,
    //         maxFileSize: 20*1024*1024,
    //     });
    // }  
    {   
        var page_auto_complete_tag_use = [];        
        $.each(page_auto_complete_tag, function( index, value ) { 
            page_auto_complete_tag_use.push(value['page']);
        }); 
        $("#index_item_page").autocomplete({
            source: page_auto_complete_tag_use
        });
    }
    {
        var item_auto_complete_tag_use = [];        
        $.each(item_auto_complete_tag, function( index, value ) { 
            if(value['item'] == "nav"){
                item_auto_complete_tag_use.push(value['item']);
                return false;
            } 
        }); 
        $.each(item_auto_complete_tag, function( index, value ) { 
            if(value['item'] == "pic_board"){
                item_auto_complete_tag_use.push(value['item']);
                return false;
            } 
        }); 
        $.each(item_auto_complete_tag, function( index, value ) {             
            if(value['item'] == "nav"){
                return;
            }
            else if(value == "pic_board"){
                return;
            }
            item_auto_complete_tag_use.push(value['item']);
        });

        $("#index_item_item").autocomplete({
            source: item_auto_complete_tag_use
        });
    }
    {
        $("#index_item_image_refresh").click(function(){                         
            var item = {
                'image': $("#index_item_image").val(),
            };
            var id = $("#unique_item").attr("unique_id");
            
            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'image_refresh',
                    'item': item,
                    'id': id,
                    'target': "image",
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
    }

    {
        function index_item_index_page_change(this_){
            var id = $("#unique_item").attr("unique_id");
            var item = {
                "page": $("#index_item_page").val(),
            };
    
            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'page_item_id_update',
                    'item': item,
                    'id': id,
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
                        // alert(response.item['image']);
                        $("#unique_item").attr("unique_page", $("#index_item_page").val());

                        $("#index_item_title_image").val(response.item['title_image']);
                        $("#index_item_title_image").attr('src', response.item['title_image']);
                        $("#index_item_image").val(response.item['image']);
                        $("#index_item_image").attr('src', response.item['image']);

                        $.each(items, function( index, value ) {              
                            $.each(response.item_item, function( index_temp, value_temp ) {              
                                if(value['no'] == value_temp['no']){
                                    value['image'] = value_temp['image'];
                                    return false;
                                }                                   
                            });
                        });

                        // var index = $("#index_item_item_select").find(":selected").attr("index"); 
                        // var selectIndex = $("#index_item_item_select option:selected").index(); 
                        
                        // if(selectIndex != -1){
                        //     $("#index_item_item_image").val(items[index]['image']);
                        //     $("#index_item_item_image").attr('src', items[index]['image']);
                        // }
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
        $("#index_item_page").change(function() {
            index_item_index_page_change(this);
        });
    }

    {
        function index_item_item_change(this_){
            var id = $("#unique_item").attr("unique_id");
            var item = {
                "item": $("#index_item_item").val(),
            };
    
            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'page_item_id_update',
                    'item': item,
                    'id': id,
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
                        // alert(response.item['image']);
                        $("#unique_item").attr("unique_item", $("#index_item_item").val());

                        $("#index_item_title_image").val(response.item['title_image']);
                        $("#index_item_title_image").attr('src', response.item['title_image']);
                        $("#index_item_image").val(response.item['image']);
                        $("#index_item_image").attr('src', response.item['image']);
                        
                        $.each(items, function( index, value ) {              
                            $.each(response.item_item, function( index_temp, value_temp ) {              
                                if(value['no'] == value_temp['no']){
                                    value['image'] = value_temp['image'];
                                    return false;
                                }                                   
                            });
                        });
                        
                        // var index = $("#index_item_item_select").find(":selected").attr("index"); 
                        // var selectIndex = $("#index_item_item_select option:selected").index(); 

                        // if(selectIndex != -1){
                        //     $("#index_item_item_image").val(items[index]['image']);
                        //     $("#index_item_item_image").attr('src', items[index]['image']);
                        // }
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
        $("#index_item_item").change(function() {
            index_item_item_change(this);
        });
    }

    {
        function index_item_id_change(this_){
            var id = $("#unique_item").attr("unique_id");
            var item = {
                "id": $("#index_item_id").val(),
            };
    
            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'page_item_id_update',
                    'item': item,
                    'id': id,
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
                        // alert(response.item['image']);
                        $("#unique_item").attr("unique_id", $("#index_item_id").val());

                        $("#index_item_title_image").val(response.item['title_image']);
                        $("#index_item_title_image").attr('src', response.item['title_image']);
                        $("#index_item_image").val(response.item['image']);
                        $("#index_item_image").attr('src', response.item['image']);

                        $.each(items, function( index, value ) {              
                            $.each(response.item_item, function( index_temp, value_temp ) {              
                                if(value['no'] == value_temp['no']){
                                    value['image'] = value_temp['image'];
                                    return false;
                                }                                   
                            });
                        });

                        // var index = $("#index_item_item_select").find(":selected").attr("index"); 
                        // var selectIndex = $("#index_item_item_select option:selected").index(); 
                        
                        // if(selectIndex != -1){
                        //     $("#index_item_item_image").val(items[index]['image']);
                        //     $("#index_item_item_image").attr('src', items[index]['image']);
                        // }
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
        $("#index_item_id").change(function() {
            index_item_id_change(this);
        });
    }

    {
        $("#index_item_title_image_refresh").click(function(){                         
            var item = {
                'title_image': $("#index_item_title_image").val(),
            };
            var id = $("#unique_item").attr("unique_id");
            
            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'image_refresh',
                    'item': item,
                    'id': id,
                    'target': "title_image",
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
                        var image = $("#index_item_title_image").val();
                        $("#index_item_title_image_thumbnail").attr('src', new URL(image, window.location.protocol + "//" + location.host));
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
    }

    

    


    {
        var item = {
            'temp': 'temp',
        };
        var item_item = {
            'temp': 'temp',
        };
        var id = $("#unique_item").attr("unique_id");

        



        $.ajax({
			type:"POST",
            url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
            data:{
                '_token': $("input[name=_token]").attr("value"),
                'deal': 'item_item',
                'method': 'items',
                'item': item,
                'item_item': item_item,
                'id': id,
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
                    $.each(response.items, function( index, value ) {              
                        items[item_item_index] = {};
                        items[item_item_index]['no'] = value['no'];
                        items[item_item_index]['order_'] = value['order_'];
                        items[item_item_index]['id'] = value['id'];
                        if(value['item']){
                            items[item_item_index]['item'] = value['item'];
                        }
                        else{
                            items[item_item_index]['item'] = "";
                        }
                        items[item_item_index]['content_show'] = value['content_show'];
                        items[item_item_index]['type1'] = value['type1'];
                        items[item_item_index]['content1'] = value['content1'];
                        items[item_item_index]['type2'] = value['type2'];
                        items[item_item_index]['content2'] = value['content2'];
                        
                        // items[item_item_index]['image'] = value['image'];
                        items[item_item_index]['content'] = value['content'];
                        items[item_item_index]['comment'] = value['comment'];
                        
                        
                        if(items[item_item_index]['item'] != ""){
                            $("#index_item_item_select").append(
                                "<option no_=" + items[item_item_index]['no'] + " index=" + item_item_index + ">" + items[item_item_index]['order_'] + " - " + items[item_item_index]['item'] + "</option>"
                            ); 
                        }
                        else{
                            $("#index_item_item_select").append(
                                "<option no_=" + items[item_item_index]['no'] + " index=" + item_item_index + ">" + items[item_item_index]['order_'] + " - " + "</option>"
                            ); 
                        }
                            
                        // $("#index_item_item_order").val(items[item_item_index]['order_']);
                        // $("#index_item_item_item").val(items[item_item_index]['item']);
                        // $("#index_item_item_image").val(items[item_item_index]['image']);
                        // $("#index_item_item_image_thumbnail").attr('src', new URL(items[item_item_index]['image'], window.location.protocol + "//" + location.host));                          
                        // editor_item_content.setData(items[item_item_index]['content']);
                        // $("#index_item_item_comment").val(items[item_item_index]['comment']);
                        
                        ++item_item_index;      
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

    {        
        $("#index_item_item_select").change(function(){
            var index = $($("#index_item_item_select").find(":selected")).attr('index');   
                 
            if(index != -1){
                $("#index_item_item_order").val(items[index]['order_']);
                $("#index_item_item_item").val(items[index]['item']);
                $("#index_item_item_content_show").val(items[index]['content_show']);
                $("#index_item_item_type1").val(items[index]['type1']);
                editor_item_content1.setData(items[index]['content1']);
                $("#index_item_item_type2").val(items[index]['type2']);
                editor_item_content2.setData(items[index]['content2']);
                // $("#index_item_item_image_thumbnail").attr('src', new URL(items[index]['image'], window.location.protocol + "//" + location.host));                          
                
                $("#index_item_item_comment").val(items[index]['comment']);
                // index_item_item_image_upload.reset();
            }
        });
    }

    {
        
        $("#index_item_item_add").click(function(){
            var item = {
                'temp': 'temp',
            };
            var item_item = {
                'temp': 'temp',
            };
            var id = $("#unique_item").attr("unique_id");

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item_item',
                    'method': 'add',
                    'item': item,
                    'item_item': item_item,
                    'id': id,
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
                        
                        items[item_item_index] = {};
                        items[item_item_index]['no'] = response.item['no'];
                        items[item_item_index]['order_'] = response.item['order_'];
                        items[item_item_index]['id'] = response.item['id'];
                        if(response.item['item']){
                            items[item_item_index]['item'] = response.item['item'];
                        }
                        else{
                            items[item_item_index]['item'] = "";
                        }
                        
                        items[item_item_index]['image'] = response.item['image'];
                        items[item_item_index]['content'] = response.item['content'];
                        items[item_item_index]['comment'] = response.item['comment'];
                        
                        
                        if(items[item_item_index]['item'] != ""){
                            $("#index_item_item_select").append(
                                "<option no_=" + items[item_item_index]['no'] + " index=" + item_item_index + ">" + items[item_item_index]['order_'] + " - " + items[item_item_index]['item'] + "</option>"
                            ); 
                        }
                        else{
                            $("#index_item_item_select").append(
                                "<option no_=" + items[item_item_index]['no'] + " index=" + item_item_index + ">" + items[item_item_index]['order_'] + " - " + "</option>"
                            ); 
                        }
                            
                        $("#index_item_item_order").val(items[item_item_index]['order_']);
                        $("#index_item_item_item").val(items[item_item_index]['item']);

                        $("#index_item_item_content_show").val(items[item_item_index]['content_show']);



                        // $("#index_item_item_image").val(items[item_item_index]['image']);
                        // $("#index_item_item_image_thumbnail").attr('src', new URL(items[item_item_index]['image'], window.location.protocol + "//" + location.host));  
                        $("#index_item_item_type1").val(items[item_item_index]['type1']);                        
                        editor_item_content1.setData(items[item_item_index]['content1']);
                        $("#index_item_item_type2").val(items[item_item_index]['type2']);                        
                        editor_item_content2.setData(items[item_item_index]['content2']);
                        $("#index_item_item_comment").val(items[item_item_index]['comment']);
                        // index_item_item_image_upload.reset();

                        sort_element_by_items_order_item($("#index_item_item_select"), $("#index_item_item_select option"), "index");
                        
                        $("#index_item_item_select option").get(0).selected = true;  
                        $("#index_item_item_select").change();

                        ++item_item_index;
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
    }
    
    {
        $("#index_item_item_delete").click(function(){
            var index = $("#index_item_item_select").find(":selected").attr("index"); 
            var selectIndex = $("#index_item_item_select option:selected").index();   

            if(selectIndex < 0){
                return;
            }
                 
            var item = {
                'temp': 'temp',
            };
            var item_item = {
                'temp': 'temp',
            };
            var id = $("#unique_item").attr("unique_id");
            var no = $("#index_item_item_select").find(":selected").attr("no_"); 

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item_item',
                    'method': 'delete',
                    'item': item,
                    'item_item': item_item,
                    'id': id,
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
                        
                        items.splice(index, 1);

                        $($('#index_item_item_select option').get(selectIndex)).remove();    
                        if (selectIndex >= $('#index_item_item_select option').length){
                            if(selectIndex - 1 > 0){
                                $("#index_item_item_select option").get(selectIndex - 1).selected = true; 
                                $("#index_item_item_select").change();
                            } 
                        }
                        else{
                            $("#index_item_item_select option").get(selectIndex).selected = true;  
                            $("#index_item_item_select").change();
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
    }

    {
        $("#index_item_item_order").change(function(){
            var index = $("#index_item_item_select").find(":selected").attr("index"); 
            var selectIndex = $("#index_item_item_select option:selected").index();   

            if(selectIndex < 0){
                return;
            }
                 
            var item = {
                'temp': 'temp',
            };
            var item_item = {
                'order_': $("#index_item_item_order").val(),
            };
            var id = $("#unique_item").attr("unique_id");
            var no = $("#index_item_item_select").find(":selected").attr("no_"); 

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item_item',
                    'method': 'update',
                    'item': item,
                    'item_item': item_item,
                    'id': id,
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
                        var order = $("#index_item_item_order").val();
                        $("#index_item_item_select").find(":selected").attr("order_", order); 
                        if(items[index]['item']){
                            $("#index_item_item_select").find(":selected").html(order + " - " + items[index]['item']); 
                        }
                        else{
                            $("#index_item_item_select").find(":selected").html(order + " - "); 
                        }
                        
                        items[index]['order_'] = order;

                        sort_element_by_items_order_item($("#index_item_item_select"), $("#index_item_item_select option"), "index");  
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
    }

    {
        $("#index_item_item_item").change(function(){
            var index = $("#index_item_item_select").find(":selected").attr("index"); 
            var selectIndex = $("#index_item_item_select option:selected").index();   

            if(selectIndex < 0){
                return;
            }
                 
            var item = {
                'temp': 'temp',
            };
            var item_item = {
                'item': $("#index_item_item_item").val(),
            };
            var id = $("#unique_item").attr("unique_id");
            var no = $("#index_item_item_select").find(":selected").attr("no_"); 

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item_item',
                    'method': 'update',
                    'item': item,
                    'item_item': item_item,
                    'id': id,
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
                        
                        var item_ = $("#index_item_item_item").val();
                        var order = items[index]['order_'].toString();
                        
                        if(item_){
                            $("#index_item_item_select").find(":selected").html(order + " - " + item_); 
                        }
                        else{
                            $("#index_item_item_select").find(":selected").html(order + " - "); 
                        }
                        
                        items[index]['item'] = item_;

                        sort_element_by_items_order_item($("#index_item_item_select"), $("#index_item_item_select option"), "index");   
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
    }

    // {
    //     $("#index_item_item_image_refresh").click(function(){
    //         var index = $("#index_item_item_select").find(":selected").attr("index"); 
    //         var selectIndex = $("#index_item_item_select option:selected").index();   

    //         if(selectIndex < 0){
    //             return;
    //         }
                 
    //         var item = {
    //             'temp': 'temp',
    //         };
    //         var item_item = {
    //             'image': $("#index_item_item_image").val(),
    //         };
    //         var id = $("#unique_item").attr("unique_id");
    //         var no = $("#index_item_item_select").find(":selected").attr("no_"); 

    //         $.ajax({
    //             type:"POST",
    //             url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
    //             data:{
    //                 '_token': $("input[name=_token]").attr("value"),
    //                 'deal': 'item_item',
    //                 'method': 'update',
    //                 'item': item,
    //                 'item_item': item_item,
    //                 'id': id,
    //                 'no': no,
    //             },
    //             success:function(response,status,xhr){  
    //                 // console.log(response);                         
    //                 if(response.status == 0){
    //                     // layer.msg(
    //                     //     response.msg, 
    //                     //     {
    //                     //         icon: 6,
    //                     //         area: ['360px', '100px'],
    //                     //     }
    //                     // );
    
    //                     // console.log($("#index_pic_board_select"));
    //                     var image = $("#index_item_item_image").val();
    //                     $("#index_item_item_image_thumbnail").attr('src', new URL(image, window.location.protocol + "//" + location.host));
    //                     items[index]['image'] = image;
    //                 }
    //                 else{
    //                     layer.msg(
    //                         response.msg, 
    //                         {
    //                             icon: 5,
    //                             area: ['360px', '100px'],
    //                         }
    //                     );
    //                 }                             
    //             },
    //             error:function(response,status,xhr){     
    //                 // console.log(response);   
    //                 if(response.status == 0){
    //                     layer.msg(
    //                         response.msg, 
    //                         {
    //                             icon: 5,
    //                             area: ['360px', '100px'],
    //                         }
    //                     );
    //                 }
    //                 else{
    //                     layer.msg(
    //                         response.msg, 
    //                         {
    //                             icon: 5,
    //                             area: ['360px', '100px'],
    //                         }
    //                     );
    //                 }
    //             },
    //         });
    //     });
    // }

    {        
        $("#index_item_item_update").click(function(){
            var index = $("#index_item_item_select").find(":selected").attr("index"); 
            var selectIndex = $("#index_item_item_select option:selected").index();   

            if(selectIndex < 0){
                return;
            }
            var item = {
                'temp': 'temp',
            };
            var item_item = {
                "order_":$("#index_item_item_order").val(),
                "item":$("#index_item_item_item").val(),
                // "image":$("#index_item_item_image").val(),
                "content_show":$("#index_item_item_content_show").val(),
                "type1":$("#index_item_item_type1").val(),
                "content1":editor_item_content1.getData(),
                "type2":$("#index_item_item_type2").val(),
                "content2":editor_item_content2.getData(),
                "comment":$("#index_item_item_comment").val(),
            };  
            
            var id = $("#unique_item").attr("unique_id");
            var no = $("#index_item_item_select").find(":selected").attr("no_"); 

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item_item',
                    'method': 'update',
                    'item': item,
                    'item_item': item_item,
                    'id': id,
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
                        items[index] = item_item;  
                        // $("#index_item_item_image_thumbnail").attr('src', new URL(item_item['image'], window.location.protocol + "//" + location.host));
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
    }
    
    if(sessionStorage.item_describe && $(".index_item_item_describe").val() == ""){
        // alert(sessionStorage.item_describe);
        $(".index_item_item_describe").val(sessionStorage.item_describe);
    }

    {
        $("#index_item_update").click(function(){
            var item = {
                'item_describe': $("#index_item_item_describe").val(),
                'type': $("#index_item_type").val(),
                'title': $("#index_item_title").val(),
                'title_class': $("#index_item_title_class").val(),
                'title_name': $("#index_item_title_name").val(),
                'title_image': $("#index_item_title_image").val(),
                'title_describe': $("#index_item_title_describe").val(),
                'image': $("#index_item_image").val(),
                'url': $("#index_item_url").val(),
                'describe_': editor_describe.getData(),
                'content': editor_content.getData(),
                'comment': $("#index_item_comment").val(),
                'comment_detail': $("#index_item_comment_detail").val(),
            };            
            
            var id = $("#unique_item").attr("unique_id");

            $.ajax({
                type:"POST",
                url:"/backend/device/" + dir_ + "/content/" + index_page_ + "/deal",
                data:{
                    '_token': $("input[name=_token]").attr("value"),
                    'deal': 'item',
                    'method': 'update',
                    'item': item,
                    'id': id,
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
                        $("#index_item_title_image_thumbnail").attr('src', new URL(item['title_image'], window.location.protocol + "//" + location.host));
                        $("#index_item_image_thumbnail").attr('src', new URL(item['image'], window.location.protocol + "//" + location.host));
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
    }

    {
        $("#index_item_all_update").click(function(){
            $("#index_item_update").click();
            $("#index_item_item_update").click();
        });
    }
    
    {
        $("#index_item_all_close").click(function(){
            window.close();
        });
    }
});
