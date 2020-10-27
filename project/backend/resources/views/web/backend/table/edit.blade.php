{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明
    ----------------------------------------------------------------------------   
    欄位是否要模組化，等草稿定稿再做模組化，避免考慮不完全

    模組化須注意 : 
    1. 樣式
    2. 功能
    3. 現在收入狀況
    4. 接口
    5. 變成整個大模塊，並且保證我有任意使用權
    
    ----------------------------------------------------------------------------
    注意 
    ----------------------------------------------------------------------------
    本專案強調是後台"簡易快速開發"，而不是後台"任意客製化"，不要做錯東西
    這裡強調"模組化可以放reference"(需提供正常運作保證)，但是"實際開發不一定要用reference"(由開發的人自行承擔)
    由於目前沒有確定可以正常賺錢，因此不直接進行獨立的模塊化
    ----------------------------------------------------------------------------
    注意 
    ----------------------------------------------------------------------------
    模塊後規劃放在laravel single table backend framework內，除非完成了確定不改
    不然會被人搞，要求要相容舊的接口
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}

<?
// ------------------------------------------------------ 
// 不要用這個
// \backend\alias\hahaha_alias_table_define::Alias("\\");
// ------------------------------------------------------ 
// 用傳統的貼法，避免出現錯誤
// 解法 : 
// 1. php提供新include，可以insert代碼做整理 * 
// 2. 插件可以幫我parser class_alias()，例如提供方法指定 
/** 
 * 特例(2) : ! Intelephense:analysis -- 這樣會導doctrine orm:generate-entities不能解析 
 * ! Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("\\");
 * 上面function獨立並只做class_alias
 * 
 **/
// ------------------------------------------------------ 
use hahaha\define\hahaha_define_base_key as key_;
use hahaha\define\hahaha_define_base_direction as direction;
use hahaha\define\hahaha_define_html_attribute as attr;
use hahaha\define\hahaha_define_html_class as class_;
use hahaha\define\hahaha_define_html_property as prop;
use hahaha\define\hahaha_define_base_node as node;
use hahaha\define\hahaha_define_base_validate as validate;
use hahaha\define\hahaha_define_html_style as style;
use hahaha\define\hahaha_define_html_tag as tag;
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_setting as setting;
use hahaha\define\hahaha_define_table_target as target;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_db_field_type as field_type;
use hahaha\define\hahaha_define_sql_operator as op;

// ------------------------------------------------------
use Spatie\Url\Url;
?>

<?
// $target_table_class_ = $target_setting_table['table'];
// 這從controller傳來
$parameter_ = \hahaha\hahaha_parameter::Instance();
$use_ = &$parameter_->Use;
//
$target_table_ = &$parameter_->Target_Table;
$target_setting_table_ = &$parameter_->Target_Setting_Table;
$target_table_identify_ = &$parameter_->Target_Table_Identify;
$target_table_ = &$parameter_->Target_Table;
$data_ = &$parameter_->Edit[key_::DATA];


$target_setting_table_meta_data_ = EntityManager::getClassmetadata($target_setting_table_["entity"]);                                                                                        
// table class 名
$target_table_class_ = $target_setting_table_['table'];
// -------------------------------------------------- 
// 這裡是設定，到時候包成函式
// -------------------------------------------------- 
$use_->Identify = $target_table_class_::IDENTIFY;
$use_->Class_Button_Add_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::BUTTON_ADD;
// -------------------------------------------------- 

// -------------------------------------------------- 
$use_->Block_Top_Identify = $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_TOP;
$use_->Id_Block_Top_Identify = "#" . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_TOP; 
$use_->Class_Block_Top_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_TOP;
$use_->Block_Top = &$target_table_->Index[$target_table_class_::B_TOP];
// -------------------------------------------------- 
$use_->Block_Main_Identify = $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_MAIN;
$use_->Id_Block_Main_Identify = "#" . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_MAIN; 
$use_->Class_Block_Main_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_MAIN;
$use_->Block_Main = &$target_table_->Edit[$target_table_class_::B_MAIN];

// -------------------------------------------------- 


// -------------------------------------------------- 
$use_->Block_Bottom_Identify = $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_BOTTOM;
$use_->Id_Block_Bottom_Identify = "#" . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_BOTTOM; 
$use_->Class_Block_Bottom_Identify = "." . $target_table_class_::IDENTIFY . "_" . $target_table_class_::B_BOTTOM;
$use_->Block_Bottom = &$target_table_->Index[$target_table_class_::B_BOTTOM];
// -------------------------------------------------- 

