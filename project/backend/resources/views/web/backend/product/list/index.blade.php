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
            var class_list_ = {!! $class_list !!};
            var model_list_ = {!! $model_list !!};
            {{--  var data_list_ = {!! $data_list !!};  --}}
            var class_ = "{{ $class }}";
            var model_ = "{{ $model }}";
            
            
        </script>  
         
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/list/index.css")}}">
        <script src="{{asset("assets/web/backend/product/list/index.js")}}"></script>
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
            List
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
                    <label for="index_class_select">分類</label>              
                    <select class="form-control" id="index_class_select" index="0">
                        <option name="all" order_="0">All</option>
                        @if(count($class_default_list))
                            <option name="separater_class_index" disabled>---------------------------------------- 預設 ----------------------------------------</option>
                        @endif
                        @foreach($class_default_list as $key => $value)    
                            @if($class == $value['class'])                              
                                <option name="{{$value['class']}}" SELECTED>{{$value['class']}}</option>  
                            @else
                                <option name="{{$value['class']}}">{{$value['class']}}</option>  
                            @endif                                                        
                        @endforeach 
                        @if(count($class_list))
                            <option name="separater_class_index" disabled>---------------------------------------- 分類 ----------------------------------------</option>
                        @endif
                        @foreach($class_list as $key => $value)  
                            <?php
                                $flag = 0;                                 
                            ?>    
                                       
                            @foreach($class_default_list as $key1 => $value1)  
                                @if($value['class'] == $value1['class'])
                                    <?php    
                                        $flag = 1;                                        
                                    ?> 
                                                                      
                                    @break;
                                @endif 
                                                            
                            @endforeach 
                            @if($flag == 0)  
                             
                                @if($class == $value['class']) 
                                
                                    <option name="{{$value['class']}}" SELECTED>{{$value['class']}}</option>  
                                @else
                                    <option name="{{$value['class']}}">{{$value['class']}}</option>  
                                @endif 
                            @endif   
                        @endforeach 
                        
                    </select>
                </div>
                <div class="form-group col-sm">     
                    <label for="index_model_select">模型</label>              
                    <select class="form-control" id="index_model_select">                         
                        <option name="all" order_="0">All</option>
                        @if(count($model_default_list))
                            <option name="separater_model_index" disabled>---------------------------------------- 預設 ----------------------------------------</option>
                        @endif
                        @foreach($model_default_list as $key => $value)                                                         
                            @if($model == $value['model']) 
                                <option name="{{$value['model']}}" SELECTED>{{$value['model']}}</option>  
                            @else
                                <option name="{{$value['model']}}">{{$value['model']}}</option>  
                            @endif                         
                        @endforeach 
                        @if(count($model_list))
                            <option name="separater_model_index" disabled>---------------------------------------- 模型 ----------------------------------------</option>
                        @endif
                        @foreach($model_list as $key => $value)  
                            <?php
                                $flag1 = 0; 
                            ?>                           
                            @foreach($model_default_list as $key1 => $value1)  
                                @if($value['model'] == $value1['model'])
                                    <?php    
                                        $flag1 = 1;
                                    ?>
                                    @break;
                                @endif 
                                                            
                            @endforeach 
                            @if($flag1 == 0)                            
                                @if($model == $value['model']) 
                                    <option name="{{$value['model']}}" SELECTED>{{$value['model']}}</option>  
                                @else
                                    <option name="{{$value['model']}}">{{$value['model']}}</option>  
                                @endif
                            @endif   
                        @endforeach 
                        
                    </select>
                </div>                
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
                    <label for="index_item_default_class" class="col-sm-3 col-form-label">預設分類 :      </label>
                    @if($class == 'all')
                        <input type="text" class="form-control col-sm-4" id="index_item_default_class" name="index_item_default_class" placeholder="分類" value="">
                    @else 
                        <input type="text" class="form-control col-sm-4" id="index_item_default_class" name="index_item_default_class" placeholder="分類" value="{{$class}}">
                    @endif
                    <div style="height:5px;">&nbsp;</div>   
                </div>
                <div class="form-group row">
                    <label for="index_item_default_model" class="col-sm-3 col-form-label">預設模型 :      </label>
                    @if($model == 'all')
                        <input type="text" class="form-control col-sm-4" id="index_item_default_model" name="index_item_default_model" placeholder="模型" value="">
                    @else 
                        <input type="text" class="form-control col-sm-4" id="index_item_default_model" name="index_item_default_model" placeholder="模型" value="{{$model}}">
                    @endif
                    
                    <div style="height:5px;">&nbsp;</div>
                     
                </div>
                <div class="form-group row">
                    <div id="index_item_add_default_dir" class="index_item_add_default_model btn btn-dark">
                        <div style="font-size:1.5em; color:Tomato">
                            <i class="fas fa-plus">新增</i>
                        </div>
                    </div>  
                    <div style="height:5px;">&nbsp;</div>
                    <div id="index_item_delete_default_dir" class="index_item_delete_default_model btn btn-dark">
                        <div style="font-size:1.5em; color:Tomato">
                            <i class="fas fa-minus">移除</i>
                        </div>
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
                                <label for="index_item_add_panel_class" class="col-sm-3 col-form-label"><span style="color:red;">*</span>分類(Class) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_class" name="index_item_add_panel_class" placeholder="分類" value="">
                            </div>  
                            <div class="form-group row">
                                <label for="index_item_add_panel_model" class="col-sm-3 col-form-label"><span style="color:red;">*</span>模型(Model) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_model" name="index_item_add_panel_model" placeholder="項目" value="">
                            </div>                     
                            <div class="form-group row">
                                <label for="index_item_add_panel_product" class="col-sm-3 col-form-label">產品(Product) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_product" name="index_item_add_panel_product" placeholder="產品">
                            </div>
                            <div class="form-group row">
                                <label for="index_item_add_panel_database" class="col-sm-3 col-form-label">資料庫(Database) :      </label>
                                <input type="text" class="form-control col-sm-4" id="index_item_add_panel_database" name="index_item_add_panel_database" placeholder="資料庫">
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
                                    產品                                   
                                </th>
                                <th style="width:45px;">啟用</th>
                                <th style="width:45px;">維護</th>
                                
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
                                            <input id="index_item_product_{{$loop->index}}" type="text" class="index_item_product form-control" placeholder="產品" value="{{$value['product']}}">
                                            <div id="index_item_product_prepend_{{$loop->index}}" class="input-group-prepend index_item_product_prepend">
                                                <label style="font-size:1.5em; color:Tomato" class="btn-secondary input-group-text" for="index_item_title_{{$loop->index}}">
                                                    <i class="fab fa-elementor"></i>
                                                </label>
                                            </div>
                                            <div id="index_item_panel_{{$loop->index}}" class="index_item_panel" style="overflow-y:auto;">
                                                <div class="index_item_panel_content">  
                                                    <div class="row">
                                                        <label for="index_item_panel_dir_{{$key}}" class="col-sm-3 col-form-label">路徑 : </label>
                                                        <div class="col">
                                                            <input style="width:530px;" id="index_item_panel_dir_{{$key}}" readonly style="" type="text" class="index_item_panel_dir form-control" placeholder="路徑" value="{{$value['web_dir']}}">  
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div id="index_item_panel_dir_enter_{{$key}}" style="font-size:1em; color:Tomato" class="index_item_panel_dir_enter btn btn-dark">
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </div>
                                                        </div>                                            
                                                    </div>                                                                                            
                                                    <div style="height:5px;">&nbsp;</div>
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <img id="index_item_panel_image_thumbnail_{{$loop->index}}" class="index_item_panel_image_thumbnail" src="{{url($image_list[$key])}}" style="width: auto;height: 200px;"/>
                                                        </div>
                                                    </div>
                                                    <div style="height:5px;">&nbsp;</div>
                                                    <div class="row">                                                        
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/class')}}" target="_blank">
                                                                <div id="index_item_panel_button_class_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_class btn btn-dark">
                                                                    class 
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/model')}}" target="_blank">
                                                                <div id="index_item_panel_button_model_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_model btn btn-dark">
                                                                    model 
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/product')}}" target="_blank">
                                                                <div id="index_item_panel_button_product_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_product btn btn-dark">
                                                                    product
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">                                                        
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/content/index')}}" target="_blank">
                                                                <div id="index_item_panel_button_index_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_index btn btn-dark">
                                                                    index     
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/content/overview')}}" target="_blank">
                                                                <div id="index_item_panel_button_overview_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_overview btn btn-dark">
                                                                    overview 
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <a href="{{url('backend/product/'.$value['class'].'/'.$value['model'].'/content/feature')}}" target="_blank">
                                                                <div id="index_item_panel_button_feature_{{$loop->index}}" style="font-size:1em; color:Tomato; width:130px;" class="index_item_panel_button_feature btn btn-dark">
                                                                    feature 
                                                                    <i class="fas fa-angle-double-right"></i>                                                                
                                                                </div>
                                                            </a>
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
                                    @if($value['enabled'] == 0)                            
                                        <td><input id="index_item_enabled_{{$loop->index}}" class="index_item_enabled" type="checkbox" name="checkbox" data-labelauty=" "></td>
                                    @else
                                        <td><input id="index_item_enabled_{{$loop->index}}" class="index_item_enabled" type="checkbox" name="checkbox" data-labelauty=" " checked></td>
                                    @endif
                                    @if($value['maintain'] == 0)                            
                                        <td><input id="index_item_maintain_{{$loop->index}}" class="index_item_maintain" type="checkbox" name="checkbox" data-labelauty=" "></td>
                                    @else
                                        <td><input id="index_item_maintain_{{$loop->index}}" class="index_item_maintain" type="checkbox" name="checkbox" data-labelauty=" " checked></td>
                                    @endif
                                    <td>
                                        <div class="" >  
                                            <div id="index_item_delete_{{$loop->index}}" value="{{$value['no']}}" style="font-size:1em; color:Tomato" class="index_item_delete btn btn-dark">
                                                <i class="fas fa-minus"></i>
                                            </div>
                                            <div id="index_item_edit_{{$loop->index}}" value="{{$value['no']}}" style="font-size:1em; color:Tomato" class="index_item_edit btn btn-dark">
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
                        {{--  這會產生多頁按鈕  --}}
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
                                <tr id="index_item_{{$loop->index}}" class="index_item" item_id="{{$value['id']}}" index="{{$loop->index}}">                                
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

