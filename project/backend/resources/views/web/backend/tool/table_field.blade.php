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
        <div style="background:rgba(190,255,190,1);">
            <hr>
            <h1>目標</h1>
            <hr>
        </div>
        <br>
        <div class="form-group row ml-1">
            <label for="ip" class="col-lg-2">Ip</label>
            <input type="email" class="form-control col-lg-8" id="ip" aria-describedby="ip"" placeholder="Ip" value="{{$parameter_->ip}}">
        </div>
        <div class="form-group row ml-1">
            <label for="port" class="col-lg-2">Port</label>
            <input type="email" class="form-control col-lg-8" id="port" aria-describedby="port" placeholder="Port" value="{{$parameter_->port}}">
        </div>

        <div class="form-group row ml-1">
            <label for="database" class="col-lg-2">資料庫</label>
            <input type="email" class="form-control col-lg-8" id="database" aria-describedby="database" placeholder="Database" value="{{$parameter_->database}}">
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

        <div class="form-group row ml-1">
            <label for="table" class="col-lg-2">資料表</label>
            <select class="form-control col-lg-8" id="table">
                @foreach($parameter_->table_items as $item)
                    <option value="{{$item['TABLE_NAME']}}"
                        @if($item['TABLE_NAME'] == $parameter_->table)
                            selected
                        @endif
                    >{{$item['TABLE_NAME']}}</option>
                @endforeach
            </select>
        </div>

        {{-- 這裡不做過濾，因為我不會預知要過濾那些 --}}

        <div class="form-group row ml-1">
            <label for="output" class="col-lg-2">輸出</label>
            <textarea class="form-control col-lg-8" rows="12" id="output">
@foreach($parameter_->table_fields as $field)
{{$field['COLUMN_NAME']}}
@endforeach
</textarea>

        </div>

        <div class="form-group row ml-1">
            <button type="button" class="btn btn-dark col-lg-1 send_button">傳送</button>
        </div>




        <script>
            $(function(){
                // http://127.0.0.1:8700/backend/api/hahaha/tool/hahahalib/text_deal/command
                //location.href = "http://127.0.0.1:8700/backend/tool/table_field/";
                // ip

                $(".update_button").click(function() {
                    var url = "/backend/tool/table_field";
                    url += "?" + "ip=" + $("#ip").val();
                    url += "&port=" + $("#port").val();
                    url += "&database=" + $("#database").val();
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
                        url:"/backend/api/hahaha/tool/hahahalib/text_deal/command",
                        data:{
                            'ip': $("#ip").val(),
                            'port': $("#port").val(),
                            'command': 'send',
                            'method': 'origin',
                            'content': $("#output").val(),

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

