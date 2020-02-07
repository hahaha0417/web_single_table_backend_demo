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

jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function(x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
    },
    easeInQuad: function(x, t, b, c, d) {
        return c * (t /= d) * t + b
    },
    easeOutQuad: function(x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b
    },
    easeInOutQuad: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t + b;
        return -c / 2 * ((--t) * (t - 2) - 1) + b
    },
    easeInCubic: function(x, t, b, c, d) {
        return c * (t /= d) * t * t + b
    },
    easeOutCubic: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b
    },
    easeInOutCubic: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b
    },
    easeInQuart: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b
    },
    easeOutQuart: function(x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b
    },
    easeInOutQuart: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b
    },
    easeInQuint: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b
    },
    easeOutQuint: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b
    },
    easeInOutQuint: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b
    },
    easeInSine: function(x, t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b
    },
    easeOutSine: function(x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b
    },
    easeInOutSine: function(x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b
    },
    easeInExpo: function(x, t, b, c, d) {
        return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b
    },
    easeOutExpo: function(x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
    },
    easeInOutExpo: function(x, t, b, c, d) {
        if (t == 0) return b;
        if (t == d) return b + c;
        if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b
    },
    easeInCirc: function(x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b
    },
    easeOutCirc: function(x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b
    },
    easeInOutCirc: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b
    },
    easeInElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b
    },
    easeOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b
    },
    easeInOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d / 2) == 2) return b + c;
        if (!p) p = d * (.3 * 1.5);
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b
    },
    easeInBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b
    },
    easeOutBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b
    },
    easeInOutBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
        return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b
    },
    easeInBounce: function(x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b
    },
    easeOutBounce: function(x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b
        } else if (t < (2 / 2.75)) {
            return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b
        } else if (t < (2.5 / 2.75)) {
            return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b
        } else {
            return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b
        }
    },
    easeInOutBounce: function(x, t, b, c, d) {
        if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b
    }
});

