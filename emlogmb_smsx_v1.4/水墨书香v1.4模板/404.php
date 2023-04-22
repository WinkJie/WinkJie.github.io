<?php 
/**
 * 自定义404页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>404错误页面 - <?php echo BLOG_URL; ?></title>
    <style type="text/css" media="screen">
    *{margin:0;padding:0;font-family:arial,sans-serif;}
    body,html{height:100%;}
    body{background:url(<?php echo TEMPLATE_URL; ?>images/bg/shuimo_bg.jpg);}
   .wrapper{margin: 30px auto 0 auto;text-align: center;}
   .zi1{font-weight:700; font-size:16px; margin: 0px; padding: 28px 15px 0px 27px;}
   .tm{padding:15px 10px 0px 15px;}
   .tm span{color:#e10602; padding:0 5px; font-weight:700;}
    </style>
  </head>
  <body>
  <div class="wrapper">
  <img src="<?php echo TEMPLATE_URL; ?>images/404.png">
     <div class="zi1">该页未找到，即将转首页。</div>
     <p class="tm">
	 <span id="time">5</span>秒内自动跳转...
      &nbsp; <a id="Btn" href="/">前往本站首页</a>
	 </p>
  </div>
<script type="text/javascript">
function sendStats(url){
    var n = "log_"+ (new Date()).getTime();
    var c = window[n] = new Image();
    c.onload = (c.onerror=function(){window[n] = null;});
    c.src = '/' + url;
    c = null;  
}
var time = document.getElementById('time');
var btn = document.getElementById('Btn');
function count(){
    if( +time.innerHTML > 0 ){
        time.innerHTML = time.innerHTML - 1;
    }else{
        sendStats('gotobaidu');
        location.href = btn.href;
    }
}
setInterval(count , 1000);
btn.onclick = function(){
    sendStats('gotobaidu');
};
</script>
<?php if (_g('yuyinbb') == "yes"): ?>
<div id="yuyinbb" style="display:none;">
<audio autoplay="autoplay">
<source src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&text=%E6%8A%B1%E6%AD%89%EF%BC%81%E6%B2%A1%E6%89%BE%E5%88%B0%E4%BD%A0%E7%9A%84%E9%A1%B5%E9%9D%A2%EF%BC%8C%E4%B8%80%E7%A7%92%E5%90%8E%E5%B0%86%E5%9B%9E%E5%88%B0%E9%A6%96%E9%A1%B5%E3%80%82" type="audio/mpeg">
<embed height="0" width="0" src="http://tts.baidu.com/text2audio?lan=zh&ie=UTF-8&text=%E6%8A%B1%E6%AD%89%EF%BC%81%E6%B2%A1%E6%89%BE%E5%88%B0%E4%BD%A0%E7%9A%84%E9%A1%B5%E9%9D%A2%EF%BC%8C%E4%B8%80%E7%A7%92%E5%90%8E%E5%B0%86%E5%9B%9E%E5%88%B0%E9%A6%96%E9%A1%B5%E3%80%82"> 
</audio>
</div>
<?php else: ?><?php endif; ?>
</body>
</html>