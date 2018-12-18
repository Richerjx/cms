<?php
/**
 * Created by PhpStorm.
 * User: Richer
 * Date: 2018/10/23
 * Time: 11:08
 */
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
$_vc=new ValidateCode();
$_vc->doimg();
$_SESSION['code']=$_vc->getCode();