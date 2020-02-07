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

<aside class="sidebar-menu fixed">
    <div class="sidebar-inner scrollable-sidebar">
        <div class="main-menu">
            <ul class="accordion">                
                @foreach($menu as $key => $value)

                    @if($value['type'] == "label")
                        <li class="menu-header">            
                            {{$key}}
                        </li>
                    @elseif($value['type'] == "item")
                        <li class="{{$value["active"]}}">           
                            <div class="stress" style="background:{{$value["background"]}};"></div>
                            @if($value["url"] != null)
                                <a href="{{url($value["url"])}}" target="{{$value["target"]}}">
                            @elseif($value["url"] == null)
                                <a target="{{$value["target"]}}">
                            @endif
                                <span class="menu-content block">
                                    <span class="menu-icon">
                                        <div style="font-size:1.5em; color:#fff">
                                            <i class="block fa {{$value["icon"]}} fa-lg"></i>
                                        </div>
                                    </span>
                                    <span class="text m-left-sm">{{$key}}</span>
                                </span>
                                <span class="menu-content-hover block">
                                    {{$value["mini"]}}
                                </span>
                            </a>
                        </li>
                    @elseif($value['type'] == "menu")
                        <li class="openable">
                            <div class="stress" style="background:{{$value["background"]}};"></div>
                            @if($value["url"] != null)
                                <a href="{{url($value["url"])}}" target="{{$value["target"]}}">
                            @elseif($value["url"] == null)
                                <a target="{{$value["target"]}}">
                            @endif
                                <span class="menu-content block">
                                    <span class="menu-icon">
                                        <div style="font-size:1.5em; color:#fff">
                                            <i class="block fa {{$value["icon"]}} fa-lg"></i>
                                        </div>
                                    </span>
                                    <span class="text m-left-sm">{{$key}}</span>
                                    <span class="submenu-icon"></span>
                                </span>
                                <span class="menu-content-hover block">
                                    {{$value["mini"]}}
                                </span>
                            </a>
                            <ul class="submenu">
                                @foreach($value["menu"] as $key2 => $value2)
                                    @if($value2['type'] == "item")
                                        <li><a style="background:{{$value2["background"]}};" href="{{url($value2["url"])}}" target="{{$value2["target"]}}"><span class="submenu-label">{{$key2}}</span></a></li>
                                    @elseif($value2['type'] == "menu")
                                        <li class="openable">
                                            <a href="{{url($value2["url"])}}" target="{{$value2["target"]}}">
                                                <span class="submenu-label">{{$key2}}</span>
                                                <small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">{{count($value2["menu"])}}</small>
                                            </a>
                                            <ul class="submenu third-level">
                                                @foreach($value2["menu"] as $key3 => $value3)
                                                    @if($value3['type'] == "item")
                                                        <li><a style="background:{{$value3["background"]}};" href="{{url($value3["url"])}}" target="{{$value3["target"]}}"><span class="submenu-label">{{$key3}}</span></a></li>
                                                    @elseif($value3['type'] == "menu")
                                                        <li class="openable">
                                                            <a href="{{url($value3["url"])}}" target="{{$value3["target"]}}">
                                                                <span class="submenu-label">{{$key3}}</span>
                                                                <small class="badge badge-danger badge-square bounceIn animation-delay2 m-left-xs pull-right">{{count($value3["menu"])}}</small>
                                                            </a>
                                                            <ul class="submenu fourth-level">
                                                                @foreach($value3["menu"] as $key4 => $value4)
                                                                    @if($value4['type'] == "item")
                                                                        <li><a style="background:{{$value4["background"]}};" href="{{url($value4["url"])}}" target="{{$value4["target"]}}"><span class="submenu-label">{{$key4}}</span></a></li>
                                                                    @elseif($value4['type'] == "menu")
                                                                        // 底部
                                                                    @endif
                                                                @endforeach
                                                                
                                                            </ul>
                                                        </li>   
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                                
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>	        
    </div>
</aside>