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
    
        <link rel="stylesheet" href="{{asset("assets/web/backend/home/class/all.css")}}">
        <script src="{{asset("assets/web/backend/home/class/all.js")}}"></script>
        
        
    </head>
    <body>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h1>編輯頁面概觀 - 時間不夠所以沒做介紹頁</h1>
            <hr />
        </div>
        <br />

        <div style="background:rgba(255,190,190,1);">
            <hr />
            <h1>Node</h1>
            <hr />
        </div>
        <br />

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

        {{--  Index  --}}
        <div>            
            <div style="background:rgba(190,255,190,1);">
                <hr />
                <h1>Index</h1>
                <hr />
            </div>
            <div style="background:rgba(190,255,190,1);">
                <hr />
                <h5 style="margin-left:20px;">Index(同Root Index)</h5>
                <hr />

                <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                    <hr />
                    編輯頁面 : 
                    <a href="{{url("/backend/index/index")}}" target="_self" >
                        <div class="btn btn-dark">  
                            編輯        
                        </div>
                    </a>
                    <hr />
                    範例頁面 : 
                    <a href="{{url("/")}}" target="_blank" >
                        <div class="btn btn-dark">  
                            使用         
                        </div>
                    </a>
                    <hr />
                    <div>
                        <div>描述 :</div><br>
                        <div style="margin-left:20px;">
                            1. 導航條下面的pic_board(Banner)<br>
                            <div style="margin-left:20px;">
                                -- 最新的圖示<br>    
                                -- 重要的圖示<br>                     
                            </div>
                        </div><br>
                        <div style="margin-left:20px;">2. 頁面切換項目，ex : nav(Item)</div><br>
                    </div> 
                    <hr />
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>Banner圖與Item圖</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="600px" src="{{url("image/backend/index/Banner與Item.png")}}" />
                        </div>
                    </div>
                    <hr />
                </div>
                <hr />
            </div>
            <div style="background:rgba(190,255,190,1);">
                <hr />
                <h5 style="margin-left:20px;">Overview</h5>
                <hr />
                <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                    <hr />
                    編輯頁面 : 
                    <a href="{{url("/backend/index/index?i_page=Overview")}}" target="_blank" >
                        <div class="btn btn-dark">   
                            編輯        
                        </div>
                    </a>
                    <hr />
                    範例頁面 : 
                    <a href="{{url("/overview")}}" target="_blank" >
                        <div class="btn btn-dark">  
                            使用         
                        </div>
                    </a>
                    <hr />
                    <div>
                        <div>描述 :</div><br>
                        <div style="margin-left:20px;">
                            1. Item(item_white & item_black) - 項目方塊
                            <div style="margin-left:20px;">
                                -- 產品重點分類描述<br>    
                                -- 重要的內容<br>                     
                            </div><br>   
                        </div><br>
                        <div style="margin-left:20px;">
                            2. 輪播器(Carousel)(item_pic)
                            <div style="margin-left:20px;">
                                -- 愛台灣拉<br>   
                                -- 目前放妹子圖<br>                                                      
                            </div><br>        
                        </div><br>
                    </div> 
                    <hr />
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>項目圖(Item)</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="400px" src="{{url("image/backend/home/overview/項目.png")}}" />
                        </div>
                    </div>
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>輪播圖(Carousel)</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="300px" src="{{url("image/backend/home/overview/輪播圖(Carousel).png")}}" />
                        </div>
                    </div>
                    <hr />
                </div>
                <hr />
            </div>
            <div style="background:rgba(190,255,190,1);">
                <hr />
                <h5 style="margin-left:20px;">Feature</h5>
                <hr />
                <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                    <hr />
                    編輯頁面 : 
                    <a href="{{url("/backend/index/index?i_page=Feature")}}" target="_blank" >
                        <div class="btn btn-dark">   
                            編輯        
                        </div>
                    </a>
                    <hr />
                    範例頁面 : 
                    <a href="{{url("/feature")}}" target="_blank" >
                        <div class="btn btn-dark">  
                            使用         
                        </div>
                    </a>
                    <hr />
                    <div>
                        <div>描述 :</div><br>
                        <div style="margin-left:20px;">
                            1. Item(item_vertical_accordion) - 垂直手風琴(Vertical_Accordion)<br>
                            <div style="margin-left:20px;">
                                -- 產品重點分類描述<br>    
                                -- 重要的內容<br>                     
                            </div><br>                        
                        </div><br>
                        <div style="margin-left:20px;">
                            2. Item(item_accordion) - 手風琴(Accordion)
                            <div style="margin-left:20px;">
                                -- 網站重點描述<br>    
                                -- 重要的內容<br>                     
                            </div><br>    
                        </div><br>
                    </div> 
                    <hr />
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>垂直手風琴圖(Vertical_Accordion)</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="400px" src="{{url("image/backend/home/feature/垂直手風琴(Vertical_Accordion).png")}}" />
                        </div>
                    </div>
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>手風琴圖(Accordion)</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="300px" src="{{url("image/backend/home/feature/手風琴(Accordion).png")}}" />
                        </div>
                    </div>
                    <hr />
                </div>
                <hr />
            </div>
        </div>
        <br />

        {{--  Root  --}}
        <div>            
            <div id="root_index" style="background:rgba(190,255,190,1);">
                <hr />
                <h1>Root</h1>
                <hr />
            </div>
            <div style="background:rgba(190,255,190,1);">
                <hr />
                <h5 style="margin-left:20px;">Contact</h5>
                <hr />
                <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                    <hr />
                    編輯頁面 : 
                    <a href="{{url("/backend/index/index?i_page=Contact")}}" target="_blank" >
                        <div class="btn btn-dark">  
                            編輯        
                        </div>
                    </a>
                    <hr />
                    範例頁面 : 
                    <a href="{{url("/contact")}}" target="_blank" >
                        <div class="btn btn-dark">  
                            使用         
                        </div>
                    </a>
                    <hr />
                    <div>
                        <div>描述 :</div><br>
                        <div style="margin-left:20px;">1. 聯絡項目(block)</div><br>
                    </div> 
                    <hr />
                    <div style="margin-left:20px;">
                        <div style="position:relative;">
                            <div>項目圖</div>
                        </div>
                        <div style="position:relative;">
                            <img width="800px" height="300px" src="{{url("image/backend/contact/項目.png")}}" />
                        </div>
                    </div>
                    <hr />
                </div>
                <hr />
            </div>
        </div>
        <br />

        <div id="root_index" style="background:rgba(190,255,190,1);">
            <hr />
            <h1>Product</h1>
            <hr />
            <div style="margin-left:20px;font-size:24px;">
                四層管理模組 : Product / Class / Model ( / Item) / Content<br>
                <Item是細項>
            </div>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Product</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 請至 Map/Node/Product/List 列表，進入項目子頁面Class設定                
                <hr />
                範例頁面 : 
                <a href="{{url("/product")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. slider<br>
                        <div style="margin-left:20px;">
                            -- 至頂廣播頁<br>    
                            -- 放想秀的產品<br>                     
                        </div>
                    </div><br>
                    <div style="margin-left:20px;">2. 分類項目
                        <div style="margin-left:20px;">
                            -- 可以是產品線，也可以是項目或子分類<br>    
                        </div>    
                    </div><br>
                </div> 
                <hr />
                <div class="row" style="margin-left:20px;">
                    <div class="col">
                        <div style="position:relative;">
                            <div>slider</div>
                        </div>
                        <div style="position:relative;">
                            <img width="600px" height="300px" src="{{url("image/backend/product/product/slider.png")}}" />
                        </div>
                    </div>
                    <div class="col">
                        <div style="position:relative;">
                            <div>class_item</div>
                        </div>
                        <div style="position:relative;">
                            <img width="600px" height="300px" src="{{url("image/backend/product/product/class_item.png")}}" />
                        </div>
                    </div>
                </div>
                <hr />
            </div>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Class</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 請至 Map/Node/Product/List 列表，進入項目子頁面Model設定 
                <hr />
                範例頁面 : 
                <a href="{{url("/product/aoi")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. slider<br>
                        <div style="margin-left:20px;">
                            -- 產品重點分類描述<br>    
                            -- 重要的內容<br>                     
                        </div><br>                        
                    </div><br>
                    <div style="margin-left:20px;">
                        2. 項目 X slider X 評論<br>
                        <div style="margin-left:20px;">
                            -- 項目可以是分類或產品線<br>    
                            -- 根據項目的內容<br>
                            -- 評論<br>                   
                        </div><br>                        
                    </div><br>
                    <div style="margin-left:20px;">
                        3. 客戶<br>
                        <div style="margin-left:20px;">
                            -- 客戶列表<br>                       
                        </div><br>                        
                    </div><br>
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>slider圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/class/slider.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>項目 X slider X 評論圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/class/項目 X slider X 評論.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>客戶圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/class/客戶.png")}}" />
                    </div>
                </div>
                <hr />
            </div>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Model - Stage</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 請至 Map/Node/Product/List 列表，進入項目子頁面設定 
                <hr />
                範例頁面 : 
                <a href="{{url("/product/aoi/oring")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        Model   
                    </div>
                </a>
                <a href="{{url("/product/aoi/oring/overview")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        Model Item(Single) - ex : Overview      
                    </div>
                </a>
                <a href="{{url("/product/aoi/oring/feature")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        Model Item(Multi) - ex : Feature      
                    </div>
                </a>
                <a href="{{url("/product/aoi/oring/feature/content")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        Model Item(Multi) - ex : Feature Content     
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. Home頁_影片介紹<br>
                        <div style="margin-left:20px;">
                            -- 全項目重要影片<br>                     
                        </div>                       
                    </div><br>
                    <div style="margin-left:20px;">
                        2. 項目<br>
                        <div style="margin-left:20px;">
                            -- 項目List<br>                       
                        </div>                      
                    </div><br>
                    <div style="margin-left:20px;">
                        3. 橫幅樣式內容<br>
                        <div style="margin-left:20px;">
                            -- Text X Image<br>    
                            -- Text X Image X 2+<br>                
                        </div>                       
                    </div><br>
                    <div style="margin-left:20px;">
                        4. IFrame插入內容<br>
                        <div style="margin-left:20px;">
                            -- Custom內容，由多個Iframe利用超連結導入<br>                       
                        </div>                     
                    </div><br>
                    <div style="margin-left:20px;">
                        5. Item頁 Collapse Module<br>
                        <div style="margin-left:20px;">
                            -- 子項目清單<br>                       
                        </div>                       
                    </div><br>
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Home頁_影片介紹</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/model/Home頁_影片介紹.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>項目</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/model/項目.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>橫幅樣式內容</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/model/橫幅樣式內容.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>IFrame插入內容</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="300px" src="{{url("image/backend/product/model/IFrame插入內容.png")}}" />
                    </div>
                </div>
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Item頁 Collapse Module(整合至模組內 -- <a href="#collapse" target="_self" >鏈結</a>)</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="400px" src="{{url("image/backend/module/common/collapse.png")}}" />
                    </div>
                </div>
                <hr />
            </div>
            <hr />
        </div>
    </div>
    <br>
    <div id="root_index" style="background:rgba(190,255,190,1);">
        <hr />
        <h1>Device</h1>
        <hr />
        <div style="margin-left:20px;font-size:24px;">
            類似Product，請參考Product建法...<br>
        </div>
        <hr />
    </div>
    <br>
    {{--  <div>
        <div style="background:rgba(255,190,190,1);">
            <hr />
            <h1>Global</h1>
            <hr />
        </div>
        <br />
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h1>Module</h1>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Nav</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 
                <a href="{{url("/backend/module/common/nav")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        編輯        
                    </div>
                </a>
                <hr />
                範例頁面 : 
                <a href="{{url("/")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. 導航(Nav)<br>
                        <div style="margin-left:20px;">
                            -- 原則上保持乾淨<br>                     
                        </div>                      
                    </div><br>
                    <div style="margin-left:20px;">
                        2. 導航子頁<br>
                        <div style="margin-left:20px;">
                            -- 大項目(O) | 快捷項目(O) | 控制設定(X)<br>                     
                        </div>                      
                    </div><br>
                    <div style="margin-left:20px;">
                        3. 導航子頁內容<br>
                        <div style="margin-left:20px;">
                            -- 根據導航子頁大項目分類<br>                       
                        </div>                        
                    </div><br>
                    <div style="margin-left:20px;">
                        4. 導航子頁內容的項目<br>
                        <div style="margin-left:20px;">
                            -- 請根據項目名稱進行相關鏈結<br>                       
                        </div>                       
                    </div><br>
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Nav圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="400px" src="{{url("image/backend/module/common/nav.png")}}" />
                    </div>
                </div>                    
                <hr />
            </div>
            <hr />
        </div>
        <div id="collapse" style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Collapse</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 
                <a href="{{url("/backend/module/common/collapse")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        編輯        
                    </div>
                </a>
                <hr />
                範例頁面 : 
                <a href="{{url("/product/class/model/multi")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. 子項目清單，目前只用於<a href="{{url("/product/class/model/multi")}}" target="_blank" >Product - Model Multi</a><br>
                        <div style="margin-left:20px;">
                            -- 只有兩層<br>                     
                        </div>                      
                    </div><br>                        
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Collapse圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="400px" src="{{url("image/backend/module/common/collapse.png")}}" />
                    </div>
                </div>                    
                <hr />
            </div>
            <hr />
        </div>

        <br />
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h1>Global</h1>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Tail</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 
                <a href="{{url("/backend/global/tail")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        編輯        
                    </div>
                </a>
                <hr />
                範例頁面 : 
                <a href="{{url("/")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. 尾部(Tail)<br>
                        <div style="margin-left:20px;">
                            -- 原則上保持乾淨<br>                     
                        </div>                      
                    </div><br>                        
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Tail圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="400px" src="{{url("image/backend/global/tail.png")}}" />
                    </div>
                </div>                    
                <hr />
            </div>
            <hr />
        </div>
        <div style="background:rgba(190,255,190,1);">
            <hr />
            <h5 style="margin-left:20px;">Title</h5>
            <hr />
            <div style="margin-left:20px;background:rgba(220,255,220,1);" >
                <hr />
                編輯頁面 : 
                <a href="{{url("/backend/global/title")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        編輯        
                    </div>
                </a>
                <hr />
                範例頁面 : 
                <a href="{{url("/")}}" target="_blank" >
                    <div class="btn btn-dark">  
                        使用         
                    </div>
                </a>
                <hr />
                <div>
                    <div>描述 :</div><br>
                    <div style="margin-left:20px;">
                        1. 尾部(Tail)<br>
                        <div style="margin-left:20px;">
                            -- 原則上保持乾淨<br>                     
                        </div>                      
                    </div><br>                        
                </div> 
                <hr />
                <div style="margin-left:20px;">
                    <div style="position:relative;">
                        <div>Title圖</div>
                    </div>
                    <div style="position:relative;">
                        <img width="800px" height="400px" src="{{url("image/backend/global/title.png")}}" />
                    </div>
                </div>                    
                <hr />
            </div>
            <hr />
        </div>
    </div>
    <br />  --}}
        
        
        

    </body>
</html>

