if (typeof NGANLUONG == "undefined" || !NGANLUONG) {
    var NGANLUONG = {};
}
NGANLUONG.apps = NGANLUONG.apps || {};
(function() {
    var ll1 = { trigger: null, url: null };
    NGANLUONG.apps.MCFlow = function(lll) {
        var jj = this;
        jj.UI = {};
        jj._lj(lll);
        jj.setTrigger = function(ll) { jj._l1(ll); };
        jj.startFlow = function(url) {
            var il = jj._li();
            if (il.location) {
                il.location = url;
            } else {
                il.src = url;
            }
        };
        jj.closeFlow = function() { jj._i(); };
        jj.isOpen = function() { return jj.isOpen; };
    };
    NGANLUONG.apps.MCFlow.prototype = {
        name: "PPDGFrame", isOpen: false,
        _lj: function(lll) {
            if (lll) {
                for (var key in ll1) {
                    if (typeof lll[key] !== "undefined") {
                        this[key] = lll[key];
                    } else {
                        this[key] = ll1[key];
                    }
                }
            }
            if (this.trigger) {
                this._l1(this.trigger);
            }
            this._ij();
        },
        _li: function() {
            this._ii();
            this._j();
            this._ll();
            this._il();
            this.isOpen = true;
            return this.UI.ll;
        },
        _ii: function() {
            this.UI.l1 = document.createElement("div");
            this.UI.l1.id = this.name;
            this.UI.li = document.createElement("div");
            this.UI.li.className = "panel";
            this.UI.close = document.createElement("div");
            this.UI.close.className = "close";
            try {
                this.UI.ll = document.createElement("<iframe name=\"" + this.name + "\">");
            } catch (e) {
                this.UI.ll = document.createElement("iframe");
                this.UI.ll.name = this.name;
            }
            this.UI.ll.frameBorder = 0;
            this.UI.ll.border = 0;
            this.UI.ll.scrolling = "no";
            this.UI.ll.allowTransparency = "true";
            this.UI.i1 = document.createElement("div");
            this.UI.i1.className = "mask";
            this.UI.li.appendChild(this.UI.close);
            this.UI.li.appendChild(this.UI.ll);
            this.UI.l1.appendChild(this.UI.i1);
            this.UI.l1.appendChild(this.UI.li);
            document.body.appendChild(this.UI.l1);
        },
        _j: function() {
            var windowWidth, windowHeight, scrollWidth, scrollHeight, width, height;
            if (window.innerHeight && window.scrollMaxY) {
                scrollWidth = window.innerWidth + window.scrollMaxX;
                scrollHeight = window.innerHeight + window.scrollMaxY;
            } else if (document.body.scrollHeight > document.body.offsetHeight) {
                scrollWidth = document.body.scrollWidth;
                scrollHeight = document.body.scrollHeight;
            } else {
                scrollWidth = document.body.offsetWidth;
                scrollHeight = document.body.offsetHeight;
            }
            if (window.innerHeight) {
                windowWidth = window.innerWidth;
                windowHeight = window.innerHeight;
            } else if (document.documentElement && document.documentElement.clientHeight) {
                windowWidth = document.documentElement.clientWidth;
                windowHeight = document.documentElement.clientHeight;
            } else if (document.body) {
                windowWidth = document.body.clientWidth;
                windowHeight = document.body.clientHeight;
            }
            width = windowWidth > scrollWidth ? windowWidth : scrollWidth;
            height = windowHeight > scrollHeight ? windowHeight : scrollHeight;
            this.UI.i1.style.width = width + "px";
            this.UI.i1.style.height = height + "px";
        },
        _ll: function(e) {
            var width, height, scrollY;
            if (window.innerWidth) {
                width = window.innerWidth;
                height = window.innerHeight;
                scrollY = window.pageYOffset;
            } else if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
                width = document.documentElement.clientWidth;
                height = document.documentElement.clientHeight;
                scrollY = document.documentElement.scrollTop;
            } else if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                width = document.body.clientWidth;
                height = document.body.clientHeight;
                scrollY = document.body.scrollTop;
            }
            this.UI.li.style.left = Math.round((width - this.UI.ll.offsetWidth) / 2) + "px";
            var ij = Math.round((height - this.UI.ll.offsetHeight) / 2) + scrollY;
            if (ij < 5) {
                ij = 10;
            }
            this.UI.li.style.top = ij + "px";
        },
        _il: function() {
            il(this.UI.close, "click", this._i, this);
            il(window, "resize", this._j, this);
            il(window, "resize", this._ll, this);
            il(window, "unload", this._i, this);
        },
        _l1: function(ll) {
            ll = document.getElementById(ll);
            if (ll && ll.form) {
                ll.form.target = this.name;
            } else if (ll && ll.tagName.toLowerCase() == "a") {
                ll.target = this.name;
            }
            il(ll, "click", this._i1, this);
        },
        _i1: function(e) {
            var il = this._li();
            if (this.url != null) {
                if (il.location) {
                    il.location = this.url;
                } else {
                    il.src = this.url;
                }
            }
        },
        _i: function(e) {
            if (this.isOpen && this.UI.l1.parentNode) {
                this.UI.l1.parentNode.removeChild(this.UI.l1);
            }
            jl(window, "resize", this._j);
            jl(window, "resize", this._ll);
            jl(window, "unload", this._i);
            this.isOpen = false;
        },
        _ij: function() {
            var css = "", lj = document.createElement("style");
            css += "#" + this.name + " { z-index:20002; position:absolute; top:0; left:0; }";
            css += "#" + this.name + " .panel { z-index:20003; position:relative; }";
            css += "#" + this.name + " .panel iframe { width:516px; height:700px; border:0; }";
            css += "#" + this.name + " .panel .close { width:26px; height:26px; border:0; display:block; position:absolute; margin-left:486px; cursor:pointer; }";
            css += "#" + this.name + " .mask { z-index:20001; position:absolute; top:0; left:0; background-color:#000; opacity:0.6; filter:alpha(opacity=60); }";
            lj.type = "text/css";
            if (lj.styleSheet) {
                lj.styleSheet.cssText = css;
            } else {
                lj.appendChild(document.createTextNode(css));
            }
            document.getElementsByTagName("head")[0].appendChild(lj);
        }
    };
    var ii = [];

    function il(j, type, fn, scope) {
        scope = scope || j;
        var li;
        if (j.addEventListener) {
            li = function(e) { fn.call(scope, e); };
            j.addEventListener(type, li, false);
        } else if (j.attachEvent) {
            li = function() {
                var e = window.event;
                e.target = e.target || e.srcElement;
                e.llj = function() { window.event.returnValue = false; };
                fn.call(scope, e);
            };
            j.attachEvent("on" + type, li);
        }
        ii.push([j, type, fn, li]);
    }

    function jl(j, type, fn) {
        var li, item, len, i;
        for (i = 0; i < ii.length; i++) {
            item = ii[i];
            if (item[0] == j && item[1] == type && item[2] == fn) {
                li = item[3];
                if (li) {
                    if (j.j1) {
                        j.j1(type, li, false);
                    } else if (j.lli) {
                        j.lli("on" + type, li);
                    }
                }
            }
        }
    }

    function ji(ij) {
        do {
            ij = ij.parentNode;
        } while (ij && ij.nodeType != 1);
        return ij;
    }

})();