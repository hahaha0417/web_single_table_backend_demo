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

        <link rel="stylesheet" href="{{\p_ha::Assets("web/backend/index.css")}}">
        <script src="{{\p_ha::Assets("web/backend/index.js")}}"></script>
        <script src="{{\p_ha::Assets("cross_origin/iframe_resize_height.js")}}"></script>
        
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
    <body style="background:rgba(190, 190, 190, 1);">            
        <div style="background:rgba(190,255,190,1);">
                <hr />
                <h1>註解</h1>
                <hr />
            </div>
            <br />
    
            {{-- <div style="background:rgba(255,190,190,1);">
                <hr />
                <h1>Node</h1>
                <hr />
            </div>
            <br /> --}}
    
            {{--  例 : Index  --}}
            {{--  Cover 封面頁  --}}
            {{--  Carousel 輪播圖頁  --}}
            {{--  Item 項目頁        --}}
            {{--  由於小項目，是否寫在一頁都可以         --}}
    
            {{--  基本上<a>的target原則上使用下面規則  --}}
            {{--  目錄階段 : 顯示在父頁面(_parent)及本頁面(_self)  --}}
            {{--  內部鏈結 : 顯示在本頁不同位置頁面(#XXX)  --}}
            {{--  -- https://cnzhx.net/blog/html-links/  --}}
            {{--  編輯階段 : 顯示在新頁面(_blank)  --}}
    
            {{--  Root  --}}
            {{-- <div>            
                <div id="root_index" style="background:rgba(190,255,190,1);">
                    <hr />
                    <div style="margin-left:20px;">
                        
                        1. 每頁的Title整併到Global統一管理<br>
                        <div style="position:relative;">
                            <img width="800px" height="400px" src="{{url("image/backend/global/title.png")}}" />
                        </div>
                        <br><br><br><br>&nbsp;
                    </div>
                    <hr />
                </div>
            </div> --}}
        </div>
    </body>
    <script>
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        
    </script>
</html>

