<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>登录CMS后台管理系统</title>
<link rel="stylesheet" type="text/css" href="../style/admin.css"/>
<script type="text/javascript" src="../js/admin_login.js"></script>
</head>
<body>

<form id="adminLogin" method="post" action="?action=login" name="login">
	<fieldset>
		<legend>登录CMS后台管理系统</legend>
		<label >帐　号：<input type="text" name="admin_user" class="text"></label>
		<label >密　码：<input type="password" name="admin_pass" class="text"></label>
		<label >验证码：<input type="text" name="code" class="text"></label>
		<label class="t">输入下图的字符，不区分大小写</label>
		<!--验证码局部刷新-->
		<label ><img src="../config/code.php" onclick="javascript:this.src='../config/code.php?tm='+Math.random();"></label>
		<input type="submit" value="登录" class="submit" onclick="return checkLogin();" name="send"/>
	</fieldset>
</form>

	
</body>
</html>