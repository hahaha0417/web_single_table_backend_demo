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
 * 特例(2) : 
 * @Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("\\");
 * 上面function獨立並只做class_alias
 * 
 **/
// ------------------------------------------------------ 
use hahaha\define\hahaha_define_base_key as key;
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
    //
    // 這從controller傳來
    $parameter_ = \hahaha\hahaha_parameter::Instance();
    $use_ = &$parameter_->Use;
    //
    $target_table_ = &$parameter_->Target_Table;
    $target_setting_table_ = &$parameter_->Target_Setting_Table;
    $target_setting_table_meta_data_ = EntityManager::getClassmetadata($target_setting_table_["entity"]);            
?>

@if($field[key::TYPE] == type::LABEL)  
<div
    @if(!empty($field[key::CLASSES])) 
        class="{{$field[key::CLASSES]}}" 
    @else 
        class="" 
    @endif 
    @if(!empty($field[key::STYLES])) 
        style="{{$field[key::STYLES]}}" 
    @endif 
>        
    {{--  有欄位才填  --}}
    @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
        @if(!empty($field[key::DB_FIELD][key::NAME]))
            @if($target_setting_table_meta_data_->fieldMappings[$field[key::DB_FIELD][key::NAME]][key::TYPE] == field_type::DATETIME)
                {{$data[$field[key::DB_FIELD][key::NAME]]->format('Y-m-d H:i:s')}}
            @else
                {{$data[$field[key::DB_FIELD][key::NAME]]}}
            @endif
        @else 
            {{$data[$key_field]}}
        @endif
    @else
    @endif
</div>
@elseif($field[key::TYPE] == type::LABEL_BY_OPTION_VALUE)     
<div
    @if(!empty($field[key::CLASSES])) 
        class="{{$field[key::CLASSES]}}" 
    @else 
        class="" 
    @endif 
    @if(!empty($field[key::STYLES])) 
        style="{{$field[key::STYLES]}}" 
    @endif 
>      
    {{--  有欄位才填  --}}
    @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
        @if(!empty($field[key::DB_FIELD][key::NAME]))
            <?php
                foreach($field[key::OPTIONS] as $key => $option) 
                {
                    if($option[key::VALUE] == $data[$field[key::DB_FIELD][key::NAME]])
                    {
                        $label_text = $option[key::TITLE];
                        break;
                    }
                }                                                                                            
            ?>
            {{$label_text}}
        @else 
                <?php
                foreach($field[key::OPTIONS] as $key => $option) 
                {
                    if($option[key::VALUE] == $data[$key_field])
                    {
                        $label_text = $option[key::TITLE];
                        break;
                    }
                }                                                                                            
            ?>
            {{$label_text}}
        @endif
    @else
    @endif
</div>
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
            class="form-control {{$field[key::CLASSES]}}" 
        @else 
            class="form-control" 
        @endif   
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($key_data) )
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}_{{$key_data}}"
                @else 
                    name="{{$key_field}}_{{$key_data}}"
                @endif
            @else
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}"
                @else 
                    name="{{$key_field}}"
                @endif
            @endif
        @else
            name="{{$key_field}}"
        @endif                                                         
        @if(!empty($field[key::PLACEHOLDER])) 
            placeholder="{{$field[key::PLACEHOLDER]}}" 
        @else 
            placeholder="" 
        @endif 
        {{--  有欄位才填  --}}
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($field[key::DB_FIELD][key::NAME]))
                @if($target_setting_table_meta_data_->fieldMappings[$field[key::DB_FIELD][key::NAME]][key::TYPE] == field_type::DATETIME)
                    value="{{$data[$field[key::DB_FIELD][key::NAME]]->format('Y-m-d H:i:s')}}"
                @else
                    value="{{$data[$field[key::DB_FIELD][key::NAME]]}}"
                @endif
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

        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::READONLY])) 
            readonly
        @endif
        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::DISABLED])) 
            disabled
        @endif
        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::REQUIRED])) 
            required
        @endif
    >
