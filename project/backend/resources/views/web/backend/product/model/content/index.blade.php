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


<!DOCTYPE html>
<html lang="en">
    <head>
        @include('web.common.main_meta')
        @include('web.common.sub_meta')
    
        @include('web.common.main_script')
        @include('web.common.sub_script')
                    
        @include('web.common.main_css')
        @include('web.common.sub_css')
        {{--  Checkbox  --}}
        {{--  https://www.html5tricks.com/10-pretty-checkbox-radiobox.html  --}}
        <link rel="stylesheet" href="{{asset("assets/plugin/checkbox/labelauty/css/jquery-labelauty.css")}}">
        <script src="{{asset("assets/plugin/checkbox/labelauty/js/jquery-labelauty.js")}}"></script>
        {{--  jQuery Upload File  --}}
        {{--  http://hayageek.com/docs/jquery-upload-file.php#doc  --}}
        <link href="/assets/plugin/jquery-upload-file/css/uploadfile.css" rel="stylesheet">
        {{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
        <script src="/assets/plugin/jquery-upload-file/js/jquery.uploadfile.min.js"></script>
        {{--  layer  --}}
        {{--  http://layer.layui.com/  --}}
        <script src="{{asset("assets/plugin/layer/layer/layer.js")}}"></script>
        {{-- Boostrap Autocomplete --}}
        <script src="https://gitcdn.link/repo/xcash/bootstrap-autocomplete/master/dist/latest/bootstrap-autocomplete.min.js"></script>
        {{--  --}}     
        {{--    --}}
        <script>
            {{--  此法不要用在plugin裡面，要請在index.js初始化  --}}
            var item_list_ = {!! $item_list !!};
            var index_ = "{{ $index }}";
            var page_ = "{{ $page }}";
            var index_dir_ = @json($index_dir);
            var index_page_ = "{{ $index_page }}";
        </script>  
         
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/model/content/index.css")}}">
        <script src="{{asset("assets/web/backend/product/model/content/index.js")}}"></script>
        {{--    --}}
        

        
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
        <div class="index_title">
            <h1 style="font-weight:bold;">Product Index</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">項目管理</h3>
            Item
            <hr class="hr_title" />
            
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="index_space">
            <br><br>
        </div>

        <div class="index_content">
            <div class="row">                
                <div class="form-group col-sm">     
                    <label for="index_page_select">頁面</label>              
                    <select  class="form-control" id="index_page_select" index="{{$index}}">
                        <option page="all" name="all" order_="0">All</option>
                        @if(isset($index_list))   
                            {{-- index --}}
                            @if(count($index_list) != 0)
                                <option name="separater_page_index" disabled>---------------------------------------- 首頁 ----------------------------------------</option>
                            @endif     
                            @foreach($index_list as $key => $value)
                                @if($value['title_name'] == $index)
                                    <option page="index" name="{{$value['title_name']}}" SELECTED>{{$value['title']}} - {{$value['title_name']}}</option>
                                @else    
                                    <option page="index" name="{{$value['title_name']}}">{{$value['title']}} - {{$value['title_name']}}</option>  
                                @endif                                                     
                            @endforeach
                        @endif 
                        @if(isset($page_list))  
                            {{-- page --}}
                            @if(count($page_list) != 0)
                                <option name="separater_page_page" disabled>---------------------------------------- 頁面 ----------------------------------------</option>
                            @endif 
                            @foreach($page_list as $key => $value)
                                @if("root" == $value['page'])
                                    @if("root" == $page)
                                        <option page="page" name="root" SELECTED>root</option>
                                    @else   
                                        <option page="page" name="root">root</option>
                                    @endif        
                                @endif                                              
                            @endforeach                            
                            @if($index == "all")
                                @foreach($page_list as $key => $value)  
                                    @foreach($index_list as $key_index => $value_index)
                                        @if($value_index['title_name'] == $value['page'])
                                            @if($page == $value['page'])
                                                <option page="page" name="{{$value_index['title_name']}}" SELECTED>{{$value_index['title_name']}}</option>
                                            @else
                                                <option page="page" name="{{$value_index['title_name']}}">{{$value_index['title_name']}}</option>
                                            @endif          
                                        @endif                                          
                                    @endforeach                                            
                                @endforeach
                                @foreach($page_list as $key => $value)
                                    @if("root" == $value['page'])
                                        @continue;
                                    @endif
                                    @foreach($index_list as $key_index => $value_index)
                                        @if($value_index['title_name'] == $value['page'])
                                            @break;    
                                        @endif    
                                        @if($value['page'] == $page)
                                            <option page="page" name="{{$value['page']}}" SELECTED>{{$value['page']}}</option>
                                            @break;
                                        @else    
                                            <option page="page" name="{{$value['page']}}">{{$value['page']}}</option>  
                                            @break;
                                        @endif                                                       
                                    @endforeach                                                                                        
                                @endforeach
                            @else
                                @if(count($page_list) != 0)  
                                    @foreach($index_list as $key => $value)
                                        @if($value['title_name'] == $index)
                                            @if($page != "all")
                                                <option page="page" name="{{$value['title_name']}}" SELECTED>|| {{$value['title_name']}} ||</option>
                                            @else    
                                                <option page="page" name="{{$value['title_name']}}">|| {{$value['title_name']}} ||</option>  
                                            @endif
                                        @endif    
                                    @endforeach
                                @endif       
                                @foreach($page_list as $key => $value)
                                    @if("root" == $value['page'])
                                        @continue;
                                    @endif
                                    @foreach($index_list as $key_index => $value_index)
                                        @if($index == $value['title_name'])
                                            @break;    
                                        @endif       
                                        @if($value['title_name'] == $page)
                                            <option page="page" name="{{$value['title_name']}}" order="{{$value['order_']}}" SELECTED>{{$value['title']}} - {{$value['title_name']}}</option>
                                        @else    
                                            <option page="page" name="{{$value['title_name']}}" order="{{$value['order_']}}">{{$value['title']}} - {{$value['title_name']}}</option>  
                                        @endif                                                 
                                    @endforeach                                                                                           
                                @endforeach
                            @endif
                        @endif 
                    </select>
                </div>
                <div class="form-group col-sm">     
                    <label for="index_item_select">項目</label>              
                    <select  class="form-control" id="index_item_select">                         
                        @if(isset($item_list))    
                            @if("all" == $item)
                                <option name="all" SELECTED>All</option>
                            @else   
                                <option name="all">All</option>
                            @endif  
                            
                            {{--  @if(count($item_list) == 0 && $page == "all")  --}}
                            @if(count($item_list) == 0 && $page == "all")
                                <option name="separater_item_main" disabled>---------------------------------------- 主要 ----------------------------------------</option>
                                @if("nav" == $item)
                                    <option name="nav" SELECTED>nav</option>
                                @else   
                                    <option name="nav">nav</option>
                                @endif  
                                @if("pic_board" == $item)
                                    <option name="pic_board" SELECTED>pic_board</option>
                                @else   
                                    <option name="pic_board">pic_board</option>
                                @endif   
                            @endif
                            
                            @if(count($item_list) != 0))
                                <?php 
                                    $flag = 0;
                                ?>
                                @foreach($item_list as $key => $value)
                                    @if($flag == 0 && "nav" == $value['item'])
                                        <?php 
                                            $flag = 1;
                                        ?>   
                                    @endif    
                                    @if($flag == 0 && "pic_board" == $value['item'])
                                        <?php 
                                            $flag = 1;
                                        ?>       
                                    @endif    
                                    @foreach($index_list as $key_index => $value_index)
                                        @if($flag == 0 && $value_index['title_name'] == $value['item'])
                                            <?php 
                                                $flag = 1;
                                            ?>   
                                            @break;
                                        @endif 
                                    @endforeach                                           
                                @endforeach
                                @if($flag == 1)
                                    <option name="separater_item_main" disabled>---------------------------------------- 主要 ----------------------------------------</option> 
                                @endif      
                            @endif
                            @foreach($item_list as $key => $value)
                                @foreach($index_list as $key_index => $value_index)
                                    @if($value_index['title_name'] == $value['item'])
                                        @if($value['item'] == $item)
                                            <option page="page" name="{{$value_index['title_name']}}" SELECTED>{{$value_index['title_name']}}</option>
                                        @else    
                                            <option page="page" name="{{$value_index['title_name']}}">{{$value_index['title_name']}}</option>  
                                        @endif    
                                    @endif 
                                @endforeach                                             
                            @endforeach
                            {{--  如果項目裡面有才顯示  --}}
                            @foreach($item_list as $key => $value)
                                @if("nav" == $value['item'])
                                    @if("nav" == $item)
                                        <option name="nav" SELECTED>nav</option>
                                    @else   
                                        <option name="nav">nav</option>
                                    @endif        
                                @endif                                                
                            @endforeach
                            @foreach($item_list as $key => $value)
                                @if("pic_board" == $value['item'])
                                    @if("pic_board" == $item)
                                        <option name="pic_board" SELECTED>pic_board</option>
                                    @else   
                                        <option name="pic_board">pic_board</option>
                                    @endif  
                                @endif                                                   
                            @endforeach
                            {{--    --}}
                            @foreach($item_list as $key => $value)
                                @foreach($index_list as $key_index => $value_index)
                                    @if($value_index['title_name'] == $value['item'])
                                        @break;
                                    @endif                                       
                                @endforeach
                                @if("nav" == $value['item'])
                                    @continue;
                                @endif
                                @if("pic_board" == $value['item'])
                                    @continue;
                                @endif
                                <option name="separater_item_item" disabled>---------------------------------------- 項目 ----------------------------------------</option>
                                @break;
                            @endforeach
                            @foreach($item_list as $key => $value)
                                @foreach($index_list as $key_index => $value_index)
                                    @if($value_index['title_name'] == $value['item'])
                                        @break;
                                    @endif   
                                    @if("nav" == $value['item'])
                                        @continue;
                                    @endif
                                    @if("pic_board" == $value['item'])
                                        @continue;
                                    @endif
                                    @if($value['item'] == $item)
                                        <option name="{{$value['item']}}" SELECTED>{{$value['item']}}</option>
                                        @break;
                                    @else    
                                        <option name="{{$value['item']}}">{{$value['item']}}</option>  
                                        @break;
                                    @endif     
                                @endforeach                                                                                   
                            @endforeach
                        @endif 
                    </select>
                </div>
                {{--  關係頁面，如有相關頁面要建在Index的資料庫，則使用Title_Class做分類標籤，Parameter為i_relate，格式如下  --}}
                {{--  --------------------------------------------------------------  --}}
                {{--  關係頁面  --}}
                {{--  --------------------------------------------------------------  --}}
                {{--  All  --}}
                {{--  -------------- Bar --------------  --}}
                {{--  聯絡 - Contact --}}
                {{--  免費工具 - Free Tool --}}
                {{--  API - API --}}
                {{--  -------------- Other --------------  --}}
                {{--  XXX - XXXX --}}
                {{--  XXX - XXXX --}}
                {{--  XXX - XXXX --}}
                {{--  --------------------------------------------------------------  --}}
                {{--  -------------- XXX --------------  --}}{{--  其中是Title Class描述的  --}}
                {{--  原則上Item不會有Relate Item，因為某Page底下全部都是關係Item  --}}
                {{--  如Page or Item要重要的置頂，原則上只有Index頁面可以建立(直接使用Index表建立)，如子頁面也要建立置頂，請拆表處理這塊，這是複雜業務  --}}
            </div>  
            
            {{-- 這裡可以添加進階功能，填入預設值，然後新增時，寫入session，假設欄位為空，填入預設值 --}}
            <div id="index_item_advance" class="index_item_advance btn btn-dark">
                <div style="font-size:1.5em; color:Tomato">
                    <i class="fas fa-align-justify">進階</i>
                </div>
            </div>

            <br><br>
            
            <hr class="hr1" />

            <div id="index_item_advance_page" class="index_item_advance_page">
                <div class="form-group row">    
                    <label for="index_item_item_describe" class="col-sm-3 col-form-label">項目 - 描述(Item - Describe) :      </label>
                    <textarea class="index_item_item_describe form-control col-sm-4" id="index_item_item_describe" name="index_item_item_describe" rows="5" cols="40" placeholder="項目描述"></textarea>
                </div>

                <div id="index_item_save" class="index_item_save btn btn-dark">
                    <div style="font-size:1.5em; color:Tomato">
                        <i class="fas fa-save">儲存</i>
                    </div>
                </div>
            </div>

            
            
            <hr class="hr1" />
    
            <br><br>

            
            
        </div> 

        {{csrf_field()}}

        <div class="index_content">
            <form action="#" method="post">
                <div class="index_result_wrap">
                </div>
                @if($page == "all")
                    <div class="index_result_wrap">
                        <!--快捷导航 开始-->
                        <div class="index_result_content">
                            <div class="short_wrap">                            
                                <div id="index_item_add_index" class="index_item_add_index btn btn-dark">
                                    <div style="font-size:1.5em; color:Tomato">
                                        <i class="fas fa-plus">新增首頁</i>
                                    </div>
                                </div>  
                                <div id="index_item_add_nav" class="index_item_add_nav btn btn-dark">
                                    <div style="font-size:1.5em; color:Tomato">
                                        <i class="fas fa-plus">新增Nav</i>
                                    </div>
                                </div>   
                                {{--  新增Relate Page  --}}
                            </div>
                            {{-- 全部default設置或是全部項目default設置 --}}
                        </div>
                        <!--快捷导航 结束-->
                    </div>
                @endif   
                <div class="index_result_wrap">
                    <!--快捷导航 开始-->
                    <div class="index_result_content">
                        <div class="short_wrap">
                            <div id="index_item_add" class="index_item_add btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-plus">新增</i>
                                </div>
                            </div>
                            <div id="index_item_select_delete" class="index_item_select_delete btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-minus">選擇刪除</i>
                                </div>
                            </div>
                            <div id="index_item_all_save" class="index_item_all_save btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-save">全部儲存</i>
                                </div>
                            </div>
                            <div id="index_item_all_refresh" class="index_item_all_refresh btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-refresh">全部刷新</i>
                                </div>
                            </div>
                        </div>
                        {{-- 全部default設置或是全部項目default設置 --}}
                    </div>
                    <!--快捷导航 结束-->
                </div>

                {{-- ------------------------------------------------------------------------------ --}}
                {{-- Add --}}
                <div class="index_result_wrap">
                    <div class="index_result_content">
                        <div id="index_item_add_panel" class="index_item_add_panel">
                            <div class="index_item_add_panel_content">
                                <div class="form-group row">
                                    <label for="index_item_add_panel_page" class="col-sm-3 col-form-label">頁面(Page) :      </label>
                                    <input type="text" class="form-control col-sm-4" id="index_item_add_panel_page" name="index_item_add_panel_page" placeholder="頁面" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="index_item_add_panel_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                                    <input type="text" class="form-control col-sm-4" id="index_item_add_panel_item" name="index_item_add_panel_item" placeholder="項目" value="">
                                </div>
                                <div class="form-group row">
                                    <label for="index_item_add_panel_id" class="col-sm-3 col-form-label"><span style="color:red;">*</span>識別項(ID) :      </label>
                                    <input type="text" class="form-control col-sm-4" id="index_item_add_panel_id" name="index_item_add_panel_id" placeholder="識別項 : index_xxx_xxx" value="">
                                    <div id="index_item_add_panel_id_check" class="index_item_add_panel_id_check">
                                        <div style="font-size:1.5em; color:green">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    </div>     
                                    <div id="index_item_add_panel_id_error" class="index_item_add_panel_id_error">
                                        <div style="font-size:1.5em; color:red">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group row">
                                    <label for="index_item_add_panel_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                                    <input type="text" class="form-control col-sm-4" id="index_item_add_panel_title" name="index_item_add_panel_title" placeholder="標題">
                                </div>
                                <div class="form-group row">
                                    <div class="short_wrap">
                                        <div id="index_item_add_panel_add" class="index_item_add_panel_add btn btn-dark">
                                            <div style="font-size:1.5em; color:Tomato">
                                                <i class="fas fa-plus">新增</i>
                                            </div>
                                        </div>
                                        <div id="index_item_add_panel_cancel" class="index_item_add_panel_cancel btn btn-dark">
                                            <div style="font-size:1.5em; color:Tomato">
                                                <i class="fas fa-times">取消</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- 只有在$page出現的時候 --}}
                {{-- Add Index --}}
                @if($page == "all")
                    {{--  <div class="index_result_wrap">  --}}
                        <div class="index_result_content">
                            <div id="index_item_add_index_panel" class="index_item_add_index_panel">
                                <div class="index_item_add_index_panel_content">
                                    <div class="form-group row">
                                        <label for="index_item_add_index_panel_page" class="col-sm-3 col-form-label">頁面(Page) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_index_panel_page" name="index_item_add_index_panel_page" placeholder="頁面" readonly value="">
                                    </div>  
                                    <div class="form-group row">
                                        <label for="index_item_add_index_panel_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_index_panel_item" name="index_item_add_index_panel_item" placeholder="項目" readonly value="">
                                    </div>                                        
                                    <div class="form-group row">
                                        <label for="index_item_add_index_panel_id" class="col-sm-3 col-form-label"><span style="color:red;">*</span>識別項(Id) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_index_panel_id" name="index_item_add_index_panel_id" placeholder="識別項">
                                        <div id="index_item_add_index_panel_id_check" class="index_item_add_index_panel_id_check">
                                            <div style="font-size:1.5em; color:green">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div id="index_item_add_index_panel_id_error" class="index_item_add_index_panel_id_error">
                                            <div style="font-size:1.5em; color:red">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>                              
                                    <div class="form-group row">
                                        <label for="index_item_add_index_panel_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_index_panel_title" name="index_item_add_index_panel_title" placeholder="首頁">
                                    </div>
                                    <div class="form-group row">
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                                        <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                                        <label for="index_item_add_index_panel_title_name" class="col-sm-3 col-form-label"><span style="color:red;">*</span>名稱(Name) :      </label>
                                        <input type="text" class="form-control col-sm-4 index_item_add_index_panel_title_name" id="index_item_add_index_panel_title_name" name="index_item_add_index_panel_title_name" placeholder="名稱">
                                    </div>
                                    <div class="form-group row">
                                        <div class="short_wrap">
                                            <div id="index_item_add_index_panel_add" class="index_item_add_index_panel_add btn btn-dark">
                                                <div style="font-size:1.5em; color:Tomato">
                                                    <i class="fas fa-plus">新增</i>
                                                </div>
                                            </div>
                                            <div id="index_item_add_index_panel_cancel" class="index_item_add_index_panel_cancel btn btn-dark">
                                                <div style="font-size:1.5em; color:Tomato">
                                                    <i class="fas fa-times">取消</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--  </div>  --}}
                @endif
                {{-- ------------------------------------------------------------------------------ --}}
                {{-- Add Nav --}}
                @if($page == "all")
                    {{--  <div class="index_result_wrap">  --}}
                        <div class="index_result_content">
                            <div id="index_item_add_nav_panel" class="index_item_add_nav_panel">
                                <div class="index_item_add_nav_panel_content">
                                    <div class="form-group row">
                                        <label for="index_item_add_nav_panel_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_nav_panel_item" name="index_item_add_nav_panel_item" placeholder="項目" readonly value="">
                                    </div>
                                    <div class="form-group row">
                                        <label for="index_item_add_nav_panel_page" class="col-sm-3 col-form-label">頁面(Page) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_nav_panel_page" name="index_item_add_nav_panel_page" placeholder="頁面" value="">
                                    </div>      
                                    <div class="form-group row">
                                        <label for="index_item_add_nav_panel_id" class="col-sm-3 col-form-label"><span style="color:red;">*</span>識別項(Id) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_nav_panel_id" name="index_item_add_nav_panel_id" placeholder="識別項">
                                        <div id="index_item_add_nav_panel_id_check" class="index_item_add_nav_panel_id_check">
                                            <div style="font-size:1.5em; color:green">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div id="index_item_add_nav_panel_id_error" class="index_item_add_nav_panel_id_error">
                                            <div style="font-size:1.5em; color:red">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>                              
                                    <div class="form-group row">
                                        <label for="index_item_add_nav_panel_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_nav_panel_title" name="index_item_add_nav_panel_title" placeholder="標題">
                                    </div>
                                    <div class="form-group row">
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                                        <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                                        <label for="index_item_add_nav_panel_title_name" class="col-sm-3 col-form-label"><span style="color:red;">*</span>名稱(Name) :      </label>
                                        <input type="text" class="form-control col-sm-4 index_item_add_nav_panel_title_name" id="index_item_add_nav_panel_title_name" name="index_item_add_nav_panel_title_name" placeholder="名稱">
                                    </div>
                                    <div class="form-group row">
                                        <label for="index_item_add_nav_panel_title" class="col-sm-3 col-form-label">網址(Url) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_nav_panel_url" name="index_item_add_nav_panel_url" placeholder="網址">
                                    </div>
                                    <div class="form-group row">
                                        <div class="short_wrap">
                                            <div id="index_item_add_nav_panel_add" class="index_item_add_nav_panel_add btn btn-dark">
                                                <div style="font-size:1.5em; color:Tomato">
                                                    <i class="fas fa-plus">新增</i>
                                                </div>
                                            </div>
                                            <div id="index_item_add_nav_panel_cancel" class="index_item_add_nav_panel_cancel btn btn-dark">
                                                <div style="font-size:1.5em; color:Tomato">
                                                    <i class="fas fa-times">取消</i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    {{--  </div>  --}}
                @endif
                {{-- ------------------------------------------------------------------------------ --}}
        
                <div class="index_result_wrap">
                    <div class="index_result_content">
                        <table class="list_tab table table-sm">
                            <tr id="index_item_all" class="index_item">
                                <th style="width:45px;"><input id="index_item_all_select" type="checkbox" name="checkbox" data-labelauty=" "></th>
                                <th style="width:80px;">排序</th>
                                <th style="width:200px;">頁面</th>                                
                                <th style="width:300px;">
                                    標題                                    
                                </th>
                                <th style="width:200px;">超連結</th>
                                <th style="width:120px;">圖片</th>
                                <th style="width:120px;">操作</th>
                                <th style="width:auto;">備註</th>                                
                            </tr>
                            @foreach($data_list as $key => $value)                                
                                <tr id="index_item_{{$loop->index}}" class="index_item" item_id="{{$value['id']}}" index="{{$loop->index}}">                                
                                    <td><input id="index_item_select_{{$loop->index}}" class="index_item_select" type="checkbox" name="checkbox" data-labelauty=" "></td>
                                    <td><input id="index_item_order_{{$loop->index}}" style="width:80px;" type="text" class="index_item_order form-control" placeholder="" value="{{$value['order_']}}"></td>
                                    {{--  目前設計 page 不可在這頁直接切換頁面，因為頁面代表一種特定的內容，正常沒事不會有人隨意搬移內容到別的頁面直接亂換頁面(而且是一個一個切換)  --}}
                                    {{--  如需批量搬移頁面，請不要直接取消page readonly，用勾選的方式另外批量搬移  --}}
                                    <td><input id="index_item_page_{{$loop->index}}" type="text" class="index_item_page form-control" placeholder="頁面" readonly value="{{$value['page']}}"></td>                                
                                    <td>
                                        <div class="input-group">
                                            <input id="index_item_title_{{$loop->index}}" type="text" class="index_item_title form-control" placeholder="標題" value="{{$value['title']}}">
                                            <div id="index_item_title_prepend_{{$loop->index}}" class="input-group-prepend index_item_title_prepend">
                                                <label style="font-size:1.5em; color:Tomato" class="btn-secondary input-group-text" for="index_item_title_{{$loop->index}}">
                                                    <i class="fab fa-elementor"></i>
                                                </label>
                                            </div>
                                            <div id="index_item_panel_{{$loop->index}}" class="index_item_panel">
                                                <div class="index_item_panel_content">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <img id="index_item_panel_image_thumbnail_{{$loop->index}}" class="index_item_panel_image_thumbnail" src="{{url($value['image'])}}" style="width: auto;height: 200px;"/>
                                                        </div>
                                                    </div>
                                                    <div style="height:5px;">&nbsp;</div>
                                                    <div class="row">
                                                        <label for="index_item_panel_item_{{$loop->index}}" class="col-sm-3 col-form-label">項目 : </label>
                                                        <div class="col">
                                                            <input style="width:530px;" id="index_item_panel_item_{{$loop->index}}" style="" type="text" class="index_item_panel_item form-control" placeholder="項目" value="{{$value['item']}}">  
                                                        </div>   
                                                    </div>
                                                    <div style="height:5px;">&nbsp;</div>
                                                    <div class="row">
                                                        <label for="index_item_panel_image_{{$loop->index}}" class="col-sm-3 col-form-label">圖片 : </label>
                                                        <div class="col">
                                                            <input style="width:530px;" id="index_item_panel_image_{{$loop->index}}" style="" type="text" class="index_item_panel_image form-control" placeholder="圖片" value="{{$value['image']}}">  
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div id="index_item_panel_image_refresh_{{$loop->index}}" style="font-size:1em; color:Tomato" class="index_item_panel_image_refresh btn btn-dark">
                                                                <i class="fas fa-refresh"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div id="index_item_panel_create_time_{{$loop->index}}" class="col">{{$value['create_time']}}</div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div id="index_item_panel_update_time_{{$loop->index}}" class="col">{{$value['update_time']}}</div>                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="" >   
                                            <input id="index_item_url_{{$loop->index}}" type="text" class="index_item_url form-control" placeholder="超連結" value="{{$value['url']}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="" >                                                                              
                                            <img id="index_item_image_thumbnail_{{$loop->index}}" class="index_item_image_thumbnail" src="{{url($value['image'])}}" style="width: 40px;height: 40px;"/>
                                            <div id="index_item_image_upload_{{$loop->index}}" class="index_item_image_upload" style="margin-right:15px;display:inline-block;" name="index_item_image_upload_{{$loop->index}}" type="file"></div>        
                                        </div>
                                    </td>
                                    <td>
                                        <div class="" >  
                                            <div id="index_item_delete_{{$loop->index}}" value="{{$value['id']}}" style="font-size:1em; color:Tomato" class="index_item_delete btn btn-dark">
                                                <i class="fas fa-minus"></i>
                                            </div>
                                            <div id="index_item_edit_{{$loop->index}}" value="{{$value['id']}}" style="font-size:1em; color:Tomato" class="index_item_edit btn btn-dark">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            {{-- default設置或是項目default設置 --}}
                                            
                                        </div>
                                    </td>
                                    <td><input id="index_item_comment_{{$loop->index}}" type="text" class="index_item_comment form-control" placeholder="備註" value="{{$value['comment']}}"></td>                                
                                </tr> 
                            @endforeach                   
                        </table>
                    </div>
                    <div class="index_result_content">
                        <div class="short_wrap">                            
                            <div id="index_item_select_delete1" class="index_item_select_delete btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-minus">選擇刪除</i>
                                </div>
                            </div>
                            <div id="index_item_all_save1" class="index_item_all_save btn btn-dark">
                                <div style="font-size:1.5em; color:Tomato">
                                    <i class="fas fa-refresh">全部儲存</i>
                                </div>
                            </div>
                            {{-- 全部default設置或是全部項目default設置 --}}
                        </div>
                    </div>                   
                </div>
                <div class="index_result_wrap">                    
                    <div style="height:5px">&nbsp;</div>
                    <div class="page_list">
                        {{--  這會產生多頁按鈕  --}}
                        {{$data_list->links()}}
                    </div>
                </div>
            </form>         
        </div>     
        
        
    </body>
    
    <script>
            
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