var GR = {
    config: {
        init: function() {
            var _self = this;
            _self.stylePath = $('link[href*="assets/css/style."][href*=".css"]').add('link[href*="assets/css/custom."][href*=".css"]').add('link[href*="assets/css/site.core."][href*=".css"]').attr('href') || '';
            _self.themeDir = _self.stylePath.replace(/assets\/.*/i, '');
            _self.mined = (/(?:style|custom|site\.core)\.min\.css(?:\?t=\d{0,})?/i).test(_self.stylePath) == true
        },
        stylePath: '',
        themeDir: '',
        mined: false
    },
    loader: {
        env: null,
        head: null,
        pending: {},
        pollCount: 0,
        queue: {
            css: [],
            js: []
        },
        styleSheets: document.styleSheets,
        __createNode: function createNode(name, attrs) {
            var node = document.createElement(name),
                attr;
            for (attr in attrs) {
                if (attrs.hasOwnProperty(attr)) {
                    node.setAttribute(attr, attrs[attr])
                }
            }
            return node
        },
        __finish: function finish(type) {
            var p = this.pending[type],
                callback, urls;
            if (p) {
                callback = p.callback;
                urls = p.urls;
                urls.shift();
                this.pollCount = 0;
                if (!urls.length) {
                    callback && callback.call(p.context, p.obj);
                    this.pending[type] = null;
                    this.queue[type].length && this.__load(type)
                }
            }
        },
        __getEnv: function() {
            var ua = navigator.userAgent;
            this.env = {
                async: document.createElement('script').async === true
            };
            (this.env.webkit = /AppleWebKit\//.test(ua)) || (this.env.ie = /MSIE|Trident/.test(ua)) || (this.env.opera = /Opera/.test(ua)) || (this.env.gecko = /Gecko\//.test(ua)) || (this.env.unknown = true)
        },
        __pollGecko: function(node) {
            var _this = this;
            var hasRules;
            try {
                hasRules = !!node.sheet.cssRules
            } catch (ex) {
                _this.pollCount += 1;
                if (_this.pollCount < 200) {
                    setTimeout(function() {
                        _this.__pollGecko(node)
                    }, 50)
                } else {
                    hasRules && _this.__finish('css')
                }
                return
            }
            _this.__finish('css')
        },
        __pollWebKit: function() {
            var _this = this;
            var css = _this.pending.css,
                i;
            if (css) {
                i = _this.styleSheets.length;
                while (--i >= 0) {
                    if (_this.styleSheets[i].href === css.urls[0]) {
                        _this.__finish('css');
                        break
                    }
                }
                _this.pollCount += 1;
                if (css) {
                    if (_this.pollCount < 200) {
                        setTimeout(function() {
                            _this.__pollWebKit
                        }, 50)
                    } else {
                        _this.__finish('css')
                    }
                }
            }
        },
        __load: function(type, urls, callback, obj, context) {
            var _this = this;
            var _finish = function() {
                _this.__finish(type)
            };
            var isCSS = type === 'css';
            var nodes = [];
            var i, len, node, p, pendingUrls, url;
            _this.env || _this.__getEnv();
            
            if (urls) {
                urls = typeof urls === 'string' ? [urls] : urls.concat();
                
                if (isCSS || _this.env.async || _this.env.gecko || _this.env.opera) {
                    _this.queue[type].push({
                        urls: urls,
                        callback: callback,
                        obj: obj,
                        context: context
                    })
                } else {
                    for (i = 0, len = urls.length; i < len; ++i) {
                        _this.queue[type].push({
                            urls: [urls[i]],
                            callback: i === len - 1 ? callback : null,
                            obj: obj,
                            context: context
                        })
                    }
                }
            }
            if (_this.pending[type] || !(p = _this.pending[type] = _this.queue[type].shift())) {
                return
            }
            _this.head || (_this.head = document.head || document.getElementsByTagName('head')[0]);
            pendingUrls = p.urls.concat();
            for (i = 0, len = pendingUrls.length; i < len; ++i) {
                url = pendingUrls[i];
                if (isCSS) {
                    if ($('link[href*="' + url + '"]').index() !== -1) {
                        _finish();
                        return
                    }
                    node = _this.env.gecko ? _this.__createNode('style') : _this.__createNode('link', {
                        href: url,
                        rel: 'stylesheet'
                    })
                } else {
                    if ($('script[src*="' + url + '"]').index() !== -1) {
                        _finish();
                        return
                    }
                    node = _this.__createNode('script', {
                        src: url
                    });
                    node.async = false
                }
                node.dataset.lazyload = true;
                if (_this.env.ie && !isCSS && 'onreadystatechange' in node && !('draggable' in node)) {
                    node.onreadystatechange = function() {
                        if (/loaded|complete/.test(node.readyState)) {
                            node.onreadystatechange = null;
                            _finish()
                        }
                    }
                } else if (isCSS && (_this.env.gecko || _this.env.webkit)) {
                    if (_this.env.webkit) {
                        p.urls[i] = node.href;
                        _this.__pollGecko(node)
                    } else {
                        node.innerHTML = '@import "' + url + '";';
                        _this.__pollGecko(node)
                    }
                } else {
                    node.onload = node.onerror = _finish
                }
                nodes.push(node)
            }            
            for (i = 0, len = nodes.length; i < len; ++i) {
                _this.head.appendChild(nodes[i])
            }
        },
        importJs: function(urls, callback, obj, context) {
            this.__load('js', urls, callback, obj, context)
        },
        importCss: function(urls, callback, obj, context) {
            this.__load('css', urls, callback, obj, context)
        },
        asyncLoad: function(urls, callback) {
            var _this = this;
            var urls = ('string' === typeof urls) ? [urls] : urls;
            var len = (urls instanceof Array) && urls.length || 0;
            
            var _load = function(filePath, finish) {
                if (/\.js(?:\?\S+|#\S+)?$/.test(filePath)) {
                    _this.importJs(filePath, finish)
                } else {
                    _this.importCss(filePath, finish)
                }
            };
            var _orderLoad = function() {
                now = urls.shift();
                if (now) {
                    _load(now, _orderLoad)
                } else {
                    $.isFunction(callback) && callback()
                }
            };
            if (!len || len < 1) {
                return
            }
            _orderLoad()
        }
    },
    dialog: {
        load: function(skin, finish) {
            var object = $.data(document, 'BootstrapDialog');
            if (object === undefined || object.initialized === undefined) {
                GR.loader.asyncLoad(['https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'], function() {
                    $.data(document, 'BootstrapDialog', {
                        initialized: true
                    });
                    BootstrapDialog.DEFAULT_TEXTS['OK'] = '確定';
                    BootstrapDialog.DEFAULT_TEXTS['CANCEL'] = '取消';
                    BootstrapDialog.alert = function() {
                        var options = {};
                        var defaultOptions = {
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: null,
                            message: null,
                            closable: false,
                            draggable: false,
                            buttonLabel: BootstrapDialog.DEFAULT_TEXTS.OK,
                            callback: null
                        };
                        if (typeof arguments[0] === 'object' && arguments[0].constructor === {}.constructor) {
                            options = $.extend(true, defaultOptions, arguments[0])
                        } else {
                            options = $.extend(true, defaultOptions, {
                                message: arguments[0],
                                callback: typeof arguments[1] !== 'undefined' ? arguments[1] : null
                            })
                        }
                        return new BootstrapDialog({
                            size: BootstrapDialog.SIZE_SMALL,
                            type: options.type,
                            title: options.title,
                            message: options.message,
                            closable: options.closable,
                            draggable: options.draggable,
                            data: {
                                callback: options.callback
                            },
                            onshow: function(dialog) {
                                dialog.getModalHeader().hide();
                                dialog.getModalDialog().addClass('modal-sm')
                            },
                            onhide: function(dialog) {
                                !dialog.getData('btnClicked') && dialog.isClosable() && typeof dialog.getData('callback') === 'function' && dialog.getData('callback')(false)
                            },
                            buttons: [{
                                label: options.buttonLabel,
                                cssClass: 'btn-primary',
                                action: function(dialog) {
                                    dialog.setData('btnClicked', true);
                                    typeof dialog.getData('callback') === 'function' && dialog.getData('callback')(true);
                                    dialog.close()
                                }
                            }]
                        }).open()
                    };
                    BootstrapDialog.confirm = function() {
                        var options = {};
                        var defaultOptions = {
                            size: BootstrapDialog.SIZE_SMALL,
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: '網頁訊息',
                            message: null,
                            closable: false,
                            draggable: false,
                            btnCancelLabel: BootstrapDialog.DEFAULT_TEXTS.CANCEL,
                            btnOKLabel: BootstrapDialog.DEFAULT_TEXTS.OK,
                            btnOKClass: null,
                            callback: null
                        };
                        if (typeof arguments[0] === 'object' && arguments[0].constructor === {}.constructor) {
                            options = $.extend(true, defaultOptions, arguments[0])
                        } else {
                            options = $.extend(true, defaultOptions, {
                                message: arguments[0],
                                closable: false,
                                buttonLabel: BootstrapDialog.DEFAULT_TEXTS.OK,
                                callback: typeof arguments[1] !== 'undefined' ? arguments[1] : null
                            })
                        }
                        if (options.btnOKClass === null) {
                            options.btnOKClass = ['btn', options.type.split('-')[1]].join('-')
                        }
                        return new BootstrapDialog({
                            size: options.size,
                            type: options.type,
                            title: options.title,
                            message: options.message,
                            closable: options.closable,
                            draggable: options.draggable,
                            data: {
                                callback: options.callback
                            },
                            buttons: [{
                                label: options.btnCancelLabel,
                                action: function(dialog) {
                                    if (typeof dialog.getData('callback') === 'function' && dialog.getData('callback').call(this, false) === false) {
                                        return false
                                    }
                                    return dialog.close()
                                }
                            }, {
                                label: options.btnOKLabel,
                                cssClass: options.btnOKClass,
                                action: function(dialog) {
                                    if (typeof dialog.getData('callback') === 'function' && dialog.getData('callback').call(this, true) === false) {
                                        return false
                                    }
                                    return dialog.close()
                                }
                            }]
                        }).open()
                    };
                    $.isFunction(finish) && finish()
                })
            } else {
                $.isFunction(finish) && finish()
            }
        },
        init: function() {
            var _self = this;
            _self.load()
        },
        alert: function() {
            var _self = this;
            var _createMsg = function(msg, html) {
                msg = msg || '';
                html = !isNaN(html) ? html : true;
                if (msg && msg.constructor === Array) {
                    var contentLeng = msg.length;
                    if (contentLeng > 1) {
                        var msgStr = '錯誤原因如下請重新檢查：\n';
                        for (var i = 0; i < contentLeng; i++) {
                            msgStr += (i + 1) + '. ' + msg[i] + '\n'
                        }
                        msg = msgStr
                    } else {
                        msg = msg.shift().toString()
                    }
                }
                msg = msg.toString();
                msg = html ? msg.replace(/\n/g, '<br>') : msg.replace(/<[^>]*>/g, '');
                return msg
            };
            var options = {};
            var defaultOptions = {};
            if (typeof arguments[0] === 'object' && arguments[0].constructor === {}.constructor) {
                options = $.extend(true, defaultOptions, arguments[0])
            } else {
                options = $.extend(true, defaultOptions, {
                    message: _createMsg(arguments[0], true),
                    callback: typeof arguments[1] !== 'undefined' ? arguments[1] : null
                })
            }
            _self.load(null, function() {
                BootstrapDialog.alert(options)
            })
        },
        confirm: function() {
            var _self = this;
            var options = {};
            var defaultOptions = {};
            if (typeof arguments[0] === 'object' && arguments[0].constructor === {}.constructor) {
                options = $.extend(true, defaultOptions, arguments[0])
            } else {
                options = $.extend(true, defaultOptions, {
                    message: arguments[0],
                    callback: typeof arguments[1] !== 'undefined' ? arguments[1] : null
                })
            }
            _self.load(null, function() {
                BootstrapDialog.confirm(options)
            })
        }
    },
    toogleLoader: function(status) {
        if (true == status) {
            GR.loader.asyncLoad(['http://malsup.github.io/jquery.blockUI.js'], function() {
                $.blockUI({
                    message: '<svg width="70px" height="70px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-hourglass"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><g><path fill="none" stroke="#cec9c9" stroke-width="5" stroke-miterlimit="10" d="M58.4,51.7c-0.9-0.9-1.4-2-1.4-2.3s0.5-0.4,1.4-1.4 C70.8,43.8,79.8,30.5,80,15.5H70H30H20c0.2,15,9.2,28.1,21.6,32.3c0.9,0.9,1.4,1.2,1.4,1.5s-0.5,1.6-1.4,2.5 C29.2,56.1,20.2,69.5,20,85.5h10h40h10C79.8,69.5,70.8,55.9,58.4,51.7z" class="glass"></path><clipPath id="uil-hourglass-clip1"><rect x="15" y="20" width="70" height="25" class="clip"><animate attributeName="height" from="25" to="0" dur="1s" repeatCount="indefinite" vlaues="25;0;0" keyTimes="0;0.5;1"></animate><animate attributeName="y" from="20" to="45" dur="1s" repeatCount="indefinite" vlaues="20;45;45" keyTimes="0;0.5;1"></animate></rect></clipPath><clipPath id="uil-hourglass-clip2"><rect x="15" y="55" width="70" height="25" class="clip"><animate attributeName="height" from="0" to="25" dur="1s" repeatCount="indefinite" vlaues="0;25;25" keyTimes="0;0.5;1"></animate><animate attributeName="y" from="80" to="55" dur="1s" repeatCount="indefinite" vlaues="80;55;55" keyTimes="0;0.5;1"></animate></rect></clipPath><path d="M29,23c3.1,11.4,11.3,19.5,21,19.5S67.9,34.4,71,23H29z" clip-path="url(#uil-hourglass-clip1)" fill="#cec9c9" class="sand"></path><path d="M71.6,78c-3-11.6-11.5-20-21.5-20s-18.5,8.4-21.5,20H71.6z" clip-path="url(#uil-hourglass-clip2)" fill="#cec9c9" class="sand"></path><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="180 50 50" repeatCount="indefinite" dur="1s" values="0 50 50;0 50 50;180 50 50" keyTimes="0;0.7;1"></animateTransform></g></svg><p>loading.....<p>',
                    css: {
                        'border': 'none',
                        'width': '250px',
                        'padding': '5px 3px',
                        'left': '50%',
                        'margin-left': '-125px',
                        'color': '#fff',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        'background-color': 'transparent',
                        'font-size': '15px'
                    }
                })
            })
        } else {
            var __pollCount = 0;
            var __pollClose = function() {
                try {
                    $.unblockUI()
                } catch (ex) {
                    __pollCount += 1;
                    if (__pollCount < 200) {
                        setTimeout(function() {
                            __pollClose()
                        }, 50)
                    }
                    return
                }
            };
            __pollClose()
        }
    },
    ajaxBeforeSend: function(XMLHttpRequest) {
        XMLHttpRequest.setRequestHeader('Request-Type', 'ajax');
        GR.toogleLoader(true)
    },
    ajaxComplete: function(XMLHttpRequest, textStatus) {
        GR.toogleLoader(false)
    },
    ajaxError: function(XMLHttpRequest, textStatus, errorThrown) {
        GR.toogleLoader(false)
    },
    validate: {
        pwd: function(value) {
            return !/\W+/.test(value)
        },
        email: function(value) {
            return /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(value)
        },
        url: function(value) {
            return /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(value)
        },
        youtube: function(value) {
            return /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/watch\?.+&v=))([\w-]{11})(?:.+)?$/i.test(value)
        },
        date: function(value) {
            return !/Invalid|NaN/.test(new Date(value).toString())
        },
        dateIso: function(value) {
            return /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(value)
        },
        number: function(value) {
            return /^(?:-?\d+|-?\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(value)
        },
        digits: function(value) {
            return /^\d+$/.test(value)
        },
        range: function(value, param) {
            return (value >= param[0] && value <= param[1])
        },
        rangelength: function(value, param) {
            var length = value.length;
            return (length >= param[0] && length <= param[1])
        }
    }
};
$(document).ready(function(e) {
    var $win = $(window);
    var $videoPlayer = $('#ban-video-player');    
    if ($videoPlayer.length > 0) {
        GR.loader.asyncLoad(['//cdnjs.cloudflare.com/ajax/libs/jquery-tubeplayer/2.1.0/jquery.tubeplayer.min.js', ], function() {                      
            $videoPlayer.tubeplayer({
                autoPlay: true,
                showControls: false,
                annotations: false,
                loop: 1,
                allowFullScreen: "false",
                initialVideo: $videoPlayer.data('video-id'),
                onPlay: function(id) {},
                onPause: function() {},
                onStop: function() {},
                onSeek: function(time) {},
                onMute: function() {},
                onUnMute: function() {}
            });
            var w = 0;
            $win.on('scroll', function(e) {
                var sctopv = $win.scrollTop(),
                    banStop = $('.header').outerHeight() + $('#index .banner').outerHeight() / 5;
                if (sctopv > banStop) {
                    $videoPlayer.tubeplayer('pause')
                } else if (w > 991) {
                    $videoPlayer.tubeplayer('play')
                }
            }).trigger('scroll');
            $win.on('resize', function(e) {
                w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                if (w < 992) {
                    $videoPlayer.tubeplayer('pause')
                }
            }).trigger('resize')
        })
    }
    GR.loader.asyncLoad(['//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js'], function() {
        $('.lazy-ite-1, .lazy-ite-2').lazy({
            threshold: 0,
            afterLoad: function(element) {
                $(element).parent().addClass('view')
            }
        })
    });
    
    var $bs = $('.ban-slick'), 
        $ns = $('.news-slick'),
        $as = $('.artist-slick'),
        $vc = $('.video-carousel');
    GR.loader.asyncLoad(['//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', GR.config.themeDir + 'assets/web/front/practice/ment/plugin-animatedslider.css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', GR.config.themeDir + 'assets/web/front/practice/ment/jquery.cssslider.min.js', GR.config.themeDir + 'assets/plugin/ui.touch-punch/jquery.ui.touch-punch.min.js'], function() {
        $bs.on('init', function() {
            reParallax()
        });
    
        $bs.not('.slick-initialized').slick({
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 8000,
            speed: 800,
            draggable: false,
            PauseOnHover: false,
            cssEase: 'cubic-bezier(0,.4,.4,1)'
        });
        $ns.not('.slick-initialized').slick({
            arrows: false,
            dots: true,
            speed: 800,
            easing: 'easeOutExpo',
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
        $as.on('init', function() {
            reParallax()
        });
        $as.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var maxSlide = parseInt(slick.slideCount) - 1;
            if (currentSlide == "0" && nextSlide == (maxSlide)) {
                $('.item[data-slick-index="-1"]', $as).addClass('slick-current-temp')
            } else if (currentSlide == maxSlide && nextSlide == "0") {
                $('.item[data-slick-index="' + slick.slideCount + '"]', $as).addClass('slick-current-temp')
            }
        });
        $as.on('afterChange', function(event, slick, currentSlide) {
            $('.item[data-slick-index="-1"], .item[data-slick-index="' + slick.slideCount + '"]', $as).removeClass('slick-current-temp')
        });
        $as.not('.slick-initialized').slick({
            arrows: true,
            centerMode: true,
            centerPadding: '33.333%',
            infinite: true,
            speed: 800,
            easing: 'easeOutExpo',
            responsive: [{
                breakpoint: 992,
                settings: {
                    centerPadding: '0'
                }
            }]
        });
        $('li > a', $vc).append('<i></i>');
        $vc.AnimatedSlider({
            prevButton: '.video-prev',
            nextButton: '.video-next',
            visibleItems: 5,
            willChangeCallback: function() {
                var ph = 0;
                $('> li', $vc).each(function(i, element) {
                    var $t = $(element);
                    if ($t.hasClass('previous_hidden') == true) ph = i
                });
                if ($('> li.next_item_2', $vc).index() == $('> li', $vc).length - 1) {
                    $('> li:eq(' + ph + '), > li:eq(0)', $vc).addClass('view')
                } else {
                    $('> li:eq(' + ph + '), > li.next_item_2 + li', $vc).addClass('view')
                }
            },
            userChangedCallback: function() {
                reParallax()
            }
        });
        $vc.on('swiperight', function() {
            $('.video-prev').click()
        });
        $vc.on('swipeleft', function() {
            $('.video-next').click()
        });
        $('a.item-box', $vc).on('click', function(e) {
            e.preventDefault();
            var _thisId = $(this).parent().index();
            var _videoHtml = '<div class="video-carousel-mask"><a href="#" title="關閉"><i class="fa fa-times"></i></a></div>' + '<div class="video-carousel-slick">';
            var _videoThumb = '<div class="video-carousel-thumb">';
            $('> li', $vc).each(function(i, element) {
                var $this = $(element),
                    _video = $('> a', $this).attr('href'),
                    _idtemp = _video.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/embed\/|\/v\/|\/watch\?v=|\/)([^\s&]+)/);
                _id = _idtemp[1].split('?'), src = 'https://www.youtube.com/embed/' + _id[0] + '?rel=0&autoplay=0&enablejsapi=1';
                _videoHtml += '<div class="video-carousel-item"><div><iframe src="' + src + '" allowfullscreen></iframe></div></div>';
                _videoThumb += '<div><a href="#" title="' + $('> a', $this).attr('title') + '"><img src="' + $('> a > img', $this).attr('src') + '" alt="*" class="img-responsive"></a></div>'
            });
            _videoHtml += '</div></div>';
            _videoThumb += '</div>';
            $('body').append(_videoHtml).append(_videoThumb);
            $('.video-carousel-slick').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                var player = $('.video-carousel-slick .video-carousel-item[data-slick-index="' + currentSlide + '"]').find("iframe").get(0);
                var command = {
                    event: 'command',
                    func: 'pauseVideo'
                };
                player.contentWindow.postMessage(JSON.stringify(command), '*')
            });
            $('.video-carousel-slick').slick({
                fade: true,
                speed: 500,
                draggable: false,
                swipe: false,
                touchMove: false,
                cssEase: 'cubic-bezier(0,.4,.4,1)',
                asNavFor: '.video-carousel-thumb',
                initialSlide: _thisId
            });
            $('.video-carousel-thumb').slick({
                arrows: false,
                speed: 500,
                slidesToShow: 6,
                slidesToScroll: 1,
                focusOnSelect: true,
                swipeToSlide: true,
                easing: 'easeOutQuart',
                asNavFor: '.video-carousel-slick',
                initialSlide: _thisId
            });
            $('.video-carousel-mask').on('click', function(e) {
                $('.video-carousel-mask, .video-carousel-slick, .video-carousel-thumb').stop().animate({
                    'opacity': 0
                }, 500, 'easeOutQuart', function() {
                    $('.video-carousel-mask, .video-carousel-slick, .video-carousel-thumb').remove()
                })
            })
        });
        $win.on('scroll', function(e) {
            var sctop = $win.scrollTop(),
                banTop = sctop * 0.5,
                botTop = (sctop - $('#index .contact').offset().top) * 0.5;
            ani1Top = 0 - sctop * 0.2, ani2Top = sctop * 0.18, sec1 = $('#index .about .about-inner').offset().top - $win.outerHeight() + 200, sec2 = $('#index .service .content').offset().top - $win.outerHeight() + 200, sec3 = $ns.offset().top - $win.outerHeight() / 2, sec4 = $as.offset().top - $win.outerHeight() / 2, sec5 = $vc.offset().top - $win.outerHeight() / 2;
            $('#index .ban-slick, #index .about').addClass('view');
            $('#index .banner').css({
                'top': banTop
            });
            $('#index .contact img').css({
                'top': botTop
            });
            $('#index .service .anis-1').css({
                'margin-top': ani1Top
            });
            $('#index .service .anis-2').css({
                'margin-bottom': ani2Top
            });
            if (sctop > sec1) {
                $('#index .about .start-ico i').addClass('view-1');
                setTimeout(function() {
                    $('#index .about .start-ico i').addClass('view-2')
                }, 800);
                setTimeout(function() {
                    $('#index .about .start-ico').addClass('view')
                }, 1000);
                setTimeout(function() {
                    $('#index .about .lines').addClass('view')
                }, 1250);
                setTimeout(function() {
                    $('#index .about .box').addClass('view')
                }, 2250)
            }
            if (sctop > sec2) {
                $('#index .service .list').addClass('view');
                setTimeout(function() {
                    $('#index .service .icons').addClass('view')
                }, 400)
            }
            if (sctop > sec3) {
                $ns.addClass('view')
            }
            if (sctop > sec4) {
                $as.addClass('view').delay(1000).queue(function() {
                    $('.item', $as).addClass('view').dequeue()
                })
            }
            if (sctop > sec5) {
                $('#index .video').addClass('view')
            }
        }).trigger('scroll');
        $('.anchor-to').on('click', function(e) {
            var target = $(this).offset().top - $('.header').outerHeight() - 49;
            $('html, body').stop().animate({
                scrollTop: target
            }, 1200, 'easeOutQuart')
        })
    })

    
});

