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
    $key_field = &$item->key_field;
    $field = &$item->field;
    $key_data = &$item->key_data;
    $data_ = &$item->data;
    $table_name_ = &$item->table_name;
    //
    // 這從controller傳來
    $parameter_ = \hahaha\hahaha_parameter::Instance();
    $use_ = &$parameter_->Use;
    //
    $target_table_ = &$parameter_->Target_Table;
    $target_setting_table_ = &$parameter_->Target_Setting_Table;
    $target_setting_table_meta_data_ = EntityManager::getClassmetadata($target_setting_table_["entity"]);            
?>

@if($field[key_::TYPE] == type::LABEL)  
<div
    @if(!empty($field[key_::CLASSES])) 
        class="{{$field[key_::CLASSES]}}" 
    @else 
        class="" 
    @endif 
    @if(!empty($field[key_::STYLES])) 
        style="{{$field[key_::STYLES]}}" 
    @endif 
>        
    {{--  有欄位才填  --}}
    @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
        @if(!empty($field[key_::DB_FIELD][key_::NAME]))
            @if($target_setting_table_meta_data_->fieldMappings[$field[key_::DB_FIELD][key_::NAME]][key_::TYPE] == field_type::DATETIME)
                {{$data[$field[key_::DB_FIELD][key_::NAME]]->format('Y-m-d H:i:s')}}
            @else
                {{$data[$field[key_::DB_FIELD][key_::NAME]]}}
            @endif
        @else 
            {{$data[$key_field]}}
        @endif
    @else
    @endif
</div>
@elseif($field[key_::TYPE] == type::LABEL_BY_OPTION_VALUE)     
<div
    @if(!empty($field[key_::CLASSES])) 
        class="{{$field[key_::CLASSES]}}" 
    @else 
        class="" 
    @endif 
    @if(!empty($field[key_::STYLES])) 
        style="{{$field[key_::STYLES]}}" 
    @endif 
>      
    {{--  有欄位才填  --}}
    @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
        @if(!empty($field[key_::DB_FIELD][key_::NAME]))
            <?php
                foreach($field[key_::OPTIONS] as $key => $option) 
                {
                    if(isset($data[$field[key_::DB_FIELD][key_::NAME]]) && $option[key_::VALUE] == $data[$field[key_::DB_FIELD][key_::NAME]])
                    {
                        $label_text = $option[key_::TITLE];
                        break;
                    }
                }                                                                                            
            ?>
            {{$label_text}}
        @else 
                <?php
                foreach($field[key_::OPTIONS] as $key => $option) 
                {
                    if(isset($data[$key_field]) && $option[key_::VALUE] == $data[$key_field])
                    {
                        $label_text = $option[key_::TITLE];
                        break;
                    }
                }                                                                                            
            ?>
            @if(isset($label_text))
                {{$label_text}}
            @endif
        @endif
    @else
    @endif
