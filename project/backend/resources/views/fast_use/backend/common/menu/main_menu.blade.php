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


{{--  請手動整理至上方  --}}
{{-- http://rocha.la/jQuery-slimScroll --}}
@if(Config::get('app.online_script'))
    {{-- jquery-slimscroll --}}
    @if(Config::get('app.debug'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js" integrity="sha512-37SbZHAnGzLuZV850k61DfQdZ5cnahfloYHizjpEwDgZGw49+D6oswdI8EX3ogzKelDLjckhvlK0QZsY/7oxYg==" crossorigin="anonymous"></script>
    @else
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js" integrity="sha512-cJMgI2OtiquRH4L9u+WQW+mz828vmdp9ljOcm/vKTQ7+ydQUktrPVewlykMgozPP+NUBbHdeifE6iJ6UVjNw5Q==" crossorigin="anonymous"></script>
    @endif
@else
    {{-- jquery-slimscroll --}}
    @if(Config::get('app.debug'))
        <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-slimscroll/jquery.slimscroll.js")}}"></script>
    @else
        <script src="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
    @endif
@endif

{{--  --}}

<script src="{{\p_ha::Assets("module/backend/common/menu/main_menu/main_menu.js")}}"></script>
<link rel="stylesheet" href="{{\p_ha::Assets("module/backend/common/menu/main_menu/main_menu.css")}}">
{{--  參數模板  --}}
{{--  format有使用格式  --}}
@include('module.backend.common.menu.main_menu.main_menu') 
{{--  原始模板  --}}
{{--  @include('module_template.backend.common.menu.main_menu.main_menu')   --}}



