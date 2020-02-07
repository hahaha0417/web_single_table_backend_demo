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

        {{--  css_nav  --}}
        <link rel="stylesheet" href="{{asset("assets/plugin/nav/css_nav/css/style.css")}}">
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/front/product/model/feature/content/main_content/main_model_feature_content.css")}}">
        <script src="{{asset("assets/web/front/product/model/feature/content/main_content/main_model_feature_content.js")}}"></script>
        
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
        
        
        
        
    </head>
    <body>    
        <div class="wrap_content">
            @foreach($data_list as $key => $value) 
                @if($value['type'] == 0)
                    @if($key % 2 == 0)
                        <div class="style_list row btn-light">  
                            @foreach($data_item_list[$key] as $key1 => $value1) 
                                @if($value1['type1'] == '0')              
                                    <div class="content_text col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>
                                @elseif($value1['type1'] == '1') 
                                    <div class="content_video col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>
                                @elseif($value1['type1'] == '2') 
                                    <div class="content_img col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>                            
                                @endif
                                @if($value1['type2'] == '0')              
                                    <div class="content_text col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @elseif($value1['type2'] == '1') 
                                    <div class="content_video col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @elseif($value1['type2'] == '2') 
                                    <div class="content_img col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @endif 
                                
                            @endforeach               
                        </div>
                    @elseif($key % 2 == 1)
                        <div class="style_list row btn-dark">  
                            @foreach($data_item_list[$key] as $key1 => $value1) 
                                @if($value1['type1'] == '0')              
                                    <div class="content_text col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>
                                @elseif($value1['type1'] == '1') 
                                    <div class="content_video col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>
                                @elseif($value1['type1'] == '2') 
                                    <div class="content_img col-lg-6">   
                                        {!! $value1['content1'] !!}
                                    </div>                            
                                @endif
                                @if($value1['type2'] == '0')              
                                    <div class="content_text col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @elseif($value1['type2'] == '1') 
                                    <div class="content_video col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @elseif($value1['type2'] == '2') 
                                    <div class="content_img col-lg-6">   
                                        {!! $value1['content2'] !!}
                                    </div>
                                @endif 
                            @endforeach               
                        </div>
                    @endif
                @elseif($value['type'] == 1)
                    <div class="style_list row btn-light">  
                        <iframe class="content_frame col-lg-12" id="{{$value['title_name']}}_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url($value['url'])}}">
                        </iframe>
                    </div> 
                @endif
            @endforeach
            {{--  <div class="style_list row btn-light">  
                <div class="content_video col-lg-6">
                    <embed src="https://www.youtube.com/embed/kKX-ortohEE">  
                </div>
                <div class="content_text col-lg-6">   
                    <h3>Code Your Way</h3> 
                    <br>
                    <div>With a new dark theme and installer, customizing your IDE to match your coding style has never been easier.</div>    
                    <br>              
                    <div>                        
                        Adding usability is as simple as setting component properties in the object inspector! Component properties help you rapidly add
                        generic usability that works across all platforms without writing a line of code! From
                        displaying the right keyboard for data entry, to positioning tabs in the right location based on the platform, usability is built in.
                    </div>
                </div>
            </div>             --}}
            
            <div class="up_button btn btn-dark">
                <div style="font-size:2em; color:Tomato">
                    <i class="fas fa-angle-up"></i>
                </div>
            </div>

                
            {{--  就觀察，請不要超過10col，請根據內容決定樣式要幾個col  --}}
            {{--  style_list 3 ~ 6 為多列格式(3 ~ 6)  --}}
            {{--  style_list2 為row格式(twitch格子狀)  --}}

                

        </div>
        <div class="up_button btn btn-dark">
            <div style="font-size:2em; color:Tomato">
                <i class="fas fa-angle-up"></i>
            </div>
        </div>


    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

