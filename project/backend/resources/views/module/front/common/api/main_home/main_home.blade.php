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

<div class="home_title">
    <h1 style="font-weight:bold;">Api</h1>
    <hr class="hr_title" />
    <h3 style="font-weight:bold;">Api規劃草稿</h3>
    裡面有Product & Device & ha_media_100...
    <hr class="hr_title" />
</div> 
<p>
{{--  間隔  --}}
<div class="home_space">
    <br><br>
</div>

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        <img src={{url("image/hahaha示意圖.png")}}></img>
        <br/> 
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">Api規劃(<span style="color:blue;">Ha arch.</span>)
                {{-- <a href="#" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        more...
                    </div>                    
                </a> --}}
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>節點設計</p>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>[<span style="color:pink;">/2.0</span>][<span style="color:green;">/identity1</span>][<span style="color:green;">/identity2</span>][<span style="color:green;">/identity3</span>][<span style="color:purple;">/node</span>][<span style="color:red;">/class1</span>][<span style="color:red;">/class2</span>][<span style="color:red;">/class3</span>][<span style="color:orange;">/model1</span>][<span style="color:orange;">/model2</span>]
            </div>
            <div>http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>[<span style="color:pink;">/2.0</span>][<span style="color:green;">/identity1</span>][<span style="color:green;">/identity2</span>][<span style="color:green;">/identity3</span>][<span style="color:purple;">/node</span>][<span style="color:red;">/dir1</span>]...[<span style="color:red;">/dir8</span>][<span style="color:purple;">/model</span>][<span style="color:orange;">/model1</span>][<span style="color:orange;">/model2</span>]
            </div>
            <span style="color:blue;">其中 : </span><br>
            -- <span style="color:green;">[ ]部分為可忽略</span><br>
            -- <span style="color:green;">node(跟隨identify) &amp model(跟隨dir)為定位(分割)節點</span><br>
            -- <span style="color:green;">identify為靜態識別項</span><br>
            -- <span style="color:green;">class為靜態節點路徑</span><br>
            -- <span style="color:green;">dir為動態節點路徑(所以要加/model定位節點)</span><br>
            -- <span style="color:green;">model1 &amp model2為功能節點</span><br>
            -- <span style="color:green;">class為<span style="color:blue;">支架(frame)</span>設計</span><br>
            -- <span style="color:green;">dir為<span style="color:blue;">樹(tree)</span>設計</span><br>
            <div style="width:2px;height:145px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            
            <div style="margin-left:20px">
                1. 依此規則可以建立出不打結路由(Router)<br>
                2. 以上為一個完整Api節點(<span style="color:blue;">節點(node)</span>)，節點下是一獨立物件(<span style="color:blue;">盆子(bowl)</span>)<br>
                -- 節點下為一Api樣式(<span style="color:blue;">花(flower)</span>)，設計api功能<br>
                3. identify只有三層，原因是一個網站不可能會有太多的分類，因此不需要隔出很多路徑，因此採用支架設計<br>
                4.<span style="color:red;"> 樹設計超過五層，必須將樹枝(分支)拆掉，重新整理架構，降低層數，6~8層只是暫時緩衝</span><br>
                5. <span style="color:blue;">Ha style.</span>則是ha哥喜歡的個人style(不限於任何設計)，叫做<span style="color:blue;">Ha style.</span><br>
                &nbsp;
            </div>            
            <span style="color:blue;">簡單來說 : </span><br>
            -- 一個資料夾 - <span style="color:blue;">盆子(bowl)</span><br>
            -- 一個小型路徑規劃 - <span style="color:blue;">支架(frame)</span><br>
            -- 一個檔案結構 - <span style="color:blue;">樹(tree)</span><br>
            -- 一個樣式設計 - <span style="color:blue;">花(flower)</span><br>
            -- ha哥規劃的風格 - <span style="color:blue;">Ha style.</span><br>
            -- 整套架構思想全部 - <span style="color:blue;">Ha arch.</span><br>
            &nbsp;
        </div>
    </div>       
