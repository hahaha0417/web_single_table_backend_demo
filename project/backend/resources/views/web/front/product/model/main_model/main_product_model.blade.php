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
        {{--  h5_vedio  --}}
        <link rel="stylesheet" href="{{asset("assets/plugin/video/h5_video/detail_p.css")}}">
        <link rel="stylesheet" href="{{asset("assets/plugin/video/h5_video/font/font_u4qz1594lnixusor.css")}}">
        <script src="{{asset("assets/plugin/video/h5_video/h5_video.js")}}"></script>
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/front/product/model/main_model/main_product_model.css")}}">
        <script src="{{asset("assets/web/front/product/model/main_model/main_product_model.js")}}"></script>
        
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


 

        <div class="product_model_title">
            <h1 style="font-weight:bold;">{{$product_data['title']}}</h1>
            <hr class="hr_title" />
            {{--  <h3 style="font-weight:bold;">個人函式庫</h3>  --}}
            {!! $product_data['title_describe'] !!}
            <hr class="hr_title" />
        </div> 
        {{--  間隔  --}}
        <div class="product_model_space">
            <br><br>
        </div>

        <div class="css_nav product_model_title_nav">
            <div class="head_bg">
                <div class="cl top_h navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-3" id="">                                       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#product_model_title_nav_bar" 
                            aria-controls="product_model_title_nav_bar" aria-expanded="false" aria-label="Toggle navigation">
                            <!-- .navbar-toggler-icon 漢堡式選單Icon -->
                            <span class="navbar-toggler-icon"></span>
                        </button>           
                    </div>    
                    <div class="nov m_l l collapse navbar-collapse navbar-ex1-collapse" id="product_model_title_nav_bar">
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

        <!--视频的-->
        <div class="main_video">
            <div class="videos">
                <!--bottom-->
                <div class="video_b">
                    <div class="video_b_in">
                        <div class="video_ls off">
                            {{--  有空換成嵌入youtube的  --}}
                            @foreach($video_list as $key => $value) 
                                @if($key == 0)
                                    <video id="vids" src="{{url($value['url'])}}">
                                        您的浏览器不支持h5标签,请升级或换个浏览器
                                    </video>
                                @endif
                            @endforeach
                            <!--标题-->
                            <div class="title_top">
                                视频标题
                            </div>
                            <!--列表菜单-->
                            <div class="list_right">
                                <div class="list_right_content">
                                    <a href="javascript:void(0)" id="like"><i class="iconfont icon-xinxing2"></i></a>
                                    <a href="javascript:void(0)" id="zan"><i class="iconfont icon-dianzan"></i></a>
                                    <a href="javascript:void(0)"><i class="iconfont icon-pinglun"></i></a>
                                    <a href="javascript:void(0)"><i class="iconfont icon-zhuanfa"></i></a>
                                    <a href="javascript:void(0)"><i class="iconfont icon-gerenyetianjiajiaguanzhu"></i></a>
                                </div>
                            </div>
                            <!--暂停-->
                            <div id="pass">
                                <img src="{{asset("assets/plugin/video/h5_video/image/zt.png")}}">
                            </div>
                            <!--控制器-->
                            <div class="controls">
                                <!--进度条容器-->
                                <div id="pBar">
                                    <!--进度条底色-->
                                    <div class="pBar_bj">
                                        <!--缓冲的进度条-->
                                        <div id="buff"></div>
                                        <!--进度条动态-->
                                        <div id="pBar_move">
                                            <!--进度条按钮-->
                                            <div id="pBtn"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--展厅播放快进快退音量全屏-->
                                <div class="trol_list">
                                    <!--暂停和快进快退-->
                                    <div class="list_1">
                                        <i class="iconfont icon-kuaitui-copy" onClick="ktui()"></i>
                                        <i class="iconfont icon-zanting2" id="ztbf"></i>
                                        <i class="iconfont icon-kuaijin" onClick="kjin()"></i>
                                    </div>
                                    <!--音量-->
                                    <div class="voice">
                                        <img class="volumn_img" id="volumn_img" src="/assets/plugin/video/h5_video/image/volumn on.png" width="25px" height="25px" style="float:left;"></i>
                                        <div class="voicep">
                                            <div id="vBar">
                                                <div id="vBar_in"></div>
                                            </div>
                                            <div id="vBtn"></div>
                                        </div>
                                    </div>
                                    <!--时间-->
                                    <div class="vtime">
                                        <font id="nTime">00:00:00</font>/<em id="aTime">00:00:00</em>
                                    </div>
                                    <!--全屏-->
                                    <i id="qp" class="iconfont icon-quanping"></i>
                                </div>
                            </div> 
                        </div>
                        <div class="video_rs">
                            <!--top-->
                            <div class="video_rs_t">
                                <span>影片</span>
                                {{count($video_list)}}视频
                                <div class="btnadd">+</div>
                            </div>
                            <!--bottom-->
                            <div class="video_rs_b">
                                <!--一条-->
                                @foreach($video_list as $key => $value) 
                                    <div class="one_tb" vid_src="{{url($value['url'])}}">
                                        <span class="one_tb_l">1</span>
                                        <div class="one_tb_c">
                                            <img src="{{url($value['image'])}}">
                                            <b></b>
                                        </div>
                                        <div class="one_tb_r">
                                            <h3>{{$value['title']}}</h3>
                                            <p>{{$value['title_describe']}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                {{--  <div class="one_tb" vid_src="{{url("video/Oring.mp4")}}">
                                    <span class="one_tb_l">1</span>
                                    <div class="one_tb_c">
                                        <img src="{{url("image/front/home/overview/Oring檢測系統.jpg")}}">
                                        <b></b>
                                    </div>
                                    <div class="one_tb_r">
                                        <h3>视频标题</h3>
                                        <p>视频简介一下视频简介一下</p>
                                    </div>
                                </div>  --}}

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="product_model_content">
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

