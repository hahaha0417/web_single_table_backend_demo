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

$(function(){   
    var t;
    $(".home_nav .item").click(function(){   
        $url = $(this).attr("url");  
        if($(".home_content_frame").get(0).src !=  $url)
        {
            clearInterval(t);
            $(".home_content_frame").get(0).src = $url;
        }
        
       
        
    });    
    

    
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

// carousel 輪播器
$(function(){  
    var carousel = $("#water_wheel_carousel").waterwheelCarousel({
        flankingItems: 3,
        separation: 200,
    });    
    
    $('#water_wheel_carousel_prev').bind('click', function () {
        carousel.prev();
        return false
    });

    $('#water_wheel_carousel_next').bind('click', function () {
        carousel.next();
        return false;
    }); 
    
    // RWD
    function min_576px(x) {
        if (x.matches) { 
            // > 576
            carousel.reload({
                flankingItems: 1,
                separation: 150,    
            });
        } else {
            // < 576
            carousel.reload({
                flankingItems: 0,
                separation: 0,    
            });
        }
    }
    function min_768px(x) {
        if (x.matches) {
            // > 768
            carousel.reload({
                flankingItems: 3,
                separation: 150,    
            });
        } else {
            // < 768
            carousel.reload({
                flankingItems: 1,
                separation: 150,    
            });
        }
    }
    function min_992px(x) {
        if (x.matches) {
            // > 992
            carousel.reload({
                flankingItems: 5,
                separation: 200,    
            });
        } else {
            // < 992
            carousel.reload({
                flankingItems: 3,
                separation: 150,    
            });
        }
    }
    
    var e_min_576px = window.matchMedia("(min-width: 576px)");
    e_min_576px.addListener(min_576px);
    
    var e_min_768px = window.matchMedia("(min-width: 768px)");
    e_min_768px.addListener(min_768px);  

    var e_min_992px = window.matchMedia("(min-width: 992px)");
    e_min_992px.addListener(min_992px);  

    
});

$(function(){  
    // 暫時隱藏 
    $("#right_box").hide();
    $("#left_box").hide();
});

$(function(){  
    $(".menu_button").click(function(e){
        // control_page似乎是保留字
        var menu_map = [
            [$("#menu_setting"), $("#setting_page")],
            [$("#menu_control"), $("#control_page_")],
            [$("#menu_item"), $("#item_page")],
            [$("#menu_list"), $("#list_page")],
        ]; 
        // alert(menu_map[0][0]);
 
        for(var i = 0; i < menu_map.length; ++i){
            if(menu_map[i][0].get(0) == $(this).get(0)){
                menu_map[i][1].show();
            }  
            else{
                menu_map[i][1].hide();
            }  
        }
    });

    $("#control_item_add_media_button").click(function(){
        $("#control_item_play_list_page").show();
        $("#control_item_index_page").hide();
        $("#control_item_type_page").hide();
        $("#control_item_name_page").show();
        $("#control_item_dir_page").show();
        $("#control_item_youtube_id_page").hide();

        $("#control_item_type").val("0");
        $("#control_item_name").val("");
        $("#control_item_dir").val("");

        $("#control_item_add").show();
        $("#control_item_delete").hide();
    });

    $("#control_item_add_youtube_button").click(function(){
        $("#control_item_play_list_page").show();
        $("#control_item_index_page").hide();
        $("#control_item_type_page").hide();
        $("#control_item_name_page").show();
        $("#control_item_dir_page").hide();
        $("#control_item_youtube_id_page").show();

        $("#control_item_type").val("1");
        $("#control_item_name").val("");
        $("#control_item_youtube_id").val("");

        $("#control_item_add").show();
        $("#control_item_delete").hide();
    });

    $("#control_item_delete_button").click(function(){
        $("#control_item_play_list_page").show();
        $("#control_item_index_page").show();
        $("#control_item_type_page").hide();
        $("#control_item_name_page").show();
        $("#control_item_dir_page").hide();
        $("#control_item_youtube_id_page").hide();

        $("#control_item_type").val("");
        $("#control_item_index").val("");
        $("#control_item_name").val("");

        $("#control_item_add").hide();
        $("#control_item_delete").show();
    });

    $("#control_prev").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/prev",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                
                }
                else{
                    
                }                             
            },
            error:function(response,status,xhr){    
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_play").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/play",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_play").hide();
                    $("#control_play_space").hide();
                    $("#control_pause").show();
                    $("#control_pause_space").show();
                }
                else{

                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );   
            },
        });
    });

    $("#control_pause").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/pause",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_play").show();
                    $("#control_play_space").show();
                    $("#control_pause").hide();
                    $("#control_pause_space").hide();
                }
                else{
                    
                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_stop").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/stop",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_play").show();
                    $("#control_play_space").show();
                    $("#control_pause").hide();
                    $("#control_pause_space").hide();
                }
                else{
                    
                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_next").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/next",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                
                }
                else{
                    
                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_unload").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/unload",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_play").show();
                    $("#control_play_space").show();
                    $("#control_pause").hide();
                    $("#control_pause_space").hide();
                }
                else{

                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_item_add").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var type_ = $("#control_item_type").val();
        var name_ = $("#control_item_name").val();
        var message_ = "";
        var index_ = 0;
        
        if(ip_ == "")
        {
            message_ += "ip, ";     
        }
        if(port_ == "")
        {
            message_ += "port, ";        
        }
        if(name_ == "")
        {
            message_ += "name, ";        
        }  
        if(type_ == "0")
        {            
            var dir_ = $("#control_item_dir").val();
            if(dir_ == "")
            {
                message_ += "dir, ";                    
            }
                          
            if(message_ != "")
            {
                message_ = message_.substring(0, message_.length - 2) + ".";
                layer.msg(
                    "請輸入" + message_, 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
                return;   
            }
            
            $.ajax({
                type:"POST",
                url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/add/media",
                data:{
                    'ip': ip_,
                    'port': port_,
                    //'type_': type_,   // 不用傳
                    'name': name_,
                    'url': dir_,
                },
                success:function(response,status,xhr){  
                    // console.log(response);  
                                            
                    if(response.status == 0){
                        $("#control_item_play_list_refresh").click();
                    }
                    else{
    
                    }                             
                },
                error:function(response,status,xhr){     
                    layer.msg(
                        "請輸入" + message_, 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                },
            });
        }
        else if(type_ == "1")
        {            
            var youtube_id_ = $("#control_item_youtube_id").val();
            if(youtube_id_ == "")
            {
                message_ += "youtube_id, ";                                
            }
            
            if(message_ != "")
            {
                message_ = message_.substring(0, message_.length - 2) + ".";
                layer.msg(
                    "請輸入" + message_, 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
                return;   
            }

            $.ajax({
                type:"POST",
                url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/add/youtube",
                data:{
                    'ip': ip_,
                    'port': port_,
                    //'type_': type_,   // 不用傳
                    'name': name_,
                    'url': youtube_id_,
                },
                success:function(response,status,xhr){  
                    // console.log(response);  
                                            
                    if(response.status == 0){
                        $("#control_item_play_list_refresh").click();
                    }
                    else{
    
                    }                             
                },
                error:function(response,status,xhr){     
                    layer.msg(
                        "server 沒回應", 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                },
            });
        }
        
    });

    $("#control_item_play_list_refresh").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/play_list",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_item_play_list_select").empty();
                    for(var i = 0; i < response.list.length; ++i){
                        $("#control_item_play_list_select").append(
                            "<option>" + response.list[i]['item'] + "</option>"
                        ); 
                    }
                }
                else{

                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_item_play_list_delete").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var type_ = $("#control_item_type").val();
        var index_ = $("#control_item_play_list_select")[0].selectedIndex;
        var name_ = $("#control_item_play_list_select :selected").text();
        var message_ = "";

        if(ip_ == "")
        {
            message_ += "ip, ";     
        }
        if(port_ == "")
        {
            message_ += "port, ";        
        }

        if(index_ == -1)
        {
            layer.msg(
                "撥放清單沒有選取!!", 
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );
            return;
        }
        
        if(message_ != "")
        {
            message_ = message_.substring(0, message_.length - 2) + ".";
            layer.msg(
                "請輸入" + message_, 
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );
            return;   
        }

        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/delete",
            data:{
                'ip': ip_,
                'port': port_,
                //'type_': type_,   // 不用傳
                'index': index_,
                'name': name_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_item_play_list_select")[0].options.remove(index_);
                }
                else{

                }                             
            },
            error:function(response,status,xhr){    
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_item_play_list_clear").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();


        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/clear",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_item_play_list_select ").empty();
                }
                else{

                }                             
            },
            error:function(response,status,xhr){ 
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });
    var list_list_ = [];
    var list_index_ = 0;
    $("#control_list_item_add").click(function(){
        var type_ = $("#control_list_item_type").val();
        var name_ = $("#control_list_item_name").val();
        var dir_ = $("#control_list_item_dir").val();
        var youtube_id_ = $("#control_list_item_youtube_id").val();
        var message_ = "";
        if(type_ == ""){
            message_ += "type, ";        
        } 
        if(name_ == ""){
            message_ += "name, ";        
        } 
        if(type_ == "0" && dir_ == ""){
            message_ += "dir, ";        
        } 
        if(type_ == "1" && youtube_id_ == ""){
            message_ += "youtube_id, ";        
        } 
        if(message_ != ""){
            message_ = message_.substring(0, message_.length - 2) + ".";
            layer.msg(
                "請輸入" + message_, 
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );
            return;
        }
        list_list_.push({});
        list_list_[list_index_]['type'] = type_;
        list_list_[list_index_]['name'] = name_;
        if(type_ == "0"){
            list_list_[list_index_]['url'] = dir_;
        }
        else if(type_ == "1"){
            list_list_[list_index_]['url'] = youtube_id_;
        }
        
        $("#control_list_select").append(
            "<option>" + list_list_[list_index_]['name'] + "</option>"
        ); 
        list_index_++;
    });

    $("#control_list_item_delete").click(function(){        
        var index_ = $("#control_list_select")[0].selectedIndex;
        if(index_ != -1){
            delete list_list_[index_];
            $("#control_list_select")[0].options.remove(index_);
        }        
    });

    $("#control_list_item_type").change(function(){
        if($("#control_list_item_type").val() == "0"){
            $("#control_list_item_dir_page").show();
            $("#control_list_item_youtube_id_page").hide();
        }
        else if($("#control_list_item_type").val() == "1"){
            $("#control_list_item_dir_page").hide();
            $("#control_list_item_youtube_id_page").show();
        }
    });

    $("#control_list_use_list_button").click(function(){
        $("#control_list_name_page").hide();
        $("#control_list_old_name_page").hide();
        $("#control_list_new_name_page").hide();
        $("#control_list_list_page").hide();
        $("#control_list_select_list_page").show();
        $("#control_list_item_type_page").hide();
        $("#control_list_item_name_page").hide();
        $("#control_list_item_dir_page").hide();
        $("#control_list_item_youtube_id_page").hide();

        $("#control_list_use_list").show();
        $("#control_list_add_list").hide();
        $("#control_list_delete_list").hide();
        $("#control_list_rename_list").hide();
        $("#control_list_add_list_clear").hide();
        $("#control_list_delete_list_clear").hide();
        $("#control_list_rename_list_clear").hide();
        $("#control_list_use_list_refresh").show();

        $("#control_list_use_list_space").show();
        $("#control_list_add_list_space").hide();
        $("#control_list_delete_list_space").hide();
        $("#control_list_rename_list_space").hide();
        $("#control_list_add_list_clear_space").hide();
        $("#control_list_delete_list_clear_space").hide();
        $("#control_list_rename_list_clear_space").hide();
    });

    $("#control_list_add_list_button").click(function(){
        $("#control_list_name_page").show();
        $("#control_list_old_name_page").hide();
        $("#control_list_new_name_page").hide();
        $("#control_list_list_page").show();
        $("#control_list_select_list_page").hide();
        $("#control_list_item_type_page").show();
        $("#control_list_item_name_page").show();
        $("#control_list_item_dir_page").show();
        $("#control_list_item_youtube_id_page").hide();

        $("#control_list_use_list").hide();
        $("#control_list_add_list").show();
        $("#control_list_delete_list").hide();
        $("#control_list_rename_list").hide();
        $("#control_list_add_list_clear").show();
        $("#control_list_delete_list_clear").hide();
        $("#control_list_rename_list_clear").hide();
        $("#control_list_use_list_refresh").hide();

        $("#control_list_use_list_space").hide();
        $("#control_list_add_list_space").show();
        $("#control_list_delete_list_space").hide();
        $("#control_list_rename_list_space").hide();
        $("#control_list_add_list_clear_space").show();
        $("#control_list_delete_list_clear_space").hide();
        $("#control_list_rename_list_clear_space").hide();
    });

    $("#control_list_delete_list_button").click(function(){
        $("#control_list_name_page").show();
        $("#control_list_old_name_page").hide();
        $("#control_list_new_name_page").hide();
        $("#control_list_list_page").hide();
        $("#control_list_select_list_page").hide();
        $("#control_list_item_type_page").hide();
        $("#control_list_item_name_page").hide();
        $("#control_list_item_dir_page").hide();
        $("#control_list_item_youtube_id_page").hide();

        $("#control_list_use_list").hide();
        $("#control_list_add_list").hide();
        $("#control_list_delete_list").show();
        $("#control_list_rename_list").hide();
        $("#control_list_add_list_clear").hide();
        $("#control_list_delete_list_clear").show();
        $("#control_list_rename_list_clear").hide();
        $("#control_list_use_list_refresh").hide();

        $("#control_list_use_list_space").hide();
        $("#control_list_add_list_space").hide();
        $("#control_list_delete_list_space").show();
        $("#control_list_rename_list_space").hide();
        $("#control_list_add_list_clear_space").hide();
        $("#control_list_delete_list_clear_space").show();
        $("#control_list_rename_list_clear_space").hide();
    });

    $("#control_list_rename_list_button").click(function(){
        $("#control_list_name_page").hide();
        $("#control_list_old_name_page").show();
        $("#control_list_new_name_page").show();
        $("#control_list_list_page").hide();
        $("#control_list_select_list_page").hide();
        $("#control_list_item_type_page").hide();
        $("#control_list_item_name_page").hide();
        $("#control_list_item_dir_page").hide();
        $("#control_list_item_youtube_id_page").hide();

        $("#control_list_use_list").hide();
        $("#control_list_add_list").hide();
        $("#control_list_delete_list").hide();
        $("#control_list_rename_list").show();
        $("#control_list_add_list_clear").hide();
        $("#control_list_delete_list_clear").hide();
        $("#control_list_rename_list_clear").show();
        $("#control_list_use_list_refresh").hide();

        $("#control_list_use_list_space").hide();
        $("#control_list_add_list_space").hide();
        $("#control_list_delete_list_space").hide();
        $("#control_list_rename_list_space").show();
        $("#control_list_add_list_clear_space").hide();
        $("#control_list_delete_list_clear_space").hide();
        $("#control_list_rename_list_clear_space").hide();
    });

    $("#control_list_add_list").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var list_name_ = $("#control_list_name").val();
        var message_ = "";
        if(list_name_ == ""){
            message_ += "list_name, 請輸入";   
            message_ += ", ";     
        } 
        if(list_list_.length == 0){
            message_ += "list為空，請新增";  
            message_ += ", ";      
        } 

        
        if(message_ != ""){
            message_ = message_.substring(0, message_.length - 2) + ".";
            layer.msg(
                message_,             
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );    
            return;
        }

        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/add/" + list_name_,
            data:{
                'ip': ip_,
                'port': port_,
                'list': list_list_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    
                }
                else{

                }                             
            },
            error:function(response,status,xhr){ 
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });
    
    $("#control_list_delete_list").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var list_name_ = $("#control_list_name").val();
        var message_ = "";
        if(list_name_ == ""){
            message_ += "list_name, 請輸入";   
            message_ += ", ";     
        } 
        
        if(message_ != ""){
            message_ = message_.substring(0, message_.length - 2) + ".";
            layer.msg(
                message_,             
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );    
            return;
        }

        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/delete/" + list_name_,
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    
                }
                else{
                    layer.msg(
                        "沒有該列表名稱!!", 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                }                             
            },
            error:function(response,status,xhr){ 
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_list_rename_list").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var old_list_name_ = $("#control_list_old_name").val();
        var new_list_name_ = $("#control_list_new_name").val();
        var message_ = "";
        if(old_list_name_ == ""){
            message_ += "old_list_name, 請輸入";   
            message_ += ", ";     
        } 
        if(new_list_name_ == ""){
            message_ += "new_list_name, 請輸入";   
            message_ += ", ";     
        } 
        
        if(message_ != ""){
            message_ = message_.substring(0, message_.length - 2) + ".";
            layer.msg(
                message_,             
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );    
            return;
        }

        
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/rename/" + old_list_name_ + "/to/" + new_list_name_,
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    
                }
                else{
                    layer.msg(
                        "沒有該列表名稱!!", 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                }                             
            },
            error:function(response,status,xhr){ 
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_list_clear_button").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
                
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/clear",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_list_use_list_refresh").click();    
                }
                else{
                    layer.msg(
                        "沒有該列表名稱!!", 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                }                             
            },
            error:function(response,status,xhr){ 
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    $("#control_list_add_list_clear").click(function(){
        $("#control_list_name").val("");
        $("#control_list_select").empty();
        $("#control_list_item_type").val("0");
        $("#control_list_item_name").val("");
        $("#control_list_item_dir").val("");
        $("#control_list_item_youtube_id").val("");

        if($("#control_list_item_type").val() == "0"){
            $("#control_list_item_dir_page").show();
            $("#control_list_item_youtube_id_page").hide();
        }
        else if($("#control_list_item_type").val() == "1"){
            $("#control_list_item_dir_page").hide();
            $("#control_list_item_youtube_id_page").show();
        }
    });

    $("#control_list_delete_list_clear").click(function(){
        $("#control_list_name").val("");
    });

    $("#control_list_rename_list_clear").click(function(){
        $("#control_list_old_name").val("");
        $("#control_list_new_name").val("");
    });

    $("#control_list_use_list").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        var index_ = $("#control_list_select_list")[0].selectedIndex;
        var name_ = $("#control_list_select_list :selected").text();

        if(index_ == -1){
            layer.msg(
                "請選擇列表名稱", 
                {
                    icon: 6,
                    area: ['360px', '100px'],
                }
            );    
            return;
        }
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/change/" + name_,
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);                                          
                if(response.status == 0){

                }
                else{
                    layer.msg(
                        "列表名稱不存在，請更新重選!!", 
                        {
                            icon: 6,
                            area: ['360px', '100px'],
                        }
                    );
                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });
    
    $("#control_list_use_list_refresh").click(function(){
        var ip_ = $("#setting_ip").val();
        var port_ = $("#setting_port").val();
        $.ajax({
            type:"POST",
            url:"https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list",
            data:{
                'ip': ip_,
                'port': port_,
            },
            success:function(response,status,xhr){  
                // console.log(response);  
                                        
                if(response.status == 0){
                    $("#control_list_select_list ").empty();
                    for(var i = 0; i < response.list.length; ++i){
                        $("#control_list_select_list").append(
                            "<option>" + response.list[i]['item'] + "</option>"
                        ); 
                    }
                }
                else{

                }                             
            },
            error:function(response,status,xhr){     
                layer.msg(
                    "server 沒回應", 
                    {
                        icon: 6,
                        area: ['360px', '100px'],
                    }
                );
            },
        });
    });

    // 預設動作
    
    
    // $("#control_list_type").val("0");
    $("#control_play").show();
    $("#control_play_space").show();
    $("#control_pause").hide();
    $("#control_pause_space").hide();    
    $("#control_list_item_type").val("0");
    $("#control_list_item_name").val("");
    $("#control_list_item_dir").val("");
    $("#control_list_item_youtube_id").val("");
    if($("#control_list_item_type").val() == "0"){
        $("#control_list_item_dir_page").show();
        $("#control_list_item_youtube_id_page").hide();
    }
    else if($("#control_list_item_type").val() == "1"){
        $("#control_list_item_dir_page").hide();
        $("#control_list_item_youtube_id_page").show();
    }
    $("#control_list_name").val("");
    $("#control_list_old_name").val("");
    $("#control_list_new_name").val("");
    // 這要在後面做
    // 由於IP一開始沒給，不更新，避免發錯
    // $("#control_item_play_list_refresh").click();
    // $("#control_list_use_list_refresh").click();
    $("#menu_setting").click();
    $("#control_list_use_list_button").click();
    $("#control_item_add_media_button").click();

});