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


{{--  front.index 有關聯 - @include("fast_use.front.common.main_home")  --}}
{{--  @include("fast_use.front.common.main_home") 有關聯 - iframe  --}}

{{--  內頁，iframe，有必要才分obj寫  --}}
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

        <link rel="stylesheet" href="{{asset("assets/web/front/common/home/main_home/new/main_home_new.css")}}">
        <script src="{{asset("assets/web/front/common/home/main_home/new/main_home_new.js")}}"></script>
        
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
        
        
        
        
    </head>
    <body>            
        <div class="a">    
            <img class="img_a" src="{{url("image/maintain.png")}}" /> 
        </div>

    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

