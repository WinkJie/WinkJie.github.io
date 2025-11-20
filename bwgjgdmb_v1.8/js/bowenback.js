/* 博闻广记 模版 js 精华代码 v1.5 www.xunzhenji.com */
//侧边上评下滚动代码
jQuery(document).ready(function($) {$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");$("#shang").mouseover(function() {up()}).mouseout(function() {clearTimeout(fq)}).click(function() {$body.animate({scrollTop: 0},400)});$("#xia").mouseover(function() {dn()}).mouseout(function() {clearTimeout(fq)}).click(function() {$body.animate({scrollTop: $(document).height()},400)});$("#empl").click(function() {$body.animate({scrollTop: $("#empl").offset().top},400)});});function up() {$wd = $(window);$wd.scrollTop($wd.scrollTop() - 1);fq = setTimeout("up()", 50)};function dn() {$wd = $(window);$wd.scrollTop($wd.scrollTop() + 1);fq = setTimeout("dn()", 50)}; 

// 双击自动滚屏
function initialize(){timer=setInterval("scrollwindow()",50)}function sc(){clearInterval(timer)}function scrollwindow(){window.scrollBy(0,1)}var currentpos,timer;document.onmousedown=sc,document.ondblclick=initialize;

//随机字符特效
(function($){var namespace="chaffle";var methods={init:function(options){options=$.extend({speed:20,time:140},options);return this.each(function(){var _this=this;var $this=$(this);var data=$this.data(namespace);if(!data){options=$.extend({},options);$this.data(namespace,{options:options})}var $text=$this.text();var substitution;var shuffle_timer;var shuffle_timer_delay;var shuffle=function(){$this.text(substitution);if($text.length-substitution.length>0){for(i=0;i<$text.length-substitution.length;i++){var shuffleStr=random_text.call();$this.append(shuffleStr)}}else{clearInterval(shuffle_timer)}};var shuffle_delay=function(){if(substitution.length<$text.length){substitution=$text.substr(0,substitution.length+1)}else{clearInterval(shuffle_timer_delay)}};var random_text=function(){var str;var lang=$this.data("lang");switch(lang){case"en":str=String.fromCharCode(33+Math.round(Math.random()*99));break;case"zh":str=String.fromCharCode(19968+Math.round(Math.random()*80));break;case"ja-hiragana":str=String.fromCharCode(12352+Math.round(Math.random()*50));break;case"ja-katakana":str=String.fromCharCode(12448+Math.round(Math.random()*84));break}return str};var start=function(){substitution="";clearInterval(shuffle_timer);clearInterval(shuffle_timer_delay);shuffle_timer=setInterval(function(){shuffle.call(_this)},options.speed);shuffle_timer_delay=setInterval(function(){shuffle_delay.call(this)},options.time)};$this.unbind("mouseover."+namespace).bind("mouseover."+namespace,function(){start.call(_this)})})},destroy:function(){return this.each(function(){var $this=$(this);$(window).unbind("."+namespace);$this.removeData(namespace)})}};$.fn.chaffle=function(method){if(methods[method]){return methods[method].apply(this,Array.prototype.slice.call(arguments,1))}else if(typeof method==="object"||!method){return methods.init.apply(this,arguments)}else{$.error("Method "+method+" does not exist on jQuery."+namespace)}}})(jQuery);

//返回顶部缓冲代码
function goTop(acceleration,time)
{
    acceleration=acceleration||0.1;time=time||12;
    var dx=0;var dy=0;var bx=0;var by=0;var wx=0;
    var wy=0;
    if(document.documentElement)
    {
        dx=document.documentElement.scrollLeft||0;
        dy=document.documentElement.scrollTop||0
    }
    if(document.body)
    {
        bx=document.body.scrollLeft||0;
        by=document.body.scrollTop||0}var wx=window.scrollX||0;
    var wy=window.scrollY||0;var x=Math.max(wx,Math.max(bx,dx));var y=Math.max(wy,Math.max(by,dy));var speed=1+acceleration;window.scrollTo(Math.floor(x/speed),Math.floor(y/speed));if(x>0||y>0){var invokeFunction="goTop("+acceleration+", "+time+")";window.setTimeout(invokeFunction,time)}};

//锚点平滑滚动代码
(function(window,$){var $window,$document,$body,$html,$bodhtml;window.AA_CONFIG=window.AA_CONFIG||{};window.AA_CONFIG=$.extend({animationLength:750,easingFunction:"linear",scrollOffset:0},window.AA_CONFIG);$(document).ready(function(){$window=$(window);$document=$(this);$body=$(document.body);$html=$(document.documentElement);$bodhtml=$body.add($html);scrollToHash();$document.find('a[href^="#"], a[href^="."]').on("click",function(){var href=$(this).attr("href");if(href.charAt(0)==="."){href=href.split("#");href.shift();href="#"+href.join("#")}if(href===location.hash){scrollToHash(href)}});$window.on("hashchange",function(){scrollToHash()});$window.on("mousewheel DOMMouseScroll touchstart mousedown MSPointerDown",function(ev){$bodhtml.stop(true,false)})});function scrollToHash(rawHash){var rawHash=rawHash||location.hash;var anchorTuple=rawHash.substring(1).split("|");var hash=anchorTuple[0];var animationTime=anchorTuple[1]||window.AA_CONFIG.animationLength;if(hash.charAt(0).search(/[A-Za-z]/)>-1){var $actualID=$document.find("#"+hash)}var $actualAnchor=$document.find('a[name="'+hash+'"]');if(($actualAnchor&&$actualAnchor.length)||($actualID&&$actualID.length)){return}var $arbitraryAnchor=$(hash).first();if($arbitraryAnchor&&$arbitraryAnchor.length){var $el=$arbitraryAnchor}else{return}if($el&&$el.length){var top=$el.offset().top-window.AA_CONFIG.scrollOffset;$bodhtml.stop(true,false).animate({scrollTop:top},parseInt(animationTime),window.AA_CONFIG.easingFunction)}}})(window,jQuery);

//loading
jQuery(function() {
    $(".loading a, .quote-text a").click(function(f) {
        f.preventDefault();
        var a = "请稍候，马上为你传送", d = 4, c = $(this).html(a).unbind("click");
        (function b() {
            d < 0 ? (d = 4, c.html(a), b()) :(c[0].innerHTML += ".", d--, setTimeout(b, 150));
        })();
        window.location = this.href;
    });
});


//气泡提示
jQuery(document).ready(function(b) {
    var a = {
        x:10,
        y:20,
        tipElements:"a,span,img,div,input",
        noTitle:false,
        init:function() {
            var c = this.noTitle;
            b(this.tipElements).each(function() {
                b(this).mouseover(function(f) {
                    if (c) {
                        isTitle = true;
                    } else {
                        isTitle = b.trim(this.title) != "";
                    }
                    if (isTitle) {
                        this.myTitle = this.title;
                        this.title = "";
                        var d = "<div class='tooltip'><div class='tipsy-arrow tipsy-arrow-n'></div><div class='tipsy-inner'>" + this.myTitle + "</div></div>";
                        b("body").append(d);
                        b(".tooltip").css({
                            top:f.pageY + 20 + "px",
                            left:f.pageX - 20 + "px"
                        }).show("fast");
                    }
                }).mouseout(function() {
                    if (this.myTitle != null) {
                        this.title = this.myTitle;
                        b(".tooltip").remove();
                    }
                }).mousemove(function(d) {
                    b(".tooltip").css({
                        top:d.pageY + 20 + "px",
                        left:d.pageX - 20 + "px"
                    });
                });
            });
        }
    };
    b(function() {
        a.init();
    });
});
