{{-- 原始 : hahaha --}}
{{-- 維護 : hohoho--}}
{{-- 指揮 : commander --}}
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

        <link rel="stylesheet" href="{{asset("assets/web/front/ha/ha_media_100/media/media.css")}}">
        <script src="{{asset("assets/web/front/ha/ha_media_100/media/media.js")}}"></script>
        
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
        {{--  不能播放本地端的媒體  --}}
        <video width="320" height="240" controls type='video/x-matroska; codecs="theora, vorbis"'>
            <source src="http:///D:/Incoming/天使もえ SNIS-999 超高級ヌキ有りメンズエステティシャンの焦らし誘惑回春マッサージ.mp4" type="video/mp4">
            您的瀏覽器不支援該媒體類型
        </video>
        <input id="the-file-input" type="file">
        {{--  <video src="D:\Incoming\天使もえ SNIS-999 超高級ヌキ有りメンズエステティシャンの焦らし誘惑回春マッサージ.mp4" type='video/x-matroska; codecs="theora, vorbis"' autoplay controls onerror="failed(event)" ></video>  --}}
        {{--  <embed id="divxplayer" type="video/divx" width="1024" height="768" 
            src ="D:\Incoming\[ABP252]冬月かえで - 冬月かえでの极上笔おろし.mkv" autoPlay="true" 
            pluginspage="http://go.divx.com/plugin/download/">
        </embed>  --}}
        {{--  <video width="320" height="240" controls="controls" type='video/x-matroska; codecs="theora, vorbis"'>  --}}
            {{--  <source src="http:\\\D:\Incoming\[ABP252]冬月かえで - 冬月かえでの极上笔おろし.mkv" type="video/mp4">  --}}
            {{--  您的瀏覽器不支援該媒體類型  --}}
        {{--  </video>  --}}
    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();   
            var URL = window.URL || window.webkitURL   
            
            $("#the-file-input").change(function() {
                // will log a FileList object, view gifs below
                console.log(this.files);
                var fileURL = URL.createObjectURL(this.files[0]);
            var videoNode = document.querySelector('video')
            alert(fileURL);
            videoNode.src = "blob:http://114.32.144.211:8081/a4efa0b4-b6fa-4090-b8f8-05cdb006e918";  
            });              
        });
        
    </script>
</html>

