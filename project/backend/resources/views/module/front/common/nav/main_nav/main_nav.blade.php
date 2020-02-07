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


<header>
    {{-- https://ithelp.ithome.com.tw/articles/10192870?sc=iThelpR --}}
    <div class="container">
        
        <!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
        <!-- navbar-dark 文字顏色 .bg-dark 背景顏色 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">                 
            <!-- .navbar-brand 左上LOGO位置 -->
            {{--  第一個會固定在左邊，後面的會在縮小時跑到右邊  --}}
            
            <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark mr-auto">
                @foreach($navlist as $key => $value)   
                    @if($value['name'] == 'title')                              
                        <a class="navbar-brand" href="/" >
                            {{-- <img src="images/H-logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
                            <div width="50" height="50" class="header_bar_button d-inline-block align-center" alt="" style="font-size:2em; color:rgb(190,255,190)">
                                <i class="{{$value['icon']}}"></i>
                            </div>
                            <span class="h3 mx-1">{{$value['title']}}</span>                                              
                        </a>
                    @endif 
                @endforeach 
                @foreach($navlist as $key => $value) 
                    @if($value['name'] == 'sub_content' || $value['name'] == 'search')                      
                        <div class="collapse navbar-collapse navbar-ex1-collapse">     
                            @if($value['name'] == 'sub_content' && $value['visible'] == "true")
                                <button class="header_bar_button btn btn-dark">
                                    <span class="navbar-toggler-icon"></span>
                                </button> 
                            @endif
                            @if($value['name'] == 'search' && $value['visible'] == "true")
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2 {{$value['enabled']}}" type="text" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0 {{$value['enabled']}}" type="submit">Search
                                    </button>
                                </form>   
                            @endif                     
                        </div> 
                    @endif                         
                @endforeach 
            </div>   
            @if(Auth::check())
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-1" id="">
                    <div class="header_user_name"><a class="nav-link">{{Auth::user()['name']}} 您好</a></div>  
                </div>  
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-1" id="">
                    <div class="header_user_logout btn btn-dark"><a href="/logout" class="nav-link">登出</a></div> 
                </div>   
            @else
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-1" id="">
                    <div class="header_user_login btn btn-dark"><a href="/login" class="nav-link">登入</a></div> 
                </div>   
            @endif
            <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark ml-3" id="">
                @foreach($navlist as $key => $value) 
                    @if($value['name'] == 'sub_content' || $value['name'] == 'search')                     
                        @if($value['name'] == 'sub_content' && $value['visible'] == "true")                        
                            <button class="header_bar_button navbar-toggler btn btn-dark">
                                <span class="navbar-toggler-icon"></span>
                            </button>                             
                        @endif
                    @endif                         
                @endforeach 
            </div>    
           
            
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar_content">
                <!-- 被float right推過去 -->
                {{--  https://ithelp.ithome.com.tw/articles/10192870  --}}
                <ul class="navbar-nav ml-auto">
                    @foreach($navlist as $key => $value)   
                        @if($value['visible'] == "true")
                            @if($value['item'] == 'item')  
                                @if(Auth::check())
                                    @if(!($value['name'] == 'login'))
                                        @if($value['name'] == 'member')
                                            @if($value['url'] != null)
                                                <li class="nav-item"><a class="nav-link" href="{{$value['url']}}">{{Auth::user()['name']}} 您好</a></li>
                                            @elseif($value['url'] == null)
                                                <li class="nav-item"><a class="nav-link" >{{Auth::user()['name']}} 您好</a></li>
                                            @endif
                                        @else 
                                            @if($value['url'] != null)
                                                <li class="nav-item"><a class="nav-link" href="{{$value['url']}}">{{$value['title']}}</a></li>
                                            @elseif($value['url'] == null)
                                                <li class="nav-item"><a class="nav-link" >{{$value['title']}}</a></li>
                                            @endif 
                                        @endif
                                    @endif
                                @else
                                    @if(!($value['name'] == 'member' || $value['name'] == 'logout'))
                                        @if($value['url'] != null)
                                            <li class="nav-item"><a class="nav-link" href="{{$value['url']}}">{{$value['title']}}</a></li>
                                        @elseif($value['url'] == null)
                                            <li class="nav-item"><a class="nav-link" >{{$value['title']}}</a></li>
                                        @endif 
                                    @endif
                                @endif                             
                            @endif 
                        @endif
                    @endforeach 
                    @foreach($navlist as $key => $value)  
                        @if($value['visible'] == "true") 
                            @if($value['name'] == 'select_language')                          
                                <!-- li裡面還有ul !!! -->
                                <!-- 按下後，增加class open -->
                                <li class="nav-item dropdown" style="z-index:1100;">
                                    @if($value['url'] != null)
                                        <a class="nav-link dropdown-toggle popupmenu" href="{{$value['url']}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">選擇語言</a>
                                    @elseif($value['url'] == null)
                                        <a class="nav-link dropdown-toggle popupmenu" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">選擇語言</a>
                                    @endif
                                    <!-- .dropdown-menu 下拉選單內容 -->
                                    <div class="dropdown-menu">
                                        @foreach($value['menu'] as $key1 => $value1)   
                                            <a class="dropdown-item" href="#">{{$value1['title']}}</a>
                                        @endforeach 
                                    </div>
                                </li>
                            @endif 
                        @endif 
                    @endforeach 
                </ul>
            </div> 
            
        </nav>    
        
    </div>   
       
</header>    
{{-- //////////////////// --}}
<div id="header_bar">
    
    {{-- https://ithelp.ithome.com.tw/articles/10192870?sc=iThelpR --}}
    <div class="container">

        

        <!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
        <!-- navbar-dark 文字顏色 .bg-dark 背景顏色 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">  
            {{--  <div class="navbar-brand" href="/" >   
                
            </div>  --}}
            @if(Auth::check())
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark mr-1">
                    <div class="header_user_sub_name"><a class="nav-link">{{Auth::user()['name']}} 您好</a></div>  
                </div>
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark mr-1">
                    <div class="header_user_sub_logout btn btn-dark"><a href="/logout" class="nav-link">登出</a></div>  
                </div>
            @else
                <div class="navbar-nav navbar-expand-lg navbar-dark bg-dark mr-1">
                    <div class="header_user_sub_login btn btn-dark"><a href="/login" class="nav-link">登入</a></div>  
                </div>
            @endif
            {{-- 縮小時才會出現 --}}
            <!-- .navbar-toggler 漢堡式選單按鈕 -->
            <button class="header_sub_button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <!-- .navbar-toggler-icon 漢堡式選單Icon -->
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- .collapse.navbar-collapse 用於外層中斷點群組和隱藏導覽列內容 -->
            <!-- 選單項目&漢堡式折疊選單 -->
            <div class="header_sub .nov collapse navbar-collapse bg-dark" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin:5px 5px">
                    <!-- active表示當前頁面 -->
                    {{--  主要區塊  --}}
                    @foreach($navlist['item_sub_content']['menu'] as $key => $value) 
                        @if($value['visible'] == "true")
                            @if($value['item'] == 'seperater')  
                                <a class="nav-link">|</a>  
                            @elseif($value['type'] == 'collection_list')  
                                {{--  小選單  --}}
                                <!-- .dropdown Navbar選項使用下拉式選單 -->
                                <li class="nav-item dropdown {{$value['enabled']}} " style="z-index:100;">
                                    @if($value['url'] != null)
                                        <a class="nav-link dropdown-toggle popupmenu" href="{{url($value['url'])}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$value['title']}}</a>
                                    @else 
                                        <a class="nav-link dropdown-toggle popupmenu" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$value['title']}}</a>
                                    @endif
                                    
                                    <!-- .dropdown-menu 下拉選單內容 -->
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach($value['menu'] as $key1 => $value1) 
                                            @if($value['url'] != null)
                                                <a class="dropdown-item" href="{{url($value['url'])}}">{{$value1['title']}}</a>
                                            @else 
                                                <a class="dropdown-item">{{$value1['title']}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @elseif($value['type'] == 'item' && $value['url'] != null)  
                                <li class="nav-item header_bar_{{$value['name']}} btn-dark {{$value['enabled']}}" style="z-index:100;">
                                    <a class="nav-link" href="{{url($value['url'])}}">{{$value['title']}}</a>
                                </li> 
                            @elseif($value['type'] == 'item' && $value['url'] == null)  
                                <li class="nav-item header_bar_{{$value['name']}} btn-dark {{$value['enabled']}} " style="z-index:100;">
                                    <a class="nav-link" >{{$value['title']}}</a>
                                </li> 
                            @elseif($value['type'] == 'menu' && $value['url'] != null)                         
                                <li class="nav-item header_bar_item header_bar_{{$key}} {{$value['enabled']}} " id="{{$key}}">
                                    <a class="nav-link" href="{{url($value['url'])}}">{{$value['title']}}</a>
                                </li>
                            @elseif($value['type'] == 'menu' && $value['url'] == null)  
                                <li class="nav-item header_bar_item header_bar_{{$key}} {{$value['enabled']}} " id="{{$key}}">
                                    <a class="nav-link" >{{$value['title']}}</a>
                                </li>
                            @endif  
                        @endif
                    @endforeach 
                    <li class="nav-item" style="z-index:0;">                        
                        {{-- 用來清楚顯示框的 --}}
                        <div class="header_bar_box" style="position:absolute;margin:0;padding:0;;width:600px;height:20%;left:0;top:-20%;z-index:0;">
                            &nbsp;&nbsp;
                        </div>
                        <div class="header_bar_box" style="position:absolute;margin:0;padding:0;;width:400px;height:100%;left:180px;top:0;z-index:0;">
                                &nbsp;&nbsp;
                        </div>
                        <div class="header_bar_box" style="position:absolute;margin:0;padding:0;width:85%;height:20px;left:274px;top:60px;z-index:0;">
                            &nbsp;&nbsp;
                        </div>  
                        {{--  <div class="header_bar_box" style="position:absolute;margin:0;padding:0;;width:600px;height:20%;left:0;top:-20%;z-index:0;">
                            &nbsp;&nbsp;
                        </div>
                        <div class="header_bar_box" style="position:absolute;margin:0;padding:0;;width:400px;height:100%;left:270px;top:0;z-index:0;">
                                &nbsp;&nbsp;
                        </div>
                        <div class="header_bar_box" style="position:absolute;margin:0;padding:0;width:85%;height:20px;left:274px;top:60px;z-index:0;">
                            &nbsp;&nbsp;
                        </div>                           --}}
                    </li>                    
                </ul>                          
            </div>                    
        </nav> 
    </div> 
      
</div>  
{{-- //////////////////////// --}}

{{-- ////////////////////// --}}
<div id="header_content_bar">
    {{--  身體區塊  --}}
    <div class="container">
        <div class="header-right">
            <div class="main-menu">
                <div class="menu">                            
                    <ul>
                        @foreach($navlist['item_sub_content']['menu'] as $key => $value)  
                            @if($value['item'] == 'category')  
                                <li class="firstlevel">
                                {{--" "  normal-sub categorylist-sub categorylist  --}}
                                {{-- 由於空間有限，這裡用手key --}}   
                                    <div class="menublock" id="{{$value['name']}}" style="display: none; opacity: 1;">
                                        <ul class="container">
                                            @foreach($value['menu'] as $key1 => $value1) 
                                                @if($value1['item'] == 'category')
                                                    <li class="category">
                                                        {{$value1['title']}}
                                                    </li>
                                                @elseif($value1['item'] == 'category_item')
                                                    <li class="parentitem">
                                                        @if($value1['url'] != null)
                                                            <a href="{{url($value1['url'])}}">{{$value1['title']}}
                                                        @else 
                                                            <a>{{$value1['title']}}
                                                        @endif
                                                            <sup>
                                                                ™®
                                                            </sup>
                                                        </a>
                                                        <ul style="display: none; opacity: 1;">
                                                            <li>
                                                                <a>Overview
                                                                </a>
                                                            </li>                                            
                                                            <li class="buttonlink">
                                                                <a class="btn btn-green disabled" title="" href="#" >Free Trial
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>  
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>                                                                                  
                                </li>
                            @elseif($value['item'] == 'categorylist') 
                                <li class="firstlevel categorylist-sub">                            
                                    <div class="menublock" id="{{$value['name']}}" style="display:none">
                                        <ul class="container">  
                                            @foreach($value['menu'] as $key1 => $value1)                                           
                                                <li class="categorylist">
                                                    <ul>
                                                        @foreach($value1['menu'] as $key2 => $value2) 
                                                        
                                                            @if($value2['item'] == 'categorylist')
                                                                <li class="category">
                                                                    {{$value2['title']}}
                                                                </li>
                                                            @elseif($value2['item'] == 'categorylist_item')
                                                                <li>
                                                                    <a href="{{$value2['url']}}" class="new">{{$value2['title']}}
                                                                    </a>
                                                                </li>
                                                            @endif                                                        
                                                        @endforeach
                                                    </ul>
                                                </li> 
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endif 
                        @endforeach  
                    </ul>
                </div>
            </div>
            <!-- END: Modules Anywhere -->
        </div>
    </div>
</div>  