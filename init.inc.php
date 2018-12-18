<?php
/**
 * @fileinfo	template.inc.php	系统初始化文件[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年6月5日 上午11:04:01
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//开启ＳＥＳＳＩＯＮ
session_start();
header('Content-Type:text/html;charset=utf-8');
// 网站根目录
define('ROOT_PATH', dirname(__FILE__));


//引入模板配置信息
require ROOT_PATH .'/config/profile.inc.php';
/* // 引入模板
require ROOT_PATH . '/includes/Templates.class.php';
//引入数据库
require ROOT_PATH . '/includes/DB.class.php';
//引入工具类
require ROOT_PATH . '/includes/Tool.class.php'; */
//自动加载类
function __autoload($_className){
    if (substr($_className,-6)=='Action'){
        require ROOT_PATH. '/action/'.$_className.'.class.php';
    }elseif (substr($_className,-5)=='Model'){
        require ROOT_PATH. '/model/'.$_className.'.class.php';
    }else{
        require ROOT_PATH.'/includes/'.$_className.'.class.php';
    }
}
// 实例化模板类
$_tpl = new Templates();
//初始化
require 'common.inc.php';


?>