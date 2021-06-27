! function() {
    return function t(e, i, n) {
        function r(o, a) {
            if (!i[o]) {
                if (!e[o]) {
                    var c = "function" == typeof require && require;
                    if (!a && c) return c(o, !0);
                    if (s) return s(o, !0);
                    var l = new Error("Cannot find module '" + o + "'");
                    throw l.code = "MODULE_NOT_FOUND", l
                }
                var h = i[o] = {
                    exports: {}
                };
                e[o][0].call(h.exports, function(t) {
                    return r(e[o][1][t] || t)
                }, h, h.exports, t, e, i, n)
            }
            return i[o].exports
        }
        for (var s = "function" == typeof require && require, o = 0; o < n.length; o++) r(n[o]);
        return r
    }
}()({
    1: [function(t, e, i) {
        "use strict";
        var n = t("./helpers/TabManager"),
            r = t("./helpers/hideSiblingElements"),
            s = t("./helpers/showSiblingElements"),
            o = function(t) {
                this._tabbables = null, this._firstTabbableElement = null, this._lastTabbableElement = null, this._relatedTarget = null, this.el = t, this._handleOnFocus = this._handleOnFocus.bind(this)
            },
            a = o.prototype;
        a.start = function() {
            this.updateTabbables(), r(this.el), this._firstTabbableElement ? this.el.contains(document.activeElement) || this._firstTabbableElement.focus() : console.warn("this._firstTabbableElement is null, CircularTab needs at least one tabbable element."), this._relatedTarget = document.activeElement, document.addEventListener("focus", this._handleOnFocus, !0)
        }, a.stop = function() {
            s(this.el), document.removeEventListener("focus", this._handleOnFocus, !0)
        }, a.updateTabbables = function() {
            this._tabbables = n.getTabbableElements(this.el), this._firstTabbableElement = this._tabbables[0], this._lastTabbableElement = this._tabbables[this._tabbables.length - 1]
        }, a._handleOnFocus = function(t) {
            if (this.el.contains(t.target)) this._relatedTarget = t.target;
            else {
                if (t.preventDefault(), this.updateTabbables(), this._relatedTarget === this._lastTabbableElement || null === this._relatedTarget) return this._firstTabbableElement.focus(), void(this._relatedTarget = this._firstTabbableElement);
                if (this._relatedTarget === this._firstTabbableElement) return this._lastTabbableElement.focus(), void(this._relatedTarget = this._lastTabbableElement)
            }
        }, a.destroy = function() {
            this.stop(), this.el = null, this._tabbables = null, this._firstTabbableElement = null, this._lastTabbableElement = null, this._relatedTarget = null, this._handleOnFocus = null
        }, e.exports = o
    }, {
        "./helpers/TabManager": 2,
        "./helpers/hideSiblingElements": 4,
        "./helpers/showSiblingElements": 8
    }],
    2: [function(t, e, i) {
        "use strict";
        var n = t("./../maps/focusableElement"),
            r = function() {
                this.focusableSelectors = n.join(",")
            },
            s = r.prototype;
        s.isFocusableElement = function(t, e, i) {
            if (!e && !this._isDisplayed(t, e)) return !1;
            var r = t.nodeName.toLowerCase(),
                s = n.indexOf(r) > -1;
            return "a" === r || (s ? !t.disabled : !t.contentEditable || (i = i || parseFloat(t.getAttribute("tabindex")), !isNaN(i)))
        }, s.isTabbableElement = function(t, e) {
            if (!e && !this._isDisplayed(t, e)) return !1;
            var i = t.getAttribute("tabindex");
            return i = parseFloat(i), isNaN(i) ? this.isFocusableElement(t, e, i) : i >= 0
        }, s._isDisplayed = function(t) {
            var e = t.getBoundingClientRect();
            return e.top > 0 && e.left > 0 && e.width > 0 && e.height > 0
        }, s.getTabbableElements = function(t, e) {
            for (var i = t.querySelectorAll(this.focusableSelectors), n = i.length, r = [], s = 0; s < n; s++) this.isTabbableElement(i[s], e) && r.push(i[s]);
            return r
        }, s.getFocusableElements = function(t, e) {
            for (var i = t.querySelectorAll(this.focusableSelectors), n = i.length, r = [], s = 0; s < n; s++) this.isFocusableElement(i[s], e) && r.push(i[s]);
            return r
        }, e.exports = new r
    }, {
        "./../maps/focusableElement": 10
    }],
    3: [function(t, e, i) {
        "use strict";
        var n = t("./setAttributes"),
            r = t("./../maps/ariaMap"),
            s = t("./TabManager"),
            o = function(t, e) {
                var i = t.getAttribute("data-original-" + e);
                i || (i = t.getAttribute(e) || "", n(t, "data-original-" + e, i))
            };
        e.exports = function(t) {
            if (s.isFocusableElement(t)) o(t, "tabindex"), n(t, "tabindex", -1);
            else
                for (var e = s.getTabbableElements(t, !0), i = e.length; i--;) o(e[i], "tabindex"), n(e[i], "tabindex", -1);
            o(t, r.HIDDEN), n(t, r.HIDDEN, !0)
        }
    }, {
        "./../maps/ariaMap": 9,
        "./TabManager": 2,
        "./setAttributes": 6
    }],
    4: [function(t, e, i) {
        "use strict";
        var n = t("./hide");
        e.exports = function t(e, i) {
            i = i || document.body;
            for (var r = e, s = e; r = r.previousElementSibling;) n(r);
            for (; s = s.nextElementSibling;) n(s);
            e.parentElement && e.parentElement !== i && t(e.parentElement)
        }
    }, {
        "./hide": 3
    }],
    5: [function(t, e, i) {
        "use strict";
        var n = function(t, e) {
            if ("string" == typeof e)
                for (var i = e.split(/\s+/), n = 0; n < i.length; n++) t.getAttribute(i[n]) && t.removeAttribute(i[n])
        };
        e.exports = function(t, e) {
            if (t.length)
                for (var i = 0; i < t.length; i++) n(t[i], e);
            else n(t, e)
        }
    }, {}],
    6: [function(t, e, i) {
        "use strict";
        var n = function(t, e, i) {
            t && 1 === t.nodeType && t.setAttribute(e, i)
        };
        e.exports = function(t, e, i) {
            if ("string" != typeof i && (i = i.toString()), t)
                if (t.length)
                    for (var r = 0; r < t.length; r++) n(t[r], e, i);
                else n(t, e, i)
        }
    }, {}],
    7: [function(t, e, i) {
        "use strict";
        var n = t("./removeAttributes"),
            r = t("./setAttributes"),
            s = t("./../maps/ariaMap"),
            o = "data-original-",
            a = function(t, e) {
                var i = t.getAttribute(o + e);
                "string" == typeof i && (i.length ? r(t, e, i) : n(t, e), n(t, o + e))
            };
        e.exports = function(t) {
            n(t, "tabindex " + s.HIDDEN), a(t, "tabindex"), a(t, s.HIDDEN);
            for (var e = t.querySelectorAll("[" + o + "tabindex]"), i = e.length; i--;) a(e[i], "tabindex")
        }
    }, {
        "./../maps/ariaMap": 9,
        "./removeAttributes": 5,
        "./setAttributes": 6
    }],
    8: [function(t, e, i) {
        "use strict";
        var n = t("./show");
        e.exports = function t(e, i) {
            i = i || document.body;
            for (var r = e, s = e; r = r.previousElementSibling;) n(r);
            for (; s = s.nextElementSibling;) n(s);
            e.parentElement && e.parentElement !== i && t(e.parentElement)
        }
    }, {
        "./show": 7
    }],
    9: [function(t, e, i) {
        "use strict";
        e.exports = {
            AUTOCOMPLETE: "aria-autocomplete",
            CHECKED: "aria-checked",
            DISABLED: "aria-disabled",
            EXPANDED: "aria-expanded",
            HASPOPUP: "aria-haspopup",
            HIDDEN: "aria-hidden",
            INVALID: "aria-invalid",
            LABEL: "aria-label",
            LEVEL: "aria-level",
            MULTILINE: "aria-multiline",
            MULTISELECTABLE: "aria-multiselectable",
            ORIENTATION: "aria-orientation",
            PRESSED: "aria-pressed",
            READONLY: "aria-readonly",
            REQUIRED: "aria-required",
            SELECTED: "aria-selected",
            SORT: "aria-sort",
            VALUEMAX: "aria-valuemax",
            VALUEMIN: "aria-valuemin",
            VALUENOW: "aria-valuenow",
            VALUETEXT: "aria-valuetext",
            ATOMIC: "aria-atomic",
            BUSY: "aria-busy",
            LIVE: "aria-live",
            RELEVANT: "aria-relevant",
            DROPEFFECT: "aria-dropeffect",
            GRABBED: "aria-grabbed",
            ACTIVEDESCENDANT: "aria-activedescendant",
            CONTROLS: "aria-controls",
            DESCRIBEDBY: "aria-describedby",
            FLOWTO: "aria-flowto",
            LABELLEDBY: "aria-labelledby",
            OWNS: "aria-owns",
            POSINSET: "aria-posinset",
            SETSIZE: "aria-setsize"
        }
    }, {}],
    10: [function(t, e, i) {
        "use strict";
        e.exports = ["input", "select", "textarea", "button", "optgroup", "option", "menuitem", "fieldset", "object", "a[href]", "*[tabindex]", "*[contenteditable]"]
    }, {}],
    11: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice"), t("@marcom/ac-polyfills/Element/prototype.classList");
        var n = t("./className/add");
        e.exports = function() {
            var t, e = Array.prototype.slice.call(arguments),
                i = e.shift(e);
            if (i.classList && i.classList.add) i.classList.add.apply(i.classList, e);
            else
                for (t = 0; t < e.length; t++) n(i, e[t])
        }
    }, {
        "./className/add": 12,
        "@marcom/ac-polyfills/Array/prototype.slice": 87,
        "@marcom/ac-polyfills/Element/prototype.classList": 89
    }],
    12: [function(t, e, i) {
        "use strict";
        var n = t("./contains");
        e.exports = function(t, e) {
            n(t, e) || (t.className += " " + e)
        }
    }, {
        "./contains": 13
    }],
    13: [function(t, e, i) {
        "use strict";
        var n = t("./getTokenRegExp");
        e.exports = function(t, e) {
            return n(e).test(t.className)
        }
    }, {
        "./getTokenRegExp": 14
    }],
    14: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return new RegExp("(\\s|^)" + t + "(\\s|$)")
        }
    }, {}],
    15: [function(t, e, i) {
        "use strict";
        var n = t("./contains"),
            r = t("./getTokenRegExp");
        e.exports = function(t, e) {
            n(t, e) && (t.className = t.className.replace(r(e), "$1").trim())
        }
    }, {
        "./contains": 13,
        "./getTokenRegExp": 14
    }],
    16: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice"), t("@marcom/ac-polyfills/Element/prototype.classList");
        var n = t("./className/remove");
        e.exports = function() {
            var t, e = Array.prototype.slice.call(arguments),
                i = e.shift(e);
            if (i.classList && i.classList.remove) i.classList.remove.apply(i.classList, e);
            else
                for (t = 0; t < e.length; t++) n(i, e[t])
        }
    }, {
        "./className/remove": 15,
        "@marcom/ac-polyfills/Array/prototype.slice": 87,
        "@marcom/ac-polyfills/Element/prototype.classList": 89
    }],
    17: [function(t, e, i) {
        "use strict";
        e.exports = {
            DOMEmitter: t("./ac-dom-emitter/DOMEmitter")
        }
    }, {
        "./ac-dom-emitter/DOMEmitter": 18
    }],
    18: [function(t, e, i) {
        "use strict";
        var n, r = t("ac-event-emitter").EventEmitter,
            s = t("./DOMEmitterEvent"),
            o = {
                addEventListener: t("@marcom/ac-dom-events/addEventListener"),
                removeEventListener: t("@marcom/ac-dom-events/removeEventListener"),
                dispatchEvent: t("@marcom/ac-dom-events/dispatchEvent")
            },
            a = {
                querySelectorAll: t("@marcom/ac-dom-traversal/querySelectorAll"),
                matchesSelector: t("@marcom/ac-dom-traversal/matchesSelector")
            };

        function c(t) {
            null !== t && (this.el = t, this._bindings = {}, this._delegateFuncs = {}, this._eventEmitter = new r)
        }(n = c.prototype).on = function() {
            return this._normalizeArgumentsAndCall(Array.prototype.slice.call(arguments, 0), this._on), this
        }, n.once = function() {
            return this._normalizeArgumentsAndCall(Array.prototype.slice.call(arguments, 0), this._once), this
        }, n.off = function() {
            return this._normalizeArgumentsAndCall(Array.prototype.slice.call(arguments, 0), this._off), this
        }, n.has = function(t, e, i, n) {
            var r, s;
            return "string" == typeof e ? (r = e, s = i) : (s = e, n = i), r ? this._getDelegateFuncBindingIdx(t, r, s, n, !0) > -1 : !(!this._eventEmitter || !this._eventEmitter.has.apply(this._eventEmitter, arguments))
        }, n.trigger = function(t, e, i, n) {
            t = this._parseEventNames(t);
            var r, s, o, a = (t = this._cleanStringData(t)).length;
            for ("string" == typeof e ? (r = this._cleanStringData(e), s = i) : (s = e, i), o = 0; o < a; o++) this._triggerDOMEvents(t[o], s, r);
            return this
        }, n.emitterTrigger = function(t, e, i) {
            if (!this._eventEmitter) return this;
            t = this._parseEventNames(t), t = this._cleanStringData(t), e = new s(e, this);
            var n, r = t.length;
            for (n = 0; n < r; n++) this._eventEmitter.trigger(t[n], e, i);
            return this
        }, n.propagateTo = function(t, e) {
            return this._eventEmitter.propagateTo(t, e), this
        }, n.stopPropagatingTo = function(t) {
            return this._eventEmitter.stopPropagatingTo(t), this
        }, n.stopImmediatePropagation = function() {
            return this._eventEmitter.stopImmediatePropagation(), this
        }, n.destroy = function() {
            var t;
            for (t in this._triggerInternalEvent("willdestroy"), this.off(), this) this.hasOwnProperty(t) && (this[t] = null)
        }, n._parseEventNames = function(t) {
            return t ? t.split(" ") : [t]
        }, n._onListenerEvent = function(t, e) {
            var i = new s(e, this);
            this._eventEmitter.trigger(t, i, !1)
        }, n._setListener = function(t) {
            this._bindings[t] = this._onListenerEvent.bind(this, t), o.addEventListener(this.el, t, this._bindings[t])
        }, n._removeListener = function(t) {
            o.removeEventListener(this.el, t, this._bindings[t]), this._bindings[t] = null
        }, n._triggerInternalEvent = function(t, e) {
            this.emitterTrigger("dom-emitter:" + t, e)
        }, n._normalizeArgumentsAndCall = function(t, e) {
            var i = {};
            if (0 !== t.length) {
                if ("string" == typeof t[0] || null === t[0]) return t = this._cleanStringData(t), i.events = t[0], "string" == typeof t[1] ? (i.delegateQuery = t[1], i.callback = t[2], i.context = t[3]) : (i.callback = t[1], i.context = t[2]), void e.call(this, i);
                var n, r, s = t[0];
                for (n in s) s.hasOwnProperty(n) && (i = {}, r = this._cleanStringData(n.split(":")), i.events = r[0], i.delegateQuery = r[1], i.callback = s[n], i.context = t[1], e.call(this, i))
            } else e.call(this, i)
        }, n._registerDelegateFunc = function(t, e, i, n, r) {
            var s = this._delegateFunc.bind(this, t, e, i, r);
            return this._delegateFuncs[e] = this._delegateFuncs[e] || {}, this._delegateFuncs[e][t] = this._delegateFuncs[e][t] || [], this._delegateFuncs[e][t].push({
                func: n,
                context: r,
                delegateFunc: s
            }), s
        }, n._cleanStringData = function(t) {
            var e = !1;
            "string" == typeof t && (t = [t], e = !0);
            var i, n, r, s = [],
                o = t.length;
            for (i = 0; i < o; i++) {
                if ("string" == typeof(n = t[i])) {
                    if ("" === n || " " === n) continue;
                    for (r = n.length;
                        " " === n[0];) n = n.slice(1, r), r--;
                    for (;
                        " " === n[r - 1];) n = n.slice(0, r - 1), r--
                }
                s.push(n)
            }
            return e ? s[0] : s
        }, n._unregisterDelegateFunc = function(t, e, i, n) {
            if (this._delegateFuncs[e] && this._delegateFuncs[e][t]) {
                var r, s = this._getDelegateFuncBindingIdx(t, e, i, n);
                return s > -1 && (r = this._delegateFuncs[e][t][s].delegateFunc, this._delegateFuncs[e][t].splice(s, 1), 0 === this._delegateFuncs[e][t].length && (this._delegateFuncs[e][t] = null)), r
            }
        }, n._unregisterDelegateFuncs = function(t, e) {
            var i;
            if (this._delegateFuncs[e] && (null === t || this._delegateFuncs[e][t]))
                if (null !== t) this._unbindDelegateFunc(t, e);
                else
                    for (i in this._delegateFuncs[e]) this._delegateFuncs[e].hasOwnProperty(i) && this._unbindDelegateFunc(i, e)
        }, n._unbindDelegateFunc = function(t, e) {
            for (var i, n, r = 0; this._delegateFuncs[e][t] && this._delegateFuncs[e][t][r];) i = this._delegateFuncs[e][t][r], n = this._delegateFuncs[e][t][r].length, this._off({
                events: t,
                delegateQuery: e,
                callback: i.func,
                context: i.context
            }), this._delegateFuncs[e][t] && n === this._delegateFuncs[e][t].length && r++;
            i = n = null
        }, n._unregisterDelegateFuncsByEvent = function(t) {
            var e;
            for (e in this._delegateFuncs) this._delegateFuncs.hasOwnProperty(e) && this._unregisterDelegateFuncs(t, e)
        }, n._delegateFunc = function(t, e, i, n, r) {
            if (this._targetHasDelegateAncestor(r.target, e)) {
                var s = Array.prototype.slice.call(arguments, 0),
                    o = s.slice(4, s.length);
                n = n || window, "object" == typeof r.detail && (o[0] = r.detail), i.apply(n, o)
            }
        }, n._targetHasDelegateAncestor = function(t, e) {
            for (var i = t; i && i !== this.el && i !== document.documentElement;) {
                if (a.matchesSelector(i, e)) return !0;
                i = i.parentNode
            }
            return !1
        }, n._on = function(t) {
            var e = t.events,
                i = t.callback,
                n = t.delegateQuery,
                r = t.context,
                s = t.unboundCallback || i;
            (e = this._parseEventNames(e)).forEach(function(t, e, i, n, r) {
                this.has(r) || this._setListener(r), "string" == typeof n && (t = this._registerDelegateFunc(r, n, t, e, i)), this._triggerInternalEvent("willon", {
                    evt: r,
                    callback: t,
                    context: i,
                    delegateQuery: n
                }), this._eventEmitter.on(r, t, i), this._triggerInternalEvent("didon", {
                    evt: r,
                    callback: t,
                    context: i,
                    delegateQuery: n
                })
            }.bind(this, i, s, r, n)), e = i = s = n = r = null
        }, n._off = function(t) {
            var e = t.events,
                i = t.callback,
                n = t.delegateQuery,
                r = t.context,
                s = t.unboundCallback || i;
            if (void 0 !== e)(e = this._parseEventNames(e)).forEach(function(t, e, i, n, r) {
                ("string" != typeof n || "function" != typeof e || (t = this._unregisterDelegateFunc(r, n, e, i))) && ("string" != typeof n || void 0 !== t ? "string" == typeof r && void 0 === t && (this._unregisterDelegateFuncsByEvent(r), "string" == typeof n) || (this._triggerInternalEvent("willoff", {
                    evt: r,
                    callback: t,
                    context: i,
                    delegateQuery: n
                }), this._eventEmitter.off(r, t, i), this._triggerInternalEvent("didoff", {
                    evt: r,
                    callback: t,
                    context: i,
                    delegateQuery: n
                }), this.has(r) || this._removeListener(r)) : this._unregisterDelegateFuncs(r, n))
            }.bind(this, i, s, r, n)), e = i = s = n = r = null;
            else {
                var o;
                for (o in this._eventEmitter.off(), this._bindings) this._bindings.hasOwnProperty(o) && this._removeListener(o);
                for (o in this._delegateFuncs) this._delegateFuncs.hasOwnProperty(o) && (this._delegateFuncs[o] = null)
            }
        }, n._once = function(t) {
            var e = t.events,
                i = t.callback,
                n = t.delegateQuery,
                r = t.context;
            (e = this._parseEventNames(e)).forEach(function(t, e, i, n) {
                if ("string" == typeof i) return this._handleDelegateOnce(n, t, e, i);
                this.has(n) || this._setListener(n), this._triggerInternalEvent("willonce", {
                    evt: n,
                    callback: t,
                    context: e,
                    delegateQuery: i
                }), this._eventEmitter.once.call(this, n, t, e), this._triggerInternalEvent("didonce", {
                    evt: n,
                    callback: t,
                    context: e,
                    delegateQuery: i
                })
            }.bind(this, i, r, n)), e = i = n = r = null
        }, n._handleDelegateOnce = function(t, e, i, n) {
            return this._triggerInternalEvent("willonce", {
                evt: t,
                callback: e,
                context: i,
                delegateQuery: n
            }), this._on({
                events: t,
                context: i,
                delegateQuery: n,
                callback: this._getDelegateOnceCallback.bind(this, t, e, i, n),
                unboundCallback: e
            }), this._triggerInternalEvent("didonce", {
                evt: t,
                callback: e,
                context: i,
                delegateQuery: n
            }), this
        }, n._getDelegateOnceCallback = function(t, e, i, n) {
            var r = Array.prototype.slice.call(arguments, 0),
                s = r.slice(4, r.length);
            e.apply(i, s), this._off({
                events: t,
                delegateQuery: n,
                callback: e,
                context: i
            })
        }, n._getDelegateFuncBindingIdx = function(t, e, i, n, r) {
            var s = -1;
            if (this._delegateFuncs[e] && this._delegateFuncs[e][t]) {
                var o, a, c = this._delegateFuncs[e][t].length;
                for (o = 0; o < c; o++)
                    if (a = this._delegateFuncs[e][t][o], r && void 0 === i && (i = a.func), a.func === i && a.context === n) {
                        s = o;
                        break
                    }
            }
            return s
        }, n._triggerDOMEvents = function(t, e, i) {
            var n = [this.el];
            i && (n = a.querySelectorAll(i, this.el));
            var r, s = n.length;
            for (r = 0; r < s; r++) o.dispatchEvent(n[r], t, {
                bubbles: !0,
                cancelable: !0,
                detail: e
            })
        }, e.exports = c
    }, {
        "./DOMEmitterEvent": 19,
        "@marcom/ac-dom-events/addEventListener": 20,
        "@marcom/ac-dom-events/dispatchEvent": 21,
        "@marcom/ac-dom-events/removeEventListener": 24,
        "@marcom/ac-dom-traversal/matchesSelector": 47,
        "@marcom/ac-dom-traversal/querySelectorAll": 48,
        "ac-event-emitter": 107
    }],
    19: [function(t, e, i) {
        "use strict";
        var n, r = {
                preventDefault: t("@marcom/ac-dom-events/preventDefault"),
                stopPropagation: t("@marcom/ac-dom-events/stopPropagation"),
                target: t("@marcom/ac-dom-events/target")
            },
            s = function(t, e) {
                this._domEmitter = e, this.originalEvent = t || {}, this._originalTarget = r.target(this.originalEvent), this.target = this._originalTarget || this._domEmitter.el, this.currentTarget = this._domEmitter.el, this.timeStamp = this.originalEvent.timeStamp || Date.now(), this._isDOMEvent(this.originalEvent) ? "object" == typeof this.originalEvent.detail && (this.data = this.originalEvent.detail) : t && (this.data = this.originalEvent, this.originalEvent = {})
            };
        (n = s.prototype).preventDefault = function() {
            r.preventDefault(this.originalEvent)
        }, n.stopPropagation = function() {
            r.stopPropagation(this.originalEvent)
        }, n.stopImmediatePropagation = function() {
            this.originalEvent.stopImmediatePropagation && this.originalEvent.stopImmediatePropagation(), this._domEmitter.stopImmediatePropagation()
        }, n._isDOMEvent = function(t) {
            return !!(this._originalTarget || "undefined" !== document.createEvent && "undefined" != typeof CustomEvent && t instanceof CustomEvent)
        }, e.exports = s
    }, {
        "@marcom/ac-dom-events/preventDefault": 23,
        "@marcom/ac-dom-events/stopPropagation": 27,
        "@marcom/ac-dom-events/target": 28
    }],
    20: [function(t, e, i) {
        "use strict";
        var n = t("./utils/addEventListener"),
            r = t("./shared/getEventType");
        e.exports = function(t, e, i, s) {
            return e = r(t, e), n(t, e, i, s)
        }
    }, {
        "./shared/getEventType": 25,
        "./utils/addEventListener": 29
    }],
    21: [function(t, e, i) {
        "use strict";
        var n = t("./utils/dispatchEvent"),
            r = t("./shared/getEventType");
        e.exports = function(t, e, i) {
            return e = r(t, e), n(t, e, i)
        }
    }, {
        "./shared/getEventType": 25,
        "./utils/dispatchEvent": 30
    }],
    22: [function(t, e, i) {
        "use strict";
        e.exports = {
            addEventListener: t("./addEventListener"),
            dispatchEvent: t("./dispatchEvent"),
            preventDefault: t("./preventDefault"),
            removeEventListener: t("./removeEventListener"),
            stop: t("./stop"),
            stopPropagation: t("./stopPropagation"),
            target: t("./target")
        }
    }, {
        "./addEventListener": 20,
        "./dispatchEvent": 21,
        "./preventDefault": 23,
        "./removeEventListener": 24,
        "./stop": 26,
        "./stopPropagation": 27,
        "./target": 28
    }],
    23: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            (t = t || window.event).preventDefault ? t.preventDefault() : t.returnValue = !1
        }
    }, {}],
    24: [function(t, e, i) {
        "use strict";
        var n = t("./utils/removeEventListener"),
            r = t("./shared/getEventType");
        e.exports = function(t, e, i, s) {
            return e = r(t, e), n(t, e, i, s)
        }
    }, {
        "./shared/getEventType": 25,
        "./utils/removeEventListener": 31
    }],
    25: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-prefixer/getEventType");
        e.exports = function(t, e) {
            var i;
            return i = "tagName" in t ? t.tagName : t === window ? "window" : "document", n(e, i) || e
        }
    }, {
        "@marcom/ac-prefixer/getEventType": 91
    }],
    26: [function(t, e, i) {
        "use strict";
        var n = t("./stopPropagation"),
            r = t("./preventDefault");
        e.exports = function(t) {
            t = t || window.event, n(t), r(t), t.stopped = !0, t.returnValue = !1
        }
    }, {
        "./preventDefault": 23,
        "./stopPropagation": 27
    }],
    27: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            (t = t || window.event).stopPropagation ? t.stopPropagation() : t.cancelBubble = !0
        }
    }, {}],
    28: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return void 0 !== (t = t || window.event).target ? t.target : t.srcElement
        }
    }, {}],
    29: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i, n) {
            return t.addEventListener ? t.addEventListener(e, i, !!n) : t.attachEvent("on" + e, i), t
        }
    }, {}],
    30: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/CustomEvent"), e.exports = function(t, e, i) {
            var n;
            return t.dispatchEvent ? (n = i ? new CustomEvent(e, i) : new CustomEvent(e), t.dispatchEvent(n)) : (n = document.createEventObject(), i && "detail" in i && (n.detail = i.detail), t.fireEvent("on" + e, n)), t
        }
    }, {
        "@marcom/ac-polyfills/CustomEvent": 88
    }],
    31: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i, n) {
            return t.removeEventListener ? t.removeEventListener(e, i, !!n) : t.detachEvent("on" + e, i), t
        }
    }, {}],
    32: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            var e;
            if ((t = t || window) === window) {
                if (e = window.pageXOffset) return e;
                t = document.documentElement || document.body.parentNode || document.body
            }
            return t.scrollLeft
        }
    }, {}],
    33: [function(t, e, i) {
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
    34: [function(t, e, i) {
        "use strict";
        e.exports = 8
    }, {}],
    35: [function(t, e, i) {
        "use strict";
        e.exports = 11
    }, {}],
    36: [function(t, e, i) {
        "use strict";
        e.exports = 9
    }, {}],
    37: [function(t, e, i) {
        "use strict";
        e.exports = 1
    }, {}],
    38: [function(t, e, i) {
        "use strict";
        e.exports = 3
    }, {}],
    39: [function(t, e, i) {
        "use strict";
        var n = t("../isNode");
        e.exports = function(t, e) {
            return !!n(t) && ("number" == typeof e ? t.nodeType === e : -1 !== e.indexOf(t.nodeType))
        }
    }, {
        "../isNode": 43
    }],
    40: [function(t, e, i) {
        "use strict";
        var n = t("./isNodeType"),
            r = t("../COMMENT_NODE"),
            s = t("../DOCUMENT_FRAGMENT_NODE"),
            o = t("../ELEMENT_NODE"),
            a = t("../TEXT_NODE"),
            c = [o, a, r, s],
            l = [o, a, r],
            h = [o, s];
        e.exports = {
            parentNode: function(t, e, i, r) {
                if (r = r || "target", (t || e) && !n(t, h)) throw new TypeError(i + ": " + r + " must be an Element, or Document Fragment")
            },
            childNode: function(t, e, i, r) {
                if (r = r || "target", (t || e) && !n(t, l)) throw new TypeError(i + ": " + r + " must be an Element, TextNode, or Comment")
            },
            insertNode: function(t, e, i, r) {
                if (r = r || "node", (t || e) && !n(t, c)) throw new TypeError(i + ": " + r + " must be an Element, TextNode, Comment, or Document Fragment")
            },
            hasParentNode: function(t, e, i) {
                if (i = i || "target", !t.parentNode) throw new TypeError(e + ": " + i + " must have a parentNode")
            }
        }
    }, {
        "../COMMENT_NODE": 34,
        "../DOCUMENT_FRAGMENT_NODE": 35,
        "../ELEMENT_NODE": 37,
        "../TEXT_NODE": 38,
        "./isNodeType": 39
    }],
    41: [function(t, e, i) {
        "use strict";
        var n = t("./internal/isNodeType"),
            r = t("./DOCUMENT_FRAGMENT_NODE");
        e.exports = function(t) {
            return n(t, r)
        }
    }, {
        "./DOCUMENT_FRAGMENT_NODE": 35,
        "./internal/isNodeType": 39
    }],
    42: [function(t, e, i) {
        "use strict";
        var n = t("./internal/isNodeType"),
            r = t("./ELEMENT_NODE");
        e.exports = function(t) {
            return n(t, r)
        }
    }, {
        "./ELEMENT_NODE": 37,
        "./internal/isNodeType": 39
    }],
    43: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return !(!t || !t.nodeType)
        }
    }, {}],
    44: [function(t, e, i) {
        "use strict";
        var n = t("./internal/validate");
        e.exports = function(t) {
            return n.childNode(t, !0, "remove"), t.parentNode ? t.parentNode.removeChild(t) : t
        }
    }, {
        "./internal/validate": 40
    }],
    45: [function(t, e, i) {
        "use strict";
        var n;
        e.exports = window.Element ? (n = Element.prototype).matches || n.matchesSelector || n.webkitMatchesSelector || n.mozMatchesSelector || n.msMatchesSelector || n.oMatchesSelector : null
    }, {}],
    46: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.indexOf");
        var n = t("@marcom/ac-dom-nodes/isNode"),
            r = t("@marcom/ac-dom-nodes/COMMENT_NODE"),
            s = t("@marcom/ac-dom-nodes/DOCUMENT_FRAGMENT_NODE"),
            o = t("@marcom/ac-dom-nodes/DOCUMENT_NODE"),
            a = t("@marcom/ac-dom-nodes/ELEMENT_NODE"),
            c = function(t, e) {
                return !!n(t) && ("number" == typeof e ? t.nodeType === e : -1 !== e.indexOf(t.nodeType))
            },
            l = [a, o, s],
            h = [a, t("@marcom/ac-dom-nodes/TEXT_NODE"), r];
        e.exports = {
            parentNode: function(t, e, i, n) {
                if (n = n || "node", (t || e) && !c(t, l)) throw new TypeError(i + ": " + n + " must be an Element, Document, or Document Fragment")
            },
            childNode: function(t, e, i, n) {
                if (n = n || "node", (t || e) && !c(t, h)) throw new TypeError(i + ": " + n + " must be an Element, TextNode, or Comment")
            },
            selector: function(t, e, i, n) {
                if (n = n || "selector", (t || e) && "string" != typeof t) throw new TypeError(i + ": " + n + " must be a string")
            }
        }
    }, {
        "@marcom/ac-dom-nodes/COMMENT_NODE": 34,
        "@marcom/ac-dom-nodes/DOCUMENT_FRAGMENT_NODE": 35,
        "@marcom/ac-dom-nodes/DOCUMENT_NODE": 36,
        "@marcom/ac-dom-nodes/ELEMENT_NODE": 37,
        "@marcom/ac-dom-nodes/TEXT_NODE": 38,
        "@marcom/ac-dom-nodes/isNode": 43,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 86
    }],
    47: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-dom-nodes/isElement"),
            r = t("./internal/validate"),
            s = t("./internal/nativeMatches"),
            o = t("./shims/matchesSelector");
        e.exports = function(t, e) {
            return r.selector(e, !0, "matchesSelector"), !!n(t) && (s ? s.call(t, e) : o(t, e))
        }
    }, {
        "./internal/nativeMatches": 45,
        "./internal/validate": 46,
        "./shims/matchesSelector": 49,
        "@marcom/ac-dom-nodes/isElement": 42
    }],
    48: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.slice");
        var n = t("./internal/validate"),
            r = t("./shims/querySelectorAll"),
            s = "querySelectorAll" in document;
        e.exports = function(t, e) {
            return e = e || document, n.parentNode(e, !0, "querySelectorAll", "context"), n.selector(t, !0, "querySelectorAll"), s ? Array.prototype.slice.call(e.querySelectorAll(t)) : r(t, e)
        }
    }, {
        "./internal/validate": 46,
        "./shims/querySelectorAll": 50,
        "@marcom/ac-polyfills/Array/prototype.slice": 87
    }],
    49: [function(t, e, i) {
        "use strict";
        var n = t("../querySelectorAll");
        e.exports = function(t, e) {
            var i, r = t.parentNode || document,
                s = n(e, r);
            for (i = 0; i < s.length; i++)
                if (s[i] === t) return !0;
            return !1
        }
    }, {
        "../querySelectorAll": 48
    }],
    50: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.indexOf");
        var n = t("@marcom/ac-dom-nodes/isElement"),
            r = t("@marcom/ac-dom-nodes/isDocumentFragment"),
            s = t("@marcom/ac-dom-nodes/remove"),
            o = function(t, e) {
                var i;
                if (e === document) return !0;
                for (i = t;
                    (i = i.parentNode) && n(i);)
                    if (i === e) return !0;
                return !1
            },
            a = function(t) {
                "recalc" in t ? t.recalc(!1) : document.recalc(!1), window.scrollBy(0, 0)
            };
        e.exports = function(t, e) {
            var i, n = document.createElement("style"),
                c = "_ac_qsa_" + (Math.random() + "").slice(-6),
                l = [];
            for (e = e || document, document[c] = [], r(e) ? e.appendChild(n) : document.documentElement.firstChild.appendChild(n), n.styleSheet.cssText = "*{display:recalc;}" + t + '{ac-qsa:expression(document["' + c + '"] && document["' + c + '"].push(this));}', a(e); document[c].length;)(i = document[c].shift()).style.removeAttribute("ac-qsa"), -1 === l.indexOf(i) && o(i, e) && l.push(i);
            return document[c] = null, s(n), a(e), l
        }
    }, {
        "@marcom/ac-dom-nodes/isDocumentFragment": 41,
        "@marcom/ac-dom-nodes/isElement": 42,
        "@marcom/ac-dom-nodes/remove": 44,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 86
    }],
    51: [function(t, e, i) {
        "use strict";
        e.exports = {
            EventEmitterMicro: t("./ac-event-emitter-micro/EventEmitterMicro")
        }
    }, {
        "./ac-event-emitter-micro/EventEmitterMicro": 52
    }],
    52: [function(t, e, i) {
        "use strict";

        function n() {
            this._events = {}
        }
        var r = n.prototype;
        r.on = function(t, e) {
            this._events[t] = this._events[t] || [], this._events[t].unshift(e)
        }, r.once = function(t, e) {
            var i = this;
            this.on(t, function n(r) {
                i.off(t, n), void 0 !== r ? e(r) : e()
            })
        }, r.off = function(t, e) {
            if (this.has(t)) {
                if (1 === arguments.length) return this._events[t] = null, void delete this._events[t];
                var i = this._events[t].indexOf(e); - 1 !== i && this._events[t].splice(i, 1)
            }
        }, r.trigger = function(t, e) {
            if (this.has(t))
                for (var i = this._events[t].length - 1; i >= 0; i--) void 0 !== e ? this._events[t][i](e) : this._events[t][i]()
        }, r.has = function(t) {
            return t in this._events != !1 && 0 !== this._events[t].length
        }, r.destroy = function() {
            for (var t in this._events) this._events[t] = null;
            this._events = null
        }, e.exports = n
    }, {}],
    53: [function(t, e, i) {
        e.exports.EventEmitter = t("./ac-event-emitter/EventEmitter")
    }, {
        "./ac-event-emitter/EventEmitter": 54
    }],
    54: [function(t, e, i) {
        "use strict";
        var n = "EventEmitter:propagation",
            r = function(t) {
                t && (this.context = t)
            },
            s = r.prototype,
            o = function() {
                return this.hasOwnProperty("_events") || "object" == typeof this._events || (this._events = {}), this._events
            },
            a = function(t, e) {
                var i = t[0],
                    n = t[1],
                    r = t[2];
                if ("string" != typeof i && "object" != typeof i || null === i || Array.isArray(i)) throw new TypeError("Expecting event name to be a string or object.");
                if ("string" == typeof i && !n) throw new Error("Expecting a callback function to be provided.");
                if (n && "function" != typeof n) {
                    if ("object" != typeof i || "object" != typeof n) throw new TypeError("Expecting callback to be a function.");
                    r = n
                }
                if ("object" == typeof i)
                    for (var s in i) e.call(this, s, i[s], r);
                "string" == typeof i && (i = i.split(" ")).forEach(function(t) {
                    e.call(this, t, n, r)
                }, this)
            },
            c = function(t, e) {
                var i, n, r;
                if ((i = o.call(this)[t]) && 0 !== i.length)
                    for (i = i.slice(), this._stoppedImmediatePropagation = !1, n = 0, r = i.length; n < r && (!this._stoppedImmediatePropagation && !e(i[n], n)); n++);
            },
            l = function(t, e, i) {
                var n = -1;
                c.call(this, e, function(t, e) {
                    if (t.callback === i) return n = e, !0
                }), -1 !== n && t[e].splice(n, 1)
            };
        s.on = function() {
            var t = o.call(this);
            return a.call(this, arguments, function(e, i, n) {
                t[e] = t[e] || (t[e] = []), t[e].push({
                    callback: i,
                    context: n
                })
            }), this
        }, s.once = function() {
            return a.call(this, arguments, function(t, e, i) {
                var n = function(r) {
                    e.call(i || this, r), this.off(t, n)
                };
                this.on(t, n, this)
            }), this
        }, s.off = function(t, e) {
            var i = o.call(this);
            if (0 === arguments.length) this._events = {};
            else if (!t || "string" != typeof t && "object" != typeof t || Array.isArray(t)) throw new TypeError("Expecting event name to be a string or object.");
            if ("object" == typeof t)
                for (var n in t) l.call(this, i, n, t[n]);
            if ("string" == typeof t) {
                var r = t.split(" ");
                1 === r.length ? e ? l.call(this, i, t, e) : i[t] = [] : r.forEach(function(t) {
                    i[t] = []
                })
            }
            return this
        }, s.trigger = function(t, e, i) {
            if (!t) throw new Error("trigger method requires an event name");
            if ("string" != typeof t) throw new TypeError("Expecting event names to be a string.");
            if (i && "boolean" != typeof i) throw new TypeError("Expecting doNotPropagate to be a boolean.");
            return (t = t.split(" ")).forEach(function(t) {
                c.call(this, t, function(t) {
                    t.callback.call(t.context || this.context || this, e)
                }.bind(this)), i || c.call(this, n, function(i) {
                    var n = t;
                    i.prefix && (n = i.prefix + n), i.emitter.trigger(n, e)
                })
            }, this), this
        }, s.propagateTo = function(t, e) {
            var i = o.call(this);
            i[n] || (this._events[n] = []), i[n].push({
                emitter: t,
                prefix: e
            })
        }, s.stopPropagatingTo = function(t) {
            var e = o.call(this);
            if (t) {
                var i, r = e[n],
                    s = r.length;
                for (i = 0; i < s; i++)
                    if (r[i].emitter === t) {
                        r.splice(i, 1);
                        break
                    }
            } else e[n] = []
        }, s.stopImmediatePropagation = function() {
            this._stoppedImmediatePropagation = !0
        }, s.has = function(t, e, i) {
            var n = o.call(this),
                r = n[t];
            if (0 === arguments.length) return Object.keys(n);
            if (!r) return !1;
            if (!e) return r.length > 0;
            for (var s = 0, a = r.length; s < a; s++) {
                var c = r[s];
                if (i && e && c.context === i && c.callback === e) return !0;
                if (e && !i && c.callback === e) return !0
            }
            return !1
        }, e.exports = r
    }, {}],
    55: [function(t, e, i) {
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
    56: [function(t, e, i) {
        "use strict";
        var n = t("./touchAvailable").original,
            r = t("./helpers/globals"),
            s = t("@marcom/ac-function/once");

        function o() {
            var t = r.getWindow();
            return !n() && !t.orientation
        }
        e.exports = s(o), e.exports.original = o
    }, {
        "./helpers/globals": 55,
        "./touchAvailable": 59,
        "@marcom/ac-function/once": 60
    }],
    57: [function(t, e, i) {
        "use strict";
        var n = t("./isDesktop").original,
            r = t("./isTablet").original,
            s = t("@marcom/ac-function/once");

        function o() {
            return !n() && !r()
        }
        e.exports = s(o), e.exports.original = o
    }, {
        "./isDesktop": 56,
        "./isTablet": 58,
        "@marcom/ac-function/once": 60
    }],
    58: [function(t, e, i) {
        "use strict";
        var n = t("./isDesktop").original,
            r = t("./helpers/globals"),
            s = t("@marcom/ac-function/once"),
            o = 600;

        function a() {
            var t = r.getWindow(),
                e = t.screen.width;
            return t.orientation && t.screen.height < e && (e = t.screen.height), !n() && e >= o
        }
        e.exports = s(a), e.exports.original = a
    }, {
        "./helpers/globals": 55,
        "./isDesktop": 56,
        "@marcom/ac-function/once": 60
    }],
    59: [function(t, e, i) {
        "use strict";
        var n = t("./helpers/globals"),
            r = t("@marcom/ac-function/once");

        function s() {
            var t = n.getWindow(),
                e = n.getDocument(),
                i = n.getNavigator();
            return !!("ontouchstart" in t || t.DocumentTouch && e instanceof t.DocumentTouch || i.maxTouchPoints > 0 || i.msMaxTouchPoints > 0)
        }
        e.exports = r(s), e.exports.original = s
    }, {
        "./helpers/globals": 55,
        "@marcom/ac-function/once": 60
    }],
    60: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            var e;
            return function() {
                return void 0 === e && (e = t.apply(this, arguments)), e
            }
        }
    }, {}],
    61: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            r = t("@marcom/ac-dom-events/utils/addEventListener"),
            s = t("@marcom/ac-dom-events/utils/removeEventListener"),
            o = t("@marcom/ac-object/create"),
            a = t("./internal/KeyEvent"),
            c = "keydown",
            l = "keyup";

        function h(t) {
            this._keysDown = {}, this._DOMKeyDown = this._DOMKeyDown.bind(this), this._DOMKeyUp = this._DOMKeyUp.bind(this), this._context = t || document, r(this._context, c, this._DOMKeyDown, !0), r(this._context, l, this._DOMKeyUp, !0), n.call(this)
        }
        var u = h.prototype = o(n.prototype);
        u.onDown = function(t, e) {
            return this.on(c + ":" + t, e)
        }, u.onceDown = function(t, e) {
            return this.once(c + ":" + t, e)
        }, u.offDown = function(t, e) {
            return this.off(c + ":" + t, e)
        }, u.onUp = function(t, e) {
            return this.on(l + ":" + t, e)
        }, u.onceUp = function(t, e) {
            return this.once(l + ":" + t, e)
        }, u.offUp = function(t, e) {
            return this.off(l + ":" + t, e)
        }, u.isDown = function(t) {
            return t += "", this._keysDown[t] || !1
        }, u.isUp = function(t) {
            return !this.isDown(t)
        }, u.destroy = function() {
            return s(this._context, c, this._DOMKeyDown, !0), s(this._context, l, this._DOMKeyUp, !0), this._keysDown = null, this._context = null, n.prototype.destroy.call(this), this
        }, u._DOMKeyDown = function(t) {
            var e = this._normalizeKeyboardEvent(t),
                i = e.keyCode += "";
            this._trackKeyDown(i), this.trigger(c + ":" + i, e)
        }, u._DOMKeyUp = function(t) {
            var e = this._normalizeKeyboardEvent(t),
                i = e.keyCode += "";
            this._trackKeyUp(i), this.trigger(l + ":" + i, e)
        }, u._normalizeKeyboardEvent = function(t) {
            return new a(t)
        }, u._trackKeyUp = function(t) {
            this._keysDown[t] && (this._keysDown[t] = !1)
        }, u._trackKeyDown = function(t) {
            this._keysDown[t] || (this._keysDown[t] = !0)
        }, e.exports = h
    }, {
        "./internal/KeyEvent": 63,
        "@marcom/ac-dom-events/utils/addEventListener": 29,
        "@marcom/ac-dom-events/utils/removeEventListener": 31,
        "@marcom/ac-event-emitter-micro": 51,
        "@marcom/ac-object/create": 76
    }],
    62: [function(t, e, i) {
        "use strict";
        var n = t("./Keyboard");
        e.exports = new n
    }, {
        "./Keyboard": 61
    }],
    63: [function(t, e, i) {
        "use strict";
        var n = ["keyLocation"];

        function r(t) {
            var e;
            for (e in this.originalEvent = t, t) - 1 === n.indexOf(e) && "function" != typeof t[e] && (this[e] = t[e]);
            this.location = void 0 !== this.originalEvent.location ? this.originalEvent.location : this.originalEvent.keyLocation
        }
        r.prototype = {
            preventDefault: function() {
                if ("function" == typeof this.originalEvent.preventDefault) return this.originalEvent.preventDefault();
                this.originalEvent.returnValue = !1
            },
            stopPropagation: function() {
                return this.originalEvent.stopPropagation()
            }
        }, e.exports = r
    }, {}],
    64: [function(t, e, i) {
        "use strict";
        e.exports = {
            BACKSPACE: 8,
            TAB: 9,
            ENTER: 13,
            SHIFT: 16,
            CONTROL: 17,
            ALT: 18,
            COMMAND: 91,
            CAPSLOCK: 20,
            ESCAPE: 27,
            PAGE_UP: 33,
            PAGE_DOWN: 34,
            END: 35,
            HOME: 36,
            ARROW_LEFT: 37,
            ARROW_UP: 38,
            ARROW_RIGHT: 39,
            ARROW_DOWN: 40,
            DELETE: 46,
            ZERO: 48,
            ONE: 49,
            TWO: 50,
            THREE: 51,
            FOUR: 52,
            FIVE: 53,
            SIX: 54,
            SEVEN: 55,
            EIGHT: 56,
            NINE: 57,
            A: 65,
            B: 66,
            C: 67,
            D: 68,
            E: 69,
            F: 70,
            G: 71,
            H: 72,
            I: 73,
            J: 74,
            K: 75,
            L: 76,
            M: 77,
            N: 78,
            O: 79,
            P: 80,
            Q: 81,
            R: 82,
            S: 83,
            T: 84,
            U: 85,
            V: 86,
            W: 87,
            X: 88,
            Y: 89,
            Z: 90,
            NUMPAD_ZERO: 96,
            NUMPAD_ONE: 97,
            NUMPAD_TWO: 98,
            NUMPAD_THREE: 99,
            NUMPAD_FOUR: 100,
            NUMPAD_FIVE: 101,
            NUMPAD_SIX: 102,
            NUMPAD_SEVEN: 103,
            NUMPAD_EIGHT: 104,
            NUMPAD_NINE: 105,
            NUMPAD_ASTERISK: 106,
            NUMPAD_PLUS: 107,
            NUMPAD_DASH: 109,
            NUMPAD_DOT: 110,
            NUMPAD_SLASH: 111,
            NUMPAD_EQUALS: 187,
            TICK: 192,
            LEFT_BRACKET: 219,
            RIGHT_BRACKET: 221,
            BACKSLASH: 220,
            SEMICOLON: 186,
            APOSTRAPHE: 222,
            APOSTROPHE: 222,
            SPACEBAR: 32,
            CLEAR: 12,
            COMMA: 188,
            DOT: 190,
            SLASH: 191
        }
    }, {}],
    65: [function(t, e, i) {
        "use strict";
        e.exports = {
            Modal: t("./ac-modal-basic/Modal"),
            Renderer: t("./ac-modal-basic/Renderer"),
            classNames: t("./ac-modal-basic/classNames"),
            dataAttributes: t("./ac-modal-basic/dataAttributes")
        }
    }, {
        "./ac-modal-basic/Modal": 66,
        "./ac-modal-basic/Renderer": 67,
        "./ac-modal-basic/classNames": 68,
        "./ac-modal-basic/dataAttributes": 69
    }],
    66: [function(t, e, i) {
        "use strict";
        var n = {
                addEventListener: t("@marcom/ac-dom-events/addEventListener"),
                removeEventListener: t("@marcom/ac-dom-events/removeEventListener"),
                target: t("@marcom/ac-dom-events/target")
            },
            r = {
                getScrollX: t("@marcom/ac-dom-metrics/getScrollX"),
                getScrollY: t("@marcom/ac-dom-metrics/getScrollY")
            },
            s = {
                create: t("@marcom/ac-object/create"),
                defaults: t("@marcom/ac-object/defaults")
            },
            o = t("@marcom/ac-keyboard"),
            a = t("@marcom/ac-keyboard/keyMap"),
            c = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            l = t("./Renderer"),
            h = {
                retainScrollPosition: !1
            };

        function u(t, e) {
            c.call(this), this.options = s.defaults(h, t), this.renderer = new l(e), this.opened = !1, this._keysToClose = [a.ESCAPE], this._attachedKeysToClose = [], this.close = this.close.bind(this)
        }
        var d = u.prototype = s.create(c.prototype);
        d.open = function() {
            this.options.retainScrollPosition && this._saveScrollPosition(), this.opened || (this._attachEvents(), this.trigger("willopen"), this.renderer.open(), this.opened = !0, this.trigger("open"))
        }, d.close = function(t) {
            var e, i;
            if (this.opened) {
                if (t && "click" === t.type && (e = n.target(t), i = this.renderer.options.dataAttributes.close, !e.hasAttribute(i))) return;
                this.trigger("willclose"), this._removeEvents(), this.renderer.close(), this.options.retainScrollPosition && this._restoreScrollPosition(), this.opened = !1, this.trigger("close")
            }
        }, d.render = function() {
            this.renderer.render()
        }, d.appendContent = function(t, e) {
            this.renderer.appendContent(t, e)
        }, d.removeContent = function(t) {
            this.renderer.removeContent(t)
        }, d.destroy = function() {
            for (var t in this._removeEvents(), this.renderer.destroy(), this) this.hasOwnProperty(t) && (this[t] = null)
        }, d.addKeyToClose = function(t) {
            -1 === this._keysToClose.indexOf(t) && (this._keysToClose.push(t), this._bindKeyToClose(t))
        }, d.removeKeyToClose = function(t) {
            var e = this._keysToClose.indexOf(t); - 1 !== e && this._keysToClose.splice(e, 1), this._releaseKeyToClose(t)
        }, d._bindKeyToClose = function(t) {
            -1 === this._attachedKeysToClose.indexOf(t) && (o.onUp(t, this.close), this._attachedKeysToClose.push(t))
        }, d._releaseKeyToClose = function(t) {
            var e = this._attachedKeysToClose.indexOf(t); - 1 !== e && (o.offUp(t, this.close), this._attachedKeysToClose.splice(e, 1))
        }, d._removeEvents = function() {
            this.renderer.modalElement && n.removeEventListener(this.renderer.modalElement, "click", this.close), this._keysToClose.forEach(this._releaseKeyToClose, this)
        }, d._attachEvents = function() {
            this.renderer.modalElement && n.addEventListener(this.renderer.modalElement, "click", this.close), this._keysToClose.forEach(this._bindKeyToClose, this)
        }, d._restoreScrollPosition = function() {
            window.scrollTo(this._scrollX || 0, this._scrollY || 0)
        }, d._saveScrollPosition = function() {
            this._scrollX = r.getScrollX(), this._scrollY = r.getScrollY()
        }, e.exports = u
    }, {
        "./Renderer": 67,
        "@marcom/ac-dom-events/addEventListener": 20,
        "@marcom/ac-dom-events/removeEventListener": 24,
        "@marcom/ac-dom-events/target": 28,
        "@marcom/ac-dom-metrics/getScrollX": 32,
        "@marcom/ac-dom-metrics/getScrollY": 33,
        "@marcom/ac-event-emitter-micro": 51,
        "@marcom/ac-keyboard": 62,
        "@marcom/ac-keyboard/keyMap": 64,
        "@marcom/ac-object/create": 76,
        "@marcom/ac-object/defaults": 77
    }],
    67: [function(t, e, i) {
        "use strict";
        var n = {
                add: t("@marcom/ac-classlist/add"),
                remove: t("@marcom/ac-classlist/remove")
            },
            r = {
                defaults: t("@marcom/ac-object/defaults")
            },
            s = {
                remove: t("@marcom/ac-dom-nodes/remove"),
                isElement: t("@marcom/ac-dom-nodes/isElement")
            },
            o = {
                modalElement: null,
                contentElement: null,
                closeButton: null,
                classNames: t("./classNames"),
                dataAttributes: t("./dataAttributes")
            },
            a = function(t) {
                t = t || {}, this.options = r.defaults(o, t), this.options.classNames = r.defaults(o.classNames, t.classNames), this.options.dataAttributes = r.defaults(o.dataAttributes, t.dataAttributes), this.modalElement = this.options.modalElement, this.contentElement = this.options.contentElement, this.closeButton = this.options.closeButton
            },
            c = a.prototype;
        c.render = function() {
            return s.isElement(this.modalElement) || (this.modalElement = this.renderModalElement(this.options.classNames.modalElement)), s.isElement(this.contentElement) || (this.contentElement = this.renderContentElement(this.options.classNames.contentElement)), !1 !== this.closeButton && (s.isElement(this.closeButton) || (this.closeButton = this.renderCloseButton(this.options.classNames.closeButton)), this.modalElement.appendChild(this.closeButton)), this.modalElement.appendChild(this.contentElement), document.body.appendChild(this.modalElement), this.modalElement
        }, c.renderCloseButton = function(t) {
            var e;
            return t = t || this.options.classNames.closeButton, (e = this._renderElement("button", t)).setAttribute(this.options.dataAttributes.close, ""), e
        }, c.renderModalElement = function(t) {
            return t = t || this.options.classNames.modalElement, this._renderElement("div", t)
        }, c.renderContentElement = function(t) {
            return t = t || this.options.classNames.contentElement, this._renderElement("div", t)
        }, c.appendContent = function(t, e) {
            s.isElement(t) && (void 0 === arguments[1] ? this.contentElement.appendChild(t) : s.isElement(e) && e.appendChild(t))
        }, c.removeContent = function(t) {
            t ? this.modalElement.contains(t) && s.remove(t) : this._emptyContent()
        }, c.open = function() {
            var t = [document.documentElement].concat(this.options.classNames.documentElement),
                e = [this.modalElement].concat(this.options.classNames.modalOpen);
            n.add.apply(null, t), n.add.apply(null, e)
        }, c.close = function() {
            var t = [document.documentElement].concat(this.options.classNames.documentElement),
                e = [this.modalElement].concat(this.options.classNames.modalOpen);
            n.remove.apply(null, t), n.remove.apply(null, e)
        }, c.destroy = function() {
            var t = [document.documentElement].concat(this.options.classNames.documentElement);
            for (var e in this.modalElement && document.body.contains(this.modalElement) && (this.close(), document.body.removeChild(this.modalElement)), n.remove.apply(null, t), this) this.hasOwnProperty(e) && (this[e] = null)
        }, c._renderElement = function(t, e) {
            var i = document.createElement(t),
                r = [i];
            return e && (r = r.concat(e)), n.add.apply(null, r), i
        }, c._emptyContent = function() {
            this.contentElement.innerHTML = ""
        }, e.exports = a
    }, {
        "./classNames": 68,
        "./dataAttributes": 69,
        "@marcom/ac-classlist/add": 11,
        "@marcom/ac-classlist/remove": 16,
        "@marcom/ac-dom-nodes/isElement": 42,
        "@marcom/ac-dom-nodes/remove": 44,
        "@marcom/ac-object/defaults": 77
    }],
    68: [function(t, e, i) {
        "use strict";
        e.exports = {
            modalElement: "modal",
            modalOpen: "modal-open",
            documentElement: "has-modal",
            contentElement: "modal-content",
            closeButton: "modal-close"
        }
    }, {}],
    69: [function(t, e, i) {
        "use strict";
        e.exports = {
            close: "data-modal-close"
        }
    }, {}],
    70: [function(t, e, i) {
        "use strict";
        e.exports = {
            Modal: t("./ac-modal/Modal"),
            createStandardModal: t("./ac-modal/factory/createStandardModal"),
            createFullViewportModal: t("./ac-modal/factory/createFullViewportModal")
        }
    }, {
        "./ac-modal/Modal": 71,
        "./ac-modal/factory/createFullViewportModal": 72,
        "./ac-modal/factory/createStandardModal": 73
    }],
    71: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-modal-basic").Modal,
            r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            s = t("@marcom/ac-accessibility/CircularTab");

        function o(t) {
            r.call(this), this.options = t || {}, this._modal = new n(t, this.options.renderer), this.opened = !1, this._render(), this.closeButton = this._modal.renderer.closeButton, this.modalElement = this._modal.renderer.modalElement, this.contentElement = this._modal.renderer.contentElement, this.modalElement.setAttribute("role", "dialog"), this.closeButton.setAttribute("aria-label", "Close"), this._circularTab = new s(this.modalElement), this._onWillOpen = this._onWillOpen.bind(this), this._onOpen = this._onOpen.bind(this), this._onWillClose = this._onWillClose.bind(this), this._onClose = this._onClose.bind(this), this._bindEvents()
        }
        var a = o.prototype = Object.create(r.prototype);
        a.open = function() {
            this._modal.open(), this.opened = this._modal.opened
        }, a.close = function() {
            this._modal.close()
        }, a.appendContent = function(t) {
            this._modal.appendContent(t)
        }, a.removeContent = function(t) {
            this._modal.removeContent(t)
        }, a.destroy = function() {
            for (var t in this._releaseEvents(), this._modal.destroy(), this._removeModalFocus(), this._circularTab.destroy(), this._focusObj = null, this) this.hasOwnProperty(t) && (this[t] = null)
        }, a.addKeyToClose = function(t) {
            this._modal.addKeyToClose(t)
        }, a.removeKeyToClose = function(t) {
            this._modal.removeKeyToClose(t)
        }, a._render = function() {
            this._modal.render(), this._modal.renderer.modalElement.setAttribute("aria-hidden", "true")
        }, a._bindEvents = function() {
            this._modal.on("willopen", this._onWillOpen), this._modal.on("open", this._onOpen), this._modal.on("willclose", this._onWillClose), this._modal.on("close", this._onClose)
        }, a._releaseEvents = function() {
            this._modal.off("willopen", this._onWillOpen), this._modal.off("open", this._onOpen), this._modal.off("willclose", this._onWillClose), this._modal.off("close", this._onClose)
        }, a._onWillOpen = function() {
            this.trigger("willopen")
        }, a._onOpen = function() {
            this.opened = this._modal.opened, this._giveModalFocus(), this.trigger("open")
        }, a._onWillClose = function() {
            this.trigger("willclose"), this._removeModalFocus()
        }, a._onClose = function() {
            this.opened = this._modal.opened, this.trigger("close")
        }, a._giveModalFocus = function() {
            this.modalElement.removeAttribute("aria-hidden"), this._activeElement = document.activeElement, this.closeButton.focus(), this._circularTab.start()
        }, a._removeModalFocus = function() {
            this._circularTab.stop(), this.modalElement.setAttribute("aria-hidden", "true"), this._activeElement && (this._activeElement.focus(), this._activeElement = null)
        }, e.exports = o
    }, {
        "@marcom/ac-accessibility/CircularTab": 1,
        "@marcom/ac-event-emitter-micro": 51,
        "@marcom/ac-modal-basic": 65
    }],
    72: [function(t, e, i) {
        "use strict";
        var n = t("../Modal"),
            r = t("@marcom/ac-modal-basic").classNames,
            s = {
                retainScrollPosition: !0,
                renderer: {
                    classNames: {
                        documentElement: [r.documentElement].concat("has-modal-full-viewport"),
                        modalElement: [r.modalElement].concat("modal-full-viewport")
                    }
                }
            };
        e.exports = function(t) {
            var e = new n(s);
            return t && e.appendContent(t), e
        }
    }, {
        "../Modal": 71,
        "@marcom/ac-modal-basic": 65
    }],
    73: [function(t, e, i) {
        "use strict";
        var n = t("../Modal"),
            r = t("@marcom/ac-modal-basic").classNames,
            s = t("@marcom/ac-modal-basic").dataAttributes,
            o = {
                add: t("@marcom/ac-classlist/add")
            },
            a = {
                renderer: {
                    classNames: {
                        documentElement: [r.documentElement].concat("has-modal-standard"),
                        modalElement: [r.modalElement].concat("modal-standard")
                    }
                }
            };
        e.exports = function(t) {
            var e = new n(a);
            t && e.appendContent(t);
            var i = document.createElement("div"),
                r = document.createElement("div"),
                c = document.createElement("div"),
                l = document.createElement("div");
            return o.add(i, "content-table"), o.add(r, "content-cell"), o.add(c, "content-wrapper"), o.add(l, "content-padding", "large-8", "medium-10"), e.modalElement.setAttribute(s.close, ""), c.setAttribute(s.close, ""), r.setAttribute(s.close, ""), i.appendChild(r), r.appendChild(c), c.appendChild(l), e.modalElement.appendChild(i), l.appendChild(e.contentElement), l.appendChild(e.closeButton), e
        }
    }, {
        "../Modal": 71,
        "@marcom/ac-classlist/add": 11,
        "@marcom/ac-modal-basic": 65
    }],
    74: [function(t, e, i) {
        "use strict";
        e.exports = {
            clone: t("./clone"),
            create: t("./create"),
            defaults: t("./defaults"),
            extend: t("./extend"),
            getPrototypeOf: t("./getPrototypeOf"),
            isDate: t("./isDate"),
            isEmpty: t("./isEmpty"),
            isRegExp: t("./isRegExp"),
            toQueryParameters: t("./toQueryParameters")
        }
    }, {
        "./clone": 75,
        "./create": 76,
        "./defaults": 77,
        "./extend": 78,
        "./getPrototypeOf": 79,
        "./isDate": 80,
        "./isEmpty": 81,
        "./isRegExp": 82,
        "./toQueryParameters": 83
    }],
    75: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/isArray");
        var n = t("./extend"),
            r = Object.prototype.hasOwnProperty,
            s = function(t, e) {
                var i;
                for (i in e) r.call(e, i) && (null === e[i] ? t[i] = null : "object" == typeof e[i] ? (t[i] = Array.isArray(e[i]) ? [] : {}, s(t[i], e[i])) : t[i] = e[i]);
                return t
            };
        e.exports = function(t, e) {
            return e ? s({}, t) : n({}, t)
        }
    }, {
        "./extend": 78,
        "@marcom/ac-polyfills/Array/isArray": 84
    }],
    76: [function(t, e, i) {
        "use strict";
        var n = function() {};
        e.exports = function(t) {
            if (arguments.length > 1) throw new Error("Second argument not supported");
            if (null === t || "object" != typeof t) throw new TypeError("Object prototype may only be an Object.");
            return "function" == typeof Object.create ? Object.create(t) : (n.prototype = t, new n)
        }
    }, {}],
    77: [function(t, e, i) {
        "use strict";
        var n = t("./extend");
        e.exports = function(t, e) {
            if ("object" != typeof t) throw new TypeError("defaults: must provide a defaults object");
            if ("object" != typeof(e = e || {})) throw new TypeError("defaults: options must be a typeof object");
            return n({}, t, e)
        }
    }, {
        "./extend": 78
    }],
    78: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.forEach");
        var n = Object.prototype.hasOwnProperty;
        e.exports = function() {
            var t, e;
            return t = arguments.length < 2 ? [{}, arguments[0]] : [].slice.call(arguments), e = t.shift(), t.forEach(function(t) {
                if (null != t)
                    for (var i in t) n.call(t, i) && (e[i] = t[i])
            }), e
        }
    }, {
        "@marcom/ac-polyfills/Array/prototype.forEach": 85
    }],
    79: [function(t, e, i) {
        "use strict";
        var n = Object.prototype.hasOwnProperty;
        e.exports = function(t) {
            if (Object.getPrototypeOf) return Object.getPrototypeOf(t);
            if ("object" != typeof t) throw new Error("Requested prototype of a value that is not an object.");
            if ("object" == typeof this.__proto__) return t.__proto__;
            var e, i = t.constructor;
            if (n.call(t, "constructor")) {
                if (e = i, !delete t.constructor) return null;
                i = t.constructor, t.constructor = e
            }
            return i ? i.prototype : null
        }
    }, {}],
    80: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return "[object Date]" === Object.prototype.toString.call(t)
        }
    }, {}],
    81: [function(t, e, i) {
        "use strict";
        var n = Object.prototype.hasOwnProperty;
        e.exports = function(t) {
            var e;
            if ("object" != typeof t) throw new TypeError("ac-base.Object.isEmpty : Invalid parameter - expected object");
            for (e in t)
                if (n.call(t, e)) return !1;
            return !0
        }
    }, {}],
    82: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return !!window.RegExp && t instanceof RegExp
        }
    }, {}],
    83: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-url/joinSearchParams");
        e.exports = function(t) {
            if ("object" != typeof t) throw new TypeError("toQueryParameters error: argument is not an object");
            return n(t, !1)
        }
    }, {
        "@marcom/ac-url/joinSearchParams": 102
    }],
    84: [function(t, e, i) {
        Array.isArray || (Array.isArray = function(t) {
            return "[object Array]" === Object.prototype.toString.call(t)
        })
    }, {}],
    85: [function(t, e, i) {
        Array.prototype.forEach || (Array.prototype.forEach = function(t, e) {
            var i, n, r = Object(this);
            if ("function" != typeof t) throw new TypeError("No function object passed to forEach.");
            var s = this.length;
            for (i = 0; i < s; i += 1) n = r[i], t.call(e, n, i, r)
        })
    }, {}],
    86: [function(t, e, i) {
        Array.prototype.indexOf || (Array.prototype.indexOf = function(t, e) {
            var i = e || 0,
                n = 0;
            if (i < 0 && (i = this.length + e - 1) < 0) throw "Wrapped past beginning of array while looking up a negative start index.";
            for (n = 0; n < this.length; n++)
                if (this[n] === t) return n;
            return -1
        })
    }, {}],
    87: [function(t, e, i) {
        ! function() {
            "use strict";
            var t = Array.prototype.slice;
            try {
                t.call(document.documentElement)
            } catch (e) {
                Array.prototype.slice = function(e, i) {
                    if (i = void 0 !== i ? i : this.length, "[object Array]" === Object.prototype.toString.call(this)) return t.call(this, e, i);
                    var n, r, s = [],
                        o = this.length,
                        a = e || 0;
                    a = a >= 0 ? a : o + a;
                    var c = i || o;
                    if (i < 0 && (c = o + i), (r = c - a) > 0)
                        if (s = new Array(r), this.charAt)
                            for (n = 0; n < r; n++) s[n] = this.charAt(a + n);
                        else
                            for (n = 0; n < r; n++) s[n] = this[a + n];
                    return s
                }
            }
        }()
    }, {}],
    88: [function(t, e, i) {
        if (document.createEvent) try {
            new window.CustomEvent("click")
        } catch (t) {
            window.CustomEvent = function() {
                function t(t, e) {
                    e = e || {
                        bubbles: !1,
                        cancelable: !1,
                        detail: void 0
                    };
                    var i = document.createEvent("CustomEvent");
                    return i.initCustomEvent(t, e.bubbles, e.cancelable, e.detail), i
                }
                return t.prototype = window.Event.prototype, t
            }()
        }
    }, {}],
    89: [function(t, e, i) {
        "document" in self && ("classList" in document.createElement("_") ? function() {
            "use strict";
            var t = document.createElement("_");
            if (t.classList.add("c1", "c2"), !t.classList.contains("c2")) {
                var e = function(t) {
                    var e = DOMTokenList.prototype[t];
                    DOMTokenList.prototype[t] = function(t) {
                        var i, n = arguments.length;
                        for (i = 0; i < n; i++) t = arguments[i], e.call(this, t)
                    }
                };
                e("add"), e("remove")
            }
            if (t.classList.toggle("c3", !1), t.classList.contains("c3")) {
                var i = DOMTokenList.prototype.toggle;
                DOMTokenList.prototype.toggle = function(t, e) {
                    return 1 in arguments && !this.contains(t) == !e ? e : i.call(this, t)
                }
            }
            t = null
        }() : function(t) {
            "use strict";
            if ("Element" in t) {
                var e = t.Element.prototype,
                    i = Object,
                    n = String.prototype.trim || function() {
                        return this.replace(/^\s+|\s+$/g, "")
                    },
                    r = Array.prototype.indexOf || function(t) {
                        for (var e = 0, i = this.length; e < i; e++)
                            if (e in this && this[e] === t) return e;
                        return -1
                    },
                    s = function(t, e) {
                        this.name = t, this.code = DOMException[t], this.message = e
                    },
                    o = function(t, e) {
                        if ("" === e) throw new s("SYNTAX_ERR", "An invalid or illegal string was specified");
                        if (/\s/.test(e)) throw new s("INVALID_CHARACTER_ERR", "String contains an invalid character");
                        return r.call(t, e)
                    },
                    a = function(t) {
                        for (var e = n.call(t.getAttribute("class") || ""), i = e ? e.split(/\s+/) : [], r = 0, s = i.length; r < s; r++) this.push(i[r]);
                        this._updateClassName = function() {
                            t.setAttribute("class", this.toString())
                        }
                    },
                    c = a.prototype = [],
                    l = function() {
                        return new a(this)
                    };
                if (s.prototype = Error.prototype, c.item = function(t) {
                        return this[t] || null
                    }, c.contains = function(t) {
                        return -1 !== o(this, t += "")
                    }, c.add = function() {
                        var t, e = arguments,
                            i = 0,
                            n = e.length,
                            r = !1;
                        do {
                            t = e[i] + "", -1 === o(this, t) && (this.push(t), r = !0)
                        } while (++i < n);
                        r && this._updateClassName()
                    }, c.remove = function() {
                        var t, e, i = arguments,
                            n = 0,
                            r = i.length,
                            s = !1;
                        do {
                            for (t = i[n] + "", e = o(this, t); - 1 !== e;) this.splice(e, 1), s = !0, e = o(this, t)
                        } while (++n < r);
                        s && this._updateClassName()
                    }, c.toggle = function(t, e) {
                        t += "";
                        var i = this.contains(t),
                            n = i ? !0 !== e && "remove" : !1 !== e && "add";
                        return n && this[n](t), !0 === e || !1 === e ? e : !i
                    }, c.toString = function() {
                        return this.join(" ")
                    }, i.defineProperty) {
                    var h = {
                        get: l,
                        enumerable: !0,
                        configurable: !0
                    };
                    try {
                        i.defineProperty(e, "classList", h)
                    } catch (t) {
                        -2146823252 === t.number && (h.enumerable = !1, i.defineProperty(e, "classList", h))
                    }
                } else i.prototype.__defineGetter__ && e.__defineGetter__("classList", l)
            }
        }(self))
    }, {}],
    90: [function(t, e, i) {
        "function" != typeof Object.assign && (Object.assign = function(t) {
            "use strict";
            if (null == t) throw new TypeError("Cannot convert undefined or null to object");
            t = Object(t);
            for (var e = 1; e < arguments.length; e++) {
                var i = arguments[e];
                if (null != i)
                    for (var n in i) Object.prototype.hasOwnProperty.call(i, n) && (t[n] = i[n])
            }
            return t
        })
    }, {}],
    91: [function(t, e, i) {
        "use strict";
        var n = t("./utils/eventTypeAvailable"),
            r = t("./shared/camelCasedEventTypes"),
            s = t("./shared/windowFallbackEventTypes"),
            o = t("./shared/prefixHelper"),
            a = {};
        e.exports = function t(e, i) {
            var c, l, h;
            if (i = i || "div", e = e.toLowerCase(), i in a || (a[i] = {}), e in (l = a[i])) return l[e];
            if (n(e, i)) return l[e] = e;
            if (e in r)
                for (h = 0; h < r[e].length; h++)
                    if (c = r[e][h], n(c.toLowerCase(), i)) return l[e] = c;
            for (h = 0; h < o.evt.length; h++)
                if (c = o.evt[h] + e, n(c, i)) return o.reduce(h), l[e] = c;
            return "window" !== i && s.indexOf(e) ? l[e] = t(e, "window") : l[e] = !1
        }
    }, {
        "./shared/camelCasedEventTypes": 92,
        "./shared/prefixHelper": 93,
        "./shared/windowFallbackEventTypes": 94,
        "./utils/eventTypeAvailable": 95
    }],
    92: [function(t, e, i) {
        "use strict";
        e.exports = {
            transitionend: ["webkitTransitionEnd", "MSTransitionEnd"],
            animationstart: ["webkitAnimationStart", "MSAnimationStart"],
            animationend: ["webkitAnimationEnd", "MSAnimationEnd"],
            animationiteration: ["webkitAnimationIteration", "MSAnimationIteration"],
            fullscreenchange: ["MSFullscreenChange"],
            fullscreenerror: ["MSFullscreenError"]
        }
    }, {}],
    93: [function(t, e, i) {
        "use strict";
        var n = ["-webkit-", "-moz-", "-ms-"],
            r = ["Webkit", "Moz", "ms"],
            s = ["webkit", "moz", "ms"],
            o = function() {
                this.initialize()
            },
            a = o.prototype;
        a.initialize = function() {
            this.reduced = !1, this.css = n, this.dom = r, this.evt = s
        }, a.reduce = function(t) {
            this.reduced || (this.reduced = !0, this.css = [this.css[t]], this.dom = [this.dom[t]], this.evt = [this.evt[t]])
        }, e.exports = new o
    }, {}],
    94: [function(t, e, i) {
        "use strict";
        e.exports = ["transitionend", "animationstart", "animationend", "animationiteration"]
    }, {}],
    95: [function(t, e, i) {
        "use strict";
        var n = {
            window: window,
            document: document
        };
        e.exports = function(t, e) {
            var i;
            return t = "on" + t, e in n || (n[e] = document.createElement(e)), t in (i = n[e]) || "setAttribute" in i && (i.setAttribute(t, "return;"), "function" == typeof i[t])
        }
    }, {}],
    96: [function(t, e, i) {
        "use strict";
        e.exports = {
            Router: t("./ac-router/Router"),
            History: t("./ac-router/History"),
            Routes: t("@marcom/ac-routes").Routes,
            Route: t("@marcom/ac-routes").Route
        }
    }, {
        "./ac-router/History": 97,
        "./ac-router/Router": 98,
        "@marcom/ac-routes": 99
    }],
    97: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-object").create,
            r = t("@marcom/ac-dom-events"),
            s = t("@marcom/ac-event-emitter").EventEmitter;

        function o(t) {
            t = t || {}, this.history = window.history, this.rootStripper = /^\/+|\/+$/g, this.root = t.root || "/", this.root = ("/" + this.root + "/").replace(this.rootStripper, "/");
            var e = "boolean" != typeof t.resolveInitialHash || t.resolveInitialHash;
            this._pushState = "boolean" != typeof t.pushState || t.pushState, this._hashChange = t.hashChange || !1, this._setUpdateVars(e), t.autoStart && this.start()
        }
        var a = o.prototype = n(s.prototype);
        a._isRoot = function(t) {
            return ("/" + t + "/").replace(this.rootStripper, "/") === this.root
        }, a._isPushStateSupported = function() {
            return this.history && this.history.pushState
        }, a._isHashChangeSupported = function() {
            return "onhashchange" in window
        }, a._setUpdateVars = function(t) {
            if (this._pushState && this._isPushStateSupported()) t && this._hashChange && -1 !== window.location.href.indexOf("#") && this.history.pushState({}, document.title, window.location.href.replace("#", "")), this._hashChange = !1;
            else {
                if (t && this._pushState && this._hashChange && window.location.href.indexOf("#") < 0) {
                    window.location.origin || (window.location.origin = window.location.protocol + "//" + window.location.hostname, window.location.origin += window.location.port ? ":" + window.location.port : "");
                    var e = window.location.href.substr(window.location.origin.length + this.root.length);
                    if (e.length) return void(window.location = window.location.origin + this.root + "#" + e)
                }
                this._hashChange && !this._isHashChangeSupported() && (this._interval = 50, this._iframe = document.createElement('<iframe src="javascript:0" tabindex="-1" style="display:none;">'), this._iframe = document.body.appendChild(this._iframe).contentWindow, this._iframe.document.open().close()), this._pushState = !1
            }
        }, a._checkUrl = function() {
            var t = this._iframe.location.hash.substr(1);
            0 === t.length && (t = "/"), this.fragment() !== t && (window.location.hash = "#" + t, this._ignoreHashChange = !1, this._handleHashChange())
        }, a._handlePopState = function(t) {
            this.trigger("popstate", {
                fragment: this.fragment()
            })
        }, a._handleHashChange = function(t) {
            this._ignoreHashChange ? this._ignoreHashChange = !1 : this.trigger("popstate", {
                fragment: this.fragment()
            })
        }, a.canUpdate = function() {
            return this._pushState || this._hashChange
        }, a.start = function() {
            return this.started || !this._pushState && !this._hashChange || (this.started = !0, this._pushState ? (this._handlePopState = this._handlePopState.bind(this), r.addEventListener(window, "popstate", this._handlePopState)) : this._hashChange && (this._isHashChangeSupported() ? (this._handleHashChange = this._handleHashChange.bind(this), r.addEventListener(window, "hashchange", this._handleHashChange)) : (this._iframe.location.hash = this.fragment(), this._checkUrl = this._checkUrl.bind(this), this._checkUrlInterval = setInterval(this._checkUrl, this._interval)))), this.started || !1
        }, a.stop = function() {
            this.started && (this.started = !1, this._pushState ? r.removeEventListener(window, "popstate", this._handlePopState) : this._hashChange && (this._isHashChangeSupported() ? r.removeEventListener(window, "hashchange", this._handleHashChange) : this._checkUrlInterval && (clearInterval(this._checkUrlInterval), this._checkUrlInterval = null)))
        }, a.navigate = function(t, e) {
            if (!this.started || !this.canUpdate()) return !1;
            e = e || {};
            var i = ((this._isRoot(t) ? "" : this.root) + t).replace(/([^:])(\/\/)/g, "$1/");
            return this._pushState ? this.history.pushState(e, document.title, i) : this._hashChange && (this._ignoreHashChange = !0, window.location.hash = "#" + t, this._isHashChangeSupported() || (this._iframe.document.open().close(), this._iframe.location.hash = "#" + t)), !0
        }, a.fragment = function() {
            var t = "";
            return this._pushState ? t = window.location.pathname.substr(this.root.length) : this._hashChange && (t = window.location.hash.substr(1)), "" === t ? "/" : t
        }, e.exports = o
    }, {
        "@marcom/ac-dom-events": 22,
        "@marcom/ac-event-emitter": 53,
        "@marcom/ac-object": 74
    }],
    98: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-object").create,
            r = t("@marcom/ac-dom-emitter").DOMEmitter,
            s = t("./History"),
            o = (t("@marcom/ac-routes").Route, t("@marcom/ac-routes").Routes);

        function a(t) {
            t = t || {}, this._intercept = t.intercept || "[data-route]", this._interceptAttribute = t.attribute || "href", this._handleTrigger = this._handleTrigger.bind(this), this.intercept(this._intercept), this.history = t.history || new s({
                root: t.root,
                autoStart: t.autoStart,
                pushState: t.pushState,
                hashChange: t.hashChange,
                resolveInitialHash: t.resolveInitialHash
            }), o.call(this, t.routes), t.autoStart && (this.history.started || this.history.start(), this.start())
        }
        var c = a.prototype = n(o.prototype);
        c._handleTrigger = function(t) {
            if (this.started) {
                var e = t.target.getAttribute(this._interceptAttribute);
                e && (/^(http|https):\/\/+/.exec(e) && "href" === this._interceptAttribute && (e = e.substr(e.indexOf(this.history.root) + this.history.root.length) || "/"), this.navigate(e) && t.preventDefault())
            }
        }, c._handlePopstate = function(t) {
            this.navigate(t.fragment, !0)
        }, c.start = function() {
            this.started || (this.started = !0, this.history.start(), this._handlePopstate = this._handlePopstate.bind(this), this.history.on("popstate", this._handlePopstate), this.navigate(this.history.fragment(), !0))
        }, c.stop = function() {
            this.started && (this.started = !1, this.history.stop(), this.history.off("popstate", this._handlePopstate))
        }, c.navigate = function(t, e) {
            return this.history.fragment() !== t || e ? !(t && !e && !this.history.navigate(t)) && (this.match(t), !0) : this.history.canUpdate()
        }, c.intercept = function(t, e) {
            new r(e || document.body).on("click", t, this._handleTrigger)
        }, e.exports = a
    }, {
        "./History": 97,
        "@marcom/ac-dom-emitter": 17,
        "@marcom/ac-object": 74,
        "@marcom/ac-routes": 99
    }],
    99: [function(t, e, i) {
        "use strict";
        e.exports = {
            Routes: t("./ac-routes/Routes"),
            Route: t("./ac-routes/Route")
        }
    }, {
        "./ac-routes/Route": 100,
        "./ac-routes/Routes": 101
    }],
    100: [function(t, e, i) {
        "use strict";

        function n(t, e, i, n, r) {
            if (this.path = t, this.callback = e, this.context = i, this.greedy = n || !1, this.priority = r || 0, "number" != typeof this.priority) throw new Error("Priority must be a Number.");
            this.identifierPattern = "([a-zA-Z0-9\\-\\_]+)", this.tokensRe = new RegExp(":" + this.identifierPattern, "g"), this.matcher = this._createRouteMatcher(t)
        }
        var r = n.prototype;
        r._createRouteMatcher = function(t) {
            if (t && t.exec) return {
                pattern: t
            };
            if ("/" === t) return {
                pattern: /^\/$/
            };
            if ("string" != typeof t) throw new Error("path must be either a string or regex");
            var e = this._extractRouteTokens(t),
                i = t.replace(this.tokensRe, this.identifierPattern);
            return {
                pattern: new RegExp(i, "g"),
                routeTokens: e
            }
        }, r._extractRouteTokens = function(t) {
            var e = t.replace(this.tokensRe, ":" + this.identifierPattern),
                i = new RegExp(e, "g").exec(t);
            return i = i && i.length > 1 ? i.slice(1) : null
        }, r.match = function(t) {
            this.matcher.pattern.lastIndex = 0;
            var e = this.matcher.pattern.exec(t);
            if (e) {
                var i = e.length ? e.slice(1) : [],
                    n = this.callback;
                if (n && "function" == typeof n) return n.apply(this.context || this, i), !0
            }
            return !1
        }, e.exports = n
    }, {}],
    101: [function(t, e, i) {
        "use strict";
        var n = t("./Route");

        function r(t) {
            this._routes = {}, t && this.addRoutes(t)
        }
        var s = r.prototype;
        s._getIndex = function(t, e, i) {
            if (void 0 !== this._routes[t])
                for (var n = this._routes[t].length; --n > -1;)
                    if (this._routes[t][n].callback === e && this._routes[t][n].context === i) return n;
            return -1
        }, s.match = function(t) {
            var e, i;
            for (e in this._routes)
                for (i = this._routes[e].length; --i > -1 && (!this._routes[e][i].match(t) || !this._routes[e][i].greedy););
        }, s.add = function(t) {
            if (void 0 === this._routes[t.path]) this._routes[t.path] = [t];
            else if (!this.get(t.path, t.callback, t.context)) {
                var e, i = this._routes[t.path].length;
                if (i > 0)
                    for (e = 0; e < i; ++e)
                        if (this._routes[t.path][e].priority > t.priority) return this._routes[t.path].splice(e, 0, t), t;
                this._routes[t.path].push(t)
            }
            return t
        }, s.remove = function(t) {
            var e = this._getIndex(t.path, t.callback, t.context);
            return e > -1 && (this._routes[t.path].splice(e, 1), t)
        }, s.get = function(t, e, i) {
            var n = this._getIndex(t, e, i);
            return n > -1 && this._routes[t][n]
        }, s.createRoute = function(t, e, i, r, s) {
            var o = new n(t, e, i, r, s);
            return this.add(o), o
        }, s.addRoutes = function(t) {
            if (!(t instanceof Array)) throw new Error("routes must be an Array.");
            var e, i, n = t.length;
            for (e = 0; e < n; ++e)(i = t[e]) && "object" == typeof i && this.add(i)
        }, s.removeRoutes = function(t) {
            if (!(t instanceof Array)) throw new Error("routes must be an Array.");
            var e, i, n = t.length;
            for (e = 0; e < n; ++e)(i = t[e]) && "object" == typeof i && this.remove(i)
        }, s.getRoutes = function(t) {
            return void 0 === this._routes[t] ? [] : this._routes[t]
        }, e.exports = r
    }, {
        "./Route": 100
    }],
    102: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e) {
            var i = "";
            if (t) {
                var n = Object.keys(t),
                    r = n.length - 1;
                n.forEach(function(e, n) {
                    var s = t[e],
                        o = (e = e.trim()) + (s = null === (s = s && "string" == typeof s ? s.trim() : s) ? "" : "=" + s) + (n === r ? "" : "&");
                    i = i ? i.concat(o) : o
                })
            }
            return i && !1 !== e ? "?" + i : i
        }
    }, {}],
    103: [function(t, e, i) {
        "use strict";
        var n = {
            ua: window.navigator.userAgent,
            platform: window.navigator.platform,
            vendor: window.navigator.vendor
        };
        e.exports = t("./parseUserAgent")(n)
    }, {
        "./parseUserAgent": 106
    }],
    104: [function(t, e, i) {
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
    105: [function(t, e, i) {
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
    106: [function(t, e, i) {
        "use strict";
        var n = t("./defaults"),
            r = t("./dictionary");

        function s(t, e) {
            if ("function" == typeof t.parseVersion) return t.parseVersion(e);
            var i, n = t.version || t.userAgent;
            "string" == typeof n && (n = [n]);
            for (var r, s = n.length, o = 0; o < s; o++)
                if ((r = e.match((i = n[o], new RegExp(i + "[a-zA-Z\\s/:]+([0-9_.]+)", "i")))) && r.length > 1) return r[1].replace(/_/g, ".")
        }

        function o(t, e, i) {
            for (var n, r, o = t.length, a = 0; a < o; a++)
                if ("function" == typeof t[a].test ? !0 === t[a].test(i) && (n = t[a].name) : i.ua.indexOf(t[a].userAgent) > -1 && (n = t[a].name), n) {
                    if (e[n] = !0, "string" == typeof(r = s(t[a], i.ua))) {
                        var c = r.split(".");
                        e.version.name = r, c && c.length > 0 && (e.version.major = parseInt(c[0] || 0), e.version.minor = parseInt(c[1] || 0), e.version.patch = parseInt(c[2] || 0))
                    } else "edge" === n && (e.version.name = "12.0.0", e.version.major = "12", e.version.minor = "0", e.version.patch = "0");
                    return "function" == typeof t[a].parseDocumentMode && (e.version.documentMode = t[a].parseDocumentMode()), e
                }
            return e
        }
        e.exports = function(t) {
            var e = {};
            return e.browser = o(r.browser, n.browser, t), e.os = o(r.os, n.os, t), e
        }
    }, {
        "./defaults": 104,
        "./dictionary": 105
    }],
    107: [function(t, e, i) {
        arguments[4][53][0].apply(i, arguments)
    }, {
        "./ac-event-emitter/EventEmitter": 108,
        dup: 53
    }],
    108: [function(t, e, i) {
        arguments[4][54][0].apply(i, arguments)
    }, {
        dup: 54
    }],
    109: [function(t, e, i) {
        "use strict";
        i.byteLength = function(t) {
            var e = l(t),
                i = e[0],
                n = e[1];
            return 3 * (i + n) / 4 - n
        }, i.toByteArray = function(t) {
            for (var e, i = l(t), n = i[0], o = i[1], a = new s(function(t, e, i) {
                    return 3 * (e + i) / 4 - i
                }(0, n, o)), c = 0, h = o > 0 ? n - 4 : n, u = 0; u < h; u += 4) e = r[t.charCodeAt(u)] << 18 | r[t.charCodeAt(u + 1)] << 12 | r[t.charCodeAt(u + 2)] << 6 | r[t.charCodeAt(u + 3)], a[c++] = e >> 16 & 255, a[c++] = e >> 8 & 255, a[c++] = 255 & e;
            2 === o && (e = r[t.charCodeAt(u)] << 2 | r[t.charCodeAt(u + 1)] >> 4, a[c++] = 255 & e);
            1 === o && (e = r[t.charCodeAt(u)] << 10 | r[t.charCodeAt(u + 1)] << 4 | r[t.charCodeAt(u + 2)] >> 2, a[c++] = e >> 8 & 255, a[c++] = 255 & e);
            return a
        }, i.fromByteArray = function(t) {
            for (var e, i = t.length, r = i % 3, s = [], o = 0, a = i - r; o < a; o += 16383) s.push(h(t, o, o + 16383 > a ? a : o + 16383));
            1 === r ? (e = t[i - 1], s.push(n[e >> 2] + n[e << 4 & 63] + "==")) : 2 === r && (e = (t[i - 2] << 8) + t[i - 1], s.push(n[e >> 10] + n[e >> 4 & 63] + n[e << 2 & 63] + "="));
            return s.join("")
        };
        for (var n = [], r = [], s = "undefined" != typeof Uint8Array ? Uint8Array : Array, o = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/", a = 0, c = o.length; a < c; ++a) n[a] = o[a], r[o.charCodeAt(a)] = a;

        function l(t) {
            var e = t.length;
            if (e % 4 > 0) throw new Error("Invalid string. Length must be a multiple of 4");
            var i = t.indexOf("=");
            return -1 === i && (i = e), [i, i === e ? 0 : 4 - i % 4]
        }

        function h(t, e, i) {
            for (var r, s, o = [], a = e; a < i; a += 3) r = (t[a] << 16 & 16711680) + (t[a + 1] << 8 & 65280) + (255 & t[a + 2]), o.push(n[(s = r) >> 18 & 63] + n[s >> 12 & 63] + n[s >> 6 & 63] + n[63 & s]);
            return o.join("")
        }
        r["-".charCodeAt(0)] = 62, r["_".charCodeAt(0)] = 63
    }, {}],
    110: [function(t, e, i) {
        "use strict";
        var n = t("base64-js"),
            r = t("ieee754");
        i.Buffer = a, i.SlowBuffer = function(t) {
            +t != t && (t = 0);
            return a.alloc(+t)
        }, i.INSPECT_MAX_BYTES = 50;
        var s = 2147483647;

        function o(t) {
            if (t > s) throw new RangeError("Invalid typed array length");
            var e = new Uint8Array(t);
            return e.__proto__ = a.prototype, e
        }

        function a(t, e, i) {
            if ("number" == typeof t) {
                if ("string" == typeof e) throw new Error("If encoding is specified then the first argument must be a string");
                return h(t)
            }
            return c(t, e, i)
        }

        function c(t, e, i) {
            if ("number" == typeof t) throw new TypeError('"value" argument must not be a number');
            return B(t) || t && B(t.buffer) ? function(t, e, i) {
                if (e < 0 || t.byteLength < e) throw new RangeError('"offset" is outside of buffer bounds');
                if (t.byteLength < e + (i || 0)) throw new RangeError('"length" is outside of buffer bounds');
                var n;
                n = void 0 === e && void 0 === i ? new Uint8Array(t) : void 0 === i ? new Uint8Array(t, e) : new Uint8Array(t, e, i);
                return n.__proto__ = a.prototype, n
            }(t, e, i) : "string" == typeof t ? function(t, e) {
                "string" == typeof e && "" !== e || (e = "utf8");
                if (!a.isEncoding(e)) throw new TypeError("Unknown encoding: " + e);
                var i = 0 | p(t, e),
                    n = o(i),
                    r = n.write(t, e);
                r !== i && (n = n.slice(0, r));
                return n
            }(t, e) : function(t) {
                if (a.isBuffer(t)) {
                    var e = 0 | d(t.length),
                        i = o(e);
                    return 0 === i.length ? i : (t.copy(i, 0, 0, e), i)
                }
                if (t) {
                    if (ArrayBuffer.isView(t) || "length" in t) return "number" != typeof t.length || U(t.length) ? o(0) : u(t);
                    if ("Buffer" === t.type && Array.isArray(t.data)) return u(t.data)
                }
                throw new TypeError("The first argument must be one of type string, Buffer, ArrayBuffer, Array, or Array-like Object.")
            }(t)
        }

        function l(t) {
            if ("number" != typeof t) throw new TypeError('"size" argument must be of type number');
            if (t < 0) throw new RangeError('"size" argument must not be negative')
        }

        function h(t) {
            return l(t), o(t < 0 ? 0 : 0 | d(t))
        }

        function u(t) {
            for (var e = t.length < 0 ? 0 : 0 | d(t.length), i = o(e), n = 0; n < e; n += 1) i[n] = 255 & t[n];
            return i
        }

        function d(t) {
            if (t >= s) throw new RangeError("Attempt to allocate Buffer larger than maximum size: 0x" + s.toString(16) + " bytes");
            return 0 | t
        }

        function p(t, e) {
            if (a.isBuffer(t)) return t.length;
            if (ArrayBuffer.isView(t) || B(t)) return t.byteLength;
            "string" != typeof t && (t = "" + t);
            var i = t.length;
            if (0 === i) return 0;
            for (var n = !1;;) switch (e) {
                case "ascii":
                case "latin1":
                case "binary":
                    return i;
                case "utf8":
                case "utf-8":
                case void 0:
                    return N(t).length;
                case "ucs2":
                case "ucs-2":
                case "utf16le":
                case "utf-16le":
                    return 2 * i;
                case "hex":
                    return i >>> 1;
                case "base64":
                    return j(t).length;
                default:
                    if (n) return N(t).length;
                    e = ("" + e).toLowerCase(), n = !0
            }
        }

        function f(t, e, i) {
            var n = t[e];
            t[e] = t[i], t[i] = n
        }

        function m(t, e, i, n, r) {
            if (0 === t.length) return -1;
            if ("string" == typeof i ? (n = i, i = 0) : i > 2147483647 ? i = 2147483647 : i < -2147483648 && (i = -2147483648), U(i = +i) && (i = r ? 0 : t.length - 1), i < 0 && (i = t.length + i), i >= t.length) {
                if (r) return -1;
                i = t.length - 1
            } else if (i < 0) {
                if (!r) return -1;
                i = 0
            }
            if ("string" == typeof e && (e = a.from(e, n)), a.isBuffer(e)) return 0 === e.length ? -1 : _(t, e, i, n, r);
            if ("number" == typeof e) return e &= 255, "function" == typeof Uint8Array.prototype.indexOf ? r ? Uint8Array.prototype.indexOf.call(t, e, i) : Uint8Array.prototype.lastIndexOf.call(t, e, i) : _(t, [e], i, n, r);
            throw new TypeError("val must be string, number or Buffer")
        }

        function _(t, e, i, n, r) {
            var s, o = 1,
                a = t.length,
                c = e.length;
            if (void 0 !== n && ("ucs2" === (n = String(n).toLowerCase()) || "ucs-2" === n || "utf16le" === n || "utf-16le" === n)) {
                if (t.length < 2 || e.length < 2) return -1;
                o = 2, a /= 2, c /= 2, i /= 2
            }

            function l(t, e) {
                return 1 === o ? t[e] : t.readUInt16BE(e * o)
            }
            if (r) {
                var h = -1;
                for (s = i; s < a; s++)
                    if (l(t, s) === l(e, -1 === h ? 0 : s - h)) {
                        if (-1 === h && (h = s), s - h + 1 === c) return h * o
                    } else -1 !== h && (s -= s - h), h = -1
            } else
                for (i + c > a && (i = a - c), s = i; s >= 0; s--) {
                    for (var u = !0, d = 0; d < c; d++)
                        if (l(t, s + d) !== l(e, d)) {
                            u = !1;
                            break
                        }
                    if (u) return s
                }
            return -1
        }

        function v(t, e, i, n) {
            i = Number(i) || 0;
            var r = t.length - i;
            n ? (n = Number(n)) > r && (n = r) : n = r;
            var s = e.length;
            n > s / 2 && (n = s / 2);
            for (var o = 0; o < n; ++o) {
                var a = parseInt(e.substr(2 * o, 2), 16);
                if (U(a)) return o;
                t[i + o] = a
            }
            return o
        }

        function g(t, e, i, n) {
            return V(N(e, t.length - i), t, i, n)
        }

        function y(t, e, i, n) {
            return V(function(t) {
                for (var e = [], i = 0; i < t.length; ++i) e.push(255 & t.charCodeAt(i));
                return e
            }(e), t, i, n)
        }

        function b(t, e, i, n) {
            return y(t, e, i, n)
        }

        function E(t, e, i, n) {
            return V(j(e), t, i, n)
        }

        function w(t, e, i, n) {
            return V(function(t, e) {
                for (var i, n, r, s = [], o = 0; o < t.length && !((e -= 2) < 0); ++o) i = t.charCodeAt(o), n = i >> 8, r = i % 256, s.push(r), s.push(n);
                return s
            }(e, t.length - i), t, i, n)
        }

        function x(t, e, i) {
            return 0 === e && i === t.length ? n.fromByteArray(t) : n.fromByteArray(t.slice(e, i))
        }

        function C(t, e, i) {
            i = Math.min(t.length, i);
            for (var n = [], r = e; r < i;) {
                var s, o, a, c, l = t[r],
                    h = null,
                    u = l > 239 ? 4 : l > 223 ? 3 : l > 191 ? 2 : 1;
                if (r + u <= i) switch (u) {
                    case 1:
                        l < 128 && (h = l);
                        break;
                    case 2:
                        128 == (192 & (s = t[r + 1])) && (c = (31 & l) << 6 | 63 & s) > 127 && (h = c);
                        break;
                    case 3:
                        s = t[r + 1], o = t[r + 2], 128 == (192 & s) && 128 == (192 & o) && (c = (15 & l) << 12 | (63 & s) << 6 | 63 & o) > 2047 && (c < 55296 || c > 57343) && (h = c);
                        break;
                    case 4:
                        s = t[r + 1], o = t[r + 2], a = t[r + 3], 128 == (192 & s) && 128 == (192 & o) && 128 == (192 & a) && (c = (15 & l) << 18 | (63 & s) << 12 | (63 & o) << 6 | 63 & a) > 65535 && c < 1114112 && (h = c)
                }
                null === h ? (h = 65533, u = 1) : h > 65535 && (h -= 65536, n.push(h >>> 10 & 1023 | 55296), h = 56320 | 1023 & h), n.push(h), r += u
            }
            return function(t) {
                var e = t.length;
                if (e <= S) return String.fromCharCode.apply(String, t);
                var i = "",
                    n = 0;
                for (; n < e;) i += String.fromCharCode.apply(String, t.slice(n, n += S));
                return i
            }(n)
        }
        i.kMaxLength = s, a.TYPED_ARRAY_SUPPORT = function() {
            try {
                var t = new Uint8Array(1);
                return t.__proto__ = {
                    __proto__: Uint8Array.prototype,
                    foo: function() {
                        return 42
                    }
                }, 42 === t.foo()
            } catch (t) {
                return !1
            }
        }(), a.TYPED_ARRAY_SUPPORT || "undefined" == typeof console || "function" != typeof console.error || console.error("This browser lacks typed array (Uint8Array) support which is required by `buffer` v5.x. Use `buffer` v4.x if you require old browser support."), Object.defineProperty(a.prototype, "parent", {
            get: function() {
                if (this instanceof a) return this.buffer
            }
        }), Object.defineProperty(a.prototype, "offset", {
            get: function() {
                if (this instanceof a) return this.byteOffset
            }
        }), "undefined" != typeof Symbol && Symbol.species && a[Symbol.species] === a && Object.defineProperty(a, Symbol.species, {
            value: null,
            configurable: !0,
            enumerable: !1,
            writable: !1
        }), a.poolSize = 8192, a.from = function(t, e, i) {
            return c(t, e, i)
        }, a.prototype.__proto__ = Uint8Array.prototype, a.__proto__ = Uint8Array, a.alloc = function(t, e, i) {
            return function(t, e, i) {
                return l(t), t <= 0 ? o(t) : void 0 !== e ? "string" == typeof i ? o(t).fill(e, i) : o(t).fill(e) : o(t)
            }(t, e, i)
        }, a.allocUnsafe = function(t) {
            return h(t)
        }, a.allocUnsafeSlow = function(t) {
            return h(t)
        }, a.isBuffer = function(t) {
            return null != t && !0 === t._isBuffer
        }, a.compare = function(t, e) {
            if (!a.isBuffer(t) || !a.isBuffer(e)) throw new TypeError("Arguments must be Buffers");
            if (t === e) return 0;
            for (var i = t.length, n = e.length, r = 0, s = Math.min(i, n); r < s; ++r)
                if (t[r] !== e[r]) {
                    i = t[r], n = e[r];
                    break
                }
            return i < n ? -1 : n < i ? 1 : 0
        }, a.isEncoding = function(t) {
            switch (String(t).toLowerCase()) {
                case "hex":
                case "utf8":
                case "utf-8":
                case "ascii":
                case "latin1":
                case "binary":
                case "base64":
                case "ucs2":
                case "ucs-2":
                case "utf16le":
                case "utf-16le":
                    return !0;
                default:
                    return !1
            }
        }, a.concat = function(t, e) {
            if (!Array.isArray(t)) throw new TypeError('"list" argument must be an Array of Buffers');
            if (0 === t.length) return a.alloc(0);
            var i;
            if (void 0 === e)
                for (e = 0, i = 0; i < t.length; ++i) e += t[i].length;
            var n = a.allocUnsafe(e),
                r = 0;
            for (i = 0; i < t.length; ++i) {
                var s = t[i];
                if (ArrayBuffer.isView(s) && (s = a.from(s)), !a.isBuffer(s)) throw new TypeError('"list" argument must be an Array of Buffers');
                s.copy(n, r), r += s.length
            }
            return n
        }, a.byteLength = p, a.prototype._isBuffer = !0, a.prototype.swap16 = function() {
            var t = this.length;
            if (t % 2 != 0) throw new RangeError("Buffer size must be a multiple of 16-bits");
            for (var e = 0; e < t; e += 2) f(this, e, e + 1);
            return this
        }, a.prototype.swap32 = function() {
            var t = this.length;
            if (t % 4 != 0) throw new RangeError("Buffer size must be a multiple of 32-bits");
            for (var e = 0; e < t; e += 4) f(this, e, e + 3), f(this, e + 1, e + 2);
            return this
        }, a.prototype.swap64 = function() {
            var t = this.length;
            if (t % 8 != 0) throw new RangeError("Buffer size must be a multiple of 64-bits");
            for (var e = 0; e < t; e += 8) f(this, e, e + 7), f(this, e + 1, e + 6), f(this, e + 2, e + 5), f(this, e + 3, e + 4);
            return this
        }, a.prototype.toString = function() {
            var t = this.length;
            return 0 === t ? "" : 0 === arguments.length ? C(this, 0, t) : function(t, e, i) {
                var n = !1;
                if ((void 0 === e || e < 0) && (e = 0), e > this.length) return "";
                if ((void 0 === i || i > this.length) && (i = this.length), i <= 0) return "";
                if ((i >>>= 0) <= (e >>>= 0)) return "";
                for (t || (t = "utf8");;) switch (t) {
                    case "hex":
                        return A(this, e, i);
                    case "utf8":
                    case "utf-8":
                        return C(this, e, i);
                    case "ascii":
                        return T(this, e, i);
                    case "latin1":
                    case "binary":
                        return k(this, e, i);
                    case "base64":
                        return x(this, e, i);
                    case "ucs2":
                    case "ucs-2":
                    case "utf16le":
                    case "utf-16le":
                        return L(this, e, i);
                    default:
                        if (n) throw new TypeError("Unknown encoding: " + t);
                        t = (t + "").toLowerCase(), n = !0
                }
            }.apply(this, arguments)
        }, a.prototype.toLocaleString = a.prototype.toString, a.prototype.equals = function(t) {
            if (!a.isBuffer(t)) throw new TypeError("Argument must be a Buffer");
            return this === t || 0 === a.compare(this, t)
        }, a.prototype.inspect = function() {
            var t = "",
                e = i.INSPECT_MAX_BYTES;
            return this.length > 0 && (t = this.toString("hex", 0, e).match(/.{2}/g).join(" "), this.length > e && (t += " ... ")), "<Buffer " + t + ">"
        }, a.prototype.compare = function(t, e, i, n, r) {
            if (!a.isBuffer(t)) throw new TypeError("Argument must be a Buffer");
            if (void 0 === e && (e = 0), void 0 === i && (i = t ? t.length : 0), void 0 === n && (n = 0), void 0 === r && (r = this.length), e < 0 || i > t.length || n < 0 || r > this.length) throw new RangeError("out of range index");
            if (n >= r && e >= i) return 0;
            if (n >= r) return -1;
            if (e >= i) return 1;
            if (e >>>= 0, i >>>= 0, n >>>= 0, r >>>= 0, this === t) return 0;
            for (var s = r - n, o = i - e, c = Math.min(s, o), l = this.slice(n, r), h = t.slice(e, i), u = 0; u < c; ++u)
                if (l[u] !== h[u]) {
                    s = l[u], o = h[u];
                    break
                }
            return s < o ? -1 : o < s ? 1 : 0
        }, a.prototype.includes = function(t, e, i) {
            return -1 !== this.indexOf(t, e, i)
        }, a.prototype.indexOf = function(t, e, i) {
            return m(this, t, e, i, !0)
        }, a.prototype.lastIndexOf = function(t, e, i) {
            return m(this, t, e, i, !1)
        }, a.prototype.write = function(t, e, i, n) {
            if (void 0 === e) n = "utf8", i = this.length, e = 0;
            else if (void 0 === i && "string" == typeof e) n = e, i = this.length, e = 0;
            else {
                if (!isFinite(e)) throw new Error("Buffer.write(string, encoding, offset[, length]) is no longer supported");
                e >>>= 0, isFinite(i) ? (i >>>= 0, void 0 === n && (n = "utf8")) : (n = i, i = void 0)
            }
            var r = this.length - e;
            if ((void 0 === i || i > r) && (i = r), t.length > 0 && (i < 0 || e < 0) || e > this.length) throw new RangeError("Attempt to write outside buffer bounds");
            n || (n = "utf8");
            for (var s = !1;;) switch (n) {
                case "hex":
                    return v(this, t, e, i);
                case "utf8":
                case "utf-8":
                    return g(this, t, e, i);
                case "ascii":
                    return y(this, t, e, i);
                case "latin1":
                case "binary":
                    return b(this, t, e, i);
                case "base64":
                    return E(this, t, e, i);
                case "ucs2":
                case "ucs-2":
                case "utf16le":
                case "utf-16le":
                    return w(this, t, e, i);
                default:
                    if (s) throw new TypeError("Unknown encoding: " + n);
                    n = ("" + n).toLowerCase(), s = !0
            }
        }, a.prototype.toJSON = function() {
            return {
                type: "Buffer",
                data: Array.prototype.slice.call(this._arr || this, 0)
            }
        };
        var S = 4096;

        function T(t, e, i) {
            var n = "";
            i = Math.min(t.length, i);
            for (var r = e; r < i; ++r) n += String.fromCharCode(127 & t[r]);
            return n
        }

        function k(t, e, i) {
            var n = "";
            i = Math.min(t.length, i);
            for (var r = e; r < i; ++r) n += String.fromCharCode(t[r]);
            return n
        }

        function A(t, e, i) {
            var n = t.length;
            (!e || e < 0) && (e = 0), (!i || i < 0 || i > n) && (i = n);
            for (var r = "", s = e; s < i; ++s) r += R(t[s]);
            return r
        }

        function L(t, e, i) {
            for (var n = t.slice(e, i), r = "", s = 0; s < n.length; s += 2) r += String.fromCharCode(n[s] + 256 * n[s + 1]);
            return r
        }

        function P(t, e, i) {
            if (t % 1 != 0 || t < 0) throw new RangeError("offset is not uint");
            if (t + e > i) throw new RangeError("Trying to access beyond buffer length")
        }

        function D(t, e, i, n, r, s) {
            if (!a.isBuffer(t)) throw new TypeError('"buffer" argument must be a Buffer instance');
            if (e > r || e < s) throw new RangeError('"value" argument is out of bounds');
            if (i + n > t.length) throw new RangeError("Index out of range")
        }

        function O(t, e, i, n, r, s) {
            if (i + n > t.length) throw new RangeError("Index out of range");
            if (i < 0) throw new RangeError("Index out of range")
        }

        function M(t, e, i, n, s) {
            return e = +e, i >>>= 0, s || O(t, 0, i, 4), r.write(t, e, i, n, 23, 4), i + 4
        }

        function I(t, e, i, n, s) {
            return e = +e, i >>>= 0, s || O(t, 0, i, 8), r.write(t, e, i, n, 52, 8), i + 8
        }
        a.prototype.slice = function(t, e) {
            var i = this.length;
            t = ~~t, e = void 0 === e ? i : ~~e, t < 0 ? (t += i) < 0 && (t = 0) : t > i && (t = i), e < 0 ? (e += i) < 0 && (e = 0) : e > i && (e = i), e < t && (e = t);
            var n = this.subarray(t, e);
            return n.__proto__ = a.prototype, n
        }, a.prototype.readUIntLE = function(t, e, i) {
            t >>>= 0, e >>>= 0, i || P(t, e, this.length);
            for (var n = this[t], r = 1, s = 0; ++s < e && (r *= 256);) n += this[t + s] * r;
            return n
        }, a.prototype.readUIntBE = function(t, e, i) {
            t >>>= 0, e >>>= 0, i || P(t, e, this.length);
            for (var n = this[t + --e], r = 1; e > 0 && (r *= 256);) n += this[t + --e] * r;
            return n
        }, a.prototype.readUInt8 = function(t, e) {
            return t >>>= 0, e || P(t, 1, this.length), this[t]
        }, a.prototype.readUInt16LE = function(t, e) {
            return t >>>= 0, e || P(t, 2, this.length), this[t] | this[t + 1] << 8
        }, a.prototype.readUInt16BE = function(t, e) {
            return t >>>= 0, e || P(t, 2, this.length), this[t] << 8 | this[t + 1]
        }, a.prototype.readUInt32LE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), (this[t] | this[t + 1] << 8 | this[t + 2] << 16) + 16777216 * this[t + 3]
        }, a.prototype.readUInt32BE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), 16777216 * this[t] + (this[t + 1] << 16 | this[t + 2] << 8 | this[t + 3])
        }, a.prototype.readIntLE = function(t, e, i) {
            t >>>= 0, e >>>= 0, i || P(t, e, this.length);
            for (var n = this[t], r = 1, s = 0; ++s < e && (r *= 256);) n += this[t + s] * r;
            return n >= (r *= 128) && (n -= Math.pow(2, 8 * e)), n
        }, a.prototype.readIntBE = function(t, e, i) {
            t >>>= 0, e >>>= 0, i || P(t, e, this.length);
            for (var n = e, r = 1, s = this[t + --n]; n > 0 && (r *= 256);) s += this[t + --n] * r;
            return s >= (r *= 128) && (s -= Math.pow(2, 8 * e)), s
        }, a.prototype.readInt8 = function(t, e) {
            return t >>>= 0, e || P(t, 1, this.length), 128 & this[t] ? -1 * (255 - this[t] + 1) : this[t]
        }, a.prototype.readInt16LE = function(t, e) {
            t >>>= 0, e || P(t, 2, this.length);
            var i = this[t] | this[t + 1] << 8;
            return 32768 & i ? 4294901760 | i : i
        }, a.prototype.readInt16BE = function(t, e) {
            t >>>= 0, e || P(t, 2, this.length);
            var i = this[t + 1] | this[t] << 8;
            return 32768 & i ? 4294901760 | i : i
        }, a.prototype.readInt32LE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), this[t] | this[t + 1] << 8 | this[t + 2] << 16 | this[t + 3] << 24
        }, a.prototype.readInt32BE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), this[t] << 24 | this[t + 1] << 16 | this[t + 2] << 8 | this[t + 3]
        }, a.prototype.readFloatLE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), r.read(this, t, !0, 23, 4)
        }, a.prototype.readFloatBE = function(t, e) {
            return t >>>= 0, e || P(t, 4, this.length), r.read(this, t, !1, 23, 4)
        }, a.prototype.readDoubleLE = function(t, e) {
            return t >>>= 0, e || P(t, 8, this.length), r.read(this, t, !0, 52, 8)
        }, a.prototype.readDoubleBE = function(t, e) {
            return t >>>= 0, e || P(t, 8, this.length), r.read(this, t, !1, 52, 8)
        }, a.prototype.writeUIntLE = function(t, e, i, n) {
            (t = +t, e >>>= 0, i >>>= 0, n) || D(this, t, e, i, Math.pow(2, 8 * i) - 1, 0);
            var r = 1,
                s = 0;
            for (this[e] = 255 & t; ++s < i && (r *= 256);) this[e + s] = t / r & 255;
            return e + i
        }, a.prototype.writeUIntBE = function(t, e, i, n) {
            (t = +t, e >>>= 0, i >>>= 0, n) || D(this, t, e, i, Math.pow(2, 8 * i) - 1, 0);
            var r = i - 1,
                s = 1;
            for (this[e + r] = 255 & t; --r >= 0 && (s *= 256);) this[e + r] = t / s & 255;
            return e + i
        }, a.prototype.writeUInt8 = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 1, 255, 0), this[e] = 255 & t, e + 1
        }, a.prototype.writeUInt16LE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 2, 65535, 0), this[e] = 255 & t, this[e + 1] = t >>> 8, e + 2
        }, a.prototype.writeUInt16BE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 2, 65535, 0), this[e] = t >>> 8, this[e + 1] = 255 & t, e + 2
        }, a.prototype.writeUInt32LE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 4, 4294967295, 0), this[e + 3] = t >>> 24, this[e + 2] = t >>> 16, this[e + 1] = t >>> 8, this[e] = 255 & t, e + 4
        }, a.prototype.writeUInt32BE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 4, 4294967295, 0), this[e] = t >>> 24, this[e + 1] = t >>> 16, this[e + 2] = t >>> 8, this[e + 3] = 255 & t, e + 4
        }, a.prototype.writeIntLE = function(t, e, i, n) {
            if (t = +t, e >>>= 0, !n) {
                var r = Math.pow(2, 8 * i - 1);
                D(this, t, e, i, r - 1, -r)
            }
            var s = 0,
                o = 1,
                a = 0;
            for (this[e] = 255 & t; ++s < i && (o *= 256);) t < 0 && 0 === a && 0 !== this[e + s - 1] && (a = 1), this[e + s] = (t / o >> 0) - a & 255;
            return e + i
        }, a.prototype.writeIntBE = function(t, e, i, n) {
            if (t = +t, e >>>= 0, !n) {
                var r = Math.pow(2, 8 * i - 1);
                D(this, t, e, i, r - 1, -r)
            }
            var s = i - 1,
                o = 1,
                a = 0;
            for (this[e + s] = 255 & t; --s >= 0 && (o *= 256);) t < 0 && 0 === a && 0 !== this[e + s + 1] && (a = 1), this[e + s] = (t / o >> 0) - a & 255;
            return e + i
        }, a.prototype.writeInt8 = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 1, 127, -128), t < 0 && (t = 255 + t + 1), this[e] = 255 & t, e + 1
        }, a.prototype.writeInt16LE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 2, 32767, -32768), this[e] = 255 & t, this[e + 1] = t >>> 8, e + 2
        }, a.prototype.writeInt16BE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 2, 32767, -32768), this[e] = t >>> 8, this[e + 1] = 255 & t, e + 2
        }, a.prototype.writeInt32LE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 4, 2147483647, -2147483648), this[e] = 255 & t, this[e + 1] = t >>> 8, this[e + 2] = t >>> 16, this[e + 3] = t >>> 24, e + 4
        }, a.prototype.writeInt32BE = function(t, e, i) {
            return t = +t, e >>>= 0, i || D(this, t, e, 4, 2147483647, -2147483648), t < 0 && (t = 4294967295 + t + 1), this[e] = t >>> 24, this[e + 1] = t >>> 16, this[e + 2] = t >>> 8, this[e + 3] = 255 & t, e + 4
        }, a.prototype.writeFloatLE = function(t, e, i) {
            return M(this, t, e, !0, i)
        }, a.prototype.writeFloatBE = function(t, e, i) {
            return M(this, t, e, !1, i)
        }, a.prototype.writeDoubleLE = function(t, e, i) {
            return I(this, t, e, !0, i)
        }, a.prototype.writeDoubleBE = function(t, e, i) {
            return I(this, t, e, !1, i)
        }, a.prototype.copy = function(t, e, i, n) {
            if (!a.isBuffer(t)) throw new TypeError("argument should be a Buffer");
            if (i || (i = 0), n || 0 === n || (n = this.length), e >= t.length && (e = t.length), e || (e = 0), n > 0 && n < i && (n = i), n === i) return 0;
            if (0 === t.length || 0 === this.length) return 0;
            if (e < 0) throw new RangeError("targetStart out of bounds");
            if (i < 0 || i >= this.length) throw new RangeError("Index out of range");
            if (n < 0) throw new RangeError("sourceEnd out of bounds");
            n > this.length && (n = this.length), t.length - e < n - i && (n = t.length - e + i);
            var r = n - i;
            if (this === t && "function" == typeof Uint8Array.prototype.copyWithin) this.copyWithin(e, i, n);
            else if (this === t && i < e && e < n)
                for (var s = r - 1; s >= 0; --s) t[s + e] = this[s + i];
            else Uint8Array.prototype.set.call(t, this.subarray(i, n), e);
            return r
        }, a.prototype.fill = function(t, e, i, n) {
            if ("string" == typeof t) {
                if ("string" == typeof e ? (n = e, e = 0, i = this.length) : "string" == typeof i && (n = i, i = this.length), void 0 !== n && "string" != typeof n) throw new TypeError("encoding must be a string");
                if ("string" == typeof n && !a.isEncoding(n)) throw new TypeError("Unknown encoding: " + n);
                if (1 === t.length) {
                    var r = t.charCodeAt(0);
                    ("utf8" === n && r < 128 || "latin1" === n) && (t = r)
                }
            } else "number" == typeof t && (t &= 255);
            if (e < 0 || this.length < e || this.length < i) throw new RangeError("Out of range index");
            if (i <= e) return this;
            var s;
            if (e >>>= 0, i = void 0 === i ? this.length : i >>> 0, t || (t = 0), "number" == typeof t)
                for (s = e; s < i; ++s) this[s] = t;
            else {
                var o = a.isBuffer(t) ? t : new a(t, n),
                    c = o.length;
                if (0 === c) throw new TypeError('The value "' + t + '" is invalid for argument "value"');
                for (s = 0; s < i - e; ++s) this[s + e] = o[s % c]
            }
            return this
        };
        var F = /[^+/0-9A-Za-z-_]/g;

        function R(t) {
            return t < 16 ? "0" + t.toString(16) : t.toString(16)
        }

        function N(t, e) {
            var i;
            e = e || 1 / 0;
            for (var n = t.length, r = null, s = [], o = 0; o < n; ++o) {
                if ((i = t.charCodeAt(o)) > 55295 && i < 57344) {
                    if (!r) {
                        if (i > 56319) {
                            (e -= 3) > -1 && s.push(239, 191, 189);
                            continue
                        }
                        if (o + 1 === n) {
                            (e -= 3) > -1 && s.push(239, 191, 189);
                            continue
                        }
                        r = i;
                        continue
                    }
                    if (i < 56320) {
                        (e -= 3) > -1 && s.push(239, 191, 189), r = i;
                        continue
                    }
                    i = 65536 + (r - 55296 << 10 | i - 56320)
                } else r && (e -= 3) > -1 && s.push(239, 191, 189);
                if (r = null, i < 128) {
                    if ((e -= 1) < 0) break;
                    s.push(i)
                } else if (i < 2048) {
                    if ((e -= 2) < 0) break;
                    s.push(i >> 6 | 192, 63 & i | 128)
                } else if (i < 65536) {
                    if ((e -= 3) < 0) break;
                    s.push(i >> 12 | 224, i >> 6 & 63 | 128, 63 & i | 128)
                } else {
                    if (!(i < 1114112)) throw new Error("Invalid code point");
                    if ((e -= 4) < 0) break;
                    s.push(i >> 18 | 240, i >> 12 & 63 | 128, i >> 6 & 63 | 128, 63 & i | 128)
                }
            }
            return s
        }

        function j(t) {
            return n.toByteArray(function(t) {
                if ((t = (t = t.split("=")[0]).trim().replace(F, "")).length < 2) return "";
                for (; t.length % 4 != 0;) t += "=";
                return t
            }(t))
        }

        function V(t, e, i, n) {
            for (var r = 0; r < n && !(r + i >= e.length || r >= t.length); ++r) e[r + i] = t[r];
            return r
        }

        function B(t) {
            return t instanceof ArrayBuffer || null != t && null != t.constructor && "ArrayBuffer" === t.constructor.name && "number" == typeof t.byteLength
        }

        function U(t) {
            return t != t
        }
    }, {
        "base64-js": 109,
        ieee754: 111
    }],
    111: [function(t, e, i) {
        i.read = function(t, e, i, n, r) {
            var s, o, a = 8 * r - n - 1,
                c = (1 << a) - 1,
                l = c >> 1,
                h = -7,
                u = i ? r - 1 : 0,
                d = i ? -1 : 1,
                p = t[e + u];
            for (u += d, s = p & (1 << -h) - 1, p >>= -h, h += a; h > 0; s = 256 * s + t[e + u], u += d, h -= 8);
            for (o = s & (1 << -h) - 1, s >>= -h, h += n; h > 0; o = 256 * o + t[e + u], u += d, h -= 8);
            if (0 === s) s = 1 - l;
            else {
                if (s === c) return o ? NaN : 1 / 0 * (p ? -1 : 1);
                o += Math.pow(2, n), s -= l
            }
            return (p ? -1 : 1) * o * Math.pow(2, s - n)
        }, i.write = function(t, e, i, n, r, s) {
            var o, a, c, l = 8 * s - r - 1,
                h = (1 << l) - 1,
                u = h >> 1,
                d = 23 === r ? Math.pow(2, -24) - Math.pow(2, -77) : 0,
                p = n ? 0 : s - 1,
                f = n ? 1 : -1,
                m = e < 0 || 0 === e && 1 / e < 0 ? 1 : 0;
            for (e = Math.abs(e), isNaN(e) || e === 1 / 0 ? (a = isNaN(e) ? 1 : 0, o = h) : (o = Math.floor(Math.log(e) / Math.LN2), e * (c = Math.pow(2, -o)) < 1 && (o--, c *= 2), (e += o + u >= 1 ? d / c : d * Math.pow(2, 1 - u)) * c >= 2 && (o++, c /= 2), o + u >= h ? (a = 0, o = h) : o + u >= 1 ? (a = (e * c - 1) * Math.pow(2, r), o += u) : (a = e * Math.pow(2, u - 1) * Math.pow(2, r), o = 0)); r >= 8; t[i + p] = 255 & a, p += f, a /= 256, r -= 8);
            for (o = o << r | a, l += r; l > 0; t[i + p] = 255 & o, p += f, o /= 256, l -= 8);
            t[i + p - f] |= 128 * m
        }
    }, {}],
    112: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Object/assign");
        var n, r = "data-films-modal-link",
            s = "data-films-inline-target",
            o = t("./factory/createFilms"),
            a = !0;
        e.exports = function t(e, i) {
            if (!(this instanceof t) && a) return a = !1, n = setTimeout(t, 1),
                function(e, i) {
                    return clearTimeout(n), new t(e, i)
                };
            e = e || document;
            var c, l = Array.prototype.slice.call(e.querySelectorAll("[" + r + "]")),
                h = Array.prototype.slice.call(e.querySelectorAll("[" + s + "]"));
            if (l.length) c = o(l, Object.assign(i || {}, {
                modal: !0
            }));
            else if (h.length) {
                for (var u = {}, d = 0, p = h.length; d < p; d++) {
                    var f = h[d],
                        m = f.getAttribute(s);
                    u[m] || (u[m] = []), u[m].push(f)
                }
                for (var _ in u) u.hasOwnProperty(_) && (c = o(u[_], Object.assign(i || {}, {
                    targetElement: e.querySelector("#" + _)
                })))
            }
            return c
        }()
    }, {
        "./factory/createFilms": 117,
        "@marcom/ac-polyfills/Object/assign": 90
    }],
    113: [function(t, e, i) {
        "use strict";
        var n;
        try {
            n = t("@marcom/ac-analytics")
        } catch (t) {}
        var r = t("@marcom/ac-useragent").browser,
            s = r.ie || r.edge,
            o = t("@marcom/ac-video/event-emitter-shim/EventEmitterShim"),
            a = function(t, e, i) {
                if (i) {
                    o.prototype.once.apply(this, [t, function() {
                        e.apply(i, arguments)
                    }])
                } else o.prototype.once.apply(this, arguments)
            };

        function c(t, e, i) {
            this.player = t, this.sources = {}, this.currentStubPlayer = null, this.playerType = "", this.videoType = "", this.options = e, i && this._bindAnchors(i)
        }
        var l = c.prototype;
        l._bindAnchors = function(t) {
            for (var e = 0, i = t.length; e < i; e++) this._bindAnchorForAnalytics(t[e])
        }, l.activate = function() {
            this._onPlay = this._onPlay.bind(this), this._onEnded = this._onEnded.bind(this), this._onTimeupdate = this._onTimeupdate.bind(this), this._onTexttrackshow = this._onTexttrackshow.bind(this), this._onLoadStart = this._onLoadStart.bind(this), this.setCurrentStubPlayer = this.setCurrentStubPlayer.bind(this), this._onPlayPromiseResolved = this._onPlayPromiseResolved.bind(this), s ? this.player.on("playing", this._onPlay) : this.player.on("play", this._onPlay), this.player.on("ended", this._onEnded), this.player.on("loadstart", this._onLoadStart), this.player.on("timeupdate", this._onTimeupdate), this.player.on("texttrackshow", this._onTexttrackshow), this.player.on("PlayPromiseResolved", this._onPlayPromiseResolved), this.player.on("durationchange", this.setCurrentStubPlayer)
        }, l.deactivate = function() {
            s ? this.player.off("playing", this._onPlay) : this.player.off("play", this._onPlay), this.player.off("ended", this._onEnded), this.player.off("timeupdate", this._onTimeupdate), this.player.off("texttrackshow", this._onTexttrackshow), this.player.off("durationchange", this.setCurrentStubPlayer), this.player.off("PlayPromiseResolved", this._onPlayPromiseResolved)
        }, l._bindAnchorForAnalytics = function(t) {
            var e;
            if (t) {
                if (this.sources[t.id]) return;
                e = this._createStubPlayer(t), t.getAttribute("data-" + this.options.dataAttribute) || (e.videoId = t.id), this.sources[t.id] = {
                    stubPlayer: e,
                    observer: this._createObserver(e)
                }
            }
        }, l.addSourceObject = l._bindAnchorForAnalytics, l.setCurrentStubPlayer = function() {
            var t, e = this.player.el.getAttribute("data-" + this.options.dataAttribute),
                i = this._getCurrentSourceObject(e);
            i && i.stubPlayer && (this.currentStubPlayer = i.stubPlayer, this.playerType = "html5", (t = this.player.getCurrentSrc()) && t.attributes && t.attributes.src && (this.videoType = t.attributes.src.value.split(".").pop()))
        }, l.destroy = function() {
            this.deactivate(), this.player = null, this.sources = null, this.currentStubPlayer = null, this.options = null
        }, l._onPlay = function() {
            this.setCurrentStubPlayer(), this._started || (this._proxyEvent("play"), this._started = !0)
        }, l._onPlayPromiseResolved = function() {
            this.setCurrentStubPlayer(), this._proxyEvent("PlayPromiseResolved")
        }, l._onLoadStart = function() {
            this._started = !1
        }, l._onEnded = function() {
            this._started = !1, this._proxyEvent("ended")
        }, l._onTimeupdate = function() {
            this._proxyEvent("timeupdate"), this._started && 0 === this.player.getCurrentTime() && this.player.getPaused() && (this._started = !1)
        }, l._onTexttrackshow = function() {
            this._proxyEvent("captions-enabled")
        }, l._getSourceObjectBySrcObjId = function(t) {
            return this.sources[t] || null
        }, l._getCurrentSourceObject = function(t) {
            var e;
            return t && (e = this._getSourceObjectBySrcObjId(t)), e
        }, l._createStubPlayer = function(t) {
            var e = new o;
            return e.once = a, e.el = t, e.VERSION = this.player.VERSION, e
        }, l._getEventData = function() {
            return {
                currentTime: this.player.getCurrentTime(),
                playerType: this.playerType || "html5",
                videoType: this.videoType || null
            }
        }, l._createObserver = function(t) {
            var e;
            return n && n.observer && n.observer.Video && (e = new n.observer.Video(t, {
                dataAttribute: this.options.dataAttribute
            })), e
        }, l._proxyEvent = function(t) {
            this.currentStubPlayer && this.currentStubPlayer.trigger(t, this._getEventData())
        }, e.exports = c
    }, {
        "@marcom/ac-analytics": "@marcom/ac-analytics",
        "@marcom/ac-useragent": 103,
        "@marcom/ac-video/event-emitter-shim/EventEmitterShim": 285
    }],
    114: [function(t, e, i) {
        "use strict";
        var n = t("../windowload/windowLoad"),
            r = t("../touchclick/TouchClick"),
            s = t("@marcom/ac-useragent"),
            o = s.os.ios || s.os.android;
        e.exports = function(t, e, i, s) {
            r.create(t).on("click", function() {
                e(t)
            }), t.addEventListener("TriggerAnchor", function() {
                e(t)
            }), s && t.id && s.createRoute(t.id, function() {
                n(function() {
                    e(t, !o)
                })
            })
        }
    }, {
        "../touchclick/TouchClick": 124,
        "../windowload/windowLoad": 125,
        "@marcom/ac-useragent": 103
    }],
    115: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-router").Router,
            r = t("@marcom/ac-video/player/factory/createShareablePlayer"),
            s = t("@marcom/ac-video/optimizeVideoUrl"),
            o = t("@marcom/ac-useragent"),
            a = t("./bindAnchor"),
            c = t("./createClickHandler"),
            l = t("./createModalLink"),
            h = t("./createHandheldModalLink"),
            u = t("./createInlineLink"),
            d = t("@marcom/ac-feature/isHandheld")(),
            p = o.os.ios,
            f = {
                controls: !0,
                urlOptimizer: s
            };
        e.exports = function(t, e) {
            var i;
            e = e || {}, e = Object.assign({}, f, e), t.forEach(function(t) {
                t.hasAttribute("data-films-options") && (!1 !== JSON.parse(t.getAttribute("data-films-options")).closeOnEnd || e.closeOnEnd || (e.closeOnEnd = !1))
            }), e.maxWidth || (e.maxWidth = 1280);
            var s, o = r(e);
            i = new n({
                hashChange: !0,
                pushState: !1
            });
            var m = (s = !e.modal || d && p && !e.threesixty ? e.modal ? h(o, document.body, e) : u(o, e) : l(o, e)).play.bind(s),
                _ = c({
                    player: o,
                    playHandler: m,
                    attr: "data-" + e.dataAttribute
                });
            return t.forEach(function(t) {
                a(t, _, m, i)
            }), i.start(), {
                play: function(e) {
                    for (var i = 0, n = t.length; i < n; i++) t[i].id !== e && t[i] !== e || m(t[i].href)
                },
                player: o,
                modalVideo: s.modal
            }
        }
    }, {
        "./bindAnchor": 114,
        "./createClickHandler": 116,
        "./createHandheldModalLink": 118,
        "./createInlineLink": 119,
        "./createModalLink": 120,
        "@marcom/ac-feature/isHandheld": 57,
        "@marcom/ac-router": 96,
        "@marcom/ac-useragent": 103,
        "@marcom/ac-video/optimizeVideoUrl": 286,
        "@marcom/ac-video/player/factory/createShareablePlayer": 292
    }],
    116: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            return function(e, i) {
                var n, r = e.getAttribute("data-films-options");
                (n = r ? JSON.parse(r) : null) && n.endState && n.endState.items.forEach(function(t) {
                    if (t.url && 0 === t.url.indexOf("#")) {
                        var e = document.querySelector(t.url);
                        t.onclick = function() {
                            e.dispatchEvent(new CustomEvent("TriggerAnchor"))
                        }
                    }
                }), n && n.poster ? t.player.setPoster(n.poster) : t.player.setPoster(null);
                var s = e.getAttribute("data-films-modal-label") || n && n.modalLabel || t.player.options.modalLabel || "Video Player";
                t.player.el.setAttribute(t.attr, e.getAttribute(t.attr) || e.id), t.playHandler(e.href, n, i, s)
            }
        }
    }, {}],
    117: [function(t, e, i) {
        "use strict";
        var n = t("./bindAnchors"),
            r = t("../analytics/AnalyticsTranslator"),
            s = {
                dataAttribute: "analytics-video-id",
                analytics: !0
            };
        e.exports = function(t, e) {
            e = e || {}, e = Object.assign({}, s, e);
            var i = n(t, e);
            e.analytics && new r(i.player, e, t).activate();
            return i
        }
    }, {
        "../analytics/AnalyticsTranslator": 113,
        "./bindAnchors": 115
    }],
    118: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i) {
            t.el.classList.add("ac-films-handheld-player");
            return e.appendChild(t.el), {
                play: function(e, i) {
                    var n = function() {
                        t.getPaused() || t.pause(), t.el.classList.remove("player-fullscreen")
                    };
                    t.el.classList.add("player-fullscreen"), t.once("ended", n), t.once("exitfullscreen", n), t.load(e), !1 !== i && t.play()
                },
                player: t
            }
        }
    }, {}],
    119: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e) {
            var i = e.targetElement,
                n = function(e, i) {
                    t.load(e, null, 0, i), t.play()
                };
            return e.playHandler = n, i && i.appendChild(t.el), {
                play: n,
                player: t
            }
        }
    }, {}],
    120: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-modal").createFullViewportModal,
            r = t("@marcom/ac-useragent"),
            s = r.os.ios || r.os.android,
            o = t("./link/ModalLink");
        e.exports = function(t, e) {
            e = e || {};
            var i = document.createElement("div");
            i.classList.add("ac-player-container"), s && i.classList.add("ac-films-modal-mobile"), i.appendChild(t.el);
            var r = n(i);
            return r.modalElement.classList.add("ac-modal-video"), new o({
                player: t,
                modal: r,
                closeOnEnd: e.closeOnEnd
            })
        }
    }, {
        "./link/ModalLink": 121,
        "@marcom/ac-modal": 70,
        "@marcom/ac-useragent": 103
    }],
    121: [function(t, e, i) {
        "use strict";
        var n = /_([0-9]+)x([0-9]+)/,
            r = t("../../resize/ResizeHandler"),
            s = t("@marcom/ac-video/utils/urlOptimizer/19X9AssetSizes"),
            o = function(t) {
                this.modal = t.modal, this.player = t.player, this._resizeHandler = new r({
                    player: this.player,
                    modal: this.modal
                }), this._closeOnEnd = void 0 === t.closeOnEnd || t.closeOnEnd, this._ended = !1, this._pauseTime = 0, this._playing = !1, this._initialize()
            },
            a = o.prototype;
        a._initialize = function() {
            this._bindMethods(), this.player.on("ended", this._onEnded), this.player.on("pause", this._onPaused), this.modal.on("open", this._onOpen), this.player.supportsPictureInPicture() && this.player.on("pictureinpicture:change", this._onPipModeChanged)
        }, a._bindMethods = function() {
            this._onEnded = this._onEnded.bind(this), this._onPipModeChanged = this._onPipModeChanged.bind(this), this._onPaused = this._onPaused.bind(this), this._onModalWillClose = this._onModalWillClose.bind(this), this._onOpen = this._onOpen.bind(this)
        }, a._onOpen = function() {
            this.player.refreshSize()
        }, a._onPaused = function() {
            this._pauseTime = Date.now()
        }, a._onEnded = function() {
            this._ended = !0, !this.player.isPictureInPicture() && this._closeOnEnd ? this.modal.close() : this.player.isPictureInPicture() && (this.player.setPictureInPicture(!1), this.modal.modalElement.classList.remove("ac-modal-video-pip"), this._closeOnEnd || (this.modal.open(), this._bindWillClose()))
        }, a._onPipModeChanged = function() {
            this._ended || (this.player.isPictureInPicture() && this._isModalOpen() ? (this._unBindWillClose(), this.modal.modalElement.classList.add("ac-modal-video-pip"), this.modal.close()) : this._isModalOpen() || (this.modal.modalElement.classList.remove("ac-modal-video-pip"), !this._pauseTime || Date.now() - this._pauseTime > 400 ? (this._bindWillClose(), this.modal.open()) : this._resetVideo()))
        }, a._resetVideo = function() {
            this.player.pause(), this.player.setCurrentTime(0)
        }, a._onModalWillClose = function() {
            this._unBindWillClose(), this._resetVideo(), this.player.setPictureInPicture(!1), this.modal.modalElement.classList.remove("ac-modal-video-pip")
        }, a._clearAspectRatio = function() {
            this.player.el.parentElement.classList.remove("ac-video-cinematic-aspect-ratio"), this.player.el.parentElement.classList.remove("ac-video-square-aspect-ratio"), this.player.el.parentElement.classList.remove("ac-video-vertical-aspect-ratio"), this.player.el.parentElement.classList.remove("ac-video-19x9-aspect-ratio"), this.player.el.parentElement.classList.remove("ac-video-9x19-aspect-ratio")
        }, a._set19X9Mode = function() {
            this.player.el.parentElement.classList.add("ac-video-19x9-aspect-ratio")
        }, a._set9X19Mode = function() {
            this.player.el.parentElement.classList.add("ac-video-9x19-aspect-ratio")
        }, a._setCinematicMode = function() {
            this.player.el.parentElement.classList.add("ac-video-cinematic-aspect-ratio")
        }, a._setSquareVideo = function() {
            this.player.el.parentElement.classList.add("ac-video-square-aspect-ratio")
        }, a._setVerticalVideo = function() {
            this.player.el.parentElement.classList.add("ac-video-vertical-aspect-ratio")
        }, a._resetPiPVideo = function() {
            var t = this.player.getVisibleTextTracks();
            t.forEach(function(t) {
                t.mode = "hidden"
            }), this._resetVideo(), t.forEach(function(t) {
                t.mode = "showing"
            })
        }, a.play = function(t, e, i, r) {
            if (this._ended = !1, this._clearAspectRatio(), t.match("-tft-")) this._setCinematicMode();
            else if (n.test(t)) {
                var o = parseInt(RegExp.$1, 10),
                    a = parseInt(RegExp.$2, 10);
                c = {
                    width: o,
                    height: a
                }, s.find(function(t) {
                    return t.width === c.width && (t.height = c.height) || t.width === c.height && (t.height = c.width)
                }) ? a > o ? this._set9X19Mode(!0) : this._set19X9Mode(!0) : a > o ? this._setVerticalVideo(!0) : a === o && this._setSquareVideo(!0)
            }
            var c;
            this.modal.modalElement.setAttribute("aria-label", r), this.player.load(t, null, 0, Object.assign({}, e, {
                maxWidth: window.innerWidth
            })), this.player.isPictureInPicture() ? this._resetPiPVideo() : (this.modal.open(), this._bindWillClose()), !1 !== i && this.player.play()
        }, a._bindWillClose = function() {
            this.modal.on("willclose", this._onModalWillClose)
        }, a._unBindWillClose = function() {
            this.modal.off("willclose", this._onModalWillClose)
        }, a._isModalOpen = function() {
            return document.documentElement.classList.contains("has-modal")
        }, a.destroy = function() {
            this.player.off("ended", this._onEnded), this.player.off("paused", this._onPaused), this.player.off("pictureinpicture:change", this._onPipModeChanged), this._unBindWillClose(), this._resizeHandler.destroy(), this.modal.destroy(), this.player.destroy()
        }, e.exports = o
    }, {
        "../../resize/ResizeHandler": 123,
        "@marcom/ac-video/utils/urlOptimizer/19X9AssetSizes": 351
    }],
    122: [function(t, e, i) {
        "use strict";
        t("../AutoFilms")()
    }, {
        "../AutoFilms": 112
    }],
    123: [function(t, e, i) {
        "use strict";
        var n = /_([0-9]+)x([0-9]+)/,
            r = t("@marcom/ac-useragent"),
            s = r.os.ios || r.os.android;

        function o(t) {
            this._modal = t.modal, this._player = t.player, this._mediaElement = t.player.getMediaElement(), this._posterEl = this._player.el.querySelector(".ac-video-poster img"), this._playerContainer = this._player.el.parentElement, this._bindMethods(), this._addEventListeners(), this._calcAspectRatio()
        }
        var a = o.prototype;
        a._bindMethods = function() {
            this._onLoadStart = this._onLoadStart.bind(this), this._onResize = this._onResize.bind(this), this._fullScreenChange = this._fullScreenChange.bind(this), this._calcAspectRatio = this._calcAspectRatio.bind(this), this._addResizeListeners = this._addResizeListeners.bind(this), this._removeResizeListeners = this._removeResizeListeners.bind(this), this._onModalOpen = this._onModalOpen.bind(this)
        }, a._addEventListeners = function() {
            this._posterEl && this._posterEl.addEventListener("load", this._calcAspectRatio), this._modal.on("willopen", this._addResizeListeners), this._modal.on("open", this._onModalOpen), this._modal.on("close", this._removeResizeListeners)
        }, a._onModalOpen = function() {
            this._loadStarted && (this._onResize(), this._player.el.style.display = "", this._player.el.style.opacity = "")
        }, a._addResizeListeners = function() {
            this._player.el.style.display = "block", this._player.el.style.opacity = 0, window.addEventListener("resize", this._onResize), window.addEventListener("orientationchange", this._onResize), this._player.on("loadstart", this._onLoadStart), this._player.on("loadeddata", this._calcAspectRatio), this._player.on("fullscreen:change", this._fullScreenChange), this._player.on("fullscreen:willenter", this._fullScreenChange), this._calcAspectRatio()
        }, a._removeResizeListeners = function() {
            this._onResize(), window.removeEventListener("resize", this._onResize), window.removeEventListener("orientationchange", this._onResize), this._player.off("loadstart", this._onLoadStart), this._player.off("loadeddata", this._calcAspectRatio), this._player.off("fullscreen:change", this._fullScreenChange)
        }, a._removeEventListeners = function() {
            this._removeResizeListeners(), this._modal.off("willopen", this._addResizeListeners), this._modal.off("open", this._onModalOpen), this._modal.off("close", this._removeResizeListeners), this._posterEl && this._posterEl.removeEventListener("load", this._calcAspectRatio)
        }, a._onLoadStart = function() {
            this._loadStarted = !1, requestAnimationFrame(function() {
                this._loadStarted = !0, this._onModalOpen()
            }.bind(this)), this._calcAspectRatio()
        }, a._calcAspectRatio = function() {
            this._aspectRatio = this._player.getMediaWidth() / this._player.getMediaHeight(), (isNaN(this._aspectRatio) || this._aspectRatio <= 0) && this._mediaElement.src && n.test(this._mediaElement.src) && (this._aspectRatio = parseInt(RegExp.$1, 10) / parseInt(RegExp.$2, 10)), (isNaN(this._aspectRatio) || this._aspectRatio <= 0) && this._posterEl && (this._aspectRatio = this._posterEl.naturalWidth / this._posterEl.naturalHeight), this._onResize()
        }, a._fullScreenChange = function(t) {
            t && "enter" === t.type ? setTimeout(function() {
                this._isFullScreen = !0, this._onResize()
            }.bind(this), 60) : (this._isFullScreen = this._player.isFullscreen(), this._onResize())
        }, a.destroy = function() {
            this._removeEventListeners()
        }, a._onResize = function() {
            var t = this._aspectRatio;
            if (isNaN(t)) return this._mediaElement.style.width = "", void(this._mediaElement.style.height = "");
            var e = window.innerWidth,
                i = window.innerHeight,
                n = e / i;
            if (this._mediaElement.readyState < 1) {
                var r = parseInt(getComputedStyle(this._playerContainer).maxWidth.replace("px", "")),
                    o = r / t,
                    a = s ? parseInt(getComputedStyle(this._player.el).maxHeight.replace("px", "")) : o;
                (o > i || a && o > a) && (r = (a || i) * t, o = Math.min(r / t, i)), (r > e || r > o * t) && (r = (o = Math.min(e / t, i)) * t), this._mediaElement.style.width = r + "px", this._mediaElement.style.height = Math.min(o, i) + "px"
            } else this._mediaElement.style.width = "", this._mediaElement.style.height = "";
            n > t && !this._isFullScreen ? this._playerContainer.parentElement.classList.add("center-horizontal") : this._playerContainer.parentElement.classList.remove("center-horizontal"), this._player.refreshSize()
        }, e.exports = o
    }, {
        "@marcom/ac-useragent": 103
    }],
    124: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            r = t("@marcom/ac-feature/touchAvailable")();

        function s(t) {
            t = t || {}, this.el = t.el, this._onTouchStart = this._onTouchStart.bind(this), this._onTouchMove = this._onTouchMove.bind(this), this._onTouchEnd = this._onTouchEnd.bind(this), this._onClick = this._onClick.bind(this), this._touchStart = !1, n.call(this), this.activate()
        }
        var o = s.prototype = Object.create(n.prototype);
        o._broadcastClick = function(t) {
            this.trigger("click", {
                originalEvent: t
            })
        }, o._onClick = function(t) {
            t.stopPropagation(), t.preventDefault(), r || this._broadcastClick(t)
        }, o._onTouchStart = function() {
            this._touchStart = !0
        }, o._onTouchEnd = function(t) {
            !0 === this._touchStart && (t.stopPropagation(), t.preventDefault(), this._broadcastClick(t)), this._touchStart = !1
        }, o._onTouchMove = function() {
            this._touchStart = !1
        }, o.activate = function() {
            r && (this.el.addEventListener("touchstart", this._onTouchStart), this.el.addEventListener("touchmove", this._onTouchMove), this.el.addEventListener("touchend", this._onTouchEnd)), this.el.addEventListener("click", this._onClick)
        }, o.deactivate = function() {
            this.el.removeEventListener("touchstart", this._onTouchStart), this.el.removeEventListener("touchmove", this._onTouchMove), this.el.removeEventListener("touchend", this._onTouchEnd), this.el.removeEventListener("click", this._onClick)
        }, s.create = function(t, e) {
            return e = e || {}, new s({
                el: t
            })
        }, e.exports = s
    }, {
        "@marcom/ac-event-emitter-micro": 51,
        "@marcom/ac-feature/touchAvailable": 59
    }],
    125: [function(t, e, i) {
        "use strict";
        var n = !1;
        window.addEventListener("load", function() {
            n = !0
        }), e.exports = function(t) {
            n ? t() : window.addEventListener("load", t)
        }
    }, {}],
    126: [function(t, e, i) {
        e.exports = "3.6.2-2"
    }, {}],
    127: [function(t, e, i) {
        e.exports = {
            majorVersionNumber: "3.x"
        }
    }, {}],
    128: [function(t, e, i) {
        "use strict";
        var n, r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            s = t("./sharedRAFExecutorInstance"),
            o = t("./sharedRAFEmitterIDGeneratorInstance");

        function a(t) {
            t = t || {}, r.call(this), this.id = o.getNewID(), this.executor = t.executor || s, this._reset(), this._willRun = !1, this._didDestroy = !1
        }(n = a.prototype = Object.create(r.prototype)).run = function() {
            return this._willRun || (this._willRun = !0), this._subscribe()
        }, n.cancel = function() {
            this._unsubscribe(), this._willRun && (this._willRun = !1), this._reset()
        }, n.destroy = function() {
            var t = this.willRun();
            return this.cancel(), this.executor = null, r.prototype.destroy.call(this), this._didDestroy = !0, t
        }, n.willRun = function() {
            return this._willRun
        }, n.isRunning = function() {
            return this._isRunning
        }, n._subscribe = function() {
            return this.executor.subscribe(this)
        }, n._unsubscribe = function() {
            return this.executor.unsubscribe(this)
        }, n._onAnimationFrameStart = function(t) {
            this._isRunning = !0, this._willRun = !1, this._didEmitFrameData || (this._didEmitFrameData = !0, this.trigger("start", t))
        }, n._onAnimationFrameEnd = function(t) {
            this._willRun || (this.trigger("stop", t), this._reset())
        }, n._reset = function() {
            this._didEmitFrameData = !1, this._isRunning = !1
        }, e.exports = a
    }, {
        "./sharedRAFEmitterIDGeneratorInstance": 134,
        "./sharedRAFExecutorInstance": 135,
        "@marcom/ac-event-emitter-micro": 201
    }],
    129: [function(t, e, i) {
        "use strict";
        var n;
        t("@marcom/ac-polyfills/performance/now");
        var r = t("@marcom/ac-event-emitter-micro/EventEmitterMicro");

        function s(t) {
            t = t || {}, this._reset(), this.updatePhases(), this.eventEmitter = new r, this._willRun = !1, this._totalSubscribeCount = -1, this._requestAnimationFrame = window.requestAnimationFrame, this._cancelAnimationFrame = window.cancelAnimationFrame, this._boundOnAnimationFrame = this._onAnimationFrame.bind(this), this._boundOnExternalAnimationFrame = this._onExternalAnimationFrame.bind(this)
        }(n = s.prototype).frameRequestedPhase = "requested", n.startPhase = "start", n.runPhases = ["update", "external", "draw"], n.endPhase = "end", n.disabledPhase = "disabled", n.beforePhaseEventPrefix = "before:", n.afterPhaseEventPrefix = "after:", n.subscribe = function(t, e) {
            return this._totalSubscribeCount++, this._nextFrameSubscribers[t.id] || (e ? this._nextFrameSubscribersOrder.unshift(t.id) : this._nextFrameSubscribersOrder.push(t.id), this._nextFrameSubscribers[t.id] = t, this._nextFrameSubscriberArrayLength++, this._nextFrameSubscriberCount++, this._run()), this._totalSubscribeCount
        }, n.subscribeImmediate = function(t, e) {
            return this._totalSubscribeCount++, this._subscribers[t.id] || (e ? this._subscribersOrder.splice(this._currentSubscriberIndex + 1, 0, t.id) : this._subscribersOrder.unshift(t.id), this._subscribers[t.id] = t, this._subscriberArrayLength++, this._subscriberCount++), this._totalSubscribeCount
        }, n.unsubscribe = function(t) {
            return !!this._nextFrameSubscribers[t.id] && (this._nextFrameSubscribers[t.id] = null, this._nextFrameSubscriberCount--, 0 === this._nextFrameSubscriberCount && this._cancel(), !0)
        }, n.getSubscribeID = function() {
            return this._totalSubscribeCount += 1
        }, n.destroy = function() {
            var t = this._cancel();
            return this.eventEmitter.destroy(), this.eventEmitter = null, this.phases = null, this._subscribers = null, this._subscribersOrder = null, this._nextFrameSubscribers = null, this._nextFrameSubscribersOrder = null, this._rafData = null, this._boundOnAnimationFrame = null, this._onExternalAnimationFrame = null, t
        }, n.useExternalAnimationFrame = function(t) {
            if ("boolean" == typeof t) {
                var e = this._isUsingExternalAnimationFrame;
                return t && this._animationFrame && (this._cancelAnimationFrame.call(window, this._animationFrame), this._animationFrame = null), !this._willRun || t || this._animationFrame || (this._animationFrame = this._requestAnimationFrame.call(window, this._boundOnAnimationFrame)), this._isUsingExternalAnimationFrame = t, t ? this._boundOnExternalAnimationFrame : e || !1
            }
        }, n.updatePhases = function() {
            this.phases || (this.phases = []), this.phases.length = 0, this.phases.push(this.frameRequestedPhase), this.phases.push(this.startPhase), Array.prototype.push.apply(this.phases, this.runPhases), this.phases.push(this.endPhase), this._runPhasesLength = this.runPhases.length, this._phasesLength = this.phases.length
        }, n._run = function() {
            if (!this._willRun) return this._willRun = !0, 0 === this.lastFrameTime && (this.lastFrameTime = performance.now()), this._animationFrameActive = !0, this._isUsingExternalAnimationFrame || (this._animationFrame = this._requestAnimationFrame.call(window, this._boundOnAnimationFrame)), this.phase === this.disabledPhase && (this.phaseIndex = 0, this.phase = this.phases[this.phaseIndex]), !0
        }, n._cancel = function() {
            var t = !1;
            return this._animationFrameActive && (this._animationFrame && (this._cancelAnimationFrame.call(window, this._animationFrame), this._animationFrame = null), this._animationFrameActive = !1, this._willRun = !1, t = !0), this._isRunning || this._reset(), t
        }, n._onAnimationFrame = function(t) {
            for (this._subscribers = this._nextFrameSubscribers, this._subscribersOrder = this._nextFrameSubscribersOrder, this._subscriberArrayLength = this._nextFrameSubscriberArrayLength, this._subscriberCount = this._nextFrameSubscriberCount, this._nextFrameSubscribers = {}, this._nextFrameSubscribersOrder = [], this._nextFrameSubscriberArrayLength = 0, this._nextFrameSubscriberCount = 0, this.phaseIndex = 0, this.phase = this.phases[this.phaseIndex], this._isRunning = !0, this._willRun = !1, this._didRequestNextRAF = !1, this._rafData.delta = t - this.lastFrameTime, this.lastFrameTime = t, this._rafData.fps = 0, this._rafData.delta >= 1e3 && (this._rafData.delta = 0), 0 !== this._rafData.delta && (this._rafData.fps = 1e3 / this._rafData.delta), this._rafData.time = t, this._rafData.naturalFps = this._rafData.fps, this._rafData.timeNow = Date.now(), this.phaseIndex++, this.phase = this.phases[this.phaseIndex], this.eventEmitter.trigger(this.beforePhaseEventPrefix + this.phase), this._currentSubscriberIndex = 0; this._currentSubscriberIndex < this._subscriberArrayLength; this._currentSubscriberIndex++) null !== this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]] && !1 === this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]]._didDestroy && this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]]._onAnimationFrameStart(this._rafData);
            for (this.eventEmitter.trigger(this.afterPhaseEventPrefix + this.phase), this._runPhaseIndex = 0; this._runPhaseIndex < this._runPhasesLength; this._runPhaseIndex++) {
                for (this.phaseIndex++, this.phase = this.phases[this.phaseIndex], this.eventEmitter.trigger(this.beforePhaseEventPrefix + this.phase), this._currentSubscriberIndex = 0; this._currentSubscriberIndex < this._subscriberArrayLength; this._currentSubscriberIndex++) null !== this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]] && !1 === this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]]._didDestroy && this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]].trigger(this.phase, this._rafData);
                this.eventEmitter.trigger(this.afterPhaseEventPrefix + this.phase)
            }
            for (this.phaseIndex++, this.phase = this.phases[this.phaseIndex], this.eventEmitter.trigger(this.beforePhaseEventPrefix + this.phase), this._currentSubscriberIndex = 0; this._currentSubscriberIndex < this._subscriberArrayLength; this._currentSubscriberIndex++) null !== this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]] && !1 === this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]]._didDestroy && this._subscribers[this._subscribersOrder[this._currentSubscriberIndex]]._onAnimationFrameEnd(this._rafData);
            this.eventEmitter.trigger(this.afterPhaseEventPrefix + this.phase), this._willRun ? (this.phaseIndex = 0, this.phaseIndex = this.phases[this.phaseIndex]) : this._reset()
        }, n._onExternalAnimationFrame = function(t) {
            this._isUsingExternalAnimationFrame && this._onAnimationFrame(t)
        }, n._reset = function() {
            this._rafData || (this._rafData = {}), this._rafData.time = 0, this._rafData.delta = 0, this._rafData.fps = 0, this._rafData.naturalFps = 0, this._rafData.timeNow = 0, this._subscribers = {}, this._subscribersOrder = [], this._currentSubscriberIndex = -1, this._subscriberArrayLength = 0, this._subscriberCount = 0, this._nextFrameSubscribers = {}, this._nextFrameSubscribersOrder = [], this._nextFrameSubscriberArrayLength = 0, this._nextFrameSubscriberCount = 0, this._didEmitFrameData = !1, this._animationFrame = null, this._animationFrameActive = !1, this._isRunning = !1, this._shouldReset = !1, this.lastFrameTime = 0, this._runPhaseIndex = -1, this.phaseIndex = -1, this.phase = this.disabledPhase
        }, e.exports = s
    }, {
        "@marcom/ac-event-emitter-micro/EventEmitterMicro": 202,
        "@marcom/ac-polyfills/performance/now": 231
    }],
    130: [function(t, e, i) {
        "use strict";
        var n = t("./SingleCallRAFEmitter"),
            r = function(t) {
                this.phase = t, this.rafEmitter = new n, this._cachePhaseIndex(), this.requestAnimationFrame = this.requestAnimationFrame.bind(this), this.cancelAnimationFrame = this.cancelAnimationFrame.bind(this), this._onBeforeRAFExecutorStart = this._onBeforeRAFExecutorStart.bind(this), this._onBeforeRAFExecutorPhase = this._onBeforeRAFExecutorPhase.bind(this), this._onAfterRAFExecutorPhase = this._onAfterRAFExecutorPhase.bind(this), this.rafEmitter.on(this.phase, this._onRAFExecuted.bind(this)), this.rafEmitter.executor.eventEmitter.on("before:start", this._onBeforeRAFExecutorStart), this.rafEmitter.executor.eventEmitter.on("before:" + this.phase, this._onBeforeRAFExecutorPhase), this.rafEmitter.executor.eventEmitter.on("after:" + this.phase, this._onAfterRAFExecutorPhase), this._frameCallbacks = [], this._currentFrameCallbacks = [], this._nextFrameCallbacks = [], this._phaseActive = !1, this._currentFrameID = -1, this._cancelFrameIdx = -1, this._frameCallbackLength = 0, this._currentFrameCallbacksLength = 0, this._nextFrameCallbacksLength = 0, this._frameCallbackIteration = 0
            },
            s = r.prototype;
        s.requestAnimationFrame = function(t, e) {
            return !0 === e && this.rafEmitter.executor.phaseIndex > 0 && this.rafEmitter.executor.phaseIndex <= this.phaseIndex ? this._phaseActive ? (this._currentFrameID = this.rafEmitter.executor.subscribeImmediate(this.rafEmitter, !0), this._frameCallbacks.push(this._currentFrameID, t), this._frameCallbackLength += 2) : (this._currentFrameID = this.rafEmitter.executor.subscribeImmediate(this.rafEmitter, !1), this._currentFrameCallbacks.push(this._currentFrameID, t), this._currentFrameCallbacksLength += 2) : (this._currentFrameID = this.rafEmitter.run(), this._nextFrameCallbacks.push(this._currentFrameID, t), this._nextFrameCallbacksLength += 2), this._currentFrameID
        }, s.cancelAnimationFrame = function(t) {
            this._cancelFrameIdx = this._nextFrameCallbacks.indexOf(t), this._cancelFrameIdx > -1 ? this._cancelNextAnimationFrame() : (this._cancelFrameIdx = this._currentFrameCallbacks.indexOf(t), this._cancelFrameIdx > -1 ? this._cancelCurrentAnimationFrame() : (this._cancelFrameIdx = this._frameCallbacks.indexOf(t), this._cancelFrameIdx > -1 && this._cancelRunningAnimationFrame()))
        }, s._onRAFExecuted = function(t) {
            for (this._frameCallbackIteration = 0; this._frameCallbackIteration < this._frameCallbackLength; this._frameCallbackIteration += 2) this._frameCallbacks[this._frameCallbackIteration + 1](t.time, t);
            this._frameCallbacks.length = 0, this._frameCallbackLength = 0
        }, s._onBeforeRAFExecutorStart = function() {
            Array.prototype.push.apply(this._currentFrameCallbacks, this._nextFrameCallbacks.splice(0, this._nextFrameCallbacksLength)), this._currentFrameCallbacksLength = this._nextFrameCallbacksLength, this._nextFrameCallbacks.length = 0, this._nextFrameCallbacksLength = 0
        }, s._onBeforeRAFExecutorPhase = function() {
            this._phaseActive = !0, Array.prototype.push.apply(this._frameCallbacks, this._currentFrameCallbacks.splice(0, this._currentFrameCallbacksLength)), this._frameCallbackLength = this._currentFrameCallbacksLength, this._currentFrameCallbacks.length = 0, this._currentFrameCallbacksLength = 0
        }, s._onAfterRAFExecutorPhase = function() {
            this._phaseActive = !1
        }, s._cachePhaseIndex = function() {
            this.phaseIndex = this.rafEmitter.executor.phases.indexOf(this.phase)
        }, s._cancelRunningAnimationFrame = function() {
            this._frameCallbacks.splice(this._cancelFrameIdx, 2), this._frameCallbackLength -= 2
        }, s._cancelCurrentAnimationFrame = function() {
            this._currentFrameCallbacks.splice(this._cancelFrameIdx, 2), this._currentFrameCallbacksLength -= 2
        }, s._cancelNextAnimationFrame = function() {
            this._nextFrameCallbacks.splice(this._cancelFrameIdx, 2), this._nextFrameCallbacksLength -= 2, 0 === this._nextFrameCallbacksLength && this.rafEmitter.cancel()
        }, e.exports = r
    }, {
        "./SingleCallRAFEmitter": 132
    }],
    131: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterface"),
            r = function() {
                this.events = {}
            },
            s = r.prototype;
        s.requestAnimationFrame = function(t) {
            return this.events[t] || (this.events[t] = new n(t)), this.events[t].requestAnimationFrame
        }, s.cancelAnimationFrame = function(t) {
            return this.events[t] || (this.events[t] = new n(t)), this.events[t].cancelAnimationFrame
        }, e.exports = new r
    }, {
        "./RAFInterface": 130
    }],
    132: [function(t, e, i) {
        "use strict";
        var n = t("./RAFEmitter"),
            r = function(t) {
                n.call(this, t)
            };
        (r.prototype = Object.create(n.prototype))._subscribe = function() {
            return this.executor.subscribe(this, !0)
        }, e.exports = r
    }, {
        "./RAFEmitter": 128
    }],
    133: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.cancelAnimationFrame("update")
    }, {
        "./RAFInterfaceController": 131
    }],
    134: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-shared-instance").SharedInstance,
            r = t("../.release-info.js").majorVersionNumber,
            s = function() {
                this._currentID = 0
            };
        s.prototype.getNewID = function() {
            return this._currentID++, "raf:" + this._currentID
        }, e.exports = n.share("@marcom/ac-raf-emitter/sharedRAFEmitterIDGeneratorInstance", r, s)
    }, {
        "../.release-info.js": 127,
        "@marcom/ac-shared-instance": 248
    }],
    135: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-shared-instance").SharedInstance,
            r = t("../.release-info.js").majorVersionNumber,
            s = t("./RAFExecutor");
        e.exports = n.share("@marcom/ac-raf-emitter/sharedRAFExecutorInstance", r, s)
    }, {
        "../.release-info.js": 127,
        "./RAFExecutor": 129,
        "@marcom/ac-shared-instance": 248
    }],
    136: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.requestAnimationFrame("update")
    }, {
        "./RAFInterfaceController": 131
    }],
    137: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        var r = t("./utils/vector3FromLatLon"),
            s = t("@marcom/ac-raf-emitter/update"),
            o = t("@marcom/ac-raf-emitter/cancelUpdate"),
            a = t("./controls/PointerControls"),
            c = t("./controls/OrientationControls"),
            l = t("@marcom/ac-event-emitter-micro/EventEmitterMicro"),
            h = t("@marcom/ac-easing/src/ac-easing/createBezier"),
            u = t("@marcom/ac-useragent"),
            d = t("./utils/simpleTimer"),
            p = t("./utils/inverseLongitude"),
            f = (t("./utils/normalizeLongitude"), t("./controls/ArrowControls")),
            m = t("./utils/map"),
            _ = u.os.ios,
            v = 80,
            g = 1.25,
            y = u.browser.safari && u.os.osx ? "high-performance" : "default",
            b = {
                slow: 80,
                fast: 120
            },
            E = h(.25, .1, 0, 1),
            w = h(.1, .15, 0, 1),
            x = .001,
            C = .999,
            S = 1600,
            T = 1600,
            k = 12,
            A = function(t) {
                function e(t) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, e);
                    var i = function(t, e) {
                        if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !e || "object" != typeof e && "function" != typeof e ? t : e
                    }(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this));
                    return i.el = t.el, i._textureSrc = t.src, t.video && (i._videoElement = t.video), i._maxLat = t.maxLat || v, i._pointerControls = new a({
                        el: t.mouseTarget || i.el
                    }), i.arrowControls = new f, i._easing = t.easing || E, i._sineEasing = t.sineEasing || w, i._mapMinValue = void 0 !== t.mapMinValue ? t.mapMinValue : x, i._mapMaxValue = t.mapMaxValue || C, i._rotationDuration = t.rotationDuration || S, _ && (i._orientationControls = new c), i._panVelocity = Object.assign({}, t.panVelocity || b), i._overshootMultiplier = t.overshootMultiplier || g, i._oscillationDuration = t.ocillationDuration || T, i._oscillationDistance = t.ocillationDistance || k, i._bindMethods(), i._attach(), i.refreshSize(), i
                }
                return function(t, e) {
                    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
                }(e, l), n(e, [{
                    key: "_bindMethods",
                    value: function() {
                        this._onPlaying = this._onPlaying.bind(this)
                    }
                }, {
                    key: "_attach",
                    value: function() {
                        this._distance = 50;
                        var t = {
                            lat: 0,
                            lon: 0
                        };
                        this._cachedPos = t, this._pointerControls.position = t, this._orientationControls && (this._orientationControls.position = t);
                        var e = this.el.clientWidth,
                            i = this.el.clientHeight,
                            n = e / i;
                        this._camera = new THREE.PerspectiveCamera(75, n, 1, 1100), this._camera.target = new THREE.Vector3(0, 0, 0), this._scene = new THREE.Scene, this._geometry = new THREE.SphereBufferGeometry(500, 60, 40), this._geometry.scale(-1, 1, 1), this._texture = this._createTexture(this._textureSrc), this._material = new THREE.MeshBasicMaterial({
                            map: this._texture
                        }), this._mesh = new THREE.Mesh(this._geometry, this._material), this._scene.add(this._mesh), this._renderer = new THREE.WebGLRenderer({
                            antialias: !1,
                            powerPreference: y
                        }), this._renderer.setPixelRatio(window.devicePixelRatio), this._renderer.setSize(e, i), this._renderer.domElement.classList.add("threesixty-renderer"), this.el.appendChild(this._renderer.domElement), this._animate = this._animate.bind(this), this._animateRAF = s(this._animate)
                    }
                }, {
                    key: "_animate",
                    value: function() {
                        this._update(), this._animateRAF = s(this._animate)
                    }
                }, {
                    key: "_update",
                    value: function(t) {
                        var i = t;
                        i || (i = this.arrowControls.isActive ? this.arrowControls.position : this._pointerControls.isActive ? this._pointerControls.position : this._orientationControls ? this._orientationControls.position : this._cachedPos);
                        var n = !1;
                        if (this._cachedPos.lat !== i.lat || this._cachedPos.lon !== i.lon) n = !0;
                        else if (!this._videoElement || this._videoElement.paused) return;
                        var r = Math.max(-this._maxLat, Math.min(this._maxLat, i.lat)),
                            s = THREE.Math.degToRad(90 - r),
                            o = THREE.Math.degToRad(i.lon),
                            a = this._distance * Math.sin(s) * Math.cos(o),
                            c = this._distance * Math.cos(s),
                            l = this._distance * Math.sin(s) * Math.sin(o);
                        this._camera.zoom = this._pointerControls.scale, this._camera.position.x = a, this._camera.position.y = c, this._camera.position.z = l, this._camera.lookAt(this._camera.target), this._camera.updateProjectionMatrix(), this._renderer.render(this._scene, this._camera);
                        var h = {
                            lat: r,
                            lon: i.lon,
                            x: a,
                            y: c,
                            z: l
                        };
                        this._cachedPos = {
                            lat: h.lat,
                            lon: h.lon,
                            x: h.x,
                            y: h.y,
                            z: h.z
                        }, this._pointerControls.position = h, this.arrowControls.position = h, this._orientationControls && (this._orientationControls.position = h), this._originQuaternion || (this._originQuaternion = (new THREE.Quaternion).copy(this._camera.quaternion)), n && this.trigger(e.POSITION_CHANGE)
                    }
                }, {
                    key: "_createTexture",
                    value: function(t) {
                        if (t instanceof HTMLVideoElement) {
                            this._videoElement = t, this._videoElement.setAttribute("playsinline", "playsinline"), this._videoElement.setAttribute("webkit-playsinline", "webkit-playsinline"), this._videoElement.addEventListener("playing", this._onPlaying);
                            var e = new THREE.VideoTexture(this._videoElement);
                            return e.minFilter = THREE.LinearFilter, e.format = THREE.RGBFormat, e
                        }
                        if (t.endsWith(".mp4") || t.endsWith(".m3u8") || t.endsWith(".webm")) {
                            this._videoElement || (this._videoElement = document.createElement("video")), this._videoElement.src = t, this._videoElement.loop = !0, this._videoElement.muted = !0, this._videoElement.crossOrigin = "anonymous", this._videoElement.setAttribute("webkit-playsinline", "webkit-playsinline"), this._videoElement.setAttribute("playsinline", "playsinline"), this._videoElement.load(), this._videoElement = this._videoElement, this._videoElement.addEventListener("playing", this._onPlaying);
                            var i = new THREE.VideoTexture(this._videoElement);
                            return i.minFilter = THREE.LinearFilter, i.format = THREE.RGBFormat, i
                        }
                        return this._orientationControls.enable(), (new THREE.TextureLoader).load(t)
                    }
                }, {
                    key: "refreshSize",
                    value: function() {
                        this._onResize()
                    }
                }, {
                    key: "setPos",
                    value: function(t, e) {
                        this._pointerControls && (this._pointerControls.position = {
                            lat: t,
                            lon: e
                        }), this._orientationControls && (this._orientationControls.position = {
                            lat: t,
                            lon: e
                        }), this._update({
                            lat: t,
                            lon: e
                        })
                    }
                }, {
                    key: "_onResize",
                    value: function() {
                        var t = void 0,
                            e = void 0;
                        this._videoElement.parentElement ? (t = this._videoElement.clientWidth, e = this._videoElement.clientHeight) : (t = this.el.clientWidth, e = this.el.clientHeight), o(this._animateRAF), this._pointerControls.setViewerSize(t, e), this._camera.aspect = t / e, this._camera.updateProjectionMatrix(), this._renderer.setSize(t, e), this._renderer.render(this._scene, this._camera), this._animate()
                    }
                }, {
                    key: "_onPlaying",
                    value: function() {
                        this._videoElement.removeEventListener("playing", this._onPlaying), this._orientationControls && this._orientationControls.enable()
                    }
                }, {
                    key: "play",
                    value: function() {
                        this._videoElement && this._videoElement.play()
                    }
                }, {
                    key: "pause",
                    value: function() {
                        this._videoElement && !this._videoElement.paused && this._videoElement.pause()
                    }
                }, {
                    key: "sendMouseDown",
                    value: function(t) {
                        this._pointerControls.sendMouseDown(t)
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        (function t(e, i, n) {
                            null === e && (e = Function.prototype);
                            var r = Object.getOwnPropertyDescriptor(e, i);
                            if (void 0 === r) {
                                var s = Object.getPrototypeOf(e);
                                return null === s ? void 0 : t(s, i, n)
                            }
                            if ("value" in r) return r.value;
                            var o = r.get;
                            return void 0 !== o ? o.call(n) : void 0
                        })(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "destroy", this).call(this)
                    }
                }, {
                    key: "oscillateLongitude",
                    value: function() {
                        var t = this;
                        this._pointerControls.cancelInertia(), this.arrowControls.cancelInertia();
                        var i = new THREE.Vector2(this.position.lon, this.position.lat),
                            n = this._oscillationDuration,
                            s = {
                                time: n,
                                startPosition: Object.assign({}, this.position),
                                targetPosition: Object.assign({}, this.position)
                            };
                        return this.trigger(e.ROTATION_START, s), new Promise(function(o, a) {
                            d(n, function(n) {
                                var o = Math.sin(Math.PI * t._sineEasing.getValue(n)),
                                    a = (new THREE.Vector2).copy(i);
                                a.x = i.x - o * t._oscillationDistance;
                                var c = r(a.y, a.x, t._distance);
                                t.trigger(e.ROTATION_UPDATE, {
                                    t: n,
                                    easedVal: o,
                                    startPosition: s.startPosition,
                                    currentPosition: {
                                        lat: a.y,
                                        lon: a.x
                                    },
                                    targetPosition: s.targetPosition
                                }), t._camera.position.copy(c), t._camera.lookAt(t._camera.target), t._camera.updateProjectionMatrix(), t._renderer.render(t._scene, t._camera)
                            }).then(function() {
                                t.trigger(e.ROTATION_COMPLETE, s), t.setPos(i.y, i.x), t._animate(), o()
                            })
                        })
                    }
                }, {
                    key: "panToPosition",
                    value: function(t) {
                        return this._respositionCameraToPosition(t)
                    }
                }, {
                    key: "_respositionCameraToPosition",
                    value: function(t) {
                        var i = this;
                        if (this._pointerControls.cancelInertia(), this.arrowControls.cancelInertia(), t.lat === this.position.lat && t.lon === this.position.lon) return this.trigger(e.ROTATION_START, {
                            time: 0,
                            startPosition: Object.assign({}, this.position),
                            targetPosition: Object.assign({}, this.position)
                        }), this.trigger(e.ROTATION_COMPLETE, {
                            time: 1,
                            startPosition: Object.assign({}, this.position),
                            targetPosition: Object.assign({}, this.position)
                        }), Promise.resolve();
                        var n = new THREE.Vector2(this.position.lon, this.position.lat),
                            s = new THREE.Vector2(p(t.lon), t.lat),
                            a = new THREE.Vector2(t.lon, t.lat),
                            c = n.distanceTo(a),
                            l = n.distanceTo(s);
                        l < c && (c = l, a = s);
                        c < 120 ? this._panVelocity.slow : this._panVelocity.fast;
                        var h = (new THREE.Vector2).copy(n);
                        o(this._animateRAF);
                        var u = this._rotationDuration,
                            f = {
                                time: u,
                                startPosition: Object.assign({}, this._cachedPos),
                                targetPosition: Object.assign({}, t)
                            };
                        return this.trigger(e.ROTATION_START, f), new Promise(function(s, o) {
                            d(u, function(t) {
                                var s = void 0;
                                s = 1 === t ? 1 : m(i._easing.getValue(t), 0, 1, i._mapMinValue, i._mapMaxValue);
                                var o = h.lerpVectors(n, a, s),
                                    c = r(o.y, o.x, i._distance);
                                i._camera.position.copy(c), i._camera.lookAt(i._camera.target), i._camera.updateProjectionMatrix(), i._renderer.render(i._scene, i._camera), i.trigger(e.ROTATION_UPDATE, {
                                    t: t,
                                    easedVal: s,
                                    startPosition: f.startPosition,
                                    currentPosition: {
                                        lat: o.y,
                                        lon: o.x
                                    },
                                    targetPosition: {
                                        lat: a.x,
                                        lon: a.y
                                    }
                                })
                            }).then(function() {
                                i.trigger(e.ROTATION_COMPLETE, f), i.setPos(t.lat, t.lon), i._animate(), s()
                            })
                        })
                    }
                }, {
                    key: "position",
                    get: function() {
                        return Object.assign({}, this._cachedPos)
                    }
                }, {
                    key: "isAtOrigin",
                    get: function() {
                        return Math.abs(this.position.lat) <= .5 && Math.abs(this.position.lon) <= .5
                    }
                }, {
                    key: "mediaElement",
                    get: function() {
                        return this._videoElement
                    }
                }]), e
            }();
        A.ROTATION_START = "RotationStart", A.ROTATION_UPDATE = "RotationUpdate", A.ROTATION_COMPLETE = "RotationComplete", A.POSITION_CHANGE = "360PositionChange", e.exports = A
    }, {
        "./controls/ArrowControls": 139,
        "./controls/OrientationControls": 141,
        "./controls/PointerControls": 142,
        "./utils/inverseLongitude": 143,
        "./utils/map": 144,
        "./utils/normalizeLongitude": 145,
        "./utils/simpleTimer": 146,
        "./utils/vector3FromLatLon": 147,
        "@marcom/ac-easing/src/ac-easing/createBezier": 199,
        "@marcom/ac-event-emitter-micro/EventEmitterMicro": 202,
        "@marcom/ac-raf-emitter/cancelUpdate": 133,
        "@marcom/ac-raf-emitter/update": 136,
        "@marcom/ac-useragent": 279
    }],
    138: [function(t, e, i) {
        "use strict";
        e.exports = t("./AC360")
    }, {
        "./AC360": 137
    }],
    139: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        var r = t("./InertialControls"),
            s = t("../utils/normalizeLongitude"),
            o = t("@marcom/ac-raf-emitter/update"),
            a = t("@marcom/ac-raf-emitter/cancelUpdate"),
            c = {
                acceleration: {
                    x: .6,
                    y: .6
                },
                friction: {
                    x: .95,
                    y: .95
                },
                minVelocity: .1,
                maxVelocity: 20
            },
            l = function(t) {
                function e(t) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, e), t = Object.assign({}, c, t);
                    var i = function(t, e) {
                        if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !e || "object" != typeof e && "function" != typeof e ? t : e
                    }(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this, t));
                    return i._bindMethods(), i
                }
                return function(t, e) {
                    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
                }(e, r), n(e, [{
                    key: "_bindMethods",
                    value: function() {
                        this.leftArrowDown = this.leftArrowDown.bind(this), this.rightArrowDown = this.rightArrowDown.bind(this), this.downArrowDown = this.downArrowDown.bind(this), this.upArrowDown = this.upArrowDown.bind(this), this.leftArrowUp = this.leftArrowUp.bind(this), this.rightArrowUp = this.rightArrowUp.bind(this), this.downArrowUp = this.downArrowUp.bind(this), this.upArrowUp = this.upArrowUp.bind(this),
                            function t(e, i, n) {
                                null === e && (e = Function.prototype);
                                var r = Object.getOwnPropertyDescriptor(e, i);
                                if (void 0 === r) {
                                    var s = Object.getPrototypeOf(e);
                                    return null === s ? void 0 : t(s, i, n)
                                }
                                if ("value" in r) return r.value;
                                var o = r.get;
                                return void 0 !== o ? o.call(n) : void 0
                            }(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_bindMethods", this).call(this)
                    }
                }, {
                    key: "leftArrowDown",
                    value: function() {
                        Math.abs(this._velocity.x - this._horizontalIncrement) < this._maxVelocity ? this._velocity.x -= this._horizontalIncrement : this._velocity.x = -this._maxVelocity, this._lon = s(this._lon + this._velocity.x), this._triggerInertia()
                    }
                }, {
                    key: "rightArrowDown",
                    value: function() {
                        Math.abs(this._velocity.x + this._horizontalIncrement) < this._maxVelocity ? this._velocity.x += this._horizontalIncrement : this._velocity.x = this._maxVelocity, this._velocity.x += this._horizontalIncrement, this._lon = s(this._lon + this._velocity.x), this._triggerInertia()
                    }
                }, {
                    key: "upArrowDown",
                    value: function(t) {
                        Math.abs(this._velocity.y - this._verticalIncrement) < this._maxVelocity ? this._velocity.y -= this._verticalIncrement : this._velocity.y = -this._maxVelocity, this._lat = this._lat + this._velocity.y, this._triggerInertia()
                    }
                }, {
                    key: "downArrowDown",
                    value: function() {
                        Math.abs(this._velocity.y + this._verticalIncrement) < this._maxVelocity ? this._velocity.y += this._verticalIncrement : this._velocity.y = this._maxVelocity, this._lat = this._lat + this._velocity.y, this._triggerInertia()
                    }
                }, {
                    key: "leftArrowUp",
                    value: function() {
                        this._triggerInertia()
                    }
                }, {
                    key: "rightArrowUp",
                    value: function() {
                        this._triggerInertia()
                    }
                }, {
                    key: "upArrowUp",
                    value: function() {
                        this._triggerInertia()
                    }
                }, {
                    key: "downArrowUp",
                    value: function() {
                        this._triggerInertia()
                    }
                }, {
                    key: "_triggerInertia",
                    value: function() {
                        a(this._inertiaRaf), o(this._updateInertia)
                    }
                }, {
                    key: "isActive",
                    get: function() {
                        return Math.abs(this._velocity.x) > this._minVelocity || Math.abs(this._velocity.y) > this._minVelocity
                    }
                }]), e
            }();
        e.exports = l
    }, {
        "../utils/normalizeLongitude": 145,
        "./InertialControls": 140,
        "@marcom/ac-raf-emitter/cancelUpdate": 133,
        "@marcom/ac-raf-emitter/update": 136
    }],
    140: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        var r = t("@marcom/ac-raf-emitter/update"),
            s = t("@marcom/ac-raf-emitter/cancelUpdate"),
            o = t("../utils/normalizeLongitude"),
            a = .5,
            c = .1,
            l = 5,
            h = 20,
            u = function() {
                function t() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this._horizontalFriction = e.friction && e.friction.x || a, this._verticalFriction = e.friction && e.friction.x || a, this._horizontalIncrement = e.acceleration && e.acceleration.x || c, this._verticalIncrement = e.acceleration && e.acceleration.y || c, this._minVelocity = e.minVelocity || l, this._maxVelocity = e.maxVelocity || h, this._velocity = {
                        x: 0,
                        y: 0
                    }, this._bindMethods()
                }
                return n(t, [{
                    key: "_bindMethods",
                    value: function() {
                        this._updateInertia = this._updateInertia.bind(this)
                    }
                }, {
                    key: "_updateInertia",
                    value: function() {
                        Math.abs(this._velocity.x) > this._minVelocity || Math.abs(this._velocity.y) > this._minVelocity ? (this._velocity.x *= this._horizontalFriction, this._velocity.y *= this._verticalFriction, this._lon += this._velocity.x * this._horizontalIncrement, this._lat += this._velocity.y * this._verticalIncrement, this._inertiaRaf = r(this._updateInertia)) : (this._velocity = {
                            x: 0,
                            y: 0
                        }, s(this._inertiaRaf), this._inertiaComplete())
                    }
                }, {
                    key: "cancelInertia",
                    value: function() {
                        this._velocity = {
                            x: 0,
                            y: 0
                        }, s(this._inertiaRaf)
                    }
                }, {
                    key: "_inertiaComplete",
                    value: function() {}
                }, {
                    key: "position",
                    set: function(t) {
                        this._lat = t.lat, this._lon = o(t.lon)
                    },
                    get: function() {
                        return {
                            lat: this._lat,
                            lon: this._lon
                        }
                    }
                }]), t
            }();
        e.exports = u
    }, {
        "../utils/normalizeLongitude": 145,
        "@marcom/ac-raf-emitter/cancelUpdate": 133,
        "@marcom/ac-raf-emitter/update": 136
    }],
    141: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        var r = t("../utils/normalizeLongitude"),
            s = function() {
                function t(e) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this._bindMethods()
                }
                return n(t, [{
                    key: "_bindMethods",
                    value: function() {
                        this._onOrientation = this._onOrientation.bind(this)
                    }
                }, {
                    key: "_addEventListeners",
                    value: function() {
                        window.addEventListener("devicemotion", this._onOrientation, !0)
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function() {
                        window.removeEventListener("devicemotion", this._onOrientation, !0)
                    }
                }, {
                    key: "_onOrientation",
                    value: function(t) {
                        window.matchMedia("(orientation: portrait)").matches ? (this._lon = r(this._lon - .02 * t.rotationRate.beta), this._lat = this._lat - .02 * t.rotationRate.alpha) : t.orientation || -90 === window.orientation ? (this._lon = r(this._lon + .02 * t.rotationRate.alpha), this._lat = this._lat - .02 * t.rotationRate.beta) : (this._lon = r(this._lon - .02 * t.rotationRate.alpha), this._lat = this._lat + .02 * t.rotationRate.beta)
                    }
                }, {
                    key: "disable",
                    value: function() {
                        this._removeEventListeners()
                    }
                }, {
                    key: "enable",
                    value: function() {
                        this._addEventListeners()
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        this._removeEventListeners()
                    }
                }, {
                    key: "position",
                    set: function(t) {
                        this._lat = t.lat, this._lon = r(t.lon)
                    },
                    get: function() {
                        return {
                            lat: this._lat,
                            lon: this._lon
                        }
                    }
                }]), t
            }();
        e.exports = s
    }, {
        "../utils/normalizeLongitude": 145
    }],
    142: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        var r = t("../utils/normalizeLongitude"),
            s = t("./InertialControls"),
            o = {
                acceleration: {
                    x: .1,
                    y: .1
                },
                friction: {
                    x: .95,
                    y: .95
                },
                minVelocity: .5,
                maxVelocity: 20
            },
            a = function(t) {
                function e(t) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, e), t = Object.assign({}, o, t);
                    var i = function(t, e) {
                        if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !e || "object" != typeof e && "function" != typeof e ? t : e
                    }(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this, t));
                    return i.el = t.el, i._mouseDown = !1, i._scale = 1, i._hasInertia = !1 !== t.inertia || t.inertia, i._bindMethods(), i._addEventListeners(), i
                }
                return function(t, e) {
                    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
                }(e, s), n(e, [{
                    key: "_bindMethods",
                    value: function() {
                        this._onMouseMove = this._onMouseMove.bind(this), this._onMouseDown = this._onMouseDown.bind(this), this._onMouseUp = this._onMouseUp.bind(this), this._onTouchMove = this._onTouchMove.bind(this), this._onClick = this._onClick.bind(this),
                            function t(e, i, n) {
                                null === e && (e = Function.prototype);
                                var r = Object.getOwnPropertyDescriptor(e, i);
                                if (void 0 === r) {
                                    var s = Object.getPrototypeOf(e);
                                    return null === s ? void 0 : t(s, i, n)
                                }
                                if ("value" in r) return r.value;
                                var o = r.get;
                                return void 0 !== o ? o.call(n) : void 0
                            }(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_bindMethods", this).call(this)
                    }
                }, {
                    key: "_addEventListeners",
                    value: function() {
                        this.el.addEventListener("mousedown", this._onMouseDown), this.el.addEventListener("touchstart", this._onMouseDown, {
                            passive: !1
                        }), this.el.addEventListener("click", this._onClick), this.el.addEventListener("touchmove", this._onTouchMove, {
                            passive: !1
                        })
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function() {
                        this.el.removeEventListener("mousedown", this._onMouseDown), this.el.removeEventListener("touchstart", this._onMouseDown), window.removeEventListener("mousemove", this._onMouseMove), window.removeEventListener("mouseup", this._onMouseUp), this.el.removeEventListener("touchmove", this._onTouchMove), document.body.removeEventListener("touchmove", this._onTouchMove), document.body.removeEventListener("touchend", this._onMouseUp)
                    }
                }, {
                    key: "_onMouseUp",
                    value: function(t) {
                        var e = this;
                        window.removeEventListener("mousemove", this._onMouseMove), window.removeEventListener("mouseup", this._onMouseUp), document.body.removeEventListener("touchmove", this._onTouchMove), document.body.removeEventListener("touchend", this._onMouseUp), this._mouseDown && this._hasInertia && Date.now() - this._mouseMoveTime < 300 && this._updateInertia(), setTimeout(function() {
                            e._mouseDown || (e._dragging = !1)
                        }, 350), this._mouseDown = !1
                    }
                }, {
                    key: "sendMouseDown",
                    value: function(t) {
                        this._onMouseDown(t)
                    }
                }, {
                    key: "_onClick",
                    value: function(t) {
                        this._dragging || (this._velocity = {
                            x: 0,
                            y: 0
                        }, this._mouseDown = !1, this._cachedPosition = t, document.removeEventListener("mousemove", this._onMouseMove), document.removeEventListener("mouseup", this._onMouseUp), document.body.removeEventListener("touchmove", this._onTouchMove), document.body.removeEventListener("touchend", this._onMouseUp))
                    }
                }, {
                    key: "_onMouseDown",
                    value: function(t) {
                        this._mouseDownTime = Date.now();
                        var e = t;
                        if (t.touches) {
                            if (1 !== t.touches.length) return;
                            e = t.touches[0]
                        }
                        this._cachedPosition = t, window.addEventListener("mousemove", this._onMouseMove), window.addEventListener("mouseup", this._onMouseUp), document.body.addEventListener("touchmove", this._onTouchMove, {
                            passive: !1
                        }), document.body.addEventListener("touchend", this._onMouseUp), this._mouseDown = !0, this._lastMouseX = e.clientX, this._lastMouseY = e.clientY, this._lastMouseDownLon = r(this._lon), this._lastMouseDownLat = this._lat
                    }
                }, {
                    key: "_onTouchMove",
                    value: function(t) {
                        t.cancelable && t.preventDefault(), this._onMouseMove(t)
                    }
                }, {
                    key: "_onMouseMove",
                    value: function(t) {
                        if (this._mouseDown) {
                            this._dragging = !0;
                            var e = t;
                            if (t.touches && (e = t.touches[0]), this._cachedPosition.clientX !== e.clientX || this._cachedPosition.clientY !== e.clientY) {
                                var i = this._lastMouseX - e.clientX,
                                    n = this._lastMouseY - e.clientY,
                                    s = i / this._viewerWidth,
                                    o = n / this._viewerHeight;
                                if (this._cachedPosition) {
                                    var a = this._cachedPosition.clientX - e.clientX,
                                        c = this._cachedPosition.clientY - e.clientY;
                                    this._velocity.x = Math.max(Math.min(a, this._maxVelocity), -this._maxVelocity), this._velocity.y = Math.max(Math.min(c, this._maxVelocity), -this._maxVelocity)
                                }
                                this._lon = r(135 * s + this._lastMouseDownLon), this._lat = 90 * o + this._lastMouseDownLat, this._cachedPosition = e, this._mouseMoveTime = Date.now()
                            }
                        }
                    }
                }, {
                    key: "setViewerSize",
                    value: function(t, e) {
                        this._viewerWidth = t, this._viewerHeight = e
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        this._removeEventListeners()
                    }
                }, {
                    key: "isActive",
                    get: function() {
                        return this._mouseDown || this._hasInertia && (Math.abs(this._velocity.x) > this._minVelocity || Math.abs(this._velocity.y) > this._minVelocity)
                    }
                }, {
                    key: "scale",
                    get: function() {
                        return this._scale
                    }
                }]), e
            }();
        e.exports = a
    }, {
        "../utils/normalizeLongitude": 145,
        "./InertialControls": 140
    }],
    143: [function(t, e, i) {
        "use strict";
        var n = t("./normalizeLongitude");
        e.exports = function(t) {
            var e = t;
            return Math.abs(e) > 180 ? n(e) : e > 0 ? -360 + e : 360 + e
        }
    }, {
        "./normalizeLongitude": 145
    }],
    144: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i, n, r) {
            return n + (r - n) * (t - e) / (i - e)
        }
    }, {}],
    145: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            var e = t;
            return e > 180 ? e = e % 180 - 180 : e <= -180 && (e = e % 180 + 180), e
        }
    }, {}],
    146: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-raf-emitter/update");
        e.exports = function(t, e) {
            return new Promise(function(i) {
                var r = performance.now();
                n(function s() {
                    var o = (performance.now() - r) / t;
                    o >= 1 ? (e(1), i()) : (o, e(o), n(s))
                })
            })
        }
    }, {
        "@marcom/ac-raf-emitter/update": 136
    }],
    147: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i) {
            var n = THREE.Math.degToRad(90 - t),
                r = THREE.Math.degToRad(e),
                s = i * Math.sin(n) * Math.cos(r),
                o = i * Math.cos(n),
                a = i * Math.sin(n) * Math.sin(r);
            return new THREE.Vector3(s, o, a)
        }
    }, {}],
    148: [function(t, e, i) {
        arguments[4][2][0].apply(i, arguments)
    }, {
        "./../maps/focusableElement": 154,
        dup: 2
    }],
    149: [function(t, e, i) {
        arguments[4][3][0].apply(i, arguments)
    }, {
        "./../maps/ariaMap": 153,
        "./TabManager": 148,
        "./setAttributes": 151,
        dup: 3
    }],
    150: [function(t, e, i) {
        arguments[4][5][0].apply(i, arguments)
    }, {
        dup: 5
    }],
    151: [function(t, e, i) {
        arguments[4][6][0].apply(i, arguments)
    }, {
        dup: 6
    }],
    152: [function(t, e, i) {
        arguments[4][7][0].apply(i, arguments)
    }, {
        "./../maps/ariaMap": 153,
        "./removeAttributes": 150,
        "./setAttributes": 151,
        dup: 7
    }],
    153: [function(t, e, i) {
        arguments[4][9][0].apply(i, arguments)
    }, {
        dup: 9
    }],
    154: [function(t, e, i) {
        arguments[4][10][0].apply(i, arguments)
    }, {
        dup: 10
    }],
    155: [function(t, e, i) {
        "use strict";
        var n = t("./request/factory"),
            r = {
                complete: function(t, e) {},
                error: function(t, e) {},
                method: "GET",
                headers: {},
                success: function(t, e, i) {},
                timeout: 5e3
            },
            s = {
                ajax: function(t, e) {
                    e = function() {
                        for (var t = 1; t < arguments.length; t++)
                            for (var e in arguments[t]) arguments[t].hasOwnProperty(e) && (arguments[0][e] = arguments[t][e]);
                        return arguments[0]
                    }({}, r, e), "//" === t.substr(0, 2) && (t = window.location.protocol + t);
                    var i = n(t);
                    return i.open(e.method, t), i.setTransportHeaders(e.headers), i.setReadyStateChangeHandlers(e.complete, e.error, e.success), i.setTimeout(e.timeout, e.error, e.complete), i.send(e.data), i
                },
                get: function(t, e) {
                    return e.method = "GET", s.ajax(t, e)
                },
                head: function(t, e) {
                    return e.method = "HEAD", s.ajax(t, e)
                },
                post: function(t, e) {
                    return e.method = "POST", s.ajax(t, e)
                }
            };
        e.exports = s
    }, {
        "./request/factory": 156
    }],
    156: [function(t, e, i) {
        "use strict";
        var n = t("./xmlhttprequest"),
            r = t("./xdomainrequest"),
            s = /.*(?=:\/\/)/,
            o = /^.*:\/\/|\/.+$/g,
            a = window.XDomainRequest && document.documentMode < 10;
        e.exports = function(t, e) {
            return new(a && function(t) {
                return !!t.match(s) && t.replace(o, "") !== window.location.hostname
            }(t) ? r : n)
        }
    }, {
        "./xdomainrequest": 158,
        "./xmlhttprequest": 159
    }],
    157: [function(t, e, i) {
        "use strict";
        var n = function() {};
        n.create = function() {
            var t = function() {};
            return t.prototype = n.prototype, new t
        }, n.prototype.open = function(t, e) {
            t = t.toUpperCase(), this.xhr.open(t, e)
        }, n.prototype.send = function(t) {
            this.xhr.send(t)
        }, n.prototype.setTimeout = function(t, e, i) {
            this.xhr.ontimeout = function() {
                e(this.xhr, this.status), i(this.xhr, this.status)
            }.bind(this)
        }, n.prototype.setTransportHeaders = function(t) {
            for (var e in t) this.xhr.setRequestHeader(e, t[e])
        }, e.exports = n
    }, {}],
    158: [function(t, e, i) {
        "use strict";
        var n = t("./request"),
            r = t("@marcom/ac-object/toQueryParameters"),
            s = function() {
                this.xhr = new XDomainRequest
            };
        (s.prototype = n.create()).setReadyStateChangeHandlers = function(t, e, i) {
            this.xhr.onerror = function() {
                e(this.xhr, this.status), t(this.xhr, this.status)
            }.bind(this), this.xhr.onload = function() {
                i(this.xhr.responseText, this.xhr.status, this.xhr), t(this.xhr, this.status)
            }.bind(this)
        }, s.prototype.send = function(t) {
            t && "object" == typeof t && (t = r(t)), this.xhr.send(t)
        }, s.prototype.setTransportHeaders = function(t) {}, e.exports = s
    }, {
        "./request": 157,
        "@marcom/ac-object/toQueryParameters": 224
    }],
    159: [function(t, e, i) {
        "use strict";
        var n = t("./request"),
            r = function() {
                this.xhr = new XMLHttpRequest
            };
        (r.prototype = n.create()).setReadyStateChangeHandlers = function(t, e, i) {
            this.xhr.onreadystatechange = function(n) {
                4 === this.xhr.readyState && (clearTimeout(this.timeout), this.xhr.status >= 200 && this.xhr.status < 300 ? (i(this.xhr.responseText, this.xhr.status, this.xhr), t(this.xhr, this.status)) : (e(this.xhr, this.status), t(this.xhr, this.status)))
            }.bind(this)
        }, e.exports = r
    }, {
        "./request": 157
    }],
    160: [function(t, e, i) {
        "use strict";
        e.exports = {
            log: t("./ac-console/log")
        }
    }, {
        "./ac-console/log": 161
    }],
    161: [function(t, e, i) {
        "use strict";
        var n = !! function() {
            try {
                return window.localStorage.getItem("f7c9180f-5c45-47b4-8de4-428015f096c0")
            } catch (t) {}
        }();
        e.exports = function() {
            window.console && void 0 !== console.log && n && console.log.apply(console, Array.prototype.slice.call(arguments, 0))
        }
    }, {}],
    162: [function(t, e, i) {
        "use strict";
        var n, r = t("@marcom/ac-object/extend"),
            s = t("@marcom/ac-object/create"),
            o = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            a = t("@marcom/ac-dom-traversal/querySelectorAll"),
            c = t("@marcom/ac-dom-events/addEventListener"),
            l = t("@marcom/ac-dom-events/removeEventListener"),
            h = t("@marcom/ac-console");
        try {
            n = t("@marcom/ac-analytics")
        } catch (t) {
            h.log(t.message)
        }
        var u = {
                dataAttribute: "analytics-share",
                interactionEvents: ["click"],
                autoEnable: !0
            },
            d = function(t) {
                t = t || {}, this.options = r(u, t), o.call(this), this.elements = [], this.eventObserver = null, this.publishShareClick = this.publishShareClick.bind(this), this.options.autoEnable && this.enable()
            },
            p = o.prototype,
            f = d.prototype = s(p);
        f.enable = function() {
            if (!n) return !1;
            this._createObserver(), this.bindEventListener()
        }, f.disable = function() {
            if (!n) return !1;
            this.unbindEventListener()
        }, f.bindEventListener = function() {
            var t;
            this.elements = this.populateElements(), t = this.elements.length;
            for (var e = 0; e < t; e++) c(this.elements[e], "click", this.publishShareClick)
        }, f.unbindEventListener = function() {
            for (var t = this.elements && this.elements.length ? this.elements.length : 0, e = 0; e < t; e++) l(this.elements[e], "click", this.publishShareClick)
        }, f.populateElements = function() {
            return a("[data-" + this.options.dataAttribute + "]", this.options.context || document)
        }, f.publishShareClick = function(t) {
            var e = t.currentTarget,
                i = this.parseDataAttribute(e.getAttribute("data-" + this.options.dataAttribute));
            if ("object" == typeof i) {
                if (!i.title) return console.log("data-" + this.options.dataAttribute + " attribute must have a `title` property"), !1;
                this.trigger("click", i)
            }
        }, f.parseDataAttribute = function(t) {
            var e = {};
            try {
                e = JSON.parse(t)
            } catch (t) {
                console.log("data-" + this.options.dataAttribute + " must be a valid JSON string")
            }
            return e
        }, f.destroy = function() {
            this.disable(), this.elements = [], this.eventObserver = null, this.publishShareClick = null, this.options = null
        }, f._createObserver = function() {
            if (!n || !n.observer || !n.observer.Event) return !1;
            this.eventObserver = new n.observer.Event(this, this.options)
        }, e.exports = d
    }, {
        "@marcom/ac-analytics": "@marcom/ac-analytics",
        "@marcom/ac-console": 160,
        "@marcom/ac-dom-events/addEventListener": 167,
        "@marcom/ac-dom-events/removeEventListener": 168,
        "@marcom/ac-dom-traversal/querySelectorAll": 196,
        "@marcom/ac-event-emitter-micro": 201,
        "@marcom/ac-object/create": 222,
        "@marcom/ac-object/extend": 223
    }],
    163: [function(t, e, i) {
        "use strict";
        var n = t("./../AnalyticsShare");
        e.exports = function(t) {
            return new n(t)
        }
    }, {
        "./../AnalyticsShare": 162
    }],
    164: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            if ("function" == typeof t.select) {
                t.select() || t.setSelectionRange(0, t.value.length)
            } else {
                var e = document.createRange();
                e.selectNodeContents(t);
                var i = window.getSelection();
                i.removeAllRanges(), i.addRange(e)
            }
        }
    }, {}],
    165: [function(t, e, i) {
        "use strict";
        var n, r = window || self;
        try {
            n = !!r.localStorage.getItem("f7c9180f-5c45-47b4-8de4-428015f096c0")
        } catch (t) {}
        e.exports = function(t) {
            return function() {
                if (n && "object" == typeof window.console) return console[t].apply(console, Array.prototype.slice.call(arguments, 0))
            }
        }
    }, {}],
    166: [function(t, e, i) {
        "use strict";
        e.exports = t("./internal/expose")("log")
    }, {
        "./internal/expose": 165
    }],
    167: [function(t, e, i) {
        arguments[4][20][0].apply(i, arguments)
    }, {
        "./shared/getEventType": 169,
        "./utils/addEventListener": 170,
        dup: 20
    }],
    168: [function(t, e, i) {
        arguments[4][24][0].apply(i, arguments)
    }, {
        "./shared/getEventType": 169,
        "./utils/removeEventListener": 171,
        dup: 24
    }],
    169: [function(t, e, i) {
        arguments[4][25][0].apply(i, arguments)
    }, {
        "@marcom/ac-prefixer/getEventType": 232,
        dup: 25
    }],
    170: [function(t, e, i) {
        arguments[4][29][0].apply(i, arguments)
    }, {
        dup: 29
    }],
    171: [function(t, e, i) {
        arguments[4][31][0].apply(i, arguments)
    }, {
        dup: 31
    }],
    172: [function(t, e, i) {
        "use strict";
        e.exports = {
            getContentDimensions: t("./getContentDimensions"),
            getDimensions: t("./getDimensions"),
            getPagePosition: t("./getPagePosition"),
            getPercentInViewport: t("./getPercentInViewport"),
            getPixelsInViewport: t("./getPixelsInViewport"),
            getPosition: t("./getPosition"),
            getScrollX: t("./getScrollX"),
            getScrollY: t("./getScrollY"),
            getViewportPosition: t("./getViewportPosition"),
            isInViewport: t("./isInViewport")
        }
    }, {
        "./getContentDimensions": 173,
        "./getDimensions": 174,
        "./getPagePosition": 175,
        "./getPercentInViewport": 176,
        "./getPixelsInViewport": 177,
        "./getPosition": 178,
        "./getScrollX": 179,
        "./getScrollY": 180,
        "./getViewportPosition": 181,
        "./isInViewport": 182
    }],
    173: [function(t, e, i) {
        "use strict";
        var n = t("./utils/getBoundingClientRect");
        e.exports = function(t, e) {
            var i = 1;
            return e && (i = n(t).width / t.offsetWidth), {
                width: t.scrollWidth * i,
                height: t.scrollHeight * i
            }
        }
    }, {
        "./utils/getBoundingClientRect": 183
    }],
    174: [function(t, e, i) {
        "use strict";
        var n = t("./utils/getBoundingClientRect");
        e.exports = function(t, e) {
            var i;
            return e ? {
                width: (i = n(t)).width,
                height: i.height
            } : {
                width: t.offsetWidth,
                height: t.offsetHeight
            }
        }
    }, {
        "./utils/getBoundingClientRect": 183
    }],
    175: [function(t, e, i) {
        "use strict";
        var n = t("./getDimensions"),
            r = t("./utils/getBoundingClientRect"),
            s = t("./getScrollX"),
            o = t("./getScrollY");
        e.exports = function(t, e) {
            var i, a, c, l;
            if (e) return i = r(t), a = s(), c = o(), {
                top: i.top + c,
                right: i.right + a,
                bottom: i.bottom + c,
                left: i.left + a
            };
            for (l = n(t, e), i = {
                    top: t.offsetTop,
                    left: t.offsetLeft,
                    width: l.width,
                    height: l.height
                }; t = t.offsetParent;) i.top += t.offsetTop, i.left += t.offsetLeft;
            return {
                top: i.top,
                right: i.left + i.width,
                bottom: i.top + i.height,
                left: i.left
            }
        }
    }, {
        "./getDimensions": 174,
        "./getScrollX": 179,
        "./getScrollY": 180,
        "./utils/getBoundingClientRect": 183
    }],
    176: [function(t, e, i) {
        "use strict";
        var n = t("./getDimensions"),
            r = t("./getPixelsInViewport");
        e.exports = function(t, e) {
            return r(t, e) / n(t, e).height
        }
    }, {
        "./getDimensions": 174,
        "./getPixelsInViewport": 177
    }],
    177: [function(t, e, i) {
        "use strict";
        var n = t("./getViewportPosition");
        e.exports = function(t, e) {
            var i, r = document.documentElement.clientHeight,
                s = n(t, e);
            return s.top >= r || s.bottom <= 0 ? 0 : (i = s.bottom - s.top, s.top < 0 && (i += s.top), s.bottom > r && (i -= s.bottom - r), i)
        }
    }, {
        "./getViewportPosition": 181
    }],
    178: [function(t, e, i) {
        "use strict";
        var n = t("./getDimensions"),
            r = t("./utils/getBoundingClientRect");
        e.exports = function(t, e) {
            var i, s, o;
            return e ? (i = r(t), t.offsetParent && (s = r(t.offsetParent), i.top -= s.top, i.left -= s.left)) : (o = n(t, e), i = {
                top: t.offsetTop,
                left: t.offsetLeft,
                width: o.width,
                height: o.height
            }), {
                top: i.top,
                right: i.left + i.width,
                bottom: i.top + i.height,
                left: i.left
            }
        }
    }, {
        "./getDimensions": 174,
        "./utils/getBoundingClientRect": 183
    }],
    179: [function(t, e, i) {
        arguments[4][32][0].apply(i, arguments)
    }, {
        dup: 32
    }],
    180: [function(t, e, i) {
        arguments[4][33][0].apply(i, arguments)
    }, {
        dup: 33
    }],
    181: [function(t, e, i) {
        "use strict";
        var n = t("./getPagePosition"),
            r = t("./utils/getBoundingClientRect"),
            s = t("./getScrollX"),
            o = t("./getScrollY");
        e.exports = function(t, e) {
            var i, a, c;
            return e ? {
                top: (i = r(t)).top,
                right: i.right,
                bottom: i.bottom,
                left: i.left
            } : (i = n(t), a = s(), c = o(), {
                top: i.top - c,
                right: i.right - a,
                bottom: i.bottom - c,
                left: i.left - a
            })
        }
    }, {
        "./getPagePosition": 175,
        "./getScrollX": 179,
        "./getScrollY": 180,
        "./utils/getBoundingClientRect": 183
    }],
    182: [function(t, e, i) {
        "use strict";
        var n = t("./getPixelsInViewport"),
            r = t("./getPercentInViewport");
        e.exports = function(t, e, i) {
            var s;
            return "string" == typeof(i = i || 0) && "px" === i.slice(-2) ? (i = parseInt(i, 10), s = n(t, e)) : s = r(t, e), s > 0 && s >= i
        }
    }, {
        "./getPercentInViewport": 176,
        "./getPixelsInViewport": 177
    }],
    183: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            var e = t.getBoundingClientRect();
            return {
                top: e.top,
                right: e.right,
                bottom: e.bottom,
                left: e.left,
                width: e.width || e.right - e.left,
                height: e.height || e.bottom - e.top
            }
        }
    }, {}],
    184: [function(t, e, i) {
        arguments[4][34][0].apply(i, arguments)
    }, {
        dup: 34
    }],
    185: [function(t, e, i) {
        arguments[4][35][0].apply(i, arguments)
    }, {
        dup: 35
    }],
    186: [function(t, e, i) {
        arguments[4][36][0].apply(i, arguments)
    }, {
        dup: 36
    }],
    187: [function(t, e, i) {
        arguments[4][37][0].apply(i, arguments)
    }, {
        dup: 37
    }],
    188: [function(t, e, i) {
        arguments[4][38][0].apply(i, arguments)
    }, {
        dup: 38
    }],
    189: [function(t, e, i) {
        arguments[4][39][0].apply(i, arguments)
    }, {
        "../isNode": 193,
        dup: 39
    }],
    190: [function(t, e, i) {
        arguments[4][40][0].apply(i, arguments)
    }, {
        "../COMMENT_NODE": 184,
        "../DOCUMENT_FRAGMENT_NODE": 185,
        "../ELEMENT_NODE": 187,
        "../TEXT_NODE": 188,
        "./isNodeType": 189,
        dup: 40
    }],
    191: [function(t, e, i) {
        arguments[4][41][0].apply(i, arguments)
    }, {
        "./DOCUMENT_FRAGMENT_NODE": 185,
        "./internal/isNodeType": 189,
        dup: 41
    }],
    192: [function(t, e, i) {
        arguments[4][42][0].apply(i, arguments)
    }, {
        "./ELEMENT_NODE": 187,
        "./internal/isNodeType": 189,
        dup: 42
    }],
    193: [function(t, e, i) {
        arguments[4][43][0].apply(i, arguments)
    }, {
        dup: 43
    }],
    194: [function(t, e, i) {
        arguments[4][44][0].apply(i, arguments)
    }, {
        "./internal/validate": 190,
        dup: 44
    }],
    195: [function(t, e, i) {
        arguments[4][46][0].apply(i, arguments)
    }, {
        "@marcom/ac-dom-nodes/COMMENT_NODE": 184,
        "@marcom/ac-dom-nodes/DOCUMENT_FRAGMENT_NODE": 185,
        "@marcom/ac-dom-nodes/DOCUMENT_NODE": 186,
        "@marcom/ac-dom-nodes/ELEMENT_NODE": 187,
        "@marcom/ac-dom-nodes/TEXT_NODE": 188,
        "@marcom/ac-dom-nodes/isNode": 193,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 228,
        dup: 46
    }],
    196: [function(t, e, i) {
        arguments[4][48][0].apply(i, arguments)
    }, {
        "./internal/validate": 195,
        "./shims/querySelectorAll": 197,
        "@marcom/ac-polyfills/Array/prototype.slice": 229,
        dup: 48
    }],
    197: [function(t, e, i) {
        arguments[4][50][0].apply(i, arguments)
    }, {
        "@marcom/ac-dom-nodes/isDocumentFragment": 191,
        "@marcom/ac-dom-nodes/isElement": 192,
        "@marcom/ac-dom-nodes/remove": 194,
        "@marcom/ac-polyfills/Array/prototype.indexOf": 228,
        dup: 50
    }],
    198: [function(t, e, i) {
        "use strict";
        var n = "Ease expects an easing function.";

        function r(t, e) {
            if ("function" != typeof t) throw new TypeError(n);
            this.easingFunction = t, this.cssString = e || null
        }
        r.prototype.getValue = function(t) {
            return this.easingFunction(t, 0, 1, 1)
        }, e.exports = r
    }, {}],
    199: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-polyfills/Array/prototype.every");
        var n = t("./Ease"),
            r = t("./helpers/KeySpline");
        e.exports = function(t, e, i, s) {
            var o = Array.prototype.slice.call(arguments),
                a = o.every(function(t) {
                    return "number" == typeof t
                });
            if (4 !== o.length || !a) throw new TypeError("Bezier curve expects exactly four (4) numbers. Given: " + o);
            var c = new r(t, e, i, s),
                l = "cubic-bezier(" + o.join(", ") + ")";
            return new n(function(t, e, i, n) {
                return c.get(t / n) * i + e
            }, l)
        }
    }, {
        "./Ease": 198,
        "./helpers/KeySpline": 200,
        "@marcom/ac-polyfills/Array/prototype.every": 226
    }],
    200: [function(t, e, i) {
        e.exports = function(t, e, i, n) {
            function r(t, e) {
                return 1 - 3 * e + 3 * t
            }

            function s(t, e) {
                return 3 * e - 6 * t
            }

            function o(t) {
                return 3 * t
            }

            function a(t, e, i) {
                return ((r(e, i) * t + s(e, i)) * t + o(e)) * t
            }
            this.get = function(c) {
                return t === e && i === n ? c : a(function(e) {
                    for (var n = e, c = 0; c < 4; ++c) {
                        var l = (u = n, 3 * r(d = t, p = i) * u * u + 2 * s(d, p) * u + o(d));
                        if (0 === l) return n;
                        var h = a(n, t, i) - e;
                        n -= h / l
                    }
                    var u, d, p;
                    return n
                }(c), e, n)
            }
        }
    }, {}],
    201: [function(t, e, i) {
        arguments[4][51][0].apply(i, arguments)
    }, {
        "./ac-event-emitter-micro/EventEmitterMicro": 202,
        dup: 51
    }],
    202: [function(t, e, i) {
        arguments[4][52][0].apply(i, arguments)
    }, {
        dup: 52
    }],
    203: [function(t, e, i) {
        arguments[4][55][0].apply(i, arguments)
    }, {
        dup: 55
    }],
    204: [function(t, e, i) {
        arguments[4][56][0].apply(i, arguments)
    }, {
        "./helpers/globals": 203,
        "./touchAvailable": 208,
        "@marcom/ac-function/once": 216,
        dup: 56
    }],
    205: [function(t, e, i) {
        arguments[4][57][0].apply(i, arguments)
    }, {
        "./isDesktop": 204,
        "./isTablet": 207,
        "@marcom/ac-function/once": 216,
        dup: 57
    }],
    206: [function(t, e, i) {
        "use strict";
        var n = t("./helpers/globals");
        e.exports = function() {
            var t = n.getWindow();
            return "devicePixelRatio" in t && t.devicePixelRatio >= 1.5
        }
    }, {
        "./helpers/globals": 203
    }],
    207: [function(t, e, i) {
        arguments[4][58][0].apply(i, arguments)
    }, {
        "./helpers/globals": 203,
        "./isDesktop": 204,
        "@marcom/ac-function/once": 216,
        dup: 58
    }],
    208: [function(t, e, i) {
        arguments[4][59][0].apply(i, arguments)
    }, {
        "./helpers/globals": 203,
        "@marcom/ac-function/once": 216,
        dup: 59
    }],
    209: [function(t, e, i) {
        "use strict";
        e.exports = t("./fullscreen")
    }, {
        "./fullscreen": 215
    }],
    210: [function(t, e, i) {
        e.exports = {
            STANDARD: "standard",
            IOS: "ios"
        }
    }, {}],
    211: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-dom-events/addEventListener"),
            r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            s = t("./../events/types"),
            o = t("./../consts/modes"),
            a = new r;

        function c(t) {
            a.fullscreenElement() ? function(t) {
                a.trigger(s.ENTERFULLSCREEN, t)
            }(t) : function(t) {
                a.trigger(s.EXITFULLSCREEN, t)
            }(t)
        }
        n(document, "fullscreenchange", c), a.fullscreenEnabled = function(t) {
            return !!(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)
        }, a.fullscreenElement = function() {
            return document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || document.webkitCurrentFullScreenElement
        }, a.exitFullscreen = function(t) {
            var e;
            "function" == typeof document.exitFullscreen ? e = "exitFullscreen" : "function" == typeof document.webkitExitFullscreen ? e = "webkitExitFullscreen" : "function" == typeof document.webkitCancelFullScreen ? e = "webkitCancelFullScreen" : "function" == typeof document.mozCancelFullScreen ? e = "mozCancelFullScreen" : "function" == typeof document.msExitFullscreen && (e = "msExitFullscreen"), "function" == typeof document[e] && document[e].call(document)
        }, a.requestFullscreen = function(t) {
            var e;
            "function" == typeof t.requestFullscreen ? e = "requestFullscreen" : "function" == typeof t.webkitRequestFullscreen ? e = "webkitRequestFullscreen" : "function" == typeof t.webkitRequestFullScreen ? e = "webkitRequestFullScreen" : "function" == typeof t.mozRequestFullScreen ? e = "mozRequestFullScreen" : "function" == typeof t.msRequestFullscreen && (e = "msRequestFullscreen"), "function" == typeof t[e] && t[e].call(t)
        }, a.mode = o.STANDARD, e.exports = a
    }, {
        "./../consts/modes": 210,
        "./../events/types": 214,
        "@marcom/ac-dom-events/addEventListener": 167,
        "@marcom/ac-event-emitter-micro": 201
    }],
    212: [function(t, e, i) {
        "use strict";
        var n = t("./ios"),
            r = t("./desktop");
        e.exports = {
            create: function() {
                var t = r;
                return "webkitEnterFullscreen" in document.createElement("video") && !("webkitRequestFullScreen" in document.createElement("div")) && (t = n), t
            }
        }
    }, {
        "./desktop": 211,
        "./ios": 213
    }],
    213: [function(t, e, i) {
        "use strict";
        var n, r = t("@marcom/ac-dom-events/addEventListener"),
            s = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            o = t("./../events/types"),
            a = t("./../consts/modes");

        function c(t) {
            h.trigger(o.ENTERFULLSCREEN, t)
        }

        function l(t) {
            n = void 0, h.trigger(o.EXITFULLSCREEN, t)
        }
        r(document, "webkitbeginfullscreen", c, !0), r(document, "webkitendfullscreen", l, !0);
        var h = new s;
        h.fullscreenEnabled = function(t) {
            return !!t.webkitSupportsFullscreen
        }, h.fullscreenElement = function() {
            return n
        }, h.exitFullscreen = function(t) {
            t && "function" == typeof t.webkitExitFullscreen && t.webkitExitFullscreen()
        }, h.requestFullscreen = function(t) {
            "function" == typeof t.webkitEnterFullscreen && t.webkitEnterFullscreen()
        }, h.mode = a.IOS, e.exports = h
    }, {
        "./../consts/modes": 210,
        "./../events/types": 214,
        "@marcom/ac-dom-events/addEventListener": 167,
        "@marcom/ac-event-emitter-micro": 201
    }],
    214: [function(t, e, i) {
        e.exports = {
            ENTERFULLSCREEN: "enterfullscreen",
            EXITFULLSCREEN: "exitfullscreen"
        }
    }, {}],
    215: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-event-emitter-micro").EventEmitterMicro;
        var n = "Error: Element missing. ac-fullscreen requires an element to be specified",
            r = t("./delegate/factory").create();

        function s() {
            throw new Error(n)
        }
        var o = {
            requestFullscreen: function(t) {
                return t || s(), r.requestFullscreen(t)
            },
            fullscreenEnabled: function(t) {
                return t || s(), r.fullscreenEnabled(t)
            },
            fullscreenElement: function() {
                return r.fullscreenElement()
            },
            exitFullscreen: function(t) {
                return t || s(), r.exitFullscreen(t)
            },
            getMode: function() {
                return r.mode
            },
            on: function() {
                return r.on.apply(r, arguments)
            },
            off: function() {
                return r.off.apply(r, arguments)
            },
            once: function() {
                return r.once.apply(r, arguments)
            }
        };
        e.exports = o
    }, {
        "./delegate/factory": 212,
        "@marcom/ac-event-emitter-micro": 201
    }],
    216: [function(t, e, i) {
        arguments[4][60][0].apply(i, arguments)
    }, {
        dup: 60
    }],
    217: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e) {
            var i = null;
            return function() {
                null === i && (t.apply(this, arguments), i = setTimeout(function() {
                    i = null
                }, e))
            }
        }
    }, {}],
    218: [function(t, e, i) {
        arguments[4][61][0].apply(i, arguments)
    }, {
        "./internal/KeyEvent": 219,
        "@marcom/ac-dom-events/utils/addEventListener": 170,
        "@marcom/ac-dom-events/utils/removeEventListener": 171,
        "@marcom/ac-event-emitter-micro": 201,
        "@marcom/ac-object/create": 222,
        dup: 61
    }],
    219: [function(t, e, i) {
        arguments[4][63][0].apply(i, arguments)
    }, {
        dup: 63
    }],
    220: [function(t, e, i) {
        arguments[4][64][0].apply(i, arguments)
    }, {
        dup: 64
    }],
    221: [function(t, e, i) {
        arguments[4][75][0].apply(i, arguments)
    }, {
        "./extend": 223,
        "@marcom/ac-polyfills/Array/isArray": 225,
        dup: 75
    }],
    222: [function(t, e, i) {
        arguments[4][76][0].apply(i, arguments)
    }, {
        dup: 76
    }],
    223: [function(t, e, i) {
        arguments[4][78][0].apply(i, arguments)
    }, {
        "@marcom/ac-polyfills/Array/prototype.forEach": 227,
        dup: 78
    }],
    224: [function(t, e, i) {
        arguments[4][83][0].apply(i, arguments)
    }, {
        "@marcom/ac-url/joinSearchParams": 278,
        dup: 83
    }],
    225: [function(t, e, i) {
        arguments[4][84][0].apply(i, arguments)
    }, {
        dup: 84
    }],
    226: [function(t, e, i) {
        Array.prototype.every || (Array.prototype.every = function(t, e) {
            var i, n = Object(this),
                r = n.length >>> 0;
            if ("function" != typeof t) throw new TypeError(t + " is not a function");
            for (i = 0; i < r; i += 1)
                if (i in n && !t.call(e, n[i], i, n)) return !1;
            return !0
        })
    }, {}],
    227: [function(t, e, i) {
        arguments[4][85][0].apply(i, arguments)
    }, {
        dup: 85
    }],
    228: [function(t, e, i) {
        arguments[4][86][0].apply(i, arguments)
    }, {
        dup: 86
    }],
    229: [function(t, e, i) {
        arguments[4][87][0].apply(i, arguments)
    }, {
        dup: 87
    }],
    230: [function(t, e, i) {
        Date.now || (Date.now = function() {
            return (new Date).getTime()
        })
    }, {}],
    231: [function(t, e, i) {
        t("../Date/now"),
            function() {
                if ("performance" in window == 0 && (window.performance = {}), "now" in window.performance == 0) {
                    var t = Date.now();
                    performance.timing && performance.timing.navigationStart && (t = performance.timing.navigationStart), window.performance.now = function() {
                        return Date.now() - t
                    }
                }
            }()
    }, {
        "../Date/now": 230
    }],
    232: [function(t, e, i) {
        arguments[4][91][0].apply(i, arguments)
    }, {
        "./shared/camelCasedEventTypes": 233,
        "./shared/prefixHelper": 234,
        "./shared/windowFallbackEventTypes": 235,
        "./utils/eventTypeAvailable": 236,
        dup: 91
    }],
    233: [function(t, e, i) {
        arguments[4][92][0].apply(i, arguments)
    }, {
        dup: 92
    }],
    234: [function(t, e, i) {
        arguments[4][93][0].apply(i, arguments)
    }, {
        dup: 93
    }],
    235: [function(t, e, i) {
        arguments[4][94][0].apply(i, arguments)
    }, {
        dup: 94
    }],
    236: [function(t, e, i) {
        arguments[4][95][0].apply(i, arguments)
    }, {
        dup: 95
    }],
    237: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-shared-instance").SharedInstance,
            r = function() {
                this._currentID = 0
            };
        r.prototype.getNewID = function() {
            return this._currentID++, "raf:" + this._currentID
        }, e.exports = n.share("ac-raf-emitter-id-generator:sharedRAFEmitterIDGeneratorInstance", "1.0.3", r)
    }, {
        "@marcom/ac-shared-instance": 248
    }],
    238: [function(t, e, i) {
        "use strict";
        var n, r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            s = t("@marcom/ac-raf-executor/sharedRAFExecutorInstance"),
            o = t("@marcom/ac-raf-emitter-id-generator/sharedRAFEmitterIDGeneratorInstance");

        function a(t) {
            t = t || {}, r.call(this), this.id = o.getNewID(), this.executor = t.executor || s, this._reset(), this._willRun = !1, this._didDestroy = !1
        }(n = a.prototype = Object.create(r.prototype)).run = function() {
            return this._willRun || (this._willRun = !0), this._subscribe()
        }, n.cancel = function() {
            this._unsubscribe(), this._willRun && (this._willRun = !1), this._reset()
        }, n.destroy = function() {
            var t = this.willRun();
            return this.cancel(), this.executor = null, r.prototype.destroy.call(this), this._didDestroy = !0, t
        }, n.willRun = function() {
            return this._willRun
        }, n.isRunning = function() {
            return this._isRunning
        }, n._subscribe = function() {
            return this.executor.subscribe(this)
        }, n._unsubscribe = function() {
            return this.executor.unsubscribe(this)
        }, n._onAnimationFrameStart = function(t) {
            this._isRunning = !0, this._willRun = !1, this._didEmitFrameData || (this._didEmitFrameData = !0, this.trigger("start", t))
        }, n._onAnimationFrameEnd = function(t) {
            this._willRun || (this.trigger("stop", t), this._reset())
        }, n._reset = function() {
            this._didEmitFrameData = !1, this._isRunning = !1
        }, e.exports = a
    }, {
        "@marcom/ac-event-emitter-micro": 201,
        "@marcom/ac-raf-emitter-id-generator/sharedRAFEmitterIDGeneratorInstance": 237,
        "@marcom/ac-raf-executor/sharedRAFExecutorInstance": 247
    }],
    239: [function(t, e, i) {
        "use strict";
        var n = t("./SingleCallRAFEmitter"),
            r = function(t) {
                this.rafEmitter = new n, this.rafEmitter.on(t, this._onRAFExecuted.bind(this)), this.requestAnimationFrame = this.requestAnimationFrame.bind(this), this.cancelAnimationFrame = this.cancelAnimationFrame.bind(this), this._frameCallbacks = [], this._nextFrameCallbacks = [], this._currentFrameID = -1, this._cancelFrameIdx = -1, this._frameCallbackLength = 0, this._nextFrameCallbacksLength = 0, this._frameCallbackIteration = 0
            },
            s = r.prototype;
        s.requestAnimationFrame = function(t) {
            return this._currentFrameID = this.rafEmitter.run(), this._nextFrameCallbacks.push(this._currentFrameID, t), this._nextFrameCallbacksLength += 2, this._currentFrameID
        }, s.cancelAnimationFrame = function(t) {
            this._cancelFrameIdx = this._nextFrameCallbacks.indexOf(t), -1 !== this._cancelFrameIdx && (this._nextFrameCallbacks.splice(this._cancelFrameIdx, 2), this._nextFrameCallbacksLength -= 2, 0 === this._nextFrameCallbacksLength && this.rafEmitter.cancel())
        }, s._onRAFExecuted = function(t) {
            for (this._frameCallbacks = this._nextFrameCallbacks, this._frameCallbackLength = this._nextFrameCallbacksLength, this._nextFrameCallbacks = [], this._nextFrameCallbacksLength = 0, this._frameCallbackIteration = 0; this._frameCallbackIteration < this._frameCallbackLength; this._frameCallbackIteration += 2) this._frameCallbacks[this._frameCallbackIteration + 1](t.time, t)
        }, e.exports = r
    }, {
        "./SingleCallRAFEmitter": 241
    }],
    240: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterface"),
            r = function() {
                this.events = {}
            },
            s = r.prototype;
        s.requestAnimationFrame = function(t) {
            return this.events[t] || (this.events[t] = new n(t)), this.events[t].requestAnimationFrame
        }, s.cancelAnimationFrame = function(t) {
            return this.events[t] || (this.events[t] = new n(t)), this.events[t].cancelAnimationFrame
        }, e.exports = new r
    }, {
        "./RAFInterface": 239
    }],
    241: [function(t, e, i) {
        "use strict";
        var n = t("./RAFEmitter"),
            r = function(t) {
                n.call(this, t)
            };
        (r.prototype = Object.create(n.prototype))._subscribe = function() {
            return this.executor.subscribe(this, !0)
        }, e.exports = r
    }, {
        "./RAFEmitter": 238
    }],
    242: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.cancelAnimationFrame("draw")
    }, {
        "./RAFInterfaceController": 240
    }],
    243: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.cancelAnimationFrame("update")
    }, {
        "./RAFInterfaceController": 240
    }],
    244: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.requestAnimationFrame("draw")
    }, {
        "./RAFInterfaceController": 240
    }],
    245: [function(t, e, i) {
        "use strict";
        var n = t("./RAFInterfaceController");
        e.exports = n.requestAnimationFrame("update")
    }, {
        "./RAFInterfaceController": 240
    }],
    246: [function(t, e, i) {
        "use strict";
        var n;

        function r(t) {
            t = t || {}, this._reset(), this._willRun = !1, this._totalSubscribeCount = -1, this._requestAnimationFrame = window.requestAnimationFrame, this._cancelAnimationFrame = window.cancelAnimationFrame, this._boundOnAnimationFrame = this._onAnimationFrame.bind(this), this._boundOnExternalAnimationFrame = this._onExternalAnimationFrame.bind(this)
        }
        t("@marcom/ac-polyfills/performance/now"), (n = r.prototype).subscribe = function(t, e) {
            return this._totalSubscribeCount++, this._nextFrameSubscribers[t.id] || (e ? this._nextFrameSubscribersOrder.unshift(t.id) : this._nextFrameSubscribersOrder.push(t.id), this._nextFrameSubscribers[t.id] = t, this._nextFrameSubscriberArrayLength++, this._nextFrameSubscriberCount++, this._run()), this._totalSubscribeCount
        }, n.unsubscribe = function(t) {
            return !!this._nextFrameSubscribers[t.id] && (this._nextFrameSubscribers[t.id] = null, this._nextFrameSubscriberCount--, 0 === this._nextFrameSubscriberCount && this._cancel(), !0)
        }, n.trigger = function(t, e) {
            var i;
            for (i = 0; i < this._subscriberArrayLength; i++) null !== this._subscribers[this._subscribersOrder[i]] && !1 === this._subscribers[this._subscribersOrder[i]]._didDestroy && this._subscribers[this._subscribersOrder[i]].trigger(t, e)
        }, n.destroy = function() {
            var t = this._cancel();
            return this._subscribers = null, this._subscribersOrder = null, this._nextFrameSubscribers = null, this._nextFrameSubscribersOrder = null, this._rafData = null, this._boundOnAnimationFrame = null, this._onExternalAnimationFrame = null, t
        }, n.useExternalAnimationFrame = function(t) {
            if ("boolean" == typeof t) {
                var e = this._isUsingExternalAnimationFrame;
                return t && this._animationFrame && (this._cancelAnimationFrame.call(window, this._animationFrame), this._animationFrame = null), !this._willRun || t || this._animationFrame || (this._animationFrame = this._requestAnimationFrame.call(window, this._boundOnAnimationFrame)), this._isUsingExternalAnimationFrame = t, t ? this._boundOnExternalAnimationFrame : e || !1
            }
        }, n._run = function() {
            if (!this._willRun) return this._willRun = !0, 0 === this.lastFrameTime && (this.lastFrameTime = performance.now()), this._animationFrameActive = !0, this._isUsingExternalAnimationFrame || (this._animationFrame = this._requestAnimationFrame.call(window, this._boundOnAnimationFrame)), !0
        }, n._cancel = function() {
            var t = !1;
            return this._animationFrameActive && (this._animationFrame && (this._cancelAnimationFrame.call(window, this._animationFrame), this._animationFrame = null), this._animationFrameActive = !1, this._willRun = !1, t = !0), this._isRunning || this._reset(), t
        }, n._onSubscribersAnimationFrameStart = function(t) {
            var e;
            for (e = 0; e < this._subscriberArrayLength; e++) null !== this._subscribers[this._subscribersOrder[e]] && !1 === this._subscribers[this._subscribersOrder[e]]._didDestroy && this._subscribers[this._subscribersOrder[e]]._onAnimationFrameStart(t)
        }, n._onSubscribersAnimationFrameEnd = function(t) {
            var e;
            for (e = 0; e < this._subscriberArrayLength; e++) null !== this._subscribers[this._subscribersOrder[e]] && !1 === this._subscribers[this._subscribersOrder[e]]._didDestroy && this._subscribers[this._subscribersOrder[e]]._onAnimationFrameEnd(t)
        }, n._onAnimationFrame = function(t) {
            this._subscribers = this._nextFrameSubscribers, this._subscribersOrder = this._nextFrameSubscribersOrder, this._subscriberArrayLength = this._nextFrameSubscriberArrayLength, this._subscriberCount = this._nextFrameSubscriberCount, this._nextFrameSubscribers = {}, this._nextFrameSubscribersOrder = [], this._nextFrameSubscriberArrayLength = 0, this._nextFrameSubscriberCount = 0, this._isRunning = !0, this._willRun = !1, this._didRequestNextRAF = !1, this._rafData.delta = t - this.lastFrameTime, this.lastFrameTime = t, this._rafData.fps = 0, this._rafData.delta >= 1e3 && (this._rafData.delta = 0), 0 !== this._rafData.delta && (this._rafData.fps = 1e3 / this._rafData.delta), this._rafData.time = t, this._rafData.naturalFps = this._rafData.fps, this._rafData.timeNow = Date.now(), this._onSubscribersAnimationFrameStart(this._rafData), this.trigger("update", this._rafData), this.trigger("external", this._rafData), this.trigger("draw", this._rafData), this._onSubscribersAnimationFrameEnd(this._rafData), this._willRun || this._reset()
        }, n._onExternalAnimationFrame = function(t) {
            this._isUsingExternalAnimationFrame && this._onAnimationFrame(t)
        }, n._reset = function() {
            this._rafData = {
                time: 0,
                delta: 0,
                fps: 0,
                naturalFps: 0,
                timeNow: 0
            }, this._subscribers = {}, this._subscribersOrder = [], this._subscriberArrayLength = 0, this._subscriberCount = 0, this._nextFrameSubscribers = {}, this._nextFrameSubscribersOrder = [], this._nextFrameSubscriberArrayLength = 0, this._nextFrameSubscriberCount = 0, this._didEmitFrameData = !1, this._animationFrame = null, this._animationFrameActive = !1, this._isRunning = !1, this._shouldReset = !1, this.lastFrameTime = 0
        }, e.exports = r
    }, {
        "@marcom/ac-polyfills/performance/now": 231
    }],
    247: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-shared-instance").SharedInstance,
            r = t("./RAFExecutor");
        e.exports = n.share("ac-raf-executor:sharedRAFExecutorInstance", "2.0.1", r)
    }, {
        "./RAFExecutor": 246,
        "@marcom/ac-shared-instance": 248
    }],
    248: [function(t, e, i) {
        "use strict";
        e.exports = {
            SharedInstance: t("./ac-shared-instance/SharedInstance")
        }
    }, {
        "./ac-shared-instance/SharedInstance": 249
    }],
    249: [function(t, e, i) {
        "use strict";
        var n, r = window,
            s = r.AC,
            o = (n = {}, {
                get: function(t, e) {
                    var i = null;
                    return n[t] && n[t][e] && (i = n[t][e]), i
                },
                set: function(t, e, i) {
                    return n[t] || (n[t] = {}), n[t][e] = "function" == typeof i ? new i : i, n[t][e]
                },
                share: function(t, e, i) {
                    var n = this.get(t, e);
                    return n || (n = this.set(t, e, i)), n
                },
                remove: function(t, e) {
                    var i = typeof e;
                    if ("string" !== i && "number" !== i) n[t] && (n[t] = null);
                    else {
                        if (!n[t] || !n[t][e]) return;
                        n[t][e] = null
                    }
                }
            });
        s || (s = r.AC = {}), s.SharedInstance || (s.SharedInstance = o), e.exports = s.SharedInstance
    }, {}],
    250: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-event-emitter-micro"),
            r = t("@marcom/ac-dom-metrics"),
            s = t("@marcom/ac-keyboard/Keyboard"),
            o = {
                num: 37,
                string: "ArrowLeft"
            },
            a = 38,
            c = {
                num: 39,
                string: "ArrowRight"
            },
            l = {
                num: 40,
                string: "ArrowDown"
            },
            h = [o, c, l, c],
            u = function(t) {
                if (t.which) return t.which;
                for (var e = t.key ? t.key : t.code, i = 0, n = h.length; i < n; i++)
                    if (h[i].string === e) return h[i].num;
                return -1
            },
            d = {
                min: 0,
                max: 1,
                step: 1,
                value: 0,
                orientation: "horizontal",
                renderedPosition: !1,
                template: '<div class="ac-slider-runnable-track">\n\t<div class="ac-slider-thumb"></div>\n</div>',
                keyboardMaxStepPercentage: .05,
                keyboardStepMultiplier: 1.25,
                containerClass: "ac-slider-container",
                grabbedClass: "ac-slider-grabbed"
            },
            p = Object.keys(d),
            f = function(t, e) {
                this.options = Object.assign({}, d, e), this.model = Object.create(this.options), this.el = t;
                var i = void 0 !== this.options.keyboardContext ? this.options.keyboardContext : this.el;
                null !== i && (this._keyboard = new s(i), this._keyDown = {}), t.classList.add(this.model.containerClass), t.innerHTML = this.model.template, n.EventEmitterMicro.call(this), this._initialize()
            },
            m = f.prototype = Object.create(n.EventEmitterMicro.prototype);
        m._addGrabClass = function() {
            this.el.classList.add(this.model.grabbedClass)
        }, m._removeGrabClass = function() {
            this.el.classList.remove(this.model.grabbedClass)
        }, m._addEventListeners = function() {
            this._addEventListener(this.el, "mousedown", this._onMouseDown), this._addEventListener(this.el, "touchstart", this._onTouchStart), this._addEventListener(this.el, "mouseover", this._onMouseOver), this._addEventListener(this.el, "mouseleave", this._onMouseLeave), this._keyboard && ("horizontal" === this.model.orientation ? (this._keyboard.onDown(c.num, this.stepUp), this._keyboard.onDown(o.num, this.stepDown)) : (this._keyboard.onDown(l.num, this.stepDown), this._keyboard.onDown(a, this.stepUp)))
        }, m._addEventListener = function(t, e, i) {
            t.addEventListener(e, i)
        }, m._bindMethods = function() {
            this._addGrabClass = this._addGrabClass.bind(this), this._removeGrabClass = this._removeGrabClass.bind(this), this.stepDown = this.stepDown.bind(this), this.stepUp = this.stepUp.bind(this), this._triggerRelease = this._triggerRelease.bind(this), this._preventDefault = this._preventDefault.bind(this), this._onMouseDown = this._bindMethod(this._onMouseDown, this), this._onTouchStart = this._bindMethod(this._onTouchStart, this), this._onMouseOver = this._bindMethod(this._onMouseOver, this), this._onMouseLeave = this._bindMethod(this._onMouseLeave, this), this._onTouchEnd = this._bindMethod(this._onTouchEnd, this), this._onMouseUp = this._bindMethod(this._onMouseUp, this), this._onMouseMove = this._bindMethod(this._onMouseMove, this), this._onTouchMove = this._bindMethod(this._onTouchMove, this)
        }, m._bindMethod = function(t, e) {
            return t.bind(e)
        }, m._correctValueMinMax = function(t, e, i) {
            return t > i && (t = i), t < e && (t = e), t
        }, m._calculateStepsToValue = function(t, e) {
            return Math.abs(t - e)
        }, m._calculateMaxSteps = function(t, e) {
            return Math.abs(e - t)
        }, m._calculateStepsEqualToPercentage = function(t, e) {
            return t / 100 * e
        }, m._calculateNextStepInRange = function(t, e, i, n) {
            var r = this._calculateMaxSteps(e, i),
                s = this._calculateStepsToValue(t, e),
                o = e + Math.floor(r / n) * n;
            return t = Math.min(o, e + Math.round(s / n) * n)
        }, m._dispatchEvent = function(t, e) {
            t.dispatchEvent(new CustomEvent(e))
        }, m.disableUserControls = function() {
            this._removeEventListeners()
        }, m.enableUserControls = function() {
            this._addEventListeners()
        }, m._getNextValue = function(t, e, i, n) {
            return t = this._correctValueMinMax(t, e, i), "auto" !== n && (t = this._calculateNextStepInRange(t, e, i, n)), t
        }, m.getOrientation = function() {
            return this.model.orientation
        }, m.getValue = function() {
            return this.model.value
        }, m.getMin = function() {
            return this.model.min
        }, m.getMax = function() {
            return this.model.max
        }, m.getStep = function() {
            return this.model.step
        }, m.getClientXValue = function(t, e) {
            var i = this._getClientXFromEvent(t),
                n = null !== e ? r.getDimensions(e || this.thumbElement) : {
                    width: 0,
                    height: 0
                },
                s = r.getDimensions(this.runnableTrackElement),
                o = (i - this.runnableTrackElement.getBoundingClientRect().left - Math.round(n.width / 2)) / (s.width - n.width) * 100,
                a = this._calculateMaxSteps(this.getMin(), this.getMax()),
                c = this._calculateStepsEqualToPercentage(o, a);
            return this.getMin() + c
        }, m.getClientYValue = function(t) {
            var e = this._getClientYFromEvent(t),
                i = r.getDimensions(this.thumbElement),
                n = r.getDimensions(this.runnableTrackElement),
                s = r.getViewportPosition(this.runnableTrackElement, this.model.renderedPosition),
                o = (n.height - i.height - (e - s.top - i.height / 2)) / (n.height - i.height) * 100,
                a = this._calculateMaxSteps(this.model.min, this.model.max),
                c = this._calculateStepsEqualToPercentage(o, a);
            return this.model.min + c
        }, m.getClientValue = function(t) {
            return t = t.originalEvent || t, "horizontal" === this.model.orientation ? this.getClientXValue(t) : this.getClientYValue(t)
        }, m._getClientXFromEvent = function(t) {
            return t.touches ? t.touches[0].clientX : t.clientX
        }, m._getClientYFromEvent = function(t) {
            return t.touches ? t.touches[0].clientY : t.clientY
        }, m._initialize = function() {
            this._setNodeReferences(), this.setValue(this.model.value), this._bindMethods(), this._addEventListeners()
        }, m._onMouseLeave = function() {
            this._preventDocumentMouseUpDispatch = !1
        }, m._onMouseDown = function(t) {
            this._addGrabClass(), this._addEventListener(document, "mouseup", this._onMouseUp), this._addEventListener(document, "mousemove", this._onMouseMove);
            var e = this.getClientValue(t);
            this.trigger("grab", this.getValue()), this.setValue(e)
        }, m._onMouseUp = function() {
            this._removeGrabClass(), this._removeEventListener(document, "mouseup", this._onMouseUp), this._removeEventListener(document, "mousemove", this._onMouseMove), this.trigger("release", this.getValue()), this._preventDocumentMouseUpDispatch || this._dispatchEvent(this.el, "mouseup")
        }, m._onMouseOver = function() {
            this._preventDocumentMouseUpDispatch = !0
        }, m._onTouchEnd = function() {
            this._removeGrabClass(), this._removeEventListener(document, "touchend", this._onTouchEnd), this._removeEventListener(document, "touchmove", this._onTouchMove), this.trigger("release", this.getValue()), this._preventDocumentMouseUpDispatch || this._dispatchEvent(this.el, "touchend")
        }, m._onTouchStart = function(t) {
            this._addGrabClass();
            var e = this.getClientValue(t);
            this._addEventListener(document, "touchend", this._onTouchEnd), this._addEventListener(document, "touchmove", this._onTouchMove), this.trigger("grab", this.getValue()), this.setValue(e)
        }, m._onMouseMove = function(t) {
            var e = this.getClientValue(t);
            this.setValue(e)
        }, m._onTouchMove = function(t) {
            t.preventDefault && t.preventDefault();
            var e = this.getClientValue(t);
            this.setValue(e)
        }, m._getElementOrientationOffsetValue = function(t, e) {
            return "horizontal" === e ? r.getDimensions(t).width : r.getDimensions(t).height
        }, m._getAvailableRunnableTrack = function(t, e) {
            return t - this._getElementOrientationOffsetValue(this.thumbElement, e)
        }, m._getPercentageByValue = function(t, e) {
            return (t = this._calculateStepsToValue(t, this.getMin())) / this._calculateMaxSteps(this.getMin(), this.getMax()) * 100
        }, m._getPercentageOfRunnableTrack = function(t) {
            var e = this.getOrientation(),
                i = this._getElementOrientationOffsetValue(this.runnableTrackElement, e),
                n = this._getAvailableRunnableTrack(i, e);
            return this._getPercentageByValue(t, this.getMax()) / 100 * n / i * 100
        }, m._onChange = function(t) {
            var e = this._getPercentageOfRunnableTrack(t);
            isNaN(e) || ("horizontal" === this.getOrientation() ? this.thumbElement.style.left = e + "%" : this.thumbElement.style.bottom = e + "%", this.trigger("change", this.getValue()))
        }, m._removeEventListeners = function() {
            this._removeEventListener(this.el, "mousedown", this._onMouseDown), this._removeEventListener(this.el, "touchstart", this._onTouchStart), this._removeEventListener(this.el, "mouseover", this._onMouseOver), this._removeEventListener(this.el, "mouseleave", this._onMouseLeave), this._removeEventListener(document, "touchend", this._onMouseUp)
        }, m._removeEventListener = function(t, e, i) {
            t.removeEventListener(e, i)
        }, m._setNodeReferences = function() {
            this.runnableTrackElement = this.el.querySelector(".ac-slider-runnable-track"), this.thumbElement = this.el.querySelector(".ac-slider-thumb")
        }, m.setOrientation = function(t) {
            this._set("orientation", t)
        }, m._triggerRelease = function(t) {
            this._preventDefault(t), this.trigger("release", this.getValue()), this._keyDown[u(t)] = 0
        }, m._preventDefault = function(t) {
            t.preventDefault(), t.stopPropagation()
        }, m._step = function(t, e) {
            this._preventDefault(t), this.el.focus();
            var i = this._keyDown[u(t)] || 0;
            i ? Math.abs(this._keyDown[u(t)]) < Math.abs(this.model.max * this.model.keyboardMaxStepPercentage) && (i *= this.model.keyboardStepMultiplier) : (this.trigger("grab", this.getValue()), i = "auto" !== (i = this.getStep()) ? i : this._cachedMaxStep, e || (i *= -1), this._keyboard.onceUp(u(t), this._triggerRelease)), this._keyDown[u(t)] = i, this.setValue(this.getValue() + i)
        }, m.stepUp = function(t) {
            this._step(t, !0)
        }, m.stepDown = function(t) {
            this._step(t, !1)
        }, m.setValue = function(t) {
            t = this._getNextValue(t, this.getMin(), this.getMax(), this.getStep()), this._set("value", t), this.el.setAttribute("aria-valuenow", t), this._onChange(t)
        }, m.setMin = function(t) {
            this._set("min", t), this.el.setAttribute("aria-valuemin", t)
        }, m.setMax = function(t) {
            this._set("max", t), this.el.setAttribute("aria-valuemax", t), this._cachedMaxStep = t / 100
        }, m.setStep = function(t) {
            this._set("step", t)
        }, m._set = function(t, e) {
            if (p.indexOf(t) > -1 && this.model[t] !== e) {
                var i = this.model[t];
                this.model[t] = e, this.trigger("change:model:" + t, {
                    previous: i,
                    current: e
                })
            }
        }, m._removeEventListeners = function() {
            this._removeEventListener(this.el, "mousedown", this._onMouseDown), this._removeEventListener(this.el, "touchstart", this._onTouchStart), this._removeEventListener(this.el, "mouseover", this._onMouseOver), this._removeEventListener(this.el, "mouseleave", this._onMouseLeave), this._removeEventListener(this.el, "touchend", this._onTouchEnd), this._removeEventListener(document, "touchend", this._onMouseUp), "horizontal" === this.model.orientation ? (this._keyboard.offDown(c.num, this.stepUp), this._keyboard.offDown(o.num, this.stepDown), this._keyboard.offUp(o.num, this._triggerRelease), this._keyboard.offUp(c.num, this._triggerRelease)) : (this._keyboard.offDown(l.num, this.stepDown), this._keyboard.offDown(a, this.stepUp), this._keyboard.offUp(l.num, this._triggerRelease), this._keyboard.offUp(a, this._triggerRelease))
        }, m.destroy = function() {
            this._removeEventListeners(), this._keyboard && this._keyboard.destroy(), n.EventEmitterMicro.prototype.destroy.call(this)
        }, e.exports = f
    }, {
        "@marcom/ac-dom-metrics": 172,
        "@marcom/ac-event-emitter-micro": 201,
        "@marcom/ac-keyboard/Keyboard": 218
    }],
    251: [function(t, e, i) {
        "use strict";
        e.exports.Slider = t("./Slider")
    }, {
        "./Slider": 250
    }],
    252: [function(t, e, i) {
        e.exports = t("./lib/")
    }, {
        "./lib/": 253
    }],
    253: [function(t, e, i) {
        var n = t("./stringify"),
            r = t("./parse");
        e.exports = {
            stringify: n,
            parse: r
        }
    }, {
        "./parse": 254,
        "./stringify": 255
    }],
    254: [function(t, e, i) {
        var n = t("./utils"),
            r = {
                delimiter: "&",
                depth: 5,
                arrayLimit: 20,
                parameterLimit: 1e3,
                parseValues: function(t, e) {
                    for (var i = {}, r = t.split(e.delimiter, e.parameterLimit === 1 / 0 ? void 0 : e.parameterLimit), s = 0, o = r.length; s < o; ++s) {
                        var a = r[s],
                            c = -1 === a.indexOf("]=") ? a.indexOf("=") : a.indexOf("]=") + 1;
                        if (-1 === c) i[n.decode(a)] = "";
                        else {
                            var l = n.decode(a.slice(0, c)),
                                h = n.decode(a.slice(c + 1));
                            i.hasOwnProperty(l) ? i[l] = [].concat(i[l]).concat(h) : i[l] = h
                        }
                    }
                    return i
                },
                parseObject: function(t, e, i) {
                    if (!t.length) return e;
                    var n = t.shift(),
                        s = {};
                    if ("[]" === n) s = (s = []).concat(r.parseObject(t, e, i));
                    else {
                        var o = "[" === n[0] && "]" === n[n.length - 1] ? n.slice(1, n.length - 1) : n,
                            a = parseInt(o, 10),
                            c = "" + a;
                        !isNaN(a) && n !== o && c === o && a >= 0 && a <= i.arrayLimit ? (s = [])[a] = r.parseObject(t, e, i) : s[o] = r.parseObject(t, e, i)
                    }
                    return s
                },
                parseKeys: function(t, e, i) {
                    if (t) {
                        var n = /(\[[^\[\]]*\])/g,
                            s = /^([^\[\]]*)/.exec(t);
                        if (!Object.prototype.hasOwnProperty(s[1])) {
                            var o = [];
                            s[1] && o.push(s[1]);
                            for (var a = 0; null !== (s = n.exec(t)) && a < i.depth;) ++a, Object.prototype.hasOwnProperty(s[1].replace(/\[|\]/g, "")) || o.push(s[1]);
                            return s && o.push("[" + t.slice(s.index) + "]"), r.parseObject(o, e, i)
                        }
                    }
                }
            };
        e.exports = function(t, e) {
            if ("" === t || null === t || void 0 === t) return {};
            (e = e || {}).delimiter = "string" == typeof e.delimiter || n.isRegExp(e.delimiter) ? e.delimiter : r.delimiter, e.depth = "number" == typeof e.depth ? e.depth : r.depth, e.arrayLimit = "number" == typeof e.arrayLimit ? e.arrayLimit : r.arrayLimit, e.parameterLimit = "number" == typeof e.parameterLimit ? e.parameterLimit : r.parameterLimit;
            for (var i = "string" == typeof t ? r.parseValues(t, e) : t, s = {}, o = Object.keys(i), a = 0, c = o.length; a < c; ++a) {
                var l = o[a],
                    h = r.parseKeys(l, i[l], e);
                s = n.merge(s, h)
            }
            return n.compact(s)
        }
    }, {
        "./utils": 256
    }],
    255: [function(t, e, i) {
        var n = t("./utils"),
            r = {
                delimiter: "&",
                indices: !0,
                stringify: function(t, e, i) {
                    if (n.isBuffer(t) ? t = t.toString() : t instanceof Date ? t = t.toISOString() : null === t && (t = ""), "string" == typeof t || "number" == typeof t || "boolean" == typeof t) return [encodeURIComponent(e) + "=" + encodeURIComponent(t)];
                    var s = [];
                    if (void 0 === t) return s;
                    for (var o = Object.keys(t), a = 0, c = o.length; a < c; ++a) {
                        var l = o[a];
                        s = !i.indices && Array.isArray(t) ? s.concat(r.stringify(t[l], e, i)) : s.concat(r.stringify(t[l], e + "[" + l + "]", i))
                    }
                    return s
                }
            };
        e.exports = function(t, e) {
            var i = void 0 === (e = e || {}).delimiter ? r.delimiter : e.delimiter;
            e.indices = "boolean" == typeof e.indices ? e.indices : r.indices;
            var n = [];
            if ("object" != typeof t || null === t) return "";
            for (var s = Object.keys(t), o = 0, a = s.length; o < a; ++o) {
                var c = s[o];
                n = n.concat(r.stringify(t[c], c, e))
            }
            return n.join(i)
        }
    }, {
        "./utils": 256
    }],
    256: [function(t, e, i) {
        i.arrayToObject = function(t) {
            for (var e = {}, i = 0, n = t.length; i < n; ++i) void 0 !== t[i] && (e[i] = t[i]);
            return e
        }, i.merge = function(t, e) {
            if (!e) return t;
            if ("object" != typeof e) return Array.isArray(t) ? t.push(e) : t[e] = !0, t;
            if ("object" != typeof t) return t = [t].concat(e);
            Array.isArray(t) && !Array.isArray(e) && (t = i.arrayToObject(t));
            for (var n = Object.keys(e), r = 0, s = n.length; r < s; ++r) {
                var o = n[r],
                    a = e[o];
                t[o] ? t[o] = i.merge(t[o], a) : t[o] = a
            }
            return t
        }, i.decode = function(t) {
            try {
                return decodeURIComponent(t.replace(/\+/g, " "))
            } catch (e) {
                return t
            }
        }, i.compact = function(t, e) {
            if ("object" != typeof t || null === t) return t;
            var n = (e = e || []).indexOf(t);
            if (-1 !== n) return e[n];
            if (e.push(t), Array.isArray(t)) {
                for (var r = [], s = 0, o = t.length; s < o; ++s) void 0 !== t[s] && r.push(t[s]);
                return r
            }
            var a = Object.keys(t);
            for (s = 0, o = a.length; s < o; ++s) {
                var c = a[s];
                t[c] = i.compact(t[c], e)
            }
            return t
        }, i.isRegExp = function(t) {
            return "[object RegExp]" === Object.prototype.toString.call(t)
        }, i.isBuffer = function(t) {
            return null !== t && void 0 !== t && !!(t.constructor && t.constructor.isBuffer && t.constructor.isBuffer(t))
        }
    }, {}],
    257: [function(t, e, i) {
        "use strict";
        e.exports = {
            Link: t("./ac-social/Link"),
            Dialog: t("./ac-social/Dialog"),
            Focus: t("./ac-social/Focus"),
            Debug: t("./ac-social/Debug")
        }
    }, {
        "./ac-social/Debug": 258,
        "./ac-social/Dialog": 259,
        "./ac-social/Focus": 260,
        "./ac-social/Link": 261
    }],
    258: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkActions");

        function r() {
            var t;
            for (t in this.types = {}, n) n.hasOwnProperty(t) && (s[t] = t, this.addType(t, n[t].getDialogDebugData.bind(n[t])))
        }
        var s = r.prototype;
        s.create = function(t, e) {
            e = e || {};
            var i = this.types[t];
            if (i) return i(e)
        }, s.addType = function(t, e) {
            return this.types[t] = e, this
        }, s.removeType = function() {
            return this.types[name] = null, this
        }, e.exports = new r
    }, {
        "./NetworkActions": 262
    }],
    259: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkActions");

        function r() {
            var t;
            for (t in this.types = {}, n) n.hasOwnProperty(t) && (s[t] = t, this.addType(t, n[t].generateDialog.bind(n[t])))
        }
        var s = r.prototype;
        s.create = function(t, e) {
            e = e || {};
            var i = this.types[t];
            if (i) return i(e)
        }, s.addType = function(t, e) {
            return this.types[t] = e, this
        }, s.removeType = function() {
            return this.types[name] = null, this
        }, e.exports = new r
    }, {
        "./NetworkActions": 262
    }],
    260: [function(t, e, i) {
        "use strict";
        e.exports = function(t) {
            if (window.getSelection) {
                var e = window.getSelection();
                (i = document.createRange()).selectNodeContents(t), e.removeAllRanges(), e.addRange(i)
            } else if (t.setSelectionRange) t.setSelectionRange(0, t.value.length);
            else if (document.body.createTextRange) {
                var i;
                (i = document.body.createTextRange()).moveToElementText(t), i.select()
            }
        }
    }, {}],
    261: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkActions"),
            r = t("./network-actions/DefaultNetworkAction");

        function s() {
            var t;
            for (t in this.types = {}, n) n.hasOwnProperty(t) && (o[t] = t, this.addType(t, n[t].generateLink.bind(n[t])))
        }
        var o = s.prototype;
        o.create = function(t, e, i) {
            e = e || {};
            var n = this.types[t];
            if (n) return n(e, i)
        }, o.createFromAnchor = function(t) {
            var e, i = t.getAttribute("data-network-action");
            for (e in n)
                if (n.hasOwnProperty(e) && i === n[e].id) return void n[e].enhanceLinkEngagement(t);
            r.enhanceLinkEngagement(t)
        }, o.addType = function(t, e) {
            return this.types[t] = e, this
        }, o.removeType = function() {
            return this.types[name] = null, this
        }, e.exports = new s
    }, {
        "./NetworkActions": 262,
        "./network-actions/DefaultNetworkAction": 263
    }],
    262: [function(t, e, i) {
        "use strict";
        var n = t("./network-actions/FacebookShare"),
            r = t("./network-actions/PinterestShare"),
            s = t("./network-actions/TumblrShare"),
            o = t("./network-actions/TwitterFavorite"),
            a = t("./network-actions/TwitterReply"),
            c = t("./network-actions/TwitterRetweet"),
            l = t("./network-actions/TwitterTweet"),
            h = t("./network-actions/WeiboShare"),
            u = t("./network-actions/QQWeiboShare"),
            d = t("./network-actions/QZoneShare"),
            p = t("./network-actions/RenrenShare"),
            f = t("./network-actions/EMailShare");
        e.exports = {
            FACEBOOK_SHARE: n,
            PINTEREST_SHARE: r,
            TUMBLR_SHARE: s,
            TWITTER_FAVORITE: o,
            TWITTER_REPLY: a,
            TWITTER_RETWEET: c,
            TWITTER_TWEET: l,
            WEIBO_SHARE: h,
            QQWEIBO_SHARE: u,
            QZONE_SHARE: d,
            RENREN_SHARE: p,
            EMAIL_SHARE: f
        }
    }, {
        "./network-actions/EMailShare": 264,
        "./network-actions/FacebookShare": 265,
        "./network-actions/PinterestShare": 267,
        "./network-actions/QQWeiboShare": 268,
        "./network-actions/QZoneShare": 269,
        "./network-actions/RenrenShare": 270,
        "./network-actions/TumblrShare": 271,
        "./network-actions/TwitterFavorite": 272,
        "./network-actions/TwitterReply": 273,
        "./network-actions/TwitterRetweet": 274,
        "./network-actions/TwitterTweet": 275,
        "./network-actions/WeiboShare": 276
    }],
    263: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return t
        }, {
            baseLinkPath: ""
        })
    }, {
        "./NetworkAction": 266
    }],
    264: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            var e = {
                url: t.url
            };
            return t.title && (e.subject = t.title), t.description ? e.body = t.description + "\r\n\r\n" + t.url : e.body = t.url, e
        }, {
            id: "email-share",
            baseLinkPath: "mailto:",
            preventDialog: !0
        })
    }, {
        "./NetworkAction": 266
    }],
    265: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                u: t.url
            }
        }, {
            id: "facebook-share",
            baseLinkPath: "https://www.facebook.com/sharer/sharer.php",
            dialogDimensions: {
                width: 555,
                height: 368
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    266: [function(t, e, i) {
        "use strict";
        var n, r = t("qs"),
            s = function(t, e) {
                e = e || {}, this.baseLinkPath = e.baseLinkPath, e.dialogDimensions && (this.dialogDimensions = e.dialogDimensions), e.id && (this.id = e.id), e.preventDialog && (this.preventDialog = e.preventDialog), this.normalizeData = t
            };
        (n = s.prototype).dataAttributeName = "network-action", n.id = "network-action", n.normalizeData = function(t) {
            return t
        }, n.dialogDimensions = {
            width: 500,
            height: 500
        }, n.generateLinkURL = function(t) {
            var e = this.normalizeData(t),
                i = r.stringify(e),
                n = this.baseLinkPath;
            return i.length > 0 && (n = n + "?" + i), n
        }, n.generateLink = function(t, e) {
            var i = this.generateLinkURL(t);
            return (e = e || document.createElement("A")).setAttribute("href", i), e.setAttribute("target", "_blank"), e.setAttribute("data-" + this.dataAttributeName, this.id), this.enhanceLinkEngagement(e, i), e
        }, n.generateDialog = function(t) {
            var e = this.generateLinkURL(t);
            this._triggerDialog(e)
        }, n.enhanceLinkEngagement = function(t, e) {
            e = e || t.getAttribute("href"), t.addEventListener("click", this._onLinkEngaged.bind(this, e))
        }, n.getDialogOptions = function() {
            var t, e = "status=1",
                i = {
                    width: this.dialogDimensions.width,
                    height: this.dialogDimensions.height
                };
            for (t in i.top = (window.screen.availHeight - i.height) / 2, i.left = (window.screen.availWidth - i.width) / 2, i) i.hasOwnProperty(t) && (e += ", " + t + "=" + i[t]);
            return e
        }, n.getDialogDebugData = function(t) {
            return {
                data: this.normalizeData(t),
                dialogUrl: this.generateLinkURL(t)
            }
        }, n._triggerDialog = function(t) {
            this.preventDialog ? window.location.href = t : window.open(t, "_blank", this.getDialogOptions())
        }, n._onLinkEngaged = function(t, e) {
            e.preventDefault(), this._triggerDialog(t)
        }, e.exports = s
    }, {
        qs: 252
    }],
    267: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            var e = {
                url: t.url,
                description: t.description
            };
            return t.media && (e.media = t.media), e
        }, {
            id: "pinterest-share",
            baseLinkPath: "http://www.pinterest.com/pin/create/button",
            dialogDimensions: {
                width: 750,
                height: 450
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    268: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                url: t.url,
                title: t.title,
                pic: t.media
            }
        }, {
            id: "qq-weibo-share",
            baseLinkPath: "http://v.t.qq.com/share/share.php",
            dialogDimensions: {
                width: 658,
                height: 506
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    269: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                url: t.url,
                title: t.title,
                pics: t.media,
                summary: t.description
            }
        }, {
            id: "qzone-share",
            baseLinkPath: "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey",
            dialogDimensions: {
                width: 620,
                height: 645
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    270: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                url: t.url,
                title: t.title
            }
        }, {
            id: "renren-share",
            baseLinkPath: "http://www.connect.renren.com/share/sharer",
            dialogDimensions: {
                width: 500,
                height: 315
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    271: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            var e = {
                clickthru: t.url,
                caption: t.description
            };
            return t.media && (e.source = t.media), e
        }, {
            id: "tumblr-share",
            baseLinkPath: "http://www.tumblr.com/share/photo",
            dialogDimensions: {
                width: 450,
                height: 432
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    272: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                tweet_id: t.messageId
            }
        }, {
            id: "twitter-favorite",
            baseLinkPath: "https://twitter.com/intent/favorite",
            dialogDimensions: {
                width: 550,
                height: 420
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    273: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            var e = {
                in_reply_to: t.messageId
            };
            return t.hashtags && (e.hashtags = t.hashtags), e
        }, {
            id: "twitter-reply",
            baseLinkPath: "https://twitter.com/intent/tweet",
            dialogDimensions: {
                width: 550,
                height: 420
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    274: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                tweet_id: t.messageId
            }
        }, {
            id: "twitter-retweet",
            baseLinkPath: "https://twitter.com/intent/retweet",
            dialogDimensions: {
                width: 550,
                height: 420
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    275: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            var e = {
                url: t.url,
                text: t.description
            };
            return t.hashtags && (e.hashtags = t.hashtags), e
        }, {
            id: "twitter-tweet",
            baseLinkPath: "https://twitter.com/intent/tweet",
            dialogDimensions: {
                width: 550,
                height: 420
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    276: [function(t, e, i) {
        "use strict";
        var n = t("./NetworkAction");
        e.exports = new n(function(t) {
            return {
                url: t.url,
                title: t.title,
                pic: t.media
            }
        }, {
            id: "weibo-share",
            baseLinkPath: "http://service.weibo.com/share/share.php",
            dialogDimensions: {
                width: 650,
                height: 426
            }
        })
    }, {
        "./NetworkAction": 266
    }],
    277: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e, i) {
            return e ? (i = i || /{([^{}]*)}/g, t.replace(i, function(t, i) {
                var n = e[i];
                return "string" == typeof n || "number" == typeof n || "boolean" == typeof n ? n : t
            })) : t
        }
    }, {}],
    278: [function(t, e, i) {
        arguments[4][102][0].apply(i, arguments)
    }, {
        dup: 102
    }],
    279: [function(t, e, i) {
        arguments[4][103][0].apply(i, arguments)
    }, {
        "./parseUserAgent": 282,
        dup: 103
    }],
    280: [function(t, e, i) {
        arguments[4][104][0].apply(i, arguments)
    }, {
        dup: 104
    }],
    281: [function(t, e, i) {
        arguments[4][105][0].apply(i, arguments)
    }, {
        dup: 105
    }],
    282: [function(t, e, i) {
        arguments[4][106][0].apply(i, arguments)
    }, {
        "./defaults": 280,
        "./dictionary": 281,
        dup: 106
    }],
    283: [function(t, e, i) {
        var n, r;
        n = "undefined" != typeof self ? self : this, r = function() {
            return function(t) {
                var e = {};

                function i(n) {
                    if (e[n]) return e[n].exports;
                    var r = e[n] = {
                        i: n,
                        l: !1,
                        exports: {}
                    };
                    return t[n].call(r.exports, r, r.exports, i), r.l = !0, r.exports
                }
                return i.m = t, i.c = e, i.d = function(t, e, n) {
                    i.o(t, e) || Object.defineProperty(t, e, {
                        configurable: !1,
                        enumerable: !0,
                        get: n
                    })
                }, i.n = function(t) {
                    var e = t && t.__esModule ? function() {
                        return t.default
                    } : function() {
                        return t
                    };
                    return i.d(e, "a", e), e
                }, i.o = function(t, e) {
                    return Object.prototype.hasOwnProperty.call(t, e)
                }, i.p = "", i(i.s = 36)
            }([function(t, e) {
                var i = t.exports = "undefined" != typeof window && window.Math == Math ? window : "undefined" != typeof self && self.Math == Math ? self : Function("return this")();
                "number" == typeof __g && (__g = i)
            }, function(t, e, i) {
                var n = i(9),
                    r = i(27),
                    s = i(15),
                    o = Object.defineProperty;
                e.f = i(2) ? Object.defineProperty : function(t, e, i) {
                    if (n(t), e = s(e, !0), n(i), r) try {
                        return o(t, e, i)
                    } catch (t) {}
                    if ("get" in i || "set" in i) throw TypeError("Accessors not supported!");
                    return "value" in i && (t[e] = i.value), t
                }
            }, function(t, e, i) {
                t.exports = !i(10)(function() {
                    return 7 != Object.defineProperty({}, "a", {
                        get: function() {
                            return 7
                        }
                    }).a
                })
            }, function(t, e) {
                var i = {}.hasOwnProperty;
                t.exports = function(t, e) {
                    return i.call(t, e)
                }
            }, function(t, e, i) {
                var n = i(1),
                    r = i(11);
                t.exports = i(2) ? function(t, e, i) {
                    return n.f(t, e, r(1, i))
                } : function(t, e, i) {
                    return t[e] = i, t
                }
            }, function(t, e, i) {
                var n = i(51),
                    r = i(17);
                t.exports = function(t) {
                    return n(r(t))
                }
            }, function(t, e, i) {
                var n = i(21)("wks"),
                    r = i(13),
                    s = i(0).Symbol,
                    o = "function" == typeof s;
                (t.exports = function(t) {
                    return n[t] || (n[t] = o && s[t] || (o ? s : r)("Symbol." + t))
                }).store = n
            }, function(t, e) {
                var i = t.exports = {
                    version: "2.5.6"
                };
                "number" == typeof __e && (__e = i)
            }, function(t, e) {
                t.exports = function(t) {
                    return "object" == typeof t ? null !== t : "function" == typeof t
                }
            }, function(t, e, i) {
                var n = i(8);
                t.exports = function(t) {
                    if (!n(t)) throw TypeError(t + " is not an object!");
                    return t
                }
            }, function(t, e) {
                t.exports = function(t) {
                    try {
                        return !!t()
                    } catch (t) {
                        return !0
                    }
                }
            }, function(t, e) {
                t.exports = function(t, e) {
                    return {
                        enumerable: !(1 & t),
                        configurable: !(2 & t),
                        writable: !(4 & t),
                        value: e
                    }
                }
            }, function(t, e) {
                t.exports = !0
            }, function(t, e) {
                var i = 0,
                    n = Math.random();
                t.exports = function(t) {
                    return "Symbol(".concat(void 0 === t ? "" : t, ")_", (++i + n).toString(36))
                }
            }, function(t, e, i) {
                var n = i(0),
                    r = i(7),
                    s = i(42),
                    o = i(4),
                    a = i(3),
                    c = function(t, e, i) {
                        var l, h, u, d = t & c.F,
                            p = t & c.G,
                            f = t & c.S,
                            m = t & c.P,
                            _ = t & c.B,
                            v = t & c.W,
                            g = p ? r : r[e] || (r[e] = {}),
                            y = g.prototype,
                            b = p ? n : f ? n[e] : (n[e] || {}).prototype;
                        for (l in p && (i = e), i)(h = !d && b && void 0 !== b[l]) && a(g, l) || (u = h ? b[l] : i[l], g[l] = p && "function" != typeof b[l] ? i[l] : _ && h ? s(u, n) : v && b[l] == u ? function(t) {
                            var e = function(e, i, n) {
                                if (this instanceof t) {
                                    switch (arguments.length) {
                                        case 0:
                                            return new t;
                                        case 1:
                                            return new t(e);
                                        case 2:
                                            return new t(e, i)
                                    }
                                    return new t(e, i, n)
                                }
                                return t.apply(this, arguments)
                            };
                            return e.prototype = t.prototype, e
                        }(u) : m && "function" == typeof u ? s(Function.call, u) : u, m && ((g.virtual || (g.virtual = {}))[l] = u, t & c.R && y && !y[l] && o(y, l, u)))
                    };
                c.F = 1, c.G = 2, c.S = 4, c.P = 8, c.B = 16, c.W = 32, c.U = 64, c.R = 128, t.exports = c
            }, function(t, e, i) {
                var n = i(8);
                t.exports = function(t, e) {
                    if (!n(t)) return t;
                    var i, r;
                    if (e && "function" == typeof(i = t.toString) && !n(r = i.call(t))) return r;
                    if ("function" == typeof(i = t.valueOf) && !n(r = i.call(t))) return r;
                    if (!e && "function" == typeof(i = t.toString) && !n(r = i.call(t))) return r;
                    throw TypeError("Can't convert object to primitive value")
                }
            }, function(t, e) {
                var i = Math.ceil,
                    n = Math.floor;
                t.exports = function(t) {
                    return isNaN(t = +t) ? 0 : (t > 0 ? n : i)(t)
                }
            }, function(t, e) {
                t.exports = function(t) {
                    if (void 0 == t) throw TypeError("Can't call method on  " + t);
                    return t
                }
            }, function(t, e) {
                t.exports = {}
            }, function(t, e, i) {
                var n = i(32),
                    r = i(22);
                t.exports = Object.keys || function(t) {
                    return n(t, r)
                }
            }, function(t, e, i) {
                var n = i(21)("keys"),
                    r = i(13);
                t.exports = function(t) {
                    return n[t] || (n[t] = r(t))
                }
            }, function(t, e, i) {
                var n = i(7),
                    r = i(0),
                    s = r["__core-js_shared__"] || (r["__core-js_shared__"] = {});
                (t.exports = function(t, e) {
                    return s[t] || (s[t] = void 0 !== e ? e : {})
                })("versions", []).push({
                    version: n.version,
                    mode: i(12) ? "pure" : "global",
                    copyright: "© 2018 Denis Pushkarev (zloirock.ru)"
                })
            }, function(t, e) {
                t.exports = "constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")
            }, function(t, e, i) {
                var n = i(1).f,
                    r = i(3),
                    s = i(6)("toStringTag");
                t.exports = function(t, e, i) {
                    t && !r(t = i ? t : t.prototype, s) && n(t, s, {
                        configurable: !0,
                        value: e
                    })
                }
            }, function(t, e, i) {
                e.f = i(6)
            }, function(t, e, i) {
                var n = i(0),
                    r = i(7),
                    s = i(12),
                    o = i(24),
                    a = i(1).f;
                t.exports = function(t) {
                    var e = r.Symbol || (r.Symbol = s ? {} : n.Symbol || {});
                    "_" == t.charAt(0) || t in e || a(e, t, {
                        value: o.f(t)
                    })
                }
            }, function(t, e) {
                e.f = {}.propertyIsEnumerable
            }, function(t, e, i) {
                t.exports = !i(2) && !i(10)(function() {
                    return 7 != Object.defineProperty(i(28)("div"), "a", {
                        get: function() {
                            return 7
                        }
                    }).a
                })
            }, function(t, e, i) {
                var n = i(8),
                    r = i(0).document,
                    s = n(r) && n(r.createElement);
                t.exports = function(t) {
                    return s ? r.createElement(t) : {}
                }
            }, function(t, e, i) {
                "use strict";
                var n = i(12),
                    r = i(14),
                    s = i(30),
                    o = i(4),
                    a = i(18),
                    c = i(49),
                    l = i(23),
                    h = i(56),
                    u = i(6)("iterator"),
                    d = !([].keys && "next" in [].keys()),
                    p = function() {
                        return this
                    };
                t.exports = function(t, e, i, f, m, _, v) {
                    c(i, e, f);
                    var g, y, b, E = function(t) {
                            if (!d && t in S) return S[t];
                            switch (t) {
                                case "keys":
                                case "values":
                                    return function() {
                                        return new i(this, t)
                                    }
                            }
                            return function() {
                                return new i(this, t)
                            }
                        },
                        w = e + " Iterator",
                        x = "values" == m,
                        C = !1,
                        S = t.prototype,
                        T = S[u] || S["@@iterator"] || m && S[m],
                        k = T || E(m),
                        A = m ? x ? E("entries") : k : void 0,
                        L = "Array" == e && S.entries || T;
                    if (L && (b = h(L.call(new t))) !== Object.prototype && b.next && (l(b, w, !0), n || "function" == typeof b[u] || o(b, u, p)), x && T && "values" !== T.name && (C = !0, k = function() {
                            return T.call(this)
                        }), n && !v || !d && !C && S[u] || o(S, u, k), a[e] = k, a[w] = p, m)
                        if (g = {
                                values: x ? k : E("values"),
                                keys: _ ? k : E("keys"),
                                entries: A
                            }, v)
                            for (y in g) y in S || s(S, y, g[y]);
                        else r(r.P + r.F * (d || C), e, g);
                    return g
                }
            }, function(t, e, i) {
                t.exports = i(4)
            }, function(t, e, i) {
                var n = i(9),
                    r = i(50),
                    s = i(22),
                    o = i(20)("IE_PROTO"),
                    a = function() {},
                    c = function() {
                        var t, e = i(28)("iframe"),
                            n = s.length;
                        for (e.style.display = "none", i(55).appendChild(e), e.src = "javascript:", (t = e.contentWindow.document).open(), t.write("<script>document.F=Object<\/script>"), t.close(), c = t.F; n--;) delete c.prototype[s[n]];
                        return c()
                    };
                t.exports = Object.create || function(t, e) {
                    var i;
                    return null !== t ? (a.prototype = n(t), i = new a, a.prototype = null, i[o] = t) : i = c(), void 0 === e ? i : r(i, e)
                }
            }, function(t, e, i) {
                var n = i(3),
                    r = i(5),
                    s = i(52)(!1),
                    o = i(20)("IE_PROTO");
                t.exports = function(t, e) {
                    var i, a = r(t),
                        c = 0,
                        l = [];
                    for (i in a) i != o && n(a, i) && l.push(i);
                    for (; e.length > c;) n(a, i = e[c++]) && (~s(l, i) || l.push(i));
                    return l
                }
            }, function(t, e) {
                var i = {}.toString;
                t.exports = function(t) {
                    return i.call(t).slice(8, -1)
                }
            }, function(t, e) {
                e.f = Object.getOwnPropertySymbols
            }, function(t, e, i) {
                var n = i(32),
                    r = i(22).concat("length", "prototype");
                e.f = Object.getOwnPropertyNames || function(t) {
                    return n(t, r)
                }
            }, function(t, e, i) {
                "use strict";
                (function(t) {
                    var n, r, s, o, a = i(38),
                        c = a(i(39)),
                        l = a(i(44));
                    "undefined" != typeof self && self, o = function() {
                        return function(t) {
                            var e = {};

                            function i(n) {
                                if (e[n]) return e[n].exports;
                                var r = e[n] = {
                                    i: n,
                                    l: !1,
                                    exports: {}
                                };
                                return t[n].call(r.exports, r, r.exports, i), r.l = !0, r.exports
                            }
                            return i.m = t, i.c = e, i.d = function(t, e, n) {
                                i.o(t, e) || (0, c.default)(t, e, {
                                    configurable: !1,
                                    enumerable: !0,
                                    get: n
                                })
                            }, i.n = function(t) {
                                var e = t && t.__esModule ? function() {
                                    return t.default
                                } : function() {
                                    return t
                                };
                                return i.d(e, "a", e), e
                            }, i.o = function(t, e) {
                                return Object.prototype.hasOwnProperty.call(t, e)
                            }, i.p = "", i(i.s = 0)
                        }([function(t, e, i) {
                            var n = {
                                ua: window.navigator.userAgent,
                                platform: window.navigator.platform,
                                vendor: window.navigator.vendor
                            };
                            t.exports = i(1)(n)
                        }, function(t, e, i) {
                            var n = i(2),
                                r = i(3);

                            function s(t, e) {
                                if ("function" == typeof t.parseVersion) return t.parseVersion(e);
                                var i, n = t.version || t.userAgent;
                                "string" == typeof n && (n = [n]);
                                for (var r, s = n.length, o = 0; o < s; o++)
                                    if ((r = e.match((i = n[o], new RegExp("".concat(i, "[a-zA-Z\\s/\\:]+([0-9_/\\.]+)"), "i")))) && r.length > 1) return r[1].replace(/_/g, ".");
                                return !1
                            }

                            function o(t, e, i) {
                                for (var n, r, o = t.length, a = 0; a < o; a++)
                                    if ("function" == typeof t[a].test ? !0 === t[a].test(i) && (n = t[a].name) : i.ua.indexOf(t[a].userAgent) > -1 && (n = t[a].name), n) {
                                        if (e[n] = !0, "string" == typeof(r = s(t[a], i.ua))) {
                                            var c = r.split(".");
                                            e.version.string = r, c && c.length > 0 && (e.version.major = parseInt(c[0] || 0), e.version.minor = parseInt(c[1] || 0), e.version.patch = parseInt(c[2] || 0))
                                        } else "edge" === n && (e.version.string = "12.0.0", e.version.major = "12", e.version.minor = "0", e.version.patch = "0");
                                        return "function" == typeof t[a].parseDocumentMode && (e.version.documentMode = t[a].parseDocumentMode()), e
                                    }
                                return e
                            }
                            t.exports = function(t) {
                                var e = {};
                                return e.browser = o(r.browser, n.browser, t), e.os = o(r.os, n.os, t), e
                            }
                        }, function(t, e, i) {
                            t.exports = {
                                browser: {
                                    safari: !1,
                                    chrome: !1,
                                    firefox: !1,
                                    ie: !1,
                                    opera: !1,
                                    android: !1,
                                    edge: !1,
                                    version: {
                                        string: "",
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
                                        string: "",
                                        major: 0,
                                        minor: 0,
                                        patch: 0
                                    }
                                }
                            }
                        }, function(t, e, i) {
                            t.exports = {
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
                                        return t.ua.indexOf("Windows") > -1
                                    },
                                    version: "Windows NT"
                                }, {
                                    name: "osx",
                                    userAgent: "Mac",
                                    test: function(t) {
                                        return t.ua.indexOf("Macintosh") > -1
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
                                        return (t.ua.indexOf("Linux") > -1 || t.platform.indexOf("Linux") > -1) && -1 === t.ua.indexOf("Android")
                                    }
                                }, {
                                    name: "fireos",
                                    test: function(t) {
                                        return t.ua.indexOf("Firefox") > -1 && t.ua.indexOf("Mobile") > -1
                                    },
                                    version: "rv"
                                }, {
                                    name: "android",
                                    userAgent: "Android",
                                    test: function(t) {
                                        return t.ua.indexOf("Android") > -1
                                    }
                                }, {
                                    name: "chromeos",
                                    userAgent: "CrOS"
                                }]
                            }
                        }])
                    }, "object" === (0, l.default)(e) && "object" === (0, l.default)(t) ? t.exports = o() : (r = [], void 0 === (s = "function" == typeof(n = o) ? n.apply(e, r) : n) || (t.exports = s))
                }).call(e, i(37)(t))
            }, function(t, e) {
                t.exports = function(t) {
                    return t.webpackPolyfill || (t.deprecate = function() {}, t.paths = [], t.children || (t.children = []), Object.defineProperty(t, "loaded", {
                        enumerable: !0,
                        get: function() {
                            return t.l
                        }
                    }), Object.defineProperty(t, "id", {
                        enumerable: !0,
                        get: function() {
                            return t.i
                        }
                    }), t.webpackPolyfill = 1), t
                }
            }, function(t, e) {
                t.exports = function(t) {
                    return t && t.__esModule ? t : {
                        default: t
                    }
                }
            }, function(t, e, i) {
                t.exports = i(40)
            }, function(t, e, i) {
                i(41);
                var n = i(7).Object;
                t.exports = function(t, e, i) {
                    return n.defineProperty(t, e, i)
                }
            }, function(t, e, i) {
                var n = i(14);
                n(n.S + n.F * !i(2), "Object", {
                    defineProperty: i(1).f
                })
            }, function(t, e, i) {
                var n = i(43);
                t.exports = function(t, e, i) {
                    if (n(t), void 0 === e) return t;
                    switch (i) {
                        case 1:
                            return function(i) {
                                return t.call(e, i)
                            };
                        case 2:
                            return function(i, n) {
                                return t.call(e, i, n)
                            };
                        case 3:
                            return function(i, n, r) {
                                return t.call(e, i, n, r)
                            }
                    }
                    return function() {
                        return t.apply(e, arguments)
                    }
                }
            }, function(t, e) {
                t.exports = function(t) {
                    if ("function" != typeof t) throw TypeError(t + " is not a function!");
                    return t
                }
            }, function(t, e, i) {
                var n = i(45),
                    r = i(62);

                function s(t) {
                    return (s = "function" == typeof r && "symbol" == typeof n ? function(t) {
                        return typeof t
                    } : function(t) {
                        return t && "function" == typeof r && t.constructor === r && t !== r.prototype ? "symbol" : typeof t
                    })(t)
                }

                function o(e) {
                    return "function" == typeof r && "symbol" === s(n) ? t.exports = o = function(t) {
                        return s(t)
                    } : t.exports = o = function(t) {
                        return t && "function" == typeof r && t.constructor === r && t !== r.prototype ? "symbol" : s(t)
                    }, o(e)
                }
                t.exports = o
            }, function(t, e, i) {
                t.exports = i(46)
            }, function(t, e, i) {
                i(47), i(58), t.exports = i(24).f("iterator")
            }, function(t, e, i) {
                "use strict";
                var n = i(48)(!0);
                i(29)(String, "String", function(t) {
                    this._t = String(t), this._i = 0
                }, function() {
                    var t, e = this._t,
                        i = this._i;
                    return i >= e.length ? {
                        value: void 0,
                        done: !0
                    } : (t = n(e, i), this._i += t.length, {
                        value: t,
                        done: !1
                    })
                })
            }, function(t, e, i) {
                var n = i(16),
                    r = i(17);
                t.exports = function(t) {
                    return function(e, i) {
                        var s, o, a = String(r(e)),
                            c = n(i),
                            l = a.length;
                        return c < 0 || c >= l ? t ? "" : void 0 : (s = a.charCodeAt(c)) < 55296 || s > 56319 || c + 1 === l || (o = a.charCodeAt(c + 1)) < 56320 || o > 57343 ? t ? a.charAt(c) : s : t ? a.slice(c, c + 2) : o - 56320 + (s - 55296 << 10) + 65536
                    }
                }
            }, function(t, e, i) {
                "use strict";
                var n = i(31),
                    r = i(11),
                    s = i(23),
                    o = {};
                i(4)(o, i(6)("iterator"), function() {
                    return this
                }), t.exports = function(t, e, i) {
                    t.prototype = n(o, {
                        next: r(1, i)
                    }), s(t, e + " Iterator")
                }
            }, function(t, e, i) {
                var n = i(1),
                    r = i(9),
                    s = i(19);
                t.exports = i(2) ? Object.defineProperties : function(t, e) {
                    r(t);
                    for (var i, o = s(e), a = o.length, c = 0; a > c;) n.f(t, i = o[c++], e[i]);
                    return t
                }
            }, function(t, e, i) {
                var n = i(33);
                t.exports = Object("z").propertyIsEnumerable(0) ? Object : function(t) {
                    return "String" == n(t) ? t.split("") : Object(t)
                }
            }, function(t, e, i) {
                var n = i(5),
                    r = i(53),
                    s = i(54);
                t.exports = function(t) {
                    return function(e, i, o) {
                        var a, c = n(e),
                            l = r(c.length),
                            h = s(o, l);
                        if (t && i != i) {
                            for (; l > h;)
                                if ((a = c[h++]) != a) return !0
                        } else
                            for (; l > h; h++)
                                if ((t || h in c) && c[h] === i) return t || h || 0; return !t && -1
                    }
                }
            }, function(t, e, i) {
                var n = i(16),
                    r = Math.min;
                t.exports = function(t) {
                    return t > 0 ? r(n(t), 9007199254740991) : 0
                }
            }, function(t, e, i) {
                var n = i(16),
                    r = Math.max,
                    s = Math.min;
                t.exports = function(t, e) {
                    return (t = n(t)) < 0 ? r(t + e, 0) : s(t, e)
                }
            }, function(t, e, i) {
                var n = i(0).document;
                t.exports = n && n.documentElement
            }, function(t, e, i) {
                var n = i(3),
                    r = i(57),
                    s = i(20)("IE_PROTO"),
                    o = Object.prototype;
                t.exports = Object.getPrototypeOf || function(t) {
                    return t = r(t), n(t, s) ? t[s] : "function" == typeof t.constructor && t instanceof t.constructor ? t.constructor.prototype : t instanceof Object ? o : null
                }
            }, function(t, e, i) {
                var n = i(17);
                t.exports = function(t) {
                    return Object(n(t))
                }
            }, function(t, e, i) {
                i(59);
                for (var n = i(0), r = i(4), s = i(18), o = i(6)("toStringTag"), a = "CSSRuleList,CSSStyleDeclaration,CSSValueList,ClientRectList,DOMRectList,DOMStringList,DOMTokenList,DataTransferItemList,FileList,HTMLAllCollection,HTMLCollection,HTMLFormElement,HTMLSelectElement,MediaList,MimeTypeArray,NamedNodeMap,NodeList,PaintRequestList,Plugin,PluginArray,SVGLengthList,SVGNumberList,SVGPathSegList,SVGPointList,SVGStringList,SVGTransformList,SourceBufferList,StyleSheetList,TextTrackCueList,TextTrackList,TouchList".split(","), c = 0; c < a.length; c++) {
                    var l = a[c],
                        h = n[l],
                        u = h && h.prototype;
                    u && !u[o] && r(u, o, l), s[l] = s.Array
                }
            }, function(t, e, i) {
                "use strict";
                var n = i(60),
                    r = i(61),
                    s = i(18),
                    o = i(5);
                t.exports = i(29)(Array, "Array", function(t, e) {
                    this._t = o(t), this._i = 0, this._k = e
                }, function() {
                    var t = this._t,
                        e = this._k,
                        i = this._i++;
                    return !t || i >= t.length ? (this._t = void 0, r(1)) : r(0, "keys" == e ? i : "values" == e ? t[i] : [i, t[i]])
                }, "values"), s.Arguments = s.Array, n("keys"), n("values"), n("entries")
            }, function(t, e) {
                t.exports = function() {}
            }, function(t, e) {
                t.exports = function(t, e) {
                    return {
                        value: e,
                        done: !!t
                    }
                }
            }, function(t, e, i) {
                t.exports = i(63)
            }, function(t, e, i) {
                i(64), i(70), i(71), i(72), t.exports = i(7).Symbol
            }, function(t, e, i) {
                "use strict";
                var n = i(0),
                    r = i(3),
                    s = i(2),
                    o = i(14),
                    a = i(30),
                    c = i(65).KEY,
                    l = i(10),
                    h = i(21),
                    u = i(23),
                    d = i(13),
                    p = i(6),
                    f = i(24),
                    m = i(25),
                    _ = i(66),
                    v = i(67),
                    g = i(9),
                    y = i(8),
                    b = i(5),
                    E = i(15),
                    w = i(11),
                    x = i(31),
                    C = i(68),
                    S = i(69),
                    T = i(1),
                    k = i(19),
                    A = S.f,
                    L = T.f,
                    P = C.f,
                    D = n.Symbol,
                    O = n.JSON,
                    M = O && O.stringify,
                    I = p("_hidden"),
                    F = p("toPrimitive"),
                    R = {}.propertyIsEnumerable,
                    N = h("symbol-registry"),
                    j = h("symbols"),
                    V = h("op-symbols"),
                    B = Object.prototype,
                    U = "function" == typeof D,
                    z = n.QObject,
                    H = !z || !z.prototype || !z.prototype.findChild,
                    W = s && l(function() {
                        return 7 != x(L({}, "a", {
                            get: function() {
                                return L(this, "a", {
                                    value: 7
                                }).a
                            }
                        })).a
                    }) ? function(t, e, i) {
                        var n = A(B, e);
                        n && delete B[e], L(t, e, i), n && t !== B && L(B, e, n)
                    } : L,
                    q = function(t) {
                        var e = j[t] = x(D.prototype);
                        return e._k = t, e
                    },
                    G = U && "symbol" == typeof D.iterator ? function(t) {
                        return "symbol" == typeof t
                    } : function(t) {
                        return t instanceof D
                    },
                    K = function(t, e, i) {
                        return t === B && K(V, e, i), g(t), e = E(e, !0), g(i), r(j, e) ? (i.enumerable ? (r(t, I) && t[I][e] && (t[I][e] = !1), i = x(i, {
                            enumerable: w(0, !1)
                        })) : (r(t, I) || L(t, I, w(1, {})), t[I][e] = !0), W(t, e, i)) : L(t, e, i)
                    },
                    X = function(t, e) {
                        g(t);
                        for (var i, n = _(e = b(e)), r = 0, s = n.length; s > r;) K(t, i = n[r++], e[i]);
                        return t
                    },
                    Y = function(t) {
                        var e = R.call(this, t = E(t, !0));
                        return !(this === B && r(j, t) && !r(V, t)) && (!(e || !r(this, t) || !r(j, t) || r(this, I) && this[I][t]) || e)
                    },
                    Z = function(t, e) {
                        if (t = b(t), e = E(e, !0), t !== B || !r(j, e) || r(V, e)) {
                            var i = A(t, e);
                            return !i || !r(j, e) || r(t, I) && t[I][e] || (i.enumerable = !0), i
                        }
                    },
                    Q = function(t) {
                        for (var e, i = P(b(t)), n = [], s = 0; i.length > s;) r(j, e = i[s++]) || e == I || e == c || n.push(e);
                        return n
                    },
                    J = function(t) {
                        for (var e, i = t === B, n = P(i ? V : b(t)), s = [], o = 0; n.length > o;) !r(j, e = n[o++]) || i && !r(B, e) || s.push(j[e]);
                        return s
                    };
                U || (a((D = function() {
                    if (this instanceof D) throw TypeError("Symbol is not a constructor!");
                    var t = d(arguments.length > 0 ? arguments[0] : void 0),
                        e = function(i) {
                            this === B && e.call(V, i), r(this, I) && r(this[I], t) && (this[I][t] = !1), W(this, t, w(1, i))
                        };
                    return s && H && W(B, t, {
                        configurable: !0,
                        set: e
                    }), q(t)
                }).prototype, "toString", function() {
                    return this._k
                }), S.f = Z, T.f = K, i(35).f = C.f = Q, i(26).f = Y, i(34).f = J, s && !i(12) && a(B, "propertyIsEnumerable", Y, !0), f.f = function(t) {
                    return q(p(t))
                }), o(o.G + o.W + o.F * !U, {
                    Symbol: D
                });
                for (var $ = "hasInstance,isConcatSpreadable,iterator,match,replace,search,species,split,toPrimitive,toStringTag,unscopables".split(","), tt = 0; $.length > tt;) p($[tt++]);
                for (var et = k(p.store), it = 0; et.length > it;) m(et[it++]);
                o(o.S + o.F * !U, "Symbol", {
                    for: function(t) {
                        return r(N, t += "") ? N[t] : N[t] = D(t)
                    },
                    keyFor: function(t) {
                        if (!G(t)) throw TypeError(t + " is not a symbol!");
                        for (var e in N)
                            if (N[e] === t) return e
                    },
                    useSetter: function() {
                        H = !0
                    },
                    useSimple: function() {
                        H = !1
                    }
                }), o(o.S + o.F * !U, "Object", {
                    create: function(t, e) {
                        return void 0 === e ? x(t) : X(x(t), e)
                    },
                    defineProperty: K,
                    defineProperties: X,
                    getOwnPropertyDescriptor: Z,
                    getOwnPropertyNames: Q,
                    getOwnPropertySymbols: J
                }), O && o(o.S + o.F * (!U || l(function() {
                    var t = D();
                    return "[null]" != M([t]) || "{}" != M({
                        a: t
                    }) || "{}" != M(Object(t))
                })), "JSON", {
                    stringify: function(t) {
                        for (var e, i, n = [t], r = 1; arguments.length > r;) n.push(arguments[r++]);
                        if (i = e = n[1], (y(e) || void 0 !== t) && !G(t)) return v(e) || (e = function(t, e) {
                            if ("function" == typeof i && (e = i.call(this, t, e)), !G(e)) return e
                        }), n[1] = e, M.apply(O, n)
                    }
                }), D.prototype[F] || i(4)(D.prototype, F, D.prototype.valueOf), u(D, "Symbol"), u(Math, "Math", !0), u(n.JSON, "JSON", !0)
            }, function(t, e, i) {
                var n = i(13)("meta"),
                    r = i(8),
                    s = i(3),
                    o = i(1).f,
                    a = 0,
                    c = Object.isExtensible || function() {
                        return !0
                    },
                    l = !i(10)(function() {
                        return c(Object.preventExtensions({}))
                    }),
                    h = function(t) {
                        o(t, n, {
                            value: {
                                i: "O" + ++a,
                                w: {}
                            }
                        })
                    },
                    u = t.exports = {
                        KEY: n,
                        NEED: !1,
                        fastKey: function(t, e) {
                            if (!r(t)) return "symbol" == typeof t ? t : ("string" == typeof t ? "S" : "P") + t;
                            if (!s(t, n)) {
                                if (!c(t)) return "F";
                                if (!e) return "E";
                                h(t)
                            }
                            return t[n].i
                        },
                        getWeak: function(t, e) {
                            if (!s(t, n)) {
                                if (!c(t)) return !0;
                                if (!e) return !1;
                                h(t)
                            }
                            return t[n].w
                        },
                        onFreeze: function(t) {
                            return l && u.NEED && c(t) && !s(t, n) && h(t), t
                        }
                    }
            }, function(t, e, i) {
                var n = i(19),
                    r = i(34),
                    s = i(26);
                t.exports = function(t) {
                    var e = n(t),
                        i = r.f;
                    if (i)
                        for (var o, a = i(t), c = s.f, l = 0; a.length > l;) c.call(t, o = a[l++]) && e.push(o);
                    return e
                }
            }, function(t, e, i) {
                var n = i(33);
                t.exports = Array.isArray || function(t) {
                    return "Array" == n(t)
                }
            }, function(t, e, i) {
                var n = i(5),
                    r = i(35).f,
                    s = {}.toString,
                    o = "object" == typeof window && window && Object.getOwnPropertyNames ? Object.getOwnPropertyNames(window) : [];
                t.exports.f = function(t) {
                    return o && "[object Window]" == s.call(t) ? function(t) {
                        try {
                            return r(t)
                        } catch (t) {
                            return o.slice()
                        }
                    }(t) : r(n(t))
                }
            }, function(t, e, i) {
                var n = i(26),
                    r = i(11),
                    s = i(5),
                    o = i(15),
                    a = i(3),
                    c = i(27),
                    l = Object.getOwnPropertyDescriptor;
                e.f = i(2) ? l : function(t, e) {
                    if (t = s(t), e = o(e, !0), c) try {
                        return l(t, e)
                    } catch (t) {}
                    if (a(t, e)) return r(!n.f.call(t, e), t[e])
                }
            }, function(t, e) {}, function(t, e, i) {
                i(25)("asyncIterator")
            }, function(t, e, i) {
                i(25)("observable")
            }])
        }, "object" == typeof i && "object" == typeof e ? e.exports = r() : "function" == typeof define && define.amd ? define([], r) : "object" == typeof i ? i["@marcom/useragent-detect"] = r() : n["@marcom/useragent-detect"] = r()
    }, {}],
    284: [function(t, e, i) {
        "use strict";
        var n = function(t) {
                this.el = t
            },
            r = n.prototype;
        r.on = function() {
            this.el.addEventListener.apply(this.el, arguments)
        }, r.off = function() {
            this.el.removeEventListener.apply(this.el, arguments)
        }, r.once = function(t, e) {
            var i = function() {
                e(), this.off(t, i)
            }.bind(this);
            this.on(t, i)
        }, r.trigger = function(t, e) {
            var i = new CustomEvent(t, {
                detail: e
            });
            this.el.dispatchEvent(i)
        }, e.exports = n
    }, {}],
    285: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            r = function() {
                n.call(this)
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o.constructor = r, o.once = function(t, e, i) {
            if (i) {
                s.once.apply(this, [t, function() {
                    e.apply(i, arguments)
                }])
            } else s.once.apply(this, arguments)
        }, o.on = function(t, e, i) {
            if (arguments.length > 2) {
                this._boundListeners || (this._boundListeners = {}), this._boundListeners[t] || (this._boundListeners[t] = []);
                var n = e.bind(i);
                return this._boundListeners[t].push([e, i, n]), s.on.call(this, t, n)
            }
            return s.on.apply(this, arguments)
        }, o.off = function(t, e, i) {
            if (!(arguments.length > 2)) return s.off.apply(this, arguments);
            try {
                for (var n = this._boundListeners[t], r = 0, o = n.length; r < o; r++)
                    if (n[r][0] === e && n[r][1] === i) {
                        var a = n.splice(r, 1)[0];
                        return s.off.call(this, t, a[2])
                    }
            } catch (t) {}
        }, o.destroy = function() {
            this._boundListeners = void 0, s.destroy.call(this)
        }, e.exports = r
    }, {
        "@marcom/ac-event-emitter-micro": 201
    }],
    286: [function(t, e, i) {
        "use strict";
        e.exports = t("./utils/urlOptimizer/OptimizeVideoUrl")
    }, {
        "./utils/urlOptimizer/OptimizeVideoUrl": 353
    }],
    287: [function(t, e, i) {
        "use strict";
        var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } : function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            },
            r = t("../event-emitter-shim/EventEmitterShim"),
            s = t("../dom-emitter/DOMEmitterMicro"),
            o = t("../video/VideoFactory").create,
            a = t("@marcom/useragent-detect"),
            c = t("@marcom/ac-fullscreen"),
            l = t("../posterframe/PosterFrameFactory"),
            h = t("@marcom/ac-raf-emitter/update"),
            u = t("@marcom/ac-raf-emitter/cancelUpdate"),
            d = t("@marcom/ac-feature/isRetina")(),
            p = t("@marcom/ac-feature/isDesktop")(),
            f = t("@marcom/ac-feature/isHandheld")(),
            m = a.browser.safari && a.os.osx,
            _ = a.browser.safari && a.os.ios,
            v = a.browser.chrome,
            g = t("../ui/DefaultBreakpoints"),
            y = t("@marcom/ac-console/log"),
            b = t("./event/EventsToForward"),
            E = t("./event/ReadyStateChangeEvents"),
            w = t("../utils/BreakpointDetect"),
            x = t("../ui/keyboard-control/createKeyboardControl"),
            C = t("../ui/controls-interaction/createControlsInteraction"),
            S = t("@marcom/ac-accessibility/helpers/hide"),
            T = t("@marcom/ac-accessibility/helpers/show"),
            k = t("../utils/getVersion"),
            A = function(t) {
                t = t || {}, this.el = t.el || document.createElement("div"), this._elementEmitter = new s(this.el), this.VERSION = k, this.options = t, r.call(this), this._controlsFactory = t.controlsFactory, this._urlOptimizer = t.urlOptimizer;
                try {
                    var e = window.top;
                    this._maxWidth = t.maxWidth || Math.min(window.innerWidth, 1280) || Math.min(e.innerWidth, 1280)
                } catch (e) {
                    this._maxWidth = t.maxWidth || Math.min(window.innerWidth, 1280)
                }
                this._lastResize = 0, this._lastMouseCoords = {}, this.el.classList.add("ac-video-player"), this._isLive = t.live, this._isLive && this._useLiveMode(), this._videoImpl = o(t, this.el), this._isResponsive = t.responsive, this._isResponsive && (this._breakpointDetect = new w({
                    el: this.el,
                    player: this,
                    breakpoints: g,
                    addClass: !0
                })), this._supportsInlineVideo = p || !(f && _), this._cachedPiPMode = this.isPictureInPicture(), this._cachedReadyState = this.getReadyState(), this._cachedVisibleTracksLength = 0, this.el.appendChild(this._videoImpl.getRenderElement()), (t.poster || void 0 === t.poster) && this._initPoster(t.poster), this._bindMethods(), this._addEventListeners(), p && (this._keyboardControl = x({
                    player: this,
                    threesixty: t.threesixty,
                    keyboardTarget: t.keyboardTarget
                })), t.controls && this._initUIComponents(), t.parentElement && t.parentElement.appendChild(this.el), this.refreshSize = this.refreshSize.bind(this), this._refreshSizeTimeout = setTimeout(this.refreshSize, 0), window.addEventListener("DOMContentLoaded", this.refreshSize)
            };
        A.LOADEDMETADATA = 1, A.LOADEDDATA = 2, A.CANPLAY = 3, A.CANPLAYTHROUGH = 4;
        var L = r.prototype,
            P = A.prototype = Object.create(L);
        P.constructor = A, P._bindMethods = function() {
            this._onStart = this._onStart.bind(this), this._onEnded = this._onEnded.bind(this), this._onTimeUpdate = this._onTimeUpdate.bind(this), this._onCaptionsChanged = this._onCaptionsChanged.bind(this), this._onPlay = this._onPlay.bind(this), this._onFullscreenChange = this._onFullscreenChange.bind(this), this._forwardEvent = this._forwardEvent.bind(this), this._onPresentationModeChanged = this._onPresentationModeChanged.bind(this), this._forwardFullScreenChangeEvent = this._forwardNamedEvent.bind(this, "fullscreen:change"), this._forwardEnterFullScreenEvent = this._forwardNamedEvent.bind(this, "enterfullscreen"), this._forwardExitFullScreenEvent = this._forwardNamedEvent.bind(this, "exitfullscreen"), this._onDurationChange = this._onDurationChange.bind(this), this._forwardReadyStateChange = this._forwardReadyStateChange.bind(this), this._showControls = this._showControls.bind(this), this._hideControls = this._hideControls.bind(this), this._raiseControls = this._raiseControls.bind(this), this._lowerControls = this._lowerControls.bind(this), this._onPlayPromiseError = this._onPlayPromiseError.bind(this), this._onPlayPromiseResolved = this._onPlayPromiseResolved.bind(this)
        }, P._addEventListeners = function() {
            for (var t = 0, e = b.length; t < e; t++) this._videoImpl.on(b[t], this._forwardEvent);
            for (t = 0, e = E.length; t < e; t++) this._videoImpl.on(E[t], this._forwardReadyStateChange);
            this._videoImpl.on("timeupdate", this._onTimeUpdate), this._videoImpl.on("webkitpresentationmodechanged", this._onPresentationModeChanged), this._videoImpl.on("durationchange", this._onDurationChange), this._videoImpl.on("addtrack", this._forwardEvent), this._videoImpl.on("change", this._forwardEvent), this._videoImpl.on("change", this._onCaptionsChanged), this._videoImpl.on("removetrack", this._forwardEvent), this._videoImpl.on("loadedmetadata", this._refreshSize), this._videoImpl.on("loadeddata", this._refreshSize), p ? (c.on("enterfullscreen", this._forwardEnterFullScreenEvent), c.on("exitfullscreen", this._forwardExitFullScreenEvent), c.on("enterfullscreen", this._forwardFullScreenChangeEvent), c.on("exitfullscreen", this._forwardFullScreenChangeEvent), this.on("fullscreen:change", this._onFullscreenChange)) : _ && (this._videoImpl.on("webkitbeginfullscreen", this._forwardEnterFullScreenEvent), this._videoImpl.on("webkitendfullscreen", this._forwardExitFullScreenEvent), this._videoImpl.on("webkitbeginfullscreen", this._forwardFullScreenChangeEvent), this._videoImpl.on("webkitendfullscreen", this._forwardFullScreenChangeEvent), f && this.on("fullscreen:change", this._onFullscreenChange)), this._videoImpl.on("PlayPromiseError", this._onPlayPromiseError), this._videoImpl.on("PlayPromiseResolved", this._onPlayPromiseResolved)
        }, P._onPlayPromiseResolved = function() {
            this.trigger("PlayPromiseResolved")
        }, P._removeEventListeners = function() {
            for (var t = 0, e = b.length; t < e; t++) this._videoImpl.off(b[t], this._forwardEvent);
            for (t = 0, e = E.length; t < e; t++) this._videoImpl.off(E[t], this._forwardReadyStateChange);
            this._videoImpl.off("timeupdate", this._onTimeUpdate), this._videoImpl.off("webkitpresentationmodechanged", this._onPresentationModeChanged), this._videoImpl.off("durationchange", this._onDurationChange), p ? (c.off("enterfullscreen", this._forwardEnterFullScreenEvent), c.off("exitfullscreen", this._forwardExitFullScreenEvent), c.off("enterfullscreen", this._forwardFullScreenChangeEvent), c.off("exitfullscreen", this._forwardFullScreenChangeEvent)) : a.os.ios && (this._videoImpl.off("webkitbeginfullscreen", this._forwardEnterFullScreenEvent), this._videoImpl.off("webkitendfullscreen", this._forwardExitFullScreenEvent), this._videoImpl.off("webkitbeginfullscreen", this._forwardFullScreenChangeEvent), this._videoImpl.off("webkitendfullscreen", this._forwardFullScreenChangeEvent)), this._videoImpl.off("PlayPromiseError", this._onPlayPromiseError)
        }, P._forwardReadyStateChange = function() {
            var t = this.getReadyState();
            (t > this._cachedReadyState || 0 === t) && (this._cachedReadyState = t, this.trigger("readystatechange", {
                readyState: t
            }))
        }, P._forwardEvent = function(t) {
            y(t.type + " time:" + this.getCurrentTime()), this.trigger(t.type)
        }, P._forwardNamedEvent = function(t) {
            y(t + " time:" + this.getCurrentTime()), this.trigger(t)
        }, P._onPlayPromiseError = function() {
            y("play() Promise rejected, probably because the browser is blocking autoplay"), this.el.classList.add("initial-play"), this._showStartState(), this.once("play", this._onPlay)
        }, P._onCaptionsChanged = function(t) {
            var e = this.getVisibleTextTracks().length;
            e > 0 && 0 === this._cachedVisibleTracksLength ? this.trigger("texttrackshow") : 0 === e && this._cachedVisibleTracksLength > 0 && this.trigger("texttrackhide"), this._cachedVisibleTracksLength = e
        }, P._onTimeUpdate = function() {
            this.trigger("timeupdate", {
                currentTime: this.getCurrentTime()
            })
        }, P.load = function(t, e, i, n) {
            if (this.refreshSize(), Array.isArray(t) || (t = [t]), e && !Array.isArray(e) && (e = [{
                    src: e
                }]), this._cachedReadyState = 0, n || (n = this.options), this._urlOptimizer) {
                e || (e = t.map(this._urlOptimizer.getCaptionsSource).filter(function(t) {
                    return !!t
                }));
                var r = this.getVisibleTextTracks();
                r && r.length && e && e.length && (e[0].mode = "showing");
                var s = n.maxWidth || this._calcMaxWidth();
                t = t.map(function(t) {
                    return this._urlOptimizer.getVideoSource(t, s, null, {
                        maxWidth: this._maxWidth
                    })
                }.bind(this))
            }
            var o = n && n.thumbnails || this._urlOptimizer && this._urlOptimizer.getThumbnailImageSource(t[0]);
            this.once("play", this._onPlay), this._poster && this._poster.show(), (this.options.autoplay && p || this.getEnded()) && this.once("loadstart", function() {
                this.play()
            }.bind(this)), n || (n = this.options), n && this.setPoster(n.poster), this._poster && this._poster.show(), this.controls && this.controls.sharingModule && (n.sharing ? this.controls.sharingModule.setData(n.sharing) : this.controls.sharingModule.setData(null)), void 0 !== n.live && (this._isLive = n.live, this._useLiveMode()), this._hideEndState(), this._videoImpl.load(t, e, i), this.controls && this.controls.overlays ? this.controls.overlays.setData(o) : this.controls && this.once("controlsready", function() {
                this.controls.overlays && this.controls.overlays.setData(o)
            }.bind(this)), this.controls && this.controls.endState ? this.controls.endState.setData(n.endState) : this.controls && this.once("controlsready", function() {
                this.controls.endState && this.controls.endState.setData(n.endState)
            }.bind(this))
        }, P._calcMaxWidth = function() {
            return this.el.parentElement ? this.el.parentElement.clientWidth : this._maxWidth
        }, P._isActiveArea = function(t) {
            for (; t !== this.el;) {
                if (t.hasAttribute("data-acv-active-area")) return !0;
                t = t.parentNode
            }
            return !1
        }, P._onPresentationModeChanged = function(t) {
            this._forwardEvent(t);
            var e = this.isPictureInPicture();
            this._cachedPiPMode !== e && (this._cachedPiPMode = e, y("pictureinpicture:change to " + e), this.trigger("pictureinpicture:change"))
        }, P._onDurationChange = function(t) {
            this.getDuration() > 3600 && this.el.classList.add("longform"), this.refreshSize()
        }, P.appendTo = function(t) {
            t.appendChild(this.el), this.refreshSize()
        }, P.getTextTracks = function() {
            return Array.prototype.slice.call(this._videoImpl.getTextTracks())
        }, P.getVisibleTextTracks = function() {
            var t = Array.prototype.slice.call(this._videoImpl.getTextTracks());
            return t && t.length && (t = t.filter(function(t) {
                return "showing" === t.mode
            })), t
        }, P.getFullScreenElement = function() {
            return p ? this.el : this.getMediaElement()
        }, P.getFullScreenEnabled = function() {
            return c.fullscreenEnabled(this.getFullScreenElement())
        }, P.isFullscreen = function() {
            return p ? c.fullscreenElement() === this.getFullScreenElement() : this._videoImpl.isFullscreen()
        }, P.requestFullscreen = function() {
            if (!this.isFullscreen()) {
                this.controls && (this.controls.el.display = "none"), this._hideControls(), this.trigger("fullscreen:willenter", {
                    type: "enter"
                }), this._lastResize = Date.now(), u(this._updateFullscreenId);
                var t = this;
                this._updateFullscreenId = h(function e() {
                    t.refreshSize(), t._updateFullscreenId = h(e)
                }), v ? setTimeout(function() {
                    this._lastResize = Date.now(), c.requestFullscreen(this.getFullScreenElement())
                }.bind(this), 300) : c.requestFullscreen(this.getFullScreenElement())
            }
        }, P.exitFullscreen = function() {
            this.isFullscreen() && (this.controls && (this.controls.el.display = "none"), this._hideControls(), this.trigger("fullscreen:willexit", {
                type: "exit"
            }), v ? setTimeout(function() {
                c.exitFullscreen(this.getFullScreenElement())
            }.bind(this), 300) : c.exitFullscreen(this.getFullScreenElement()))
        }, P._onFullscreenChange = function() {
            this._lastResize = Date.now(), this.controls && (this.controls.el.display = ""), this._hideControls(), this._preventUserInteraction = !0, setTimeout(function() {
                u(this._updateFullscreenId), this._preventUserInteraction = !1, this.refreshSize()
            }.bind(this), 750), this.refreshSize()
        }, P.toggleFullscreen = function() {
            this.isFullscreen() ? this.exitFullscreen() : this.requestFullscreen()
        }, P._initUIComponents = function() {
            this._controlsFactory ? (this._instantiateDefaultCustomUIControls(), p ? this.el.appendChild(this._blockade.el) : (this.controls.el.classList.add("mobile"), this.setControls(!0))) : this.setControls(!0)
        }, P._showControls = function() {
            this._controlsVisible = !0, this.el.classList.remove("initial-play"), this.el.classList.add("user-hover")
        }, P._hideControls = function() {
            this._controlsVisible = !1, this.el.classList.remove("user-hover"), this.hideCaptionsSelector()
        }, P._raiseControls = function() {
            this._controlsVisible = !0, this.el.classList.remove("mouse-leave")
        }, P._lowerControls = function() {
            this._controlsVisible = !1, this.el.classList.add("mouse-leave"), this.hideCaptionsSelector()
        }, P._onControlsReady = function() {
            this.options.autoplay && p || this._showStartState()
        }, P._showStartState = function() {
            this.controls && this.controls.el.classList.add("start-state"), this._poster && this._poster.show(), p || S(this.getMediaElement())
        }, P._hideStartState = function() {
            this.controls && this.controls.el.classList.remove("start-state"), this._poster && this._poster.hide(), p || T(this.getMediaElement())
        }, P._showEndState = function() {
            this.controls && (this.controls.mainControlsElement ? this.controls.mainControlsElement.contains(document.activeElement) && setTimeout(function() {
                this.controls.playButtonElement.focus()
            }.bind(this)) : this.el.contains(document.activeElement) && !this.controls.sharingModule.el.contains(document.activeElement) && setTimeout(function() {
                this.controls.playButtonElement.focus()
            }.bind(this)), this.controls.el.classList.add("end-state")), this._poster && this._poster.show(), S(this.getMediaElement())
        }, P._hideEndState = function() {
            this.controls && this.controls.el.classList.remove("end-state"), p || T(this.getMediaElement())
        }, P._createBlockade = function() {
            this._blockade = new s(document.createElement("div")), this._blockade.el.classList.add("ac-video-blockade")
        }, P._instantiateDefaultCustomUIControls = function() {
            return this.controls = this._controlsFactory.create({
                player: this,
                endState: this.options.endState,
                enableMainControls: p,
                basePath: this.options.localizationBasePath,
                template: this.options.template,
                readyCallback: function() {
                    this.options.autoplay && p || this._showStartState(), this.trigger("controlsready")
                }.bind(this)
            }), this.controls.el.parentNode !== this.el && this.el.appendChild(this.controls.el), this._videoImpl.setControls(!1), this._createBlockade(), this._controlsInteraction = C({
                player: this,
                keyboardControl: this._keyboardControl,
                controlsTimeoutDuration: this.options.controlsTimeoutDuration,
                showControls: this._showControls,
                hideControls: this._hideControls,
                raiseControls: this._raiseControls,
                lowerControls: this._lowerControls,
                controlsVisible: function() {
                    return this._controlsVisible
                }.bind(this),
                sendMouseDown: this._videoImpl.sendMouseDown,
                elementEmitter: this._elementEmitter
            }), this.controls
        }, P._onPlay = function() {
            m ? this.once("timeupdate", this._onStart, function() {
                return this.getCurrentTime() > 0
            }.bind(this)) : this.once("timeupdate", this._onStart)
        }, P.isCaptionsSelectorShowing = function() {
            return this.controls.el.classList.contains("captions-selector-showing")
        }, P.showCaptionsSelector = function() {
            this.controls.el.classList.add("captions-selector-showing")
        }, P.hideCaptionsSelector = function() {
            this.controls.el.classList.remove("captions-selector-showing")
        }, P._onStart = function() {
            this.el.classList.add("initial-play"), this._poster && this._poster.hide(), this.controls && (this._hideStartState(), this._hideEndState()), this.once("ended", this._onEnded)
        }, P._onEnded = function() {
            this.isFullscreen() && this.exitFullscreen(), this.controls && (this._hideStartState(), this._showEndState()), setTimeout(function() {
                this.once("timeupdate", this._onStart)
            }.bind(this), 300), this._poster && this._poster.show()
        }, P._initPoster = function(t) {
            this._poster = l({
                player: this,
                video: this._videoImpl,
                useNativePoster: !1 === this.options.controls,
                is2x: d,
                src: t
            }), this._poster.el && this.el.appendChild(this._poster.el), this.options.autoplay || this._poster.show()
        }, P._useLiveMode = function() {
            this._isLive ? this.el.classList.add("ac-video-live") : this.el.classList.remove("ac-video-live")
        }, P.once = function(t, e, i) {
            if (arguments.length < 3 || "object" === (void 0 === i ? "undefined" : n(i))) L.once.apply(this, arguments);
            else {
                var r = arguments,
                    s = Array.prototype.slice.call(arguments, 2),
                    o = function() {
                        s.every(function(t) {
                            return !!t()
                        }) && (r[1].apply(this, r), this.off(r[0], o))
                    }.bind(this);
                this.on(r[0], o)
            }
        }, P.getMediaElement = function() {
            return this._videoImpl.getMediaElement()
        }, P.play = function() {
            y("play called"), this._videoImpl.play()
        }, P.pause = function() {
            this._videoImpl.pause()
        }, P.seek = function(t) {
            this.setCurrentTime.apply(this, arguments)
        }, P.addTextTrack = function(t) {
            this._videoImpl.addTextTrack(t)
        }, P.getReadyState = function() {
            return this._videoImpl.getMediaElement().readyState
        }, P.getPreload = function() {
            return this._videoImpl.getPreload()
        }, P.setPoster = function(t) {
            this._poster.setSrc(t)
        }, P.getPoster = function() {
            this._poster.getSrc()
        }, P.getVolume = function() {
            return this._videoImpl.getVolume()
        }, P.getMuted = function() {
            return this._videoImpl.getMuted()
        }, P.getCurrentTime = function() {
            return this._videoImpl.getCurrentTime()
        }, P.getDuration = function() {
            return this._videoImpl.getDuration()
        }, P.getPaused = function() {
            return this._videoImpl.getPaused()
        }, P.getEnded = function() {
            return this._videoImpl.getEnded()
        }, P.setCurrentTime = function(t) {
            return this._videoImpl.setCurrentTime(t)
        }, P.setVolume = function(t) {
            return this.trigger("uservolumechange"), this._videoImpl.setVolume(t)
        }, P.setMuted = function(t) {
            this.trigger("uservolumechange"), this._videoImpl.setMuted(t)
        }, P.setSrc = function(t) {
            this._videoImpl.setSrc(t)
        }, P.getCurrentSrc = function() {
            return this._videoImpl.getCurrentSrc()
        }, P.setControls = function(t) {
            return this._videoImpl.setControls(t)
        }, P.getMediaHeight = function() {
            return this._videoImpl.getMediaElement().videoHeight
        }, P.getMediaWidth = function() {
            return this._videoImpl.getMediaElement().videoWidth
        }, P.supportsPictureInPicture = function() {
            return this._videoImpl.supportsPictureInPicture()
        }, P.isPictureInPicture = function() {
            return this._videoImpl.isPictureInPicture()
        }, P.setPictureInPicture = function(t) {
            return this._videoImpl.setPictureInPicture(t)
        }, P.supportsAirPlay = function() {
            return this._videoImpl.supportsAirPlay()
        }, P.isLive = function() {
            return this._isLive
        }, P.refreshSize = function() {
            this._breakpointDetect ? this._breakpointDetect.refresh() : (this._currentBreakpoint && this.el.classList.remove(this._currentBreakpoint.name), this._currentBreakpoint = w.getBreakpointFromElement(this.el, g), this.el.classList.add(this._currentBreakpoint.name)), this._videoImpl.refreshSize()
        }, P.destroy = function() {
            this._removeEventListeners(), this.controls && (this.controls.destroy(), this.controls = null), this.el.innerHTML = "", this._breakpointDetect && this._breakpointDetect.destroy(), this._videoImpl.destroy(), this._videoImpl = null, clearTimeout(this._refreshSizeTimeout), r.prototype.destroy.call(this)
        }, e.exports = A
    }, {
        "../dom-emitter/DOMEmitterMicro": 284,
        "../event-emitter-shim/EventEmitterShim": 285,
        "../posterframe/PosterFrameFactory": 294,
        "../ui/DefaultBreakpoints": 303,
        "../ui/controls-interaction/createControlsInteraction": 322,
        "../ui/keyboard-control/createKeyboardControl": 337,
        "../utils/BreakpointDetect": 345,
        "../utils/getVersion": 347,
        "../video/VideoFactory": 357,
        "./event/EventsToForward": 289,
        "./event/ReadyStateChangeEvents": 290,
        "@marcom/ac-accessibility/helpers/hide": 149,
        "@marcom/ac-accessibility/helpers/show": 152,
        "@marcom/ac-console/log": 166,
        "@marcom/ac-feature/isDesktop": 204,
        "@marcom/ac-feature/isHandheld": 205,
        "@marcom/ac-feature/isRetina": 206,
        "@marcom/ac-fullscreen": 209,
        "@marcom/ac-raf-emitter/cancelUpdate": 243,
        "@marcom/ac-raf-emitter/update": 245,
        "@marcom/useragent-detect": 283
    }],
    288: [function(t, e, i) {
        "use strict";
        var n = function() {
                function t(t, e) {
                    for (var i = 0; i < e.length; i++) {
                        var n = e[i];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                    }
                }
                return function(e, i, n) {
                    return i && t(e.prototype, i), n && t(e, n), e
                }
            }(),
            r = function t(e, i, n) {
                null === e && (e = Function.prototype);
                var r = Object.getOwnPropertyDescriptor(e, i);
                if (void 0 === r) {
                    var s = Object.getPrototypeOf(e);
                    return null === s ? void 0 : t(s, i, n)
                }
                if ("value" in r) return r.value;
                var o = r.get;
                return void 0 !== o ? o.call(n) : void 0
            };
        var s = t("./Player"),
            o = t("../ui/controls-interaction/createControlsInteraction"),
            a = t("@marcom/useragent-detect").os,
            c = a.ios || a.android || !t("@marcom/ac-feature/isDesktop")(),
            l = function(t) {
                function e(t) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, e);
                    var i = function(t, e) {
                        if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !e || "object" != typeof e && "function" != typeof e ? t : e
                    }(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this, t));
                    return t.threesixty && i.el.classList.add("threesixty-video"), i
                }
                return function(t, e) {
                    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
                }(e, s), n(e, [{
                    key: "_bindMethods",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_bindMethods", this).call(this), this._showCompass = this._showCompass.bind(this), this._hideCompass = this._hideCompass.bind(this), this.panToOrigin = this.panToOrigin.bind(this)
                    }
                }, {
                    key: "_addEventListeners",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_addEventListeners", this).call(this)
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_removeEventListeners", this).call(this), this.controls.compass.removeEventListener("click", this.panToOrigin)
                    }
                }, {
                    key: "_showCompass",
                    value: function() {
                        this.el.classList.add("threesixty-ui")
                    }
                }, {
                    key: "_hideCompass",
                    value: function() {
                        this.el.classList.remove("threesixty-ui")
                    }
                }, {
                    key: "_instantiateDefaultCustomUIControls",
                    value: function() {
                        return this.controls = this._controlsFactory.create({
                            player: this,
                            endState: this.options.endState,
                            threesixty: !0,
                            enableMainControls: !0,
                            basePath: this.options.localizationBasePath,
                            template: this.options.template,
                            readyCallback: function() {
                                this.options.autoplay && !c || this._showStartState(), this.trigger("controlsready")
                            }.bind(this)
                        }), this.controls.el.parentNode !== this.el && this.el.appendChild(this.controls.el), this._videoImpl.setControls(!1), this._createBlockade(), this._controlsInteraction = o({
                            player: this,
                            keyboardControl: this._keyboardControl,
                            threesixty: !0,
                            controlsTimeoutDuration: this.options.controlsTimeoutDuration,
                            threesixtyElementsTimeoutDuration: this.options.threesixtyElementsTimeoutDuration,
                            showControls: this._showControls,
                            hideControls: this._hideControls,
                            raiseControls: this._raiseControls,
                            lowerControls: this._lowerControls,
                            showCompass: this._showCompass,
                            hideCompass: this._hideCompass,
                            controlsVisible: function() {
                                return this._controlsVisible
                            }.bind(this),
                            sendMouseDown: this._videoImpl.sendMouseDown,
                            elementEmitter: this._elementEmitter
                        }), this.controls
                    }
                }, {
                    key: "panToOrigin",
                    value: function() {
                        this.get360().panToPosition({
                            lat: 0,
                            lon: 0
                        })
                    }
                }, {
                    key: "get360",
                    value: function() {
                        return this._videoImpl.get360()
                    }
                }, {
                    key: "getFullScreenElement",
                    value: function() {
                        return this.el
                    }
                }, {
                    key: "getFullScreenEnabled",
                    value: function() {
                        return !c && r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "getFullScreenEnabled", this).call(this)
                    }
                }]), e
            }();
        e.exports = l
    }, {
        "../ui/controls-interaction/createControlsInteraction": 322,
        "./Player": 287,
        "@marcom/ac-feature/isDesktop": 204,
        "@marcom/useragent-detect": 283
    }],
    289: [function(t, e, i) {
        "use strict";
        e.exports = ["loadstart", "progress", "suspend", "abort", "error", "emptied", "stalled", "play", "pause", "loadedmetadata", "loadeddata", "waiting", "playing", "canplay", "canplaythrough", "seeking", "seeked", "ended", "ratechange", "durationchange", "volumechange", "addtrack", "change", "removetrack"]
    }, {}],
    290: [function(t, e, i) {
        "use strict";
        e.exports = ["loadstart", "suspend", "abort", "error", "emptied", "stalled", "loadedmetadata", "loadeddata", "waiting", "canplay", "canplaythrough"]
    }, {}],
    291: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-feature/isDesktop")();
        e.exports = function(e) {
            var i;
            (e ? arguments.length > 1 && (e = Object.assign.apply(null, Array.prototype.slice.apply(arguments))) : e = {}, e.components || (e.components = t("../../ui/DefaultComponents")), void 0 === e.controls && (e.controls = !0), e.controlsImplementation || (e.controlsImplementation = t("../../ui/ControlBar")), e.controlsFactory || (e.controlsFactory = t("../../ui/ControlsFactory")({
                controlsImplementation: e.controlsImplementation,
                components: e.components,
                template: e.controlsTemplate
            })), (void 0 !== e.urlOptimizer && !0 === e.urlOptimizer || "true" === e.urlOptimizer) && (e.urlOptimizer = t("../../optimizeVideoUrl")), e.sources || e.src ? e.sources = e.sources ? e.sources : e.src ? [e.src] : [] : e.sources = [], e.autoplay = void 0 !== e.autoplay ? e.autoplay : n, e.controlsTimeoutDuration || (e.controlsTimeoutDuration = 3e3), e.threesixty) ? (e.threesixtyElementsTimeoutDuration || (e.threesixtyElementsTimeoutDuration = 3e3), i = new(t("../ThreeSixtyPlayer"))(e)) : i = new(t("../Player"))(e);
            var r = {};
            return e.sharing && (r.sharing = Object.assign({}, e.sharing)), e.thumbnails && (r.thumbnails = Object.assign({}, e.thumbnails)), e.endState && (r.endState = Object.assign({}, e.endState)), e.sources && e.sources.length && i.load(e.sources, e.textTracks, e.startTime, r), i
        }
    }, {
        "../../optimizeVideoUrl": 286,
        "../../ui/ControlBar": 301,
        "../../ui/ControlsFactory": 302,
        "../../ui/DefaultComponents": 304,
        "../Player": 287,
        "../ThreeSixtyPlayer": 288,
        "@marcom/ac-feature/isDesktop": 204
    }],
    292: [function(t, e, i) {
        "use strict";
        e.exports = t("./createPlayer")
    }, {
        "./createPlayer": 291
    }],
    293: [function(t, e, i) {
        "use strict";
        var n = function(t) {
                this._defaultSrc = t.src, this._initialize(t)
            },
            r = n.prototype;
        r._initialize = function(t) {
            var e = t.src;
            this.el = t.el || document.createElement("div"), this._imgElement = document.createElement("img"), this._imgElement.src = e, this._currentSrc = e, this._imgElement.alt = "", this._imgElement.addEventListener("load", this._onLoad.bind(this)), this.el.appendChild(this._imgElement), this.hide(), this.el.classList.add("ac-video-poster")
        }, r.hide = function() {
            this.el.classList.add("ac-video-poster-hide")
        }, r.show = function() {
            this.el.classList.remove("ac-video-poster-hide")
        }, r.setSrc = function(t) {
            var e = t || this._defaultSrc;
            e !== this._currentSrc && (this._imgElement.style.display = "none", this._imgElement.src = e, this._currentSrc = e)
        }, r._onLoad = function() {
            this._imgElement.style.display = ""
        }, r.getSrc = function() {
            return this._imgElement.src
        }, e.exports = n
    }, {}],
    294: [function(t, e, i) {
        "use strict";
        var n = t("./PosterFrame"),
            r = "/ac/ac-video-posterframe/1.0/images/ac-video-poster_848x480.jpg",
            s = "/ac/ac-video-posterframe/1.0/images/ac-video-poster_848x480_2x.jpg";
        e.exports = function(t) {
            if (t.src = t.src || (t.is2x ? s : r), t.useNativePoster) {
                t.video.setPoster(t.src);
                var e, i = !1;
                return {
                    show: function() {
                        i = !0, e && (t.video.setPoster(e), e = null)
                    },
                    hide: function() {
                        i = !1
                    },
                    setSrc: function(n) {
                        i ? t.video.setPoster(n) : e = n
                    }
                }
            }
            return new n(t)
        }
    }, {
        "./PosterFrame": 293
    }],
    295: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-ajax-xhr"),
            r = t("@marcom/ac-function/throttle"),
            s = t("./parseVTT"),
            o = function(t, e) {
                this._view = t, this._video = e.video, this._refreshTracks = this._refreshTracks.bind(this), this._throttledRefreshCurrentCaption = r(this._refreshCurrentCaption.bind(this), 300), this._addTrackListeners()
            },
            a = o.prototype;
        a._addTrackListeners = function() {
            this._video.on("addtrack", this._refreshTracks), this._video.on("removetrack", this._refreshTracks), this._video.on("change", this._refreshTracks)
        }, a._addVideoListeners = function(t) {
            if (!t.cues) {
                this._view.setText("");
                try {
                    return n.get(t.src, {
                        complete: function(e) {
                            t.cues = s(e.responseText), this._addVideoListeners(t), this._refreshCurrentCaption()
                        }.bind(this),
                        error: function(t) {}.bind(this)
                    })
                } catch (t) {}
            }
            this._video.on("loadstart", this._refreshTracks), this._video.on("timeupdate", this._throttledRefreshCurrentCaption)
        }, a._removeVideoListeners = function() {
            this._video.off("loadstart", this._refreshTracks), this._video.off("timeupdate", this._throttledRefreshCurrentCaption)
        }, a._refreshTracks = function() {
            var t = this._video.getTextTracks();
            t && t.length && (t = t.filter(function(t) {
                return "showing" === t.mode
            })), t.length ? (this._activeTrack = t[0], this._addVideoListeners(this._activeTrack)) : (this._activeTrack = null, this._removeVideoListeners()), this._refreshCurrentCaption()
        }, a._getCurrentCaptionText = function(t) {
            var e = this._activeTrack ? this._activeTrack.cues : null;
            if (!e) return "";
            if (this._currentCaption && this._currentCaption.startTime >= t && this._currentCaption <= t) return this._currentCaption.text;
            for (var i, n = 0, r = e.length; n < r;) {
                if (e[n].startTime <= t && e[n].endTime >= t) i = e[n];
                else if (e[n].startTime >= t) break;
                n++
            }
            return this._currentCaption = i, i ? i.text : ""
        }, a._refreshCurrentCaption = function() {
            this._view.setText(this._getCurrentCaptionText(this._video.getCurrentTime()))
        }, a.destroy = function() {
            this._removeVideoListeners()
        }, e.exports = o
    }, {
        "./parseVTT": 300,
        "@marcom/ac-ajax-xhr": 155,
        "@marcom/ac-function/throttle": 217
    }],
    296: [function(t, e, i) {
        "use strict";
        var n = t("../ui/factory/createComponents"),
            r = t("./TextTracksBehavior"),
            s = t("../ui/elements/Label"),
            o = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            a = {
                textTracksPolyfill: {
                    className: "ac-video-player-text-track",
                    view: {
                        classDef: s,
                        options: {}
                    },
                    behavior: {
                        classDef: r
                    }
                }
            },
            c = function(t) {
                o.call(this), this.container = t.container, this._video = t.video, this._initialize(t)
            },
            l = c.prototype = Object.create(o.prototype);
        l._initialize = function(t) {
            this._onTrackChange = this._onTrackChange.bind(this), this.el = document.createElement("div"), this.el.innerHTML = t.template || '<div class="ac-video-player-text-track"></div>', this.el.classList.add("ac-video-player-text-track-container"), this._tracks = t.tracks || [], this._textTrackComponent = n(this.el, a, {
                video: this._video
            })
        }, l._onTrackChange = function() {
            this.trigger("change"), this.el.parentElement || (this._video.getRenderElement().parentElement.appendChild(this.el), this.el.firstElementChild.classList.add("is-visible"))
        }, l.addTrack = function(t) {
            this._tracks || (this._tracks = []);
            var e = t.mode || "hidden",
                i = this._onTrackChange;
            Object.defineProperty(t, "mode", {
                get: function() {
                    return e
                },
                set: function(t) {
                    e = t, i()
                },
                enumerable: !0,
                configurable: !0
            }), this._tracks.push(t), this.trigger("addtrack")
        }, l.clearTracks = function() {
            this._tracks = [], this.trigger("removetrack"), this.trigger("change")
        }, l.getTextTracks = function() {
            return this._tracks
        }, l.trigger = function(t, e) {
            return o.prototype.trigger.call(this, t, Object.assign({
                type: t
            }, e || {}))
        }, l.destroy = function() {
            this._textTrackComponent.destroy(), o.prototype.destroy.call(this)
        }, e.exports = c
    }, {
        "../ui/elements/Label": 325,
        "../ui/factory/createComponents": 333,
        "./TextTracksBehavior": 295,
        "@marcom/ac-event-emitter-micro": 201
    }],
    297: [function(t, e, i) {
        "use strict";
        var n, r = t("@marcom/useragent-detect");
        n = r.browser.safari ? function(t, e) {
            t.track.mode = e
        } : function(t, e) {
            t.mode = e
        };
        var s = function(t) {
            var e;
            if (t instanceof HTMLElement) return this._videoElement.appendChild(t);
            var i = document.createElement("track");
            i.src = t.src, i.kind = "captions", i.srclang = t.srclang, "en" === i.srclang ? i.label = t.label || "English" : i.label = t.label || t.srclang && t.srclang.toUpperCase() || "Unknown CC", r.browser.firefox ? (e = this._videoElement.textTracks.length, setTimeout(function() {
                this._videoElement.appendChild(i), n(this._videoElement.textTracks[e], t.mode || "hidden")
            }.bind(this), 0)) : r.os.android ? (e = this._videoElement.textTracks.length, this._videoElement.appendChild(i), n(this._videoElement.textTracks[e], t.mode || "hidden")) : (this._videoElement.appendChild(i), n(i, t.mode || "hidden"))
        };
        e.exports = {
            create: function(t) {
                for (var e = 0, i = t ? t.length : 0; e < i; e++) {
                    var n = t[e];
                    s.call(this, n)
                }
            },
            add: s,
            get: function() {
                return this._videoElement.textTracks
            },
            getEmitter: function() {
                if (!this._textTracksEmitter) {
                    var e = t("../dom-emitter/DOMEmitterMicro");
                    this._textTracksEmitter = new e(this.getTextTracks())
                }
                return this._textTracksEmitter
            },
            destroy: function() {}
        }
    }, {
        "../dom-emitter/DOMEmitterMicro": 284,
        "@marcom/useragent-detect": 283
    }],
    298: [function(t, e, i) {
        "use strict";
        var n = t("./TextTracksDOM");
        e.exports = {
            create: function(t) {
                if (t)
                    if (this._textTracksPolyfill) {
                        this._textTracksPolyfill.clearTracks();
                        for (var e = 0, i = t.length; e < i; e++) this._textTracksPolyfill.addTrack(t[e])
                    } else this._textTracksPolyfill = new n({
                        video: this,
                        tracks: t,
                        container: this._parentElement
                    })
            },
            add: function(t) {
                return this._textTracksPolyfill.addTrack(t)
            },
            get: function() {
                return this._textTracksPolyfill || this._createTextTrackTags([]), this._textTracksPolyfill.getTextTracks()
            },
            getEmitter: function() {
                return this._textTracksPolyfill || this._createTextTrackTags([]), this._textTracksPolyfill
            },
            destroy: function() {
                this._textTracksPolyfill.destroy(), this._textTracksPolyfill = null
            }
        }
    }, {
        "./TextTracksDOM": 296
    }],
    299: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/useragent-detect"),
            r = !n.browser.ie && !n.browser.edge;
        e.exports = function(e) {
            var i;
            return i = !!(e = e || {}).hls || !e.threesixty && (void 0 === e.useNativeCaptions ? r : e.useNativeCaptions), t(i ? "./TextTracksNative" : "./TextTracksPolyfill")
        }
    }, {
        "./TextTracksNative": 297,
        "./TextTracksPolyfill": 298,
        "@marcom/useragent-detect": 283
    }],
    300: [function(t, e, i) {
        "use strict";
        var n = t("../utils/Time");
        e.exports = function(t) {
            for (var e, i, r = t.split(/\n/), s = /([\d]{2}:)?[\d]{2}:[\d]{2}.[\d]{3}( \-\-> ){1}([\d]{2}:)?[\d]{2}:[\d]{2}.[\d]{3}/, o = [], a = 0, c = r.length; a < c; a++)
                if (i = "", s.test(r[a])) {
                    for ((e = r[a].split(" --\x3e "))[0] = e[0].split(":").length < 3 ? "00:" + e[0] : e[0], e[1] = e[1].split(":").length < 3 ? "00:" + e[1] : e[1]; ++a && a < c && !s.test(r[a]);) "" !== r[a] && (i += r[a] + "<br />");
                    i = i.substr(0, i.length - 6), a < c && a--, o.push({
                        startTime: n.stringToNumber(e[0].split(" ")[0]),
                        endTime: n.stringToNumber(e[1].split(" ")[0]),
                        text: i
                    })
                }
            return o
        }
    }, {
        "../utils/Time": 346
    }],
    301: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-string/supplant"),
            r = t("../utils/Time"),
            s = t("./localization/Localization"),
            o = t("./factory/createComponents"),
            a = t("@marcom/ac-feature/isDesktop")(),
            c = t("./overlays/OverlayContainer"),
            l = t("./end-state/EndStateItemContainer"),
            h = t("./compass/Compass"),
            u = t("../utils/merge"),
            d = function(t) {
                this._initialize(t)
            },
            p = d.prototype;
        p._initialize = function(t) {
            this.el = t.element || document.createElement("div"), this._basePath = t.basePath, this.el.style.display = "none", this._template = t.template || '<div class="controls-container" >\n\n\t<div class="{elementClassPrefix}-social-tray hidden"></div>\n\n\t<div class="center-button-container {elementClassPrefix}-play-pause-button-container">\n\t\t<div class="button-wrapper">\n\t\t\t<button type="button" class="ac-video-icon centered-button {elementClassPrefix}-play-pause-button {elementClassPrefix}-button no-autoplay" value="{playpause}" aria-label="{playpause}" role="button" tabindex="0" data-acv-active-area data-acv-draggable-area></button>\n\t\t</div>\n\t</div>\n\n\t<div class="main-controls-container">\n\t\t<div class="ac-video-overlay-container"></div>\n\t\t<div class="main-controls">\n\t\t\t<div class="button-wrapper">\n\t\t\t\t<div class="main-controls-item controls-volume">\n\t\t\t\t\t<button type="button" class="ac-video-icon {elementClassPrefix}-toggle-mute-volume-button {elementClassPrefix}-button" value="{togglemutevolume}" aria-label="{togglemutevolume}" role="button" tabindex="0" data-acv-active-area></button>\n\t\t\t\t\t<div class="{elementClassPrefix}-volume-level-indicator" tabindex="0" aria-valuemin="0" aria-valuemax="100" min="0" max="100" aria-label="{adjustvolume}" role="slider" aria-orientation="vertical" step="0.05" data-acv-active-area></div>\n\t\t\t\t</div>\n\t\t\t</div>\n\n\t\t\t<div class="button-wrapper">\n\t\t\t\t<button type="button" class="ac-video-icon main-controls-item {elementClassPrefix}-text-tracks-toggle-button {elementClassPrefix}-button no-text-tracks" value="{captionscontrol}" aria-label="{captionscontrol}" role="button" tabindex="0" data-acv-active-area></button>\n\t\t\t\t<div class="ac-video-captions-selector-container">\n\t\t\t\t\t<span class="ac-video-captions-selector-title">{subtitlescontrol}</span>\n\t\t\t\t\t<ul class="{elementClassPrefix}-captions-selector" role="radiogroup" aria-label="{subtitlescontrol}" data-acv-active-area></ul>\n\t\t\t\t</div>\n\t\t\t</div>\n\n\t\t\t<div class="main-controls-item controls-progress">\n\t\t\t\t<div class="controls-progress-time controls-progress-time-1">\n\t\t\t\t\t<div class="{elementClassPrefix}-elapsed-time-indicator" role="text" tabindex="-1">\n\t\t\t\t\t\t<span class="label">{elapsed}</span>\n\t\t\t\t\t\t<span class="{elementClassPrefix}-elapsed-time">00:00</span>\n\t\t\t\t\t\t<span class="{elementClassPrefix}-time-maxwidth" aria-hidden="true">44:44</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t\t<div class="controls-progress-bar">\n\t\t\t\t\t<div class="{elementClassPrefix}-buffered-indicator"></div>\n\t\t\t\t\t<div class="{elementClassPrefix}-progress-indicator ac-slider-inactive" aria-label="progress-indicator" role="slider" precision="float" min="0" max="{max}" step="0.0005" value="0" tabindex="0" aria-valuemax="{max}" aria-valuemin="{min}" aria-valuenow="{value}" data-acv-active-area></div>\n\t\t\t\t</div>\n\t\t\t\t<div class="controls-progress-time controls-progress-time-2">\n\t\t\t\t\t<div class="{elementClassPrefix}-remaining-time-indicator" role="text" tabindex="-1">\n\t\t\t\t\t\t<span class="label">{remaining}</span>\n\t\t\t\t\t\t<span class="{elementClassPrefix}-remaining-time">-00:00</span>\n\t\t\t\t\t\t<span class="{elementClassPrefix}-time-maxwidth" aria-hidden="true">-44:44</span>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\n\t\t\t<div class="main-controls-item live-stream">\n\t\t\t\t<span class="live-stream-text">{livestream}</span>\n\t\t\t</div>\n\n\t\t\t<div class="button-wrapper">\n\t\t\t\t<button type="button" class="ac-video-icon main-controls-item {elementClassPrefix}-airplay-button {elementClassPrefix}-button airplay-unsupported" value="{airplay}" aria-label="{airplay}" role="button" tabindex="0" data-acv-active-area></button>\n\t\t\t</div>\n\n\t\t\t<div class="button-wrapper">\n\t\t\t\t<button type="button" class="ac-video-icon main-controls-item {elementClassPrefix}-picture-in-picture-button {elementClassPrefix}-button picture-in-picture-unsupported" value="{pictureinpicture}" aria-label="{pictureinpicture}" role="button" tabindex="0" data-acv-active-area></button>\n\t\t\t</div>\n\n\t\t\t<div class="button-wrapper">\n\t\t\t\t<button type="button" class="ac-video-icon main-controls-item {elementClassPrefix}-full-screen-button {elementClassPrefix}-button fullscreen-unsupported" value="{fullscreen}" aria-label="{fullscreen}" role="button" tabindex="0" data-acv-active-area></button>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\n\t<div class="end-state-wrapper">\n\t\t<div class="end-state-container"></div>\n\t</div>\n</div>\n\n<div class="compass-wrapper" data-acv-active-area>\n\t<div class="compass-background ac-video-icon"></div>\n\t<div class="compass-arrows">\n\t\t<button class="compass-arrow-top ac-video-icon" aria-label="{threesixtyup}" role="button" tabindex="0"></button>\n\t\t<button class="compass-arrow-right ac-video-icon" aria-label="{threesixtyright}" role="button" tabindex="0"></button>\n\t\t<button class="compass-arrow-bottom ac-video-icon" aria-label="{threesixtydown}" role="button" tabindex="0"></button>\n\t\t<button class="compass-arrow-left ac-video-icon" aria-label="{threesixtyleft}" role="button" tabindex="0"></button>\n\t</div>\n\t<div class="compass-field ac-video-icon"></div>\n\t<div class="compass-ring ac-video-icon"></div>\n\t<button class="compass" aria-label="{threesixtyicon}" role="button" tabindex="0"></button>\n</div>\n', this._templateData = t.templateData || Object.assign({
                elementClassPrefix: "controls"
            }), this._destroyed = !1, this._localize().then(function() {
                this._destroyed || (this._initUIComponents(t), this.el.style.display = ""), "function" == typeof t.readyCallback && t.readyCallback()
            }.bind(this))
        }, p._localize = function() {
            return new Promise(function(t) {
                s.getTranslation({
                    callback: function(e) {
                        t(e)
                    }.bind(this),
                    basePath: this._basePath
                })
            }.bind(this)).then(function(t) {
                this._templateData = Object.assign(this._templateData, t)
            }.bind(this))
        }, p._renderTemplateMarkup = function() {
            var t = n(this._template, this._templateData);
            this.el.innerHTML = t
        }, p._initDesktopControls = function(t, e) {
            this._componentCollection = o(t, u(e, {
                elementClassPrefix: this._templateData.elementClassPrefix,
                elapsedTimeIndicator: {
                    behavior: {
                        observe: {
                            source: this._player,
                            events: ["timeupdate", "seeking", "seeked", "durationchange"],
                            update: function(t) {
                                t.setText(r.formatTime(this._player.getCurrentTime(), this._player.getDuration()))
                            }.bind(this)
                        }
                    }
                },
                remainingTimeIndicator: {
                    behavior: {
                        observe: {
                            source: this._player,
                            events: ["timeupdate", "seeking", "seeked", "durationchange"],
                            update: function(t) {
                                t.setText(r.formatTime(this._player.getCurrentTime() - this._player.getDuration(), this._player.getDuration()))
                            }.bind(this)
                        }
                    }
                },
                volumeLevel: {
                    view: {
                        options: {
                            value: this._player.getMuted() ? 0 : 100 * this._player.getVolume()
                        }
                    }
                },
                playPauseContainer: {
                    view: {
                        options: {
                            labels: {
                                playing: this._templateData.pause,
                                paused: this._templateData.play,
                                ended: this._templateData.replay
                            }
                        }
                    }
                },
                fullScreen: {
                    view: {
                        options: {
                            labels: {
                                initial: this._templateData.fullscreen,
                                on: this._templateData.exitfullscreen,
                                off: this._templateData.fullscreen
                            }
                        }
                    }
                },
                pictureInPictureToggle: {
                    view: {
                        options: {
                            labels: {
                                initial: this._templateData.pictureinpicture,
                                on: this._templateData.exitpictureinpicture,
                                off: this._templateData.pictureinpicture
                            }
                        }
                    }
                }
            }), {
                player: this._player,
                localization: this._templateData
            })
        }, p._initUIComponents = function(t) {
            this._player = t.player;
            var e = this.el,
                i = t.components;
            e.classList.add(t.className || "ac-video-controls"), this._renderTemplateMarkup();
            var n = e.querySelector(".main-controls-container");
            t.enableMainControls ? (n.classList.add("control-bar-skin-default"), this.mainControlsElement = n) : n.parentElement.removeChild(n);
            var r = e.querySelector(".end-state-container");
            this.endState = new l(Object.assign({}, {
                el: r,
                player: this._player
            }, t.endState)), t.threesixty && (this.compass = new h({
                rootElement: e,
                player: this._player
            })), this._initDesktopControls(e, i), this.sharingModule = this._componentCollection.components.socialShare[0].behavior.sharingModule, this._componentCollection.components.progressBar.length && (this.scrubberView = this._componentCollection.components.progressBar[0].view), this.playButtonElement = this.el.querySelector(".controls-play-pause-button"), a && (this.overlays = new c({
                el: this.el.querySelector(".ac-video-overlay-container"),
                player: this._player
            }))
        }, p.destroy = function() {
            this._componentCollection && (this._componentCollection.destroy(), this._componentCollection = null), this._destroyed = !0, this._player = null, this._templateData = null
        }, e.exports = d
    }, {
        "../utils/Time": 346,
        "../utils/merge": 348,
        "./compass/Compass": 318,
        "./end-state/EndStateItemContainer": 331,
        "./factory/createComponents": 333,
        "./localization/Localization": 339,
        "./overlays/OverlayContainer": 341,
        "@marcom/ac-feature/isDesktop": 204,
        "@marcom/ac-string/supplant": 277
    }],
    302: [function(t, e, i) {
        "use strict";
        var n = {
            components: t("./DefaultComponents"),
            controlsImplementation: t("./ControlBar")
        };
        e.exports = function(t) {
            t = t || {};
            var e = Object.assign({}, n, t);
            return {
                create: function(i) {
                    var r = Object.assign({}, e, i);
                    return r.components = t.components || n.components, new r.controlsImplementation(r)
                }
            }
        }
    }, {
        "./ControlBar": 301,
        "./DefaultComponents": 304
    }],
    303: [function(t, e, i) {
        "use strict";
        e.exports = [{
            name: "small",
            minWidth: 0,
            maxWidth: 479
        }, {
            name: "medium",
            minWidth: 480,
            maxWidth: 779
        }, {
            name: "large",
            minWidth: 780,
            maxWidth: 1 / 0
        }]
    }, {}],
    304: [function(t, e, i) {
        "use strict";
        var n = t("./elements/Button"),
            r = t("./elements/StatefulButton"),
            s = t("./elements/Label"),
            o = t("./elements/ListSelector"),
            a = t("./elements/Slider"),
            c = t("./elements/Container"),
            l = t("./behaviors/MuteButtonBehavior"),
            h = t("./behaviors/PlayPauseButtonBehavior"),
            u = t("./behaviors/PictureInPictureButtonBehavior"),
            d = t("./behaviors/CaptionsButtonBehavior"),
            p = t("./behaviors/CaptionsSelectorBehavior"),
            f = t("./behaviors/FullScreenButtonBehavior"),
            m = t("./behaviors/ProgressBarSliderBehavior"),
            _ = t("./behaviors/VolumeSliderBehavior"),
            v = t("./behaviors/SharingButtonBehavior"),
            g = t("./behaviors/SocialContainerBehavior"),
            y = t("./behaviors/AirPlayButtonBehavior"),
            b = t("./elements/mixins/CursorPointer");
        e.exports = {
            back30Seconds: {
                className: "back-30-seconds-button",
                view: {
                    classDef: n
                }
            },
            fullScreen: {
                className: "full-screen-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: "fullscreen-unsupported",
                            on: "is-fullscreen",
                            off: ""
                        },
                        labels: {
                            initial: "fullscreen",
                            on: "exitfullscreen",
                            off: "fullscreen"
                        }
                    }
                },
                behavior: {
                    classDef: f
                }
            },
            toggleMuteVolume: {
                className: "toggle-mute-volume-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: [],
                            on: ["is-muted"],
                            off: []
                        }
                    }
                },
                behavior: {
                    classDef: l
                }
            },
            playPauseContainer: {
                className: "play-pause-button-container",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            playing: ["is-playing"],
                            paused: [],
                            ended: ["is-ended"]
                        }
                    }
                },
                behavior: {
                    classDef: h
                }
            },
            pictureInPictureToggle: {
                className: "picture-in-picture-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: ["picture-in-picture-unsupported"],
                            on: ["is-picture-in-picture"],
                            off: []
                        },
                        labels: {
                            initial: "pictureinpicture",
                            on: "exitpictureinpicture",
                            off: "pictureinpicture"
                        }
                    }
                },
                behavior: {
                    classDef: u
                }
            },
            captionsToggle: {
                className: "text-tracks-toggle-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: ["no-text-tracks"],
                            on: ["text-tracks-visible"],
                            off: []
                        }
                    }
                },
                behavior: {
                    classDef: d
                }
            },
            captionsSelector: {
                className: "captions-selector",
                view: {
                    classDef: o
                },
                behavior: {
                    classDef: p
                }
            },
            airplayToggle: {
                className: "airplay-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: ["airplay-unsupported"],
                            on: ["airplay-active"],
                            off: []
                        }
                    }
                },
                behavior: {
                    classDef: y
                }
            },
            elapsedTimeIndicator: {
                className: "elapsed-time",
                view: {
                    classDef: s
                }
            },
            remainingTimeIndicator: {
                className: "remaining-time",
                view: {
                    classDef: s
                }
            },
            progressBar: {
                className: "progress-indicator",
                view: {
                    classDef: a,
                    options: {
                        template: '<div class="ac-slider-runnable-track">\n\t<div class="ac-slider-hover-track">\n\t\t<div class="ac-slider-hover-notch"></div>\n\t</div>\n\t<div class="ac-slider-thumb">\n\t\t<div class="ac-slider-thumb-background-wrapper">\n\t\t\t<div class="ac-slider-thumb-background"></div>\n\t\t</div>\n\t</div>\n\t<div class="ac-slider-inner-track">\n\t\t<div class="ac-slider-scrubbed"></div>\n\t</div>\n</div>',
                        min: 0,
                        max: 1,
                        mixins: [b],
                        orientation: "horizontal"
                    }
                },
                behavior: {
                    classDef: m
                }
            },
            volumeLevel: {
                className: "volume-level-indicator",
                view: {
                    classDef: a,
                    options: {
                        template: '<div class="ac-slider-runnable-track">\n\t<div class="ac-slider-background"></div>\n\t<div class="ac-slider-thumb-wrapper">\n\t\t<div class="ac-slider-thumb">\n\t\t\t<div class="ac-slider-thumb-background-wrapper">\n\t\t\t\t<div class="ac-slider-thumb-background"></div>\n\t\t\t</div>\n\t\t</div>\n\t</div>\n\t<div class="ac-slider-inner-track">\n\t\t<div class="ac-slider-scrubbed"></div>\n\t</div>\n</div>',
                        min: 0,
                        max: 100,
                        mixins: [b],
                        orientation: "vertical"
                    }
                },
                behavior: {
                    classDef: _
                }
            },
            sharing: {
                className: "sharing-button",
                view: {
                    classDef: r,
                    options: {
                        states: {
                            initial: ["sharing-unsupported"],
                            on: ["is-sharing"],
                            off: []
                        }
                    }
                },
                behavior: {
                    classDef: v
                }
            },
            socialShare: {
                className: "social-tray",
                view: {
                    classDef: c,
                    options: {}
                },
                behavior: {
                    classDef: g
                }
            }
        }
    }, {
        "./behaviors/AirPlayButtonBehavior": 305,
        "./behaviors/CaptionsButtonBehavior": 308,
        "./behaviors/CaptionsSelectorBehavior": 309,
        "./behaviors/FullScreenButtonBehavior": 310,
        "./behaviors/MuteButtonBehavior": 311,
        "./behaviors/PictureInPictureButtonBehavior": 312,
        "./behaviors/PlayPauseButtonBehavior": 313,
        "./behaviors/ProgressBarSliderBehavior": 314,
        "./behaviors/SharingButtonBehavior": 315,
        "./behaviors/SocialContainerBehavior": 316,
        "./behaviors/VolumeSliderBehavior": 317,
        "./elements/Button": 323,
        "./elements/Container": 324,
        "./elements/Label": 325,
        "./elements/ListSelector": 326,
        "./elements/Slider": 327,
        "./elements/StatefulButton": 328,
        "./elements/mixins/CursorPointer": 329
    }],
    305: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._player.supportsAirPlay() && (this._airplayStateChange = this._airplayStateChange.bind(this), this._player.getMediaElement().addEventListener("webkitplaybacktargetavailabilitychanged", this._airplayStateChange), this._updateState = this._updateState.bind(this), this._player.getMediaElement().addEventListener("webkitcurrentplaybacktargetiswirelesschanged", this._updateState))
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._airplayStateChange = function(t) {
            "available" === t.availability ? this._airplayAvailable = !0 : this._airplayAvailable = !1, this._updateState()
        }, o._updateState = function() {
            this._player.getMediaElement().webkitCurrentPlaybackTargetIsWireless ? this._view.setState("on") : this._airplayAvailable ? this._view.setState("off") : this._view.setState("initial")
        }, o._onClick = function() {
            this._player.getMediaElement().webkitShowPlaybackTargetPicker()
        }, o.destroy = function() {
            this._player.getMediaElement().removeEventListener("webkitplaybacktargetavailabilitychanged", this._airplayStateChange), this._player.getMediaElement().removeEventListener("webkitcurrentplaybacktargetiswirelesschanged", this._updateState)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    306: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e) {
            this._player = e.player, this._view = t, this._addViewListeners && this._addViewListeners(), this._addPlayerListeners && this._addPlayerListeners()
        }
    }, {}],
    307: [function(t, e, i) {
        "use strict";
        var n = t("./BaseBehavior"),
            r = function(t, e) {
                this._onClick = this._onClick.bind(this), n.apply(this, arguments)
            },
            s = r.prototype = Object.create(n.prototype);
        s._addViewListeners = function() {
            this._view.on("click", this._onClick)
        }, s._onClick = function(t) {}, s.destroy = function() {
            this._view.off("click", this._onClick)
        }, e.exports = r
    }, {
        "./BaseBehavior": 306
    }],
    308: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._updateState(), this._allowMultiLanguageCaptions = !this._player.options.disableMultiLanguageCaptions
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._updateState = function() {
            var t = this._player.getVisibleTextTracks(),
                e = this._player.getTextTracks().filter(function(t) {
                    return "subtitles" === t.kind || "captions" === t.kind || !t.kind
                });
            t.length ? this._view.setState("on") : e.length ? this._view.setState("off") : this._view.setState("initial")
        }, o._addPlayerListeners = function() {
            this._updateState = this._updateState.bind(this), this._player.on("addtrack", this._updateState), this._player.on("change", this._updateState), this._player.on("removetrack", this._updateState)
        }, o._onClick = function() {
            var t = this._player.getVisibleTextTracks(),
                e = this._player.getTextTracks().filter(function(t) {
                    return "metadata" !== t.kind
                });
            e.length > 1 && this._allowMultiLanguageCaptions ? this._player.isCaptionsSelectorShowing() ? this._player.hideCaptionsSelector() : this._player.showCaptionsSelector() : 1 === t.length ? e[0].mode = "hidden" : e[0].mode = "showing", setTimeout(this._updateState)
        }, o.destroy = function() {
            this._player.off("addtrack", this._updateState), this._player.off("change", this._updateState), this._player.off("removetrack", this._updateState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    309: [function(t, e, i) {
        "use strict";
        var n = "__CC_DISABLE",
            r = t("./BaseBehavior"),
            s = t("@marcom/useragent-detect").browser,
            o = s.edge || s.ie,
            a = function(t, e) {
                r.apply(this, arguments), this._updateState()
            },
            c = a.prototype = Object.create(r.prototype);
        c._addViewListeners = function() {
            this._onSelected = this._onSelected.bind(this), this._view.on("ItemSelected", this._onSelected)
        }, c._updateState = function() {
            var t = "showing",
                e = this._player.getTextTracks().filter(function(t) {
                    return "subtitles" === t.kind || "captions" === t.kind || !t.kind
                }).map(function(e) {
                    "showing" === e.mode && (t = "hidden");
                    var i = {
                        label: e.label || e.language || e.srclang && ("en" === e.srclang.toLowerCase() ? "English" : e.srclang) || "Unknown CC",
                        language: e.language
                    };
                    return Object.defineProperty(i, "mode", {
                        get: function() {
                            return e.mode
                        },
                        set: function(t) {
                            e.mode = t
                        }
                    }), i
                });
            this._view.setItems([{
                label: "Off",
                language: n,
                mode: t
            }].concat(e))
        }, c._addPlayerListeners = function() {
            this._updateState = this._updateState.bind(this), this._player.on("addtrack", this._updateState), this._player.on("change", this._updateState), this._player.on("removetrack", this._updateState)
        }, c._onSelected = function(t) {
            var e = t.detail;
            this._player.getVisibleTextTracks().forEach(function(t) {
                t.mode = "hidden"
            }), e.language !== n && (e.mode = "showing"), o && this._player.getMediaElement().textTracks.dispatchEvent(new CustomEvent("change")), setTimeout(this._updateState)
        }, c.destroy = function() {
            this._player.off("addtrack", this._updateState), this._player.off("change", this._updateState), this._player.off("removetrack", this._updateState), this._view.off("ItemSelected", this._onSelected)
        }, e.exports = a
    }, {
        "./BaseBehavior": 306,
        "@marcom/useragent-detect": 283
    }],
    310: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._player.getFullScreenEnabled() && this._updateState()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._addPlayerListeners = function() {
            this._updateState = this._updateState.bind(this), this._player.on("fullscreen:change", this._updateState)
        }, o._updateState = function() {
            this._view.setState(this._player.isFullscreen() ? "on" : "off")
        }, o._onClick = function() {
            this._player.toggleFullscreen(!this._player.isFullscreen())
        }, o.destroy = function() {
            this._player.off("fullscreen:change", this._updateState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    311: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._updateState()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._updateState = function() {
            this._view.setState(this._player.getMuted() ? "on" : "off")
        }, o._addPlayerListeners = function() {
            this._updateState = this._updateState.bind(this), this._player.on("volumechange", this._updateState)
        }, o._onClick = function() {
            this._player.getMuted() ? (this._player.setMuted(!1), 0 === this._player.getVolume() && this._player.setVolume(.1)) : this._player.setMuted(!0)
        }, o.destroy = function() {
            this._player.off("volumechange", this._updateState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    312: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._initialize()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._initialize = function() {
            this._updateButtonState = this._updateButtonState.bind(this), this._player.supportsPictureInPicture() && (this._updateButtonState(), this._player.on("webkitpresentationmodechanged", this._updateButtonState))
        }, o._onClick = function() {
            this._player.setPictureInPicture(!this._player.isPictureInPicture())
        }, o._updateButtonState = function() {
            this._view.setState(this._player.isPictureInPicture() ? "on" : "off")
        }, o.destroy = function() {
            this._player.off("webkitpresentationmodechanged", this._updateButtonState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    313: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._setPlayingState()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._addPlayerListeners = function() {
            this._setPlayingState = this._setPlayingState.bind(this), this._player.on("play", this._setPlayingState), this._player.on("playing", this._setPlayingState), this._player.on("pause", this._setPlayingState), this._player.on("ended", this._setPlayingState)
        }, o._onClick = function() {
            this._togglePlay()
        }, o._setPlayingState = function() {
            this._view.setState(this._player.getEnded() ? "ended" : this._player.getPaused() ? "paused" : "playing")
        }, o._togglePlay = function() {
            this._player.getPaused() || this._player.getEnded() ? this._player.play() : this._player.pause()
        }, o.destroy = function() {
            this._player.off("play", this._setPlayingState), this._player.off("pause", this._setPlayingState), this._player.off("playing", this._setPlayingState), this._player.off("ended", this._setPlayingState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    314: [function(t, e, i) {
        "use strict";
        var n = t("./BaseBehavior"),
            r = t("@marcom/ac-string/supplant"),
            s = t("@marcom/ac-raf-emitter/draw"),
            o = t("@marcom/ac-raf-emitter/cancelDraw"),
            a = function(t, e) {
                n.apply(this, arguments), this._visible = !1, this._ariaTextTemplate = e.localization.currenttimetext, this._onDurationChange()
            },
            c = a.prototype = Object.create(n.prototype);
        c._addViewListeners = function() {
            this._onSliderGrab = this._onSliderGrab.bind(this), this._onSliderChange = this._onSliderChange.bind(this), this._onSliderRelease = this._onSliderRelease.bind(this), this._view.on("grab", this._onSliderGrab)
        }, c._addPlayerListeners = function() {
            this._onTimeUpdate = this._onTimeUpdate.bind(this), this._onPlay = this._onPlay.bind(this), this._onPause = this._onPause.bind(this), this._onEnded = this._onEnded.bind(this), this._onDurationChange = this._onDurationChange.bind(this), this._onRAF = this._onRAF.bind(this), this._player.on("durationchange", this._onDurationChange), this._player.on("loadstart", this._onEnded), this._player.on("ended", this._onEnded), this._player.on("timeupdate", this._onTimeUpdate), this._player.on("play", this._onPlay), this._player.on("pause", this._onPause), this._player.on("ended", this._onEnded)
        }, c._setIsPlaying = function(t) {
            t ? this._view.setState("is-playing") : this._view.clearState("is-playing")
        }, c._onPlay = function() {
            this._setIsPlaying(!0), this._player.isLive() || (o(this._timeUpdateInterval), s(this._onRAF))
        }, c._onRAF = function() {
            this._onTimeUpdate(), this._timeUpdateInterval = s(this._onRAF)
        }, c._onPause = function() {
            this._setIsPlaying(!1), o(this._timeUpdateInterval), this._onTimeUpdate()
        }, c._onEnded = function() {
            this._onPause(), this._updateSliderPosition(0)
        }, c._onSliderGrab = function() {
            this._player.off("timeupdate", this._onTimeUpdate), o(this._timeUpdateInterval), this._view.off("grab", this._onSliderGrab), this._view.on("change", this._onSliderChange), this._view.on("release", this._onSliderRelease), this._onPause()
        }, c._onSliderRelease = function() {
            this._view.off("change", this._onSliderChange), this._view.off("release", this._onSliderRelease), this._view.on("grab", this._onSliderGrab), this._player.on("timeupdate", this._onTimeUpdate), this._player.getPaused() || this._onPlay()
        }, c._getTimeAsPercent = function() {
            return this._player.getCurrentTime() / this._cachedDuration
        }, c._onDurationChange = function() {
            this._cachedDuration = this._player.getDuration(), this._updateSliderPosition(this._getTimeAsPercent()), this._player.getPaused() || this._onPlay()
        }, c._onSliderChange = function() {
            var t = this._view.getValue();
            this._setPlayerCurrentTime(t * this._cachedDuration), this._setAriaValueText(t * this._cachedDuration), this._updateScrubbedValue()
        }, c._onTimeUpdate = function() {
            this._player.getPaused(), this._updateSliderPosition(this._getTimeAsPercent())
        }, c._updateSliderPosition = function(t) {
            this._view.setValue(t), this._setAriaValueText(t * this._cachedDuration), this._updateScrubbedValue(), this._visible || isNaN(this._cachedDuration) || (this._view.show(), this._visible = !0)
        }, c._setAriaValueText = function(t) {
            var e = Math.floor(t / 60),
                i = Math.ceil(t % 60);
            this._view.setAriaValueText(r(this._ariaTextTemplate, {
                minutes: e,
                seconds: i
            }))
        }, c._updateScrubbedValue = function() {
            this._view.setScrubbedValue()
        }, c._setPlayerCurrentTime = function(t) {
            this._player.setCurrentTime(t)
        }, c._removeEventListeners = function() {
            this._player.off("durationchange", this._onDurationChange), this._player.off("loadstart", this._onEnded), this._player.off("ended", this._onEnded), this._player.off("timeupdate", this._onTimeUpdate), this._view.off("change", this._onSliderChange), this._view.off("release", this._onSliderRelease), this._view.off("grab", this._onSliderGrab), this._player.off("play", this._onPlay), this._player.off("pause", this._onPause), this._player.off("ended", this._onPause)
        }, c.destroy = function() {
            this._removeEventListeners(), o(this._timeUpdateInterval)
        }, e.exports = a
    }, {
        "./BaseBehavior": 306,
        "@marcom/ac-raf-emitter/cancelDraw": 242,
        "@marcom/ac-raf-emitter/draw": 244,
        "@marcom/ac-string/supplant": 277
    }],
    315: [function(t, e, i) {
        "use strict";
        var n = t("./ButtonBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._player.states && this._updateState()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._addPlayerListeners = function() {
            this._updateState = this._updateState.bind(this), this._player.states && this._player.states.on("statechange", this._updateState)
        }, o._updateState = function() {
            this._stateChanging = !1, this._view.setState("sharing" === this._player.states.getCurrentState() ? "on" : "off")
        }, o._onClick = function() {
            this._stateChanging || ("sharing" === this._player.states.getCurrentState() ? (this._view.setState("off"), this._player.states.setState("none")) : (this._view.setState("on"), this._player.states.setState("sharing")), this._stateChanging = !0)
        }, o.destroy = function() {
            this._player.states && this._player.states.off("statechange", this._updateState), s.destroy.call(this)
        }, e.exports = r
    }, {
        "./ButtonBehavior": 307
    }],
    316: [function(t, e, i) {
        "use strict";
        var n = t("./BaseBehavior"),
            r = t("../sharing/SharingModule"),
            s = function(t, e) {
                n.apply(this, arguments), this._updateState()
            },
            o = n.prototype;
        (s.prototype = Object.create(o))._updateState = function() {
            this.sharingModule = new r(Object.assign({}, {
                player: this._player,
                parentView: this._view
            })), this.sharingModule.setData(this._player.options.sharing), this._view.el.innerHTML = "", this._view.el.appendChild(this.sharingModule.el)
        }, e.exports = s
    }, {
        "../sharing/SharingModule": 344,
        "./BaseBehavior": 306
    }],
    317: [function(t, e, i) {
        "use strict";
        var n = t("./BaseBehavior"),
            r = function(t, e) {
                n.apply(this, arguments), this._hideVolume(), this._updateSliderVolumeValue()
            },
            s = r.prototype = Object.create(n.prototype);
        s._addViewListeners = function() {
            this._showVolume = this._showVolume.bind(this), this._hideVolume = this._hideVolume.bind(this), this._onSliderGrab = this._onSliderGrab.bind(this), this._onSliderChange = this._onSliderChange.bind(this), this._onSliderRelease = this._onSliderRelease.bind(this), this._onFocusChange = this._onFocusChange.bind(this), this._view.on("grab", this._onSliderGrab), this._view.on("focuschange", this._onFocusChange)
        }, s._addPlayerListeners = function() {
            this._updateSliderVolumeValue = this._updateSliderVolumeValue.bind(this), this._onUserVolumeChange = this._onUserVolumeChange.bind(this), this._player.once("durationchange", this._updateSliderVolumeValue), this._player.on("volumechange", this._updateSliderVolumeValue), this._player.on("uservolumechange", this._onUserVolumeChange)
        }, s._onSliderGrab = function() {
            this._cachedVolume = this._player.getVolume(), this._player.off("volumechange", this._updateSliderVolumeValue), this._view.off("grab", this._onSliderGrab), this._view.on("change", this._onSliderChange), this._view.on("release", this._onSliderRelease)
        }, s._onSliderRelease = function() {
            this._setPlayerVolume(this._view.getValue()), this._view.off("change", this._onSliderChange), this._view.off("release", this._onSliderRelease), this._view.on("grab", this._onSliderGrab), this._player.on("volumechange", this._updateSliderVolumeValue)
        }, s._onSliderChange = function() {
            var t = this._view.getValue();
            this._setPlayerVolume(t), this._view.setScrubbedValue()
        }, s._setPlayerVolume = function(t) {
            t ? (this._player.setMuted(!1), this._player.setVolume(t / 100)) : (this._player.setMuted(!0), this._player.setVolume(this._cachedVolume))
        }, s._showVolume = function() {
            this._view.show()
        }, s._hideVolume = function() {
            this._view.hide()
        }, s._onUserVolumeChange = function() {
            this._showVolume(), clearTimeout(this._hideVolumeTimer), this._view.isFocused() || (this._hideVolumeTimer = setTimeout(this._hideVolume, 1e3))
        }, s._onFocusChange = function() {
            this._view.isFocused() ? this._showVolume() : this._hideVolume()
        }, s._updateSliderVolumeValue = function() {
            if (this._player.getMuted()) this._view.setValue(0), this._view.setScrubbedValue();
            else {
                var t = this._player.getVolume();
                this._view.setValue(100 * t), this._view.setScrubbedValue()
            }
        }, s._removeEventListeners = function() {
            this._player.off("durationchange", this._updateSliderVolumeValue), this._player.off("volumechange", this._updateSliderVolumeValue), this._player.off("uservolumechange", this._onUserVolumeChange), this._view.off("change", this._onSliderChange), this._view.off("release", this._onSliderRelease), this._view.off("grab", this._onSliderGrab)
        }, s.destroy = function() {
            this._removeEventListeners()
        }, e.exports = r
    }, {
        "./BaseBehavior": 306
    }],
    318: [function(t, e, i) {
        "use strict";
        var n = function() {
            function t(t, e) {
                for (var i = 0; i < e.length; i++) {
                    var n = e[i];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                }
            }
            return function(e, i, n) {
                return i && t(e.prototype, i), n && t(e, n), e
            }
        }();
        t("../localization/Localization");
        var r = t("@marcom/ac-keyboard/Keyboard"),
            s = (t("@marcom/ac-keyboard/keyMap"), t("@marcom/useragent-detect")),
            o = s.os.ios || s.os.android,
            a = t("@marcom/ac-360"),
            c = function() {
                function t(e) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, t), this._rootElement = e.rootElement, this._player = e.player, this._360 = this._player.get360(), this.el = this._rootElement.querySelector(".compass-wrapper"), this.compassRing = this.el.querySelector(".compass-ring"), this.compassField = this.el.querySelector(".compass-field"), this.compass = this.el.querySelector(".compass"), this.compassArrows = this.el.querySelector(".compass-arrows"), this.compassArrowLeft = this.el.querySelector(".compass-arrow-left"), this.compassArrowRight = this.el.querySelector(".compass-arrow-right"), this.compassArrowTop = this.el.querySelector(".compass-arrow-top"), this.compassArrowBottom = this.el.querySelector(".compass-arrow-bottom"), this._keyboard = new r(this.el), this._arrowControls = this._player.get360().arrowControls, this._bindMethods(), this._addEventListeners()
                }
                return n(t, [{
                    key: "_bindMethods",
                    value: function() {
                        this._onFocusIn = this._onFocusIn.bind(this), this._onFocusOut = this._onFocusOut.bind(this), this._onCompassClick = this._onCompassClick.bind(this), this._onCompassMouseEnter = this._onCompassMouseEnter.bind(this), this._onCompassMouseLeave = this._onCompassMouseLeave.bind(this), this._onCompassFocusIn = this._onCompassFocusIn.bind(this), this._onCompassFocusOut = this._onCompassFocusOut.bind(this), this._onRotationTransitionEnd = this._onRotationTransitionEnd.bind(this), this._onCompassArrowsClick = this._onCompassArrowsClick.bind(this), this._on360PositionChange = this._on360PositionChange.bind(this), this._on360IconUpdate = this._on360IconUpdate.bind(this), this._transitionTiming = this._transitionTiming.bind(this)
                    }
                }, {
                    key: "_addEventListeners",
                    value: function() {
                        this._player.once("controlsready", function() {
                            o || (this.compass.addEventListener("mouseenter", this._onCompassMouseEnter), this.compass.addEventListener("mouseleave", this._onCompassMouseLeave)), this.el.addEventListener("focusin", this._onFocusIn), this.el.addEventListener("focusout", this._onFocusOut), this.compass.addEventListener("click", this._onCompassClick), this.compass.addEventListener("focusin", this._onCompassFocusIn), this.compass.addEventListener("focusout", this._onCompassFocusOut), this.compassArrows.addEventListener("click", this._onCompassArrowsClick), this._360.on(a.POSITION_CHANGE, this._on360PositionChange), this._360.on(a.ROTATION_START, this._transitionTiming), this._360.on(a.ROTATION_COMPLETE, this._onRotationTransitionEnd)
                        }.bind(this))
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function() {
                        this.el.removeEventListener("focusin", this._onFocusIn), this.el.removeEventListener("focusout", this._onFocusOut), this.compass.removeEventListener("click", this._onCompassClick), this.compass.removeEventListener("focusin", this._onCompassFocusIn), this.compass.removeEventListener("focusout", this._onCompassFocusOut), this.compass.removeEventListener("mouseenter", this._onCompassMouseEnter), this.compass.removeEventListener("mouseleave", this._onCompassMouseLeave), this.compassArrows.removeEventListener("click", this._onCompassArrowsClick), this._360.off(a.POSITION_CHANGE, this._on360PositionChange), this._360.off(a.ROTATION_START, this._transitionTiming), this._360.off(a.ROTATION_COMPLETE, this._onRotationTransitionEnd)
                    }
                }, {
                    key: "_showCompassArrows",
                    value: function() {
                        this.el.classList.add("show-arrows")
                    }
                }, {
                    key: "_hideCompassArrows",
                    value: function() {
                        this.el.classList.remove("show-arrows")
                    }
                }, {
                    key: "_onRotationTransitionEnd",
                    value: function() {
                        this._compassIsRotating = !1, this._360.off(a.ROTATION_UPDATE, this._on360IconUpdate)
                    }
                }, {
                    key: "_transitionTiming",
                    value: function(t) {
                        var e = t.time,
                            i = this._get360HorizontalAngle();
                        this._compassIsRotating = !0, this.compassRing.style.transition = "transform " + e + "ms cubic-bezier(0.25,0.1,0,1)", this.compassField.style.transition = "transform " + e + "ms cubic-bezier(0.25,0.1,0,1)";
                        i > 180 ? (this.compassRing.style.transform = "rotate(360deg)", this.compassField.style.transform = "rotate(360deg)") : i < -180 ? (this.compassRing.style.transform = "rotate(360deg)", this.compassField.style.transform = "rotate(360deg)") : (this.compassRing.style.transform = "rotate(0deg)", this.compassField.style.transform = "rotate(0deg)")
                    }
                }, {
                    key: "_on360IconUpdate",
                    value: function(t) {
                        this.compassRing.style.transition = "transform 0.1s ease", this.compassRing.style.transform = "rotate(" + t.currentPosition.lon + "deg)", this.compassField.style.transition = "transform 0.1s ease", this.compassField.style.transform = "rotate(" + t.currentPosition.lon + "deg)"
                    }
                }, {
                    key: "_onCompassClick",
                    value: function(t) {
                        this._compassIsRotating || (this._player.get360().isAtOrigin ? (this._360.on(a.ROTATION_UPDATE, this._on360IconUpdate), this._player.get360().oscillateLongitude()) : this._player.panToOrigin())
                    }
                }, {
                    key: "_onCompassArrowsClick",
                    value: function(t) {
                        switch (t.target) {
                            case this.compassArrowLeft:
                                this._arrowControls.leftArrowDown(t), this._arrowControls.leftArrowUp(t);
                                break;
                            case this.compassArrowRight:
                                this._arrowControls.rightArrowDown(t), this._arrowControls.rightArrowUp(t);
                                break;
                            case this.compassArrowTop:
                                this._arrowControls.upArrowDown(t), this._arrowControls.upArrowUp(t);
                                break;
                            case this.compassArrowBottom:
                                this._arrowControls.downArrowDown(t), this._arrowControls.downArrowUp(t)
                        }
                    }
                }, {
                    key: "_onFocusIn",
                    value: function(t) {
                        t.target !== this.compass && this._showCompassArrows()
                    }
                }, {
                    key: "_onFocusOut",
                    value: function(t) {
                        this._hideCompassArrows()
                    }
                }, {
                    key: "_onCompassFocusIn",
                    value: function(t) {
                        this._rotateFieldOfViewToOrigin()
                    }
                }, {
                    key: "_onCompassFocusOut",
                    value: function(t) {
                        var e = this._get360HorizontalAngle();
                        this.compassField.style.transform = "rotate(" + e + "deg)"
                    }
                }, {
                    key: "_rotateFieldOfViewToOrigin",
                    value: function() {
                        var t = this._get360HorizontalAngle();
                        this.compassField.style.transition = "transform 0.3s ease", this.compassField.style.transform = t > 180 ? "rotate(360deg)" : t < -180 ? "rotate(-360deg)" : "rotate(0deg)"
                    }
                }, {
                    key: "_onCompassMouseEnter",
                    value: function(t) {
                        this._hovering = !0, this._compassIsRotating || this._rotateFieldOfViewToOrigin()
                    }
                }, {
                    key: "_onCompassMouseLeave",
                    value: function(t) {
                        if (this._hovering = !1, !this._compassIsRotating) {
                            var e = this._get360HorizontalAngle();
                            this.compassField.style.transition = "transform 0.3s ease", this.compassField.style.transform = "rotate(" + e + "deg)"
                        }
                    }
                }, {
                    key: "_on360PositionChange",
                    value: function() {
                        var t = this._get360HorizontalAngle();
                        this.compassRing.style.transition = "none", this.compassRing.style.transform = "rotate(" + t + "deg)", this._hovering || (this.compassField.style.transition = "none", this.compassField.style.transform = "rotate(" + t + "deg)")
                    }
                }, {
                    key: "_get360HorizontalAngle",
                    value: function() {
                        return this._player.get360().position.lon % 360
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        this._removeEventListeners()
                    }
                }]), t
            }();
        e.exports = c
    }, {
        "../localization/Localization": 339,
        "@marcom/ac-360": 138,
        "@marcom/ac-keyboard/Keyboard": 218,
        "@marcom/ac-keyboard/keyMap": 220,
        "@marcom/useragent-detect": 283
    }],
    319: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-feature/isDesktop")();
        var n = function(t) {
                this._player = t.player, this.el = this._player.el, this._showControls = t.showControls, this._hideControls = t.hideControls, this._raiseControls = t.raiseControls, this._lowerControls = t.lowerControls, this._sendMouseDown = t.sendMouseDown, this._controls = this._player.controls, this._controlsVisible = t.controlsVisible, this._controlsTimeoutDuration = t.controlsTimeoutDuration, this._keyboardControl = t.keyboardControl, this._lastMouseCoords = {}, this._elementEmitter = t.elementEmitter, this._bindMethods(), this._addEventListeners()
            },
            r = n.prototype;
        r._bindMethods = function() {
            this._onUserInteraction = this._onUserInteraction.bind(this), this._onFullscreenChange = this._onFullscreenChange.bind(this), this._onFullscreenWillExit = this._onFullscreenWillExit.bind(this), this._onMouseOut = this._onMouseOut.bind(this), this._onMouseLeave = this._onMouseLeave.bind(this), this._onClick = this._onClick.bind(this), this._onFocusIn = this._onFocusIn.bind(this), this._onFocusOut = this._onFocusOut.bind(this), this._onUserInteractionTimeout = this._onUserInteractionTimeout.bind(this)
        }, r._addEventListeners = function() {
            this._controls.el.addEventListener("mousemove", this._onUserInteraction, !0), this._controls.el.addEventListener("click", this._onClick, !0), this._player.on("fullscreen:change", this._onFullscreenChange), this._player.on("fullscreen:willexit", this._onFullscreenWillExit), "onmouseleave" in this.el ? this._controls.el.addEventListener("mouseleave", this._onMouseLeave) : this._controls.el.addEventListener("mouseout", this._onMouseOut, !0), this._keyboardControl && this._keyboardControl.on("keyboardinteraction", this._onUserInteraction), this._elementEmitter.on("focusin", this._onFocusIn), this._elementEmitter.on("focusout", this._onFocusOut)
        }, r._removeEventListeners = function() {
            this._controls.el.removeEventListener("mousemove", this._onUserInteraction, !0), this._controls.el.removeEventListener("click", this._onClick, !0), this._player.off("fullscreen:change", this._onFullscreenChange), this._player.off("fullscreen:willexit", this._onFullscreenWillExit), "onmouseleave" in this.el ? this._controls.el.removeEventListener("mouseleave", this._onMouseLeave) : this._controls.el.removeEventListener("mouseout", this._onMouseOut, !0), this._keyboardControl && this._keyboardControl.on("keyboardinteraction", this._onUserInteraction)
        }, r._shouldIgnoreUserInteraction = function(t) {
            return !!(t && "focusin" !== t.type && t.target && this._isActiveArea(t.target))
        }, r._onUserInteraction = function(t, e) {
            !t || "click" !== t.type && "focusin" !== t.type || this._player.isCaptionsSelectorShowing() && !t.target.classList.contains("controls-text-tracks-toggle-button") && "radio" !== t.target.getAttribute("role") && "radiogroup" !== t.target.getAttribute("role") && this._player.hideCaptionsSelector(), !this._player.getCurrentSrc() || this._preventUserInteraction || !e && t && "mousemove" === t.type && this._lastMouseCoords.x === t.screenX && this._lastMouseCoords.y === t.screenY || (t && t.pageX && (this._lastMouseCoords = {
                x: t.screenX,
                y: t.screenY
            }), this._showControls(), this._raiseControls(), clearTimeout(this._userInteractionTimeout), this._shouldIgnoreUserInteraction(t) || (this._userInteractionTimeout = window.setTimeout(this._onUserInteractionTimeout, this._controlsTimeoutDuration)))
        }, r._onUserInteractionTimeout = function() {
            this._hideControls()
        }, r._onMouseLeave = function(t) {
            window.clearTimeout(this._userInteractionTimeout), this._hideControls(), this._lowerControls(), this._lastMouseCoords = {}
        }, r._onMouseOut = function(t) {
            this._controls.el.contains(t.target) || t.target === this._controls.el || this._onMouseLeave()
        }, r._isActiveArea = function(t) {
            for (; t !== this.el;) {
                if (t.hasAttribute("data-acv-active-area")) return !0;
                t = t.parentNode
            }
            return !1
        }, r._onClick = function(t) {
            this._hasFocus = !1, this._onUserInteraction(t)
        }, r._onFullscreenWillExit = function() {
            this.controls && (this.controls.el.display = "none")
        }, r._onFullscreenChange = function() {
            this.controls && (this.controls.el.display = ""), this._hideControls(), this._lowerControls(), this._preventUserInteraction = !0, setTimeout(function() {
                this._preventUserInteraction = !1, this._player.refreshSize()
            }.bind(this), 750), this._player.refreshSize()
        }, r._onFocusIn = function(t) {
            clearTimeout(this._focusOutTimer), this._focusOutTimer = null, this._hasFocus = !0, this._onUserInteraction(t)
        }, r._onFocusOut = function(t) {
            this._focusOutTimer = setTimeout(function() {
                this._hasFocus && !this.el.contains(document.activeElement) && (this._hasFocus = !1, this._hideControls(), this._lowerControls())
            }.bind(this), 100)
        }, r.destroy = function() {
            this._removeEventListeners()
        }, e.exports = n
    }, {
        "@marcom/ac-feature/isDesktop": 204
    }],
    320: [function(t, e, i) {
        "use strict";
        var n = t("./DefaultControlsInteraction"),
            r = function(t) {
                n.call(this, t), this._showCompass = t.showCompass, this._hideCompass = t.hideCompass, this._threesixtyElementsTimeoutDuration = t.threesixtyElementsTimeoutDuration || 3e3, this._dragEndThreshold = 500, this._mouseDownPosition = null
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._bindMethods = function() {
            s._bindMethods.apply(this, arguments), this._onMouseDown = this._onMouseDown.bind(this), this._onMouseUp = this._onMouseUp.bind(this), this._onDragging = this._onDragging.bind(this), this._onClick = this._onClick.bind(this)
        }, o._addEventListeners = function() {
            s._addEventListeners.apply(this, arguments), this._controls.el.addEventListener("mousedown", this._onMouseDown), this._controls.el.addEventListener("click", this._onClick)
        }, o._removeEventListeners = function() {
            s._removeEventListeners.apply(this, arguments), this._controls.el.removeEventListener("mousedown", this._onMouseDown)
        }, o._onUserInteraction = function(t) {
            this._userWasRecentlyDragging || t && "mousemove" === t.type && this._lastMouseCoords.x === t.screenX && this._lastMouseCoords.y === t.screenY || this._dragging || (this._showCompass(), clearTimeout(this._userHideMouse), s._onUserInteraction.apply(this, arguments))
        }, o._onUserInteractionTimeout = function() {
            s._onUserInteractionTimeout.apply(this, arguments), clearTimeout(this._userHideMouse), this._userHideMouse = setTimeout(function() {
                this._hideCompass()
            }.bind(this), this._threesixtyElementsTimeoutDuration)
        }, o._onDragging = function(t) {
            !this._dragging && this._isActiveArea(t.target) || (this._dragging = !0, this._player.el.classList.add("dragging"), this._player.el.classList.add("recently-dragging"), this._recentDragTimeout = setTimeout(function() {
                this._dragging && (this._hideControls(), this._userWasRecentlyDragging = !0, clearTimeout(this._dragTimer), this._dragTimer = setTimeout(function() {
                    this._userWasRecentlyDragging = !1, this._player.el.classList.remove("recently-dragging")
                }.bind(this), this._dragEndThreshold))
            }.bind(this), 30), clearTimeout(this._userInteractionTimeout), clearTimeout(this._userHideMouse))
        }, o._isDraggable = function(t) {
            return -1 !== [this._player.controls.compass.el, this._player.controls.playButtonElement].indexOf(t) || this._player.controls.compass.el.contains(t)
        }, o._onMouseDown = function(t) {
            this._isActiveArea(t.target) && this._controlsVisible() && !this._isDraggable(t.target) || !this._isPlayingState() || (this._showControls(), clearTimeout(this._userHideMouse), clearTimeout(this._recentDragTimeout), this._player.el.classList.remove("dragging"), this._player.el.classList.remove("recently-dragging"), this._mouseDownPosition = {
                x: t.x,
                y: t.y
            }, window.addEventListener("mouseup", this._onMouseUp), window.addEventListener("mousemove", this._onDragging), this._sendMouseDown(t))
        }, o._onMouseUp = function(t) {
            window.removeEventListener("mousemove", this._onDragging), window.removeEventListener("mouseup", this._onMouseUp), this._dragging && this._onUserInteractionTimeout(), this._player.el.contains(t.target) || this._hideCompass(), this._player.el.classList.remove("dragging"), this._dragging = !1
        }, o._onMouseLeave = function(t) {
            s._onMouseLeave.apply(this, arguments), this._userWasRecentlyDragging = !1, this._dragging || (clearTimeout(this._userHideMouse), this._hideCompass())
        }, o._onClick = function(t) {
            this._player.controls.compass.el.contains(t.target) && this._userWasRecentlyDragging && t.stopPropagation(), t.target !== this._player.controls.playButtonElement.parentElement && t.target !== this._controls.el.firstElementChild || null === this._mouseDownPosition || this._mouseDownPosition.x !== t.x || this._mouseDownPosition.y !== t.y || (this._mouseDownPosition = null, this._mouseDownTime = 1 / 0, this._dragging = !1, this._userWasRecentlyDragging = !1, clearTimeout(this._dragTimer), clearTimeout(this._recentDragTimeout))
        }, o._isPlayingState = function() {
            return !this._player.controls.el.classList.contains("start-state") && !this._player.controls.el.classList.contains("end-state")
        }, e.exports = r
    }, {
        "./DefaultControlsInteraction": 319
    }],
    321: [function(t, e, i) {
        "use strict";
        t("@marcom/ac-console/log");
        var n = t("./ThreeSixtyControlsInteraction"),
            r = function(t) {
                n.call(this, t), this._controlsVisible = t.controlsVisible
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o._bindMethods = function() {
            s._bindMethods.apply(this, arguments), this._onTouchStart = this._onTouchStart.bind(this), this._onTouchEnd = this._onTouchEnd.bind(this), this._onClick = this._onClick.bind(this)
        }, o._addEventListeners = function() {
            this._controls.el.addEventListener("touchstart", this._onTouchStart), this._controls.el.addEventListener("click", this._onClick), this._controls.el.addEventListener("focusin", this._onFocusIn), this._controls.el.addEventListener("focusout", this._onFocusOut)
        }, o._removeEventListeners = function() {
            this._controls.el.removeEventListener("touchstart", this._onTouchStart), this._controls.el.removeEventListener("touchend", this._onTouchEnd), this._controls.el.removeEventListener("click", this._onClick), this._controls.el.removeEventListener("focusin", this._onFocusIn), this._controls.el.removeEventListener("focusout", this._onFocusOut)
        }, o._onDragging = function(t) {
            s._onDragging.apply(this, arguments)
        }, o._shouldIgnoreUserInteraction = function(t) {
            return !1
        }, o._onClick = function(t) {
            t.target !== this._player.controls.compass.compassView && (this._controlsVisible() ? this._isActiveArea(t.target) || (this._hideControls(), this._hideCompass()) : this._onUserInteraction(t))
        }, o._onTouchStart = function(t) {
            t.target !== this._player.controls.playButtonElement && t.target !== this._controls.el.firstElementChild && t.target !== this._player.controls.compass.compassView && t.target !== this._player.controls.playButtonElement || (document.addEventListener("touchend", this._onTouchEnd), window.addEventListener("touchmove", this._onDragging), this._showCompass(), this._touchDownTime = Date.now(), this._sendMouseDown(t))
        }, o._onTouchEnd = function(t) {
            document.removeEventListener("touchend", this._onTouchEnd), window.removeEventListener("touchmove", this._onDragging), this._onMouseUp(t)
        }, e.exports = r
    }, {
        "./ThreeSixtyControlsInteraction": 320,
        "@marcom/ac-console/log": 166
    }],
    322: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/useragent-detect"),
            r = n.os.ios || n.os.android,
            s = t("./DefaultControlsInteraction"),
            o = t("./ThreeSixtyControlsInteraction"),
            a = t("./ThreeSixtyMobileControlsInteraction");
        e.exports = function(t) {
            return t.threesixty ? r ? new a(t) : new o(t) : new s(t)
        }
    }, {
        "./DefaultControlsInteraction": 319,
        "./ThreeSixtyControlsInteraction": 320,
        "./ThreeSixtyMobileControlsInteraction": 321,
        "@marcom/useragent-detect": 283
    }],
    323: [function(t, e, i) {
        "use strict";
        var n = t("../../dom-emitter/DOMEmitterMicro"),
            r = function(t) {
                this.el = t
            };
        r.prototype = Object.create(n.prototype), e.exports = r
    }, {
        "../../dom-emitter/DOMEmitterMicro": 284
    }],
    324: [function(t, e, i) {
        "use strict";
        var n = function(t) {
                this.el = t
            },
            r = n.prototype;
        r.show = function() {
            this.el.classList.remove("hidden")
        }, r.hide = function() {
            this.el.classList.add("hidden")
        }, r.destroy = function(t) {}, e.exports = n
    }, {}],
    325: [function(t, e, i) {
        "use strict";
        var n = function(t) {
            this.el = t
        };
        n.prototype.setText = function(t) {
            this.el.innerHTML = t
        }, e.exports = n
    }, {}],
    326: [function(t, e, i) {
        "use strict";
        var n = t("../../dom-emitter/DOMEmitterMicro"),
            r = t("@marcom/ac-keyboard/Keyboard"),
            s = t("@marcom/ac-keyboard/keyMap"),
            o = function(t) {
                this.el = t, n.call(this, t), this._keyboard = new r(this.el), this._addEventListeners()
            },
            a = o.prototype = Object.create(n.prototype);
        a._addEventListeners = function() {
            this._onClick = this._onClick.bind(this), this._onKeyDown = this._onKeyDown.bind(this), this.el.addEventListener("click", this._onClick), this._keyboard.onDown(s.ARROW_UP, this._onKeyDown), this._keyboard.onDown(s.ARROW_DOWN, this._onKeyDown)
        }, a._removeEventListeners = function() {
            this.el.removeEventListener("click", this._onClick), this._keyboard.onDown(s.ARROW_UP, this._onKeyDown), this._keyboard.onDown(s.ARROW_DOWN, this._onKeyDown)
        }, a.setItems = function(t) {
            var e;
            this.el.innerHTML = "", t.forEach(function(t) {
                var i = document.createElement("li");
                i.setAttribute("role", "radio"), "showing" === t.mode ? (i.classList.add(t.mode), i.setAttribute("aria-checked", "true"), i.setAttribute("tabIndex", 0), e = i) : (i.setAttribute("aria-checked", "false"), i.setAttribute("tabIndex", -1)), i.innerText = t.label, i.acvMetadata = t, this.el.appendChild(i)
            }.bind(this)), e && e.focus()
        }, a._onKeyDown = function(t) {
            var e = t.target,
                i = !1;
            parseInt(t.keyCode) === s.ARROW_DOWN ? i = e.nextSibling : parseInt(t.keyCode) === s.ARROW_UP && (i = e.previousSibling), i && (this.trigger("ItemSelected", i.acvMetadata), t.preventDefault(), t.stopPropagation())
        }, a._onClick = function(t) {
            this.el !== t.target && this.el.contains(t.target) && this.trigger("ItemSelected", t.target.acvMetadata)
        }, a.destroy = function() {
            this._removeEventListeners()
        }, e.exports = o
    }, {
        "../../dom-emitter/DOMEmitterMicro": 284,
        "@marcom/ac-keyboard/Keyboard": 218,
        "@marcom/ac-keyboard/keyMap": 220
    }],
    327: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-slider").Slider,
            r = function(t, e) {
                if (this.el = t, this._min = e.min || 0, this._max = e.max || 1, e.mixins)
                    for (var i = e.mixins.slice(0); i.length;) Object.assign(this, i.pop());
                this._slider = new n(this.el, {
                    template: e.template,
                    min: this._min,
                    max: this._max,
                    step: isNaN(+this.el.getAttribute("step")) ? this.el.getAttribute("step") : +this.el.getAttribute("step"),
                    value: void 0 !== e.value ? e.value : +this.el.getAttribute("value"),
                    orientation: e.orientation,
                    renderedPosition: !0,
                    keyboardContext: this.el
                }), this._onFocusChange = this._onFocusChange.bind(this), this._setHoveringValue = this._setHoveringValue.bind(this), this._onMouseOver = this._onMouseOver.bind(this), this._onMouseLeave = this._onMouseLeave.bind(this), this._slider.el.addEventListener("blur", this._onFocusChange), this._slider.el.addEventListener("focus", this._onFocusChange), this._slider.el.addEventListener("mouseout", this._onFocusChange), this.forceCursorPointer = this.forceCursorPointer.bind(this), this.disableForcedCursorPointer = this.disableForcedCursorPointer.bind(this), this._slider.on("grab", this.forceCursorPointer), this._slider.on("release", this.disableForcedCursorPointer), this._scrubbedEl = this.el.querySelector(".ac-slider-scrubbed"), this._notchEl = this.el.querySelector(".ac-slider-hover-notch"), this._notchEl && (this._slider.el.addEventListener("mouseover", this._onMouseOver), this._slider.el.addEventListener("mouseleave", this._onMouseLeave), this._slider.el.addEventListener("mousemove", this._setHoveringValue)), e.value && requestAnimationFrame(function() {
                    this._slider && this.setValue(e.value)
                }.bind(this))
            },
            s = r.prototype;
        s.on = function() {
            return this._slider.on.apply(this._slider, arguments)
        }, s.off = function() {
            return this._slider.off.apply(this._slider, arguments)
        }, s.trigger = function() {
            return this._slider.trigger.apply(this._slider, arguments)
        }, s.setValue = function(t) {
            return this._slider.setValue.call(this._slider, t)
        }, s.setAriaValueText = function(t) {
            this._slider.el.setAttribute("aria-valuetext", t)
        }, s.setMin = function(t) {
            this._min = t, this._slider.setMin(t)
        }, s.setMax = function(t) {
            this._max = t, this._slider.setMax(t)
        }, s._onMouseOver = function() {
            this._slider.el.classList.add("hover")
        }, s._onMouseLeave = function() {
            this._slider.el.classList.remove("hover")
        }, s._onFocusChange = function() {
            setTimeout(function() {
                this.trigger("focuschange")
            }.bind(this), 0)
        }, s.isFocused = function() {
            return this._slider.el === document.activeElement && this._hasFocusOutline()
        }, s._hasFocusOutline = function() {
            return "none" !== getComputedStyle(this._slider.el).getPropertyValue("outline-style")
        }, s.getValue = function() {
            return this._slider.getValue.apply(this._slider, arguments)
        }, s.getMax = function() {
            return this._max
        }, s.setScrubbedValue = function() {
            "horizontal" === this._slider.getOrientation() ? this._scrubbedEl.style.left = this._slider.thumbElement.style.left : this._scrubbedEl.style.bottom = this._slider.thumbElement.style.bottom
        }, s._setHoveringValue = function(t) {
            var e = this.getClientXValue(t, this._notchEl);
            this._notchEl.style.left = e / this.getMax() * 100 + "%", this._setNotchColor(e)
        }, s._setNotchColor = function(t) {
            t > this.getValue() ? this._notchEl.style.backgroundColor = "#fff" : this._notchEl.style.backgroundColor = "#333"
        }, s.show = function() {
            this.el.classList.remove("ac-slider-inactive")
        }, s.hide = function() {
            this.el.classList.add("ac-slider-inactive")
        }, s.setState = function(t) {
            this.el.classList.add(t)
        }, s.clearState = function(t) {
            this.el.classList.remove(t)
        }, s.getClientXValue = function(t, e) {
            return this._slider.getClientXValue(t, e)
        }, s.destroy = function() {
            this._slider.el.removeEventListener("mousemove", this._setHoveringValue), this._slider.el.removeEventListener("mouseleave", this._onMouseOver), this._slider.el.removeEventListener("mouseout", this._onMouseLeave), this._slider.el.removeEventListener("blur", this._onFocusChange), this._slider.el.removeEventListener("focus", this._onFocusChange), this._slider.el.removeEventListener("mouseout", this._onFocusChange), this._slider.off("grab", this.forceCursorPointer), this._slider.off("release", this.disableForcedCursorPointer), this._slider.destroy(), this._slider = null
        }, e.exports = r
    }, {
        "@marcom/ac-slider": 251
    }],
    328: [function(t, e, i) {
        "use strict";
        var n = t("./Button"),
            r = function(t, e) {
                n.apply(this, arguments), this._states = e.states || {}, this._labels = e.labels, this._focusTarget = this.el.querySelector("button") || this.el, this._states && this._states.initial && this.setState("initial")
            };
        (r.prototype = Object.create(n.prototype)).setState = function(t) {
            this._currentState && this._currentState !== t && this._states[this._currentState].length && this.el.classList.remove(this._states[this._currentState]), this._currentState = t, this._labels && this._labels[this._currentState] && (this._focusTarget.value = this._labels[this._currentState], this._focusTarget.setAttribute("aria-label", this._labels[this._currentState])), "on" === this._currentState ? this._focusTarget.setAttribute("aria-pressed", !0) : this._focusTarget.setAttribute("aria-pressed", !1), this._states[t].length && this.el.classList.add(this._states[t])
        }, e.exports = r
    }, {
        "./Button": 323
    }],
    329: [function(t, e, i) {
        "use strict";
        e.exports = {
            disableForcedCursorPointer: function() {
                document.body.classList.remove("cursor-pointer"), this.onSelectStartResumeDefault()
            },
            forceCursorPointer: function() {
                document.body.classList.add("cursor-pointer"), this.onSelectStartPreventDefault()
            },
            onSelectStartResumeDefault: function() {
                document.removeEventListener("selectstart", this.preventDefault)
            },
            onSelectStartPreventDefault: function() {
                document.addEventListener("selectstart", this.preventDefault)
            },
            preventDefault: function(t) {
                t.preventDefault()
            }
        }
    }, {}],
    330: [function(t, e, i) {
        "use strict";
        var n = function(t) {
                this.el = t.el, this.el.innerHTML = '<a class="end-state-link hidden"></a>\n', this._player = t.player, this._bindContent(t)
            },
            r = n.prototype;
        r._bindContent = function(t) {
            if ("link" === t.type || "video" === t.type) {
                var e = this.el.querySelector(".end-state-link"),
                    i = document.createElement("div");
                e.classList.remove("hidden"), i.classList.add("end-state-text-container"), i.innerText = t.label || "", e.href = t.url || "", e.appendChild(i), "link" === t.type ? e.classList.add("icon", "icon-after", "icon-chevronright") : "video" === t.type && e.classList.add("icon", "icon-after", "icon-playcircle"), this._bindAction(this.el, t)
            }
        }, r._bindAction = function(t, e) {
            "function" == typeof e.onclick ? t.onclick = function(t) {
                t.preventDefault(), e.onclick.call(null, t)
            }.bind(this) : "video" === e.type && e.url && (t.onclick = function(t) {
                t.preventDefault(), this._player.load(e.url, null, 0, {})
            }.bind(this))
        }, r.destroy = function() {}, e.exports = n
    }, {}],
    331: [function(t, e, i) {
        "use strict";
        var n = t("./EndStateItem"),
            r = function(t) {
                this.el = t.el, this._player = t.player, this._addItems(t.items || [])
            },
            s = r.prototype;
        s._addItems = function(t) {
            this._items = [], t.forEach(function(t) {
                var e = document.createElement("div");
                e.classList.add("end-state-item");
                var i = new n(Object.assign({}, t, {
                    el: e,
                    player: this._player
                }));
                this.el.appendChild(e), this._items.push(i)
            }.bind(this))
        }, s.setData = function(t) {
            for (; this._items.length;) this._items.pop().destroy();
            this.el.innerHTML = "", t ? (this.el.classList.remove("hidden"), this._addItems(t.items)) : this.el.classList.add("hidden")
        }, s.destroy = function() {
            for (; this._items.length;) this._items.pop().destroy()
        }, e.exports = r
    }, {
        "./EndStateItem": 330
    }],
    332: [function(t, e, i) {
        "use strict";
        var n = function(t, e, i) {
            return function(n) {
                t[e](n, i)
            }
        };
        e.exports = function(t, e, i) {
            return e.classDef ? function(t, e, i) {
                return new e.classDef(t, Object.assign(e.options || {}, i || {}))
            }(t, e, i) : function(t, e) {
                var i = e.handlers || {},
                    r = {};
                for (var s in i) i.hasOwnProperty(s) && t.on(s, r[s] = n(i, s, t));
                var o, a = e.observe;
                if (a) {
                    for (var c = a.update, l = a.source, h = l.on.bind(l) || l.addEventListener, u = l.off.bind(l) || l.removeEventListener, d = a.events, p = 0, f = d.length, m = function() {
                            c.call(a, t)
                        }; p < f; p++) h(s = d[p], m);
                    o = function() {
                        for (p = 0; p < f; p++) s = d[p], u(s, m)
                    }
                }
                return {
                    destroy: function() {
                        for (var e in r) r.hasOwnProperty(e) && t.off(e, r[e]);
                        o && o()
                    }
                }
            }(t, e)
        }
    }, {}],
    333: [function(t, e, i) {
        "use strict";
        var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } : function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            },
            r = t("./createView"),
            s = t("./createBehavior"),
            o = function(t) {
                for (; t.length;) t.shift().destroy()
            },
            a = function(t, e, i) {
                var n = r(t, e.view),
                    o = s(n, e.behavior, i);
                return {
                    view: n,
                    behavior: o,
                    destroy: function(t, e) {
                        "function" == typeof e.destroy && e.destroy(), "function" == typeof t.destroy && t.destroy()
                    }.bind(null, n, o)
                }
            };
        e.exports = function(t, e, i) {
            var r = {};
            for (var s in e)
                if (e.hasOwnProperty(s) && "object" === n(e[s])) {
                    var c = e[s],
                        l = e.elementClassPrefix ? "." + e.elementClassPrefix + "-" + c.className : "." + c.className,
                        h = t.querySelectorAll(l);
                    r[s] = [];
                    for (var u = 0, d = h.length; u < d; u++) r[s].push(a(h[u], c, i))
                }
            return {
                components: r,
                destroy: function(t) {
                    for (var e in t) t.hasOwnProperty(e) && (o(t[e]), delete t[e])
                }.bind(null, r)
            }
        }
    }, {
        "./createBehavior": 332,
        "./createView": 334
    }],
    334: [function(t, e, i) {
        "use strict";
        e.exports = function(t, e) {
            return new e.classDef(t, e.options)
        }
    }, {}],
    335: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-keyboard/Keyboard"),
            r = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            s = 32,
            o = 37,
            a = 38,
            c = 39,
            l = 40,
            h = function(t) {
                r.call(this), this._player = t.player, this._target = t.keyboardTarget || this._player.el, this._keyboard = new n(this._target), this._bindMethods(), this._addEventListeners()
            },
            u = r.prototype,
            d = h.prototype = Object.create(u);
        d._bindMethods = function() {
            this._onLeftArrowDown = this._onLeftArrowDown.bind(this), this._onRightArrowDown = this._onRightArrowDown.bind(this), this._onUpArrowDown = this._onUpArrowDown.bind(this), this._onDownArrowDown = this._onDownArrowDown.bind(this), this._onSpaceBarUp = this._onSpaceBarUp.bind(this), this._onSpaceBarDown = this._onSpaceBarDown.bind(this), this._onKeyboardInteraction = this._onKeyboardInteraction.bind(this), this._onDurationChange = this._onDurationChange.bind(this), this._boundKeyboardInteraction = {}, [s, o, c, a, l].forEach(function(t) {
                this._boundKeyboardInteraction[t] = this._onKeyboardInteraction.bind(this, t)
            }.bind(this))
        }, d._addEventListeners = function() {
            [s, o, c, a, l].forEach(function(t) {
                this._keyboard.onDown(t, this._boundKeyboardInteraction[t])
            }.bind(this)), this._keyboard.onDown(s, this._onSpaceBarDown), this._keyboard.onDown(o, this._onLeftArrowDown), this._keyboard.onDown(c, this._onRightArrowDown), this._keyboard.onDown(a, this._onUpArrowDown), this._keyboard.onDown(l, this._onDownArrowDown), this._player.on("durationchange", this._onDurationChange)
        }, d._removeEventListeners = function() {
            [s, o, c, a, l].forEach(function(t) {
                this._keyboard.offDown(t, this._boundKeyboardInteraction[t])
            }.bind(this)), this._boundKeyboardInteraction = null, this._keyboard.offDown(s, this._onSpaceBarDown), this._keyboard.offUp(s, this._onSpaceBarUp), this._keyboard.offDown(o, this._onLeftArrowDown), this._keyboard.offDown(c, this._onRightArrowDown), this._keyboard.offDown(a, this._onUpArrowDownDown), this._keyboard.offDown(l, this._onDownArrowDown), this._player.off("durationchange", this._onDurationChange)
        }, d._onKeyboardInteraction = function() {
            this._triggerKeyboardInteraction()
        }, d._triggerKeyboardInteraction = function() {
            this.trigger("keyboardinteraction")
        }, d._onDurationChange = function() {
            var t = this._player.getDuration();
            this._interval = t >= 60 ? 10 : t >= 20 ? 5 : 1
        }, d._onLeftArrowDown = function(t) {
            t.originalEvent.preventDefault(), t.originalEvent.stopPropagation();
            var e = this._player.getCurrentTime();
            isNaN(e) || this._player.seek(Math.max(e - this._interval, 0))
        }, d._onRightArrowDown = function(t) {
            t.originalEvent.preventDefault(), t.originalEvent.stopPropagation();
            var e = this._player.getCurrentTime();
            isNaN(e) || this._player.seek(Math.min(e + this._interval, this._player.getDuration()))
        }, d._onUpArrowDown = function(t) {
            if (!t.target.hasAttribute("aria-checked")) {
                t.originalEvent.preventDefault(), t.originalEvent.stopPropagation();
                var e = this._player.getMuted() ? 0 : this._player.getVolume(),
                    i = Math.min(1, e + .1);
                this._player.setVolume(i), this._player.setMuted(!1)
            }
        }, d._onDownArrowDown = function(t) {
            if (!t.target.hasAttribute("aria-checked")) {
                t.originalEvent.preventDefault(), t.originalEvent.stopPropagation();
                var e = this._player.getMuted() ? 0 : this._player.getVolume(),
                    i = Math.max(0, e - .1);
                this._player.setVolume(i), this._player.setMuted(0 === Math.round(10 * i))
            }
        }, d._onSpaceBarDown = function(t) {
            "BUTTON" !== t.target.tagName && "button" !== t.target.getAttribute("role") && (this._keyboard.offDown(s, this._onSpaceBarDown), this._keyboard.onUp(s, this._onSpaceBarUp))
        }, d._onSpaceBarUp = function() {
            this._keyboard.offUp(s, this._onSpaceBarUp), this._player.getPaused() ? this._player.play() : this._player.pause(), this._keyboard.onDown(s, this._onSpaceBarDown)
        }, d.destroy = function() {
            this._removeEventListeners(), this._keyboard.destroy(), u.destroy.call(this)
        }, e.exports = h
    }, {
        "@marcom/ac-event-emitter-micro": 201,
        "@marcom/ac-keyboard/Keyboard": 218
    }],
    336: [function(t, e, i) {
        "use strict";
        var n = function() {
                function t(t, e) {
                    for (var i = 0; i < e.length; i++) {
                        var n = e[i];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(t, n.key, n)
                    }
                }
                return function(e, i, n) {
                    return i && t(e.prototype, i), n && t(e, n), e
                }
            }(),
            r = function t(e, i, n) {
                null === e && (e = Function.prototype);
                var r = Object.getOwnPropertyDescriptor(e, i);
                if (void 0 === r) {
                    var s = Object.getPrototypeOf(e);
                    return null === s ? void 0 : t(s, i, n)
                }
                if ("value" in r) return r.value;
                var o = r.get;
                return void 0 !== o ? o.call(n) : void 0
            };
        var s = t("./KeyboardControl"),
            o = ["controls-toggle-mute-volume-button", "controls-volume-level-indicator"],
            a = function(t) {
                function e(t) {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, e);
                    var i = function(t, e) {
                        if (!t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return !e || "object" != typeof e && "function" != typeof e ? t : e
                    }(this, (e.__proto__ || Object.getPrototypeOf(e)).call(this, t));
                    return i._arrowControls = i._player.get360().arrowControls, i
                }
                return function(t, e) {
                    if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function, not " + typeof e);
                    t.prototype = Object.create(e && e.prototype, {
                        constructor: {
                            value: t,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), e && (Object.setPrototypeOf ? Object.setPrototypeOf(t, e) : t.__proto__ = e)
                }(e, s), n(e, [{
                    key: "_bindMethods",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_bindMethods", this).call(this), this._onLeftArrowUp = this._onLeftArrowUp.bind(this), this._onRightArrowUp = this._onRightArrowUp.bind(this), this._onDownArrowUp = this._onDownArrowUp.bind(this), this._onUpArrowUp = this._onUpArrowUp.bind(this)
                    }
                }, {
                    key: "_addEventListeners",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_addEventListeners", this).call(this), this._keyboard.onUp(37, this._onLeftArrowUp), this._keyboard.onUp(39, this._onRightArrowUp), this._keyboard.onUp(38, this._onUpArrowUp), this._keyboard.onUp(40, this._onDownArrowUp)
                    }
                }, {
                    key: "_removeEventListeners",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_removeEventListeners", this).call(this), this._keyboard.offUp(37, this._onLeftArrowUp), this._keyboard.offUp(39, this._onRightArrowUp), this._keyboard.offUp(38, this._onUpArrowUp), this._keyboard.offUp(40, this._onDownArrowUp)
                    }
                }, {
                    key: "_onLeftArrowDown",
                    value: function(t) {
                        if (t.target.classList.contains("controls-progress-indicator")) return this._triggerKeyboardInteraction(), r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_onLeftArrowDown", this).call(this, t);
                        this._arrowControls.leftArrowDown(t)
                    }
                }, {
                    key: "_onRightArrowDown",
                    value: function(t) {
                        if (t.target.classList.contains("controls-progress-indicator")) return this._triggerKeyboardInteraction(), r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_onRightArrowDown", this).call(this, t);
                        this._arrowControls.rightArrowDown(t)
                    }
                }, {
                    key: "_onUpArrowDown",
                    value: function(t) {
                        if (t.target.classList.contains(o[0]) || t.target.classList.contains(o[1])) return this._triggerKeyboardInteraction(), r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_onUpArrowDown", this).call(this, t);
                        t.originalEvent.preventDefault(), this._arrowControls.upArrowDown(t)
                    }
                }, {
                    key: "_onDownArrowDown",
                    value: function(t) {
                        if (t.target.classList.contains(o[0]) || t.target.classList.contains(o[1])) return this._triggerKeyboardInteraction(), r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "_onDownArrowDown", this).call(this, t);
                        t.originalEvent.preventDefault(), this._arrowControls.downArrowDown(t)
                    }
                }, {
                    key: "_onLeftArrowUp",
                    value: function(t) {
                        t.target.classList.contains("controls-progress-indicator") ? this._triggerKeyboardInteraction() : (t.originalEvent.preventDefault(), this._arrowControls.leftArrowUp(t))
                    }
                }, {
                    key: "_onRightArrowUp",
                    value: function(t) {
                        t.target.classList.contains("controls-progress-indicator") ? this._triggerKeyboardInteraction() : (t.originalEvent.preventDefault(), this._arrowControls.rightArrowUp(t))
                    }
                }, {
                    key: "_onUpArrowUp",
                    value: function(t) {
                        t.target.classList.contains("controls-progress-indicator") ? this._triggerKeyboardInteraction() : this._arrowControls.upArrowUp(t)
                    }
                }, {
                    key: "_onDownArrowUp",
                    value: function(t) {
                        t.target.classList.contains("controls-progress-indicator") ? this._triggerKeyboardInteraction() : this._arrowControls.downArrowUp(t)
                    }
                }, {
                    key: "_onKeyboardInteraction",
                    value: function(t) {}
                }, {
                    key: "destroy",
                    value: function() {
                        r(e.prototype.__proto__ || Object.getPrototypeOf(e.prototype), "destroy", this).call(this)
                    }
                }]), e
            }();
        e.exports = a
    }, {
        "./KeyboardControl": 335
    }],
    337: [function(t, e, i) {
        "use strict";
        var n, r;
        e.exports = function(e) {
            return e.threesixty ? (n || (n = t("./ThreeSixtyKeyboardControl")), new n(e)) : (r || (r = t("./KeyboardControl")), new r(e))
        }
    }, {
        "./KeyboardControl": 335,
        "./ThreeSixtyKeyboardControl": 336
    }],
    338: [function(t, e, i) {
        "use strict";
        e.exports = {
            backthirtyseconds: "Back 30 Seconds",
            playpause: "Play/Pause",
            play: "Play",
            pause: "Pause",
            togglemutevolume: "Toggle Mute Volume",
            mutevolume: "Mute Volume",
            minvolume: "Minimum Volume",
            adjustvolume: "Adjust Volume",
            fastreverse: "Fast Reverse",
            fastforward: "Fast Forward",
            fullvolume: "Full Volume",
            fullscreen: "Full Screen",
            exitfullscreen: "Exit Full Screen",
            airplay: "AirPlay",
            captionscontrol: "Closed Captions",
            captionsturnedon: "Closed Captions On",
            captionsturnedoff: "Closed Captions Off",
            subtitlescontrol: "Subtitles",
            subtitlesturnedon: "Subtitles On",
            subtitlesturnedoff: "Subtitles Off",
            sizescontrol: "Video Size",
            downloadcontrol: "Download Video",
            share: "Share",
            small: "Small",
            medium: "Medium",
            large: "Large",
            hd: "HD",
            ipod: "iPod/iPhone",
            mb: "MB",
            gb: "GB",
            tb: "TB",
            downloadquicktimetitle: "Get QuickTime.",
            downloadquicktimetext: "Download QuickTime to view this video. QuickTime is free for Mac + PC.",
            downloadquicktimebutton: "Download",
            downloadquicktimeurl: "https://www.apple.com/quicktime/download/",
            elapsed: "elapsed",
            remaining: "remaining",
            currenttimetext: "{minutes} minutes and {seconds} seconds",
            pictureinpicture: "Picture-in-Picture",
            exitpictureinpicture: "Exit Picture-in-Picture",
            closesharing: "Close Sharing",
            facebookshare: "Share to Facebook",
            twittershare: "Share to Twitter",
            copylink: "Copy Link",
            copyembed: "Copy Embed Code",
            copyarea: "Copy Link Text Area",
            selectlink: "Select Link Text",
            selectembed: "Select Embed Code",
            close: "Close",
            dismisscopy: "Dismiss Copy",
            replay: "Replay",
            livestream: "Live Streaming",
            newwindow: "Opens in New Window",
            threesixtyicon: "Return 360 Point of View to Origin",
            threesixtyleft: "Move 360 Point of View Left",
            threesixtyright: "Move 360 Point of View Right",
            threesixtyup: "Move 360 Point of View Up",
            threesixtydown: "Move 360 Point of View Down"
        }
    }, {}],
    339: [function(t, e, i) {
        "use strict";
        var n, r = t("./Translations"),
            s = t("./DefaultLabelStrings"),
            o = window.document.documentElement;
        try {
            n = window.top.document.documentElement
        } catch (t) {
            n = o
        }
        var a = t("@marcom/ac-ajax-xhr"),
            c = {},
            l = function(t) {
                var e, i;
                try {
                    e = t || n.getAttribute("lang")
                } catch (t) {
                    e = o.getAttribute("lang")
                }
                if (e) switch (e.toLowerCase()) {
                    case "es-418":
                        i = "es-LA";
                        break;
                    case "pt":
                        i = "pt-BR";
                        break;
                    default:
                        i = e
                } else i = "en-US";
                return i
            },
            h = function(t) {
                return t = l(t), void 0 !== c[t]
            };
        e.exports = {
            getLanguage: l,
            getTranslation: function(t) {
                var e = l((t = t || {}).lang);
                if (h(e)) return t.callback ? void t.callback(c[e]) : c[e];
                if (!t.callback) throw new Error("To use Localization.getTranslation you must either pass a callback or ensure the translation is ready via Localization.translationReady");
                var i = t.basePath || "/global/ac_media_player/scripts/ac_media_languages/",
                    n = r[e] ? i + r[e] : i + r["en-US"],
                    o = s;
                a.get(n, {
                    success: function(i) {
                        o = Object.assign(o, JSON.parse(i)), c[e] = o, t.callback(o)
                    },
                    error: function() {
                        c[e] = o, t.callback(o)
                    }
                })
            },
            translationReady: h
        }
    }, {
        "./DefaultLabelStrings": 338,
        "./Translations": 340,
        "@marcom/ac-ajax-xhr": 155
    }],
    340: [function(t, e, i) {
        "use strict";
        e.exports = {
            "bg-BG": "bg-BG.json",
            "cs-CZ": "cs-CZ.json",
            "el-GR": "el-GR.json",
            "de-AT": "de-AT.json",
            "de-CH": "de-CH.json",
            "de-DE": "de-DE.json",
            "de-LI": "de-LI.json",
            "da-DK": "da-DK.json",
            en: "en.json",
            "en-US": "en-US.json",
            "en-AP": "en-AP.json",
            "en-CA": "en-CA.json",
            "en-GB": "en-GB.json",
            "en-HK": "en-HK.json",
            "en-IE": "en-IE.json",
            "en-IN": "en-IN.json",
            "en-KR": "en-KR.json",
            "en-AU": "en-AU.json",
            "en-NZ": "en-NZ.json",
            "en-SG": "en-SG.json",
            "en-ZA": "en-ZA.json",
            es: "es.json",
            "es-LA": "es-LA.json",
            "es-MX": "es-MX.json",
            "es-ES": "es-ES.json",
            "et-EE": "et-EE.json",
            "fi-FI": "fi-FI.json",
            fr: "fr.json",
            "fr-BE": "fr-BE.json",
            "fr-CA": "fr-CA.json",
            "fr-CH": "fr-CH.json",
            "fr-FR": "fr-FR.json",
            "hr-HR": "hr-HR.json",
            "hu-HU": "hu-HU.json",
            "it-IT": "it-IT.json",
            ja: "ja.json",
            "ja-JP": "ja-JP.json",
            "ko-KR": "ko-KR.json",
            "lt-LT": "lt-LT.json",
            "lv-LV": "lv-LV.json",
            "nl-BE": "nl-BE.json",
            "nl-NL": "nl-NL.json",
            "no-NO": "no-NO.json",
            "pl-PL": "pl-PL.json",
            pt: "pt.json",
            "pt-BR": "pt-BR.json",
            "pt-PT": "pt-PT.json",
            "ro-RO": "ro-RO.json",
            "ru-RU": "ru-RU.json",
            "sk-SK": "sk-SK.json",
            "sv-SE": "sv-SE.json",
            "tr-TR": "tr-TR.json",
            zh: "zh.json",
            "zh-CN": "zh-CN.json",
            "zh-HK": "zh-HK.json",
            "zh-TW": "zh-TW.json"
        }
    }, {}],
    341: [function(t, e, i) {
        "use strict";
        var n = t("./PopUp"),
            r = function(t) {
                this.el = t.el, this._player = t.player, this._popUp = new n(t), this.el.appendChild(this._popUp.el)
            },
            s = r.prototype;
        s.setData = function(t) {
            this._popUp.setData(t)
        }, s.show = function() {
            this.el.classList.remove("hidden")
        }, s.hide = function() {
            this.el.classList.add("hidden")
        }, s.destroy = function() {}, e.exports = r
    }, {
        "./PopUp": 342
    }],
    342: [function(t, e, i) {
        "use strict";
        var n = t("../../utils/Time"),
            r = t("./ThumbnailHandler"),
            s = t("@marcom/ac-function/throttle"),
            o = function(t) {
                this._player = t.player, this.el = document.createElement("div"), this.el.style.opacity = "0", this.el.innerHTML = '<div class="ac-video-trickplay hidden" aria-hidden="true">\n    <div class="ac-video-trickplay-image">\n    </div>\n    <div class="ac-video-trickplay-time"></div>\n</div>\n', this._thumbnailHandler = new r({
                    el: this.el.querySelector(".ac-video-trickplay-image"),
                    player: this._player,
                    numberOfImages: t.numberOfImages
                }), this._timeLabel = this.el.querySelector(".ac-video-trickplay-time"), this._bindMethods(), this._addEventListeners()
            },
            a = o.prototype;
        a._initPointerTracking = function() {
            this._scrubberView = this._player.controls.scrubberView, this._scrubberView && (this._runnableTrack = this._scrubberView.el.querySelector(".ac-slider-runnable-track"), this._calcOffsets(), this._scrubberView.el.addEventListener("mouseover", this._show), this._scrubberView.el.addEventListener("mouseout", this._hide), this._scrubberView.el.addEventListener("mousedown", this._startScrubbing), this._scrubberView.el.addEventListener("mouseup", this._endScrubbing), this._scrubberView.el.addEventListener("mousemove", this._onTrackerUpdate), this._scrubberView.el.addEventListener("mousemove", this._setThumbnail), this._player.on("resize", this._calcOffsets), window.addEventListener("resize", this._calcOffsets))
        }, a._bindMethods = function() {
            this._show = this._show.bind(this), this._hide = this._hide.bind(this), this._onDurationChange = this._onDurationChange.bind(this), this._onLoadedMetaData = this._onLoadedMetaData.bind(this), this._startScrubbing = this._startScrubbing.bind(this), this._endScrubbing = this._endScrubbing.bind(this), this._initPointerTracking = this._initPointerTracking.bind(this), this._onTrackerUpdate = this._onTrackerUpdate.bind(this), this._setThumbnail = this._setThumbnail.bind(this), this._calcOffsets = this._calcOffsets.bind(this), this._debouncedCalcOffsets = s(this._calcOffsets, 30)
        }, a._startScrubbing = function(t) {
            this._thumbnailHandler.el.classList.add("hidden"), this._scrubberView.el.removeEventListener("mousemove", this._setThumbnail), this._scrubberView.el.removeEventListener("mouseout", this._hide), document.addEventListener("mouseup", this._endScrubbing), document.addEventListener("mousemove", this._onTrackerUpdate)
        }, a._endScrubbing = function(t) {
            t.target === this._scrubberView.el && this._hide(), this._scrubberView.el.addEventListener("mousemove", this._setThumbnail), this._scrubberView.el.addEventListener("mouseout", this._hide), document.removeEventListener("mouseup", this._endScrubbing), document.removeEventListener("mousemove", this._onTrackerUpdate), this._setThumbnail(t), this._thumbnailHandler.el.classList.remove("hidden")
        }, a._calcOffsets = function() {
            this._onLoadedMetaData();
            var t = this._player.el.getBoundingClientRect();
            this._offsetLeft = t.left;
            var e = this._runnableTrack.getBoundingClientRect();
            this._leftBoundary = e.left - this._offsetLeft + 5, this._rightBoundary = this._leftBoundary + e.width - 5 - 2, this._imgWidth = this.el.firstElementChild.getBoundingClientRect().width
        }, a._onLoadedMetaData = function() {
            var t = this._player.getMediaElement().videoWidth,
                e = this._player.getMediaElement().videoHeight,
                i = -1 !== this._player.getMediaElement().src.indexOf("-tft-");
            this.el.classList.remove("square-video"), this.el.classList.remove("vertical-video"), this.el.classList.remove("tft-video"), i ? (this.el.classList.add("tft-video"), this._thumbnailHandler.setVertical(!1)) : t < e ? (this.el.classList.add("vertical-video"), this._thumbnailHandler.setVertical(!0)) : t === e ? (this.el.classList.add("square-video"), this._thumbnailHandler.setVertical(!1)) : this._thumbnailHandler.setVertical(!1)
        }, a._addEventListeners = function() {
            this._player.on("durationchange", this._onDurationChange), this._player.once("controlsready", this._initPointerTracking), this._player.on("loadedmetadata", this._calcOffsets)
        }, a._removeEventListeners = function() {
            this._player.off("durationchange", this._onDurationChange), this._player.off("controlsready", this._initPointerTracking), this._player.off("timeupdate", this._calcOffsets), this._player.off("resize", this._debouncedCalcOffsets), window.removeEventListener("resize", this._debouncedCalcOffsets), this._scrubberView.el.removeEventListener("mouseover", this._show), this._scrubberView.el.removeEventListener("mouseout", this._hide), this._scrubberView.el.removeEventListener("mousemove", this._onTrackerUpdate), this._scrubberView.el.removeEventListener("mousemove", this._setThumbnail)
        }, a._onTrackerUpdate = function(t) {
            this._calcOffsets();
            var e = Math.min(Math.max(t.clientX - this._offsetLeft, this._leftBoundary), this._rightBoundary);
            this.el.firstElementChild.style.left = e - this._imgWidth / 2 + "px";
            var i = this._scrubberView.getClientXValue(t);
            this._player.getReadyState() <= 2 ? this._cachedTrackerUpdate = t : this._cachedTrackerUpdate = null, this._setTime(Math.max(i, 0))
        }, a._onDurationChange = function(t) {
            this._cachedDuration = this._player.getDuration(), this._cachedTrackerUpdate && (this._onTrackerUpdate(this._cachedTrackerUpdate), this._setThumbnail()), this.el.style.opacity = "1"
        }, a._setThumbnail = function(t) {
            this._thumbnailHandler.setTime(this._time, this._cachedDuration)
        }, a._setTime = function(t) {
            var e = t / this._scrubberView.getMax();
            this._time = Math.min(e * this._cachedDuration, this._cachedDuration);
            var i = n.formatTime(Math.round(this._time), this._cachedDuration);
            this._timeLabel.innerHTML = i
        }, a.setData = function(t) {
            this.el.style.opacity = "0", this._canPlayThroughHander && (this._player.off("canplaythrough", this._canPlayThroughHander), this._player.off("playing", this._canPlayThroughHander), this._canPlayThroughHander = null), t && this._player.getReadyState() > 2 ? (this.el.style.opacity = "1", this._thumbnailHandler.setData(t), this._cachedTrackerUpdate && (this._onTrackerUpdate(this._cachedTrackerUpdate), this._setThumbnail())) : (this._thumbnailHandler.setData(null), t ? (this._canPlayThroughHander = this.setData.bind(this, t), this._player.on("canplaythrough", this._canPlayThroughHander), this._player.on("playing", this._canPlayThroughHander)) : this.el.style.opacity = "1"), this._onLoadedMetaData()
        }, a._show = function(t) {
            this._onTrackerUpdate(t), this.el.firstElementChild.classList.remove("hidden")
        }, a._hide = function() {
            this.el.firstElementChild.classList.add("hidden")
        }, a.destroy = function() {
            this._canPlayThroughHander && (this._player.off("canplaythrough", this._canPlayThroughHander), this._player.off("playing", this._canPlayThroughHander)), this._tracker.destroy()
        }, e.exports = o
    }, {
        "../../utils/Time": 346,
        "./ThumbnailHandler": 343,
        "@marcom/ac-function/throttle": 217
    }],
    343: [function(t, e, i) {
        "use strict";
        var n = function(t) {
                this.el = t.el, this._player = t.player, this._imgWidth = t.imgWidth || 144, this.el.style.backgroundSize = 100 * this._numberOfImages + "% 100%"
            },
            r = n.prototype;
        r.setVertical = function(t) {
            this._imgWidth = t ? 81 : 144
        }, r.getWidth = function() {
            return this._imgWidth
        }, r.setData = function(t) {
            if (!t) return this._imgUrl = null, void(this.el.style.backgroundImage = "");
            if (t.url !== this._imgUrl) {
                this._imgUrl = t.url, this._numberOfImages = parseInt(t.numberOfImages || 120), this.el.style.backgroundSize = 100 * this._numberOfImages + "% 100%", this.el.style.backgroundImage = "", this.el.classList.add("hidden");
                var e = this._loadImage(this._imgUrl).then(function() {
                    this._imageLoadPromise === e && (this.el.style.backgroundImage = 'url("' + this._imgUrl + '")', this._imageLoadPromise = null, this.el.classList.remove("hidden"))
                }.bind(this));
                this._imageLoadPromise = e
            }
        }, r._loadImage = function(t) {
            return new Promise(function(e, i) {
                var n = new Image;
                n.onload = function() {
                    e()
                }, n.onerror = function() {
                    i()
                }, n.src = t
            })
        }, r.setTime = function(t, e) {
            var i = t / e,
                n = Math.min(Math.round(i * this._numberOfImages), this._numberOfImages - 1) / (this._numberOfImages - 1) * 100;
            this.el.style.backgroundPositionX = n + "%"
        }, r.destroy = function() {
            this._imageLoadPromise && this._imageLoadPromise.cancel()
        }, e.exports = n
    }, {}],
    344: [function(t, e, i) {
        (function(i) {
            "use strict";
            var n, r = i("PGRpdiBjbGFzcz0ic2hhcmluZy1zdGF0ZSI+CiAgICA8ZGl2IGNsYXNzPSJjb250YWluZXIiIGRhdGEtYWN2LWFjdGl2ZS1hcmVhPgogICAgICAgIDxkaXYgY2xhc3M9InNoYXJpbmctY29udGFpbmVyIj4KICAgICAgICAgICAgPGRpdiBjbGFzcz0ic2hhcmluZy1idXR0b24tY29udGFpbmVyIj4KICAgICAgICAgICAgICAgIDxidXR0b24gY2xhc3M9ImZhY2Vib29rLXNoYXJlIGFjLXZpZGVvLWljb24gaWNvbi1zaGFyZV9mYiIgYXJpYS1sYWJlbD0ie2ZhY2Vib29rc2hhcmV9LCB7bmV3d2luZG93fSI+PC9idXR0b24+CiAgICAgICAgICAgICAgICA8YnV0dG9uIGNsYXNzPSJ0d2l0dGVyLXNoYXJlIGFjLXZpZGVvLWljb24gaWNvbi1zaGFyZV90d2l0dGVyIiBhcmlhLWxhYmVsPSJ7dHdpdHRlcnNoYXJlfSwge25ld3dpbmRvd30iPjwvYnV0dG9uPgogICAgICAgICAgICAgICAgPGJ1dHRvbiBjbGFzcz0iY29weS1saW5rIGFjLXZpZGVvLWljb24gaWNvbi1zaGFyZV9saW5rIiBhcmlhLWxhYmVsPSJ7Y29weWxpbmt9Ij48L2J1dHRvbj4KICAgICAgICAgICAgICAgIDxidXR0b24gY2xhc3M9ImNvcHktZW1iZWQtY29kZSBhYy12aWRlby1pY29uIGljb24tc2hhcmVfZW1iZWQiIGFyaWEtbGFiZWw9Intjb3B5ZW1iZWR9Ij48L2J1dHRvbj4KICAgICAgICAgICAgPC9kaXY+CiAgICAgICAgPC9kaXY+CiAgICAgICAgPGRpdiBjbGFzcz0idGV4dGFyZWEtY29udGFpbmVyIj4KICAgICAgICAgICAgPHNwYW4+CiAgICAgICAgICAgICAgICA8aW5wdXQgY2xhc3M9ImNvcHktYXJlYSBmb3JtLXRleHRib3ggZm9ybS10ZXh0Ym94LXRleHQgZGlzYWJsZWQiIHR5cGU9InRleHQiIGlkPSJjb3B5LWxpbmsiIGFyaWEtbGFiZWw9Intjb3B5bGlua30iPjwvaW5wdXQ+CiAgICAgICAgICAgICAgICA8YnV0dG9uIGNsYXNzPSJ0ZXh0aW5wdXQtY2xvc2UtYnV0dG9uIGFjLXZpZGVvLWljb24gaWNvbi1zaGFyZV9jbG9zZSIgYXJpYS1sYWJlbD0ie2Rpc21pc3Njb3B5fSI+PC9idXR0b24+CiAgICAgICAgICAgIDwvc3Bhbj4KICAgICAgICA8L2Rpdj4KICAgIDwvZGl2Pgo8L2Rpdj4K", "base64").toString(),
                s = i("PGlmcmFtZSBzcmM9IntlbWJlZENvZGVQYXRofXt2aWRlb2lkfXtleHRlbnNpb259IiB3aWR0aD0ie3dpZHRofSIgaGVpZ2h0PSJ7aGVpZ2h0fSIgdGl0bGU9Int0aXRsZX0iIGFsbG93ZnVsbHNjcmVlbj48L2lmcmFtZT4K", "base64").toString(),
                o = t("@marcom/ac-console/log"),
                a = t("@marcom/ac-clipboard/select"),
                c = t("@marcom/ac-social").Dialog,
                l = t("@marcom/ac-string/supplant"),
                h = t("../localization/Localization"),
                u = t("@marcom/ac-accessibility/helpers/TabManager");
            try {
                n = t("@marcom/ac-analytics-share/factory/create")
            } catch (t) {
                o("ac-analytics-share failed to load, are you sure you've included it?")
            }
            var d = t("@marcom/useragent-detect").os,
                p = d.ios || d.android,
                f = function(t) {
                    this.el || this._initializeElement(t.el, t.template), this._player = t.player, this._parentView = t.parentView, this._clickedShareButton = null, this._container = this.el.querySelector(".container"), this._sharingButtonContainer = this.el.querySelector(".sharing-button-container"), this._facebookButton = this.el.querySelector(".facebook-share"), this._twitterButton = this.el.querySelector(".twitter-share"), this._copyLinkButton = this.el.querySelector(".copy-link"), this._copyEmbedCodeButton = this.el.querySelector(".copy-embed-code"), this._copyTextArea = this.el.querySelector(".copy-area"), this._copyCloseButton = this.el.querySelector(".textinput-close-button"), this._closeButton = this.el.querySelector(".close-button"), !1 === t.analytics && (n = null), p && (this.el.firstChild.classList.add("mobile"), this._player.on("loadstart", function() {
                        this._getClientWidth() > 735 && this.el.firstChild.classList.add("mobile-large")
                    }.bind(this))), this._bindMethods(), this._addEventListeners(), this._syncSocialShareHidden()
                },
                m = f.prototype;
            m._initializeElement = function(t, e) {
                t ? this.el = t : (this.el = document.createElement("div"), this._templateData = h.getTranslation(), this.el.innerHTML = l((e || r).toString(), this._templateData))
            }, m.setData = function(t) {
                if (t) {
                    if (this._parentView.show(), t.allowEmbed && this.el.firstChild.classList.add("embed-enabled"), this._sharingUrl = t.originatorUrl || window.location.href, this._videoid = t.videoid, this._hideExtension = t.hideExtension, this._embedPath = t.embedpath || "https://www.apple.com/embed/", this._hideFacebook = t.hideFacebookShare || !1, this._hideTwitter = t.hideTwitterShare || !1, this._title = t.title || "Video Player", this._syncSocialShareHidden(), this._container.classList.remove("textarea-active"), n && !1 !== t.analytics && t.videoid) try {
                        this._initAnalyticsAttributes(t), this._analyticsObserver || (this._analyticsObserver = n({
                            context: this.el
                        }))
                    } catch (t) {
                        o("ac-analytics-share failed to load, are you sure you've included it?")
                    }
                } else this._parentView.hide()
            }, m._bindMethods = function() {
                this._doFacebookShare = this._doSocialShare.bind(this, c.FACEBOOK_SHARE), this._doTwitterShare = this._doSocialShare.bind(this, c.TWITTER_TWEET), this._copyUrl = this._copyUrl.bind(this), this._copyEmbedCode = this._copyEmbedCode.bind(this), this._closeCopyArea = this._showTextArea.bind(this, !1), this._closeState = this._closeState.bind(this)
            }, m._addEventListeners = function() {
                this._facebookButton && this._facebookButton.addEventListener("click", this._doFacebookShare), this._twitterButton && this._twitterButton.addEventListener("click", this._doTwitterShare), this._copyLinkButton && this._copyLinkButton.addEventListener("click", this._copyUrl), this._copyEmbedCodeButton && this._copyEmbedCodeButton.addEventListener("click", this._copyEmbedCode), this._copyCloseButton && this._copyCloseButton.addEventListener("click", this._closeCopyArea), this._closeButton && this._closeButton.addEventListener("click", this._closeState)
            }, m._removeEventListeners = function() {
                this._facebookButton && this._facebookButton.removeEventListener("click", this._doFacebookShare), this._twitterButton && this._twitterButton.removeEventListener("click", this._doTwitterShare), this._copyLinkButton && this._copyLinkButton.removeEventListener("click", this._copyUrl), this._copyEmbedCodeButton && this._copyEmbedCodeButton.removeEventListener("click", this._copyEmbedCode), this._copyCloseButton && this._copyCloseButton.removeEventListener("click", this._closeCopyArea), this._closeButton && this._closeButton.removeEventListener("click", this._closeState)
            }, m._syncSocialShareHidden = function() {
                this._facebookButton && (this._hideFacebook ? this._facebookButton.classList.add("hide-button") : this._facebookButton.classList.remove("hide-button")), this._twitterButton && (this._hideTwitter ? this._twitterButton.classList.add("hide-button") : this._twitterButton.classList.remove("hide-button"))
            }, m._doSocialShare = function(t) {
                this._clickedShareButton = null, this._copyLinkButton.classList.remove("active"), this._copyEmbedCodeButton.classList.remove("active"), this._showTextArea(!1), c.create(t, {
                    url: this._sharingUrl,
                    title: this._title
                })
            }, m._showTextArea = function(t) {
                t ? (this._container.classList.add("textarea-active"), a(this._copyTextArea), p || this._copyTextArea.setAttribute("readonly", "")) : (this._container.classList.remove("textarea-active"), this._copyLinkButton.classList.remove("active"), this._copyEmbedCodeButton.classList.remove("active"), this._copyTextArea.removeAttribute("readonly"), this._clickedShareButton && this._clickedShareButton.focus(), this._copyLinkButton.setAttribute("aria-label", this._templateData.copylink), this._copyEmbedCodeButton.setAttribute("aria-label", this._templateData.copyembed))
            }, m._copyUrl = function() {
                this._clearTextArea(), this._copyTextArea.value = this._sharingUrl, this._copyLinkButton.classList.add("active"), this._copyLinkButton.setAttribute("aria-label", this._templateData.selectlink), this._showTextArea(!0), this._clickedShareButton = this._copyLinkButton, this._copyTextArea.setAttribute("aria-label", this._templateData.copylink), a(this._copyTextArea)
            }, m._clearTextArea = function() {
                window.getSelection().removeAllRanges(), this._copyLinkButton.classList.remove("active"), this._copyEmbedCodeButton.classList.remove("active"), this._copyTextArea.removeAttribute("readonly")
            }, m._copyEmbedCode = function() {
                this._clearTextArea(), this._copyTextArea.value = l(s, {
                    videoid: this._videoid,
                    embedCodePath: this._embedPath,
                    width: this._player.getMediaWidth(),
                    height: this._player.getMediaHeight(),
                    title: this._title,
                    extension: this._hideExtension ? "" : ".html"
                }), this._copyEmbedCodeButton.classList.add("active"), this._copyEmbedCodeButton.setAttribute("aria-label", this._templateData.selectembed), this._showTextArea(!0), this._clickedShareButton = this._copyEmbedCodeButton, this._copyTextArea.setAttribute("aria-label", this._templateData.copyembed), a(this._copyTextArea)
            }, m._focusFirstButton = function() {
                this._firstButton || (this._firstButton = u.getTabbableElements(this._sharingButtonContainer)[0]), this._firstButton.focus()
            }, m.show = function() {
                return new Promise(function(t, e) {
                    requestAnimationFrame(function() {
                        var e = function() {
                            this.el.removeEventListener("transitionend", e), focus && this._focusFirstButton(), t()
                        }.bind(this);
                        this.el.addEventListener("transitionend", e), setTimeout(function() {
                            this._container.classList.add("showing")
                        }.bind(this))
                    }.bind(this))
                }.bind(this))
            }, m.hide = function() {
                return this._clickedShareButton = null, this._showTextArea(!1), new Promise(function(t, e) {
                    var i = function() {
                        this.el.removeEventListener("transitionend", i), t()
                    }.bind(this);
                    this.el.addEventListener("transitionend", i), setTimeout(function() {
                        this._container.classList.remove("showing")
                    }.bind(this))
                }.bind(this))
            }, m._getClientHeight = function() {
                return this.el.clientHeight
            }, m._getClientWidth = function() {
                return this.el.clientWidth
            }, m.destroy = function() {
                this._removeEventListeners()
            }, m._closeState = function() {
                this._showTextArea(!1), 0 === this._player.getCurrentTime() || this._player.getEnded() ? this._player.states.setState("initial") : this._player.states.setState("none")
            }, m._getAnalyticsSource = function() {
                return "drawer"
            }, m._initAnalyticsAttributes = function(t) {
                var e = [];
                this._facebookButton && e.push({
                    button: this._facebookButton,
                    title: "facebook",
                    events: "event85"
                }), this._twitterButton && e.push({
                    button: this._twitterButton,
                    title: "twitter",
                    events: "event84"
                }), this._copyLinkButton && e.push({
                    button: this._copyLinkButton,
                    title: "copy-link",
                    events: "event89"
                }), this._copyEmbedCodeButton && e.push({
                    button: this._copyEmbedCodeButton,
                    title: "copy-embed-code",
                    events: "event101"
                });
                var i = (-1 !== (t.url && t.url.indexOf(".m3u8")) ? "m3u8" : "mp4") + " via html5",
                    n = this._getAnalyticsSource(),
                    r = t.videoid,
                    s = document.head.querySelectorAll('meta[property="analytics-track"]');
                s = s ? s[0].getAttribute("content") : "", e.forEach(function(t) {
                    t.button.setAttribute("data-analytics-click", ""), t.button.setAttribute("data-analytics-share", JSON.stringify({
                        title: r,
                        events: t.events,
                        prop2: s + " - " + r + " - " + t.title,
                        prop18: i,
                        eVar49: document.referrer,
                        eVar54: document.location.href,
                        eVar55: s + " - " + r,
                        eVar70: n
                    }))
                }.bind(this))
            }, e.exports = f
        }).call(this, t("buffer").Buffer)
    }, {
        "../localization/Localization": 339,
        "@marcom/ac-accessibility/helpers/TabManager": 148,
        "@marcom/ac-analytics-share/factory/create": 163,
        "@marcom/ac-clipboard/select": 164,
        "@marcom/ac-console/log": 166,
        "@marcom/ac-social": 257,
        "@marcom/ac-string/supplant": 277,
        "@marcom/useragent-detect": 283,
        buffer: 110
    }],
    345: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-event-emitter-micro").EventEmitterMicro,
            r = function(t) {
                n.call(this), this.el = t.el || document.body, this.breakpoints = t.breakpoints.sort(function(t, e) {
                    return t.minWidth - e.minWidth
                }), this._player = t.player, this._breakPointsLength = this.breakpoints.length, this._addClasses = t.addClass, this._addEventListeners(), this._onResize()
            },
            s = n.prototype,
            o = r.prototype = Object.create(s);
        o.constructor = r, o._addEventListeners = function() {
            var t = this;
            this._boundOnResize = function() {
                t._onResize.apply(t, arguments)
            }, window.addEventListener("resize", this._boundOnResize), window.addEventListener("orientationchange", this._boundOnResize), window.addEventListener("DOMContentLoaded", this._boundOnResize)
        }, o._removeEventListeners = function() {
            window.removeEventListener("resize", this._boundOnResize), window.removeEventListener("orientationchange", this._boundOnResize), window.addEventListener("DOMContentLoaded", this._boundOnResize)
        }, o._onResize = function(t) {
            var e = this.el.clientWidth,
                i = this._currentBreakpoint;
            if (!1 !== t && this._player.refreshSize(), !i || !r.widthInBreakpoint(e, i)) {
                var n = r.getBreakpointFromWidth(e, this.breakpoints, i, this._breakPointsLength);
                this._addClasses && (this._currentBreakpoint && this.el.classList.remove(i.name), this.el.classList.add(n.name)), this._currentBreakpoint = n, this.trigger("breakpointchange", n)
            }
        }, o.getCurrentBreakpoint = function() {
            return this._currentBreakpoint
        }, o.refresh = function() {
            this._onResize(!1)
        }, o.destroy = function() {
            this._removeEventListeners(), s.destroy.call(this)
        }, r.getBreakpointFromElement = function(t, e) {
            return r.getBreakpointFromWidth(t.clientWidth, e)
        }, r.getBreakpointFromWidth = function(t, e, i, n) {
            for (var r = 0, s = n || e.length; r < s; r++) {
                var o = e[r];
                if (o !== i && (t >= o.minWidth && t <= o.maxWidth)) return o
            }
        }, r.widthInBreakpoint = function(t, e) {
            return t >= e.minWidth && t <= e.maxWidth
        }, e.exports = r
    }, {
        "@marcom/ac-event-emitter-micro": 201
    }],
    346: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-string/supplant"),
            r = {
                addLeadingZero: function(t, e) {
                    if (e = e || 2, t < 10 || e > 2)
                        for (t = String(t); t.length < e;) t = "0" + t;
                    return t
                },
                formatTime: function(t, e, i) {
                    return isNaN(t) ? "00:00" : (t = this.splitTime(Math.floor(t), e, function(t) {
                        return this.addLeadingZero(t, i)
                    }.bind(this)), n(e >= 3600 ? "{PN}{hours}:{minutes}:{seconds}" : "{PN}{minutes}:{seconds}", {
                        PN: t.negativeModifier,
                        hours: t.hours,
                        minutes: t.minutes,
                        seconds: t.seconds
                    }))
                },
                splitTime: function(t, e, i) {
                    i = i || function(t) {
                        return t
                    };
                    var n = {
                        negativeModifier: "",
                        hours: 0,
                        minutes: 0,
                        seconds: 0
                    };
                    if (isNaN(t)) return n;
                    for (var r in n.negativeModifier = t < 0 ? "-" : "", t = Math.abs(t), n.hours = e >= 3600 ? Math.floor(t / 3600) : 0, n.minutes = n.hours ? Math.floor(t / 60 % 60) : Math.floor(t / 60), n.seconds = t % 60, n) "number" == typeof n[r] && "hours" !== r && (n[r] = i(n[r]));
                    return n
                },
                stringToNumber: function(t) {
                    for (var e = 0, i = t.split(":"); i.length;) 3 === i.length ? e += 3600 * parseFloat(i.shift()) : 2 === i.length ? e += 60 * parseFloat(i.shift()) : e += parseFloat(i.shift());
                    return e
                }
            };
        e.exports = r
    }, {
        "@marcom/ac-string/supplant": 277
    }],
    347: [function(t, e, i) {
        "use strict";
        var n = t("../../../.versionfile"),
            r = n.split("."),
            s = r[2].split("-"),
            o = parseInt(r[0]),
            a = parseInt(r[1]),
            c = parseInt(r[2]);
        parseInt(s[1]);
        e.exports = {
            toString: function() {
                return n
            },
            toArray: function() {
                return [o, a, c]
            },
            major: parseInt(r[0]),
            minor: parseInt(r[1]),
            patch: parseInt(s[0]),
            prerelease: s.length > 1 ? parseInt(s[1]) : null
        }
    }, {
        "../../../.versionfile": 126
    }],
    348: [function(t, e, i) {
        "use strict";
        var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
                return typeof t
            } : function(t) {
                return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
            },
            r = t("@marcom/ac-object/clone");
        e.exports = function t() {
            var e = Array.prototype.slice.call(arguments);
            if (e.length < 2) return r(e[0]);
            var i = r(e.shift(), !0),
                s = e.shift();
            for (var o in s) s.hasOwnProperty(o) && (i.hasOwnProperty(o) && "object" === n(i[o]) ? "object" === n(i[o]) && "object" === n(s[o]) && (i[o] = t(i[o], s[o])) : i[o] = s[o]);
            return e.length ? t.apply(null, [i].concat(e)) : i
        }
    }, {
        "@marcom/ac-object/clone": 221
    }],
    349: [function(t, e, i) {
        "use strict";
        e.exports = [{
            width: 384,
            height: 160,
            type: "baseline-high",
            suffix: "h"
        }, {
            width: 384,
            height: 160,
            type: "small",
            suffix: "h"
        }, {
            width: 384,
            height: 160,
            type: "baseline-low",
            suffix: "l"
        }, {
            width: 384,
            height: 160,
            type: "baseline-medium",
            suffix: "m"
        }, {
            width: 480,
            height: 200,
            type: "medium",
            suffix: "h"
        }, {
            width: 768,
            height: 320,
            type: "large",
            suffix: ""
        }, {
            width: 960,
            height: 400,
            type: "large",
            suffix: ""
        }, {
            width: 1536,
            height: 640,
            type: "large",
            suffix: "h"
        }, {
            width: 1536,
            height: 640,
            type: "large",
            suffix: "l"
        }, {
            width: 1920,
            height: 800,
            type: "large",
            suffix: "l"
        }, {
            width: 1920,
            height: 800,
            type: "large",
            suffix: "h"
        }]
    }, {}],
    350: [function(t, e, i) {
        "use strict";
        e.exports = [{
            width: 416,
            height: 234,
            type: "baseline-high",
            suffix: "h"
        }, {
            width: 416,
            height: 234,
            type: "small",
            suffix: "h"
        }, {
            width: 416,
            height: 234,
            type: "baseline-low",
            suffix: "l"
        }, {
            width: 416,
            height: 234,
            type: "baseline-medium",
            suffix: "m"
        }, {
            width: 640,
            height: 360,
            type: "medium",
            suffix: "h"
        }, {
            width: 848,
            height: 480,
            type: "large",
            suffix: ""
        }, {
            width: 960,
            height: 540,
            type: "large",
            suffix: ""
        }, {
            width: 1280,
            height: 720,
            type: "large",
            suffix: "h"
        }, {
            width: 1280,
            height: 720,
            type: "large",
            suffix: "l"
        }, {
            width: 1920,
            height: 1080,
            type: "large",
            suffix: "l"
        }, {
            width: 1920,
            height: 1080,
            type: "large",
            suffix: "h"
        }]
    }, {}],
    351: [function(t, e, i) {
        "use strict";
        e.exports = [{
            width: 528,
            height: 244,
            type: "baseline-high",
            suffix: "h"
        }, {
            width: 528,
            height: 244,
            type: "small",
            suffix: "h"
        }, {
            width: 528,
            height: 244,
            type: "baseline-low",
            suffix: "l"
        }, {
            width: 528,
            height: 244,
            type: "baseline-medium",
            suffix: "m"
        }, {
            width: 812,
            height: 375,
            type: "medium",
            suffix: "h"
        }, {
            width: 1082,
            height: 500,
            type: "large",
            suffix: ""
        }, {
            width: 1218,
            height: 563,
            type: "large",
            suffix: ""
        }, {
            width: 1624,
            height: 750,
            type: "large",
            suffix: "h"
        }, {
            width: 1624,
            height: 750,
            type: "large",
            suffix: "l"
        }, {
            width: 2436,
            height: 1126,
            type: "large",
            suffix: "l"
        }, {
            width: 2436,
            height: 1126,
            type: "large",
            suffix: "h"
        }]
    }, {}],
    352: [function(t, e, i) {
        "use strict";
        e.exports = [{
            width: 360,
            height: 360,
            type: "baseline-high",
            suffix: "h"
        }, {
            width: 360,
            height: 360,
            type: "small",
            suffix: "h"
        }, {
            width: 360,
            height: 360,
            type: "baseline-low",
            suffix: "l"
        }, {
            width: 480,
            height: 480,
            type: "medium",
            suffix: ""
        }, {
            width: 540,
            height: 540,
            type: "medium",
            suffix: ""
        }, {
            width: 720,
            height: 720,
            type: "large",
            suffix: "h"
        }, {
            width: 720,
            height: 720,
            type: "large",
            suffix: "l"
        }, {
            width: 1080,
            height: 1080,
            type: "large",
            suffix: "l"
        }, {
            width: 1080,
            height: 1080,
            type: "large",
            suffix: "h"
        }]
    }, {}],
    353: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/ac-string/supplant"),
            r = /_r[0-9].+\.mov$/,
            s = /_[0-9]+x[0-9].+\.mp4$/,
            o = /_([0-9]+)x([0-9]+)/,
            a = /-tpl-.*-/,
            c = /-cc-[a-z].*-/,
            l = /-tft-.*-/,
            h = t("./1X1AssetSizes"),
            u = t("./16X9AssetSizes"),
            d = t("./12X5AssetSizes"),
            p = t("./19X9AssetSizes"),
            f = function(t, e) {
                return t.find(function(t) {
                    return t.width === e.width && (t.height = e.height) || t.width === e.height && (t.height = e.width)
                })
            };
        e.exports = {
            getVideoSource: function(t, e, i, a) {
                var c, m;
                o.test(t);
                var _, v = {};
                if (v.width = parseInt(RegExp.$1, 10), v.height = parseInt(RegExp.$2, 10), t.match(l)) c = d, m = 1536;
                else if (v.width === v.height) c = h, m = 1080;
                else if (t.match(r) || f(u, v)) c = u, m = 1280;
                else {
                    if (!f(p, v)) return t;
                    c = p, m = 1624
                }
                v.width < v.height && (_ = !0);
                var g, y = c[0].width,
                    b = a && a.maxWidth ? Math.max(a.maxWidth, y) : m;
                if (!t) throw "Must provide an url to optimize";
                if (void 0 === e || isNaN(e)) throw "Must provide a width";
                0 === e && (e = v.width), i && (c = c.filter(function(t) {
                    return t.type === i
                })), b < 1920 && (c = c.filter(function(t) {
                    return t.width <= b
                })), g = _ ? c.reduce(function(t, i) {
                    return Math.abs(i.height - e) < Math.abs(t.height - e) ? i : t
                }) : c.reduce(function(t, i) {
                    return Math.abs(i.width - e) < Math.abs(t.width - e) ? i : t
                });
                var E = "_{width}x{height}{suffix}.mp4";
                return _ && (E = "_{height}x{width}{suffix}.mp4"), t.match(s) ? t.replace(s, n(E, g)) : t.match(r) ? t.replace(r, n(E, g)) : t
            },
            getCaptionsSource: function(t) {
                return t.match(c) ? t.match(s) ? {
                    src: t.replace(s, "_cc.vtt"),
                    srclang: "en"
                } : t.match(r) ? {
                    src: t.replace(r, "_cc.vtt"),
                    srclang: "en"
                } : null : null
            },
            getThumbnailImageSource: function(t) {
                return t.match(a) ? {
                    url: t.replace(s, "_thumbnails.jpg")
                } : null
            }
        }
    }, {
        "./12X5AssetSizes": 349,
        "./16X9AssetSizes": 350,
        "./19X9AssetSizes": 351,
        "./1X1AssetSizes": 352,
        "@marcom/ac-string/supplant": 277
    }],
    354: [function(t, e, i) {
        "use strict";
        var n = window.Hls,
            r = t("./HTML5Video"),
            s = function(t) {
                this._src = null, r.apply(this, arguments), this._initialize(t)
            },
            o = r.prototype,
            a = s.prototype = Object.create(o);
        a._initialize = function(t) {
            if (void 0 === window.Hls) throw new Error("Hls.js should be included on the page in a script tag");
            this._hls = new n({
                debug: t.debugHls,
                enableWorker: !0,
                enableStreaming: !0,
                autoRecoverError: !0,
                enablePerformanceLogging: t.enablePerformanceLogging || !1
            })
        }, a.load = function(t, e) {
            this._videoElement.innerHTML = "", this._videoElement.removeAttribute("src");
            var i = function() {
                this._hls.off(n.Events.MEDIA_ATTACHED, i), this.setSrc(t[0]), this._createTextTrackTags(e)
            }.bind(this);
            this._hls.on(n.Events.MEDIA_ATTACHED, i), this._hls.attachMedia(this._videoElement)
        }, a.setSrc = function(t) {
            this._src = t, this._hls.loadSource(t), this._hls.on(n.Events.MANIFEST_PARSED, this._boundManifestParsed = function() {
                this._hls.off(n.Events.MANIFEST_PARSED, this._boundManifestParsed), this.play()
            }.bind(this))
        }, a.getCurrentSrc = function() {
            return this._src
        }, a.destroy = function() {
            o.destroy.apply(this, arguments), this._hls && (this._hls.destroy(), this._hls = null)
        }, e.exports = s
    }, {
        "./HTML5Video": 355
    }],
    355: [function(t, e, i) {
        "use strict";
        var n = t("../dom-emitter/DOMEmitterMicro"),
            r = t("../texttracks/createTextTracks"),
            s = t("@marcom/ac-console/log"),
            o = window.document,
            a = function(t) {
                this._videoElement = t && t.mediaElement ? t.mediaElement : o.createElement("video"), this.options = t || {}, this._textTracks = r(t), this._initElement(), n.apply(this, [this._videoElement]), this._forwardCaptionEvent = this._forwardCaptionEvent.bind(this), this._textTracksEmitter = this.getTextTracksEventEmitter(), this._textTracksEmitter.on("addtrack", this._forwardCaptionEvent), this._textTracksEmitter.on("change", this._forwardCaptionEvent), this._textTracksEmitter.on("removetrack", this._forwardCaptionEvent)
            },
            c = a.prototype = Object.create(n.prototype);
        c._initElement = function() {
            this._videoElement.classList.add("ac-video-media-controller"), null !== this.options.crossorigin && this._videoElement.setAttribute("crossorigin", this.options.crossorigin ? this.options.crossorigin : "anonymous"), this._videoElement.setAttribute("preload", this.options.preload || "auto"), this._videoElement.setAttribute("x-webkit-airplay", "")
        }, c._forwardCaptionEvent = function(t) {
            this.trigger(t.type)
        }, c.load = function(t, e, i) {
            i && (t = t.map(function(t) {
                return t + "#t=" + i
            })), this._createSourceTags(t), this._createTextTrackTags(e), this._videoElement.load()
        }, c._createSourceTags = function(t) {
            this._videoElement.removeAttribute("src"), this._videoElement.innerHTML = "";
            var e = 0,
                i = t.length;
            for (i && this._videoElement.setAttribute("src", t[0]); e < i; e++) {
                var n = o.createElement("source");
                n.src = t[e], this._videoElement.appendChild(n)
            }
        }, c.play = function() {
            try {
                var t = this._videoElement.play();
                t && "function" == typeof t.catch && (t.catch(function(e) {
                    this._playPromise === t && this.trigger("PlayPromiseError")
                }.bind(this)), t.then(function() {
                    this.trigger("PlayPromiseResolved")
                }.bind(this), function(t) {
                    s(t)
                })), this._playPromise = t
            } catch (t) {
                s(t)
            }
        }, c.refreshSize = function() {}, c.pause = function() {
            this._playPromise = null, this._videoElement.pause()
        }, c.addTextTrack = function(t) {
            this._addTextTrackTag(t)
        }, c.removeTextTrack = function(t) {
            this._removeTextTrackTag(t)
        }, c.getRenderElement = function() {
            return this.getMediaElement()
        }, c.getMediaElement = function() {
            return this._videoElement
        }, c._createTextTrackTags = function() {
            return this._textTracks.create.apply(this, arguments)
        }, c._addTextTrackTag = function() {
            return this._textTracks.add.apply(this, arguments)
        }, c._removeTextTrackTag = function() {
            return this._textTracks.remove.apply(this, arguments)
        }, c.getTextTracks = function() {
            return this._textTracks.get.apply(this, arguments)
        }, c.getTextTracksEventEmitter = function() {
            return this._textTracks.getEmitter.apply(this, arguments)
        }, c.getReadyState = function() {
            return this._videoElement.readyState
        }, c.getPreload = function() {
            return this._videoElement.preload
        }, c.setPreload = function(t) {
            return this._videoElement.preload = t
        }, c.setPoster = function(t) {
            this._videoElement.poster = t
        }, c.getVolume = function() {
            return this._videoElement.volume
        }, c.getMuted = function() {
            return this._videoElement.muted
        }, c.getPaused = function() {
            return this._videoElement.paused
        }, c.getCurrentTime = function() {
            return this._videoElement.currentTime
        }, c.getDuration = function() {
            return this._videoElement.duration
        }, c.setCurrentTime = function(t) {
            return this._videoElement.currentTime = t
        }, c.setVolume = function(t) {
            return this._videoElement.volume = t
        }, c.setMuted = function(t) {
            this._videoElement.muted = t
        }, c.getEnded = function() {
            return this._videoElement.ended
        }, c.setSrc = function(t) {
            this._videoElement.childNodes.length && t === this._getSrcNode().url || this._createSourceTags([t])
        }, c.advanceLiveStream = function() {}, c.getCurrentSrc = function() {
            return this._getSrcNode()
        }, c._getSrcNode = function() {
            return this._videoElement.childNodes[0]
        }, c.setControls = function(t) {
            t ? (this._videoElement.setAttribute("controls", ""), this._videoElement.removeAttribute("aria-hidden")) : (this._videoElement.removeAttribute("controls"), this._videoElement.setAttribute("aria-hidden", "true"))
        }, c.isFullscreen = function() {
            return this._videoElement.webkitDisplayingFullscreen
        }, c.supportsPictureInPicture = function() {
            return "function" == typeof this._videoElement.webkitSetPresentationMode
        }, c.isPictureInPicture = function() {
            return "picture-in-picture" === this._videoElement.webkitPresentationMode
        }, c.setPictureInPicture = function(t) {
            this.supportsPictureInPicture() && this._videoElement.webkitSetPresentationMode(t ? "picture-in-picture" : "inline")
        }, c.supportsAirPlay = function() {
            return !!window.WebKitPlaybackTargetAvailabilityEvent
        }, c.destroy = function() {
            this._textTracks && this._textTracks.destroy(), this._textTracksEmitter && (this._textTracksEmitter.off("addtrack", this._forwardCaptionEvent), this._textTracksEmitter.off("change", this._forwardCaptionEvent), this._textTracksEmitter.off("removetrack", this._forwardCaptionEvent)), this._textTracks = null, this._textTracksEmitter = null, this._videoElement = null
        }, e.exports = a
    }, {
        "../dom-emitter/DOMEmitterMicro": 284,
        "../texttracks/createTextTracks": 299,
        "@marcom/ac-console/log": 166
    }],
    356: [function(t, e, i) {
        "use strict";
        var n = t("./HTML5Video"),
            r = t("@marcom/ac-360"),
            s = function(t) {
                n.call(this, t), this._renderElement = document.createElement("div"), this._renderElement.classList.add("threesixty-video-container"), this._videoElement.style.visibility = "hidden", this._videoElement.style.opacity = 0, this._renderElement.appendChild(this._videoElement), this._ac360 = new r({
                    el: this._renderElement,
                    src: this.getMediaElement()
                }), this.sendMouseDown = this.sendMouseDown.bind(this)
            },
            o = n.prototype,
            a = s.prototype = Object.create(o);
        a.load = function() {
            this._ac360.setPos(0, 0), o.load.apply(this, arguments)
        }, a.play = function() {
            this.getEnded() && this._ac360.setPos(0, 0), o.play.apply(this, arguments)
        }, a.sendMouseDown = function(t) {
            this._ac360.sendMouseDown(t)
        }, a.getRenderElement = function() {
            return this._renderElement
        }, a.get360 = function() {
            return this._ac360
        }, a.setControls = function(t) {
            o.setControls.call(this, !1)
        }, a.supportsPictureInPicture = function() {
            return !1
        }, a.supportsAirPlay = function() {
            return !1
        }, a.refreshSize = function() {
            this._ac360.refreshSize()
        }, e.exports = s
    }, {
        "./HTML5Video": 355,
        "@marcom/ac-360": 138
    }],
    357: [function(t, e, i) {
        "use strict";
        var n = t("@marcom/useragent-detect"),
            r = n.browser.safari || n.browser.edge,
            s = "MediaSource" in window,
            o = function() {};
        o.prototype.create = function(e, i) {
            return e.hls && !r && s ? new(t("./HLSVideo"))(Object.assign({}, e, {
                parentElement: i
            })) : e.threesixty ? new(t("./ThreeSixtyVideo"))(Object.assign({}, e, {
                parentElement: i
            })) : new(t("./HTML5Video"))(Object.assign({}, e, {
                parentElement: i
            }))
        }, e.exports = Object.create(o.prototype)
    }, {
        "./HLSVideo": 354,
        "./HTML5Video": 355,
        "./ThreeSixtyVideo": 356,
        "@marcom/useragent-detect": 283
    }]
}, {}, [122]);