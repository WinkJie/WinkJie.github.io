<?php

/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
		'logo' => array(
		'type' => 'image',
		'name' => 'LOGO',
		'values' => array(
			TEMPLATE_URL . 'images/logo.png',
		),
		'description' => '<span style="color:#484848; font-size:14px;">该logo只会在浏览器低分辨低于<b>1000px</b>下显示。<b>默认宽高：225X51  </b>宽高没有限制，建议用png格式，若不能上传请改用ftp手动上传。</span><br><br>',
	),
	'csszz1' => array(
		'type' => 'radio',
		'name' => '个性鼠标指针选择',
		'description' => '<span style="color:#676A6C;">默认显示的是个性鼠标指针，不喜欢的话选默认。</span>',
		'values' => array(
			'yes' => '<span style="color:#1963B4;">个性指针</span>',
			'no' => '<span style="color:#B42B19;">默认指针</span>',
		),
		'default' => 'yes',
	),
	'sygg' => array(
		'type' => 'radio',
		'name' => '博主寄语开关',
		'description' => '<span style="color:#676A6C;">博主寄语调用的数据是来自“微语”的，并且只在首页显示，日志页、自建页、微语页不显示。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'sousuo2' => array(
		'type' => 'radio',
		'name' => '手机低分辨率的搜索框',
		'description' => '<span style="color:#676A6C;">屏幕分辨率低于1000px才会出现的搜素框，出现在logo下方。一般是用于手机搜索。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'nav_ziti' => array(
		'type' => 'radio',
		'name' => '导航栏字体大小',
		'description' => '<span style="color:#676A6C;">默认用的是14像素字号，如果你的导航少可以选择18像素的字号，如果多可以选择为16或者14像素。<br><br>',
		'values' => array(
			'14' => '<span style="color:#124EAE;">14像素</span>',
			'16' => '<span style="color:#B42B19;">16像素</span>',
			'18' => '<span style="color:#B42B19;">18像素</span>',
		),
		'default' => '14',
	),
	'nav_jianju' => array(
		'type' => 'radio',
		'name' => '导航栏菜单上下间距',
		'description' => '<span style="color:#676A6C;">如果你的导航多，默认就好；如果导航菜单少，间距可以调大点，字体也调大点。比如：字体为18像素，间距为8-10像素。<br><br>',
		'values' => array(
			'0' => '<span style="color:#124EAE;">默认</span>',
			'2' => '<span style="color:#B42B19;">2像素</span>',
			'4' => '<span style="color:#B42B19;">4像素</span>',
			'6' => '<span style="color:#B42B19;">6像素</span>',
			'8' => '<span style="color:#B42B19;">8像素</span>',
			'10' => '<span style="color:#B42B19;">10像素</span>',
			'12' => '<span style="color:#B42B19;">12像素</span>',
			'14' => '<span style="color:#B42B19;">14像素</span>',
		),
		'default' => '0',
	),
	'sqbc' => array(
		'type' => 'radio',
		'name' => '导航栏的“手气不错”',
		'description' => '<span style="color:#676A6C;">一个人性化的设计，如果不晓得看什么，就点手气不错，它会随机打开一个页面让你阅读，默认是开启的。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'rz_bg' => array(
		'type' => 'radio',
		'name' => '阅读窗口是否开启半透明',
		'description' => '<span style="color:#676A6C;">如果背景图片颜色太艳、太杂会扰乱视觉阅读，造成障碍，所以建议开启半透明效果过滤。默认是开启的，关闭的话则是全透明。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'sy_pinglun' => array(
		'type' => 'radio',
		'name' => '首页-自带评论数和多说评论数',
		'description' => '<span style="color:#676A6C;">首页默认显示的是EM自带的评论数，如果你安装了多说社会化评论插件，就开启多说评论，如果未安装则保持默认。</span>',
		'values' => array(
			'yes' => '<span style="color:#1963B4;">自带评论</span>',
			'no' => '<span style="color:#B42B19;">多说评论</span>',
		),
		'default' => 'yes',
	),
	'rz_pinglun' => array(
		'type' => 'radio',
		'name' => '日志页-自带评论和多说评论数',
		'description' => '<span style="color:#676A6C;">日志页默认显示的是EM自带的评论数，如果你安装了多说社会化评论插件，就开启第二项，如果未安装则保持默认。</span>',
		'values' => array(
			'yes' => '<span style="color:#1963B4;">自带评论</span>',
			'no' => '<span style="color:#B42B19;">多说评论</span>',
		),
		'default' => 'yes',
	),
	'ipdz' => array(
		'type' => 'radio',
		'name' => '显示评论者的IP地址开关',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'yqlj' => array(
		'type' => 'radio',
		'name' => '底部友情链接开关',
		'description' => '<span style="color:#676A6C;">默认是开启的，如果不想在底部显示就关闭它。“侧边栏”的友情链接代码已被本人删除，只保留底部。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	 'yuedu-kh' => array(
		'type' => 'radio',
		'name' => '日志页“阅读时间”开关',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	 'yuedu' => array(
		'type' => 'text',
		'name' => '日志页“阅读文字”',
		'description' => '<span style="color:#676A6C;">访客在您的文章页面中的停留时间，也就是阅读时间前面的文字，你可以随意修改。</span>',
		'default' => '您阅读这篇文章共花了：',
	),
	'zidingyi1' => array(
		'type' => 'radio',
		'name' => '日志页底部“自定义”开关',
		'description' => '<span style="color:#676A6C;">此“自定义1”可以是广告，也可以是任何文字、提示文字、图片等。css样式请自己加。</span>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'no',
	),
	'zidingyi1_wz' => array(
		'type' => 'text',
		'name' => '日志页底部“自定义”代码',
		'description' => '<span style="color:#676A6C;">下面可以添加任何东西，广告、文字、图片。支持html、css样式。</span>',
		'multi' => true,
		'default' => '<b>微信分享提示：</b>①点击右上角的【∶】，②再点击【发送给朋友】或【<span style="color:#E80058" class="shake shake-little shake-constant">分享到朋友圈</span>】，让更多精彩传递！',
	),
		'biaoqian-kh' => array(
		'type' => 'radio',
		'name' => '日志页“彩色标签”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'xgrz-kh' => array(
		'type' => 'radio',
		'name' => '日志页“相关文章”',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'tongji-kg' => array(
		'type' => 'radio',
		'name' => '网站统计开关',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	'tjrq' => array(
		'type' => 'text',
		'name' => '侧边栏“网站统计” - 建站日期',
		'default' => '2014-04-24',
	),
	'dibu-zdy' => array(
		'type' => 'text',
		'name' => '自定义底部一些文字导航',
		'description' => '<span style="color:#676A6C;">你可以随便修改，这里的导航链接仅是演示。</span>',
		'multi' => true,
		'default' => '
<a href="http://" class="hint--top hint--error" data-hint="好的网站一定有好的精神，这个网站是什么精神呢？">关于我们</a>
<a href="http://" class="hint--top hint--error" data-hint="自定义链接">自定义链接</a>
<a href="http://www.xunzhenji.com/about/zzjs.html" class="hint--top hint--error" data-hint="自定义链接">自定义链接2</a>
<a href="/m/" class="hint--top hint--error" data-hint="手机版本">手机版本</a>',
	),
	);