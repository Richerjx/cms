<?php
/**
 * @fileinfo	manage.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月31日 上午9:49:21
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
Validate::checkSession();
global $_tpl;
$_manage=new ManageAction($_tpl); //入口
$_manage->_action();
$_tpl->display('manage.tpl');
?>