</div>
@elseif($field[key_::TYPE] == type::TEXT)  
    <?php $input_value = NULL; ?>
    @if(isset($item->default) && $item->default  && isset($field[key_::DEFAULT]))
        <?php $input_value = $field[key_::DEFAULT]; ?>                            
    @endif   
    {{--  有欄位才填  --}}
    @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
        @if(!empty($field[key_::DB_FIELD][key_::NAME]))
            @if($target_setting_table_meta_data_->fieldMappings[$field[key_::DB_FIELD][key_::NAME]][key_::TYPE] == field_type::DATETIME)
                <?php $input_value = $data[$field[key_::DB_FIELD][key_::NAME]]->format('Y-m-d H:i:s'); ?>   
            @else
                <?php $input_value = $data[$field[key_::DB_FIELD][key_::NAME]]; ?>   
            @endif
        @else 
            <?php $input_value = $data[$key_field]; ?>   
        @endif
    @else
    @endif                                                      
    <input  
        @if(!empty($field[key_::ID])) 
            id="{{$field[key_::ID]}}_{{$key_data}}" 
        @endif 
        @if(!empty($field[key_::STYLES])) 
            style="{{$field[key_::STYLES]}}" 
        @endif 
        type="text" 
        @if(!empty($field[key_::CLASSES])) 
            class="form-control {{$field[key_::CLASSES]}}" 
        @else 
            class="form-control" 
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
        
        @if(isset($input_value))
            value="{{$input_value}}"   
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
@elseif($field[key_::TYPE] == type::PASSWORD) 
    <?php $input_value = NULL; ?>
    @if(isset($item->default) && $item->default  && isset($field[key_::DEFAULT]))
        <?php $input_value = $field[key_::DEFAULT]; ?>                            
    @endif  
    {{--  有欄位才填  --}}
    @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
        @if(!empty($field[key_::DB_FIELD][key_::NAME]))
            <?php $input_value = $data[$field[key_::DB_FIELD][key_::NAME]]; ?>  
        @else 
            <?php $input_value = $data[$key_field]; ?>   
        @endif
    @else
    @endif  
                                                              
    <input type="password" 
        @if(!empty($field[key_::ID])) 
            id="{{$field[key_::ID]}}_{{$key_data}}" 
        @endif 
        @if(!empty($field[key_::STYLES])) 
            style="{{$field[key_::STYLES]}}" 
        @endif 
        @if(!empty($field[key_::CLASSES])) 
            class="{{$field[key_::CLASSES]}} form-control col-sm-4" 
        @else 
            class="form-control col-sm-4" 
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
        

        @if(isset($input_value))
            value="{{$input_value}}"   
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
@elseif($field[key_::TYPE] == type::IMAGE)   
    <img 
        id="{{$field[key_::ID]}}_thumbnail_{{$key_data}}"
        class="{{$field[key_::ID]}} image
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
@elseif($field[key_::TYPE] == type::UPLOAD) 
    <div 
        id="{{$field[key_::ID]}}_{{$key_data}}"
            
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

        class="{{$field[key_::ID]}} upload
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
@elseif($field[key_::TYPE] == type::BUTTON_ICON)     
    <button
        type="click"
        @if(!empty($field[key_::ID])) 
            id="{{$field[key_::ID]}}_{{$key_data}}"
            class="{{$field[key_::ID]}} 
                @if(!empty($field[key_::CLASSES]))
                    {{$field[key_::CLASSES]}} 
                @endif 
                @if(!empty($field[key_::CLASSES_BUTTON]))
                    {{$field[key_::CLASSES_BUTTON]}}
                @endif 
            "
            style="
                @if(!empty($field[key_::STYLES])) 
                    {{$field[key_::STYLES]}}
                @endif 
                @if(!empty($field[key_::STYLES_BUTTON]))
                    {{$field[key_::STYLES_BUTTON]}}
                @endif 
            " 
        @endif   
        >
        <i class="
                @if(!empty($field[key_::CLASSES_2]))
                    {{$field[key_::CLASSES_2]}}
                @endif 
                @if(!empty($field[key_::CLASSES_ICON]))
                    {{$field[key_::CLASSES_ICON]}}
                @endif 
            "
            style="
                @if(!empty($field[key_::STYLES_2]))
                    {{$field[key_::STYLES_2]}}
                @endif 
                @if(!empty($field[key_::STYLES_ICON]))
                    {{$field[key_::STYLES_ICON]}}
                @endif 
            "
        >
            @if(!empty($field[key_::TITLE]) ) 
                {{$field[key_::TITLE]}} 
            @endif
        </i>
    </button>
@elseif($field[key_::TYPE] == type::BUTTON_ICON_LINK)  
<?php
$actual_link_ = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                            
$url_ = Url::fromString($actual_link_);   
?>
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
            @if(!empty($field[key_::CLASSES_LINK]))
                {{$field[key_::CLASSES_LINK]}} 
            @endif 
        "
        style="
            @if(!empty($field[key_::STYLES])) 
                {{$field[key_::STYLES]}}
            @endif 
            @if(!empty($field[key_::STYLES_LINK])) 
                {{$field[key_::STYLES_LINK]}}
            @endif 
        "   
    >

        <div
            @if(!empty($field[key_::ID])) 
                id="{{$field[key_::ID]}}_{{$key_data}}"
                class="{{$field[key_::ID]}} 
                    @if(!empty($field[key_::CLASSES_1]))
                        {{$field[key_::CLASSES_1]}}
                    @endif 
                    @if(!empty($field[key_::CLASSES_BUTTON]))
                        {{$field[key_::CLASSES_BUTTON]}}
                    @endif 
                "
                style="
                    @if(!empty($field[key_::STYLES_1])) 
                        {{$field[key_::STYLES_1]}}
                    @endif 
                    @if(!empty($field[key_::STYLES_BUTTON]))
                        {{$field[key_::STYLES_BUTTON]}}
                    @endif 
                " 
            @endif       
            
            >
            <i class="
                @if(!empty($field[key_::CLASSES_2]))
                    {{$field[key_::CLASSES_2]}}
                @endif 
                @if(!empty($field[key_::CLASSES_ICON]))
                    {{$field[key_::CLASSES_ICON]}}
                @endif 
            "
            style="
                @if(!empty($field[key_::STYLES_2]))
                    {{$field[key_::STYLES_2]}}
                @endif 
                @if(!empty($field[key_::STYLES_ICON]))
                    {{$field[key_::STYLES_ICON]}}
                @endif
            "
            >
                @if(!empty($field[key_::TITLE]) ) 
                    {{$field[key_::TITLE]}} 
                @endif
            </i>
        </div>
    </a>
