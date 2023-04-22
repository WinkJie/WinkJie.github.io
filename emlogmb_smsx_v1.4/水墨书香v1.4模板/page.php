<?php 
/**
 * 自建页面模板  水墨书香 www.xunzhenji.com
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="contentleft">
<div class="biaoti" id="masked"><?php echo $log_title; ?></div>
<div class="xiantiao2"></div>
<?php echo $log_content; ?>
<div id="comments"><?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?></div>
<?php blog_comments($comments); ?>
<div class="clear"></div>
</div><!--end #contentleft-->
<div id="shadow"></div>
<?php
 include View::getView('footer');
?>