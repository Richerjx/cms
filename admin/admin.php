<?php
/**
 * @fileinfo	admin.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月12日 下午2:47:34
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */

require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
Validate::checkSession();
$_tpl->display('admin.tpl');



?>