</div>  

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        {{-- <img src="#"></img>
        <br/>  --}}
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">Product
                {{-- <a href="#" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        more...
                    </div>                    
                </a> --}}
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>產品線Api設計</p>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>{1} : http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/product</span>
            </div>
            <div>{2} : http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/product</span>/<span style="color:red;">{class}</span>/<span style="color:orange;">{model}</span>
            </div>
            <span style="color:blue;">其中 : </span><br>
            -- <span style="color:green;">{class}為分類名</span><br>
            -- <span style="color:green;">{model}為模組名</span><br>
            -- ex : https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring

            <div style="width:2px;height:25px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            <div style="margin-left:20px">
                1. 以上為一個完整Api節點，後面串接為api功能<br>
                &nbsp;
            </div>    
            {{--  頁面尚未建立，因此不提供API  --}}
            {{--  由於規格，下載必須另外資料庫管理，因此需另外弄後台，這裡暫時不題供API  --}}
            {{--  目前如果有需要都建在首頁，撈  --}}
            <span style="color:blue;">功能 : </span><br>
            -- <span style="color:blue;">{1}/content/{page}</span> <span style="color:green;">-- 產品線列表 - 參數 : Json</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/content/{page}<br></span>
            <span style="color:green;">其中 : page : "home" or "overview" or "feature"<br></span>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>                  
                &nbsp;&nbsp;&nbsp;&nbsp;    page_class : "Fast Development"; - 只有feature有class屬性<br>  
                &nbsp;&nbsp;&nbsp;&nbsp;    page_search : "XXX";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    page_count : "20";<br>               
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/content/home<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>             
            }<br>
            </span>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/content/home<br>
                {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                    &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>   
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_class : "Fast Development";<br>  
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_search : "%內容%";<br> 
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_count : "20";<br>                   
                }<br>
                </span>
            <br>
            {{--  -- <span style="color:blue;">/introduce[/lite or /normal or /full]</span> <span style="color:green;">-- 介紹 - 參數 : 無</span><br>  --}}
            -- <span style="color:blue;">{1}/content/{page}</span> <span style="color:green;">-- 內容 - 參數 : Json</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/content/{page}<br></span>
            <span style="color:green;">其中 : page : "home" or "overview" or "feature"<br></span>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "XXX";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    class : "Fast Development"; - 只有feature有class屬性<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/content/home<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "%測試%";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>           
            }<br>

            {{--  -- <span style="color:blue;">/[lite or normal or full]</span> <span style="color:green;">-- 產品線列表 - 參數 : Json</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    page : "index";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    class : "Fast Development";<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/product/lite<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>             
            }<br>
            </span>
            <br>
            
            -- <span style="color:blue;">/introduce[/lite or /normal or /full]</span> <span style="color:green;">-- 介紹 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/introduce<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/introduce/lite<br></span>
            <br>
            -- <span style="color:blue;">/spec[/lite or /normal or /full]</span> <span style="color:green;">-- 規格 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/spec<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/spec/lite<br></span>
            <br>
            -- <span style="color:blue;">/picture[/lite or /normal or /full]</span> <span style="color:green;">-- 圖片 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/picture<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/picture/lite<br></span>
            <br>
            -- <span style="color:blue;">/comment[/lite or /normal or /full]</span> <span style="color:green;">-- 評論 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/comment<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/comment/lite<br></span>
            <br>
            -- <span style="color:blue;">/support[/lite or /normal or /full]</span> <span style="color:green;">-- 支援 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/support<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/support/lite<br></span>
            <br>
            -- <span style="color:blue;">/buy[/lite or /normal or /full]</span> <span style="color:green;">-- 購買 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/buy<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/buy/lite<br></span>
            <br>
            -- <span style="color:blue;">/video[/lite or /normal or /full]</span> <span style="color:green;">-- 影片 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/video<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/video/lite<br></span>
            <br>
            -- <span style="color:blue;">/information[/lite or /normal or /full]</span> <span style="color:green;">-- 資訊 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/information<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring/information/lite<br></span>
            <br>  --}}
        </div>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        
    </div> 
                           
              
