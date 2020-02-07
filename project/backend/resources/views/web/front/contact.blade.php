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
        {{--  目前是懶人用法，有需要再直接加入上面  --}}
        @include('web.common.main_meta')
        @include('web.common.sub_meta')

        @include('web.common.main_script')
        @include('web.common.sub_script')
                
        @include('web.common.main_css')
        @include('web.common.sub_css')
        
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP-BXnPbFuXP-ZYRhBt0IUDD5Y9QSO3GQ">
        </script>
        
        <link rel="stylesheet" href="{{asset("assets/web/front/contact.css")}}">
        <script src="{{asset("assets/web/front/contact.js")}}"></script>
        <link rel="stylesheet" href="{{asset("assets/web/front/index.css")}}">
        <script src="{{asset("assets/web/front/index.js")}}"></script>
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
                  
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  nav  --}}
        @include("fast_use.front.common.nav.main_nav")        
        <div id="top_bar">            
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        
        <div class="home_contact_title">
            <h1 style="font-weight:bold;">Contact Us</h1>
            <hr class="hr_title" />
            <h3 style="font-weight:bold;">如對hahaha感興趣，想要給hahaha一份職缺，請聯絡hahaha</h3>
            <p>
            管道 : 104，Hotmail<p>
            聯絡人 : 陳傑琪 先生<p>
            phone : 0916 - 353255<p>
            email : hahaha0417@hotmail.com<p>
            address : 現在在家裡，沒錢!!<p>
                    <h5 style="font-weight:bold;">在家啃老中，請趕快給hahaha一份Web or AOI(C++ Builder)職缺!!...</h5><p>
            <hr class="hr_title" />
        </div> 
        

         {{-- 間隔  --}}
        <div class="home_contact_space">
            <br><br>
        </div> 
        
        <div class="home_contact_content">
            
            @foreach($block as $key => $value)
                {{--  describe_太短，因此分兩個寫  --}}
                @if($value['order_'] != -1)
                    {!! $value['describe_'] !!}
                    {!! $value['content'] !!}   
                @endif          
            @endforeach
            {{-- 以上用樣版編輯 --}}
            

            <!--<hr class="hr1" />
            <h3 style="font-weight:bold;">
                <div style="font-size:1em; color:purple">
                    <i class="fas fa-beer"></i>
                    留言
                    <a class="btn btn-dark" style="float:right;margin:auto 20px;" href="#">
                        留言頁                        
                    <a>
                </div>                            
            </h3>
            <hr class="hr1" />
            <div style="margin-left:20px">
                <p>
                {{-- CKEditor --}}
                {{-- https://www.wfublog.com/2017/11/web-wysiwyg-text-editor-ckeditor.html --}}
                {{-- http://pclevin.blogspot.tw/search/label/CKEditor --}}

                <div class="message">
                    <form action="{{url("/add_message")}}" method="post">
                        <div class="form-group row">
                            <label for="message_name" class="col-sm-3 col-form-label">名稱(Name) :      </label>
                            <input type="text" class="form-control col-sm-4" id="message_name" placeholder="名稱 / 稱呼 / Name">
                        </div>
                        <div class="form-group row">
                            <label for="message_email" class="col-sm-3 col-form-label">信箱(E-mail) : </label>
                            <input type="email" class="form-control col-sm-4" id="message_email" placeholder="name@example.com">
                        </div>
                        <div class="form-group row">
                            <label for="message_phone" class="col-sm-3 col-form-label">手機(Phone) : </label>
                            <input type="text" class="form-control col-sm-4" id="message_phone" placeholder="09xx - xxxxxx">
                        </div>
                        <div class="form-group row">
                            <label for="message_type" class="col-sm-3 col-form-label">類型(Phone) : </label>
                            <select class="form-control col-sm-4" id="message_type">
                                <option>詢問</option>
                                <option>個人建議</option>
                                <option>網站相關</option>
                                <option>問題回報</option>
                                <option>接案</option>
                                <option>職缺</option>
                                <option>其他</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="message_content">內容(Content) : </label>
                                <textarea class="form-control" id="message_content" rows="5" style="resize:none;" placeholder="您想說的話..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">留言</button>
                        </div>
                        


                        





                        {{-- <table class="message_table">
                            <tbody>
                                {{csrf_field()}}
                                <tr>
                                    <th><i class="require">*</i>全名 / 稱呼(Name) : </th>
                                    <td>
                                        <input type="text" class="sm" name="message_name">
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="require">*</i>信箱(E-mail) : </th>
                                    <td>
                                        <input type="text" class="lg" name="message_email">
                                    </td>
                                </tr>



                                <tr>
                                    <th width="120"><i class="require">*</i>文章分类：</th>
                                    <td>
                                        <select name="cate_id">
                                           
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="require">*</i>文章标题：</th>
                                    <td>
                                        <input type="text" class="lg" name="art_title">
                                    </td>
                                </tr>
                                <tr>
                                    <th>编辑：</th>
                                    <td>
                                        <input type="text" class="sm" name="art_editor">
                
                                    </td>
                                </tr>
                                <tr>
                                    <th>关键字：</th>
                                    <td>
                                        <input type="text" class="lg" name="art_tag">
                                    </td>
                                </tr>
                                <tr>
                                    <th>缩略图：</th>
                                    <td>
                                        <input type="text" class="lg" name="art_thumb">
                                        <link rel="stylesheet" type="text/css" href="{{asset('org/uploadify/uploadify.css')}}">
                                        <div id="fileuploader">Upload</div>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <img src="" alr="" id="art_thumb_img" style="max-width: 350px;max-height: 100px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>描述：</th>
                                    <td>
                                        <textarea name="art_description"></textarea>
                                    </td>
                                </tr>
                
                                <tr>
                                    <th>文章内容：</th>
                                    <td>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交">
                                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                                    </td>
                                </tr> 
                            </tbody>
                        </table>--}}
                    </form>
                </div>


                {{-- <script src="https://cdn.ckeditor.com/4.7.3/standard-all/ckeditor.js"></script>
                <textarea name="editor1"></textarea>
                <script>
                    CKEDITOR.plugins.addExternal("codesnippet", "https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.7.3/plugins/codesnippet/plugin.js", "");
                    CKEDITOR.replace("editor1", {
                    extraPlugins: "codesnippet",
                    codeSnippet_theme: "solarized_dark"
                    }); --}}
                </script>
            </div>>
            <hr class="hr1" />-->
        </div> 

        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  tail  --}}
        @include("fast_use.front.common.tail.main_tail")
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        {{--  整合功能  --}}
        {{--  頁面  --}}
        @include("fast_use.front.index.index_control") 
        {{--  容器  --}}
        @include("fast_use.front.integrate.control.main_control")  
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        

    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