// ----------------------------------------------------- 
// 設定                                      
// ----------------------------------------------------- 
                                                          
// ----------------------------------------------------- 
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

        @if(Config::get('app.online_script'))
            {{--  jQuery-file-upload  --}}
            @if(Config::get('app.debug'))
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.js" integrity="sha512-kHQelWbKDm6MpUkhEofa7KZZ9ptiVijVs3Ck/TFi0Z8CeX5BrFMryD0uqAcv/JjGCD0HfRVuMtHaYZFBMYwglw==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/uploadfile.css" integrity="sha512-zLt+aG0li6PQEHzXHC8Mb/Od1GCHcBqspouOw2xa35COi5U61ZjN/lRcizPR9TYDy0wrqQEb261mssGcMSM2qA==" crossorigin="anonymous" />
            @else
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/jquery.uploadfile.min.js" integrity="sha512-uwNlWrX8+f31dKuSezJIHdwlROJWNkP6URRf+FSWkxSgrGRuiAreWzJLA2IpyRH9lN2H67IP5H4CxBcAshYGNw==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-file-upload/4.0.11/uploadfile.min.css" integrity="sha512-MudWpfaBG6v3qaF+T8kMjKJ1Qg8ZMzoPsT5yWujVfvIgYo2xgT1CvZq+r3Ks2kiUKcpo6/EUMyIUhb3ay9lG7A==" crossorigin="anonymous" />
            @endif

            {{--  ckeditor 4  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.15.0/ckeditor.js" integrity="sha512-bNMnTgKRxN1n+5rgfcf160HT2koHRcwLcSq/3JDOY9R65mja48E4Hh+a+IQXVaY2NoJCVC+pr0qE3Vz194QwnA==" crossorigin="anonymous"></script>
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.15.0/ckeditor.min.js" integrity="sha512-BteskBaKPMLSRjzTYRda2rK6xfUxidIVcyHaBktrwtFudN8oqOUh3lGZIPTlslTnR2VHMvHIKmgG7di9MZn4Sg==" crossorigin="anonymous"></script>
            @endif

            {{--  labelauty  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.js" integrity="sha512-h595yOMz7+UgeXI+bxG6K1tEiDh/BQHpwTNhtXGuexr7T3KMrVL9sMElPkrghrFVZUrqlvIzb6H+b4PT9GXAvA==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.css" integrity="sha512-NUD74ySmYmRWEO5NXZ2EU0FfFhCIVhsxSoi3i4fybJYVhr5DkV+gdyEBd8tO0Pl/CspRwllRSAaUG7theVh1dA==" crossorigin="anonymous" />
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.js" integrity="sha512-+PhiRvIK75jXs6iE9IUqtK0TM3ZMfdDFLts7M6jHt5fPaWbo3RSjrSj9cI+fcgUJPaxe3YnJspeaykVLzqKxBQ==" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/labelauty/1.1.4/jquery-labelauty.min.css" integrity="sha512-kUG7TU0SCl79O+kc9nP0LJmp3P/YRfS/BtQsJ/GcJx8WzJjRzB1Yz6BmbHygOA81dUb6TefGowZvLtjSyyZCIQ==" crossorigin="anonymous" />
            @endif

            {{--  lazyload  --}}
            <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>

            {{--  layer  --}}
            @if(Config::get('app.debug'))
                <script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.1.1/layer.js" integrity="sha512-+eChqsll8P6yHFipVChRfsE5NwvLbQLNyGJsaa9krPx2UIxYle085/5PxgUf4CHMzRHuANGWEkeBLimjzcrFCQ==" crossorigin="anonymous"></script>
            @else
                <script src="https://cdnjs.cloudflare.com/ajax/libs/layer/3.1.1/layer.min.js" integrity="sha512-0YosS8GSyQIZd2uWWNHG95QgN8kPN6WBmjjzakoTRfdCt0YCmJs2HHiiF6tmGwngN/fZ+JH93zFSkW2cv5uGWw==" crossorigin="anonymous"></script>
            @endif
        @else
            {{--  jQuery-file-upload  --}}
            @if(Config::get('app.debug'))
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/js/jquery.uploadfile.js")}}" ></script>
                <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/css/uploadfile.css")}}" />
            @else
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/js/jquery.uploadfile.min.js")}}" ></script>
                <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-file-upload/css/uploadfile.css")}}" />
            @endif

            {{--  ckeditor 4  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/ckeditor/ckeditor4/ckeditor.js")}}" ></script>

            {{--  labelauty  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/labelauty/source/jquery-labelauty.js")}}" ></script>
            <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/labelauty/source/jquery-labelauty.css")}}" />

            {{--  lazyload  --}}
            @if(Config::get('app.debug'))
                <script src="{{\p_ha::Assets("plugin/plugin/lazyload/lazyload.js")}}" ></script>
            @else
                <script src="{{\p_ha::Assets("plugin/plugin/lazyload/lazyload.min.js")}}" ></script>
            @endif

            {{--  layer  --}}
            <script src="{{\p_ha::Assets("plugin/plugin/layerui/dist/layer.js")}}" ></script>
        @endif

        {{--  --}}     
        {{--    --}}
        <script>
            {{--  此法不要用在plugin裡面，要請在index.js初始化  --}}
            {{-- var item_list_ = {!! $item_list !!};
            var edit_ = "{{ $index }}";
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

        <script>
            $(function(){    
                $(function () {
                    jQuery.noConflict(true);
                    $('[data-toggle="tooltip"]').tooltip();
                    jQuery.noConflict(false);
                })
                
            });
            
        </script>

        
        {{-- 自動生成文件 --}}
        <?
            $system_setting_pub_ = \pub\hahaha_system_setting::Instance();
            if($system_setting_pub_->Project->Backend->Generate_Script->Enabled)
            {
                // generator 
                $list_ = [
                    \hahaha\backend\table_edit_css::Instance(),         
                    \hahaha\backend\table_edit_js::Instance(),
                ];
                // 必須初始化，不然沒指標 
                $static_content_ = [];
                $dynamic_content_ = [];
                //
                $generator_ = \hahaha\hahaha_generator_web::Instance();
                
                $table_file_ = $system_setting_pub_->Project->Backend->Public . "/" . $system_setting_pub_->Project->Backend->Assets . 'web/backend/table/edit/table';
                $file_list_ = [
                    $table_file_ . '/' . $target_table_identify_ . '.css',
                    $table_file_ . '/' . $target_table_identify_ . '.js',
                ];  
                
                if(!$system_setting_pub_->Project->Backend->Generate_Script->Overwrite)
                {
                    foreach($file_list_ as $key => $file)
                    {
                        if(file_exists($file))  
                        {
                            // 已經有就不處理，unset
                            unset($list_[$key]);
                            unset($file_list_[$key]);
                        }                  
                    }
                }
                
                if(!empty($file_list_))
                {
                    $generator_->Generate($list_,
                        $static_content_,
                        $dynamic_content_
                    ); 
                    $generator_->Save($static_content_, 
                        $file_list_
                    );
                }
                
            }
            
            // 注意 : CSS必須在index.css前面，JS也必須在index.js前面，以進行覆蓋
            // 其他模組化的，等到我的框架時，再用我的模組，統一前置
            // $generator_->Render($dynamic_content_);
            
        ?>
       
        <link rel="stylesheet" href="{{\p_ha::Assets("web/backend/table/edit/table/{$target_table_identify_}.css")}}">
        <script src="{{\p_ha::Assets("web/backend/table/edit/table/{$target_table_identify_}.js")}}"></script>
        {{-- 客製化文件 --}}
        <link rel="stylesheet" href="{{\p_ha::Assets('web/backend/table/edit.css')}}">
        <script src="{{\p_ha::Assets('web/backend/table/edit.js')}}"></script>
        <script src="{{\p_ha::Assets('cross_origin/iframe_resize_height.js')}}"></script>

        
        {{--  附加  --}}
        

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

        <? // ----------------------------------------------------- ?>
        <? // 開始                                                  ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>
        
        <? // ----------------------------------------------------- ?>
        <? // 標題 - 開始                                           ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>
        
        <div class="edit_title">
            <h1 style="font-weight:bold;">{{__('backend.db_table_edit')}}</h1>
            <hr class="hr_title" />
            
            <h3 style="font-weight:bold;">{{$target_setting_table_['title']}}</h3>
            {{$target_setting_table_['description']}}
            <hr class="hr_title" />
        </div> 

        <? // ----------------------------------------------------- ?>
        <? // 標題 - 結束                                           ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>
        
        <? // -------------------------------------------------------------------------------------------------------------- ?>
        <? // 內容面板 ?>
        <? // -------------------------------------------------------------------------------------------------------------- ?>

        <? // ----------------------------------------------------- ?>
        <? // 內容 - 開始                                           ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>
        
        <div class="edit_content">
                
        </div>     
        <div class="edit_content">
            <form action="#" method="post">
                {{csrf_field()}}
                {{--  分隔線  --}}
                <div class="edit_result_wrap">
                </div>
                <? // -------------------------------------------------------------------------------------------------------------- ?>
                <? // 置頂區塊 ?>
                <? // 此為挖洞，非客製化 ?>
                <? // -------------------------------------------------------------------------------------------------------------- ?>

                <? // ----------------------------------------------------- ?>
                <? // Top - 開始                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>
                
                @if(!empty($use_->Block_Top) )
                    <div class="edit_result_wrap">
                        <div class="edit_result_content">
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                            <?php 
                            // 因為模板array會複製，所以用物件傳
                            $block = new \hahaha\hahaha_parameter;
                            $block->identify = &$use_->Block_Top_Identify;
                            $block->id = &$use_->Id_Block_Top_Identify;
                            $block->class = &$use_->Class_Block_Top_Identify;
                            $block->block = &$use_->Block_Top;
                            $block->block_class = "top";
                            $block->block_style = "";
                            ?>
                            @include("web.backend.table.common.block.block") 
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                        </div>
                    </div>
                @endif
                
                <? // ----------------------------------------------------- ?>
                <? // Top - 結束                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>

                <? // -------------------------------------------------------------------------------------------------------------- ?>
                <? // 內容面板 - 草創模組，簡單加就好，有需要複製後另做一份 ?>
                <? // 此為挖洞，非客製化 ?>
                <? // 彈出面板，所以border-bottom:unset;padding:unset; ?>
                <? // -------------------------------------------------------------------------------------------------------------- ?>  

                <? // ----------------------------------------------------- ?>
                <? // Main - 開始                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>
                
                @if(!empty($use_->Block_Main) )
                    <div class="edit_result_wrap" style="border-bottom:unset;padding:unset;">
                        <div class="edit_result_content">
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                            <?php 
                            // 因為模板array會複製，所以用物件傳
                            $block = new \hahaha\hahaha_parameter;
                            $block->identify = &$use_->Block_Main_Identify;
                            $block->id = &$use_->Id_Block_Main_Identify;
                            $block->class = &$use_->Class_Block_Main_Identify;
                            $block->panel = &$use_->Block_Main;  
                            $block->data = &$data_;   
                            $block->panel_class = "main";
                            $block->panel_style = "";                       
                            ?>
                            @include("web.backend.table.common.panel.panel") 
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                        </div>
                    </div>
                @endif

                <? // ----------------------------------------------------- ?>
                <? // Main - 結束                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>
              
                <? // -------------------------------------------------------------------------------------------------------------- ?>
                <? // 置底區塊 ?>
                <? // 此為挖洞，非客製化 ?>
                <? // -------------------------------------------------------------------------------------------------------------- ?>

                <? // ----------------------------------------------------- ?>
                <? // Bottom - 開始                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>
                
                
                @if(!empty($use_->Block_Bottom) )
                    <div class="edit_result_wrap">
                        <div class="edit_result_content">
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                            <?php 
                            // 因為模板array會複製，所以用物件傳
                            $block = new \hahaha\hahaha_parameter;
                            $block->identify = &$use_->Block_Bottom_Identify;
                            $block->id = &$use_->Id_Block_Bottom_Identify;
                            $block->class = &$use_->Class_Block_Bottom_Identify;
                            $block->block = &$use_->Block_Bottom;
                            $block->block_class = "bottom";
                            $block->block_style = "";  
                            ?>
                            @include("web.backend.table.common.block.block") 
                            <? // -------------------------------------------------------------------------------------------------------------- ?>
                        </div>
                    </div>
                @endif

                <? // ----------------------------------------------------- ?>
                <? // Bottom - 結束                                           ?>
                <? // ----------------------------------------------------- ?>
                <?                                                          ?>
                <? // ----------------------------------------------------- ?>

            </form>         
        </div>         
               
        <? // ----------------------------------------------------- ?>
        <? // 內容 - 結束                                           ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>

        <? // ----------------------------------------------------- ?>
        <? // 結束                                                  ?>
        <? // ----------------------------------------------------- ?>
        <?                                                          ?>
        <? // ----------------------------------------------------- ?>
         
        <script>
            
            $(function(){
                // 最後一次載入
                lazyload();      
                                
            });
            
        </script>
    </body>
    
</html>

