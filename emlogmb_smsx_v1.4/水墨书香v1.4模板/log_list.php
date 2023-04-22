<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="contentleft">
<div id="shuimo_logo">
<span id="xy_span1">
<img src="<?php echo TEMPLATE_URL; ?>images/xiangyun1.png" class="animated fadeInRight" id="xy_img1"></span>
<span id="logo_img">
<a href="/"><img src="<?php echo _g('logo'); ?>" class="animated <?php echo _g('logo-dh');?>"></a></span>
<span id="xy_span2"><img src="<?php echo TEMPLATE_URL; ?>images/xiangyun2.png" class="animated fadeInLeft" id="xy_img2"></span>
<div id="sm_fubiaoti" class="animated zoomIn"><?php echo $bloginfo; ?></div>

<?php if (_g('sygg') == "yes"): ?><?php if (blog_tool_ishome()) :?>
<div id="ggwz"><i class="iconfont">&#xe631;</i><b>博主寄语：</b><a href="<?php echo BLOG_URL;?>t"><?php echo index_t(1); ?></a></div>
<?php endif;?><?php endif; ?>
</div>
<div id="shuimo_logoxt"></div>
<div id="zhiding_wz" class="loading"><?php getTopLogs(5);?></div> <!-- 置顶文章 -->
<?php doAction('index_loglist_top'); ?>
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>

<?php if($value['top']=='n'):?><!-- 不显示置顶 -->
<h2 class="loading">	
<!-- 说明：判断时间 -->
<?php 
$t=time() - 1*24*60*60;
$log_t=gmdate('Y-m-d',$value['date']);
$diy_t=date("Y-m-d",$t);
if($log_t > $diy_t) echo '<img src="'.TEMPLATE_URL.'images/new.gif" alt="最新文章">';
?>
	<?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a>
<!-- 判断浏览量 -->
<?php if ($value['views'] >= 500) echo '<img src="'.TEMPLATE_URL.'images/hot.gif" class="hot_img" alt="热门文章">';?>
</h2>
<div class="date1">
    <i class="iconfont">&#xe608;</i>时间：<?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;
	<i class="iconfont">&#xe618;</i>作者：<?php blog_author($value['author']); ?>&nbsp;&nbsp;
	<i class="iconfont">&#xe62b;</i>分类：<?php blog_sort($value['logid']); ?>&nbsp;
	<i class="iconfont">&#xe60a;</i>浏览：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>&nbsp;&nbsp;
	<i class="iconfont">&#xe61e;</i>编辑<?php editflg($value['logid'],$value['author']); ?>&nbsp;&nbsp;
<?php if (_g('sy_pinglun') == "yes"): ?>
<i class="iconfont">&#xe61c;</i><a href="<?php echo $value['log_url']; ?>#comments">评论：<?php echo $value['comnum']; ?></a><!-- em原生评论数 -->
<?php else: ?>
<i class="iconfont">&#xe61c;</i><a href="<?php echo $value['log_url']; ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $value['logid']; ?>" data-count-type="comments"></span></a><!-- 多说评论代码 -->
<?php endif; ?>
</div>
    <!-- 分辨率低于600px才显示，小于390px就隐藏。 -->
	<div class="date3">
    时间：<?php echo gmdate('Y-n-j', $value['date']); ?>&nbsp;&nbsp;
	分类：<?php blog_sort($value['logid']); ?>&nbsp;&nbsp;
	浏览：<a href="<?php echo $value['log_url']; ?>"><?php echo $value['views']; ?></a>&nbsp;&nbsp;
	<!-- em原生评论数 --><?php if (_g('pinglun1') == "yes"): ?>
	<a href="<?php echo $value['log_url']; ?>#comments">评论：<?php echo $value['comnum']; ?></a>
    <?php else: ?><?php endif; ?>
	<!-- 多说评论代码 --><?php if (_g('pinglun2') == "yes"): ?>
	<a href="<?php echo $value['log_url']; ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $value['logid']; ?>" data-count-type="comments"></span></a>
	<?php else: ?><?php endif; ?>
	</div>
	<div id="sy_zhaiyao"><?php echo $value['log_description']; ?></div>
	<div class="clear"></div><div class="line"></div>
	<?php endif; ?> <!-- 不显示置顶结束 -->
<?php 
endforeach;
else:
?>
<div id="weizhaodao">
<div id="wzd_img1" class="animated bounceInDown">
<a href="<?php echo BLOG_URL; ?>" title="点我返回首页"><img src="<?php echo TEMPLATE_URL; ?>images/weizhaodao.gif"></a>
</div>
</div>
<style>#footerbar{display:none}</style>
<?php endif;?>
<div id="pagenavi"><?php echo $page_url;?></div>
<div class="clear"></div>
</div><!-- end #contentleft-->
<div id="shadow"></div>
<?php
 include View::getView('footer');
?>