</div>  

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        {{-- <img src="#"></img>
        <br/>  --}}
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">Device
                {{-- <a href="#" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        more...
                    </div>                    
                </a> --}}
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>設備Api設計</p>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>{1} : http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/device</span>
            </div>
            <div>{2} : http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/device</span>/<span style="color:red;">{dir1}</span>/.../<span style="color:red;">{dir8}</span>/<span style="color:purple;">model</span>/<span style="color:orange;">{model}</span>
            </div>
            <span style="color:blue;">其中 : </span><br>
            -- <span style="color:green;">{dir}}為路徑名</span><br>
            -- <span style="color:green;">{model}為模組名</span><br>
            -- ex : https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100

            <div style="width:2px;height:25px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            <div style="margin-left:20px">
                1. 以上為一個完整Api節點，後面串接為api功能<br>

                &nbsp;
            </div>    
            <span style="color:blue;">功能 : </span><br>
            {{--  頁面尚未建立，因此不提供API  --}}
            {{--  由於規格，下載必須另外資料庫管理，因此需另外弄後台，這裡暫時不題供API  --}}
            {{--  目前如果有需要都建在首頁，撈  --}}
            -- <span style="color:blue;">{1}/content/{page}</span> <span style="color:green;">-- 設備列表 - 參數 : Json</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/content/{page}<br></span>
            <span style="color:green;">其中 : page : "home" or "overview" or "feature"<br></span>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>                  
                &nbsp;&nbsp;&nbsp;&nbsp;    page_class : "Fast Development"; - 只有feature有class屬性<br>  
                &nbsp;&nbsp;&nbsp;&nbsp;    page_search : "XXX";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    page_count : "20";<br>               
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/content/{page}<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>             
            }<br>
            </span>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/content/home<br>
                {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                    &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>   
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_class : "Fast Development";<br>  
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_search : "%內容%";<br> 
                    &nbsp;&nbsp;&nbsp;&nbsp;    page_count : "20";<br>                   
                }<br>
                </span>
            <br>
            {{--  -- <span style="color:blue;">/introduce[/lite or /normal or /full]</span> <span style="color:green;">-- 介紹 - 參數 : 無</span><br>  --}}
            -- <span style="color:blue;"> {2}/content/{page}</span> <span style="color:green;">-- 內容 - 參數 : Json</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/full/model/HA100/content/{page}<br></span>
            <span style="color:green;">其中 : page : "home" or "overview" or "feature"<br></span>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "XXX";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    class : "Fast Development"; - 只有feature有class屬性<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/full/model/HA100/content/home<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "%測試%";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>            
            }<br>
            
            {{--  -- <span style="color:blue;">/[lite or normal or full]</span> <span style="color:green;">-- 產品線列表 - 參數 : Json</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    page : "index";<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    class : "Fast Development";<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/device/lite<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    search : "aoi";<br> 
                &nbsp;&nbsp;&nbsp;&nbsp;    count : "20";<br>             
            }<br>
            </span>
            <br>
            
            -- <span style="color:blue;">/introduce[/lite or /normal or /full]</span> <span style="color:green;">-- 介紹 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/introduce<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/introduce/lite<br></span>
            <br>
            -- <span style="color:blue;">/spec[/lite or /normal or /full]</span> <span style="color:green;">-- 規格 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/spec<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/spec/lite<br></span>
            <br>
            -- <span style="color:blue;">/picture[/lite or /normal or /full]</span> <span style="color:green;">-- 圖片 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/picture<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/picture/lite<br></span>
            <br>
            -- <span style="color:blue;">/comment[/lite or /normal or /full]</span> <span style="color:green;">-- 評論 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/comment<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/comment/lite<br></span>
            <br>
            -- <span style="color:blue;">/support[/lite or /normal or /full]</span> <span style="color:green;">-- 支援 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/support<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/support/lite<br></span>
            <br>
            -- <span style="color:blue;">/buy[/lite or /normal or /full]</span> <span style="color:green;">-- 購買 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/buy<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/buy/lite<br></span>
            <br>
            -- <span style="color:blue;">/video[/lite or /normal or /full]</span> <span style="color:green;">-- 影片 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/video<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/video/lite<br></span>
            <br>
            -- <span style="color:blue;">/information[/lite or /normal or /full]</span> <span style="color:green;">-- 資訊 - 參數 : 無</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/information<br></span>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/device/aoi/oring/model/LF100/information/lite<br></span>
            <br>  --}}
        </div>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
    </div> 
                            
                
