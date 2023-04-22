<?php

/*

Plugin Name: 评论者信息显示

Version: 1.3.2

Plugin URL: http://www.xunzhenji.com

Description: 显示评论者所用的主流浏览器和操作系统，以及评论者等级及会员认证。

Author: leo制作，清萍剑客修改

Author Email: admin@wiyejing.cn

Author URL:  http://www.xunzhenji.com

*/

!defined('EMLOG_ROOT') && exit('access deined!');

function useragent_do($cid){

	$DB = MySql::getInstance();

	$userAgent = addslashes($_SERVER['HTTP_USER_AGENT']);

	$sql = "UPDATE ".DB_PREFIX."comment SET useragent = '$userAgent' WHERE cid = $cid";

	$DB->query($sql);

}

addAction('comment_saved', 'useragent_do');



#获取浏览器信息

function get_browsers($useragent){

	$title = '非主流浏览器';

	$icon = 'unknow';

	if(preg_match('/rv:(11.0)/i', $useragent, $matches)){

		$title = 'Internet Explorer '. $matches[1];

		$icon = 'ie11';

	}elseif (preg_match('#MSIE ([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'Internet Explorer '. $matches[1];

		if ( strpos($matches[1], '7') !== false || strpos($matches[1], '8') !== false)

			$icon = 'ie8';

		elseif ( strpos($matches[1], '9') !== false)

			$icon = 'ie9';

		elseif ( strpos($matches[1], '10') !== false)

			$icon = 'ie10';

		else

			$icon = 'ie';

    }elseif (preg_match('#Firefox/([a-zA-Z0-9.]+)#i', $useragent, $matches)){

		$title = 'Firefox '. $matches[1];

        $icon = 'firefox';

	}elseif (preg_match('#CriOS/([a-zA-Z0-9.]+)#i', $useragent, $matches)){

		$title = 'Chrome for iOS '. $matches[1];

		$icon = 'crios';

	}elseif (preg_match('#Opera.(.*)Version[ /]([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'Opera '. $matches[2];

		$icon = 'opera';

		if (preg_match('#opera mini#i', $useragent)) $title = 'Opera Mini '. $matches[2];

	}elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i', $useragent,$matches)) {

		$title = 'Maxthon '. $matches[2];

		$icon = 'maxthon';

	}elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = '360 Browser '. $matches[1];

		$icon = '360se';

	}elseif (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'SouGou Browser 2'.$matches[1];

		$icon = 'sogou';

	}elseif (preg_match('#UCWEB([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'UCWEB '. $matches[1];

		$icon = 'ucweb';

	}elseif (preg_match('#UBrowser/([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'UBrowser '. $matches[1];

		$icon = 'ucweb';

	}elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'Google Chrome '. $matches[1];

		$icon = 'chrome';

		if (preg_match('#OPR/([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

			$title = 'Opera '. $matches[1];

			$icon = 'opera15';

			if (preg_match('#opera mini#i', $useragent))

				$title = 'Opera Mini '. $matches[1];

		}

	}elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i', $useragent, $matches)) {

		$title = 'Safari '. $matches[1];

		$icon = 'safari';

	}

	return array(

		$title,

		$icon

	);

}



#获取系统信息

function get_os($useragent){

	$title = '非主流操作系统';

	$icon = 'unknow';

	if(preg_match('/Windows NT 6.1; Win64; x64/i', $useragent)

		|| preg_match('/Windows NT 6.1; WOW64/i', $useragent))

	{

		$title="Windows 7 x64 Edition";

		$icon="windows_win7";

	}

	elseif (preg_match('/win/i', $useragent)) {

		if (preg_match('/Windows NT 6.1/i', $useragent)) {

			$title = "Windows 7";

			$icon = "windows_win7";

		}elseif (preg_match('/Windows NT 5.1/i', $useragent)) {

			$title = "Windows XP";

			$icon = "windows";

		}elseif (preg_match('/Windows NT 6.2/i', $useragent)) {

			$title = "Windows 8";

			$icon = "windows_win8";

		}elseif (preg_match('/Windows NT 6.3/i', $useragent)) {

			$title = "Windows 8.1";

			$icon = "windows_win8";

		}elseif(preg_match('/Windows NT 6.4; Win64; x64;/i', $useragent)
			|| preg_match('/Windows NT 6.4; WOW64/i', $useragent))
		{
			$title="Windows 10 x64 TechnicalPreview";
			$icon="win-5";
		}elseif(preg_match('/Windows NT 6.4/i', $useragent))
		{
			$title="Windows 10 TechnicalPreview";
			$icon="win-5";			
		}elseif(preg_match('/Windows NT 10.0; Win64; x64/i', $useragent)
			|| preg_match('/Windows NT 10.0; WOW64/i', $useragent))
		{
			$title="Windows 10 x64 Edition";
			$icon="win-5";
		}elseif(preg_match('/Windows NT 10.0/i', $useragent))
		{
			$title="Windows 10";
			$icon="win-5";			
		}elseif (preg_match('/Windows NT 6.0/i', $useragent)) {

			$title = "Windows Vista";

			$icon = "windows_vista";

		}elseif (preg_match('/Windows NT 5.2/i', $useragent)) {

			if (preg_match('/Win64/i', $useragent)) {

				$title = "Windows XP 64 bit";

			} else {

				$title = "Windows Server 2003";

			}

			$icon = 'windows';

		}elseif (preg_match('/Windows Phone/i', $useragent)) {

			$matches = explode(';',$useragent);

			$title = $matches[2];

			$icon = "windows_phone";

		}

	} elseif (preg_match('#iPod.*.CPU.([a-zA-Z0-9.( _)]+)#i', $useragent, $matches)) {

		$title = "iPod ".$matches[1];

		$icon = "iphone";

	} elseif (preg_match('#iPhone OS ([a-zA-Z0-9.( _)]+)#i', $useragent, $matches)) {// 1.2 修改成 iphone os 来判断

		$title = "Iphone ".$matches[1];

		$icon = "iphone";

	} elseif (preg_match('#iPad.*.CPU.([a-zA-Z0-9.( _)]+)#i', $useragent, $matches)) {

		$title = "iPad ".$matches[1];

		$icon = "ipad";

	} elseif (preg_match('/Mac OS X.([0-9. _]+)/i', $useragent, $matches)) {

		if(count(explode(7,$matches[1]))>1) $matches[1] = 'Lion '.$matches[1];

		elseif(count(explode(8,$matches[1]))>1) $matches[1] = 'Mountain Lion '.$matches[1];

		$title = "Mac OSX ".$matches[1];

		$icon = "macos";

	} elseif (preg_match('/Macintosh/i', $useragent)) {

		$title = "Mac OS";

		$icon = "macos";

	} elseif (preg_match('/CrOS/i', $useragent)){

		$title = "Google Chrome OS";

		$icon = "chrome";

	} elseif (preg_match('/Linux/i', $useragent)) {

		$title = 'Linux';

		$icon = 'linux';

		if (preg_match('#Ubuntu#i', $useragent)) {

			$title = "Ubuntu Linux";

			$icon = "ubuntu";

		}elseif(preg_match('#Debian#i', $useragent)) {

			$title = "Debian GNU/Linux";

			$icon = "debian";

		}elseif (preg_match('#Fedora#i', $useragent)) {

			$title = "Fedora Linux";

			$icon = "fedora";

		}

	} elseif (preg_match('/Android.([0-9. _]+)/i',$useragent, $matches)) {

		$title= "Android";

		$icon = "android";

	}

	return array(

		$title,

		$icon

		);

}



#获取评论者等级

function comment_level($mail_str){

	global $CACHE;

	$user_cache = $CACHE->readCache('user');

	$vip_list = array();

	$i=1;

	foreach($user_cache as $value){

		if($value['mail']){

			$vip_list[$i] = $value['mail'];

			$i++;

		}

	}

	if(in_array($mail_str,$vip_list)){

		if($mail_str==$vip_list[1]){

			echo '<a class="vp" title="管理员认证"></a><a class="vip7" title="特别认证"></a>';

		}else

			echo '<a class="vip" title="本站会员认证"></a>';

	}



	$comment_author_email = "\"".$mail_str."\"";

	$adminEmail = "\"".$vip_list[1]."\"";

	$DB = MySql::getInstance();

	$sql = "SELECT cid as author_count FROM ".DB_PREFIX."comment WHERE mail = ".$comment_author_email;

	$res = $DB->query($sql);

	$author_count = mysql_num_rows($res);

	if($author_count>=1 && $author_count<5 && $comment_author_email!=$adminEmail)

	echo '<a class="vip1" title="路过酱油 LV.1"></a>';

	else if($author_count>=5 && $author_count<15 && $comment_author_email!=$adminEmail)

	echo '<a class="vip2" title="偶尔光临 LV.2"></a>';

	else if($author_count>=15 && $author_count<30 && $comment_author_email!=$adminEmail)

	echo '<a class="vip3" title="常驻人口 LV.3"></a>';

	else if($author_count>=30 && $author_count<60 && $comment_author_email!=$adminEmail)

	echo '<a class="vip4" title="以博为家 LV.4"></a>';

	else if($author_count>=60 &&$author_count<150 && $comment_author_email!=$adminEmail)

	echo '<a class="vip5" title="情牵小博 LV.5"></a>';

	else if($author_count>=150 && $author_coun<300 && $comment_author_email!=$adminEmail)

	echo '<a class="vip6" title="为博终老 LV.6"></a>';

	else if($author_count>=300 && $comment_author_email!=$adminEmail)

	echo '<a class="vip7" title="三世情牵 LV.7"></a>';

}



function convertip($ip) {

    $dat_path = EMLOG_ROOT.'/content/plugins/get_useragent/images/IP/QQWry.Dat';

    if(!$fd = @fopen($dat_path, 'rb')){

        return '哎哟喂,咋滴？找不到IP数据库了！';

    }   

    $ip = explode('.', $ip);

    $ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];

    $DataBegin = fread($fd, 4);

    $DataEnd = fread($fd, 4);

    $ipbegin = implode('', unpack('L', $DataBegin));

    if($ipbegin < 0) $ipbegin += pow(2, 32);

    $ipend = implode('', unpack('L', $DataEnd));

    if($ipend < 0) $ipend += pow(2, 32);

    $ipAllNum = ($ipend - $ipbegin) / 7 + 1;

    $BeginNum = 0;

    $EndNum = $ipAllNum;

    while($ip1num>$ipNum || $ip2num<$ipNum) {

        $Middle= intval(($EndNum + $BeginNum) / 2);

        fseek($fd, $ipbegin + 7 * $Middle);

        $ipData1 = fread($fd, 4);

        if(strlen($ipData1) < 4) {

            fclose($fd);

            return '系统出错！';

        }

        $ip1num = implode('', unpack('L', $ipData1));

        if($ip1num < 0) $ip1num += pow(2, 32);

        if($ip1num > $ipNum) {

            $EndNum = $Middle;

            continue;

        }

        $DataSeek = fread($fd, 3);

        if(strlen($DataSeek) < 3) {

            fclose($fd);

            return '系统出错！';

        }

        $DataSeek = implode('', unpack('L', $DataSeek.chr(0)));

        fseek($fd, $DataSeek);

        $ipData2 = fread($fd, 4);

        if(strlen($ipData2) < 4) {

            fclose($fd);

            return '系统出错！';

        }

        $ip2num = implode('', unpack('L', $ipData2));

        if($ip2num < 0) $ip2num += pow(2, 32);

        if($ip2num < $ipNum) {

            if($Middle == $BeginNum) {

                fclose($fd);

                return '未知';

            }

            $BeginNum = $Middle;

        }

    }

    $ipFlag = fread($fd, 1);

    if($ipFlag == chr(1)) {

        $ipSeek = fread($fd, 3);

        if(strlen($ipSeek) < 3) {

            fclose($fd); 

            return '系统出错！';

        }

        $ipSeek = implode('', unpack('L', $ipSeek.chr(0)));

        fseek($fd, $ipSeek);

        $ipFlag = fread($fd, 1);

    }

    if($ipFlag == chr(2)) {

        $AddrSeek = fread($fd, 3);

        if(strlen($AddrSeek) < 3) {

            fclose($fd);

            return '系统出错！';

        }

        $ipFlag = fread($fd, 1);

        if($ipFlag == chr(2)) {

            $AddrSeek2 = fread($fd, 3);

            if(strlen($AddrSeek2) < 3) {

                fclose($fd);

                return '系统出错！';

            }

            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));

            fseek($fd, $AddrSeek2);

        } else {

            fseek($fd, -1, SEEK_CUR);

        }   

        while(($char = fread($fd, 1)) != chr(0))

        $ipAddr2 .= $char;

        $AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));

        fseek($fd, $AddrSeek);

        while(($char = fread($fd, 1)) != chr(0))

        $ipAddr1 .= $char;

    } else {

        fseek($fd, -1, SEEK_CUR);

        while(($char = fread($fd, 1)) != chr(0))

        $ipAddr1 .= $char;

        $ipFlag = fread($fd, 1);

        if($ipFlag == chr(2)) {

            $AddrSeek2 = fread($fd, 3);

            if(strlen($AddrSeek2) < 3) {

                fclose($fd);

                return '系统出错！';

            }

            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));

            fseek($fd, $AddrSeek2);

        } else {

            fseek($fd, -1, SEEK_CUR);

        }

        while(($char = fread($fd, 1)) != chr(0)){

            $ipAddr2 .= $char;

        }

    }

    fclose($fd);

    if(preg_match('/http/i', $ipAddr2)) {

        $ipAddr2 = '';

    }

    $ipaddr = "$ipAddr1 $ipAddr2";

    $ipaddr = preg_replace('/CZ88.Net/is', '', $ipaddr);

    $ipaddr = preg_replace('/^s*/is', '', $ipaddr);

    $ipaddr = preg_replace('/s*$/is', '', $ipaddr);

    if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {

        $ipaddr = '未知';

    }

    $ipaddr = iconv('gbk', 'utf-8//IGNORE', $ipaddr);

    if( $ipaddr != '  ' )

        return $ipaddr;

    else  

        $ipaddr = '评论者来自火星，这个IP地址真没有!';

        return $ipaddr;

}



