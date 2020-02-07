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

<div class="plugin_banner">
    <img class="plugin_banner_change plugin_banner_pre" src="./assets/plugin/banner/banner/pre.png">
    <img class="plugin_banner_change plugin_banner_next" src="./assets/plugin/banner/banner/next.png">
    
    <div class="plugin_banner_cirbox">
        @foreach($pic_board as $key => $value)
            @if($key == 0)
                <div class="plugin_banner_cir plugin_banner_cr"></div>
            @else  
                <div class="plugin_banner_cir"></div>
            @endif 
        @endforeach  
    </div>
    <div class="plugin_banner_imgbox">
        @foreach($pic_board as $key => $value)
            @if($key == 0)
                <img class="plugin_banner_img plugin_banner_im" src="{{url($value['image'])}}" style="display: inline;">
            @else  
                <img class="plugin_banner_img" src="{{url($value['image'])}}" style="display: none;">
            @endif 
        @endforeach  
    </div>	
</div>

 
{{--  待修改:當往下捲動超過時黏在導航  --}}
<div class="plugin_follow_under_line_nav">
    <div class="bottomLine"></div>
    <ul class="nav home_nav">
        @foreach($nav as $key => $value)
            @if($value['order_'] != -1)
                @if($key == 0)
                    <li class="item selected_nav" name="{{$value['title_name']}}" url="{{url($value['url'])}}">{{$value['title']}}</li>
                @else  
                    <li class="item" name="{{$value['title_name']}}" url="{{url($value['url'])}}">{{$value['title']}}</li>
                @endif 
            @endif 
        @endforeach 
    </ul>
</div>
{{--  如需改成用ajax撈，須建立管理器，管理js & css在頭部不重複，目前沒要這樣做  --}}
{{--  iframe無法用ajax取得頁面內容替換  --}}
<iframe class="content_frame home_content_frame" loaded="0" id="home_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url("overview/")}}">
</iframe>
