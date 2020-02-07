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
        {{--  目前是懶人用法，有需要再直接加入上面  --}}
        @include('web.common.main_meta')
        @include('web.common.sub_meta')

        @include('web.common.main_script')
        @include('web.common.sub_script')
                
        @include('web.common.main_css')
        @include('web.common.sub_css')

        <link rel="stylesheet" href="{{asset("assets/web/front/vedio.css")}}">
        <script src="{{asset("assets/web/front/vedio.js")}}"></script>
        
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
            .a{
                width:100%;
                height:100%;
                /*background:red;*/
                float: left;
                position: relative;
            }
            .img_a{
                width:800px;
                height:600px;
                /*background:green;*/
                display: block;
                margin: 15px auto;                
            }
            
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        
        
        
    </head>
    <body>           
        
        
        
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.front.common.nav.main_nav")        
        <div id="top_bar">            
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        <div class="a">    
            <img class="img_a" src="{{url("image/maintain.png")}}" /> 
        </div>  
        <!--
        <div id="content" >
            {{-- //////////////////////////////////////////////////////////////////////// --}}
            {{--  simple  --}}
            {{--  @include("fast_use.front.common.simple.main_simple")    --}}
            {{-- //////////////////////////////////////////////////////////////////////// --}}
            <div id="left_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  useful  --}}
                @include("fast_use.front.common.useful.main_useful")  
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="main_box">
                    
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  home   --}}
                @include("fast_use.front.common.home.main_home")  
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  display  --}}
                {{--  @include("fast_use.front.common.display.main_display")    --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  tail  --}}
                @include("fast_use.front.common.tail.main_tail")
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="right_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  relation  --}}
                @include("fast_use.front.common.relation.main_relation")  
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            
            
        </div>
        -->
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  整合功能  --}}
        {{--  頁面  --}}
        @include("fast_use.front.index.index_control") 
        {{--  容器  --}}
        @include("fast_use.front.integrate.control.main_control")  
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        

    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