</div>  

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        {{-- <img src="#"></img>
        <br/>  --}}
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">ha_media_100
                <a href="https://hahaha0417.zapto.org:8443/ha/ha_media_100" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        產品頁
                    </div>                    
                </a>
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>點歌小工具</p>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:orange;">/ha_media_100</span>
            </div>
            <span style="color:blue;">其中 : </span><br>
            -- ex : https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100

            <div style="width:2px;height:25px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            <div style="margin-left:20px">
                1. 以上為一個完整Api節點，後面串接為api功能<br>
                &nbsp;
            </div>                
            <span style="color:blue;">功能 : </span><br>
            <span style="color:blue;">Communication</span><br>
            -- <span style="color:blue;">/media_end</span> <span style="color:green;">-- 媒體結束</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/add/media<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            <span style="color:blue;">Action</span><br>
            <br>
            {{--  -- <span style="color:blue;">/introduce</span> <span style="color:green;">-- 介紹</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/introduce<br></span>
            <br>  --}}

            -- <span style="color:blue;">/add/media</span> <span style="color:green;">-- 新增媒體</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664)"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "url" : "D:\Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664).mp4";<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/add/media<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664)"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "url" : "D:\Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664).mp4";<br>           
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/add/youtube</span> <span style="color:green;">-- 新增youtube影片</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "封茗囧菌 - 有何不可「 女聲可愛版」♪Karendaidai♪"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "url" : "https://www.youtube.com/watch?v=KASyGGTVEe0";<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/add/youtube<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "封茗囧菌 - 有何不可「 女聲可愛版」♪Karendaidai♪"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "url" : "https://www.youtube.com/watch?v=KASyGGTVEe0";<br>            
            }<br>
            </span>
            <br>
            -- <span style="color:blue;">/delete</span> <span style="color:green;">-- 刪除歌曲</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "index" : "2"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "https://www.youtube.com/watch?v=KASyGGTVEe0";<br>                
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/delete<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "index" : "2"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "name" : "封茗囧菌 - 有何不可「 女聲可愛版」♪Karendaidai♪";<br>            
            }<br>
            </span>
            <span style="color:blue;">註 : index和name必須對到，有做double check</span><br>
            <br>

            -- <span style="color:blue;">/clear</span> <span style="color:green;">-- 清除歌曲</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/clear<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/play</span> <span style="color:green;">-- 播放歌曲</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/play<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/prev</span> <span style="color:green;">-- 上一首</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/prev<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/next</span> <span style="color:green;">-- 下一首</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/next<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/pause</span> <span style="color:green;">-- 暫停</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/pause<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/stop</span> <span style="color:green;">-- 停止</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/stop<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/unload</span> <span style="color:green;">-- 卸載</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/unload<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            <br>
            <span style="color:blue;">Query</span><br>
            -- <span style="color:blue;">/play_list</span> <span style="color:green;">-- 撥放列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/play_list<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <span style="color:blue;">註 : response.list是回傳列表，請自行dump出來看</span><br>
            <br>

            -- <span style="color:blue;">/list</span> <span style="color:green;">-- 列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <span style="color:blue;">註 : response.list是回傳列表，請自行dump出來看</span><br>
            <br>

            {{--  -- <span style="color:blue;">/state</span> <span style="color:green;">-- 狀態</span><br>
            <span style="color:green;">ex : GET https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/state<br></span>
            <br>  --}}

            <br>
            <span style="color:blue;">List</span><br>
            -- <span style="color:blue;">/list/change/{list_name}</span> <span style="color:green;">-- 更換列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/list/add/{list_name}</span> <span style="color:green;">-- 新增列表</span><br>
            {<br>  
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>   
                &nbsp;&nbsp;&nbsp;&nbsp;    "list" : 
                &nbsp;&nbsp;&nbsp;&nbsp;[<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "type" : "0(local resource), 1(youtube)"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "name" : "封茗囧菌 - 有何不可「 女聲可愛版」♪Karendaidai♪"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "url" : "dir, youtube_id";<br>   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    },<br>                             
                &nbsp;&nbsp;&nbsp;&nbsp;]<br>          
            },<br>   
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/add/{list_name}<br>                
                {<br>  
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>   
                &nbsp;&nbsp;&nbsp;&nbsp;    "list" : 
                &nbsp;&nbsp;&nbsp;&nbsp;[<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "type" : "0"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "name" : "Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664)"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "url" : "D:\Incoming\Yura Sakura[さくらゆら](櫻由羅) 特命JK捜査官の痴漢撲滅おとり大作戦！(kawd-664).mp4";<br>   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    },<br>   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "type" : "1"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "name" : "封茗囧菌 - 有何不可「 女聲可愛版」♪Karendaidai♪"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    "url" : "KASyGGTVEe0";<br>   
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    },<br>                            
                &nbsp;&nbsp;&nbsp;&nbsp;]<br>          
                },<br>    
            </span>
            <br>
            
            -- <span style="color:blue;">/list/delete/{list_name}</span> <span style="color:green;">-- 刪除列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/delete/XX123<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>
            
            -- <span style="color:blue;">/list/rename/{old_list_name}/to/{new_list_name}</span> <span style="color:green;">-- 更名列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/rename/XX123/to/XX234<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            -- <span style="color:blue;">/list/clear</span> <span style="color:green;">-- 清空列表</span><br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "ip"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "port"<br>              
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list/clear<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "ip" : "http://114.32.144.211"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "port" : "1999"<br>         
            }<br>
            </span>
            <br>

            <br>
            {{-- <span style="color:blue;">Batch</span>
            -- <span style="color:blue;">/batch</span> <span style="color:green;">-- 批次指令</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/ha_media_100/list<br></span>
            <br> --}}

        </div>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
    </div> 
                            
                
