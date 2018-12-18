<?php
/**
 * @fileinfo	profile.inc.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月12日 上午11:44:37
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
//数据库配置文件
define('DB_HOST', 'localhost');                                     //主机IP                                        
define('DB_USER', 'root');                                          //用户名
define('DB_PASS', 'root');                                          //密码    
define('DB_NAME', 'cms');                                           //数据库

//系统配置文件
define('PAGE_SIZE',10);                                              //每页多少条
define('GPC',get_magic_quotes_gpc());                               //SQL转义功能是否打开
define('PREV_URL',$_SERVER["HTTP_REFERER"]);	                    //上一页地址
define('NAV_SIZE',10);                                              //主导航在前台显示条数

//模板配置信息
define('TPL_DIR', ROOT_PATH . '/templates/');                       // 模板文件目录
define('TPL_C_DIR', ROOT_PATH . '/templates_c/');                   // 编译文件目录
define('CACHE', ROOT_PATH . '/cache/');                             // 缓存文件目录

?>