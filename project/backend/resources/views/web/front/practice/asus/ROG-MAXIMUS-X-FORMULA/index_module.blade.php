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

        <!-- ment_top --> 
        
        <!-- ---------------------- --> 
        {{-- asus 設定 --}}

        {{-- ---------------------------------------- --}}
        
        <script>
            $(function(){    
                    
            });
            
        </script>
        <style>
           
            
        </style>
        {{--  基於現在瀏覽器下載是並行的，因此程式碼檔案太多並不會嚴重影響效能，因此盡可能的拆成分散式模組  --}}
        {{-- asus 設定 --}}
        <script>
            var isProductPage = '1';
            var addthis_settingLanguaheConfig = 'zh'; 
            var in_page = 'Product';
            var tracking_country = 'TWwebsite886';
            var EntryPageCookie = '1';
            var newVersionMenu = '1';
            
        </script>
        <!--[if lte IE 9 ]> <meta content='0; url=/tw/BrowserInfo.htm' http-equiv='refresh' /> <![endif]-->
        <script>
            {{--  window.siteConfig = {
                route: "PDPage",
                websiteId: "7",
                lang: "tw",
                layout: {
                    PDPage: {
                        Banner: 1,
                        Spotlight: 1,
                        HotProduct: 0,
                        ContentSource: 0,
                        SocialMedia: 0,
                        ScenarioFilter: 1,
                        CategoryHotProduct: 1,
                        CategoryHotProduct_9: 0,
                        CategoryHotProduct_3: 0
                    },
                    PDPageSort: [
                        "Banner", "Spotlight", "ScenarioFilter", "CategoryHotProduct"
                    ]
                },
                support: {
                    supportIndex: "https://www.asus.com/tw/support/",
                    PDRegisterUrl: "https://account.asus.com/product_reg.aspx?lang=zh-tw",
                    pdhashid: "R8suNyyA4xqZ0dIi",
                },
                product: {
                    PDLink: "https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/",
                    l2id: "1156",
                    l3id: "0",
                    pdid: "9707",
                    theme: 1,
                    IsCommercial: 0,
                    bannerIsRoller: 1,
                    OverviewType: 2,
                    WTBStatus: 1,
                    WTBListStatus: 1,
                    PDIIP: {
                        Position: 0,
                        ImgURL: "",
                        BlackFontFlag: 1,
                        Desc1: "",
                        Desc2: "",
                        Desc3: ""
                    }
                },
                productLine: {
                    MDA: {
                        Html: "",
                        Image: ""
                    },
                    buflag: 1,
                    blackVersion: 0,
                    rogVersion: 0
                },
                env: "prod",
                breadcrumb: {
                    Home: {
                        LevelName: "首頁",
                        Link: "//www.asus.com/tw/"
                    },
                    L2: {
                        LevelName: "主機板",
                        Link: "//www.asus.com/tw/Motherboards/"
                    },
                    L3: null
                }
            }  --}}
        </script>
        {{-- ---------------------------------------- --}}
        <!-- Google Tag Manager -->
        <script> 
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-KWSRJ26'); 
        </script>
        <!-- End Google Tag Manager -->
       

        <!--[if lte IE 9]>
            <script src="/js/web/html5.js"></script>
            <script src="/js/web/respond.js"></script>
            <link rel="stylesheet" type="text/css" media="all" href="/css/2015/ie-fix.css" />
        <![endif]-->

        <script type="text/javascript">
            var Global_Tracking_Flag = "0";
            var SecureHost = (("https:" == document.location.protocol) ? "https://" : "http://");
            var addthis_settingConfig = "";
            var addthis_settingLanguaheConfig = "";
            

            var cookie_name = "";

            

            function setClickRelationIdCookie(ProductGroup_RelationId) {
                if (!getcookiedata("ProductGroup_RelationId")) {
                    add_cookie('ProductGroup_RelationId', ProductGroup_RelationId);
                } else {
                    document.cookie = "ProductGroup_RelationId = '' ;path=/;domain=.asus.com;";
                    add_cookie('ProductGroup_RelationId', ProductGroup_RelationId);
                }
            }

            function setBusinessCookie(type) {
                if (!getcookiedata("BuinsessCookie")) {
                    add_cookie("isBusiness", type);
                } else {
                    document.cookie = "BuinsessCookie = '' ;path=/;domain=.asus.com;";
                    add_cookie("isBusiness", type);
                }
            }

            (function() {
                var sc = document.createElement("script");
                sc.type = "text/javascript";
                sc.src = "//apis.google.com/js/plusone.js";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(sc, s);
            })();
        </script>
        <script>
            window.siteConfig = {
                route: "PDPage",
                websiteId: "7",
                lang: "tw",
                layout: {
                    PDPage: {
                        Banner: 1,
                        Spotlight: 1,
                        HotProduct: 0,
                        ContentSource: 0,
                        SocialMedia: 0,
                        ScenarioFilter: 1,
                        CategoryHotProduct: 1,
                        CategoryHotProduct_9: 0,
                        CategoryHotProduct_3: 0
                    },
                    PDPageSort: [
                        "Banner", "Spotlight", "ScenarioFilter", "CategoryHotProduct"
                    ]
                },
                support: {
                    supportIndex: "https://www.asus.com/tw/support/",
                    PDRegisterUrl: "https://account.asus.com/product_reg.aspx?lang=zh-tw",
                    pdhashid: "R8suNyyA4xqZ0dIi",
                },
                product: {
                    PDLink: "https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/",
                    l2id: "1156",
                    l3id: "0",
                    pdid: "9707",
                    theme: 1,
                    IsCommercial: 0,
                    bannerIsRoller: 1,
                    OverviewType: 2,
                    WTBStatus: 1,
                    WTBListStatus: 1,
                    PDIIP: {
                        Position: 0,
                        ImgURL: "",
                        BlackFontFlag: 1,
                        Desc1: "",
                        Desc2: "",
                        Desc3: ""
                    }
                },
                productLine: {
                    MDA: {
                        Html: "",
                        Image: ""
                    },
                    buflag: 1,
                    blackVersion: 0,
                    rogVersion: 0
                },
                env: "prod",
                breadcrumb: {
                    Home: {
                        LevelName: "首頁",
                        Link: "//www.asus.com/tw/"
                    },
                    L2: {
                        LevelName: "主機板",
                        Link: "//www.asus.com/tw/Motherboards/"
                    },
                    L3: null
                }
            }
        </script>
        {{--  必備的  --}}
        <script src="/assets/plugin_split/asus/asus.js"></script>
        {{-- <script src="{{asset("assets/web/front/practice/asus/js/web/asus_script.js")}}"></script> --}}
        {{--    --}}
        <link rel="stylesheet" href="/assets/plugin_split/asus/rog_black_style.css">  
        <link rel="stylesheet" href="{{asset("assets/web/front/practice/asus/ROG-MAXIMUS-X-FORMULA/index_module.css")}}">
        <script src="{{asset("assets/web/front/practice/asus/ROG-MAXIMUS-X-FORMULA/index_module.js")}}"></script>
        

       
       
        
        {{--  <link id="ctl00_localcss" rel="stylesheet" type="text/css" />
       
        

        <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/mybootstrap_to_cut.css")}}' type='text/css' />
        <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/base_responsive.css")}}" rel="stylesheet" />

        <link href="{{asset("assets/web/front/practice/asus/css/web/ProductTab.css")}}" rel="stylesheet">
        
        <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/full_style.css")}}" rel="stylesheet">  --}}





    </head>
    <body>  
        {{-- https://transbiz.com.tw/google-tag-manager-gtm-%E6%95%99%E5%AD%B8/ --}}
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWSRJ26" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- asus_alert -->  
        {{--  <!--  置頂  -->
        <!--  <script src="/assets/plugin_split/asus/asus.js"></script>         -->
        <!--  ----------------------  -->
        <script>
            (function() {
                {
                    var sc = document.createElement("link");
                    sc.type = "text/css";
                    sc.rel = 'stylesheet';
                    sc.href = "/assets/plugin_split/asus/alert/asus_alert/alert-info.css";
                    var s = document.getElementsByTagName("head")[0];
                    setTimeout(function() {
                        s.appendChild(sc);
                    }, 100);
                }
                {
                    var sc2 = document.createElement("script");
                    sc2.type = "text/javascript";
                    sc2.src = "/assets/plugin_split/assearch-resultus/alert/asus_alert/alert-info.js";
                    var s2 = document.getElementsByTagName("script")[0];
                    s2.parentNode.insertBefore(sc2, s2);
                } 
            })();
        </script>  --}}
        <!-- ---------------------- --> 
        <!-- asus_nav -->  
        <!-- 置頂 -->  
        <!-- <link rel="stylesheet" href="/assets/plugin_split/asus/rog_black_style.css"> -->  
        <!-- ---------------------- -->  
        <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_nav/asus_nav.css">
        <script src="/assets/plugin_split/asus/nav/asus_nav/asus_nav.js"></script>
        <!-- ---------------------- --> 
        <div id="af-container">
            <header id="af-header">
                <div class="af-inner">
                    <a title="ASUS 台灣" class="logo" href="https://www.asus.com/tw/"></a>
                    <span class="mobile-menu-toggle"><em class="icon icon-css-menu"></em></span>
                    <div class="nav-bar">
                        <!--Main Menu-->
                        <div class="main-area">
                            <nav class="nav-main nav">
                                <ul>
                                    <li data-target="products-menu"><a onclick="ga('send', 'event', 'header-1-products', 'clicked', '產品');">產品</a></li>
                                    <li data-target="hot-menu"><a onclick="ga('send', 'event', 'header-2-hot', 'clicked', '熱門活動');">熱門活動</a></li>
                                    <li data-target="commercial-menu"><a onclick="ga('send', 'event', 'header-3-commercial', 'clicked', '商用電腦');">商用電腦</a></li>
                                    <li data-target="service-menu"><a onclick="ga('send', 'event', 'header-4-service', 'clicked', '服務&社群');">服務&社群</a></li>
                                    <li data-target="store-menu"><a onclick="ga('send', 'event', 'header-5-store', 'clicked', '商店');">商店</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="sub-area">
                            <em class="icon-search" id="searchopen"></em>
                            <div class="nav-member nav">
                                <ul>
                                    <!--member-->
                                    <li class="member-item member-info" data-lang=zh-tw data-appid="0000000002" data-js-returnurl="asus.url.the_url" data-Register="註冊">
                                        <script>
                                            strLang = 'zh-tw';
                                            strRegister = '註冊';
                                            var strLogin = '登入';
                                            var ShowMiniCart = '1'
                                        </script>

                                        <a>登入 <i class="icon icon-profile"></i></a>
                                        <div class="sub-block user-profile">
                                            <div class="user-img">
                                                <img src="" alt="" />
                                            </div>
                                            <div class="user-name"></div>
                                            <a href="" class="member-center-btn">會員中心</a>
                                            <a href="" class="logout">登出</a>
                                        </div>

                                    </li>
                                    <!--message-->
                                    <li class="member-item msg-center" style="display:none">
                                        <a title="Message"> <em class="icon icon-msg"></em><span class="count"></span></a>
                                        <div class="sub-block">
                                            <p class="top-title">Message Center</p>
                                            <div class="af-msg-center-group">
                                                <ul class="sender-list"></ul>
                                            </div>
                                            <div class="af-msg-center-footer">
                                                <a href="">Display all</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!--recently/compare-->
                                    <li id="menu_compare" class="aai-mm-item member-item products-compare">

                                        <div class="aai-mm-sub aai-mms-list sub-block compare-block">
                                            <div class="aai-mmst-inner">
                                                <div class="aai-mst-header">
                                                    <a data-id="viewed-list"></a>
                                                </div>
                                                <!-- Viewed -->
                                                <div class="aai-tls-se " id="viewed-list">
                                                    <div class="aai-tm">
                                                        <ul class="aai-vls">
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                            <li class="span-5col"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/p_130_rull.jpg" alt=""></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Viewed @end -->
                                                <!-- compare -->
                                                <div class="aai-tls-se " id="div_compare_panel">
                                                    <div class="aai-tm">
                                                        <div class="compare_group"></div>
                                                    </div>
                                                </div>
                                                <!-- compare @end-->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Shopping Cart-->
                                    <li class="member-item shopcart">

                                        <div class="sub-block">
                                            <div class="cart-wrap">

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--search-->
                            <div class="search-bar">
                                <a class="aai-mm-btn hide"><em class="aai-icons aai-icon-search"></em></a>
                                <label for="top-search-bar" class="hide">test</label>
                                <label for="searchinputDefault" class="hide">test</label>
                                <input type="text" class="input-search" ID="top-search-bar" name="q" autocomplete="off" value="">
                                <input type="text" ID="searchinputDefault" class="input-search hide" value="">
                                <button class="btn btn-search-submit" onclick="ga('send', 'event', 'search-buttons', 'clicked', $('#top-search-bar').val());Search();return false;"><em class="icon icon-search"></em></button>
                                <em class="icon icon-close" id="searchclose"></em>
                                <div class="search-result"></div>
                            </div>
                        </div>
                        <!--Sub Menu-->
                        <div class="submenu-area">
                            <div class="products-menu submenu">
                                <h4 class="title">產品</h4>
                                <ul class="nav">
                                    <li class="products-item" data-submenu-id="1"><a onclick="ga('send', 'event', 'header-p1-智慧手機', 'clicked', '智慧手機');">智慧手機</a></li>
                                    <li class="products-item"><a target="_blank" onclick="ga('send', 'event', 'header-p1-Customize', 'clicked', 'Customize');" href="//zenbo.asus.com/tw/">智慧機器人</a></li>
                                </ul>
                                <div class="display-area">
                                    <ul class="sub-products-list sub-cat-list">
                                        <li class="products-1 sub-item">
                                            <h4 class="origin-title">智慧手機</h4>
                                            <div class="sub-group ">
                                                <h5 class="sub-cat-title">
                                                <a onclick = "ga('send', 'event', 'header-p2-智慧手機-智慧手機', 'clicked', '智慧手機');"  href="/tw/Phone/">智慧手機</a>
                                                </h5>
                                                <ul>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-智慧手機-zenfone', 'clicked', 'zenfone');" href="/tw/Phone/ZenFone-Products/">ZenFone</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-智慧手機-zenfone max', 'clicked', 'zenfone max');" href="/tw/Phone/ZenFone-Max-Products/">ZenFone Max</a></li>
                                                </ul>
                                            </div>
                                            <div class="sub-group ">
                                                <h5 class="sub-cat-title">
                                                <a onclick = "ga('send', 'event', 'header-p2-智慧手機-智慧型手機配件', 'clicked', '智慧型手機配件');"  href="/tw/Phone-Accessory/">智慧型手機配件</a>
                                                </h5>
                                                <ul>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-智慧型手機配件-行動電源', 'clicked', '行動電源');" href="/tw/Phone-Accessory/Power-Banks-Products/">行動電源</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-智慧型手機配件-變壓器', 'clicked', '變壓器');" href="/tw/Phone-Accessory/Adapters-Cables-Products/">變壓器</a></li>
                                                </ul>
                                            </div>
                                            <div class="highlight">
                                                <div class="product-info">
                                                    <a onclick="ga('send', 'event', 'header-pbanner-智慧手機', 'clicked', 'zenfone max pro');" href="https://www.asus.com/tw/Phone/ZenFone-Max-Pro-ZB602KL/" target="_blank" class="btn-more">
                                                        <div class="cover-img"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/1.png" data-url="/assets/plugin_split/asus/nav/asus_nav/image/image/1.png" alt="zenfone max pro"></div>
                                                        <div class="title">ZenFone Max Pro</div>
                                                        <div class="summary">性能電力怪獸！兩天長效續航－高通 S636 暢玩 3D 遊戲－全螢幕 FHD+ 視覺震撼
                                                        </div>
                                                        閱讀更多</a>
                                                </div>
                                            </div>
                                        </li>                                        
                                        <li class="products-1233 sub-item">
                                            <h4 class="origin-title">伺服器 & 工作站 & 網路存儲系統</h4>
                                            <div class="sub-group ">
                                                <h5 class="sub-cat-title">
                                                <a onclick = "ga('send', 'event', 'header-p2-伺服器 & 工作站 & 網路存儲系統-伺服器 & 工作站 & 網路存儲系統', 'clicked', '伺服器 & 工作站 & 網路存儲系統');"  href="/tw/Commercial-Servers-Workstations/">伺服器 & 工作站 & 網路存儲系統</a>
                                                </h5>
                                                <ul>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-伺服器 & 工作站 & 網路存儲系統-精簡型電腦', 'clicked', '精簡型電腦');" href="/tw/Commercial-Servers-Workstations/Commercial-Client-Devices-Products/">精簡型電腦</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-伺服器 & 工作站 & 網路存儲系統-伺服器', 'clicked', '伺服器');" href="/tw/Commercial-Servers-Workstations/Commercial-Servers-Products/">伺服器</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-伺服器 & 工作站 & 網路存儲系統-工作站', 'clicked', '工作站');" href="/tw/Commercial-Servers-Workstations/Commercial-Workstations-Products/">工作站</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-伺服器 & 工作站 & 網路存儲系統-工作站主機板', 'clicked', '工作站主機板');" href="/tw/Commercial-Servers-Workstations/Commercial-Workstation-Motherboards-Products/">工作站主機板</a></li>
                                                    <li><a onclick="ga('send', 'event', 'header-p3-伺服器 & 工作站 & 網路存儲系統-配件', 'clicked', '配件');" href="/tw/Commercial-Servers-Workstations/Commercial-Server-Accessories-Products/">配件</a></li>
                                                </ul>
                                            </div>
                                            <div class="highlight">
                                                <div class="product-info">
                                                    <a onclick="ga('send', 'event', 'header-pbanner-伺服器 & 工作站 & 網路存儲系統', 'clicked', 'esc500 g4');" href="https://www.asus.com/tw/Commercial-Servers-Workstations/ESC500-G4/" target="_blank" class="btn-more">
                                                        <div class="cover-img"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/1233.png" data-url="/assets/plugin_split/asus/nav/asus_nav/image/image/1233.png" alt="esc500 g4"></div>
                                                        <div class="title">ESC500 G4</div>
                                                        <div class="summary">高電源效率的進階 I/O 功能</div>
                                                        閱讀更多</a>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="hot-menu submenu three-column">
                                <h4 class="title">熱門活動</h4>
                                <ul class="hot-list clearfix">
                                    <li class="hot-item first">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-1', 'clicked', '350.jpg');" href="https://www.asus.com/tw/events/info/activity_ZenFone201810-6MSP/" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/350.jpg" alt="歡慶ZenFone 熱銷600萬台 好禮成雙 極光之旅*等著你"><span class="title">歡慶ZenFone 熱銷600萬台 好禮成雙 極光之旅*等著你</span></a>
                                    </li>
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-2', 'clicked', '230.jpg');" href="https://www.asus.com/tw/event/Asus_Store/news_detail.aspx?id=137" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/230.jpg" alt="萬聖節快來和實況主一起搞鬼！"><span class="title">萬聖節快來和實況主一起搞鬼！</span></a>
                                    </li>
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-3', 'clicked', '336.jpg');" href="https://www.asus.com/tw/VivoWatch/VivoWatch-BP-HC-A04/" target="_self"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/336.jpg" alt="Voviwatch BP 熱烈預購中!"><span class="title">Voviwatch BP 熱烈預購中!</span></a>
                                    </li>
                                </ul>
                                <ul class="hot-list clearfix">
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-4', 'clicked', '345.jpg');" href="https://www.asus.com/tw/events/info/activity_ZenPadmonth/" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/345.jpg" alt="ZenPad十月追劇最對月！"><span class="title">ZenPad十月追劇最對月！</span></a>
                                    </li>
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-5', 'clicked', '185.jpg');" href="https://www.asus.com/tw/events/info/activity_GTX10-PG27VQ/" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/185.jpg" alt="買指定顯示卡，登錄抽PG27VQ 電競螢幕"><span class="title">買指定顯示卡，登錄抽PG27VQ 電競螢幕</span></a>
                                    </li>
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-6', 'clicked', '222.jpg');" href="https://www.asus.com/tw/events/info/activity_ZenFone5AIAachtEvent/" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/222.jpg" alt="AI啟航！ZenFone 5遊艇攝影趴TWO"><span class="title">AI啟航！ZenFone 5遊艇攝影趴TWO</span></a>
                                    </li>
                                </ul>
                                <ul class="hot-list clearfix">
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-7', 'clicked', '335.jpg');" href="https://www.asus.com/tw/event/info/activity_warranty-mb-vga/" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/335.jpg" alt="板卡線上登錄，免費升級延長保固"><span class="title">板卡線上登錄，免費升級延長保固</span></a>
                                    </li>
                                    <li class="hot-item">
                                        <a onclick="ga('send', 'event', 'header-banner-whats-hot-8', 'clicked', '332.jpg');" href="https://bit.ly/2IxSIiM" target="_blank"><img src="/assets/plugin_split/asus/nav/asus_nav/image/image/332.jpg" alt="【10月壽星】來許願，我送禮!電力怪獸獻給十全十美的你!"><span class="title">【10月壽星】來許願，我送禮!電力怪獸獻給十全十美的你!</span></a>
                                    </li>
                            </div>
                            <div class="commercial-menu submenu">
                                <h4 class="title">商用電腦</h4>
                                <ul class="nav">
                                    <li class="commercial-item" data-submenu-id="commerciallandingpage"><a onclick="ga('send', 'event', 'c1-products', 'detail-header-clicked', '總覽');" href="/tw/commercial/" target="_self">總覽</a></li>
                                    <li class="commercial-item" data-submenu-id="products"><a>產品</a></li>
                                </ul>
                                <div class="display-area">
                                    <ul class="sub-commercial-list sub-cat-list">
                                        <li class="commercial-products sub-item two-column">
                                            <h4 class="origin-title">產品</h4>
                                            <div class="sub-group empty">
                                                <h5 class="sub-cat-title">
                                                <a onclick="ga('send', 'event', 'c2-產品-筆記型電腦', 'detail-header-clicked', '筆記型電腦');" href="/tw/Commercial-Laptops/">筆記型電腦</a>
                                                </h5></div>
                                            <div class="sub-group empty">
                                                <h5 class="sub-cat-title">
                                            <a onclick="ga('send', 'event', 'c2-產品-投影機', 'detail-header-clicked', '投影機');" href="/tw/Commercial-Projectors/">投影機</a>
                                            </h5></div>
                                            
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="service-menu submenu">
                                <h4 class="title">服務&社群</h4>
                                <ul class="nav">
                                    <li class="service-item" data-submenu-id="1"><a onclick="ga('send','event','header-s1-服務與支援','clicked', '服務與支援');" href="http://www.asus.com/tw/support/" target="_self">服務與支援</a></li>
                                    <li class="service-item" data-submenu-id="2"><a onclick="ga('send','event','header-s2-下載中心','clicked', '下載中心');" href="https://www.asus.com/tw/support/Download-Center/" target="_blank">下載中心</a></li>
                                </ul>
                            </div>
                            <div class="store-menu submenu">
                                <h4 class="title">商店</h4>
                                <ul class="nav">
                                    <li class="store-item" data-submenu-id="1"><a onclick="ga('send','event','header-b1-網路商店','clicked', '網路商店');" href="http://store.asus.com/tw/" target="_blank">網路商店</a></li>
                                    <li class="store-item" data-submenu-id="2"><a onclick="ga('send','event','header-b2-體驗店','clicked', '體驗店');" href="https://www.asus.com/tw/event/Asus_Store/" target="_blank">體驗店</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-action">
                        <a class="btn" href="#"><em class="icon icon-search"></em></a>
                    </div>
                </div>
            </header>  
            <!-- ---------------------- -->  
            <!-- 換膚設定 -->      
            <!-- <script>
                var EnableBlackVersion = '1';
                
            </script>
    
            <script type="text/javascript">
                $(document).ready(function() {
                    if (EnableBlackVersion == "1") {
                        $("body").attr("id", "rog_black_style");
                        $("#af-header").addClass("aai-bg-black");
                    }
                });
            </script> -->
            <!-- ---------------------- -->  
            <!-- 結合後註解掉 -->
            {{--  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            1    --}}
            <!-- ----------- -->            
            <!-- ---------------------- -->   
            <span id="span_Tech" class="hide"></span>
            <div id="main-zone" class="container-fluid gray-bg-small">
                <!-- asus_top_nav -->  
                <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_top_nav/asus_top_nav.css">
                <script src="/assets/plugin_split/asus/nav/asus_top_nav/asus_top_nav.js"></script>
                <!-- ---------------------- -->   
                <div id="asus_top_nav" class="">
                    <div class="inner">
                        <script>
                            var breadcrumbStr = '主機板,/tw/Motherboards;';
                        </script>
                        <div id="product-topinfo">
                            <!--<div id="breadcrumbs"></div>-->
                            <div id="bmenu_outline" class="hide">
                                <div id="bemnu_content">
                                    <div id="bmenu_return"></div>
                                    <div id="scrollbarBreadcrumb">
                                        <div class="scrollbar">
                                            <div class="track">
                                                <div class="thumb">
                                                    <div class="end"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="viewport">
                                            <div class="overview">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right" id="MDA"><span id="ctl00_ContentPlaceHolder1_ctl00_breadcrumbs1_lblMDA"></span></div>
                        </div>
                        
                        <h1 class="page-title" data-modelname="ROG MAXIMUS X FORMULA"><span id="ctl00_ContentPlaceHolder1_ctl00_span_model_name" onclick="RedirectUrl();" style="cursor:pointer;white-space:nowrap;">ROG MAXIMUS X FORMULA</span></h1>
                        
                        <nav class="row" >
                            <div id="top-nav-line" class="span12" >

                                <ul class="nav nav-tabs pull-right">
                                    <li id="lioverview" class="hide active"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','產品簡介');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/overview/">產品簡介</a></li>

                                    <li id="lifeature" class="hide">
                                        <a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','');" href=""></a>
                                    </li>
                                    <li id="lispecifications" class="hide"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','產品規格');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/specifications/">產品規格</a></li>
                                    <li id="ligallery" class="hide"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','產品照片');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/gallery/">產品照片</a></li>
                                    <li id="lireview" class="hide"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','評論');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/review">評論</a></li>
                                    <li id="lisupport" class="hide"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','支援');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/HelpDesk/">支援</a></li>
                                    <li id="liSuccessfulCase" class="hide"><a onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','成功案例');" href="">成功案例</a></li>
                                    <li id="liwheretobuy" class="hide"><a onclick="GATrackEvent('button-product-tab-ROG MAXIMUS X FORMULA','clicked','哪裡買');" href="https://www.asus.com/tw/Motherboards/ROG-MAXIMUS-X-FORMULA/wheretobuy/">哪裡買</a></li>
                                    <li id="liOnlineChat"><a href="javascript:void(0)" onclick="GATrackEvent('product-tab-ROG MAXIMUS X FORMULA','clicked','客服即時通');window.open('https://icr-tw.asus.com/webchat/icr.html?rootTreeId=001.001.001&treeId=001.001.001&tenantId=ZH-TW','_new', 'toolbar=no, scrollbars=no, resizable=no,');">客服即時通</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- ---------------------- -->  
                    <script>
                        // 清單隱藏
                        $(document).ready(function() {
                            $('#lioverview').removeClass('hide');
                            $('#lispecifications').removeClass('hide');
                            $('#ligallery').removeClass('hide');
                            $('#lireview').removeClass('hide');
                            $('#lisupport').removeClass('hide');
                            $('#liwheretobuy').removeClass('hide');
                            $('#liOnlineChat').removeClass('hide');
                        });
                    </script>
                </div>                
                <!-- ---------------------- -->  
                <!-- 換膚設定 -->      
                <!--  <script>
                    var EnableBlackVersion = '1';
                    
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        if (EnableBlackVersion == "1") {
                            $("body").attr("id", "rog_black_style");
                        }
                    });
                </script>  -->              
                <!-- ---------------------- -->   
                <div class="container">
                    <!-- asus_header -->                      
                    <link rel="stylesheet" href="/assets/plugin_split/asus/header/asus_header/asus_header.css">
                    <script src="/assets/plugin_split/asus/header/asus_header/asus_header.js"></script>
                    <!-- ---------------------- -->  
                    <header class="asus_header row">
                        <div class="span6" id="product-info-zone">
                            <img src='/assets/plugin_split/asus/header/asus_header/image/P_setting_000_1_90_end_500.png' alt='ROG MAXIMUS X FORMULA' />
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
                                <h1 class="product-slogan">Intel Z370 ATX 電競主機板搭載水冷功能、Aura Sync RGB LED 同步燈效、DDR4 4133MHz、802.11ac Wi-Fi、雙 M.2 及 USB 3.1 Gen 2 連接埠</h1>
                                <div class="product-intro">
                                    <ul>
                                        <li>專為第 8 代 Intel&#174; Core&#8482; 桌上型處理器設計的 LGA1151 插槽
                                        </li>
                                        <li>CrossChill EK II 及水冷散熱區域：玩任何遊戲時皆能維持系統散熱。
                                        </li>
                                        <li>領先自訂功能：搭載 LiveDash OLED 及 ASUS 獨家 Aura Sync RGB 燈效，包括標準和可編程RGB 燈條插座。
                                        </li>
                                        <li>最佳遊戲音效：SupremeFX 與 Sonic Studio III 使原音重現，讓您在遊戲中更加聲歷其境。
                                        </li>
                                        <li>5 向全方位優化：自動全系統調校，提供專為電腦量身打造的超頻和散熱功能
                                        </li>
                                        <li>最佳連線能力： Intel Gigabit 乙太網路、2x2 802.11ac MU-MIMO Wi-Fi、前面板 USB 3.1 及雙 M.2。
                                        </li>
                                        <li>最佳遊戲防護：ROG RGB Armor、預裝 I/O 護板及頂級元件。
                                        </li>
                                    </ul>
                                </div>
                                <!--<div class="small-star"><img src="/images/small-star.jpg"></div>-->
                                <div class="color-select"></div>
                                <label class="checkbox add-to-list">
                                    <input type="checkbox" product-group="2" data-imgsrc="/assets/plugin_split/asus/header/asus_header/image/P_setting_x_0_90_end_100.png" class="add-compare-check" data-modelName="ROG MAXIMUS X FORMULA" alt="R8suNyyA4xqZ0dIi" onclick="googleTrackProductfn('AddCompare',this);">加入比較表
                                </label>

                                <!--other logo-->
                                <div id="product-quick-award">
                                    <ul class="unstyled">
                                        <li><img src="/assets/plugin_split/asus/header/asus_header/image/8841.png"></li>
                                        <li><img src="/assets/plugin_split/asus/header/asus_header/image/14633.png"></li>
                                        <li><img src="/assets/plugin_split/asus/header/asus_header/image/14187.jpg"></li>
                                        <li><img src="/assets/plugin_split/asus/header/asus_header/image/6773.png"></li>
                                        <li><img src="/assets/plugin_split/asus/header/asus_header/image/14517.png"></li>
                                    </ul>
                                </div>
                                <!--End-->
                                <div id="product-where-to-buy" class="btn-group shop-btn-group hide">
                                    <a class="btn-asus" href="javascript:void(0);" onclick="content_item_click('wheretobuy');return false;">Shop</a>
                                </div>
                            </hgroup>
                        </div>
                    </header>
                    <!-- ---------------------- -->  
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_aside --> 
                    <link rel="stylesheet" href="/assets/plugin_split/asus/aside/asus_aside/asus_aside.css">
                    <script src="/assets/plugin_split/asus/aside/asus_aside/asus_aside.js"></script>
                    <!-- ---------------------- -->  
                     <aside class="asus_aside width-line-gray row">
                        <div id="aside-button" class="span8">
                            <a class="print-btn" onclick="print_click()">列印此頁</a>
                            
                        </div>
                        <div id="product-social-button" class="span4">
                            <div id="ctl00_ContentPlaceHolder1_ctl00_ctl00_Product_Info1_div_ShareThis" class="pull-right">
                                <div class='addthis_toolbox addthis_default_style right'><a class='addthis_button_compact'>Share</a>
                                    <a class=addthis_button_google_plusone></a>
                                    <a class=addthis_button_facebook_like></a>
                                </div>
                                <script type='text/javascript' src='/assets/plugin_split/asus/aside/asus_aside/addthis_widget.js#pubid=AsusProductAddthis'></script>
                            </div>
                        </div>
                    </aside> 
                    <!-- ---------------------- -->  
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->                      
                    
                </div>
                <div id="hd">
                    <!-- asus_full_page_nav -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_full_page_nav/jquery.fullPage.css">
                    <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_full_page_nav/asus_full_page_nav.css">
                    <script src="/assets/plugin_split/asus/nav/asus_full_page_nav/asus_full_page_nav.js"></script>
                    <!-- ---------------------- -->                      
                    <nav id="fp-nav" class="right" style="margin-top: -43.5px; z-index:99999;">
                        <ul>
                            <li>
                                <a href="#asus_spec" class="active"><span></span></a>
                                <div class="fp-tooltip right">尖端規格</div>
                            </li>
                            <li>
                                <a href="#asus_cooling"><span></span></a>
                                <div class="fp-tooltip right">最佳散熱</div>
                            </li>
                            <li>
                                <a href="#asus_lighting"><span></span></a>
                                <div class="fp-tooltip right">領先自訂功能</div>
                            </li>
                            <li>
                                <a href="#asus_connectivity"><span></span></a>
                                <div class="fp-tooltip right">次世代連線能力</div>
                            </li>
                            <li>
                                <a href="#asus_performance"><span></span></a>
                                <div class="fp-tooltip right">極致效能</div>
                            </li>
                            <li>
                                <a href="#asus_audio"><span></span></a>
                                <div class="fp-tooltip right">最佳遊戲音效</div>
                            </li>
                            <li>
                                <a href="#asus_protection"><span></span></a>
                                <div class="fp-tooltip right">DIY 貼心設計</div>
                            </li>
                            <li>
                                <a href="#asus_more"><span></span></a>
                                <div class="fp-tooltip right">ROG 超越您的期望</div>
                            </li>
                            <li>
                                <a href="#asus_intel"><span></span></a>
                                <div class="fp-tooltip right">Intel 的威力</div>
                            </li>
                        </ul>
                    </nav>
                    <!-- ---------------------- -->  
                    <!-- asus_scroll_up -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/scroll_up/asus_scroll_up/asus_scroll_up.css">
                    <script src="/assets/plugin_split/asus/scroll_up/asus_scroll_up/asus_scroll_up.js"></script>
                    <!-- ---------------------- -->  
                    <a style="z-index: 99999;" id="asus_scroll_up" title="Scroll to top">
                        <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="24px" height="24px">
                            <g>
                                <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z" />
                            </g>
                        </svg>
                    </a>
                    <!-- ---------------------- -->  
                    <!-- asus_nav_block -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_nav_block/asus_nav_block.css">
                    <script src="/assets/plugin_split/asus/nav/asus_nav_block/asus_nav_block.js"></script>
                    <!-- ---------------------- -->  
                    <nav id="asus_nav_block">
                        <ul>                    
                            <li class="hd-ib hd-col25">
                                <a href="#cooling">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_01.jpg">
                                    <h4>最佳散熱</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col25">
                                <a href="#lighting">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_02.jpg">
                                    <h4>領先自訂功能</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col25">
                                <a href="#connectivity">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_03.jpg">
                                    <h4>最佳連線能力</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col25">
                                <a href="#performance">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_04.jpg">
                                    <h4>最佳遊戲效能</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col25">
                                <a href="#audio">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_05.jpg">
                                    <h4>最佳遊戲音效</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col25">
                                <a href="#protection">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_06.jpg">
                                    <h4>DIY 貼心設計</h4>
                                </a>
                            </li>
                            <li class="hd-ib hd-col50">
                                <a href="#more">
                                    <img src="/assets/plugin_split/asus/nav/asus_nav_block/image/top_08.jpg">
                                    <h4>ROG 超越您的期望</h4>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
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
                        <p class="video_txt">承襲延續了十多年的精華，最新一代的 Maximus 系列強化 Intel Z370 晶片組，搭載玩家狂熱追求的所有強大功能。每款主機板都展示出超凡的功能組合以符合不同類型玩家的需求，而 ROG DNA 則是貫穿全系列核心的靈魂。從滿足死忠愛好者的超頻與散熱功能，到 RGB 燈效優雅點綴的俐落電競美學，Maximus X 系列主機板為您打造最獨特頂級的裝備。
                        </p>
                        <img src="/assets/plugin_split/asus/youtube/asus_youtube_box/image/play_btn.png" alt="play" class="play-tutorial" data-src="https://www.youtube-nocookie.com/embed/Kgcbh7P_DJU">
                        <span></span>
                    </div>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_nav_block -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/carousel/asus_carousel/owl.carousel.css">
                    <script src="/assets/plugin_split/asus/carousel/asus_carousel/owl.carousel.min.js"></script>
                    <link rel="stylesheet" href="/assets/plugin_split/asus/carousel/asus_carousel/asus_carousel.css">
                    <script src="/assets/plugin_split/asus/carousel/asus_carousel/asus_carousel.js"></script>
                    <!-- ---------------------- --> 
                    <div class="asus_carousel txt-center">
                        <h3 class="txt-red">持續進化</h3>
                        <p class="hd-w800">一代接一代，ROG不斷將Maximus Formula推向新的高峰。探索從初代直到最新一代的進化歷程。
                        </p>
                        <div id="owl_evolution">
                            <div class="item">
                                <h3>2008</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2008.png">
                                <h4 class="txt-red">ROG MAXIMUS FORMULA</h4>
                                <p>第一款 Maximus Formula 主機板於 2008 年推出。初代 Formula 遵循無所不在的 Maximus Extreme 的腳步。 Formula 配備強大的散熱器、基本超頻功能和專用音效卡，以需要效能優勢的玩家為目標。</p>
                                <h3>2008</h3>
                            </div>
                            <div class="item">
                                <h3>2009</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2009.png">
                                <h4 class="txt-red">ROG MAXIMUS II FORMULA</h4>
                                <p>第二代改良了美學設計。 灰色和黑色陽極氧化散熱器取代第一代 Formula 的銅色陣列，紅色點綴則增添些許個性。 經典的 ROG 標誌也首次亮相。</p>
                                <h3>2009</h3>
                            </div>
                            <div class="item">
                                <h3>2010</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2010.png">
                                <h4 class="txt-red">ROG MAXIMUS III FORMULA</h4>
                                <p>2010 年，Formula 第三代推出。 機板中央增加背光 ROG 標誌，舊型號的藍色和白色插槽被換成黑色與紅色的組合 — 隨後在業界成為代表性配色。 音效方面的趨勢也在改變。 線上遊玩需要集中聲音，所以玩家把凌亂的多聲道揚聲器配置換成頭戴式耳機。 隨附的 SupremeFX IV 音效卡順應趨勢，搭載能夠驅動各種耳機的專用放大器。</p>
                                <h3>2010</h3>
                            </div>
                            <div class="item">
                                <h3>2012</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2012.png">
                                <h4 class="txt-red">ROG MAXIMUS V FORMULA</h4>
                                <p>由於 Intel 接連推出多款晶片組，IV Formula 的開發時間過短。 然而，2012 年出現戲劇性轉折。水冷越來越受歡迎，玩家開始青睞外觀簡潔的架構。 Maximus V Formula 配備採用氣冷或水冷的混合設計 VRM 散熱器。 而為了節省插槽空間，舊型號的專用音效卡被經過全面重新設計的板載音效解決方案取代，樹立新的效能標準。</p>
                                <h3>2012</h3>
                            </div>
                            <div class="item">
                                <h3>2013</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2013.png">
                                <h4 class="txt-red">ROG MAXIMUS VI FORMULA</h4>
                                <p>第六代 Formula 提高了多個方面的標準。 加入 ROG 護罩提升組建以展示標準，板卡後側則以鋼製背板來加強結構。 CrossChill 混合式散熱採用 G1/4 吋螺紋，以容納最新水冷配件。 板載音效利用專用 DAC 和更強大的耳機放大器再次進化，傳遞清晰透徹的聲音至高保真耳機。</p>
                                <h3>2013</h3>
                            </div>
                            <div class="item">
                                <h3>2014</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2014.png">
                                <h4 class="txt-red">ROG MAXIMUS VII FORMULA</h4>
                                <p>第七代繼續改良。 CrossChill 混合式 VRM 散熱器透過銅製水道升級，改善熱傳遞。 插槽和連接埠經過簡單的外觀改造，以顏色相配的撥桿取代舊型號的白色閂鎖。</p>
                                <h3>2014</h3>
                            </div>
                            <div class="item">
                                <h3>2015</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2015.png">
                                <h4 class="txt-red">ROG MAXIMUS VIII FORMULA</h4>
                                <p>RGB 燈效和單色主題隨著 Maximus VIII Formula 登場，讓玩家自由選擇色彩。 我們首次與 EK 的水冷專家合作，他們協助加強 Formula 的混合式水冷散熱塊，提供更好的性能。</p>
                                <h3>2015</h3>
                            </div>
                            <div class="item">
                                <h3>2016</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2016.png">
                                <h4 class="txt-red">ROG MAXIMUS IX FORMULA</h4>
                                <p>第九代注重細節。 我們首創了整合式 I/O 護板，使 DIY 更為方便，以確保適合所有機殼。 有別於第八代，Maximus IX Formula 具有板載電源按鈕和 PCIe 插槽閂鎖的額外 RGB 燈光區域，為美學增添平衡感。</p>
                                <h3>2016</h3>
                            </div>
                            <div class="item">
                                <h3>2017</h3>
                                <img src="/assets/plugin_split/asus/carousel/asus_carousel/image/2017.png">
                                <h4 class="txt-red">ROG MAXIMUS X FORMULA</h4>
                                <p>經過十年的改良後，來到 Maximus X Formula。 精心製作以展示架構，並仔細加強以提供最佳性能，最新一代在功能與形式之間達到完美平衡。</p>
                                <h3>2017</h3>
                            </div>
                        </div>
                    </div>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_spec -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_spec/asus_spec.css">
                    <script src="/assets/plugin_split/asus/layout/asus_spec/asus_spec.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_spec">
                        <div class="hd-w1300">
                            <div class="spec-main"></div>
                            <ol>
                                <li>
                                    <b>預裝 I/O 護板</b>
                                    <p>
                                        Clr CMOS 按鈕
                                        <br> BIOS Flashback 按鈕
                                        <br> 2x2 MU-MIMO 802.11 AC Wi-Fi
                                        <br> HDMI 1.4b
                                        <br> DisplayPort 1.2
                                        <br>
                                    </p>
                                </li>
                                <li>
                                    <b>Intel I219-V Gb LAN</b>
                                    <p>GameFirst IV
                                        <br>LANGuard</p>
                                    <p><b>USB 3.1 Gen 2</b><span class="txt-grey"> (Type A + Type C)</span></p>
                                    <!-- <img src="/assets/plugin_split/asus/layout/asus_spec/image/tag01.png"> -->
                                </li>
                                <li>
                                    <b>多 GPU SLI/CFX 支援</b>
                                    <p>
                                        &#8901; 2 x PCIe 3.0 x16 SafeSlot (CPU)
                                        <br> &#8901; 1 x PCIe 3.0 x16 插槽 (PCH)
                                        <br> &#8901; 3 x PCIe 3.0 x1 插槽 (PCH)
                                        <br>
                                    </p>
                                    <img src="/assets/plugin_split/asus/layout/asus_spec/image/spec-safeslot.jpg" style="width:120px;margin-left: 0;">
                                </li>
                                <li>
                                    <p class="txt-center">堅固的鋼製
                                        <br>背板</p>
                                    <img src="/assets/plugin_split/asus/layout/asus_spec/image/backplate.jpg" alt="Backplate">
                                </li>
                                <li>
                                    <b>SupremeFX S1220 編解碼器</b>
                                    <p>
                                        &#8901; ES9023P 高解析度 DAC
                                        <br> &#8901; 前後阻抗感測
                                        <br> &#8901; 120dB SNR 立體聲播放輸出
                                        <br> &#8901; 113dB SNR 錄音輸入
                                        <br>
                                    </p>
                                    <b>Sonic Studio III</b>
                                    <p>
                                        &#8901; Sonic Studio Link
                                    </p>
                                    <b>Sonic Radar III</b>
                                </li>
        
                                <li>
                                    <span class="hd-ib hd-col70" style="padding-right: 10px;"><p>CrossChill EK II</p></span>
                                    <span class="hd-ib hd-col30" style="margin-bottom: 10px;"><img src="/assets/plugin_split/asus/layout/asus_spec/image/CrossChill.png"></span>
                                </li>
                                <li>
                                    <p>Q-Code
                                        <br>開始鈕
                                        <br>重設鈕</p>
                                </li>
                                <li><b>第 8代 Intel<sup>&reg;</sup> Core<sup>&trade;</sup> 專用 Intel LGA 1151</b></li>
                                <li><span class="hd-ib ib-bottom"><p>多色 Q-LED</p></span><span class="hd-ib ib-bottom"><img src="/assets/plugin_split/asus/layout/asus_spec/image/spec-qled.png"></span></li>
                                <li>
                                    <b>DDR4 4133MHz+ (OC)</b>
                                    <p>
                                        &#8901; 4 DIMM 雙通道
                                        <br> &#8901; XMP 支援
                                        <br>
                                    </p>
                                </li>
                                <li>
                                    <b style="padding-right: 60px;">USB 3.1 Gen 2 前面板接頭</b>
                                    <img src="/assets/plugin_split/asus/layout/asus_spec/image/connector.jpg">
                                </li>
                                <li>
                                    <p> 6 x USB 3.1 Gen 1<span class="txt-grey">（2 個在前）</span>
                                        <br> 6 x USB 2.0 連接埠 <span class="txt-grey">（2 個在前）</span>
                                        <br>
                                    </p>
                                </li>
                                <li>
                                    <p>6 x SATA 6G 連接埠</p>
                                </li>
                                <li>
                                    <p class="hd-ib ib-bottom hd-col50"><b>Intel Z370 晶片組</b>
                                        <br>ROG 標誌 RGB LED</p>
                                    <img src="/assets/plugin_split/asus/layout/asus_spec/image/intel.jpg" alt="Intel Z370 Chipset" class="hd-ib ib-bottom hd-col20" style="padding:5px">
                                    <img src="/assets/plugin_split/asus/layout/asus_spec/image/aura.png" alt="ASUS AURA SYNC" class="hd-ib hd-col20">
                                </li>
                                <li>
                                    <p>W_IN/OUT、W_Flow 插座</p>
                                </li>
                                <li>
                                    <p>雙 M.2 插槽 3 M 型</p>
                                    <p>
                                        &#8901; 1 x 2242~22110 (PCIe 3.0 x4 + SATA)
                                        <br> &#8901; 1 x 2242~22110 (PCIe 3.0 x4)
                                        <br>
                                    </p>
                                </li>
                                <li><b>2 x RGB 插座 + 2 x 可編程插座
                                </b></li>
                            </ol>
                        </div>
                    </section>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_cooling -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_cooling/asus_cooling.css">
                    <script src="/assets/plugin_split/asus/layout/asus_cooling/asus_cooling.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_cooling">
                        <h2 class="left"><span class="top">最佳</span>散熱</h2>
                        <div class="hd-sec-crosschill">
                            <div class="hd-w1200">
                                <div class="txt-left fright">
                                    <h3 class="txt-red">專業打造．全面散熱
                                    </h3>
                                    <h4 class="txt-grey">CrossChill EK II</h4>
                                    <p>CrossChill EK II 兼具水冷與空冷混合散熱，不需要風扇！ 經過重新設計的散熱鰭片使水冷 MOSFET 溫度壓制在 35℃以下，標準 G1/4 吋螺紋接頭則讓 CrossChill EK II 能夠適應現有配置 — 讓您以最輕鬆的方式獲得安靜與高效率的散熱效果！
                                    </p>
                                </div>
                                <figure class="fleft">
                                    <img src="/assets/plugin_split/asus/layout/asus_cooling/image/EKII_Water_Cooling.gif" alt="" class="hd_bottom">
                                    <img src="/assets/plugin_split/asus/layout/asus_cooling/image/EKII_Water_Cooling_top.png" alt="" class="hd_top">
                                    <ul class="hd_description">
                                        <li>
                                            <h4 class="txt-red txt_decolineflip">G1/4 吋螺紋設計</h4>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooling_note.png" alt="">
                                        </li>
                                        <li>
                                            <h4 class="txt-red txt_decolineflip">防水橡膠墊圈</h4>
                                        </li>
                                        <li>
                                            <h4 class="txt-red txt_decolineflip">銅製水道</h4>
                                        </li>
                                        <li>
                                            <h4 class="txt-red txt_decolineflip">大量的散熱鰭片</h4>
                                        </li>
                                    </ul>
                                </figure>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div class="hd-sec-award">
                            <div class="hd-w1200">
                                <div class="hd-ib hd-col45 txt-left">
                                    <h3 class="txt-red">M.2 散熱模組
                                    </h3>
                                    <p>ROG Maximus X Formula 搭載經過高效整合的M.2散熱模組，極大的散熱表面可將插入的SSD全面冷卻，提供最佳遊戲效能及可靠性。M.2 散熱模組的時尚斜角設計搭配動人的 ROG 無懼之眼 Logo，更添機身美感。溫度感測器還能讓您即時監控 M.2 驅動器溫度。
                                    </p>
                                </div>
                                <img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooling.png">
                            </div>
                        </div>
                        <div class="hd-sec-fan txt-center" style="background-image: url('/assets/plugin_split/asus/layout/asus_cooling/image/bg-glow.jpg');">
                            <div class="hd-w1200">
                                <h3 class="txt-red">絕佳散熱設計</h3>
                                <p>ROG Maximus X Formula 配備有史以來最全面的散熱控制，可透過 Fan Xpert 4 或 UEFI BIOS 進行設定：</p>
                                <div class="hd-col50 fleft">
                                    <img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler_pd.png" alt="ROG Maximus X Formula">
                                    <ul class="fan_cover">
                                        <li class="hd-active"><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-1.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-2.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-3.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-4.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-5.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-6.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-7.png"></li>
                                        <li><img src="/assets/plugin_split/asus/layout/asus_cooling/image/cooler-8.png"></li>
                                    </ul>
                                </div>
                                <div class="hd-col50 fright">
                                    <ul class="hd-filter">
                                        <li class="hd-active">
                                            <div class="fan_icon fan_temp"></div>
                                            <p>多重溫度來源</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_sensor"></div>
                                            <p>水泵+</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_pwm"></div>
                                            <p>4 針腳 PWM/DC 風扇</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_card"></div>
                                            <p>風扇擴充插座</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_protection"></div>
                                            <p>智慧防護</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_inout"></div>
                                            <p>進水／出水口</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_flow"></div>
                                            <p>水流</p>
                                        </li>
                                        <li>
                                            <div class="fan_icon fan_pump"></div>
                                            <p>AIO 泵</p>
                                        </li>
                                    </ul>
                                    <ul class="hd-content">
                                        <li class="hd-active">
                                            <p>所有接頭皆可設定用來監控三個使用者配置的熱敏感應器，並據此做出反應，依照工作負載來進行散熱。 全都能透過 Fan Xpert 4 或 UEFI 輕鬆管理。</p>
                                        </li>
                                        <li>
                                            <p>可供應 3A 以上電流給高性能 PWM 或 DC 水泵的專用插座。</p>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/waterpump_pd.png" alt="detail">
                                        </li>
                                        <li>
                                            <p>每個內建插座都可自動偵測 PWM 或 DC 風扇。</p><small class="txt-grey">*W_PUMP+ 與 AIO PUMP 也可透過 PWM/DC 控制。</small></li>
                                        <li>
                                            <p>可擴充三個額外的 DC 或 PWM 風扇插座，以及三個熱探針插座。 </p>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/extension_pd.png" alt="detail">
                                        </li>
                                        <li>
                                            <p>專用整合式電路，可防止每個風扇插座發生過熱和過電流問題。</p>
                                        </li>
                                        <li>
                                            <p>能在各元件的進水／出水口監控溫度。</p>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/inout_pd.png" alt="detail">
                                        </li>
                                        <li>
                                            <p>能持續監控整個迴圈的流動率</p>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/flow_pd.png" alt="detail">
                                        </li>
                                        <li>
                                            <p>自備水冷配置專用的 PWM/DC 接頭。</p>
                                            <img src="/assets/plugin_split/asus/layout/asus_cooling/image/aio_pump_pd.png" alt="detail">
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                    </section>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_lighting -->  
                    <script>
                        // for farbtastic.js jquery migrate
                        jQuery.browser = {};
                        (function() {
                            jQuery.browser.msie = false;
                            jQuery.browser.version = 0;
                            if (navigator.userAgent.match(/MSIE ([0-9]+)./)) {
                                jQuery.browser.msie = true;
                                jQuery.browser.version = RegExp.$1;
                            }
                        })();
                    </script>
                    <script src="/assets/plugin_split/asus/layout/asus_lighting/farbtastic.js"></script>           
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_lighting/asus_lighting.css">
                    <script src="/assets/plugin_split/asus/layout/asus_lighting/asus_lighting.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_lighting">
                        <h2><span class="top">領先</span>自訂功能</h2>
                        <div class="hd-sec-oled hd-w1200">
                            <div class="hd-ib hd-col40">
                                <h3 class="txt-red" style="text-transform: initial;">LiveDash OLED</h3>
                                <p>Maximus X Formula 配備 LiveDash，此內建的 1.3 吋 OLED 面板可顯示實用系統資訊及自訂繪圖。 LiveDash 在開機自檢 (POST) 階段會透過簡單的語言和傳統的 POST 編碼來顯示重要資訊狀態。 此外，動態面板會在正常運作下顯示 CPU 頻率、裝置溫度、風扇速度或水冷散熱區域資訊等選項， 您也能自訂預設 LiveDash GIF，顯示專屬影像或動畫。
                                </p>
                                <div class="hd-col45 fleft">
                                    <img src="/assets/plugin_split/asus/layout/asus_lighting/image/elephant.gif" alt="gif:elephant">
                                    <a href="/assets/plugin_split/asus/layout/asus_lighting/image/elephant.gif" class="hd-downloadbox" download>下載</a>
                                </div>
                                <div class="hd-col45 fright">
                                    <img src="/assets/plugin_split/asus/layout/asus_lighting/image/guitar.gif" alt="gif:guitar">
                                    <a href="/assets/plugin_split/asus/layout/asus_lighting/image/guitar.gif" class="hd-downloadbox" download>下載</a>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="hd-ib hd-col70">
                                <img src="/assets/plugin_split/asus/layout/asus_lighting/image/oled.png" alt="Rampage VI Extreme">
                                <img src="/assets/plugin_split/asus/layout/asus_lighting/image/oled.gif" alt="OLED gif" class="hd-window">
                            </div>
                        </div>
                        <div class="hd-sec-lighting" style="background-image: url('/assets/plugin_split/asus/layout/asus_lighting/image/bg-lighting.jpg');">
                            <div class="hd-w1200" style="padding-bottom: 0;">
                                <div class="hd-col55 txt-left fright">
                                    <h3 class="txt-red">AURA SYNC</h3>
                                    <p>ASUS Aura 採用 RGB 燈光模組，提供各種功能預設值，可透過應用程式調整內建RGB LED並進行整合及控制，展現完美和諧的同步燈效；Aura Sync 以繽紛酷炫的燈光效果，打造玩家個人電競風格。並能與不斷推陳出新的支援 ASUS Aura Sync 硬體設備進行完美同步。
                                    </p>
                                    <ul class="hd-controls txt-center">
                                        <li data-style="1" data-animate="static 2s" class="hd-active">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/static.png" alt="Static">
                                            <b>靜態</b>
                                            <small>保持恆亮</small>
                                        </li>
                                        <li data-style="1" data-animate="breathing 4s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/breathing.png" alt="Breathing">
                                            <b>脈動</b>
                                            <small>漸亮與漸暗</small>
                                        </li>
                                        <li data-style="1" data-animate="strobing .5s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/strobing.png" alt="Strobing">
                                            <b>頻繁</b>
                                            <small>閃爍</small>
                                        </li>
                                        <li data-style="2" data-animate="cycle 8s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/color_cycle.png" alt="Color cycle">
                                            <b>色彩循環</b>
                                            <small>在七彩顏色<br>之間轉換</small>
                                        </li>
                                        <li data-style="2" data-animate="music 3s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/music_effect.png" alt="Music effect">
                                            <b>音樂效果</b>
                                            <small>隨著音樂<br>節奏脈動</small>
                                        </li>
                                        <li data-style="2" data-animate="cpu 6s alternate-reverse">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/cpu_temp.png" alt="Smart">
                                            <b>智慧</b>
                                            <small>隨著 CPU 負載<br>改變顏色</small>
                                        </li>
                                        <li data-style="3" data-animate="rainbow 5s linear">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/rainbow.png" alt="Rainbow">
                                            <b>彩虹</b>
                                            <small>千變萬化的繽紛<br>色彩</small>
                                        </li>
                                        <li data-style="4" data-animate="colorrun 21s infinite , comet 3s -.5s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/comet.png" alt="Comet">
                                            <b>彗星</b>
                                            <small>一道流曳的<br>光束</small>
                                        </li>
                                        <li data-style="5" data-animate="colorrun 6s infinite , flash 1s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/flash_dash.png" alt="Flash &amp; dash">
                                            <b>快閃猛擊</b>
                                            <small>單一顏色步階<br>快閃</small>
                                        </li>
                                        <li data-style="1" data-animate="rainbow 15s infinite , wave 5s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/wave.png" alt="Wave">
                                            <b>波動</b>
                                            <small>單色或多色波動顯示</small>
                                        </li>
                                        <li data-style="6" data-animate="yoyo 5s">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/yoyo.png" alt="Glowing Yo Yo">
                                            <b>閃爍溜溜球</b>
                                            <small>彈跳光束</small>
                                        </li>
                                        <li data-style="7" data-animate="">
                                            <img src="/assets/plugin_split/asus/layout/asus_lighting/image/starry_night.png" alt="Starry night">
                                            <b>星光夜景</b>
                                            <small>模仿夜空的顯示</small>
                                        </li>
                                    </ul>
                                    <div id="colorpicker"></div>
                                </div>
                                <div class="hd-lightingbox fleft">
                                    <div class="hd-lighting">
                                        <div id="colorbox">
                                            <div id="greybg"></div>
                                            <div id="color">
                                                <ul class="starry_night">
                                                    <li></li>
                                                    <li style="display: none;"></li>
                                                    <li></li>
                                                    <li></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <img id="hd-lightingimg" src="/assets/plugin_split/asus/layout/asus_lighting/image/lighting.png"></img>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div class="hd-sec-rgbheader">
                            <div class="hd-w1200">
                                <div class="hd-col65 fleft">
                                    <h3 class="txt-red">RGB 完美燈效</h3>
                                    <p>Maximus X Formula 內建兩個 5050 RGB 插座及兩個可編程燈條插座，可連接至相容的燈條、風扇、冷卻器和電腦機殼，將燈效表現提升至全新境界。
                                    </p>
                                    <p class="txt-grey">
                                        *可編程 RGB 插座支援 WS2812B 可編程RGB LED 燈條（5V／Data／Ground），最大功率額定值為 3A (5V)，最多容納 60 個 LED。
                                        <br> * Aura RGB 燈條插座支援 5050 RGB LED 燈條，最大功率額定值為 3A (12V)。 為呈現最大亮度，建議燈條長度避免超過 3 公尺。
                                        <br> *隨附 RGB 和可編程RGB LED 延長線。 LED 燈條和 Aura Sync 相容裝置須另購。
                                    </p>
                                </div>
                                <img src="/assets/plugin_split/asus/layout/asus_lighting/image/headers.jpg" alt="RGB Headers focus">
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div class="hd-more"></div>
                        <div class="hd-sec-hidden">
                            <div class="hd-sec-sdk" style="background: url('/assets/plugin_split/asus/layout/asus_lighting/image/bg-glow.jpg') center center no-repeat; background-size: contain;">
                                <div class="hd-w1400 txt-center">
                                    <h3 class="txt-red">Aura 燈效控制</h3>
                                    <p>ASUS Aura 全新進化，便利性更甚以往。</p>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/logo_sync.png" alt="ASUS AURA SYNC" id="sdk_logo">
                                    <div class="hd-ib hd-col50 left">
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/sdk_ui_1.png" alt="UI 1">
                                        <p>Aura 現支援 RGB 色碼，配置更輕鬆</p>
                                    </div>
                                    <div class="hd-ib hd-col50 right">
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/sdk_ui_2.png" alt="UI 2">
                                        <p>您也可以自訂溫度臨界值，選擇以 RGB 燈效呈現 CPU 和 GPU 溫度的方式</p>
                                    </div>
                                </div>
                            </div>
                            <div class="hd-sec-sync">
                                <div class="hd-w1200">
                                    <div class="hd-col65 txt-left">
                                        <h3 class="txt-red">
                                            燈效無限可能
                                            <img class="title_logo" src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/logo_sdk.png" alt="aura-sync">
                                        </h3>
                                        <p style="margin-bottom: 10px;">
                                            ASUS Aura SDK 讓開發者可充分運用支援 Aura Sync 電腦裝備的系統資源。SDK 為強化系統及其它週邊配備 RGB 燈效的遊戲及軟體，提供了一個可不斷進化的工具套件。而透過 Aura 相容的硬體配備，不僅能以燈效呈現遊戲效果、警示和音效表現，營造令人驚艷的視覺感官，還可將系統參數 ( 如溫度 ) 搭配燈效運作，提供監控重要資訊的嶄新介面。
            
                                        </p>
                                        <p>請造訪 ASUS Aura 網站深入瞭解 <a href="https://www.asus.com/campaign/aura/tw/SDK.html" target="_blank" class="hd-link">Aura SDK</a>。</p>
                                    </div>
                                </div>
                                <div class="hd-bg">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/aura_sync.jpg" alt="AURA SYNC products">
                                    <!-- <img src="" data-source="/assets/plugin_split/asus/layout/asus_lighting/image/aura_sync.png"> -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_lighting_module -->  
                    {{--
                    <script>
                        // for farbtastic.js jquery migrate
                        jQuery.browser = {};
                        (function() {
                            jQuery.browser.msie = false;
                            jQuery.browser.version = 0;
                            if (navigator.userAgent.match(/MSIE ([0-9]+)./)) {
                                jQuery.browser.msie = true;
                                jQuery.browser.version = RegExp.$1;
                            }
                        })();
                    </script>
                    <script src="/assets/plugin_split/asus/lighting/asus_lighting_module/farbtastic.js"></script>           
                    <link rel="stylesheet" href="/assets/plugin_split/asus/lighting/asus_lighting_module/asus_lighting_module.css">
                    <script src="/assets/plugin_split/asus/lighting/asus_lighting_module/asus_lighting_module.js"></script>
                    <!-- ---------------------- -->  
                    <div class="asus_lighting_module" style="background-image: url('/assets/plugin_split/asus/layout/asus_lighting/image/bg-lighting.jpg');">
                        <div class="hd-w1200" style="padding-bottom: 0;">
                            <div class="hd-col55 txt-left fright">
                                <h3 class="txt-red">AURA SYNC(獨立模組)</h3>
                                <p>ASUS Aura 採用 RGB 燈光模組，提供各種功能預設值，可透過應用程式調整內建RGB LED並進行整合及控制，展現完美和諧的同步燈效；Aura Sync 以繽紛酷炫的燈光效果，打造玩家個人電競風格。並能與不斷推陳出新的支援 ASUS Aura Sync 硬體設備進行完美同步。
                                </p>
                                <ul class="hd-controls txt-center">
                                    <li data-style="1" data-animate="static 2s" class="hd-active">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/static.png" alt="Static">
                                        <b>靜態</b>
                                        <small>保持恆亮</small>
                                    </li>
                                    <li data-style="1" data-animate="breathing 4s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/breathing.png" alt="Breathing">
                                        <b>脈動</b>
                                        <small>漸亮與漸暗</small>
                                    </li>
                                    <li data-style="1" data-animate="strobing .5s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/strobing.png" alt="Strobing">
                                        <b>頻繁</b>
                                        <small>閃爍</small>
                                    </li>
                                    <li data-style="2" data-animate="cycle 8s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/color_cycle.png" alt="Color cycle">
                                        <b>色彩循環</b>
                                        <small>在七彩顏色<br>之間轉換</small>
                                    </li>
                                    <li data-style="2" data-animate="music 3s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/music_effect.png" alt="Music effect">
                                        <b>音樂效果</b>
                                        <small>隨著音樂<br>節奏脈動</small>
                                    </li>
                                    <li data-style="2" data-animate="cpu 6s alternate-reverse">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/cpu_temp.png" alt="Smart">
                                        <b>智慧</b>
                                        <small>隨著 CPU 負載<br>改變顏色</small>
                                    </li>
                                    <li data-style="3" data-animate="rainbow 5s linear">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/rainbow.png" alt="Rainbow">
                                        <b>彩虹</b>
                                        <small>千變萬化的繽紛<br>色彩</small>
                                    </li>
                                    <li data-style="4" data-animate="colorrun 21s infinite , comet 3s -.5s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/comet.png" alt="Comet">
                                        <b>彗星</b>
                                        <small>一道流曳的<br>光束</small>
                                    </li>
                                    <li data-style="5" data-animate="colorrun 6s infinite , flash 1s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/flash_dash.png" alt="Flash &amp; dash">
                                        <b>快閃猛擊</b>
                                        <small>單一顏色步階<br>快閃</small>
                                    </li>
                                    <li data-style="1" data-animate="rainbow 15s infinite , wave 5s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/wave.png" alt="Wave">
                                        <b>波動</b>
                                        <small>單色或多色波動顯示</small>
                                    </li>
                                    <li data-style="6" data-animate="yoyo 5s">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/yoyo.png" alt="Glowing Yo Yo">
                                        <b>閃爍溜溜球</b>
                                        <small>彈跳光束</small>
                                    </li>
                                    <li data-style="7" data-animate="">
                                        <img src="/assets/plugin_split/asus/layout/asus_lighting/image/starry_night.png" alt="Starry night">
                                        <b>星光夜景</b>
                                        <small>模仿夜空的顯示</small>
                                    </li>
                                </ul>
                                <div id="colorpicker"></div>
                            </div>
                            <div class="hd-lightingbox fleft">
                                <div class="hd-lighting">
                                    <div id="colorbox">
                                        <div id="greybg"></div>
                                        <div id="color">
                                            <ul class="starry_night">
                                                <li></li>
                                                <li style="display: none;"></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <img id="hd-lightingimg" src="/assets/plugin_split/asus/layout/asus_lighting/image/lighting.png"></img>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>--}}
                    <!-- 換膚設定 -->        
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_connectivity -->  
                    <script src="/assets/plugin_split/asus/layout/asus_connectivity/scrollreveal.min.js"></script>
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_connectivity/asus_connectivity.css">
                    <script src="/assets/plugin_split/asus/layout/asus_connectivity/asus_connectivity.js"></script>
                    <!-- ---------------------- -->                    
                    <section id="asus_connectivity">
                        <div id="hd_lightbox">
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
                        <h2 class="txt-center">
                            <span class="top">最佳</span>連線能力
                            <span class="bottom"> </span>
                        </h2>
                        <div class="hd-sec-wifi">
                            <div class="hd-w1200">
                                <div class="hd-col70 fright">
                                    <img src="/assets/plugin_split/asus/layout/asus_connectivity/image/wifi.png">
                                    <ul class="hd-num">
                                        <li>1</li>
                                        <li>2</li>
                                    </ul>
                                </div>
                                <div class="hd-col40 fleft">
                                    <h3 class="txt-red txt_decolineflip">2X2 802.11 AC WIFI 搭配 MU-MIMO</h3>
                                    <!-- <h4 class="txt-grey" style="text-transform: initial;">FASTEST ONBOARD WI-FI a€” UP TO 4.6 Gbps</h4> -->
                                    <p>ROG Maximus X Formula 採用 2x2 雙頻 2.4/5GHz 天線，提供高達 867Mbps* 的傳輸速度 &mdash; 最新的多使用者 MIMO (MU-MIMO) 技術** 則讓每位連線使用者體驗最佳無線網路及連網速度！</p>
                                    <p class="txt-grey">
                                        * 實際速度有所差異，Wi-Fi 熱點功能採用 802.11a/b/g/n，Windows 10 目前不支援 Wi-Fi 熱點功能。
                                        <br> ** 須備有支援 MU-MIMO 的用戶端。
                                    </p>
                                </div>
                                <div style="clear:both"></div>
                                <ul class="hd-description">
                                    <li>
                                        <h3 class="txt-red txt_decolineflip">Intel 乙太網路</h3>
                                        <!-- <h4 class="txt-grey">Avoid bottlenecks with 10X faster Ethernet</h4> -->
                                        <p>搭載最新的 Intel<sup>&reg;</sup> 乙太網路 (I219-V)，提供更快、更順暢的遊戲體驗。 Intel 乙太網路控制器本身就與 CPU 及晶片組搭配得天衣無縫，不但減少處理器使用率，同時提供絕佳 TCP 和 UDP 傳輸量，以便更有餘裕地執行遊戲及其他工作。</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hd-more"></div>
                        <div class="hd-sec-hidden">
                            <div class="hd-sec-languard hd-w1200">
                                <div class="hd-col50 fleft">
                                    <div class="hd-content txt-left">
                                        <h3 class="txt-red">更高傳輸負載。最佳突波防護</h3>
                                        <h4 class="txt-grey">LANGuard</h4>
                                        <p>
                                            LANGuard 為您的戰役帶來更安全可靠的連線！先進的訊號耦合技術與優質的表面貼裝技術雙管齊下，保護您的連線，也為您的 ROG Maximus X Formula 帶來更高的傳輸負載。 此外，透過靜電保護與突波防護元件（ESD 防護），提供 1.9 倍靜電容限及 2.5 倍抗突波防護（最高 15kV）！

                                        </p>
                                    </div>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_connectivity/image/tag05.png">
                                </div>
                                <div class="hd-col50 fright">
                                    <img src="/assets/plugin_split/asus/layout/asus_connectivity/image/languard.png" data-source="/assets/plugin_split/asus/layout/asus_connectivity/image/languard.png" alt="languard" style="visibility: visible;">
                                    <ul>
                                        <li>
                                            <p class="txt-red">ESD 防護</p>
                                        </li>
                                        <li>
                                            <p class="txt-red">突波防護元件</p>
                                        </li>
                                    </ul>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="hd-sec-gamefirst hd-w1200 txt-center">
                                <h3 class="txt-red">合力驅逐延遲</h3>
                                <h4 class="txt-grey">GAMEFIRST IV</h4>
                                <p>
                                    GameFirst IV 將網路流量最佳化，提供更快速且無延遲的線上遊戲品質 — 現已新增 Multi-Gate Teaming 來集結所有網路，獲取最大頻寬和最流暢的遊戲體驗。 另外，全新智慧模式會自動分析新的應用程式資料，以編輯資料庫，確保每款遊戲都能發揮最佳效能。
                                </p>
                                <div id="gamevideo" class="play-tutorial" data-src="https://www.youtube-nocookie.com/embed/wnEQ_xjd0Qo">
                                    <h4><span>觀看影片</span></h4></div>
                                <div class="hd-pic03 hd-w1200">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_connectivity/image/gamefirst-greater.png" alt="greater total bandwidth" id="greater">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_connectivity/image/gamefirst.png" alt="gamefirst">
                                </div>
                            </div>
                        </div>
                        <div class="hd-sec-logos txt-center">
                            <div class="hd-w1200">
                                <h3 class="txt-red">雙 PCIE 3.0 M.2</h3>
                                <!-- <h4 class="txt-grey">LET YOUR SSD SCREAM AT TOP SPEED</h4> -->
                                <p class="hd-w800">ROG Maximus X Formula 支援兩個 M.2 磁碟機，提供高達 32Gbps 的超快傳輸速度。 第一個插槽位於 PCH 散熱器下方，可容納長達 110mm（22110 型）的 M.2 磁碟機。 第二個插槽位於板卡下緣，用於垂直安裝，利用機殼氣流為高效能 M.2 磁碟機散熱。</p>

                                <figure class="hd-ib hd-col45">
                                    <div class="hd-title">
                                        <h4 class="txt-red txt_decoline txt-left" style="max-width: 460px; padding-bottom: 10px; margin:0 auto 10px;">利用 2 個板載<br>M.2 加速至 32Gbit/s</h4>
                                        <img src="/assets/plugin_split/asus/layout/asus_connectivity/image/tag04.png">
                                    </div>
                                    <img src="/assets/plugin_split/asus/layout/asus_connectivity/image/optane.png" alt="intel OPTANE memory" class="hd-ib ib-bottom" style="margin-bottom: 0; margin-right: 20px;">
                                    <a href="https://www.asus.com/microsite/mb/intel-optane-ready" target="_blank" class="hd-link txt-red txt-left hd-ib ib-bottom">深入瞭解 ></a>
                                </figure>
                                <div class="hd-ib hd-col55" style="padding:0">
                                    <img src="/assets/plugin_split/asus/layout/asus_connectivity/image/speed02.jpg">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">ㄋ
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_performance -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_performance/asus_performance.css">
                    <script src="/assets/plugin_split/asus/layout/asus_performance/asus_performance.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_performance">
                        <h2 class="left"><span class="top">最佳</span>遊戲效能</h2>
                        <div class="hd-sec-ddr4 hd-w1200">
                            <div class="hd-col45 txt-left fright">
                                <h3 class="txt-red">DDR4 超頻強度數據</h3>
                                <p>
                                    ASUS OptiMem 透過將記憶體佈線及通孔繞至最佳 PCB 層的方式維持記憶體訊號完整性，且 T 型拓撲配置可平衡記憶體插槽間的佈線長度，確保按時序傳輸訊號。 此類強化功能可增加超頻空間並改善穩定性，使所有插槽達 DDR4-4133 以上的記憶體速度。
                                </p>
                            </div>
                            <div class="hd-col60 txt-left fleft">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/ddr4.jpg" style="margin-left: 0;">
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="hd-sec-prolock hd-w1200">
                            <div class="hd-ib hd-col40">
                                <h3 class="txt-red">超頻設計 &mdash; ASUS PRO CLOCK II 技術</h3>
                                <p>專為第 8 代 Intel® 處理器所設計的專用基礎時脈（BCLK）產生器，可擴充CPU及記憶體的超頻幅度。此自訂解決方案與TPU 搭配運作，強化電壓及基礎時脈超頻控制讓您運用自如，將效能達到巔峰。
                                </p>
                            </div>
                            <div class="hd-ib hd-col60">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/proclock.jpg">
                            </div>
                        </div>
                        <div class="hd-sec-overview">
                            <div class="hd-w1200 txt-center">
                                <h3 class="txt-red">5向全方位優化
                                </h3>
                                <h4 class="txt-grey">超頻和散熱，單鍵搞定！</h4>
                                <p>
                                    ASUS 5 向全方位優化為電腦賦予智慧，一鍵即可輕鬆搞定複雜的調校設定。根據即時使用情形，以動態方式將系統關鍵層面最佳化，提供專為電腦量身打造的超頻和散熱設定檔。
        
                                </p>
                                <p class="txt-left">
                                    &#8901; 自動調校應用程式，可根據您專屬的系統配置，提供超頻和散熱設定最佳化。
                                    <br> &#8901; 風扇在日常運作時保持寂靜，當系統 CPU 或 GPU 於高負載狀態時，則提高風扇轉速，提供最佳散熱。
                                    <br> &#8901; 全新極限壓力測試，讓使用者可輕鬆對CPU或記憶體的負載進行優化與超頻。
                                </p>
                            </div>
                            <div class="hd-menu txt-center">
                                <ul class="hd-w1200">
                                    <li data-detail=".hd-detail01">
                                        <h4>TPU<br>處理單元</h4>
                                    </li>
                                    <li data-detail=".hd-detail02">
                                        <h4>EPU<br>能源處理單元</h4>
                                    </li>
                                    <li data-detail=".hd-detail03" class="hd-active">
                                        <h4 style="line-height: 53px;">Fan Xpert 4</h4>
                                    </li>
                                    <li data-detail=".hd-detail04">
                                        <h4>Digi+<br>電源控制</h4>
                                    </li>
                                    <li data-detail=".hd-detail05">
                                        <h4>Turbo Core<br>應用程式</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="hd-w1200 hd-details">
                                <div class="hd-detail hd-detail01">
                                    <img src="/assets/plugin_split/asus/layout/asus_performance/image/ui_tpu.png" class="hd-col50">
                                    <div class="hd-col50 txt-left">
                                        <h4 class="txt-red">CPU 效能提升</h4>
                                        <p>透過 ASUS AI Suite 3 公用程式，釋放電腦的完整效能。 TurboV 處理單元 (TPU) 是自動系統調校公用程式的處理核心，能微調電壓、監控系統狀態及調整超頻參數，提供最佳效能。</p>
                                    </div>
                                </div>
                                <div class="hd-detail hd-detail02">
                                    <img src="/assets/plugin_split/asus/layout/asus_performance/image/allround.png" class="hd-col50">
                                    <div class="hd-col50 txt-left">
                                        <h4 class="txt-red">全方位高效節能</h4>
                                        <p>透過能源處理單元 (EPU)，即可享有全系統的節能效果。 EPU 透過離開模式自動將耗電量最佳化，大幅提升節能效果，這項聰明的設定可關閉未使用的 I/O 控制器，打造極致節能的環境。</p>
                                    </div>
                                </div>
                                <div class="hd-detail txt-center hd-detail03 hd-open">
                                    <img src="/assets/plugin_split/asus/layout/asus_performance/image/rog_performance_3-2.png" class="hd-col50">
                                    <div class="hd-col50 txt-left">
                                        <h4 class="txt-red">空水冷皆可彈性控制散熱
                                        </h4>
                                        <p>Maximus X Formula 讓您透過 Fan Xpert 4 或獲獎肯定的 UEFI，全面控制風扇和水冷幫浦，甚至是一體式(AIO)水冷。無論您是採用空冷或水冷散熱，只要按一下，自動調校模式即會智慧設定所有參數。 另有極靜模式，將所有風扇速度降至預設最小值以下，讓系統在執行低負載工作時保持安靜無聲。
                                        </p>
                                    </div>
                                </div>
                                <div class="hd-detail hd-detail04">
                                    <img src="/assets/plugin_split/asus/layout/asus_performance/image/precise.jpg" class="hd-col50">
                                    <div class="hd-col50 txt-left">
                                        <h4 class="txt-red">精確的數位電源控制</h4>
                                        <p>ROG 的 Digi+ 電壓調節模組 (VRM) 能即時掌握電壓下降情形，切換頻率與電源效率的設定，讓您微調 CPU 電壓調節，以達到極致穩定性和效能。</p>
                                    </div>
                                </div>
                                <div class="hd-detail hd-detail05">
                                    <img src="/assets/plugin_split/asus/layout/asus_performance/image/tubro01.png" class="hd-col50">
                                    <div class="hd-col50 txt-left">
                                        <h4 class="txt-red">為各應用程式最佳化個別核心效能</h4>
                                        <p>Intel 最新處理器搭載個別核心微調，ASUS Turbo Core 應用程式善用此功能，讓您能夠指派應用程式給特定的處理器核心，將運算能力優先安排給需求最高的工作。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="hd-more"></div>
                        <div class="hd-sec-hidden">
                            <div class="hd-sec-mode hd-w1100 txt-center">
                                <h3 class="txt-red">媒體盛讚的 UEFI BIOS</h3>
                                <p class="hd-ib hd-w800">
                                    最流暢靈敏的滑鼠控制圖形 BIOS 歷經一番強化，變得更讓人愛不釋手。 不論您是電腦新手或資深超頻玩家，EZ 和進階模式都能助您輕鬆快速上手。
        
                                </p>
                                <figure class="hd-ib hd-col50 ib-top">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_performance/image/EzMode_left.png">
                                    <h4 class="txt-red txt_decoline">
                                        EZ 模式
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
                                                <p class="txt-red">EZ Tuning Wizard</p>
                                                <p>OC 及 RAID。 可選擇硬體並套用至不同預設情境，以調校系統效能或是簡化 RAID 設定，加快資料擷取和備份速度！</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">直覺式圖形風扇控制</p>
                                                <p>只要透過滑鼠拖曳曲線位置，即可輕易微調各個風扇轉速。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">SATA 資訊</p>
                                                <p>檢視 SATA 連接埠的詳細資料，以便輕鬆辨識裝置。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">快速時鐘調整</p>
                                                <p>可使用滑鼠控制，調整日期及時間設定。</p>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <figure class="hd-ib hd-col50 ib-top">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_performance/image/EzMode_right.png">
                                    <h4 class="txt-red txt_decoline">
                                        進階模式
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
                                                <p class="txt-red">我的最愛</p>
                                                <p>能快速找到調整選項，並將偏好工具加入清單內容。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">EZ Flash 3</p>
                                                <p>在 BIOS 介面下，透過網際網路能快速取得最新 BIOS。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">SMART</p>
                                                <p>可檢查儲存裝置中的自我監控、分析和回報技術紀錄，以評估可靠度及偵測潛在的故障情形。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">GPU POST</p>
                                                <p>自動偵測所選定的 ASUS 顯示卡，以檢視詳細資訊。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">Secure Erase</p>
                                                <p>將 SSD 恢復為原廠設定狀態。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">上次修改紀錄</p>
                                                <p>追蹤上次變更內容，將偏好的設定檔儲存至 USB 隨身碟。</p>
                                            </li>
                                            <li>
                                                <p class="txt-red">重新命名 SATA 連接埠</p>
                                                <p>重新命名 SATA 連接埠以方便辨識。</p>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </section>                    
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_pagination -->  
                    {{--  <link rel="stylesheet" href="/assets/plugin_split/asus/pagination/asus_pagination/asus_pagination.css">
                    <script src="/assets/plugin_split/asus/pagination/asus_pagination/asus_pagination.js"></script>
                    <!-- ---------------------- -->  
                    <div class="asus_pagination">
                        <div class="hd-w1200 txt-center">
                            <h3 class="txt-red">5向全方位優化
                            </h3>
                            <h4 class="txt-grey">超頻和散熱，單鍵搞定！</h4>
                            <p>
                                ASUS 5 向全方位優化為電腦賦予智慧，一鍵即可輕鬆搞定複雜的調校設定。根據即時使用情形，以動態方式將系統關鍵層面最佳化，提供專為電腦量身打造的超頻和散熱設定檔。
    
                            </p>
                            <p class="txt-left">
                                &#8901; 自動調校應用程式，可根據您專屬的系統配置，提供超頻和散熱設定最佳化。
                                <br> &#8901; 風扇在日常運作時保持寂靜，當系統 CPU 或 GPU 於高負載狀態時，則提高風扇轉速，提供最佳散熱。
                                <br> &#8901; 全新極限壓力測試，讓使用者可輕鬆對CPU或記憶體的負載進行優化與超頻。
                            </p>
                        </div>
                        <div class="hd-menu txt-center">
                            <ul class="hd-w1200">
                                <li data-detail=".hd-detail01">
                                    <h4>TPU<br>處理單元</h4>
                                </li>
                                <li data-detail=".hd-detail02">
                                    <h4>EPU<br>能源處理單元</h4>
                                </li>
                                <li data-detail=".hd-detail03" class="hd-active">
                                    <h4 style="line-height: 53px;">Fan Xpert 4</h4>
                                </li>
                                <li data-detail=".hd-detail04">
                                    <h4>Digi+<br>電源控制</h4>
                                </li>
                                <li data-detail=".hd-detail05">
                                    <h4>Turbo Core<br>應用程式</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="hd-w1200 hd-details">
                            <div class="hd-detail hd-detail01">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/ui_tpu.png" class="hd-col50">
                                <div class="hd-col50 txt-left">
                                    <h4 class="txt-red">CPU 效能提升</h4>
                                    <p>透過 ASUS AI Suite 3 公用程式，釋放電腦的完整效能。 TurboV 處理單元 (TPU) 是自動系統調校公用程式的處理核心，能微調電壓、監控系統狀態及調整超頻參數，提供最佳效能。</p>
                                </div>
                            </div>
                            <div class="hd-detail hd-detail02">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/allround.png" class="hd-col50">
                                <div class="hd-col50 txt-left">
                                    <h4 class="txt-red">全方位高效節能</h4>
                                    <p>透過能源處理單元 (EPU)，即可享有全系統的節能效果。 EPU 透過離開模式自動將耗電量最佳化，大幅提升節能效果，這項聰明的設定可關閉未使用的 I/O 控制器，打造極致節能的環境。</p>
                                </div>
                            </div>
                            <div class="hd-detail txt-center hd-detail03 hd-open">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/rog_performance_3-2.png" class="hd-col50">
                                <div class="hd-col50 txt-left">
                                    <h4 class="txt-red">空水冷皆可彈性控制散熱
                                    </h4>
                                    <p>Maximus X Formula 讓您透過 Fan Xpert 4 或獲獎肯定的 UEFI，全面控制風扇和水冷幫浦，甚至是一體式(AIO)水冷。無論您是採用空冷或水冷散熱，只要按一下，自動調校模式即會智慧設定所有參數。 另有極靜模式，將所有風扇速度降至預設最小值以下，讓系統在執行低負載工作時保持安靜無聲。
                                    </p>
                                </div>
                            </div>
                            <div class="hd-detail hd-detail04">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/precise.jpg" class="hd-col50">
                                <div class="hd-col50 txt-left">
                                    <h4 class="txt-red">精確的數位電源控制</h4>
                                    <p>ROG 的 Digi+ 電壓調節模組 (VRM) 能即時掌握電壓下降情形，切換頻率與電源效率的設定，讓您微調 CPU 電壓調節，以達到極致穩定性和效能。</p>
                                </div>
                            </div>
                            <div class="hd-detail hd-detail05">
                                <img src="/assets/plugin_split/asus/layout/asus_performance/image/tubro01.png" class="hd-col50">
                                <div class="hd-col50 txt-left">
                                    <h4 class="txt-red">為各應用程式最佳化個別核心效能</h4>
                                    <p>Intel 最新處理器搭載個別核心微調，ASUS Turbo Core 應用程式善用此功能，讓您能夠指派應用程式給特定的處理器核心，將運算能力優先安排給需求最高的工作。</p>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_audio -->  
                    <script src="/assets/plugin_split/asus/layout/asus_connectivity/scrollreveal.min.js"></script>
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_audio/asus_audio.css">
                    <script src="/assets/plugin_split/asus/layout/asus_audio/asus_audio.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_audio">
                        <h2 class="right"><span class="left">最佳</span>遊戲音效</h2>
                        <div class="hd-sec-audio txt-center" style="background: url(/assets/plugin_split/asus/layout/asus_audio/image/bg-glow.jpg) center bottom no-repeat;background-size: contain;">
                            <div class="hd-w1200" style="z-index: 3;">
                                <h3 class="txt-red" style="text-transform: initial;">SupremeFX</h3>
                                <div class="hd-w1100">
                                    <p>ROG 令人驚嘆的 SupremeFX 音訊技術再進化，於音訊輸入時達到出色的 113dB 訊噪比，提供前所未有的最佳錄音品質！同時新增低壓降穩壓器，將更純淨的電力輸送至 SupremeFX S1220 音效晶片，而 ESS® Sabre Hi-Fi ES9023P 數位類比轉換器，則提供更優質的前置面板輸出，再加上 Texas Instruments® RC4580 運算擴大器的高增益、低失真特色，全新 SupremeFX 將讓您體驗前所未有音效饗宴。
                                    </p>
                                </div>
                            </div>
                            <div class="hd-w1300 txt-left">
                                <ul class="hd-supremefx">
                                    <li id="supremefx"><img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx.png"></li>
                                    <li>
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx-1.png">
                                        <div class="txt-box">
                                            <h4 class="txt-red">S1220 編解碼器</h4>
                                            <p>10 個 DAC 聲道、同步 7.1 聲道播放、獨立 2.0 聲道、多重串流立體聲至前置面板輸出</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx-2.png">
                                        <div class="txt-box">
                                            <h4 class="txt-red">ESS<sup>&reg;</sup> SABRE9023P DAC</h4>
                                            <p>創造完美平衡，呈現可達 -112dB THD 的頂級音效清晰度</p>
                                        </div>
                                    </li>
                                    <li class="hd-active">
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx-3.png">
                                        <div class="txt-box">
                                            <h4 class="txt-red">Nichicon 電容</h4>
                                            <p>頂級日本製元件呈現更溫暖、自然的聲音，且清晰度和保真度俱佳。</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx-4.png">
                                        <div class="txt-box">
                                            <h4 class="txt-red">鍍金音訊接頭

                                            </h4>
                                            <p>防止氧化，確保可靠連接</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/supremefx-5.png">
                                        <div class="txt-box">
                                            <h4 class="txt-red">切換 MOSFET</h4>
                                            <p>獨特設計提供晶片阻抗感測功能，與前／後耳機輸出連接</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="audio-switch hd-w1100">
                                <li data-supremefx="1">
                                    <h4 class="txt-red">S1220 編解碼器</h4>
                                    <span></span>
                                </li>
                                <li data-supremefx="2">
                                    <h4 class="txt-red">ESS<sup>&reg;</sup> SABRE9023P DAC<sup>&trade;</sup></h4>
                                    <span></span>
                                </li>
                                <li class="hd-active" data-supremefx="3">
                                    <h4 class="txt-red">NICHICON 電容</h4>
                                    <span></span>
                                </li>
                                <li data-supremefx="4">
                                    <h4 class="txt-red">鍍金<br>音訊接頭</h4>
                                    <span></span>
                                </li>
                                <li data-supremefx="5">
                                    <h4 class="txt-red">切換 MOSFET</h4>
                                    <span></span>
                                </li>
                                <li id="dragger" class="pos3" data-supremefx="3"></li>
                            </ul>
                            <a href="https://www.asus.com/microsite/mb/ROG-supremefx-gaming-audio/?open=a2,a3,b1,c2,c3,c4,c5,c6,c7" target="_blank" class="btn-audio">按一下此處取得更多資訊</a>
                        </div>

                        <div class="hd-sec-sonic" style="background: url(/assets/plugin_split/asus/layout/asus_audio/image/SonicStudio_bg.jpg) center -27% no-repeat;">
                            <div class="hd-w1200">
                                <div class="hd-col80 txt-center" style="margin:0 auto">
                                    <h3 class="txt-red">Sonic Studio III</h3>
                                    <p>Sonic Studio 支援 VR 頭戴顯示器專用的 HRTF（頭部關連傳遞函數*）虛擬環繞音效，呈現「聲」歷其境的聽覺饗宴，讓您更加投入遊戲當中。 Sonic Studio 直覺式介面也提供一系列 EQ 選項，讓您依照個人喜好或耳機特性，量身打造音效。
                                        <br>
                                        <a href="https://www.asus.com/microsite/mb/ROG-supremefx-gaming-audio/#sonic_studio" target="_blank" class="hd-link">深入瞭解 ></a></p>
                                </div>
                            </div>
                            <figure>
                                <img src="/assets/plugin_split/asus/layout/asus_audio/image/SonicStudio_ui.jpg" alt="Sonic Studio UI">
                                <ul class="hd-num">
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                </ul>
                                <ul>
                                    <li>
                                        <h4 class="txt-red txt_decolineflip">應用程式特殊設定檔</h4>
                                        <p>可將自訂的音訊設定套用至不同應用程式，將所有聲音完美調校成您心目中的理想天籟。</p>
                                    </li>
                                    <li>
                                        <h4 class="txt-red txt_decolineflip">環繞音效</h4>
                                        <p>環繞音效提供身歷其境的音效體驗</p>
                                    </li>
                                    <li>
                                        <h4 class="txt-red txt_decoline">Sonic Studio Link</h4>
                                        <p>全新 Sonic Studio Link 虛擬實境功能擴增其 Oculus Rift 和 HTC Vive 等頭戴顯示器帶來的 HRTF 效果。</p>
                                        <img src="/assets/plugin_split/asus/layout/asus_audio/image/sonic_studio_link.png" alt="">
                                    </li>
                                </ul>
                            </figure>
                            <!-- <p class="hd-w1000 txt-grey" style="margin-top: 30px;">*A head-related transfer function is an audio algorithm derived from sound data recorded through a dummy head. Test tones are played from a spherical grid around the dummy head to obtain subtle changes in sounds that come from different directions. The results are combined into an algorithm that allows Sonic Studioa€?s virtual surround to process sound true to life.</p> -->
                            <div id="sonic_ui_on">
                                <img src="/assets/plugin_split/asus/layout/asus_audio/image/SonicStudio_uion.jpg" alt="Sonic Studio UI">
                            </div>
                        </div>
                        <div class="hd-sec-radar">
                            <div class="hd-w1200 txt-center">
                                <div class="hd-col80" style="margin:0 auto">
                                    <h3 class="txt-red">看聲辨位，主宰遊戲戰場！</h3>
                                    <h4 class="txt-grey">Sonic Radar III</h4>
                                    <p class="hd-col80" style="position: relative; z-index: 2;">Sonic Radar III 搭載進化音效引擎，可精準無比地處理聲音，讓您隨時掌握周圍狀況。 螢幕畫面的新增箭頭，則能幫您立即鎖定敵人位置！
                                        <br>
                                        <a href="https://www.asus.com/microsite/mb/ROG-supremefx-gaming-audio/#sonic_radar" target="_blank" class="hd-link">深入瞭解 ></a></p>
                                </div>
                                <figure>
                                    <img src="/assets/plugin_split/asus/layout/asus_audio/image/audio.gif" id="audiogif" class="hd-col65" style="visibility: visible;">
                                    <img src="/assets/plugin_split/asus/layout/asus_audio/image/audio-bg3.png" class="ghost-bg" style="visibility: visible;">
                                </figure>
                                <ul class="txt-left">
                                    <li class="audio-tag reveal3">
                                        <h4 class="txt-red txt_decoline">進化音效運算</h4>
                                        <small>全新 Sonic Radar 音效運算更加準確，可更加精準地定位敵人位置。</small>
                                    </li>
                                    <li class="audio-tag reveal3">
                                        <h4 class="txt-red txt_decoline">3D 引擎</h4>
                                        <small>Sonic Radar III 專為全新 HUD 量身打造，可在遊戲中顯示 3D 箭頭，提供更直覺的遊戲體驗。</small>
                                    </li>
                                    <li class="audio-tag reveal3">
                                        <h4 class="txt-red txt_decoline">音效強化</h4>
                                        <small>透過全新音效強化功能，就能直接聽到強化音效。</small>
                                        <small class="txt-grey">*HUD： 抬頭顯示器</small>
                                    </li>
                                    <li class="audio-tag reveal3">
                                        <h4 class="txt-red txt_decoline">音效雷達</h4>
                                        <small>Sonic Radar 3 可過濾周圍的雜訊及雜音，有效運作。</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_protection -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_protection/asus_protection.css">
                    <script src="/assets/plugin_split/asus/layout/asus_protection/asus_protection.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_protection">
                        <h2 class="txt-center">DIY 貼心設計</h2>
                        <div class="hd-sec-armor hd-w1200">
                            <div class="hd-col40 txt-left fright">
                                <h3 class="txt-red">ROG Armor</h3>
                                <h4 class="txt-grey">強韌的 ABS 頂蓋</h4>
                                <p>堅韌的熱塑性頂蓋使電腦保持整潔，並增添既獨特又內斂的風格。</p>
                                <h4 class="txt-grey">堅固的鋼製背板</h4>
                                <p>鋼製、電鍍鋅、冷軋鋼捲構造強化 Maximus X Formula 以防止彎曲，並採用與主機板相配的黑色。</p>
                            </div>
                            <div class="hd-col60 fleft">
                                <img src="/assets/plugin_split/asus/layout/asus_protection/image/armor.png">
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="hd-sec-rogarmor hd-w1000">
                            <div class="hd-col50 txt-left fleft">
                                <h3 class="txt-red">預裝 I/O 護板</h3>
                                <p>ROG 的 I/O 護板（專利申請中）最高能耐受 12kV 靜電放電，並預先安裝於主機板上。精巧全新設計，讓外觀與性能同樣完美無瑕。
                                </p>
                            </div>
                            <div class="hd-col50 fright">
                                <img src="/assets/plugin_split/asus/layout/asus_protection/image/shield.jpg" alt="pre-mouonted I/O shield">
                            </div>
                            <div style="clear:both;"></div>
                        </div>
        
                        <div class="hd-more"></div>
                        <div class="hd-sec-hidden">
                            <div class="hd-sec-protectionmore">
                                <div class="hd-w800">
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/safeslot.jpg">
                                        <h4 class="txt-red"><br>Safeslot</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>2 </span>倍插槽</p>
                                            <p>提供更強大的 PCIe 裝置固定力與剪切阻力。</p>
                                        </div>
                                    </figure>
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/ESD-guard.jpg">
                                        <h4 class="txt-red"><br>ESD 防護</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>2 </span>倍強大
                                            </p>
                                            <p>高出標準 2 倍的靜電防護。ESD 防護涵蓋 USB、音訊及 LAN 連接埠。
                                            </p>
                                        </div>
                                    </figure>
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/truevolt.jpg">
                                        <h4 class="txt-red"><br>TrueVolt USB</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>2</span> 組供應器</p>
                                            <p>專屬 USB 電源供應器穩定供應 5V 電力至所有 USB 連接埠，以減少功率波動，將資料遺失風險降到最低。
                                            </p>
                                        </div>
                                    </figure>
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/Q-connector.jpg">
                                        <h4 class="txt-red"><br>Q-connector</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>1</span> 體式插頭</p>
                                            <p>1 體式插頭設計，便於區分所有前置面板纜線。
                                            </p>
                                        </div>
                                    </figure>
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/Q-slot.jpg">
                                        <h4 class="txt-red"><br>Q-Slot</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>1</span> 個固定夾</p>
                                            <p>單一固定夾，便於替換或固定顯示卡。
                                            </p>
                                        </div>
                                    </figure>
                                    <figure>
                                        <img src="" data-source="/assets/plugin_split/asus/layout/asus_protection/image/Q-DIMM.png">
                                        <h4 class="txt-red"><br>Q-DIMM</h4>
                                        <div class="hd-content hd-frame">
                                            <p><span>1</span> 邊固定夾</p>
                                            <p>透過單邊固定夾，處理記憶體模組超簡單、超安全。
                                            </p>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_more -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_more/asus_more.css">
                    <script src="/assets/plugin_split/asus/layout/asus_more/asus_more.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_more">
                        <h2 class="txt-center" style="margin-top:0.5em">ROG<span class="center">超越<br>您的</span><span style="position: relative;"></span>期望</h2>
                        <div class="hd-sec-overwolf hd-bg" style="background-image: url('/assets/plugin_split/asus/layout/asus_more/image/bg-tri.png');">
                            <div class="hd-w1920">
                                <div class="hd-w1200 txt-left">
                                    <h3 class="txt-red hd-col40">Overwolf</h3>
                                    <div class="hd-col40">
                                        <h4 class="txt-grey">持續享受遊戲不中斷
                                        </h4>
                                        <p>
                                            巧妙又不顯眼的 Overwolf 疊圖讓您在進行遊戲時，還能同時瀏覽網頁、收發電子郵件、即時通訊、串流或錄影。 疊圖全數採用顏色相配的 ROG 介面，足以彰顯您躋身菁英之列。 馬上前往 Overwolf 應用程式商店下載！
                                        </p>
                                        <!-- <div id="watchv"> 							<h4> 								<span class="hd-open">watch video</span> 								<span class="hd-close">close video</span> 							</h4> 						</div> -->
                                    </div>
                                    <div class="hd-box">
                                        <ul class="hd-redtags">
                                            <li>
                                                <p class="hd-skewtag txt-red">
                                                    遊戲區塊
                                                </p>
                                            </li>
                                            <li>
                                                <p class="hd-skewtag txt-red">
                                                    遊戲通話
                                                </p>
                                            </li>
                                            <li>
                                                <p class="hd-skewtag txt-red">
                                                    支援多方即時通訊
                                                </p>
                                            </li>
                                        </ul>
                                        <ul class="hd-greytags">
                                            <li>
                                                <p class="hd-skewtag txt-grey">
                                                    5 種可自訂應用程式
                                                </p>
                                            </li>
                                            <li>
                                                <p class="hd-skewtag txt-grey">
                                                    遊戲時不錯過任何一通來電
                                                </p>
                                            </li>
                                            <li>
                                                <p class="hd-skewtag txt-grey" style="width:100%">
                                                    單一介面可容納 5 個以上用戶端
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hd-morebg">
                                    <img src="/assets/plugin_split/asus/layout/asus_more/image/more01.png">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="hd-videobox2"> 			<video poster="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/img/old/video_poster.jpg" id="vmore" autoplay muted loop controls> 				<source src="????.mp4" type="video/mp4"> 			</video> 		</div> -->
                        <div class="hd-more"></div>
                        <div class="hd-sec-hidden">
                            <div class="hd-sec-clone hd-w1200">
                                <div class="hd-col55 txt-left fleft">
                                    <h3 class="txt-red hd-col80">以智慧方式複製硬碟</h3>
                                    <h4 class="txt-grey">ROG Clone Drive</h4>
                                    <p>
                                        ROG Clone Drive 為智慧、方便的複製備份軟體，能快速有效地複製硬碟或 SSD。 Clone Drive 極具智慧，能將一個硬碟資料同時複製到另外兩個硬碟上，或以超快速度鏡像備份磁碟中的任何檔案。
                                    </p>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/clone01.png" class="hd-col80">
                                </div>
                                <div class="hd-col65 fright">
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/clone02.jpg">
                                </div>
                                <div style="clear:both;"></div>
                            </div>
        
                            <div class="hd-sec-ramcache hd-w1200 txt-center">
                                <h3 class="txt-red">超高速快取</h3>
                                <h4 class="txt-grey">RAMCache</h4>
                                <p>
                                    ROG 獨特的智慧型技術能有效快取整個儲存裝置，以超快速度啟動您最喜愛的遊戲及應用程式，啟動後可立即開始運作。 RAMCache 把毫秒縮短為微秒，將遊戲載入時間推向最高境界！
                                </p>
                            </div>
                            <div class="hd-pic" style="position: relative;">
                                <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/ramcache.jpg" class="hd-mobile_off">
                                <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/ramcache-mobile.jpg" class="hd-mobile_on">
                                <p style="font-size: 14px; line-height: 18px;">
                                    同時自動快取所有儲存裝置，善用系統快取資源。
                                </p>
                            </div>
        
                            <div class="hd-sec-keybot hd-w1200 txt-left">
                                <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/bg-keybot.jpg" class="hd-col60">
                                <h3 class="txt-red hd-col60">免費鍵盤升級 — 升級完成！
                                </h3>
                                <figure>
                                    <div class="hd-picnote">
                                        <h4 class="txt-grey">KeyBot II</h4>
                                        <p>
                                            來自獨家微處理器和直覺式使用者介面的免費鍵盤升級功能， 包括直接從鍵盤記錄巨集、瞬間切換設定檔、透過 F1-F10 快捷鍵啟用特殊功能、從關機（S5 模式）狀態啟動電腦甚至加快電腦速度！
                                        </p>
                                    </div>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/keys01.png">
                                </figure>
                            </div>
        
                            <div class="hd-pic02 hd-mobile_off" style="background-image: url('/assets/plugin_split/asus/layout/asus_more/image/keys02.jpg');"></div>
                            <div class="hd-sec-mhotkeys hd-mobile_on">
                                <div class="hd-pic" style="background-image: url('/assets/plugin_split/asus/layout/asus_more/image/S5_mode-blank.png');"></div>
                                <div class="hd-w1200">
                                    <p>您甚至可以使用 KeyBot II 使電腦透過兩秒按壓進入特定模式</p>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/hotkey_icons.jpg">
                                </div>
                            </div>
        
                            <div class="hd-sec-andmore">
                                <h2 class="txt-center">更多內容</h2>
                                <div class="hd-pic" style="background-image: url('/assets/plugin_split/asus/layout/asus_more/image/andmore.jpg');"></div>
                                <div class="hd-w1336 txt-left">
                                    <ul>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon01.jpg" class="hd-1023on">
                                            <p class="txt-red">AI Suite 3</p>
                                            <p class="txt-grey">一站式控制面板</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon02.png" class="hd-1023on">
                                            <p class="txt-red">ROG CPU-Z</p>
                                            <p class="txt-grey">自豪呈現重要系統資訊</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon03.png" class="hd-1023on">
                                            <p class="txt-red">Mem TweakIt</p>
                                            <p class="txt-grey">動態即時監控、DRAM 效能量測</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon04.jpg" class="hd-1023on">
                                            <p class="txt-red">RAMDisk</p>
                                            <p class="txt-grey">透過接合功能，可加速啟動您喜愛的應用程式，速度比 SSD 快 20 倍</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon05.jpg" class="hd-1023on">
                                            <p class="txt-red">Kaspersky<sup>&reg;</sup> Anti-Virus（1 年）</p>
                                            <p class="txt-grey">防止病毒與間諜軟體入侵的最佳防護軟體</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon06.png" class="hd-1023on">
                                            <p class="txt-red">DAEMON 工具軟體</p>
                                            <p class="txt-grey">適用於實體和虛擬光碟的首選工具</p>
                                        </li>
                                        <li>
                                            <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/more-icon07.jpg" class="hd-1023on">
                                            <p class="txt-red">PC Cleaner</p>
                                            <p class="txt-grey">按一下即可消除壅塞，加快電腦速度</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="hd-sec-vr">
                                <div class="hd-w1500 txt-center">
                                    <h3 class="txt-red">Beyond VR READY</h3>
                                    <div class="hd-w800">
                                        <p>ROG Maximus X Formula 不僅支援 VR，效能更是卓然超群！ ASUS ROG Beyond VR Ready 意味著 ROG Maximus X Formula 經多項頂尖元件測試，確保能為您的工作、遊戲及娛樂需求提供極致效能。 ASUS ROG Beyond VR Ready 有信心能為組裝電腦及打造夢幻系統開闢一條全新道路。</p>
                                    </div>
                                    <img src="" data-source="/assets/plugin_split/asus/layout/asus_more/image/vr.jpg">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ---------------------- -->                    
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_intel -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_intel/asus_intel.css">
                    <script src="/assets/plugin_split/asus/layout/asus_intel/asus_intel.js"></script>
                    <!-- ---------------------- -->  
                    <section id="asus_intel">
                        <h2 class="txt-center">Intel 的威力</h2>
                        <div class="hd-sec-intel hd-w1400">
                            <div class="hd-col80 txt-left">
                                <img src="/assets/plugin_split/asus/layout/asus_intel/image/z370.jpg">
                                <div>
                                    <p class="txt-grey">Intel<sup>&reg;</sup> Z370 晶片組</p>
                                    <p>Intel<sup>&reg;</sup> Z370 晶片組支援第 8代 Intel<sup>&reg;</sup> Core<sup>&trade;</sup> 處理器。 其利用串列點對點連結改進效能，使頻寬和穩定性得以提升。 此外，Z370 最多可支援 10 個 USB 3.1 Gen 1 連接埠、6 個 SATA 6Gbps 連接埠、32Gbps M.2 和 PCIe 3.0 通道速率，加快資料擷取速度。 Intel Z370 也支援整合式繪圖功能，讓您享受最新繪圖效能。</p>
                                </div>
                                <img src="/assets/plugin_split/asus/layout/asus_intel/image/intel.jpg">
                                <div>
                                    <p class="txt-grey">支援第 8代 Intel LGA1151 Core 處理器</p>
                                    <p>本主機板支援 LGA1151 套件中的第 8代 Intel<sup>&reg;</sup> Core<sup>&trade;</sup> 處理器，並整合顯示卡、記憶體和 PCI Express 控制器，可支援具備專用晶片組的內建繪圖輸出、雙通道（4 個 DIMM）DDR4 記憶體及 16 條 PCI Express 3.0/2.0 通道，以提供更高效能。</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_more -->  
                    {{--  <link rel="stylesheet" href="/assets/plugin_split/asus/layout/asus_more/asus_more.css">
                    <script src="/assets/plugin_split/asus/layout/asus_more/asus_more.js"></script>  --}}
                    <!-- ---------------------- -->
                    
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_footer_zone -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/footer/asus_footer_zone/asus_footer_zone.css">
                    <script src="/assets/plugin_split/asus/footer/asus_footer_zone/asus_footer_zone.js"></script>
                    <!-- ---------------------- -->  
                    <div id="asus_footer_zone" class="row">
                        <div class="span6" id="all-product-line-footer">
                            <img class="hdmi-icon" src="/assets/plugin_split/asus/footer/asus_footer_zone/image/gdml_black.jpg">
                            <ul>
                                <li>本網站所提到的產品規格、應用程式、圖片及資訊僅提供參考，內容會隨時更新，恕不另行通知。</li>
                                <li>商標聲明：本網站所談論到的產品名稱僅做識別之用，而這些名稱可能是屬於其他公司的註冊商標或是版權。</li>
                            </ul>
                        </div>
                        <div class="span6" id="product-line-footer">
                            <UL>
                                <LI>電器，電子設備，含汞鈕電池等...不可與一般垃圾一起丟置，請遵照各地法規處裡電子產品。</LI>
                                <LI>PCB板顏色與搭贈軟體會依情況而有所不同，恕不另行通知。</LI>
                            </UL>
                        </div>
                    </div>
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("body").attr("id", "rog_black_style");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- -->  
                    <!-- asus_footer_zone -->  
                    <link rel="stylesheet" href="/assets/plugin_split/asus/footer/asus_footer/asus_footer.css">
                    <script src="/assets/plugin_split/asus/footer/asus_footer/asus_footer.js"></script>
                    <footer id="asus_footer">
                        <div class="aai-inner">
                            <div class="aai-fmiddle">
                                <div id="FindItFast_menu" class="aai-footer-span">
                                    <h4>探索更多</h4>
                                    <ul class="aai-fnav">
            
                                        <li><a href="http://www.asus.com/tw/event/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">熱門活動</a></li>
            
                                        <li><a href="https://www.asus.com/tw/event/asus-ninamika/index.html" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ZenBook X 蜷川實花 美．力非凡</a></li>
            
                                        <li><a href="http://www.asus.com/microsite/zenny/tw/index.aspx" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">暗光俠 Zenny 的家</a></li>
            
                                        <li><a href="http://www.asus.com/microsite/powered-by-asus/tw/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">Powered By ASUS</a></li>
            
                                        <li><a href="https://www.asus.com/tw/event/asus-certified-esport-icafe/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">華碩 ROG 電競聯盟</a></li>
            
                                        <li><a href="https://healthcare.asus.com/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ASUS HealthCare</a></li>
            
                                        <li><a href="http://www.asuswebstorage.com" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ASUS Webstorage</a></li>
            
                                        <li><a href="https://asusdesign.com/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ASUS Design Center</a></li>
            
                                        <li><a href="https://resell.asus.com" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">華碩閒置物料轉售平台  Excess Resell Platform</a></li>
            
                                        <li><a href="http://www.asus.com/tw/News/nhkOmzcS0WCUPzwz" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ZenFone 台灣災防告警系統(PWS)專區</a></li>
            
                                    </ul>
                                </div>
                                <div id="Company_menu" class="aai-footer-span">
                                    <h4>關於我們</h4>
                                    <ul class="aai-fnav">
                                        <li class="navbar-li"><a href=/tw/About_ASUS/Origin-of-the-Name-ASUS onclick="googleTrackFamilySite(this, 'SiteMap');" id="menu_aboutasus" Target=_top>關於華碩</a></li>
                                        <li class="navbar-li"><a href="/tw/News/" onclick="googleTrackFamilySite(this, 'SiteMap');return false;" id="menu_news">最新消息</a></li>
                                        <li class="divider-vertical"></li>
                                        <li class="navbar-li"><a href="/tw/Award/Award?&Area=TAIWAN" id="menu_awards" target="_self" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">獎項</a></li>
                                        <li class="divider-vertical"></li>
            
                                        <li><a href="http://ehr.asus.com/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">華碩徵才</a></li>
            
                                        <li><a href="http://www.asus.com/tw/Pages/Investor/" target='_self' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">投資人關係</a></li>
            
                                        <li><a href="http://csr.asus.com/chinese/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">企業社會責任</a></li>
            
                                        <li><a href="http://press.asus.com/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">Press Room</a></li>
            
                                        <li><a href="http://www.asusfoundation.org/" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">華碩文教基金會</a></li>
            
                                    </ul>
                                </div>
                                <div id="Support_menu" class="aai-footer-span">
                                    <h4>支援服務</h4>
                                    <ul class="aai-fnav">
            
                                        <li><a href="http://www.asus.com/tw/support/Repair-Status-Inquiry/?country=Taiwan" target='_self' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">維修進度查詢</a></li>
            
                                        <li><a href="http://www.asus.com/tw/support/Service-Center/Taiwan" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">找尋服務據點</a></li>
            
                                        <li><a href="https://www.asus.com/support/Product/ContactUs/Services/questionform/?lang=zh-tw" target='_blank' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">聯絡我們-客服信箱</a></li>
            
                                        <li><a href="http://www.asus.com/tw/support/CallUs" target='_self' rel="noopener noreferrer" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">聯絡華碩-電話<br>0800-093-456</a></li>
            
                                        <li><a href="javascript:void(0)" onclick="ga('send', 'event', 'Family Site', 'SiteMap', '線上客服');window.open('https://icr-tw.asus.com/webchat/icr.html?rootTreeId=001.001.001&amp;treeId=001.001.001&amp;tenantId=ZH-TW','_blank');">線上客服</a></li>
                                    </ul>
                                    <div id="service_call" class="hide">
                                        <div id="call_center">
                                            <h4></h4>
                                            <span class="tel"></span>
                                        </div>
                                    </div>
                                    <div id="call_message" class="hide"></div>
                                </div>
                                <div id="Community_menu" class="aai-footer-span">
                                    <h4>社群</h4>
                                    <ul class="aai-fnav">
                                        <li class="aai-social-media">
            
                                            <a href='http://www.youtube.com/user/asustwn' target="_blank" rel="noopener" title='YouTube' onclick="googleTrackFamilySite(this, 'SiteMap');return false;"><img src="/assets/plugin_split/asus/footer/asus_footer/image/52_n.png" alt="YouTube" /></a>
            
                                            <a href='http://www.facebook.com/asusclub.tw' target="_blank" rel="noopener" title='Facebook' onclick="googleTrackFamilySite(this, 'SiteMap');return false;"><img src="/assets/plugin_split/asus/footer/asus_footer/image/54_n.png" alt="Facebook" /></a>
            
                                            <a href='https://www.instagram.com/asus_taiwan/' target="_blank" rel="noopener" title='Instagram' onclick="googleTrackFamilySite(this, 'SiteMap');return false;"><img src="/assets/plugin_split/asus/footer/asus_footer/image/590_n.png" alt="Instagram" /></a>
            
                                        </li>
            
                                        <li><a href='http://www.asus.com/tw/forum/' target="_blank" rel="noopener" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">華碩論壇</a></li>
            
                                        <li><a href='http://rog.asus.com/' target="_blank" rel="noopener" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ROG 論壇</a></li>
            
                                        <li><a href='https://www.asus.com/zentalk/tw/' target="_blank" rel="noopener" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ZenTalk</a></li>
            
                                        <li><a href='http://www.asus.com/tw/apps/zencircle/' target="_blank" rel="noopener" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ZenCircle</a></li>
            
                                        <li><a href='https://designer.zenui.com' target="_blank" rel="noopener" onclick="googleTrackFamilySite(this, 'SiteMap');return false;">ZenUI設計師網站</a></li>
            
                                    </ul>
                                </div>
                            </div>
                            <div class="aai-fbootom">
                                <div id="extra_link">
                                    <div id="footer_country_link">
                                        <a href="https://www.asus.com/entry.htm" onclick="googleTrackEvent('Country_Lang_Menu', this, true);return false;" title="entry_page">Taiwan / <span class="lang_set"> 繁體中文</span></a>
                                    </div>
                                </div>
                                <div id="aai-copyright">
                                    <ul id="copyright">
                                        <li><a href="/tw/Terms_of_Use_Notice_Privacy_Policy/Privacy_Policy" target='_self' onclick="googleTrackFamilySite(this, 'SiteMap');return false;">隱私權保護政策</a></li>
                                        <li><a href="/tw/Terms_of_Use_Notice_Privacy_Policy/Official-Site" target='_blank' onclick="googleTrackFamilySite(this, 'SiteMap');return false;">使用條款</a></li>
                                        <li class="copyright">&copy;ASUSTeK Computer Inc. All rights reserved.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- ---------------------- -->
                    <!-- 換膚設定 -->      
                    <!--  <script>
                        var EnableBlackVersion = '1';
                        
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            if (EnableBlackVersion == "1") {
                                $("#asus_footer").addClass("aai-bg-black");
                            }
                        });
                    </script>    -->
                    <!-- ---------------------- --> 

                </div>
                <!-- ---------------------- -->  
                
                
            </div>
             



            
            <!-- 結合後註解掉 -->
            {{--  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            1   --}}
            <!-- ---------------------- -->  
        </div>
       
        <!-- ---------------------- -->     

        
        
       

        
        <!-- ---------------------- --> 
        <!-- asus_alert -->  
        <!-- ---------------------- --> 
        <!-- asus_alert -->  
        <!-- ---------------------- --> 
       
    </body>
    <script>
        var EnableBlackVersion = '1';            
    </script>
    <script>        
        $(document).ready(function() {
            if (EnableBlackVersion == "1") { 
                $("body").attr("id", "rog_black_style");
                $(".container").addClass("black-style");
                $("#af-header").addClass("aai-bg-black");
                $("#asus_footer").addClass("aai-bg-black");
                $(".wtb-selection-2n1, .wtb-selection-four, .pdt-title").addClass("color-w"); 
            } 
        });


        alert("模組化證明，請看原始碼 - Chrome - 選項 | 更多工具 | 開發人員工具 | Elements");                 
    </script>
</html>