(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-85337124-1', 'auto');
ga('send', 'pageview');

$(document).ready(function(e) {
    var $win = $(window);
    var baseHref = $('base').attr('href') || '';
    GR.config.init();
    if ($('img[data-src].lazy').length > 0) {
        GR.loader.asyncLoad(['//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js'], function() {
            $('img[data-src].lazy').lazy({
                effect: 'fadeIn',
                effectTime: '250',
                threshold: 0
            })
        })
    }
    var _logoInsert = '';
    for (var i = 1; i < 15; i++) {
        _logoInsert += '<i class="logo-' + i + '"></i>'
    }
    $('.header .logo > a').append(_logoInsert);
    $('.header .menu .menu-main > li').each(function(i, element) {
        var $m = $(element),
            _def = $('> a', $m).text(),
            _hov = $('> a', $m).data('hover'),
            _insert = '<span class="def">' + _def + '</span><span class="hov">' + _hov + '</div>';
        if ($m.hasClass('lang') == false) {
            $('> a', $m).html(_insert);          
            $('> .menu-sub', $m).css({
                display: 'none',
                height: 'auto'
            })
        }
        $m.on('mouseenter', function(e) {
            $('> .menu-sub', $m).show().addClass('open')
        });
        $m.on('mouseleave', function(e) {
            $('> .menu-sub', $m).removeClass('open')
        });
        $('> a', $m).on('click', function(e) {
            e.preventDefault();
            if ($('.header a.menu-switch').is(':visible') == false) {
                location.href = baseHref + $(this).attr('href')
            } else {
                if ($('> .menu-sub', $m).length < 1) {
                    location.href = baseHref + $(this).attr('href')
                } else {
                    $m.toggleClass('open')
                }
            }
        })
    });
    $('.header a.menu-switch').on('click', function(e) {
        if ($(this).hasClass('open') == false) {
            openNav()
        } else {
            closeNav()
        }
    });
    $('body').on('swipeleft', function(e) {
        if ($('.header a.menu-switch').is(':visible') == true && e.swipestart.coords[0] > $(this).outerWidth() - 25) {
            openNav()
        }
    });
    $('body').on('swiperight', function(e) {
        if ($('.header a.menu-switch').hasClass('open') == true) {
            if (e.swipestart.coords[0] < $(this).outerWidth() - 200) {
                closeNav()
            }
        }
    });

    function openNav() {
        var sctop = 0 - $win.scrollTop();
        $('.header, .header .social ul, .header a.menu-switch, .header .menu nav, .g-wrap').addClass('open');
        $('.header a.menu-switch i.fa').attr('class', 'fa fa-times');
        $('.g-wrap').css({
            'top': sctop
        });
        $('body').append('<div class="nav-menu-mask" style="position:fixed; z-index:5000; width:100%; height:100%; background:rgba(0,0,0,.5); top:0; left:0; opacity:0;"></div>');
        $('.nav-menu-mask').stop().animate({
            opacity: 1
        }, 500, 'easeOutQuart')
    }

    function closeNav() {
        var sctop = 0 - $('.g-wrap').offset().top;
        $('.header, .header .social ul, .header a.menu-switch, .header .menu nav, .g-wrap').removeClass('open');
        $('.header a.menu-switch i.fa').attr('class', 'fa fa-bars');
        $('.g-wrap').css({
            'top': 0
        });
        $win.scrollTop(sctop);
        $('.nav-menu-mask').stop().animate({
            opacity: 0
        }, 500, 'easeOutQuart', function() {
            $('.nav-menu-mask').remove()
        })
    }
    $('.text-edit [title]').attr('data-tooltip', 'top');
    $('[data-tooltip]').each(function(i, element) {
        var $t = $(element),
            _pos = 'tooltip--pos--' + $t.data('tooltip'),
            _inv = ($t.data('invert') == true) ? ' tooltip--invert' : '',
            _msg = ($t.attr('title') != null) ? $t.attr('title') : $t.attr('data-title');
        if (_msg != null && _msg != '') {
            if (_pos != 'tooltip--pos--hover') {
                $t.on('mouseenter', function(e) {
                    $t.attr('title', '');
                    $t.css({
                        position: 'relative',
                        overflow: 'visible'
                    });
                    $t.append('<div class="tooltip--box ' + _pos + _inv + '" style="opacity: 0;">' + _msg + '</div>');
                    $('.tooltip--box', $t).stop().animate({
                        'opacity': 1
                    }, 150, 'easeOutQuart')
                });
                $t.on('mouseleave', function(e) {
                    $t.attr('title', _msg);
                    $('.tooltip--box', $t).stop().animate({
                        'opacity': 0
                    }, 150, 'easeOutQuart', function() {
                        $('.tooltip--box', $t).remove()
                    })
                })
            } else {
                $t.on('mouseenter', function() {
                    $t.attr('title', '');
                    $t.css({
                        position: 'relative',
                        overflow: 'visible'
                    })
                });
                $t.on('mousemove', function(e) {
                    $('.tooltip--box', $t).remove();
                    var offsetX = $t.offset().left,
                        offsetY = $t.offset().top,
                        eventPosX = e.pageX - offsetX + 15,
                        eventPosY = e.pageY - offsetY + 20;
                    $t.append('<div class="tooltip--box ' + _pos + _inv + '" style="opacity: 0; top: ' + eventPosY + 'px; left: ' + eventPosX + 'px">' + _msg + '</div>');
                    $('.tooltip--box', $t).stop().delay(300).queue(function() {
                        $('.tooltip--box', $t).animate({
                            'opacity': 1
                        }, 150, 'easeOutQuart').dequeue()
                    })
                });
                $t.on('mouseleave', function() {
                    $t.attr('title', _msg);
                    $('.tooltip--box', $t).stop().animate({
                        'opacity': 0
                    }, 150, 'easeOutQuart', function() {
                        $('.tooltip--box', $t).remove()
                    })
                })
            }
        }
    });
    $('.text-edit iframe[src^="https://www.youtube.com"]').each(function(i, element) {
        var _src = $(element).attr('src'),
            _html = '<div style="position: relative;  height: 0; padding-bottom: 56.25%; margin: 20px 0;"><iframe src="' + _src + '" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" frameborder="0" allowfullscreen></iframe></div>';
        $(element).before(_html).remove()
    });
    $('.p-pager a.disabled').on('click', function(e) {
        e.preventDefault()
    });
    $win.on('resize', function(e) {
        setTimeout(function() {
            $win.trigger('resize.px.parallax')
        }, 100)
    });
    $win.on('scroll', function(e) {
        if ($(this).scrollTop() > 200) {
            $('a.go-top').addClass('view')
        } else {
            $('a.go-top').removeClass('view')
        }
    });
    $('a.go-top').on('click', function(e) {
        $('html, body').stop().animate({
            scrollTop: 0
        }, 1200, 'easeOutExpo')
    });
    $('[data-loading]').each(function(i, element) {
        var $t = $(element),
            _load = $t.attr('data-loading');
        $t.css({
            'position': 'relative'
        });
        var _prepend = '<div class="' + _load + '" style="position: absolute; width: 100px; height: 100px; top: 0; left: 0; right: 0; bottom: 0; margin: auto;"><div class="loader" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; margin: auto;">';
        if (_load == "ball-chasing" || _load == "ball-pulse-double") _prepend += '<div class="ball-1"></div><div class="ball-2"></div></div></div>';
        else if (_load == "ball-pulse") _prepend += '<div class="ball"></div></div></div>';
        else if (_load == "wave" || _load == "wave-spread") _prepend += '<div class="line-1"></div><div class="line-2"></div><div class="line-3"></div><div class="line-4"></div><div class="line-5"></div></div></div>';
        else if (_load == "circle-pulse") _prepend += '<div class="circle"></div></div></div>';
        else if (_load == "circle-pulse-multiple") _prepend += '<div class="circle-1"></div><div class="circle-2"></div><div class="circle-3"></div></div></div>';
        else if (_load == "arc-rotate-double") _prepend += '<div class="arc-1"></div><div class="arc-2"></div></div></div>';
        else if (_load == "arc-rotate" || _load == "arc-rotate2" || _load == "arc-scale" || _load == "clock") _prepend += '<div class="arc"></div></div></div>';
        else if (_load == "square-split") _prepend += '<div class="square-1"></div><div class="square-2"></div><div class="square-3"></div><div class="square-4"></div></div></div>';
        else if (_load == "square-rotate-3d") _prepend += '<div class="square"></div></div></div>';
        $t.prepend(_prepend)
    });
    $('body').on('click', 'a[href$="#"]', function(e) {
        e.preventDefault()
    });
    $win.on('mousewheel DOMMouseScroll', function(e) {
        $('html, body').stop()
    })
});

function reParallax() {
    $(window).trigger('resize.px.parallax')
}