@elseif($field[key::TYPE] == type::PASSWORD) 
    <label for="{{$field[key::ID]}}" 
        class="col-sm-3 col-form-label 
            @if(!empty($field[key::CLASSES_LABEL]))
                {{$field[key::CLASSES_LABEL]}} 
            @endif 
        "    
        style="
            @if(!empty($field[key::STYLES_LABEL]))
                {{$field[key::STYLES_LABEL]}}
            @endif 
        "  
        @if(!empty($field[key::ID])) 
            id="{{$field[key::ID]}}_label_{{$key_data}}" 
        @endif 
    >{{$field[key::TITLE]}} :    
    </label>                                                            
    <input type="password" 
        @if(!empty($field[key::ID])) 
            id="{{$field[key::ID]}}_{{$key_data}}" 
        @endif 
        @if(!empty($field[key::STYLES])) 
            style="{{$field[key::STYLES]}}" 
        @endif 
        @if(!empty($field[key::CLASSES])) 
            class="{{$field[key::CLASSES]}} form-control col-sm-4" 
        @else 
            class="form-control col-sm-4" 
        @endif    
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($key_data) )
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}_{{$key_data}}"
                @else 
                    name="{{$key_field}}_{{$key_data}}"
                @endif
            @else
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}"
                @else 
                    name="{{$key_field}}"
                @endif
            @endif
        @else
            name="{{$key_field}}"
        @endif 
        @if(!empty($field[key::PLACEHOLDER])) 
            placeholder="{{$field[key::PLACEHOLDER]}}" 
        @else 
            placeholder="" 
        @endif   
        {{--  有欄位才填  --}}
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($field[key::DB_FIELD][key::NAME]))
                value="{{$data[$field[key::DB_FIELD][key::NAME]]}}"
            @else 
                value="{{$data[$key_field]}}"
            @endif
        @else
        @endif

        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::READONLY])) 
            readonly
        @endif
        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::DISABLED])) 
            disabled
        @endif
        @if(!empty($field[key::ATTRIBUTES]) && !empty($field[key::ATTRIBUTES][attr::REQUIRED])) 
            required
        @endif
    >
@elseif($field[key::TYPE] == type::IMAGE)   
    <img 
        id="{{$field[key::ID]}}_thumbnail_{{$key_data}}"
        class="{{$field[key::ID]}} image
            @if(!empty($field[key::CLASSES]))
                {{$field[key::CLASSES]}} 
            @endif 
        "    
        
        {{--  有欄位才填  --}}
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($field[key::DB_FIELD][key::NAME]))
                src="{{\p_ha::V_IMAGES($data[$field[key::DB_FIELD][key::NAME]], $target_setting_table_['stage']) }}"
            @else 
                src="{{\p_ha::V_IMAGES($data[$key_field], $target_setting_table_['stage']) }}"
            @endif
        @else
        @endif

        style="
            @if(!empty($field[key::STYLES])) 
                {{$field[key::STYLES]}}
            @endif 
        " 
    >
@elseif($field[key::TYPE] == type::UPLOAD) 
    <div 
        id="{{$field[key::ID]}}_{{$key_data}}"
            
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($key_data) )
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}_{{$key_data}}"
                @else 
                    name="{{$key_field}}_{{$key_data}}"
                @endif
            @else
                @if(!empty($field[key::DB_FIELD][key::NAME]))
                    name="{{$field[key::DB_FIELD][key::NAME]}}"
                @else 
                    name="{{$key_field}}"
                @endif
            @endif
        @else
            name="{{$key_field}}"
        @endif 

        class="{{$field[key::ID]}} upload
        @if(!empty($field[key::CLASSES]))
            {{$field[key::CLASSES]}} 
        @endif 
        "     
        style="{{$field[key::STYLES]}}
        @if(!empty($field[key::STYLES])) 
            {{$field[key::STYLES]}}
        @endif 
        " 

            type="file"
        >
    </div>  
