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
        
        

        {{-- <script src="https://cdn.jsdelivr.net/jquery/1.11.3/jquery.min.js"></script> --}}
        {{--  jQuery Upload File  --}}
        <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
        
        {{--  Checkbox  --}}
        {{--  https://www.html5tricks.com/10-pretty-checkbox-radiobox.html  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.js" integrity="sha512-+PhiRvIK75jXs6iE9IUqtK0TM3ZMfdDFLts7M6jHt5fPaWbo3RSjrSj9cI+fcgUJPaxe3YnJspeaykVLzqKxBQ==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.css" integrity="sha512-kUG7TU0SCl79O+kc9nP0LJmp3P/YRfS/BtQsJ/GcJx8WzJjRzB1Yz6BmbHygOA81dUb6TefGowZvLtjSyyZCIQ==" crossorigin="anonymous" />
        

        <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
        {{--  layer  --}}
        {{--  http://layer.layui.com/  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.1.1/layer.min.js" integrity="sha512-0YosS8GSyQIZd2uWWNHG95QgN8kPN6WBmjjzakoTRfdCt0YCmJs2HHiiF6tmGwngN/fZ+JH93zFSkW2cv5uGWw==" crossorigin="anonymous"></script>
        {{-- Boostrap Autocomplete --}}
        

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

