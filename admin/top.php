<?php
/**
 * @fileinfo	top.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月16日 下午3:17:25
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
Validate::checkSession();
$_tpl->assign('admin_user',$_SESSION['admin']['admin_user']);
$_tpl->assign('level_name',$_SESSION['admin']['level_name']);
$_tpl->display('top.tpl');



?>