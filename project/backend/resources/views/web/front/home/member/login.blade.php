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

        <link rel="stylesheet" href="{{asset("assets/web/front/home/member/login.css")}}">
        <script src="{{asset("assets/web/front/home/member/login.js")}}"></script>
        
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

        <div class="login_header">
            <div class="login_header_box">
                <a href="/">
                    <img class="login_header_image" src="{{url("/image/iTW.jpg")}}" /> 
                    </img>
                </a>
            </div>

        </div>     
        <div class="login_title">
            <h1>登入 hahaha</h1>    
        </div>
        {{--  <div class="login_body">
            <div class="login_panel">
                <div class="form-group">
                    <label for="login_user_name" class="login_user_name_label col-sm col-form-label">使用者名稱 :      </label> 
                    <input type="text" class="form-control col-sm" id="login_user_name" name="login_user_name" placeholder="使用者名稱" value="">
                </div>
                <div class="form-group">
                    <label for="login_password" class="login_password_label col-sm col-form-label">密碼 :       <a class="label-link" href="/">忘記密碼</a></label> 
                    <input type="text" class="form-control col-sm" id="login_password" name="login_password" placeholder="密碼" value="">
                </div>
                <button type="button" class="login_button btn btn-dark btn-lg btn-block">登入</button>
            </div>
            
        </div>
        <div class="login_register">
            <div class="register_panel">
                <button type="button" class="register_button btn btn-dark btn-lg btn-block">註冊</button>
            </div>
        </div>  --}}
        <div class="login_third_party">
            <div class="third_party_panel">
                <div class="form-group">
                    <a href="/login/third_party/github"><button type="button" class="github_login col-sm-12 btn btn-dark btn-lg">Github</button></a>
                    <div>&nbsp;</div>
                    <a href="/login/third_party/google"><button type="button" class="google_login col-sm-12 btn btn-dark btn-lg">Google</button></a>
                    <div>&nbsp;</div>
                    <a href="/login/third_party/facebook"><button type="button" class="facebook_login col-sm-12 btn btn-dark btn-lg">Facebook</button></a>  
                    <div>&nbsp;</div>            
                </div>
            </div>
        </div>
     
</script>
    </body>
    
    <script>    

            
       
        
        $(function(){
            
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

