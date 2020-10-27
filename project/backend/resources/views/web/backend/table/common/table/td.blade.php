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

{{-- laravel套版不要用reference，@foreach($value_item[key_::ITEMS] as $key_field => $field)，會找不到$value_item[key_::ITEMS] --}}
@foreach($block->fields as $key_item => $value_item)  
    <td @if(!empty($value_item[key_::STYLES])) style="{{$value_item[key_::STYLES]}}" @endif>
        @if(!empty($value_item[key_::GROUP]))
            @if($value_item[key_::GROUP] == group::INPUT_GROUP) 
                <div class="input-group">
            @endif
        @endif        
        @foreach($value_item[key_::ITEMS] as $key_field => $value_field) 
            <?php 
                // 主要for 禁用reference的使用者，避免到時候被技術卡，被卡收入來源
                // 架構的地方用reference，維護的地方不用，避免有話說
                // 注意 : 這裡不做多層嵌套，要做請另外用原生php function做成模組
                $item = new \hahaha\hahaha_parameter;
                $item->key_field = &$key_field;
                $item->field = &$value_field;
                $item->key_data = &$block->key_data;
                $item->data = &$block->data;
            ?>
            @include("web.backend.table.common.table.item.item")                
        @endforeach  
        @if(!empty($value_item[key_::GROUP]))
            @if($value_item[key_::GROUP] == group::INPUT_GROUP) 
                </div>
            @endif
        @endif
    </td>                                         
@endforeach   