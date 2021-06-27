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
        
        {{--  jQuery Upload File  --}}
        {{--  http://hayageek.com/docs/jquery-upload-file.php#doc  --}}
        <link href="/assets/plugin/jquery-upload-file/css/uploadfile.css" rel="stylesheet">
        {{--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
        <script src="/assets/plugin/jquery-upload-file/js/jquery.uploadfile.min.js"></script>
        {{--  layer  --}}
        {{--  http://layer.layui.com/  --}}
        <script src="{{asset("assets/plugin/layer/layer/layer.js")}}"></script>
        {{--    --}}
        <link rel="stylesheet" href="{{asset("assets/web/backend/index/initial.css")}}">
        <script src="{{asset("assets/web/backend/index/initial.js")}}"></script>
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
        <div class="initial_title">
            {{--  title 東西從global title撈  --}}
            <h1 style="font-weight:bold;">Index</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">初始化頁面</h3>
            Pic Board X Nav
            <hr class="hr_title" />
            
        </div> 
        <p>
        {{--  間隔  --}}
        <div class="initial_space">
            <br><br>
        </div>

        {{csrf_field()}}

        <div class="initial_content">
            <div class="row">                
                <div class="form-group col-sm">     
                    <label for="index_page_select">頁面</label>              
                    <select class="form-control" id="index_page_select">                        
                        @if("index" == $page)
                            <option name="index" order_="0" SELECTED>首頁</option>
                        @else   
                            <option name="index" order_="0">首頁</option>
                        @endif     
                        @if(isset($page_list))             
                            @foreach($page_list as $key => $value)
                                @if($value['title_name'] == $page)
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}" SELECTED>{{$value['title']}}</option>
                                @else    
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}">{{$value['title']}}</option>  
                                @endif                                                     
                            @endforeach
                        @endif 
                    </select>
                </div>
            </div>           

            <br><br>
            
            <hr class="hr1" />
    
            <br><br>
            
        </div> 
        
        <div class="initial_content">
            <div class="row">                
                <div class="form-group col-sm">     
                    <label for="index_pic_board_select">Pic Board</label>              
                    <select  class="form-control" size="8" id="index_pic_board_select" name="index_pic_board_select">
                        @if(isset($pic_board))             
                            @foreach($pic_board as $key => $value)
                                @if($value['title_name'] == $page)
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}" SELECTED>{{$value['order_']}} - {{$value['title']}} - url : {{ $value['url'] }}</option>
                                @else    
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}">{{$value['order_']}} - {{$value['title']}} - url : {{ $value['url'] }}</option>  
                                @endif                                                    
                            @endforeach
                        @endif 
                    </select>
                </div>
                <div class="form-group col-sm">
                    <div style="width: 80px; height: 120px; margin: 35px 0;">
                        <button type="button" id="index_pic_board_add" name="index_pic_board_add" style="width:80px;height:60px" class="btn btn-dark btn-lg">新增</button>
                        <button type="button" id="index_pic_board_delete" name="index_pic_board_delete" style="width:80px;height:60px" class="btn btn-dark btn-lg">刪除</button>
                    </div>
                </div>
            </div>
            <p>
            {{--  <form action="{{url("#")}}" method="post" enctype="multipart/form-data">  --}}
                <div class="form-group row">
                    <label for="index_pic_board_order" class="col-sm-3 col-form-label">排序(Order) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_order" name="index_pic_board_order" placeholder="0~1000" value="0">
                </div>
                <div class="form-group row">
                    <label for="index_pic_board_id" class="col-sm-3 col-form-label">識別項(ID) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_id" name="index_pic_board_id" placeholder="{{$page}}_pic_board_" value="{{$page}}_pic_board_">
                </div>
                <div class="form-group row">
                    <label for="index_pic_board_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_title" name="index_pic_board_title" placeholder="標題">
                </div>
                <div class="form-group row">       
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_pic_board_title_name" class="col-sm-3 col-form-label">名稱(Name) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_title_name" name="index_pic_board_title_name" placeholder="標題名稱">
                    <div class="w-100"></div>  

                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                      
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>          
                    <label for="index_pic_board_title_image" class="col-sm-3 col-form-label">圖片(Image) :      </label> 
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_title_image" name="index_pic_board_title_image" placeholder="標題圖片路徑">
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>      
                    <div id="index_pic_board_title_image_upload" class="col-sm-6" name="index_pic_board_title_image_upload" type="file"></div>    
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>    
                    <img src="" id="index_pic_board_title_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>                  
                </div>
                <div>                    
                </div>
                <div class="form-group row">
                    <label for="index_pic_board_image" class="col-sm-3 col-form-label">圖片(圖片) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_image" name="index_pic_board_image" placeholder="圖片路徑">
                    <div id="index_pic_board_image_upload" class="col-sm-6" name="index_pic_board_image_upload" type="file"></div> 
                    <div class="w-100"></div>   
                    <img src="" id="index_pic_board_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>       
                </div>                
                <div class="form-group row">
                    <label for="index_pic_board_url" class="col-sm-3 col-form-label">連結(Url) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_pic_board_url" name="index_pic_board_url" placeholder="連結">
                </div>
                <div class="form-group row" style="width:1000px;">                    
                    <button type="button" id="index_pic_board_update" name="index_pic_board_update" class="btn btn-dark btn-lg btn-block">更新</button>
                </div>
            {{--  </form>  --}}

            <br><br>
            
            <hr class="hr1" />
    
            <br><br>
            
        </div> 
        
        
        
        <div class="initial_content">
            <div class="row">                
                <div class="form-group col-sm">     
                    <label for="index_nav_select">Nav</label>              
                    <select  class="form-control" size="8" id="index_nav_select" name="index_nav_select">
                        @if(isset($nav))             
                            @foreach($nav as $key => $value)
                                @if($value['title_name'] == $page)
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}" SELECTED>{{$value['order_']}} - {{$value['title']}} - url : {{ $value['url'] }}</option>
                                @else    
                                    <option name="{{$value['title_name']}}" order="{{$value['order_']}}">{{$value['order_']}} - {{$value['title']}} - url : {{ $value['url'] }}</option>  
                                @endif                                                     
                            @endforeach
                        @endif 
                    </select>
                </div>
                <div class="form-group col-sm">
                    <div style="width: 80px; height: 120px; margin: 35px 0;">
                        <button type="button" id="index_nav_add" name="index_nav_add" style="width:80px;height:60px" class="btn btn-dark btn-lg">新增</button>
                        <button type="button" id="index_nav_delete" name="index_nav_delete" style="width:80px;height:60px" class="btn btn-dark btn-lg">刪除</button>
                    </div>
                </div>
            </div>
            <p>
            {{--  <form action="{{url("#")}}" method="post">  --}}
                <div class="form-group row">
                    <label for="index_nav_order" class="col-sm-3 col-form-label">排序(Order) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_order" name="index_nav_order" placeholder="排序" value="0">
                </div>
                <div class="form-group row">
                    <label for="index_nav_id" class="col-sm-3 col-form-label">識別項(ID) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_id" name="index_nav_id" placeholder="{{$page}}_nav_" value="{{$page}}_nav_">
                </div>
                <div class="form-group row">
                    <label for="index_nav_title" class="col-sm-3 col-form-label">標題(Title) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_title" name="index_nav_title" placeholder="標題">
                </div>
                <div class="form-group row">  
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                    <label for="index_nav_title_name" class="col-sm-3 col-form-label">名稱(Name) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_title_name" name="index_nav_title_name" placeholder="標題名稱">*

                    <div class="w-100"></div>  

                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>   
                        
                    <div class="w-100"></div>   
                            
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>             
                    <label for="index_nav_title_image" class="col-sm-3 col-form-label">圖片(Image) :      </label> 
                    <input type="text" class="form-control col-sm-4" id="index_nav_title_image" name="index_nav_title_image" placeholder="標題圖片路徑">
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>      
                    <div id="index_nav_title_image_upload" class="col-sm-6" name="index_nav_title_image_upload" type="file"></div>    
                    <div class="w-100"></div>   
                    
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>   
                    <div style="border-left:5px solid rgba(100,200,100,1);">&nbsp;  </div>    
                    <img src="" id="index_nav_title_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>                          
                </div>
                <div>                    
                </div>
                <div class="form-group row">
                    <label for="index_nav_image" class="col-sm-3 col-form-label">圖片(圖片) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_image" name="index_nav_image" placeholder="圖片路徑">
                    <div id="index_nav_image_upload" class="col-sm-6" name="index_nav_image_upload" type="file"></div>    
                    <div class="w-100"></div>   
                    <img src="" id="index_nav_image_thumbnail" class="col-sm-6" style="max-width: 350px;max-height: 100px;"/>        
                </div>                
                <div class="form-group row">
                    <label for="index_nav_url" class="col-sm-3 col-form-label">連結(Url) :      </label>
                    <input type="text" class="form-control col-sm-4" id="index_nav_url" name="index_nav_url" placeholder="連結">
                </div>
                <div class="form-group row" style="width:1000px;">                    
                    <button type="button" id="index_nav_update" name="index_nav_update" class="btn btn-dark btn-lg btn-block">更新</button>
                </div>
            {{--  </form>  --}}
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

