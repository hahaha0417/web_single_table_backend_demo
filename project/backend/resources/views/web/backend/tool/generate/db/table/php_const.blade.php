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
        <div style="background:rgba(255,190,190,1);">
            <hr>
            <h1>注意 : <br>
                因為是小工具，不做客製化版，有需要請做成command<br>
                不會有人每次產一樣還要一直輸入的，或帶一大堆參數
            </h1>
            <hr>
        </div>
        <div style="background:rgba(255,190,190,1);">
            <hr>
            <h1>注意 : <br>
                假設要做fast_use & 指定db file name，必須確認場景<br>
                單一專案 or 訂製專案，基本上寫command用，不需要特別寫一個小工具<br>
                目前沒有常用場景，需要多fast_use & 指定db file name
            </h1>
            <hr>
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>資料庫</h1>
            <hr>
        </div>
        <br>
        <div class="form-group row ml-1">
            <label for="ip" class="col-lg-2">Ip</label>
            <input type="text" class="form-control col-lg-8" id="ip" aria-describedby="ip"" placeholder="Ip" value="{{$parameter_->ip}}">
        </div>
        <div class="form-group row ml-1">
            <label for="port" class="col-lg-2">Port</label>
            <input type="text" class="form-control col-lg-8" id="port" aria-describedby="port" placeholder="Port" value="{{$parameter_->port}}">
        </div>
        <div class="form-group row ml-1">
            <label for="username" class="col-lg-2">使用者名稱</label>
            <input type="text" class="form-control col-lg-8" id="username" aria-describedby="username" placeholder="使用者名稱" value="{{$parameter_->username}}">
        </div>
        <div class="form-group row ml-1">
            <label for="password" class="col-lg-2">密碼</label>
            <input type="text" class="form-control col-lg-8" id="password" aria-describedby="password" placeholder="密碼" value="{{$parameter_->password}}">
        </div>
        <div class="form-group row ml-1">
            <label for="database" class="col-lg-2">資料庫</label>
            <input type="text" class="form-control col-lg-8" id="database" aria-describedby="database" placeholder="Database" value="{{$parameter_->database}}">
        </div>

        <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>PHP</h1>
            <hr>
        </div>
        <br>

        <div class="form-group row ml-1">
            <label class="col-lg-2" for="generate_table">產生資料表</label>
            <input type="checkbox" class="form-control col-lg-2" id="generate_table"
                @if($parameter_->generate_table == "true")
                    checked
                @endif
            >
        </div>
        <div class="form-group row ml-5">
            <label for="output_path" class="col-lg-2">路徑</label>
            <input type="text" class="form-control col-lg-8" id="output_table_path" aria-describedby="output_table_path" placeholder="D:\web" value="{{$parameter_->output_table_path}}">
        </div>
        <div class="form-group row ml-5">
            <label for="output_table_namespace" class="col-lg-2">Namespace</label>
            <input type="text" class="form-control col-lg-8" id="output_table_namespace" aria-describedby="output_table_namespace" placeholder="code\define\table\backend" value="{{$parameter_->output_table_namespace}}">
        </div>


        <div class="form-group row ml-1">
            <label class="col-lg-2" for="generate_table_field">產生資料表欄位</label>
            <input type="checkbox" class="form-control col-lg-2" id="generate_table_field"
                @if($parameter_->generate_table_field == "true")
                    checked
                @endif
            >
        </div>
        <div class="form-group row ml-5">
            <label for="output_path" class="col-lg-2">路徑</label>
            <input type="text" class="form-control col-lg-8" id="output_table_field_path" aria-describedby="output_table_field_path" placeholder="D:\web" value="{{$parameter_->output_table_field_path}}">
        </div>
        <div class="form-group row ml-5">
            <label for="output_table_field_namespace" class="col-lg-2">Namespace</label>
            <input type="text" class="form-control col-lg-8" id="output_table_field_namespace" aria-describedby="output_table_field_namespace" placeholder="code\define\table\backend" value="{{$parameter_->output_table_field_namespace}}">
        </div>


        <div class="form-group row ml-1">
            <input type="checkbox" class="form-control col-lg-2" id="pass_table_migrations"
                @if($parameter_->pass_table_migrations == "true")
                    checked
                @endif
            >
            <label class="col-lg-8" for="pass_table_migrations">Pass Table migrations</label>
        </div>

        <div class="form-group row ml-1">
            <input type="checkbox" class="form-control col-lg-2" id="doctrine_style"
                @if($parameter_->doctrine_style == "true")
                    checked
                @endif
            >
            <label class="col-lg-8" for="doctrine_style">Doctrine 樣式</label>
        </div>

        <div class="form-group row ml-1">
            <button type="button" class="btn btn-dark col-lg-1 update_button">更新</button>
        </div>

        <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>輸出 - 目的只是要做const，不用filter</h1>
            <hr>
        </div>
        <br>


        {{-- 這裡不做過濾，因為我不會預知要過濾那些 --}}

        <div class="form-group row ml-1">
            <label for="output" class="col-lg-2">資料表</label>
            <textarea class="form-control col-lg-8" rows="12" id="output">
