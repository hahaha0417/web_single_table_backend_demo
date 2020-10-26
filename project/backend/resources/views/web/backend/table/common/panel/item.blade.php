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
\backend\alias\hahaha_alias_table_define::Alias("\\");
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

@if(!empty($item->item[key::GROUP]))
    @if($item->item[key::GROUP] == group::FORM_GROUP_ROW) 
        <div class="form-group row"> 
            @if($item->item[key::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                <div class="short_wrap">
            @endif
            @foreach($item->item[key::ITEMS] as $key_field => $field)  
                <?php // 簡單用github同步維護即可，因為考量laravel開發者，所以這邊不做成php html模組(我php hahaha framework的single table，會根據這邊的功能，移植到那邊的hahaha_view or 另外模組) ?>
                @if($field[key::TYPE] == type::TEXT)  
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key::ID]}}" 
                            @if(!empty($field[key::CLASSES_1])) 
                                class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key::ID])) 
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif  
                        </label> 
                    @endif   

                    @if($input)                                                           
                        <input type="text" 
                            @if(!empty($field[key::ID])) 
                                @if(!empty($key_data))
                                    id="{{$field[key::ID]}}_{{$key_data}}" 
                                @else
                                    id="{{$field[key::ID]}}" 
                                @endif 
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
                            @if(!empty($field[key::STYLES])) 
                                style="{{$field[key::STYLES]}}" 
                            @else 
                                style=""
                            @endif 
                            @if(!empty($field[key::CLASSES])) 
                                class="{{$field[key::CLASSES]}} {{$field[key::ID]}} form-control col-sm-4" 
                            @else 
                                class="form-control col-sm-4 {{$field[key::ID]}}" 
                            @endif                                                             
                            @if(!empty($field[key::PLACEHOLDER])) 
                                placeholder="{{$field[key::PLACEHOLDER]}}" 
                            @else 
                                placeholder="" 
                            @endif 
                            {{--  有欄位才填  --}}                        
                            @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                @if(!empty($field[key::DB_FIELD][key::NAME]) && !empty($data[$field[key::DB_FIELD][key::NAME]]) )
                                    @if($target_setting_table_meta_data_->fieldMappings[$field[key::DB_FIELD][key::NAME]][key::TYPE] == field_type::DATETIME)
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
                                name="{{$key_field}}"
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
                    @endif   
                @elseif($field[key::TYPE] == type::TEXT_EXIST_CHECK)
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    <? // 有Exist檢查 ?>
                    @if($label)
                        <label for="{{$field[key::ID]}}" 
                            @if(!empty($field[key::CLASSES_1])) 
                                class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key::ID])) 
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif    
                        </label>  
                    @endif   

                    @if($input)                                                          
                        <input type="text" 
                            @if(!empty($field[key::ID])) 
                                id="{{$field[key::ID]}}" 
                            @endif 
                            @if(!empty($field[key::STYLES])) 
                                style="{{$field[key::STYLES]}}" 
                            @endif 
                            @if(!empty($field[key::CLASSES])) 
                                class="form-control col-sm-4 {{$field[key::ID]}} {{$field[key::CLASSES]}}" 
                            @else 
                                class="form-control col-sm-4 {{$field[key::ID]}}" 
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
                            @if(!empty($field[key::DB_FIELD]) && !empty($field[key::DB_FIELD][key::IS_FIELD]) )
                                @if(!empty($field[key::DB_FIELD][key::NAME]) && !empty($data[$field[key::DB_FIELD][key::NAME]]) )
                                    @if($target_setting_table_meta_data_->fieldMappings[$field[key::DB_FIELD][key::NAME]][key::TYPE] == field_type::DATETIME)
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
                                name="{{$key_field}}"
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
                    @endif  
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
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key::ID]}}" 
                            @if(!empty($field[key::CLASSES_1])) 
                                class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif   
                            @if(!empty($key_data))
                                id="{{$field[key::ID]}}_label_{{$key_data}}" 
                            @else
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif     
                        </label>  
                    @endif  

                    @if($input)                                                          
                        <input type="password" 
                            @if(!empty($key_data))
                                id="{{$field[key::ID]}}_{{$key_data}}" 
                            @else
                                id="{{$field[key::ID]}}" 
                            @endif 
                            @if(!empty($field[key::STYLES])) 
                                style="{{$field[key::STYLES]}}" 
                            @endif 
                            @if(!empty($field[key::CLASSES])) 
                                class="form-control col-sm-4 {{$field[key::ID]}} {{$field[key::CLASSES]}}" 
                            @else 
                                class="form-control col-sm-4 {{$field[key::ID]}}" 
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
                                @elseif(!empty($data[$key_field])) 
                                    value="{{$data[$key_field]}}"
                                @else
                                    value=""
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
                    @endif  
                @elseif($field[key::TYPE] == type::RADIOBOX)   
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $option = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::OPTION])) 
                        <?php $option = $field[key::SETTINGS][setting::OPTION]; ?>
                    @endif   

                    @if($label)
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
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif  
                        </label>   

                    @endif   
                    @if($option) 
                        @foreach($field[key::OPTIONS] as $key_option => $option) 
                            <?php $label = true; ?>
                            @if(isset($option[key::SETTINGS]) && isset($option[key::SETTINGS][setting::LABEL])) 
                                <?php $label = $option[key::SETTINGS][setting::LABEL]; ?>
                            @endif    
                            <?php $input = true; ?>
                            @if(isset($field[key::SETTINGS]) && isset($option[key::SETTINGS][setting::INPUT])) 
                                <?php $input = $option[key::SETTINGS][setting::INPUT]; ?>
                            @endif    
                            @if($label) 
                                <label for="{{$option[key::ID]}}" 
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
                                    @if(!empty($key_data))
                                        id="{{$option[key::ID]}}_label_{{$key_data}}_{{$key_option}}" 
                                    @else
                                        id="{{$option[key::ID]}}_label_{{$key_option}}" 
                                    @endif 
                                >{{$option[key::TITLE]}}    
                                </label> 
                            @endif   
                            @if($input)            
                                <div
                                    @if(!empty($field[key::CLASSES_OPTION])) 
                                        class="{{$field[key::CLASSES_OPTION]}}" 
                                    @else 
                                        class="" 
                                    @endif 
                                    @if(!empty($field[key::STYLES_OPTION])) 
                                        style="{{$field[key::STYLES_OPTION]}}" 
                                    @endif 
                                >
                                    <input type="radio" 
                                        @if(!empty($key_data))
                                            id="{{$option[key::ID]}}_{{$key_data}}_{{$key_option}}" 
                                        @else
                                            id="{{$option[key::ID]}}_{{$key_option}}" 
                                        @endif 
                                        @if(!empty($option[key::STYLES])) 
                                            style="{{$option[key::STYLES]}}" 
                                        @else 
                                            style=""
                                        @endif 
                                        @if(!empty($option[key::CLASSES])) 
                                            class="form-control col-sm-1 {{$field[key::ID]}} {{$option[key::CLASSES]}}" 
                                        @else 
                                            class="form-control col-sm-1 {{$field[key::ID]}}" 
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
                                            @if(!empty($data[$field[key::DB_FIELD][key::NAME]]) && $option[key::VALUE] == $data[$field[key::DB_FIELD][key::NAME]])
                                                checked
                                            @endif
                                        @else
                                            @if(!empty($data[$key_field]) && $option[key::VALUE] == $data[$key_field])
                                                checked
                                            @endif
                                        @endif
                                    >
                                </div> 
                            @endif   
                        @endforeach
                    @endif   
                @elseif($field[key::TYPE] == type::IMAGE) 
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label)
                        <label for="{{$field[key::ID]}}" 
                            @if(!empty($field[key::CLASSES_1])) 
                                class="col-sm-3 col-form-label {{$field[key::CLASSES_1]}}" 
                            @else 
                                class="col-sm-3 col-form-label" 
                            @endif    
                            @if(!empty($field[key::ID])) 
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif    
                        </label> 
                    @endif  
                    @if($input)       
                        <img 
                            id="{{$field[key::ID]}}_thumbnail"
                            class="col-sm-4 {{$field[key::ID]}} image {{$field[key::ID]}}
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
                    @endif 
                @elseif($field[key::TYPE] == type::UPLOAD) 
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label) 
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
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif    
                        </label> 
                    @endif   
                    @if($input) 
                        <div 
                            id="{{$field[key::ID]}}"
                                
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

                            class="col-sm-4 {{$field[key::ID]}} upload {{$field[key::ID]}}
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
                    @endif   
                @elseif($field[key::TYPE] == type::BUTTON_ICON)  
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   

                    @if($label) 
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
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif  
                        </label> 
                    @endif   
                    @if($input) 
                        <div
                            @if(!empty($field[key::ID])) 
                                @if(!empty($key_data))
                                    id="{{$field[key::ID]}}_{{$key_data}}" 
                                @else
                                    id="{{$field[key::ID]}}" 
                                @endif 
                                
                                class="{{$field[key::ID]}} 
                                    @if(!empty($field[key::CLASSES_BUTTON]))
                                        {{$field[key::CLASSES_BUTTON]}}
                                    @endif 
                                "
                                @if(!empty($key_data))
                                    name="{{$field[key::ID]}}_{{$key_data}}" 
                                @else
                                    name="{{$field[key::ID]}}" 
                                @endif 
                                style="
                                    @if(!empty($field[key::STYLES_BUTTON])) 
                                        {{$field[key::STYLES_BUTTON]}}
                                    @endif 
                                " 
                            @endif       
                            
                            >
                            <i class="
                                @if(!empty($field[key::CLASSES_ICON]))
                                    {{$field[key::CLASSES_ICON]}}
                                @endif 
                                @if(!empty($field[key::STYLES_ICON]))
                                    {{$field[key::STYLES_ICON]}}
                                @endif 
                            ">
                                @if(!empty($field[key::TITLE]) ) 
                                    {{$field[key::TITLE]}} 
                                @endif
                            </i>
                        </div>
                    @endif   
                @elseif($field[key::TYPE] == type::BUTTON_ICON_LINK)  
                    <?php $label = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::LABEL])) 
                        <?php $label = $field[key::SETTINGS][setting::LABEL]; ?>
                    @endif    
                    <?php $input = true; ?>
                    @if(isset($field[key::SETTINGS]) && isset($field[key::SETTINGS][setting::INPUT])) 
                        <?php $input = $field[key::SETTINGS][setting::INPUT]; ?>
                    @endif   
