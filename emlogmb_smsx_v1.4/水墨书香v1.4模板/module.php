<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
if (!function_exists('_g')) {emMsg('<div style="color: #BA3C2E; height:50px; line-height:40px; text-align: center; font-size:20px; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>欢迎你使用古风模板<span style="color: #EB4640;">【水墨书香免费版】</span></strong></div><div style="line-height: 2; font-size: 16px; color: #EB4640; font-family:\5FAE\8F6F\96C5\9ED1,\5b8b\4f53;"><strong>你现在无法正常使用本模板的原因：</strong><br><span style="color: #7F6856;">1、你还未安装【模板设置插件】，<a href="http://www.emlog.net/plugin/144" target="_blank">点击此处下载安装↓</a>，或登陆“后台”，進入“<strong>应用</strong>”，点“<strong>插件</strong>”找到“模板设置插件”并在线安装。</span><br><span style="color: #513529;">2、你还<strong>未启用</strong>模板设置插件，请在“<strong>后台</strong>”点“<strong>插件</strong>”，在<strong>“插件管理”</strong>中启用“<strong>模板设置插件</strong>”。</span><br><br><span style="font-size: 14px;color: #2F2114;">注：本主题由清萍剑客负责维护，如有疑问请阅读【<a href="http://www.xunzhenji.com/post-114.html" target="_blank">模板使用说明</a>】视频教程。联系QQ：1921257873</span></div>
', BLOG_URL . 'admin/plugin.php');}?>
<?php
//widget：blogger 分类
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div id="zhanzhang_biaoti"><span><?php echo $title; ?></span></div>
	<div id="zhanzhang_biankuang">
	<div id="zhanzhang_img">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<div id="zhanzhang_wenzi"><b>站长：</b><?php echo $name; ?><br>
    <b>签名：</b><?php echo $user_cache[1]['des']; ?></div>
	<div id="gaodu1"></div></div>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ 
    if (!blog_tool_ishome()) return;
    ?>
	<div id="rili_biaoti"><span><?php echo $title; ?></span></div>
	<div id="rili_biankuang">
	<div id="calendar">
	</div></div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div id="fenlei_biaoti"><span><?php echo $title; ?></span></div>
	<div id="fenlei_biankuang">
	<ul id="blogsort">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li>
	<span class="yun-tb"></span><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> <span class="hongse01"><?php echo $value['lognum'] ?></span></a> <span class="pian-tb"></span>
	<?php if (!empty($value['children'])): ?>
		<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
			<span class="dian-tb"></span><a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?> <span class="chengse01"><?php echo $value['lognum'] ?></span></a> <span class="pian-tb"></span>
		</li>
		<?php endforeach; ?>
		</ul>
    </li>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul></div>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div id="weiyu_biaoti"><span><?php echo $title; ?></span></div>
	<div id="weiyu_biankuang">
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><p><?php echo smartDate($value['date']); ?></p></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>"><span class="weiyu-tb"></span>查看更多微语</a></p>
	<?php endif;?>
	</ul></div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	$b=array("images/wytx/touxiang1.gif"=>"01","images/wytx/touxiang2.gif"=>"02","images/wytx/touxiang3.gif"=>"03","images/wytx/touxiang4.gif"=>"04","images/wytx/touxiang5.gif"=>"05","images/wytx/touxiang6.gif"=>"06","images/wytx/touxiang7.gif"=>"07","images/wytx/touxiang8.gif"=>"08","images/wytx/touxiang9.gif"=>"09");
	?>
	<div id="pinglun_biaoti"><span><?php echo $title; ?></span></div>
	<div id="pinglun_wenzi">
	<div id="newcomment" class="plzbk">
	<?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
    $value['content']=preg_replace('/^@/',"回复 ",$value['content']);
	?>
<li id="comment">
  <div id="plxybk">
	<div id="pltouxiang" class="animated rotateIn">
<a title="<span id='hongsezi'><?php echo $value['name']; ?></span> 于<?php echo date('Y年m月d日',$value['date']); ?>评论" href="<?php echo $url; ?>"><img class="trans" src="<?php if(empty($value['mail'])){ echo TEMPLATE_URL;echo array_rand($b);}else{echo getGravatar($value['mail']);} ?>"/></a>
    </div>
<div id="mzi"><?php echo $value['name']; ?></div>
<div id="plsj"><?php if(!strstr(smartDate($value['date']),"前")){$comm_date = explode(" ",smartDate($value['date'])); echo $comm_date[0];} else{echo smartDate($value['date']);} ?></div>
<div class="pl_biaoti">标题：<?php com_tt($value['gid']);?></div>
   </div>
<div class="pljtwz">
<a title="查看详细评论" href="<?php echo $url; ?>"><?php echo $value['content']; ?></a>
</div></li><?php endforeach; ?></div></div>
<?php }?>
<?php //评论文章标题
function com_tt($gid){$db = MySql::getInstance();$sql = "SELECT * FROM ".DB_PREFIX."blog WHERE hide='n' and gid in ($gid) ORDER BY `date` DESC LIMIT 0,1";$list = $db->query($sql);while($row = $db->fetch_array($list)){?>
<a href="<?php echo Url::log($row['gid']);?>"><?php echo $row['title'];?></a><?php }}?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div id="zuixin_biaoti"><span><?php echo $title; ?></span></div>
	<div id="zuixin_biankuang"><div class="wenzhang">
	<ul>
	<?php $i=1;
    foreach($newLogs_cache as $value){?>
	<li>
    <?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
	<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
	<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
	<?php }else{ ?><em class="hotSoSo"><?php echo $i;?></em><?php }?>
    <a title="<?php echo $value['title']; ?>" href="<?php echo Url::log($value['gid']); ?>"><?php echo subString(strip_tags($value['title']),0,15); ?></a></li>
	<?php $i++;
     }  ?>
	</ul></div></div>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<div id="remen_biaoti"><span><?php echo $title; ?></span></div>
	<div id="remen_biankuang"><div class="wenzhang">
	<ul>
	<?php $i=1;
    foreach($randLogs as $value){?>
	<li>
	<?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
	<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
	<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
	<?php }else{ ?><em class="hotSoSo"><?php echo $i;?></em><?php }?>
	<a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo subString(strip_tags($value['title']),0,15); ?></a></li>
	<?php $i++;
     }  ?>
	</ul>
	</div></div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div id="suiji_biaoti"><span><?php echo $title; ?></span></div>
	<div id="suiji_biankuang"><div class="wenzhang">
	<ul>
	<?php $i=1;
    foreach($randLogs as $value){?>
	<li>
    <?php if($i==1){?><em class="hotone"><?php echo $i;?></em>
	<?php }else if($i==2){ ?><em class="hottwo"><?php echo $i;?></em>
	<?php }else if($i==3){ ?><em class="hotthree"><?php echo $i;?></em>
	<?php }else{ ?><em class="hotSoSo"><?php echo $i;?></em><?php }?>
	<a href="<?php echo Url::log($value['gid']); ?>" title="<?php echo $value['title']; ?>"><?php echo subString(strip_tags($value['title']),0,15); ?></a></li>
	<?php $i++;
     }  ?>
	</ul>
	</div></div>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<div id="sousuo">
	<ul id="logsearch">
	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
	<input name="keyword" class="search" type="text" onblur="if(this.value==''){this.value='请输入搜索关键字';}" onfocus="this.value='';" value="请输入搜索关键字" title="善用搜索，挖掘智慧。">
    <input type="submit" name="submit" value="搜索" class="submit button" title="猛击我搜索">
	</form>
	</ul>
	</div>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div id="cundang_biaoti"><span><?php echo $title; ?></span></div>
	<div id="cundang_biankuang">
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>" title="查看<span class='yanse-1'><?php echo $value['record']; ?></span>的 <span class='yanse-2'><?php echo $value['lognum']; ?></span> 篇文章"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul><div id="gaodu1"></div></div>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<div id="zidingyi_bt">
	<span><?php echo $title; ?></span>
	</div>
	<div id="zidingyi_biankuang">
	<?php echo $content; ?>
	</div>
