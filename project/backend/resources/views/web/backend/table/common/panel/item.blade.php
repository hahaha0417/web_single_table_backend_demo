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

<?php 
// 主要for 禁用reference的使用者，避免到時候被技術卡，被卡收入來源
// 架構的地方用reference，維護的地方不用，避免有話說
// 注意 : 這裡不做多層嵌套，要做請另外用原生php function做成模組

//
// 這從controller傳來
$parameter_ = \hahaha\hahaha_parameter::Instance();
$use_ = &$parameter_->Use;
//
//
$target_table_ = &$parameter_->Target_Table;
$target_setting_table_ = &$parameter_->Target_Setting_Table;
$target_setting_table_meta_data_ = EntityManager::getClassmetadata($target_setting_table_["entity"]);  
$data = &$item->data;

?>

@if(!empty($item->item[key_::GROUP]))
    @if($item->item[key_::GROUP] == group::FORM_GROUP_ROW) 
        <div             
            class="form-group row 
                @if(!empty($item->item[key_::CLASSES_GROUP])) 
                    {{$item->item[key_::CLASSES_GROUP]}}
                @endif 
                @if(!empty($item->item[key_::CLASSES_FORM_GROUP])) 
                    {{$item->item[key_::CLASSES_FORM_GROUP]}}
                @endif 
            " 
            style="
                @if(!empty($item->item[key_::STYLES_GROUP])) 
                    {{$item->item[key_::STYLES_GROUP]}}
                @endif
                @if(!empty($item->item[key_::STYLES_FORM_GROUP])) 
                    {{$item->item[key_::STYLES_FORM_GROUP]}}
                @endif 
            " 

        > 
            @if($item->item[key_::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                <div class="short_wrap">
            @endif
            @foreach($item->item[key_::ITEMS] as $key_field => $field)  
                <?php // 簡單用github同步維護即可，因為考量laravel開發者，所以這邊不做成php html模組(我php hahaha framework的single table，會根據這邊的功能，移植到那邊的hahaha_view or 另外模組) ?>
                @if($field[key_::TYPE] == type::TEXT)  
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key_::ID]}}" 
                            @if(!empty($field[key_::CLASSES_LABEL])) 
                                class="col-sm-3 col-form-label {{$field[key_::CLASSES_LABEL]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif  
                        </label> 
                    @endif   

                    @if($input)                                                           
                        <input type="text" 
                            @if(!empty($field[key_::ID])) 
                                @if(!empty($key_data))
                                    id="{{$field[key_::ID]}}_{{$key_data}}" 
                                @else
                                    id="{{$field[key_::ID]}}" 
                                @endif 
                            @endif 
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($key_data) )
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
                                    @else 
                                        name="{{$key_field}}_{{$key_data}}"
                                    @endif
                                @else
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}"
                                    @else 
                                        name="{{$key_field}}"
                                    @endif
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif   
                            @if(!empty($field[key_::STYLES])) 
                                style="{{$field[key_::STYLES]}}" 
                            @else 
                                style=""
                            @endif 
                            @if(!empty($field[key_::CLASSES])) 
                                class="{{$field[key_::CLASSES]}} {{$field[key_::ID]}} form-control col-sm-4" 
                            @else 
                                class="form-control col-sm-4 {{$field[key_::ID]}}" 
                            @endif                                                             
                            @if(!empty($field[key_::PLACEHOLDER])) 
                                placeholder="{{$field[key_::PLACEHOLDER]}}" 
                            @else 
                                placeholder="" 
                            @endif 
                            {{--  有欄位才填  --}}                        
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($field[key_::DB_FIELD][key_::NAME]) && !empty($data[$field[key_::DB_FIELD][key_::NAME]]) )
                                    @if($target_setting_table_meta_data_->fieldMappings[$field[key_::DB_FIELD][key_::NAME]][key_::TYPE] == field_type::DATETIME)
                                        value="{{$data[$field[key_::DB_FIELD][key_::NAME]]->format('Y-m-d H:i:s')}}"
                                    @else
                                        value="{{$data[$field[key_::DB_FIELD][key_::NAME]]}}"
                                    @endif
                                @elseif(!empty($data[$key_field]) ) 
                                    value="{{$data[$key_field]}}"
                                @else
                                    value=""
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif
                            
                            @if(!empty($field[key_::HINT])) 
                                data-toggle="tooltip" 
                                @if(!empty($field[key_::HINT][key_::DIRECTION])) 
                                    data-placement="{{$field[key_::HINT][key_::DIRECTION]}}" 
                                @else
                                    data-placement="top"
                                @endif 
                                @if(!empty($field[key_::HINT][key_::TITLE])) 
                                    title="{{$field[key_::HINT][key_::TITLE]}}"
                                @endif 
                            @endif 

                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::READONLY])) 
                                readonly
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::DISABLED])) 
                                disabled
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::REQUIRED])) 
                                required
                            @endif
                        >
                    @endif   
                @elseif($field[key_::TYPE] == type::TEXT_EXIST_CHECK)
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    <? // 有Exist檢查 ?>
                    @if($label)
                        <label for="{{$field[key_::ID]}}" 
                            @if(!empty($field[key_::CLASSES_LABEL])) 
                                class="col-sm-3 col-form-label {{$field[key_::CLASSES_LABEL]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif    
                        </label>  
                    @endif   

                    @if($input)                                                          
                        <input type="text" 
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}" 
                            @endif 
                            @if(!empty($field[key_::STYLES])) 
                                style="{{$field[key_::STYLES]}}" 
                            @endif 
                            @if(!empty($field[key_::CLASSES])) 
                                class="form-control col-sm-4 {{$field[key_::ID]}} {{$field[key_::CLASSES]}}" 
                            @else 
                                class="form-control col-sm-4 {{$field[key_::ID]}}" 
                            @endif    
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($key_data) )
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
                                    @else 
                                        name="{{$key_field}}_{{$key_data}}"
                                    @endif
                                @else
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}"
                                    @else 
                                        name="{{$key_field}}"
                                    @endif
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif   
                            @if(!empty($field[key_::PLACEHOLDER])) 
                                placeholder="{{$field[key_::PLACEHOLDER]}}" 
                            @else 
                                placeholder="" 
                            @endif   
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($field[key_::DB_FIELD][key_::NAME]) && !empty($data[$field[key_::DB_FIELD][key_::NAME]]) )
                                    @if($target_setting_table_meta_data_->fieldMappings[$field[key_::DB_FIELD][key_::NAME]][key_::TYPE] == field_type::DATETIME)
                                        value="{{$data[$field[key_::DB_FIELD][key_::NAME]]->format('Y-m-d H:i:s')}}"
                                    @else
                                        value="{{$data[$field[key_::DB_FIELD][key_::NAME]]}}"
                                    @endif
                                @elseif(!empty($data[$key_field]) ) 
                                    value="{{$data[$key_field]}}"
                                @else
                                    value=""
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif

                            @if(!empty($field[key_::HINT])) 
                                data-toggle="tooltip" 
                                @if(!empty($field[key_::HINT][key_::DIRECTION])) 
                                    data-placement="{{$field[key_::HINT][key_::DIRECTION]}}" 
                                @else
                                    data-placement="top"
                                @endif 
                                @if(!empty($field[key_::HINT][key_::TITLE])) 
                                    title="{{$field[key_::HINT][key_::TITLE]}}"
                                @endif 
                            @endif 

                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::READONLY])) 
                                readonly
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::DISABLED])) 
                                disabled
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::REQUIRED])) 
                                required
                            @endif
                        >
                    @endif  
                    <div id="{{$field[key_::ID]}}_exist_check" class="{{class_::EXIST_CHECK_SUCCESS}}">
                        <div style="font-size:1.5em; color:green">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>     
                    <div id="{{$field[key_::ID]}}_exist_check_error" class="{{class_::EXIST_CHECK_ERROR}}">
                        <div style="font-size:1.5em; color:red">
                            <i class="fas fa-times"></i>
                        </div>
                    </div> 
                @elseif($field[key_::TYPE] == type::PASSWORD) 
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key_::ID]}}" 
                            @if(!empty($field[key_::CLASSES_LABEL])) 
                                class="col-sm-3 col-form-label {{$field[key_::CLASSES_LABEL]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif   
                            @if(!empty($key_data))
                                id="{{$field[key_::ID]}}_label_{{$key_data}}" 
                            @else
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif     
                        </label>  
                    @endif  

                    @if($input)                                                          
                        <input type="password" 
                            @if(!empty($key_data))
                                id="{{$field[key_::ID]}}_{{$key_data}}" 
                            @else
                                id="{{$field[key_::ID]}}" 
                            @endif 
                            @if(!empty($field[key_::STYLES])) 
                                style="{{$field[key_::STYLES]}}" 
                            @endif 
                            @if(!empty($field[key_::CLASSES])) 
                                class="form-control col-sm-4 {{$field[key_::ID]}} {{$field[key_::CLASSES]}}" 
                            @else 
                                class="form-control col-sm-4 {{$field[key_::ID]}}" 
                            @endif    
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($key_data) )
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
                                    @else 
                                        name="{{$key_field}}_{{$key_data}}"
                                    @endif
                                @else
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}"
                                    @else 
                                        name="{{$key_field}}"
                                    @endif
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif   
                            @if(!empty($field[key_::PLACEHOLDER])) 
                                placeholder="{{$field[key_::PLACEHOLDER]}}" 
                            @else 
                                placeholder="" 
                            @endif   
                            {{--  有欄位才填  --}}
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                    value="{{$data[$field[key_::DB_FIELD][key_::NAME]]}}"
                                @elseif(!empty($data[$key_field])) 
                                    value="{{$data[$key_field]}}"
                                @else
                                    value=""
                                @endif
                            @else
                            @endif

                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::READONLY])) 
                                readonly
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::DISABLED])) 
                                disabled
                            @endif
                            @if(!empty($field[key_::ATTRIBUTES]) && !empty($field[key_::ATTRIBUTES][attr::REQUIRED])) 
                                required
                            @endif
                        >
                    @endif  
                @elseif($field[key_::TYPE] == type::RADIOBOX)   
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $option = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::OPTION])) 
                        <?php $option = $field[key_::SETTINGS][setting::OPTION]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key_::ID]}}" 
                            class="col-sm-3 col-form-label 
                                @if(!empty($field[key_::CLASSES_LABEL]))
                                    {{$field[key_::CLASSES_LABEL]}} 
                                @endif 
                            "    
                            style="
                                @if(!empty($field[key_::STYLES_LABEL]))
                                    {{$field[key_::STYLES_LABEL]}}
                                @endif 
                            " 
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif  
                        </label>   

                    @endif   
                    @if($option) 
                        @foreach($field[key_::OPTIONS] as $key_option => $option) 
                            <?php $label = true; ?>
                            @if(isset($option[key_::SETTINGS]) && isset($option[key_::SETTINGS][setting::LABEL])) 
                                <?php $label = $option[key_::SETTINGS][setting::LABEL]; ?>
                            @endif    
                            <?php $input = true; ?>
                            @if(isset($field[key_::SETTINGS]) && isset($option[key_::SETTINGS][setting::INPUT])) 
                                <?php $input = $option[key_::SETTINGS][setting::INPUT]; ?>
                            @endif    
                            @if($label) 
                                <label for="{{$option[key_::ID]}}" 
                                    class="col-sm-3 col-form-label 
                                        @if(!empty($field[key_::CLASSES_LABEL]))
                                            {{$field[key_::CLASSES_LABEL]}} 
                                        @endif 
                                    "    
                                    style="
                                        @if(!empty($field[key_::STYLES_LABEL]))
                                            {{$field[key_::STYLES_LABEL]}}
                                        @endif 
                                    " 
                                    @if(!empty($key_data))
                                        id="{{$option[key_::ID]}}_label_{{$key_data}}_{{$key_option}}" 
                                    @else
                                        id="{{$option[key_::ID]}}_label_{{$key_option}}" 
                                    @endif 
                                >{{$option[key_::TITLE]}}    
                                </label> 
                            @endif   
                            @if($input)            
                                <div
                                    @if(!empty($field[key_::CLASSES_OPTION])) 
                                        class="{{$field[key_::CLASSES_OPTION]}}" 
                                    @else 
                                        class="" 
                                    @endif 
                                    @if(!empty($field[key_::STYLES_OPTION])) 
                                        style="{{$field[key_::STYLES_OPTION]}}" 
                                    @endif 
                                >
                                    <input type="radio" 
                                        @if(!empty($key_data))
                                            id="{{$option[key_::ID]}}_{{$key_data}}_{{$key_option}}" 
                                        @else
                                            id="{{$option[key_::ID]}}_{{$key_option}}" 
                                        @endif 
                                        @if(!empty($option[key_::STYLES])) 
                                            style="{{$option[key_::STYLES]}}" 
                                        @else 
                                            style=""
                                        @endif 
                                        @if(!empty($option[key_::CLASSES])) 
                                            class="form-control col-sm-1 {{$field[key_::ID]}} {{$option[key_::CLASSES]}}" 
                                        @else 
                                            class="form-control col-sm-1 {{$field[key_::ID]}}" 
                                        @endif    
                                        @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                            @if(!empty($key_data) )
                                                @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                                    name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
                                                @else 
                                                    name="{{$key_field}}_{{$key_data}}"
                                                @endif
                                            @else
                                                @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                                    name="{{$field[key_::DB_FIELD][key_::NAME]}}"
                                                @else 
                                                    name="{{$key_field}}"
                                                @endif
                                            @endif
                                        @else
                                            name="{{$key_field}}"
                                        @endif   
                                        @if(!empty($field[key_::PLACEHOLDER])) 
                                            placeholder="{{$field[key_::PLACEHOLDER]}}" 
                                        @else 
                                            placeholder="" 
                                        @endif   
                                        value="{{$option[key_::VALUE]}}"
                                        data-labelauty=" "

                                        @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                            @if(!empty($data[$field[key_::DB_FIELD][key_::NAME]]) && $option[key_::VALUE] == $data[$field[key_::DB_FIELD][key_::NAME]])
                                                checked
                                            @endif
                                        @else
                                            @if(!empty($data[$key_field]) && $option[key_::VALUE] == $data[$key_field])
                                                checked
                                            @endif
                                        @endif
                                    >
                                </div> 
                            @endif   
                        @endforeach
                    @endif   
                @elseif($field[key_::TYPE] == type::IMAGE) 
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key_::ID]}}" 
                            @if(!empty($field[key_::CLASSES_LABEL])) 
                                class="col-sm-3 col-form-label {{$field[key_::CLASSES_LABEL]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif    
                        </label> 
                    @endif  
                    @if($input)       
                        <img 
                            id="{{$field[key_::ID]}}_thumbnail"
                            class="col-sm-4 {{$field[key_::ID]}} image {{$field[key_::ID]}}
                                @if(!empty($field[key_::CLASSES]))
                                    {{$field[key_::CLASSES]}} 
                                @endif 
                            "    
                            
                            {{--  有欄位才填  --}}
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                    src="{{\p_ha::V_IMAGES($data[$field[key_::DB_FIELD][key_::NAME]], $target_setting_table_['stage']) }}"
                                @else 
                                    src="{{\p_ha::V_IMAGES($data[$key_field], $target_setting_table_['stage']) }}"
                                @endif
                            @else
                            @endif

                            style="
                            @if(!empty($field[key_::STYLES])) 
                                {{$field[key_::STYLES]}}
                            @endif 
                            " 
                        >
                    @endif 
                @elseif($field[key_::TYPE] == type::UPLOAD) 
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label) 
                        <label for="{{$field[key_::ID]}}" 
                            class="col-sm-3 col-form-label 
                                @if(!empty($field[key_::CLASSES_LABEL]))
                                    {{$field[key_::CLASSES_LABEL]}} 
                                @endif 
                            "    
                            style="
                                @if(!empty($field[key_::STYLES_LABEL]))
                                    {{$field[key_::STYLES_LABEL]}}
                                @endif 
                            "  
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif    
                        </label> 
                    @endif   
                    @if($input) 
                        <div 
                            id="{{$field[key_::ID]}}"
                                
                            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                @if(!empty($key_data) )
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
                                    @else 
                                        name="{{$key_field}}_{{$key_data}}"
                                    @endif
                                @else
                                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                                        name="{{$field[key_::DB_FIELD][key_::NAME]}}"
                                    @else 
                                        name="{{$key_field}}"
                                    @endif
                                @endif
                            @else
                                name="{{$key_field}}"
                            @endif   

                            class="col-sm-4 {{$field[key_::ID]}} upload {{$field[key_::ID]}}
                                @if(!empty($field[key_::CLASSES]))
                                    {{$field[key_::CLASSES]}} 
                                @endif 
                            "     
                            style="{{$field[key_::STYLES]}}
                                @if(!empty($field[key_::STYLES])) 
                                    {{$field[key_::STYLES]}}
                                @endif 
                            " 

                            type="file"
                            >
                        </div> 
                    @endif   
                @elseif($field[key_::TYPE] == type::BUTTON_ICON)  
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label) 
                        <label for="{{$field[key_::ID]}}" 
                            class="col-sm-3 col-form-label 
                                @if(!empty($field[key_::CLASSES_LABEL]))
                                    {{$field[key_::CLASSES_LABEL]}} 
                                @endif 
                            "    
                            style="
                                @if(!empty($field[key_::STYLES_LABEL]))
                                    {{$field[key_::STYLES_LABEL]}}
                                @endif 
                            "   
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif  
                        </label> 
                    @endif   
                    @if($input) 
                        <?php // 這一定要button，不然沒辦法mask form submit ?>
                        <button 
                            type="click"
                            @if(!empty($field[key_::ID])) 
                                @if(!empty($key_data))
                                    id="{{$field[key_::ID]}}_{{$key_data}}" 
                                @else
                                    id="{{$field[key_::ID]}}" 
                                @endif 
                                
                                class="{{$field[key_::ID]}} 
                                    @if(!empty($field[key_::CLASSES_BUTTON]))
                                        {{$field[key_::CLASSES_BUTTON]}}
                                    @endif 
                                "
                                
                                style="
                                    @if(!empty($field[key_::STYLES_BUTTON])) 
                                        {{$field[key_::STYLES_BUTTON]}}
                                    @endif 
                                " 
                            @endif       
                            
                            >
                            <i class="
                                @if(!empty($field[key_::CLASSES_ICON]))
                                    {{$field[key_::CLASSES_ICON]}}
                                @endif 
                                @if(!empty($field[key_::STYLES_ICON]))
                                    {{$field[key_::STYLES_ICON]}}
                                @endif 
                            ">
                                @if(!empty($field[key_::TITLE]) ) 
                                    {{$field[key_::TITLE]}} 
                                @endif
                            </i>
                        </button>
                    @endif   
                @elseif($field[key_::TYPE] == type::BUTTON_ICON_LINK)  
                    <?php $label = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key_::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key_::SETTINGS]) && isset($field[key_::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key_::SETTINGS][setting::INPUT]; ?>
                    @endif   
<?php
$actual_link_ = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                            
$url_ = Url::fromString($actual_link_);   
?>
                    @if($label) 
                        <label for="{{$field[key_::ID]}}" 
                            class="col-sm-3 col-form-label 
                                @if(!empty($field[key_::CLASSES_LABEL]))
                                    {{$field[key_::CLASSES_LABEL]}} 
                                @endif 
                            "    
                            style="
                                @if(!empty($field[key_::STYLES_LABEL]))
                                    {{$field[key_::STYLES_LABEL]}}
                                @endif 
                            "  
                            @if(!empty($field[key_::ID])) 
                                id="{{$field[key_::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key_::TITLE]))
                            {{$field[key_::TITLE]}}
                        @endif     
                        </label> 
                    @endif   
                    @if($input) 
                        <a href="
                                @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                                    {{$url_}}/edit/{{$data[$field[key_::DB_FIELD][ $field[key_::INDEX] ]]}}
                                @else 
                                    {{$url_}}/edit/{{$data[ $field[key_::INDEX] ]}}
                                @endif  
                            "
                            class="{{$field[key_::ID]}} 
                                @if(!empty($field[key_::CLASSES]))
                                    {{$field[key_::CLASSES]}} 
                                @endif 
                            "
                            style="
                                @if(!empty($field[key_::STYLES])) 
                                    {{$field[key_::STYLES]}}
                                @endif 
                            "   
                        >

                            <div
                                @if(!empty($field[key_::ID])) 
                                    id="{{$field[key_::ID]}}_{{$key_data}}"
                                    class="{{$field[key_::ID]}} 
                                        @if(!empty($field[key_::CLASSES_BUTTON]))
                                            {{$field[key_::CLASSES_BUTTON]}}"
                                        @endif 
                                    style="
                                        @if(!empty($field[key_::STYLES_BUTTON])) 
                                            {{$field[key_::STYLES_BUTTON]}}
                                        @endif 
                                    " 
                                @endif       
                                
                                >
                                <i class="
                                    @if(!empty($field[key_::CLASSES_ICON]))
                                        {{$field[key_::CLASSES_ICON]}}
                                    @endif 
                                    @if(!empty($field[key_::STYLES_ICON]))
                                        {{$field[key_::STYLES_ICON]}}
                                    @endif 
                                ">
                                    @if(!empty($field[key_::TITLE]) ) 
                                        {{$field[key_::TITLE]}} 
                                    @endif
                                </i>
                            </div>
                        </a>
                    @endif   
                @endif
            @endforeach
            @if($item->item[key_::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                </div>
            @endif
        </div>
    @endif
@endif 
