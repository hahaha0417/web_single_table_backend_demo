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
<?php
use hahaha\hahaha_define_tool_key_ha as key_ha;

$parameter_ = \hahaha\hahaha_parameter::Instance();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        @include('web.common.main_meta')
        @include('web.common.sub_meta')

        @include('web.common.main_script')
        @include('web.common.sub_script')

        @include('web.common.main_css')
        @include('web.common.sub_css')


        <link rel="stylesheet" href="{{\p_ha::Assets("web/backend/index.css")}}">
        <script src="{{\p_ha::Assets("web/backend/index.js")}}"></script>
        <script src="{{\p_ha::Assets("cross_origin/iframe_resize_height.js")}}"></script>

        <script>
            $(function(){

            });

        </script>

        <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        </style>

    </head>
    <body style="background:rgba(190, 190, 190, 1);">
        <script>
            // ----------------------------------------------------------
            // https://stackoverflow.com/questions/7229027/how-to-get-data-to-javascript-from-php-using-json-encode
            // https://www.php.net/manual/en/function.addcslashes.php
            var path = '<?php echo $parameter_->path; ?>';
            var nodes = JSON.parse('<?php echo addcslashes(json_encode($parameter_->nodes,JSON_UNESCAPED_SLASHES), "\\"); ?>');
            var nodes_deal = JSON.parse('<?php echo addcslashes(json_encode($parameter_->nodes_deal,JSON_UNESCAPED_SLASHES), "\\"); ?>');
            // console.log(nodes_deal);
            // ----------------------------------------------------------
        </script>

        <div style="background:rgba(255,190,190,1);">
            <hr>
            <h1>注意 : <br>
                因為是小工具，500個左右還夠快<br>
                所以簡單做，不弄成設定檔<br>
                <br>
                因為效能太慢，假設要顯示include all，看能不能Post給VS Code開啟，不然直接開啟檔案或資料夾(目前沒做)
            </h1>
            <hr>
        </div>


        <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>設定</h1>
            <hr>
        </div>
        <br>


        <div class="form-group row ml-1">
            <label for="path" class="col-lg-2">路徑</label>
            <input type="text" class="form-control col-lg-8" id="path" placeholder="路徑" value='<?php echo $parameter_->path; ?>'>
        </div>

        <div class="form-group row ml-1">
            <input type="checkbox" class="form-control col-lg-2" id="only_php_file"
                @if($parameter_->only_php_file == "true")
                    checked
                @endif
            >
            <label class="col-lg-8" for="only_php_file">Only PHP file</label>
        </div>




        <div class="form-group row ml-1">
            <button type="button" class="btn btn-dark col-lg-1 update_button">更新</button>
        </div>

        <div style="background:rgba(255,190,190,1);">
            <hr>
            <h1>Node</h1>
            <hr>
        </div>
        <br>

        <div class="form-group row ml-1">
            <label for="node1" class="col-lg-2">Node1</label>
            <select class="form-control col-lg-6" id="node1">

            </select>
            <button type="button" class="btn btn-dark col-lg-1 empty1">Empty</button>
            {{-- <button type="button" class="btn btn-secondary col-lg-1 load1">Load</button> --}}
        </div>

        <div class="form-group row ml-1">
            <label for="node2" class="col-lg-2">Node2</label>
            <select class="form-control col-lg-6" id="node2">

            </select>
            <button type="button" class="btn btn-dark col-lg-1 empty2">Empty</button>
            {{-- <button type="button" class="btn btn-secondary col-lg-1 load2">Load</button> --}}
        </div>

        <div class="form-group row ml-1">
            <label for="node3" class="col-lg-2">Node3</label>
            <select class="form-control col-lg-6" id="node3">

            </select>
            <button type="button" class="btn btn-dark col-lg-1 empty3">Empty</button>
            {{-- <button type="button" class="btn btn-secondary col-lg-1 load3">Load</button> --}}
        </div>

        <div class="form-group row ml-1">
            <label for="node4" class="col-lg-2">Node4</label>
            <select class="form-control col-lg-6" id="node4">

            </select>
            <button type="button" class="btn btn-dark col-lg-1 empty4">Empty</button>
            {{-- <button type="button" class="btn btn-secondary col-lg-1 load4">Load</button> --}}
        </div>

        <div class="form-group row ml-1">
            <label for="node5" class="col-lg-2">Node5</label>
            <select class="form-control col-lg-6" id="node5">

            </select>
            <button type="button" class="btn btn-dark col-lg-1 empty5">Empty</button>
            {{-- <button type="button" class="btn btn-secondary col-lg-1 load5">Load</button> --}}
        </div>

        <div class="form-group row ml-1">
            <div class="col-lg-2">
                <label for="item" class="form-group row ml-1">Items</label>
                <div class="" style="background-color:rgb(210,210,210);">
                    <label for="as" class="form-group row ml-1">As</label>
                    <select class="form-control col-lg" id="as">

                    </select>

                    <label for="style" class="form-group row ml-1">Style</label>
                    <select class="form-control col-lg" id="style">
                        @foreach($parameter_->styles as $key => &$style)
                            <option value="{{$key}}"
                            >{{$style}}</option>
                        @endforeach




                    </select>
                </div>
            </div>


            <select class="form-control col-lg-4 multiselect" id="item" size="12">

            </select>
            <textarea class="form-control col-lg-4" rows="12" id="output">

            </textarea>
        </div>


        {{-- <div style="background:rgba(255,190,190,1);">
            <hr>
            <h1>項目</h1>
            <hr>
        </div>
        <br>



        <div class="form-group row ml-1">
            <button type="button" class="btn btn-dark col-lg-1 save_button">儲存</button>
        </div> --}}

        {{-- <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>輸出</h1>
            <hr>
        </div>
        <br>

        <div class="form-group row ml-1">
            <label for="output" class="col-lg-2">輸出</label>
            <textarea class="form-control col-lg-8" rows="12" id="output">

            </textarea>
        </div>
        <br> --}}





        <script>
            // ----------------------------------------------------------------
            //
            // ----------------------------------------------------------------

            // ----------------------------------------------------------------
            $(function(){
                // ----------------------------------------------------------------
                var mode1_load = false;
                var mode2_load = false;
                var mode3_load = false;
                var mode4_load = false;
                var mode5_load = false;
                // ----------------------------------------------------------------
                function update_item(node)
                {
                    $('#item').empty();
                    $('#output').empty();
                    if(node ==null ||node["_items"] == null || node["_items"].length == 0)
                    {
                        return;
                    }

                    var items = node["_items"];
                    // console.log(items);
                    $.each(items, function(key, value) {
                        $('#item').append("<option value='" + value + "'          \
                            >" + value + "</option>"
                        );
                    });
                }

                function update_file(file)
                {
                    var as_index = $("#as option:selected").index();

                    // as
                    $('#as').empty();
                    $.each(file['<?php echo key_ha::FAST_USES; ?>'], function(key, value) {
                        $('#as').append("<option value='" + value + "'          \
                            >" + value + "</option>"
                        );
                    });

                    if(as_index != -1 && as_index < file['<?php echo key_ha::FAST_USES; ?>'].length)
                    {
                        $("#as")[0].selectedIndex = as_index;
                    }

                    var as_ = $( $("#as option")[$("#as option:selected").index()] ).val();
                    var style = $( $("#style option")[$("#style option:selected").index()] ).val();
                    // console.log(as_, style);
                    // console.log(as_, style);

                    var str = "";
                    $("output").empty();
                    $.each(file['<?php echo key_ha::CONSTS; ?>'], function(key, value) {

                        if(style == "0")
                        {
                            str += as_ + "::" + key;
                        }
                        else if(style == "1")
                        {
                            str += as_ + "::" + key + ",";
                        }
                        else if(style == "2")
                        {
                            str += as_ + "::" + key + " => \"\",";
                        }
                        else if(style == "3")
                        {
                            str += as_ + "::" + key + " => [],";
                        }

                        str += "\n";

                    });
                    $("#output").html(str);

                }

                $('#node1').click(function() {
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node = nodes[node1];

                    if(node)
                    {
                        if(mode1_load)
                        {
                            update_item(node);
                            return;
                        }
                    }
                });
                $('#node1').mousedown(function() {

                    $('#node1').empty();
                    $('#node2').empty();
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();
                    mode1_load = false;
                    mode2_load = false;
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node = nodes;

                    if(node)
                    {
                        if(mode1_load)
                        {
                            // update_item(node);
                            return;
                        }
                        $.each(node, function(key, value) {
                            if(key == "_items") {
                                return true;
                            }
                            $('#node1').append("<option value='" + key + "'          \
                                >" + key + "</option>"
                            );
                        });
                        if($(node).length != 0)
                        {
                            mode1_load = true;
                        }
                        // update_item(node);
                    }

                });
                $('.empty1').click(function() {
                    $('#node1').empty();
                    $('#node2').empty();
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();

                    mode1_load = false;
                    mode2_load = false;
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node = nodes;
                    if(node)
                    {
                        update_item(node);
                    }
                });

                // ----------------------------------------------------------------
                $('#node2').click(function() {
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node = nodes[node1][node2];

                    if(node)
                    {
                        if(mode2_load)
                        {
                            update_item(node);
                            return;
                        }
                    }
                });
                $('#node2').mousedown(function() {

                    $('#node2').empty();
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();
                    mode2_load = false;
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node = nodes[node1];

                    if(node)
                    {
                        if(mode2_load)
                        {
                            // update_item(node);
                            return;
                        }
                        $.each(node, function(key, value) {
                            if(key == "_items") {
                                return true;
                            }
                            $('#node2').append("<option value='" + key + "'          \
                                >" + key + "</option>"
                            );
                        });
                        if($(node).length != 0)
                        {
                            mode2_load = true;
                        }
                        // update_item(node);
                    }

                });
                $('.empty2').click(function() {
                    $('#node2').empty();
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();
                    mode2_load = false;
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node = nodes[node1];
                    if(node)
                    {
                        update_item(node);
                    }
                });
                // ----------------------------------------------------------------
                $('#node3').click(function() {
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3];

                    if(node)
                    {
                        if(mode3_load)
                        {
                            update_item(node);
                            return;
                        }
                    }
                });
                $('#node3').mousedown(function() {
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node = nodes[node1][node2];

                    if(node)
                    {
                        if(mode3_load)
                        {
                            // update_item(node);
                            return;
                        }
                        $.each(node, function(key, value) {
                            if(key == "_items") {
                                return true;
                            }
                            $('#node3').append("<option value='" + key + "'          \
                                >" + key + "</option>"
                            );
                        });
                        if($(node).length != 0)
                        {
                            mode3_load = true;
                        }
                        // update_item(node);
                    }

                });
                $('.empty3').click(function() {
                    $('#node3').empty();
                    $('#node4').empty();
                    $('#node5').empty();
                    mode3_load = false;
                    mode4_load = false;
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node = nodes[node1][node2];
                    if(node)
                    {
                        update_item(node);
                    }
                });
                // ----------------------------------------------------------------
                $('#node4').click(function() {
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node4 = $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3][node4];

                    if(node)
                    {
                        if(mode4_load)
                        {
                            update_item(node);
                            return;
                        }
                    }
                });
                $('#node4').mousedown(function() {
                    $('#node4').empty();
                    $('#node5').empty();
                    mode4_load = false;
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3];
                    // console.log(node);
                    if(node)
                    {
                        if(mode4_load)
                        {
                            // update_item(node);
                            return;
                        }

                        $.each(node, function(key, value) {
                            if(key == "_items") {
                                return true;
                            }
                            $('#node4').append("<option value='" + key + "'          \
                                >" + key + "</option>"
                            );
                        });
                        if($(node).length != 0)
                        {
                            mode4_load = true;
                        }
                        // update_item(node);
                    }

                });
                $('.empty4').click(function()
                {
                    $('#node4').empty();
                    $('#node5').empty();
                    mode4_load = false;
                    mode5_load = false;
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3];

                    if(node)
                    {
                        update_item(node);
                    }
                });
                // ----------------------------------------------------------------
                $('#node5').click(function()
                {
                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node4 = $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                    var node4 = $( $("#node5 option")[$("#node5 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3][node4][node5];

                    if(node)
                    {
                        if(mode5_load)
                        {
                            update_item(node);
                            return;
                        }
                    }
                });
                $('#node5').mousedown(function()
                {
                    $('#node5').empty();
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node4 = $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3][node4];

                    if(node)
                    {
                        if(mode5_load)
                        {
                            // update_item(node);
                            return;
                        }
                        $.each(node, function(key, value) {
                            if(key == "_items") {
                                return true;
                            }
                            $('#node5').append("<option value='" + key + "'          \
                                >" + key + "</option>"
                            );
                        });
                        if($(node).length != 0)
                        {
                            mode5_load = true;
                        }
                        // update_item(node);
                    }


                });
                $('.empty5').click(function()
                {
                    $('#node5').empty();
                    mode5_load = false;

                    var node1 = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    var node2 = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    var node3 = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    var node4 = $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                    var node = nodes[node1][node2][node3][node4];

                    if(node)
                    {
                        update_item(node);
                    }
                });
                // ----------------------------------------------------------------
                function select_file()
                {
                    var node = nodes_deal;

                    if($("#node1 option:selected").index() != -1)
                    {
                        var node_key = $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                        node = node[node_key];
                    }
                    if($("#node2 option:selected").index() != -1)
                    {
                        var node_key = $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                        node = node[node_key];
                    }
                    if($("#node3 option:selected").index() != -1)
                    {
                        var node_key = $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                        node = node[node_key];
                    }
                    if($("#node4 option:selected").index() != -1)
                    {
                        var node_key = $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                        node = node[node_key];
                    }
                    if($("#node5 option:selected").index() != -1)
                    {
                        var node_key = $( $("#node5 option")[$("#node5 option:selected").index()] ).val();
                        node = node[node_key];
                    }

                    if($("#item option:selected").index() != -1)
                    {
                        var item_key = $( $("#item option")[$("#item option:selected").index()] ).val();
                        node = node["_items"][item_key];
                    }

                    update_file(node);
                }
                $('#item').change(function()
                {
                    select_file();
                });
                $('#as').change(function()
                {
                    select_file();
                });
                $('#style').change(function()
                {
                    select_file();
                });
                // ----------------------------------------------------------------
                update_item(nodes);
                // ----------------------------------------------------------------

                // ----------------------------------------------------------------

                // ----------------------------------------------------------------

                // ----------------------------------------------------------------





                // http://127.0.0.1:8700/backend/api/hahaha/tool/hahahalib/path_as_const_style/command
                //location.href = "http://127.0.0.1:8700/backend/tool/path_as_const_style/";
                // ip

                $(".update_button").click(function() {
                    var url = "/backend/tool/path_as_const_style";
                    url += "?" + "path=" + $("#path").val()
                    url += "&" + "only_php_file=" + $("#only_php_file").prop('checked');
                    // if($("#node1 option:selected").index() != -1)
                    // {
                    //     url += "&node1=" + $( $("#node1 option")[$("#node1 option:selected").index()] ).val();
                    //     if($("#node2 option:selected").index() != -1)
                    //     {
                    //         url += "&node2=" + $( $("#node2 option")[$("#node2 option:selected").index()] ).val();
                    //         if($("#node3 option:selected").index() != -1)
                    //         {
                    //             url += "&node3=" + $( $("#node3 option")[$("#node3 option:selected").index()] ).val();
                    //             if($("#node4 option:selected").index() != -1)
                    //             {
                    //                 url += "&node4=" + $( $("#node4 option")[$("#node4 option:selected").index()] ).val();
                    //                 if($("#node5 option:selected").index() != -1)
                    //                 {
                    //                     url += "&node5=" + $( $("#node5 option")[$("#node5 option:selected").index()] ).val();
                    //                     if($("#item option:selected").index() != -1)
                    //                     {
                    //                         url += "&item=" + $( $("#item option")[$("#item option:selected").index()] ).val();
                    //                     }
                    //                 }
                    //             }
                    //         }
                    //     }


                    // }

                    location.href = url;

                });

                // $("#table").change(function() {
                //     $(".update_button").click();
                // })

                // $(".send_button").click(function() {
                //     $.ajax({
                //         type:"POST",
                //         url:"/backend/api/hahaha/tool/hahahalib/text_deal/command",
                //         data:{
                //             'ip': $("#ip").val(),
                //             'port': $("#port").val(),
                //             'command': 'send',
                //             'method': 'origin',
                //             'content': $("#output").val(),

                //         },
                //         success:function(response,status,xhr){
                //             // 不用，避免一直跳alert
                //         },
                //         error:function(response,status,xhr){

                //         },
                //     });
                // });

            });

        </script>



    </body>
</html>

