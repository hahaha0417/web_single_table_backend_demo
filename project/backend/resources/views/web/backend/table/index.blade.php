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
        <link rel="stylesheet" href="{{\p_ha::Assets('plugin/checkbox/labelauty/css/jquery-labelauty.css')}}">
        <script src="{{\p_ha::Assets('plugin/checkbox/labelauty/js/jquery-labelauty.js')}}"></script>
        {{--  jQuery Upload File  --}}
        {{--  http://hayageek.com/docs/jquery-upload-file.php#doc  --}}
        <link href="{{\p_ha::Assets('plugin/jquery-upload-file/css/uploadfile.css')}}" rel="stylesheet">
        {{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
        <script src="{{\p_ha::Assets('plugin/jquery-upload-file/js/jquery.uploadfile.min.js')}}"></script>
        {{--  layer  --}}
        {{--  http://layer.layui.com/  --}}
        <script src="{{\p_ha::Assets('plugin/layer/layer/layer.js')}}"></script>
        {{-- Boostrap Autocomplete --}}
        <script src="https://gitcdn.link/repo/xcash/bootstrap-autocomplete/master/dist/latest/bootstrap-autocomplete.min.js"></script>
        {{--  --}}     
        {{--    --}}
        <script>
            {{--  此法不要用在plugin裡面，要請在index.js初始化  --}}
            {{-- var item_list_ = {!! $item_list !!};
            var index_ = "{{ $index }}";
            var page_ = "{{ $page }}";
             --}}
        </script>  
         
        {{--    --}}
        <link rel="stylesheet" href="{{\p_ha::Assets('web/backend/table/index.css')}}">
        <script src="{{\p_ha::Assets('web/backend/table/index.js')}}"></script>
        <script src="{{\p_ha::Assets('cross_origin/iframe_resize_height.js')}}"></script>
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
            
            .sidebar-menu.sidebar-mini {
                /* 會被iframe遮住 */
                z-index: 5000;
            }
            .sidebar-menu.sidebar-mini .main-menu ul li .submenu{
                /* 字太長延長 */
                width: 400px;
                right: -400px;
            }

            .sidebar-menu.sidebar-mini .main-menu ul li .submenu li {
                /* 字太長延長 */
                width: 400px;
            }
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        
        

    </head>
    <body>    
        <div class="index_title">
            <h1 style="font-weight:bold;">{{__('backend.db_table')}}</h1>
            <hr class="hr_title" />
            {{--  如要翻譯，請在hahaha_setting_table裡面事先翻好  --}}
            <h3 style="font-weight:bold;">{{$table_target['title']}}</h3>
            {{$table_target['description']}}
            <hr class="hr_title" />
            
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="index_space">
            <br><br>
        </div>

        <div class="index_content">
            <div class="row">    
                
            </div>

            
            
            <hr class="hr1" />
    
            <br><br>

            <div class="index_content">
                <form action="#" method="post">
                    {{csrf_field()}}
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
                                {{--  aaaa  --}}
                                               
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
                            {{--  {{$data_list->links()}}  --}}
                        </div>
                    </div>
                </form>         
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

