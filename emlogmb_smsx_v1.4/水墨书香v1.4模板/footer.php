<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="clear"></div>
</div><!--end #wrap-->
<div id="footerbar">
<div id="footerbar_img"><img src="<?php echo TEMPLATE_URL; ?>images/dibu.png"></div>
<div id="dibu">
<div id="db_wenzi">
<a onclick="goTop();" href="javascript:void(0);">&#36820;&#22238;&#39030;&#37096;</a>
<?php if (blog_tool_ishome()) :?>
<?php else:?>
<a href="<?php echo BLOG_URL; ?>">&#36820;&#22238;&#39318;&#39029;</a>
<?php endif;?>
<?php echo _g('dibu-zdy');?>
<a href="<?php echo BLOG_URL; ?>admin/" class="hint--top hint--error" data-hint="&#31449;&#38271;&#30340;&#21518;&#33457;&#22253;&#65292;&#38386;&#20154;&#27490;&#27493;&#65281;&#32;&#94;&#95;&#94;">&#21518;&#33457;&#22253;</a>
&#29256;&#26435;&#25152;&#26377;&#65306;<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
&#31449;&#38271;&#65306;
<?php
if (!empty($tws)):
    echo $author; elseif (isset($logid)): blog_author($author); 
else:
    blog_author($value['author']);
endif;
?>
&#20027;&#39064;：<a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#113;&#112;&#106;&#107;&#46;&#99;&#99;&#47;" class="hint--top  hint--error" data-hint="&#28165;&#33805;&#24037;&#20316;&#23460;&#33635;&#35465;&#20986;&#21697;&#32;&#45;&#45;&#32;&#21457;&#24067;&#65306;&#50;&#48;&#49;&#53;&#24180;&#49;&#49;&#26376;&#49;&#52;&#26085;" target="_blank">&#27700;&#22696;&#20070;&#39321;&#20813;&#36153;&#29256;&#32;&#118;&#49;&#46;&#52;</a>
<a href="http://www.emlog.net" class="hint--top  hint--error" data-hint="&#26412;&#27169;&#26495;&#22522;&#20110;&#101;&#109;&#108;&#111;&#103;&#21338;&#23458;&#31995;&#32479;&#24320;&#21457;" target="_blank" class="shake">&#31243;&#24207;&#65306;&#101;&#109;&#108;&#111;&#103;</a>
<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a>
<span><?php echo $footer_info; ?></span>
<?php if (_g('tongji-kg') == "yes"): ?>
<div class="sm_tongji">
<?php ja_sta(); ?>
<li><i class="iconfont">&#xe608;</i>&#24314;&#31449;&#26085;&#26399;&#65306;<?php echo _g('tjrq');?></li>
</div>
<?php endif; ?>
<?php if (_g('yqlj') == "yes"): ?><?php index_link();?><?php else: ?><?php endif; ?>
</div><!--end #db_wenzi-->
</div><!--end #dibu-->
</div><!--end #footerbar-->
<div id="shangxia2"><span id="toTop"><i class="iconfont">&#xe632;</i></span></div>
<script src="<?php echo TEMPLATE_URL; ?>jcss/qpgzs_shuimo.min.js"></script>
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" data-no-instant></script>
<script>prettyPrint();</script>
<?php doAction('index_footer'); ?>
</body>
</html>