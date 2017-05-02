<?php
/**
 * Plugin Name: WXMDL (WeChat Multi-Domain Login)
 * Version: 1.0
 * Plugin URI: https://www.xiaomac.com/201311150.html
 * Description: 微信多域名登录：解决微信登录回调地址只能设置一个域名的问题。使用回调地址形如：http://wx.abc.com/wxmdl.php?cburl=http://www.abc.com
 * Author: Link (Afly)
 */

define('SHOW_ERROR', 1); //是否显示错误
define('CHECK_HOST', 0); //是否检测域名同源，防止恶意调用

$code = isset($_GET['code']) ? trim($_GET['code']) : '';
$cburl = isset($_GET['cburl']) ? trim($_GET['cburl']) : '';
if(!$code) exit(SHOW_ERROR ? 'NO CODE' : '');
if(!$cburl) exit(SHOW_ERROR ? 'NO CALLBACK' : '');

if(CHECK_HOST){
	$host = explode('.', parse_url($cburl, PHP_URL_HOST));
	if(count($host)<2) exit(SHOW_ERROR ? 'HOST CHECK ERR' : '');
	$host_top = $host[count($host)-2] . $host[count($host)-1];
	$host_local = parse_url($_SERVER['HTTP_HOST'], PHP_URL_HOST);
	if(stripos($host_top, $host_local) === false) exit(SHOW_ERROR ? 'HOST CHECK ERR' : '');
}

unset($_GET['cburl']);
$cburl .= strpos($cburl, '?') !== false ? '&' : '?';
header('Location: '.$cburl.http_build_query($_GET));
exit();

?>
