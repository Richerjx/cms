<?php
/**
 * @fileinfo	index.php	[UTF-8]
 * @authors Richer (admin@tutuj.com)
 * @date    2018年7月12日 下午2:48:09
 * @version ver 1.0.0
 * @Copyright Richar Web company
 */
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
isset($_SESSION['admin'])? Tool::alertLocation(null,"admin.php") : Tool::alertLocation(null,"admin_login.php");



?>