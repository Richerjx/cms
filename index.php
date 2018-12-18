<?php
/**
 * @fileinfo	index.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年5月28日 下午3:09:17
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require dirname(__FILE__).'/init.inc.php';
global $_tpl;

/* //注入一个变量.'name'是模板中{$name}中的变量名,$_name是变量的值
$_tpl->assign('name', $_name);*/

//载入tpl文件
$_tpl->assign('title', '标头');
$_tpl->display('index.tpl');

?>