@elseif($field[key::TYPE] == type::BUTTON_ICON)     
    <button
        type="click"
        @if(!empty($field[key::ID])) 
            id="{{$field[key::ID]}}_{{$key_data}}"
            class="{{$field[key::ID]}} 
                @if(!empty($field[key::CLASSES]))
                    {{$field[key::CLASSES]}} 
                @endif 
                @if(!empty($field[key::CLASSES_BUTTON]))
                    {{$field[key::CLASSES_BUTTON]}}
                @endif 
            "
            style="
                @if(!empty($field[key::STYLES])) 
                    {{$field[key::STYLES]}}
                @endif 
                @if(!empty($field[key::STYLES_BUTTON]))
                    {{$field[key::STYLES_BUTTON]}}
                @endif 
            " 
        @endif   
        >
        <i class="
                @if(!empty($field[key::CLASSES_2]))
                    {{$field[key::CLASSES_2]}}
                @endif 
                @if(!empty($field[key::CLASSES_ICON]))
                    {{$field[key::CLASSES_ICON]}}
                @endif 
            "
            style="
                @if(!empty($field[key::STYLES_2]))
                    {{$field[key::STYLES_2]}}
                @endif 
                @if(!empty($field[key::STYLES_ICON]))
                    {{$field[key::STYLES_ICON]}}
                @endif 
            "
        >
            @if(!empty($field[key::TITLE]) ) 
                {{$field[key::TITLE]}} 
            @endif
        </i>
    </button>
@elseif($field[key::TYPE] == type::BUTTON_ICON_LINK)  
<?php
$actual_link_ = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                            
$url_ = Url::fromString($actual_link_);   
?>
    <a href="
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            {{$url_}}/edit/{{$data[$field[key::DB_FIELD][ $field[key::INDEX] ]]}}
        @else 
            {{$url_}}/edit/{{$data[ $field[key::INDEX] ]}}
        @endif  
    "
        class="{{$field[key::ID]}} 
            @if(!empty($field[key::CLASSES]))
                {{$field[key::CLASSES]}} 
            @endif 
            @if(!empty($field[key::CLASSES_LINK]))
                {{$field[key::CLASSES_LINK]}} 
            @endif 
        "
        style="
            @if(!empty($field[key::STYLES])) 
                {{$field[key::STYLES]}}
            @endif 
            @if(!empty($field[key::STYLES_LINK])) 
                {{$field[key::STYLES_LINK]}}
            @endif 
        "   
    >

        <div
            @if(!empty($field[key::ID])) 
                id="{{$field[key::ID]}}_{{$key_data}}"
                class="{{$field[key::ID]}} 
                    @if(!empty($field[key::CLASSES_1]))
                        {{$field[key::CLASSES_1]}}
                    @endif 
                    @if(!empty($field[key::CLASSES_BUTTON]))
                        {{$field[key::CLASSES_BUTTON]}}
                    @endif 
                "
                style="
                    @if(!empty($field[key::STYLES_1])) 
                        {{$field[key::STYLES_1]}}
                    @endif 
                    @if(!empty($field[key::STYLES_BUTTON]))
                        {{$field[key::STYLES_BUTTON]}}
                    @endif 
                " 
            @endif       
            
            >
            <i class="
                @if(!empty($field[key::CLASSES_2]))
                    {{$field[key::CLASSES_2]}}
                @endif 
                @if(!empty($field[key::CLASSES_ICON]))
                    {{$field[key::CLASSES_ICON]}}
                @endif 
            "
            style="
                @if(!empty($field[key::STYLES_2]))
                    {{$field[key::STYLES_2]}}
                @endif 
                @if(!empty($field[key::STYLES_ICON]))
                    {{$field[key::STYLES_ICON]}}
                @endif
            "
            >
                @if(!empty($field[key::TITLE]) ) 
                    {{$field[key::TITLE]}} 
                @endif
            </i>
        </div>
    </a>
