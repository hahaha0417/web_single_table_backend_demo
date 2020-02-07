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
        {{--  必備的  --}}
        <script src="/assets/plugin_split/asus/asus.js"></script>
        {{--    --}}

        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/base.css")}}" rel="stylesheet" />  --}}
        {{--  <link rel="stylesheet" type="text/css" media="all" href="{{asset("assets/web/front/practice/asus/css/2015/reset.css")}}" />  --}}
        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/base.css")}}" rel="stylesheet" />  --}}
        {{--  {{--  <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/business.css")}}' type='text/css' />  --}}
        {{--  <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/mybootstrap_to_cut.css")}}' type='text/css' />  --}}  

        {{--  <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/overview.css")}}' type='text/css' />  --}}

        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/APIs.css")}}" rel="stylesheet">  --}}
        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/full_style.css")}}" rel="stylesheet">  --}}
        {{--  <script src="{{asset("assets/web/front/practice/asus/js/web/asus_script.js")}}"></script>
        <link href="{{asset("assets/web/front/practice/asus/css/web/ProductTab.css")}}" rel="stylesheet">
        <link id="ctl00_localcss" rel="stylesheet" type="text/css" />  --}}




        {{--  <link rel="stylesheet" type="text/css" media="all" href="{{asset("assets/web/front/practice/asus/css/2015/reset.css")}}" />
        <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/base.css")}}" rel="stylesheet" />
        <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/business.css")}}' type='text/css' />
        <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/mybootstrap_to_cut.css")}}' type='text/css' />
        <script type='text/javascript' src='{{asset("assets/web/front/practice/asus/js/jquery.autoHeight.js")}}'></script>
        <link rel='stylesheet' href='{{asset("assets/web/front/practice/asus/css/web/overview.css")}}' type='text/css' />
        <script src='//connect.facebook.net/zh_TW/all.js#xfbml=1'></script>
        <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/base_responsive.css")}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="all" href="{{asset("assets/web/front/practice/asus/css/2015/main.css")}}">
        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="https://www.asus.com/media/img/favicon.ico" />
        <script src="{{asset("assets/web/front/practice/asus/js/2015/domain.js")}}"></script>
        <script src="{{asset("assets/web/front/practice/asus/js/web/dist/asus.js")}}"></script>
        <script type="text/javascript" src="{{asset("assets/web/front/practice/asus/js/web/XML.js")}}"></script>
        <script type="text/javascript" src="{{asset("assets/web/front/practice/asus/js/web/dist/default.js")}}"></script>
        <script src="{{asset("assets/web/front/practice/asus/js/web/asus-setting.js")}}"></script>
        <script src="{{asset("assets/web/front/practice/asus/js/web/dist/bootstrap.js")}}"></script>
        <!--<script type="text/javascript" src="{{asset("assets/web/front/practice/asus/js/web/jquery.bt.js")}}"></script>-->
        <script type="text/javascript" src="{{asset("assets/web/front/practice/asus/js/2015/dist/main.js")}}"></script>

        <script type="text/javascript" src="{{asset("assets/web/front/practice/asus/js/JsVersion.js")}}"></script>  --}}



        

        <!--[if lte IE 9]>
            <script src="/js/web/html5.js"></script>
            <script src="/js/web/respond.js"></script>
            <link rel="stylesheet" type="text/css" media="all" href="/css/2015/ie-fix.css" />
        <![endif]-->

        <script type="text/javascript">
            var Global_Tracking_Flag = (getWebsite() == "global" && in_page == "Index") ? "0" : "1";
            var SecureHost = (("https:" == document.location.protocol) ? "https://" : "http://");
            var addthis_settingConfig = "";
            var addthis_settingLanguaheConfig = "";
            if (getWebsite() == "cafr") {
                addthis_settingLanguaheConfig = "fr";
            }

            var cookie_name = "";

            if (isMultipleLanguageWebsite()) {
                var strLang = querySt('Lang');
                if (strLang != '') {
                    add_cookie('Lang', strLang);
                }
            }

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

            if (getWebsite() != "cn") {
                (function() {
                    var sc = document.createElement("script");
                    sc.type = "text/javascript";
                    sc.src = "//apis.google.com/js/plusone.js";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(sc, s);
                })();
            }
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
        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/APIs.css")}}" rel="stylesheet">
        <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/full_style.css")}}" rel="stylesheet">
        <script src="{{asset("assets/web/front/practice/asus/js/web/asus_script.js")}}"></script>
        <link href="{{asset("assets/web/front/practice/asus/css/web/ProductTab.css")}}" rel="stylesheet">  --}}
        {{--  <link id="ctl00_localcss" rel="stylesheet" type="text/css" />  --}}
        <style>
            /*
            iframe[name="google_conversion_frame"] {
                display: none;
            }
            
            #main-product-nav div {
                display: none;
            }
            
            #main-search,
            #main-product-nav {
                height: auto;
            }
            */
        </style>
        {{--  <script>
            var apiURL = "https://www.asus.com/OfficialSiteAPI.asmx/getProductWebPath?"; //主要domain
            var country = "";
            var page = window.siteConfig.route;
            var websiteId = window.siteConfig.websiteId;
            var geoUrl = "";
            if (window.siteConfig.websiteId == "1") {
                /*判斷網站為global，則取ip判斷location country*/
                $.ajax({
                    type: "GET",
                    url: '//www.asus.com/geo/',
                    success: function(data, status, xhr) {
                        country = xhr.getResponseHeader('country_code');
                        if (websiteId == '1' && page != 'PDPage' && country == 'US') {
                            setCookie();
                        } else if (websiteId == '1' && page == 'PDPage' && country == 'US') {
                            /*如果是透過非網站操作進入產品頁，則判斷是否重導向*/
                            if (getCookie() == '' || getCookie() == null || getCookie() == undefined) {
                                //if(isPDPage()=='yes')
                                checkRedirect(apiURL);
                            }
                        } else if (websiteId == '1' && (page != 'PDPage' && page != 'ProductTab') && country != 'US') {
                            setCookie2();
                        }
                    }
                });
            }
    
            function isTestSite() {
                var url = location.href;
                var sp = url.split("/");
                if (sp[2] == "test.asus.com")
                    return "yes";
                else
                    return "no";
            }
    
            function isPDPage() {
                var url = location.href;
                var sp = url.split("/");
                if (sp[5] == "")
                    return "yes";
                else
                    return "no";
            }
    
            function setCookie() {
                document.cookie = "fromWeb=true;";
            }
    
            function setCookie2() {
                document.cookie = "fromWeb2=true;path=/;"; /* For Akamai Redirect */
            }
    
            function getCookie() {
                var name = "fromWeb";
                var cookieArray = document.cookie.split(';');
                for (var i = 0; i < cookieArray.length; i++) {
                    if (cookieArray[i].indexOf(name + '=') != -1) {
                        var cookieVal = name.length + 1;
                        val = document.cookie.indexOf(";", cookieVal);
    
                        return unescape(document.cookie.substring(cookieVal, val));
                    }
                }
                return "";
            }
    
            function checkRedirect(apiurl) {
                var pdId = window.siteConfig.product.pdid;
    
                $.ajax({
                    url: apiurl + 'ProductId=' + pdId + '&WebsiteId=52',
                    method: 'GET',
                    success: function(data) {
                        if (data.Result.WebPathURL != '' && data.Result.WebPathURL != undefined && data.Result.WebPathURL != null) {
                            window.location.href = data.Result.WebPathURL;
                        }
                    }
                });
            }  
        </script>
        <script>
            function ButtonTrk(level, product, type, detail_info) {
                if (tracking_country != "") {
                    var _item = _item || [];
                    _item.push("1=" + tracking_country);
                    _item.push("2=" + level);
                    _item.push("5=" + product);
                    _item.push("6=" + type);
                    _item.push("7=" + detail_info);
                    try {
                        wmx_BtnTrack(_item);
                    } catch (err) {}
                }
            }
        </script>
        
        
        <script>
            if (getWebsite() == "cn") {
                var _hmt = _hmt || [];
                (function() {
                    var hm = document.createElement("script");
                    hm.src = "//hm.baidu.com/hm.js?b4671500ff917b268437ff5be30c0ff0";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hm, s);
                })();
            }
        </script>  --}}

        {{--  <link href="{{asset("assets/web/front/practice/asus/css/2015/dist/APIs.css")}}" rel="stylesheet">
        --}}
        <link rel="stylesheet" href="/assets/plugin_split/asus/rog_black_style.css">  
        <link rel="stylesheet" href="{{asset("assets/web/front/practice/asus/ROG-MAXIMUS-X-FORMULA/index_module.css")}}">
        <script src="{{asset("assets/web/front/practice/asus/ROG-MAXIMUS-X-FORMULA/index_module.js")}}"></script>
        

       
        <script src="{{asset("assets/web/front/practice/asus/js/web/asus_script.js")}}"></script>
        
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
        <div id="hd" style="position: absolute; width:100%; left:0; overflow:hidden; z-index:0;">
                {{--  <link rel='stylesheet' href='/assets/web/front/practice/asus/css/web/overview.css' type='text/css' />
                <link rel="stylesheet" href="/assets/web/front/practice/asus/css/hd-style.css">
                <link rel="stylesheet" href="/assets/web/front/practice/asus/css/hd-responsive.css">  --}}

                 {{-- <link rel="stylesheet" href="/assets/plugin_split/asus/carousel/asus_carousel/owl.carousel.css"> --}}
                {{-- <script src="/assets/plugin_split/asus/carousel/asus_carousel/owl.carousel.min.js"></script> --}}
            {{-- <link rel="stylesheet" href="/assets/web/front/practice/asus/lib/jquery.fullPage.css"> --}}
            {{-- <link rel="stylesheet" href="/assets/web/front/practice/asus/lib//owl.carousel.css">
            <link rel="stylesheet" href="/assets/web/front/practice/asus/lib/jquery-ui.structure.min.css">
            <link rel="stylesheet" href="/assets/web/front/practice/asus/css/hd-style.css">
            <link rel="stylesheet" href="/assets/web/front/practice/asus/css/hd-responsive.css">
            <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Roboto+Condensed:300,400" rel="stylesheet">
            <script src="/assets/plugin_split/asus/carousel/asus_carousel/asus_carousel.js"></script>  --}}
            
            <!-- ---------------------- --> 
            <link rel="stylesheet" href="/assets/plugin_split/asus/nav/asus_full_page_nav/jquery.fullPage.css">
            <nav id="fp-nav" class="right" style="margin-top: -43.5px; z-index:99999;">
                <ul>
                    <li>
                        <a href="#specs" class="active"><span></span></a>
                        <div class="fp-tooltip right">尖端規格</div>
                    </li>
                    <li>
                        <a href="#cooling"><span></span></a>
                        <div class="fp-tooltip right">最佳散熱</div>
                    </li>
                    <li>
                        <a href="#lighting"><span></span></a>
                        <div class="fp-tooltip right">領先自訂功能</div>
                    </li>
                    <li>
                        <a href="#connectivity"><span></span></a>
                        <div class="fp-tooltip right">次世代連線能力</div>
                    </li>
                    <li>
                        <a href="#performance"><span></span></a>
                        <div class="fp-tooltip right">極致效能</div>
                    </li>
                    <li>
                        <a href="#audio"><span></span></a>
                        <div class="fp-tooltip right">最佳遊戲音效</div>
                    </li>
                    <li>
                        <a href="#protection"><span></span></a>
                        <div class="fp-tooltip right">DIY 貼心設計</div>
                    </li>
                    <li>
                        <a href="#more"><span></span></a>
                        <div class="fp-tooltip right">ROG 超越您的期望</div>
                    </li>
                    <li>
                        <a href="#intel"><span></span></a>
                        <div class="fp-tooltip right">Intel 的威力</div>
                    </li>
                </ul>
            </nav>




            
            {{-- <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/owl-carousel/owl.carousel.min.js"></script> --}}
            {{-- <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/farbtastic.js"></script> --}}
            {{-- <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/scrollreveal.min.js"></script> --}}
            {{--  <script src="/assets/web/front/practice/asus/js/main.js"></script>  --}}
            {{-- <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/jquery-3.1.0.min.js"></script>
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/owl-carousel/owl.carousel.min.js"></script>
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/jquery-ui.min.js"></script>
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/hd-height.js"></script>
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
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/farbtastic.js"></script>
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/lib/scrollreveal.min.js"></script>
            <script src="https://www.asus.com/websites/global/products/R8suNyyA4xqZ0dIi/js/main.js"></script> --}}
            
        </div>

        {{--  <link href="/assets/web/front/practice/asus/css/2015/dist/base.css" rel="stylesheet" />
        <link href="/assets/web/front/practice/asus/css/2015/dist/APIs.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="all" href="/assets/web/front/practice/asus/css/2015/main.css">  --}}

        
    

        
        <!-- ---------------------- --> 
        <!-- asus_alert -->  
        <!-- ---------------------- --> 
        <!-- asus_alert -->  
        <!-- ---------------------- --> 
       
    </body>
    <script>
        $(function(){
            // 最後一次載入
            // lazyload();      
                            
        });

       

        $(document).ready(function() {
            
            
            {{--  if (EnableBlackVersion == "1" && strContent != "support" && strContent != "wheretobuy") {  --}}
                {{--  $("body").attr("id", "rog_black_style");
                $(".container").addClass("black-style");
                $("#af-header").addClass("aai-bg-black");
                $("#asus-api-footer").addClass("aai-bg-black");
                $(".wtb-selection-2n1, .wtb-selection-four, .pdt-title").addClass("color-w");  --}}
            {{--  }  --}}
        });


        {{-- alert("模組化證明，請看原始碼 - Chrome - 選項 | 更多工具 | 開發人員工具 | Elements");                --}}
    </script>
</html>

