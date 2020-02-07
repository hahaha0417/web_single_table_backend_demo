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
            var page_auto_complete_tag =  @json($page_auto_complete_tag);
            var item_auto_complete_tag =  @json($item_auto_complete_tag);
            var index_dir_ = @json($index_dir);
            var index_page_ = "{{ $index_page }}";
            
        </script>   
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/product/model/content/edit.css")}}">
        <script src="{{asset("assets/web/backend/product/model/content/edit.js")}}"></script>
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
        <div id="unique_item" unique_id="{{$item['id']}}" unique_page="{{$item['page']}}" unique_item="{{$item['item']}}"></div>
        {{--  如果要子項目搬移或複製，原則上在這頁處理  --}}
        {{--  因為在index就算給您id，也沒有人知道該id子項目是什麼，如果要確認，一定會進來edit看  --}}
        {{--  所以正常會開出兩個edit頁面觀看，因此在這頁做操作設計  --}}
        <div class="index_edit_content">            
            {{--  <form action="{{url("#")}}" method="post" enctype="multipart/form-data">  --}}
                
                <div class="form-group row">
                    <label for="index_item_page" class="col-sm-3 col-form-label">頁面(Page) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_page" name="index_item_page" placeholder="頁面" value="{{$item['page']}}">
                    <div id="index_item_page_check" class="index_item_page_check">
                        <div style="font-size:1.5em; color:green">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>     
                    <div id="index_item_page_error" class="index_item_page_error">
                        <div style="font-size:1.5em; color:red">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>   
                </div>
                <div class="form-group row">
                    <label for="index_item_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item" name="index_item_item" placeholder="項目" value="{{$item['item']}}">
                    <div id="index_item_item_check" class="index_item_item_check">
                        <div style="font-size:1.5em; color:green">
                            <i class="fas fa-check"></i>
                        </div>
                    </div>     
                    <div id="index_item_item_error" class="index_item_item_error">
                        <div style="font-size:1.5em; color:red">
                            <i class="fas fa-times"></i>
                        </div>
                    </div> 
                </div>
                <div class="form-group row">       
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_item_item_describe" class="col-sm-3 col-form-label">描述(Describe) :      </label>
                    <textarea class="index_item_item_describe form-control col-sm-4" id="index_item_item_describe" name="index_item_item_describe" rows="5" cols="50" placeholder="描述">{{$item['item_describe']}}</textarea>
                    <div class="w-100"></div>  

                               
                </div>
                <div class="form-group row">
                    <label for="index_item_id" class="col-sm-3 col-form-label">識別項(ID) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_id" name="index_item_id" placeholder="識別項 : index_xxx_xxx" value="{{$item['id']}}">
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
                    <label for="index_item_type" class="col-sm-3 col-form-label">類型(Type) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_type" name="index_item_type" placeholder="類型" value="{{$item['type']}}">
                </div>
                <div class="form-group row">
                    <label for="index_item_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_title" name="index_item_title" placeholder="標題" value="{{$item['title']}}">
                </div>
                <div class="form-group row">  
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_item_title_class" class="col-sm-3 col-form-label">類別(Class) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_title_class" name="index_item_title_class" placeholder="標題 - 類別" value="{{$item['title_class']}}">
                    <div class="w-100"></div>  

                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                        
                    <div class="w-100"></div>   

                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_item_title_name" class="col-sm-3 col-form-label">名稱(Name) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_title_name" name="index_item_title_name" placeholder="標題 - 名稱" value="{{$item['title_name']}}">
                    <div class="w-100"></div>  

                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                      
                    <div class="w-100"></div>   
                    
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
                    <label for="index_item_title_describe" class="col-sm-3 col-form-label">描述(Describe) :      </label>
                    <textarea class="index_item_title_describe form-control col-sm-4" id="index_item_title_describe" name="index_item_title_describe" rows="5" cols="50" placeholder="描述">{{$item['title_describe']}}</textarea>
                    <div class="w-100"></div>  

                </div>
                <div>                    
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
                    <label for="index_item_describe" class="col-sm-3 col-form-label">描述(Describe) :      </label>
                    <textarea class="index_item_describe form-control col-sm-4" id="index_item_describe" name="index_item_describe" rows="5" cols="50" placeholder="描述">{{$item['describe_']}}</textarea>
                </div>
                <div class="form-group row">    
                    <label for="index_item_content" class="col-sm-3 col-form-label">內容(Content) :      </label>
                    <textarea class="index_item_content form-control col-sm-8" id="index_item_content" name="index_item_content" rows="25" cols="100" placeholder="內容">{{$item['content']}}</textarea>
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
                <div class="form-group row" style="width:1000px;">                    
                    <button type="button" id="index_item_update" name="index_item_update" class="btn btn-dark btn-lg btn-block">更新</button>
                </div>
                
            {{--  </form>  --}}

            <br><br>
            
            <hr class="hr1" />
    
            <br><br>
            
        </div>      
        
        <div class="index_edit_content">        
            <div class="row">                
                <div class="form-group col-sm">     
                    <label for="index_item_item_select">項目</label>              
                    <select  class="form-control" size="8" id="index_item_item_select" name="index_item_item_select">           
                        {{-- @if(isset($item_item))             
                            @foreach($item_item as $key => $value)          
                                <option no_="{{$value['no']}}" name="{{$value['item']}}" order="{{$value['order_']}}">{{$value['order_']}} - {{$value['itel']}}</option>                                                   
                            @endforeach
                        @endif  --}}
                        {{-- <option name="{{$value['title_name']}}" order="{{$value['order_']}}" SELECTED>{{$value['order_']}} - {{$value['title']}} - url : {{ $value['url'] }}</option> --}}
                    </select>
                </div>
                <div class="form-group col-sm">
                    <div style="width: 80px; height: 120px; margin: 35px 0;">
                        <button type="button" id="index_item_item_add" name="index_item_item_add" style="width:80px;height:60px" class="btn btn-dark btn-lg">新增</button>
                        <button type="button" id="index_item_item_delete" name="index_item_item_delete" style="width:80px;height:60px" class="btn btn-dark btn-lg">刪除</button>
                    </div>
                </div>                
            </div>
            <p>
            {{--  <form action="{{url("#")}}" method="post" enctype="multipart/form-data">  --}}
                <div class="form-group row">
                    <label for="index_item_item_order" class="col-sm-3 col-form-label">排序(Order) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item_order" name="index_item_item_order" placeholder="0~1000" value="0">
                </div>
                <div class="form-group row">
                    <label for="index_item_item_item" class="col-sm-3 col-form-label">項目(Item) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item_item" name="index_item_item_item" placeholder="項目">
                </div>   
                <div class="form-group row">
                    <label for="index_item_item_content_show" class="col-sm-3 col-form-label">內容顯示(Content_Show) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item_content_show" name="index_item_item_content_show" placeholder="0~1" value="0">
                </div>             
                <div>                    
                </div>
                <div class="form-group row">
                    <label for="index_item_item_type1" class="col-sm-3 col-form-label">類型1(Type1) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item_type1" name="index_item_item_type1" placeholder="0~6" value="0">
                </div>              
                <div class="form-group row">    
                    <label for="index_item_item_content1" class="col-sm-3 col-form-label">內容(Content) :      </label>
                    <textarea class="index_item_item_content1 form-control col-sm-8" id="index_item_item_content1" name="index_item_item_content1" rows="25" cols="100" placeholder="內容1"></textarea>
                </div>
                <div class="form-group row">
                        <label for="index_item_item_type2" class="col-sm-3 col-form-label">類型2(Type2) :      </label>
                        <input type="text" class="form-control col-sm-4" id="index_item_item_type2" name="index_item_item_type2" placeholder="0~6" value="0">
                    </div>              
                    <div class="form-group row">    
                        <label for="index_item_item_content2" class="col-sm-3 col-form-label">內容(Content) :      </label>
                        <textarea class="index_item_item_content2 form-control col-sm-8" id="index_item_item_content2" name="index_item_item_content2" rows="25" cols="100" placeholder="內容2"></textarea>
                    </div>
                <div class="form-group row">
                    <label for="index_item_item_comment" class="col-sm-3 col-form-label">備註(Comment) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_item_item_comment" name="index_item_item_comment" placeholder="備註" value="">
                </div>
                <div class="form-group row" style="width:1000px;">                    
                    <button type="button" id="index_item_item_update" name="index_item_item_update" class="btn btn-dark btn-lg btn-block">更新</button>
                </div>
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