@elseif($field[key::TYPE] == type::RADIOBOX)   
    
    @foreach($field[key::OPTIONS] as $key_option => $option)    
        <label for="{{$option[key::ID]}}_{{$key_data}}" 
            class="col-sm-3 col-form-label 
                @if(!empty($field[key::CLASSES_LABEL]))
                    {{$field[key::CLASSES_LABEL]}} 
                @endif 
            "    
            style="
                @if(!empty($field[key::STYLES_LABEL]))
                    {{$field[key::STYLES_LABEL]}}
                @endif 
            " 
            @if(!empty($option[key::ID])) 
                id="{{$option[key::ID]}}_label_{{$key_data}}_{{$key_option}}" 
            @endif 
        >{{$option[key::TITLE]}}    
        </label>  
        <input type="radio" 
            @if(!empty($option[key::ID])) 
                id="{{$option[key::ID]}}_{{$key_data}}_{{$key_option}}" 
            @endif 
            @if(!empty($option[key::STYLES])) 
                style="{{$option[key::STYLES]}}" 
            @endif 
            @if(!empty($option[key::CLASSES])) 
                class="form-control col-sm-1 {{$option[key::CLASSES]}}" 
            @else 
                class="form-control col-sm-1" 
            @endif    
            @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                @if(!empty($key_data) )
                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                        name="{{$field[key::DB_FIELD][key::NAME]}}_{{$key_data}}"
                    @else 
                        name="{{$key_field}}_{{$key_data}}"
                    @endif
                @else
                    @if(!empty($field[key::DB_FIELD][key::NAME]))
                        name="{{$field[key::DB_FIELD][key::NAME]}}"
                    @else 
                        name="{{$key_field}}"
                    @endif
                @endif
            @else
                name="{{$key_field}}"
            @endif 
            @if(!empty($field[key::PLACEHOLDER])) 
                placeholder="{{$field[key::PLACEHOLDER]}}" 
            @else 
                placeholder="" 
            @endif   
            value="{{$option[key::VALUE]}}"
            data-labelauty=" "

            @if(!empty($field[key::DB_FIELD][key::NAME]))
                @if($option[key::VALUE] == $data[$field[key::DB_FIELD][key::NAME]])
                    checked
                @endif
            @else
                @if($option[key::VALUE] == $data[$key_field])
                    checked
                @endif
            @endif
        >
    @endforeach
@elseif($field[key::TYPE] == type::PANEL) 
    <? // -------------------------------------------------------------------------------------------------------------- ?>
    <? // 細節面板 - 草創模組，簡單加就好，有需要複製後另做一份 ?>
    <? // -------------------------------------------------------------------------------------------------------------- ?>
    @if(!empty($field[key::USE_]) && $field[key::USE_] == use_::B_BLOCK)
        <?
            $items_panel_ = &$target_table_->Index[
                $field[key::CONTENT][0]
            ]; 
            
        ?>
    @elseif(!empty($field[key::USE_]) && $field[key::USE_] == use_::SETTING)
        {{--  有用到再補  --}}
    @elseif(!empty($field[key::USE_]) && $field[key::USE_] == use_::MIX)
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
                ?>
                @include("web.backend.table.common.panel.item")   
            @endforeach
    
        </div>
    </div> 
    
@elseif($field[key::TYPE] == type::CHECKBOX_SELECTED)  
<div
@if(!empty($field[key::CLASSES_1])) 
    class="{{$field[key::CLASSES_1]}}" 
@else 
    class="" 
@endif 
@if(!empty($field[key::STYLES_1])) 
    style="{{$field[key::STYLES_1]}}" 
@endif 
>
    <input 
        @if(!empty($field[key::ID])) 
            id="{{$field[key::ID]}}_{{$key_data}}"  
        @endif 
        @if(!empty($field[key::CLASSES])) 
            class="{{$field[key::CLASSES]}} form-control" 
        @else 
            class="form-control" 
        @endif 
        @if(!empty($field[key::STYLES])) 
            style="{{$field[key::STYLES]}}" 
        @endif 
        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
            @if(!empty($field[key::DB_FIELD][key::NAME]))
                name="{{$field[key::DB_FIELD][key::NAME]}}_{{$key_data}}"
            @else 
                name="{{$key_field}}_{{$key_data}}"
            @endif
        @else
        @endif   
        type="checkbox" data-labelauty=" ">
</div>
@else 

@endif  