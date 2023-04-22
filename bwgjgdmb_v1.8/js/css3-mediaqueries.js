// if(typeof Object.create!=="function"){Object.create=function(e){function t(){}t.prototype=e;return new t}}var ua={toString:function(){return navigator.userAgent},test:function(e){return this.toString().toLowerCase().indexOf(e.toLowerCase())>-1}};ua.version=(ua.toString().toLowerCase().match(/[\s\S]+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[])[1];ua.webkit=ua.test("webkit");ua.gecko=ua.test("gecko")&&!ua.webkit;ua.opera=ua.test("opera");ua.ie=ua.test("msie")&&!ua.opera;ua.ie6=ua.ie&&document.compatMode&&typeof document.documentElement.style.maxHeight==="undefined";ua.ie7=ua.ie&&document.documentElement&&typeof document.documentElement.style.maxHeight!=="undefined"&&typeof XDomainRequest==="undefined";ua.ie8=ua.ie&&typeof XDomainRequest!=="undefined";var domReady=function(){var e=[];var t=function(){if(!arguments.callee.done){arguments.callee.done=true;for(var t=0;t<e.length;t++){e[t]()}}};if(document.addEventListener){document.addEventListener("DOMContentLoaded",t,false)}if(ua.ie){(function(){try{document.documentElement.doScroll("left")}catch(e){setTimeout(arguments.callee,50);return}t()})();document.onreadystatechange=function(){if(document.readyState==="complete"){document.onreadystatechange=null;t()}}}if(ua.webkit&&document.readyState){(function(){if(document.readyState!=="loading"){t()}else{setTimeout(arguments.callee,10)}})()}window.onload=t;return function(t){if(typeof t==="function"){e[e.length]=t}return t}}();var cssHelper=function(){var e={BLOCKS:/[^\s{;][^{;]*\{(?:[^{}]*\{[^{}]*\}[^{}]*|[^{}]*)*\}/g,BLOCKS_INSIDE:/[^\s{][^{]*\{[^{}]*\}/g,DECLARATIONS:/[a-zA-Z\-]+[^;]*:[^;]+;/g,RELATIVE_URLS:/url\(['"]?([^\/\)'"][^:\)'"]+)['"]?\)/g,REDUNDANT_COMPONENTS:/(?:\/\*([^*\\\\]|\*(?!\/))+\*\/|@import[^;]+;)/g,REDUNDANT_WHITESPACE:/\s*(,|:|;|\{|\})\s*/g,WHITESPACE_IN_PARENTHESES:/\(\s*(\S*)\s*\)/g,MORE_WHITESPACE:/\s{2,}/g,FINAL_SEMICOLONS:/;\}/g,NOT_WHITESPACE:/\S+/g};var t,n=false;var r=[];var s=function(e){if(typeof e==="function"){r[r.length]=e}};var o=function(){for(var e=0;e<r.length;e++){r[e](t)}};var u={};var a=function(e,t){if(u[e]){var n=u[e].listeners;if(n){for(var r=0;r<n.length;r++){n[r](t)}}}};var f=function(e,t,n){if(ua.ie&&!window.XMLHttpRequest){window.XMLHttpRequest=function(){return new ActiveXObject("Microsoft.XMLHTTP")}}if(!XMLHttpRequest){return""}var r=new XMLHttpRequest;try{r.open("get",e,true);r.setRequestHeader("X_REQUESTED_WITH","XMLHttpRequest")}catch(i){n();return}var s=false;setTimeout(function(){s=true},5e3);
//     document.documentElement.style.cursor="progress";r.onreadystatechange=function(){if(r.readyState===4&&!s){if(!r.status&&location.protocol==="file:"||r.status>=200&&r.status<300||r.status===304||navigator.userAgent.indexOf("Safari")>-1&&typeof r.status==="undefined"){t(r.responseText)}else{n()}document.documentElement.style.cursor="";r=null}};r.send("")};var l=function(t){t=t.replace(e.REDUNDANT_COMPONENTS,"");t=t.replace(e.REDUNDANT_WHITESPACE,"$1");t=t.replace(e.WHITESPACE_IN_PARENTHESES,"($1)");t=t.replace(e.MORE_WHITESPACE," ");t=t.replace(e.FINAL_SEMICOLONS,"}");return t};var c={stylesheet:function(t){var n={};var r=[],i=[],s=[],o=[];var u=t.cssHelperText;var a=t.getAttribute("media");if(a){var f=a.toLowerCase().split(",")}else{var f=["all"]}for(var l=0;l<f.length;l++){r[r.length]=c.mediaQuery(f[l],n)}var h=u.match(e.BLOCKS);if(h!==null){for(var l=0;l<h.length;l++){if(h[l].substring(0,7)==="@media "){var p=c.mediaQueryList(h[l],n);s=s.concat(p.getRules());i[i.length]=p}else{s[s.length]=o[o.length]=c.rule(h[l],n,null)}}}n.element=t;n.getCssText=function(){return u};n.getAttrMediaQueries=function(){return r};n.getMediaQueryLists=function(){return i};n.getRules=function(){return s};n.getRulesWithoutMQ=function(){return o};return n},mediaQueryList:function(t,n){var r={};var i=t.indexOf("{");var s=t.substring(0,i);t=t.substring(i+1,t.length-1);var o=[],u=[];var a=s.toLowerCase().substring(7).split(",");for(var f=0;f<a.length;f++){o[o.length]=c.mediaQuery(a[f],r)}var l=t.match(e.BLOCKS_INSIDE);if(l!==null){for(f=0;f<l.length;f++){u[u.length]=c.rule(l[f],n,r)}}r.type="mediaQueryList";r.getMediaQueries=function(){return o};r.getRules=function(){return u};r.getListText=function(){return s};r.getCssText=function(){return t};return r},mediaQuery:function(t,n){t=t||"";var r,i;if(n.type==="mediaQueryList"){r=n}else{i=n}var s=false,o;var u=[];var a=true;var f=t.match(e.NOT_WHITESPACE);for(var l=0;l<f.length;l++){var c=f[l];if(!o&&(c==="not"||c==="only")){if(c==="not"){s=true}}else if(!o){o=c}else if(c.charAt(0)==="("){var h=c.substring(1,c.length-1).split(":");u[u.length]={mediaFeature:h[0],value:h[1]||null}}}return{getQueryText:function(){return t},getAttrStyleSheet:function(){return i||null},getList:function(){return r||null},getValid:function(){return a},getNot:function(){return s},getMediaType:function(){return o},getExpressions:function(){return u}}},rule:function(e,t,n){var r={};var i=e.indexOf("{");var s=e.substring(0,i);var o=s.split(",");var u=[];var a=e.substring(i+1,e.length-1).split(";");for(var f=0;f<a.length;f++){u[u.length]=c.declaration(a[f],r)}r.getStylesheet=function(){return t||null};r.getMediaQueryList=function(){return n||null};r.getSelectors=function(){return o};r.getSelectorText=function(){return s};r.getDeclarations=function(){return u};r.getPropertyValue=function(e){for(var t=0;t<u.length;t++){if(u[t].getProperty()===e){return u[t].getValue()}}return null};return r},declaration:function(e,t){var n=e.indexOf(":");var r=e.substring(0,n);var i=e.substring(n+1);return{getRule:function(){return t||null},getProperty:function(){return r},getValue:function(){return i}}}};var h=function(e){if(typeof e.cssHelperText!=="string"){return}var n={stylesheet:null,mediaQueryLists:[],rules:[],selectors:{},declarations:[],properties:{}};var r=n.stylesheet=c.stylesheet(e);var s=n.mediaQueryLists=r.getMediaQueryLists();var o=n.rules=r.getRules();var u=n.selectors;var a=function(e){var t=e.getSelectors();for(var n=0;n<t.length;n++){var r=t[n];if(!u[r]){u[r]=[]}u[r][u[r].length]=e}};for(i=0;i<o.length;i++){a(o[i])}var f=n.declarations;for(i=0;i<o.length;i++){f=n.declarations=f.concat(o[i].getDeclarations())}var l=n.properties;for(i=0;i<f.length;i++){var h=f[i].getProperty();if(!l[h]){l[h]=[]}l[h][l[h].length]=f[i]}e.cssHelperParsed=n;t[t.length]=e;return n};var p=function(e,t){return;e.cssHelperText=l(t||e.innerHTML);return h(e)};var d=function(){n=true;t=[];var r=[];var i=function(){for(var e=0;e<r.length;e++){h(r[e])}var t=document.getElementsByTagName("style");for(e=0;e<t.length;e++){p(t[e])}n=false;o()};var s=document.getElementsByTagName("link");for(var u=0;u<s.length;u++){var a=s[u];if(a.getAttribute("rel").indexOf("style")>-1&&a.href&&a.href.length!==0&&!a.disabled){r[r.length]=a}}if(r.length>0){var c=0;var d=function(){c++;if(c===r.length){i()}};var v=function(t){var n=t.href;f(n,function(r){r=l(r).replace(e.RELATIVE_URLS,"url("+n.substring(0,n.lastIndexOf("/"))+"/$1)");t.cssHelperText=r;d()},d)};for(u=0;u<r.length;u++){v(r[u])}}else{i()}};var v={stylesheets:"array",mediaQueryLists:"array",rules:"array",selectors:"object",declarations:"array",properties:"object"};var m={stylesheets:null,mediaQueryLists:null,rules:null,selectors:null,declarations:null,properties:null};var g=function(e,t){if(m[e]!==null){if(v[e]==="array"){return m[e]=m[e].concat(t)}else{var n=m[e];for(var r in t){if(t.hasOwnProperty(r)){if(!n[r]){n[r]=t[r]}else{n[r]=n[r].concat(t[r])}}}return n}}};var y=function(e){m[e]=v[e]==="array"?[]:{};for(var n=0;n<t.length;n++){var r=e==="stylesheets"?"stylesheet":e;g(e,t[n].cssHelperParsed[r])}return m[e]};var b=function(e){if(typeof window.innerWidth!="undefined"){return window["inner"+e]}else if(typeof document.documentElement!=="undefined"&&typeof document.documentElement.clientWidth!=="undefined"&&document.documentElement.clientWidth!=0){return document.documentElement["client"+e]}};return{addStyle:function(e,t,n){var r=document.createElement("style");r.setAttribute("type","text/css");if(t&&t.length>0){r.setAttribute("media",t.join(","))}document.getElementsByTagName("head")[0].appendChild(r);if(r.styleSheet){r.styleSheet.cssText=e}else{r.appendChild(document.createTextNode(e))}r.addedWithCssHelper=true;if(typeof n==="undefined"||n===true){cssHelper.parsed(function(t){var n=p(r,e);for(var i in n){if(n.hasOwnProperty(i)){g(i,n[i])}}a("newStyleParsed",r)})}else{r.parsingDisallowed=true}return r},removeStyle:function(e){return e.parentNode.removeChild(e)},parsed:function(e){if(n){s(e)}else{if(typeof t!=="undefined"){if(typeof e==="function"){e(t)}}else{s(e);d()}}},stylesheets:function(e){cssHelper.parsed(function(t){e(m.stylesheets||y("stylesheets"))})},mediaQueryLists:function(e){cssHelper.parsed(function(t){e(m.mediaQueryLists||y("mediaQueryLists"))})},rules:function(e){cssHelper.parsed(function(t){e(m.rules||y("rules"))})},selectors:function(e){cssHelper.parsed(function(t){e(m.selectors||y("selectors"))})},declarations:function(e){cssHelper.parsed(function(t){e(m.declarations||y("declarations"))})},properties:function(e){cssHelper.parsed(function(t){e(m.properties||y("properties"))})},broadcast:a,addListener:function(e,t){if(typeof t==="function"){if(!u[e]){u[e]={listeners:[]}}u[e].listeners[u[e].listeners.length]=t}},removeListener:function(e,t){if(typeof t==="function"&&u[e]){var n=u[e].listeners;for(var r=0;r<n.length;r++){if(n[r]===t){n.splice(r,1);r-=1}}}},getViewportWidth:function(){return b("Width")},getViewportHeight:function(){return b("Height")}}}();domReady(function(){var t;var n={LENGTH_UNIT:/[0-9]+(em|ex|px|in|cm|mm|pt|pc)$/,RESOLUTION_UNIT:/[0-9]+(dpi|dpcm)$/,ASPECT_RATIO:/^[0-9]+\/[0-9]+$/,ABSOLUTE_VALUE:/^[0-9]*(\.[0-9]+)*$/};var r=[];var i=function(){var e="css3-mediaqueries-test";var t=document.createElement("div");t.id=e;var n=cssHelper.addStyle("@media all and (width) { #"+e+" { width: 1px !important; } }",[],false);document.body.appendChild(t);var r=t.offsetWidth===1;n.parentNode.removeChild(n);t.parentNode.removeChild(t);i=function(){return r};return r};var s=function(){t=document.createElement("div");t.style.cssText="position:absolute;top:-9999em;left:-9999em;"+"margin:0;border:none;padding:0;width:1em;font-size:1em;";document.body.appendChild(t);if(t.offsetWidth!==16){t.style.fontSize=16/t.offsetWidth+"em"}t.style.width=""};var o=function(e){t.style.width=e;var n=t.offsetWidth;t.style.width="";return n};var u=function(e,t){var r=e.length;var i=e.substring(0,4)==="min-";var s=!i&&e.substring(0,4)==="max-";if(t!==null){var u;var a;if(n.LENGTH_UNIT.exec(t)){u="length";a=o(t)}else if(n.RESOLUTION_UNIT.exec(t)){u="resolution";a=parseInt(t,10);var f=t.substring((a+"").length)}else if(n.ASPECT_RATIO.exec(t)){u="aspect-ratio";a=t.split("/")}else if(n.ABSOLUTE_VALUE){u="absolute";a=t}else{u="unknown"}}var l,c;if("device-width"===e.substring(r-12,r)){l=screen.width;if(t!==null){if(u==="length"){return i&&l>=a||s&&l<a||!i&&!s&&l===a}else{return false}}else{return l>0}}else if("device-height"===e.substring(r-13,r)){c=screen.height;if(t!==null){if(u==="length"){return i&&c>=a||s&&c<a||!i&&!s&&c===a}else{return false}}else{return c>0}}else if("width"===e.substring(r-5,r)){l=document.documentElement.clientWidth||document.body.clientWidth;if(t!==null){if(u==="length"){return i&&l>=a||s&&l<a||!i&&!s&&l===a}else{return false}}else{return l>0}}else if("height"===e.substring(r-6,r)){c=document.documentElement.clientHeight||document.body.clientHeight;if(t!==null){if(u==="length"){return i&&c>=a||s&&c<a||!i&&!s&&c===a}else{return false}}else{return c>0}}else if("device-aspect-ratio"===e.substring(r-19,r)){return u==="aspect-ratio"&&screen.width*a[1]===screen.height*a[0]}else if("color-index"===e.substring(r-11,r)){var h=Math.pow(2,screen.colorDepth);if(t!==null){if(u==="absolute"){return i&&h>=a||s&&h<a||!i&&!s&&h===a}else{return false}}else{return h>0}}else if("color"===e.substring(r-5,r)){var p=screen.colorDepth;if(t!==null){if(u==="absolute"){return i&&p>=a||s&&p<a||!i&&!s&&p===a}else{return false}}else{return p>0}}else if("resolution"===e.substring(r-10,r)){var d;if(f==="dpcm"){d=o("1cm")}else{d=o("1in")}if(t!==null){if(u==="resolution"){return i&&d>=a||s&&d<a||!i&&!s&&d===a}else{return false}}else{return d>0}}else{return false}};var a=function(e){var t=e.getValid();var n=e.getExpressions();var r=n.length;if(r>0){for(var i=0;i<r&&t;i++){t=u(n[i].mediaFeature,n[i].value)}var s=e.getNot();return t&&!s||s&&!t}return t};var f=function(e,t){var n=e.getMediaQueries();var i={};for(var s=0;s<n.length;s++){var o=n[s].getMediaType();if(n[s].getExpressions().length===0){continue}var u=true;if(o!=="all"&&t&&t.length>0){u=false;for(var f=0;f<t.length;f++){if(t[f]===o){u=true}}}if(u&&a(n[s])){i[o]=true}}var l=[],c=0;for(var h in i){if(i.hasOwnProperty(h)){if(c>0){l[c++]=","}l[c++]=h}}if(l.length>0){r[r.length]=cssHelper.addStyle("@media "+l.join("")+"{"+e.getCssText()+"}",t,false)}};var l=function(e,t){for(var n=0;n<e.length;n++){f(e[n],t)}};var c=function(e){var t=e.getAttrMediaQueries();var n=false;var i={};for(var s=0;s<t.length;s++){if(a(t[s])){i[t[s].getMediaType()]=t[s].getExpressions().length>0}}var o=[],u=[];for(var f in i){if(i.hasOwnProperty(f)){o[o.length]=f;if(i[f]){u[u.length]=f}if(f==="all"){n=true}}}if(u.length>0){r[r.length]=cssHelper.addStyle(e.getCssText(),u,false)}var c=e.getMediaQueryLists();if(n){l(c)}else{l(c,o)}};var h=function(e){for(var t=0;t<e.length;t++){c(e[t])}if(ua.ie){document.documentElement.style.display="block";setTimeout(function(){document.documentElement.style.display=""},0);setTimeout(function(){cssHelper.broadcast("cssMediaQueriesTested")},100)}else{cssHelper.broadcast("cssMediaQueriesTested")}};var p=function(){for(var e=0;e<r.length;e++){cssHelper.removeStyle(r[e])}r=[];cssHelper.stylesheets(h)};var d=0;var v=function(){var e=cssHelper.getViewportWidth();var t=cssHelper.getViewportHeight();if(ua.ie){var n=document.createElement("div");n.style.position="absolute";n.style.top="-9999em";n.style.overflow="scroll";document.body.appendChild(n);d=n.offsetWidth-n.clientWidth;document.body.removeChild(n)}var r;var s=function(){var n=cssHelper.getViewportWidth();var s=cssHelper.getViewportHeight();if(Math.abs(n-e)>d||Math.abs(s-t)>d){e=n;t=s;clearTimeout(r);r=setTimeout(function(){if(!i()){p()}else{cssHelper.broadcast("cssMediaQueriesTested")}},500)}};window.onresize=function(){var e=window.onresize||function(){};return function(){e();s()}}()};var m=document.documentElement;m.style.marginLeft="-32767px";setTimeout(function(){m.style.marginLeft=""},5e3);return function(){if(!i()){cssHelper.addListener("newStyleParsed",function(e){c(e.cssHelperParsed.stylesheet)});cssHelper.addListener("cssMediaQueriesTested",function(){if(ua.ie){m.style.width="1px"}setTimeout(function(){m.style.width="";m.style.marginLeft=""},0);cssHelper.removeListener("cssMediaQueriesTested",arguments.callee)});s();p()}else{m.style.marginLeft=""}v()}}());try{document.execCommand("BackgroundImageCache",false,true)}catch(e){}