<?php } ?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
<ul id="nav-two" class="bar">
	<?php
	foreach($navi_cache as $value):
        if ($value['pid'] != 0) {
            continue;
        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>	
<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
<li class="item <?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
<?php if (!empty($value['children'])) :?>
<ul class="sub-nav">
<?php foreach ($value['children'] as $row){
echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
}?>
</ul>
            <?php endif;?>
            <?php if (!empty($value['childnavi'])) :?>
<ul class="sub-nav <?php echo _g('nav_tx');?>">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
</ul>
            <?php endif;?></li>
	<?php endforeach; ?>
	<?php if (_g('sqbc') == "yes"): ?>
<li class="item common" id="shouqibucuo">
<a href="<?php echo rand_log(); ?>"><i class="iconfont">&#xe610;</i>手气不错</a></li>
	<?php else: ?><?php endif; ?>
<li class="item common">
<a id="fjipf_2154" class="gbcbl"><i class="iconfont">&#xe624;</i> 搜 索</a>
</li>
</ul>
<?php }?>

<?php
//blog：880以下的竖导航
function blog_navi2(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
<div class="daohang2">
	<?php
	foreach($navi_cache as $value):
        if ($value['pid'] != 0) {
            continue;
        }
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>	
<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
<?php 
	    continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
?>	
<li class="item <?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
	<?php endforeach; ?>
<li class="item common"><a href="<?php echo rand_log(); ?>">手气不错</a></li>
</div>
<?php }?>

