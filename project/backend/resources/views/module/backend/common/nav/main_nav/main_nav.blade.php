

<header class="top-nav">       
    {{-- https://ithelp.ithome.com.tw/articles/10192870?sc=iThelpR --}}
    <div class="container">
        <!-- .navbar-expand-{sm|md|lg|xl}決定在哪個斷點以上就出現漢堡式選單 -->
        <!-- navbar-dark 文字顏色 .bg-dark 背景顏色 -->
        <div class="top-nav-inner navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url("backend")}}" >
                {{-- <img src="images/H-logo.svg" width="30" height="30" class="d-inline-block align-top" alt=""> --}}
                <div width="50" height="50" class="header_bar_button d-inline-block align-center" alt="" style="font-size:2em; color:rgb(190,255,190)">
                    <i class="fas fa-comment"></i>
                </div>
                <span class="h3 mx-1">hahaha</span>      
                <span class="h6 mx-1">Backend</span>      
                                                
            </a>
            <div class="main_munu_button navbar-toggle pull-left">
                <button class="btn btn-dark" style="width: 80px;height: 60px;">
                    <span class="navbar-toggler-icon"></span>
                </button> 
            </div>
            {{--  <div class="navbar-toggle pull-left">
                <ul class="nav-notification collapse navbar-collapse">	
                    <li class="search-list">
                        <div class="search-input-wrapper">
                            <div class="search-input">
                                <input type="text" class="form-control input-sm inline-block">                                
                            </div>                            
                        </div>
                    </li>
                    <li class="search-list">
                        <div class="btn btn-dark" style="font-size:2em; color:white">
                            <i class="fas fa-search"></i>
                        </div>
                    </li>
                </ul>     
            </div>  --}}

            

            {{--  <div class="navbar-toggle ml-auto">
                <ul class="nav-notification collapse navbar-collapse">
                    <li>
                        <div class="btn-group open" style="width:80px; height:60px;">
                            <a class="btn btn-dark" href="#">
                                <div style="font-size:2em; color:white">
                                    <i class="fas fa-clone"></i>
                                </div>
                            </a>
                            <a class="btn btn-dark" data-toggle="dropdown" href="#">
                                <div style="font-size:2em; color:white">
                                    <i class="fas fa-caret-down"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-sm pull-right user-dropdown">
                                <li class="user-avatar">
                                    <img src="#" alt="" class="img-circle">
                                    <div class="user-content">
                                        <h5 class="no-m-bottom">Jane Doe</h5>
                                        <div class="m-top-xs">
                                            <a href="profile.html" class="m-right-sm">Profile</a>
                                            <a href="signin.html">Log out</a>
                                        </div>
                                    </div>
                                </li>	  
                                <li>
                                    <a href="inbox.html">
                                        Inbox
                                        <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                                    </a>
                                </li>			  
                                <li>
                                    <a href="#">
                                        Notification
                                        <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                                    </a>
                                </li>			  
                                <li>
                                    <a href="#" class="sidebarRight-toggle">
                                        Message
                                        <span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
                                    </a>
                                </li>			  	  
                                <li class="divider"></li>
                                <li>
                                    <a href="#">Setting</a>
                                </li>			  	  
                            </ul>
                        </div>                        
                    </li>
                </ul>
                <ul class="nav-notification collapse navbar-collapse">
                    <li>
                        <a href="#" data-toggle="dropdown"><i class="fa fa-envelope fa-lg"></i></a>
                        <span class="badge badge-secondary bounceIn animation-delay5 active">2</span>
                        <ul class="dropdown-menu message pull-right">
                            <li><a>You have 4 new unread messages</a></li>					  
                            <li>
                                <a class="clearfix" href="#">
                                    <img src="#" alt="User Avatar">
                                    <div class="detail">
                                        <strong>John Doe</strong>
                                        <p class="no-margin">
                                            Lorem ipsum dolor sit amet...
                                        </p>
                                        <small class="text-muted"><i class="fa fa-check text-success"></i> 27m ago</small>
                                    </div>
                                </a>	
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                                    <img src="#" alt="User Avatar">
                                    <div class="detail">
                                        <strong>Jane Doe</strong>
                                        <p class="no-margin">
                                            Lorem ipsum dolor sit amet...
                                        </p>
                                        <small class="text-muted"><i class="fa fa-check text-success"></i> 5hr ago</small>
                                    </div>
                                </a>	
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                                    <img src="#" alt="User Avatar">
                                    <div class="detail m-left-sm">
                                        <strong>Bill Doe</strong>
                                        <p class="no-margin">
                                            Lorem ipsum dolor sit amet...
                                        </p>
                                        <small class="text-muted"><i class="fa fa-reply"></i> Yesterday</small>
                                    </div>
                                </a>	
                            </li>
                            <li>
                                <a class="clearfix" href="#">
                                    <img src="#" alt="User Avatar">
                                    <div class="detail">
                                        <strong>Baby Doe</strong>
                                        <p class="no-margin">
                                            Lorem ipsum dolor sit amet...
                                        </p>
                                        <small class="text-muted"><i class="fa fa-reply"></i> 9 Feb 2013</small>
                                    </div>
                                </a>	
                            </li>
                            <li><a href="#">View all messages</a></li>					  
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="dropdown"><i class="fa fa-bell fa-lg"></i></a>
                        <span class="badge badge-info bounceIn animation-delay6 active">4</span>
                        <ul class="dropdown-menu notification dropdown-3 pull-right">
                            <li><a href="#">You have 5 new notifications</a></li>					  
                            <li>
                                <a href="#">
                                    <span class="notification-icon bg-warning">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                    <span class="m-left-xs">Server #2 not responding.</span>
                                    <span class="time text-muted">Just now</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="notification-icon bg-success">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="m-left-xs">New user registration.</span>
                                    <span class="time text-muted">2m ago</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="notification-icon bg-danger">
                                        <i class="fa fa-bolt"></i>
                                    </span>
                                    <span class="m-left-xs">Application error.</span>
                                    <span class="time text-muted">5m ago</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="notification-icon bg-success">
                                        <i class="fa fa-usd"></i>
                                    </span>
                                    <span class="m-left-xs">2 items sold.</span>
                                    <span class="time text-muted">1hr ago</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="notification-icon bg-success">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="m-left-xs">New user registration.</span>
                                    <span class="time text-muted">1hr ago</span>
                                </a>
                            </li>
                            <li><a href="#">View all notifications</a></li>					  
                        </ul>
                    </li>
                    <li class="chat-notification">
                        <a href="#" class="sidebarRight-toggle"><i class="fa fa-comments fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>

                        <div class="chat-alert">
                            Hello, Are you there?
                        </div>
                    </li>
                </ul>
            </div>  
            
            <div class="user_panel_button pull-right">
                <div class="user-block hidden-xs">
                    <a href="#" id="userToggle" data-toggle="dropdown">
                        <img src="#" alt="" class="img-circle inline-block user-profile-pic">
                        <div class="user-detail inline-block" style="font-size:1.5em; color:white">
                            hahaha
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="panel border dropdown-menu dropdown-menu-right user-panel">
                        <div class="panel-body paddingTB-sm">
                            <ul>
                                <li>
                                    <a href="profile.html">
                                        <i class="fa fa-edit fa-lg"></i><span class="m-left-xs">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html">
                                        <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">Inboxes</span>
                                        <span class="badge badge-danger bounceIn animation-delay3">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="signin.html">
                                        <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">Sign out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>--}}
        </div>
    </div>
</header>