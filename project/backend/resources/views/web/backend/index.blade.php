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

        @if(Config::get('app.online_script'))
            {{--  jQuery-file-upload  --}}
            @if(Config::get('app.debug'))
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.js" integrity="sha512-kHQelWbKDm6MpUkhEofa7KZZ9ptiVijVs3Ck/TFi0Z8CeX5BrFMryD0uqAcv/JjGCD0HfRVuMtHaYZFBMYwglw==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/uploadfile.css" integrity="sha512-zLt+aG0li6PQEHzXHC8Mb/Od1GCHcBqspouOw2xa35COi5U61ZjN/lRcizPR9TYDy0wrqQEb261mssGcMSM2qA==" crossorigin="anonymous" />
            @else
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js" integrity="sha512-uwNlWrX8+f31dKuSezJIHdwlROJWNkP6URRf+FSWkxSgrGRuiAreWzJLA2IpyRH9lN2H67IP5H4CxBcAshYGNw==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/uploadfile.min.css" integrity="sha512-MudWpfaBG6v3qaF+T8kMjKJ1Qg8ZMzoPsT5yWujVfvIgYo2xgT1CvZq+r3Ks2kiUKcpo6/EUMyIUhb3ay9lG7A==" crossorigin="anonymous" />
            @endif

            {{--  ckeditor 4  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.15.0/ckeditor.js" integrity="sha512-bNMnTgKRxN1n+5rgfcf160HT2koHRcwLcSq/3JDOY9R65mja48E4Hh+a+IQXVaY2NoJCVC+pr0qE3Vz194QwnA==" crossorigin="anonymous"></script>
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.15.0/ckeditor.min.js" integrity="sha512-BteskBaKPMLSRjzTYRda2rK6xfUxidIVcyHaBktrwtFudN8oqOUh3lGZIPTlslTnR2VHMvHIKmgG7di9MZn4Sg==" crossorigin="anonymous"></script>
            @endif

            {{--  labelauty  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.js" integrity="sha512-h595yOMz7+UgeXI+bxG6K1tEiDh/BQHpwTNhtXGuexr7T3KMrVL9sMElPkrghrFVZUrqlvIzb6H+b4PT9GXAvA==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.css" integrity="sha512-NUD74ySmYmRWEO5NXZ2EU0FfFhCIVhsxSoi3i4fybJYVhr5DkV+gdyEBd8tO0Pl/CspRwllRSAaUG7theVh1dA==" crossorigin="anonymous" />
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.js" integrity="sha512-+PhiRvIK75jXs6iE9IUqtK0TM3ZMfdDFLts7M6jHt5fPaWbo3RSjrSj9cI+fcgUJPaxe3YnJspeaykVLzqKxBQ==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.css" integrity="sha512-kUG7TU0SCl79O+kc9nP0LJmp3P/YRfS/BtQsJ/GcJx8WzJjRzB1Yz6BmbHygOA81dUb6TefGowZvLtjSyyZCIQ==" crossorigin="anonymous" />
            @endif

            {{--  lazyload  --}}
            <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>

            {{-- 找不到CDN --}}
            {{--  tooltip  --}}
            @if(Config::get('app.debug'))
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-tooltip/jquery.tooltip.js")}}" ></script>
            @else
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-tooltip/jquery.tooltip.min.js")}}" ></script>
            @endif

            {{-- 找不到CDN --}}
            {{--  popover  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-popover/src/jquery-popover.js")}}" ></script>


            {{--  layer  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.1.1/layer.js" integrity="sha512-+eChqsll8P6yHFipVChRfsE5NwvLbQLNyGJsaa9krPx2UIxYle085/5PxgUf4CHMzRHuANGWEkeBLimjzcrFCQ==" crossorigin="anonymous"></script>
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.1.1/layer.min.js" integrity="sha512-0YosS8GSyQIZd2uWWNHG95QgN8kPN6WBmjjzakoTRfdCt0YCmJs2HHiiF6tmGwngN/fZ+JH93zFSkW2cv5uGWw==" crossorigin="anonymous"></script>
            @endif
        @else
            {{--  jQuery-file-upload  --}}
            @if(Config::get('app.debug'))
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/js/jquery.uploadfile.js")}}" ></script>
                <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/css/uploadfile.css")}}" />
            @else
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/js/jquery.uploadfile.min.js")}}" ></script>
                <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/css/uploadfile.css")}}" />
            @endif

            {{--  ckeditor 4  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/ckeditor/ckeditor4/ckeditor.js")}}" ></script>

            {{--  labelauty  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/labelauty/source/jquery-labelauty.js")}}" ></script>
            <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/labelauty/source/jquery-labelauty.css")}}" />

            {{--  lazyload  --}}
            @if(Config::get('app.debug'))
                <script src="{{\p_ha::Assets("plugin/plugin/lazyload/lazyload.js")}}" ></script>
            @else
                <script src="{{\p_ha::Assets("plugin/plugin/lazyload/lazyload.min.js")}}" ></script>
            @endif

            {{--  tooltip  --}}
            @if(Config::get('app.debug'))
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-tooltip/jquery.tooltip.js")}}" ></script>
            @else
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-tooltip/jquery.tooltip.min.js")}}" ></script>
            @endif

            {{--  popover  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-popover/src/jquery-popover.js")}}" ></script>

            {{--  layer  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/layerui/dist/layer.js")}}" ></script>
        @endif

        <link rel="stylesheet" href="{{\p_ha::Assets("web/backend/index.css")}}">
        <script src="{{\p_ha::Assets("web/backend/index.js")}}"></script>
        <script src="{{\p_ha::Assets("cross_origin/iframe_resize_height.js")}}"></script>

        <script>

            $(function(){

            });

        </script>

        <style>
            .container {
                /* https://pjchender.blogspot.tw/2017/10/bs-bootstrap-4-custom-container-and.html */
                /* 有預設樣式，要調整 */
                margin: 0;
                padding: 0;
                max-width: 100%;
            }
            .sidebar-menu.sidebar-mini {
                /* 會被iframe遮住 */
                z-index: 5000;
            }
            .sidebar-menu.sidebar-mini .main-menu ul li .submenu{
                /* 字太長延長 */
                width: 400px;
                right: -400px;
            }

            .sidebar-menu.sidebar-mini .main-menu ul li .submenu li {
                /* 字太長延長 */
                width: 400px;
            }
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}



    </head>
    <body>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.backend.common.nav.main_nav")
        <div id="top_bar">
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}

        <div id="content" >
            <div id="left_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  useful  --}}
                @include("fast_use.backend.common.menu.main_menu")
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="main_box">

                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  home   --}}
                {{--  @include("fast_use.backend.common.home.main_home")    --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  如需改成用ajax撈，須建立管理器，管理js & css在頭部不重複，目前沒要這樣做  --}}
                {{--  iframe無法用ajax取得頁面內容替換  --}}
                <?
                $settings_ = \hahaha\backend\hahaha_setting_index::Instance()->Settings;
                ?>
                @if(empty($page_url))
                <iframe class="content_frame index_content_frame" loaded="0" name="index_content_frame" id="index_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{$settings_['default']['index']}}">
                </iframe>
                @else
                <iframe class="content_frame index_content_frame" loaded="0" name="index_content_frame" id="index_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{$page_url}}">
                </iframe>
                @endif
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  tail  --}}
                @include("fast_use.backend.common.tail.main_tail")
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            {{--  <div id="right_box">  --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  chat  --}}
                {{--  @include("fast_use.front.common.chat.main_chat")    --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            {{--  </div>  --}}


        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  整合功能  --}}
        {{--  頁面  --}}
        {{--  @include("fast_use.front.index.index_control")   --}}
        {{--  容器  --}}
        {{--  @include("fast_use.front.integrate.control.main_control")    --}}
        {{-- //////////////////////////////////////////////////////////////////////// --}}


    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();

        });

    </script>
</html>

