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

<?
use hahaha\define\hahaha_define_table_direction as direction;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_class as class_;
use hahaha\define\hahaha_define_table_type as type;
use Spatie\Url\Url;
?>

<?
$target_table_class_ = $target_setting_table['table'];
$parameter_ = \hahaha\hahaha_parameter::Instance();
$use_ = &$parameter_->Use;
//
$target_table_ = &$parameter_->Target_Table;
$target_setting_table_ = &$parameter_->Target_Setting_Table;
// table class 名
$target_table_class_ = $target_setting_table_['table'];
//
$use_->Identify = $target_table_class_::IDENTIFY;
$use_->Class_Button_Add_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::BUTTON_ADD;
$use_->Panel_Add_Identify = $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_PANEL_ADD;
$use_->Id_Panel_Add_Identify = "#" . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_PANEL_ADD;
$use_->Class_Panel_Add_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_PANEL_ADD;
$use_->Panel_Add = &$target_table_->Index[$target_table_class_::B_PANEL_ADD];

?>

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
         
        {{--  主要文件  --}}
        {{--  因為參數式內容需要，所以需要產生需要的CSS & JS  
            因為表是動態內容，每個表會對應一組CSS & JS，存放在對應的
            // \p_ha::Assets('web/backend/table/index/*')路徑下
            命名為hahaha/backend_accounts_list.css & hahaha/backend/accounts_list.js
            {key} / {stage} / {node}("/"換成"_")
            --}}        
        {{--    --}}

        
        {{-- 自動生成文件 --}}
        <?
            // generator 
            $list_ = [
                \hahaha\backend\table_index_css::Instance(),         
                \hahaha\backend\table_index_js::Instance(),
            ];
            // 必須初始化，不然沒指標
            $static_content_ = [];
            $dynamic_content_ = [];
            //
            $generator_ = \hahaha\hahaha_generator_web::Instance();
            $generator_->Generate($list_,
                $static_content_,
                $dynamic_content_
            );
            $system_setting_pub_ = \pub\hahaha_system_setting::Instance();
            
            $table_file_ = $system_setting_pub_->Project->Backend->Public . "/" . $system_setting_pub_->Project->Backend->Assets . 'web/backend/table/index/table';
            $file_list_ = [
                $table_file_ . '/' . $target_table_identify . '.css',
                $table_file_ . '/' . $target_table_identify . '.js',
            ];        
            $generator_->Save($static_content_, 
                $file_list_
            );
            // 注意 : CSS必須在index.css前面，JS也必須在index.js前面，以進行覆蓋
            // 其他模組化的，等到我的框架時，再用我的模組，統一前置
            // $generator_->Render($dynamic_content_);
            
        ?>
       
        <link rel="stylesheet" href="{{\p_ha::Assets("web/backend/table/index/table/{$target_table_identify}.css")}}">
        <script src="{{\p_ha::Assets("web/backend/table/index/table/{$target_table_identify}.js")}}"></script>
        {{-- 客製化文件 --}}
        <link rel="stylesheet" href="{{\p_ha::Assets('web/backend/table/index.css')}}">
        <script src="{{\p_ha::Assets('web/backend/table/index.js')}}"></script>
        <script src="{{\p_ha::Assets('cross_origin/iframe_resize_height.js')}}"></script>

        
        {{--  附加  --}}
        

        
        <script>
            $(function(){    
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                  })
                
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
        {{--  有需要再模組化，基本上只是分塊整入index資料夾，用@include填入  --}}
        {{--  如要翻譯，請在hahaha_setting_table裡面事先翻好  --}}

        <? // -------------------------------------------------------------------------------------------------------------- ?>
        <? // 標題面板 ?>
        <? // -------------------------------------------------------------------------------------------------------------- ?>
        <div class="index_title">
            <h1 style="font-weight:bold;">{{__('backend.db_table')}}</h1>
            <hr class="hr_title" />
            
            <h3 style="font-weight:bold;">{{$target_setting_table['title']}}</h3>
            {{$target_setting_table['description']}}
            <hr class="hr_title" />
        </div> 
        <? // -------------------------------------------------------------------------------------------------------------- ?>
        <? // 內容面板 ?>
        <? // -------------------------------------------------------------------------------------------------------------- ?>
        <div class="index_content">
            <div class="index_content">
                <form action="#" method="post">
                    {{csrf_field()}}
                    {{--  分隔線  --}}
                    <div class="index_result_wrap">
                    </div>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <? // 置頂面板 ?>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <div class="index_result_wrap">
                        <!--快捷导航 开始-->
                        <div class="index_result_content">
                            @foreach($target_table->Index['top'] as $key_item => $item)                              
                                @if($item[key::TYPE] == type::B_BLOCK_NORMAL)                                      
                                    <div @if(!empty($item[key::GROUP])) class="{{$item[key::GROUP]}}" @endif>
                                        @foreach($item[key::ITEMS] as $key_field => $field)                                     
                                            @if($field[key::TYPE] == type::BUTTON_ICON)                                   
                                                {{--  
                                                    不採用一個屬性一個key，因為這樣太麻煩了，例如ICON給一個key::ICON，BUTTON給一個key::BUTTON
                                                    基本上只有要做的很完整的模組，我才會給特定key，但是假設很完整，為何不做成一個Module，目前覺得，如果是一個Module，Module應該提供Object Builder(不管是參數Builder還是元件Builder)
                                                    大概意思是，假設規劃很多，請做成一個模組，讓我用模組的方式建立，例如$obj->Parameter_Array() or $obj->HTML 
                                                    當然可以訂少數的Custom Key，但是原則上屬性的key僅限於放行比較通用的屬性
                                                    
                                                    大概意思是做得很完整，我會希望做成一個class，讓我可以快速導入，而不是我慢慢看code研究

                                                    總之，這裡有兩個class，基本上是簡易模組，除非有很複雜的模組(例如5層+，但可能放行完我會要求說把它弄成上面的Module做使用)，不然這邊就是key::Classed有五種
                                                    五種內的用5種key::STYLES or key::CLASSES
                                                --}}
                                                {{--  
                                                    範例 : 
                                                <div id="index_item_select_delete" class="index_item_select_delete btn btn-dark">
                                                    <div style="font-size:1.5em; color:Tomato">
                                                        <i class="fas fa-minus">選擇刪除</i>
                                                    </div>
                                                </div>  
                                                --}}
                                                <div id="{{$field['id']}}" class="{{$field[key::CLASSES]}} {{$field[key::CLASSES_1]}}">
                                                    <div style="{{$field[key::STYLES]}}">
                                                        <i class="{{$field[key::CLASSES_2]}}">{{$field['title']}}</i>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>                                    
                                @endif
                            @endforeach
                            {{-- 全部default設置或是全部項目default設置 --}}
                        </div>
                        <!--快捷导航 结束-->
                    </div>     
                    {{-- ------------------------------------------------------------------------------ --}}
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <? // Add置中面板 ?>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <div>
                        <div class="index_result_content">
                            <div id="{{$use_->Panel_Add_Identify}}" class="{{$use_->Panel_Add_Identify}}">
                                <div class="{{$use_->Panel_Add_Identify}}_content">
                                    @foreach($use_->Panel_Add as $key_item => $item)  
                                        @if(!empty($item[key::GROUP]))
                                            @if($item[key::GROUP] == group::FORM_GROUP_ROW) 
                                                @foreach($item[key::ITEMS] as $key_field => $field)  
                                                    @if($field[key::TYPE] == type::TEXT)   
                                                        <div class="form-group row">
                                                            <label for="{{$field[key::ID]}}" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-3 col-form-label" 
                                                                @endif    
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >{{$field[key::TITLE]}} :    
                                                            </label>                                                            
                                                            <input type="text" 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}" 
                                                                @endif 
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}}" 
                                                                @endif 
                                                                type="text" 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}} form-control col-sm-4" 
                                                                @else 
                                                                    class="form-control col-sm-4" 
                                                                @endif    
                                                                @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                                                                    @else 
                                                                        name="{{$key_field}}"
                                                                    @endif
                                                                @else
                                                                @endif   
                                                                @if(!empty($field[key::PLACEHOLDER])) 
                                                                    placeholder="{{$field[key::PLACEHOLDER]}}" 
                                                                @else 
                                                                    placeholder="" 
                                                                @endif   
                                                                value=""
                                                            >
                                                        </div>
                                                    @elseif($field[key::TYPE] == type::TEXT_EXIST_CHECK)
                                                        <div class="form-group row">
                                                            <? // 有Exist檢查 ?>
                                                            <label for="{{$field[key::ID]}}" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-3 col-form-label" 
                                                                @endif    
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >{{$field[key::TITLE]}} :    
                                                            </label>                                                            
                                                            <input type="text" 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}" 
                                                                @endif 
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}}" 
                                                                @endif 
                                                                type="text" 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}} form-control col-sm-4" 
                                                                @else 
                                                                    class="form-control col-sm-4" 
                                                                @endif    
                                                                @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                                                                    @else 
                                                                        name="{{$key_field}}"
                                                                    @endif
                                                                @else
                                                                @endif   
                                                                @if(!empty($field[key::PLACEHOLDER])) 
                                                                    placeholder="{{$field[key::PLACEHOLDER]}}" 
                                                                @else 
                                                                    placeholder="" 
                                                                @endif   
                                                                value=""
                                                            >
                                                            <div id="{{$field[key::ID]}}_exist_check" class="{{class_::EXIST_CHECK_SUCCESS}}">
                                                                <div style="font-size:1.5em; color:green">
                                                                    <i class="fas fa-check"></i>
                                                                </div>
                                                            </div>     
                                                            <div id="{{$field[key::ID]}}_exist_check_error" class="{{class_::EXIST_CHECK_ERROR}}">
                                                                <div style="font-size:1.5em; color:red">
                                                                    <i class="fas fa-times"></i>
                                                                </div>
                                                            </div> 
                                                        </div>   
                                                    @elseif($field[key::TYPE] == type::PASSWORD) 
                                                        <div class="form-group row">
                                                            <label for="{{$field[key::ID]}}" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-3 col-form-label" 
                                                                @endif    
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >{{$field[key::TITLE]}} :    
                                                            </label>                                                            
                                                            <input type="password" 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}" 
                                                                @endif 
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}}" 
                                                                @endif 
                                                                type="text" 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}} form-control col-sm-4" 
                                                                @else 
                                                                    class="form-control col-sm-4" 
                                                                @endif    
                                                                @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                                                                    @else 
                                                                        name="{{$key_field}}"
                                                                    @endif
                                                                @else
                                                                @endif   
                                                                @if(!empty($field[key::PLACEHOLDER])) 
                                                                    placeholder="{{$field[key::PLACEHOLDER]}}" 
                                                                @else 
                                                                    placeholder="" 
                                                                @endif   
                                                                value=""
                                                            >
                                                        </div>
                                                    @elseif($field[key::TYPE] == type::RADIOBOX)   
                                                        <div class="form-group row">
                                                            <label for="{{$field[key::ID]}}" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-3 col-form-label" 
                                                                @endif    
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >{{$field[key::TITLE]}} :    
                                                            </label>       
                                                           
                                                            <label for="{{$field[key::ID]}}11" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-1 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-1 col-form-label" 
                                                                @endif    
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >男     
                                                            </label>  
                                                            <input type="radio" 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}1" 
                                                                @endif 
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}}" 
                                                                @endif 
                                                                type="text" 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}} form-control col-sm-1" 
                                                                @else 
                                                                    class="form-control col-sm-1" 
                                                                @endif    
                                                                @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                                                                    @else 
                                                                        name="{{$key_field}}"
                                                                    @endif
                                                                @else
                                                                @endif   
                                                                @if(!empty($field[key::PLACEHOLDER])) 
                                                                    placeholder="{{$field[key::PLACEHOLDER]}}" 
                                                                @else 
                                                                    placeholder="" 
                                                                @endif   
                                                                value=""
                                                                data-labelauty=" "
                                                            >
                                                            <label for="{{$field[key::ID]}}22" 
                                                                @if(!empty($field[key::CLASSES_1])) 
                                                                    class="col-sm-1 col-form-label {{$field[key::CLASSES_1]}}" 
                                                                @else 
                                                                    class="col-sm-1 col-form-label" 
                                                                @endif  
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}} margin-left: 5;" 
                                                                @else
                                                                    style="margin-left: 5%;" 
                                                                @endif   
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}_label" 
                                                                @endif 
                                                            >女 
                                                            </label>  
                                                            <input type="radio" 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}2" 
                                                                @endif 
                                                                @if(!empty($field[key::STYLES])) 
                                                                    style="{{$field[key::STYLES]}}" 
                                                                @endif 
                                                                type="text" 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}} form-control col-sm-1" 
                                                                @else 
                                                                    class="form-control col-sm-1" 
                                                                @endif    
                                                                @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                                                                    @else 
                                                                        name="{{$key_field}}"
                                                                    @endif
                                                                @else
                                                                @endif   
                                                                @if(!empty($field[key::PLACEHOLDER])) 
                                                                    placeholder="{{$field[key::PLACEHOLDER]}}" 
                                                                @else 
                                                                    placeholder="" 
                                                                @endif   
                                                                value=""
                                                                data-labelauty=" "
                                                            >
                                                        
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif 
                                    @endforeach
                                
                                    {{-- <div class="form-group row">
                                        <label for="index_item_add_panel_page" class="col-sm-3 col-form-label">頁面(Page) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_panel_page" name="index_item_add_panel_page" placeholder="頁面" value="">
                                    </div>
                                    <div class="form-group row">
                                        <label for="index_item_add_panel_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                                        <input type="text" class="form-control col-sm-4" id="index_item_add_panel_item" name="index_item_add_panel_item" placeholder="項目" value="">
                                    </div>
                                    <div class="form-group row">
                                                         
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
                                    </div> --}}
    
                                </div>
                            </div>
                        </div>
                    </div>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <? // 內容面板 ?>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <div class="index_result_wrap">
                        <div class="index_result_content">
                            <table class="list_tab table table-sm">
                                <tr id="index_item_all" class="index_item">                                   
                                    @foreach($target_table->Index['main'] as $key_item => $item) 
                                        <th @if(!empty($item[key::STYLES])) style="{{$item[key::STYLES]}}" @endif>
                                            @if($item[key::TYPE] == type::LABEL)           
                                                {{$item[key::TITLE]}}
                                            @elseif($item[key::TYPE] == type::CHECKBOX_SELECTED)
                                                <input id="{{$item[key::ID]}}"
                                                    @if(!empty($field[key::CLASSES])) 
                                                        class="{{$field[key::CLASSES]}} form-control" 
                                                    @else 
                                                        class="form-control" 
                                                    @endif 
                                                    type="checkbox" name="checkbox" data-labelauty=" "
                                                >
                                            @else 
                                                {{$item[key::TITLE]}}
                                            @endif   
                                        </th> 
                                    @endforeach                                                                   
                                </tr>
                                @foreach($data_list as $key_data => $data)                            
                                    <tr id="index_item_{{$key_data}}" class="index_item" item_id="{{$data['id']}}" index="{{$key_data}}">
                                        {{-- laravel套版不要用reference，@foreach($item[key::ITEMS] as $key_field => $field)，會找不到$item[key::ITEMS] --}}
                                        @foreach($target_table->Index['main'] as $key_item => $item)  
                                            <td @if(!empty($item[key::STYLES])) style="{{$item[key::STYLES]}}" @endif>
                                                @if(!empty($item[key::GROUP]))
                                                    @if($item[key::GROUP] == group::INPUT_GROUP) 
                                                        <div class="input-group">
                                                    @endif
                                                @endif
                                                {{--  對應欄位  --}}
                                                @foreach($item[key::ITEMS] as $key_field => $field) 
                                                    @if($field[key::TYPE] == type::LABEL)          
                                                        {{--  有欄位才填  --}}
                                                        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                            @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                {{$data[$field[key::DB_FIELD][key::NAME]]}}
                                                            @else 
                                                                {{$data[$key_field]}}
                                                            @endif
                                                        @else
                                                        @endif
                                                    @elseif($field[key::TYPE] == type::TEXT)                                                       
                                                        <input  
                                                            @if(!empty($field[key::ID])) 
                                                                id="{{$field[key::ID]}}_{{$key_data}}" 
                                                            @endif 
                                                            @if(!empty($field[key::STYLES])) 
                                                                style="{{$field[key::STYLES]}}" 
                                                            @endif 
                                                            type="text" 
                                                            @if(!empty($field[key::CLASSES])) 
                                                                class="{{$field[key::CLASSES]}} form-control" 
                                                            @else 
                                                                class="form-control" 
                                                            @endif                                                             
                                                            placeholder="" 
                                                            
                                                            {{--  有欄位才填  --}}
                                                            @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                    value="{{$data[$field[key::DB_FIELD][key::NAME]]}}"
                                                                @else 
                                                                    value="{{$data[$key_field]}}"
                                                                @endif
                                                            @else
                                                            @endif

                                                            @if(!empty($field[key::HINT])) 
                                                                data-toggle="tooltip" 
                                                                @if(!empty($field[key::HINT][key::DIRECTION])) 
                                                                    data-placement="{{$field[key::HINT][key::DIRECTION]}}" 
                                                                @else
                                                                    data-placement="top"
                                                                @endif 
                                                                @if(!empty($field[key::HINT][key::TITLE])) 
                                                                    title="{{$field[key::HINT][key::TITLE]}}"
                                                                @endif 
                                                            @endif 
                                                            >
                                                    @elseif($field[key::TYPE] == type::IMAGE)   
                                                        <img 
                                                            @if(!empty($field[key::ID])) 
                                                                id="{{$field[key::ID]}}_thumbnail_{{$key_data}}"
                                                                class="{{$field[key::ID]}}_thumbnail"
                                                            @endif    
                                                          
                                                            {{--  有欄位才填  --}}
                                                            @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                                                @if(!empty($field[key::DB_FIELD][key::NAME]))
                                                                    src="{{\p_ha::IMAGES($data[$field[key::DB_FIELD][key::NAME]], $target_setting_table['stage']) }}"
                                                                @else 
                                                                    src="{{\p_ha::IMAGES($data[$key_field], $target_setting_table['stage']) }}"
                                                                @endif
                                                            @else
                                                            @endif

                                                            @if(!empty($field[key::STYLES])) 
                                                                style="{{$field[key::STYLES]}}" 
                                                            @endif 
                                                        >
                                                    @elseif($field[key::TYPE] == type::UPLOAD) 
                                                        <div 
                                                            @if(!empty($field[key::ID])) 
                                                                id="{{$field[key::ID]}}_upload_{{$key_data}}"
                                                                class="{{$field[key::ID]}}_upload"
                                                                name="{{$field[key::ID]}}_upload_{{$key_data}}"
                                                            @endif       
                                                            @if(!empty($field[key::STYLES])) 
                                                                style="{{$field[key::STYLES]}}" 
                                                            @endif 
                                                                type="file"
                                                            >
                                                        </div>  
                                                    @elseif($field[key::TYPE] == type::BUTTON_ICON)     
                                                        <div
                                                            @if(!empty($field[key::ID])) 
                                                                id="{{$field[key::ID]}}_{{$key_data}}"
                                                                class="{{$field[key::ID]}} {{$field[key::CLASSES_1]}}"
                                                                name="{{$field[key::ID]}}_{{$key_data}}"
                                                            @endif       
                                                            @if(!empty($field[key::STYLES])) 
                                                                style="{{$field[key::STYLES]}}" 
                                                            @endif 
                                                            >
                                                            <i class="{{$field[key::CLASSES_2]}}"></i>
                                                        </div>
                                                    @elseif($field[key::TYPE] == type::PANEL) 
                                                            <div 
                                                                @if(!empty($field[key::ID])) 
                                                                    id="{{$field[key::ID]}}" 
                                                                @endif 
                                                                @if(!empty($field[key::CLASSES])) 
                                                                    class="{{$field[key::CLASSES]}}" 
                                                                @else 
                                                                @endif 
                                                                >
                                                                <label 
                                                                    @if(!empty($field[key::STYLES])) 
                                                                        style="{{$field[key::STYLES]}} input-group-prepend" 
                                                                    @endif 
                                                                    class="btn-secondary input-group-text" for="index_item_account_1">
                                                                    <i class="fab fa-elementor"></i>
                                                                </label>
                                                            </div>
                                                            <div id="{{$field[key::ID]}}_1" class="{{$field[key::ID]}}">
                                                                <div class="{{$field[key::ID]}}_content">
                                                                    {{--            <div class="row">
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
                                                                    </div> --}}
                                                                </div>
                                                            </div> 
                                                       
                                                    @elseif($field[key::TYPE] == type::CHECKBOX_SELECTED)  
                                                        <input 
                                                            @if(!empty($field[key::ID])) 
                                                                id="{{$field[key::ID]}}_{{$key_data}}"  
                                                            @endif 
                                                            @if(!empty($field[key::CLASSES])) 
                                                                class="{{$field[key::CLASSES]}} form-control" 
                                                            @else 
                                                                class="form-control" 
                                                            @endif 
                                                            type="checkbox" name="checkbox" data-labelauty=" ">
                                                    @else 

                                                    @endif            
                                                @endforeach  
                                                @if(!empty($item[key::GROUP]))
                                                    @if($item[key::GROUP] == group::INPUT_GROUP) 
                                                        </div>
                                                    @endif
                                                @endif
                                            </td>                                         
                                        @endforeach    
                                                                     
                                    </tr> 
                                @endforeach                   
                            </table>
                        </div>
                    </div>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <? // 置底面板 ?>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <div class="index_result_wrap"> 
                        @foreach($target_table->Index['bottom'] as $key_item => $item)                              
                                @if($item[key::TYPE] == type::B_BLOCK_NORMAL)                                      
                                    <div @if(!empty($item[key::GROUP])) class="{{$item[key::GROUP]}}" @endif>
                                        @foreach($item[key::ITEMS] as $key_field => $field)                                     
                                            @if($field[key::TYPE] == type::BUTTON_ICON)                                   
                                                {{--  
                                                    範例 : 
                                                <div id="index_item_select_delete" class="index_item_select_delete btn btn-dark">
                                                    <div style="font-size:1.5em; color:Tomato">
                                                        <i class="fas fa-minus">選擇刪除</i>
                                                    </div>
                                                </div>  
                                                --}}
                                                <div id="{{$field['id']}}" class="{{$field[key::CLASSES]}} {{$field[key::CLASSES_1]}}">
                                                    <div style="{{$field[key::STYLES]}}">
                                                        <i class="{{$field[key::CLASSES_2]}}">{{$field['title']}}</i>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>                                    
                                @endif
                            @endforeach          
                    </div>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <? // link面板 ?>
                    <? // -------------------------------------------------------------------------------------------------------------- ?>
                    <div class="index_result_wrap">                    
                        <div style="height:5px">&nbsp;</div>
                        <div class="page_list">
                            {{--  laravel樣式，有需要再模組化  --}}
                            <?
                            $page_ = $data_link['page'];
                            $count_ = $data_link['count'];
                            $range_ = $data_link['range'];
                            //
                            $range_start_ = $page_ - $range_;
                            $range_end_ = $page_ + $range_;
                            $out_start_flag_ = false;
                            $out_end_flag_ = false;

                            $actual_link_ = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                            
                            $url_ = Url::fromString($actual_link_);                         
                            ?>
                            <ul class="pagination" role="navigation">
                                @if(1 == $page_)
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« First">
                                        <span class="page-link" aria-hidden="true">‹‹</span>
                                    </li> 
                                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                        <span class="page-link" aria-hidden="true">‹</span>
                                    </li> 
                                @else
                                    <li class="page-item" aria-disabled="true" aria-label="« First">
                                        <a class="page-link" href="{{$url_->withQueryParameter('page', 1)}}" rel="next" aria-label="« First">‹‹</a>
                                    </li>    
                                    <li class="page-item" aria-disabled="true" aria-label="« Previous">
                                        <a class="page-link" href="{{$url_->withQueryParameter('page', $page_ - 1)}}" rel="next" aria-label="« Previous">‹</a>
                                    </li>                        
                                @endif
                                @for ($i = 1; $i <= $count_; $i++)
                                    @if($page_ == $i)
                                        <li class="page-item active" aria-current="page"><span class="page-link">{{$i}}</span></li>
                                    @elseif($i >= $range_start_ && $i <= $range_end_)
                                        <li class="page-item"><a class="page-link" href="{{$url_->withQueryParameter('page', $i)}}">{{$i}}</a></li>
                                    @elseif(!$out_start_flag_ && $i < $range_start_)
                                        <li class="page-item disabled" aria-current="page"><span class="page-link">...</span></li>
                                        <? $out_start_flag_ = true; ?>                                        
                                    @elseif(!$out_end_flag_ && $i > $range_end_)
                                        <li class="page-item disabled" aria-current="page"><span class="page-link">...</span></li>
                                        <? $out_end_flag_ = true; ?>
                                    @endif
                                @endfor
                                @if($count_ == $page_)
                                    <li class="page-item disabled" aria-disabled="true" aria-label="Next »">
                                        <span class="page-link" aria-hidden="true">›</span>
                                    </li> 
                                    <li class="page-item disabled" aria-disabled="true" aria-label="End »">
                                        <span class="page-link" aria-hidden="true">››</span>
                                    </li> 
                                @else
                                    <li class="page-item" aria-disabled="true" aria-label="Next »">
                                        <a class="page-link" href="{{$url_->withQueryParameter('page', $page_ + 1)}}" rel="next" aria-label="Next »">›</a>
                                    </li>            
                                    <li class="page-item" aria-disabled="true" aria-label="End »">
                                        <a class="page-link" href="{{$url_->withQueryParameter('page', $count_)}}" rel="next" aria-label="End »">››</a>
                                    </li>                 
                                @endif
                            </ul>
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

