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

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="直播,實況,整合行銷,廣告代理,英雄聯盟,LOL,MiSTakE,影音,後製,節目,數位,電競,網紅,實況主播,livestream,mentertainment,M.Entertainment,魔競娛樂,魔競,網紅行銷,網紅直播,經紀公司,網紅經紀,TPA,摸使,記得老師,記得先生,lilballz,球z,winds,大丸,盆年,懶貓,lancat,baby66,66,小熊yuniko,小熊,yuniko,k7,凱琪,godjj,接接,J起來,煙煙,煙煙hedy,cosplay,蝴蝶,妮妮,咪妃娘娘,咪妃,小咪,julia_lion,貝莉莓,小莓子,beryl_lulu,蛋捲,eggroll,瑀熙yuci,瑀熙,yuci,叉燒,又繞,魔境,摩鏡">
        <meta name="description" content="「魔競娛樂」提供實況經紀服務與製作多元化數位影音內容，並提供全面性的媒體規畫與專業實況行銷服務，目標串聯電子競技與娛樂兩大勢力，以成為電競與其他產業間重要的溝通橋樑為最高宗旨。">
        <meta property="og:title" content="魔競娛樂">
        <meta property="og:url" content="http://www.ment.com.tw">
        <meta property="og:image" content="http://www.ment.com.tw/fbfullv2.png">
        <meta property="og:description" content="致力於專業化實況經紀服務，同時也製作多元化數位影音內容，整合旗下實況藝人資源並提供全面性媒體規劃與採購推廣的行銷服務。">
        <title>魔競娛樂 | 最專業的網紅直播與整合行銷服務</title>
        {{--  <base href="http://www.ment.com.tw/">  --}}
        <link href="http://www.ment.com.tw/favicon.ico" rel="icon">
        <link href="http://www.ment.com.tw/favicon.ico" rel="shortcut icon">
        <link href="http://www.ment.com.tw/apple-touch-icon.png" rel="apple-touch-icon">
        {{--  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>  --}}
  
        {{--  //--------------------------------------------------------------  --}}
        {{--  魔競用模組  --}}
        {{--  //--------------------------------------------------------------  --}}
        {{--  lazy   --}}
        {{--  http://jquery.eisbehr.de/lazy/  --}}
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
        {{--  tubeplayer  --}}
        {{--  https://github.com/nirvanatikku/jQuery-TubePlayer-Plugin  --}}
        {{--  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-tubeplayer/2.1.0/jquery.tubeplayer.min.js"></script>
        {{--  slick  --}}
        {{--  http://kenwheeler.github.io/slick/  --}}
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        {{--  css slider  --}}
        <script src="{{asset("assets/web/front/practice/ment/jquery.cssslider.min.js")}}" type="text/javascript"></script>
        {{--  youtube  --}}
        <script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflY6gPjD/www-widgetapi.js" async=""></script>
        <script src="http://www.youtube.com/iframe_api"></script>
        {{--  touch punch  --}}
        {{--  http://touchpunch.furf.com/  --}}
        <script src="{{asset("assets/plugin/ui.touch-punch/jquery.ui.touch-punch.min.js")}}"></script>
        {{--  站內  --}}
        <link href="{{asset("assets/web/front/practice/ment/site.core.css?t=1499676106")}}" rel="stylesheet">
        <link href="{{asset("assets/web/front/practice/ment/plugin-animatedslider.css")}}" rel="stylesheet" data-lazyload="true">
        {{--  已將裡面轉出至index.js  --}}
        {{--  <script src="{{asset("assets/web/front/practice/ment/site.core.js?t=1479795517")}}"></script>  --}}
        {{--  //--------------------------------------------------------------  --}}
        

        <link rel="stylesheet" href="{{asset("assets/web/front/practice/ment/index_arrange.css")}}">
        <script src="{{asset("assets/web/front/practice/ment/index_arrange.js")}}"></script>
        

        <script>
            $(function(){    
                    
            });
            
        </script>
        <style>
           
            
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        
        
        
    </head>
    <body>           
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
        <div id="index" class="g-wrap">
            <div class="banner" data-loading="arc-scale">
                <div id="ban-video-player" data-video-id="YtB7Y7lBNhk" class="ban-video"></div>
            </div>
            <article class="about">
                <div>
                    <div class="container">
                        <div class="head">
                            <button type="button" class="anchor-to" data-target="about"></button>
                            <div class="ti-en ti-font">About Us</div>
                            <h2 class="ti-ch">關於魔競</h2></div>
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
            <article class="service">
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
                                <div class="ico"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ico1.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">產品推廣</h3>
                                    <p class="info">透過實況藝人及影音製作
                                        <br>提供最具吸引力的行銷服務</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ico2.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">自製影音</h3>
                                    <p class="info">優質影音節目製作置入、
                                        <br>冠名贊助</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ico3.png" alt="*" width="90" height="90"></div>
                                <div class="txt">
                                    <h3 class="title ti-font">電子競技/ACG</h3>
                                    <p class="info">主播、賽評、Cosplayer深度遊戲內容打造服務</p>
                                </div>
                            </section>
                            <section class="box clearfix">
                                <div class="ico"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ico4.png" alt="*" width="90" height="90"></div>
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
                <div class="item-1"><img data-src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ite1_1.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="*" class="lazy-ite-1 img-responsive"></div>
                <div class="item-2"><img data-src="http://www.ment.com.tw/themes/zh-tw/assets/images/index_serv_ite2_1.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="*" class="lazy-ite-2 img-responsive"></div>
            </article>
            <article class="news">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="news"></button>
                        <div class="ti-en ti-font">News</div>
                        <h2 class="ti-ch">魔競新鮮事</h2></div>
                    <div class="news-slick-wrap">
                        <div class="news-slick">
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=103" title="【M.E.網紅養成計劃】" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201808/1533111150534985299.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【M.E.網紅養成計劃】" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201804/1523417692139898315.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="📢大事報告📢【魔競大企劃】" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201710/1508298670922048542.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="M.E. x WirForce 2017聯名款限定帽T外套" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201709/1506654235801832099.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競2017中秋節特別企劃《我才是嫦娥》" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201709/1505356666694402545.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="最近辦活動，都遇到颱風..(╥﹏╥)" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201709/1504668109635248513.gif" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="第一屆M.E.盃「我才是嫦娥」海選活動開始" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201708/1503893758857103480.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="💗M.E.實況主陪你過七夕💗" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201708/1503472401198339585.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【XO醬拌LOL】" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201708/1503377710276566613.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="《魔競出任務 PK義大最強VR》活動 延期" class="slick-loading img-responsive">
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
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201708/1502773386632890099.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競出任務，今天看電影去" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">15</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">魔競出任務，今天看電影去</h3>
                                        <p class="content">人氣實況主現身《紅衣小女孩2》首映會， 大家表示：怕.jpg
                                        </p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=93" title="8/22「魔競出任務 PK義大最強VR」限定活動登場！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201708/1502678425613017625.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="8/22「魔競出任務 PK義大最強VR」限定活動登場！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>AUG</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">8/22「魔競出任務 PK義大最強VR」限定活動登場！</h3>
                                        <p class="content">由魔競腦板 MiSTakE領軍 小熊 Yuniko、 叉燒、 Lilballz、 妮妮 Niniko、 Baby66，等你來挑戰</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=90" title="絕美寫真書開賣囉💖煙煙篇" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201704/1492160861277906077.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="絕美寫真書開賣囉💖煙煙篇" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>APR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">絕美寫真書開賣囉💖煙煙篇</h3>
                                        <p class="content">【HedyX❀Rabbit &amp; Catฅ】你是貓派還兔派？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=88" title="絕美寫真書開賣囉💖小咪篇" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201704/1492157886024659647.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="絕美寫真書開賣囉💖小咪篇" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>APR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">絕美寫真書開賣囉💖小咪篇</h3>
                                        <p class="content">小咪新寫真書【 HONEY♥ 】理想情人來囉！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=89" title="絕美寫真書開賣囉💖小莓篇" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201704/1492158867818444164.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="絕美寫真書開賣囉💖小莓篇" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">13</strong>
                                            <br>APR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">絕美寫真書開賣囉💖小莓篇</h3>
                                        <p class="content">千萬別錯過【大魔導士 ‧ 貝莉】寫真書！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=87" title="瑀熙的第一篇美妝文出爐啦！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201704/1491383732358271822.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="瑀熙的第一篇美妝文出爐啦！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">31</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">瑀熙的第一篇美妝文出爐啦！</h3>
                                        <p class="content">想偷懶也想省錢？開架式美妝十分鐘完成秘笈！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=86" title="妮妮從香港回來囉！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201704/1491382344173641444.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="妮妮從香港回來囉！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">31</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">妮妮從香港回來囉！</h3>
                                        <p class="content">妮妮大王關心您💓</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=85" title="究竟Baby66的血統是....?" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1490252090925948132.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="究竟Baby66的血統是....?" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">20</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">究竟Baby66的血統是....?</h3>
                                        <p class="content">是歐洲人還是非洲人呢？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=84" title="妮妮與66前往爐石台日交流賽♥" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1490251586260112034.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="妮妮與66前往爐石台日交流賽♥" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">18</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">妮妮與66前往爐石台日交流賽♥</h3>
                                        <p class="content">爐石好手齊聚一堂！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=82" title="K7的白色情人節獻禮♥" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489568291395685826.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="K7的白色情人節獻禮♥" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">K7的白色情人節獻禮♥</h3>
                                        <p class="content">情人節就是送大家禮物的日子啊♥</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=80" title="情人節不孤單，瑀熙陪你過♥" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489567073669898189.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="情人節不孤單，瑀熙陪你過♥" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">情人節不孤單，瑀熙陪你過♥</h3>
                                        <p class="content">白色小護士來襲，單身請掛號。</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=78" title="蝴蝶兒久違的抽獎文出爐～" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489565249619982088.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="蝴蝶兒久違的抽獎文出爐～" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">蝴蝶兒久違的抽獎文出爐～</h3>
                                        <p class="content">是抽影馳GTX 1050ti唷！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=77" title="Baby66的巧克力白色情人節" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489553355770611458.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Baby66的巧克力白色情人節" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">Baby66的巧克力白色情人節</h3>
                                        <p class="content">究竟是做巧克力還是吃巧克力呢?</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=83" title="大家注意！！大丸有話要說" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489570105662675851.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="大家注意！！大丸有話要說" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">13</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">大家注意！！大丸有話要說</h3>
                                        <p class="content">到底有什麼話要說呢？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=75" title="期待已久的抽獎大會來囉！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489550587309060890.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="期待已久的抽獎大會來囉！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">13</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">期待已久的抽獎大會來囉！</h3>
                                        <p class="content">聊天室抽起來！ 啊不～是J起來！
                                        </p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=79" title="妮妮有個小任務想請大家幫忙呦" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489565604104717514.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="妮妮有個小任務想請大家幫忙呦" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">11</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">妮妮有個小任務想請大家幫忙呦</h3>
                                        <p class="content">是什麼樣的任務呢？還有獎勵呢&gt;_&lt;</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=76" title="讓大哥教你什麼是真正的C8763！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489551706831562745.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="讓大哥教你什麼是真正的C8763！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">08</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">讓大哥教你什麼是真正的C8763！</h3>
                                        <p class="content">不知道大哥是誰？快來看看這個啊！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=72" title="瑀熙禮物放送不手軟 這次送什麼呢" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488967456319559750.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="瑀熙禮物放送不手軟 這次送什麼呢" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">07</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">瑀熙禮物放送不手軟 這次送什麼呢</h3>
                                        <p class="content">動動你的手指頭支持瑀熙吧</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=74" title="蝴蝶兒表示：「18歲的我^_^」" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1489033612347875585.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="蝴蝶兒表示：「18歲的我^_^」" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">05</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">蝴蝶兒表示：「18歲的我^_^」</h3>
                                        <p class="content">竟然被粉絲這樣吐槽？！...</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=68" title="GodJJ Intel活動50殺只要13分鐘!!!" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488952087159012029.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="GodJJ Intel活動50殺只要13分鐘!!!" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">05</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">GodJJ Intel活動50殺只要13分鐘!!!</h3>
                                        <p class="content">有人挑戰GODJJ大魔王成功嗎？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=67" title="Baby66 首次乾爹聚會玩桌遊" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488951706131034520.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Baby66 首次乾爹聚會玩桌遊" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">04</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">Baby66 首次乾爹聚會玩桌遊</h3>
                                        <p class="content">第一次跟乾爹們聚餐見面一起玩桌遊🎲🎲</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=71" title="妮妮調整作息中 請大家一起幫忙叮嚀" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488955900593077150.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="妮妮調整作息中 請大家一起幫忙叮嚀" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">03</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">妮妮調整作息中 請大家一起幫忙叮嚀</h3>
                                        <p class="content">勿當作息破壞王！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=69" title="【咪妃娘娘x上班不要看】從影最大尺度演出" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488953228444058288.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【咪妃娘娘x上班不要看】從影最大尺度演出" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">03</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【咪妃娘娘x上班不要看】從影最大尺度演出</h3>
                                        <p class="content">竟然無碼解禁惹！？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=66" title="懶貓登【鳳梨不累 Online Play】挑戰八分音符" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488950246617667953.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="懶貓登【鳳梨不累 Online Play】挑戰八分音符" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">03</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">懶貓登【鳳梨不累 Online Play】挑戰八分音符</h3>
                                        <p class="content">超宅帥哥(?)實況主 破嗓挑戰八分音符醬</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=70" title="動漫宅之《貝莉莓不專業推薦》系列影片開跑" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488955708274943346.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="動漫宅之《貝莉莓不專業推薦》系列影片開跑" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">02</strong>
                                            <br>MAR</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">動漫宅之《貝莉莓不專業推薦》系列影片開跑</h3>
                                        <p class="content">專業宅貝莉莓是也！一起來追番吧</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=73" title="Baby66、妮妮跑來偷吃披薩！兩人互相在臉上亂畫" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201703/1488970227501243668.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Baby66、妮妮跑來偷吃披薩！兩人互相在臉上亂畫" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">27</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">Baby66、妮妮跑來偷吃披薩！兩人互相在臉上亂畫</h3>
                                        <p class="content">咦！？在門口撿到一個奇怪的人，跑進來偷吃披薩🍕🍕</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=65" title="Lilballz跟叉燒【XO醬拌LoL】認真準備中" data-tooltip="hide">
                                    <div class="pic"> <img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_664x416.jpg" alt="Lilballz跟叉燒【XO醬拌LoL】認真準備中" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">21</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">Lilballz跟叉燒【XO醬拌LoL】認真準備中</h3>
                                        <p class="content">節目真的認真不唬，拜託不要關節目</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=63" title="路途遙遠波蘭行  Winds出征IEM" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487756551598300244.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="路途遙遠波蘭行  Winds出征IEM" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">21</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">路途遙遠波蘭行  Winds出征IEM</h3>
                                        <p class="content">轉吧轉吧轉了快30小時</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=57" title="這周妮妮又會重回實況台囉" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487752022226865916.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="這周妮妮又會重回實況台囉" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">21</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">這周妮妮又會重回實況台囉</h3>
                                        <p class="content">有沒有發現妮妮消失了一陣子呢？妮妮去了哪呢~</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=61" title="一萬三千人看小熊玩  白衣性  愛情  依純症" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487753706455025909.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="一萬三千人看小熊玩  白衣性  愛情  依純症" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">19</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">一萬三千人看小熊玩  白衣性  愛情  依純症</h3>
                                        <p class="content">不要歪樓!!!</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=58" title="新學期開學  蝴蝶課表出來囉" data-tooltip="hide">
                                    <div class="pic"> <img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_664x416.jpg" alt="新學期開學  蝴蝶課表出來囉" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">19</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">新學期開學  蝴蝶課表出來囉</h3>
                                        <p class="content">一起督促蝴蝶不要翹課(x</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=56" title="GodJJ首次乾爹燭光晚餐  喔!!!是乾爹聚會" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487742741554003039.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="GodJJ首次乾爹燭光晚餐  喔!!!是乾爹聚會" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">18</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">GodJJ首次乾爹燭光晚餐  喔!!!是乾爹聚會</h3>
                                        <p class="content">接接獻出了人生第一次燭光晚餐，聽說還加碼續攤!?</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=60" title="蛋捲踢館【鳳梨不累】 婕翎 Joeman接招吧" data-tooltip="hide">
                                    <div class="pic"> <img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_664x416.jpg" alt="蛋捲踢館【鳳梨不累】 婕翎 Joeman接招吧" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">17</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">蛋捲踢館【鳳梨不累】 婕翎 Joeman接招吧</h3>
                                        <p class="content">蛋捲：絕對不是音癡，是不是誤會什麼了</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=59" title="瑀熙回國囉  揪竟帶了什麼回來呢" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487752668548991513.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="瑀熙回國囉  揪竟帶了什麼回來呢" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">17</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">瑀熙回國囉  揪竟帶了什麼回來呢</h3>
                                        <p class="content">粉絲：我要禮物</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=62" title="Winds：開台比老闆時數低的員工，沒有存在的價值。" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487754155814791849.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Winds：開台比老闆時數低的員工，沒有存在的價值。" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">16</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">Winds：開台比老闆時數低的員工，沒有存在的價值。</h3>
                                        <p class="content">人事異動</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=55" title="全新節目【XO醬拌LoL】雙嘴天王協力開嘴！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487148673122839486.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="全新節目【XO醬拌LoL】雙嘴天王協力開嘴！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">15</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">全新節目【XO醬拌LoL】雙嘴天王協力開嘴！</h3>
                                        <p class="content">新的賽季又開始了，「雙嘴天王」Lilballz x 叉燒精闢分析meta給你聽</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=64" title="【Baby66x上班不要看】之情人節特別企劃" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1487756937758633759.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【Baby66x上班不要看】之情人節特別企劃" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">14</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【Baby66x上班不要看】之情人節特別企劃</h3>
                                        <p class="content">有看過人肉刷卡機!?</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=54" title="【 2017年情(ㄩㄢˊ)人(ㄒㄧㄠ)節】直播特別企劃！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486801509742703211.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【 2017年情(ㄩㄢˊ)人(ㄒㄧㄠ)節】直播特別企劃！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">11</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【 2017年情(ㄩㄢˊ)人(ㄒㄧㄠ)節】直播特別企劃！</h3>
                                        <p class="content">天冷沒地方去!? 我們陪你吃湯圓 ❤️</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=53" title="2017魔競賀歲大串燒" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486801247509751782.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="2017魔競賀歲大串燒" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">04</strong>
                                            <br>FEB</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">2017魔競賀歲大串燒</h3>
                                        <p class="content">魔競藝人來給大家拜年啦!!!除夕到初五一次滿足</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=49" title="【今天你想要看哪一頁】桌曆正式開賣" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486024904218606444.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【今天你想要看哪一頁】桌曆正式開賣" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">25</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【今天你想要看哪一頁】桌曆正式開賣</h3>
                                        <p class="content">萬眾矚目 千呼萬喚 之 🎉2017年M.E.桌曆 正式開賣🎉</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=48" title="除舊布新  歡喜迎雞年" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486024684853720971.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="除舊布新  歡喜迎雞年" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">25</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">除舊布新  歡喜迎雞年</h3>
                                        <p class="content">眼睛火亮的粉絲們，有發現魔競的社群平台發生了什麼事呢？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=47" title="2017 TGS台北國際電玩展 魔競藝人跑攤囉" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486027592683229716.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="2017 TGS台北國際電玩展 魔競藝人跑攤囉" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">24</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">2017 TGS台北國際電玩展 魔競藝人跑攤囉</h3>
                                        <p class="content">2017年國際電玩展魔競藝人全體總動員，各位粉絲有沒有在場內Gank到魔競小朋友們呢？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=46" title="老闆發紅包 魔競2016年度尾牙" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486024340836464446.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="老闆發紅包 魔競2016年度尾牙" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">12</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">老闆發紅包 魔競2016年度尾牙</h3>
                                        <p class="content">今天晚上是魔競第一次尾牙，不免俗摸腦闆要發紅包囉～</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=45" title="聽說實況圈充斥著肥宅  《肥宅用健身拯救世界》系列影片正式推出" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486024225842583733.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="聽說實況圈充斥著肥宅  《肥宅用健身拯救世界》系列影片正式推出" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">10</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">聽說實況圈充斥著肥宅  《肥宅用健身拯救世界》系列影片正式推出</h3>
                                        <p class="content">聽說實況圈充斥著肥宅，有人決定挺身而出，那就是......</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=44" title="魔競歌唱班出征TVBS《宅男的世界》  有蛋捲?!" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486023870365033744.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競歌唱班出征TVBS《宅男的世界》  有蛋捲?!" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">09</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">魔競歌唱班出征TVBS《宅男的世界》  有蛋捲?!</h3>
                                        <p class="content">實況主K歌大賽在即，直播搶先一睹閃亮歌聲，完整版過年播出喔🎤</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=43" title="【陰陽師 X 魔競娛樂】歐非大賽 特別企劃！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486023673946305502.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【陰陽師 X 魔競娛樂】歐非大賽 特別企劃！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">07</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【陰陽師 X 魔競娛樂】歐非大賽 特別企劃！</h3>
                                        <p class="content">鑑定血緣的時刻即將來臨 你是哪裡人？</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=42" title="2017魔競家族首發新成員–叉燒" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486023291161773335.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="2017魔競家族首發新成員–叉燒" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">05</strong>
                                            <br>JAN</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">2017魔競家族首發新成員–叉燒</h3>
                                        <p class="content">將將將將~ 就是「叉燒」老師，有誰不認識的嗎？！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=41" title="2016再見  2017你好  新年快樂！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486023049606357074.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="2016再見  2017你好  新年快樂！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">31</strong>
                                            <br>DEC</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">2016再見  2017你好  新年快樂！</h3>
                                        <p class="content">年終回顧，感謝大家陪伴魔競一起成長 &lt;3 (內有影片)</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=40" title="✨🎄2016年魔競聖誕派對活動🎄✨" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486022832403725063.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="✨🎄2016年魔競聖誕派對活動🎄✨" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">21</strong>
                                            <br>DEC</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">✨🎄2016年魔競聖誕派對活動🎄✨</h3>
                                        <p class="content">金勾杯~金勾杯~金勾歐惹威~ 鎖定節目就有機會抽中實況主的禮物喔</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=39" title="2017年魔競娛樂桌曆拍攝花絮出爐" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486022473536558841.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="2017年魔競娛樂桌曆拍攝花絮出爐" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">12</strong>
                                            <br>DEC</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">2017年魔競娛樂桌曆拍攝花絮出爐</h3>
                                        <p class="content">磨刀霍霍準備了很久🍴🍴🍴果然是「佛要金裝，人要衣裝」ヽ(✿ﾟ▽ﾟ)ノ</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=38" title="胖董上電視 【公視 有話好說】" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486022224737351437.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="胖董上電視 【公視 有話好說】" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">08</strong>
                                            <br>DEC</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">胖董上電視 【公視 有話好說】</h3>
                                        <p class="content">今天邀請到了許多知名人物 ，一起來關心日漸崛起的電競產業對大環境所產生的變化，看看大家怎麼說</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=37" title="「暴雪嘉年華」凱琪森77之旅  回來啦！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486020220746528124.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="「暴雪嘉年華」凱琪森77之旅  回來啦！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">08</strong>
                                            <br>DEC</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">「暴雪嘉年華」凱琪森77之旅  回來啦！</h3>
                                        <p class="content">好吃 好玩 好多周邊 好多Cosplay 都在BlizzCon!!!果然是名不虛傳的暴雪嘉年華~ 凱琪 K7 森77的EQ大挑戰有沒有成功哩?!</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=36" title="【魔競體育課】2016年度甩肉計畫 精華出爐" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486020023409460429.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【魔競體育課】2016年度甩肉計畫 精華出爐" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">25</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【魔競體育課】2016年度甩肉計畫 精華出爐</h3>
                                        <p class="content">魔競年度不想面對體育課清華來囉！讓我們一起來看看實況主們如何剷肉</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=35" title="掌聲歡迎M.E新成員《國民妹妹》妮妮 Niniko" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486026435785257466.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="掌聲歡迎M.E新成員《國民妹妹》妮妮 Niniko" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">05</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">掌聲歡迎M.E新成員《國民妹妹》妮妮 Niniko</h3>
                                        <p class="content">魔競又有一位新妹加入！歡迎可愛的國民妹妹「妮妮 Niniko」♥</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=34" title="【瑀熙盃英雄聯盟中挑賽】開賽囉" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486713238422424819.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="【瑀熙盃英雄聯盟中挑賽】開賽囉" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">05</strong>
                                            <br>NOV</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">【瑀熙盃英雄聯盟中挑賽】開賽囉</h3>
                                        <p class="content">第一屆瑀熙盃中路挑戰賽來囉！想和God JJ、Winds和懶貓三位魔競守門員PK嗎？就趁現在</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=33" title="前進「暴雪嘉年華」 - 凱琪森77之旅" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486026517111740174.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="前進「暴雪嘉年華」 - 凱琪森77之旅" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">28</strong>
                                            <br>OCT</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">前進「暴雪嘉年華」 - 凱琪森77之旅</h3>
                                        <p class="content">一年一度Blizzcon要來囉！我們家凱琪K7要出發去啦！</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="http://www.ment.com.tw/zh-tw/bulletin_info.php?id=32" title="快追蹤!!!M.E.魔競官方Instagram首發！" data-tooltip="hide">
                                    <div class="pic"> <img data-lazy="http://www.ment.com.tw/data/images/201702/1486713399719757506.jpg" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="快追蹤!!!M.E.魔競官方Instagram首發！" class="slick-loading img-responsive">
                                        <div class="date"><strong class="subti-font">28</strong>
                                            <br>OCT</div>
                                    </div>
                                    <div class="txt">
                                        <h3 class="title">快追蹤!!!M.E.魔競官方Instagram首發！</h3>
                                        <p class="content">魔競也有Instagram啦！更多藝人私密照都在...</p> <span class="more subti-font">READ MORE</span></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="artist">
                <div class="container">
                    <div class="head">
                        <button type="button" class="anchor-to" data-target="artist"></button>
                        <div class="ti-en ti-font">Artist</div>
                        <h2 class="ti-ch">魔競藝人</h2></div>
                    <div class="artist-slick">
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=5" data-title="MiSTakE" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531462034311883567.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="MiSTakE" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">MiSTakE</h3>
                                    <p class="info">台灣英雄聯盟職業隊元老級選手，擔任TPA及TPS隊長，於2012年代表台灣帶領TPA贏得英雄聯盟世界冠軍。退役後轉攻實況經營與聯賽賽評解說，擅長與粉絲互動外也參與各項遊戲的推廣與活動，專業的賽評解說也深受玩家喜愛。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=17" data-title="記得 / Remember" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531464237402273885.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="記得 / Remember" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">記得 / Remember</h3>
                                    <p class="info">台大財經出身的記得，從金融業轉換跑道進入電競產業，擔任戰隊分析師到聯賽主播的他，了解到對電競熱愛在燃燒自己外，也希望因此照亮別人，因此創立了魔競，希望藉由對電競領域的專業，協助更多後輩加入其中。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=8" data-title="Lilballz" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531462012821598462.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Lilballz" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">Lilballz</h3>
                                    <p class="info">英雄聯盟台灣元老級職業選手，曾於2012年代表台灣贏得英雄聯盟世界冠軍。退役後轉任職TPS及MSE教練，並擔任LMS聯賽賽評。犀利又直接的賽評風格獨樹一幟，深受不少粉絲喜愛。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=18" data-title="Winds / 大丸" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461909566174392.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="Winds / 大丸" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">Winds / 大丸</h3>
                                    <p class="info">時下最熱門的實況主之一，綽號大丸、盆年，說話時大舌頭是他最大的特色。曾任職英雄聯盟電競戰隊TPA隊長及顧問，代表台港澳出席世界賽事；並於LMS聯賽擔任賽評解說。實況富含搞笑、技術、綜藝於一身，身受大小朋友的喜愛。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=2" data-title="小熊 / Yuniko" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531462110754832305.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="小熊 / Yuniko" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">小熊 / Yuniko</h3>
                                    <p class="info">具備豐富的主持經驗，因為外型甜美而接過許多外拍及廣告。修長的美腿是小熊最大的特色，氣質的外型與活潑的性格，成功吸引了不少粉絲！實況遊戲種類不限，情感豐富的小熊不時會入戲太深，深受觀眾喜愛。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=14" data-title="GodJJ" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461804985083767.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="GodJJ" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">GodJJ</h3>
                                    <p class="info">台灣英雄聯盟知名玩家，曾任職TPA、TPS及HKE戰隊的前職業選手。擁有與外表不符的大叔嗓音以及得天獨厚的幽默感，使得他即使不開視訊也能擄獲眾人的心！號稱最有原則的實況主：絕不S(頭)L(痛)、絕不偷看攻略、絕不開金手指。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=4" data-title="懶貓 / LanCat" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531462060508191287.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="懶貓 / LanCat" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">懶貓 / LanCat</h3>
                                    <p class="info">皮膚白皙，中德混血兒，專職Twitch實況主，同時兼任各類遊戲的主持人、主播與賽評。曾任職英雄聯盟聯賽賽評與主播，長期擔任麥卡貝戰略週報主持人。 各類遊戲均有涉獵，理解速度快且掌握度高，勇於接受挑戰，且與粉絲互動率高，樂意協助解答遊戲中遇到的疑難雜症並分享遊戲心得。
                                    </p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=3" data-title="蛋捲 / EggRoll" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531462088497070782.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="蛋捲 / EggRoll" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">蛋捲 / EggRoll</h3>
                                    <p class="info">外型甜美、個性活潑極具親和力，與粉絲互動良好。COS過多名英雄聯盟角色，具主持與播報經驗，曾任HERO戰略週報特派記者與麥可貝主持人。有著驚艷全世界的歌聲，最喜歡在實況中開小型演唱會。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=11" data-title="叉燒 / Fluidwind" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461988975572516.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="叉燒 / Fluidwind" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">叉燒 / Fluidwind</h3>
                                    <p class="info">前閃電狼教練，並擔任過TESL和Garena的LOL賽評、TPA的戰術分析師，形象專業，也常出席各大賽事擔任主播，在專業的解說以及詼諧幽默的播報中取得平衡。現為專職實況主，開台風格幽默風趣。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=23" data-title="狂暴小建 / Jian" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531464771395091697.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="狂暴小建 / Jian" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">狂暴小建 / Jian</h3>
                                    <p class="info">目前為專職實況主，兩款熱門遊戲英雄聯盟以及絕地求生的高端玩家。以幽默風趣的談吐、高EQ吸引了大批的觀眾，每次實況都能展現出高度的表演能力，培養了許多死忠粉絲。目前的Twitch訂閱數為全台灣實況主最高(約五千)，號召力以及影響力不容小覷。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=24" data-title="齊力斷金 / 7Z" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531464863539699462.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="齊力斷金 / 7Z" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">齊力斷金 / 7Z</h3>
                                    <p class="info">為台灣高端爐石玩家，曾獲2015台港澳預選賽冠軍，擁有豐富的賽評經驗。談吐風格幽默風趣、口條清晰。擅長講求邏輯思考能力的遊戲，並可出席各賽事擔任主播。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=12" data-title="妮妮 / Niniko" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461963946507648.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="妮妮 / Niniko" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">妮妮 / Niniko</h3>
                                    <p class="info">原為實況素人的妮妮，有著甜美可愛的外表加上健談開朗的個性、幽默搞笑的實況風格使他與粉絲、觀眾都能有熱烈的互動，曾為知名遊戲特約實況主以及代言出席手機app現場活動。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=15" data-title="貝莉莓 / Beryl" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461938776021538.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="貝莉莓 / Beryl" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">貝莉莓 / Beryl</h3>
                                    <p class="info">網路知名Coser，除了展廠商演跟活動代言之外，也接過節目主持、來賓、遊戲節目固定來賓等等，曾為2015年Garena 流亡黯道鬼島女神活動代言，棚拍與外拍經驗豐富，造型多變，不管是出席活動現場或是平面拍攝表現都相當亮麗。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=21" data-title="阿樂 / Yunni0427" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531461884678332525.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="阿樂 / Yunni0427" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">阿樂 / Yunni0427</h3>
                                    <p class="info">參加Garena校園甜心，經過海選脫穎而出，目前擔任A.V.A 戰地之王賽後訪問主持人；會多項樂器，表演能力極強。長期出席卡提諾《搞什麼玩粉絲專欄》影片錄影；同時平面、廣告拍攝經驗豐富。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="http://www.ment.com.tw/zh-tw/artist_info.php?id=10" data-title="煙煙 / Hedy" data-tooltip="hover" data-invert="true"> <img data-lazy="http://www.ment.com.tw/data/images/201807/1531464268699877434.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="煙煙 / Hedy" class="slick-loading img-responsive">
                                <div class="data">
                                    <h3 class="name">煙煙 / Hedy</h3>
                                    <p class="info">網路知名Coser，有著姣好的身材與靈巧的手工，擅長製作動漫遊戲服裝道具，也是知名COS團體金色狂風的一員，於2016年踏入實況圈，將原追隨粉絲導入直播中，讓粉絲有一窺Coser日常生活的機會。</p>
                                    <div class="wave"> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="video">
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
                            <a href="https://youtu.be/VFXNwrg1Krs" title="【M.E. 魔競】M.E.大來賓 #1" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201712/1514181681458174094.jpg" alt="【M.E. 魔競】M.E.大來賓 #1" class="img-responsive"></a>
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
                        <li>
                            <a href="https://youtu.be/voNi4mgkTnw" title="【XO醬拌LOL】頂尖對決的場次中，如果換個ID戰隊與選手會怎麼打？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1508298467174476737.jpg" alt="【XO醬拌LOL】頂尖對決的場次中，如果換個ID戰隊與選手會怎麼打？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/qxRnkRLPjxg" title="【XO醬拌LoL】2017世界賽#2" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1508298445637989417.jpg" alt="【XO醬拌LoL】2017世界賽#2" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/_eGjSNb3TAA" title="【XO醬拌LOL】xo雙胖冥起來~起Q直闖八強？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1507691176986363667.jpg" alt="【XO醬拌LOL】xo雙胖冥起來~起Q直闖八強？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/TEgYrS3X0lM" title="【XO醬拌LoL】2017世界賽#1" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1507691135084323381.jpg" alt="【XO醬拌LoL】2017世界賽#1" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/wk80CxjXJHE" title="2017魔競中秋節特別企劃《我才是嫦娥》" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1507691104127113978.jpg" alt="2017魔競中秋節特別企劃《我才是嫦娥》" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/DdM4ZPNE-eo" title="201709 魔競出任務 PK義大最強VR" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201710/1507691058265623738.jpg" alt="201709 魔競出任務 PK義大最強VR" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/Ulyzn96uusM" title="《MEBS整點新聞》 八月號 by 魔競精華剪輯小組" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201709/1504667874650455982.jpg" alt="《MEBS整點新聞》 八月號 by 魔競精華剪輯小組" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/-iTw63l6Nmc" title="【XO醬拌LOL】英雄聯盟賽事躺好躺滿是致勝關鍵？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201709/1504667822648633408.jpg" alt="【XO醬拌LOL】英雄聯盟賽事躺好躺滿是致勝關鍵？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/sioa7Ljs5AQ" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#9 VOD完整版｜2017/08/30" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201709/1504667751835829685.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#9 VOD完整版｜2017/08/30" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/X3kYFiH8WdE" title="七夕情人節特別企劃 你最喜歡哪個我？" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503913569319377676.jpg" alt="七夕情人節特別企劃 你最喜歡哪個我？" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/EHbFEsdPQNw" title="【XO醬拌LOL】醬拌黑哲學，究竟是黑還是捧?如何定義黑哲學？" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503894365071844381.jpg" alt="【XO醬拌LOL】醬拌黑哲學，究竟是黑還是捧?如何定義黑哲學？" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/1oftYvhcV_o" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#8 VOD完整版｜2017/08/23" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503894188369635603.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#8 VOD完整版｜2017/08/23" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/gZpnE1fQ0Ag" title="【XO醬拌LOL】LMS五角雷達圖V2.0 最嘴解析不容錯過" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503386028506064584.jpg" alt="【XO醬拌LOL】LMS五角雷達圖V2.0 最嘴解析不容錯過" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/RLtnkAtkEBg" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#7 VOD完整版｜2017/08/16" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503385977862374126.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#7 VOD完整版｜2017/08/16" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/2lwRTVIPUKo" title="【XO醬拌LOL】醬拌LoL有嘻哈？！XO也有freestyle~" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503385926635759937.jpg" alt="【XO醬拌LOL】醬拌LoL有嘻哈？！XO也有freestyle~" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/uKaASXNC22k" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#6 VOD完整版｜2017/08/09" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1503385862338414539.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#6 VOD完整版｜2017/08/09" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/hdk28oLUob0" title="【 XO醬拌LOL】夏季賽精華#5｜ 飛斯?庫奇?充滿飛斯魂的男人！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【 XO醬拌LOL】夏季賽精華#5｜ 飛斯?庫奇?充滿飛斯魂的男人！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/ItCFuJJ2j6s" title="《MEBS整點新聞》 七月號 by 魔競精華剪輯小組" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="《MEBS整點新聞》 七月號 by 魔競精華剪輯小組" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/kPzv13MJY7g" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#5 VOD完整版｜2017/07/26" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#5 VOD完整版｜2017/07/26" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/9Shny0vaNcI" title="【 XO醬拌LOL】夏季賽精華#4｜ 屬於LMS的Meta，鎖鏈康妮！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【 XO醬拌LOL】夏季賽精華#4｜ 屬於LMS的Meta，鎖鏈康妮！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/Z-o_nI19rJM" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#4 VOD完整版｜2017/07/19" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#4 VOD完整版｜2017/07/19" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/PyEzclmgaUs" title="2017 Rift Rivals 亞洲對抗賽Top3 Day4" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502094806845337366.jpg" alt="2017 Rift Rivals 亞洲對抗賽Top3 Day4" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/jjsdujU9XIU" title="2017 Rift Rivals 亞洲對抗賽Top3 Day3" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502094767188498033.jpg" alt="2017 Rift Rivals 亞洲對抗賽Top3 Day3" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/qOZI3N5-nYY" title="2017 Rift Rivals 亞洲對抗賽 Top3 Day2" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502094730743392024.jpg" alt="2017 Rift Rivals 亞洲對抗賽 Top3 Day2" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/GNCQ5Zp9vrw" title="2017 Rift Rivals 亞洲對抗賽 Top3 Day1" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502094697973256471.jpg" alt="2017 Rift Rivals 亞洲對抗賽 Top3 Day1" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/J-RHiBRxgno" title="【 XO醬拌LOL】夏季賽精華#3｜ 高雄Ｊ師傅支援亞洲&quot;鐵胃&quot;對抗賽?!" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【 XO醬拌LOL】夏季賽精華#3｜ 高雄Ｊ師傅支援亞洲&quot;鐵胃&quot;對抗賽?!" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/YCaWKSpDCBw" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#3 VOD完整版｜2017/06/28" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#3 VOD完整版｜2017/06/28" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/Nc-y0HhP1QY" title="【XO醬拌LOL】夏季賽精華#2｜每五年只有一次，千古佳釀，萬代留香，原味勃汁西裝，要抽要快！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LOL】夏季賽精華#2｜每五年只有一次，千古佳釀，萬代留香，原味勃汁西裝，要抽要快！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/4mHgflZ8t2E" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#2 VOD完整版｜2017/06/21" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#2 VOD完整版｜2017/06/21" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/fBV5Nz-f7Ws" title="【 XO醬拌LOL】夏季賽精華#1｜雙嘴連冠軍造型SKIN都不放過，SKT翅膀 vs 肥宅怪獸(TPA)！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【 XO醬拌LOL】夏季賽精華#1｜雙嘴連冠軍造型SKIN都不放過，SKT翅膀 vs 肥宅怪獸(TPA)！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/kvlR50gPaGI" title="《MEBS整點新聞》 六月號 by 魔競精華剪輯小組" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="《MEBS整點新聞》 六月號 by 魔競精華剪輯小組" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/d8yyeVbWNpA" title="【XO醬拌LoL】精闢雙嘴天王夏季賽#1 VOD完整版｜2017/06/14" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502093398207424986.jpg" alt="【XO醬拌LoL】精闢雙嘴天王夏季賽#1 VOD完整版｜2017/06/14" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/Cvii2-c_jvQ" title="端午節特別節目－挑戰味蕾！粽異料理請你吃！！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502093295706470916.jpg" alt="端午節特別節目－挑戰味蕾！粽異料理請你吃！！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/zHm9Ycu6o9g" title="【 XO醬拌LOL】精華#14｜我以為我看的是英雄聯盟電子競技，原來其實是特級廚師考試呀！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502093130143092167.jpg" alt="【 XO醬拌LOL】精華#14｜我以為我看的是英雄聯盟電子競技，原來其實是特級廚師考試呀！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/D4x4nnEQJJY" title="【XO醬拌LoL】精闢雙嘴天王#14 VOD完整版｜2017/05/26" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502093070394208887.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#14 VOD完整版｜2017/05/26" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/IFys8QVJt0s" title="【 XO醬拌LOL】精華#13｜電狼小蛇在召喚峽谷河道急馳中消失了，需要緊急調閱行車紀錄器啦！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092992271747883.jpg" alt="【 XO醬拌LOL】精華#13｜電狼小蛇在召喚峽谷河道急馳中消失了，需要緊急調閱行車紀錄器啦！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/IDau4t47oeU" title="【XO醬拌LoL】精闢雙嘴天王#13 VOD完整版｜2017/05/18" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/themes/zh-tw/assets/images/default_570x370.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#13 VOD完整版｜2017/05/18" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/Bq3pILXNA_c" title="【 XO醬拌LOL】精華#12｜英雄聯盟的世界裡，只要你有100魔，人人可以像川普蓋大牆！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092823693798948.jpg" alt="【 XO醬拌LOL】精華#12｜英雄聯盟的世界裡，只要你有100魔，人人可以像川普蓋大牆！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/lf44kORO5nU" title="【XO醬拌LoL】精闢雙嘴天王#12 VOD完整版｜2017/05/03" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092760984613371.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#12 VOD完整版｜2017/05/03" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/vAgXJrS8TDI" title="【 XO醬拌LOL】精華#11｜內憂外患！節目除了怕被吉，XO拍檔還鬧不合！？" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092658832206440.jpg" alt="【 XO醬拌LOL】精華#11｜內憂外患！節目除了怕被吉，XO拍檔還鬧不合！？" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/leAdnP2Qzm8" title="【XO醬拌LoL】精闢雙嘴天王#11 VOD完整版｜2017/04/26" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092593046487173.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#11 VOD完整版｜2017/04/26" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/-plp4dg4xSs" title="【 XO醬拌LOL】精華#10｜西黑出沒？！LoL度量衡：一個西門=20CS！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092492074824251.jpg" alt="【 XO醬拌LOL】精華#10｜西黑出沒？！LoL度量衡：一個西門=20CS！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/2qd8tzaETmE" title="【XO醬拌LoL】精闢雙嘴天王#10 VOD完整版｜2017/04/19" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092429134567874.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#10 VOD完整版｜2017/04/19" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/zgEpcVnmC-o" title="【 XO醬拌LOL】精華#9｜LMS春季季後賽各隊伍特色雷達圖剖析，xx隊伍竟然爆表啦！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092325738056410.jpg" alt="【 XO醬拌LOL】精華#9｜LMS春季季後賽各隊伍特色雷達圖剖析，xx隊伍竟然爆表啦！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/5yTBKNeWOCQ" title="【XO醬拌LoL】精闢雙嘴天王#09 VOD完整版｜2017/04/12" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092338907106935.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#09 VOD完整版｜2017/04/12" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/voq-4z7iB9Y" title="【 XO醬拌LOL】精華#8｜預測LCK春季季後賽冥燈小劇場再起 如有雷同與本台立場無關" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092131665175989.jpg" alt="【 XO醬拌LOL】精華#8｜預測LCK春季季後賽冥燈小劇場再起 如有雷同與本台立場無關" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/aY7r_9Mhpyo" title="【XO醬拌LoL】精闢雙嘴天王#08 VOD完整版｜2017/04/05" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502092020239363732.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#08 VOD完整版｜2017/04/05" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/bv9GTBoSeEo" title="【 XO醬拌LOL】精華#7｜畢卡索風格的戰況分析球z也略懂略懂？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502091709235741694.jpg" alt="【 XO醬拌LOL】精華#7｜畢卡索風格的戰況分析球z也略懂略懂？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/48IIesUTw90" title="【XO醬拌LoL】精闢雙嘴天王#07 VOD完整版｜2017/03/29" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502091607835548259.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#07 VOD完整版｜2017/03/29" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/9LL7LXB2-8Q" title="【 XO醬拌LOL】精華#6｜原來會有海鮮隊友的出現是因為？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502091491095150030.jpg" alt="【 XO醬拌LOL】精華#6｜原來會有海鮮隊友的出現是因為？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/2rm0o_mbn94" title="【 XO醬拌LOL】 精華#05｜精闢的世界冠軍將狗套路竟然是拉機將狗？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502091224112496039.jpg" alt="【 XO醬拌LOL】 精華#05｜精闢的世界冠軍將狗套路竟然是拉機將狗？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/i-bN1og6aWs" title="【XO醬拌LoL】精闢雙嘴天王#05 VOD完整版｜2017/03/15" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502091082963612830.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#05 VOD完整版｜2017/03/15" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/0KRhyhnOYHI" title="【 XO醬拌LOL】 精華#04｜這節目真的是來認真分析的，絕對不是來黑的？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502090916639221428.jpg" alt="【 XO醬拌LOL】 精華#04｜這節目真的是來認真分析的，絕對不是來黑的？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/_E_x9S7fVpI" title="【XO醬拌LoL】精闢雙嘴天王#04 VOD完整版｜2017/03/08" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201708/1502090792349680923.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#04 VOD完整版｜2017/03/08" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=-3fLRJTZrdA" title="【 XO醬拌LOL】 精華#02｜小畫家之亂導播狂黑屏" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201703/1488785719258479012.jpg" alt="【 XO醬拌LOL】 精華#02｜小畫家之亂導播狂黑屏" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=mkLCG7QN0M0" title="【 XO醬拌LOL】 精華#03｜風往哪邊吹就往哪邊倒，電競尚書大人4ni?" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201703/1488785918154030476.jpg" alt="【 XO醬拌LOL】 精華#03｜風往哪邊吹就往哪邊倒，電競尚書大人4ni?" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=uHiWoxL1k2g" title="【XO醬拌LoL】精闢雙嘴天王#03 VOD完整版｜2017/03/01" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201703/1488786002876450997.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#03 VOD完整版｜2017/03/01" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=p0xt1sfX3g4" title="【XO醬拌LoL】精闢雙嘴天王#02 VOD完整版｜2017/02/22" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201703/1488785987156928453.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#02 VOD完整版｜2017/02/22" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/xQtARB8D7B8" title="【 XO醬拌LOL】 精華#1｜老闆傳票收不完，第一集難道就是最後一集？！" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1487914980150141409.jpg" alt="【 XO醬拌LOL】 精華#1｜老闆傳票收不完，第一集難道就是最後一集？！" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=lXl9Njxi0oU" title="【XO醬拌LoL】精闢雙嘴天王#01 VOD完整版｜2017/02/15" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1487303986292111436.jpg" alt="【XO醬拌LoL】精闢雙嘴天王#01 VOD完整版｜2017/02/15" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=AZnseYdwxjo" title="2017年情(ㄩㄢˊ)人(ㄒㄧㄠ)節 直播特別企劃" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1487303638063856655.png" alt="2017年情(ㄩㄢˊ)人(ㄒㄧㄠ)節 直播特別企劃" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=qxZ60Zg0q1I&amp;t=44s" title="2017魔競賀歲大串燒" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357482857483732.jpg" alt="2017魔競賀歲大串燒" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=SyCDSOowpMA" title="2017魔競TGS特別企劃 下集" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357675537057732.jpg" alt="2017魔競TGS特別企劃 下集" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/hePYV97KFvU" title="2017魔競TGS特別企劃 上集" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357454387896643.jpg" alt="2017魔競TGS特別企劃 上集" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=dENq7UICd8k&amp;t=2s" title="M.E.魔競年度精華" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357406559996147.jpg" alt="M.E.魔競年度精華" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=szAAsS7h3RI" title="2017年魔競娛樂月曆拍攝花絮" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357375065101789.jpg" alt="2017年魔競娛樂月曆拍攝花絮" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=xcFuqyWosh8&amp;t=1219s" title="2016魔競聖誕派對" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357340025887503.jpg" alt="2016魔競聖誕派對" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/zNtWbhBi1UA" title="暴雪嘉年華–凱琪森77之旅" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357269182672558.jpg" alt="暴雪嘉年華–凱琪森77之旅" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=JWgXXDYmPWg" title="【魔競體育課】2016年度甩肉計畫" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357313845133443.jpg" alt="【魔競體育課】2016年度甩肉計畫" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=1IAWzPoCd2Q&amp;t=2760s" title="【如果我來打】2016LOL世界賽分析 Week 01｜2016/10/05" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357193753418692.jpg" alt="【如果我來打】2016LOL世界賽分析 Week 01｜2016/10/05" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=PukJBvMUquY&amp;t=109s" title="2016 LoL世界大賽隊伍介紹 B組懶人包" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486357047781149127.jpg" alt="2016 LoL世界大賽隊伍介紹 B組懶人包" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=jj2RFK9PsGw&amp;t=2s" title="【魔競小學堂】活動花絮 0802" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486356923992111908.jpg" alt="【魔競小學堂】活動花絮 0802" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/mRiwZe9emX4" title="LMS in 台中 - 小熊來了 EP01" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486356871803175355.jpg" alt="LMS in 台中 - 小熊來了 EP01" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=VOvwt9HzrOQ&amp;t=2872s" title="M.E.魔競 中秋節特別企劃" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486356830345983086.png" alt="M.E.魔競 中秋節特別企劃" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/F-xT-SCfOVQ" title="2016 小熊慶生會" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486356741754711413.jpg" alt="2016 小熊慶生會" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=MIWoPxMUCfA" title="LMS 本週之星Week4 - JT BeBe" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486356587771632907.jpg" alt="LMS 本週之星Week4 - JT BeBe" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/watch?v=84GE8ooOBIw&amp;t=3s" title="LMS Teamfights Montage Week1" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486350686216424786.jpg" alt="LMS Teamfights Montage Week1" class="img-responsive"></a>
                        </li>
                        <li>
                            <a href="https://youtu.be/HU3aoP-Dau4" title="MSI in 熊海 - 小熊來了 EP01" data-tooltip="hover" data-invert="true" class="item-box"><img src="http://www.ment.com.tw/data/images/201702/1486095125362994198.jpg" alt="MSI in 熊海 - 小熊來了 EP01" class="img-responsive"></a>
                        </li>
                    </ul>
                    <div class="video-control">
                        <a href="#" title="往前一則" class="video-prev" data-tooltip="hide"></a>
                        <a href="#" title="往後一則" class="video-next" data-tooltip="hide"></a>
                    </div>
                </div>
            </article>
            <div class="contact"> <img src="http://www.ment.com.tw/themes/zh-tw/assets/images/icontact_bg.jpg" alt="*"> <a href="http://www.ment.com.tw/zh-tw/contact_us.php" title="聯絡我們" data-tooltip="top">CONTACT</a></div>
        </div>
        <footer class="footer">
            <div class="links">
                <div class="container">
                    <a href="zh-tw" title="魔競娛樂" data-tooltip="top" class="logo"><img data-src="http://www.ment.com.tw/themes/zh-tw/assets/images/header_logo.png" src="http://www.ment.com.tw/themes/zh-tw/assets/images/blank.svg" alt="魔競娛樂" class="lazy img-responsive"></a>
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
        <a href="#" title="返回頁首" data-tooltip="hide" class="go-top"> <i></i> <span>TOP</span> </a>
    </body>
    
    
    <script>
        $(function(){
            // 最後一次載入
            {{--  lazyload();        --}}
            
                    
        });

        

        
        
    </script>
    
    
</html>