#评论信息输出

function display_useragent($cid,$comment_mail){

	global $useragent;

	$DB = MySql::getInstance();

	$sql = "SELECT useragent FROM ".DB_PREFIX."comment where cid = ".$cid."";

	$result = $DB->query($sql);

	while($row = $DB->fetch_array($result)){

		if(!empty($row['useragent'])){

			$useragent = $row['useragent'];

			$url =  BLOG_URL.'content/plugins/get_useragent/images/';

			$browser = get_browsers($useragent);

			$os = get_os($useragent);

			$ua ='&nbsp;<img src="'.$url.$browser[1].'.png" title="'.$browser[0].'" style="vertical-align:middle;" alt="'.$browser[0].'"> <img src="'.$url.$os[1].'.png" title="'.$os[0].'" style="vertical-align:middle;" alt="'.$os[0].'">';

		}

	}

	echo "<span class=\"useragent\">";

	$mail_str=strip_tags($comment_mail);

	comment_level($mail_str);

	echo $ua."</span>";

}



function useragent_css(){?>

<style type="text/css">
.useragent{padding-left:5px}.vp,.vip,.vip1,.vip2,.vip3,.vip4,.vip5,.vip6,.vip7{background:url("<?php echo BLOG_URL ;?>content/plugins/get_useragent/images/vip.png") no-repeat;display:inline-block;overflow:hidden;border:0}.vp{background-position:-494px -3px;width:16px;height:16px;margin-bottom:-5px}.vp:hover{background-position:-491px -19px;width:19px;height:18px;margin-top:-3px;margin-left:-3px;margin-bottom:-5px}.vip{background-position:-515px -2px;width:14px;height:14px;margin-bottom:-5px}.vip:hover{background-position:-515px -22px;width:16px;height:14px;margin-bottom:-5px}.vip1{background-position:-1px -2px;width:46px;height:14px;margin-bottom:-2px}.vip1:hover{background-position:-1px -22px;width:46px;height:14px;margin-bottom:-2px}.vip2{background-position:-63px -2px;width:46px;height:14px;margin-bottom:-2px}.vip2:hover{background-position:-63px -22px;width:46px;height:14px;margin-bottom:-2px}.vip3{background-position:-144px -2px;width:46px;height:14px;margin-bottom:-2px}.vip3:hover{background-position:-144px -22px;width:46px;height:14px;margin-bottom:-2px}.vip4{background-position:-227px -2px;width:46px;height:14px;margin-bottom:-2px}.vip4:hover{background-position:-227px -22px;width:46px;height:14px;margin-bottom:-2px}.vip5{background-position:-331px -2px;width:46px;height:14px;margin-bottom:-2px}.vip5:hover{background-position:-331px -22px;width:46px;height:14px;margin-bottom:-2px}.vip6{background-position:-441px -2px;width:46px;height:14px;margin-bottom:-2px}.vip6:hover{background-position:-441px -22px;width:46px;height:14px;margin-bottom:-2px}.vip7{background-position:-611px -2px;width:46px;height:14px;margin-bottom:-2px}.vip7:hover{background-position:-611px -22px;width:46px;height:14px;margin-bottom:-2px}
</style>

<?php }

addAction('index_footer', 'useragent_css');