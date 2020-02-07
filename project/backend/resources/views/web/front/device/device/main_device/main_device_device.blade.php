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

        
        
        <link rel="stylesheet" href="{{asset("assets/plugin/hover/image_hover/image_hover.css")}}">
        {{-- slide pro --}}
        <link rel="stylesheet" type="text/css" href="{{asset("assets/plugin/slider-pro/dist/css/slider-pro.min.css")}}" media="screen"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{asset("assets/plugin/slider-pro/dist/js/jquery.sliderPro.min.js")}}"></script>
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/front/device/device/main_device/main_device_device.css")}}">
        <script src="{{asset("assets/web/front/device/device/main_device/main_device_device.js")}}"></script>
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
            
              
              
              
        </style>
        
        
        
        
    </head>
    <body>    
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.front.common.nav.main_nav")        
        <div id="top_bar">            
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}

        <div class="device_device_title">
            <h1 style="font-weight:bold;">Device</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">hahaha產品分類</h3>
            裡面有產品分類和熱門產品
            <hr class="hr_title" />
        </div> 
        {{--  間隔  --}}
        <div class="device_device_space"> 
            <br><br>
        </div>

        {{-- https://github.com/bqworks/slider-pro/blob/master/docs/modules.md#4-lazy-loading --}}
        @if(count($carousel_data_list) > 0)
            <div id="popular_device" class="slider-pro">
                <div class="sp-slides">
                    @foreach($carousel_data_list as $key => $value) 
                        @if(!empty($value['carousel_data']) )
                            <div class="sp-slide">
                                <img class="sp-image" src="#"
                                    data-src="{{url($value['carousel_data']['image'])}}"
                                    data-retina="{{url($value['carousel_data']['image'])}}"/>
                                @if(!empty($value['carousel_item_data']) )
                                    @foreach($value['carousel_item_data'] as $key1 => $value1) 
                                        {!! $value1['content'] !!}
                                        {{-- <p class="sp-layer sp-white sp-padding"
                                            data-horizontal="50" data-vertical="50"
                                            data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200">
                                            Lorem ipsum
                                        </p>
                        
                                        <p class="sp-layer sp-black sp-padding hide-small-screen"
                                            data-horizontal="180" data-vertical="50"
                                            data-show-transition="left" data-hide-transition="up" data-show-delay="600" data-hide-delay="100">
                                            dolor sit amet
                                        </p>
                        
                                        <p class="sp-layer sp-white sp-padding hide-medium-screen"
                                            data-horizontal="315" data-vertical="50"
                                            data-show-transition="left" data-hide-transition="up" data-show-delay="800">
                                            consectetur adipisicing elit.
                                        </p> --}}
                                    @endforeach  
                                @endif   
                            </div>
                        @endif                    
                    @endforeach   
                </div>
        
                <div class="sp-thumbnails">
                    @foreach($carousel_data_list as $key => $value) 
                        @if(!empty($value['carousel_data']) )
                            <div class="sp-thumbnail">
                                <div class="sp-thumbnail-title">{{$value['carousel_data']['title']}}</div>
                                <div class="sp-thumbnail-description">{!! $value['carousel_data']['title_content'] !!}</div>
                            </div>
                        @endif                    
                    @endforeach    
                </div>
            </div>
        @endif
        {{--  間隔  --}}
        <div class="device_device_space">
            <br><br>
        </div>
        
        
        @foreach($device_data_list as $key => $value) 
            <div class="device_device_content">
                <div style="background: rgba(190,255,190,0.5);">  
                    <hr class="hr1"/>
                    <h3 style="font-weight:bold;">{{$key}}
                        @if($dir_data_list[$key] != null)
                            <a href="{{url('device/').'/'.$dir_data_list[$key]}}" target="_self">
                        @elseif($dir_data_list[$key] == null)
                            <a target="_self">
                        @endif
                            <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                more...
                            </div>
                        </a>
                    </h3>
                    <hr class="hr1"/>
                </div>  
    
                <div class="row">
                    @foreach($value as $key1 => $value1) 
                        @if(!empty($value1['device_data']))
                            <div class="figure_box btn-light">
                                <figure class="img_box imghvr-shutter-in-vert" style="background:red;">
                                    <img src="{{url($value1['device_data']['image'])}}">
                                    <figcaption style="background:red;">
                                    <h3>{{$value1['device_data']['title']}}</h3>
                                    <p>{!! $value1['device_data']['title_content'] !!}</p>
                                    </figcaption>
                                    @if($value1['device_data']['url'] != null)
                                        <a href="{{url($value1['device_data']['url'])}}"></a>
                                    @elseif($value1['device_data']['url'] == null)
                                        <a></a>
                                    @endif
                                </figure>
                                <textarea onclick="this.focus();this.select()" readonly>{{$value1['device_data']['name']}}</textarea>
                            </div>
                        @endif
                    @endforeach  
                </div>                     
            </div> 
        @endforeach    

        {{--  間隔  --}}
        <div class="device_device_space">
            <br><br>
        </div>

        @if(!(count($carousel_data_list) > 0 && 
        count($device_data_list) > 0)
        )
            <div class="device_device_content">
                <h3 style="font-weight:bold;">該節點無任何東西!!</h3> 
                <br><br>
                <br><br>
                <br><br><br><br>
                <br>&nbsp; 
            </div>
        @endif
        
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

