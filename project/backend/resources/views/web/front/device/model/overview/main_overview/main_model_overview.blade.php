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
        <link rel="stylesheet" href="{{asset("assets/web/front/device/model/overview/main_overview/main_model_overview.css")}}">
        <script src="{{asset("assets/web/front/device/model/overview/main_overview/main_model_overview.js")}}"></script>
        
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
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.front.common.nav.main_nav")        
        <div id="top_bar">            
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}

        


        <div class="model_overview_title">
                <h1 style="font-weight:bold;">{{$device_data['title']}}</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">總覽</h3>
            {!! $device_data['title_describe'] !!}
            <hr class="hr_title" />
        </div> 
        {{--  間隔  --}}
        <div class="model_overview_space">
            <br><br>
        </div>

        <div class="css_nav model_overview_title_nav">
            <div class="head_bg">
                <div class="cl top_h navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-3" id="">                                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#model_overview_title_nav_bar" 
                            aria-controls="model_overview_title_nav_bar" aria-expanded="false" aria-label="Toggle navigation">
                            <!-- .navbar-toggler-icon 漢堡式選單Icon -->
                            <span class="navbar-toggler-icon"></span>
                        </button>           
                    </div> 
                    <div class="nov m_l l collapse navbar-collapse navbar-ex1-collapse" id="model_overview_title_nav_bar">
                        <div id="tools_point">文件 X 驅動程式 X 教學</div>
  
                        <ul class="nav navbar-nav ml-auto ">
                            @foreach($nav_list as $key => $value) 
                                @if($value['enabled'] == 1)
                                    <li class="nav-item">
                                        <a href="{{url($value['url'])}}" target="_self" class="hover"><span image_url="url(/image/front/device/model/overview.png)" class="db tingico liico0">
                                        </span>{{$value['name']}}</a>
                                    </li>
                                @endif 
                            @endforeach 

                            {{--  <li class="nav-item">
                                <a href="{{url("device/aoi/hahahalib")}}" target="_blank" class="hover"><span image_url="url(/image/front/device/model/overview.png)" class="db tingico liico0">
                                </span>Home</a>
                            </li>  
                            <li class="nav-item handle_b">
                                <a href="http://www.jq22.com/" class="hover5"><span image_url="url(/image/front/device/model/overview.png)" class="db tingico liico7">
                                </span>Download</a>
                            </li>  --}}
                            
                        </ul>    
                    </div>    
                    <div class="park"></div>    
                </div>    
            </div>    
        </div>

        

        {{--  間隔  --}}
        {{--  <div class="model_overview_space">
            <br><br>
        </div>  --}}

        <div class="model_overview_content">
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
            


                
            {{--  就觀察，請不要超過10col，請根據內容決定樣式要幾個col  --}}
            {{--  style_list 3 ~ 6 為多列格式(3 ~ 6)  --}}
            {{--  style_list2 為row格式(twitch格子狀)  --}}

                

        </div>
        <div class="up_button btn btn-dark">
            <div style="font-size:2em; color:Tomato">
                <i class="fas fa-angle-up"></i>
            </div>
        </div>

        


        

        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  tail  --}}
        @include("fast_use.front.common.tail.main_tail")
        {{-- //////////////////////////////////////////////////////////////////////// --}}

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

