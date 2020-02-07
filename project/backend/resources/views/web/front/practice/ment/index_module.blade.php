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
        <link rel="stylesheet" href="{{asset("assets/web/front/practice/ment/index_module.css")}}">
        <script src="{{asset("assets/web/front/practice/ment/index_module.js")}}"></script>
        
        <link href="http://www.ment.com.tw/favicon.ico" rel="icon">
        <link href="http://www.ment.com.tw/favicon.ico" rel="shortcut icon">
        <link href="http://www.ment.com.tw/apple-touch-icon.png" rel="apple-touch-icon">

        

        <script>
            
            $(function(){    
                
            });
            
            
        </script>
        <style>

            
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        
        
        
    </head>
    <body>     
        <!-- ment_nav -->
        <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/nav/ment_nav/ment_nav.css")}}">
        <script src="{{asset("assets/plugin_split/ment/nav/ment_nav/ment_nav.js")}}"></script>      
        <header class="header">
            <nav class="social">
                <div class="container">
                    <ul class="reset">
                        <li><a href="#" title="Facebook" target="_blank" class="fb" data-tooltip="bottom" style="position: relative; overflow: visible;">Facebook</a></li>
                        <li><a href="#" title="Instagram" target="_blank" class="ig" data-tooltip="bottom">Instagram</a></li>
                        <li><a href="#" title="YouTube" target="_blank" class="yt" data-tooltip="bottom">Youtube</a></li>
                        <li><a href="#" title="Twitch" target="_blank" class="tw" data-tooltip="bottom">Twitch</a></li>
                        <li><a href="#" title="Contact Us" target="_blank" class="ml" data-tooltip="bottom">Contact Us</a></li>
                        <li class="lg-wrap hidden-xs hidden-sm"> <a href="#" title="Language" class="lg" data-tooltip="hide">TW</a>
                            <div class="lg-menu"> <a href="#" title="繁體中文">繁體中文</a> <a href="./zh-cn" title="简体中文">简体中文</a> <a href="./en" title="English">English</a></div>
                        </li>
                    </ul>
                    <a href="#" title="目錄選單" class="menu-switch"> <span></span> <span></span> <span></span> <span></span> </a>
                </div>
            </nav> 
            <div class="menu">
                <h1 class="logo"> <a href="#" title="魔競娛樂" data-tooltip="hide" style="position: relative; overflow: visible;"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競娛樂"><i class="logo-1"></i><i class="logo-2"></i><i class="logo-3"></i><i class="logo-4"></i><i class="logo-5"></i><i class="logo-6"></i><i class="logo-7"></i><i class="logo-8"></i><i class="logo-9"></i><i class="logo-10"></i><i class="logo-11"></i><i class="logo-12"></i><i class="logo-13"></i><i class="logo-14"></i></a></h1>
                <nav class="container">
                    <ul class="menu-main reset">
                        <li> <a href="#" title="About Us" data-tooltip="hide" data-hover="關於魔競" style="position: relative; overflow: visible;"><span class="def">About Us</span></a>
                            <ul class="menu-sub reset about" style="height: auto;">
                                <li><a href="#" title="魔競簡介" data-tooltip="hide">魔競簡介</a></li>
                                <li><a href="#" title="魔競成員" data-tooltip="hide">魔競成員</a></li>
                            </ul>
                        </li>
                        <li> <a href="#" title="Our Service" data-tooltip="hide" data-hover="魔競服務"><span class="def">Our Service</span></a>
                            <ul class="menu-sub reset service" style="display: none; height: auto;">
                                <li><a href="#" title="產品推廣" data-tooltip="hide">產品推廣</a></li>
                                <li><a href="#" title="自製影音" data-tooltip="hide">自製影音</a></li>
                                <li><a href="#" title="電子競技/ACG" data-tooltip="hide">電子競技/ACG</a></li>
                                <li><a href="#" title="全方位整合行銷" data-tooltip="hide">全方位整合行銷</a></li>
                            </ul>
                        </li>
                        <li> <a href="#" title="Artist" data-tooltip="hide" data-hover="魔競藝人" style="position: relative; overflow: visible;"><span class="def">Artist</span></a>
                            <ul class="menu-sub reset" style="height: auto;">
                                <li><a href="#" data-filter=".t4" title="男生" data-tooltip="hide">男生</a></li>
                                <li><a href="#" data-filter=".t5" title="女生" data-tooltip="hide">女生</a></li>
                                <li><a href="#" data-filter=".t1" title="競技" data-tooltip="hide">競技</a></li>
                                <li><a href="#" data-filter=".t6" title="主持" data-tooltip="hide">主持</a></li>
                                <li><a href="#" data-filter=".t7" title="Cosplay" data-tooltip="hide">Cosplay</a></li>
                                <li><a href="#" data-filter=".live" title="LIVE" data-tooltip="hide"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;LIVE</a></li>
                            </ul>
                        </li>
                        <li> <a href="#" title="News" data-tooltip="hide" data-hover="魔競新鮮事" style="position: relative; overflow: visible;"><span class="def">News</span></a>
                            <ul class="menu-sub reset" style="height: auto;">
                                <li><a href="#" title="公司消息" data-tooltip="hide">公司消息</a></li>
                                <li><a href="#" title="藝人消息" data-tooltip="hide">藝人消息</a></li>
                            </ul>
                        </li>
                        <li> <a href="#" title="Media" data-tooltip="hide" data-hover="魔競影音" style="position: relative; overflow: visible;"><span class="def">Media</span></a>
                            <ul class="menu-sub reset" style="height: auto;">
                                <li><a href="#" title="影音專區" data-tooltip="hide">影音專區</a></li>
                                <li><a href="#" title="照片花絮" data-tooltip="hide">照片花絮</a></li>
                            </ul>
                        </li> 
                        <li> <a href="#" title="Contact" data-tooltip="hide" data-hover="聯絡魔競"><span class="def">Contact</span></a></li>
                        <li class="lang hidden-md hidden-lg"> <a href="#" title="Language" data-tooltip="hide">繁體中文</a>
                            <ul class="menu-sub reset">
                                <li><a href="#" title="繁體中文" data-tooltip="hide">繁體中文</a></li>
                                <li><a href="#" title="简体中文" data-tooltip="hide">简体中文</a></li>
                                <li><a href="#" title="English" data-tooltip="hide">English</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- ---------------------- -->         
        <div id="index" class="g-wrap">
            <!-- ment_youtube_banner -->
            {{--  tubeplayer  --}}
            {{--  https://github.com/nirvanatikku/jQuery-TubePlayer-Plugin  --}}
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-tubeplayer/2.1.0/jquery.tubeplayer.min.js"></script>
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/banner/ment_youtube_banner/ment_youtube_banner.css")}}">
            <script src="{{asset("assets/plugin_split/ment/banner/ment_youtube_banner/ment_youtube_banner.js")}}"></script>     
            <div class="ment_youtube_banner" data-loading="arc-scale">
                <div id="ban-video-player" data-video-id="YtB7Y7lBNhk" class="ban-video"></div>
            </div>
            <!-- ---------------------- --> 
            <!-- ment_about -->  
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/about/ment_about/ment_about.css")}}">
            <script src="{{asset("assets/plugin_split/ment/about/ment_about/ment_about.js")}}"></script>       
            <article class="ment_about">
                <div>
                    <div class="container">
                        <div class="head">
                            <button type="button" class="anchor-to" data-target="about"></button>
                            <div class="ti-en ti-font">About Us</div>
                            <h2 class="ti-ch">關於魔競</h2>
                        </div>
                        <section class="content">
                            <p class="top"> 魔競娛樂致力於專業化實況經紀服務，同時也製作多元化數位影音內容，
                                <br>整合旗下實況藝人資源並提供全面性媒體規劃與採購推廣的行銷服務。</p>
                            <div class="about-inner clearfix">
                                <div class="start-ico"><i></i></div>
                                <div class="left">
                                    <div class="box">
                                        <h3 class="about-ti">緣起<strong class="ti-font">2015</strong></h3>
                                        <p class="about-txt"> 於2015年12月，由《英雄聯盟》S2世界冠軍隊長 <strong>MiSTakE(陳彙中)</strong> 與電競賽事主播 <strong>記得(王繼德)</strong> 共同創立，成立魔競娛樂股份有限公司。
                                            <br>
                                        </p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">企業理念<strong class="ti-font"></strong></h3>
                                        <p class="about-txt"> 串聯電子競技與娛樂兩大勢力，以成為電競與其他產業之間重要的溝通橋樑為最高宗旨，使電子競技產業鏈更加健全完整。
                                            <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="box">
                                        <h3 class="about-ti">實況藝人經紀</h3>
                                        <p class="about-txt"> 開發挖掘潛力網路紅人，簽約及專業直播技能與各類課程培訓，透過數據分析與社群經營協助提升。提供產品推廣、電競主播賽評、Cosplay、代言及商演等各式服務。</p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">數位影音製作</h3>
                                        <p class="about-txt"> 魔競影音團隊專注於線上直播與線下錄播的自製節目影音，搭配深度遊戲內容打造，讓觀眾感受不同以往的影音內容。提供產品推廣、節目製作等服務。</p>
                                    </div>
                                    <div class="box">
                                        <h3 class="about-ti">全方位整合行銷</h3>
                                        <p class="about-txt"> 魔競也替客戶提供全方位的產品行銷規劃，透過口碑渲染、議題營造、媒體規劃、採購推廣，搭配旗下實況藝人經紀與數位影音製作量身打造差異化服務內容，期許能為客戶提供最完善的整合行銷服務。</p>
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
            </article>
            <!-- ---------------------- --> 
            <!-- ment_service --> 
            {{--  lazy   --}}
            {{--  http://jquery.eisbehr.de/lazy/  --}}
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/about/ment_service/ment_service.css")}}">
            <script src="{{asset("assets/plugin_split/ment/about/ment_service/ment_service.js")}}"></script>  
            <article class="ment_service">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="service"></button>
                        <div class="ti-en ti-font">Our Service <a href="http://www.ment.com.tw/zh-tw/service.php" title="閱讀更多" data-tooltip="top">READ MORE</a></div>
                        <h2 class="ti-ch">魔競服務</h2></div>
                    <div class="content">
                        <ul class="list reset">
                            <li>實況藝人經紀</li>
                            <li>數位影音製作</li>
                            <li>全方位整合行銷</li>
                        </ul>
                        <div class="icons clearfix">
                            <section class="box clearfix">
                                <div class="ico"><img src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ico1.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">產品推廣</h3>
                                    <p class="info">透過實況藝人及影音製作
                                        <br>提供最具吸引力的行銷服務</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ico2.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">自製影音</h3>
                                    <p class="info">優質影音節目製作置入、
                                        <br>冠名贊助</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ico3.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">電子競技/ACG</h3>
                                    <p class="info">主播、賽評、Cosplayer深度遊戲內容打造服務</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ico4.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">全方位整合行銷</h3>
                                    <p class="info">與實況藝人或影音製作結合
                                        <br>全媒體規劃整合性行銷服務</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="bot-r"></div>
                <div class="bot-l"></div>
                <div class="anis-1"></div>
                <div class="anis-2"></div>
                <div class="item-1"><img data-src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ite1_1.png" src="/assets/plugin_split/ment/about/ment_service/image/blank.svg" alt="*" class="lazy-ite-1 img-responsive"></div>
                <div class="item-2"><img data-src="/assets/plugin_split/ment/about/ment_service/image/index_serv_ite2_1.png" src="/assets/plugin_split/ment/about/ment_service/image/blank.svg" alt="*" class="lazy-ite-2 img-responsive"></div>
            </article>
            <!-- ---------------------- --> 
            <!-- ment_news --> 
            {{--  slick  --}}
            {{--  http://kenwheeler.github.io/slick/  --}}
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/slick/ment_news/ment_news.css")}}">
            <script src="{{asset("assets/plugin_split/ment/slick/ment_news/ment_news.js")}}"></script> 
            <article class="ment_news">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="news"></button>
                        <div class="ti-en ti-font">News</div>
                        <h2 class="ti-ch">魔競新鮮事</h2></div>
                    <div class="news-slick-wrap">
                        <div class="news-slick">
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=103" title="【M.E.網紅養成計劃】" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1533111150534985299.png" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="【M.E.網紅養成計劃】" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">01</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【M.E.網紅養成計劃】</h3>
                                        <p class="content">想加入我們嗎？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=102" title="📢大事報告📢【魔競大企劃】" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1523417692139898315.png" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="📢大事報告📢【魔競大企劃】" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">11</strong>
                                            <br>APR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">📢大事報告📢【魔競大企劃】</h3>
                                        <p class="content">4/13~4/15連續三天，叫春?暖花開!節目接力賽!!!!</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=101" title="M.E. x WirForce 2017聯名款限定帽T外套" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1508298670922048542.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="M.E. x WirForce 2017聯名款限定帽T外套" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">18</strong>
                                            <br>OCT</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">M.E. x WirForce 2017聯名款限定帽T外套</h3>
                                        <p class="content">首款M.E. x WirForce 2017聯名款限定帽T外套新鮮登場啦！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=100" title="魔競2017中秋節特別企劃《我才是嫦娥》" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1506654235801832099.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="魔競2017中秋節特別企劃《我才是嫦娥》" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">29</strong>
                                            <br>SEP</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">魔競2017中秋節特別企劃《我才是嫦娥》</h3>
                                        <p class="content">9/30(六)晚上7點，鎖定M.E.魔競娛樂Twitch頻道</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=99" title="最近辦活動，都遇到颱風..(╥﹏╥)" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1505356666694402545.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="最近辦活動，都遇到颱風..(╥﹏╥)" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>SEP</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">最近辦活動，都遇到颱風..(╥﹏╥)</h3>
                                        <p class="content">『我才是嫦娥』后宮杯決賽剛剛已經完美落幕</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=98" title="第一屆M.E.盃「我才是嫦娥」海選活動開始" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1504668109635248513.gif" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="第一屆M.E.盃「我才是嫦娥」海選活動開始" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">06</strong>
                                            <br>SEP</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">第一屆M.E.盃「我才是嫦娥」海選活動開始</h3>
                                        <p class="content">后宮選妃了！真·不騙！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=97" title="💗M.E.實況主陪你過七夕💗" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1503893758857103480.png" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="💗M.E.實況主陪你過七夕💗" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">28</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">💗M.E.實況主陪你過七夕💗</h3>
                                        <p class="content">#快來跟我們約會一整天</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=96" title="【XO醬拌LOL】" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1503472401198339585.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="【XO醬拌LOL】" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">23</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【XO醬拌LOL】</h3>
                                        <p class="content">今晚七點，準時開拌！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=95" title="《魔競出任務 PK義大最強VR》活動 延期" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1503377710276566613.png" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="《魔競出任務 PK義大最強VR》活動 延期" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">22</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">《魔競出任務 PK義大最強VR》活動 延期</h3>
                                        <p class="content">555555555555 天鴿颱風泥壞壞</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=94" title="魔競出任務，今天看電影去" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_news/1502773386632890099.jpg" src="/assets/plugin_split/ment/slick/image/ment_news/blank.svg" alt="魔競出任務，今天看電影去" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">15</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">魔競出任務，今天看電影去</h3>
                                        <p class="content">人氣實況主現身《紅衣小女孩2》首映會， 大家表示：怕.jpg
                                        </p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </article>
            <!-- ---------------------- --> 
            <!-- ment_artist --> 
            {{--  slick  --}}
            {{--  http://kenwheeler.github.io/slick/  --}}
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <link rel="stylesheet" href="{{asset("assets/plugin_split/ment/slick/ment_artist/ment_artist.css")}}">
            <script src="{{asset("assets/plugin_split/ment/slick/ment_artist/ment_artist.js")}}"></script> 
            <article class="ment_artist">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="artist"></button>
                        <div class="ti-en ti-font">Artist</div>
                        <h2 class="ti-ch">魔競藝人</h2></div>
                    <div class="artist-slick">  
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=10" data-title="煙煙 / Hedy" data-tooltip="hover" data-invert="true"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_artist/1531464268699877434.png" src="/assets/plugin_split/ment/slick/image/ment_artist/blank.svg" alt="煙煙 / Hedy" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">煙煙 / Hedy</h3>
                                    <p class="info">網路知名Coser，有著姣好的身材與靈巧的手工，擅長製作動漫遊戲服裝道具，也是知名COS團體金色狂風的一員，於2016年踏入實況圈，將原追隨粉絲導入直播中，讓粉絲有一窺Coser日常生活的機會。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>    
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=12" data-title="妮妮 / Niniko" data-tooltip="hover" data-invert="true"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_artist/1531461963946507648.png" src="/assets/plugin_split/ment/slick/image/ment_artist/blank.svg" alt="妮妮 / Niniko" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">妮妮 / Niniko</h3>
                                    <p class="info">原為實況素人的妮妮，有著甜美可愛的外表加上健談開朗的個性、幽默搞笑的實況風格使他與粉絲、觀眾都能有熱烈的互動，曾為知名遊戲特約實況主以及代言出席手機app現場活動。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>                  
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=2" data-title="小熊 / Yuniko" data-tooltip="hover" data-invert="true"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_artist/1531462110754832305.png" src="/assets/plugin_split/ment/slick/image/ment_artist/blank.svg" alt="小熊 / Yuniko" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">小熊 / Yuniko</h3>
                                    <p class="info">具備豐富的主持經驗，因為外型甜美而接過許多外拍及廣告。修長的美腿是小熊最大的特色，氣質的外型與活潑的性格，成功吸引了不少粉絲！實況遊戲種類不限，情感豐富的小熊不時會入戲太深，深受觀眾喜愛。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>                             
                        
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=15" data-title="貝莉莓 / Beryl" data-tooltip="hover" data-invert="true"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_artist/1531461938776021538.png" src="/assets/plugin_split/ment/slick/image/ment_artist/blank.svg" alt="貝莉莓 / Beryl" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">貝莉莓 / Beryl</h3>
                                    <p class="info">網路知名Coser，除了展廠商演跟活動代言之外，也接過節目主持、來賓、遊戲節目固定來賓等等，曾為2015年Garena 流亡黯道鬼島女神活動代言，棚拍與外拍經驗豐富，造型多變，不管是出席活動現場或是平面拍攝表現都相當亮麗。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=21" data-title="阿樂 / Yunni0427" data-tooltip="hover" data-invert="true"> <img data-lazy="/assets/plugin_split/ment/slick/image/ment_artist/1531461884678332525.png" src="/assets/plugin_split/ment/slick/image/ment_artist/blank.svg" alt="阿樂 / Yunni0427" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">阿樂 / Yunni0427</h3>
                                    <p class="info">參加Garena校園甜心，經過海選脫穎而出，目前擔任A.V.A 戰地之王賽後訪問主持人；會多項樂器，表演能力極強。長期出席卡提諾《搞什麼玩粉絲專欄》影片錄影；同時平面、廣告拍攝經驗豐富。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </article>
            <!-- ---------------------- --> 
            <!-- ment_video --> 
            {{--  slick  --}}
            {{--  http://kenwheeler.github.io/slick/  --}}
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
            <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            {{--  animatedslider  --}}
            <script src="{{asset("/assets/plugin_split/ment/slick/ment_video/jquery.cssslider.min.js")}}" type="text/javascript"></script>
            <link href="{{asset("/assets/plugin_split/ment/slick/ment_video/plugin-animatedslider.css")}}" rel="stylesheet" data-lazyload="true">
            <script src="{{asset("/assets/plugin_split/ment/slick/ment_video/ment_vedio.js")}}" type="text/javascript"></script>
            <link href="{{asset("/assets/plugin_split/ment/slick/ment_video/ment_vedio.css")}}" rel="stylesheet" data-lazyload="true">            
            <article class="ment_video">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="video"></button>
                        <div class="ti-en ti-font">Video</div>
                        <h2 class="ti-ch">魔競影音</h2></div>
                    <ul class="video-carousel choose_slider_items reset">
                        <li>
                            <a href="https://youtu.be/-sLGj5fzlZg" title="【M.E.魔競】2018大企劃–叫春?暖花開!預告影片" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201804/1523417468389759767.png" alt="【M.E.魔競】2018大企劃–叫春?暖花開!預告影片" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/ZnHKlYIacoQ" title="【M.E.魔競】2017魔競聖誕派對" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201712/1514181521698129792.jpg" alt="【M.E.魔競】2017魔競聖誕派對" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/PyEzclmgaUs" title="2017 Rift Rivals 亞洲對抗賽Top3 Day4" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502094806845337366.jpg" alt="2017 Rift Rivals 亞洲對抗賽Top3 Day4" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/HZ-LsFUpRjE" title="【XO醬拌LOL】最後一集！請客吃pizza好不好吃很重要！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201711/1509941533552856943.jpg" alt="【XO醬拌LOL】最後一集！請客吃pizza好不好吃很重要！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/KKvh_mkWMh4" title="【XO醬拌LoL】2017世界賽#5" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201711/1509941392032515914.jpg" alt="【XO醬拌LoL】2017世界賽#5" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/ltYAhm2pv_Y" title="【XO醬拌LOL】雙胖再嘴！如果世界大賽的賽制像洛克人一樣，那LMS的選手會...?" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1509342912638246111.jpg" alt="【XO醬拌LOL】雙胖再嘴！如果世界大賽的賽制像洛克人一樣，那LMS的選手會...?" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/QWeaeVauASo" title="【XO醬拌LoL】2017世界賽#4" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1509342867212903491.jpg" alt="【XO醬拌LoL】2017世界賽#4" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/RJDprZ4ndJg" title="【XO醬拌LOL】球z喜歡選手的標準竟然有特殊癖好？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1508726348628812825.jpg" alt="【XO醬拌LOL】球z喜歡選手的標準竟然有特殊癖好？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/N_dlsWmqubE" title="【XO醬拌LoL】2017世界賽#3" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1508726323032431804.jpg" alt="【XO醬拌LoL】2017世界賽#3" class="img-responsive"></a>
                        </li>                        
                    </ul>
                    <div class="video-control">
                        <a href="#" title="往前一則" class="video-prev" data-tooltip="hide"></a>
                        <a href="#" title="往後一則" class="video-next" data-tooltip="hide"></a>
                    </div>
                </div>
            </article>
            <!-- ment_contact --> 
            <script src="{{asset("/assets/plugin_split/ment/contact/ment_contact/ment_contact.js")}}" type="text/javascript"></script>
            <link href="{{asset("/assets/plugin_split/ment/contact/ment_contact/ment_contact.css")}}" rel="stylesheet" data-lazyload="true">  
            <div class="ment_contact"> <img src="/assets/plugin_split/ment/contact/ment_contact/image/icontact_bg.jpg" alt="*"> <a href="http://www.ment.com.tw/zh-tw/contact_us.php" title="聯絡我們" data-tooltip="top">CONTACT</a></div>
            <!-- ---------------------- -->             
        </div>
        <!-- ment_footer --> 
        {{--  lazy   --}}
        {{--  http://jquery.eisbehr.de/lazy/  --}}
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
        <script src="{{asset("/assets/plugin_split/ment/footer/ment_footer/ment_footer.js")}}" type="text/javascript"></script>
        <link href="{{asset("/assets/plugin_split/ment/footer/ment_footer/ment_footer.css")}}" rel="stylesheet" data-lazyload="true">  
        <footer class="footer">
            <div class="links">
                <div class="container">
                    <a href="zh-tw" title="魔競娛樂" data-tooltip="top" class="logo"><img data-src="/assets/plugin_split/ment/footer/ment_footer/image/header_logo.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競娛樂" class="lazy img-responsive"></a>
                    <ul class="reset">
                        <li><a href="http://www.ment.com.tw/zh-tw/about_us.php" title="關於魔競" data-tooltip="hide">關於魔競</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/service.php" title="魔競服務" data-tooltip="hide">魔競服務</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/artists.php" title="魔競藝人" data-tooltip="hide">魔競藝人</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/bulletin.php?cid=1" title="魔競新鮮事" data-tooltip="hide">魔競新鮮事</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/media.php?cid=1" title="魔競影音" data-tooltip="hide">魔競影音</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/contact_us.php" title="聯絡魔競" data-tooltip="hide">聯絡魔競</a></li>
                        <li><a href="http://www.ment.com.tw/zh-tw/sitemap.php" title="網站地圖" data-tooltip="hide">網站地圖</a></li>
                    </ul>
                </div>
            </div>
            <div class="copy container"> <span>Copyright ©魔競娛樂股份有限公司</span> <span>All Rights Reserved. &nbsp;</span> <a href="https://www.grnet.com.tw/" target="_blank" title="網頁設計 | 鉅潞科技" data-tooltip="top">網頁設計</a> | 鉅潞科技</div>
        </footer> 
        <!-- ---------------------- --> 
        <!-- ment_top --> 
        <script src="{{asset("/assets/plugin_split/ment/top/ment_top/ment_top.js")}}" type="text/javascript"></script>
        <link href="{{asset("/assets/plugin_split/ment/top/ment_top/ment_top.css")}}" rel="stylesheet" data-lazyload="true"> 
        <a href="#" title="返回頁首" data-tooltip="hide" class="go-top"> <i></i> <span>TOP</span> </a>
        <!-- ---------------------- --> 
        
    </body>
    <script>
        $(function(){
            // 最後一次載入
            // lazyload();      
            {{-- alert("模組化證明，請看原始碼 - Chrome - 選項 | 更多工具 | 開發人員工具 | Elements");                 --}}
        });
        
    </script>
    
</html>