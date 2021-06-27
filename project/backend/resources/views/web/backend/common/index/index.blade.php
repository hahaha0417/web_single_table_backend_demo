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
    
        <link rel="stylesheet" href="{{asset("assets/web/backend/index.css")}}">
        <script src="{{asset("assets/web/backend/index.js")}}"></script>
        
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
                <iframe class="content_frame index_content_frame" loaded="0" name="index_content_frame" id="index_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url("backend/class/all")}}">
                </iframe> 
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  tail  --}}
                @include("fast_use.front.common.tail.main_tail")
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
           
                            
        });
        
    </script>
</html>

