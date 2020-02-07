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
            .a{
                width:100%;
                height:100%;
                /*background:red;*/
                float: left;
                position: relative;
            }
            .img_a{
                width:800px;
                height:600px;
                /*background:green;*/
                display: block;
                margin: 15px auto;                
            }
            #product-quick-award img{
                width: 80px;
                height:60px;
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
       
        <div id="content" >
            <!-- asus_header --> 
            <link rel="stylesheet" href="/assets/plugin_split/asus/header/asus_header/asus_header.css">
            <script src="/assets/plugin_split/asus/header/asus_header/asus_header.js"></script>
            <!-- ---------------------- -->  
            <div class="asus_header row">
                <div class="span6" id="product-info-zone">
                    <img src='/image/front/test/iTW.png' alt='ROG MAXIMUS X FORMULA' />
                    <!--other logo-->
                    <div id="product-quick-logo">
                        <ul class="unstyled">
                            <li id="intel_logo" class="hide">
                                <a id="cpc" href="#"><img src="/assets/plugin_split/asus/header/asus_header/image/empty.jpg" alt="intel centrino2" /></a>
                                <a id="textmention" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <!--End-->
                </div>
                <div class="span6 v-center" id="product-main-image">
                    <hgroup>
                        <h1 class="product-slogan">iTW</h1>
                        <div class="product-intro">
                            <ul>
                                <li>您好，您今天愛台灣了嗎
                                </li>
                                <li>愛台灣，請好好規劃建設
                                </li>
                                <li>請依居民眾需求蓋適當規模的建設，而不是在那邊純綁利
                                </li>
                                <li>基於大陸做法(共產傳統風格)，不應該出現先服貿再貨貿等類似順序，因為對方不可信，都搞小動作，沒注意就出事了
                                </li>
                                <li>社會上只有藍與綠，所以才會當選不是藍就是綠，這是話術，不是民眾只投藍綠
                                </li>
                                <li>基於架構規劃，主枝幹(藍，綠)，分支(拆出去的無黨籍)，除非切除關聯，不然基本上還是藍或綠，有些可能有Under table，任務結束就恢復黨籍了
                                </li>
                                <li>我政治傾向原是淺綠，基於觀察完藍綠交換執政，基於現況，我是黑色的且不帶黃
                                </li>
                                <li><span style="color:red;">請給哈哥一份工作，兩年半沒工作了，TOT，謝謝</span>
                                </li>
                            </ul>
                        </div>
                        <!--<div class="small-star"><img src="/images/small-star.jpg"></div>-->
                        <div class="color-select"></div>
                        {{-- <label class="checkbox add-to-list">
                            <input type="checkbox" product-group="2" data-imgsrc="/assets/plugin_split/asus/header/asus_header/image/P_setting_x_0_90_end_100.png" class="add-compare-check" data-modelName="ROG MAXIMUS X FORMULA" alt="R8suNyyA4xqZ0dIi" onclick="googleTrackProductfn('AddCompare',this);">加入比較表
                        </label> --}}

                        <!--other logo-->
                        <div id="product-quick-award">
                            <ul class="unstyled">
                                <li><img src="/image/front/test/1.png"></li>
                                <li><img src="/image/front/test/2.jpg"></li>
                                <li><img src="/image/front/test/3.jpg"></li>
                                <li><img src="/image/front/test/4.jpg"></li>
                            </ul>
                        </div>
                        <!--End-->
                        <div id="product-where-to-buy" class="btn-group shop-btn-group hide">
                            <a class="btn-asus" href="javascript:void(0);" onclick="content_item_click('wheretobuy');return false;">Shop</a>
                        </div>
                    </hgroup>
                </div>
                
            </div>
            <div style="float: left;">
                <br><br>fff;
            </div>
            <!-- ment_about --> 
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/about/ment_about/ment_about.css")}}">
            <script src="{{asset("assets/plugin_split/ment/about/ment_about/ment_about.js")}}"></script>       
            <div class="ment_about row">
                <div class="bg">
                    <div class="container">
                        <div class="head">
                            {{--  <button type="button" class="anchor-to" data-target="about"></button>  --}}
                            <div class="ti-en ti-font">About ME</div>
                            <h2 class="ti-ch">關於哈哥</h2>
                        </div>
                        <section class="content">
                            <p class="top"> hahaha個人致力於找工作，希望找到一份視窗程式(C++ Builder)或Web程式(PHP - Laravel)的工作，<br>同時也會簡易編曲，會規畫基本架構及演算法，這是我認知的物件導向法。</p>
                            <div class="about-inner clearfix">
                                <div class="start-ico"><i></i></div>
                                <div class="left">
                                    <div class="box">
                                        <h3 class="about-ti">現在<strong class="ti-font">2018</strong></h3>
                                        <p class="about-txt"> 於2018年11月18日，做到這個階段</strong> <br>很缺馬子， <strong>要找妹系的，且不排斥我錢太少的人</strong> <br>共度餘生(Love)。
                                            <br>
                                        </p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">個人想法<strong class="ti-font"></strong></h3>
                                        <p class="about-txt"> 簡單，安靜，低調，直白。
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="box">
                                        <h3 class="about-ti">狀況</h3>
                                        <p class="about-txt"> 在家沒錢吃老爸，老爸是國民黨的，在催我趕快找到工作，<br>有人要同情一下嗎。
                                            <br><br>
                                        </p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">能力</h3>
                                        <p class="about-txt"> 簡易視覺化程式設計(個人認知)，<br>簡易架構設計(個人認知)，簡易編曲及縮混(個人認知)，<br>簡易物件導向(個人認知)，簡易模組化(個人認知)。
                                            <br>
                                        </p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">全方位Design</h3>
                                        <p class="about-txt"> 基於演算法(Ha Algo.)及架構法(Ha Arch.)，實作程序及規劃。</p>
                                    </div>
                                </div>
                                <div class="lines">
                                    <div class="line-1"></div>
                                    <div class="line-2"></div>
                                    <div class="line-3"></div>
                                    <div class="line-4"></div>
                                    <div class="line-5"></div>
                                    <div class="line-6"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- ---------------------- --> 
           
            <!-- asus_performance -->  
            <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_performance/asus_performance.css">
            <script src="/assets/plugin_split/asus/layout/asus_performance/asus_performance.js"></script>
            <!-- ---------------------- -->  
            <div id="asus_performance">
                <h2 class="left"><span class="top">最強</span>台灣製造</h2>
                <div class="hd-sec-ddr4 hd-w1200">
                    <div class="hd-col45 txt-left fright">
                        <h3 class="txt-red">台灣真美好</h3>
                        <p>
                            在地生產，品質好。
                        </p>
                    </div>
                    <div class="hd-col60 txt-left fleft">
                        <img src="/image/front/test/city_map.png" style="margin-left: 0;">
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="hd-sec-prolock hd-w1200">
                    <div class="hd-ib hd-col40">
                        <h3 class="txt-red">這是我們的發展概況</h3>
                        <p>請參閱左圖。
                        </p>
                    </div>
                    <div class="hd-ib hd-col60">
                        <img src="/image/front/test/proportion.png">
                    </div>
                </div>
                <div class="hd-sec-overview">
                    <div class="hd-w1200 txt-center">
                        <h3 class="txt-red">方針
                        </h3>
                        <h4 class="txt-grey">方向正確，永續經營</h4>
                        <p>
                            我不是政治狂熱的人，請自己想，我也不會

                        </p>
                        <p class="txt-left">
                            &#8901; 我已經詞窮了。
                            <br> &#8901; 反正模組這樣套。
                            <br> &#8901; 與後台結合可以跟塊狀資料庫Fit。
                        </p>
                    </div>
                    <div class="hd-menu txt-center">
                        <ul class="hd-w1200">
                            <li data-detail=".hd-detail01">
                                <h4>Love<br>喜歡妹系的</h4>
                            </li>
                            <li data-detail=".hd-detail02">
                                <h4>Deal<br>處理慣老闆</h4>
                            </li>
                            <li data-detail=".hd-detail03" class="hd-active">
                                <h4 style="line-height: 53px;">我不喜歡加班</h4>
                            </li>
                            <li data-detail=".hd-detail04">
                                <h4>Stable<br>永續經營</h4>
                            </li>
                            <li data-detail=".hd-detail05">
                                <h4>First<br>台灣優先(基於現況)</h4>
                            </li>
                        </ul>
                    </div>
                    <div class="hd-w1200 hd-details">
                        <div class="hd-detail hd-detail01">
                            <img src="/image/front/test/giphy.gif" class="hd-col50">
                            <div class="hd-col50 txt-left">
                                <h4 class="txt-red">妹系無限好</h4>
                                <p>0 .0 有人有嚐過妹汁的力量嗎。</p>
                            </div>
                        </div>
                        <div class="hd-detail hd-detail02">
                            <img src="/image/front/test/m.jpg" class="hd-col50">
                            <div class="hd-col50 txt-left">
                                <h4 class="txt-red">慣老闆該死</h4>
                                <p>員工只是用來做事情的，多做全部是老闆功勞，這樣對嗎。</p>
                            </div>
                        </div>
                        <div class="hd-detail txt-center hd-detail03 hd-open">
                            <img src="/image/front/test/加班.jpg" class="hd-col50">
                            <div class="hd-col50 txt-left">
                                <h4 class="txt-red">常態性加班好嗎
                                </h4>
                                <p>行為費用化，加班沒有錢，上面講好了，一輩子當乞丐。<br>
                                沒前途像圖活著那樣好嗎

                                </p>
                            </div>
                        </div>
                        <div class="hd-detail hd-detail04">
                            <img src="/image/front/test/永續經營.jpg" class="hd-col50">
                            <div class="hd-col50 txt-left">
                                <h4 class="txt-red">努力及忍耐是有評估的</h4>
                                <p>我做事通常有目的及動機，不會沒事就動工的。</p>
                            </div>
                        </div>
                        <div class="hd-detail hd-detail05">
                            <img src="/image/front/test/台灣優先.jpg" class="hd-col50">
                            <div class="hd-col50 txt-left">
                                <h4 class="txt-red">當員工沒辦法，等以後吧</h4>
                                <p>不知道國父同不同意@@。</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hd-more"></div>
                <div class="hd-sec-hidden">
                    <div class="hd-sec-mode hd-w1100 txt-center">
                        <h3 class="txt-red">模組化的好處</h3>
                        <p class="hd-ib hd-w800">
                            就像這樣，reuse不用一天，附上兩個妹子
                        </p>
                        <figure class="hd-ib hd-col50 ib-top">
                            <img src="" data-source="/image/front/home/carousel/邱若瑜.jpg">
                            <h4 class="txt-red txt_decoline">
                                <br><br>
                                橘子姐姐                                
                                <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129"
                                width="24px" height="24px">
                                <g>
                                <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"></path>
                                </g>
                                </svg>
                            </h4>
                            <div class="mode-content txt-left">
                                <ul class="hd-frame">
                                    <li>
                                        <p class="txt-red">內容請自己想</p>
                                        <p>欄位太多我不知道要打什麼</p>
                                    </li>
                                    <li>
                                        <p class="txt-red">左</p>
                                        <p>總之可以跟後台結合。</p>
                                    </li>
                                </ul>
                            </div>
                        </figure>
                        <figure class="hd-ib hd-col50 ib-top">
                            <img src="" data-source="/image/front/home/carousel/太妍.jpg">
                            <h4 class="txt-red txt_decoline">
                                <br><br>
                                太妍
                                <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129"
                                width="24px" height="24px">
                                <g>
                                <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"></path>
                                </g>
                                </svg>
                            </h4>
                            <div class="mode-content txt-left">
                                <ul class="hd-frame">
                                    <li>
                                        <p class="txt-red">內容請自己想</p>
                                        <p>欄位太多我不知道要打什麼</p>
                                    </li>
                                    <li>
                                        <p class="txt-red">右</p>
                                        <p>總之可以跟後台結合。</p>
                                    </li>
                                </ul>
                            </div>
                        </figure>
                    </div>
                </div>
            </div> 
            <!-- ---------------------- -->  
            
            <!-- ment_news --> 
            {{--  slick  --}}
            {{--  http://kenwheeler.github.io/slick/  --}}
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/slick/ment_news/ment_news.css")}}">
            <script src="{{asset("assets/plugin_split/ment/slick/ment_news/ment_news.js")}}"></script> 
            <div class="ment_news">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="news"></button>
                        <div class="ti-en ti-font">台灣</div>
                        <h2 class="ti-ch">各縣市</h2></div>
                    <div class="news-slick-wrap">
                        <div class="news-slick">
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=103" title="台北市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/台北.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="台北市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">18</strong>
                                            <br>Nov</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">台北市</h3>
                                        <p class="content">請給我工作好嗎</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=102" title="新北市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/新北.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="新北市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">19</strong>
                                            <br>Nov</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">新北市</h3>
                                        <p class="content">請給我Web工作</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=101" title="桃園市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/桃園.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="桃園市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">20</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">桃園市</h3>
                                        <p class="content">有人要收我嗎QQ</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=100" title="新竹市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/新竹.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="新竹市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">21</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">新竹市</h3>
                                        <p class="content">請問有PC-Based自動化職缺嗎</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=99" title="台中市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/台中.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="台中市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">22</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">台中市</h3>
                                        <p class="content">等回台中就換投中部了Q_Q</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=98" title="台南市" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/台南.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="台南市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">23</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">台南市</h3>
                                        <p class="content">台南有沒有接案阿</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=97" title="💗M.E.實況主陪你過七夕💗" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/image/front/test/高雄.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="高雄市" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">24</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">高雄市</h3>
                                        <p class="content">高雄太遠了，不投履歷</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------- -->  
            <!-- asus_youtube_box -->  
            <link rel="stylesheet" href="/assets/plugin_split/asus/youtube/asus_youtube_box/asus_youtube_box.css">
            <script src="/assets/plugin_split/asus/youtube/asus_youtube_box/asus_youtube_box.js"></script>
            <!-- ---------------------- -->  

            <div class="asus_sec_vtop">
                <div id="lightbox">
                    <div class="hd_filter">
                    </div>
                    <div class="hd_box">
                        <div class="hd_close">
                            <span></span>
                            <span></span>
                        </div>
                        <iframe id="player" src="" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="video_txt">
                    <strong style="font-size: 48px;">台灣位置</strong><br>
                    這是台灣，目前顏色是這樣，有一天會變成<span style="color: black;">黑色</span>的嗎XD<br>
                    附上我的作品!!，請觀看<br>
                </div>
                <img src="/assets/plugin_split/asus/youtube/asus_youtube_box/image/play_btn.png" alt="play" class="play-tutorial" data-src="https://www.youtube.com/embed/wqj6ET7r3VQ">
                <span></span>
            </div>
            <!-- ---------------------- -->  


            <!-- ---------------------- --> 
            <!-- ment_top --> 
            <script src="{{asset("/assets/plugin_split/ment/top/ment_top/ment_top.js")}}" type="text/javascript"></script>
            <link href="{{asset("/assets/plugin_split/ment/top/ment_top/ment_top.css")}}" rel="stylesheet" data-lazyload="true"> 
            <a href="#" title="返回頁首" data-tooltip="hide" class="go-top"> <i></i> <span>TOP</span> </a>
            <!-- ---------------------- --> 






            <!-- 換膚設定 -->      
            <script>
                var EnableBlackVersion = '1';
                
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    if (EnableBlackVersion == "1") {
                        $("body").attr("id", "rog_black_style");
                    }
                });
            </script>
            
            
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
    <link rel="stylesheet" href="{{asset("assets/web/front/test/test1.css")}}">
    <script src="{{asset("assets/web/front/test/test1.js")}}"></script>
    <script>
        
        $(function(){
            // 最後一次載入
            lazyload();      
                            
        });
        {{--  alert("模組化基本使用");  --}}
    </script>
</html>

