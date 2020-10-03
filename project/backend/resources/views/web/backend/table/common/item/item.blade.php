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
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_class as class_;
use hahaha\define\hahaha_define_table_css as css;
use hahaha\define\hahaha_define_table_direction as direction;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_node as node;
use hahaha\define\hahaha_define_table_tag as tag;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_validate as validate;
use hahaha\define\hahaha_define_table_db_field_type as db_field_type;
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
?>

@if(!empty($item->item[key::GROUP]))
    @if($item->item[key::GROUP] == group::FORM_GROUP_ROW) 
        <div class="form-group row"> 
            @if($item->item[key::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                <div class="short_wrap">
            @endif
            @foreach($item->item[key::ITEMS] as $key_field => $field)  
                @if($field[key::TYPE] == type::TEXT)   
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
                            @if(!empty($key_data))
                                id="{{$field[key::ID]}}_{{$key_data}}" 
                            @else
                                id="{{$field[key::ID]}}" 
                            @endif 
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
                        @if(!empty($field[key::PLACEHOLDER])) 
                            placeholder="{{$field[key::PLACEHOLDER]}}" 
                        @else 
                            placeholder="" 
                        @endif 
                        {{--  有欄位才填  --}}
                        @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                            @if(!empty($field[key::DB_FIELD][key::NAME]) && !empty($data[$field[key::DB_FIELD][key::NAME]]) )
                                @if($target_setting_table_meta_data_->fieldMappings[$field[key::DB_FIELD][key::NAME]][key::TYPE] == db_field_type::DATETIME)
                                    value="{{$data[$field[key::DB_FIELD][key::NAME]]->format('Y-m-d H:i:s')}}"
                                @else
                                    value="{{$data[$field[key::DB_FIELD][key::NAME]]}}"
                                @endif
                            @elseif(!empty($data[$key_field]) ) 
                                value="{{$data[$key_field]}}"
                            @else
                                value=""
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
                @elseif($field[key::TYPE] == type::TEXT_EXIST_CHECK)
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
                            class="form-control col-sm-4 {{$field[key::CLASSES]}}" 
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
                @elseif($field[key::TYPE] == type::PASSWORD) 
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
                            class="form-control col-sm-4 {{$field[key::CLASSES]}}" 
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
                            @elseif(!empty($data[$key_field])) 
                                value="{{$data[$key_field]}}"
                            @else
                                value=""
                            @endif
                        @else
                        @endif
                    >
                @elseif($field[key::TYPE] == type::RADIOBOX)   
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
                    @foreach($field[key::OPTIONS] as $key_option => $option)    
                        <label for="{{$option[key::ID]}}" 
                            @if(!empty($field[key::CLASSES_1])) 
                                class="col-sm-1 col-form-label {{$field[key::CLASSES_1]}}" 
                            @else 
                                class="col-sm-1 col-form-label" 
                            @endif    
                            @if(!empty($option[key::ID])) 
                                id="{{$option[key::ID]}}_label" 
                            @endif 
                        >{{$option[key::TITLE]}}    
                        </label>  
                        <input type="radio" 
                            @if(!empty($option[key::ID])) 
                                id="{{$option[key::ID]}}" 
                            @endif 
                            @if(!empty($option[key::STYLES_1])) 
                                style="{{$option[key::STYLES_1]}}" 
                            @endif 
                            type="text" 
                            @if(!empty($option[key::CLASSES])) 
                                class="{{$option[key::CLASSES]}} form-control col-sm-1" 
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
                            @endif   
                            @if(!empty($field[key::PLACEHOLDER])) 
                                placeholder="{{$field[key::PLACEHOLDER]}}" 
                            @else 
                                placeholder="" 
                            @endif   
                            value=""
                            data-labelauty=" "

                            @if(!empty($field[key::DB_FIELD][key::NAME]))
                                @if(!empty($data[$field[key::DB_FIELD][key::NAME]]) && $option[key::VALUE] == $data[$field[key::DB_FIELD][key::NAME]])
                                    checked
                                @endif
                            @else
                                @if(!empty($data[$key_field]) && $option[key::VALUE] == $data[$key_field])
                                    checked
                                @endif
                            @endif
                        >
                    @endforeach
                @elseif($field[key::TYPE] == type::BUTTON_ICON)  
                    <div id="{{$field['id']}}" class="{{$field[key::CLASSES]}} {{$field[key::CLASSES_1]}}">
                        <div style="{{$field[key::STYLES]}}">
                            <i class="{{$field[key::CLASSES_2]}}">{{$field['title']}}</i>
                        </div>
                    </div>
                @endif
            @endforeach
            @if($item->item[key::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                </div>
            @endif
        </div>
    @endif
@endif 