<?php
$actual_link_ = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";                            
$url_ = Url::fromString($actual_link_);   
?>
                    @if($label) 
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
                                id="{{$field[key::ID]}}_label" 
                            @endif 
                        >
                        @if(!empty($field[key::TITLE]))
                            {{$field[key::TITLE]}}
                        @endif     
                        </label> 
                    @endif   
                    @if($input) 
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
                            "
                            style="
                                @if(!empty($field[key::STYLES])) 
                                    {{$field[key::STYLES]}}
                                @endif 
                            "   
                        >

                            <div
                                @if(!empty($field[key::ID])) 
                                    id="{{$field[key::ID]}}_{{$key_data}}"
                                    class="{{$field[key::ID]}} 
                                        @if(!empty($field[key::CLASSES_BUTTON]))
                                            {{$field[key::CLASSES_BUTTON]}}"
                                        @endif 
                                    style="
                                        @if(!empty($field[key::STYLES_BUTTON])) 
                                            {{$field[key::STYLES_BUTTON]}}
                                        @endif 
                                    " 
                                @endif       
                                
                                >
                                <i class="
                                    @if(!empty($field[key::CLASSES_ICON]))
                                        {{$field[key::CLASSES_ICON]}}
                                    @endif 
                                    @if(!empty($field[key::STYLES_ICON]))
                                        {{$field[key::STYLES_ICON]}}
                                    @endif 
                                ">
                                    @if(!empty($field[key::TITLE]) ) 
                                        {{$field[key::TITLE]}} 
                                    @endif
                                </i>
                            </div>
                        </a>
                    @endif   
                @endif
            @endforeach
            @if($item->item[key::TYPE] == type::B_BLOCK_SHORT_WRAP) 
                </div>
            @endif
        </div>
    @endif
@endif 
