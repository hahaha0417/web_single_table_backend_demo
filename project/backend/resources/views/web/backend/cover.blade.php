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
        <script src="{{\p_ha::Assets('libraries/common/library/ui/doc.js')}}" ></script>
        <script src="{{\p_ha::Assets('libraries/common/library/ui/iframe.js')}}" ></script>

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
            <h1>{{__("backend.cover")}}</h1>
            <hr>
        </div>
        <br>
        <div>
            <hr>
                <img src="{{\p_ha::Images('cover.png')}}" alt="hahaha" class="center">
            <hr>
        </div>

        {{-- ------------------------------------------------------------------------------ --}}
        <script>

            $(function(){
                if($(parent.document) && $(parent.document).find(".content_frame"))
                {
                    var iframe_ = $($(parent.document) && $(parent.document).find(".content_frame"));
                    $.each(iframe_, function(key, value){
                        value.onload = function(){
                            let ui_frame_ = new hahaha_ui_iframe;
                            ui_frame_.set_parent_iframe_height_by_id($(value).attr("id"));
                            iframe_.loaded = 1;
                        };
                    });

                    $(window).resize(function(){
                        $.each(iframe_, function(key, value){
                            let ui_frame_ = new hahaha_ui_iframe;
                            ui_frame_.set_parent_iframe_height_by_id($(value).attr("id"), false);
                        });

                    });
                }
            });

        </script>
        {{-- ------------------------------------------------------------------------------ --}}

    </body>
</html>

