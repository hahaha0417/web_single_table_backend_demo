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
        {{-- CKEditor --}}        
        {{--  http://www.grotte-de-han.be/web/bundles/snowcapadmin/vendor/ckeditor/samples/plugins/wysiwygarea/fullpage.html  --}}  
        {{--  https://ckeditor.com/ckeditor-4/download/  --}}
        {{--  https://cdn.ckeditor.com/  --}}
        <script src="{{asset("assets/plugin/ckeditor/ckeditor.js")}}"></script>
        {{--  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>  --}}
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
            {{--  這兩法相同  --}}
            {{--  var page_auto_complete_tag = {!! json_encode($page_auto_complete_tag) !!};   --}}
            var item_auto_complete_tag =  @json($item_auto_complete_tag);
            var dir_ =  @json($dir);
        </script>   
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/model/product/edit.css")}}">
        <script src="{{asset("assets/web/backend/product/model/product/edit.js")}}"></script>
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
        <div class="index_edit_title">
            {{--  title 東西從global title撈  --}}
            <h1 style="font-weight:bold;">Product Product</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">編輯項目</h3>
            Item
            <hr class="hr_title" />
            
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="index_edit_space">
            <br><br>
        </div>

        {{--  置頂HTML樣板產生器，用於content欄位  --}}

        {{csrf_field()}}
        <div id="unique_item" unique_id="{{$item['id']}}" unique_item="{{$item['item']}}"></div>
        {{--  如果要子項目搬移或複製，原則上在這頁處理  --}}
        {{--  因為在index就算給您id，也沒有人知道該id子項目是什麼，如果要確認，一定會進來edit看  --}}
        {{--  所以正常會開出兩個edit頁面觀看，因此在這頁做操作設計  --}}
        <div class="index_edit_content">            
            {{--  <form action="{{url("#")}}" method="post" enctype="multipart/form-data">  --}}
                               
                <div class="form-group row">
                    <label for="index_item_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item" name="index_item_item" placeholder="項目" value="{{$item['item']}}">                    
                </div>
                <div class="form-group row">
                    <label for="index_item_id" class="col-sm-3 col-form-label">識別項(ID) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_id" name="index_item_id" placeholder="識別項 : product_xxx_xxx" value="{{$item['id']}}">
                    <div id="index_item_id_check" class="index_item_id_check">
                        <div style="font-size:1.5em; color:green">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>     
                    <div id="index_item_id_error" class="index_item_id_error">
                        <div style="font-size:1.5em; color:red">
                            <i class="fas fa-times"></i>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">
                    <label for="index_item_name" class="col-sm-3 col-form-label">名稱(Name)      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_name" name="index_item_name" placeholder="名稱" value="{{$item['name']}}">
                </div>   
                <div class="form-group row">
                    <label for="index_item_enable" class="col-sm-3 col-form-label">啟用(Enabled) :      </label>
                    @if($item['enabled'] == 0)  
                        <input id="index_item_enabled" class="index_item_enabled" type="checkbox" name="checkbox" data-labelauty=" ">
                    @else
                        <input id="index_item_enabled" class="index_item_enabled" type="checkbox" name="checkbox" data-labelauty=" " checked>
                    @endif
                </div>        
                <div class="form-group row">
                    <label for="index_item_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_title" name="index_item_title" placeholder="標題" value="{{$item['title']}}">
                </div> 
                <div class="form-group row"> 
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>          
                    <label for="index_item_title_image" class="col-sm-3 col-form-label">圖片(Image) :      </label> 
                    <input type="text" class="form-control col-sm-4" id="index_item_title_image" name="index_item_title_image" placeholder="標題 - 圖片" value="{{$item['title_image']}}">
                    <div class="col-sm-2">
                        <div id="index_item_title_image_refresh" style="font-size:1em; color:Tomato" class="index_item_title_image_refresh btn btn-dark">
                            <i class="fas fa-refresh"></i>
                        </div>
                    </div>
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>      
                    <div id="index_item_title_image_upload" class="col-sm-6" name="index_item_title_image_upload" type="file"></div>    
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>    
                    <img src="{{url($item['title_image'])}}" id="index_item_title_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>      
                    <div class="w-100"></div>  
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>                          
                    <label for="index_item_title_describe" class="col-sm-3 col-form-label">描述(Describe)) :      </label>
                    <textarea class="index_item_title_describe form-control col-sm-8" id="index_item_title_describe" name="index_item_title_describe" rows="15" cols="50" placeholder="內容">{{$item['title_describe']}}</textarea>
                    <div class="w-100"></div>  
                </div>   
                <div class="form-group row">
                    <label for="index_item_image" class="col-sm-3 col-form-label">圖片(圖片) :      </label>
                    <input type="text" class="form-control col-sm-3" id="index_item_image" name="index_item_image" placeholder="圖片" value="{{$item['image']}}">
                    <div class="col-sm-2">
                        <div id="index_item_image_refresh" style="font-size:1em; color:Tomato" class="index_item_image_refresh btn btn-dark">
                            <i class="fas fa-refresh"></i>
                        </div>
                    </div>
                    <div id="index_item_image_upload" class="col-sm-6" name="index_item_image_upload" type="file"></div> 
                    <div class="w-100"></div>   
                    <img src="{{url($item['image'])}}" id="index_item_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>   
                </div>                
                <div class="form-group row">
                    <label for="index_item_url" class="col-sm-3 col-form-label">連結(Url) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_url" name="index_item_url" placeholder="連結" value="{{$item['url']}}">
                </div>
                <div class="form-group row">
                    <label for="index_item_comment" class="col-sm-3 col-form-label">備註(Comment) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_comment" name="index_item_comment" placeholder="備註" value="{{$item['comment']}}">
                </div>
                <div class="form-group row">       
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_item_comment_detail" class="col-sm-3 col-form-label">細節(Detail) :      </label>
                    <textarea class="index_item_comment_detail form-control col-sm-4" id="index_item_comment_detail" name="index_item_comment_detail" rows="5" cols="50" placeholder="備註 - 細節">{{$item['comment_detail']}}</textarea>
                    <div class="w-100"></div>  
                </div>
                <div class="form-group row">
                    <label for="index_item_order" class="col-sm-3 col-form-label">排序(Order) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_order" name="index_item_order" placeholder="0~1000" value="{{$item['order_']}}">
                </div>
                {{--  <div class="form-group row" style="width:1000px;">                    
                    <button type="button" id="index_item_update" name="index_item_update" class="btn btn-dark btn-lg btn-block">更新</button>
                </div>  --}}
                
            {{--  </form>  --}}

            <br><br>
            
            <hr class="hr1" />
    
            <br><br>
            
        </div>      
        
        
        <div class="index_edit_content">
            <div class="form-group row" style="width:1000px;">                    
                <button type="button" id="index_item_all_update" name="index_item_all_update" class="btn btn-dark btn-lg btn-block">全部更新</button>
                <button type="button" id="index_item_all_close" name="index_item_all_close" class="btn btn-dark btn-lg btn-block">關閉</button>
            </div>

            <br><br>
            
            <hr class="hr1" />
    
            <br><br>
        </div>          
        
        
        
        
    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

