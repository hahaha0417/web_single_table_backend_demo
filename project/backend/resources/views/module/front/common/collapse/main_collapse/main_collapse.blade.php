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


<div class="collapse_content">
    {{--  標題列  --}}    
    <div class="title_content">
        <ul id="vertical_accordion_title" class="vertical_accordion">
            <li>
                <div class="ul_button link btn btn-dark">
                    <img class="ul_img" src="{{url($product_data['image'])}}"></img>
                    {{$model}} - feature
                </div>
                <ul class="submenu">
                    @foreach($item_title_nav_list as $key => $value) 
                        <li><a href="{{url($product).'/'.$dir.'feature'.$value['url']}}">{{$value['title']}}</a></li>
                        {{--  <li><a href="#">Develop</a></li>  --}}                    
                    @endforeach
                </ul>
            </li>
        </ui>
    </div> 

    <div class="accordion_content">
        <ul id="vertical_accordion" class="vertical_accordion">
            @foreach($item_nav_list as $key => $value) 
                <li><div class="link"><i class="fa {{$item_nav_class_list[$key]['title_class']}}"></i>{{$key}}<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        @foreach($value as $key1 => $value1) 
                            @if($product == "product")
                                <li><a href="{{url($product).'/'.$dir.'feature'.$value1['url']}}">{{$value1['title']}}</a></li>
                            @elseif($product == "device")
                                <li><a href="{{url($product).'/'.$dir.'model/'.$model.'/feature'.$value1['url']}}">{{$value1['title']}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>            
                {{--  <li><div class="link"><i class="fa fa-globe"></i>XXX<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="#">Google</a></li>
                        <li><a href="#">Yahoo</a></li>
                        <li><a href="#">PCHome</a></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>  --}}
            @endforeach
        </ul>
    </div>

    
    
</div>

{{--  快捷工具  --}}
<div class="bottom_content btn-secondary">
    <div class="content_button content_first_button btn btn-dark">
        <div style="font-size:2em; color:Tomato">
            <i class="fas fa-angle-double-left"></i>
        </div>
    </div>
    <div class="content_button content_prev_button btn btn-dark">
        <div style="font-size:2em; color:Tomato">
            <i class="fas fa-angle-left"></i>
        </div>
    </div>
    <div class="content_button content_next_button btn btn-dark">
        <div style="font-size:2em; color:Tomato">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>        
    <div class="content_button content_last_button btn btn-dark">
        <div style="font-size:2em; color:Tomato">
            <i class="fas fa-angle-double-right"></i>
        </div>
    </div>
</div>