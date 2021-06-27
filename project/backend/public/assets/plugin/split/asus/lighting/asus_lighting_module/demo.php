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