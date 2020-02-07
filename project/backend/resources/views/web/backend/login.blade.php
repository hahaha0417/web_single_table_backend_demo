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

        <script src='https://www.google.com/recaptcha/api.js'></script>
    
        <link rel="stylesheet" href="{{asset("assets/web/backend/login.css")}}">
        <script src="{{asset("assets/web/backend/login.js")}}"></script>
        
    </head>
    <body>
        <div class="login_box">
            <div class="login_content">
                <h1>hahaha</h1>
                <h2>歡迎使用hahaha後台管理系統</h2>
                {{--  <h5 style="color:red;">新增中，暫停進入!!</h5>  --}}
                {{--  <h5 style="color:red;">按照PPT 鄉民指導，網站進行修改!!</h5>
                <h5 style="color:red;">密碼更改，改完才開放登入!!</h5>  --}}
                <div id="login_form" class="login_form">
                    <form action="{{url("#")}}" method="post">
                        <!-- csrf保護通過方法 -->
                        {{csrf_field()}}    
                        @if(session('msg'))
                            <p style="color:red">{{session('msg')}}</p>
                        @endif                    
                        <div class="col-auto">
                            <label class="sr-only" for="user_name">帳號 : </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div style="font-size:1em; color:Tomato; width: 30px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                </div>
                                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="帳號">
                            </div>
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="password">密碼 : </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div style="font-size:1em; color:Tomato; width: 30px;">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                </div>
                                <input type="password" class="form-control" name="user_pass" id="user_password" placeholder="密碼">
                            </div>
                        </div>
                        <div class="col-auto text-left">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="remember_password">
                                <label class="form-check-label"  name="remember_pass" for="remember_password">
                                    記得密碼
                                </label>
                            </div>
                        </div>
                        <div class="g-recaptcha"  data-sitekey="6LfYLVUUAAAAAIQqzvZ3wJTYNw0mEihhkh2n3Jeq"></div>                          
                        <div class="col-auto">
                            <button type="submit" class="btn btn-dark btn-block mb-2">送出</button>
                        </div>
                          
                                        
                    </form>
                    <p><a href="{{url("/")}}">首頁</a> &copy; 2018 ~ 2022 Powered by <a href="{{url("/")}}" target="_blank">hahaha</a></p>
                </div>
            </div>
        </div>



       
    </body>
</html>

