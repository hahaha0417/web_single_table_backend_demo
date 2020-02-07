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
{{--  <script>
    var EnableBlackVersion = '1';
    
</script>

<script type="text/javascript">
    $(document).ready(function() {
        if (EnableBlackVersion == "1") {
            $("body").attr("id", "rog_black_style");
        }
    });
</script>    --}}