@foreach($parameter_->table_items as $item)
{{$item['TABLE_NAME']}}
@endforeach
</textarea>

        </div>



        <div class="form-group row ml-1">
            <button type="button" class="btn btn-dark col-lg-1 send_button">產生</button>
        </div>




        <script>
            $(function(){
                // http://127.0.0.1:8700/backend/api/hahaha/tool/hahahalib/text_deal/command
                //location.href = "http://127.0.0.1:8700/backend/tool/table_field/";
                // ip

                $(".update_button").click(function() {
                    var url = "/backend/tool/generate/db/table/php_const";
                    url += "?" + "ip=" + $("#ip").val();
                    url += "&port=" + $("#port").val();
                    url += "&username=" + $("#username").val();
                    url += "&password=" + $("#password").val();
                    url += "&database=" + $("#database").val();
                    // url += "&output_namespace=" + $("#output_namespace").val();
                    //
                    url += "&generate_table=" + $("#generate_table").prop('checked');
                    url += "&output_table_path=" + $("#output_table_path").val();
                    url += "&output_table_namespace=" + $("#output_table_namespace").val();
                    url += "&generate_table_field=" + $("#generate_table_field").prop('checked');
                    url += "&output_table_field_path=" + $("#output_table_field_path").val();
                    url += "&output_table_field_namespace=" + $("#output_table_field_namespace").val();
                    //
                    url += "&pass_table_migrations=" + $("#pass_table_migrations").prop('checked');
                    url += "&doctrine_style=" + $("#doctrine_style").prop('checked');

                    if($("#table option:selected").index() != -1)
                    {
                        url += "&table=" + $( $("#table option")[$("#table option:selected").index()] ).val();
                    }

                    location.href = url;

                });

                $("#table").change(function() {
                    $(".update_button").click();
                })

                $(".send_button").click(function() {
                    $.ajax({
                        type:"POST",
                        url:"/backend/api/hahaha/generator/php/command",
                        data:{
                            'command': 'generate',
                            'method': 'db_table_php_const',
                            'content': $("#output").val(),
                            'ip': $("#ip").val(),
                            'port': $("#port").val(),
                            'username': $("#username").val(),
                            'password': $("#password").val(),
                            'database': $("#database").val(),

                            //
                            "generate_table": $("#generate_table").prop('checked'),
                            "output_table_path": $("#output_table_path").val(),
                            'output_table_namespace': $("#output_table_namespace").val(),
                            "generate_table_field": $("#generate_table_field").prop('checked'),
                            "output_table_field_path": $("#output_table_field_path").val(),
                            'output_table_field_namespace': $("#output_table_field_namespace").val(),
                            //
                            'pass_table_migrations': $("#pass_table_migrations").prop('checked'),
                            'doctrine_style': $("#doctrine_style").prop('checked'),


                        },
                        success:function(response,status,xhr){
                            // 不用，避免一直跳alert
                        },
                        error:function(response,status,xhr){

                        },
                    });
                });

            });

        </script>



    </body>
</html>

