<?php
/**
 * @fileinfo	level.php	[UTF-8]等级管理
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月31日 上午9:49:21
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();  //验证是否是管理员登录
global $_tpl;
$_nav=new NavAction($_tpl); //入口
$_nav->_action();
$_tpl->display('nav.tpl');
?>