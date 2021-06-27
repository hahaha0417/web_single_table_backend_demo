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
                                @if(empty($menu_target) || $menu_target != $value['name'])
                                    <a href="{{url($value["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value["name"])}}" class="default_page_link" id="{{$value["name"]}}" target="{{$value["target"]}}">
                                @else
                                    <a href="{{url($value["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value["name"])}}" class="default_page_link target" id="{{$value["name"]}}" target="{{$value["target"]}}">
                                @endif     
                                @elseif($value["url"] == null)
                                @if(empty($menu_target) || $menu_target != $value['name'])
                                    <a default_page="{{\p_ha::V_Url("page/" . $value["name"])}}" class="default_page_link" id="{{$value["name"]}}" target="{{$value["target"]}}">
                                @else
                                    <a default_page="{{\p_ha::V_Url("page/" . $value["name"])}}" class="default_page_link target" id="{{$value["name"]}}" target="{{$value["target"]}}">
                                @endif     
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
                        @if(empty($menu_open[$key]))
                            <li class="openable">
                        @else
                            <li class="openable open">
                        @endif                        
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
                                        @if($value2["url"] != null)
                                            <li>
                                            @if(empty($menu_target) || $menu_target != $value2['name'])
                                                <a style="background:{{$value2["background"]}};" href="{{url($value2["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value2["name"])}}" class="default_page_link" id="{{$value2["name"]}}" target="{{$value2["target"]}}"><span class="submenu-label">{{$key2}}</span></a>
                                            @else
                                                <a style="background:{{$value2["background"]}};" href="{{url($value2["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value2["name"])}}" class="default_page_link target" id="{{$value2["name"]}}" target="{{$value2["target"]}}"><span class="submenu-label">{{$key2}}</span></a>
                                            @endif 
                                            </li>
                                        @elseif($value2["url"] == null)
                                            <li>
                                            @if(empty($menu_target) || $menu_target != $value2['name'])
                                                <a style="background:{{$value2["background"]}};" default_page="{{\p_ha::Url("page/" . $value2["name"])}}" class="default_page_link" id="{{$value2["name"]}}" target="{{$value2["target"]}}"><span class="submenu-label">{{$key2}}</span></a>
                                            @else
                                                <a style="background:{{$value2["background"]}};" default_page="{{\p_ha::Url("page/" . $value2["name"])}}" class="default_page_link target" id="{{$value2["name"]}}" target="{{$value2["target"]}}"><span class="submenu-label">{{$key2}}</span></a>
                                            @endif 
                                            </li>
                                        @endif                                        
                                    @elseif($value2['type'] == "menu")
                                        @if(empty($menu_open[$key2]))
                                            <li class="openable">
                                        @else
                                            <li class="openable open">
                                        @endif   
                                            @if($value2["url"] != null)
                                                <a href="{{url($value2["url"])}}" target="{{$value2["target"]}}">
                                            @elseif($value2["url"] == null)
                                                <a target="{{$value2["target"]}}">
                                            @endif    
                                                    <span class="submenu-label">{{$key2}}</span>
                                                    <small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">{{count($value2["menu"])}}</small>
                                                </a>                                           
                                            <ul class="submenu third-level">
                                                @foreach($value2["menu"] as $key3 => $value3)
                                                    @if($value3['type'] == "item")
                                                        @if($value3["url"] != null)
                                                            <li> 
                                                            @if(empty($menu_target) || $menu_target != $value3['name'])
                                                                <a style="background:{{$value3["background"]}};" href="{{url($value3["url"])}}" default_page="{{\p_ha::Url("page/" . $value3["name"])}}" class="default_page_link" id="{{$value3["name"]}}" target="{{$value3["target"]}}"><span class="submenu-label">{{$key3}}</span></a>
                                                            @else
                                                                <a style="background:{{$value3["background"]}};" href="{{url($value3["url"])}}" default_page="{{\p_ha::Url("page/" . $value3["name"])}}" class="default_page_link target" id="{{$value3["name"]}}" target="{{$value3["target"]}}"><span class="submenu-label">{{$key3}}</span></a>
                                                            @endif                                                                 
                                                            </li>
                                                        @elseif($value3["url"] == null)
                                                            <li> 
                                                            @if(empty($menu_target) || $menu_target != $value3['name'])
                                                            <a style="background:{{$value3["background"]}};" default_page="{{\p_ha::Url("page/" . $value3["name"])}}" class="default_page_link" id="{{$value3["name"]}}" target="{{$value3["target"]}}"><span class="submenu-label">{{$key3}}</span></a>
                                                            @else
                                                            <a style="background:{{$value3["background"]}};" default_page="{{\p_ha::Url("page/" . $value3["name"])}}" class="default_page_link target" id="{{$value3["name"]}}" target="{{$value3["target"]}}"><span class="submenu-label">{{$key3}}</span></a>
                                                            @endif 
                                                            </li>  
                                                        @endif                                                        
                                                    @elseif($value3['type'] == "menu")
                                                        @if(empty($menu_open[$key3]))
                                                            <li class="openable">
                                                        @else
                                                            <li class="openable open">
                                                        @endif   
                                                            @if($value3["url"] != null)
                                                                <a href="{{url($value3["url"])}}" target="{{$value3["target"]}}">
                                                            @elseif($value3["url"] == null)
                                                                <a target="{{$value3["target"]}}">
                                                            @endif  
                                                                    <span class="submenu-label">{{$key3}}</span>
                                                                    <small class="badge badge-danger badge-square bounceIn animation-delay2 m-left-xs pull-right">{{count($value3["menu"])}}</small>
                                                                </a>                                                             
                                                            <ul class="submenu fourth-level">
                                                                @foreach($value3["menu"] as $key4 => $value4)
                                                                    @if($value4['type'] == "item")
                                                                        @if($value4["url"] != null)
                                                                            <li> 
                                                                            @if(empty($menu_target) || $menu_target != $value4['name'])
                                                                                <a style="background:{{$value4["background"]}};" href="{{url($value4["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value4["name"])}}" class="default_page_link" id="{{$value4["name"]}}" target="{{$value4["target"]}}"><span class="submenu-label">{{$key4}}</span></a>
                                                                            @else
                                                                                <a style="background:{{$value4["background"]}};" href="{{url($value4["url"])}}" default_page="{{\p_ha::V_Url("page/" . $value4["name"])}}" class="default_page_link target" id="{{$value4["name"]}}" target="{{$value4["target"]}}"><span class="submenu-label">{{$key4}}</span></a>
                                                                            @endif 
                                                                            </li>
                                                                        @elseif($value4["url"] == null)
                                                                            <li> 
                                                                            @if(empty($menu_target) || $menu_target != $value4['name'])
                                                                                <a style="background:{{$value4["background"]}};" default_page="{{\p_ha::Url("page/" . $value4["name"])}}" class="default_page_link" id="{{$value4["name"]}}" target="{{$value4["target"]}}"><span class="submenu-label">{{$key4}}</span></a>
                                                                            @else
                                                                                <a style="background:{{$value4["background"]}};" default_page="{{\p_ha::Url("page/" . $value4["name"])}}" class="default_page_link target" id="{{$value4["name"]}}" target="{{$value4["target"]}}"><span class="submenu-label">{{$key4}}</span></a>
                                                                            @endif 
                                                                            </li>
                                                                        @endif                                                                        
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