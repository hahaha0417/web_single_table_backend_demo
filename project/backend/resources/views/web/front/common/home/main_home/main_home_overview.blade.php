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

        

        <script src="{{asset("assets/plugin/carousel/water_wheel_carousel/water_wheel_carousel.min.js")}}"></script>

        <link rel="stylesheet" href="{{asset("assets/web/front/common/home/main_home/overview/main_home_overview.css")}}">
        <script src="{{asset("assets/web/front/common/home/main_home/overview/main_home_overview.js")}}"></script>
        <script>
            $(function(){     
                            
            });
            
        </script>
        <style>
            
            
        </style>
        
        <style type="text/css">
            
			
		</style>
        
        
    </head>
    <body>     
        <div class="home_overview_title">
            <h1 style="font-weight:bold;">Overview</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">hahaha™ 是個人網頁，用來放個人的東西 & 找工作用!!</h3>
            裡面有個人資訊 & 半成品 & 資源
            <hr class="hr_title" />
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="home_overview_space">
            <br><br>
        </div>
        
        <div class="row home_overview_content">
            @foreach($item_white as $key => $value)
                <div class="col-sm item btn-light">
                    {{--  示意圖  --}}
                    @if($value['image'] == null)
                        <img src="#"></img>
                    @else
                        <img src="{{url($value['image'])}}"></img>
                    @endif
                    <br/> 
                    {{--  標題  --}}
                    <div style="background: rgba(190,255,190,0.5);">  
                        <hr class="hr1"/>
                        <h3 style="font-weight:bold;">{{$value['title']}}
                            @if($value['url'] == null)
                                {{--  <a href="#" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>  --}}
                            @else
                                <a href="{{url($value['url'])}}" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>
                            @endif
                                
                            </a>
                        </h3>
                        <hr class="hr1"/>
                    </div>  
                    {{--  註解    --}}
                    {!! $value['describe_'] !!}
                    <hr class="hr1"/>   
                    {{--  簡短說明                   --}}
                    {!! $value['content'] !!}
                    <hr class="hr1"/>
                </div>                         
            @endforeach            
        </div>  

        <div class="home_overview_space">
            <br><br>
        </div>

        <div class="row home_overview_content2">
            @foreach($item_black as $key => $value)
                <div class="col-sm item btn-dark">
                    {{--  示意圖  --}}
                    @if($value['image'] == null)
                        <img src="#"></img>
                    @else
                        <img src="{{url($value['image'])}}"></img>
                    @endif
                    <br> 
                    {{--  標題  --}}
                    <div style="background: rgba(190,255,190,0.5);">  
                        <hr class="hr2"/>
                        <h3 style="font-weight:bold;">{{$value['title']}}
                            @if($value['url'] == null)
                                {{--  <a href="#" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>  --}}
                            @else
                                <a href="{{url($value['url'])}}" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>
                            @endif
                                
                            </a>
                        </h3>
                        <hr class="hr2"/>
                    </div>  
                    {{--  註解    --}}
                    {!! $value['describe_'] !!}
                    <hr class="hr2"/>   
                    {{--  簡短說明                   --}}
                    {!! $value['content'] !!}
                    <hr class="hr2"/>
                </div>
                
            @endforeach  
        </div> 

        <div class="home_overview_space">
            <br><br>&nbsp;
        </div>

        <div class="home_overview_title">
            <h3 style="font-weight:bold;">模組化練習</h3>
            <hr class="hr_title" />
            練習模組化用，侵權請告知<p>
            hahaha0417@hotmail.com
            <hr class="hr_title" />
        </div> 
        <p>

        <div class="row home_overview_content">
            @foreach($item_secondary as $key => $value)
                <div class="col-sm item btn-secondary">
                    {{--  示意圖  --}}
                    @if($value['image'] == null)
                        <img src="#"></img>
                    @else
                        <img src="{{url($value['image'])}}"></img>
                    @endif
                    <br/> 
                    {{--  標題  --}}
                    <div style="background: rgba(220,255,220,0.5);">  
                        <hr class="hr1"/>
                        <h3 style="font-weight:bold;">{{$value['title']}}
                            @if($value['url'] == null)
                                {{--  <a href="#" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>  --}}
                            @else
                                <a href="{{url($value['url'])}}" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>
                            @endif
                                
                            </a>
                        </h3>
                        <hr class="hr1"/>
                    </div>  
                    {{--  註解    --}}
                    {!! $value['describe_'] !!}
                    <hr class="hr1"/>   
                    {{--  簡短說明                   --}}
                    {!! $value['content'] !!}
                    <hr class="hr1"/>
                </div>                         
            @endforeach            
        </div>  

        <div class="home_overview_title">
            <h3 style="font-weight:bold;">測試頁面</h3>
            <hr class="hr_title" />
            將模組組合練習，侵權請告知<p>
            hahaha0417@hotmail.com
            <hr class="hr_title" />
        </div> 
        <p>

        <div class="row home_overview_content">
            @foreach($item_info as $key => $value)
                <div class="col-sm item btn-info">
                    {{--  示意圖  --}}
                    @if($value['image'] == null)
                        <img src="#"></img>
                    @else
                        <img src="{{url($value['image'])}}"></img>
                    @endif
                    <br/> 
                    {{--  標題  --}}
                    <div style="background: rgba(220,255,220,0.5);">  
                        <hr class="hr1"/>
                        <h3 style="font-weight:bold;">{{$value['title']}}
                            @if($value['url'] == null)
                                {{--  <a href="#" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>  --}}
                            @else
                                <a href="{{url($value['url'])}}" target="_parent">
                                <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                    more...
                                </div>
                            @endif
                                
                            </a>
                        </h3>
                        <hr class="hr1"/>
                    </div>  
                    {{--  註解    --}}
                    {!! $value['describe_'] !!}
                    <hr class="hr1"/>   
                    {{--  簡短說明                   --}}
                    {!! $value['content'] !!}
                    <hr class="hr1"/>
                </div>                         
            @endforeach            
        </div>  

        <div class="home_overview_space">
            <br><br>
        </div>

        <div class="carousel_content">
            <h1 style="text-align:center;">
                網路抓的圖，侵權請告知<br>
                hahaha0417@hotmail.com     
            </h1>
            <div id="water_wheel_carousel">
                @foreach($item_pic as $key => $value)
                    @if($value['image'] == null)
                        <img src="#" id="item-{{$key}}" /> 
                    @else
                        <img src="{{url($value['image'])}}" id="item-{{$key}}" /> 
                    @endif                                 
                @endforeach                
            </div>
            <div class="home_overview_space">
                <br>&nbsp;
            </div>
            <div id="water_wheel_carousel_button">
                <a href="#" id="water_wheel_carousel_prev" class="btn btn-dark">前一幅</a>　
                <a href="#" id="water_wheel_carousel_next" class="btn btn-dark">下一幅</a>
            </div>            
        </div>
        <div class="home_overview_space">
            <br><br>&nbsp;
        </div>
    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>


