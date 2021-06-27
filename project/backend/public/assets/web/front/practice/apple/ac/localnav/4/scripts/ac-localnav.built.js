require = function t(e, n, o) {
    function r(s, a) {
        if (!n[s]) {
            if (!e[s]) {
                var c = "function" == typeof require && require;
                if (!a && c) return c(s, !0);
                if (i) return i(s, !0);
                throw new Error("Cannot find module '" + s + "'")
            }
            var l = n[s] = {
                exports: {}
            };
            e[s][0].call(l.exports, function(t) {
                var n = e[s][1][t];
                return r(n || t)
            }, l, l.exports, t, e, n, o)
        }
        return n[s].exports
    }
    for (var i = "function" == typeof require && require, s = 0; s < o.length; s++) r(o[s]);
    return r
}({
    1: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice"), t("@marcom/ac-polyfills/Element/prototype.classList");
        var o = t("./className/add");
        e.exports = function() {
            var t, e = Array.prototype.slice.call(arguments),
                n = e.shift(e);
            if (n.classList && n.classList.add) return void n.classList.add.apply(n.classList, e);
            for (t = 0; t < e.length; t++) o(n, e[t])
        }
    }, {
        "./className/add": 3,
        "@marcom/ac-polyfills/Array/prototype.slice": 55,
        "@marcom/ac-polyfills/Element/prototype.classList": 56
    }],
    2: [function(t, e, n) {
        "use strict";
        e.exports = {
            add: t("./className/add"),
            contains: t("./className/contains"),
            remove: t("./className/remove")
        }
    }, {
        "./className/add": 3,
        "./className/contains": 4,
        "./className/remove": 6
    }],
    3: [function(t, e, n) {
        "use strict";
        var o = t("./contains");
        e.exports = function(t, e) {
            o(t, e) || (t.className += " " + e)
        }
    }, {
        "./contains": 4
    }],
    4: [function(t, e, n) {
        "use strict";
        var o = t("./getTokenRegExp");
        e.exports = function(t, e) {
            return o(e).test(t.className)
        }
    }, {
        "./getTokenRegExp": 5
    }],
    5: [function(t, e, n) {
        "use strict";
        e.exports = function(t) {
            return new RegExp("(\\s|^)" + t + "(\\s|$)")
        }
    }, {}],
    6: [function(t, e, n) {
        "use strict";
        var o = t("./contains"),
            r = t("./getTokenRegExp");
        e.exports = function(t, e) {
            o(t, e) && (t.className = t.className.replace(r(e), "$1").trim())
        }
    }, {
        "./contains": 4,
        "./getTokenRegExp": 5
    }],
    7: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Element/prototype.classList");
        var o = t("./className/contains");
        e.exports = function(t, e) {
            return t.classList && t.classList.contains ? t.classList.contains(e) : o(t, e)
        }
    }, {
        "./className/contains": 4,
        "@marcom/ac-polyfills/Element/prototype.classList": 56
    }],
    8: [function(t, e, n) {
        "use strict";
        e.exports = {
            add: t("./add"),
            contains: t("./contains"),
            remove: t("./remove"),
            toggle: t("./toggle")
        }
    }, {
        "./add": 1,
        "./contains": 7,
        "./remove": 9,
        "./toggle": 10
    }],
    9: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice"), t("@marcom/ac-polyfills/Element/prototype.classList");
        var o = t("./className/remove");
        e.exports = function() {
            var t, e = Array.prototype.slice.call(arguments),
                n = e.shift(e);
            if (n.classList && n.classList.remove) return void n.classList.remove.apply(n.classList, e);
            for (t = 0; t < e.length; t++) o(n, e[t])
        }
    }, {
        "./className/remove": 6,
        "@marcom/ac-polyfills/Array/prototype.slice": 55,
        "@marcom/ac-polyfills/Element/prototype.classList": 56
    }],
    10: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Element/prototype.classList");
        var o = t("./className");
        e.exports = function(t, e, n) {
            var r, i = void 0 !== n;
            return t.classList && t.classList.toggle ? i ? t.classList.toggle(e, n) : t.classList.toggle(e) : (r = i ? !!n : !o.contains(t, e), r ? o.add(t, e) : o.remove(t, e), r)
        }
    }, {
        "./className": 2,
        "@marcom/ac-polyfills/Element/prototype.classList": 56
    }],
    11: [function(t, e, n) {
        "use strict";
        e.exports = function(t, e, n, o) {
            return t.addEventListener ? t.addEventListener(e, n, !!o) : t.attachEvent("on" + e, n), t
        }
    }, {}],
    12: [function(t, e, n) {
        "use strict";
        e.exports = function(t) {
            var e;
            if ((t = t || window) === window) {
                if (e = window.pageYOffset) return e;
                t = document.documentElement || document.body.parentNode || document.body
            }
            return t.scrollTop
        }
    }, {}],
    13: [function(t, e, n) {
        "use strict";
        e.exports = 8
    }, {}],
    14: [function(t, e, n) {
        "use strict";
        e.exports = 11
    }, {}],
    15: [function(t, e, n) {
        "use strict";
        e.exports = 9
    }, {}],
    16: [function(t, e, n) {
        "use strict";
        e.exports = 1
    }, {}],
    17: [function(t, e, n) {
        "use strict";
        e.exports = 3
    }, {}],
    18: [function(t, e, n) {
        "use strict";
        var o = t("./internal/validate");
        e.exports = function(t, e) {
            return o.insertNode(t, !0, "insertBefore"), o.childNode(e, !0, "insertBefore"), o.hasParentNode(e, "insertBefore"), e.parentNode.insertBefore(t, e)
        }
    }, {
        "./internal/validate": 20
    }],
    19: [function(t, e, n) {
        "use strict";
        var o = t("../isNode");
        e.exports = function(t, e) {
            return !!o(t) && ("number" == typeof e ? t.nodeType === e : -1 !== e.indexOf(t.nodeType))
        }
    }, {
        "../isNode": 23
    }],
    20: [function(t, e, n) {
        "use strict";
        var o = t("./isNodeType"),
            r = t("../COMMENT_NODE"),
            i = t("../DOCUMENT_FRAGMENT_NODE"),
            s = t("../ELEMENT_NODE"),
            a = t("../TEXT_NODE"),
            c = [s, a, r, i],
            l = [s, a, r],
            u = [s, i];
        e.exports = {
            parentNode: function(t, e, n, r) {
                if (r = r || "target", (t || e) && !o(t, u)) throw new TypeError(n + ": " + r + " must be an Element, or Document Fragment")
            },
            childNode: function(t, e, n, r) {
                if (r = r || "target", (t || e) && !o(t, l)) throw new TypeError(n + ": " + r + " must be an Element, TextNode, or Comment")
            },
            insertNode: function(t, e, n, r) {
                if (r = r || "node", (t || e) && !o(t, c)) throw new TypeError(n + ": " + r + " must be an Element, TextNode, Comment, or Document Fragment")
            },
            hasParentNode: function(t, e, n) {
                if (n = n || "target", !t.parentNode) throw new TypeError(e + ": " + n + " must have a parentNode")
            }
        }
    }, {
        "../COMMENT_NODE": 13,
        "../DOCUMENT_FRAGMENT_NODE": 14,
        "../ELEMENT_NODE": 16,
        "../TEXT_NODE": 17,
        "./isNodeType": 19
    }],
    21: [function(t, e, n) {
        "use strict";
        var o = t("./internal/isNodeType"),
            r = t("./DOCUMENT_FRAGMENT_NODE");
        e.exports = function(t) {
            return o(t, r)
        }
    }, {
        "./DOCUMENT_FRAGMENT_NODE": 14,
        "./internal/isNodeType": 19
    }],
    22: [function(t, e, n) {
        "use strict";
        var o = t("./internal/isNodeType"),
            r = t("./ELEMENT_NODE");
        e.exports = function(t) {
            return o(t, r)
        }
    }, {
        "./ELEMENT_NODE": 16,
        "./internal/isNodeType": 19
    }],
    23: [function(t, e, n) {
        "use strict";
        e.exports = function(t) {
            return !(!t || !t.nodeType)
        }
    }, {}],
    24: [function(t, e, n) {
        "use strict";
        var o = t("./internal/validate");
        e.exports = function(t) {
            return o.childNode(t, !0, "remove"), t.parentNode ? t.parentNode.removeChild(t) : t
        }
    }, {
        "./internal/validate": 20
    }],
    25: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-dom-nodes/isElement"),
            r = t("./matchesSelector"),
            i = t("./internal/validate");
        e.exports = function(t, e, n, s) {
            if (i.childNode(t, !0, "ancestors"), i.selector(e, !1, "ancestors"), n && o(t) && (!e || r(t, e))) return t;
            if (s = s || document.body, t !== s)
                for (;
                    (t = t.parentNode) && o(t);) {
                    if (!e || r(t, e)) return t;
                    if (t === s) break
                }
            return null
        }
    }, {
        "./internal/validate": 28,
        "./matchesSelector": 29,
        "@marcom/ac-dom-nodes/isElement": 22
    }],
    26: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-dom-nodes/isElement"),
            r = t("./matchesSelector"),
            i = t("./internal/validate");
        e.exports = function(t, e, n, s) {
            var a = [];
            if (i.childNode(t, !0, "ancestors"), i.selector(e, !1, "ancestors"), n && o(t) && (!e || r(t, e)) && a.push(t), s = s || document.body, t !== s)
                for (;
                    (t = t.parentNode) && o(t) && (e && !r(t, e) || a.push(t), t !== s););
            return a
        }
    }, {
        "./internal/validate": 28,
        "./matchesSelector": 29,
        "@marcom/ac-dom-nodes/isElement": 22
    }],
    27: [function(t, e, n) {
        "use strict";
        e.exports = window.Element ? function(t) {
            return t.matches || t.matchesSelector || t.webkitMatchesSelector || t.mozMatchesSelector || t.msMatchesSelector || t.oMatchesSelector
        }(Element.prototype) : null
    }, {}],
    28: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.indexOf");
        var o = t("@marcom/ac-dom-nodes/isNode"),
            r = t("@marcom/ac-dom-nodes/COMMENT_NODE"),
            i = t("@marcom/ac-dom-nodes/DOCUMENT_FRAGMENT_NODE"),
            s = t("@marcom/ac-dom-nodes/DOCUMENT_NODE"),
            a = t("@marcom/ac-dom-nodes/ELEMENT_NODE"),
            c = t("@marcom/ac-dom-nodes/TEXT_NODE"),
            l = function(t, e) {
                return !!o(t) && ("number" == typeof e ? t.nodeType === e : -1 !== e.indexOf(t.nodeType))
            },
            u = [a, s, i],
            m = [a, c, r];
        e.exports = {
            parentNode: function(t, e, n, o) {
                if (o = o || "node", (t || e) && !l(t, u)) throw new TypeError(n + ": " + o + " must be an Element, Document, or Document Fragment")
            },
            childNode: function(t, e, n, o) {
                if (o = o || "node", (t || e) && !l(t, m)) throw new TypeError(n + ": " + o + " must be an Element, TextNode, or Comment")
            },
            selector: function(t, e, n, o) {
                if (o = o || "selector", (t || e) && "string" != typeof t) throw new TypeError(n + ": " + o + " must be a string")
            }
        }
    }, {
        "@marcom/ac-dom-nodes/COMMENT_NODE": 13,
        "@marcom/ac-dom-nodes/DOCUMENT_FRAGMENT_NODE": 14,
        "@marcom/ac-dom-nodes/DOCUMENT_NODE": 15,
        "@marcom/ac-dom-nodes/ELEMENT_NODE": 16,
        "@marcom/ac-dom-nodes/TEXT_NODE": 17,
        "@marcom/ac-dom-nodes/isNode": 23,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 54
    }],
    29: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-dom-nodes/isElement"),
            r = t("./internal/validate"),
            i = t("./internal/nativeMatches"),
            s = t("./shims/matchesSelector");
        e.exports = function(t, e) {
            return r.selector(e, !0, "matchesSelector"), !!o(t) && (i ? i.call(t, e) : s(t, e))
        }
    }, {
        "./internal/nativeMatches": 27,
        "./internal/validate": 28,
        "./shims/matchesSelector": 31,
        "@marcom/ac-dom-nodes/isElement": 22
    }],
    30: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice");
        var o = t("./internal/validate"),
            r = t("./shims/querySelectorAll"),
            i = "querySelectorAll" in document;
        e.exports = function(t, e) {
            return e = e || document, o.parentNode(e, !0, "querySelectorAll", "context"), o.selector(t, !0, "querySelectorAll"), i ? Array.prototype.slice.call(e.querySelectorAll(t)) : r(t, e)
        }
    }, {
        "./internal/validate": 28,
        "./shims/querySelectorAll": 32,
        "@marcom/ac-polyfills/Array/prototype.slice": 55
    }],
    31: [function(t, e, n) {
        "use strict";
        var o = t("../querySelectorAll");
        e.exports = function(t, e) {
            var n, r = t.parentNode || document,
                i = o(e, r);
            for (n = 0; n < i.length; n++)
                if (i[n] === t) return !0;
            return !1
        }
    }, {
        "../querySelectorAll": 30
    }],
    32: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.indexOf");
        var o = t("@marcom/ac-dom-nodes/isElement"),
            r = t("@marcom/ac-dom-nodes/isDocumentFragment"),
            i = t("@marcom/ac-dom-nodes/remove"),
            s = function(t, e) {
                var n;
                if (e === document) return !0;
                for (n = t;
                    (n = n.parentNode) && o(n);)
                    if (n === e) return !0;
                return !1
            },
            a = function(t) {
                "recalc" in t ? t.recalc(!1) : document.recalc(!1), window.scrollBy(0, 0)
            };
        e.exports = function(t, e) {
            var n, o = document.createElement("style"),
                c = "_ac_qsa_" + (Math.random() + "").slice(-6),
                l = [];
            for (e = e || document, document[c] = [], r(e) ? e.appendChild(o) : document.documentElement.firstChild.appendChild(o), o.styleSheet.cssText = "*{display:recalc;}" + t + '{ac-qsa:expression(document["' + c + '"] && document["' + c + '"].push(this));}', a(e); document[c].length;) n = document[c].shift(), n.style.removeAttribute("ac-qsa"), -1 === l.indexOf(n) && s(n, e) && l.push(n);
            return document[c] = null, i(o), a(e), l
        }
    }, {
        "@marcom/ac-dom-nodes/isDocumentFragment": 21,
        "@marcom/ac-dom-nodes/isElement": 22,
        "@marcom/ac-dom-nodes/remove": 24,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 54
    }],
    33: [function(t, e, n) {
        "use strict";
        e.exports = {
            EventEmitterMicro: t("./ac-event-emitter-micro/EventEmitterMicro")
        }
    }, {
        "./ac-event-emitter-micro/EventEmitterMicro": 34
    }],
    34: [function(t, e, n) {
        "use strict";

        function o() {
            this._events = {}
        }
        var r = o.prototype;
        r.on = function(t, e) {
            this._events[t] = this._events[t] || [], this._events[t].unshift(e)
        }, r.once = function(t, e) {
            function n(r) {
                o.off(t, n), void 0 !== r ? e(r) : e()
            }
            var o = this;
            this.on(t, n)
        }, r.off = function(t, e) {
            if (this.has(t)) {
                if (1 === arguments.length) return this._events[t] = null, void delete this._events[t];
                var n = this._events[t].indexOf(e); - 1 !== n && this._events[t].splice(n, 1)
            }
        }, r.trigger = function(t, e) {
            if (this.has(t))
                for (var n = this._events[t].length - 1; n >= 0; n--) void 0 !== e ? this._events[t][n](e) : this._events[t][n]()
        }, r.has = function(t) {
            return t in this._events != !1 && 0 !== this._events[t].length
        }, r.destroy = function() {
            for (var t in this._events) this._events[t] = null;
            this._events = null
        }, e.exports = o
    }, {}],
    35: [function(t, e, n) {
        "use strict";
        var o = function() {
            var t, e = "";
            for (t = 0; t < arguments.length; t++) t > 0 && (e += ","), e += arguments[t];
            return e
        };
        e.exports = function(t, e) {
            e = e || o;
            var n = function() {
                var o = arguments,
                    r = e.apply(this, o);
                return r in n.cache || (n.cache[r] = t.apply(this, o)), n.cache[r]
            };
            return n.cache = {}, n
        }
    }, {}],
    36: [function(t, e, n) {
        "use strict";
        e.exports = function(t) {
            var e;
            return function() {
                return void 0 === e && (e = t.apply(this, arguments)), e
            }
        }
    }, {}],
    37: [function(t, e, n) {
        "use strict";

        function o(t, e) {
            return void 0 !== e ? !!r(t, e) : !!i(t)
        }
        var r = t("@marcom/ac-prefixer/getStyleValue"),
            i = t("@marcom/ac-prefixer/getStyleProperty"),
            s = t("@marcom/ac-function/memoize");
        e.exports = s(o), e.exports.original = o
    }, {
        "@marcom/ac-function/memoize": 35,
        "@marcom/ac-prefixer/getStyleProperty": 62,
        "@marcom/ac-prefixer/getStyleValue": 63
    }],
    38: [function(t, e, n) {
        "use strict";
        e.exports = {
            getWindow: function() {
                return window
            },
            getDocument: function() {
                return document
            },
            getNavigator: function() {
                return navigator
            }
        }
    }, {}],
    39: [function(t, e, n) {
        "use strict";

        function o() {
            var t = r.getWindow(),
                e = t.matchMedia("only all");
            return !(!e || !e.matches)
        }
        t("@marcom/ac-polyfills/matchMedia");
        var r = t("./helpers/globals"),
            i = t("@marcom/ac-function/once");
        e.exports = i(o), e.exports.original = o
    }, {
        "./helpers/globals": 38,
        "@marcom/ac-function/once": 36,
        "@marcom/ac-polyfills/matchMedia": 61
    }],
    40: [function(t, e, n) {
        "use strict";

        function o() {
            var t = r.getWindow(),
                e = r.getDocument(),
                n = r.getNavigator();
            return !!("ontouchstart" in t || t.DocumentTouch && e instanceof t.DocumentTouch || n.maxTouchPoints > 0 || n.msMaxTouchPoints > 0)
        }
        var r = t("./helpers/globals"),
            i = t("@marcom/ac-function/once");
        e.exports = i(o), e.exports.original = o
    }, {
        "./helpers/globals": 38,
        "@marcom/ac-function/once": 36
    }],
    41: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.forEach");
        var o = Object.prototype.hasOwnProperty;
        e.exports = function() {
            var t, e;
            return t = arguments.length < 2 ? [{}, arguments[0]] : [].slice.call(arguments), e = t.shift(), t.forEach(function(t) {
                if (null != t)
                    for (var n in t) o.call(t, n) && (e[n] = t[n])
            }), e
        }
    }, {
        "@marcom/ac-polyfills/Array/prototype.forEach": 53
    }],
    42: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-classlist/add"),
            r = t("@marcom/ac-classlist/remove"),
            i = t("@marcom/ac-object/extend"),
            s = function(t, e) {
                this._target = t, this._tests = {}, this.addTests(e)
            },
            a = s.prototype;
        a.addTests = function(t) {
            this._tests = i(this._tests, t || {})
        }, a._supports = function(t) {
            return void 0 !== this._tests[t] && ("function" == typeof this._tests[t] && (this._tests[t] = this._tests[t]()), this._tests[t])
        }, a._addClass = function(t, e) {
            e = e || "no-", this._supports(t) ? o(this._target, t) : o(this._target, e + t)
        }, a.htmlClass = function() {
            var t;
            r(this._target, "no-js"), o(this._target, "js");
            for (t in this._tests) this._tests.hasOwnProperty(t) && this._addClass(t)
        }, e.exports = s
    }, {
        "@marcom/ac-classlist/add": 1,
        "@marcom/ac-classlist/remove": 9,
        "@marcom/ac-object/extend": 41
    }],
    43: [function(t, e, n) {
        "use strict";
        var o = {
            ua: window.navigator.userAgent,
            platform: window.navigator.platform,
            vendor: window.navigator.vendor
        };
        e.exports = t("./parseUserAgent")(o)
    }, {
        "./parseUserAgent": 46
    }],
    44: [function(t, e, n) {
        "use strict";
        e.exports = {
            browser: {
                safari: !1,
                chrome: !1,
                firefox: !1,
                ie: !1,
                opera: !1,
                android: !1,
                edge: !1,
                version: {
                    name: "",
                    major: 0,
                    minor: 0,
                    patch: 0,
                    documentMode: !1
                }
            },
            os: {
                osx: !1,
                ios: !1,
                android: !1,
                windows: !1,
                linux: !1,
                fireos: !1,
                chromeos: !1,
                version: {
                    name: "",
                    major: 0,
                    minor: 0,
                    patch: 0
                }
            }
        }
    }, {}],
    45: [function(t, e, n) {
        "use strict";
        e.exports = {
            browser: [{
                name: "edge",
                userAgent: "Edge",
                version: ["rv", "Edge"],
                test: function(t) {
                    return t.ua.indexOf("Edge") > -1 || "Mozilla/5.0 (Windows NT 10.0; Win64; x64)" === t.ua
                }
            }, {
                name: "chrome",
                userAgent: "Chrome"
            }, {
                name: "firefox",
                test: function(t) {
                    return t.ua.indexOf("Firefox") > -1 && -1 === t.ua.indexOf("Opera")
                },
                version: "Firefox"
            }, {
                name: "android",
                userAgent: "Android"
            }, {
                name: "safari",
                test: function(t) {
                    return t.ua.indexOf("Safari") > -1 && t.vendor.indexOf("Apple") > -1
                },
                version: "Version"
            }, {
                name: "ie",
                test: function(t) {
                    return t.ua.indexOf("IE") > -1 || t.ua.indexOf("Trident") > -1
                },
                version: ["MSIE", "rv"],
                parseDocumentMode: function() {
                    var t = !1;
                    return document.documentMode && (t = parseInt(document.documentMode, 10)), t
                }
            }, {
                name: "opera",
                userAgent: "Opera",
                version: ["Version", "Opera"]
            }],
            os: [{
                name: "windows",
                test: function(t) {
                    return t.platform.indexOf("Win") > -1
                },
                version: "Windows NT"
            }, {
                name: "osx",
                userAgent: "Mac",
                test: function(t) {
                    return t.platform.indexOf("Mac") > -1
                }
            }, {
                name: "ios",
                test: function(t) {
                    return t.ua.indexOf("iPhone") > -1 || t.ua.indexOf("iPad") > -1
                },
                version: ["iPhone OS", "CPU OS"]
            }, {
                name: "linux",
                userAgent: "Linux",
                test: function(t) {
                    return t.platform.indexOf("Linux") > -1 && -1 === t.ua.indexOf("Android")
                }
            }, {
                name: "fireos",
                test: function(t) {
                    return t.ua.indexOf("Firefox") > -1 && t.ua.indexOf("Mobile") > -1
                },
                version: "rv"
            }, {
                name: "android",
                userAgent: "Android"
            }, {
                name: "chromeos",
                userAgent: "CrOS"
            }]
        }
    }, {}],
    46: [function(t, e, n) {
        "use strict";

        function o(t) {
            return new RegExp(t + "[a-zA-Z\\s/:]+([0-9_.]+)", "i")
        }

        function r(t, e) {
            if ("function" == typeof t.parseVersion) return t.parseVersion(e);
            var n = t.version || t.userAgent;
            "string" == typeof n && (n = [n]);
            for (var r, i = n.length, s = 0; s < i; s++)
                if ((r = e.match(o(n[s]))) && r.length > 1) return r[1].replace(/_/g, ".")
        }

        function i(t, e, n) {
            for (var o, i, s = t.length, a = 0; a < s; a++)
                if ("function" == typeof t[a].test ? !0 === t[a].test(n) && (o = t[a].name) : n.ua.indexOf(t[a].userAgent) > -1 && (o = t[a].name), o) {
                    if (e[o] = !0, "string" == typeof(i = r(t[a], n.ua))) {
                        var c = i.split(".");
                        e.version.name = i, c && c.length > 0 && (e.version.major = parseInt(c[0] || 0), e.version.minor = parseInt(c[1] || 0), e.version.patch = parseInt(c[2] || 0))
                    } else "edge" === o && (e.version.name = "12.0.0", e.version.major = "12", e.version.minor = "0", e.version.patch = "0");
                    return "function" == typeof t[a].parseDocumentMode && (e.version.documentMode = t[a].parseDocumentMode()), e
                }
            return e
        }

        function s(t) {
            var e = {};
            return e.browser = i(c.browser, a.browser, t), e.os = i(c.os, a.os, t), e
        }
        var a = t("./defaults"),
            c = t("./dictionary");
        e.exports = s
    }, {
        "./defaults": 44,
        "./dictionary": 45
    }],
    47: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-dom-traversal/ancestor"),
            r = t("@marcom/ac-classlist"),
            i = t("@marcom/ac-dom-nodes/isElement"),
            s = t("@marcom/ac-feature/cssPropertyAvailable"),
            a = t("@marcom/ac-viewport-emitter/ViewportEmitter"),
            c = t("@marcom/ac-object/defaults"),
            l = t("./internal/CheckboxMenu"),
            u = t("./internal/SimpleSticky"),
            m = t("./internal/ClickAway"),
            d = {
                className: "localnav"
            },
            p = function(t, e) {
                var n;
                e = c(d, e || {}), this.el = t, n = e.selector || "." + e.className, this._selectors = {
                    traySelector: e.traySelector || "." + e.className + "-menu-tray",
                    viewportEmitterID: e.viewportEmitterID || e.className + "-viewport-emitter",
                    curtainID: e.curtainID || e.className + "-curtain",
                    menuStateID: e.menuStateID || e.className + "-menustate",
                    menuOpeningClassName: e.menuOpeningClassName || e.className + "-opening"
                }, this._selectors.clickAwaySelector = n + ", #" + this._selectors.curtainID + ", #" + this._selectors.menuStateID, this.tray = this.el.querySelector(this._selectors.traySelector), this.stickyEnabled = this._getStickyEnabled(), this._transitionsAvailable = s("transition"), this._viewports = new a(this._selectors.viewportEmitterID), this.stickyEnabled && (this._sticky = new u(this.el, e)), this._initializeMenu()
            };
        p.create = function(t, e) {
            return new p(t, e)
        };
        var h = p.prototype;
        h._getStickyEnabled = function() {
            return this.el.hasAttribute("data-sticky")
        }, h._initializeMenu = function() {
            var t, e = document.getElementById(this._selectors.menuStateID),
                n = document.getElementById(this._selectors.menuStateID + "-open"),
                o = document.getElementById(this._selectors.menuStateID + "-close"),
                r = "onpopstate" in window ? "popstate" : "beforeunload";
            e && n && o && (this.menu = new l(e, n, o), this.menu.on("open", this._onMenuOpen.bind(this)), this._viewports.on("change", this._onViewportChange.bind(this)), window.addEventListener("scroll", this._onScroll.bind(this)), window.addEventListener("touchmove", this._onScroll.bind(this)), window.addEventListener("keydown", this._onKeyDown.bind(this)), this.tray.addEventListener("click", this._onTrayClick.bind(this)), this._closeMenu = this._closeMenu.bind(this), window.addEventListener(r, this._closeMenu), window.addEventListener("orientationchange", this._closeMenu), t = new m(this._selectors.clickAwaySelector), t.on("click", this._closeMenu), this._transitionsAvailable && this.tray.addEventListener("transitionend", this._enableMenuScroll.bind(this)))
        }, h._onMenuOpen = function() {
            this._menuCollapseOnScroll = null, this._transitionsAvailable && this._disableMenuScrollbar()
        }, h._onScroll = function(t) {
            var e;
            this.menu.isOpen() && (null === this._menuCollapseOnScroll && (this._menuCollapseOnScroll = this.tray.offsetHeight >= this.tray.scrollHeight), this._menuCollapseOnScroll ? this.menu.close() : (e = t.target, i(e) && o(e, this._selectors.traySelector, !0) || t.preventDefault()))
        }, h._onTrayClick = function(t) {
            "href" in t.target && this._closeMenu()
        }, h._onKeyDown = function(t) {
            !this.menu.isOpen() || "Escape" !== t.code && 27 !== t.keyCode || (this._closeMenu(), this.menu.anchorOpen.focus())
        }, h._onViewportChange = function(t) {
            "medium" !== t.to && "large" !== t.to || this._closeMenu()
        }, h._disableMenuScrollbar = function() {
            r.add(this.el, this._selectors.menuOpeningClassName)
        }, h._enableMenuScroll = function() {
            r.remove(this.el, this._selectors.menuOpeningClassName)
        }, h._closeMenu = function() {
            this.menu.close()
        }, h.destroy = function() {}, e.exports = p
    }, {
        "./internal/CheckboxMenu": 48,
        "./internal/ClickAway": 49,
        "./internal/SimpleSticky": 50,
        "@marcom/ac-classlist": 8,
        "@marcom/ac-dom-nodes/isElement": 22,
        "@marcom/ac-dom-traversal/ancestor": 25,
        "@marcom/ac-feature/cssPropertyAvailable": 37,
        "@marcom/ac-object/defaults": 51,
        "@marcom/ac-viewport-emitter/ViewportEmitter": 70
    }],
    48: [function(t, e, n) {
        "use strict";

        function o(t, e, n) {
            r.call(this), this.el = t, this.anchorOpen = e, this.anchorClose = n, this._lastOpen = this.el.checked, this.el.addEventListener("change", this.update.bind(this)), this.anchorOpen.addEventListener("click", this._anchorOpenClick.bind(this)), this.anchorClose.addEventListener("click", this._anchorCloseClick.bind(this)), window.location.hash === "#" + t.id && (window.location.hash = "")
        }
        var r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro;
        o.create = function(t, e, n) {
            return new o(t, e, n)
        };
        var i = r.prototype,
            s = o.prototype = Object.create(i);
        o.prototype.constructor = o, s.update = function() {
            var t = this.isOpen();
            t !== this._lastOpen && (this.trigger(t ? "open" : "close"), this._lastOpen = t)
        }, s.isOpen = function() {
            return this.el.checked
        }, s.toggle = function() {
            this.isOpen() ? this.close() : this.open()
        }, s.open = function() {
            this.el.checked || (this.el.checked = !0, this.update())
        }, s.close = function() {
            this.el.checked && (this.el.checked = !1, this.update())
        }, s._anchorOpenClick = function(t) {
            t.preventDefault(), this.open(), this.anchorClose.focus()
        }, s._anchorCloseClick = function(t) {
            t.preventDefault(), this.close(), this.anchorOpen.focus()
        }, e.exports = o
    }, {
        "@marcom/ac-event-emitter-micro": 33
    }],
    49: [function(t, e, n) {
        "use strict";

        function o(t) {
            r.call(this), this._selector = t, this._touching = !1, document.addEventListener("click", this._onClick.bind(this)), document.addEventListener("touchstart", this._onTouchStart.bind(this)), document.addEventListener("touchend", this._onTouchEnd.bind(this))
        }
        var r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            i = t("@marcom/ac-dom-traversal/ancestors"),
            s = r.prototype,
            a = o.prototype = Object.create(s);
        o.prototype.constructor = o, a._checkTarget = function(t) {
            var e = t.target;
            i(e, this._selector, !0).length || this.trigger("click", t)
        }, a._onClick = function(t) {
            this._touching || this._checkTarget(t)
        }, a._onTouchStart = function(t) {
            this._touching = !0, this._checkTarget(t)
        }, a._onTouchEnd = function() {
            this._touching = !1
        }, e.exports = o
    }, {
        "@marcom/ac-dom-traversal/ancestors": 26,
        "@marcom/ac-event-emitter-micro": 33
    }],
    50: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            r = t("@marcom/ac-feature/cssPropertyAvailable"),
            i = t("@marcom/ac-dom-nodes/insertBefore"),
            s = t("@marcom/ac-dom-metrics/getScrollY"),
            a = t("@marcom/ac-classlist/add"),
            c = t("@marcom/ac-classlist/remove"),
            l = t("@marcom/ac-useragent"),
            u = l.browser.edge,
            m = function(t, e) {
                o.call(this), this.el = t, this.stuck = !1, this._selectors = {
                    placeholderID: e.placeholderID || e.className + "-sticky-placeholder",
                    stuckClassName: e.stuckClassName || e.className + "-sticking"
                }, this._createPlaceholder(), this._featureDetection(), this._updatePosition = this._updatePosition.bind(this), this._updatePlaceholderOffset = this._updatePlaceholderOffset.bind(this), window.addEventListener("scroll", this._updatePosition), document.addEventListener("touchmove", this._updatePosition), window.addEventListener("resize", this._updatePlaceholderOffset), window.addEventListener("orientationchange", this._updatePlaceholderOffset), "acStore" in window && (window.acStore.getStorefront().then(this._updatePlaceholderOffset), window.acStore.on("storefrontChange", this._updatePlaceholderOffset))
            };
        m.create = function(t, e) {
            return new m(t, e)
        };
        var d = o.prototype,
            p = m.prototype = Object.create(d);
        m.prototype.constructor = m, p._featureDetection = function() {
            var t = r("position", "sticky") && !u,
                e = "css-sticky";
            t || (e = "no-" + e), a(this.el, e), a(this.placeholder, e)
        }, p._createPlaceholder = function() {
            this.placeholder = document.createElement("div"), this.placeholder.id = this._selectors.placeholderID, i(this.placeholder, this.el), this._updatePlaceholderOffset()
        }, p._updatePlaceholderOffset = function() {
            var t = this.placeholder.offsetTop;
            (t += document.documentElement.offsetTop + document.body.offsetTop) !== this._placeholderOffset && (this._placeholderOffset = t, this._updatePosition())
        }, p._updatePosition = function() {
            s() > this._placeholderOffset ? this.stuck || (a(this.el, this._selectors.stuckClassName), a(this.placeholder, this._selectors.stuckClassName), this.stuck = !0, this.trigger("stuck")) : this.stuck && (c(this.el, this._selectors.stuckClassName), c(this.placeholder, this._selectors.stuckClassName), this.stuck = !1, this.trigger("unstuck"))
        }, e.exports = m
    }, {
        "@marcom/ac-classlist/add": 1,
        "@marcom/ac-classlist/remove": 9,
        "@marcom/ac-dom-metrics/getScrollY": 12,
        "@marcom/ac-dom-nodes/insertBefore": 18,
        "@marcom/ac-event-emitter-micro": 33,
        "@marcom/ac-feature/cssPropertyAvailable": 37,
        "@marcom/ac-useragent": 43
    }],
    51: [function(t, e, n) {
        "use strict";
        var o = t("./extend");
        e.exports = function(t, e) {
            if ("object" != typeof t) throw new TypeError("defaults: must provide a defaults object");
            if ("object" != typeof(e = e || {})) throw new TypeError("defaults: options must be a typeof object");
            return o({}, t, e)
        }
    }, {
        "./extend": 52
    }],
    52: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.forEach");
        var o = Object.prototype.hasOwnProperty;
        e.exports = function() {
            var t, e;
            return t = arguments.length < 2 ? [{}, arguments[0]] : [].slice.call(arguments), e = t.shift(), t.forEach(function(t) {
                if (null != t)
                    for (var n in t) o.call(t, n) && (e[n] = t[n])
            }), e
        }
    }, {
        "@marcom/ac-polyfills/Array/prototype.forEach": 53
    }],
    53: [function(t, e, n) {
        Array.prototype.forEach || (Array.prototype.forEach = function(t, e) {
            var n, o, r = Object(this);
            if ("function" != typeof t) throw new TypeError("No function object passed to forEach.");
            var i = this.length;
            for (n = 0; n < i; n += 1) o = r[n], t.call(e, o, n, r)
        })
    }, {}],
    54: [function(t, e, n) {
        Array.prototype.indexOf || (Array.prototype.indexOf = function(t, e) {
            var n = e || 0,
                o = 0;
            if (n < 0 && (n = this.length + e - 1) < 0) throw "Wrapped past beginning of array while looking up a negative start index.";
            for (o = 0; o < this.length; o++)
                if (this[o] === t) return o;
            return -1
        })
    }, {}],
    55: [function(t, e, n) {
        ! function() {
            "use strict";
            var t = Array.prototype.slice;
            try {
                t.call(document.documentElement)
            } catch (e) {
                Array.prototype.slice = function(e, n) {
                    if (n = void 0 !== n ? n : this.length, "[object Array]" === Object.prototype.toString.call(this)) return t.call(this, e, n);
                    var o, r, i = [],
                        s = this.length,
                        a = e || 0;
                    a = a >= 0 ? a : s + a;
                    var c = n || s;
                    if (n < 0 && (c = s + n), (r = c - a) > 0)
                        if (i = new Array(r), this.charAt)
                            for (o = 0; o < r; o++) i[o] = this.charAt(a + o);
                        else
                            for (o = 0; o < r; o++) i[o] = this[a + o];
                    return i
                }
            }
        }()
    }, {}],
    56: [function(t, e, n) {
        "document" in self && ("classList" in document.createElement("_") ? function() {
            "use strict";
            var t = document.createElement("_");
            if (t.classList.add("c1", "c2"), !t.classList.contains("c2")) {
                var e = function(t) {
                    var e = DOMTokenList.prototype[t];
                    DOMTokenList.prototype[t] = function(t) {
                        var n, o = arguments.length;
                        for (n = 0; n < o; n++) t = arguments[n], e.call(this, t)
                    }
                };
                e("add"), e("remove")
            }
            if (t.classList.toggle("c3", !1), t.classList.contains("c3")) {
                var n = DOMTokenList.prototype.toggle;
                DOMTokenList.prototype.toggle = function(t, e) {
                    return 1 in arguments && !this.contains(t) == !e ? e : n.call(this, t)
                }
            }
            t = null
        }() : function(t) {
            "use strict";
            if ("Element" in t) {
                var e = t.Element.prototype,
                    n = Object,
                    o = String.prototype.trim || function() {
                        return this.replace(/^\s+|\s+$/g, "")
                    },
                    r = Array.prototype.indexOf || function(t) {
                        for (var e = 0, n = this.length; e < n; e++)
                            if (e in this && this[e] === t) return e;
                        return -1
                    },
                    i = function(t, e) {
                        this.name = t, this.code = DOMException[t], this.message = e
                    },
                    s = function(t, e) {
                        if ("" === e) throw new i("SYNTAX_ERR", "An invalid or illegal string was specified");
                        if (/\s/.test(e)) throw new i("INVALID_CHARACTER_ERR", "String contains an invalid character");
                        return r.call(t, e)
                    },
                    a = function(t) {
                        for (var e = o.call(t.getAttribute("class") || ""), n = e ? e.split(/\s+/) : [], r = 0, i = n.length; r < i; r++) this.push(n[r]);
                        this._updateClassName = function() {
                            t.setAttribute("class", this.toString())
                        }
                    },
                    c = a.prototype = [],
                    l = function() {
                        return new a(this)
                    };
                if (i.prototype = Error.prototype, c.item = function(t) {
                        return this[t] || null
                    }, c.contains = function(t) {
                        return t += "", -1 !== s(this, t)
                    }, c.add = function() {
                        var t, e = arguments,
                            n = 0,
                            o = e.length,
                            r = !1;
                        do {
                            t = e[n] + "", -1 === s(this, t) && (this.push(t), r = !0)
                        } while (++n < o);
                        r && this._updateClassName()
                    }, c.remove = function() {
                        var t, e, n = arguments,
                            o = 0,
                            r = n.length,
                            i = !1;
                        do {
                            for (t = n[o] + "", e = s(this, t); - 1 !== e;) this.splice(e, 1), i = !0, e = s(this, t)
                        } while (++o < r);
                        i && this._updateClassName()
                    }, c.toggle = function(t, e) {
                        t += "";
                        var n = this.contains(t),
                            o = n ? !0 !== e && "remove" : !1 !== e && "add";
                        return o && this[o](t), !0 === e || !1 === e ? e : !n
                    }, c.toString = function() {
                        return this.join(" ")
                    }, n.defineProperty) {
                    var u = {
                        get: l,
                        enumerable: !0,
                        configurable: !0
                    };
                    try {
                        n.defineProperty(e, "classList", u)
                    } catch (t) {
                        -2146823252 === t.number && (u.enumerable = !1, n.defineProperty(e, "classList", u))
                    }
                } else n.prototype.__defineGetter__ && e.__defineGetter__("classList", l)
            }
        }(self))
    }, {}],
    57: [function(t, e, n) {
        Function.prototype.bind || (Function.prototype.bind = function(t) {
            if ("function" != typeof this) throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
            var e = Array.prototype.slice.call(arguments, 1),
                n = this,
                o = function() {},
                r = function() {
                    return n.apply(this instanceof o && t ? this : t, e.concat(Array.prototype.slice.call(arguments)))
                };
            return o.prototype = this.prototype, r.prototype = new o, r
        })
    }, {}],
    58: [function(t, e, n) {
        if (!Object.create) {
            var o = function() {};
            Object.create = function(t) {
                if (arguments.length > 1) throw new Error("Second argument not supported");
                if (null === t || "object" != typeof t) throw new TypeError("Object prototype may only be an Object.");
                return o.prototype = t, new o
            }
        }
    }, {}],
    59: [function(t, e, n) {
        Object.keys || (Object.keys = function(t) {
            var e, n = [];
            if (!t || "function" != typeof t.hasOwnProperty) throw "Object.keys called on non-object.";
            for (e in t) t.hasOwnProperty(e) && n.push(e);
            return n
        })
    }, {}],
    60: [function(t, e, n) {
        function o(t, e, n) {
            t.document;
            var r, i = t.currentStyle[e].match(/(-?[\d\.]+)(%|cm|em|in|mm|pc|pt|)/) || [0, 0, ""],
                s = i[1],
                a = i[2];
            return n = n ? /%|em/.test(a) && t.parentElement ? o(t.parentElement, "fontSize", null) : 16 : n, r = "fontSize" == e ? n : /width/i.test(e) ? t.clientWidth : t.clientHeight, "%" == a ? s / 100 * r : "cm" == a ? .3937 * s * 96 : "em" == a ? s * n : "in" == a ? 96 * s : "mm" == a ? .3937 * s * 96 / 10 : "pc" == a ? 12 * s * 96 / 72 : "pt" == a ? 96 * s / 72 : s
        }

        function r(t, e) {
            var n = "border" == e ? "Width" : "",
                o = e + "Top" + n,
                r = e + "Right" + n,
                i = e + "Bottom" + n,
                s = e + "Left" + n;
            t[e] = (t[o] == t[r] && t[o] == t[i] && t[o] == t[s] ? [t[o]] : t[o] == t[i] && t[s] == t[r] ? [t[o], t[r]] : t[s] == t[r] ? [t[o], t[r], t[i]] : [t[o], t[r], t[i], t[s]]).join(" ")
        }

        function i(t) {
            var e, n = this,
                i = t.currentStyle,
                s = o(t, "fontSize"),
                a = function(t) {
                    return "-" + t.toLowerCase()
                };
            for (e in i)
                if (Array.prototype.push.call(n, "styleFloat" == e ? "float" : e.replace(/[A-Z]/, a)), "width" == e) n[e] = t.offsetWidth + "px";
                else if ("height" == e) n[e] = t.offsetHeight + "px";
            else if ("styleFloat" == e) n.float = i[e], n.cssFloat = i[e];
            else if (/margin.|padding.|border.+W/.test(e) && "auto" != n[e]) n[e] = Math.round(o(t, e, s)) + "px";
            else if (/^outline/.test(e)) try {
                n[e] = i[e]
            } catch (t) {
                n.outlineColor = i.color, n.outlineStyle = n.outlineStyle || "none", n.outlineWidth = n.outlineWidth || "0px", n.outline = [n.outlineColor, n.outlineWidth, n.outlineStyle].join(" ")
            } else n[e] = i[e];
            r(n, "margin"), r(n, "padding"), r(n, "border"), n.fontSize = Math.round(s) + "px"
        }
        window.getComputedStyle || (i.prototype = {
            constructor: i,
            getPropertyPriority: function() {
                throw new Error("NotSupportedError: DOM Exception 9")
            },
            getPropertyValue: function(t) {
                return this[t.replace(/-\w/g, function(t) {
                    return t[1].toUpperCase()
                })]
            },
            item: function(t) {
                return this[t]
            },
            removeProperty: function() {
                throw new Error("NoModificationAllowedError: DOM Exception 7")
            },
            setProperty: function() {
                throw new Error("NoModificationAllowedError: DOM Exception 7")
            },
            getPropertyCSSValue: function() {
                throw new Error("NotSupportedError: DOM Exception 9")
            }
        }, window.getComputedStyle = function(t) {
            return new i(t)
        })
    }, {}],
    61: [function(t, e, n) {
        window.matchMedia = window.matchMedia || function(t, e) {
            var n, o = t.documentElement,
                r = o.firstElementChild || o.firstChild,
                i = t.createElement("body"),
                s = t.createElement("div");
            return s.id = "mq-test-1", s.style.cssText = "position:absolute;top:-100em", i.style.background = "none", i.appendChild(s),
                function(t) {
                    return s.innerHTML = '&shy;<style media="' + t + '"> #mq-test-1 { width:42px; }</style>', o.insertBefore(i, r), n = 42 === s.offsetWidth, o.removeChild(i), {
                        matches: n,
                        media: t
                    }
                }
        }(document)
    }, {}],
    62: [function(t, e, n) {
        "use strict";
        var o = t("./shared/stylePropertyCache"),
            r = t("./shared/getStyleTestElement"),
            i = t("./utils/toCSS"),
            s = t("./utils/toDOM"),
            a = t("./shared/prefixHelper"),
            c = function(t, e) {
                var n = i(t),
                    r = !1 !== e && i(e);
                return o[t] = o[e] = o[n] = o[r] = {
                    dom: e,
                    css: r
                }, e
            };
        e.exports = function(t) {
            var e, n, i, l;
            if ((t += "") in o) return o[t].dom;
            for (i = r(), t = s(t), n = t.charAt(0).toUpperCase() + t.substring(1), e = "filter" === t ? ["WebkitFilter", "filter"] : (t + " " + a.dom.join(n + " ") + n).split(" "), l = 0; l < e.length; l++)
                if (void 0 !== i.style[e[l]]) return 0 !== l && a.reduce(l - 1), c(t, e[l]);
            return c(t, !1)
        }
    }, {
        "./shared/getStyleTestElement": 64,
        "./shared/prefixHelper": 65,
        "./shared/stylePropertyCache": 66,
        "./utils/toCSS": 68,
        "./utils/toDOM": 69
    }],
    63: [function(t, e, n) {
        "use strict";
        var o = t("./getStyleProperty"),
            r = t("./shared/styleValueAvailable"),
            i = t("./shared/prefixHelper"),
            s = t("./shared/stylePropertyCache"),
            a = {},
            c = /(\([^\)]+\))/gi,
            l = /([^ ,;\(]+(\([^\)]+\))?)/gi;
        e.exports = function(t, e) {
            var n;
            return e += "", !!(t = o(t)) && (r(t, e) ? e : (n = s[t].css, e = e.replace(l, function(e) {
                var o, s, l, u;
                if ("#" === e[0] || !isNaN(e[0])) return e;
                if (s = e.replace(c, ""), (l = n + ":" + s) in a) return !1 === a[l] ? "" : e.replace(s, a[l]);
                for (o = i.css.map(function(t) {
                        return t + e
                    }), o = [e].concat(o), u = 0; u < o.length; u++)
                    if (r(t, o[u])) return 0 !== u && i.reduce(u - 1), a[l] = o[u].replace(c, ""), o[u];
                return a[l] = !1, ""
            }), "" !== (e = e.trim()) && e))
        }
    }, {
        "./getStyleProperty": 62,
        "./shared/prefixHelper": 65,
        "./shared/stylePropertyCache": 66,
        "./shared/styleValueAvailable": 67
    }],
    64: [function(t, e, n) {
        "use strict";
        var o;
        e.exports = function() {
            return o ? (o.style.cssText = "", o.removeAttribute("style")) : o = document.createElement("_"), o
        }, e.exports.resetElement = function() {
            o = null
        }
    }, {}],
    65: [function(t, e, n) {
        "use strict";
        var o = ["-webkit-", "-moz-", "-ms-"],
            r = ["Webkit", "Moz", "ms"],
            i = ["webkit", "moz", "ms"],
            s = function() {
                this.initialize()
            },
            a = s.prototype;
        a.initialize = function() {
            this.reduced = !1, this.css = o, this.dom = r, this.evt = i
        }, a.reduce = function(t) {
            this.reduced || (this.reduced = !0, this.css = [this.css[t]], this.dom = [this.dom[t]], this.evt = [this.evt[t]])
        }, e.exports = new s
    }, {}],
    66: [function(t, e, n) {
        "use strict";
        e.exports = {}
    }, {}],
    67: [function(t, e, n) {
        "use strict";
        var o, r, i = t("./stylePropertyCache"),
            s = t("./getStyleTestElement"),
            a = !1,
            c = function() {
                var t;
                if (!a) {
                    a = !0, o = "CSS" in window && "supports" in window.CSS, r = !1, t = s();
                    try {
                        t.style.width = "invalid"
                    } catch (t) {
                        r = !0
                    }
                }
            };
        e.exports = function(t, e) {
            var n, a;
            if (c(), o) return t = i[t].css, CSS.supports(t, e);
            if (a = s(), n = a.style[t], r) try {
                a.style[t] = e
            } catch (t) {
                return !1
            } else a.style[t] = e;
            return a.style[t] && a.style[t] !== n
        }, e.exports.resetFlags = function() {
            a = !1
        }
    }, {
        "./getStyleTestElement": 64,
        "./stylePropertyCache": 66
    }],
    68: [function(t, e, n) {
        "use strict";
        var o = /^(webkit|moz|ms)/gi;
        e.exports = function(t) {
            return "cssfloat" === t.toLowerCase() ? "float" : (o.test(t) && (t = "-" + t), t.replace(/([A-Z]+)([A-Z][a-z])/g, "$1-$2").replace(/([a-z\d])([A-Z])/g, "$1-$2").toLowerCase())
        }
    }, {}],
    69: [function(t, e, n) {
        "use strict";
        var o = /-([a-z])/g;
        e.exports = function(t) {
            return "float" === t.toLowerCase() ? "cssFloat" : (t = t.replace(o, function(t, e) {
                return e.toUpperCase()
            }), "Ms" === t.substr(0, 2) && (t = "ms" + t.substring(2)), t)
        }
    }, {}],
    70: [function(t, e, n) {
        "use strict";

        function o(t) {
            r.call(this), this._initializeElement(t), s() && (this._updateViewport = this._updateViewport.bind(this), i(window, "resize", this._updateViewport), i(window, "orientationchange", this._updateViewport), this._retinaQuery = window.matchMedia(a), this._updateRetina(), this._retinaQuery.addListener && (this._updateRetina = this._updateRetina.bind(this), this._retinaQuery.addListener(this._updateRetina))), this._updateViewport()
        }
        t("@marcom/ac-polyfills/Function/prototype.bind"), t("@marcom/ac-polyfills/Object/keys"), t("@marcom/ac-polyfills/Object/create");
        var r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            i = t("@marcom/ac-dom-events/utils/addEventListener"),
            s = t("@marcom/ac-feature/mediaQueriesAvailable"),
            a = "only screen and (-webkit-min-device-pixel-ratio: 1.5), screen and (min-resolution: 1.5dppx), screen and (min-resolution: 144dpi)",
            c = o.prototype = Object.create(r.prototype);
        c.viewport = !1, c.retina = !1, c._initializeElement = function(t) {
            var e;
            t = t || "viewport-emitter", e = document.getElementById(t), e || (e = document.createElement("div"), e.id = t, e = document.body.appendChild(e)), this._el = e
        }, c._getElementContent = function() {
            var t;
            return "currentStyle" in this._el ? t = this._el.currentStyle["x-content"] : (this._invalidateStyles(), t = window.getComputedStyle(this._el, "::before").content), t && (t = t.replace(/["']/g, "")), t || !1
        }, c._updateViewport = function() {
            var t, e = this.viewport;
            this.viewport = this._getElementContent(), this.viewport && (this.viewport = this.viewport.split(":").pop()), e && this.viewport !== e && (t = {
                from: e,
                to: this.viewport
            }, this.trigger("change", t), this.trigger("from:" + e, t), this.trigger("to:" + this.viewport, t))
        }, c._updateRetina = function(t) {
            var e = this.retina;
            this.retina = this._retinaQuery.matches, e !== this.retina && this.trigger("retinachange", {
                from: e,
                to: this.retina
            })
        }, c._invalidateStyles = function() {
            document.documentElement.clientWidth, this._el.innerHTML = " " === this._el.innerHTML ? " " : " ", document.documentElement.clientWidth
        }, e.exports = o
    }, {
        "@marcom/ac-dom-events/utils/addEventListener": 11,
        "@marcom/ac-event-emitter-micro": 33,
        "@marcom/ac-feature/mediaQueriesAvailable": 39,
        "@marcom/ac-polyfills/Function/prototype.bind": 57,
        "@marcom/ac-polyfills/Object/create": 58,
        "@marcom/ac-polyfills/Object/keys": 59
    }],
    hfMHj0: [function(t, e, n) {
        "use strict";
        t("@marcom/ac-polyfills/getComputedStyle");
        var o = t("./ac-localnav-global/LocalnavGlobal"),
            r = document.getElementById("ac-localnav");
        r && (e.exports = new o(r))
    }, {
        "./ac-localnav-global/LocalnavGlobal": "fkFiXJ",
        "@marcom/ac-polyfills/getComputedStyle": 60
    }],
    "@marcom/ac-localnav-global": [function(t, e, n) {
        e.exports = t("hfMHj0")
    }, {}],
    fkFiXJ: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-localnav/Localnav"),
            r = t("@marcom/ac-headjs/FeatureDetect"),
            i = t("./featureDetectTests"),
            s = t("@marcom/ac-classlist"),
            a = function(t) {
                new r(t, i).htmlClass(), o.call(this, t, {
                    className: "ac-ln",
                    selector: "#ac-localnav"
                }), this._sticky && (this._analyticsRegion = this.el.getAttribute("data-analytics-region"), this._updateAnalyticsRegion = this._updateAnalyticsRegion.bind(this), this._sticky.on("stuck", this._updateAnalyticsRegion), this._sticky.on("unstuck", this._updateAnalyticsRegion))
            },
            c = o.prototype,
            l = a.prototype = Object.create(c);
        a.prototype.constructor = a, l._getStickyEnabled = function() {
            return !s.contains(document.body, "ac-platter-content") && (!s.contains(document.body, "ac-platter-page") && c._getStickyEnabled.call(this))
        }, l._updateAnalyticsRegion = function() {
            var t = this._analyticsRegion;
            this._sticky.stuck && (t += " locked"), this.el.setAttribute("data-analytics-region", t)
        }, e.exports = a
    }, {
        "./featureDetectTests": "o3ncwG",
        "@marcom/ac-classlist": 8,
        "@marcom/ac-headjs/FeatureDetect": 42,
        "@marcom/ac-localnav/Localnav": 47
    }],
    "@marcom/ac-localnav-global/LocalnavGlobal": [function(t, e, n) {
        e.exports = t("fkFiXJ")
    }, {}],
    o3ncwG: [function(t, e, n) {
        "use strict";
        var o = t("@marcom/ac-feature/touchAvailable");
        e.exports = {
            touch: o
        }
    }, {
        "@marcom/ac-feature/touchAvailable": 40
    }],
    "@marcom/ac-localnav-global/featureDetectTests": [function(t, e, n) {
        e.exports = t("o3ncwG")
    }, {}]
}, {}, ["hfMHj0"]);