<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<img src=\"".TEMPLATE_URL."/images/top.png\" class=\"zhiding\" /> " : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/sortop.png\" id=\"zhiding2\" /> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">：文章</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：日志页标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		foreach ($log_cache_tags[$blogid] as $value){
		$tag = '';
		echo 	'<li id="tag-'.rand(1, 5).'"><a href="'.Url::tag($value['tagurl']).'" rel="tag" title="查看【'.$value['tagname'].'】相关文章">'.$value['tagname'].'</a></li>';
		}
		echo $tag;
	}
	else {$tag = '<span class="color">&nbsp;本文无需标签！</span>';
	    echo $tag;}
}
?>
<?php
//widget：侧边栏标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div id="biaoqian_biaoti"><span><?php echo $title; ?></span></div>
	<div id="biaoqian_biankuang">
	<div class="tagcloud">
	<?php 
		shuffle ($tag_cache);
		 $tag_cache = array_slice($tag_cache,0,27);
		foreach($tag_cache as $value): ?>
		<span title="<span style='color:#DAB91C'>【<?php if(empty($value['tagname'])){ echo "无标签";}else{echo $value['tagname'];}?>】</span> 有<?php echo $value['usenum']; ?>篇文章">
        <a href="<?php echo Url::tag($value['tagurl']); ?>"  class="tag-link-<?php echo rand(12, 49) ?>"><?php echo $value['tagname']; ?> <?php echo $value['usenum']; ?>篇</a></span>
	<?php endforeach; ?>
	</div></div>
<?php }?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div id="sxpbk1"><div id="anniu1">
	<a href="<?php echo Url::log($prevLog['gid']) ?>" class="hint--right hint--bounce" data-hint="<?php echo $prevLog['title'];?>">
	<span class="shangpian-tb"></span></a></div>
<div id="wzlj1"><a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></div></div>
    <?php else:?>
    <div id="sxpbk1"><div id="anniu1">
	<a rel="prev" class="hint--right hint--bounce" data-hint="没有上一篇咯，看看别的吧！？">
	<span class="shangpian-tb"></span></a></div>
<div id="wzlj1"><a rel="prev">没有上一篇咯，看看别的吧！？</a></div></div>
    <?php endif;?>
	<?php if($nextLog):?>
	<div id="sxpbk2"><div id="wzlj2"><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a></div>
		<div id="anniu2"><a href="<?php echo Url::log($nextLog['gid']) ?>" class="hint--left hint--bounce" data-hint="<?php echo $nextLog['title'];?>">
		<span class="xiapian-tb"></span></a></div></div>
	<?php else:?>
    <div id="sxpbk2"><div id="wzlj2"><a rel="next">没有下一篇咯，看看别的吧！？</a></div>
	<div id="anniu2"><a rel="next" class="hint--left hint--bounce" data-hint="没有下一篇咯，看看别的吧！？">
	<span class="xiapian-tb"></span></a></div></div>
	<?php endif;?>