if (typeof Object.create !== "function") {
    Object.create = function(e) {
        function t() {}
        t.prototype = e;
        return new t
    }
}
var ua = {
    toString: function() {
        return navigator.userAgent
    },
    test: function(e) {
        return this.toString()
            .toLowerCase()
            .indexOf(e.toLowerCase()) > -1
    }
};
ua.version = (ua.toString()
    .toLowerCase()
    .match(/[\s\S]+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [])[1];
ua.webkit = ua.test("webkit");
ua.gecko = ua.test("gecko") && !ua.webkit;
ua.opera = ua.test("opera");
ua.ie = ua.test("msie") && !ua.opera;
ua.ie6 = ua.ie && document.compatMode && typeof document.documentElement.style.maxHeight === "undefined";
ua.ie7 = ua.ie && document.documentElement && typeof document.documentElement.style.maxHeight !== "undefined" && typeof XDomainRequest === "undefined";
ua.ie8 = ua.ie && typeof XDomainRequest !== "undefined";
var domReady = function() {
    var e = [];
    var t = function() {
        if (!arguments.callee.done) {
            arguments.callee.done = true;
            for (var t = 0; t < e.length; t++) {
                e[t]()
            }
        }
    };
    if (document.addEventListener) {
        document.addEventListener("DOMContentLoaded", t, false)
    }
    if (ua.ie) {
        (function() {
            try {
                document.documentElement.doScroll("left")
            } catch (e) {
                setTimeout(arguments.callee, 50);
                return
            }
            t()
        })();
        document.onreadystatechange = function() {
            if (document.readyState === "complete") {
                document.onreadystatechange = null;
                t()
            }
        }
    }
    if (ua.webkit && document.readyState) {
        (function() {
            if (document.readyState !== "loading") {
                t()
            } else {
                setTimeout(arguments.callee, 10)
            }
        })()
    }
    window.onload = t;
    return function(t) {
        if (typeof t === "function") {
            e[e.length] = t
        }
        return t
    }
}();
var cssHelper = function() {
    var e = {
        BLOCKS: /[^\s{;][^{;]*\{(?:[^{}]*\{[^{}]*\}[^{}]*|[^{}]*)*\}/g,
        BLOCKS_INSIDE: /[^\s{][^{]*\{[^{}]*\}/g,
        DECLARATIONS: /[a-zA-Z\-]+[^;]*:[^;]+;/g,
        RELATIVE_URLS: /url\(['"]?([^\/\)'"][^:\)'"]+)['"]?\)/g,
        REDUNDANT_COMPONENTS: /(?:\/\*([^*\\\\]|\*(?!\/))+\*\/|@import[^;]+;)/g,
        REDUNDANT_WHITESPACE: /\s*(,|:|;|\{|\})\s*/g,
        WHITESPACE_IN_PARENTHESES: /\(\s*(\S*)\s*\)/g,
        MORE_WHITESPACE: /\s{2,}/g,
        FINAL_SEMICOLONS: /;\}/g,
        NOT_WHITESPACE: /\S+/g
    };
    var t, n = false;
    var r = [];
    var s = function(e) {
        if (typeof e === "function") {
            r[r.length] = e
        }
    };
    var o = function() {
        for (var e = 0; e < r.length; e++) {
            r[e](t)
        }
    };
    var u = {};
    var a = function(e, t) {
        if (u[e]) {
            var n = u[e].listeners;
            if (n) {
                for (var r = 0; r < n.length; r++) {
                    n[r](t)
                }
            }
        }
    };
    var f = function(e, t, n)
    {
        if (ua.ie && !window.XMLHttpRequest) {
            window.XMLHttpRequest = function() {
                return new ActiveXObject("Microsoft.XMLHTTP")
            }
        }
        if (!XMLHttpRequest) {
            return ""
        }
        var r = new XMLHttpRequest;
        try {
            r.open("get", e, true);
            r.setRequestHeader("X_REQUESTED_WITH", "XMLHttpRequest")
        } catch (i) {
            n();
            return
        }
        var s = false;
        setTimeout(function() {
            s = true
        }, 5e3);
        document.documentElement.style.cursor = "progress";
        r.onreadystatechange = function() {
            if (r.readyState === 4 && !s) {
                if (!r.status && location.protocol === "file:" || r.status >= 200 && r.status < 300 || r.status === 304 || navigator.userAgent.indexOf("Safari") > -1 && typeof r.status === "undefined") {
                    t(r.responseText)
                } else {
                    n()
                }
                document.documentElement.style.cursor = "";
                r = null
            }
        };
        r.send("")
    };
    var l = function(t) {
        t = t.replace(e.REDUNDANT_COMPONENTS, "");
        t = t.replace(e.REDUNDANT_WHITESPACE, "$1");
        t = t.replace(e.WHITESPACE_IN_PARENTHESES, "($1)");
        t = t.replace(e.MORE_WHITESPACE, " ");
        t = t.replace(e.FINAL_SEMICOLONS, "}");
        return t
    };
    var c = {
        stylesheet: function(t) {
            var n = {};
            var r = [],
                i = [],
                s = [],
                o = [];
            var u = t.cssHelperText;
            var a = t.getAttribute("media");
            if (a) {
                var f = a.toLowerCase()
                    .split(",")
            } else {
                var f = ["all"]
            }
            for (var l = 0; l < f.length; l++) {
                r[r.length] = c.mediaQuery(f[l], n)
            }
            var h = u.match(e.BLOCKS);
            if (h !== null) {
                for (var l = 0; l < h.length; l++) {
                    if (h[l].substring(0, 7) === "@media ") {
                        var p = c.mediaQueryList(h[l], n);
                        s = s.concat(p.getRules());
                        i[i.length] = p
                    } else {
                        s[s.length] = o[o.length] = c.rule(h[l], n, null)
                    }
                }
            }
            n.element = t;
            n.getCssText = function() {
                return u
            };
            n.getAttrMediaQueries = function() {
                return r
            };
            n.getMediaQueryLists = function() {
                return i
            };
            n.getRules = function() {
                return s
            };
            n.getRulesWithoutMQ = function() {
                return o
            };
            return n
        },
        mediaQueryList: function(t, n) {
            var r = {};
            var i = t.indexOf("{");
            var s = t.substring(0, i);
            t = t.substring(i + 1, t.length - 1);
            var o = [],
                u = [];
            var a = s.toLowerCase()
                .substring(7)
                .split(",");
            for (var f = 0; f < a.length; f++) {
                o[o.length] = c.mediaQuery(a[f], r)
            }
            var l = t.match(e.BLOCKS_INSIDE);
            if (l !== null) {
                for (f = 0; f < l.length; f++) {
                    u[u.length] = c.rule(l[f], n, r)
                }
            }
            r.type = "mediaQueryList";
            r.getMediaQueries = function() {
                return o
            };
            r.getRules = function() {
                return u
            };
            r.getListText = function() {
                return s
            };
            r.getCssText = function() {
                return t
            };
            return r
        },
        mediaQuery: function(t, n) {
            t = t || "";
            var r, i;
            if (n.type === "mediaQueryList") {
                r = n
            } else {
                i = n
            }
            var s = false,
                o;
            var u = [];
            var a = true;
            var f = t.match(e.NOT_WHITESPACE);
            for (var l = 0; l < f.length; l++) {
                var c = f[l];
                if (!o && (c === "not" || c === "only")) {
                    if (c === "not") {
                        s = true
                    }
                } else if (!o) {
                    o = c
                } else if (c.charAt(0) === "(") {
                    var h = c.substring(1, c.length - 1)
                        .split(":");
                    u[u.length] = {
                        mediaFeature: h[0],
                        value: h[1] || null
                    }
                }
            }
            return {
                getQueryText: function() {
                    return t
                },
                getAttrStyleSheet: function() {
                    return i || null
                },
                getList: function() {
                    return r || null
                },
                getValid: function() {
                    return a
                },
                getNot: function() {
                    return s
                },
                getMediaType: function() {
                    return o
                },
                getExpressions: function() {
                    return u
                }
            }
        },
        rule: function(e, t, n) {
            var r = {};
            var i = e.indexOf("{");
            var s = e.substring(0, i);
            var o = s.split(",");
            var u = [];
            var a = e.substring(i + 1, e.length - 1)
                .split(";");
            for (var f = 0; f < a.length; f++) {
                u[u.length] = c.declaration(a[f], r)
            }
            r.getStylesheet = function() {
                return t || null
            };
            r.getMediaQueryList = function() {
                return n || null
            };
            r.getSelectors = function() {
                return o
            };
            r.getSelectorText = function() {
                return s
            };
            r.getDeclarations = function() {
                return u
            };
            r.getPropertyValue = function(e) {
                for (var t = 0; t < u.length; t++) {
                    if (u[t].getProperty() === e) {
                        return u[t].getValue()
                    }
                }
                return null
            };
            return r
        },
        declaration: function(e, t) {
            var n = e.indexOf(":");
            var r = e.substring(0, n);
            var i = e.substring(n + 1);
            return {
                getRule: function() {
                    return t || null
                },
                getProperty: function() {
                    return r
                },
                getValue: function() {
                    return i
                }
            }
        }
    };
    var h = function(e) {
        if (typeof e.cssHelperText !== "string") {
            return
        }
        var n = {
            stylesheet: null,
            mediaQueryLists: [],
            rules: [],
            selectors: {},
            declarations: [],
            properties: {}
        };
        var r = n.stylesheet = c.stylesheet(e);
        var s = n.mediaQueryLists = r.getMediaQueryLists();
        var o = n.rules = r.getRules();
        var u = n.selectors;
        var a = function(e) {
            var t = e.getSelectors();
            for (var n = 0; n < t.length; n++) {
                var r = t[n];
                if (!u[r]) {
                    u[r] = []
                }
                u[r][u[r].length] = e
            }
        };
        for (i = 0; i < o.length; i++) {
            a(o[i])
        }
        var f = n.declarations;
        for (i = 0; i < o.length; i++) {
            f = n.declarations = f.concat(o[i].getDeclarations())
        }
        var l = n.properties;
        for (i = 0; i < f.length; i++) {
            var h = f[i].getProperty();
            if (!l[h]) {
                l[h] = []
            }
            l[h][l[h].length] = f[i]
        }
        e.cssHelperParsed = n;
        t[t.length] = e;
        return n
    };
    var p = function(e, t) {
        return;
        e.cssHelperText = l(t || e.innerHTML);
        return h(e)
    };
    var d = function() {
        n = true;
        t = [];
        var r = [];
        var i = function() {
            for (var e = 0; e < r.length; e++) {
                h(r[e])
            }
            var t = document.getElementsByTagName("style");
            for (e = 0; e < t.length; e++) {
                p(t[e])
            }
            n = false;
            o()
        };
        var s = document.getElementsByTagName("link");
        for (var u = 0; u < s.length; u++) {
            var a = s[u];
            if (a.getAttribute("rel")
                .indexOf("style") > -1 && a.href && a.href.length !== 0 && !a.disabled) {
                r[r.length] = a
            }
        }
        if (r.length > 0) {
            var c = 0;
            var d = function() {
                c++;
                if (c === r.length) {
                    i()
                }
            };
            var v = function(t) {
                var n = t.href;
                f(n, function(r) {
                    r = l(r)
                        .replace(e.RELATIVE_URLS, "url(" + n.substring(0, n.lastIndexOf("/")) + "/$1)");
                    t.cssHelperText = r;
                    d()
                }, d)
            };
            for (u = 0; u < r.length; u++) {
                v(r[u])
            }
        } else {
            i()
        }
    };
    var v = {
        stylesheets: "array",
        mediaQueryLists: "array",
        rules: "array",
        selectors: "object",
        declarations: "array",
        properties: "object"
    };
    var m = {
        stylesheets: null,
        mediaQueryLists: null,
        rules: null,
        selectors: null,
        declarations: null,
        properties: null
    };
    var g = function(e, t) {
        if (m[e] !== null) {
            if (v[e] === "array") {
                return m[e] = m[e].concat(t)
            } else {
                var n = m[e];
                for (var r in t) {
                    if (t.hasOwnProperty(r)) {
                        if (!n[r]) {
                            n[r] = t[r]
                        } else {
                            n[r] = n[r].concat(t[r])
                        }
                    }
                }
                return n
            }
        }
    };
    var y = function(e) {
        m[e] = v[e] === "array" ? [] : {};
        for (var n = 0; n < t.length; n++) {
            var r = e === "stylesheets" ? "stylesheet" : e;
            g(e, t[n].cssHelperParsed[r])
        }
        return m[e]
    };
    var b = function(e) {
        if (typeof window.innerWidth != "undefined") {
            return window["inner" + e]
        } else if (typeof document.documentElement !== "undefined" && typeof document.documentElement.clientWidth !== "undefined" && document.documentElement.clientWidth != 0) {
            return document.documentElement["client" + e]
        }
    };
    return {
        addStyle: function(e, t, n) {
            var r = document.createElement("style");
            r.setAttribute("type", "text/css");
            if (t && t.length > 0) {
                r.setAttribute("media", t.join(","))
            }
            document.getElementsByTagName("head")[0].appendChild(r);
            if (r.styleSheet) {
                r.styleSheet.cssText = e
            } else {
                r.appendChild(document.createTextNode(e))
            }
            r.addedWithCssHelper = true;
            if (typeof n === "undefined" || n === true) {
                cssHelper.parsed(function(t) {
                    var n = p(r, e);
                    for (var i in n) {
                        if (n.hasOwnProperty(i)) {
                            g(i, n[i])
                        }
                    }
                    a("newStyleParsed", r)
                })
            } else {
                r.parsingDisallowed = true
            }
            return r
        },
        removeStyle: function(e) {
            return e.parentNode.removeChild(e)
        },
        parsed: function(e) {
            if (n) {
                s(e)
            } else {
                if (typeof t !== "undefined") {
                    if (typeof e === "function") {
                        e(t)
                    }
                } else {
                    s(e);
                    d()
                }
            }
        },
        stylesheets: function(e) {
            cssHelper.parsed(function(t) {
                e(m.stylesheets || y("stylesheets"))
            })
        },
        mediaQueryLists: function(e) {
            cssHelper.parsed(function(t) {
                e(m.mediaQueryLists || y("mediaQueryLists"))
            })
        },
        rules: function(e) {
            cssHelper.parsed(function(t) {
                e(m.rules || y("rules"))
            })
        },
        selectors: function(e) {
            cssHelper.parsed(function(t) {
                e(m.selectors || y("selectors"))
            })
        },
        declarations: function(e) {
            cssHelper.parsed(function(t) {
                e(m.declarations || y("declarations"))
            })
        },
        properties: function(e) {
            cssHelper.parsed(function(t) {
                e(m.properties || y("properties"))
            })
        },
        broadcast: a,
        addListener: function(e, t) {
            if (typeof t === "function") {
                if (!u[e]) {
                    u[e] = {
                        listeners: []
                    }
                }
                u[e].listeners[u[e].listeners.length] = t
            }
        },
        removeListener: function(e, t) {
            if (typeof t === "function" && u[e]) {
                var n = u[e].listeners;
                for (var r = 0; r < n.length; r++) {
                    if (n[r] === t) {
                        n.splice(r, 1);
                        r -= 1
                    }
                }
            }
        },
        getViewportWidth: function() {
            return b("Width")
        },
        getViewportHeight: function() {
            return b("Height")
        }
    }
}();
domReady(function() {
    var t;
    var n = {
        LENGTH_UNIT: /[0-9]+(em|ex|px|in|cm|mm|pt|pc)$/,
        RESOLUTION_UNIT: /[0-9]+(dpi|dpcm)$/,
        ASPECT_RATIO: /^[0-9]+\/[0-9]+$/,
        ABSOLUTE_VALUE: /^[0-9]*(\.[0-9]+)*$/
    };
    var r = [];
    var i = function() {
        var e = "css3-mediaqueries-test";
        var t = document.createElement("div");
        t.id = e;
        var n = cssHelper.addStyle("@media all and (width) { #" + e + " { width: 1px !important; } }", [], false);
        document.body.appendChild(t);
        var r = t.offsetWidth === 1;
        n.parentNode.removeChild(n);
        t.parentNode.removeChild(t);
        i = function() {
            return r
        };
        return r
    };
    var s = function() {
        t = document.createElement("div");
        t.style.cssText = "position:absolute;top:-9999em;left:-9999em;" + "margin:0;border:none;padding:0;width:1em;font-size:1em;";
        document.body.appendChild(t);
        if (t.offsetWidth !== 16) {
            t.style.fontSize = 16 / t.offsetWidth + "em"
        }
        t.style.width = ""
    };
    var o = function(e) {
        t.style.width = e;
        var n = t.offsetWidth;
        t.style.width = "";
        return n
    };
    var u = function(e, t) {
        var r = e.length;
        var i = e.substring(0, 4) === "min-";
        var s = !i && e.substring(0, 4) === "max-";
        if (t !== null) {
            var u;
            var a;
            if (n.LENGTH_UNIT.exec(t)) {
                u = "length";
                a = o(t)
            } else if (n.RESOLUTION_UNIT.exec(t)) {
                u = "resolution";
                a = parseInt(t, 10);
                var f = t.substring((a + "")
                    .length)
            } else if (n.ASPECT_RATIO.exec(t)) {
                u = "aspect-ratio";
                a = t.split("/")
            } else if (n.ABSOLUTE_VALUE) {
                u = "absolute";
                a = t
            } else {
                u = "unknown"
            }
        }
        var l, c;
        if ("device-width" === e.substring(r - 12, r)) {
            l = screen.width;
            if (t !== null) {
                if (u === "length") {
                    return i && l >= a || s && l < a || !i && !s && l === a
                } else {
                    return false
                }
            } else {
                return l > 0
            }
        } else if ("device-height" === e.substring(r - 13, r)) {
            c = screen.height;
            if (t !== null) {
                if (u === "length") {
                    return i && c >= a || s && c < a || !i && !s && c === a
                } else {
                    return false
                }
            } else {
                return c > 0
            }
        } else if ("width" === e.substring(r - 5, r)) {
            l = document.documentElement.clientWidth || document.body.clientWidth;
            if (t !== null) {
                if (u === "length") {
                    return i && l >= a || s && l < a || !i && !s && l === a
                } else {
                    return false
                }
            } else {
                return l > 0
            }
        } else if ("height" === e.substring(r - 6, r)) {
            c = document.documentElement.clientHeight || document.body.clientHeight;
            if (t !== null) {
                if (u === "length") {
                    return i && c >= a || s && c < a || !i && !s && c === a
                } else {
                    return false
                }
            } else {
                return c > 0
            }
        } else if ("device-aspect-ratio" === e.substring(r - 19, r)) {
            return u === "aspect-ratio" && screen.width * a[1] === screen.height * a[0]
        } else if ("color-index" === e.substring(r - 11, r)) {
            var h = Math.pow(2, screen.colorDepth);
            if (t !== null) {
                if (u === "absolute") {
                    return i && h >= a || s && h < a || !i && !s && h === a
                } else {
                    return false
                }
            } else {
                return h > 0
            }
        } else if ("color" === e.substring(r - 5, r)) {
            var p = screen.colorDepth;
            if (t !== null) {
                if (u === "absolute") {
                    return i && p >= a || s && p < a || !i && !s && p === a
                } else {
                    return false
                }
            } else {
                return p > 0
            }
        } else if ("resolution" === e.substring(r - 10, r)) {
            var d;
            if (f === "dpcm") {
                d = o("1cm")
            } else {
                d = o("1in")
            }
            if (t !== null) {
                if (u === "resolution") {
                    return i && d >= a || s && d < a || !i && !s && d === a
                } else {
                    return false
                }
            } else {
                return d > 0
            }
        } else {
            return false
        }
    };
    var a = function(e) {
        var t = e.getValid();
        var n = e.getExpressions();
        var r = n.length;
        if (r > 0) {
            for (var i = 0; i < r && t; i++) {
                t = u(n[i].mediaFeature, n[i].value)
            }
            var s = e.getNot();
            return t && !s || s && !t
        }
        return t
    };
    var f = function(e, t) {
        var n = e.getMediaQueries();
        var i = {};
        for (var s = 0; s < n.length; s++) {
            var o = n[s].getMediaType();
            if (n[s].getExpressions()
                .length === 0) {
                continue
            }
            var u = true;
            if (o !== "all" && t && t.length > 0) {
                u = false;
                for (var f = 0; f < t.length; f++) {
                    if (t[f] === o) {
                        u = true
                    }
                }
            }
            if (u && a(n[s])) {
                i[o] = true
            }
        }
        var l = [],
            c = 0;
        for (var h in i) {
            if (i.hasOwnProperty(h)) {
                if (c > 0) {
                    l[c++] = ","
                }
                l[c++] = h
            }
        }
        if (l.length > 0) {
            r[r.length] = cssHelper.addStyle("@media " + l.join("") + "{" + e.getCssText() + "}", t, false)
        }
    };
    var l = function(e, t) {
        for (var n = 0; n < e.length; n++) {
            f(e[n], t)
        }
    };
    var c = function(e) {
        var t = e.getAttrMediaQueries();
        var n = false;
        var i = {};
        for (var s = 0; s < t.length; s++) {
            if (a(t[s])) {
                i[t[s].getMediaType()] = t[s].getExpressions()
                    .length > 0
            }
        }
        var o = [],
            u = [];
        for (var f in i) {
            if (i.hasOwnProperty(f)) {
                o[o.length] = f;
                if (i[f]) {
                    u[u.length] = f
                }
                if (f === "all") {
                    n = true
                }
            }
        }
        if (u.length > 0) {
            r[r.length] = cssHelper.addStyle(e.getCssText(), u, false)
        }
        var c = e.getMediaQueryLists();
        if (n) {
            l(c)
        } else {
            l(c, o)
        }
    };
    var h = function(e) {
        for (var t = 0; t < e.length; t++) {
            c(e[t])
        }
        if (ua.ie) {
            document.documentElement.style.display = "block";
            setTimeout(function() {
                document.documentElement.style.display = ""
            }, 0);
            setTimeout(function() {
                cssHelper.broadcast("cssMediaQueriesTested")
            }, 100)
        } else {
            cssHelper.broadcast("cssMediaQueriesTested")
        }
    };
    var p = function() {
        for (var e = 0; e < r.length; e++) {
            cssHelper.removeStyle(r[e])
        }
        r = [];
        cssHelper.stylesheets(h)
    };
    var d = 0;
    var v = function() {
        var e = cssHelper.getViewportWidth();
        var t = cssHelper.getViewportHeight();
        if (ua.ie) {
            var n = document.createElement("div");
            n.style.position = "absolute";
            n.style.top = "-9999em";
            n.style.overflow = "scroll";
            document.body.appendChild(n);
            d = n.offsetWidth - n.clientWidth;
            document.body.removeChild(n)
        }
        var r;
        var s = function() {
            var n = cssHelper.getViewportWidth();
            var s = cssHelper.getViewportHeight();
            if (Math.abs(n - e) > d || Math.abs(s - t) > d) {
                e = n;
                t = s;
                clearTimeout(r);
                r = setTimeout(function() {
                    if (!i()) {
                        p()
                    } else {
                        cssHelper.broadcast("cssMediaQueriesTested")
                    }
                }, 500)
            }
        };
        window.onresize = function() {
            var e = window.onresize || function() {};
            return function() {
                e();
                s()
            }
        }()
    };
    var m = document.documentElement;
    m.style.marginLeft = "-32767px";
    setTimeout(function() {
        m.style.marginLeft = ""
    }, 5e3);
    return function() {
        if (!i()) {
            cssHelper.addListener("newStyleParsed", function(e) {
                c(e.cssHelperParsed.stylesheet)
            });
            cssHelper.addListener("cssMediaQueriesTested", function() {
                if (ua.ie) {
                    m.style.width = "1px"
                }
                setTimeout(function() {
                    m.style.width = "";
                    m.style.marginLeft = ""
                }, 0);
                cssHelper.removeListener("cssMediaQueriesTested", arguments.callee)
            });
            s();
            p()
        } else {
            m.style.marginLeft = ""
        }
        v()
    }
}());
try {
    document.execCommand("BackgroundImageCache", false, true)
} catch (e) {}