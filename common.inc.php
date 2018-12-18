<?php
/**
 * @fileinfo	common.inc.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月12日 下午3:04:38
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
// 是否开启缓冲区----前台专用
define('IS_CACHE',false );
// 判断是否开启缓存
IS_CACHE ? ob_start() : null;
//模版句柄
global $_tpl;
$_nav=new NavAction($_tpl);
$_nav->showfront() //列出主导航





?>