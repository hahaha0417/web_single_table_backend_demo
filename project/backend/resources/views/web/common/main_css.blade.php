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

@if(Config::get('app.online_script'))
    {{-- jquery ui --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/theme.min.css" integrity="sha512-KumAPtSD8eFiBBj3x1uwswKngUDJdCc0jtBAbaz/y2dIdKhfSk5k6em4UGn/7n/RDqKzA8C1zMLURzd1dvMlkQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" integrity="sha512-+0Vhbu8sRUlg+R/NKgTv7ahM+szPDF10G6J5PcHb1tOrAaquZIUiKUV3TH16mi6fuH4NjvHqlok6ppBhR6Nxuw==" crossorigin="anonymous" />

    {{-- bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{\p_ha::url("assets/web/common/base.css")}}">
@else
    {{-- jquery ui --}}
    @if(Config::get('app.debug'))
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-themes/themes/smoothness/theme.css")}}" />
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-themes/themes/smoothness/jquery-ui.css")}}" />
    @else
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-themes/themes/smoothness/theme.css")}}" />
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/jquery_plugin/jquery-ui-themes/themes/smoothness/jquery-ui.min.css")}}" />
    @endif
    
    {{-- bootstrap 4 --}}
    @if(Config::get('app.debug'))
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/bootstrap/dist/css/bootstrap.css")}}" />
    @else
        <link rel="stylesheet" href="{{\p_ha::Assets("plugin/plugin/bootstrap/dist/css/bootstrap.min.css")}}" />
    @endif
   
    {{-- fontawesome --}}
    {{-- edge 似乎有Bug Woff2無法跨域 --}}
    <?php
    /*
    .htaccess
    設定這兩個沒也用
    Header always set Referrer-Policy "no-referrer"
    Header set Access-Control-Allow-Origin "*"
    */

    // 我使用public的fontawesome-free
    ?>

    @if(Config::get('app.debug'))
        <link rel="stylesheet" href="{{\p_ha::V_Assets("/plugin/plugin/fontawesome-free/css/all.css", "Front")}}"  />
    @else
        <link rel="stylesheet" href="{{\p_ha::V_Assets("/plugin/plugin/fontawesome-free/css/all.min.css", "Front")}}" />
    @endif

    <link rel="stylesheet" href="{{\p_ha::url("assets/web/common/base.css")}}">
@endif
 




