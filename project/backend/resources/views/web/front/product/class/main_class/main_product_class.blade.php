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

        
        {{-- slide pro --}}
        <link rel="stylesheet" type="text/css" href="{{asset("assets/plugin/slider-pro/dist/css/slider-pro.min.css")}}" media="screen"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{asset("assets/plugin/slider-pro/dist/js/jquery.sliderPro.min.js")}}"></script>
        {{--  bump_text  --}}
        <script type="text/javascript" src="{{asset("assets/plugin/text/bump_text/jquery.bumpytext.packed.js")}}"></script>
        <script type="text/javascript" src="{{asset("assets/plugin/text/bump_text/easying.js")}}"></script>
        <link href="{{asset("assets/plugin/text/bump_text/base.css")}}" rel='stylesheet' type='text/css'>
        {{--  skitter  --}}       
        <link href="{{asset("assets/plugin/skitter/css/styles.css")}}" type="text/css" media="all" rel="stylesheet" />
        <link href="{{asset("assets/plugin/skitter/dist/skitter.css")}}" type="text/css" media="all" rel="stylesheet" />        
        <script src="{{asset("assets/plugin/skitter/dist/jquery.skitter.min.js")}}"></script>
        <script src="{{asset("assets/plugin/skitter/js/jquery.easing.1.3.js")}}"></script>
        {{--  effect div  --}}
        <link href="{{asset("assets/plugin/effect/div/component.css")}}" type="text/css" media="all" rel="stylesheet" />        
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/front/product/class/main_class/main_product_class.css")}}">
        <script src="{{asset("assets/web/front/product/class/main_class/main_product_class.js")}}"></script>

        
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
        <?php $flag_ = 0; ?>
        @foreach($carousel_data_list as $key => $value) 
            @if(!empty($value['list_data']) )
                
            @endif
            @if(!empty($value['carousel_data']) )
                <?php $flag_ = 1; ?>
            @endif
        @endforeach   
        @if($flag_ == 1)  
            <div class="product_class_advertising">
                <div id="content">
                    <div class="skitter-large-box">
                        <div class="skitter skitter-large">
                            <ul>
                            @foreach($carousel_data_list as $key => $value) 
                                @if(!empty($value['list_data']) )
                                    
                                @endif
                                @if(!empty($value['carousel_data']) )
                                    <li>
                                        <a href="#random">
                                            <img src="{{url($value['carousel_data']['image'])}}" />
                                        </a>
                                        <div class="label_text">    
                                            {!! $value['carousel_data']['title_content'] !!}                                    
                                        </div>
                                    </li>
                                @endif 
                            @endforeach   
                            {{-- <li><a href="#cube"><img src="http://bqworks.com/slider-pro/images/image1_large.jpg" /></a><div class="label_text"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#see-more" class="btn btn-small btn-yellow">See more</a></p></div></li>
                            <li><a href="#cubeRandom"><img src="http://bqworks.com/slider-pro/images/image1_large.jpg" /></a><div class="label_text"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore officiis voluptatum reprehenderit vitae amet beatae dolorem labore dignissimos nesciunt. Harum, blanditiis suscipit beatae unde id non, necessitatibus praesentium nisi quidem. <a href="#" class="btn btn-small btn-yellow">See more</a></p></div></li>
                            <li><a href="#block"><img src="http://bqworks.com/slider-pro/images/image1_large.jpg" /></a><div class="label_text"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#" class="btn btn-small btn-yellow">See more</a></p></div></li>
                            <li><a href="#cubeStop"><img src="http://bqworks.com/slider-pro/images/image1_large.jpg" /></a><div class="label_text"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit eos nihil corrupti inventore id culpa repellat molestiae quam at molestias. <a href="#" class="btn btn-small btn-yellow">See more</a></p></div></li>  --}}
                            
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        @endif


        <div class="product_class_title">
            <h1 style="font-weight:bold;">XXX</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">XXX產品分類</h3>
            裡面有XXX產品分類和熱門產品
            <hr class="hr_title" />
        </div> 
        {{--  間隔  --}}
        <div class="product_class_space">
            <br><br>
        </div>

        

        {{--  間隔  --}}
        <div class="product_class_space">
            <br><br>
        </div>

        @foreach($product_data_list as $key => $value) 
            @if(!empty($value['product_data']) && count($value['product_item_data']) > 0 && !empty($value['product_label_data']))
                <div class="product_class_content">
                    <div style="background: rgba(190,255,190,0.5);">  
                        <hr class="hr1"/>
                        @if(!empty($value['product_data']))
                            <h3 style="font-weight:bold;">{{$value['product_data']['name']}}
                                @if($value['product_data']['url'] != null)
                                    <a href="{{url($value['product_data']['url'])}}" target="_self">
                                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                        more...
                                    </div>
                                @elseif($value['product_data']['url'] == null)
                                    <a target="_self">
                                    {{--  <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                        more...
                                    </div>  --}}
                                @endif
                                    
                                </a>
                            </h3>
                        @endif
                        <hr class="hr1"/>
                    </div>  

                    @if(count($value['product_item_data']) > 0)
                        <div id="{{'product_list'.$key}}" class="slider-pro product_list">
                            @if(!empty($value['product_item_data']))
                                <div class="sp-slides">       
                                    @foreach($value['product_item_data'] as $key1 => $value1)  
                                        <div class="sp-slide">                                    
                                            <img class="sp-image" src="#"        
                                                data-src="{{url($value1['image'])}}"
                                                data-retina="{{url($value1['image'])}}"/>   
                                                {{-- 這裡用item_item建立資料 caption & enter --}}
                                            {{-- <div class="sp-caption">
                                                {!! $value1['title_content'] !!}
                                            </div>
                                            <a href="{{url("product/aoi/oring")}}" target="_self">  
                                                <p class="sp-layer sp-black sp-padding" data-width="300" data-height="50" style="font-size:50px;"
                                                    data-position="bottomRight" data-horizontal="50" data-vertical="50"
                                                    data-show-transition="down" data-show-delay="500" data-hide-transition="up">
                                                    進入...
                                                </p>
                                            </a> --}}
                                        </div>
                                        {{-- <div class="sp-slide">                                    
                                            <img class="sp-image" src="#"        
                                                data-src="http://bqworks.com/slider-pro/images/image1_medium.jpg"
                                                data-retina="http://bqworks.com/slider-pro/images/image1_large.jpg"/>   
                                                                
                                            <div class="sp-caption">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </div>
                                            <a href="{{url("product/aoi/oring")}}" target="_self">  
                                                <p class="sp-layer sp-black sp-padding" data-width="300" data-height="50" style="font-size:50px;"
                                                    data-position="bottomRight" data-horizontal="50" data-vertical="50"
                                                    data-show-transition="down" data-show-delay="500" data-hide-transition="up">
                                                    進入...
                                                </p>
                                            </a>
                                        </div> --}}
                                    @endforeach                              
                                </div>      
                            @endif
                            @if(!empty($value['product_item_data']))
                                <div class="sp-thumbnails">  
                                    @foreach($value['product_item_data'] as $key1 => $value1)        
                                        <div class="sp-thumbnail">                          
                                            <div class="sp-thumbnail-image-container">                                       
                                                <img class="sp-thumbnail-image" src="{{url($value1['image'])}}"/>        
                                            </div>                        
                            
                                            <div class="sp-thumbnail-text">   
                                                <div class="sp-thumbnail-title">{{$value1['title']}}</div>        
                                                <div class="sp-thumbnail-description">{!! $value1['title_content'] !!}</div> 
                                            </div>                             
                                        </div>
                                        {{-- <div class="sp-thumbnail">                          
                                            <div class="sp-thumbnail-image-container">                                       
                                                <img class="sp-thumbnail-image" src="http://bqworks.com/slider-pro/images/image1_thumbnail.jpg"/>        
                                            </div>                        
                            
                                            <div class="sp-thumbnail-text">   
                                                <div class="sp-thumbnail-title">Lorem ipsum</div>        
                                                <div class="sp-thumbnail-description">Dolor sit amet, consectetur adipiscing</div> 
                                            </div>                             
                                        </div> --}}
                                    @endforeach  
                                </div>                              
                            @endif
                        </div>  
                    @endif

                    {{--  間隔  --}}
                    <div class="product_class_space">
                        <br><br>
                    </div>
        
                    <div class="description btn-dark">
                        @if(!empty($value['product_label_data']))
                            @foreach($value['product_label_data'] as $key1 => $value1) 
                                {!! $value1['content'] !!}
                            @endforeach 
                        @endif
                        {{-- <p class="bump_text">@ 最熱門的外觀檢測系統!!</p>
                        <p class="bump_text">@ 客戶之間強力推薦!!</p> --}}
                    </div> 
                </div>  
            @endif
        @endforeach 
        
        <div class="product_class_content client_box">
            <?php $flag1_ = 0; ?>
            @if(count($client_data_list) > 0)
                @foreach($client_data_list as $key => $value) 
                    @if(!empty($value['client_data']))
                        <?php $flag1_ = 1; ?>
                    @endif
                @endforeach
            @endif
            @if($flag1_ == 1)
                <div style="background: rgba(190,255,190,0.5);">  
                    <hr class="hr1"/>
                    <h3 style="font-weight:bold;">客戶群
                        {{--  <a href="{{url("client/aoi")}}" target="_self">  --}}
                        {{--  <a href="{{url("client/aoi")}}" target="_self">
                            <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                more...
                            </div>
                        </a>  --}}
                    </h3>
                    <hr class="hr1"/>
                </div>  
                
                <ul class="cbp-ig-grid">
                    @foreach($client_data_list as $key => $value) 
                        @if(!empty($value['client_data']))
                            <li>
                                @if($value['client_data']['url'] != null)
                                    <a href="{{url($value['client_data']['url'])}}">
                                @elseif($value['client_data']['url'] == null)
                                    <a>
                                @endif
                                    <img src="{{url($value['client_data']['image'])}}"/> 
                                    <h3 class="cbp-ig-title">{{$value['client_data']['title']}}</h3>
                                    <span class="cbp-ig-category">{{$value['client_data']['title_content']}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                    
                    {{-- <li>
                        <a href="http://www.jq22.com/demo/ResponsiveIconGrid/#">
                            <img src="{{url("image/front/product/home.png")}}"/> 
                            <h3 class="cbp-ig-title">Squid voluptate</h3>
                            <span class="cbp-ig-category">Fashion</span>
                        </a>
                    </li> --}}
                </ul>
            @endif
        </div>

        {{--  間隔  --}}
        <div class="product_class_space">
            <br><br>
        </div>

        @if(!(!empty($value['product_data']) && 
            count($value['product_item_data']) > 0 && 
            !empty($value['product_label_data'])) &&
            $flag_ == 0 &&
            $flag_ == 0
        )
            <div class="product_class_content">
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

