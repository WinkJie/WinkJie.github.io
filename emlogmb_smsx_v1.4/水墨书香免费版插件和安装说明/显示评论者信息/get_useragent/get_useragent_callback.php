<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
function callback_init(){
	$DB = MySql::getInstance();
	$check_columns_exist= $DB->query("show columns from ".DB_PREFIX."comment like 'useragent'");
	if($DB->num_rows($check_columns_exist) == 0){
		$sql = "alter table `".DB_PREFIX."comment` Add column useragent varchar(255) NOT NULL default '' AFTER `hide`";
		$DB->query($sql);
	}
}
#如果需要删除useragent字段，请自行去掉callback_rm函数上下的注释。
function callback_rm(){
	$DB = MySql::getInstance();
	$check_columns_exist= $DB->query("show columns from ".DB_PREFIX."comment like 'useragent'");
	if($DB->num_rows($check_columns_exist) !== 0){
		$query = $DB->query("alter table `".DB_PREFIX."comment` drop column useragent ");
	}
}
?>