@elseif($field[key_::TYPE] == type::RADIOBOX)   
    <?php $input_value = NULL; ?>
    @if(isset($item->default) && $item->default  && isset($field[key_::DEFAULT]))
        <?php $input_value = $field[key_::DEFAULT]; ?>        
    @endif
    @foreach($field[key_::OPTIONS] as $key_option => $option) 
        <?php $input = true; ?>
        @if(isset($field[key_::SETTINGS]) && isset($option[key_::SETTINGS][setting::INPUT])) 
            <?php $input = $option[key_::SETTINGS][setting::INPUT]; ?>
        @endif   
        @if($input)                            
            @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                @if(!empty($data[$field[key_::DB_FIELD][key_::NAME]]) && $option[key_::VALUE] == $data[$field[key_::DB_FIELD][key_::NAME]])
                    <?php $input_value = $key_option; ?>
                @endif
            @else
                @if(!empty($data[$key_field]) && $option[key_::VALUE] == $data[$key_field])
                    <?php $input_value = $key_option; ?>
                @endif
            @endif
        @endif
    @endforeach
    
    @foreach($field[key_::OPTIONS] as $key_option => $option)    
        <label for="{{$option[key_::ID]}}_{{$key_data}}" 
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
            @if(!empty($option[key_::ID])) 
                id="{{$option[key_::ID]}}_label_{{$key_data}}_{{$key_option}}" 
            @endif 
        >{{$option[key_::TITLE]}}    
        </label>  
        <input type="radio" 
            @if(!empty($option[key_::ID])) 
                id="{{$option[key_::ID]}}_{{$key_data}}_{{$key_option}}" 
            @endif 
            @if(!empty($option[key_::STYLES])) 
                style="{{$option[key_::STYLES]}}" 
            @endif 
            @if(!empty($option[key_::CLASSES])) 
                class="form-control col-sm-1 {{$option[key_::CLASSES]}}" 
            @else 
                class="form-control col-sm-1" 
            @endif    
            @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
                @if(!empty($key_data) )
                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                        name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}[{{$table_name_}}]"
                    @else 
                        name="{{$key_field}}_{{$key_data}}[{{$table_name_}}]"
                    @endif
                @else
                    @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                        name="{{$field[key_::DB_FIELD][key_::NAME]}}[{{$table_name_}}]"
                    @else 
                        name="{{$key_field}}[{{$table_name_}}]"
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

            @if(isset($input_value) && $key_option == $input_value)
                checked
            @endif
        >
    @endforeach
@elseif($field[key_::TYPE] == type::PANEL) 
    <? // -------------------------------------------------------------------------------------------------------------- ?>
    <? // 細節面板 - 草創模組，簡單加就好，有需要複製後另做一份 ?>
    <? // -------------------------------------------------------------------------------------------------------------- ?>
    @if(!empty($field[key_::USE_]) && $field[key_::USE_] == use_::B_BLOCK)
        <?
            $items_panel_ = &$target_table_->Index[
                $field[key_::CONTENT][0]
            ]; 
            
        ?>
    @elseif(!empty($field[key_::USE_]) && $field[key_::USE_] == use_::SETTING)
        {{--  有用到再補  --}}
    @elseif(!empty($field[key_::USE_]) && $field[key_::USE_] == use_::MIX)
        {{--  有用到再補  --}}
    @endif
    <div id="{{$use_->Panel_Detail_Identify}}_{{$key_data}}" class="{{$use_->Panel_Detail_Identify}}">
        <div class="{{$use_->Panel_Detail_Identify}}_content">
            @foreach($items_panel_ as $key_item_panel => $item_panel)
                <?php 
                    // 主要for 禁用reference的使用者，避免到時候被技術卡，被卡收入來源
                    // 架構的地方用reference，維護的地方不用，避免有話說
                    // 注意 : 這裡不做多層嵌套，要做請另外用原生php function做成模組
                    // 暫存
                    $item_temp_ = &$item;
                    //
                    $item = new \hahaha\hahaha_parameter;
                    $item->key_item = &$key_item_panel;
                    $item->item = &$item_panel;
                    $item->data = &$data_;  
                    // 暫存
                    $item = &$item_temp_;
                    // 
                    $item->panel_name = "panel_detail";
                    // 有預設值  
                    $item->default = false;
                    //  
                    
                ?>
                @include("web.backend.table.common.panel.item")   
            @endforeach
    
        </div>
    </div> 
    
@elseif($field[key_::TYPE] == type::CHECKBOX_SELECTED)  
<div
@if(!empty($field[key_::CLASSES_1])) 
    class="{{$field[key_::CLASSES_1]}}" 
@else 
    class="" 
@endif 
@if(!empty($field[key_::STYLES_1])) 
    style="{{$field[key_::STYLES_1]}}" 
@endif 
>
    <input 
        @if(!empty($field[key_::ID])) 
            id="{{$field[key_::ID]}}_{{$key_data}}"  
        @endif 
        @if(!empty($field[key_::CLASSES])) 
            class="{{$field[key_::CLASSES]}} form-control" 
        @else 
            class="form-control" 
        @endif 
        @if(!empty($field[key_::STYLES])) 
            style="{{$field[key_::STYLES]}}" 
        @endif 
        @if(!empty($field[key_::DB_FIELD]) && !empty($field[key_::DB_FIELD][key_::IS_FIELD]) )
            @if(!empty($field[key_::DB_FIELD][key_::NAME]))
                name="{{$field[key_::DB_FIELD][key_::NAME]}}_{{$key_data}}"
            @else 
                name="{{$key_field}}_{{$key_data}}"
            @endif
        @else
        @endif   
        type="checkbox" data-labelauty=" ">
</div>
@else 

@endif  