<?php }?>
<?php
//blog：相邻文章2 手机低分辨率下才显示
function neighbor_log2($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div id="shangxiapian3">
	<a href="<?php echo Url::log($prevLog['gid']) ?>">
	<span class="shangpian2-tb"></span></div>
	<?php else:?>
    <div id="shangxiapian3"><a rel="prev" title="没有上一篇咯！"><span class="shangpian2-tb"></span></a></div>
    <?php endif;?>
	<?php if($nextLog):?>
	<div id="shangxiapian4"><a href="<?php echo Url::log($nextLog['gid']) ?>">
	<span class="xiapian2-tb"></span></a></div>
	<?php else:?>
    <div id="shangxiapian4"><a rel="next" title="没有下一篇咯！"><span class="xiapian2-tb"></span></a></div>
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	<div class="comment-header pinglun_hx"></div>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div>
		<div id="mzsj"><span class="juli1"><?php echo $comment['poster']; ?></span>
		<?php if(function_exists('display_useragent')){display_useragent($comment['cid'],$comment['mail']);} ?>
		<?php if (_g('ipdz') == "yes"): ?>
		<img src="<?php echo BLOG_URL; ?>content/plugins/get_useragent/images/ip.png" alt="<?php echo convertip($comment['ip']); ?>" title="<?php echo convertip($comment['ip']); ?>" " style="vertical-align:middle;" class="useragent" data-bd-imgshare-binded="1">
		<?php endif; ?>
		<span class="comment-time"><?php echo $comment['date']; ?></span></div>
		<?php endif; ?>
		<div class="comment-info">
			<div class="comment-content"><?php echo $comment['content']; ?></div>
			<div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
			<div class="clear"></div>
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php endforeach; ?>
    <div id="pagenavi">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$url .=BLOG_URL.'';
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	$comment['content']=preg_replace('/^./',"回复 ",$comment['content']);
	?>
	<div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div>
		<div id="mzsj_2"><span class="juli2"><?php echo $comment['poster']; ?></span>
		<?php if(function_exists('display_useragent')){display_useragent($comment['cid'],$comment['mail']);} ?>
		<?php if (_g('ipdz') == "yes"): ?>
		<img src="<?php echo BLOG_URL; ?>content/plugins/get_useragent/images/ip.png" alt="<?php echo convertip($comment['ip']); ?>" title="<?php echo convertip($comment['ip']); ?>" " style="vertical-align:middle;" class="useragent" data-bd-imgshare-binded="1">
		<?php endif; ?>
		<span class="comment-time"><?php echo $comment['date']; ?></span></div>
		<?php endif; ?>
<div class="comment-info">
<!-- 管理员回复为不同颜色字 -->
	<div class="comment-content"<?php if(($comment['url']==$url)||($comment['mail']=='$mail')){?> style="color:#B53D3D"<?php }?>><?php echo $comment['content']; ?>
    </div>
			<?php if($comment['level'] < 4): ?><div class="comment-reply"><a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div><?php endif; ?>
			<div class="clear"></div><div class="pl-xian"></div>
</div>
		<?php blog_comments_children($comments, $comment['children']);?>
	</div>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place">
<div class="pinglun_bt">
<div class="rz_plx1"></div><div class="rz_plx2"></div><div class="rz_plx3"></div>
</div>
<a name="comments"></a>
<div class="comment-post" id="comment-post">
<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
<div class="comment-header">
<span class="fabiao-bt"></span><span class="fbpl1-bt"></span>
<a name="respond"></a></div>
<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
<input type="hidden" name="gid" value="<?php echo $logid; ?>">
<?php if(ROLE == ROLE_VISITOR): ?>
<span class="pinglun_wzk">
<input type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1"placeholder=" 昵称">&nbsp; 昵称
</span>
<span class="pinglun_wzk">
<input type="text" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" size="22" tabindex="2" placeholder=" 邮箱">&nbsp; 邮箱
</span>
<span class="pinglun_wzk">
<input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3"placeholder=" 主页">&nbsp; 主页
</span>
<?php endif; ?>
<textarea name="comment" id="comment" rows="5" tabindex="4" placeholder=" 留下你的精辟言论！支持Ctrl+Enter提交..."></textarea>
<div class="fbpl">
<?php echo $verifyCode; ?> <input type="submit" id="comment_submit" value="发表评论" tabindex="6">
</div>
<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1">
</form>
</div>
</div>
<?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
<?php
function rand_log() {
    $db = MySql::getInstance();
    $sql = "SELECT gid FROM ".DB_PREFIX."blog WHERE type='blog' and hide='n' ORDER BY rand() LIMIT 0,1";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){
        echo Url::log($row['gid']);
    }
}
?>
<?php
//格式化内容工具
function blog_tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读', '', strip_tags($content));
        if ($strlen) {
            $content = subString($content, 0, $strlen);
        }
        return $content;
}
?>
<?php
function index_link(){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    if (!blog_tool_ishome()) return;
	?>
	<div id="link2">
	<i class="iconfont">&#xe61a;</i>友情链接：<?php foreach($link_cache as $value): ?>
	<?php 
	$urlinfo = parse_url($value['url']); 
	$urlHost = explode(".",$urlinfo['host']);
	$urlHost = array_reverse($urlHost);
    ?>
    <img class="linkimg" src="<?=$urlinfo['scheme']?>://www.<?=$urlHost[1]?>.<?=$urlHost[0]?>/favicon.ico" onerror="javascript:this.src='<?php echo TEMPLATE_URL; ?>images/favicon.ico';"><a href="<?php echo $value['url']; ?>" class="hint--top hint--error" data-hint="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a>
	<?php endforeach; ?></div>
<?php }?>

