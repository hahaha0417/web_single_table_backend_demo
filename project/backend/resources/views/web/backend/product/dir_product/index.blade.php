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
            {{--  var item_list_ = {!! $item_list !!};
            var index_ = "{{ $index }}";
            var page_ = "{{ $page }}";  --}}
            var item_list_ = 0;
            var index_ = 0;
            var page_ = 0;
        </script>  
         
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/dir_product/index.css")}}">
        <script src="{{asset("assets/web/backend/product/dir_product/index.js")}}"></script>
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
            <h3 style="font-weight:bold;">產品列表管理</h3>
            Dir_Product
            <hr class="hr_title" />
            
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="index_space">
            <br><br>
        </div>
  

        {{csrf_field()}}

        <div class="index_content">
            <form action="#" method="post">
                <div class="index_result_wrap">
                </div>
                {{--  @if($page == "all")
                    <div class="index_result_wrap">
                        <!--快捷导航 开始-->
                        <div class="index_result_content">
                        </div>
                        <!--快捷导航 结束-->
                    </div>
                @endif     --}}
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
                <div class="index_result_content">
                    <div id="index_item_add_panel" class="index_item_add_panel">
                        <div class="index_item_add_panel_content">                                                     
                            <div class="form-group row">
                                <label for="index_item_add_panel_database" class="col-sm-3 col-form-label">資料庫(Database) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_database" name="index_item_add_panel_database" placeholder="資料庫">
                            </div>
                            <div class="form-group row">
                                <label for="index_item_add_panel_level" class="col-sm-3 col-form-label">階層(Level) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_level" name="index_item_add_panel_level" placeholder="階層">
                            </div>
                            <div class="form-group row">
                                <label for="index_item_add_panel_type" class="col-sm-3 col-form-label">類型(type) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_type" name="index_item_add_panel_type" placeholder="類型">
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
                {{-- ------------------------------------------------------------------------------ --}}
                {{--  為搭配Device使用相同用法，class & model合成dir(有餘dir 8層十太多)，因此在edit修改，彈出頁面顯示後端路徑路徑  --}}
                <div class="index_result_wrap">
                    <div class="index_result_content">
                        <table class="list_tab table table-sm">
                            <tr id="index_item_all" class="index_item">
                                <th style="width:45px;"><input id="index_item_all_select" type="checkbox" name="checkbox" data-labelauty=" "></th>
                                <th style="width:80px;">排序</th>   
                                <th style="width:60px;">圖片</th>  
                                                         
                                <th style="width:300px;">
                                    資料庫                                
                                </th>
                                <th style="width:60px;">階層</th>  
                                <th style="width:60px;">類型</th>   
                                
                                <th style="width:120px;">操作</th>
                                <th style="width:auto;">備註</th>                                
                            </tr>
                            @foreach($data_list as $key => $value)  
                                <tr class="index_item" item_no="{{$value['no']}}" index="{{$loop->index}}">                                
                                    <td><input id="index_item_select_{{$loop->index}}" class="index_item_select" type="checkbox" name="checkbox" data-labelauty=" "></td>
                                    <td><input id="index_item_order_{{$loop->index}}" style="width:80px;" type="text" class="index_item_order form-control" placeholder="" value="{{$value['order_']}}"></td>
                                    <td>
                                        <div class="" >                                                                              
                                            <img id="index_item_image_thumbnail_{{$loop->index}}" class="index_item_image_thumbnail" src="{{url($image_list[$key])}}" style="width: 40px;height: 40px;"/>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="input-group">
                                            <input id="index_item_database_{{$loop->index}}" type="text" class="index_item_database form-control" placeholder="資料庫" value="{{$value['database_']}}">
                                            <div id="index_item_database_prepend_{{$loop->index}}" class="input-group-prepend index_item_database_prepend">
                                                <label style="font-size:1.5em; color:Tomato" class="btn-secondary input-group-text" for="index_item_database_{{$loop->index}}">
                                                    <i class="fab fa-elementor"></i>
                                                </label>
                                            </div>
                                            <div id="index_item_panel_{{$loop->index}}" class="index_item_panel">
                                                <div class="index_item_panel_content">  
                                                    <div style="height:5px;">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <img id="index_item_panel_image_thumbnail_{{$loop->index}}" class="index_item_panel_image_thumbnail" src="{{url($image_list[$key])}}" style="width: auto;height: 200px;"/>
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
                                    <td><input id="index_item_level_{{$loop->index}}" style="width:80px;" type="text" class="index_item_level form-control" placeholder="" value="{{$value['level']}}"></td>
                                    <td><input id="index_item_type_{{$loop->index}}" style="width:80px;" type="text" class="index_item_type form-control" placeholder="" value="{{$value['type']}}"></td>                             
                                    <td>
                                        <div class="" >  
                                            <div id="index_item_delete_{{$loop->index}}" value="id" style="font-size:1em; color:Tomato" class="index_item_delete btn btn-dark">
                                                <i class="fas fa-minus"></i>
                                            </div>
                                            <div id="index_item_edit_{{$loop->index}}" value="id" style="font-size:1em; color:Tomato" class="index_item_edit btn btn-dark">
                                                <i class="fas fa-edit"></i>
                                            </div>                                       
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
                        {{-- 這會產生多頁按鈕 --}}
                        {{$data_list->links()}}
                    </div>
                </div> 






                {{--  參考  --}}
                {{--  <div class="index_result_wrap">
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
                                <tr id="index_item_{{$loop->index}}" class="index_item" item_no="{{$value['id']}}" index="{{$loop->index}}">                                
                                    <td><input id="index_item_select_{{$loop->index}}" class="index_item_select" type="checkbox" name="checkbox" data-labelauty=" "></td>
                                    <td><input id="index_item_order_{{$loop->index}}" style="width:80px;" type="text" class="index_item_order form-control" placeholder="" value="{{$value['order_']}}"></td>
                                    目前設計 page 不可在這頁直接切換頁面，因為頁面代表一種特定的內容，正常沒事不會有人隨意搬移內容到別的頁面直接亂換頁面(而且是一個一個切換)
                                    如需批量搬移頁面，請不要直接取消page readonly，用勾選的方式另外批量搬移
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
                                            default設置或是項目default設置
                                            
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
                            全部default設置或是全部項目default設置
                        </div>
                    </div>                   
                </div>
                <div class="index_result_wrap">                    
                    <div style="height:5px">&nbsp;</div>
                    <div class="page_list">
                        這會產生多頁按鈕
                        {{$data_list->links()}}
                    </div>
                </div>  --}}
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

