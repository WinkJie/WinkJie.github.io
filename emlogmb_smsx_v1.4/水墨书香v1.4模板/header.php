<!-- 【主题模板】：水墨书香免费版  v1.4      【制作】：清萍工作室     【网址】：www.xunzhenji.com   www.qpjk.cc -->
<?php
/*
Template Name:水墨书香
Description:一款简约、优美、淡雅、古典，专为喜欢古风的人们而设计的水墨风主题，带着书香气息飘逸而来。本主题模板专为舞文弄墨、爱好写作、热衷文学的朋友而打造。<br><br><span style="color:#C82000;">√为阅读而设计，为写作而存在！</span> &nbsp;&nbsp; ★更新时间：<span style="color:#00A04B;">2015年11月15日</span><br><br><a href="http://www.qpjk.cc/" target="_blank">作者站点</a> &nbsp;  <a href="http://www.qpjk.cc/post-10.html" target="_blank">购买收费版</a> &nbsp;  <a href="http://www.qpjk.cc/46" target="_blank">升级日志</a> &nbsp;  <a href="http://www.qpjk.cc/post-60.html" target="_blank">谁在用？</a> &nbsp;  <a href="http://www.xunzhenji.com/19" target="_blank">￥捐赠</a>
Version:<span style="color:#E60026;">1.4</span>
Author:清萍剑客
Author Url:http://www.qpjk.cc
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!--  <?php echo $site_title; ?>欢迎您！ <?php echo BLOG_URL; ?>  -->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>">
<meta name="description" content="<?php echo $site_description; ?>">
<meta name="generator" content="emlog">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="icon" href="/favicon.ico">
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script>!window.jQuery && document.write('<script src="<?php echo TEMPLATE_URL; ?>jcss/jquery-1.11.1.min.js"><\/script >');</script>
<link href="<?php echo TEMPLATE_URL; ?>qpgzs_shuimo.min.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo TEMPLATE_URL; ?>jcss/html5-css3.js"></script>
<![endif]-->
<style>
<?php if (_g('csszz1') == "yes"): ?>
body {cursor:url(<?php echo TEMPLATE_URL; ?>images/zhizhen.cur), auto;}
.juanzhu img,#juanzengzz{cursor:url(<?php echo TEMPLATE_URL; ?>images/ybao.cur), auto;}
a:hover,#shangxia2 img,#weibu{cursor:url(<?php echo TEMPLATE_URL; ?>images/zhizhen2.cur), auto;}
<?php endif; ?>
<?php if (_g('rz_bg') == "yes"): ?>
#contentleft{background-image: url(<?php echo TEMPLATE_URL; ?>images/bantouming.png)}
<?php endif; ?>
#nav .bar{font-size:<?php echo _g('nav_ziti');?>px;}
#nav .bar .item {margin-bottom:<?php echo _g('nav_jianju');?>px;}
</style>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js"></script>
<link href="<?php echo TEMPLATE_URL; ?>jcss/csshake.min.css" rel="stylesheet">
<link href="<?php echo TEMPLATE_URL; ?>jcss/animate.min.css" rel="stylesheet">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml">
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php">
<?php doAction('index_head'); ?>
</head>
<body>
<div id="dingbumx"><img src="<?php echo TEMPLATE_URL; ?>images/dingbu.png"></div>
<div id="bwgj_logo"><a href="/"><img src="<?php echo _g('logo'); ?>"></a></div>
<?php if (_g('sousuo2') == "yes"): ?>
<div id="sousuo2">
<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
<input name="keyword" type="search" placeholder="输入关键字，回车搜结果。"></form></div>
<?php else: ?><?php endif; ?>
<div id="sousuok1">
<div id="sousuok" class="animated">
<div class="toubu"><a id="pafed_3547" rel="close" title="关闭窗口">
<i class="iconfont">&#xe60b;</i></a></div>
<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
<input id="sskdaxiao" name="keyword" type="search" value="" placeholder="请输入搜索关键字……">
<button type="submit" title="猛击我搜索">搜 索</button>
</form></div></div>
<div class="section section01 section-active">
<div class="cont">
<div class="j-an-box an-petal1" data-sum="80"></div><div class="j-an-box an-petal2" data-sum="75"></div><div class="j-an-box an-petal3" data-sum="50"></div><div class="j-an-box an-petal4" data-sum="30"></div><div class="j-an-box an-petal5" data-sum="20"></div><div class="j-an-box an-petal6" data-sum="25"></div><div class="j-an-box an-petal7" data-sum="15"></div><div class="j-an-box an-petal8" data-sum="10"></div>
</div>
</div>
<div id="wrap">
<div id="nav"><?php blog_navi();?>
<img src="<?php echo TEMPLATE_URL; ?>images/nav_bg.png" id="nav_bg">
</div>
<div id="nav2" ><?php blog_navi2();?></div>