<?php
//首页微语调用
function index_t($num){
	$t = MySql::getInstance();
	?>
	<?php
	$sql = "SELECT id,content,img,author,date,replynum FROM ".DB_PREFIX."twitter ORDER BY `date` DESC LIMIT $num";
	$list = $t->query($sql);
	while($row = $t->fetch_array($list)){
	?>
	<?php echo $row['content'];?>
	<?php }?>
<?php } ?>

<?php
//统计
function ja_sta(){
  global $CACHE;
  $JA_STA = $CACHE->readCache('sta');
  $JA_STA['linknum'] = count($CACHE->readCache('link'));
  $JA_STA['sortnum'] = count($CACHE->readCache('sort'));
  $JA_STA['tagsnum'] = count($CACHE->readCache('tags'));
  $JA_STA['usernum'] = count($CACHE->readCache('user'));
  extract($JA_STA);
  echo "
  <li><i class='iconfont'>&#xe626;</i>文章：$lognum 篇</li>
  <li><i class='iconfont'>&#xe61c;</i>评论：$comnum 条</li>
  <li><i class='iconfont'>&#xe609;</i>微语：$twnum 条</li>
  <li><i class='iconfont'>&#xe61a;</i>友链：$linknum 个</li>
  <li><i class='iconfont'>&#xe61f;</i>分类：$sortnum 个</li>
  <li><i class='iconfont'>&#xe628;</i>标签：$tagsnum 个</li>
  <li><i class='iconfont'>&#xe61b;</i>作者：$usernum 人</li>
  ";
}
function last_post_log(){
$db = MySql::getInstance();
$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' ORDER BY date DESC LIMIT 0,1";
                $res = $db->query($sql);
                $row = $db->fetch_array($res);
                $date = date('Y年n月j日 H点i分',$row['date']);
        return $date;        
}
?>

<?php
//置顶文章
function getTopLogs($log_num) {
//if (!blog_tool_ishome()) return;
$db = MySql::getInstance();
$sql = "SELECT gid,title,content,date FROM ".DB_PREFIX."blog WHERE type='blog' and top='y' ORDER BY `top` DESC ,`date` DESC LIMIT 0,$log_num";
    $list = $db->query($sql);
    while($row = $db->fetch_array($list)){ ?>
    <li><img id="zhiding_img" src="<?php echo TEMPLATE_URL; ?>images/top.png" alt="置顶文章"> 
	<a href="<?php echo Url::log($row['gid']); ?>"><?php echo $row['title']; ?></a></li>
    <?php } ?>
<?php } ?>
