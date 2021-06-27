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
            {{--  var page_auto_complete_tag =  @json($page_auto_complete_tag);
            var item_auto_complete_tag =  @json($item_auto_complete_tag);  --}}            
            var no_ = "{{$item['no']}}";
        </script>   
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/dir_product/edit.css")}}">
        <script src="{{asset("assets/web/backend/product/dir_product/edit.js")}}"></script>
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
            <h1 style="font-weight:bold;">Product Index</h1>
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
        <div id="unique_item" unique_id="0" unique_class="0" unique_model="0"></div>
        {{--  如果要子項目搬移或複製，原則上在這頁處理  --}}
        {{--  因為在index就算給您id，也沒有人知道該id子項目是什麼，如果要確認，一定會進來edit看  --}}
        {{--  所以正常會開出兩個edit頁面觀看，因此在這頁做操作設計  --}}
        <div class="index_edit_content">            
            {{--  <form action="{{url("#")}}" method="post" enctype="multipart/form-data">  --}}
                
                
                
                <div class="form-group row">
                    <label for="index_item_database" class="col-sm-3 col-form-label">資料庫(Database) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_database" name="index_item_database" placeholder="資料庫" value="{{$item['database_']}}">
                </div>           
                <div>   
                    <img src="{{url($image)}}" id="index_item_database_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>                       
                </div>     
                <div class="form-group row">
                    <label for="index_item_level" class="col-sm-3 col-form-label">階層(Level) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_level" name="index_item_level" placeholder="階層" value="{{$item['level']}}">
                </div>
                <div class="form-group row">
                    <label for="index_item_type" class="col-sm-3 col-form-label">類型(Type) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_type" name="index_item_type" placeholder="類型" value="{{$item['type']}}">
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
          
                            
        });
        
    </script>
</html>