</div>  

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        {{-- <img src="#"></img>
        <br/>  --}}
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">公共運輸Api介接練習
                {{-- <a href="#" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        more...
                    </div>                    
                </a> --}}
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>公共運輸Api介接練習設計</p>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/practice/MOTC_Transport</span>
            </div>
            <span>網址 : <a href="https://ptx.transportdata.tw/MOTC">https://ptx.transportdata.tw/MOTC</a></span><br>
            <br>
            <span style="color:blue;">其中 : </span><br>
            {{--  -- <span style="color:green;">{class}為分類名</span><br>
            -- <span style="color:green;">{model}為模組名</span><br>
            -- ex : https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring  --}}

            <div style="width:2px;height:25px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            <div style="margin-left:20px">
                1. 以上為一個完整Api節點，後面串接為api功能<br>
                &nbsp;
            </div>    
            {{--  頁面尚未建立，因此不提供API  --}}
            {{--  由於規格，下載必須另外資料庫管理，因此需另外弄後台，這裡暫時不題供API  --}}
            {{--  目前如果有需要都建在首頁，撈  --}}
            <span style="color:blue;">功能 : </span><br>
            <span style="color:blue;">Bus</span><br>
            -- <span style="color:blue;">/bus/route/{route_name}</span> <span style="color:green;">-- 公車路線</span><br>
            <span style="color:green;">ex : Get https://hahaha0417.zapto.org:8443/api/1.0/practice/MOTC_transport/bus/route/Taoyuan/5671<br>
                <span style="color:red;">中壢 - 804醫院(5671)公車路線</span><br>
                {{--  {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;    "search" : "翻譯"<br>   
                }<br>  --}}
            </span>
            <span style="color:green;">ex : Get https://hahaha0417.zapto.org:8443/api/1.0/practice/MOTC_transport/bus/route/Taoyuan/5616<br>
                <span style="color:red;">中壢 - 龍潭(5616)公車路線</span><br>
                {{--  {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;    "search" : "翻譯"<br>   
                }<br>  --}}
            </span>
        
        </div>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        
    </div> 
                           
              
</div>  

