{{-- 原始 : hahaha --}}
{{-- 維護 : hohoho--}}
{{-- 指揮 : commander --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}



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

        {{-- water_wheel_carousel --}}
        <script src="{{asset("assets/plugin/carousel/water_wheel_carousel/water_wheel_carousel.min.js")}}"></script>
        {{--  layer  --}}
        {{--  http://layer.layui.com/  --}}
        <script src="{{asset("assets/plugin/layer/layer/layer.js")}}"></script>

        <link rel="stylesheet" href="{{asset("assets/web/front/ha/ha_media_100/index.css")}}">
        <script src="{{asset("assets/web/front/ha/ha_media_100/index.js")}}"></script>

        <script src="{{asset("assets/module/front/common/api/main_home/main_home.js")}}"></script>
        <link rel="stylesheet" href="{{asset("assets/module/front/common/api/main_home/main_home.css")}}">
        
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
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        
        
        
    </head>
    <body>  
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.front.common.nav.main_nav")        
        <div id="top_bar">            
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        
        <div id="content" >
            {{-- //////////////////////////////////////////////////////////////////////// --}}
            {{--  simple  --}}
            {{--  @include("fast_use.front.common.simple.main_simple")    --}}
            {{-- //////////////////////////////////////////////////////////////////////// --}}
            <div id="left_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  useful  --}}
                @include("fast_use.front.common.useful.main_useful")  
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="main_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}    
                {{--  內容  --}}
                {{-- //////////////////////////////////////////////////////////////////////// --}}


                
                <div class="home_title">
                    <h1 style="font-weight:bold;">ha_media_100</h1>
                    <hr class="hr_title" />
                    <h3 style="font-weight:bold;">實用小工具</h3>
                    chromium媒體撥放器，結合網頁操控
                    <hr class="hr_title" />
                </div> 
                <p>
                {{--  間隔  --}}
                <div class="home_space">
                    <br><br>
                </div>

                <div class="carousel_content">
                    <h1 style="text-align:center;">
                        不知有無違反肖像權，侵權請告知<br>
                        hahaha0417@hotmail.com     
                    </h1>
                    <div id="water_wheel_carousel">
                        <img src="{{url("image/front/ha/ha_media_100/ha_media_100.png")}}" id="item-1" />
                        <img src="{{url("image/front/ha/ha_media_100/media.png")}}" id="item-2" />
                        <img src="{{url("image/front/ha/ha_media_100/youtube.png")}}" id="item-3" />                        
                    </div>
                    <div class="home_space">
                        <br>&nbsp;
                    </div>
                    <div id="water_wheel_carousel_button">
                        <a href="#" id="water_wheel_carousel_prev" class="btn btn-dark">前一幅</a>　
                        <a href="#" id="water_wheel_carousel_next" class="btn btn-dark">下一幅</a>
                    </div>            
                </div>
                <div class="home_space">
                    <br><br>&nbsp;
                </div>

                <div class="row home_content">
                    <div class="col-sm item btn-light">
                        {{--  示意圖  --}}
                        {{--  <img src={{url("image/hahaha示意圖.png")}}></img>
                        <br/>   --}}
                        {{--  標題  --}}
                        <div style="background: rgba(190,255,190,0.5);">  
                            <hr class="hr1"/>
                            <h3 style="font-weight:bold;">ha_media_100(<span style="color:blue;">媒體撥放器</span>)
                                <a href="https://www.youtube.com/watch?v=i5JXJ_okk10" target="_parent">
                                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                        教學
                                    </div>                    
                                </a>
                                <a href="https://drive.google.com/open?id=1kEpvEdIc-0YZiyxrItLhYnjfQTl8g88x" target="_parent">
                                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                        Source
                                    </div>                    
                                </a>
                                <a href="https://drive.google.com/open?id=1dfeKkQAKzSczsCkg1FgidxBTnoXnwKsU" target="_parent">
                                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                                        Runtime
                                    </div>                    
                                </a>
                            </h3>
                            <hr class="hr1"/>
                        </div>  
                        {{--  註解    --}}
                        <p>使用chromium插件，可以撥放local resource及youtube影片</p>
                        <p>local resource : D槽(mp3,wav,mp4,mkv)</p>
                        <p>我沒有將所有編碼格式打開(不確定可不可以)，因此一些格式不能看，ex : h.263, h.265</p>
                        <p>支援實況使用或現場點播</p>
                        <p>支援手機，平板操控，但是貼連結很麻煩!!</p>
                        <p><span style="color:red;">必須連ha server API，不然無法控制</span></p>
                        <p><span style="color:red;">Source Code綁hahahalib，及整個hahahalib的dll環境，目前只提供64bit runtime(我懶得整理)，如有需要請寄信聯絡hahaha</span></p>
                        <p><span style="color:red;">等有工作會整理完，並上傳Blogger</span></p>
                        <p><span style="color:red;">請勿用於工業或商業使用，違者必究</span></p>
                        {{-- <hr class="hr1"/>    --}}
                        {{--  簡短說明                   --}}
                        
                        <div>
                            <div id="menu_page" class="menu_page">
                                <div class="btn btn-dark" style="width:100%">
                                    <hr class="hr1"/>  
                                    <h5><b>選單 : </b></h5> 
                                    <hr class="hr1"/>  
                                </div>   
                            </div>
                            <div id="menu_button_page" class="menu_button_page">   
                                <div class="" style="width:100%"> 
                                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>                            
                                    <div class="form-group row" style="margin-left:20px;">
                                        <div id="menu_setting" class="menu_button btn btn-dark" style="font-size:30px;width:80px;">
                                            設定
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="menu_control" class="menu_button btn btn-dark" style="font-size:30px;width:80px;">
                                            控制
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="menu_item" class="menu_button btn btn-dark" style="font-size:30px;width:80px;">
                                            項目
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="menu_list" class="menu_button btn btn-dark" style="font-size:30px;width:80px;">
                                            列表
                                        </div>
                                    </div>   
                                </div>                               
                            </div>
                            <div id="setting_page" class="setting_page">  
                                <div class="" style="width:100%">
                                    <hr class="hr1"/>  
                                    <h5><b>設定 : </b></h5> 
                                    <hr class="hr1"/>         
                                                                                      
                                    <div class="form-group row">
                                        <label for="setting_ip" class="col-sm-3 col-form-label">Ip :      </label>
                                        <input type="text" class="form-control col-sm-4" id="setting_ip" placeholder="114.32.144.211" value="114.32.144.211">
                                    </div>
                                    <div class="form-group row">
                                        <label for="setting_port" class="col-sm-3 col-form-label">Port :      </label>
                                        <input type="text" class="form-control col-sm-4" id="setting_port" placeholder="1999" value="1999">
                                    </div>
                                </div>   
                            </div>
                            {{-- control_page似乎是保留字 --}}
                            <div id="control_page_" class="control_page_">
                                <div class="" style="width:100%">
                                    <hr class="hr1"/>    
                                    <h5><b>控制 : </b></h5> 
                                    <hr class="hr1"/>  
                                
                                    <div class="form-group row" style="margin-left:20px;"> 
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_prev" class="control_prev btn btn-dark" style="font-size:30px;width:80px;">
                                            <
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_play" class="control_play btn btn-dark" style="font-size:30px;width:80px;">
                                            D
                                        </div>
                                        <div id="control_play_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_pause" class="control_pause btn btn-dark" style="font-size:30px;width:80px;">
                                            ||
                                        </div>
                                        <div id="control_pause_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_stop" class="control_stop btn btn-dark" style="font-size:30px;width:80px;">
                                            口
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_next" class="control_next btn btn-dark" style="font-size:30px;width:80px;">
                                            >
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_unload" class="control_unload btn btn-dark" style="font-size:30px;width:80px;">
                                            ^
                                        </div>
                                    </div>
                                </div> 
                            </div>                            
                            <div id="item_page" class="item_page">
                                <div class="" style="width:100%">
                                    <hr class="hr1"/> 
                                    <h5><b>項目 : </b></h5> 
                                    <hr class="hr1"/> 
                                
                                    <div class="form-group row" style="margin-left:20px;">                                         
                                        {{--  <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>  --}}
                                        <button type="button" id="control_item_add_media_button" name="control_item_add_media_button" style="font-size:30px;width:200px;" class="btn btn-dark">新增media</button>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <button type="button" id="control_item_add_youtube_button" name="control_item_add_youtube_button" style="font-size:30px;width:200px;" class="btn btn-dark">新增youtube</button>
                                    </div>
                                    <hr class="hr1"/> 
                                    <div id="control_item_play_list_page" class="form-group row" style="left:100px;"> 
                                        <div class="form-group col-sm">
                                            <label for="control_item_play_list">撥放清單</label>              
                                            <select  class="form-control" size="8" id="control_item_play_list_select" name="control_item_play_list_select">  
                                            </select>
                                        </div>  
                                        <div class="form-group col-sm">
                                            <div style="width: 80px; height: 120px; margin: 35px 0;">
                                                <button type="button" id="control_item_play_list_refresh" name="control_item_play_list_refresh" style="width:80px;height:60px" class="btn btn-dark btn-lg">更新</button>
                                                <button type="button" id="control_item_play_list_delete" name="control_item_play_list_delete" style="width:80px;height:60px" class="btn btn-dark btn-lg">刪除</button>
                                                <button type="button" id="control_item_play_list_clear" name="control_item_play_list_clear" style="width:80px;height:60px" class="btn btn-dark btn-lg">清空</button>
                                            </div>
                                            
                                        </div>       
                                    </div>                           
                                    <div id="control_item_type_page" class="form-group row">
                                        <label for="control_item_type" class="col-sm-3 col-form-label">類型 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_item_type" placeholder="0 : local resource, 1 : youtube">
                                    </div>
                                    <div id="control_item_name_page" class="form-group row">
                                        <label for="control_item_name" class="col-sm-3 col-form-label">名稱 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_item_name" placeholder="名稱">
                                    </div>
                                    <div id="control_item_dir_page" class="form-group row">
                                        <label for="control_item_dir" class="col-sm-3 col-form-label">路徑 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_item_dir" placeholder="路徑">
                                    </div>
                                    <div id="control_item_youtube_id_page" class="form-group row">
                                        <label for="control_item_youtube_id" class="col-sm-3 col-form-label">Youtube ID :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_item_youtube_id" placeholder="Youtube ID">
                                    </div>                              
                                    <div class="form-group row" style="margin-left:20px;"> 
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_item_add" class="control_item_add btn btn-dark" style="font-size:30px;width:160px;">
                                            新增項目
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list_page" class="list_page">
                                <div class="" style="width:100%">
                                    <hr class="hr1"/> 
                                    <h5><b>列表 : </b></h5> 
                                    <hr class="hr1"/> 
                                    <div class="form-group row" style="margin-left:20px;"> 
                                        <div id="control_list_use_list_button" class="control_list_use_list_button btn btn-dark" style="font-size:30px;width:160px;">
                                            使用列表
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_add_list_button" class="control_list_add_list_button btn btn-dark" style="font-size:30px;width:160px;">
                                            新增列表
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_delete_list_button" class="control_list_delete_list_button btn btn-dark" style="font-size:30px;width:160px;">
                                            刪除列表
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_rename_list_button" class="control_list_rename_list_button btn btn-dark" style="font-size:30px;width:160px;">
                                            更名列表
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_separator_button" class="control_list_separator_button btn btn-secondary" style="font-size:30px;width:20px;">
                                            &nbsp;
                                        </div>
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_clear_button" class="control_list_clear_button btn btn-danger" style="font-size:30px;width:160px;">
                                            清空列表
                                        </div>
                                    </div> 
                                    <hr class="hr1"/> 
                                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>                                    
                                    <div id="control_list_name_page" class="form-group row">
                                        <label for="control_list_name" class="col-sm-3 col-form-label">列表名稱 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_name" placeholder="列表名稱">
                                    </div>
                                    <div id="control_list_old_name_page" class="form-group row">
                                        <label for="control_list_old_name" class="col-sm-3 col-form-label">舊列表名稱 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_old_name" placeholder="舊列表名稱">
                                    </div>
                                    <div id="control_list_new_name_page" class="form-group row">
                                        <label for="control_list_new_name" class="col-sm-3 col-form-label">新列表名稱 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_new_name" placeholder="新列表名稱">
                                    </div>
                                    <div id="control_list_list_page" class="form-group row" style="left:100px;"> 
                                        <div class="form-group col-sm">
                                            <label for="control_list">列表項目</label>              
                                            <select  class="form-control" size="8" id="control_list_select" name="control_list_select">  
                                            </select>
                                        </div>  
                                        <div class="form-group col-sm">
                                            <div style="width: 80px; height: 120px; margin: 35px 0;">
                                                <button type="button" id="control_list_item_add" name="control_list_item_add" style="width:80px;height:60px" class="btn btn-dark btn-lg">新增</button>
                                                <button type="button" id="control_list_item_delete" name="control_list_item_delete" style="width:80px;height:60px" class="btn btn-dark btn-lg">刪除</button>
                                            </div>
                                        </div>       
                                    </div>
                                    <div id="control_list_select_list_page" class="form-group row" style="left:100px;"> 
                                        <div class="form-group col-sm">
                                            <label for="control_select_list">列表名稱</label>              
                                            <select  class="form-control" id="control_list_select_list" name="control_list_select" style="width:50%"> 
                                            </select>                                               
                                        </div>     
                                    </div>
                                    <div id="control_list_item_type_page" class="form-group row">
                                        <label for="control_list_item_type" class="col-sm-3 col-form-label">類型 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_item_type" placeholder="0 : local resource, 1 : youtube">
                                    </div>
                                    <div id="control_list_item_name_page" class="form-group row">
                                        <label for="control_list_item_name" class="col-sm-3 col-form-label">名稱 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_item_name" placeholder="名稱">
                                    </div>
                                    <div id="control_list_item_dir_page" class="form-group row">
                                        <label for="control_list_item_dir" class="col-sm-3 col-form-label">路徑 :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_item_dir" placeholder="路徑">
                                    </div>
                                    <div id="control_list_item_youtube_id_page" class="form-group row">
                                        <label for="control_list_item_youtube_id" class="col-sm-3 col-form-label">Youtube ID :      </label>
                                        <input type="text" class="form-control col-sm-4" id="control_list_item_youtube_id" placeholder="Youtube ID">
                                    </div>                              
                                    <div class="form-group row" style="margin-left:20px;"> 
                                        <div id="control_list_use_list" class="control_list_use_list btn btn-dark" style="font-size:30px;width:80px;">
                                            使用
                                        </div>
                                        <div id="control_list_use_list_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_add_list" class="control_list_add_list btn btn-dark" style="font-size:30px;width:80px;">
                                            新增
                                        </div>
                                        <div id="control_list_add_list_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_delete_list" class="control_list_delete_list btn btn-dark" style="font-size:30px;width:80px;">
                                            刪除
                                        </div>
                                        <div id="control_list_delete_list_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_rename_list" class="control_list_rename_list btn btn-dark" style="font-size:30px;width:80px;">
                                            更名
                                        </div>
                                        <div id="control_list_rename_list_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_add_list_clear" class="control_list_add_list_clear btn btn-dark" style="font-size:30px;width:80px;">
                                            清除
                                        </div>
                                        <div id="control_list_add_list_clear_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_delete_list_clear" class="control_list_delete_list_clear btn btn-dark" style="font-size:30px;width:80px;">
                                            清除
                                        </div>
                                        <div id="control_list_delete_list_clear_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_rename_list_clear" class="control_list_rename_list_clear btn btn-dark" style="font-size:30px;width:80px;">
                                            清除
                                        </div>
                                        <div id="control_list_rename_list_clear_space">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <div id="control_list_use_list_refresh" class="control_list_use_list_refresh btn btn-dark" style="font-size:30px;width:80px;">
                                            更新
                                        </div>  
                                    </div> 
                                </div>
                            </div>
                            
                        </div>
                    </div>       
                </div>  


                {{-- //////////////////////////////////////////////////////////////////////// --}}

                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  tail  --}}
                @include("fast_use.front.common.tail.main_tail")
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
            <div id="right_box">
                {{-- //////////////////////////////////////////////////////////////////////// --}}
                {{--  relation  --}}
                @include("fast_use.front.common.relation.main_relation")  
                {{-- //////////////////////////////////////////////////////////////////////// --}}
            </div>
           
            
        </div>
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

