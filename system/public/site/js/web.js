function postAndReload(t, e, i) {
    var n = {};
    n[e] = i, $.post(t, n, function () {
        var t = new RegExp("\\?" + e + "=[^&#]+[&#]"), i = new RegExp("[\\?&]" + e + "=[^&#]+"), n = window.location.href, s = n.replace(t, "?").replace(i, "");
        n == s ? window.location.reload(!0) : window.location.replace(s)
    })
}
function isHistoryApiSupported() {
    return window.history && (window.history.replaceState || window.history.pushState || window.history.state)
}
function blank(t) {
    return "undefined" === typeOf(t) || "null" === typeOf(t) || "" === t
}
function isMmDdYyyy(t) {
    return /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/.test(t)
}
function typeOf(t) {
    var e = typeof t;
    return "object" === e && (t ? t instanceof Array && (e = "array") : e = "null"), e
}
function dateDifference(t, e) {
    return blank(t) || blank(e) ? 0 : (e - t) / 864e5
}
function numberWithCommas(t) {
    var e = t.toString().split(".");
    return e[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (e[1] ? "." + e[1] : "")
}
function formatNumber(t) {
    return window.Intl && "object" == typeof window.Intl ? Intl.NumberFormat($("html").attr("lang")).format(t) : numberWithCommas(t)
}
function formatCurrencyNumber(t, e) {
    return window.Intl && "object" == typeof window.Intl ? Intl.NumberFormat($("html").attr("lang"), {
        style: "currency",
        currency: t
    }).format(e) : t + " " + numberWithCommas(e)
}
function getParams(t) {
    var e, i, n = {}, i = t.split("?")[1];
    if (i)for (var e, s = i.split("#")[0].split("&"), a = 0; a < s.length; a++)e = s[a].split("="), n[e[0]] = decodeURIComponent(e[1]);
    return n
}
function getParamValue(t) {
    var e = getParams(window.location.href), i = null;
    return $.each(e, function (e, n) {
        return e === t ? (i = n, !1) : void 0
    }), i
}
function track(t) {
    var e = t.key, i = t.loc, n = t.type || "event", s = t.event || "Click";
    ga("send", n, e, s, i)
}
!function (t, e) {
    "object" == typeof module && "object" == typeof module.exports ? module.exports = t.document ? e(t, !0) : function (t) {
        if (!t.document)throw new Error("jQuery requires a window with a document");
        return e(t)
    } : e(t)
}("undefined" != typeof window ? window : this, function (t, e) {
    function i(t) {
        var e = t.length, i = se.type(t);
        return "function" === i || se.isWindow(t) ? !1 : 1 === t.nodeType && e ? !0 : "array" === i || 0 === e || "number" == typeof e && e > 0 && e - 1 in t
    }

    function n(t, e, i) {
        if (se.isFunction(e))return se.grep(t, function (t, n) {
            return !!e.call(t, n, t) !== i
        });
        if (e.nodeType)return se.grep(t, function (t) {
            return t === e !== i
        });
        if ("string" == typeof e) {
            if (ue.test(e))return se.filter(e, t, i);
            e = se.filter(e, t)
        }
        return se.grep(t, function (t) {
            return se.inArray(t, e) >= 0 !== i
        })
    }

    function s(t, e) {
        do t = t[e]; while (t && 1 !== t.nodeType);
        return t
    }

    function a(t) {
        var e = ye[t] = {};
        return se.each(t.match(be) || [], function (t, i) {
            e[i] = !0
        }), e
    }

    function o() {
        fe.addEventListener ? (fe.removeEventListener("DOMContentLoaded", r, !1), t.removeEventListener("load", r, !1)) : (fe.detachEvent("onreadystatechange", r), t.detachEvent("onload", r))
    }

    function r() {
        (fe.addEventListener || "load" === event.type || "complete" === fe.readyState) && (o(), se.ready())
    }

    function l(t, e, i) {
        if (void 0 === i && 1 === t.nodeType) {
            var n = "data-" + e.replace(Te, "-$1").toLowerCase();
            if (i = t.getAttribute(n), "string" == typeof i) {
                try {
                    i = "true" === i ? !0 : "false" === i ? !1 : "null" === i ? null : +i + "" === i ? +i : De.test(i) ? se.parseJSON(i) : i
                } catch (s) {
                }
                se.data(t, e, i)
            } else i = void 0
        }
        return i
    }

    function h(t) {
        var e;
        for (e in t)if (("data" !== e || !se.isEmptyObject(t[e])) && "toJSON" !== e)return !1;
        return !0
    }

    function c(t, e, i, n) {
        if (se.acceptData(t)) {
            var s, a, o = se.expando, r = t.nodeType, l = r ? se.cache : t, h = r ? t[o] : t[o] && o;
            if (h && l[h] && (n || l[h].data) || void 0 !== i || "string" != typeof e)return h || (h = r ? t[o] = X.pop() || se.guid++ : o), l[h] || (l[h] = r ? {} : {toJSON: se.noop}), ("object" == typeof e || "function" == typeof e) && (n ? l[h] = se.extend(l[h], e) : l[h].data = se.extend(l[h].data, e)), a = l[h], n || (a.data || (a.data = {}), a = a.data), void 0 !== i && (a[se.camelCase(e)] = i), "string" == typeof e ? (s = a[e], null == s && (s = a[se.camelCase(e)])) : s = a, s
        }
    }

    function d(t, e, i) {
        if (se.acceptData(t)) {
            var n, s, a = t.nodeType, o = a ? se.cache : t, r = a ? t[se.expando] : se.expando;
            if (o[r]) {
                if (e && (n = i ? o[r] : o[r].data)) {
                    se.isArray(e) ? e = e.concat(se.map(e, se.camelCase)) : e in n ? e = [e] : (e = se.camelCase(e), e = e in n ? [e] : e.split(" ")), s = e.length;
                    for (; s--;)delete n[e[s]];
                    if (i ? !h(n) : !se.isEmptyObject(n))return
                }
                (i || (delete o[r].data, h(o[r]))) && (a ? se.cleanData([t], !0) : ie.deleteExpando || o != o.window ? delete o[r] : o[r] = null)
            }
        }
    }

    function u() {
        return !0
    }

    function p() {
        return !1
    }

    function f() {
        try {
            return fe.activeElement
        } catch (t) {
        }
    }

    function g(t) {
        var e = Re.split("|"), i = t.createDocumentFragment();
        if (i.createElement)for (; e.length;)i.createElement(e.pop());
        return i
    }

    function m(t, e) {
        var i, n, s = 0, a = typeof t.getElementsByTagName !== Ce ? t.getElementsByTagName(e || "*") : typeof t.querySelectorAll !== Ce ? t.querySelectorAll(e || "*") : void 0;
        if (!a)for (a = [], i = t.childNodes || t; null != (n = i[s]); s++)!e || se.nodeName(n, e) ? a.push(n) : se.merge(a, m(n, e));
        return void 0 === e || e && se.nodeName(t, e) ? se.merge([t], a) : a
    }

    function v(t) {
        Ee.test(t.type) && (t.defaultChecked = t.checked)
    }

    function _(t, e) {
        return se.nodeName(t, "table") && se.nodeName(11 !== e.nodeType ? e : e.firstChild, "tr") ? t.getElementsByTagName("tbody")[0] || t.appendChild(t.ownerDocument.createElement("tbody")) : t
    }

    function b(t) {
        return t.type = (null !== se.find.attr(t, "type")) + "/" + t.type, t
    }

    function y(t) {
        var e = Ve.exec(t.type);
        return e ? t.type = e[1] : t.removeAttribute("type"), t
    }

    function w(t, e) {
        for (var i, n = 0; null != (i = t[n]); n++)se._data(i, "globalEval", !e || se._data(e[n], "globalEval"))
    }

    function x(t, e) {
        if (1 === e.nodeType && se.hasData(t)) {
            var i, n, s, a = se._data(t), o = se._data(e, a), r = a.events;
            if (r) {
                delete o.handle, o.events = {};
                for (i in r)for (n = 0, s = r[i].length; s > n; n++)se.event.add(e, i, r[i][n])
            }
            o.data && (o.data = se.extend({}, o.data))
        }
    }

    function C(t, e) {
        var i, n, s;
        if (1 === e.nodeType) {
            if (i = e.nodeName.toLowerCase(), !ie.noCloneEvent && e[se.expando]) {
                s = se._data(e);
                for (n in s.events)se.removeEvent(e, n, s.handle);
                e.removeAttribute(se.expando)
            }
            "script" === i && e.text !== t.text ? (b(e).text = t.text, y(e)) : "object" === i ? (e.parentNode && (e.outerHTML = t.outerHTML), ie.html5Clone && t.innerHTML && !se.trim(e.innerHTML) && (e.innerHTML = t.innerHTML)) : "input" === i && Ee.test(t.type) ? (e.defaultChecked = e.checked = t.checked, e.value !== t.value && (e.value = t.value)) : "option" === i ? e.defaultSelected = e.selected = t.defaultSelected : ("input" === i || "textarea" === i) && (e.defaultValue = t.defaultValue)
        }
    }

    function D(e, i) {
        var n, s = se(i.createElement(e)).appendTo(i.body), a = t.getDefaultComputedStyle && (n = t.getDefaultComputedStyle(s[0])) ? n.display : se.css(s[0], "display");
        return s.detach(), a
    }

    function T(t) {
        var e = fe, i = Ze[t];
        return i || (i = D(t, e), "none" !== i && i || (Je = (Je || se("<iframe frameborder='0' width='0' height='0'/>")).appendTo(e.documentElement), e = (Je[0].contentWindow || Je[0].contentDocument).document, e.write(), e.close(), i = D(t, e), Je.detach()), Ze[t] = i), i
    }

    function S(t, e) {
        return {
            get: function () {
                var i = t();
                return null != i ? i ? void delete this.get : (this.get = e).apply(this, arguments) : void 0
            }
        }
    }

    function k(t, e) {
        if (e in t)return e;
        for (var i = e.charAt(0).toUpperCase() + e.slice(1), n = e, s = ui.length; s--;)if (e = ui[s] + i, e in t)return e;
        return n
    }

    function I(t, e) {
        for (var i, n, s, a = [], o = 0, r = t.length; r > o; o++)n = t[o], n.style && (a[o] = se._data(n, "olddisplay"), i = n.style.display, e ? (a[o] || "none" !== i || (n.style.display = ""), "" === n.style.display && Ie(n) && (a[o] = se._data(n, "olddisplay", T(n.nodeName)))) : (s = Ie(n), (i && "none" !== i || !s) && se._data(n, "olddisplay", s ? i : se.css(n, "display"))));
        for (o = 0; r > o; o++)n = t[o], n.style && (e && "none" !== n.style.display && "" !== n.style.display || (n.style.display = e ? a[o] || "" : "none"));
        return t
    }

    function P(t, e, i) {
        var n = li.exec(e);
        return n ? Math.max(0, n[1] - (i || 0)) + (n[2] || "px") : e
    }

    function E(t, e, i, n, s) {
        for (var a = i === (n ? "border" : "content") ? 4 : "width" === e ? 1 : 0, o = 0; 4 > a; a += 2)"margin" === i && (o += se.css(t, i + ke[a], !0, s)), n ? ("content" === i && (o -= se.css(t, "padding" + ke[a], !0, s)), "margin" !== i && (o -= se.css(t, "border" + ke[a] + "Width", !0, s))) : (o += se.css(t, "padding" + ke[a], !0, s), "padding" !== i && (o += se.css(t, "border" + ke[a] + "Width", !0, s)));
        return o
    }

    function M(t, e, i) {
        var n = !0, s = "width" === e ? t.offsetWidth : t.offsetHeight, a = ti(t), o = ie.boxSizing && "border-box" === se.css(t, "boxSizing", !1, a);
        if (0 >= s || null == s) {
            if (s = ei(t, e, a), (0 > s || null == s) && (s = t.style[e]), ni.test(s))return s;
            n = o && (ie.boxSizingReliable() || s === t.style[e]), s = parseFloat(s) || 0
        }
        return s + E(t, e, i || (o ? "border" : "content"), n, a) + "px"
    }

    function A(t, e, i, n, s) {
        return new A.prototype.init(t, e, i, n, s)
    }

    function F() {
        return setTimeout(function () {
            pi = void 0
        }), pi = se.now()
    }

    function z(t, e) {
        var i, n = {height: t}, s = 0;
        for (e = e ? 1 : 0; 4 > s; s += 2 - e)i = ke[s], n["margin" + i] = n["padding" + i] = t;
        return e && (n.opacity = n.width = t), n
    }

    function N(t, e, i) {
        for (var n, s = (bi[e] || []).concat(bi["*"]), a = 0, o = s.length; o > a; a++)if (n = s[a].call(i, e, t))return n
    }

    function R(t, e, i) {
        var n, s, a, o, r, l, h, c, d = this, u = {}, p = t.style, f = t.nodeType && Ie(t), g = se._data(t, "fxshow");
        i.queue || (r = se._queueHooks(t, "fx"), null == r.unqueued && (r.unqueued = 0, l = r.empty.fire, r.empty.fire = function () {
            r.unqueued || l()
        }), r.unqueued++, d.always(function () {
            d.always(function () {
                r.unqueued--, se.queue(t, "fx").length || r.empty.fire()
            })
        })), 1 === t.nodeType && ("height"in e || "width"in e) && (i.overflow = [p.overflow, p.overflowX, p.overflowY], h = se.css(t, "display"), c = "none" === h ? se._data(t, "olddisplay") || T(t.nodeName) : h, "inline" === c && "none" === se.css(t, "float") && (ie.inlineBlockNeedsLayout && "inline" !== T(t.nodeName) ? p.zoom = 1 : p.display = "inline-block")), i.overflow && (p.overflow = "hidden", ie.shrinkWrapBlocks() || d.always(function () {
            p.overflow = i.overflow[0], p.overflowX = i.overflow[1], p.overflowY = i.overflow[2]
        }));
        for (n in e)if (s = e[n], gi.exec(s)) {
            if (delete e[n], a = a || "toggle" === s, s === (f ? "hide" : "show")) {
                if ("show" !== s || !g || void 0 === g[n])continue;
                f = !0
            }
            u[n] = g && g[n] || se.style(t, n)
        } else h = void 0;
        if (se.isEmptyObject(u))"inline" === ("none" === h ? T(t.nodeName) : h) && (p.display = h); else {
            g ? "hidden"in g && (f = g.hidden) : g = se._data(t, "fxshow", {}), a && (g.hidden = !f), f ? se(t).show() : d.done(function () {
                se(t).hide()
            }), d.done(function () {
                var e;
                se._removeData(t, "fxshow");
                for (e in u)se.style(t, e, u[e])
            });
            for (n in u)o = N(f ? g[n] : 0, n, d), n in g || (g[n] = o.start, f && (o.end = o.start, o.start = "width" === n || "height" === n ? 1 : 0))
        }
    }

    function H(t, e) {
        var i, n, s, a, o;
        for (i in t)if (n = se.camelCase(i), s = e[n], a = t[i], se.isArray(a) && (s = a[1], a = t[i] = a[0]), i !== n && (t[n] = a, delete t[i]), o = se.cssHooks[n], o && "expand"in o) {
            a = o.expand(a), delete t[n];
            for (i in a)i in t || (t[i] = a[i], e[i] = s)
        } else e[n] = s
    }

    function L(t, e, i) {
        var n, s, a = 0, o = _i.length, r = se.Deferred().always(function () {
            delete l.elem
        }), l = function () {
            if (s)return !1;
            for (var e = pi || F(), i = Math.max(0, h.startTime + h.duration - e), n = i / h.duration || 0, a = 1 - n, o = 0, l = h.tweens.length; l > o; o++)h.tweens[o].run(a);
            return r.notifyWith(t, [h, a, i]), 1 > a && l ? i : (r.resolveWith(t, [h]), !1)
        }, h = r.promise({
            elem: t,
            props: se.extend({}, e),
            opts: se.extend(!0, {specialEasing: {}}, i),
            originalProperties: e,
            originalOptions: i,
            startTime: pi || F(),
            duration: i.duration,
            tweens: [],
            createTween: function (e, i) {
                var n = se.Tween(t, h.opts, e, i, h.opts.specialEasing[e] || h.opts.easing);
                return h.tweens.push(n), n
            },
            stop: function (e) {
                var i = 0, n = e ? h.tweens.length : 0;
                if (s)return this;
                for (s = !0; n > i; i++)h.tweens[i].run(1);
                return e ? r.resolveWith(t, [h, e]) : r.rejectWith(t, [h, e]), this
            }
        }), c = h.props;
        for (H(c, h.opts.specialEasing); o > a; a++)if (n = _i[a].call(h, t, c, h.opts))return n;
        return se.map(c, N, h), se.isFunction(h.opts.start) && h.opts.start.call(t, h), se.fx.timer(se.extend(l, {
            elem: t,
            anim: h,
            queue: h.opts.queue
        })), h.progress(h.opts.progress).done(h.opts.done, h.opts.complete).fail(h.opts.fail).always(h.opts.always)
    }

    function O(t) {
        return function (e, i) {
            "string" != typeof e && (i = e, e = "*");
            var n, s = 0, a = e.toLowerCase().match(be) || [];
            if (se.isFunction(i))for (; n = a[s++];)"+" === n.charAt(0) ? (n = n.slice(1) || "*", (t[n] = t[n] || []).unshift(i)) : (t[n] = t[n] || []).push(i)
        }
    }

    function j(t, e, i, n) {
        function s(r) {
            var l;
            return a[r] = !0, se.each(t[r] || [], function (t, r) {
                var h = r(e, i, n);
                return "string" != typeof h || o || a[h] ? o ? !(l = h) : void 0 : (e.dataTypes.unshift(h), s(h), !1)
            }), l
        }

        var a = {}, o = t === $i;
        return s(e.dataTypes[0]) || !a["*"] && s("*")
    }

    function W(t, e) {
        var i, n, s = se.ajaxSettings.flatOptions || {};
        for (n in e)void 0 !== e[n] && ((s[n] ? t : i || (i = {}))[n] = e[n]);
        return i && se.extend(!0, t, i), t
    }

    function B(t, e, i) {
        for (var n, s, a, o, r = t.contents, l = t.dataTypes; "*" === l[0];)l.shift(), void 0 === s && (s = t.mimeType || e.getResponseHeader("Content-Type"));
        if (s)for (o in r)if (r[o] && r[o].test(s)) {
            l.unshift(o);
            break
        }
        if (l[0]in i)a = l[0]; else {
            for (o in i) {
                if (!l[0] || t.converters[o + " " + l[0]]) {
                    a = o;
                    break
                }
                n || (n = o)
            }
            a = a || n
        }
        return a ? (a !== l[0] && l.unshift(a), i[a]) : void 0
    }

    function $(t, e, i, n) {
        var s, a, o, r, l, h = {}, c = t.dataTypes.slice();
        if (c[1])for (o in t.converters)h[o.toLowerCase()] = t.converters[o];
        for (a = c.shift(); a;)if (t.responseFields[a] && (i[t.responseFields[a]] = e), !l && n && t.dataFilter && (e = t.dataFilter(e, t.dataType)), l = a, a = c.shift())if ("*" === a)a = l; else if ("*" !== l && l !== a) {
            if (o = h[l + " " + a] || h["* " + a], !o)for (s in h)if (r = s.split(" "), r[1] === a && (o = h[l + " " + r[0]] || h["* " + r[0]])) {
                o === !0 ? o = h[s] : h[s] !== !0 && (a = r[0], c.unshift(r[1]));
                break
            }
            if (o !== !0)if (o && t["throws"])e = o(e); else try {
                e = o(e)
            } catch (d) {
                return {state: "parsererror", error: o ? d : "No conversion from " + l + " to " + a}
            }
        }
        return {state: "success", data: e}
    }

    function q(t, e, i, n) {
        var s;
        if (se.isArray(e))se.each(e, function (e, s) {
            i || Vi.test(t) ? n(t, s) : q(t + "[" + ("object" == typeof s ? e : "") + "]", s, i, n)
        }); else if (i || "object" !== se.type(e))n(t, e); else for (s in e)q(t + "[" + s + "]", e[s], i, n)
    }

    function Y() {
        try {
            return new t.XMLHttpRequest
        } catch (e) {
        }
    }

    function U() {
        try {
            return new t.ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {
        }
    }

    function V(t) {
        return se.isWindow(t) ? t : 9 === t.nodeType ? t.defaultView || t.parentWindow : !1
    }

    var X = [], K = X.slice, Q = X.concat, G = X.push, J = X.indexOf, Z = {}, te = Z.toString, ee = Z.hasOwnProperty, ie = {}, ne = "1.11.1", se = function (t, e) {
        return new se.fn.init(t, e)
    }, ae = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, oe = /^-ms-/, re = /-([\da-z])/gi, le = function (t, e) {
        return e.toUpperCase()
    };
    se.fn = se.prototype = {
        jquery: ne, constructor: se, selector: "", length: 0, toArray: function () {
            return K.call(this)
        }, get: function (t) {
            return null != t ? 0 > t ? this[t + this.length] : this[t] : K.call(this)
        }, pushStack: function (t) {
            var e = se.merge(this.constructor(), t);
            return e.prevObject = this, e.context = this.context, e
        }, each: function (t, e) {
            return se.each(this, t, e)
        }, map: function (t) {
            return this.pushStack(se.map(this, function (e, i) {
                return t.call(e, i, e)
            }))
        }, slice: function () {
            return this.pushStack(K.apply(this, arguments))
        }, first: function () {
            return this.eq(0)
        }, last: function () {
            return this.eq(-1)
        }, eq: function (t) {
            var e = this.length, i = +t + (0 > t ? e : 0);
            return this.pushStack(i >= 0 && e > i ? [this[i]] : [])
        }, end: function () {
            return this.prevObject || this.constructor(null)
        }, push: G, sort: X.sort, splice: X.splice
    }, se.extend = se.fn.extend = function () {
        var t, e, i, n, s, a, o = arguments[0] || {}, r = 1, l = arguments.length, h = !1;
        for ("boolean" == typeof o && (h = o, o = arguments[r] || {}, r++), "object" == typeof o || se.isFunction(o) || (o = {}), r === l && (o = this, r--); l > r; r++)if (null != (s = arguments[r]))for (n in s)t = o[n], i = s[n], o !== i && (h && i && (se.isPlainObject(i) || (e = se.isArray(i))) ? (e ? (e = !1, a = t && se.isArray(t) ? t : []) : a = t && se.isPlainObject(t) ? t : {}, o[n] = se.extend(h, a, i)) : void 0 !== i && (o[n] = i));
        return o
    }, se.extend({
        expando: "jQuery" + (ne + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (t) {
            throw new Error(t)
        }, noop: function () {
        }, isFunction: function (t) {
            return "function" === se.type(t)
        }, isArray: Array.isArray || function (t) {
            return "array" === se.type(t)
        }, isWindow: function (t) {
            return null != t && t == t.window
        }, isNumeric: function (t) {
            return !se.isArray(t) && t - parseFloat(t) >= 0
        }, isEmptyObject: function (t) {
            var e;
            for (e in t)return !1;
            return !0
        }, isPlainObject: function (t) {
            var e;
            if (!t || "object" !== se.type(t) || t.nodeType || se.isWindow(t))return !1;
            try {
                if (t.constructor && !ee.call(t, "constructor") && !ee.call(t.constructor.prototype, "isPrototypeOf"))return !1
            } catch (i) {
                return !1
            }
            if (ie.ownLast)for (e in t)return ee.call(t, e);
            for (e in t);
            return void 0 === e || ee.call(t, e)
        }, type: function (t) {
            return null == t ? t + "" : "object" == typeof t || "function" == typeof t ? Z[te.call(t)] || "object" : typeof t
        }, globalEval: function (e) {
            e && se.trim(e) && (t.execScript || function (e) {
                t.eval.call(t, e)
            })(e)
        }, camelCase: function (t) {
            return t.replace(oe, "ms-").replace(re, le)
        }, nodeName: function (t, e) {
            return t.nodeName && t.nodeName.toLowerCase() === e.toLowerCase()
        }, each: function (t, e, n) {
            var s, a = 0, o = t.length, r = i(t);
            if (n) {
                if (r)for (; o > a && (s = e.apply(t[a], n), s !== !1); a++); else for (a in t)if (s = e.apply(t[a], n), s === !1)break
            } else if (r)for (; o > a && (s = e.call(t[a], a, t[a]), s !== !1); a++); else for (a in t)if (s = e.call(t[a], a, t[a]), s === !1)break;
            return t
        }, trim: function (t) {
            return null == t ? "" : (t + "").replace(ae, "")
        }, makeArray: function (t, e) {
            var n = e || [];
            return null != t && (i(Object(t)) ? se.merge(n, "string" == typeof t ? [t] : t) : G.call(n, t)), n
        }, inArray: function (t, e, i) {
            var n;
            if (e) {
                if (J)return J.call(e, t, i);
                for (n = e.length, i = i ? 0 > i ? Math.max(0, n + i) : i : 0; n > i; i++)if (i in e && e[i] === t)return i
            }
            return -1
        }, merge: function (t, e) {
            for (var i = +e.length, n = 0, s = t.length; i > n;)t[s++] = e[n++];
            if (i !== i)for (; void 0 !== e[n];)t[s++] = e[n++];
            return t.length = s, t
        }, grep: function (t, e, i) {
            for (var n, s = [], a = 0, o = t.length, r = !i; o > a; a++)n = !e(t[a], a), n !== r && s.push(t[a]);
            return s
        }, map: function (t, e, n) {
            var s, a = 0, o = t.length, r = i(t), l = [];
            if (r)for (; o > a; a++)s = e(t[a], a, n), null != s && l.push(s); else for (a in t)s = e(t[a], a, n), null != s && l.push(s);
            return Q.apply([], l)
        }, guid: 1, proxy: function (t, e) {
            var i, n, s;
            return "string" == typeof e && (s = t[e], e = t, t = s), se.isFunction(t) ? (i = K.call(arguments, 2), n = function () {
                return t.apply(e || this, i.concat(K.call(arguments)))
            }, n.guid = t.guid = t.guid || se.guid++, n) : void 0
        }, now: function () {
            return +new Date
        }, support: ie
    }), se.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function (t, e) {
        Z["[object " + e + "]"] = e.toLowerCase()
    });
    var he = function (t) {
        function e(t, e, i, n) {
            var s, a, o, r, l, h, d, p, f, g;
            if ((e ? e.ownerDocument || e : j) !== A && M(e), e = e || A, i = i || [], !t || "string" != typeof t)return i;
            if (1 !== (r = e.nodeType) && 9 !== r)return [];
            if (z && !n) {
                if (s = _e.exec(t))if (o = s[1]) {
                    if (9 === r) {
                        if (a = e.getElementById(o), !a || !a.parentNode)return i;
                        if (a.id === o)return i.push(a), i
                    } else if (e.ownerDocument && (a = e.ownerDocument.getElementById(o)) && L(e, a) && a.id === o)return i.push(a), i
                } else {
                    if (s[2])return Z.apply(i, e.getElementsByTagName(t)), i;
                    if ((o = s[3]) && w.getElementsByClassName && e.getElementsByClassName)return Z.apply(i, e.getElementsByClassName(o)), i
                }
                if (w.qsa && (!N || !N.test(t))) {
                    if (p = d = O, f = e, g = 9 === r && t, 1 === r && "object" !== e.nodeName.toLowerCase()) {
                        for (h = T(t), (d = e.getAttribute("id")) ? p = d.replace(ye, "\\$&") : e.setAttribute("id", p), p = "[id='" + p + "'] ", l = h.length; l--;)h[l] = p + u(h[l]);
                        f = be.test(t) && c(e.parentNode) || e, g = h.join(",")
                    }
                    if (g)try {
                        return Z.apply(i, f.querySelectorAll(g)), i
                    } catch (m) {
                    } finally {
                        d || e.removeAttribute("id")
                    }
                }
            }
            return k(t.replace(le, "$1"), e, i, n)
        }

        function i() {
            function t(i, n) {
                return e.push(i + " ") > x.cacheLength && delete t[e.shift()], t[i + " "] = n
            }

            var e = [];
            return t
        }

        function n(t) {
            return t[O] = !0, t
        }

        function s(t) {
            var e = A.createElement("div");
            try {
                return !!t(e)
            } catch (i) {
                return !1
            } finally {
                e.parentNode && e.parentNode.removeChild(e), e = null
            }
        }

        function a(t, e) {
            for (var i = t.split("|"), n = t.length; n--;)x.attrHandle[i[n]] = e
        }

        function o(t, e) {
            var i = e && t, n = i && 1 === t.nodeType && 1 === e.nodeType && (~e.sourceIndex || X) - (~t.sourceIndex || X);
            if (n)return n;
            if (i)for (; i = i.nextSibling;)if (i === e)return -1;
            return t ? 1 : -1
        }

        function r(t) {
            return function (e) {
                var i = e.nodeName.toLowerCase();
                return "input" === i && e.type === t
            }
        }

        function l(t) {
            return function (e) {
                var i = e.nodeName.toLowerCase();
                return ("input" === i || "button" === i) && e.type === t
            }
        }

        function h(t) {
            return n(function (e) {
                return e = +e, n(function (i, n) {
                    for (var s, a = t([], i.length, e), o = a.length; o--;)i[s = a[o]] && (i[s] = !(n[s] = i[s]))
                })
            })
        }

        function c(t) {
            return t && typeof t.getElementsByTagName !== V && t
        }

        function d() {
        }

        function u(t) {
            for (var e = 0, i = t.length, n = ""; i > e; e++)n += t[e].value;
            return n
        }

        function p(t, e, i) {
            var n = e.dir, s = i && "parentNode" === n, a = B++;
            return e.first ? function (e, i, a) {
                for (; e = e[n];)if (1 === e.nodeType || s)return t(e, i, a)
            } : function (e, i, o) {
                var r, l, h = [W, a];
                if (o) {
                    for (; e = e[n];)if ((1 === e.nodeType || s) && t(e, i, o))return !0
                } else for (; e = e[n];)if (1 === e.nodeType || s) {
                    if (l = e[O] || (e[O] = {}), (r = l[n]) && r[0] === W && r[1] === a)return h[2] = r[2];
                    if (l[n] = h, h[2] = t(e, i, o))return !0
                }
            }
        }

        function f(t) {
            return t.length > 1 ? function (e, i, n) {
                for (var s = t.length; s--;)if (!t[s](e, i, n))return !1;
                return !0
            } : t[0]
        }

        function g(t, i, n) {
            for (var s = 0, a = i.length; a > s; s++)e(t, i[s], n);
            return n
        }

        function m(t, e, i, n, s) {
            for (var a, o = [], r = 0, l = t.length, h = null != e; l > r; r++)(a = t[r]) && (!i || i(a, n, s)) && (o.push(a), h && e.push(r));
            return o
        }

        function v(t, e, i, s, a, o) {
            return s && !s[O] && (s = v(s)), a && !a[O] && (a = v(a, o)), n(function (n, o, r, l) {
                var h, c, d, u = [], p = [], f = o.length, v = n || g(e || "*", r.nodeType ? [r] : r, []), _ = !t || !n && e ? v : m(v, u, t, r, l), b = i ? a || (n ? t : f || s) ? [] : o : _;
                if (i && i(_, b, r, l), s)for (h = m(b, p), s(h, [], r, l), c = h.length; c--;)(d = h[c]) && (b[p[c]] = !(_[p[c]] = d));
                if (n) {
                    if (a || t) {
                        if (a) {
                            for (h = [], c = b.length; c--;)(d = b[c]) && h.push(_[c] = d);
                            a(null, b = [], h, l)
                        }
                        for (c = b.length; c--;)(d = b[c]) && (h = a ? ee.call(n, d) : u[c]) > -1 && (n[h] = !(o[h] = d))
                    }
                } else b = m(b === o ? b.splice(f, b.length) : b), a ? a(null, o, b, l) : Z.apply(o, b)
            })
        }

        function _(t) {
            for (var e, i, n, s = t.length, a = x.relative[t[0].type], o = a || x.relative[" "], r = a ? 1 : 0, l = p(function (t) {
                return t === e
            }, o, !0), h = p(function (t) {
                return ee.call(e, t) > -1
            }, o, !0), c = [function (t, i, n) {
                return !a && (n || i !== I) || ((e = i).nodeType ? l(t, i, n) : h(t, i, n))
            }]; s > r; r++)if (i = x.relative[t[r].type])c = [p(f(c), i)]; else {
                if (i = x.filter[t[r].type].apply(null, t[r].matches), i[O]) {
                    for (n = ++r; s > n && !x.relative[t[n].type]; n++);
                    return v(r > 1 && f(c), r > 1 && u(t.slice(0, r - 1).concat({value: " " === t[r - 2].type ? "*" : ""})).replace(le, "$1"), i, n > r && _(t.slice(r, n)), s > n && _(t = t.slice(n)), s > n && u(t))
                }
                c.push(i)
            }
            return f(c)
        }

        function b(t, i) {
            var s = i.length > 0, a = t.length > 0, o = function (n, o, r, l, h) {
                var c, d, u, p = 0, f = "0", g = n && [], v = [], _ = I, b = n || a && x.find.TAG("*", h), y = W += null == _ ? 1 : Math.random() || .1, w = b.length;
                for (h && (I = o !== A && o); f !== w && null != (c = b[f]); f++) {
                    if (a && c) {
                        for (d = 0; u = t[d++];)if (u(c, o, r)) {
                            l.push(c);
                            break
                        }
                        h && (W = y)
                    }
                    s && ((c = !u && c) && p--, n && g.push(c))
                }
                if (p += f, s && f !== p) {
                    for (d = 0; u = i[d++];)u(g, v, o, r);
                    if (n) {
                        if (p > 0)for (; f--;)g[f] || v[f] || (v[f] = G.call(l));
                        v = m(v)
                    }
                    Z.apply(l, v), h && !n && v.length > 0 && p + i.length > 1 && e.uniqueSort(l)
                }
                return h && (W = y, I = _), g
            };
            return s ? n(o) : o
        }

        var y, w, x, C, D, T, S, k, I, P, E, M, A, F, z, N, R, H, L, O = "sizzle" + -new Date, j = t.document, W = 0, B = 0, $ = i(), q = i(), Y = i(), U = function (t, e) {
            return t === e && (E = !0), 0
        }, V = "undefined", X = 1 << 31, K = {}.hasOwnProperty, Q = [], G = Q.pop, J = Q.push, Z = Q.push, te = Q.slice, ee = Q.indexOf || function (t) {
                for (var e = 0, i = this.length; i > e; e++)if (this[e] === t)return e;
                return -1
            }, ie = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped", ne = "[\\x20\\t\\r\\n\\f]", se = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+", ae = se.replace("w", "w#"), oe = "\\[" + ne + "*(" + se + ")(?:" + ne + "*([*^$|!~]?=)" + ne + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + ae + "))|)" + ne + "*\\]", re = ":(" + se + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + oe + ")*)|.*)\\)|)", le = new RegExp("^" + ne + "+|((?:^|[^\\\\])(?:\\\\.)*)" + ne + "+$", "g"), he = new RegExp("^" + ne + "*," + ne + "*"), ce = new RegExp("^" + ne + "*([>+~]|" + ne + ")" + ne + "*"), de = new RegExp("=" + ne + "*([^\\]'\"]*?)" + ne + "*\\]", "g"), ue = new RegExp(re), pe = new RegExp("^" + ae + "$"), fe = {
            ID: new RegExp("^#(" + se + ")"),
            CLASS: new RegExp("^\\.(" + se + ")"),
            TAG: new RegExp("^(" + se.replace("w", "w*") + ")"),
            ATTR: new RegExp("^" + oe),
            PSEUDO: new RegExp("^" + re),
            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + ne + "*(even|odd|(([+-]|)(\\d*)n|)" + ne + "*(?:([+-]|)" + ne + "*(\\d+)|))" + ne + "*\\)|)", "i"),
            bool: new RegExp("^(?:" + ie + ")$", "i"),
            needsContext: new RegExp("^" + ne + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + ne + "*((?:-\\d)?\\d*)" + ne + "*\\)|)(?=[^-]|$)", "i")
        }, ge = /^(?:input|select|textarea|button)$/i, me = /^h\d$/i, ve = /^[^{]+\{\s*\[native \w/, _e = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, be = /[+~]/, ye = /'|\\/g, we = new RegExp("\\\\([\\da-f]{1,6}" + ne + "?|(" + ne + ")|.)", "ig"), xe = function (t, e, i) {
            var n = "0x" + e - 65536;
            return n !== n || i ? e : 0 > n ? String.fromCharCode(n + 65536) : String.fromCharCode(55296 | n >> 10, 56320 | 1023 & n)
        };
        try {
            Z.apply(Q = te.call(j.childNodes), j.childNodes), Q[j.childNodes.length].nodeType
        } catch (Ce) {
            Z = {
                apply: Q.length ? function (t, e) {
                    J.apply(t, te.call(e))
                } : function (t, e) {
                    for (var i = t.length, n = 0; t[i++] = e[n++];);
                    t.length = i - 1
                }
            }
        }
        w = e.support = {}, D = e.isXML = function (t) {
            var e = t && (t.ownerDocument || t).documentElement;
            return e ? "HTML" !== e.nodeName : !1
        }, M = e.setDocument = function (t) {
            var e, i = t ? t.ownerDocument || t : j, n = i.defaultView;
            return i !== A && 9 === i.nodeType && i.documentElement ? (A = i, F = i.documentElement, z = !D(i), n && n !== n.top && (n.addEventListener ? n.addEventListener("unload", function () {
                M()
            }, !1) : n.attachEvent && n.attachEvent("onunload", function () {
                M()
            })), w.attributes = s(function (t) {
                return t.className = "i", !t.getAttribute("className")
            }), w.getElementsByTagName = s(function (t) {
                return t.appendChild(i.createComment("")), !t.getElementsByTagName("*").length
            }), w.getElementsByClassName = ve.test(i.getElementsByClassName) && s(function (t) {
                    return t.innerHTML = "<div class='a'></div><div class='a i'></div>", t.firstChild.className = "i", 2 === t.getElementsByClassName("i").length
                }), w.getById = s(function (t) {
                return F.appendChild(t).id = O, !i.getElementsByName || !i.getElementsByName(O).length
            }), w.getById ? (x.find.ID = function (t, e) {
                if (typeof e.getElementById !== V && z) {
                    var i = e.getElementById(t);
                    return i && i.parentNode ? [i] : []
                }
            }, x.filter.ID = function (t) {
                var e = t.replace(we, xe);
                return function (t) {
                    return t.getAttribute("id") === e
                }
            }) : (delete x.find.ID, x.filter.ID = function (t) {
                var e = t.replace(we, xe);
                return function (t) {
                    var i = typeof t.getAttributeNode !== V && t.getAttributeNode("id");
                    return i && i.value === e
                }
            }), x.find.TAG = w.getElementsByTagName ? function (t, e) {
                return typeof e.getElementsByTagName !== V ? e.getElementsByTagName(t) : void 0
            } : function (t, e) {
                var i, n = [], s = 0, a = e.getElementsByTagName(t);
                if ("*" === t) {
                    for (; i = a[s++];)1 === i.nodeType && n.push(i);
                    return n
                }
                return a
            }, x.find.CLASS = w.getElementsByClassName && function (t, e) {
                    return typeof e.getElementsByClassName !== V && z ? e.getElementsByClassName(t) : void 0
                }, R = [], N = [], (w.qsa = ve.test(i.querySelectorAll)) && (s(function (t) {
                t.innerHTML = "<select msallowclip=''><option selected=''></option></select>", t.querySelectorAll("[msallowclip^='']").length && N.push("[*^$]=" + ne + "*(?:''|\"\")"), t.querySelectorAll("[selected]").length || N.push("\\[" + ne + "*(?:value|" + ie + ")"), t.querySelectorAll(":checked").length || N.push(":checked")
            }), s(function (t) {
                var e = i.createElement("input");
                e.setAttribute("type", "hidden"), t.appendChild(e).setAttribute("name", "D"), t.querySelectorAll("[name=d]").length && N.push("name" + ne + "*[*^$|!~]?="), t.querySelectorAll(":enabled").length || N.push(":enabled", ":disabled"), t.querySelectorAll("*,:x"), N.push(",.*:")
            })), (w.matchesSelector = ve.test(H = F.matches || F.webkitMatchesSelector || F.mozMatchesSelector || F.oMatchesSelector || F.msMatchesSelector)) && s(function (t) {
                w.disconnectedMatch = H.call(t, "div"), H.call(t, "[s!='']:x"), R.push("!=", re)
            }), N = N.length && new RegExp(N.join("|")), R = R.length && new RegExp(R.join("|")), e = ve.test(F.compareDocumentPosition), L = e || ve.test(F.contains) ? function (t, e) {
                var i = 9 === t.nodeType ? t.documentElement : t, n = e && e.parentNode;
                return t === n || !(!n || 1 !== n.nodeType || !(i.contains ? i.contains(n) : t.compareDocumentPosition && 16 & t.compareDocumentPosition(n)))
            } : function (t, e) {
                if (e)for (; e = e.parentNode;)if (e === t)return !0;
                return !1
            }, U = e ? function (t, e) {
                if (t === e)return E = !0, 0;
                var n = !t.compareDocumentPosition - !e.compareDocumentPosition;
                return n ? n : (n = (t.ownerDocument || t) === (e.ownerDocument || e) ? t.compareDocumentPosition(e) : 1, 1 & n || !w.sortDetached && e.compareDocumentPosition(t) === n ? t === i || t.ownerDocument === j && L(j, t) ? -1 : e === i || e.ownerDocument === j && L(j, e) ? 1 : P ? ee.call(P, t) - ee.call(P, e) : 0 : 4 & n ? -1 : 1)
            } : function (t, e) {
                if (t === e)return E = !0, 0;
                var n, s = 0, a = t.parentNode, r = e.parentNode, l = [t], h = [e];
                if (!a || !r)return t === i ? -1 : e === i ? 1 : a ? -1 : r ? 1 : P ? ee.call(P, t) - ee.call(P, e) : 0;
                if (a === r)return o(t, e);
                for (n = t; n = n.parentNode;)l.unshift(n);
                for (n = e; n = n.parentNode;)h.unshift(n);
                for (; l[s] === h[s];)s++;
                return s ? o(l[s], h[s]) : l[s] === j ? -1 : h[s] === j ? 1 : 0
            }, i) : A
        }, e.matches = function (t, i) {
            return e(t, null, null, i)
        }, e.matchesSelector = function (t, i) {
            if ((t.ownerDocument || t) !== A && M(t), i = i.replace(de, "='$1']"), !(!w.matchesSelector || !z || R && R.test(i) || N && N.test(i)))try {
                var n = H.call(t, i);
                if (n || w.disconnectedMatch || t.document && 11 !== t.document.nodeType)return n
            } catch (s) {
            }
            return e(i, A, null, [t]).length > 0
        }, e.contains = function (t, e) {
            return (t.ownerDocument || t) !== A && M(t), L(t, e)
        }, e.attr = function (t, e) {
            (t.ownerDocument || t) !== A && M(t);
            var i = x.attrHandle[e.toLowerCase()], n = i && K.call(x.attrHandle, e.toLowerCase()) ? i(t, e, !z) : void 0;
            return void 0 !== n ? n : w.attributes || !z ? t.getAttribute(e) : (n = t.getAttributeNode(e)) && n.specified ? n.value : null
        }, e.error = function (t) {
            throw new Error("Syntax error, unrecognized expression: " + t)
        }, e.uniqueSort = function (t) {
            var e, i = [], n = 0, s = 0;
            if (E = !w.detectDuplicates, P = !w.sortStable && t.slice(0), t.sort(U), E) {
                for (; e = t[s++];)e === t[s] && (n = i.push(s));
                for (; n--;)t.splice(i[n], 1)
            }
            return P = null, t
        }, C = e.getText = function (t) {
            var e, i = "", n = 0, s = t.nodeType;
            if (s) {
                if (1 === s || 9 === s || 11 === s) {
                    if ("string" == typeof t.textContent)return t.textContent;
                    for (t = t.firstChild; t; t = t.nextSibling)i += C(t)
                } else if (3 === s || 4 === s)return t.nodeValue
            } else for (; e = t[n++];)i += C(e);
            return i
        }, x = e.selectors = {
            cacheLength: 50,
            createPseudo: n,
            match: fe,
            attrHandle: {},
            find: {},
            relative: {
                ">": {dir: "parentNode", first: !0},
                " ": {dir: "parentNode"},
                "+": {dir: "previousSibling", first: !0},
                "~": {dir: "previousSibling"}
            },
            preFilter: {
                ATTR: function (t) {
                    return t[1] = t[1].replace(we, xe), t[3] = (t[3] || t[4] || t[5] || "").replace(we, xe), "~=" === t[2] && (t[3] = " " + t[3] + " "), t.slice(0, 4)
                }, CHILD: function (t) {
                    return t[1] = t[1].toLowerCase(), "nth" === t[1].slice(0, 3) ? (t[3] || e.error(t[0]), t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])), t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && e.error(t[0]), t
                }, PSEUDO: function (t) {
                    var e, i = !t[6] && t[2];
                    return fe.CHILD.test(t[0]) ? null : (t[3] ? t[2] = t[4] || t[5] || "" : i && ue.test(i) && (e = T(i, !0)) && (e = i.indexOf(")", i.length - e) - i.length) && (t[0] = t[0].slice(0, e), t[2] = i.slice(0, e)), t.slice(0, 3))
                }
            },
            filter: {
                TAG: function (t) {
                    var e = t.replace(we, xe).toLowerCase();
                    return "*" === t ? function () {
                        return !0
                    } : function (t) {
                        return t.nodeName && t.nodeName.toLowerCase() === e
                    }
                }, CLASS: function (t) {
                    var e = $[t + " "];
                    return e || (e = new RegExp("(^|" + ne + ")" + t + "(" + ne + "|$)")) && $(t, function (t) {
                            return e.test("string" == typeof t.className && t.className || typeof t.getAttribute !== V && t.getAttribute("class") || "")
                        })
                }, ATTR: function (t, i, n) {
                    return function (s) {
                        var a = e.attr(s, t);
                        return null == a ? "!=" === i : i ? (a += "", "=" === i ? a === n : "!=" === i ? a !== n : "^=" === i ? n && 0 === a.indexOf(n) : "*=" === i ? n && a.indexOf(n) > -1 : "$=" === i ? n && a.slice(-n.length) === n : "~=" === i ? (" " + a + " ").indexOf(n) > -1 : "|=" === i ? a === n || a.slice(0, n.length + 1) === n + "-" : !1) : !0
                    }
                }, CHILD: function (t, e, i, n, s) {
                    var a = "nth" !== t.slice(0, 3), o = "last" !== t.slice(-4), r = "of-type" === e;
                    return 1 === n && 0 === s ? function (t) {
                        return !!t.parentNode
                    } : function (e, i, l) {
                        var h, c, d, u, p, f, g = a !== o ? "nextSibling" : "previousSibling", m = e.parentNode, v = r && e.nodeName.toLowerCase(), _ = !l && !r;
                        if (m) {
                            if (a) {
                                for (; g;) {
                                    for (d = e; d = d[g];)if (r ? d.nodeName.toLowerCase() === v : 1 === d.nodeType)return !1;
                                    f = g = "only" === t && !f && "nextSibling"
                                }
                                return !0
                            }
                            if (f = [o ? m.firstChild : m.lastChild], o && _) {
                                for (c = m[O] || (m[O] = {}), h = c[t] || [], p = h[0] === W && h[1], u = h[0] === W && h[2], d = p && m.childNodes[p]; d = ++p && d && d[g] || (u = p = 0) || f.pop();)if (1 === d.nodeType && ++u && d === e) {
                                    c[t] = [W, p, u];
                                    break
                                }
                            } else if (_ && (h = (e[O] || (e[O] = {}))[t]) && h[0] === W)u = h[1]; else for (; (d = ++p && d && d[g] || (u = p = 0) || f.pop()) && ((r ? d.nodeName.toLowerCase() !== v : 1 !== d.nodeType) || !++u || (_ && ((d[O] || (d[O] = {}))[t] = [W, u]), d !== e)););
                            return u -= s, u === n || 0 === u % n && u / n >= 0
                        }
                    }
                }, PSEUDO: function (t, i) {
                    var s, a = x.pseudos[t] || x.setFilters[t.toLowerCase()] || e.error("unsupported pseudo: " + t);
                    return a[O] ? a(i) : a.length > 1 ? (s = [t, t, "", i], x.setFilters.hasOwnProperty(t.toLowerCase()) ? n(function (t, e) {
                        for (var n, s = a(t, i), o = s.length; o--;)n = ee.call(t, s[o]), t[n] = !(e[n] = s[o])
                    }) : function (t) {
                        return a(t, 0, s)
                    }) : a
                }
            },
            pseudos: {
                not: n(function (t) {
                    var e = [], i = [], s = S(t.replace(le, "$1"));
                    return s[O] ? n(function (t, e, i, n) {
                        for (var a, o = s(t, null, n, []), r = t.length; r--;)(a = o[r]) && (t[r] = !(e[r] = a))
                    }) : function (t, n, a) {
                        return e[0] = t, s(e, null, a, i), !i.pop()
                    }
                }), has: n(function (t) {
                    return function (i) {
                        return e(t, i).length > 0
                    }
                }), contains: n(function (t) {
                    return function (e) {
                        return (e.textContent || e.innerText || C(e)).indexOf(t) > -1
                    }
                }), lang: n(function (t) {
                    return pe.test(t || "") || e.error("unsupported lang: " + t), t = t.replace(we, xe).toLowerCase(), function (e) {
                        var i;
                        do if (i = z ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang"))return i = i.toLowerCase(), i === t || 0 === i.indexOf(t + "-"); while ((e = e.parentNode) && 1 === e.nodeType);
                        return !1
                    }
                }), target: function (e) {
                    var i = t.location && t.location.hash;
                    return i && i.slice(1) === e.id
                }, root: function (t) {
                    return t === F
                }, focus: function (t) {
                    return t === A.activeElement && (!A.hasFocus || A.hasFocus()) && !!(t.type || t.href || ~t.tabIndex)
                }, enabled: function (t) {
                    return t.disabled === !1
                }, disabled: function (t) {
                    return t.disabled === !0
                }, checked: function (t) {
                    var e = t.nodeName.toLowerCase();
                    return "input" === e && !!t.checked || "option" === e && !!t.selected
                }, selected: function (t) {
                    return t.parentNode && t.parentNode.selectedIndex, t.selected === !0
                }, empty: function (t) {
                    for (t = t.firstChild; t; t = t.nextSibling)if (t.nodeType < 6)return !1;
                    return !0
                }, parent: function (t) {
                    return !x.pseudos.empty(t)
                }, header: function (t) {
                    return me.test(t.nodeName)
                }, input: function (t) {
                    return ge.test(t.nodeName)
                }, button: function (t) {
                    var e = t.nodeName.toLowerCase();
                    return "input" === e && "button" === t.type || "button" === e
                }, text: function (t) {
                    var e;
                    return "input" === t.nodeName.toLowerCase() && "text" === t.type && (null == (e = t.getAttribute("type")) || "text" === e.toLowerCase())
                }, first: h(function () {
                    return [0]
                }), last: h(function (t, e) {
                    return [e - 1]
                }), eq: h(function (t, e, i) {
                    return [0 > i ? i + e : i]
                }), even: h(function (t, e) {
                    for (var i = 0; e > i; i += 2)t.push(i);
                    return t
                }), odd: h(function (t, e) {
                    for (var i = 1; e > i; i += 2)t.push(i);
                    return t
                }), lt: h(function (t, e, i) {
                    for (var n = 0 > i ? i + e : i; --n >= 0;)t.push(n);
                    return t
                }), gt: h(function (t, e, i) {
                    for (var n = 0 > i ? i + e : i; ++n < e;)t.push(n);
                    return t
                })
            }
        }, x.pseudos.nth = x.pseudos.eq;
        for (y in{radio: !0, checkbox: !0, file: !0, password: !0, image: !0})x.pseudos[y] = r(y);
        for (y in{submit: !0, reset: !0})x.pseudos[y] = l(y);
        return d.prototype = x.filters = x.pseudos, x.setFilters = new d, T = e.tokenize = function (t, i) {
            var n, s, a, o, r, l, h, c = q[t + " "];
            if (c)return i ? 0 : c.slice(0);
            for (r = t, l = [], h = x.preFilter; r;) {
                (!n || (s = he.exec(r))) && (s && (r = r.slice(s[0].length) || r), l.push(a = [])), n = !1, (s = ce.exec(r)) && (n = s.shift(), a.push({
                    value: n,
                    type: s[0].replace(le, " ")
                }), r = r.slice(n.length));
                for (o in x.filter)!(s = fe[o].exec(r)) || h[o] && !(s = h[o](s)) || (n = s.shift(), a.push({
                    value: n,
                    type: o,
                    matches: s
                }), r = r.slice(n.length));
                if (!n)break
            }
            return i ? r.length : r ? e.error(t) : q(t, l).slice(0)
        }, S = e.compile = function (t, e) {
            var i, n = [], s = [], a = Y[t + " "];
            if (!a) {
                for (e || (e = T(t)), i = e.length; i--;)a = _(e[i]), a[O] ? n.push(a) : s.push(a);
                a = Y(t, b(s, n)), a.selector = t
            }
            return a
        }, k = e.select = function (t, e, i, n) {
            var s, a, o, r, l, h = "function" == typeof t && t, d = !n && T(t = h.selector || t);
            if (i = i || [], 1 === d.length) {
                if (a = d[0] = d[0].slice(0), a.length > 2 && "ID" === (o = a[0]).type && w.getById && 9 === e.nodeType && z && x.relative[a[1].type]) {
                    if (e = (x.find.ID(o.matches[0].replace(we, xe), e) || [])[0], !e)return i;
                    h && (e = e.parentNode), t = t.slice(a.shift().value.length)
                }
                for (s = fe.needsContext.test(t) ? 0 : a.length; s-- && (o = a[s], !x.relative[r = o.type]);)if ((l = x.find[r]) && (n = l(o.matches[0].replace(we, xe), be.test(a[0].type) && c(e.parentNode) || e))) {
                    if (a.splice(s, 1), t = n.length && u(a), !t)return Z.apply(i, n), i;
                    break
                }
            }
            return (h || S(t, d))(n, e, !z, i, be.test(t) && c(e.parentNode) || e), i
        }, w.sortStable = O.split("").sort(U).join("") === O, w.detectDuplicates = !!E, M(), w.sortDetached = s(function (t) {
            return 1 & t.compareDocumentPosition(A.createElement("div"))
        }), s(function (t) {
            return t.innerHTML = "<a href='#'></a>", "#" === t.firstChild.getAttribute("href")
        }) || a("type|href|height|width", function (t, e, i) {
            return i ? void 0 : t.getAttribute(e, "type" === e.toLowerCase() ? 1 : 2)
        }), w.attributes && s(function (t) {
            return t.innerHTML = "<input/>", t.firstChild.setAttribute("value", ""), "" === t.firstChild.getAttribute("value")
        }) || a("value", function (t, e, i) {
            return i || "input" !== t.nodeName.toLowerCase() ? void 0 : t.defaultValue
        }), s(function (t) {
            return null == t.getAttribute("disabled")
        }) || a(ie, function (t, e, i) {
            var n;
            return i ? void 0 : t[e] === !0 ? e.toLowerCase() : (n = t.getAttributeNode(e)) && n.specified ? n.value : null
        }), e
    }(t);
    se.find = he, se.expr = he.selectors, se.expr[":"] = se.expr.pseudos, se.unique = he.uniqueSort, se.text = he.getText, se.isXMLDoc = he.isXML, se.contains = he.contains;
    var ce = se.expr.match.needsContext, de = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, ue = /^.[^:#\[\.,]*$/;
    se.filter = function (t, e, i) {
        var n = e[0];
        return i && (t = ":not(" + t + ")"), 1 === e.length && 1 === n.nodeType ? se.find.matchesSelector(n, t) ? [n] : [] : se.find.matches(t, se.grep(e, function (t) {
            return 1 === t.nodeType
        }))
    }, se.fn.extend({
        find: function (t) {
            var e, i = [], n = this, s = n.length;
            if ("string" != typeof t)return this.pushStack(se(t).filter(function () {
                for (e = 0; s > e; e++)if (se.contains(n[e], this))return !0
            }));
            for (e = 0; s > e; e++)se.find(t, n[e], i);
            return i = this.pushStack(s > 1 ? se.unique(i) : i), i.selector = this.selector ? this.selector + " " + t : t, i
        }, filter: function (t) {
            return this.pushStack(n(this, t || [], !1))
        }, not: function (t) {
            return this.pushStack(n(this, t || [], !0))
        }, is: function (t) {
            return !!n(this, "string" == typeof t && ce.test(t) ? se(t) : t || [], !1).length
        }
    });
    var pe, fe = t.document, ge = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/, me = se.fn.init = function (t, e) {
        var i, n;
        if (!t)return this;
        if ("string" == typeof t) {
            if (i = "<" === t.charAt(0) && ">" === t.charAt(t.length - 1) && t.length >= 3 ? [null, t, null] : ge.exec(t), !i || !i[1] && e)return !e || e.jquery ? (e || pe).find(t) : this.constructor(e).find(t);
            if (i[1]) {
                if (e = e instanceof se ? e[0] : e, se.merge(this, se.parseHTML(i[1], e && e.nodeType ? e.ownerDocument || e : fe, !0)), de.test(i[1]) && se.isPlainObject(e))for (i in e)se.isFunction(this[i]) ? this[i](e[i]) : this.attr(i, e[i]);
                return this
            }
            if (n = fe.getElementById(i[2]), n && n.parentNode) {
                if (n.id !== i[2])return pe.find(t);
                this.length = 1, this[0] = n
            }
            return this.context = fe, this.selector = t, this
        }
        return t.nodeType ? (this.context = this[0] = t, this.length = 1, this) : se.isFunction(t) ? "undefined" != typeof pe.ready ? pe.ready(t) : t(se) : (void 0 !== t.selector && (this.selector = t.selector, this.context = t.context), se.makeArray(t, this))
    };
    me.prototype = se.fn, pe = se(fe);
    var ve = /^(?:parents|prev(?:Until|All))/, _e = {children: !0, contents: !0, next: !0, prev: !0};
    se.extend({
        dir: function (t, e, i) {
            for (var n = [], s = t[e]; s && 9 !== s.nodeType && (void 0 === i || 1 !== s.nodeType || !se(s).is(i));)1 === s.nodeType && n.push(s), s = s[e];
            return n
        }, sibling: function (t, e) {
            for (var i = []; t; t = t.nextSibling)1 === t.nodeType && t !== e && i.push(t);
            return i
        }
    }), se.fn.extend({
        has: function (t) {
            var e, i = se(t, this), n = i.length;
            return this.filter(function () {
                for (e = 0; n > e; e++)if (se.contains(this, i[e]))return !0
            })
        }, closest: function (t, e) {
            for (var i, n = 0, s = this.length, a = [], o = ce.test(t) || "string" != typeof t ? se(t, e || this.context) : 0; s > n; n++)for (i = this[n]; i && i !== e; i = i.parentNode)if (i.nodeType < 11 && (o ? o.index(i) > -1 : 1 === i.nodeType && se.find.matchesSelector(i, t))) {
                a.push(i);
                break
            }
            return this.pushStack(a.length > 1 ? se.unique(a) : a)
        }, index: function (t) {
            return t ? "string" == typeof t ? se.inArray(this[0], se(t)) : se.inArray(t.jquery ? t[0] : t, this) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
        }, add: function (t, e) {
            return this.pushStack(se.unique(se.merge(this.get(), se(t, e))))
        }, addBack: function (t) {
            return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
        }
    }), se.each({
        parent: function (t) {
            var e = t.parentNode;
            return e && 11 !== e.nodeType ? e : null
        }, parents: function (t) {
            return se.dir(t, "parentNode")
        }, parentsUntil: function (t, e, i) {
            return se.dir(t, "parentNode", i)
        }, next: function (t) {
            return s(t, "nextSibling")
        }, prev: function (t) {
            return s(t, "previousSibling")
        }, nextAll: function (t) {
            return se.dir(t, "nextSibling")
        }, prevAll: function (t) {
            return se.dir(t, "previousSibling")
        }, nextUntil: function (t, e, i) {
            return se.dir(t, "nextSibling", i)
        }, prevUntil: function (t, e, i) {
            return se.dir(t, "previousSibling", i)
        }, siblings: function (t) {
            return se.sibling((t.parentNode || {}).firstChild, t)
        }, children: function (t) {
            return se.sibling(t.firstChild)
        }, contents: function (t) {
            return se.nodeName(t, "iframe") ? t.contentDocument || t.contentWindow.document : se.merge([], t.childNodes)
        }
    }, function (t, e) {
        se.fn[t] = function (i, n) {
            var s = se.map(this, e, i);
            return "Until" !== t.slice(-5) && (n = i), n && "string" == typeof n && (s = se.filter(n, s)), this.length > 1 && (_e[t] || (s = se.unique(s)), ve.test(t) && (s = s.reverse())), this.pushStack(s)
        }
    });
    var be = /\S+/g, ye = {};
    se.Callbacks = function (t) {
        t = "string" == typeof t ? ye[t] || a(t) : se.extend({}, t);
        var e, i, n, s, o, r, l = [], h = !t.once && [], c = function (a) {
            for (i = t.memory && a, n = !0, o = r || 0, r = 0, s = l.length, e = !0; l && s > o; o++)if (l[o].apply(a[0], a[1]) === !1 && t.stopOnFalse) {
                i = !1;
                break
            }
            e = !1, l && (h ? h.length && c(h.shift()) : i ? l = [] : d.disable())
        }, d = {
            add: function () {
                if (l) {
                    var n = l.length;
                    !function a(e) {
                        se.each(e, function (e, i) {
                            var n = se.type(i);
                            "function" === n ? t.unique && d.has(i) || l.push(i) : i && i.length && "string" !== n && a(i)
                        })
                    }(arguments), e ? s = l.length : i && (r = n, c(i))
                }
                return this
            }, remove: function () {
                return l && se.each(arguments, function (t, i) {
                    for (var n; (n = se.inArray(i, l, n)) > -1;)l.splice(n, 1), e && (s >= n && s--, o >= n && o--)
                }), this
            }, has: function (t) {
                return t ? se.inArray(t, l) > -1 : !(!l || !l.length)
            }, empty: function () {
                return l = [], s = 0, this
            }, disable: function () {
                return l = h = i = void 0, this
            }, disabled: function () {
                return !l
            }, lock: function () {
                return h = void 0, i || d.disable(), this
            }, locked: function () {
                return !h
            }, fireWith: function (t, i) {
                return !l || n && !h || (i = i || [], i = [t, i.slice ? i.slice() : i], e ? h.push(i) : c(i)), this
            }, fire: function () {
                return d.fireWith(this, arguments), this
            }, fired: function () {
                return !!n
            }
        };
        return d
    }, se.extend({
        Deferred: function (t) {
            var e = [["resolve", "done", se.Callbacks("once memory"), "resolved"], ["reject", "fail", se.Callbacks("once memory"), "rejected"], ["notify", "progress", se.Callbacks("memory")]], i = "pending", n = {
                state: function () {
                    return i
                }, always: function () {
                    return s.done(arguments).fail(arguments), this
                }, then: function () {
                    var t = arguments;
                    return se.Deferred(function (i) {
                        se.each(e, function (e, a) {
                            var o = se.isFunction(t[e]) && t[e];
                            s[a[1]](function () {
                                var t = o && o.apply(this, arguments);
                                t && se.isFunction(t.promise) ? t.promise().done(i.resolve).fail(i.reject).progress(i.notify) : i[a[0] + "With"](this === n ? i.promise() : this, o ? [t] : arguments)
                            })
                        }), t = null
                    }).promise()
                }, promise: function (t) {
                    return null != t ? se.extend(t, n) : n
                }
            }, s = {};
            return n.pipe = n.then, se.each(e, function (t, a) {
                var o = a[2], r = a[3];
                n[a[1]] = o.add, r && o.add(function () {
                    i = r
                }, e[1 ^ t][2].disable, e[2][2].lock), s[a[0]] = function () {
                    return s[a[0] + "With"](this === s ? n : this, arguments), this
                }, s[a[0] + "With"] = o.fireWith
            }), n.promise(s), t && t.call(s, s), s
        }, when: function (t) {
            var e, i, n, s = 0, a = K.call(arguments), o = a.length, r = 1 !== o || t && se.isFunction(t.promise) ? o : 0, l = 1 === r ? t : se.Deferred(), h = function (t, i, n) {
                return function (s) {
                    i[t] = this, n[t] = arguments.length > 1 ? K.call(arguments) : s, n === e ? l.notifyWith(i, n) : --r || l.resolveWith(i, n)
                }
            };
            if (o > 1)for (e = new Array(o), i = new Array(o), n = new Array(o); o > s; s++)a[s] && se.isFunction(a[s].promise) ? a[s].promise().done(h(s, n, a)).fail(l.reject).progress(h(s, i, e)) : --r;
            return r || l.resolveWith(n, a), l.promise()
        }
    });
    var we;
    se.fn.ready = function (t) {
        return se.ready.promise().done(t), this
    }, se.extend({
        isReady: !1, readyWait: 1, holdReady: function (t) {
            t ? se.readyWait++ : se.ready(!0)
        }, ready: function (t) {
            if (t === !0 ? !--se.readyWait : !se.isReady) {
                if (!fe.body)return setTimeout(se.ready);
                se.isReady = !0, t !== !0 && --se.readyWait > 0 || (we.resolveWith(fe, [se]), se.fn.triggerHandler && (se(fe).triggerHandler("ready"), se(fe).off("ready")))
            }
        }
    }), se.ready.promise = function (e) {
        if (!we)if (we = se.Deferred(), "complete" === fe.readyState)setTimeout(se.ready); else if (fe.addEventListener)fe.addEventListener("DOMContentLoaded", r, !1), t.addEventListener("load", r, !1); else {
            fe.attachEvent("onreadystatechange", r), t.attachEvent("onload", r);
            var i = !1;
            try {
                i = null == t.frameElement && fe.documentElement
            } catch (n) {
            }
            i && i.doScroll && !function s() {
                if (!se.isReady) {
                    try {
                        i.doScroll("left")
                    } catch (t) {
                        return setTimeout(s, 50)
                    }
                    o(), se.ready()
                }
            }()
        }
        return we.promise(e)
    };
    var xe, Ce = "undefined";
    for (xe in se(ie))break;
    ie.ownLast = "0" !== xe, ie.inlineBlockNeedsLayout = !1, se(function () {
        var t, e, i, n;
        i = fe.getElementsByTagName("body")[0], i && i.style && (e = fe.createElement("div"), n = fe.createElement("div"), n.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", i.appendChild(n).appendChild(e), typeof e.style.zoom !== Ce && (e.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1", ie.inlineBlockNeedsLayout = t = 3 === e.offsetWidth, t && (i.style.zoom = 1)), i.removeChild(n))
    }), function () {
        var t = fe.createElement("div");
        if (null == ie.deleteExpando) {
            ie.deleteExpando = !0;
            try {
                delete t.test
            } catch (e) {
                ie.deleteExpando = !1
            }
        }
        t = null
    }(), se.acceptData = function (t) {
        var e = se.noData[(t.nodeName + " ").toLowerCase()], i = +t.nodeType || 1;
        return 1 !== i && 9 !== i ? !1 : !e || e !== !0 && t.getAttribute("classid") === e
    };
    var De = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, Te = /([A-Z])/g;
    se.extend({
        cache: {},
        noData: {"applet ": !0, "embed ": !0, "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},
        hasData: function (t) {
            return t = t.nodeType ? se.cache[t[se.expando]] : t[se.expando], !!t && !h(t)
        },
        data: function (t, e, i) {
            return c(t, e, i)
        },
        removeData: function (t, e) {
            return d(t, e)
        },
        _data: function (t, e, i) {
            return c(t, e, i, !0)
        },
        _removeData: function (t, e) {
            return d(t, e, !0)
        }
    }), se.fn.extend({
        data: function (t, e) {
            var i, n, s, a = this[0], o = a && a.attributes;
            if (void 0 === t) {
                if (this.length && (s = se.data(a), 1 === a.nodeType && !se._data(a, "parsedAttrs"))) {
                    for (i = o.length; i--;)o[i] && (n = o[i].name, 0 === n.indexOf("data-") && (n = se.camelCase(n.slice(5)), l(a, n, s[n])));
                    se._data(a, "parsedAttrs", !0)
                }
                return s
            }
            return "object" == typeof t ? this.each(function () {
                se.data(this, t)
            }) : arguments.length > 1 ? this.each(function () {
                se.data(this, t, e)
            }) : a ? l(a, t, se.data(a, t)) : void 0
        }, removeData: function (t) {
            return this.each(function () {
                se.removeData(this, t)
            })
        }
    }), se.extend({
        queue: function (t, e, i) {
            var n;
            return t ? (e = (e || "fx") + "queue", n = se._data(t, e), i && (!n || se.isArray(i) ? n = se._data(t, e, se.makeArray(i)) : n.push(i)), n || []) : void 0
        }, dequeue: function (t, e) {
            e = e || "fx";
            var i = se.queue(t, e), n = i.length, s = i.shift(), a = se._queueHooks(t, e), o = function () {
                se.dequeue(t, e)
            };
            "inprogress" === s && (s = i.shift(), n--), s && ("fx" === e && i.unshift("inprogress"), delete a.stop, s.call(t, o, a)), !n && a && a.empty.fire()
        }, _queueHooks: function (t, e) {
            var i = e + "queueHooks";
            return se._data(t, i) || se._data(t, i, {
                    empty: se.Callbacks("once memory").add(function () {
                        se._removeData(t, e + "queue"), se._removeData(t, i)
                    })
                })
        }
    }), se.fn.extend({
        queue: function (t, e) {
            var i = 2;
            return "string" != typeof t && (e = t, t = "fx", i--), arguments.length < i ? se.queue(this[0], t) : void 0 === e ? this : this.each(function () {
                var i = se.queue(this, t, e);
                se._queueHooks(this, t), "fx" === t && "inprogress" !== i[0] && se.dequeue(this, t)
            })
        }, dequeue: function (t) {
            return this.each(function () {
                se.dequeue(this, t)
            })
        }, clearQueue: function (t) {
            return this.queue(t || "fx", [])
        }, promise: function (t, e) {
            var i, n = 1, s = se.Deferred(), a = this, o = this.length, r = function () {
                --n || s.resolveWith(a, [a])
            };
            for ("string" != typeof t && (e = t, t = void 0), t = t || "fx"; o--;)i = se._data(a[o], t + "queueHooks"), i && i.empty && (n++, i.empty.add(r));
            return r(), s.promise(e)
        }
    });
    var Se = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, ke = ["Top", "Right", "Bottom", "Left"], Ie = function (t, e) {
        return t = e || t, "none" === se.css(t, "display") || !se.contains(t.ownerDocument, t)
    }, Pe = se.access = function (t, e, i, n, s, a, o) {
        var r = 0, l = t.length, h = null == i;
        if ("object" === se.type(i)) {
            s = !0;
            for (r in i)se.access(t, e, r, i[r], !0, a, o)
        } else if (void 0 !== n && (s = !0, se.isFunction(n) || (o = !0), h && (o ? (e.call(t, n), e = null) : (h = e, e = function (t, e, i) {
                return h.call(se(t), i)
            })), e))for (; l > r; r++)e(t[r], i, o ? n : n.call(t[r], r, e(t[r], i)));
        return s ? t : h ? e.call(t) : l ? e(t[0], i) : a
    }, Ee = /^(?:checkbox|radio)$/i;
    !function () {
        var t = fe.createElement("input"), e = fe.createElement("div"), i = fe.createDocumentFragment();
        if (e.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", ie.leadingWhitespace = 3 === e.firstChild.nodeType, ie.tbody = !e.getElementsByTagName("tbody").length, ie.htmlSerialize = !!e.getElementsByTagName("link").length, ie.html5Clone = "<:nav></:nav>" !== fe.createElement("nav").cloneNode(!0).outerHTML, t.type = "checkbox", t.checked = !0, i.appendChild(t), ie.appendChecked = t.checked, e.innerHTML = "<textarea>x</textarea>", ie.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue, i.appendChild(e), e.innerHTML = "<input type='radio' checked='checked' name='t'/>", ie.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, ie.noCloneEvent = !0, e.attachEvent && (e.attachEvent("onclick", function () {
                ie.noCloneEvent = !1
            }), e.cloneNode(!0).click()), null == ie.deleteExpando) {
            ie.deleteExpando = !0;
            try {
                delete e.test
            } catch (n) {
                ie.deleteExpando = !1
            }
        }
    }(), function () {
        var e, i, n = fe.createElement("div");
        for (e in{
            submit: !0,
            change: !0,
            focusin: !0
        })i = "on" + e, (ie[e + "Bubbles"] = i in t) || (n.setAttribute(i, "t"), ie[e + "Bubbles"] = n.attributes[i].expando === !1);
        n = null
    }();
    var Me = /^(?:input|select|textarea)$/i, Ae = /^key/, Fe = /^(?:mouse|pointer|contextmenu)|click/, ze = /^(?:focusinfocus|focusoutblur)$/, Ne = /^([^.]*)(?:\.(.+)|)$/;
    se.event = {
        global: {},
        add: function (t, e, i, n, s) {
            var a, o, r, l, h, c, d, u, p, f, g, m = se._data(t);
            if (m) {
                for (i.handler && (l = i, i = l.handler, s = l.selector), i.guid || (i.guid = se.guid++), (o = m.events) || (o = m.events = {}), (c = m.handle) || (c = m.handle = function (t) {
                    return typeof se === Ce || t && se.event.triggered === t.type ? void 0 : se.event.dispatch.apply(c.elem, arguments)
                }, c.elem = t), e = (e || "").match(be) || [""], r = e.length; r--;)a = Ne.exec(e[r]) || [], p = g = a[1], f = (a[2] || "").split(".").sort(), p && (h = se.event.special[p] || {}, p = (s ? h.delegateType : h.bindType) || p, h = se.event.special[p] || {}, d = se.extend({
                    type: p,
                    origType: g,
                    data: n,
                    handler: i,
                    guid: i.guid,
                    selector: s,
                    needsContext: s && se.expr.match.needsContext.test(s),
                    namespace: f.join(".")
                }, l), (u = o[p]) || (u = o[p] = [], u.delegateCount = 0, h.setup && h.setup.call(t, n, f, c) !== !1 || (t.addEventListener ? t.addEventListener(p, c, !1) : t.attachEvent && t.attachEvent("on" + p, c))), h.add && (h.add.call(t, d), d.handler.guid || (d.handler.guid = i.guid)), s ? u.splice(u.delegateCount++, 0, d) : u.push(d), se.event.global[p] = !0);
                t = null
            }
        },
        remove: function (t, e, i, n, s) {
            var a, o, r, l, h, c, d, u, p, f, g, m = se.hasData(t) && se._data(t);
            if (m && (c = m.events)) {
                for (e = (e || "").match(be) || [""], h = e.length; h--;)if (r = Ne.exec(e[h]) || [], p = g = r[1], f = (r[2] || "").split(".").sort(), p) {
                    for (d = se.event.special[p] || {}, p = (n ? d.delegateType : d.bindType) || p, u = c[p] || [], r = r[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), l = a = u.length; a--;)o = u[a], !s && g !== o.origType || i && i.guid !== o.guid || r && !r.test(o.namespace) || n && n !== o.selector && ("**" !== n || !o.selector) || (u.splice(a, 1), o.selector && u.delegateCount--, d.remove && d.remove.call(t, o));
                    l && !u.length && (d.teardown && d.teardown.call(t, f, m.handle) !== !1 || se.removeEvent(t, p, m.handle), delete c[p])
                } else for (p in c)se.event.remove(t, p + e[h], i, n, !0);
                se.isEmptyObject(c) && (delete m.handle, se._removeData(t, "events"))
            }
        },
        trigger: function (e, i, n, s) {
            var a, o, r, l, h, c, d, u = [n || fe], p = ee.call(e, "type") ? e.type : e, f = ee.call(e, "namespace") ? e.namespace.split(".") : [];
            if (r = c = n = n || fe, 3 !== n.nodeType && 8 !== n.nodeType && !ze.test(p + se.event.triggered) && (p.indexOf(".") >= 0 && (f = p.split("."), p = f.shift(), f.sort()), o = p.indexOf(":") < 0 && "on" + p, e = e[se.expando] ? e : new se.Event(p, "object" == typeof e && e), e.isTrigger = s ? 2 : 3, e.namespace = f.join("."), e.namespace_re = e.namespace ? new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = n), i = null == i ? [e] : se.makeArray(i, [e]), h = se.event.special[p] || {}, s || !h.trigger || h.trigger.apply(n, i) !== !1)) {
                if (!s && !h.noBubble && !se.isWindow(n)) {
                    for (l = h.delegateType || p, ze.test(l + p) || (r = r.parentNode); r; r = r.parentNode)u.push(r), c = r;
                    c === (n.ownerDocument || fe) && u.push(c.defaultView || c.parentWindow || t)
                }
                for (d = 0; (r = u[d++]) && !e.isPropagationStopped();)e.type = d > 1 ? l : h.bindType || p, a = (se._data(r, "events") || {})[e.type] && se._data(r, "handle"), a && a.apply(r, i), a = o && r[o], a && a.apply && se.acceptData(r) && (e.result = a.apply(r, i), e.result === !1 && e.preventDefault());
                if (e.type = p, !s && !e.isDefaultPrevented() && (!h._default || h._default.apply(u.pop(), i) === !1) && se.acceptData(n) && o && n[p] && !se.isWindow(n)) {
                    c = n[o], c && (n[o] = null), se.event.triggered = p;
                    try {
                        n[p]()
                    } catch (g) {
                    }
                    se.event.triggered = void 0, c && (n[o] = c)
                }
                return e.result
            }
        },
        dispatch: function (t) {
            t = se.event.fix(t);
            var e, i, n, s, a, o = [], r = K.call(arguments), l = (se._data(this, "events") || {})[t.type] || [], h = se.event.special[t.type] || {};
            if (r[0] = t, t.delegateTarget = this, !h.preDispatch || h.preDispatch.call(this, t) !== !1) {
                for (o = se.event.handlers.call(this, t, l), e = 0; (s = o[e++]) && !t.isPropagationStopped();)for (t.currentTarget = s.elem, a = 0; (n = s.handlers[a++]) && !t.isImmediatePropagationStopped();)(!t.namespace_re || t.namespace_re.test(n.namespace)) && (t.handleObj = n, t.data = n.data, i = ((se.event.special[n.origType] || {}).handle || n.handler).apply(s.elem, r), void 0 !== i && (t.result = i) === !1 && (t.preventDefault(), t.stopPropagation()));
                return h.postDispatch && h.postDispatch.call(this, t), t.result
            }
        },
        handlers: function (t, e) {
            var i, n, s, a, o = [], r = e.delegateCount, l = t.target;
            if (r && l.nodeType && (!t.button || "click" !== t.type))for (; l != this; l = l.parentNode || this)if (1 === l.nodeType && (l.disabled !== !0 || "click" !== t.type)) {
                for (s = [], a = 0; r > a; a++)n = e[a], i = n.selector + " ", void 0 === s[i] && (s[i] = n.needsContext ? se(i, this).index(l) >= 0 : se.find(i, this, null, [l]).length), s[i] && s.push(n);
                s.length && o.push({elem: l, handlers: s})
            }
            return r < e.length && o.push({elem: this, handlers: e.slice(r)}), o
        },
        fix: function (t) {
            if (t[se.expando])return t;
            var e, i, n, s = t.type, a = t, o = this.fixHooks[s];
            for (o || (this.fixHooks[s] = o = Fe.test(s) ? this.mouseHooks : Ae.test(s) ? this.keyHooks : {}), n = o.props ? this.props.concat(o.props) : this.props, t = new se.Event(a), e = n.length; e--;)i = n[e], t[i] = a[i];
            return t.target || (t.target = a.srcElement || fe), 3 === t.target.nodeType && (t.target = t.target.parentNode), t.metaKey = !!t.metaKey, o.filter ? o.filter(t, a) : t
        },
        props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
        fixHooks: {},
        keyHooks: {
            props: "char charCode key keyCode".split(" "), filter: function (t, e) {
                return null == t.which && (t.which = null != e.charCode ? e.charCode : e.keyCode), t
            }
        },
        mouseHooks: {
            props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
            filter: function (t, e) {
                var i, n, s, a = e.button, o = e.fromElement;
                return null == t.pageX && null != e.clientX && (n = t.target.ownerDocument || fe, s = n.documentElement, i = n.body, t.pageX = e.clientX + (s && s.scrollLeft || i && i.scrollLeft || 0) - (s && s.clientLeft || i && i.clientLeft || 0), t.pageY = e.clientY + (s && s.scrollTop || i && i.scrollTop || 0) - (s && s.clientTop || i && i.clientTop || 0)), !t.relatedTarget && o && (t.relatedTarget = o === t.target ? e.toElement : o), t.which || void 0 === a || (t.which = 1 & a ? 1 : 2 & a ? 3 : 4 & a ? 2 : 0), t
            }
        },
        special: {
            load: {noBubble: !0}, focus: {
                trigger: function () {
                    if (this !== f() && this.focus)try {
                        return this.focus(), !1
                    } catch (t) {
                    }
                }, delegateType: "focusin"
            }, blur: {
                trigger: function () {
                    return this === f() && this.blur ? (this.blur(), !1) : void 0
                }, delegateType: "focusout"
            }, click: {
                trigger: function () {
                    return se.nodeName(this, "input") && "checkbox" === this.type && this.click ? (this.click(), !1) : void 0
                }, _default: function (t) {
                    return se.nodeName(t.target, "a")
                }
            }, beforeunload: {
                postDispatch: function (t) {
                    void 0 !== t.result && t.originalEvent && (t.originalEvent.returnValue = t.result)
                }
            }
        },
        simulate: function (t, e, i, n) {
            var s = se.extend(new se.Event, i, {type: t, isSimulated: !0, originalEvent: {}});
            n ? se.event.trigger(s, null, e) : se.event.dispatch.call(e, s), s.isDefaultPrevented() && i.preventDefault()
        }
    }, se.removeEvent = fe.removeEventListener ? function (t, e, i) {
        t.removeEventListener && t.removeEventListener(e, i, !1)
    } : function (t, e, i) {
        var n = "on" + e;
        t.detachEvent && (typeof t[n] === Ce && (t[n] = null), t.detachEvent(n, i))
    }, se.Event = function (t, e) {
        return this instanceof se.Event ? (t && t.type ? (this.originalEvent = t, this.type = t.type, this.isDefaultPrevented = t.defaultPrevented || void 0 === t.defaultPrevented && t.returnValue === !1 ? u : p) : this.type = t, e && se.extend(this, e), this.timeStamp = t && t.timeStamp || se.now(), void(this[se.expando] = !0)) : new se.Event(t, e)
    }, se.Event.prototype = {
        isDefaultPrevented: p,
        isPropagationStopped: p,
        isImmediatePropagationStopped: p,
        preventDefault: function () {
            var t = this.originalEvent;
            this.isDefaultPrevented = u, t && (t.preventDefault ? t.preventDefault() : t.returnValue = !1)
        },
        stopPropagation: function () {
            var t = this.originalEvent;
            this.isPropagationStopped = u, t && (t.stopPropagation && t.stopPropagation(), t.cancelBubble = !0)
        },
        stopImmediatePropagation: function () {
            var t = this.originalEvent;
            this.isImmediatePropagationStopped = u, t && t.stopImmediatePropagation && t.stopImmediatePropagation(), this.stopPropagation()
        }
    }, se.each({
        mouseenter: "mouseover",
        mouseleave: "mouseout",
        pointerenter: "pointerover",
        pointerleave: "pointerout"
    }, function (t, e) {
        se.event.special[t] = {
            delegateType: e, bindType: e, handle: function (t) {
                var i, n = this, s = t.relatedTarget, a = t.handleObj;
                return (!s || s !== n && !se.contains(n, s)) && (t.type = a.origType, i = a.handler.apply(this, arguments), t.type = e), i
            }
        }
    }), ie.submitBubbles || (se.event.special.submit = {
        setup: function () {
            return se.nodeName(this, "form") ? !1 : void se.event.add(this, "click._submit keypress._submit", function (t) {
                var e = t.target, i = se.nodeName(e, "input") || se.nodeName(e, "button") ? e.form : void 0;
                i && !se._data(i, "submitBubbles") && (se.event.add(i, "submit._submit", function (t) {
                    t._submit_bubble = !0
                }), se._data(i, "submitBubbles", !0))
            })
        }, postDispatch: function (t) {
            t._submit_bubble && (delete t._submit_bubble, this.parentNode && !t.isTrigger && se.event.simulate("submit", this.parentNode, t, !0))
        }, teardown: function () {
            return se.nodeName(this, "form") ? !1 : void se.event.remove(this, "._submit")
        }
    }), ie.changeBubbles || (se.event.special.change = {
        setup: function () {
            return Me.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (se.event.add(this, "propertychange._change", function (t) {
                "checked" === t.originalEvent.propertyName && (this._just_changed = !0)
            }), se.event.add(this, "click._change", function (t) {
                this._just_changed && !t.isTrigger && (this._just_changed = !1), se.event.simulate("change", this, t, !0)
            })), !1) : void se.event.add(this, "beforeactivate._change", function (t) {
                var e = t.target;
                Me.test(e.nodeName) && !se._data(e, "changeBubbles") && (se.event.add(e, "change._change", function (t) {
                    !this.parentNode || t.isSimulated || t.isTrigger || se.event.simulate("change", this.parentNode, t, !0)
                }), se._data(e, "changeBubbles", !0))
            })
        }, handle: function (t) {
            var e = t.target;
            return this !== e || t.isSimulated || t.isTrigger || "radio" !== e.type && "checkbox" !== e.type ? t.handleObj.handler.apply(this, arguments) : void 0
        }, teardown: function () {
            return se.event.remove(this, "._change"), !Me.test(this.nodeName)
        }
    }), ie.focusinBubbles || se.each({focus: "focusin", blur: "focusout"}, function (t, e) {
        var i = function (t) {
            se.event.simulate(e, t.target, se.event.fix(t), !0)
        };
        se.event.special[e] = {
            setup: function () {
                var n = this.ownerDocument || this, s = se._data(n, e);
                s || n.addEventListener(t, i, !0), se._data(n, e, (s || 0) + 1)
            }, teardown: function () {
                var n = this.ownerDocument || this, s = se._data(n, e) - 1;
                s ? se._data(n, e, s) : (n.removeEventListener(t, i, !0), se._removeData(n, e))
            }
        }
    }), se.fn.extend({
        on: function (t, e, i, n, s) {
            var a, o;
            if ("object" == typeof t) {
                "string" != typeof e && (i = i || e, e = void 0);
                for (a in t)this.on(a, e, i, t[a], s);
                return this
            }
            if (null == i && null == n ? (n = e, i = e = void 0) : null == n && ("string" == typeof e ? (n = i, i = void 0) : (n = i, i = e, e = void 0)), n === !1)n = p; else if (!n)return this;
            return 1 === s && (o = n, n = function (t) {
                return se().off(t), o.apply(this, arguments)
            }, n.guid = o.guid || (o.guid = se.guid++)), this.each(function () {
                se.event.add(this, t, n, i, e)
            })
        }, one: function (t, e, i, n) {
            return this.on(t, e, i, n, 1)
        }, off: function (t, e, i) {
            var n, s;
            if (t && t.preventDefault && t.handleObj)return n = t.handleObj, se(t.delegateTarget).off(n.namespace ? n.origType + "." + n.namespace : n.origType, n.selector, n.handler), this;
            if ("object" == typeof t) {
                for (s in t)this.off(s, e, t[s]);
                return this
            }
            return (e === !1 || "function" == typeof e) && (i = e, e = void 0), i === !1 && (i = p), this.each(function () {
                se.event.remove(this, t, i, e)
            })
        }, trigger: function (t, e) {
            return this.each(function () {
                se.event.trigger(t, e, this)
            })
        }, triggerHandler: function (t, e) {
            var i = this[0];
            return i ? se.event.trigger(t, e, i, !0) : void 0
        }
    });
    var Re = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video", He = / jQuery\d+="(?:null|\d+)"/g, Le = new RegExp("<(?:" + Re + ")[\\s/>]", "i"), Oe = /^\s+/, je = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, We = /<([\w:]+)/, Be = /<tbody/i, $e = /<|&#?\w+;/, qe = /<(?:script|style|link)/i, Ye = /checked\s*(?:[^=]|=\s*.checked.)/i, Ue = /^$|\/(?:java|ecma)script/i, Ve = /^true\/(.*)/, Xe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g, Ke = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: ie.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
    }, Qe = g(fe), Ge = Qe.appendChild(fe.createElement("div"));
    Ke.optgroup = Ke.option, Ke.tbody = Ke.tfoot = Ke.colgroup = Ke.caption = Ke.thead, Ke.th = Ke.td, se.extend({
        clone: function (t, e, i) {
            var n, s, a, o, r, l = se.contains(t.ownerDocument, t);
            if (ie.html5Clone || se.isXMLDoc(t) || !Le.test("<" + t.nodeName + ">") ? a = t.cloneNode(!0) : (Ge.innerHTML = t.outerHTML, Ge.removeChild(a = Ge.firstChild)), !(ie.noCloneEvent && ie.noCloneChecked || 1 !== t.nodeType && 11 !== t.nodeType || se.isXMLDoc(t)))for (n = m(a), r = m(t), o = 0; null != (s = r[o]); ++o)n[o] && C(s, n[o]);
            if (e)if (i)for (r = r || m(t), n = n || m(a), o = 0; null != (s = r[o]); o++)x(s, n[o]); else x(t, a);
            return n = m(a, "script"), n.length > 0 && w(n, !l && m(t, "script")), n = r = s = null, a
        }, buildFragment: function (t, e, i, n) {
            for (var s, a, o, r, l, h, c, d = t.length, u = g(e), p = [], f = 0; d > f; f++)if (a = t[f], a || 0 === a)if ("object" === se.type(a))se.merge(p, a.nodeType ? [a] : a); else if ($e.test(a)) {
                for (r = r || u.appendChild(e.createElement("div")), l = (We.exec(a) || ["", ""])[1].toLowerCase(), c = Ke[l] || Ke._default, r.innerHTML = c[1] + a.replace(je, "<$1></$2>") + c[2], s = c[0]; s--;)r = r.lastChild;
                if (!ie.leadingWhitespace && Oe.test(a) && p.push(e.createTextNode(Oe.exec(a)[0])), !ie.tbody)for (a = "table" !== l || Be.test(a) ? "<table>" !== c[1] || Be.test(a) ? 0 : r : r.firstChild, s = a && a.childNodes.length; s--;)se.nodeName(h = a.childNodes[s], "tbody") && !h.childNodes.length && a.removeChild(h);
                for (se.merge(p, r.childNodes), r.textContent = ""; r.firstChild;)r.removeChild(r.firstChild);
                r = u.lastChild
            } else p.push(e.createTextNode(a));
            for (r && u.removeChild(r), ie.appendChecked || se.grep(m(p, "input"), v), f = 0; a = p[f++];)if ((!n || -1 === se.inArray(a, n)) && (o = se.contains(a.ownerDocument, a), r = m(u.appendChild(a), "script"), o && w(r), i))for (s = 0; a = r[s++];)Ue.test(a.type || "") && i.push(a);
            return r = null, u
        }, cleanData: function (t, e) {
            for (var i, n, s, a, o = 0, r = se.expando, l = se.cache, h = ie.deleteExpando, c = se.event.special; null != (i = t[o]); o++)if ((e || se.acceptData(i)) && (s = i[r], a = s && l[s])) {
                if (a.events)for (n in a.events)c[n] ? se.event.remove(i, n) : se.removeEvent(i, n, a.handle);
                l[s] && (delete l[s], h ? delete i[r] : typeof i.removeAttribute !== Ce ? i.removeAttribute(r) : i[r] = null, X.push(s))
            }
        }
    }), se.fn.extend({
        text: function (t) {
            return Pe(this, function (t) {
                return void 0 === t ? se.text(this) : this.empty().append((this[0] && this[0].ownerDocument || fe).createTextNode(t))
            }, null, t, arguments.length)
        }, append: function () {
            return this.domManip(arguments, function (t) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var e = _(this, t);
                    e.appendChild(t)
                }
            })
        }, prepend: function () {
            return this.domManip(arguments, function (t) {
                if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                    var e = _(this, t);
                    e.insertBefore(t, e.firstChild)
                }
            })
        }, before: function () {
            return this.domManip(arguments, function (t) {
                this.parentNode && this.parentNode.insertBefore(t, this)
            })
        }, after: function () {
            return this.domManip(arguments, function (t) {
                this.parentNode && this.parentNode.insertBefore(t, this.nextSibling)
            })
        }, remove: function (t, e) {
            for (var i, n = t ? se.filter(t, this) : this, s = 0; null != (i = n[s]); s++)e || 1 !== i.nodeType || se.cleanData(m(i)), i.parentNode && (e && se.contains(i.ownerDocument, i) && w(m(i, "script")), i.parentNode.removeChild(i));
            return this
        }, empty: function () {
            for (var t, e = 0; null != (t = this[e]); e++) {
                for (1 === t.nodeType && se.cleanData(m(t, !1)); t.firstChild;)t.removeChild(t.firstChild);
                t.options && se.nodeName(t, "select") && (t.options.length = 0)
            }
            return this
        }, clone: function (t, e) {
            return t = null == t ? !1 : t, e = null == e ? t : e, this.map(function () {
                return se.clone(this, t, e)
            })
        }, html: function (t) {
            return Pe(this, function (t) {
                var e = this[0] || {}, i = 0, n = this.length;
                if (void 0 === t)return 1 === e.nodeType ? e.innerHTML.replace(He, "") : void 0;
                if (!("string" != typeof t || qe.test(t) || !ie.htmlSerialize && Le.test(t) || !ie.leadingWhitespace && Oe.test(t) || Ke[(We.exec(t) || ["", ""])[1].toLowerCase()])) {
                    t = t.replace(je, "<$1></$2>");
                    try {
                        for (; n > i; i++)e = this[i] || {}, 1 === e.nodeType && (se.cleanData(m(e, !1)), e.innerHTML = t);
                        e = 0
                    } catch (s) {
                    }
                }
                e && this.empty().append(t)
            }, null, t, arguments.length)
        }, replaceWith: function () {
            var t = arguments[0];
            return this.domManip(arguments, function (e) {
                t = this.parentNode, se.cleanData(m(this)), t && t.replaceChild(e, this)
            }), t && (t.length || t.nodeType) ? this : this.remove()
        }, detach: function (t) {
            return this.remove(t, !0)
        }, domManip: function (t, e) {
            t = Q.apply([], t);
            var i, n, s, a, o, r, l = 0, h = this.length, c = this, d = h - 1, u = t[0], p = se.isFunction(u);
            if (p || h > 1 && "string" == typeof u && !ie.checkClone && Ye.test(u))return this.each(function (i) {
                var n = c.eq(i);
                p && (t[0] = u.call(this, i, n.html())), n.domManip(t, e)
            });
            if (h && (r = se.buildFragment(t, this[0].ownerDocument, !1, this), i = r.firstChild, 1 === r.childNodes.length && (r = i), i)) {
                for (a = se.map(m(r, "script"), b), s = a.length; h > l; l++)n = r, l !== d && (n = se.clone(n, !0, !0), s && se.merge(a, m(n, "script"))), e.call(this[l], n, l);
                if (s)for (o = a[a.length - 1].ownerDocument, se.map(a, y), l = 0; s > l; l++)n = a[l], Ue.test(n.type || "") && !se._data(n, "globalEval") && se.contains(o, n) && (n.src ? se._evalUrl && se._evalUrl(n.src) : se.globalEval((n.text || n.textContent || n.innerHTML || "").replace(Xe, "")));
                r = i = null
            }
            return this
        }
    }), se.each({
        appendTo: "append",
        prependTo: "prepend",
        insertBefore: "before",
        insertAfter: "after",
        replaceAll: "replaceWith"
    }, function (t, e) {
        se.fn[t] = function (t) {
            for (var i, n = 0, s = [], a = se(t), o = a.length - 1; o >= n; n++)i = n === o ? this : this.clone(!0), se(a[n])[e](i), G.apply(s, i.get());
            return this.pushStack(s)
        }
    });
    var Je, Ze = {};
    !function () {
        var t;
        ie.shrinkWrapBlocks = function () {
            if (null != t)return t;
            t = !1;
            var e, i, n;
            return i = fe.getElementsByTagName("body")[0], i && i.style ? (e = fe.createElement("div"), n = fe.createElement("div"), n.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", i.appendChild(n).appendChild(e), typeof e.style.zoom !== Ce && (e.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1", e.appendChild(fe.createElement("div")).style.width = "5px", t = 3 !== e.offsetWidth), i.removeChild(n), t) : void 0
        }
    }();
    var ti, ei, ii = /^margin/, ni = new RegExp("^(" + Se + ")(?!px)[a-z%]+$", "i"), si = /^(top|right|bottom|left)$/;
    t.getComputedStyle ? (ti = function (t) {
        return t.ownerDocument.defaultView.getComputedStyle(t, null)
    }, ei = function (t, e, i) {
        var n, s, a, o, r = t.style;
        return i = i || ti(t), o = i ? i.getPropertyValue(e) || i[e] : void 0, i && ("" !== o || se.contains(t.ownerDocument, t) || (o = se.style(t, e)), ni.test(o) && ii.test(e) && (n = r.width, s = r.minWidth, a = r.maxWidth, r.minWidth = r.maxWidth = r.width = o, o = i.width, r.width = n, r.minWidth = s, r.maxWidth = a)), void 0 === o ? o : o + ""
    }) : fe.documentElement.currentStyle && (ti = function (t) {
        return t.currentStyle
    }, ei = function (t, e, i) {
        var n, s, a, o, r = t.style;
        return i = i || ti(t), o = i ? i[e] : void 0, null == o && r && r[e] && (o = r[e]), ni.test(o) && !si.test(e) && (n = r.left, s = t.runtimeStyle, a = s && s.left, a && (s.left = t.currentStyle.left), r.left = "fontSize" === e ? "1em" : o, o = r.pixelLeft + "px", r.left = n, a && (s.left = a)), void 0 === o ? o : o + "" || "auto"
    }), !function () {
        function e() {
            var e, i, n, s;
            i = fe.getElementsByTagName("body")[0], i && i.style && (e = fe.createElement("div"), n = fe.createElement("div"), n.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px", i.appendChild(n).appendChild(e), e.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute", a = o = !1, l = !0, t.getComputedStyle && (a = "1%" !== (t.getComputedStyle(e, null) || {}).top, o = "4px" === (t.getComputedStyle(e, null) || {width: "4px"}).width, s = e.appendChild(fe.createElement("div")), s.style.cssText = e.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0", s.style.marginRight = s.style.width = "0", e.style.width = "1px", l = !parseFloat((t.getComputedStyle(s, null) || {}).marginRight)), e.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", s = e.getElementsByTagName("td"), s[0].style.cssText = "margin:0;border:0;padding:0;display:none", r = 0 === s[0].offsetHeight, r && (s[0].style.display = "", s[1].style.display = "none", r = 0 === s[0].offsetHeight), i.removeChild(n))
        }

        var i, n, s, a, o, r, l;
        i = fe.createElement("div"), i.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", s = i.getElementsByTagName("a")[0], (n = s && s.style) && (n.cssText = "float:left;opacity:.5", ie.opacity = "0.5" === n.opacity, ie.cssFloat = !!n.cssFloat, i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", ie.clearCloneStyle = "content-box" === i.style.backgroundClip, ie.boxSizing = "" === n.boxSizing || "" === n.MozBoxSizing || "" === n.WebkitBoxSizing, se.extend(ie, {
            reliableHiddenOffsets: function () {
                return null == r && e(), r
            }, boxSizingReliable: function () {
                return null == o && e(), o
            }, pixelPosition: function () {
                return null == a && e(), a
            }, reliableMarginRight: function () {
                return null == l && e(), l
            }
        }))
    }(), se.swap = function (t, e, i, n) {
        var s, a, o = {};
        for (a in e)o[a] = t.style[a], t.style[a] = e[a];
        s = i.apply(t, n || []);
        for (a in e)t.style[a] = o[a];
        return s
    };
    var ai = /alpha\([^)]*\)/i, oi = /opacity\s*=\s*([^)]*)/, ri = /^(none|table(?!-c[ea]).+)/, li = new RegExp("^(" + Se + ")(.*)$", "i"), hi = new RegExp("^([+-])=(" + Se + ")", "i"), ci = {
        position: "absolute",
        visibility: "hidden",
        display: "block"
    }, di = {letterSpacing: "0", fontWeight: "400"}, ui = ["Webkit", "O", "Moz", "ms"];
    se.extend({
        cssHooks: {
            opacity: {
                get: function (t, e) {
                    if (e) {
                        var i = ei(t, "opacity");
                        return "" === i ? "1" : i
                    }
                }
            }
        },
        cssNumber: {
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0
        },
        cssProps: {"float": ie.cssFloat ? "cssFloat" : "styleFloat"},
        style: function (t, e, i, n) {
            if (t && 3 !== t.nodeType && 8 !== t.nodeType && t.style) {
                var s, a, o, r = se.camelCase(e), l = t.style;
                if (e = se.cssProps[r] || (se.cssProps[r] = k(l, r)), o = se.cssHooks[e] || se.cssHooks[r], void 0 === i)return o && "get"in o && void 0 !== (s = o.get(t, !1, n)) ? s : l[e];
                if (a = typeof i, "string" === a && (s = hi.exec(i)) && (i = (s[1] + 1) * s[2] + parseFloat(se.css(t, e)), a = "number"), null != i && i === i && ("number" !== a || se.cssNumber[r] || (i += "px"), ie.clearCloneStyle || "" !== i || 0 !== e.indexOf("background") || (l[e] = "inherit"), !(o && "set"in o && void 0 === (i = o.set(t, i, n)))))try {
                    l[e] = i
                } catch (h) {
                }
            }
        },
        css: function (t, e, i, n) {
            var s, a, o, r = se.camelCase(e);
            return e = se.cssProps[r] || (se.cssProps[r] = k(t.style, r)), o = se.cssHooks[e] || se.cssHooks[r], o && "get"in o && (a = o.get(t, !0, i)), void 0 === a && (a = ei(t, e, n)), "normal" === a && e in di && (a = di[e]), "" === i || i ? (s = parseFloat(a), i === !0 || se.isNumeric(s) ? s || 0 : a) : a
        }
    }), se.each(["height", "width"], function (t, e) {
        se.cssHooks[e] = {
            get: function (t, i, n) {
                return i ? ri.test(se.css(t, "display")) && 0 === t.offsetWidth ? se.swap(t, ci, function () {
                    return M(t, e, n)
                }) : M(t, e, n) : void 0
            }, set: function (t, i, n) {
                var s = n && ti(t);
                return P(t, i, n ? E(t, e, n, ie.boxSizing && "border-box" === se.css(t, "boxSizing", !1, s), s) : 0)
            }
        }
    }), ie.opacity || (se.cssHooks.opacity = {
        get: function (t, e) {
            return oi.test((e && t.currentStyle ? t.currentStyle.filter : t.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : e ? "1" : ""
        }, set: function (t, e) {
            var i = t.style, n = t.currentStyle, s = se.isNumeric(e) ? "alpha(opacity=" + 100 * e + ")" : "", a = n && n.filter || i.filter || "";
            i.zoom = 1, (e >= 1 || "" === e) && "" === se.trim(a.replace(ai, "")) && i.removeAttribute && (i.removeAttribute("filter"), "" === e || n && !n.filter) || (i.filter = ai.test(a) ? a.replace(ai, s) : a + " " + s)
        }
    }), se.cssHooks.marginRight = S(ie.reliableMarginRight, function (t, e) {
        return e ? se.swap(t, {display: "inline-block"}, ei, [t, "marginRight"]) : void 0
    }), se.each({margin: "", padding: "", border: "Width"}, function (t, e) {
        se.cssHooks[t + e] = {
            expand: function (i) {
                for (var n = 0, s = {}, a = "string" == typeof i ? i.split(" ") : [i]; 4 > n; n++)s[t + ke[n] + e] = a[n] || a[n - 2] || a[0];
                return s
            }
        }, ii.test(t) || (se.cssHooks[t + e].set = P)
    }), se.fn.extend({
        css: function (t, e) {
            return Pe(this, function (t, e, i) {
                var n, s, a = {}, o = 0;
                if (se.isArray(e)) {
                    for (n = ti(t), s = e.length; s > o; o++)a[e[o]] = se.css(t, e[o], !1, n);
                    return a
                }
                return void 0 !== i ? se.style(t, e, i) : se.css(t, e)
            }, t, e, arguments.length > 1)
        }, show: function () {
            return I(this, !0)
        }, hide: function () {
            return I(this)
        }, toggle: function (t) {
            return "boolean" == typeof t ? t ? this.show() : this.hide() : this.each(function () {
                Ie(this) ? se(this).show() : se(this).hide()
            })
        }
    }), se.Tween = A, A.prototype = {
        constructor: A, init: function (t, e, i, n, s, a) {
            this.elem = t, this.prop = i, this.easing = s || "swing", this.options = e, this.start = this.now = this.cur(), this.end = n, this.unit = a || (se.cssNumber[i] ? "" : "px")
        }, cur: function () {
            var t = A.propHooks[this.prop];
            return t && t.get ? t.get(this) : A.propHooks._default.get(this)
        }, run: function (t) {
            var e, i = A.propHooks[this.prop];
            return this.pos = e = this.options.duration ? se.easing[this.easing](t, this.options.duration * t, 0, 1, this.options.duration) : t, this.now = (this.end - this.start) * e + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), i && i.set ? i.set(this) : A.propHooks._default.set(this), this
        }
    }, A.prototype.init.prototype = A.prototype, A.propHooks = {
        _default: {
            get: function (t) {
                var e;
                return null == t.elem[t.prop] || t.elem.style && null != t.elem.style[t.prop] ? (e = se.css(t.elem, t.prop, ""), e && "auto" !== e ? e : 0) : t.elem[t.prop]
            }, set: function (t) {
                se.fx.step[t.prop] ? se.fx.step[t.prop](t) : t.elem.style && (null != t.elem.style[se.cssProps[t.prop]] || se.cssHooks[t.prop]) ? se.style(t.elem, t.prop, t.now + t.unit) : t.elem[t.prop] = t.now
            }
        }
    }, A.propHooks.scrollTop = A.propHooks.scrollLeft = {
        set: function (t) {
            t.elem.nodeType && t.elem.parentNode && (t.elem[t.prop] = t.now)
        }
    }, se.easing = {
        linear: function (t) {
            return t
        }, swing: function (t) {
            return .5 - Math.cos(t * Math.PI) / 2
        }
    }, se.fx = A.prototype.init, se.fx.step = {};
    var pi, fi, gi = /^(?:toggle|show|hide)$/, mi = new RegExp("^(?:([+-])=|)(" + Se + ")([a-z%]*)$", "i"), vi = /queueHooks$/, _i = [R], bi = {
        "*": [function (t, e) {
            var i = this.createTween(t, e), n = i.cur(), s = mi.exec(e), a = s && s[3] || (se.cssNumber[t] ? "" : "px"), o = (se.cssNumber[t] || "px" !== a && +n) && mi.exec(se.css(i.elem, t)), r = 1, l = 20;
            if (o && o[3] !== a) {
                a = a || o[3], s = s || [], o = +n || 1;
                do r = r || ".5", o /= r, se.style(i.elem, t, o + a); while (r !== (r = i.cur() / n) && 1 !== r && --l)
            }
            return s && (o = i.start = +o || +n || 0, i.unit = a, i.end = s[1] ? o + (s[1] + 1) * s[2] : +s[2]), i
        }]
    };
    se.Animation = se.extend(L, {
        tweener: function (t, e) {
            se.isFunction(t) ? (e = t, t = ["*"]) : t = t.split(" ");
            for (var i, n = 0, s = t.length; s > n; n++)i = t[n], bi[i] = bi[i] || [], bi[i].unshift(e)
        }, prefilter: function (t, e) {
            e ? _i.unshift(t) : _i.push(t)
        }
    }), se.speed = function (t, e, i) {
        var n = t && "object" == typeof t ? se.extend({}, t) : {
            complete: i || !i && e || se.isFunction(t) && t,
            duration: t,
            easing: i && e || e && !se.isFunction(e) && e
        };
        return n.duration = se.fx.off ? 0 : "number" == typeof n.duration ? n.duration : n.duration in se.fx.speeds ? se.fx.speeds[n.duration] : se.fx.speeds._default, (null == n.queue || n.queue === !0) && (n.queue = "fx"), n.old = n.complete, n.complete = function () {
            se.isFunction(n.old) && n.old.call(this), n.queue && se.dequeue(this, n.queue)
        }, n
    }, se.fn.extend({
        fadeTo: function (t, e, i, n) {
            return this.filter(Ie).css("opacity", 0).show().end().animate({opacity: e}, t, i, n)
        }, animate: function (t, e, i, n) {
            var s = se.isEmptyObject(t), a = se.speed(e, i, n), o = function () {
                var e = L(this, se.extend({}, t), a);
                (s || se._data(this, "finish")) && e.stop(!0)
            };
            return o.finish = o, s || a.queue === !1 ? this.each(o) : this.queue(a.queue, o)
        }, stop: function (t, e, i) {
            var n = function (t) {
                var e = t.stop;
                delete t.stop, e(i)
            };
            return "string" != typeof t && (i = e, e = t, t = void 0), e && t !== !1 && this.queue(t || "fx", []), this.each(function () {
                var e = !0, s = null != t && t + "queueHooks", a = se.timers, o = se._data(this);
                if (s)o[s] && o[s].stop && n(o[s]); else for (s in o)o[s] && o[s].stop && vi.test(s) && n(o[s]);
                for (s = a.length; s--;)a[s].elem !== this || null != t && a[s].queue !== t || (a[s].anim.stop(i), e = !1, a.splice(s, 1));
                (e || !i) && se.dequeue(this, t)
            })
        }, finish: function (t) {
            return t !== !1 && (t = t || "fx"), this.each(function () {
                var e, i = se._data(this), n = i[t + "queue"], s = i[t + "queueHooks"], a = se.timers, o = n ? n.length : 0;
                for (i.finish = !0, se.queue(this, t, []), s && s.stop && s.stop.call(this, !0), e = a.length; e--;)a[e].elem === this && a[e].queue === t && (a[e].anim.stop(!0), a.splice(e, 1));
                for (e = 0; o > e; e++)n[e] && n[e].finish && n[e].finish.call(this);
                delete i.finish
            })
        }
    }), se.each(["toggle", "show", "hide"], function (t, e) {
        var i = se.fn[e];
        se.fn[e] = function (t, n, s) {
            return null == t || "boolean" == typeof t ? i.apply(this, arguments) : this.animate(z(e, !0), t, n, s)
        }
    }), se.each({
        slideDown: z("show"),
        slideUp: z("hide"),
        slideToggle: z("toggle"),
        fadeIn: {opacity: "show"},
        fadeOut: {opacity: "hide"},
        fadeToggle: {opacity: "toggle"}
    }, function (t, e) {
        se.fn[t] = function (t, i, n) {
            return this.animate(e, t, i, n)
        }
    }), se.timers = [], se.fx.tick = function () {
        var t, e = se.timers, i = 0;
        for (pi = se.now(); i < e.length; i++)t = e[i], t() || e[i] !== t || e.splice(i--, 1);
        e.length || se.fx.stop(), pi = void 0
    }, se.fx.timer = function (t) {
        se.timers.push(t), t() ? se.fx.start() : se.timers.pop()
    }, se.fx.interval = 13, se.fx.start = function () {
        fi || (fi = setInterval(se.fx.tick, se.fx.interval))
    }, se.fx.stop = function () {
        clearInterval(fi), fi = null
    }, se.fx.speeds = {slow: 600, fast: 200, _default: 400}, se.fn.delay = function (t, e) {
        return t = se.fx ? se.fx.speeds[t] || t : t, e = e || "fx", this.queue(e, function (e, i) {
            var n = setTimeout(e, t);
            i.stop = function () {
                clearTimeout(n)
            }
        })
    }, function () {
        var t, e, i, n, s;
        e = fe.createElement("div"), e.setAttribute("className", "t"), e.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = e.getElementsByTagName("a")[0], i = fe.createElement("select"), s = i.appendChild(fe.createElement("option")), t = e.getElementsByTagName("input")[0], n.style.cssText = "top:1px", ie.getSetAttribute = "t" !== e.className, ie.style = /top/.test(n.getAttribute("style")), ie.hrefNormalized = "/a" === n.getAttribute("href"), ie.checkOn = !!t.value, ie.optSelected = s.selected, ie.enctype = !!fe.createElement("form").enctype, i.disabled = !0, ie.optDisabled = !s.disabled, t = fe.createElement("input"), t.setAttribute("value", ""), ie.input = "" === t.getAttribute("value"), t.value = "t", t.setAttribute("type", "radio"), ie.radioValue = "t" === t.value
    }();
    var yi = /\r/g;
    se.fn.extend({
        val: function (t) {
            var e, i, n, s = this[0];
            return arguments.length ? (n = se.isFunction(t), this.each(function (i) {
                var s;
                1 === this.nodeType && (s = n ? t.call(this, i, se(this).val()) : t, null == s ? s = "" : "number" == typeof s ? s += "" : se.isArray(s) && (s = se.map(s, function (t) {
                    return null == t ? "" : t + ""
                })), e = se.valHooks[this.type] || se.valHooks[this.nodeName.toLowerCase()], e && "set"in e && void 0 !== e.set(this, s, "value") || (this.value = s))
            })) : s ? (e = se.valHooks[s.type] || se.valHooks[s.nodeName.toLowerCase()], e && "get"in e && void 0 !== (i = e.get(s, "value")) ? i : (i = s.value, "string" == typeof i ? i.replace(yi, "") : null == i ? "" : i)) : void 0
        }
    }), se.extend({
        valHooks: {
            option: {
                get: function (t) {
                    var e = se.find.attr(t, "value");
                    return null != e ? e : se.trim(se.text(t))
                }
            }, select: {
                get: function (t) {
                    for (var e, i, n = t.options, s = t.selectedIndex, a = "select-one" === t.type || 0 > s, o = a ? null : [], r = a ? s + 1 : n.length, l = 0 > s ? r : a ? s : 0; r > l; l++)if (i = n[l], !(!i.selected && l !== s || (ie.optDisabled ? i.disabled : null !== i.getAttribute("disabled")) || i.parentNode.disabled && se.nodeName(i.parentNode, "optgroup"))) {
                        if (e = se(i).val(), a)return e;
                        o.push(e)
                    }
                    return o
                }, set: function (t, e) {
                    for (var i, n, s = t.options, a = se.makeArray(e), o = s.length; o--;)if (n = s[o], se.inArray(se.valHooks.option.get(n), a) >= 0)try {
                        n.selected = i = !0
                    } catch (r) {
                        n.scrollHeight
                    } else n.selected = !1;
                    return i || (t.selectedIndex = -1), s
                }
            }
        }
    }), se.each(["radio", "checkbox"], function () {
        se.valHooks[this] = {
            set: function (t, e) {
                return se.isArray(e) ? t.checked = se.inArray(se(t).val(), e) >= 0 : void 0
            }
        }, ie.checkOn || (se.valHooks[this].get = function (t) {
            return null === t.getAttribute("value") ? "on" : t.value
        })
    });
    var wi, xi, Ci = se.expr.attrHandle, Di = /^(?:checked|selected)$/i, Ti = ie.getSetAttribute, Si = ie.input;
    se.fn.extend({
        attr: function (t, e) {
            return Pe(this, se.attr, t, e, arguments.length > 1)
        }, removeAttr: function (t) {
            return this.each(function () {
                se.removeAttr(this, t)
            })
        }
    }), se.extend({
        attr: function (t, e, i) {
            var n, s, a = t.nodeType;
            return t && 3 !== a && 8 !== a && 2 !== a ? typeof t.getAttribute === Ce ? se.prop(t, e, i) : (1 === a && se.isXMLDoc(t) || (e = e.toLowerCase(), n = se.attrHooks[e] || (se.expr.match.bool.test(e) ? xi : wi)), void 0 === i ? n && "get"in n && null !== (s = n.get(t, e)) ? s : (s = se.find.attr(t, e), null == s ? void 0 : s) : null !== i ? n && "set"in n && void 0 !== (s = n.set(t, i, e)) ? s : (t.setAttribute(e, i + ""), i) : void se.removeAttr(t, e)) : void 0
        }, removeAttr: function (t, e) {
            var i, n, s = 0, a = e && e.match(be);
            if (a && 1 === t.nodeType)for (; i = a[s++];)n = se.propFix[i] || i, se.expr.match.bool.test(i) ? Si && Ti || !Di.test(i) ? t[n] = !1 : t[se.camelCase("default-" + i)] = t[n] = !1 : se.attr(t, i, ""), t.removeAttribute(Ti ? i : n)
        }, attrHooks: {
            type: {
                set: function (t, e) {
                    if (!ie.radioValue && "radio" === e && se.nodeName(t, "input")) {
                        var i = t.value;
                        return t.setAttribute("type", e), i && (t.value = i), e
                    }
                }
            }
        }
    }), xi = {
        set: function (t, e, i) {
            return e === !1 ? se.removeAttr(t, i) : Si && Ti || !Di.test(i) ? t.setAttribute(!Ti && se.propFix[i] || i, i) : t[se.camelCase("default-" + i)] = t[i] = !0, i
        }
    }, se.each(se.expr.match.bool.source.match(/\w+/g), function (t, e) {
        var i = Ci[e] || se.find.attr;
        Ci[e] = Si && Ti || !Di.test(e) ? function (t, e, n) {
            var s, a;
            return n || (a = Ci[e], Ci[e] = s, s = null != i(t, e, n) ? e.toLowerCase() : null, Ci[e] = a), s
        } : function (t, e, i) {
            return i ? void 0 : t[se.camelCase("default-" + e)] ? e.toLowerCase() : null
        }
    }), Si && Ti || (se.attrHooks.value = {
        set: function (t, e, i) {
            return se.nodeName(t, "input") ? void(t.defaultValue = e) : wi && wi.set(t, e, i)
        }
    }), Ti || (wi = {
        set: function (t, e, i) {
            var n = t.getAttributeNode(i);
            return n || t.setAttributeNode(n = t.ownerDocument.createAttribute(i)), n.value = e += "", "value" === i || e === t.getAttribute(i) ? e : void 0
        }
    }, Ci.id = Ci.name = Ci.coords = function (t, e, i) {
        var n;
        return i ? void 0 : (n = t.getAttributeNode(e)) && "" !== n.value ? n.value : null
    }, se.valHooks.button = {
        get: function (t, e) {
            var i = t.getAttributeNode(e);
            return i && i.specified ? i.value : void 0
        }, set: wi.set
    }, se.attrHooks.contenteditable = {
        set: function (t, e, i) {
            wi.set(t, "" === e ? !1 : e, i)
        }
    }, se.each(["width", "height"], function (t, e) {
        se.attrHooks[e] = {
            set: function (t, i) {
                return "" === i ? (t.setAttribute(e, "auto"), i) : void 0
            }
        }
    })), ie.style || (se.attrHooks.style = {
        get: function (t) {
            return t.style.cssText || void 0
        }, set: function (t, e) {
            return t.style.cssText = e + ""
        }
    });
    var ki = /^(?:input|select|textarea|button|object)$/i, Ii = /^(?:a|area)$/i;
    se.fn.extend({
        prop: function (t, e) {
            return Pe(this, se.prop, t, e, arguments.length > 1)
        }, removeProp: function (t) {
            return t = se.propFix[t] || t, this.each(function () {
                try {
                    this[t] = void 0, delete this[t]
                } catch (e) {
                }
            })
        }
    }), se.extend({
        propFix: {"for": "htmlFor", "class": "className"}, prop: function (t, e, i) {
            var n, s, a, o = t.nodeType;
            return t && 3 !== o && 8 !== o && 2 !== o ? (a = 1 !== o || !se.isXMLDoc(t), a && (e = se.propFix[e] || e, s = se.propHooks[e]), void 0 !== i ? s && "set"in s && void 0 !== (n = s.set(t, i, e)) ? n : t[e] = i : s && "get"in s && null !== (n = s.get(t, e)) ? n : t[e]) : void 0
        }, propHooks: {
            tabIndex: {
                get: function (t) {
                    var e = se.find.attr(t, "tabindex");
                    return e ? parseInt(e, 10) : ki.test(t.nodeName) || Ii.test(t.nodeName) && t.href ? 0 : -1
                }
            }
        }
    }), ie.hrefNormalized || se.each(["href", "src"], function (t, e) {
        se.propHooks[e] = {
            get: function (t) {
                return t.getAttribute(e, 4)
            }
        }
    }), ie.optSelected || (se.propHooks.selected = {
        get: function (t) {
            var e = t.parentNode;
            return e && (e.selectedIndex, e.parentNode && e.parentNode.selectedIndex), null
        }
    }), se.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
        se.propFix[this.toLowerCase()] = this
    }), ie.enctype || (se.propFix.enctype = "encoding");
    var Pi = /[\t\r\n\f]/g;
    se.fn.extend({
        addClass: function (t) {
            var e, i, n, s, a, o, r = 0, l = this.length, h = "string" == typeof t && t;
            if (se.isFunction(t))return this.each(function (e) {
                se(this).addClass(t.call(this, e, this.className))
            });
            if (h)for (e = (t || "").match(be) || []; l > r; r++)if (i = this[r], n = 1 === i.nodeType && (i.className ? (" " + i.className + " ").replace(Pi, " ") : " ")) {
                for (a = 0; s = e[a++];)n.indexOf(" " + s + " ") < 0 && (n += s + " ");
                o = se.trim(n), i.className !== o && (i.className = o)
            }
            return this
        }, removeClass: function (t) {
            var e, i, n, s, a, o, r = 0, l = this.length, h = 0 === arguments.length || "string" == typeof t && t;
            if (se.isFunction(t))return this.each(function (e) {
                se(this).removeClass(t.call(this, e, this.className))
            });
            if (h)for (e = (t || "").match(be) || []; l > r; r++)if (i = this[r], n = 1 === i.nodeType && (i.className ? (" " + i.className + " ").replace(Pi, " ") : "")) {
                for (a = 0; s = e[a++];)for (; n.indexOf(" " + s + " ") >= 0;)n = n.replace(" " + s + " ", " ");
                o = t ? se.trim(n) : "", i.className !== o && (i.className = o)
            }
            return this
        }, toggleClass: function (t, e) {
            var i = typeof t;
            return "boolean" == typeof e && "string" === i ? e ? this.addClass(t) : this.removeClass(t) : this.each(se.isFunction(t) ? function (i) {
                se(this).toggleClass(t.call(this, i, this.className, e), e)
            } : function () {
                if ("string" === i)for (var e, n = 0, s = se(this), a = t.match(be) || []; e = a[n++];)s.hasClass(e) ? s.removeClass(e) : s.addClass(e); else(i === Ce || "boolean" === i) && (this.className && se._data(this, "__className__", this.className), this.className = this.className || t === !1 ? "" : se._data(this, "__className__") || "")
            })
        }, hasClass: function (t) {
            for (var e = " " + t + " ", i = 0, n = this.length; n > i; i++)if (1 === this[i].nodeType && (" " + this[i].className + " ").replace(Pi, " ").indexOf(e) >= 0)return !0;
            return !1
        }
    }), se.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function (t, e) {
        se.fn[e] = function (t, i) {
            return arguments.length > 0 ? this.on(e, null, t, i) : this.trigger(e)
        }
    }), se.fn.extend({
        hover: function (t, e) {
            return this.mouseenter(t).mouseleave(e || t)
        }, bind: function (t, e, i) {
            return this.on(t, null, e, i)
        }, unbind: function (t, e) {
            return this.off(t, null, e)
        }, delegate: function (t, e, i, n) {
            return this.on(e, t, i, n)
        }, undelegate: function (t, e, i) {
            return 1 === arguments.length ? this.off(t, "**") : this.off(e, t || "**", i)
        }
    });
    var Ei = se.now(), Mi = /\?/, Ai = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    se.parseJSON = function (e) {
        if (t.JSON && t.JSON.parse)return t.JSON.parse(e + "");
        var i, n = null, s = se.trim(e + "");
        return s && !se.trim(s.replace(Ai, function (t, e, s, a) {
            return i && e && (n = 0), 0 === n ? t : (i = s || e, n += !a - !s, "")
        })) ? Function("return " + s)() : se.error("Invalid JSON: " + e)
    }, se.parseXML = function (e) {
        var i, n;
        if (!e || "string" != typeof e)return null;
        try {
            t.DOMParser ? (n = new DOMParser, i = n.parseFromString(e, "text/xml")) : (i = new ActiveXObject("Microsoft.XMLDOM"), i.async = "false", i.loadXML(e))
        } catch (s) {
            i = void 0
        }
        return i && i.documentElement && !i.getElementsByTagName("parsererror").length || se.error("Invalid XML: " + e), i
    };
    var Fi, zi, Ni = /#.*$/, Ri = /([?&])_=[^&]*/, Hi = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm, Li = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/, Oi = /^(?:GET|HEAD)$/, ji = /^\/\//, Wi = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/, Bi = {}, $i = {}, qi = "*/".concat("*");
    try {
        zi = location.href
    } catch (Yi) {
        zi = fe.createElement("a"), zi.href = "", zi = zi.href
    }
    Fi = Wi.exec(zi.toLowerCase()) || [], se.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
            url: zi,
            type: "GET",
            isLocal: Li.test(Fi[1]),
            global: !0,
            processData: !0,
            async: !0,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            accepts: {
                "*": qi,
                text: "text/plain",
                html: "text/html",
                xml: "application/xml, text/xml",
                json: "application/json, text/javascript"
            },
            contents: {xml: /xml/, html: /html/, json: /json/},
            responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
            converters: {"* text": String, "text html": !0, "text json": se.parseJSON, "text xml": se.parseXML},
            flatOptions: {url: !0, context: !0}
        },
        ajaxSetup: function (t, e) {
            return e ? W(W(t, se.ajaxSettings), e) : W(se.ajaxSettings, t)
        },
        ajaxPrefilter: O(Bi),
        ajaxTransport: O($i),
        ajax: function (t, e) {
            function i(t, e, i, n) {
                var s, c, v, _, y, x = e;
                2 !== b && (b = 2, r && clearTimeout(r), h = void 0, o = n || "", w.readyState = t > 0 ? 4 : 0, s = t >= 200 && 300 > t || 304 === t, i && (_ = B(d, w, i)), _ = $(d, _, w, s), s ? (d.ifModified && (y = w.getResponseHeader("Last-Modified"), y && (se.lastModified[a] = y), y = w.getResponseHeader("etag"), y && (se.etag[a] = y)), 204 === t || "HEAD" === d.type ? x = "nocontent" : 304 === t ? x = "notmodified" : (x = _.state, c = _.data, v = _.error, s = !v)) : (v = x, (t || !x) && (x = "error", 0 > t && (t = 0))), w.status = t, w.statusText = (e || x) + "", s ? f.resolveWith(u, [c, x, w]) : f.rejectWith(u, [w, x, v]), w.statusCode(m), m = void 0, l && p.trigger(s ? "ajaxSuccess" : "ajaxError", [w, d, s ? c : v]), g.fireWith(u, [w, x]), l && (p.trigger("ajaxComplete", [w, d]), --se.active || se.event.trigger("ajaxStop")))
            }

            "object" == typeof t && (e = t, t = void 0), e = e || {};
            var n, s, a, o, r, l, h, c, d = se.ajaxSetup({}, e), u = d.context || d, p = d.context && (u.nodeType || u.jquery) ? se(u) : se.event, f = se.Deferred(), g = se.Callbacks("once memory"), m = d.statusCode || {}, v = {}, _ = {}, b = 0, y = "canceled", w = {
                readyState: 0,
                getResponseHeader: function (t) {
                    var e;
                    if (2 === b) {
                        if (!c)for (c = {}; e = Hi.exec(o);)c[e[1].toLowerCase()] = e[2];
                        e = c[t.toLowerCase()]
                    }
                    return null == e ? null : e
                },
                getAllResponseHeaders: function () {
                    return 2 === b ? o : null
                },
                setRequestHeader: function (t, e) {
                    var i = t.toLowerCase();
                    return b || (t = _[i] = _[i] || t, v[t] = e), this
                },
                overrideMimeType: function (t) {
                    return b || (d.mimeType = t), this
                },
                statusCode: function (t) {
                    var e;
                    if (t)if (2 > b)for (e in t)m[e] = [m[e], t[e]]; else w.always(t[w.status]);
                    return this
                },
                abort: function (t) {
                    var e = t || y;
                    return h && h.abort(e), i(0, e), this
                }
            };
            if (f.promise(w).complete = g.add, w.success = w.done, w.error = w.fail, d.url = ((t || d.url || zi) + "").replace(Ni, "").replace(ji, Fi[1] + "//"), d.type = e.method || e.type || d.method || d.type, d.dataTypes = se.trim(d.dataType || "*").toLowerCase().match(be) || [""], null == d.crossDomain && (n = Wi.exec(d.url.toLowerCase()), d.crossDomain = !(!n || n[1] === Fi[1] && n[2] === Fi[2] && (n[3] || ("http:" === n[1] ? "80" : "443")) === (Fi[3] || ("http:" === Fi[1] ? "80" : "443")))), d.data && d.processData && "string" != typeof d.data && (d.data = se.param(d.data, d.traditional)), j(Bi, d, e, w), 2 === b)return w;
            l = d.global, l && 0 === se.active++ && se.event.trigger("ajaxStart"), d.type = d.type.toUpperCase(), d.hasContent = !Oi.test(d.type), a = d.url, d.hasContent || (d.data && (a = d.url += (Mi.test(a) ? "&" : "?") + d.data, delete d.data), d.cache === !1 && (d.url = Ri.test(a) ? a.replace(Ri, "$1_=" + Ei++) : a + (Mi.test(a) ? "&" : "?") + "_=" + Ei++)), d.ifModified && (se.lastModified[a] && w.setRequestHeader("If-Modified-Since", se.lastModified[a]), se.etag[a] && w.setRequestHeader("If-None-Match", se.etag[a])), (d.data && d.hasContent && d.contentType !== !1 || e.contentType) && w.setRequestHeader("Content-Type", d.contentType), w.setRequestHeader("Accept", d.dataTypes[0] && d.accepts[d.dataTypes[0]] ? d.accepts[d.dataTypes[0]] + ("*" !== d.dataTypes[0] ? ", " + qi + "; q=0.01" : "") : d.accepts["*"]);
            for (s in d.headers)w.setRequestHeader(s, d.headers[s]);
            if (d.beforeSend && (d.beforeSend.call(u, w, d) === !1 || 2 === b))return w.abort();
            y = "abort";
            for (s in{success: 1, error: 1, complete: 1})w[s](d[s]);
            if (h = j($i, d, e, w)) {
                w.readyState = 1, l && p.trigger("ajaxSend", [w, d]), d.async && d.timeout > 0 && (r = setTimeout(function () {
                    w.abort("timeout")
                }, d.timeout));
                try {
                    b = 1, h.send(v, i)
                } catch (x) {
                    if (!(2 > b))throw x;
                    i(-1, x)
                }
            } else i(-1, "No Transport");
            return w
        },
        getJSON: function (t, e, i) {
            return se.get(t, e, i, "json")
        },
        getScript: function (t, e) {
            return se.get(t, void 0, e, "script")
        }
    }), se.each(["get", "post"], function (t, e) {
        se[e] = function (t, i, n, s) {
            return se.isFunction(i) && (s = s || n, n = i, i = void 0), se.ajax({
                url: t,
                type: e,
                dataType: s,
                data: i,
                success: n
            })
        }
    }), se.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (t, e) {
        se.fn[e] = function (t) {
            return this.on(e, t)
        }
    }), se._evalUrl = function (t) {
        return se.ajax({url: t, type: "GET", dataType: "script", async: !1, global: !1, "throws": !0})
    }, se.fn.extend({
        wrapAll: function (t) {
            if (se.isFunction(t))return this.each(function (e) {
                se(this).wrapAll(t.call(this, e))
            });
            if (this[0]) {
                var e = se(t, this[0].ownerDocument).eq(0).clone(!0);
                this[0].parentNode && e.insertBefore(this[0]), e.map(function () {
                    for (var t = this; t.firstChild && 1 === t.firstChild.nodeType;)t = t.firstChild;
                    return t
                }).append(this)
            }
            return this
        }, wrapInner: function (t) {
            return this.each(se.isFunction(t) ? function (e) {
                se(this).wrapInner(t.call(this, e))
            } : function () {
                var e = se(this), i = e.contents();
                i.length ? i.wrapAll(t) : e.append(t)
            })
        }, wrap: function (t) {
            var e = se.isFunction(t);
            return this.each(function (i) {
                se(this).wrapAll(e ? t.call(this, i) : t)
            })
        }, unwrap: function () {
            return this.parent().each(function () {
                se.nodeName(this, "body") || se(this).replaceWith(this.childNodes)
            }).end()
        }
    }), se.expr.filters.hidden = function (t) {
        return t.offsetWidth <= 0 && t.offsetHeight <= 0 || !ie.reliableHiddenOffsets() && "none" === (t.style && t.style.display || se.css(t, "display"))
    }, se.expr.filters.visible = function (t) {
        return !se.expr.filters.hidden(t)
    };
    var Ui = /%20/g, Vi = /\[\]$/, Xi = /\r?\n/g, Ki = /^(?:submit|button|image|reset|file)$/i, Qi = /^(?:input|select|textarea|keygen)/i;
    se.param = function (t, e) {
        var i, n = [], s = function (t, e) {
            e = se.isFunction(e) ? e() : null == e ? "" : e, n[n.length] = encodeURIComponent(t) + "=" + encodeURIComponent(e)
        };
        if (void 0 === e && (e = se.ajaxSettings && se.ajaxSettings.traditional), se.isArray(t) || t.jquery && !se.isPlainObject(t))se.each(t, function () {
            s(this.name, this.value)
        }); else for (i in t)q(i, t[i], e, s);
        return n.join("&").replace(Ui, "+")
    }, se.fn.extend({
        serialize: function () {
            return se.param(this.serializeArray())
        }, serializeArray: function () {
            return this.map(function () {
                var t = se.prop(this, "elements");
                return t ? se.makeArray(t) : this
            }).filter(function () {
                var t = this.type;
                return this.name && !se(this).is(":disabled") && Qi.test(this.nodeName) && !Ki.test(t) && (this.checked || !Ee.test(t))
            }).map(function (t, e) {
                var i = se(this).val();
                return null == i ? null : se.isArray(i) ? se.map(i, function (t) {
                    return {name: e.name, value: t.replace(Xi, "\r\n")}
                }) : {name: e.name, value: i.replace(Xi, "\r\n")}
            }).get()
        }
    }), se.ajaxSettings.xhr = void 0 !== t.ActiveXObject ? function () {
        return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && Y() || U()
    } : Y;
    var Gi = 0, Ji = {}, Zi = se.ajaxSettings.xhr();
    t.ActiveXObject && se(t).on("unload", function () {
        for (var t in Ji)Ji[t](void 0, !0)
    }), ie.cors = !!Zi && "withCredentials"in Zi, Zi = ie.ajax = !!Zi, Zi && se.ajaxTransport(function (t) {
        if (!t.crossDomain || ie.cors) {
            var e;
            return {
                send: function (i, n) {
                    var s, a = t.xhr(), o = ++Gi;
                    if (a.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)for (s in t.xhrFields)a[s] = t.xhrFields[s];
                    t.mimeType && a.overrideMimeType && a.overrideMimeType(t.mimeType), t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
                    for (s in i)void 0 !== i[s] && a.setRequestHeader(s, i[s] + "");
                    a.send(t.hasContent && t.data || null), e = function (i, s) {
                        var r, l, h;
                        if (e && (s || 4 === a.readyState))if (delete Ji[o], e = void 0, a.onreadystatechange = se.noop, s)4 !== a.readyState && a.abort(); else {
                            h = {}, r = a.status, "string" == typeof a.responseText && (h.text = a.responseText);
                            try {
                                l = a.statusText
                            } catch (c) {
                                l = ""
                            }
                            r || !t.isLocal || t.crossDomain ? 1223 === r && (r = 204) : r = h.text ? 200 : 404
                        }
                        h && n(r, l, h, a.getAllResponseHeaders())
                    }, t.async ? 4 === a.readyState ? setTimeout(e) : a.onreadystatechange = Ji[o] = e : e()
                }, abort: function () {
                    e && e(void 0, !0)
                }
            }
        }
    }), se.ajaxSetup({
        accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
        contents: {script: /(?:java|ecma)script/},
        converters: {
            "text script": function (t) {
                return se.globalEval(t), t
            }
        }
    }), se.ajaxPrefilter("script", function (t) {
        void 0 === t.cache && (t.cache = !1), t.crossDomain && (t.type = "GET", t.global = !1)
    }), se.ajaxTransport("script", function (t) {
        if (t.crossDomain) {
            var e, i = fe.head || se("head")[0] || fe.documentElement;
            return {
                send: function (n, s) {
                    e = fe.createElement("script"), e.async = !0, t.scriptCharset && (e.charset = t.scriptCharset), e.src = t.url, e.onload = e.onreadystatechange = function (t, i) {
                        (i || !e.readyState || /loaded|complete/.test(e.readyState)) && (e.onload = e.onreadystatechange = null, e.parentNode && e.parentNode.removeChild(e), e = null, i || s(200, "success"))
                    }, i.insertBefore(e, i.firstChild)
                }, abort: function () {
                    e && e.onload(void 0, !0)
                }
            }
        }
    });
    var tn = [], en = /(=)\?(?=&|$)|\?\?/;
    se.ajaxSetup({
        jsonp: "callback", jsonpCallback: function () {
            var t = tn.pop() || se.expando + "_" + Ei++;
            return this[t] = !0, t
        }
    }), se.ajaxPrefilter("json jsonp", function (e, i, n) {
        var s, a, o, r = e.jsonp !== !1 && (en.test(e.url) ? "url" : "string" == typeof e.data && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && en.test(e.data) && "data");
        return r || "jsonp" === e.dataTypes[0] ? (s = e.jsonpCallback = se.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, r ? e[r] = e[r].replace(en, "$1" + s) : e.jsonp !== !1 && (e.url += (Mi.test(e.url) ? "&" : "?") + e.jsonp + "=" + s), e.converters["script json"] = function () {
            return o || se.error(s + " was not called"), o[0]
        }, e.dataTypes[0] = "json", a = t[s], t[s] = function () {
            o = arguments
        }, n.always(function () {
            t[s] = a, e[s] && (e.jsonpCallback = i.jsonpCallback, tn.push(s)), o && se.isFunction(a) && a(o[0]), o = a = void 0
        }), "script") : void 0
    }), se.parseHTML = function (t, e, i) {
        if (!t || "string" != typeof t)return null;
        "boolean" == typeof e && (i = e, e = !1), e = e || fe;
        var n = de.exec(t), s = !i && [];
        return n ? [e.createElement(n[1])] : (n = se.buildFragment([t], e, s), s && s.length && se(s).remove(), se.merge([], n.childNodes))
    };
    var nn = se.fn.load;
    se.fn.load = function (t, e, i) {
        if ("string" != typeof t && nn)return nn.apply(this, arguments);
        var n, s, a, o = this, r = t.indexOf(" ");
        return r >= 0 && (n = se.trim(t.slice(r, t.length)), t = t.slice(0, r)), se.isFunction(e) ? (i = e, e = void 0) : e && "object" == typeof e && (a = "POST"), o.length > 0 && se.ajax({
            url: t,
            type: a,
            dataType: "html",
            data: e
        }).done(function (t) {
            s = arguments, o.html(n ? se("<div>").append(se.parseHTML(t)).find(n) : t)
        }).complete(i && function (t, e) {
                o.each(i, s || [t.responseText, e, t])
            }), this
    }, se.expr.filters.animated = function (t) {
        return se.grep(se.timers, function (e) {
            return t === e.elem
        }).length
    };
    var sn = t.document.documentElement;
    se.offset = {
        setOffset: function (t, e, i) {
            var n, s, a, o, r, l, h, c = se.css(t, "position"), d = se(t), u = {};
            "static" === c && (t.style.position = "relative"), r = d.offset(), a = se.css(t, "top"), l = se.css(t, "left"), h = ("absolute" === c || "fixed" === c) && se.inArray("auto", [a, l]) > -1, h ? (n = d.position(), o = n.top, s = n.left) : (o = parseFloat(a) || 0, s = parseFloat(l) || 0), se.isFunction(e) && (e = e.call(t, i, r)), null != e.top && (u.top = e.top - r.top + o), null != e.left && (u.left = e.left - r.left + s), "using"in e ? e.using.call(t, u) : d.css(u)
        }
    }, se.fn.extend({
        offset: function (t) {
            if (arguments.length)return void 0 === t ? this : this.each(function (e) {
                se.offset.setOffset(this, t, e)
            });
            var e, i, n = {top: 0, left: 0}, s = this[0], a = s && s.ownerDocument;
            return a ? (e = a.documentElement, se.contains(e, s) ? (typeof s.getBoundingClientRect !== Ce && (n = s.getBoundingClientRect()), i = V(a), {
                top: n.top + (i.pageYOffset || e.scrollTop) - (e.clientTop || 0),
                left: n.left + (i.pageXOffset || e.scrollLeft) - (e.clientLeft || 0)
            }) : n) : void 0
        }, position: function () {
            if (this[0]) {
                var t, e, i = {top: 0, left: 0}, n = this[0];
                return "fixed" === se.css(n, "position") ? e = n.getBoundingClientRect() : (t = this.offsetParent(), e = this.offset(), se.nodeName(t[0], "html") || (i = t.offset()), i.top += se.css(t[0], "borderTopWidth", !0), i.left += se.css(t[0], "borderLeftWidth", !0)), {
                    top: e.top - i.top - se.css(n, "marginTop", !0),
                    left: e.left - i.left - se.css(n, "marginLeft", !0)
                }
            }
        }, offsetParent: function () {
            return this.map(function () {
                for (var t = this.offsetParent || sn; t && !se.nodeName(t, "html") && "static" === se.css(t, "position");)t = t.offsetParent;
                return t || sn
            })
        }
    }), se.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (t, e) {
        var i = /Y/.test(e);
        se.fn[t] = function (n) {
            return Pe(this, function (t, n, s) {
                var a = V(t);
                return void 0 === s ? a ? e in a ? a[e] : a.document.documentElement[n] : t[n] : void(a ? a.scrollTo(i ? se(a).scrollLeft() : s, i ? s : se(a).scrollTop()) : t[n] = s)
            }, t, n, arguments.length, null)
        }
    }), se.each(["top", "left"], function (t, e) {
        se.cssHooks[e] = S(ie.pixelPosition, function (t, i) {
            return i ? (i = ei(t, e), ni.test(i) ? se(t).position()[e] + "px" : i) : void 0
        })
    }), se.each({Height: "height", Width: "width"}, function (t, e) {
        se.each({padding: "inner" + t, content: e, "": "outer" + t}, function (i, n) {
            se.fn[n] = function (n, s) {
                var a = arguments.length && (i || "boolean" != typeof n), o = i || (n === !0 || s === !0 ? "margin" : "border");
                return Pe(this, function (e, i, n) {
                    var s;
                    return se.isWindow(e) ? e.document.documentElement["client" + t] : 9 === e.nodeType ? (s = e.documentElement, Math.max(e.body["scroll" + t], s["scroll" + t], e.body["offset" + t], s["offset" + t], s["client" + t])) : void 0 === n ? se.css(e, i, o) : se.style(e, i, n, o)
                }, e, a ? n : void 0, a, null)
            }
        })
    }), se.fn.size = function () {
        return this.length
    }, se.fn.andSelf = se.fn.addBack, "function" == typeof define && define.amd && define("jquery", [], function () {
        return se
    });
    var an = t.jQuery, on = t.$;
    return se.noConflict = function (e) {
        return t.$ === se && (t.$ = on), e && t.jQuery === se && (t.jQuery = an), se
    }, typeof e === Ce && (t.jQuery = t.$ = se), se
}), function (t, e, i) {
    function n(t) {
        var e = {}, n = /^jQuery\d+$/;
        return i.each(t.attributes, function (t, i) {
            i.specified && !n.test(i.name) && (e[i.name] = i.value)
        }), e
    }

    function s(t, e) {
        var n = this, s = i(n);
        if (n.value == s.attr("placeholder") && s.hasClass("placeholder"))if (s.data("placeholder-password")) {
            if (s = s.hide().next().show().attr("id", s.removeAttr("id").data("placeholder-id")), t === !0)return s[0].value = e;
            s.focus()
        } else n.value = "", s.removeClass("placeholder"), n == o() && n.select()
    }

    function a() {
        var t, e = this, a = i(e), o = this.id;
        if ("" == e.value) {
            if ("password" == e.type) {
                if (!a.data("placeholder-textinput")) {
                    try {
                        t = a.clone().attr({type: "text"})
                    } catch (r) {
                        t = i("<input>").attr(i.extend(n(this), {type: "text"}))
                    }
                    t.removeAttr("name").data({
                        "placeholder-password": a,
                        "placeholder-id": o
                    }).bind("focus.placeholder", s), a.data({"placeholder-textinput": t, "placeholder-id": o}).before(t)
                }
                a = a.removeAttr("id").hide().prev().attr("id", o).show()
            }
            a.addClass("placeholder"), a[0].value = a.attr("placeholder")
        } else a.removeClass("placeholder")
    }

    function o() {
        try {
            return e.activeElement
        } catch (t) {
        }
    }

    var r, l, h = "[object OperaMini]" == Object.prototype.toString.call(t.operamini), c = "placeholder"in e.createElement("input") && !h, d = "placeholder"in e.createElement("textarea") && !h, u = i.fn, p = i.valHooks, f = i.propHooks;
    c && d ? (l = u.placeholder = function () {
        return this
    }, l.input = l.textarea = !0) : (l = u.placeholder = function () {
        var t = this;
        return t.filter((c ? "textarea" : ":input") + "[placeholder]").not(".placeholder").bind({
            "focus.placeholder": s,
            "blur.placeholder": a
        }).data("placeholder-enabled", !0).trigger("blur.placeholder"), t
    }, l.input = c, l.textarea = d, r = {
        get: function (t) {
            var e = i(t), n = e.data("placeholder-password");
            return n ? n[0].value : e.data("placeholder-enabled") && e.hasClass("placeholder") ? "" : t.value
        }, set: function (t, e) {
            var n = i(t), r = n.data("placeholder-password");
            return r ? r[0].value = e : n.data("placeholder-enabled") ? ("" == e ? (t.value = e, t != o() && a.call(t)) : n.hasClass("placeholder") ? s.call(t, !0, e) || (t.value = e) : t.value = e, n) : t.value = e
        }
    }, c || (p.input = r, f.value = r), d || (p.textarea = r, f.value = r), i(function () {
        i(e).delegate("form", "submit.placeholder", function () {
            var t = i(".placeholder", this).each(s);
            setTimeout(function () {
                t.each(a)
            }, 10)
        })
    }), i(t).bind("beforeunload.placeholder", function () {
        i(".placeholder").each(function () {
            this.value = ""
        })
    }))
}(this, document, jQuery), function (t, e, i) {
    function n(t) {
        return t
    }

    function s(t) {
        return decodeURIComponent(t.replace(a, " "))
    }

    var a = /\+/g, o = t.cookie = function (a, r, l) {
        if (r !== i) {
            if (l = t.extend({}, o.defaults, l), null === r && (l.expires = -1), "number" == typeof l.expires) {
                var h = l.expires, c = l.expires = new Date;
                c.setDate(c.getDate() + h)
            }
            return r = o.json ? JSON.stringify(r) : String(r), e.cookie = [encodeURIComponent(a), "=", o.raw ? r : encodeURIComponent(r), l.expires ? "; expires=" + l.expires.toUTCString() : "", l.path ? "; path=" + l.path : "", l.domain ? "; domain=" + l.domain : "", l.secure ? "; secure" : ""].join("")
        }
        for (var d, u = o.raw ? n : s, p = e.cookie.split("; "), f = 0; d = p[f] && p[f].split("="); f++)if (u(d.shift()) === a) {
            var g = u(d.join("="));
            return o.json ? JSON.parse(g) : g
        }
        return null
    };
    o.defaults = {}, t.removeCookie = function (e, i) {
        return null !== t.cookie(e) ? (t.cookie(e, null, i), !0) : !1
    }
}(jQuery, document), /* ========================================================================
 * Bootstrap: button.js v3.1.1
 * http://getbootstrap.com/javascript/#buttons
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
    +function (t) {
        "use strict";
        var e = function (i, n) {
            this.$element = t(i), this.options = t.extend({}, e.DEFAULTS, n), this.isLoading = !1
        };
        e.DEFAULTS = {loadingText: "loading..."}, e.prototype.setState = function (e) {
            var i = "disabled", n = this.$element, s = n.is("input") ? "val" : "html", a = n.data();
            e += "Text", a.resetText || n.data("resetText", n[s]()), n[s](a[e] || this.options[e]), setTimeout(t.proxy(function () {
                "loadingText" == e ? (this.isLoading = !0, n.addClass(i).attr(i, i)) : this.isLoading && (this.isLoading = !1, n.removeClass(i).removeAttr(i))
            }, this), 0)
        }, e.prototype.toggle = function () {
            var t = !0, e = this.$element.closest('[data-toggle="buttons"]');
            if (e.length) {
                var i = this.$element.find("input");
                "radio" == i.prop("type") && (i.prop("checked") && this.$element.hasClass("active") ? t = !1 : e.find(".active").removeClass("active")), t && i.prop("checked", !this.$element.hasClass("active")).trigger("change")
            }
            t && this.$element.toggleClass("active")
        };
        var i = t.fn.button;
        t.fn.button = function (i) {
            return this.each(function () {
                var n = t(this), s = n.data("bs.button"), a = "object" == typeof i && i;
                s || n.data("bs.button", s = new e(this, a)), "toggle" == i ? s.toggle() : i && s.setState(i)
            })
        }, t.fn.button.Constructor = e, t.fn.button.noConflict = function () {
            return t.fn.button = i, this
        }, t(document).on("click.bs.button.data-api", "[data-toggle^=button]", function (e) {
            var i = t(e.target);
            i.hasClass("btn") || (i = i.closest(".btn")), i.button("toggle"), e.preventDefault()
        })
    }(jQuery), /* ========================================================================
 * Bootstrap: modal.js v3.1.1
 * http://getbootstrap.com/javascript/#modals
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
    +function (t) {
        "use strict";
        var e = function (e, i) {
            this.options = i, this.$element = t(e), this.$backdrop = this.isShown = null, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
                this.$element.trigger("loaded.bs.modal")
            }, this))
        };
        e.DEFAULTS = {backdrop: !0, keyboard: !0, show: !0}, e.prototype.toggle = function (t) {
            return this[this.isShown ? "hide" : "show"](t)
        }, e.prototype.show = function (e) {
            var i = this, n = t.Event("show.bs.modal", {relatedTarget: e});
            this.$element.trigger(n), this.isShown || n.isDefaultPrevented() || (this.isShown = !0, this.escape(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.backdrop(function () {
                var n = t.support.transition && i.$element.hasClass("fade");
                i.$element.parent().length || i.$element.appendTo(document.body), i.$element.show().scrollTop(0), n && i.$element[0].offsetWidth, i.$element.addClass("in").attr("aria-hidden", !1), i.enforceFocus();
                var s = t.Event("shown.bs.modal", {relatedTarget: e});
                n ? i.$element.find(".modal-dialog").one(t.support.transition.end, function () {
                    i.$element.focus().trigger(s)
                }).emulateTransitionEnd(300) : i.$element.focus().trigger(s)
            }))
        }, e.prototype.hide = function (e) {
            e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one(t.support.transition.end, t.proxy(this.hideModal, this)).emulateTransitionEnd(300) : this.hideModal())
        }, e.prototype.enforceFocus = function () {
            t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
                this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.focus()
            }, this))
        }, e.prototype.escape = function () {
            this.isShown && this.options.keyboard ? this.$element.on("keyup.dismiss.bs.modal", t.proxy(function (t) {
                27 == t.which && this.hide()
            }, this)) : this.isShown || this.$element.off("keyup.dismiss.bs.modal")
        }, e.prototype.hideModal = function () {
            var t = this;
            this.$element.hide(), this.backdrop(function () {
                t.removeBackdrop(), t.$element.trigger("hidden.bs.modal")
            })
        }, e.prototype.removeBackdrop = function () {
            this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
        }, e.prototype.backdrop = function (e) {
            var i = this.$element.hasClass("fade") ? "fade" : "";
            if (this.isShown && this.options.backdrop) {
                var n = t.support.transition && i;
                if (this.$backdrop = t('<div class="modal-backdrop ' + i + '" />').appendTo(document.body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                        t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus.call(this.$element[0]) : this.hide.call(this))
                    }, this)), n && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e)return;
                n ? this.$backdrop.one(t.support.transition.end, e).emulateTransitionEnd(150) : e()
            } else!this.isShown && this.$backdrop ? (this.$backdrop.removeClass("in"), t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one(t.support.transition.end, e).emulateTransitionEnd(150) : e()) : e && e()
        };
        var i = t.fn.modal;
        t.fn.modal = function (i, n) {
            return this.each(function () {
                var s = t(this), a = s.data("bs.modal"), o = t.extend({}, e.DEFAULTS, s.data(), "object" == typeof i && i);
                a || s.data("bs.modal", a = new e(this, o)), "string" == typeof i ? a[i](n) : o.show && a.show(n)
            })
        }, t.fn.modal.Constructor = e, t.fn.modal.noConflict = function () {
            return t.fn.modal = i, this
        }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (e) {
            var i = t(this), n = i.attr("href"), s = t(i.attr("data-target") || n && n.replace(/.*(?=#[^\s]+$)/, "")), a = s.data("bs.modal") ? "toggle" : t.extend({remote: !/#/.test(n) && n}, s.data(), i.data());
            i.is("a") && e.preventDefault(), s.modal(a, this).one("hide", function () {
                i.is(":visible") && i.focus()
            })
        }), t(document).on("show.bs.modal", ".modal", function () {
            t(document.body).addClass("modal-open")
        }).on("hidden.bs.modal", ".modal", function () {
            t(document.body).removeClass("modal-open")
        })
    }(jQuery), /* ========================================================================
 * Bootstrap: dropdown.js v3.1.1
 * http://getbootstrap.com/javascript/#dropdowns
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
    +function (t) {
        "use strict";
        function e(e) {
            t(n).remove(), t(s).each(function () {
                var n = i(t(this)), s = {relatedTarget: this};
                n.hasClass("open") && (n.trigger(e = t.Event("hide.bs.dropdown", s)), e.isDefaultPrevented() || n.removeClass("open").trigger("hidden.bs.dropdown", s))
            })
        }

        function i(e) {
            var i = e.attr("data-target");
            i || (i = e.attr("href"), i = i && /#[A-Za-z]/.test(i) && i.replace(/.*(?=#[^\s]*$)/, ""));
            var n = i && t(i);
            return n && n.length ? n : e.parent()
        }

        var n = ".dropdown-backdrop", s = "[data-toggle=dropdown]", a = function (e) {
            t(e).on("click.bs.dropdown", this.toggle)
        };
        a.prototype.toggle = function (n) {
            var s = t(this);
            if (!s.is(".disabled, :disabled")) {
                var a = i(s), o = a.hasClass("open");
                if (e(), !o) {
                    "ontouchstart"in document.documentElement && !a.closest(".navbar-nav").length && t('<div class="dropdown-backdrop"/>').insertAfter(t(this)).on("click", e);
                    var r = {relatedTarget: this};
                    if (a.trigger(n = t.Event("show.bs.dropdown", r)), n.isDefaultPrevented())return;
                    a.toggleClass("open").trigger("shown.bs.dropdown", r), s.focus()
                }
                return !1
            }
        }, a.prototype.keydown = function (e) {
            if (/(38|40|27)/.test(e.keyCode)) {
                var n = t(this);
                if (e.preventDefault(), e.stopPropagation(), !n.is(".disabled, :disabled")) {
                    var a = i(n), o = a.hasClass("open");
                    if (!o || o && 27 == e.keyCode)return 27 == e.which && a.find(s).focus(), n.click();
                    var r = " li:not(.divider):visible a", l = a.find("[role=menu]" + r + ", [role=listbox]" + r);
                    if (l.length) {
                        var h = l.index(l.filter(":focus"));
                        38 == e.keyCode && h > 0 && h--, 40 == e.keyCode && h < l.length - 1 && h++, ~h || (h = 0), l.eq(h).focus()
                    }
                }
            }
        };
        var o = t.fn.dropdown;
        t.fn.dropdown = function (e) {
            return this.each(function () {
                var i = t(this), n = i.data("bs.dropdown");
                n || i.data("bs.dropdown", n = new a(this)), "string" == typeof e && n[e].call(i)
            })
        }, t.fn.dropdown.Constructor = a, t.fn.dropdown.noConflict = function () {
            return t.fn.dropdown = o, this
        }, t(document).on("click.bs.dropdown.data-api", e).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
            t.stopPropagation()
        }).on("click.bs.dropdown.data-api", s, a.prototype.toggle).on("keydown.bs.dropdown.data-api", s + ", [role=menu], [role=listbox]", a.prototype.keydown)
    }(jQuery), $.fn.initializeDropdown = function () {
    return this.each(function () {
        var t = $(this).findDropdown();
        if (!t || t.hasClass("ready"))return this;
        t.removeClass("dropdown-invisible-until-init");
        var e = t.getDropdownValue();
        return "undefined" != typeof e && t.data("init-value", e).changeDropdownByValue(e), t.addClass("ready"), this
    })
}, $.fn.changeDropdownByItem = function (t) {
    return this.each(function () {
        if (t.hasClass("active") || t.parent().hasClass("disabled"))return this;
        var e = $(this).findDropdown();
        if (!e)return this;
        var i = t.data("value"), n = t.data("display");
        "undefined" == typeof n && (n = t.html()), "undefined" == typeof i && (i = n), e.addClass("selected").setDropdownValue(i), t.addClass("active").parent().siblings().children("a").removeClass("active");
        var s = e.children(".dropdown-toggle");
        return s.children(".value").html(i), s.children(".display").html(n), this
    })
}, $.fn.changeDropdownByValue = function (t) {
    return this.each(function () {
        var e = $(this).findDropdown();
        if (!e)return this;
        var i = e.findDropdownItem(t);
        return i && i.length > 0 && e.changeDropdownByItem(i), this
    })
}, $.fn.getDropdownValue = function () {
    var t = $(this).findDropdown();
    if (!t)return void 0;
    var e = t.children('input[type="hidden"]').attr("value");
    return "undefined" == typeof e && (e = t.data("value")), e
}, $.fn.setDropdownValue = function (t) {
    return this.each(function () {
        var e = $(this).findDropdown();
        if (!e)return this;
        var i = e.children('input[type="hidden"]');
        return i.length > 0 ? (i.val(t), e.hasClass("ready") && (i.change(), i.valid && i.hasClass("validate") && i.valid())) : (e.data("value", t), e.hasClass("ready") && e.change()), this
    })
}, $.fn.resetDropdown = function () {
    return this.each(function () {
        var t = $(this).findDropdown();
        if (!t)return this;
        var e = t.data("init-value");
        if ("undefined" == typeof e) {
            t.removeClass("selected").find(".dropdown-menu a").removeClass("active"), t.children('input[type="hidden"]').removeAttr("value").change();
            var e = t.data("value");
            "undefined" != typeof e && t.removeData("value").change()
        } else t.changeDropdownByValue(e);
        return this
    })
}, $.fn.positionDropdown = function () {
    return this.each(function () {
        var t = $(this).findDropdown();
        if (!t)return this;
        var e = $(document).width(), i = t.children(".dropdown-menu");
        if (i.css("max-width", e - 20 - (i.width() - i.children("li:first").width())), i.hasClass("dropdown-menu-left") || i.hasClass("dropdown-menu-right"))i.css("margin-right", ""); else {
            var n = i.outerWidth(), s = t.children("button"), a = s.offset().left, o = Math.ceil((n - s.outerWidth()) / 2), r = -Math.floor(n / 2);
            if (o > a)r = r - o + a - 6; else {
                var l = e - a - s.outerWidth();
                o > l && (r = r + o - l + 6)
            }
            i.css("margin-right", r + "px")
        }
        var h = t.children(".dropdown-menu-chevron");
        return h.css("left", Math.floor((t.outerWidth() - h.outerWidth()) / 2) + "px"), this
    })
}, $.fn.findDropdown = function () {
    return $(this).closest(".dropdown")
}, $.fn.findDropdownItem = function (t) {
    var e = $(this).findDropdown();
    if (e) {
        var i = e.find('.dropdown-menu a[data-value="' + t + '"]');
        return i.length > 0 ? i : (i = e.find('.dropdown-menu a[data-display="' + t + '"]'), i.length > 0 ? i : (e.find(".dropdown-menu a").each(function () {
            return $(this).html() == t ? (i = $(this), !1) : void 0
        }), i.length > 0 ? i : void 0))
    }
}, $(function () {
    $(".dropdown").initializeDropdown();
    var t = "", e = null;
    $(document).on("shown.bs.dropdown", ".dropdown", function () {
        $(this).positionDropdown()
    }).on("hidden.bs.dropdown", ".dropdown", function () {
        $(this).children(".dropdown-menu").css("max-width", "")
    }).on("click", ".dropdown-menu li a", function (t) {
        var e = $(this), i = e.data("href");
        i && "follow" == i || t.preventDefault(), e.closest(".dropdown").changeDropdownByItem(e)
    }).on("keydown.bs.dropdown.data-api", "[data-toggle=dropdown], [role=menu], [role=listbox]", function (i) {
        if (e && (clearTimeout(e), e = null), i.keyCode >= 48 && i.keyCode <= 57 || i.keyCode >= 65 && i.keyCode <= 90) {
            t += String.fromCharCode(i.keyCode);
            var n = $(i.target).closest(".dropdown");
            n.hasClass("open") && n.find("[role=menuitem]").each(function () {
                var e = $(this);
                return 0 != e.text().toUpperCase().indexOf(t) || e.parent().hasClass("disabled") ? void 0 : (e.focus(), !1)
            }), e = setTimeout(function () {
                e = null, t = ""
            }, 500)
        }
    }), $(window).on("widthchange", function () {
        $(".dropdown.open").positionDropdown()
    })
}), String.prototype.supplant || (String.prototype.supplant = function (t) {
    return str = this.replace(/%\{([^{}]*)\}%?/g, function (e, i) {
        var n = t[i];
        return "string" == typeof n || "number" == typeof n ? n : e
    })
}), $.modal = {
    options: {path: "/", domain: window.location.hostname}, reopen: function (t, e) {
        $.cookie("modal", t, $.modal.options), "undefined" != typeof e && e || $.cookie("modal_path", window.location.pathname, $.modal.options)
    }, shouldReopen: function (t) {
        return $.cookie("modal") != t || null != $.cookie("modal_path") && $.cookie("modal_path") != window.location.pathname ? !1 : ($.modal.clear(), !0)
    }, clear: function () {
        $.removeCookie("modal", $.modal.options), $.removeCookie("modal_path", $.modal.options)
    }
}, $(window).load(function () {
    if (!isSigninOrSignup) {
        var t = $.cookie("modal_path");
        null != t && t != window.location.pathname && $.modal.clear()
    }
}), $(document).ready(function () {
    $("body").on("click", ".tclick", function () {
        var t = $(this).data("tkey"), e = $(this).data("tloc"), i = $(this).data("action") || "Click";
        blank(t) || blank(e) || track({type: "event", event: i, key: t, loc: e})
    })
}), $(function () {
    function t() {
        s && (clearTimeout(s), s = null), i.addClass("active"), n.show(150)
    }

    function e(t) {
        s && clearTimeout(s), 1 == t ? (i.removeClass("active"), n.hide(150)) : s = setTimeout(function () {
            i.removeClass("active"), n.hide(150)
        }, 600)
    }

    $("header .logo"), $("#language"), $("header .account .dropdown-toggle"), $("#language input").change(function () {
        track({
            key: "Top Nav",
            loc: "Change Language",
            evt: "Select"
        }), $("#body").addClass("loading"), postAndReload("/users/set_language/", "lang", $(this).val())
    }), $("#currency input").change(function () {
        track({
            key: "Top Nav",
            loc: "Change Currency",
            evt: "Select"
        }), $("#body").addClass("loading"), postAndReload("/users/set_currency/", "currency", $(this).val())
    });
    var i = $("#birdhouse");
    if (i.length > 0) {
        var n = $("#birdhouse-popup"), s = null;
        i.hover(t, e).click(function () {
            $(this).hasClass("active") ? e(!0) : t()
        }), n.hover(t, e), $(document).click(function (t) {
            return 0 != $(t.target).closest("#birdhouse, #birdhouse-popup").length ? !1 : (e(!0), void 0)
        })
    }
}), $(function () {
    function t() {
        e.hasClass("open") && (e.removeClass("open"), n.animate({opacity: 0}, 300, function () {
            $(this).hide()
        }), $("body").removeClass("modal-open"), a && (o && (s.attr("content", r), o = !1), $(document).scrollTop() > 100 && $(document).scrollTop(0)))
    }

    var e = $("#menu"), i = e.children(".account");
    e.find("li:not(.help) a");
    var n = $("#menu-overlay"), s = $('meta[name="viewport"]'), a = s.attr("content").indexOf("user-scalable=no") < 0 && /iP(ad|hone|od)/.test(navigator.userAgent);
    if (a)var o, r = s.attr("content");
    $("#menu-toggle").click(function () {
        return e.addClass("open opening"), n.show().animate({opacity: .6}, 300, function () {
            e.removeClass("opening")
        }), $("body").addClass("modal-open"), a && window.innerWidth >= screen.width && (s.attr("content", "width=device-width, user-scalable=no"), o = !0), !1
    }).one("click", function () {
        function t(t) {
            var e = $("#" + t + " .dropdown"), i = e.children('input[type="hidden"]').val(), n = $("<select></select>").attr("class", t + " form-control");
            return e.find(".dropdown-menu li").each(function () {
                var t = $(this).children(), e = t.data("value"), s = $("<option></option>").text(t.text()).val(e);
                e == i && s.prop("selected", !0), n.append(s)
            }), n
        }

        var e = i.find("a");
        if (i.hasClass("in")) {
            var n = $("#header-widgets .account");
            e.append(n.find("img").clone().addClass("profile")), e.append($("<b></b>").text(n.find(".hi").text()))
        } else e.attr("href", $("#signin").attr("href"));
        t("currency").change(function () {
            track({
                key: "Side Menu",
                loc: "Change Currency",
                evt: "Select"
            }), $("#body").addClass("loading"), postAndReload("/users/set_currency/", "currency", $(this).val())
        }).prependTo("#menu-bottom"), t("language").change(function () {
            track({
                key: "Side Menu",
                loc: "Change Language",
                evt: "Select"
            }), $("#body").addClass("loading"), postAndReload("/users/set_language/", "lang", $(this).val())
        }).prependTo("#menu-bottom")
    }), n.click(t), isTouchDevice && (e.on("touchmove", function (t) {
        e[0].scrollHeight <= e.height() && t.preventDefault()
    }), n.on("touchmove", function (t) {
        t.preventDefault()
    })), $(window).on("widthchange", function () {
        e.hasClass("open") && (e.hasClass("opening") ? setTimeout(t, 300) : t())
    }), i.hasClass("in") && i.click(function (t) {
        t.preventDefault(), $(t.target).blur(), i.hasClass("open") || (i.addClass("open"), setTimeout(function () {
            $(document).one("click", function (t) {
                $(t.target).hasClass("logout") ? location.href = i.find("a").attr("href") : i.removeClass("open")
            })
        }, 0))
    })
});
var isSigninOrSignup = "/login" == window.location.pathname || "/signup" == window.location.pathname, isSvgSupported = document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"), isTouchDevice = !1, $window = $(window), $_body = $("#body"), windowWidth, windowHeight, previousWindowWidth, previousWindowHeight;
"ontouchstart"in document.documentElement && ($_body.addClass("touch"), isTouchDevice = !0), $(function () {
    $("input, textarea").placeholder(), windowWidth = previousWindowWidth = $window.width(), windowHeight = previousWindowHeight = $window.height(), $window.resize(function () {
        previousWindowWidth = windowWidth, previousWindowHeight = windowHeight, windowWidth = $window.width(), windowHeight = $window.height();
        var t = windowWidth != previousWindowWidth, e = windowHeight != previousWindowHeight;
        t && $window.trigger("widthchange"), e && $window.trigger("heightchange"), (t || e) && $window.trigger("widthorheightchange")
    }), $_body.addClass("ready")
}), $window.load(function () {
    $_body.addClass("load")
}), $.ajaxSetup({
    statusCode: {
        401: function (t) {
            var e = t.getResponseHeader("Location");
            e && location.replace(e)
        }
    }
});





