/*
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
*/

$(function(){   
             
});

var TestDomain1 = '//www.asus.com';TestDomain2 = '//www.asus.com';TestDomain3 = '//www.asus.com'; 

! function($) {
    function lowerBrowserFuncionInit() {
        "indexOf" in Array.prototype || (Array.prototype.indexOf = function(e, i) {
            void 0 === i && (i = 0), i < 0 && (i += this.length), i < 0 && (i = 0);
            for (var n = this.length; i < n; i++)
                if (i in this && this[i] === e) return i;
            return -1
        })
    }

    function detect() {
        return {
            isMobile: function() {
                var e, i = !1;
                return e = navigator.userAgent || navigator.vendor || window.opera, (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(e) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e.substr(0, 4))) && (i = !0), i
            }
        }
    }

    function initLayout() {
        var t, f = {
            init: function(e) {
                detect.isMobile() && $("body").addClass("d-mobile"), f.initHeaderMenu(e), f.initFooterMenu(), f.resize(e), f.orientationChange(), $("body").hasClass("landingPage") && f.initLandingPage(), $(window).width() < 721 && f.initMobileFilter()
            },
            initLandingPage: function() {
                var e = $("#af-header .nav-bar").height(),
                    i = $(window).height() - e;
                990 < $(window).width() ? $("#af-container").find(".af-part").eq(0).addClass("scale").height(i) : $("#af-container").find(".af-part").eq(0).removeClass("scale").height("auto")
            },
            initHeaderMenu: function(e) {
                t = e = void 0 !== e ? e : t;
                var i = f.initMobileHeaderMenu(e),
                    n = f.initDesktopHeaderMenu(e);
                if ($(window).width() <= 720) {
                    if ($("#af-header").find(".mobile-menu-toggle").hasClass("mobile")) return;
                    n.cancel(), i.init()
                } else i.cancel(), n.init()
            },
            initDesktopHeaderMenu: function(n) {
                function t(e) {
                    var i = e;
                    $("body").addClass("show-header-menu"), $(i).siblings("li").removeClass("active").end().addClass("active");
                    var n = $(i).data("target");
                    void 0 !== n ? (u.find(".submenu").removeClass("show").end().find("." + n).addClass("show"), "products-menu" == n && a("products-menu", "products"), "commercial-menu" == n && a("commercial-menu", "commercial"), "store-menu" == n && a("store-menu", "store")) : u.find(".submenu").removeClass("show"),
                        function(e) {
                            var i, n = $(e),
                                t = $("#af-header").find(".af-inner").find(".nav-main"),
                                a = n.innerWidth(),
                                o = n.offset().left - t.offset().left;
                            $("#asus-api-header").height();
                            $("#af-header").find(".nav-main").find(".magic-line").length < 1 && ((i = document.createElement("span")).className = "magic-line", $("#af-header").find(".nav-main").append(i));
                            $("#af-header").find(".magic-line").stop().animate({
                                width: a + "px",
                                left: o + "px",
                                opacity: .9
                            }, 300, function() {})
                        }(i)
                }

                function a(e, t) {
                    var a = $("#af-header").find("." + e),
                        o = a.find(".display-area");
                    o.find(".sub-cat-list").off("hover").hover(function() {
                        i && clearTimeout(i)
                    }), a.find("." + t + "-item").off("mouseenter").on("mouseenter", function(e) {
                        var n = this;
                        i && clearTimeout(i), i = setTimeout(function() {
                            var e = $(n).data("submenu-id"),
                                i = "." + t + "-" + e;
                            $(n).siblings("li").removeClass("active").end().addClass("active"), 0 < o.find(i).length ? (a.find(i).hasClass("two-column") && setTimeout(function() {
                                ! function(e) {
                                    var n = $("#af-header").find(e);
                                    if (n.find(".right-column").length < 1 && $("<div class='right-column'></div>").appendTo(n), !(0 < n.find(".right-column").find(".sub-group").length)) {
                                        var t = 0,
                                            a = 0;
                                        n.find(".sub-group").each(function(e, i) {
                                            0 < a ? (n.find(".right-column").append($(this).clone()), $(this).addClass("hide")) : ($(this).addClass("checkHeight"), 580 < (t += $(this).height() + 15) && (a = e, n.find(".right-column").append($(this).clone()), $(this).addClass("hide")))
                                        }), n.find(".checkHeight").removeClass("checkHeight"), n.find(".right-column").append(n.find(".highlight"))
                                    }
                                }(i)
                            }, 100), a.addClass("show-sub-items"), o.find(".sub-item").removeClass("show").end().find(i).addClass("show")) : (a.removeClass("show-sub-items"), o.find(".sub-item").removeClass("show"))
                        }, 75)
                    }).on("click", function() {
                        var e = $(this).data("submenu-id"),
                            i = "." + t + "-" + e;
                        0 < o.find(i).length ? (a.addClass("show-sub-items"), o.find(".sub-item").removeClass("show").end().find(i).addClass("show")) : (a.removeClass("show-sub-items"), o.find(".sub-item").removeClass("show"))
                    })
                }

                function e() {
                    l.find("li").each(function(e, i) {
                        var n = $(this).position(),
                            t = $(this).data("target"),
                            a = $(this).parent().width();
                        void 0 !== t && (isRtlLang ? u.find("." + t).css("right", 107 + a - n.left - $(this).width() - 30) : u.find("." + t).css("left", n.left + 107 + 20))
                    })
                }

                function o() {
                    $("#af-header").find(".magic-line").stop().animate({
                        width: 0,
                        left: 0,
                        opactty: .4
                    })
                }

                function s() {
                    o(), $("body").removeClass("show-header-menu"), u.find(".submenu").removeClass("show"), d.find(".member-item").removeClass("open"), l.find("li").removeClass("active")
                }
                var r, i, c = $("#af-header").find(".nav-bar"),
                    l = c.find(".nav-main"),
                    d = c.find(".nav-member"),
                    u = c.find(".submenu-area"),
                    m = u.find(".submenu");
                e();
                return {
                    init: function() {
                        ! function() {
                            $(".outer-wrapper").width("auto");
                            var i = !0;
                            l.find("li").on("click", function(e) {
                                $(this).hasClass("active") && i ? ($("body").removeClass("menu-hover-mode"), s()) : ($("body").addClass("menu-hover-mode"), t(this), i = !0)
                            }).on("mouseenter", function(e) {
                                $("body").hasClass("menu-hover-mode") && (i = !1, r && clearTimeout(r), $(this).hasClass("active") || t(this))
                            }).on("mouseleave", function(e) {
                                i = !0, r && clearTimeout(r), r = setTimeout(function() {}, 400)
                            }), d.find(".member-item").on("click", function(e) {
                                var i = $(this).find("a");
                                $(this).hasClass("open") && 1 === i.has(e.target).length ? s() : ($("body").addClass("show-header-menu"), $(this).addClass("open").siblings().removeClass("open"), $(this).hasClass("products-compare") && $(this).find(".aai-mst-header").find(".active").length <= 0 && n && "function" == typeof n.menuSuccessCallback && n.menuSuccessCallback(), f.outsideClick(d, function(e, i) {
                                    $("body").removeClass("menu-hover-mode show-header-menu"), d.find(".member-item").removeClass("open")
                                }))
                            }), m.on("mouseenter", function(e) {
                                r && clearTimeout(r)
                            }).on("mouseleave", function(e) {
                                r && clearTimeout(r), r = setTimeout(function() {
                                    debugMode || (s(), o(), $("body").removeClass("menu-hover-mode"))
                                }, 400)
                            })
                        }()
                    },
                    cancel: function() {
                        s(), l.find("li").off("click").off("mouseenter").off("mouseleave"), d.find(".member-item").off("click"), m.off("mouseenter").off("mouseleave")
                    },
                    resize: function() {
                        e()
                    }
                }
            },
            initMobileHeaderMenu: function(i) {
                function a(e) {
                    window.scrollTo(0, 0);
                    var i = "menu-level-" + e,
                        n = $("body");
                    n.hasClass(i) || n.removeClass(function(e, i) {
                        return (i.match(/\bmenu-level-\S+/g) || []).join(" ")
                    }).addClass(i)
                }
                $(".outer-wrapper").width($(window).width());
                var n = $("#af-header").find(".nav-bar"),
                    t = n.find(".nav-main"),
                    o = n.find(".nav-member"),
                    s = n.find(".submenu-area"),
                    e = $("#af-header").find(".mobile-menu-toggle"),
                    r = "";
                return {
                    init: function() {
                        e.addClass("mobile"), e.off("click").on("click", function() {
                            $(window).height();
                            var e = $("body");
                            e.toggleClass("show-menu trans"), e.hasClass("show-menu") ? (t.addClass("show zindex0"), 0 < $(".nav-bar-wrap").length && $(".nav-bar-wrap").hide().show(0)) : (e.removeClass(function(e, i) {
                                return (i.match(/\bmenu-level-\S+/g) || []).join(" ")
                            }), setTimeout(function() {
                                $(".zindex0").removeClass("zindex0")
                            }, 200), s.find(".submenu").removeClass("show"), $(".btn-adv").removeClass("point-right"), o.find(".member-item").removeClass("open"))
                        }), t.find("li").on("click", function() {
                            void 0 !== (r = $(this).data("target")) && (s.find(".submenu").removeClass("show").end().find("." + r).addClass("show"), a(2))
                        }), s.find(".submenu").find(".title").on("click", function() {
                            s.find(".submenu").removeClass("show"), a(1)
                        }), s.find(".submenu").find(".nav").find("li").on("click", function() {
                            var e, i = $(this).data("submenu-id"),
                                n = "",
                                t = $(this).parent().siblings(".display-area");
                            "products-menu" == r && (n = "products"), "commercial-menu" == r && (n = "commercial"), "store-menu" == r && (n = "store"), t.addClass("show"), 0 < (e = t.find(".sub-cat-list").find("." + n + "-" + i)).length ? (e.addClass("show"), e.find(".origin-title").one("click", function() {
                                a(2), t.removeClass("show").find(".sub-cat-list").find(".sub-item").removeClass("show")
                            }), a(3)) : t.removeClass("show").find(".sub-cat-list").find(".sub-item").removeClass("show")
                        }), o.find(".member-item").on("click", function(e) {
                            $(this).hasClass("open") && $(this).find(".icon").eq(0).is(e.target) ? (n.removeClass("show-member-menu"), $(this).removeClass("open")) : (n.addClass("show-member-menu"), $(this).siblings().removeClass("open").end().addClass("open")), $(this).hasClass("products-compare") && $(this).find(".aai-mst-header").find(".active").length <= 0 && i && "function" == typeof i.menuSuccessCallback && i.menuSuccessCallback()
                        })
                    },
                    cancel: function() {
                        e.removeClass("mobile"), t.find("li").off("click"), s.find(".submenu").find(".title").off("click").end().find(".nav").off("click"), o.find(".member-item").off("click")
                    }
                }
            },
            initMobileFilter: function() {
                var e = $(".left-menu-zone");
                $(window).width() < 721 ? (e.addClass("afe slide-sidebar"), $("#main-zone").find(".btn-adv").off("click").on("click", function() {
                    $("body").hasClass("show-menu") ? ($("body").removeClass("show-menu"), $(this).removeClass("point-right"), setTimeout(function() {
                        $(".zindex0").removeClass("zindex0")
                    }, 200)) : (e.addClass("zindex0"), $("body").addClass("show-menu"), $(this).addClass("point-right"))
                })) : e.removeClass("afe slide-sidebar")
            },
            initFooterMenu: function() {
                $("#af-footer").find(".mobile-menu").on("click", function() {
                    $(this).toggleClass("show-submenu")
                })
            },
            otherEffect: function() {
                var e, i, n = (i = "//demeter.asus.com/WSC/Support_API_New/SupportNewAPI/GetOnlineChatUrl/", "global" != (e = local) && (i += -1 === e.indexOf("-") ? e : e.split("-")[1] + "-" + e.split("-")[0]), {
                    init: function() {
                        0 < $("#online-service").length || $.getJSON(i + "?SE=MKT&callback=?", void 0).done(function(e) {
                            if (e && 0 == e.StatusCode) {
                                var i = e.Link_Name ? e.Link_Name : "Online Chat",
                                    n = e.URL;
                                onlineChatBtn = '<div id="online-service"><a href="' + n + "\" class=\"btn\" target=\"_blank\" onclick=\"ga('send', 'event', 'button', 'clicked', 'onlinechat');\">" + i + "</a></div>", $(onlineChatBtn).appendTo("body")
                            }
                        })
                    }
                });
                $("body").hasClass("landingPage") || n.init()
            },
            addEventMoreBtn: function() {
                if ("tw" == local || "global" == local || "hk" == local || "pl" == local) {
                    var e = "<a class='more-btn' href='" + (localDomain + "/events") + "' target='_blank' > See All </a>";
                    $("#af-header").find(".hot-menu").append(e)
                }
            },
            customRule: function() {},
            outsideClick: function(n, t) {
                $(document).off("mouseup").mouseup(function(e) {
                    var i = n;
                    i.is(e.target) || 0 !== i.has(e.target).length || 0 !== i.closest(e.target).length || t(i, e)
                })
            },
            orientationChange: function() {
                function e() {
                    switch (window.orientation) {
                        case -90:
                        case 90:
                            $(window).width() <= 720 ? (document.querySelector && null !== document.querySelector('meta[name="viewport"]') && document.querySelector('meta[name="viewport"]')).content = "width=800" : (document.querySelector && null !== document.querySelector('meta[name="viewport"]') && document.querySelector('meta[name="viewport"]')).content = "width=device-width", $(".outer-wrapper").width("100%");
                            break;
                        default:
                            if ("desktop" == asus.cookie.get("viewType")) return;
                            720 < $(window).width() && ((document.querySelector && null !== document.querySelector('meta[name="viewport"]') && document.querySelector('meta[name="viewport"]')).content = "width=device-width"), $(".outer-wrapper").width($(window).width())
                    }
                }
                e(), detect.isMobile() && window.addEventListener("orientationchange", e)
            },
            resize: function() {
                var e;
                $(window).on("resize", function() {
                    e && clearTimeout(e), e = setTimeout(function() {
                        f.initHeaderMenu(),
                            function() {
                                if (990 < $(window).width()) {
                                    var e = $("#af-header .nav-bar").height(),
                                        i = $(window).height() - e;
                                    $("#af-container").find(".af-part").eq(0).addClass("scale").height(i)
                                } else $("#af-container").find(".af-part").eq(0).removeClass("scale").height("auto")
                            }(), f.initMobileFilter()
                    }, 500)
                })
            }
        };
        return f
    }
    window.af = window.af || {}, lowerBrowserFuncionInit(), $(function() {
        af.initLandingPage()
    });
    var domain = "//www.asus.com";
    if ("www" != window.location.host.split(".")[0]) {
        var initdomain = window.location.host.split(".")[0].toLowerCase(); - 1 != TestDomain1.search(initdomain) ? domain = TestDomain1 : -1 != TestDomain2.search(initdomain) && (domain = TestDomain2)
    }
    var localDomain = domain,
        local, debugMode = 0,
        isRtlLang = !1,
        publicObj = {};
    if ("undefined" != typeof asus) {
        local = "function" == typeof asus.script.get_local ? asus.script.get_local() : "", localDomain = "global" == local ? domain : "cn" == local ? domain + ".cn" : localDomain + "/" + local;
        var rtlCounties = ["eg", "il", "ae-ar", "middleeast-fa", "nafr-ar", "sa-ar", "af-fa", "newmiddleeast-fa"];
        isRtlLang = 0 <= rtlCounties.indexOf(local)
    }
    var detect = detect(),
        layout = initLayout(),
        timer = 0,
        queryTextString = "",
        delay = function(e, i) {
            clearTimeout(timer), timer = setTimeout(e, i)
        };
    af = {
        initLandingPage: function() {
            var e = {};
            e.menuSuccessCallback = af.initViewedCompareBlock, layout.init(e), layout.otherEffect(), layout.addEventMoreBtn(), af.initSearchAutocomplete(), af.initShoppingCart(), af.initMemberInfo(), af.initComparison(), debugMode && $(".link-area").hide()
        },
        local: local,
        setting: {
            search: {
                APIurl: "cn" != local ? domain + "/searchapi/api/Suggestion" : localDomain + "/searchapi/api/Suggestion",
                redirectUrl: localDomain + "/search/results.aspx?SearchKey="
            }
        },
        initMemberInfo: function() {
            function postlink_fn(event) {
                var frm = $("<form>");
                frm.attr({
                    action: $(this).data("href"),
                    method: "post"
                }), frm.appendTo("body");
                var datas = $(this).data();
                for (var k in datas) {
                    var input = $("<input>");
                    k.match(/^js/) ? input.attr({
                        name: k.replace(/^js/, ""),
                        value: eval(datas[k])
                    }) : input.attr({
                        name: k,
                        value: datas[k]
                    }), input.appendTo(frm)
                }
                return frm.submit(), !1
            }
            $("#anchorMemberLogout, #anchorMemberlogin").hide();
            var url = "function" == typeof isApplicationPathSite && isApplicationPathSite() ? "https://www.asus.com/member.asmx/checkMember" : "https://www.asus.com/member.asmx/checkMember";
            url = "//" + window.location.host + url;
            var sitename = "www.asus.com.cn" == window.location.host ? "cn" : getWebsite(),
                memberMenu = $("#af-header").find(".nav-member"),
                memberInfoMenu = memberMenu.find(".member-info"),
                blackVersion = "general_white";
            null != window.siteConfig.productLine && null != window.siteConfig.productLine.rogVersion && null != window.siteConfig.productLine.blackVersion && (blackVersion = 0 < window.siteConfig.productLine.rogVersion + window.siteConfig.productLine.blackVersion ? "general_black" : "general_white"), $.ajax({
                dataType: "json",
                url: url,
                type: "POST",
                data: {
                    lang: strLang,
                    strLogin: strLogin.replace("&#39;", "'"),
                    strRegister: strRegister.replace("&#39;", "'"),
                    websitename: sitename
                },
                success: function(e) {
                    if ("1" == e.status) {
                        "cn" == getWebsite() ? memberInfoMenu.find(".member-center-btn").attr("href", "https://account.asus.com.cn/info.aspx?lang=" + strLang + "&site=" + getWebsite()).end().find(".logout").attr("href", "https://account.asus.com.cn/logout.aspx?ReturnUrl=" + window.location.href) : memberInfoMenu.find(".member-center-btn").attr("href", "https://account.asus.com/info.aspx?lang=" + strLang + "&site=" + getWebsite()).end().find(".logout").attr("href", "https://account.asus.com/logout.aspx?ReturnUrl=" + window.location.href), memberInfoMenu.removeClass("not-login").find(".user-img img").attr("src", e.img_src.replace("small", "big")).end().find(".user-name").html(e.email).end().find(".member-center-btn").text(sysWording.ASUSAccount).end().find(".logout").text(sysWording.Logout).end().addClass("show"), af.initMessagePanel(), af.getMsg();
                        try {
                            wmx_set_account(e.cus_id)
                        } catch (e) {}
                    } else memberMenu.find(".msg-center").addClass("hide"), memberInfoMenu.addClass("not-login").children("a").attr({
                        "data-href": e.signin_url,
                        lang: strLang,
                        "data-lang": strLang,
                        "data-login_background": blackVersion,
                        "data-appid": "0000000002",
                        onclick: "ga('send', 'event', 'login-buttons', 'clicked', 'login');",
                        "data-js-returnurl": "asus.url.the_url"
                    }).addClass("postlink").html(strLogin + '<i class="icon icon-profile"></i>').on("click", postlink_fn)
                },
                error: function(e, i, n) {}
            })
        },
        initSearchAutocomplete: function() {
            function e() {
                window.onscroll = function() {}
            }

            function n(e, i, n) {
                var t, a = e.find("a").length - 1,
                    o = e.find(".highlight").index(),
                    s = n.data("isOrigin");
                "up" == i && (t = o - 1 < 0 ? 1 == s ? a : -1 : o - 1), "down" == i && (t = o < 0 ? 0 : a < o + 1 ? -1 : o + 1), "exit" == i && e.find("a").removeClass("highlight");
                e.find(".highlight").removeClass("highlight").end(), 0 <= t && (e.find("a").eq(t).addClass("highlight"), n.data("isOrigin", 0)), n.val(e.find(".highlight").find(".searchheading").text())
            }

            function a(e, i, n) {
                var t, a = e,
                    o = i ? $.trim(i.toLowerCase()) : "",
                    s = {
                        queryText: o + "*",
                        country: asus.script.get_local().replace("new", ""),
                        type: "ProductsAll,FAQ",
                        RowLimit: "5,5",
                        eventDBRowLimit: "0"
                    },
                    r = "function" == typeof n ? n : t;
                null != i && o && 2 <= o.length && queryTextString != i ? $.ajax({
                    url: a,
                    dataType: "json",
                    data: s,
                    global: !1
                }).done(function(e) {
                    t = {
                        status: !0,
                        msg: "success",
                        result: e
                    }, $(".search-result").addClass("show"), r(t)
                }).fail(function(e) {
                    t = {
                        status: !1,
                        msg: "get result fail"
                    }, $(".search-result").removeClass("show"), r(t)
                }) : (t = {
                    status: !1,
                    msg: "get result fail"
                }, $(".search-result").removeClass("show"), r(t))
            }

            function o(e, i) {
                var s = $.trim(e),
                    n = $(i);
                return 0 < i.length && $(n).find("span").each(function() {
                    var e = $(this).text(),
                        i = e.toLowerCase().indexOf(s.toLowerCase());
                    if (-1 < i) {
                        var n = e.slice(i, i + s.length),
                            t = '<span class="keyword">' + n + "</span>",
                            a = new RegExp(n.replace("+", "\\+"), "g"),
                            o = e.replace(a, t);
                        $(this).html(o)
                    }
                }), n
            }

            function s(e, i) {
                var n = $.trim(e),
                    t = $(i);
                return 0 < i.length && $(t).find("a").each(function() {
                    $(this).attr("href", $(this).attr("href") + "?SearchKey=" + n + "/")
                }), t
            }
            var r = af.setting.search.APIurl,
                c = (af.setting.search.redirectUrl, "cn" != local ? "search_initproduct" : "search_initproduct_cn"),
                i = [],
                t = document.cookie.split(";");
            for (var l in t) {
                var d = t[l].split("="),
                    u = d[0].trim(),
                    m = d[1];
                i[u] = m
            }
            var f = !!i[c],
                h = null != window.siteConfig.WebSiteId ? window.siteConfig.WebSiteId : window.siteConfig.websiteId,
                p = "",
                g = "";
            if (f) {
                var v = i[c].split(",");
                p = v[0], g = v[1], h != p || "" == g || $("body").hasClass("mobile") || $("#top-search-bar").attr("placeholder", v[1]).data("initUrl", v[2])
            }
            if (null != window.siteConfig && (!f || h != p)) {
                var w = "" != window.siteConfig.lang ? window.siteConfig.lang + "/" : "",
                    b = "cn" != local && "" != window.siteConfig.lang ? domain + "/" + w : domain + "/";
                $.ajax({
                    dataType: "json",
                    url: "cn" != local ? b + "OfficialSiteAPI.asmx/GetSearchSuggestion?WebsiteId=" + h : localDomain + "/OfficialSiteAPI.asmx/GetSearchSuggestion?WebsiteId=" + h,
                    type: "GET",
                    success: function(e) {
                        var i = new Date;
                        i.getTime();
                        i.setTime(i.getTime() + 2592e6);
                        var n = "expires=" + i.toUTCString(),
                            t = "cn" != local ? "domain=asus.com" : "domain=asus.com.cn";
                        !!e && (!!e.Result && e.Result.Keyword[0]) && !$("body").hasClass("mobile") ? (document.cookie = c + "=" + h + "," + e.Result.Keyword[0].Name + "," + e.Result.Keyword[0].Link + ";" + t + ";" + n + ";path=/", $("#top-search-bar").attr("placeholder", e.Result.Keyword[0].Name).data("initUrl", e.Result.Keyword[0].Link)) : document.cookie = c + "=" + h + ",,;" + t + ";" + n + ";path=/"
                    },
                    error: function(e, i, n) {
                        var t = new Date;
                        t.getTime();
                        t.setTime(t.getTime() + 2592e6);
                        var a = "expires=" + t.toUTCString(),
                            o = "cn" != local ? "domain=asus.com" : "domain=asus.com.cn";
                        document.cookie = c + "=" + h + ",,;" + o + ";" + a + ";path=/"
                    }
                })
            }
            window.innerWidth <= 720 && ($("#af-header .af-inner .sub-area .search-bar").clone().appendTo("#af-header .mobile-action"), $("#af-header .af-inner .sub-area .search-bar").remove(), $("#af-header .af-inner .sub-area #searchopen").clone().appendTo("#af-header .mobile-action"), $("#af-header .af-inner .sub-area #searchopen").remove()), $("#af-header").find(".search-bar .btn.btn-search-submit").on("click", function(e) {
                e.preventDefault()
            }), $("#top-search-bar").on("keyup", function(i) {
                $this = $(this), delay(function() {
                    var t = $this.parent().find(".search-result"),
                        e = t.find("#searchresults");
                    38 != i.keyCode && 40 != i.keyCode && 27 != i.keyCode ? (a(r, $this.val(), function(e) {
                        if (e.status && "" != $this.val()) {
                            var i = e.result; - 1 != i.indexOf("(") && -1 != i.indexOf(")") && $("html").hasClass("af-rtl") && (i = i.replace(/\(/g, "&lrm;(").replace(/\)/g, ")&lrm;"));
                            var n = o($this.val(), i);
                            n = s($this.val(), n), t.html(n)
                        } else t.empty(), $(".search-result").removeClass("show")
                    }), queryTextString = $this.val(), $this.data("origin-input", $this.val())) : 38 == i.keyCode ? (n(e, "up", $this), $("#searchresults").find(".highlight").length < 1 && $this.val($this.data("origin-input")).data("isOrigin", !0)) : 40 == i.keyCode ? (n(e, "down", $this), $("#searchresults").find(".highlight").length < 1 && $this.val($this.data("origin-input")).data("isOrigin", !0)) : 27 == i.keyCode && (n(e, "exit", $this), t.empty(), $(".search-result").removeClass("show"))
                }, 300)
            }).on("keydown", function(e) {
                if (13 == e.keyCode) {
                    var i = $("#top-search-bar").val().trim();
                    "" != i && null != i || !$("#top-search-bar").data("initUrl") ? (n = $("#top-search-bar").val().trim(), $("#top-search-bar").data("origin-input"), window.location.href = af.setting.search.redirectUrl + encodeURI(n) + "") : window.location = $("#top-search-bar").data("initUrl")
                }
                var n
            }).on("focus", function(e) {
                $this = $(this);
                var t = $this.parent().find(".search-result");
                t.find("#searchresults");
                a(r, $this.val(), function(e) {
                    if (e.status && "" != $this.val()) {
                        var i = e.result; - 1 != i.indexOf("(") && -1 != i.indexOf(")") && $("html").hasClass("af-rtl") && (i = i.replace(/\(/g, "&lrm;(").replace(/\)/g, ")&lrm;"));
                        var n = o($this.val(), i);
                        n = s($this.val(), n), t.html(n)
                    } else t.empty(), $(".search-result").removeClass("show")
                })
            }).on("blur", function() {
                setTimeout(function() {
                    debugMode || ($("#searchresults").empty(), $(".search-result").removeClass("show"))
                }, 200)
            }), $("#searchopen").on("click", function() {
                $(this).hasClass("active") ? ($(this).removeClass("active"), e(), $("#af-header").find(".search-bar").removeClass("show"), $("body, html").off("wheel touchmove")) : ($(this).addClass("active"), window.onscroll = function() {
                    window.scrollTo(0, 0)
                }, $("#af-header").find(".search-bar").addClass("show"), $("#top-search-bar").focus(), $("body, html").on("wheel touchmove", function(e) {
                    e.preventDefault()
                }))
            }), $("#searchclose").on("click", function() {
                $("#searchopen").removeClass("active"), e(), $("#af-header").find(".search-bar").removeClass("show"), $("body, html").off("wheel touchmove")
            })
        },
        initRecentlyViewed: function() {
            asus.RecentlyView.rehtml()
        },
        initComparison: function() {
            var e = new function() {
                function e() {
                    $("body").off("change.compare").on("change.compare", ".add-compare-check", function() {
                        var e = {},
                            i = $(this).attr("alt");
                        if (showBar = !0, $(this).is(":checked")) {
                            if (0 < ((e = {
                                    key: i,
                                    modelName: $(this).data("modelname") ? $(this).data("modelname") : "",
                                    url: $(this).data("url") ? $(this).data("url") : "",
                                    imgType: "png",
                                    imgSrc: $(this).data("imgsrc") ? $(this).data("imgsrc") : $(this).parent().parent().find(".hot-product-pic").attr("src"),
                                    prodGroup: $(this).attr("product-group"),
                                    blackVersion: "rog_black_style" === $("body").attr("id") ? 1 : 0
                                }).imgSrc + "").indexOf(".jpg") && (e.imgType = "jpg"), s.count() >= r) {
                                var n = sysWordingRead ? sysWording.CompareAlert : "Accept " + r + " models only, please remove one first.";
                                alert(n)
                            }
                            s.add(e), t()
                        } else s.remove(i);
                        a(showBar)
                    }), ($(".add-compare-check").length || $(".add-to-list").length) && (t(), a())
                }

                function t() {
                    if (s.isExist()) {
                        if ($(o).length < 1) {
                            var e = sysWordingRead ? sysWording.ProductComparisonTitle : "Product Comparison",
                                i = sysWordingRead ? sysWording.ProductCompareRemark : "Product added to comparison. Add up to " + r + " products or proceed to view compare products selected.",
                                n = sysWordingRead ? sysWording.CompareNow : "VIEW COMPARISON";
                            $('<div id="comparison" style="display:none" class="close"><div class="compare-hidden-toggle"></div><div class="close-btn comparison-close-btn">×</div><div class="comparison-wrapper"><div class="comparison-title"><h3 class="title">' + e + '</h3><p class="info">' + i + '</p></div><div class="comparison-items"><ul class="comparison-ul"></ul></div><a class="go-to-compare">' + n + "</a></div></div>").appendTo("body")
                        }
                        var t = $(o);
                        $(o).show().off("click.compareBtns").on("click.compareBtns", ".close-btn", function() {
                            t.addClass("close")
                        }).on("click.compareBtns", ".compare-hidden-toggle", function() {
                            a(!0), t.removeClass("close")
                        }).on("click.compareBtns", ".compare-product-info .close", function() {
                            var e = $(this).parent().data("pid");
                            s.remove(e), a(!0)
                        }).on("click.compareBtns", ".go-to-compare", function() {
                            var e = !!siteConfig && 9 == siteConfig.websiteId,
                                i = s.get(),
                                n = [],
                                t = "",
                                a = 1;
                            s.setGroupId(), i.forEach(function(e) {
                                n.push(e.key)
                            }), i.forEach(function(e) {
                                if (0 === e.blackVersion) return a = 0, !1
                            }), n.forEach(function(e) {
                                t += e + ","
                            }), t = t.slice(0, -1), window.name = "", window.location.href = e ? "/".replace("//", "/") + "Product-Compare/?products=" + t + "&b=" + a : ("/" + (siteConfig ? siteConfig.lang + "/" : "/")).replace("//", "/") + "Product-Compare/?products=" + t + "&b=" + a
                        })
                    }
                }

                function a(e) {
                    function i(e) {
                        var i, n = $("#comparison").find(".comparison-ul"),
                            t = e.key,
                            a = "modelName" in e ? e.modelName : "model name",
                            o = "url" in e ? e.url : "url";
                        void 0 !== e.imgSrc ? (i = e.imgSrc, "png" == e.imgType && i.replace("setting_fff_1", "setting_x_0")) : (i = "/media/global/products/" + t + "/", i += "png" == e.imgType ? "P_setting_x_0_90_end_130.png" : "P_130.jpg");
                        var s = '<li class="item"><div class="compare-product-info" data-pid="' + t + '"><span class="close"></span><a href"' + o + '"><img class="product-image" src="' + i + '"></a><h4 class="product-title">' + a + "</h4></div></li>";
                        n.append(s)
                    }
                    var n = $(o);
                    if (s.count() || s.needRefresh()) {
                        var a = s.get() || [];
                        if ($(".add-compare-check").length && $(".add-compare-check").each(function(e, i) {
                                for (var n = !1, t = 0; t < a.length; t++) $(this).attr("alt") == a[t].key && (n = !0);
                                $(this).attr("checked", n)
                            }), n.find(".comparison-ul").empty(), a && a.length) {
                            if (e) {
                                n.removeClass("close");
                                for (var t = 0; t < a.length; t++) i(a[t])
                            }
                        } else setTimeout(function() {
                            n.addClass("close")
                        }, 500)
                    }
                }
                var o = "#comparison",
                    s = new function(e) {
                        var i = [],
                            n = null,
                            t = 0,
                            a = !0,
                            o = new function(e, i) {
                                function a() {
                                    return JSON.parse(n.getItem(t))
                                }

                                function o(e) {
                                    n.setItem(t, JSON.stringify(e))
                                }
                                var n = window.sessionStorage || {},
                                    t = e,
                                    s = i;
                                return {
                                    get: a,
                                    set: o,
                                    getProdsByGroup: function(e) {
                                        var i = a() || {
                                                status: null,
                                                current: s,
                                                result: {}
                                            },
                                            n = e || s;
                                        return void 0 !== i.result && i.result[n] && i.result[n]
                                    },
                                    setProdsByGroup: function(e, i) {
                                        var n = a() || {
                                                status: null,
                                                current: s,
                                                result: {}
                                            },
                                            t = i || s;
                                        n.current = t, n.result[t] = e, o(n)
                                    },
                                    setItemKey: function(e) {
                                        s = e
                                    }
                                }
                            }(e);
                        return null != (n = "undefined" !== $(".add-compare-check:eq(0)").attr("product-group") ? "pgid_" + $(".add-compare-check:eq(0)").attr("product-group") : null) && (o.setItemKey(n), i = o.getProdsByGroup() || i, t = i.length + 0), {
                            add: function(e) {
                                var i = o.getProdsByGroup() || [];
                                void 0 === e || i.length >= r || (i.push(e), t = i.length, o.setProdsByGroup(i), a = !0)
                            },
                            remove: function(e) {
                                var i = o.getProdsByGroup() || [];
                                if (i.length) {
                                    for (var n = 0; n < i.length; n++) i[n].key == e && i.splice(n, 1);
                                    t = i.length, o.setProdsByGroup(i), a = !0
                                }
                            },
                            get: function(e) {
                                return o.getProdsByGroup(e)
                            },
                            showAll: function() {
                                return o.get() || {}
                            },
                            count: function() {
                                return t
                            },
                            setGroupId: function(e) {
                                var i = o.getProdsByGroup() || {
                                    status: null,
                                    current: null,
                                    result: {}
                                };
                                i.current = e, o.setProdsByGroup(i)
                            },
                            needRefresh: function() {
                                return a
                            },
                            isExist: function() {
                                return 0 < t
                            }
                        }
                    }("asusCompareList"),
                    r = 4;
                return {
                    init: function() {
                        t(), ($(".add-to-compare").length || $(".add-to-list").length) && e()
                    },
                    destroy: function() {
                        $("body").off("change", ".add-compare-check")
                    },
                    updateCheckbox: function() {
                        a()
                    }
                }
            };
            e.init(), publicObj.comparePanel = e
        },
        initViewedCompareBlock: function() {
            function i(e, i) {
                var n = i,
                    t = $("#" + n);
                if (!(0 < t.length)) return !0;
                t.siblings().removeClass("active").end().addClass("active"), 0 < !t.find(".is_scroll").length && !$(this).data("url") && (asus.scroll({
                    block: n,
                    scroll_css: {
                        position: "absolute",
                        right: "0px",
                        top: "60px",
                        bottom: "0px",
                        background: "#909090",
                        "border-radius": "3px",
                        width: "7px"
                    },
                    scroll_bar_css: {
                        background: "#F3F3F3",
                        cursor: "pointer",
                        "border-radius": "2px",
                        width: "5px",
                        border: "1px solid #909090",
                        margin: "50px 0 0"
                    },
                    auto_hide: !0,
                    height: e.find(".aai-mms-list").height() - 85
                }), t.append('<div class="is_scroll"></div>'))
            }
            $("#menu_compare").find(".aai-mst-header").find("a").on("click", function() {
                var e = $(this).data("id");
                $(this).siblings().removeClass("active").end().addClass("active"), i($("#menu_compare"), e)
            }).eq(0).addClass("active"), i($("#menu_compare"), "viewed-list"), $("#menu_compare").find(".aai-mst-header").find("a").each(function() {
                sysWording && ("viewed-list" == $(this).data("id") && $(this).text(sysWording.RecentlyViewed), "div_compare_panel" == $(this).data("id") && $(this).text(sysWording.CompareList))
            }), af.initRecentlyViewed()
        },
        initMessagePanel: function() {
            var e = (getWebsite(), "//www.asus.com/message.aspx?lang=" + strLang),
                o = $("#af-header").find(".nav-member");
            $.ajax({
                url: e,
                dataType: "jsonp",
                jsonp: "callback",
                cache: !0,
                jsonpCallback: "_asus_message_fn",
                success: function(e) {
                    var i = o.find(".msg-center"),
                        n = i.find(".count"),
                        t = e && e.message ? e.message : "",
                        a = e && e.Total ? e.Total : "0";
                    i.show(), i.find(".sender-list").html(t), i.find(".af-msg-center-footer").find("a").attr("href", "https://account.asus.com/msgcenter.aspx?lang=" + strLang + "&site=" + getWebsite()), i.find(".list-item").on("click", s), "0" == a ? n.text("0").css({
                        display: "none"
                    }) : n.text(a).css({
                        display: "block"
                    })
                },
                error: function() {}
            });
            var s = function() {
                var e = $(this).data("messageid");
                window.open("https://account.asus.com/msgcenter.aspx?sid=" + e + "&lang=" + strLang + "&site=" + getWebsite())
            }
        },
        initShoppingCart: function() {
            var e, i, n, t, a = $("#af-header").find(".nav-member"),
                o = a.find(".shopcart").find("a").eq(0).find("i");
            o.length < 1 || (e = o.data("query-url"), i = a.find(".shopcart").find(".count"), n = o.data("url"), t = $("#af-header").find(".nav-member"), $.getJSON(e, function(e) {
                e.shoppingCart.isEmpty ? t.find(".shopcart").off("click") : (i.show().text(e.shoppingCart.totalQuantity), t.find(".shopcart").on("click", function() {
                    $("#ifrmMiniCart").attr("src", n)
                }))
            }))
        },
        initGlobalVar: function(e) {
            e.MoreClick = function() {
                if ("" != $("#top-search-bar").val()) {
                    $("#searchinputDefault").val();
                    return window.location.href = af.setting.search.redirectUrl + encodeURI($("#searchinput").val()), !1
                }
            }, e.Search = function() {
                return !1
            }, e.afeUtil = publicObj
        },
        getMsg: function() {
            setInterval(function() {
                if (!document.getElementById("api_message")) {
                    var e = document.createElement("script");
                    e.type = "text/javascript", e.async = !0, e.id = "api_message", e.src = "https://" + localDomain + "/api_message.aspx?" + (new Date).getTime();
                    var i = document.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(e, i)
                }
            }, 6e5)
        }
    }, window.af = af, af.initGlobalVar(window)
}(jQuery);
