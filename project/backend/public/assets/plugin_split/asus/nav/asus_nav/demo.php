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
    <!-- 結合後註解掉 -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    1  
    <!-- ----------- -->
</div>
<!-- ---------------------- -->  
<!-- 換膚設定 -->      
<script>
    var EnableBlackVersion = '1';
    
</script>

<script type="text/javascript">
    $(document).ready(function() {
        if (EnableBlackVersion == "1") {
            $("body").attr("id", "rog_black_style");
            $("#af-header").addClass("aai-bg-black");
        }
    });
</script>
<!-- ---------------------- -->   