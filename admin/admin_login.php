<?php
/**
 * Created by PhpStorm.
 * User: Richer
 * Date: 2018/10/23
 * Time: 10:33
 */
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $_tpl;
$_login=new LoginAction($_tpl);
$_login->_action();
if(isset($_SESSION['admin'])) Tool::alertLocation(null,'admin.php');
$_tpl->display('admin_login.tpl');
?>

