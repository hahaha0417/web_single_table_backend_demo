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
    
        
        {{--  flat accordion  --}}
        <link rel="stylesheet" href="{{asset("assets/plugin/accordion/flat_accordion/base.css")}}">
        <script src="{{asset("assets/plugin/accordion/flat_accordion/base.js")}}"></script>
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/front/common/home/main_home/feature/main_home_feature.css")}}">
        <script src="{{asset("assets/web/front/common/home/main_home/feature/main_home_feature.js")}}"></script>
        
        <script>
            $(function(){ 
                  
            });
             
        </script>
        <style>
                

        </style>
    </head>
    <body>        
        <div class="wrap_content">       
            <div class="home_feature_title">
                <h1 style="font-weight:bold;">Feature</h1>
                <hr class="hr_title" />
                <h3 style="font-weight:bold;">hahaha™ 主要工作領域為 : </h3>
                <div style="margin-left:20px;">
                    <h5>AOI(光學檢測 - C++ Builder)</h5>
                    <h5>Web(PHP & Laravel & HTML5 & jQuery)</h5>
                    <h5>OBS iForm(還沒做過 - C++ Builder)</h5>
                </div>
                目前在找Web職缺...
                <hr class="hr_title" />
            </div> 
            <p>
            {{--  間隔  --}}
            <div class="home_feature_space">
                <br><br>
            </div>
            {{--  由於是首頁，因此盡量從簡，不要太多樣式，以一些簡單樣式和內容表達東西  --}}
            {{--  由於從簡，一段文字配一張圖，不要兩張圖 太長了  --}}
            @foreach($item_vertical_accordion as $key => $value)
                <?php $flag = 0; ?>
                <?php $index = 0; ?>
                <div class="home_feature_content">
                    <div class="title">
                        <hr class="hr1"/>
                        <h1 style="font-weight:bold;">{{$value['title']}}</h1>
                        <hr class="hr1"/>
                    </div>
                    <div class="row">                        
                        <div class="col-md-offset-3 col-md-12">
                            <div class="panel-group accordion" id="accordion_{{$value['title']}}" role="tablist" aria-multiselectable="true">
                                <?php $item_index = 0; ?>
                                @foreach($item_item_vertical_accordion as $key_item => $value_item)
                                    @if($value['id'] != $value_item['id'])
                                        @continue;
                                    @endif
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading_{{$value['no']}}_{{$index}}_{{$item_index}}">
                                            <h4 class="panel-title">
                                                @if($flag == 0)
                                                    <a role="button" data-toggle="collapse" href="#collapse_{{$value['no']}}_{{$index}}_{{$item_index}}" aria-expanded="true" aria-controls="collapse_{{$value['no']}}_{{$index}}_{{$item_index}}"> 
                                                @else
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_{{$value['no']}}_{{$index}}_{{$item_index}}" aria-expanded="false" aria-controls="collapse_{{$value['no']}}_{{$index}}_{{$item_index}}"> 
                                                @endif 
                                                    {{$value_item['item']}}
                                                </a> 
                                            </h4>
                                        </div>
                                        {{--  data-parent="#accordion"要放容器這裡  --}}
                                        @if($flag == 0)
                                            <?php $flag = 1; ?>
                                            <div id="collapse_{{$value['no']}}_{{$index}}_{{$item_index}}" class="panel-collapse collapse show" data-parent="#accordion_{{$value['title']}}" role="tabpanel" aria-labelledby="heading_{{$value['no']}}_{{$index}}_{{$item_index}}">
                                        @else
                                            <div id="collapse_{{$value['no']}}_{{$index}}_{{$item_index}}" class="panel-collapse collapse" data-parent="#accordion_{{$value['title']}}" role="tabpanel" aria-labelledby="heading_{{$value['no']}}_{{$index}}_{{$item_index}}">
                                        @endif    
                                            <div class="panel-body">
                                                <div class="row btn-dark">
                                                    @if($key_item % 2 == 0)
                                                        <div class="col">                     
                                                            {!! $value_item['content'] !!}    
                                                        </div>
                                                        <div class="col">
                                                            <img src="{{url($value_item['image'])}}"></img>
                                                        </div>
                                                    @elseif($key_item % 2 == 1)
                                                        <div class="col">
                                                            <img src="{{url($value_item['image'])}}"></img>
                                                        </div>
                                                        <div class="col">                     
                                                            {!! $value_item['content'] !!}  
                                                        </div>                                                        
                                                    @endif                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <?php $item_index++; ?> 
                                @endforeach                                  
                            </div>
                        </div>
                    </div>
                    <hr class="hr1"/>
                </div>
                {{--  間隔  --}}
                <div class="home_feature_space">
                        <br><br>
                </div>
                <?php $index++; ?>
            @endforeach 
            
            
            <div class="flat_accordion">
                <div class="item_box">
                    <div class="content">
                        <ul>
                            <?php $flag = 0; ?>
                            @foreach($item_accordion as $key => $value)                                
                                <li class="li{{$key}}" id="li{{$key}}">  
                                    @if($flag == 0)                                         
                                        <div class="fold" style="display:none;"> 
                                    @else
                                        <div class="fold"> 
                                    @endif   
                                        @if($value['title_image'] == null || $value['title_image'] == '#')  
                                            <div class="box"></div>  
                                        @else
                                            <img src="{{url($value['title_image'])}}" /> 
                                        @endif   
                                        <span class="txt">{{$value['title']}}</span> 
                                        <div style="font-size:3em; color:white">
                                            <i class="fas fa-angle-double-right"></i>
                                        </div>           
                                    </div>  
                                    @if($flag == 0)    
                                        <?php $flag = 1; ?>    
                                        <div class="unfold" style="display:block;"> 
                                    @else
                                        <div class="unfold"> 
                                    @endif          
                                        <dl>        
                                            <dt>
                                                @if($value['image'] == null || $value['image'] == '#')     
                                                    <div class="box"></div>  
                                                @else
                                                    <img src="{{url($value['image'])}}" /> 
                                                @endif   
                                            </dt>        
                                            {!! $value['describe_'] !!}   
                                        </dl>        
                                    </div>        
                                </li> 
                            @endforeach 
                        </ul>  
                    </div>    
                </div>
            </div>
            
            <div class="home_feature_space">
                <br><br>
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

