<?php 
/**
 * 阅读文章页面 水墨书香 www.qpjk.cc
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<div id="contentleft">
<div class="biaoti" id="masked"><?php topflg($top); ?><?php echo $log_title; ?></div>
<div class="date2">
<li><a href="/" id="home_index" class="hint--top hint--rounded" data-hint="返回网站首页"><i class="iconfont">&#xe602;</i>首页</a> <b>></b>
    <?php 
     $ery = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='$sortid'"); $rest = mysql_fetch_array($ery); if($rest['pid'] == "0"){
   echo '<a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>'; 
  }else{
  $ery1 = mysql_query("SELECT * FROM ".DB_PREFIX."sort WHERE sid ='".$rest['pid']."'"); $rest1 = mysql_fetch_array($ery1); echo '<a href="'.Url::sort($rest1['sid']).'">'.$rest1['sortname'].'</a>'; echo ' <b>></b> <a href="'.Url::sort($rest['sid']).'">'.$rest['sortname'].'</a>';}
    ?>
<!--分类原代码 <?php blog_sort($logid); ?> -->
</li>
<li><i class="iconfont">&#xe61b;</i>作者：<?php blog_author($author); ?></li>
<li><i class="iconfont">&#xe62e;</i> <?php $weekarray=array("日","一","二","三","四","五","六"); 
echo gmdate('Y年n月j日 G:i', $date);echo " 星期".$weekarray[gmdate('w', $date)];?></li>
<li><i class="iconfont">&#xe607;</i>浏览：<?php echo $views; ?> 次
</li>
<li><i class="iconfont">&#xe607;</i>字号：
<a href="javascript:doZoom(14)" class="hint--top  hint--success" data-hint="缩小到五号字体">小</a>&nbsp;
<a href="javascript:doZoom(16)" class="hint--top  hint--info" data-hint="适合阅读的小四字体">中</a>&nbsp;
<a href="javascript:doZoom(18)" class="hint--top  hint--error" data-hint="放大到四号字体">大</a>
</li>
<?php if (_g('rz_pinglun') == "yes"): ?>
<li><a href="##comments" class="hint--top hint--rounded" data-hint="去评论">
<i class="iconfont">&#xe621;</i>评论：<?php echo $comnum; ?> 条</a>
&nbsp; <i class="iconfont">&#xe61e;</i>编辑<?php editflg($logid,$author); ?></li>
<?php else: ?>
<li><a href="##comments" class="hint--top hint--rounded" data-hint="去评论">
<i class="iconfont">&#xe621;</i>评论：</a><a href="<?php echo $value['log_url']; ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $logid; ?>"></span></a>&nbsp; 
<i class="iconfont">&#xe61e;</i>编辑<?php editflg($logid,$author); ?></li>
<?php endif; ?>
</div> <!-- end .date2 -->
<div class="date4">
时间：<?php echo gmdate('Y-n-j G:i', $date); ?>&nbsp;&nbsp;
浏览：<?php echo $views; ?>&nbsp;&nbsp;
<?php if (_g('pinglun3') == "yes"): ?>评论：<?php echo $comnum; ?><?php else: ?><?php endif; ?>
<?php if (_g('pinglun4') == "yes"): ?>
评论：<a href="<?php echo $value['log_url']; ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $logid; ?>"></span></a><?php else: ?><?php endif; ?>
</div>
<hr class="rz_fgx">
<script type="text/javascript">function doZoom(size){document.getElementById('zoom').style.fontSize=size+'px'}</script>
<div id="zoom"><?php echo $log_content; ?><div class="clear"></div></div>
<?php doAction('log_related', $logData); ?> <!-- 日志的挂载点 -->
<?php if (_g('yuedu-kh') == "yes"): ?>
	<div id="tingliu"><span class="tingliu2 hint--top hint--bounce" data-hint="阅读这篇文章有收获吗？点我去发表评论。"><a href="##comments">
<i class="iconfont tingliu4">&#xe62d;</i></a></span> &nbsp;<?php echo _g('yuedu');?>&nbsp;<span class="tingliu3" id="stime"></span></div>
<script language="JavaScript">var ss=0,mm=0,hh=0;function TimeGo(){ss++;if(ss>=60){mm+=1;ss=0}if(mm>=60){hh+=1;mm=0}ss_str=(ss<10?"0"+ss:ss);mm_str=(mm<10?"0"+mm:mm);tMsg=""+hh+"小时"+mm_str+"分"+ss_str+"秒";document.getElementById("stime").innerHTML=tMsg;setTimeout("TimeGo()",1000)}TimeGo();</script>
    <?php else: ?><?php endif; ?>
<?php if (_g('zidingyi1') == "yes"): ?>
<div id="zidingyi1"><?php echo _g('zidingyi1_wz');?></div>
<?php else: ?><?php endif; ?>
<div class="jieshu"><div class="rz_jsx1"></div><div class="rz_jsx2"></div><div class="rz_jsx3"></div></div>
	<div id="shangxiapian_2"><?php neighbor_log2($neighborLog); ?><div id="gaodu1"></div></div>
	<div id="shangxiapian"><?php neighbor_log($neighborLog); ?><div id="gaodu1"></div></div> 
<?php if (_g('xgrz-kh') == "yes"): ?>
<div class="gxq"><div class="bti"><span class="xiangguan-bt"></span><span class="chaffle xgwzjl" data-lang="zh">相关文章</span></div>
    <?php $Log_Model = new Log_Model();
          $randlogs = $Log_Model->getLogsForHome("AND sortid = {$sortid} ORDER BY rand() DESC,date DESC", 1, 10);?>
<ul>
        <?php foreach($randlogs as $value): ?>
<li><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>" class="shake shake-little"><?php echo $value['log_title']; ?></a></li>
        <?php endforeach; ?>
</ul><div id="gaodu1"></div></div>
     <?php else: ?><?php endif; ?>
<?php if (_g('biaoqian-kh') == "yes"): ?><div id="tag"><li class="tga-bt"></li><?php blog_tag($logid); ?><div class="clear"></div></div><?php else: ?><?php endif; ?>
<div id="comments"><?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?></div>
<?php blog_comments($comments); ?> <!-- 输出该日志评论列表 -->
<div class="clear"></div>
</div><!--end #contentleft-->
<div id="shadow"></div>
<?php
 include View::getView('footer');
?>