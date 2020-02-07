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
        <link rel="stylesheet" href="{{asset("assets/web/front/product/model/feature/main_feature/main_model_feature.css")}}">
        <script src="{{asset("assets/web/front/product/model/feature/main_feature/main_model_feature.js")}}"></script>
        
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

        


        <div class="model_feature_title">
                <h1 style="font-weight:bold;">{{$product_data['title']}}</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">特色</h3>
            {!! $product_data['title_describe'] !!}
            <hr class="hr_title" />
        </div> 
        {{--  間隔  --}}
        <div class="model_feature_space">
            <br><br>
        </div>

        <div class="css_nav model_feature_title_nav">
            <div class="head_bg">
                <div class="cl top_h navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-3" id="">                                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#model_feature_title_nav_bar" 
                            aria-controls="model_feature_title_nav_bar" aria-expanded="false" aria-label="Toggle navigation">
                            <!-- .navbar-toggler-icon 漢堡式選單Icon -->
                            <span class="navbar-toggler-icon"></span>
                        </button>           
                    </div>  
                    <div class="nov m_l l collapse navbar-collapse navbar-ex1-collapse" id="model_feature_title_nav_bar">
                        <div id="tools_point">文件 X 驅動程式 X 教學</div>
                        
                        <ul class="nav navbar-nav ml-auto ">
                            @foreach($nav_list as $key => $value) 
                                @if($value['enabled'] == 1)
                                    <li class="nav-item">
                                        <a href="{{url($value['url'])}}" target="_self" class="hover"><span image_url="url(/image/front/product/model/overview.png)" class="db tingico liico0">
                                        </span>{{$value['name']}}</a>
                                    </li>
                                @endif 
                            @endforeach 

                            {{--  <li class="nav-item">
                                <a href="{{url("product/aoi/hahahalib")}}" target="_blank" class="hover"><span image_url="url(/image/front/product/model/overview.png)" class="db tingico liico0">
                                </span>Home</a>
                            </li>  
                            <li class="nav-item handle_b">
                                <a href="http://www.jq22.com/" class="hover5"><span image_url="url(/image/front/product/model/overview.png)" class="db tingico liico7">
                                </span>Download</a>
                            </li>  --}}
                            
                        </ul>    
                    </div>    
                    <div class="park"></div>    
                </div>    
            </div>    
        </div>
        
        <div id="content" >            
            <div id="left_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  collapse  --}}
                @include("fast_use.front.common.collapse.main_collapse") 
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="main_box">
                <div id="model_feature_content">  
                    @if(!empty($item))              
                        <iframe class="content_frame" id="feature_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url('product/').'/'.$class.'/'.$model.'/feature/'.$item.'/content'}}">
                        </iframe> 
                    @else
                        <iframe class="content_frame" id="feature_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url('product/').'/'.$class.'/'.$model.'/feature/'.'content'}}">
                        </iframe> 
                    @endif
                </div>
                {{-- <div id="model_feature_content">                
                        <iframe class="content_frame" id="feature_content_frame2" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url("product/aoi/hahahalib/feature/overview/content")}}">
                        </iframe> 
                </div>
                <div id="model_feature_content">                
                        <iframe class="content_frame" id="feature_content_frame3" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url("product/aoi/hahahalib/feature/overview/content")}}">
                        </iframe> 
                </div> --}}
            </div>
            {{--  <div id="right_box">  --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  relation  --}}
                {{--  @include("fast_use.front.common.relation.main_relation")    --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            {{--  </div>  --}}
        </div>
        <div class="up_button btn btn-dark">
            <div style="font-size:2em; color:Tomato">
                <i class="fas fa-angle-up"></i>
            </div>
        </div>
        <div class="menu_button btn btn-dark">
            <div style="font-size:2em; color:Tomato">
                <i class="fas fa-credit-card"></i>
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
            //lazyload();      
            // 必須至於最後處理
            
                            
        });
        
    </script>
</html>