<div class="row home_content">
    <div class="col-sm item btn-light">
        {{--  示意圖  --}}
        {{-- <img src="#"></img>
        <br/>  --}}
        {{--  標題  --}}
        <div style="background: rgba(190,255,190,0.5);">  
            <hr class="hr1"/>
            <h3 style="font-weight:bold;">Google Api介接練習
                {{-- <a href="#" target="_parent">
                    <div class="btn btn-dark" style="position:relative;float:right;width:100px;height:40px;margin:0 15px 0 0">
                        more...
                    </div>                    
                </a> --}}
            </h3>
            <hr class="hr1"/>
        </div>  
        {{--  註解    --}}
        <p>Google Api介接練習設計</p>
        <p>每天只有1000筆，不要亂try</p>
        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        <div>
            <h5><b>路徑規劃 : </b></h5>
            <div>http://<span style="color:blue;">localhost</span>/<span style="color:pink;">api</span>/<span style="color:pink;">1.0</span><span style="color:green;">/practice/google</span>
            </div>
            <span>網址 : <a href="https://developers.google.com/products/">https://developers.google.com/products/</a></span><br>
            <br>
            <span style="color:blue;">其中 : </span><br>
            {{--  -- <span style="color:green;">{class}為分類名</span><br>
            -- <span style="color:green;">{model}為模組名</span><br>
            -- ex : https://hahaha0417.zapto.org:8443/api/1.0/product/aoi/oring  --}}

            <div style="width:2px;height:25px;position:absolute;background:rgba(100,255,100,1)">&nbsp;</div>
            <div style="margin-left:20px">
                1. 以上為一個完整Api節點，後面串接為api功能<br>
                &nbsp;
            </div>    
            {{--  頁面尚未建立，因此不提供API  --}}
            {{--  由於規格，下載必須另外資料庫管理，因此需另外弄後台，這裡暫時不題供API  --}}
            {{--  目前如果有需要都建在首頁，撈  --}}
            <span style="color:blue;">功能 : </span><br>
            <span style="color:blue;">Search</span><br>
            -- <span style="color:blue;">/search/web</span> <span style="color:green;">-- Web查詢</span><br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/practice/google/search/web<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "search" : "search_name"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "start" : "1+"<br>     
                &nbsp;&nbsp;&nbsp;&nbsp;    "count : "1 - 10"<br>            
            }<br>
            <span style="color:green;">ex : POST https://hahaha0417.zapto.org:8443/api/1.0/practice/google/search/web<br>
            {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "search" : "天氣"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;    "start" : "1"<br>     
                &nbsp;&nbsp;&nbsp;&nbsp;    "count : "5"<br>       
            }<br>
            </span>
            <br>

         
        </div>

        <hr class="hr1"/>   
        {{--  簡短說明                   --}}
        
        
    </div> 
                           
              
</div>  

{{-- <div class="plugin_banner">
    <img class="plugin_banner_change plugin_banner_pre" src="./assets/plugin/banner/banner/pre.png">
    <img class="plugin_banner_change plugin_banner_next" src="./assets/plugin/banner/banner/next.png">
    
    <div class="plugin_banner_cirbox">
        @foreach($pic_board as $key => $value)
            @if($key == 0)
                <div class="plugin_banner_cir plugin_banner_cr"></div>
            @else  
                <div class="plugin_banner_cir"></div>
            @endif 
        @endforeach  
    </div>
    <div class="plugin_banner_imgbox">
        @foreach($pic_board as $key => $value)
            @if($key == 0)
                <img class="plugin_banner_img plugin_banner_im" src="{{url($value['image'])}}" style="display: inline;">
            @else  
                <img class="plugin_banner_img" src="{{url($value['image'])}}" style="display: none;">
            @endif 
        @endforeach  
    </div>	
</div> --}}

 
{{--  待修改:當往下捲動超過時黏在導航  --}}
{{-- <div class="plugin_follow_under_line_nav">
    <div class="bottomLine"></div>
    <ul class="nav home_nav">
        @foreach($nav as $key => $value)
            @if($value['order_'] != -1)
                @if($key == 0)
                    <li class="item selected_nav" name="{{$value['title_name']}}" url="{{url($value['url'])}}">{{$value['title']}}</li>
                @else  
                    <li class="item" name="{{$value['title_name']}}" url="{{url($value['url'])}}">{{$value['title']}}</li>
                @endif 
            @endif 
        @endforeach 
    </ul>
</div> --}}
{{--  如需改成用ajax撈，須建立管理器，管理js & css在頭部不重複，目前沒要這樣做  --}}
{{--  iframe無法用ajax取得頁面內容替換  --}}
{{-- <iframe class="content_frame home_content_frame" loaded="0" id="home_content_frame" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="{{url("overview/")}}">
</iframe> --}}
